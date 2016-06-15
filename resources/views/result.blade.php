@extends('layouts.resultLayout')

@section('content')

<div class="export"></div>

<div class="row">
    <div class="col-md-12 col-lg-12">
        <table id="dataTb" class="table table-bordered table-striped table-hover table-condensed table-responsive">
            <thead>
            <tr>
                <th>
                    CMTS
                </th>
                <th>
                    SUB
                </th>
                <th>
                    Description
                </th>
            </tr>
            </thead>
            <tbody>
            @for ($i = 0; $i < count($cmtsData); $i++)
            <tr>
                <td>
                    {{ $cmtsData[$i] }}
                </td>
                <td>
                    {{ number_format($subsData[$i]) }}
                </td>
                <td>
                    {{$descData[$i]}}
                </td>
            </tr>
            @endfor
            <tr>
                <td>
                    Total
                </td>
                <td>
                    {{ number_format(array_sum($subsData)) }}
                </td>
                <td>

                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
