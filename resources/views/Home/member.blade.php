@extends('Home.layout.home')
@section('content')
<?php
    $good[0] = '审核中';
    $good[1] = '在售';
    $good[2] = '已售出';

    $user[0] = '禁用';
    $user[1] = '普通';
    $user[2] = '已认证';

    $replace[2] = '不支持以物换物';
    $replace[1] = '支持以物换物';

    $sex [1] = '男';
    $sex [2] = '女';
    $sex [3] = '保密';

    $selected[1] = '';
    $selected[2] = '';
    $selected[3] = '';
    if(!empty($info)){
        $selected[$info[0] -> sex] ='selected';
    }
    
?>
<style type="text/css" media="screen">
    .member{
        display: {{$member[0]}};
    }
    .change{
        display: {{$change[0]}};
    }
</style>
    <div class="usercenter container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <ul class="nav nav-tabs">
                    <li class="{{$member[1]}}">
                        <a href="/member">信息</a>
                    </li>
                    <li class="{{$change[1]}}">
                        <a href="/member?page=change">修改资料</a>
                    </li>
                    <li class="dropdown pull-right">
                         <a href="#" data-toggle="dropdown" class="dropdown-toggle">更多<strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/shopcar">我的购物车</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <div class="panel panel-info member">
                    <div class="headerpic">
                        <img height="50" src="/upload/header/{{$info[0] -> pic}}">
                    </div>

                    <div class="panel-heading">
                        <h3 class="panel-title">用户id：</h3>
                    </div>
                    <div class="panel-body">{{$info[0] -> uid}}</div>

                    <div class="panel-heading">
                        <h3 class="panel-title">真实姓名：</h3>
                    </div>
                    <div class="panel-body">{{$info[0] -> name}}</div>

                    <div class="panel-heading">
                        <h3 class="panel-title">性别：</h3>
                    </div>
                    <div class="panel-body">{{$sex[$info[0] -> sex]}}</div>

                    <div class="panel-heading">
                        <h3 class="panel-title">生日：</h3>
                    </div>
                    <div class="panel-body">{{$info[0] -> age}}</div>

                    <div class="panel-heading">
                        <h3 class="panel-title">手机：</h3>
                    </div>
                    <div class="panel-body">{{$info[0] -> phone}}</div>
                    <div class="panel-heading">
                        <h3 class="panel-title">邮箱：</h3>
                    </div>
                    <div class="panel-body">{{$info[0] -> email}}</div>
                </div>



                <dl class="change">
                    <form class="form-horizontal" role="form" action="/action?action=change" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}<input type="hidden" name="uid" value="{{$info[0] -> uid}}">


                        <div class="form-group">
                            <label for="fisrtname" class="col-sm-2 control-label">用户id：</label>
                            <div class="col-sm-10">
                               <input required="" type="text" class="form-control" id="lastname" placeholder="{{$info[0] -> uid}}" disabled>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">用户头像：</label>
                            <div class="col-sm-10">
                                <img height="50" src="/upload/header/{{$info[0] -> pic}}">
                               <input name="pic" type="file" class="form-control" id="lastname" src="/upload/header/{{$info[0] -> pic}}">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">真实姓名：</label>
                            <div class="col-sm-10">
                               <input required="" type="text" name="name" value="{{$info[0] -> name}}" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">性别：</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="sex" id="">
                                    <option value="1" {{$selected[1]}}>男</option>
                                    <option value="2" {{$selected[2]}}>女</option>
                                    <option value="3" {{$selected[3]}}>保密</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">生日：</label>
                            <div class="col-sm-10">
                               <input required="" name="age" type="date" value="{{$info[0] -> age}}" class="form-control" >
                            </div>
                        </div>

                        
                         <div class="form-group">
                            <label  class="col-sm-2 control-label">手机：</label>
                            <div class="col-sm-10">
                            <input required="" type="tel" name="phone" value="{{$info[0] -> phone}}" class="form-control" >
                        
                            </div>
                        </div>

                         <div class="form-group">
                            <label  class="col-sm-2 control-label">邮箱：</label>
                            <div class="col-sm-10">
                            <input required="" type="email" name="email" value="{{$info[0] -> email}}" class="form-control" >
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label  class="col-sm-2 control-label">所在地：</label>
                            <div class="col-sm-10">
                            <input required="" type="text" name="address" value="{{$info[0] -> address}}" class="form-control" >
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default">> 提交</button>
                    </form>
                    
                </dl>
                
            </div>
        </div>
    </div>
@endsection