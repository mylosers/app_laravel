@extends('layouts.app')

@section('title', '商品详情')

@section('sidebar')
@parent
@endsection

@section('body')
	
	<!-- shop single -->
	<div class="pages section">
		<div class="container">
			<div class="shop-single">
				<img src="{{$goods['goods_img']}}" >
				<input type="hidden" value="{{$goods['goods_img']}}" id="img">
				<h5>{{$goods['goods_name']}}</h5>
				<input type="hidden" value="{{$goods['goods_id']}}" id="goods_id">
				<div class="price">价格：{{$goods['goods_price']}} ——库存：{{$goods['goods_number']}}</div>
				<button type="button" class="btn button-default btn">添加到购物车</button>
			</div>
		</div>
	</div>
	<!-- end shop single -->
<script src="/js/jquery.min.js"></script>
<script>
	$(function(){
		$('.btn').click(function(){
			var storage=window.localStorage;
			var uid=storage["uid"];
			if(!uid){
				alert('请先登录');
				window.location.replace("/user/login");
			}
			var goods_id=$("#goods_id").val();
			var img=$("#img").val();
			$.ajax({
				url:'/cart',
				type:"post",
				data:{goods_id:goods_id,uid:uid,img:img},
				dataType:'json',
				success:function(msg){
					alert(msg.msg);
					if(msg.code==0){
						window.location.replace("/cartlist?uid="+uid);
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