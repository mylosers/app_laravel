<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class QuitController extends Controller
{
    /*
     * 退出
     * 删除 uid
     * 修改状态 0 未登录
     */
    public function quit(Request $request)
    {
        $uid=$_POST['uid'];
        $res=DB::table('user')->where('user_id',$uid)->update(['login_status'=>0]);
        if ($res){
            $arr=[
                'status'=>200,
                'msg'=>'Exit the success'
            ];
            return json_encode($arr);
        }else{
            $arr=[
                'status'=>2001,
                'msg'=>'Opt out failed. Try later.'
            ];
            return json_encode($arr);
        }

    }
}
