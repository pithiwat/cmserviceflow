@extends('layouts.app')

@section('content')

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

@endsection