<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CmserviceflowController extends Controller
{
    //Index
    public function index(){
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
    }
    
    //Result.
    public function result(Request $request){
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
    }
    
}
