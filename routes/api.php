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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'App\Http\Controllers\UserController@login');

Route::post('users', 'App\Http\Controllers\UserController@store');

Route::apiResource('cars', 'App\Http\Controllers\CarController');

Route::group(['middleware' => 'auth:api'], function () {

Route::post('logout', 'App\Http\Controllers\UserController@logout')->middleware('auth:api');

});
