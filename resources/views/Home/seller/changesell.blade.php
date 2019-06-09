@extends('Home.layout.home')
@section('content')
<?php
	$replace[1] = '';
	$replace[2] = '';
	$replace[$sell[0] -> replace] = 'selected';
?>
    <div class="usercenter container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <ul class="nav nav-tabs">
                    <li >
                        <a href="/changesell">修改商品</a>
                    </li>
                </ul>
                <dl class="change">
                    <form class="form-horizontal" action="/action?action=sell_change" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{$sell[0] -> id}}">
                            <label  class="col-sm-2 control-label">选择分类</label>
                            <div class="col-sm-10">
							<select name="tid" id="">
@foreach($type as $one)
@foreach($one as $k => $v)
@if($k == 0)
								<optgroup label="{{$v -> name}}">
@elseif($k == $sell[0] -> tid)							
									<option value="{{$v -> id}}" selected>{{$v -> name}}</option>
@else
									<option value="{{$v -> id}}">{{$v -> name}}</option>


@endif
@endforeach
								</optgroup>
@endforeach

                            </select>
						</div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">
                            商品名称
                        </label>
                            <div class="col-sm-10">
                        <input type="text" name="name" value="{{$sell[0] -> name}}">
                        <input type="hidden" name="state" value="0">
                        </div>
                        </div>
						
						<div class="form-group">
                            <label  class="col-sm-2 control-label">
							商品图片：
						</label>
                            <div class="col-sm-10">
						<img height="150" src="upload/goods/pic/{{$sell[0] -> pic}}" alt="">
						
							<input name="pic" type="file">
						</div>
                        </div>
                        
                        

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">以物换物？</label>
                            <div class="col-sm-10">
							<select name="replace" id="">
								<option value="2" {{$replace[2]}} >否</option>
                                <option value="1" {{$replace[1]}} >是</option>
                            </select>
						</div>
                        </div>
						
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">期待换什么？</label>
                            <div class="col-sm-10">
                            <input type="text" name="replacename" value="{{$sell[0] -> replacename}}">
                        </div>
                        </div>



                        <div class="form-group">
                            <label  class="col-sm-2 control-label">商品简介</label>
                            <div class="col-sm-10">
							<textarea name="descr" value="">{{$sell[0] -> descr}}</textarea>
						</div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">数量：</label>
                            <div class="col-sm-10">
							<input name="num" type="number" value="{{$sell[0] -> num}}">
						</div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">原价：</label>
                            <div class="col-sm-10">
							<input type="num" name="oprice" value="{{$sell[0] -> oprice}}">
						</div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">出售价：</label>
                            <div class="col-sm-10">
							<input type="num" name="price" value="{{$sell[0] -> price}}">
						</div>
                        </div>
                        <button type="submit" class="btn btn-default"> 确认修改</button>
                    </form>
                </dl>
            </div>
        </div>
    </div>
@endsection