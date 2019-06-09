@extends('Home.layout.home')
@section('content')
    <div class="usercenter container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <ul class="nav nav-tabs">
                    <li >
                        <a >添加订单</a>
                    </li>
                </ul>
                <div class="change">
                    <form class="form-horizontal" action="/action" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="state" value="1">
                        <input type="hidden" name="action" value="addorder">
                        <input type="hidden" name="sid" value="{{$info[0] -> uid}}">    
                        <input type="hidden" name="gid" value="{{$info[0] -> id}}">
                        <input type="hidden" name="num" value="{{$info[0] -> num}}">
                        <input type="hidden" name="name" value="{{$info[0] -> name}}">
                        <br><br>
                        

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">
                            商品名称
                            </label>
                            <div class="col-sm-10">
                                <a href="/goods?gid={{$info[0] -> id}}"><b>{{$info[0] -> name}}</b></a>
                          </div>
                        </div>

                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">
                            商品图片：
                        </label>
                            <div class="col-sm-10">
                                <img height="50" src="/upload/goods/pic/{{$info[0] -> pic}}" alt="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label   class="col-sm-2 control-label">数量：</label>
                            <div class="col-sm-10">
                            <b>{{$info[0] -> num}}</b>
                        </div>
                        </div>

                        <div class="form-group">
                            <label required  class="col-sm-2 control-label">商品简介</label>
                            <div class="col-sm-10">
                                <b>{{$info[0] -> descr}}</b>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">成交价格</label>
                            <div class="col-sm-10">
                            <input type="text" name="pirce" required="" placeholder="以物换物填写0">
                            </div>
                        </div>
                        
                        

                        <div class="form-group">
                            <label required  class="col-sm-2 control-label" placeholder="请填写详细的交易地点">交易地点</label>
                            <div class="col-sm-10">
                            <textarea name="address" required=""></textarea>
                        </div>
                        </div>  
                        <center>
                            <button type="submit" class="btn btn-default center"> 确认订单</button>
                        </center>
                        
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection