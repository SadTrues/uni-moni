<?php

return [
    //https://regex101.com/
    'patterns'  => [
        [
            //http://erobank.ru/7771_gigi_lightspeed_rastjagivaet_svoju_kisku/photo/7.html
            'caption'        => 'erobank.ru',
            'domain-pattern' => 'erobank\.ru$',
            'link-pattern'   => 'erobank\.ru\/\w+\/photo\/\d+\.html$',
            'handler'        => 'pic-on-page', // handler
        ]

    ],
    'filetypes' => [
        'img'  => [
            'extensions' => [
                'jpg',
                'jpeg',
                'png',
                'gif',
                'tiff',
                'ico',
                'bmp',
            ],
            'caption'    => 'Images',
            'class'      => 'glyphicon-picture',
        ],
        'jpg'  => [
            'extensions' => [
                'jpg',
                'jpeg',
            ],
            'caption'    => 'JPEG only',
            'class'      => 'glyphicon-picture',
        ],
        'mov'  => [
            'extensions' => [
                'mov',
                'mpeg',
                'mpg',
                'ra',
                'ram',
                'avi',
                'mp4',
                'divx',
                'asf',
                'qt',
                'wmv',
                'm',
                'dv',
                'rv',
                'vob',
                'asx',
                'ogm',
                'ogv',
                'webm',
            ],
            'caption'    => 'Movie',
            'class'      => 'glyphicon-film',
        ],
        'html' => [
            'extensions' => [
                '',
                'html',
                'htm',
                'php',
                'shtml',
                'cgi',
            ],
            'caption'    => 'Site',
            'class'      => 'glyphicon-list-alt',
        ],

    ],

];
// /\.(?:mp3|wav|og(?:g|a)|flac|midi?|rm|aac|wma|mka|ape)$/i glyphicon-headphones
// /\.(?:z(?:ip|[0-9]{2})|r(?:ar|[0-9]{2})|jar|bz2|gz|tar|rpm|7z(?:ip)?|lzma|xz)$/i
// /\.(?:exe|msi|dmg|bin|xpi|iso)$/i
// /\.(?:pdf|xlsx?|docx?|odf|odt|rtf)$/i
// glyphicon-question-sign
