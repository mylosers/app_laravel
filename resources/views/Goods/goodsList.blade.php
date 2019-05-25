@extends('layouts.app')

@section('title', '商品列表')

@section('sidebar')
@parent
@endsection

@section('body')

	<!-- product -->
	<div class="section product product-list">
		<div class="container">
			<div class="pages-head">
				<h3>PRODUCT LIST</h3>
			</div>
			<div class="input-field">
				<select>
					<option value="">Popular</option>
					<option value="1">New Product</option>
					<option value="2">Best Sellers</option>
					<option value="3">Best Reviews</option>
					<option value="4">Low Price</option>
					<option value="5">High Price</option>
				</select>
			</div>
			@foreach($goods as $k=>$v)
				<div class="row">
					@for($k=1;$k<=2;$k++)
						<div class="col s6">
							<div class="content">
								<img src="{{$v['goods_img']}}">
								<h6><a href='/goodsDetails'>{{$v['goods_name']}}</a></h6>
								<div class="price">
									￥{{$v['goods_price']}}
								</div>
								<a href="/goodsDetails?goods_id={{$v['goods_id']}}"><button class="btn button-default">查看商品</button></a>
							</div>
						</div>
					@endfor
				</div>
			@endforeach
			<div class="pagination-product">
				<ul>
					<li class="active">1</li>
					<li><a href="">2</a></li>
					<li><a href="">3</a></li>
					<li><a href="">4</a></li>
					<li><a href="">5</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end product -->

@endsection


@section('bottom')
	@parent
@endsection