<table
    class="display links-table"
    data-id="<?php echo $session['token']; ?>"
    id="<?php echo $links_type . '-' . $session['token']; ?>"
    >
    <thead>
    <tr>
        <th><input type="checkbox"/></th>
        <th>Link</th>
        <th>Title</th>
        <th>Alt</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $keys_array = [];

    foreach ($session['items'] as $item) {
        foreach ($item[$links_type] as $k => $pic) {
            if (in_array($k, $keys_array)) {
                continue;
            } else {
                $keys_array[] = $k;
            }

            echo '<tr ';
            foreach ($pic as $param => $value) {
                echo ' data-' . $param . '="' . $value . '"';
            }
            echo '>';

            echo '<td class="row_pin">';
            echo '<span><input type="checkbox" /></span>';
            echo '</td>';

            $class = $pic['style'];
            $ttl   = $pic['ext'];
            if ($pic['patterned']) {
                $class = 'glyphicon-screenshot';
                $ttl   = $pic['patterned'];
            }

            echo '<td class="row_src">';
            echo '<span class="glyphicon ' . $class . '" title="' . $ttl . '"></span>';
            echo '<span title="' . $pic['src'] . '">' . $pic['src'] . '</span>';
            echo '</td>';

            echo '<td class="row_title">';
            echo '<span title="' . $pic['title'] . '">' . $pic['title'] . '</span>';
            echo '</td>';

            echo '<td class="row_alt">';
            echo '<span title="' . $pic['alt'] . '">' . $pic['alt'] . '</span>';
            echo '</td>';

            echo '</tr>';
        }

    }
    ?>
    </tbody>
</table>

<div class="panel panel-default links-controls-panel">
    <div class="panel-body links-controls">
        <div class="quote">session: <?php echo $links_type . '-' . $session['token']; ?></div>
    </div>
</div>