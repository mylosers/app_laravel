<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserModel;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    //register页面
    public function reg()
    {
        return view('register.reg');
    }
    //数据入库
    public function regAdd(Request $request)
    {
        //接值
        $user_name=$request->input('user_name');
        $user_pwd=$request->input('user_pwd');
        $user_email=$request->input('user_email');
        //验证用户
        if (empty($user_name)){
            $arr=array(
                'status'=>1,
                'code'=>'The user cannot be empty'
            );

            return json_encode($arr);
        }
        //验证邮箱
        if(empty($user_email)){
            $arr=array(
                'status'=>1,
                'code'=>'The email cannot be empty'
            );

            return json_encode($arr);
        }
        //验证密码
        if (empty($user_pwd)){
            $arr=array(
                'status'=>1,
                'code'=>'The password cannot be empty'
            );

            return json_encode($arr);
        }
        $res=DB::table('user')->where('user_name',$user_name)->first();
        if (empty($res)){
            $data=[
                'user_name'=>$user_name,
                'user_email'=>$user_email,
                'user_pwd'=>md5($user_pwd),
                'add_time'=>time(),
                'last_time'=>time(),
                'login_status'=>0
            ];
            $user_id=UserModel::insertGetId($data);
            if($user_id){
                $arr=array(
                    'status'=>0,
                    'code'=>'registered successfully'
                );

                echo json_encode($arr);
            }else{
                $arr=array(
                    'status'=>1,
                    'code'=>'fail to register'
                );
                echo json_encode($arr);
            }
        }else{
            $user_name2=$res->user_name;
            if ($user_name2==$user_name){
                $arr=array(
                    'status'=>1,
                    'code'=>'The user name already exists'
                );
                return json_encode($arr);

            }
        }

    }
}
