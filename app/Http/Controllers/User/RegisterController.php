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
//        $a=DB::table('user')->get();
//        $a=UserModel::where(['user_id'=>1])->first();
//        dd($a);
        $user_name=$request->input('user_name');
        $res=DB::table('user')->where('user_name',$user_name)->first();
        if (empty($res)){
            $data=[
                'user_name'=>$user_name,
                'user_email'=>$request->input('user_email'),
                'user_pwd'=>md5($request->input('user_pwd')),
                'add_time'=>time(),
                'last_time'=>time()
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
