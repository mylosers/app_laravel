@extends('layouts.app')

@section('title', '登录')

@section('sidebar')
    @parent
@endsection

@section('body')

<!-- login -->
<div class="pages section">
    <div class="container">
        <div class="pages-head">
            <h3>LOGIN</h3>
        </div>
        <div class="login">
            <div class="row">
                <form class="col s12">
                    <div class="input-field">
                        <input id="user_name" type="text" class="validate" placeholder="USERNAME" required>
                    </div>
                    <div class="input-field">
                        <input id="user_pwd" type="password" class="validate" placeholder="PASSWORD" required>
                    </div>
                    <a href=""><h6>Forgot Password ?</h6></a>
                    <input type="button" id="btn" class="btn button-default" value="LOGIN">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end login -->

<script src="/js/jquery-3.3.1.min.js"></script>
<script>
    $(function (){
        $('#btn').click(function (){
            var user_name=$('#user_name').val();
            var user_pwd=$('#user_pwd').val();

//            console.log(user_pwd);
            $.ajax({
                url:'/user/logdo',
                data:{user_name:user_name,user_pwd:user_pwd},
                type:'post',
                dataType:'json',
                success:function (res){
                    if (res.status==0){
                        var storage=window.localStorage;
                        storage["uid"]=res.uid;
                        alert(res.code);
                        location.href="/";
                    }else
                    if(res.status==1){
                        alert(res.code)
                    }
                }
            });
        })
    })
</script>
@endsection


@section('bottom')
    @parent
@endsection