<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /*
     *登录信息
     */
    public function center(Request $request)
    {
        $uid=$request->input('uid');
        $info=DB::table('user')->where('user_id',$uid)->select('user_name')->first();
        $user_name=$info->user_name;

        $res=[
            'status'=>'200',
            'user_name'=>$user_name
        ];

        return json_encode($res);
    }
}
