<?php
use App\Baza;
use App\User;
use App\MojiKorisnici;
use App\Mail\SendMail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/qrweb', ['as' => 'qrweb', 'uses' => 'qrwebController@qrweb']);






Auth::routes();

Route::get('/', 'HomeController@index')->name('home');



Route::resource('mojikorisnici','MojiKorisniciController');


Route::get('/users/{id}', ['as' => 'users', 'uses' => 'UserController@show']);
Route::post('/users/{id}', ['as' => 'users', 'uses' => 'UserController@show']);
Route::get('users/{id}/mojikorisnici/', ['as' => 'mojikorisnici', 'uses' => 'UserController@show2']);



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/activation/{token}','Auth\RegisterController@userActivation');

