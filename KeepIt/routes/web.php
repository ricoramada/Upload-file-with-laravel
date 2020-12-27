<?php

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

// Route::get('/', function () {
//    return view('welcome');
// });
Route::group(['middleware' => 'cek_login'], function(){
  Route::post('kirim', 'Upload@upload');
  Route::get('/addproject', 'PageController@addproject');
  Route::get('/', 'PageController@data');
  Route::get('hapus/{id}', 'Upload@hapus');
});

Route::get('login', 'LoginController@login');
Route::post('login/cek', 'LoginController@cek');
Route::get('logout', 'LoginController@logout');

Route::get('register', 'LoginController@register');
Route::post('login', 'LoginController@store');
