@extends('layouts.app')

@section('title', '注册')

@section('sidebar')
    @parent
@endsection

@section('body')

<!-- register -->
<div class="pages section">
    <div class="container">
        <div class="pages-head">
            <h3>REGISTER</h3>
        </div>
        <div class="register">
            <div class="row">
                <form class="col s12">
                    <div class="input-field">
                        <input type="text" class="validate" id="user_name" placeholder="NAME" required>
                    </div>
                    <div class="input-field">
                        <input type="email" placeholder="EMAIL" id="user_email" class="validate" required>
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="PASSWORD" id="user_pwd" class="validate" required>
                    </div>
                    <input type="button" value="REGISTER" class="btn button-default" id="btn">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end register -->

<script src="/js/jquery-3.3.1.min.js"></script>

<script>
    $(function (){
        $('#btn').click(function (){
            var user_name=$('#user_name').val();
            var user_email=$('#user_email').val();
            var user_pwd=$('#user_pwd').val();

            $.ajax({
                url:'/user/regAdd',
                data:{user_name:user_name,user_email:user_email,user_pwd:user_pwd},
                type:'post',
                dataType:'json',
                success:function (res){
                    if (res.status==0){
                        alert(res.code);
                        location.href="/user/login";
                    }else
                        if(res.status==1){
                        alert(res.code)
                        }
                }
            })
        })
    })
</script>

@endsection


@section('bottom')
    @parent
@endsection