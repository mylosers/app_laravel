<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\GoodsModel;

/**
 * 首页
 * Class HomeController
 * @package App\Http\Controllers\Home
 */
class HomeController extends Controller
{
    /**
     * 首页视图
     */
    public function home(){
        //查询商品表
        $goods=GoodsModel::where(['is_new'=>1,'is_up'=>1])->get();
        if($goods){
            $goods=$goods->toArray();
        }else{
            $goods=[];
        }
        //查询商品热度
        $hos=GoodsModel::where(['is_hot'=>1,'is_up'=>1])->get();
        if($hos){
            $hos=$hos->toArray();
        }else{
            $hos=[];
        }
        //购物车

        return view('Home.home',['data'=>$goods,'hos'=>$hos]);
    }
}