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
Route::post('/user/quite','User\QuitController@quit');//退出
Route::get('/wechat/login','User\LoginController@wxlogin');//wx登录
Route::get('/wechat/code','User\LoginController@code');//wx登录code

//获取地址
Route::post('/user/address/town','User\AddressController@town');//市
Route::post('/user/address/county','User\AddressController@county');//县区
Route::post('/user/address/address_add','User\AddressController@address_add');//入库


Route::group(['middleware' => ['checklogin']], function () {
    Route::post('/homeCart', 'Home\HomeController@homeCart');//获取布局中的购物车数据
    Route::post('/user/center','User\UserController@center');//个人中心
    Route::any("cart","Cart\CartController@cart");//加入购物车
    Route::any("cartlist","Cart\CartController@cartlist");//购物车列表展示
    Route::post('/order','Order\OrderController@order');//生成订单
    Route::get('/orderList','Order\OrderController@orderList');//订单列表
    Route::get('/user/address','User\AddressController@address');//收货地址页面
    Route::post('/user/addressAdd','User\AddressController@addressAdd');//入库
    Route::post('/user/addressAdd','User\AddressController@addressAdd');//检查登录状态
});
Route::get('pay/{id}', 'Pay\AlipayController@pay');       //去支付
Route::post('/notify', 'Pay\AlipayController@notify');       //支付宝异步通知
Route::get('/aliReturn', 'Pay\AlipayController@aliReturn');       //支付宝同步通知
