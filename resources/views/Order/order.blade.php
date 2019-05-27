@extends('layouts.app')

@section('title', '订单列表')

@section('sidebar')
@parent
@endsection

@section('body')

		<!-- checkout -->
		<div class="checkout pages section">
		<div class="container">
		<div class="pages-head">
			<h3>CHECKOUT</h3>
		</div>
		<div class="checkout-content">
			<div class="row">
				<div class="col s12">
					<ul class="collapsible" data-collapsible="accordion">
						<li>
							<div class="collapsible-header"><h5>订单列表</h5></div>
							@foreach($order as $k=>$v)
							<div class="collapsible-body">
								<div class="order-review">
									<div class="row">
										<div class="col s12">
											<div class="divider"></div>
											<div class="cart-details">
												<div class="col s5">
													<div class="cart-product">
														<h5>Name</h5>
													</div>
												</div>
												<div class="col s7">
													<div class="cart-product">
														{{$v['goods_name']}}
													</div>
												</div>
											</div>
											<div class="divider"></div>
											<div class="cart-details">
												<div class="col s5">
													<div class="cart-product">
														<h5>Quantity</h5>
													</div>
												</div>
												<div class="col s7">
													<div class="cart-product">
														<input type="text" value="{{$v['buy_number']}}">
													</div>
												</div>
											</div>
											<div class="divider"></div>
											<div class="cart-details">
												<div class="col s5">
													<div class="cart-product">
														<h5>Unit Price</h5>
													</div>
												</div>
												<div class="col s7">
													<div class="cart-product">
														<span>${{$v['order_amount']/$v['buy_number']}}</span>
													</div>
												</div>
											</div>
											<div class="cart-details">
												<div class="col s5">
													<div class="cart-product">
														<h5>Total Price</h5>
													</div>
												</div>
												<div class="col s7">
													<div class="cart-product">
														<span>${{$v['order_amount']}}</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="order-review final-price">
									<div class="row">
										<div class="col s12">
											<div class="cart-details">
												<div class="col s8">
													<div class="cart-product">
														<h5>Sub Total</h5>
													</div>
												</div>
												<div class="col s4">
													<div class="cart-product">
														<span>${{$v['order_amount']}}</span>
													</div>
												</div>
											</div>
											<div class="cart-details">
												<div class="col s8">
													<div class="cart-product">
														<h5>Total</h5>
													</div>
												</div>
												<div class="col s4">
													<div class="cart-product">
														<span>${{$v['order_amount']}}</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<a href="javascript:void(0)" class="btn button-default button-fullwidth">支付宝支付</a>
									<input type="hidden" value="{{$v['order_id']}}">
								</div>
							</div>
							@endforeach
						</li>
					</ul>
				</div>
			</div>
		</div>
		</div>
		</div>
		<!-- end checkout -->

<script src="/js/jquery-3.3.1.min.js"></script>
<script>
	$(function(){
		$(".btn").click(function(){
			var storage=window.localStorage;
			var uid=storage["uid"];
			var order_id=$(this).next().val();
				var ua = navigator.userAgent.toLowerCase();
				var mua = {
					IOS: /ipod|iphone|ipad/.test(ua), //iOS
					IPHONE: /iphone/.test(ua), //iPhone
					IPAD: /ipad/.test(ua), //iPad
					ANDROID: /android/.test(ua), //Android Device
					WINDOWS: /windows/.test(ua), //Windows Device
					TOUCH_DEVICE: ('ontouchstart' in window) || /touch/.test(ua), //Touch Device
					MOBILE: /mobile/.test(ua), //Mobile Device (iPad)
					ANDROID_TABLET: false, //Android Tablet
					WINDOWS_TABLET: false, //Windows Tablet
					TABLET: false, //Tablet (iPad, Android, Windows)
					SMART_PHONE: false //Smart Phone (iPhone, Android)
				};

				mua.ANDROID_TABLET = mua.ANDROID && !mua.MOBILE;
				mua.WINDOWS_TABLET = mua.WINDOWS && /tablet/.test(ua);
				mua.TABLET = mua.IPAD || mua.ANDROID_TABLET || mua.WINDOWS_TABLET;
				mua.SMART_PHONE = mua.MOBILE && !mua.TABLET;

			if(mua.WINDOWS==true||mua.WINDOWS==true||mua.ANDROID_TABLET==true||mua.WINDOWS_TABLET==true){
				//电脑端
				window.location.replace("pay/"+order_id);
			}else{
				//手机端

			}
		})
	})
</script>
@endsection


@section('bottom')
	@parent
@endsection