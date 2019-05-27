<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    //address页面
    public function address(Request $request){
        $uid=$request->input('uid');
        $res=DB::table('area')->where('pid',0)->select('id','name')->get()->toArray();

        return view('address.address',['res'=>$res]);
    }
    //获取towm
    public function town(Request $request){
        $id=$request->input('id');
        $info=DB::table('area')->where('pid',$id)->select('id','name')->get()->toArray();
        return ['data'=>$info];
    }
    //获取县区
    public function county(Request $request){
        $id=$request->input('id');
        $info=DB::table('area')->where('pid',$id)->select('name')->get()->toArray();
        return ['data'=>$info];
    }
    //收货地址入库
    public function addressadd(Request $request){
        $data=$request->input('data');

        $info=[
            'uid'=>$data['uid'],
            'user_name'=>$data['user'],
            'user_num'=>$data['phon'],
            'province'=>$data['shengid'],
            'town'=>$data['shiid'],
            'county'=>$data['xianid'],
            'address_details'=>$data['addre'],
        ];

        //入库
        $res=DB::table('address')->insert($info);
        if ($res){
            $arr=array(
                'status'=>200,
                'msg'=>'添加成功'
            );
            return json_encode($arr);
        }else{
            $arr=array(
                'status'=>300,
                'msg'=>'添加失败'
            );
            return json_encode($arr);
        }
    }
}
