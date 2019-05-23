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
        $goods=GoodsModel::where(['is_new'=>1])->get();
        if($goods){
            $goods=$goods->toArray();
        }else{
            $goods=[];
        }
        $hos=GoodsModel::where(['is_hot'=>1])->get();
        if($hos){
            $hos=$hos->toArray();
        }else{
            $hos=[];
        }
        return view('Home.home',['data'=>$goods,'hos'=>$hos]);
    }
}