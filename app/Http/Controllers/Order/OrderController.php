<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Model\OrderModel;
/**
 * 订单控制器
 * Class OrderController
 * @package App\Http\Controllers\order
 */
class OrderController extends Controller
{
    /**
     * 生成订单
     */
    public function order(){
        $uid= $_POST['uid'];
        $cart_id=$_POST['cart_id'];
        $order_amout=$_POST['order_amout'];
        $order_sn=$this->order_sn();
        $data=[
            'order_sn'=>$order_sn,
            'user_id'=>$uid,
            'order_amount'=>$order_amout,
            'state'=>1,
            'add_time'=>time(),
        ];
        $data=OrderModel::insertGetId($data);
        if($data){
            $res=[
                'error'=>0,
                'msg'=>'生成订单成功',
                'oid'=>$data
            ];
        }else{
            $res=[
                'error'=>50004,
                'msg'=>'生成订单失败',
            ];
        }
        return json_encode($res,JSON_UNESCAPED_UNICODE);
    }

    /**
     * 生成订单号
     */
    public function order_sn(){
        //生成24位唯一订单号码，格式：YYYY-MMDD-HHII-SS-NNNN,NNNN-CC，其中：YYYY=年份，MM=月份，DD=日期，HH=24格式小时，II=分，SS=秒，NNNNNNNN=随机数，CC=检查码
        //订购日期
        $order_date = date('Y-m-d');
        //订单号码主体（YYYYMMDDHHIISSNNNNNNNN）
        $order_id_main = date('YmdHis') . rand(10000000,99999999);
        //订单号码主体长度
        $order_id_len = strlen($order_id_main);
        $order_id_sum = 0;

        for($i=0; $i<$order_id_len; $i++){
            $order_id_sum += (int)(substr($order_id_main,$i,1));
        }

        //唯一订单号码（YYYYMMDDHHIISSNNNNNNNNCC）
        $order_id = $order_id_main . str_pad((100 - $order_id_sum % 100) % 100,2,'0',STR_PAD_LEFT);
        return $order_id;
    }
}