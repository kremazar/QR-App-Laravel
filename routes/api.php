<?php

use Illuminate\Http\Request;

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

Route::get('/users/{id}', ['as' => 'users', 'uses' => 'UserController@show']);
Route::post('/users/{id}', ['as' => 'users', 'uses' => 'UserController@show']);
Route::get('users/{id}/mojikorisnici/', ['as' => 'mojikorisnici', 'uses' => 'UserController@show2']);
