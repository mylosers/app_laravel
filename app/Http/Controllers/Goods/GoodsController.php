<?php

namespace App\Http\Controllers\Goods;

use App\Http\Controllers\Controller;
use App\Model\GoodsModel;

/**
 * 商品控制器
 * Class GoodsController
 * @package App\Http\Controllers\Goods
 */
class GoodsController extends Controller
{
    /**
     * 商品列表
     */
    public function goodsList(){
        $goods=GoodsModel::where(['is_up'=>1])->get();
        if($goods){
            $goods=$goods->toArray();
        }else{
            $goods=[];
        }
        return view('Goods.goodsList',['goods'=>$goods]);
    }
}