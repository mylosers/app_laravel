<?php
namespace App\Http\Controllers\Cart;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CartModel;
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
        $res=CartModel::where(["status"=>1,'user_id'=>$uid])->get();
        $arr=$res->toArray();
        $total=$this->multi_array_sum($arr,'goods_price','buy_number');
        return view("Cart.cartlist",['res'=>$res,'total'=>$total]);
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