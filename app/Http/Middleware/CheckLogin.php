<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       $uid="<script type=text/javascript>document.write(uid)</script>";
//        $uid=$request->input('uid');
        //是否有uid
        if (empty($uid)){
            $arr=[
                'error'=>50003,
                'msg'=>'请先登录'
            ];
            echo json_encode($arr);exit;
        }else{
            //服务器登录状态
            $info=DB::table('user')->where('user_id',$uid)->first();
            $login_status=$info->login_status;
            if ($login_status==0){
                $arr=[
                    'error'=>50003,
                    'msg'=>'请先登录'
                ];
                echo json_encode($arr);die;
            }
        }
        return $next($request);
    }
}
?>
<script type="text/javascript" >
    var storage=window.localStorage;
    var uid=storage["uid"];
</script>

