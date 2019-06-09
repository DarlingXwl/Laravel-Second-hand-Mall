<?php
    $good[0] = '审核中';
    $good[1] = '在售';
    $good[2] = '已售出';

    $user[0] = '禁用';
    $user[1] = '普通';
    $user[2] = '已认证';

    $replace[2] = '不支持以物换物';
    $replace[1] = '支持以物换物';

?>
<!doctype html>
<html class="no-js" lang="zh">

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>{{$title}}</title>
<meta name="description" content="二手市场，二手商城，二手交易，二手手机">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="img/logo/favicon.ico">


<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/core.css">
<link rel="stylesheet" href="css/custom/custom.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/custom.css">

<script src="js/vendor/modernizr-2.8.3.min.js"></script>
<style type="text/css">
    .logo{
        display: {{$logo}};
    }
    .logged{
        display:{{$logged}};
    }
    .nologged{
        display: {{$nologged}};
    }
</style>
</head>

<body>
    <!-- 导航 -->

    <header class="header-pos">
        <div class="header-area header-middle">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 col-sm-3 col-xs-12">
                        <div class="logo">
                            <a href="/"><img height="30" src="img/logo/logo.png" alt="二手市场，二手商城，二手交易，二手手机" />乐优达</a>
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-9 col-xs-12 text-right xs-center">
                        <div class="main-menu display-inline hidden-sm hidden-xs">
                            <nav>
                                <ul>
                                    <li><a href="/">首页</a></li>
                                    <li><a href="/class?orderby=new">新鲜上架</a></li>
                                    <li><a href="/class">分类浏览</a></li>
                                    <li><a href="/helper">帮助</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="search-block-top display-inline">
                            <div class="icon-search"></div>
                            <div class="toogle-content">
                                <form action="/class" id="searchbox">
                                    <input name='search' type="text" placeholder="输入商品关键字或地址" />
                                    <button class="button-search"></button>
                                </form>
                            </div>
                        </div>
                        <div class="logged shopping-cart ml-20 display-inline">
                            <a href="/shopcar"><b>购物车</b> </a>
                            <ul>
@if(!empty($shopcar))
@foreach($shopcar as $v)
                                <li>
                                    <div class="cart-img">
                                        <center><a href="/goods?gid={{$v -> id}}"><img width="30%" src="upload/goods/pic/{{$v -> pic}}" alt="" /></a></center>
                                    </div>
                                    <div class="cart-content">
                                        <h3><a href="/goods?gid={{$v -> id}}">{{$v -> name}}</a> </h3>
                                        <span><b>卖家:</b>{{$v -> uid}}</span>
                                        <span class="cart-price"><b>价格:</b>{{$v -> price}}</span>
                                    </div>
                                    <div class="cart-del">
                                        <a href="/action?action=car_delete&gid={{$v -> id}}"><i class="fa fa-times-circle"></i></a>
                                    </div>
                                </li>
@endforeach
@else
                                <li>
                                    <div class="cart-content">
                                        <span><b>空空如也</b></span>
                                    </div>
                                </li>
@endif

                                <li class="checkout m-0"><a href="/shopcar">管理 <i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                        <div class="setting-menu display-inline">
                            <div class="logged icon-nav current"></div>
                            <div class="nologged current"> <a href="/login">登陆</a> / <a href="/register">注册</a> </div>
                            <ul class="content-nav toogle-content">
                                <li class="currencies-block-top">
                                    <div class="current"><b>个人中心</b></div>
                                    <ul>
                                        <li><a href="/member"><a href="/member">个人信息</a></a></li>
                                        <li><a href="/shopcar"><a href="/shopcar">我的购物车</a></a></li>
                                    </ul>
                                </li>
                                <li class="currencies-block-top">
                                    <div class="current"><b>交易管理</b></div>
                                    <ul>
                                        <li><a href="/order">订单信息</a></li>
                                        <li><a href="#">我是商家</a></li>
                                    </ul>
                                </li>
                                <li class="currencies-block-top">
                                    <div class="/member"><b>其他信息</b></div>
                                    <ul>
                                        <li><a href="#">安全验证</a></li>
                                        <li><a href="#">修改密码</a></li>
                                        <li><a href="/login">退出登录</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu-area visible-sm visible-xs">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul>
                                    <li><a href="/">首页</a></li>
                                    <li><a href="/class?orderby=new">新品</a></li>
                                    <li><a href="/class">分类</a></li>
                                    <li><a href="/member">个人中心</a></li>
                                    <li><a href="/helper">帮助</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
        <!-- 导航结束 -->

        <!-- 继承 -->
@yield('content')
        <!-- 继承结束 -->

        <!-- 尾部信息 -->
    <link rel="stylesheet" type="text/css" href="css/custom/footer.css">
    <div class="service-area pt-70 pb-40 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-service mb-30">
                        <div class="service-title">
                            <h3>选购/上架　＞</h3>
                            <p>人人都是商家</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-service mb-30">
                        <div class="service-title">
                            <h3>确认地址　＞</h3>
                            <p>附近的人，可能盯着你</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-service mb-30 sm-mrg">
                        <div class="service-title">
                            <h3>面对面交易　＞</h3>
                            <p>见面有风险，不要一个人</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-service mb-30 xs-mrg sm-mrg">
                        <div class="service-title">
                            <h3>交易完成</h3>
                            <p>确认订单</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <!-- footer start -->
    <footer class="black-bg">
        <div class="footer-top-area ptb-60">
            <div class="container">
                <div class="row">
                    <div class="footer-widget">
                        <center>
                            <h3 class="footer-title">乐优达O2O二手商城</h3>
                            <ul>
                                <li>17820340478</li>
                                <li>darlingxwl@gmaiol.com</li>
                                <li>毕业设计 By Darling You</li>
                            </ul>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <!-- jquery latest version -->
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- ajax-mail js -->
    <script src="js/ajax-mail.js"></script>
    <!-- owl.carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- jquery.nivo.slider js -->
    <script src="js/jquery.nivo.slider.pack.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="js/main.js"></script>
	<script src="js/ajax.js"></script>
</body>
</html>