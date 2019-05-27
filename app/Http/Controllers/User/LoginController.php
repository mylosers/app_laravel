<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserModel;
use Illuminate\Support\Facades\DB;
use App\Model\WxuserModel;

class LoginController extends Controller
{
    /*
     * login页面
     */
    public function login()
    {
        return view('login.login');
    }
    /*
     * 登录
     * 修改状态 1 登录
     */
    public function logindo(Request $request)
    {
        //接数据
        $user_name=$request->input('user_name');
        $user_pwd=$request->input('user_pwd');
        //非空
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
        //验证用户
        $res=DB::table('user')->where('user_name',$user_name)->first();
        if ($res) {
            $user_name2=$res->user_name;
            //验证密码
            $user_pwd2=$res->user_pwd;
            if ($user_pwd2==md5($user_pwd)){
                //登录
                $uid=$res->user_id;
//                dd($uid);
                DB::table('user')->where('user_id',$uid)->update(['login_status'=>1]);
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

    /**
     * 微信登陆
     */
    public function wxlogin(){
        echo "<script type=text/javascript>document.write(data)</script>";die;
        $result=urlencode("http://vm.app.cn/wechat/code");
        $scode="snsapi_userinfo";
        $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxcaeeec85ae352cb3&redirect_uri=$result&response_type=code&scope=$scode&state=STATE#wechat_redirect";
        header("Location: $url");
    }

    /**
     * 微信登陆
     */
    public function code(Request $request){
        $arr=$request->input();
        $code=$arr['code'];
        $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxcaeeec85ae352cb3&secret=2bbdb2d2c1b65d97df6f719669a170cc&code=$code&grant_type=authorization_code";
        $info=file_get_contents($url);
        $arr=json_decode($info,true);
        $access_token=$arr['access_token'];
        $openid=$arr['openid'];
        $user_url="https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
        $data = json_decode(file_get_contents($user_url),true);
        $time=['add_time'=>time()];
        $add=array_merge($data,$time);
        $user=WxuserModel::where(['openid'=>$data['openid']])->first();
        if($user){

        }else{
            $wx_user=[
                'user_name'=>'',
                'user_pwd'=>'',
                'add_time'=>time(),
                'last_time'=>'',
                'user_email'=>'',
                'login_status'=>1
            ];
            $wx=UserModel::insertGetId($wx_user);
            $uid=['uid'=>$wx];
            $array=array_merge($add,$uid);
            $id=WxuserModel::insertGetId($array);
            if($id){

            }else{

            }
        }
    }
}
?>
<script type="text/javascript" >
    var data="call_me_why";
</script>

