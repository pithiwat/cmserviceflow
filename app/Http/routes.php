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

ini_set('max_execution_time', 0);

//@index page.
Route::get('/', 'CmserviceflowController@index');

//@result page.
Route::post('/result', 'CmserviceflowController@result');

