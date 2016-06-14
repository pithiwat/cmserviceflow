<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

ini_set('max_execution_time', 0);

Route::get('/test', function () {
    return response()->json(['name' => 'Abigail', 'state' => 'CA']);
});

Route::get('/', function () {
    $query_cmts = DB::select('SELECT CMTSName FROM CM_Service_Flow GROUP BY CMTSName');
    $query_desc  = DB::select('SELECT Description FROM CM_Service_Flow GROUP BY Description');

    $option = [];

    foreach($query_cmts as $key =>$value){
        array_push($option, [ "class" => "cmts",
            "value" => $query_cmts[$key]->CMTSName,
            "name" => $query_cmts[$key]->CMTSName]);
    }

    foreach($query_desc as $key =>$value){
        array_push($option, [ "class" => "desc",
            "value" => $query_desc[$key]->Description,
            "name" => $query_desc[$key]->Description]);
    }

    return view('index', compact('option'));
});

Route::post('/result', function (Request $request) {
    $data =  $request->input( 'value' );
    $valSel = $data;
    
    $query_data = DB::select("SELECT CMTSName, Subs, Description FROM CM_Service_Flow WHERE CMTSName LIKE '%".$valSel."%' OR Description LIKE '%".$valSel."%'");
    $cmtsData = [];
    $subsData = [];
    $descData = [];
    foreach($query_data as $key =>$value){
        $cmtsData[] = $query_data[$key]->CMTSName;
        $subsData[] = $query_data[$key]->Subs;
        $descData[] = $query_data[$key]->Description;
    }
    return view('result', compact('cmtsData', 'subsData', 'descData'));
});

