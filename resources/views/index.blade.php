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
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h1>CM Service Flow</h1>
            <div class="cm_serviceflow">
                <!--                <h2>Title</h2>-->
                <div class="control-group">
                    <label for="select-animal">CMTS OR Description:</label>
                    <select id="select-animal" class="cm-service-flow" placeholder="Select CMTS OR Description..."></select>
                </div>
                <script>
                    $('#select-animal').selectize({
                        options: {!! json_encode($option) !!},
                        optgroups: [
                            {value: 'cmts', label: 'CMTS', label_service_group: 'CMTS'},
                            {value: 'desc', label: 'Description', label_service_group: 'Description'}
                        ],
                        optgroupField: 'class',
                        labelField: 'name',
                        searchField: ['name'],
                        render: {
                            optgroup_header: function(data, escape) {
                                return '<div class="optgroup-header">' + escape(data.label) + ' <span class="service-group">' + escape(data.label_service_group) + '</span></div>';
                            }
                        },
                        onItemAdd: function(value){
                            //Send data to result page with Jquery function.
                            $(document).ready(function () {
                                $.ajax({
                                    async: true,
                                    type: "POST",
                                    url: "result",
                                    data: {"_token": "{{ csrf_token() }}", value: value},
                                    success: function(data){
                                        $('#result').html(data); //Insert result page to result TAG ID.
                                    }
                                });
                            })
                        },
                    });
                </script>
            </div>
        </div>
    </div>
    <!--Table Result is here.-->
    <div id="result"></div>
</div>
</body>
</html>