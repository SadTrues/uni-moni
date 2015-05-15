<?php

function parse_item($item)
{
    // http://simplehtmldom.sourceforge.net/

    $html = base64_decode($item['html']);

    $dom = \Sunra\PhpSimple\HtmlDomParser::str_get_html($html);

    $pics  = [];
    $links = [];

    $types    = get_filetypes_icons();
    $patterns = \Illuminate\Support\Facades\Config::get('parser.patterns');

    foreach ($dom->find('a') as $element) {
        $res_el = prepare_items($item, $element, $patterns, $types);

        $links[md5($res_el['src'])] = $res_el;
    }

    foreach ($dom->find('img') as $element) {
        $res_el = prepare_items($item, $element, $patterns, $types);

        $pics[md5($res_el['src'])] = $res_el;
    }


    $item['pics']  = $pics;
    $item['links'] = $links;

    return $item;
}


function prepare_items($item, $element, $patterns, $types)
{
    $url = prepare_url($element->src ?: $element->href, $item['url']);
    $ptr = get_special_parse($url, $patterns);
    $ext = $ptr ? : get_ext($url);

    $res_el = [
        'src'       => $url,
        'title'     => $element->title,
        'alt'       => $element->alt,
        'ext'       => $ext,
        'base'      => $item['url'],
        'style'     => get_type_style($ext, $types),
        'patterned' => $ptr,
    ];
    return $res_el;
}

function get_ext($url)
{
    $def = 'htm';
    $url = array_get(parse_url($url), 'path', '');
    if ($url && substr($url, -1, 1) == '/') {
        return $def;
    }

    return array_get(pathinfo($url), 'extension', $def);
}

function prepare_url($url, $base)
{
    $url = trim(strtolower($url));

    if (substr($url, 0, 4) == 'http') {
        return $url;
    }

    $base   = parse_url($base);
    $domain = $base['scheme'] . '://' . $base['host'];
    $path   = $domain . $base['path'];

    if (!$url) {
        return $domain;
    }

    if (substr($url, 0, 1) == '/') {
        return $domain . $url;
    }

    if (substr($url, 0, 1) == '#') {
        return $path . $url;
    }

    return $url;
}

function get_type_style($ext, $types)
{
    $def = 'glyphicon-question-sign';
    return array_get($types, $ext, $def);
}


function get_filetypes_icons()
{
    $array = [];
    $types = \Illuminate\Support\Facades\Config::get('parser.filetypes');

    if ($types) {
        foreach ($types as $type) {
            foreach ($type['extensions'] as $ext) {
                $array[$ext] = $type['class'];
            }
        }
    }

    return $array;
}

function get_special_parse($url, $patterns)
{
//    $url = 'http://erobank.ru/7771_gigi_lightspeed_rastjagivaet_svoju_kisku/photo/7.html';

    $elements = parse_url($url);
    $host     = $elements['host'];

    foreach ($patterns as $pattern) {
        if (preg_match('/' . $pattern['domain-pattern'] . '/', $host)) {
            if (preg_match('/' . $pattern['link-pattern'] . '/', $url)) {
                return $pattern['handler'];
            }
        }
    }
    return false;
}
