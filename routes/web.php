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
Route::get('/goodsList', 'Goods\GoodsController@goodsList');//商品列表
Route::get('/goodsDetails', 'Goods\GoodsController@goodsDetails');//商品详情

//用户user
Route::get('/user/reg','User\RegisterController@reg');//注册
Route::post('/user/regAdd','User\RegisterController@regAdd');
Route::get('/user/login','User\LoginController@login');//登录
Route::post('/user/logdo','User\LoginController@logindo');
Route::post('/user/quit','User\QuitController@Quit');//退出

Route::group(['middleware' => ['checklogin']], function () {
    Route::post('/homeCart', 'Home\HomeController@homeCart');//获取布局中的购物车数据
    Route::post('/user/center','User\UserController@center');//个人中心
    Route::any("cart","Cart\CartController@cart");//加入购物车
    Route::any("cartlist","Cart\CartController@cartlist");//购物车列表展示
    Route::post('/order','Order\OrderController@order');//个人中心
});
