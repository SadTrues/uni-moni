<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Uni Parser 0.01 — Add Items</title>

    <link rel="stylesheet" type="text/css" href="/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="/css/ff_main.css"/>

    <script type="text/javascript" charset="utf8" src="/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="/js/ff_main.js"></script>
</head>
<body>
<div class="container">
    <div class="content">
        <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs sess-tabs" role="tablist">
                <?php
                foreach ($sessions as $k => $s) {
                    $name = $s->created_at->format('m.d H:i');
                    echo '<li role="presentation" ' . ($s->token == $token ? 'class="active"' : '') . '>';
                    echo '<a href="#session_'
                        . $k
                        . '" aria-controls="session_'
                        . $k
                        . '" role="tab" data-toggle="tab">'
                        . $name
                        . '</a>';
                    echo '</li>';
                }
                ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <?php
                foreach ($sessions as $k => $s) {
                    echo view(
                        'ff-addon/session_tab',
                        [
                            'token'   => $token,
                            'session' => $s,
                            'key'     => $k,
                        ]
                    );
                }
                ?>

            </div>

        </div>


    </div>
</div>
</body>
</html>
