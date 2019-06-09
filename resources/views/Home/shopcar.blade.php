@extends('Home.layout.home')
@section('content')
<?php
    $good[0] = '审核中';
    $good[1] = '在售';
    $good[2] = '已售出';
    $good[3] = '商品已下架';

    $userstate[0] = '禁用';
    $userstate[1] = '普通';
    $userstate[2] = '已认证';

    $replace[2] = '不支持以物换物';
    $replace[1] = '支持以物换物';

?>
    <div class="cart-main-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">图片</th>
                                        <th class="product-name">名称</th>
                                        <th class="product-price">价格</th>
                                        <th class="product-quantity">用户</th>
                                        <th class="product-subtotal">状态</th>
                                        <th class="product-remove">删除</th>
                                    </tr>
                                </thead>
                                <tbody>
@if(!empty($shopcar))
@foreach($shopcar as $v)
                                    <tr>
                                        <td class="product-thumbnail"><a href="/goods?gid={{$v -> id}}"><img src="upload/goods/pic/{{$v -> pic}}" alt="" /></a></td>
                                        <td class="product-name"><a href="#">{{$v -> name}}</a></td>
                                        <td class="product-price"><span class="amount">￥{{$v -> price}}</span></td>
                                        <td class="product-quantity">{{$v ->uid}}</td>
                                        <td class="product-subtotal">{{$good[$v -> state]}}</td>
                                        <td class="product-remove"><a href="/action?action=car_delete&gid={{$v -> id}}"><i class="fa fa-times"></i></a></td>
                                    </tr>
@endforeach
@else
                                    <tr><td colspan="6" rowspan="" headers="">空空如也</td></tr>
@endif
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-sm-7 col-xs-12">
                            </div>
                            <div class="col-md-4 col-sm-5 col-xs-12">
                                    <div class="wc-proceed-to-checkout">
                                        <a href="/class">添加更多商品</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection