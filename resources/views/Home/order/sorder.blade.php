
@extends('Home.layout.home')
@section('content')
<?php
    $state[1] = '交易中';
    $state[2] = '已完成';
    $state[3] = '等待修改';
    $state[4] = '订单已取消';

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
                                        <th class="product-thumbnail">时间</th>
                                        <th class="product-name">商品名称</th>
                                        <th class="product-price">成交价格</th>
                                        <th class="product-quantity">交易地点</th>
                                        <th class="product-subtotal">状态</th>
                                        <th class="product-remove">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
@if(!empty($order))
@foreach($order as $v)
                                    <tr>
                                        <td class="product-thumbnail">{{$v -> time}}</td>
                                        <td class="product-name"><a href="/goods?gid={{$v -> gid}}">{{$v -> name}}</a></td>
                                        <td class="product-price"><span class="amount">￥{{$v -> price}}</span></td>
                                        <td class="product-quantity">{{$v -> address}}</td>
                                        <td class="product-subtotal">{{$state[$v -> state]}}</td>
                                        <td class="product-remove">
@if($v -> state == 1)
                                            <a title='信息不一致？驳回！' href="/action?action=order_re&user=seller&id={{$v -> id}}"><i class="fa fa-times"></i></a>
@elseif($v -> state ==2)
                                            <a title='删除' href="/action?action=order_delete&user=seller&id={{$v -> id}}"><i class="fa fa-times"></i></a>
@elseif($v -> state ==3)
                                            等待买家修改信息
                                            <a title='强行取消订单' href="/action?action=order_cancel&id={{$v -> id}}"><i class="fa fa-times"></i></a>
@else
                                            已取消等待用户删除
@endif                           	                                      	
                                        </td>
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
                                <div class="cart_totals">
                                    <div class="wc-proceed-to-checkout">
                                        <a href="/seller">我的全部商品</a>
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