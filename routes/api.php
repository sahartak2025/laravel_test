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

Route::middleware('api')->group(function () {
    Route::get('all-users', 'ApiController@allUsers');
    Route::get('user/{user}', 'ApiController@show');
    Route::post('user', 'ApiController@store');
    Route::put('user/{user}', 'ApiController@update');
    Route::delete('user/{user}', 'ApiController@delete');
});
