<html>
<head>
    <title> @yield('title')</title>
</head>
<body>
@section('sidebar')
    <!DOCTYPE html>
    <html lang="zxx">
    <head>
        <meta charset="UTF-8">
        <title>Mstore - Online Shop Mobile Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1 user-scalable=no">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="HandheldFriendly" content="True">

        <link rel="stylesheet" href="/css/materialize.css">
        <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/normalize.css">
        <link rel="stylesheet" href="/css/owl.carousel.css">
        <link rel="stylesheet" href="/css/owl.theme.css">
        <link rel="stylesheet" href="/css/owl.transitions.css">
        <link rel="stylesheet" href="/css/fakeLoader.css">
        <link rel="stylesheet" href="/css/animate.css">
        <link rel="stylesheet" href="/css/style.css">

        <link rel="shortcut icon" href="/img/favicon.png">

    </head>
    <body>
        <!-- navbar top -->
        <div class="navbar-top">
    <!-- site brand	 -->
    <div class="site-brand">
        <a href="index.html"><h1>Mstore</h1></a>
    </div>
    <!-- end site brand	 -->
    <div class="side-nav-panel-right">
        <a href="#" id="center" data-activates="slide-out-right" class="side-nav-left"><i class="fa fa-user"></i></a>
    </div>
</div>
        <!-- end navbar top -->

        <!-- side nav right-->
        <div class="side-nav-panel-right">
            <ul id="slide-out-right" class="side-nav side-nav-panel collapsible">
                <li class="profil">
                    <img src="/img/profile.jpg" alt="">
                    <h2 id="user_name">John Doe</h2>
                </li>
                <li><a class="aaa" href="setting.html"><i class="fa fa-cog"></i>Settings</a></li>
                <li><a class="aaa" href="about-us.html"><i class="fa fa-user"></i>About Us</a></li>
                <li><a class="aaa" href="contact.html"><i class="fa fa-envelope-o"></i>Contact Us</a></li>
                <li id="replace"><a href="/user/login"><i class="fa fa-sign-in"></i>Login</a></li>
                <li><a href="/user/reg"><i class="fa fa-user-plus"></i>Register</a></li>
            </ul>
        </div>
        <!-- end side nav right-->

        <!-- navbar bottom -->
        <div class="navbar-bottom">
            <div class="row">
                <div class="col s2">
                    <a href="/"><i class="fa fa-home"></i></a>
                </div>
                <div class="col s2">
                    <a href="wishlist.html"><i class="fa fa-heart"></i></a>
                </div>
                <div class="col s4">
                    <div class="bar-center">
                        <a href="#animatedModal" id="cart-menu"><i class="fa fa-shopping-basket"></i></a>
                        <span id="num"></span>
                    </div>
                </div>
                <div class="col s2">
                    <a href="contact.html"><i class="fa fa-envelope-o"></i></a>
                </div>
                <div class="col s2">
                    <a href="#animatedModal2" id="nav-menu"><i class="fa fa-bars"></i></a>
                </div>
            </div>
        </div>
        <!-- end navbar bottom -->

        <!-- menu -->
        <div class="menus" id="animatedModal2">
            <div class="close-animatedModal2 close-icon">
                <i class="fa fa-close"></i>
            </div>
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col s4">
                            <a href="/" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    首页
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="/goodsList" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                    商品列表
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="shop-single.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                    Single Shop
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <a href="wishlist.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-heart"></i>
                                    </div>
                                    Wishlist
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="/cartlist" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    购物车
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="checkout.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-credit-card"></i>
                                    </div>
                                    Checkout
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <a href="blog.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-bold"></i>
                                    </div>
                                    Blog
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="blog-single.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                    Blog Single
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="error404.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-hourglass-half"></i>
                                    </div>
                                    404
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <a href="testimonial.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-support"></i>
                                    </div>
                                    Testimonial
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="about-us.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    About Us
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="contact.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    Contact
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s4">
                            <a href="setting.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-cog"></i>
                                    </div>
                                    Settings
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="login.html" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-sign-in"></i>
                                    </div>
                                    Login
                                </div>
                            </a>
                        </div>
                        <div class="col s4">
                            <a href="/user/reg" class="button-link">
                                <div class="menu-link">
                                    <div class="icon">
                                        <i class="fa fa-user-plus"></i>
                                    </div>
                                    Register
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end menu -->

        <!-- cart menu -->
        <div class="menus" id="animatedModal">
            <div class="close-animatedModal close-icon">
                <i class="fa fa-close"></i>
            </div>
            <div class="modal-content">
                <div class="cart-menu">
                    <div class="container">
                        <div class="content" id="goods">
                                <div class="cart-1">
                                    <div class="row">
                                        <div class="col s5">
                                            <img src="">
                                        </div>
                                        <div class="col s7">
                                            <h5><a href=""></a></h5>
                                        </div>
                                    </div>
                                    <div class="row quantity">
                                        <div class="col s5">
                                            <h5>Quantity</h5>
                                        </div>
                                        <div class="col s7">
                                            <input value="" type="text">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s5">
                                            <h5>Price</h5>
                                        </div>
                                        <div class="col s7">
                                            <h5></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s5">
                                            <h5>Action</h5>
                                        </div>
                                        <div class="col s7">
                                            <div class="action"><i class="fa fa-trash"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                        </div>
                        <div class="total">
                            <div id="cart2">
                                <div class="row" >
                                    <div class="col s7">
                                        <h5></h5>
                                    </div>
                                    <div class="col s5">
                                        <h5></h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s7">
                                    <h6>Total</h6>
                                </div>
                                <div class="col s5">
                                    <h6 id="total">1</h6>
                                </div>
                            </div>
                        </div>
                        <button class="btn button-default">Process to Checkout</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end cart menu -->

@show

@section('body')

@show

@section('bottom')

        <!-- loader -->
        <div id="fakeLoader"></div>
        <!-- end loader -->

        <!-- footer -->
        <div class="footer">
            <div class="container">
                <div class="about-us-foot">
                    <h6>我靠这什么框架</h6>
                    <p>私はこのフレームワークに頼っているので使いにくい</p>
                </div>
                <div class="social-media">
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-google"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                    <a href=""><i class="fa fa-instagram"></i></a>
                </div>
                <div class="copyright">
                    <span>© 2019 lening 1809a 的项目</span>
                </div>
            </div>
        </div>
        <!-- end footer -->
<!-- scripts -->
<script src="/js/jquery.min.js"></script>
<script src="/js/materialize.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/fakeLoader.min.js"></script>
<script src="/js/animatedModal.min.js"></script>
<script src="/js/main.js"></script>

    <script>
        $(function(){
            var storage=window.localStorage;
            var uid=storage["uid"];
            $('#center').click(function (){
                $.ajax({
                    url:'/user/center',
                    data:{uid:uid},
                    type:"post",
                    dataType:'json',
                    success:function (res){
                        if(res.error==50003){
                            //未登录只显示login和register
                            $('.aaa').remove();

                        }else if(res.status==200){
                            var _a="";
                                _a +='<h2 id="user_name">'+res.user_name+'</h2>'
                            $('#user_name').html(_a);
                            var _li="";
                                _li +='<li id="quite">'
                                        +'<a id="replace">'
                                        +'<i class="fa fa-sign-in">'+'</i>'+'Quite'+'</a>'
                                    +'</li>'
                            $('#replace').html(_li);
                        }
                    }

                })
            });
            //退出
                $(document).on('click','#quite',function(){
                var storage=window.localStorage;
                var uid=storage["uid"];

                $.ajax({
                    url:'/user/quite',
                    data:{uid:uid},
                    type:"post",
                    dataType:'json',
                    success:function (res){
                        if (res.status==200){
                            alert(res.msg);
                            storage.removeItem('uid');
                            window.location.replace("/");
                        }else{
                            alert(res.msg);
                        }
                    }
                })
            })

            $.ajax({
                url:'/homeCart',
                type:"post",
                data:{uid:uid},
                dataType:'json',
                success:function(msg){
                    if(msg.error==0){
                        $("#total").html("$"+msg.total);
                        var str="";
                        var goods="";
                        $.each(msg.cart,function(i,v) {
                            str += '<div class="row">'
                                    + ' <div class="col s7">'
                                    + ' <h5>' + v.goods_name + '</h5>'
                                    + ' </div>'
                                    + ' <div class="col s5">'
                                    + ' <h5>$' + v.goods_price * v.buy_number+ '</h5>'
                                    + ' </div>'
                                    + ' </div>';

                            goods += '<div class="cart-1">'
                                    + '<div class="row">'
                                    + '<div class="col s5">'
                                    + '<img src=' + v.goods_img + ' alt="">'
                                    + '</div>'
                                    + '<div class="col s7">'
                                    + '<h5><a href="">' + v.goods_name + '</a></h5>'
                                    + '</div>'
                                    + '</div>'
                                    + '<div class="row quantity">'
                                    + '<div class="col s5">'
                                    + '<h5>Quantity</h5>'
                                    + '</div>'
                                    + '<div class="col s7">'
                                    + '<input value=' + v.buy_number + ' type="text">'
                                    + '</div>'
                                    + '</div>'
                                    + '<div class="row">'
                                    + '<div class="col s5">'
                                    + '<h5>Price</h5>'
                                    + '</div>'
                                    + '<div class="col s7">'
                                    + '<h5>$' + v.goods_price * v.buy_number + '</h5>'
                                    + '</div>'
                                    + '</div>'
                                    + '<div class="row">'
                                    + '<div class="col s5">'
                                    + '<h5>Action</h5>'
                                    + '</div>'
                                    + '<div class="col s7">'
                                    + '<div class="action"><i class="fa fa-trash"></i></div>'
                                    + '</div>'
                                    + '</div>'
                                    + '</div>'
                                    + '<div class="divider"></div>';
                        });
                        $("#cart2").html(str);
                        $("#goods").html(goods);
                        $("#num").html(msg.num);
                    }
                }
            });
        })
    </script>
</body>
</html>
@show
