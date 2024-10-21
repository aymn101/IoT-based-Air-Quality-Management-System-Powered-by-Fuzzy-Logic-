<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

    Route::get('myMQ135link','App\Http\Controllers\apiController@apiMQ135');
    Route::get('myMQ7link','App\Http\Controllers\apiController@apiMQ7');
    Route::get('mytemplink','App\Http\Controllers\apiController@apiTemp');


    