

@extends('Home.layout.home')
@section('content')
<?php
    $state[1] = '交易中';
    $state[2] = '已完成';
    $state[3] = '商家驳回，请重新核对信息';
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
                                            <a title='取消' href="/action?action=order_cancel&user=user&id={{$v -> id}}"><i class="fa fa-times"></i></a>
                                            <a title='确认完成交易' href="/action?action=order_complete&user=user&id={{$v -> id}}"><i class="fa fa-check-circle-o"></i></a>
@elseif($v -> state ==2 || $v -> state == 4)
                                            <a title='删除' href="/action?action=order_delete&user=user&id={{$v -> id}}"><i class="fa fa-times"></i></a>
@else
                                            <a title='取消' href="/action?action=order_delete$user=user&id={{$v -> id}}"><i class="fa fa-times"></i></a>
                                            <a title="商品信息不正确，已被驳回，点击修改" href="/changeorder?gid={{$v -> gid}}&id={{$v -> id}}"><i class="fa fa-wrench"></i></a>                                       
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
                                        <a href="/class">购买更多商品</a>
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