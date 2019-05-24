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

Route::get('/', 'Home\HomeController@home');//首页
Route::post('/homeCart', 'Home\HomeController@homeCart');//首页
Route::get('/goodsList', 'Goods\GoodsController@goodsList');//商品列表
Route::get('/goodsDetails', 'Goods\GoodsController@goodsDetails');//商品详情
