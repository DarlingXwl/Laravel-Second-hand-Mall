@extends('Home.layout.home')
@section('content')
		<!-- 轮换 -->
	<div class="slider-container">
		<div id="mainSlider" class="nivoSlider slider-image">
			<img src="img/slider/1.jpg" alt="" title="#htmlcaption1">
			<img src="img/slider/2.jpg" alt="" title="#htmlcaption2">
		</div>
		<div id="htmlcaption1" class="nivo-html-caption slider-caption-1">
			<div class="container">
				<div class="slide1-text">
					<div class="middle-text">
						<div class="cap-dec cap-1 wow bounceInRight" data-wow-duration="0.9s" data-wow-delay="0s">
							<h2>O2O二手模式</h2>
						</div>
						<div class="cap-dec cap-2 wow bounceInRight" data-wow-duration="1.2s" data-wow-delay="0.2s">
							<h2>面对面快速交易</h2>
						</div>
						<div class="cap-text wow bounceInRight" data-wow-duration="1.2s" data-wow-delay="0.3s">
							咸鱼也有大作用！
						</div>
						<div class="cap-readmore wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
							<a href="#">更多信息</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="htmlcaption2" class="nivo-html-caption slider-caption-2">
			<div class="container">
				<div class="slide1-text">
					<div class="middle-text">
						<div class="cap-dec cap-1 wow bounceInRight" data-wow-duration="0.9s" data-wow-delay="0s">
							<h2>以物换物</h2>
						</div>
						<div class="cap-dec cap-2 wow bounceInRight" data-wow-duration="1.2s" data-wow-delay="0.2s">
							<h2>物不等价情无价</h2>
						</div>
						<div class="cap-text wow bounceInRight" data-wow-duration="1.2s" data-wow-delay="0.3s">
							什么都一样，永远还是别人的好
						</div>
						<div class="cap-readmore wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
							<a href="#">查看详情</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<!-- 轮换结束 -->

			<!-- 首页商品列表 -->
	<div class="new-arrival-area pt-100">
		<div class="container">
			<div class="row">
				<div class="section-title text-center mb-20">
					<h2>最新上架</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="product-tab">
						<!-- 首页分类 -->
						<ul class="custom-tab text-center mb-40">
							<li class="active"><a href="#home" data-toggle="tab">最新</a></li>
							<li><a href="#profile" data-toggle="tab">手机</a></li>
							<li><a href="#messages" data-toggle="tab">电脑配件</a></li>
							<li><a href="#settings" data-toggle="tab">以物换物</a></li>
						</ul>
						<!-- 商品信息 -->
						<div class="row">
							<div class="tab-content">
								<div class="tab-pane active" id="home">
									<div class="product-carousel">

											<!-- 新商品列表 -->
@if($index['new'] != '')
@foreach ($index['new'] as $v)
										<div class="col-md-12">
											<div class="product-wrapper mb-40 ">
												<div class="product-img">
													<a href="/goods?gid={{$v->id}}"><img src="upload/goods//pic/{{$v -> pic}}" alt="" /></a>
												</div>
												<div class="product-content">
													<div class="pro-title">
														<h3><a href="/goods?gid={{$v->id}}">{{$v -> name}}</a></h3>
													</div>
													<div class="price-reviews">
														<div class="price-box">
															<span class="price product-price">￥{{$v -> price}}</span>
															<span class="old-price product-price">￥{{$v -> oprice}}</span>
														</div>
														<div class="pro-rating">
															<a href="/goods?gid={{$v->id}}"><i class="fa fa-star-o">{{$v -> uid}}</i></a>
														</div>
													</div>
												</div>
											</div>
										</div>
@endforeach
@endif

									</div>
								</div>
								<div class="tab-pane" id="profile">
									<div class="product-carousel">
										<!-- 手机列表 -->
@if($index['phone'] != '')
@foreach ($index['phone'] as $v)
										<div class="col-md-12">
											<div class="product-wrapper mb-40 ">
												<div class="product-img">
													<a href="/goods?gid={{$v->id}}"><img src="upload/goods//pic/{{$v -> pic}}" alt="" /></a>
													<span class="new-label">新上架</span>
												</div>
												<div class="product-content">
													<div class="pro-title">
														<h3><a href="/goods?gid={{$v->id}}">{{$v -> name}}</a></h3>
													</div>
													<div class="price-reviews">
														<div class="price-box">
															<span class="price product-price">￥{{$v -> price}}</span>
															<span class="old-price product-price">￥{{$v -> oprice}}</span>
														</div>
														<div class="pro-rating">
															<a href="/goods?gid={{$v->id}}"><i class="fa fa-star-o">{{$v -> uid}}</i></a>
														</div>
													</div>
												</div>
											</div>
										</div>
@endforeach
@endif
									</div>
								</div>
								<div class="tab-pane" id="messages">
									<div class="product-carousel">

@if($index['computer'] != '')
@foreach ($index['computer'] as $v)
										<div class="col-md-12">
											<div class="product-wrapper mb-40 ">
												<div class="product-img">
													<a href="/goods?gid={{$v->id}}"><img src="upload/goods//pic/{{$v -> pic}}" alt="" /></a>
												</div>
												<div class="product-content">
													<div class="pro-title">
														<h3><a href="/goods?gid={{$v->id}}">{{$v -> name}}</a></h3>
													</div>
													<div class="price-reviews">
														<div class="price-box">
															<span class="price product-price">￥{{$v -> price}}</span>
															<span class="old-price product-price">￥{{$v -> oprice}}</span>
														</div>
														<div class="pro-rating">
															<a href="/goods?gid={{$v->id}}"><i class="fa fa-star-o">{{$v -> uid}}</i></a>
														</div>
													</div>
												</div>
											</div>
										</div>
@endforeach
@endif
									</div>
								</div>
								<div class="tab-pane" id="settings">
									<div class="product-carousel">
@if($index['replace'])
@foreach ($index['replace'] as $v)
										<div class="col-md-12">
											<div class="product-wrapper mb-40 ">
												<div class="product-img">
													<a href="/goods?gid={{$v->id}}"><img src="upload/goods//pic/{{$v -> pic}}" alt="" /></a>
												</div>
												<div class="product-content">
													<div class="pro-title">
														<h3><a href="/goods?gid={{$v->id}}">{{$v -> name}}</a></h3>
													</div>
													<div class="price-reviews">
														<div class="price-box">
															<span class="price product-price">￥{{$v -> price}}</span>
															<span class="old-price product-price">￥{{$v -> oprice}}</span>
														</div>
														<div class="pro-rating">
															<a href="/goods?gid={{$v->id}}"><i class="fa fa-star-o">{{$v -> uid}}</i></a>
														</div>
													</div>
												</div>
											</div>
										</div>
@endforeach
@endif
									</div>
								</div>
								<div class="tab-pane" id="new">
									<div class="product-carousel">

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
			<!-- 首页商品列表结束 -->
	<div class="best-sell-area pt-30">
		<div class="container">
			<div class="row">
				<div class="section-title text-center mb-50">
					<h2>欢迎新用户加入乐优达 </h2>
				</div>
			</div>
			<div class="row">
				<div class="product-carousel">
@foreach ($user as $v)
					<div class="col-md-12">
						<div class="product-wrapper mb-40 ">
								<center>
									<h2>{{$v -> username}}</h2>
									<img height="" width="333" src="img/logo/logo.png">
									<span>{{date('Y-m-d H:i:s',$v -> addtime)}}</span>
								</center>
						</div>
					</div>
@endforeach

				</div>
			</div>
		</div>
	</div>

	<div id="input">
		<span id="input1" display=''>sdsad</span>
		<input id="input2" type="text" name="user" value="sdsad">	
	</div>
	<button type="" id="btn">测试</button>
@endsection