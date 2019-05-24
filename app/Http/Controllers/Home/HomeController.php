<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
use App\Model\CartModel;

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
        $cart=CartModel::where(['user_id'=>1])->get();
        if($cart){
            $cart=$cart->toArray();
        }else{
            $cart=[];
        }
        $Total=$this->multi_array_sum($cart,'goods_price','buy_number');
        return view('Home.home',['data'=>$goods,'hos'=>$hos,'cart'=>$cart,'total'=>$Total]);
    }

    /**
     * 计算二维数组价格的合
     * $arr 二维数组
     * $key 需要对价格进行求和运算
     * $keys 需要想乘的数量
     */
    function multi_array_sum($arr,  $key,$keys)
    {
        if ($arr)
        {
            $sum_no = 0;

            foreach($arr as $v)
            {
                $sum_no +=  $v[$key]*$v[$keys];
            }
            return $sum_no;
        } else {
            return 0;
        }
    }
}