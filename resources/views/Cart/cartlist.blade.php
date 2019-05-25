@extends('layouts.app')

@section('title', '购物车列表')

@section('sidebar')
@parent
@endsection

@section('body')
        <!-- cart -->
    <div class="cart section">
    <div class="container">
        <div class="pages-head">
            <h3>CART</h3>
        </div>
        <div class="content">
            @foreach($res as $k=>$v)
            <div class="cart-1">
                <div class="row">
                    <div class="col s5">
                        <h5>Image</h5>
                    </div>
                    <div class="col s7">
                        <img src="{{$v->goods_img}}" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col s5">
                        <h5>Name</h5>
                    </div>
                    <div class="col s7">
                        <h5><a href="">{{$v->goods_name}}</a></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s5">
                        <h5>Quantity</h5>
                    </div>
                    <div class="col s7">
                        <input value="{{$v->buy_number}}" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="col s5">
                        <h5>Price</h5>
                    </div>
                    <div class="col s7">
                        <h5>${{$v->goods_price*$v->buy_number}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s5">
                        <h5>Action</h5>
                    </div>
                    <div class="col s7">
                        <h5><i class="fa fa-trash"></i></h5>
                    </div>
                </div>
            </div>
            <div class="divider"></div>
                <button class="btn button-default">提交订单</button>
                <input type="hidden" value="{{$v->cart_id}}">
                <input type="hidden" value="{{$v->goods_price*$v->buy_number}}">
                <div class="divider"></div>
            @endforeach
        </div>
        <div class="total">
            @foreach($res as $k=>$v)
            <div class="row">
                <div class="col s7">
                    <h5>{{$v->goods_name}}</h5>
                </div>
                <div class="col s5">
                    <h5>${{$v->goods_price*$v->buy_number}}</h5>
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="col s7">
                    <h6>Total</h6>
                </div>
                <div class="col s5">
                    <h6>${{$total}}</h6>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- end cart -->
<script src="/js/jquery-3.3.1.min.js"></script>
<script>
    $(function(){
        $('.btn').click(function(){
            var cart_id=$(this).next().val();
            var order_amout=$(this).next().next().val();
            var storage=window.localStorage;
            var uid=storage["uid"];
            $.ajax({
                url:'/order',
                type:"post",
                data:{cart_id:cart_id,uid:uid,order_amout:order_amout},
                dataType:'json',
                success:function(msg){
                    alert(msg.msg);
                    if(msg.error==0){
                        window.location.replace("/orderList?uid="+uid);
                    }
                }
            });
        })
    });
</script>

@endsection


@section('bottom')
    @parent
@endsection
