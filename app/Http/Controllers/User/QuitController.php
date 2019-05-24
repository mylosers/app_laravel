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
        $uid=$request->input('uid');
        DB::table('user')->where('user_id',$uid)->update(['login_status'=>0]);

        $arr=[
            'status'=>200,
            'code'=>'Exit the success'
        ];
        return json_encode($arr);
    }
}
