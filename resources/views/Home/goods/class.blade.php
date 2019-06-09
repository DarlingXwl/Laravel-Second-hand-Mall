@extends('Home.layout.home')
@section('content')
<style type="text/css" media="screen">
    .type{
        color: ##ffae00;
    }
    .pro-large-img img {
        max-width: :100%;
        max-height: 444px; 
    }
</style>
    <div class="shop-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="column">
                        <h2 class="title-block">分类</h2>
                        <div class="sidebar-widget">
                            <h3 class="sidebar-title">全部</h3>
                            <ul class="sidebar-menu">
                                <li><a href="/class{{$url}}&orderby=new">新品</a></li>
                                <li><a href="/class{{$url}}&orderby=replace">以物换物</a></li>
                            </ul>
                        </div>

@foreach ($type as $values)
                        <div class="sidebar-widget">
@foreach ($values as $k => $v)
                        @if($k == 0)
                            <h3 class="sidebar-title">{{$v->name}}</h3>
                            <ul class="sidebar-menu">
                        @else
                            <li><a href="/class?tid={{$v->id}}" class="<?php if(isset($_GET['id'])&&$_GET['tid'] == $v -> id) echo 'type';?>">{{$v->name}}</a></li>
                        @endif
@endforeach
                            </ul>
                        </div>
@endforeach
                    </div>
                </div>

                <div class="col-md-9 col-sm-8">
                    <h2 class="page-heading mt-40">
                        <span class="cat-name">商品列表</span>
                    </h2>
                    <div class="shop-page-bar">
                        <div>
                            <div class="shop-bar">
                                <div class="selector-field f-left ml-20 hidden-xs">
                                    <form action="/class" method="get">
                                         {{ csrf_field() }}
                                        <label>排序</label>
                                        <input type="hidden" name="tid" value="{{$tid}}">
                                        <input type="hidden" name="orderby" value="{{$orderby}}">
                                        <input type="hidden" name="sort" value="{{$sort}}">
                                        <select name="sort" >
                                            <option value="">默认</option>
                                            <option value="desc">价格从高到低</option>
                                            <option value="asc">价格从低到高</option>
                                            <option value="new">最新发布</option>
                                        </select>
                                        <button class="compare">确认排序</button>
                                    </form>
                                </div>

                            </div>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="row">
@if($goods)
@foreach($goods as $v)
                                        <div class="col-md-4 col-sm-6">
                                            <div class="product-wrapper mb-40">
                                                <div class="product-img">
                                                    <a href="/goods?gid={{$v->id}}"><img src="upload/goods//pic/{{$v -> pic}}" alt="" /></a>
                                                </div>
                                                <div class="product-content">
                                                    <div class="pro-title">
                                                        <h3><a href="/goods?gid={{$v->id}}">{{$v -> name}}</a></h3>
                                                    </div>
                                                    <div class="price-reviews">
                                                        <div class="price-box">
                                                            <span class="price product-price">{{$v -> price}}</span>
                                                            <span class="old-price product-price">{{$v -> oprice}}</span>
                                                        </div>
                                                        <div class="pro-rating">
                                                            <a href="/goods?gid={{$v->id}}"><i class="fa fa-user">{{$v -> uid}}</i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
@endforeach
@else
                                        <div class="col-md-4 col-sm-6">
                                            该目录下没有东西
                                        </div>
@endif
                                

                                    </div>
                                </div>
                                <div class="content-sortpagibar">
                                    {{ $page->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection