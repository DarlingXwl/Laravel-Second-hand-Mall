@extends('Home.layout.home')
@section('content')
<?php
    $good[0] = '审核中';
    $good[1] = '在售';
    $good[2] = '已售出';

    $userstate[0] = '禁用';
    $userstate[1] = '普通';
    $userstate[2] = '已认证';

    $replace[2] = '不支持以物换物';
    $replace[1] = '支持以物换物';

?>
<style type="text/css" media="screen">
    .media-object{
        max-height: 50px;
        max-width:50px; 
    }
/*    .space{
        height: 10px;
    }*/
</style>
    <div class="shop-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-5">
                    <div class="product-zoom">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                <div class="pro-large-img">
                                    <img src="upload/goods//pic/{{$info[0] -> pic}}" alt="" />
                                    <a class="popup-link" href="upload/goods/pic/{{$info[0] -> pic}}">点击放大 <i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-7">
                    <div class="product-details">
                        <h2 class="pro-d-title">{{$info[0] -> name}}</h2>
                        <div class="pro-ref">
                            <p>
                                <label>地址： </label>
                                <span>{{$user[0] -> address}}</span>
                            </p>
                            <p>
                                <label>数量： </label>
                                <span>{{$info[0] -> num}}</span>
                            </p>

                        </div>
                        <div class="price-box">
                            <span class="price product-price">售价：{{$info[0] -> price}}</span>
                            <span class="old-price product-price">{{$info[0] -> oprice}}</span>
                        </div>
                        <div class="short-desc">
                            <p>{{$info[0] -> descr}}</p>
                        </div>
                        <div class="box-quantity">
                            <a href="/action?action=car_add&gid={{$info[0]->id}}"><button>加入购物车</button></a>
                            <a href="/addorder?gid={{$info[0]->id}}"><button>确认购买</button></a>
                        </div>
                        <div class="usefull_link_block">
                            <ul>
                                <li><a href="#"><i class="fa fa-user"></i>{{$info[0] -> uid}}</a></li>
                                <li><a href="#"><i class="fa fa-clock-o"></i>{{date('Y-m-d H:i:s',$info[0] -> addtime)}}</a></li>
                                <li><a href="#"><i class="fa fa-exchange"></i> {{$replace[$info[0] -> replace]}}</a></li>
                               
                            </ul>
                        </div>
                        <div class="share-icon">
@if(isset($user[0]))
@if(isset($user[0] -> phone))
                            <a class="phone1" href="tel:{{$user[0] -> phone}}"><i class="fa fa-phone"></i>  电话</a></a>  
@endif
@if(isset($user[0] -> email))
                            <a class="email" href="mailto:{{$user[0] -> email}}"><i class="fa fa-envelope"></i>  邮箱</a>
@endif
@endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pro-info-area ptb-80">
        <div class="container">
            <div class="pro-info-box">
                <ul class="pro-info-tab" role="tablist">
                    <li class="active"><a href="#home3" data-toggle="tab">留言信息</a></li>
                    <li><a href="#profile3" data-toggle="tab">其他信息</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home3">
                        <div class="pro-desc">
                               <div class="container">
                                    <div class="row">
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="contact-box text-center">
                                                <form id="contact" action="/action?action=message" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="gid" value="{{$info[0] -> id}}">
                                                    <div class="form-group row">
                                                        <div class="col-lg-6">
                                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email*" required="" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" id="message" name="content" rows="5" placeholder="留言内容*" required=""></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-default">添加留言</button>
                                                </form>
                                            </div>
                                            <br>
@if($message !== '')
@foreach($message as $v)
                                            <div class="col-md-12 column">
                                                    <blockquote>
                                                        <p>
                                                            {{$v -> message}}
                                                        </p> <small>留言邮箱：{{$v -> email}}</small><small>留言时间： {{$v -> time}}</small>
                                                    </blockquote>
                                            </div>
@endforeach
                                            <div class="content-sortpagibar">
                                                {{ $message->links() }}
                                            </div>

@endif                                           

                                        </div>
                                    </div>
                               </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile3">
                        <div class="pro-desc">
                            <table class="table-data-sheet">
                                <tbody>
                                    <tr class="odd">
                                        <td>所属分类</td>
                                        <td>{{$type[0] -> name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection