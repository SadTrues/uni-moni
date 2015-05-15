<html>
<head>
    <link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>

    <title>Uni Parser 0.01</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            color: #cb9cb7;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
            background-color: white;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
            margin-bottom: 40px;
        }

        .quote {
            font-weight: 300;
            font-size: 24px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Uni Parser</div>
        <div class="quote">version 0.01</div>
        <div class="quote"><?php echo md5(time().microtime(true)); ?></div>
    </div>
</div>
</body>
</html>
