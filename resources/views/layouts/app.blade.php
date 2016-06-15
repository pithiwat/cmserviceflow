<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CM Service Flow</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/dataTables.tableTools.css">
    <!--[if IE 8]><script src="js/es5.js"></script><![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.tableTools.js"></script>
    <script src="js/selectize.js"></script>
    <script src="js/index.js"></script>

    <style type="text/css">
        .cm-service-flow .service-group {
            font-weight: normal;
            opacity: 0.3;
            margin: 0 0 0 2px;
        }
        .cm-service-flow .service-group::before {
            content: '(';
        }
        .cm-service-flow .service-group::after {
            content: ')';
        }
    </style>

</head>
<body id="app-layout">

    @yield('content')

</body>
</html>
