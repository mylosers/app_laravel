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

    /**
     * 商品详情
     */
    public function goodsDetails(){
        $goods_id=$_GET['goods_id'];
        $goods=GoodsModel::where(['goods_id'=>$goods_id,'is_up'=>1])->first();
        if($goods){
            $goods=$goods->toArray();
        }else{
            $res=[
                'error'=>50001,
                'msg'=>'您访问的商品不存在，或以未上架'
            ];
            return json_encode($res,JSON_UNESCAPED_UNICODE);
        }
        return view('Goods.goodsDetails',['goods'=>$goods]);
    }
}