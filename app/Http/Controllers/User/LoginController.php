<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserModel;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }
    public function logindo(Request $request)
    {
        $user_name=$request->input('user_name');
        $user_pwd=$request->input('user_pwd');
        if (empty($user_name))
        {
            $arr=array(
                'status'=>1,
                'code'=>'The account cannot be empty'
            );
            return json_encode($arr);
        }
        if (empty($user_pwd))
        {
            $arr=array(
                'status'=>1,
                'code'=>'The password cannot be empty'
            );
            return json_encode($arr);
        }
        $res=DB::table('user')->where('user_name',$user_name)->first();
        $user_name2=$res->user_name;
        if ($user_name2==$user_name) {
            $user_pwd2=$res->user_pwd;
            if ($user_pwd2==md5($user_pwd)){
                $arr=array(
                    'status'=>0,
                    'code'=>'login successfully ',
                    'uid'=>$res->user_id
                );
                return json_encode($arr);
            }else{
                $arr=array(
                    'status'=>1,
                    'code'=>'wrong password'
                );
                return json_encode($arr);
            }
        }else{
            $arr=array(
                'status'=>1,
                'code'=>'There is no such user'
            );
            return json_encode($arr);
        }
    }
}
