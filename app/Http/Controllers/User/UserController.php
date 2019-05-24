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
        $info=DB::table('user')->select('user_name','user_email')->first();
        $user_name=$info->user_name;
        $user_email=$info->user_email;

        $data=[
            'user_name'=>$user_name,
            'user_email'=>$user_email
        ];

        return $data;
    }
}
