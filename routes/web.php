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

Route::get('/', function () {
    return view('welcome');
});
//用户user
Route::get('/user/reg','User\RegisterController@reg');
Route::post('/user/regAdd','User\RegisterController@regAdd');
Route::get('/user/login','User\LoginController@login');
Route::post('/user/logdo','User\LoginController@logindo');

