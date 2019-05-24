<?php
namespace App\Http\Controllers\Cart;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController  extends Controller
{
    //加入购物车
    public function cart(Request $request)
    {
        $user_id =  $request->input("uid");
        $goods_id = $request->input("goods_id");
        $img = $request->input("img");

        if (!empty($user_id)) {
            $where = [
                "user_id" => $user_id,
                "goods_id" => $goods_id,
            ];
            $res = DB::table("carts")->where($where)->first();
            if ($res) {
                $a = $res->buy_number + 1;
                $upd = DB::table("carts")->where($where)->update(['buy_number' => $a]);
                if ($upd) {
                    $arr = [
                        'code' => 0,
                        'msg' => "加入购物车成功",
                    ];
                    return $arr;
                }
            } else {
                //TODO加入购物车
                $where = [
                    "goods_id" => $goods_id,
                ];
                $res = DB::table("goods")->where($where)->first();
                $data = [
                    "user_id" => $user_id,
                    "goods_id" => $goods_id,
                    "buy_number" => 1,
                    "goods_img" => $img,
                    "goods_name" => $res->goods_name,
                    "goods_price" => $res->goods_price,
                    "add_time" => time(),
                    "status" => 1,
                ];
                $arr = DB::table("carts")->insert($data);
                if ($arr) {
                    $response = [
                        "code" => 0,
                        "msg" => "加入购物车成功",
                    ];
                    return $response;
                } else {
                    $response = [
                        "code" => 1,
                        "msg" => "加入购物车失败",
                    ];
                    return $response;
                }
            }
        } else {
            $response = [
                "code" => 50001,
                "msg" => "未登录",
            ];
            return $response;
        }
    }
    //展示购物车列表
    public function cartlist(Request $request){
        $uid=$request->input('uid');
        $res = DB::table("carts")->where(["status"=>0,'user_id'=>$uid])->get();
        return view("Cart.cartlist",['res'=>$res]);
    }




}