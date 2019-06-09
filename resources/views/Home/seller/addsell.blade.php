@extends('Home.layout.home')
@section('content')
    <div class="usercenter container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <ul class="nav nav-tabs">
                    <li >
                        <a href="/addsell">添加商品</a>
                    </li>
                </ul>
                <div class="change">
                    <form class="form-horizontal" action="/action?action=sell_add" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">选择分类</label>
                            <div class="col-sm-10">
							<select name="tid" id="">
@foreach($type as $one)
@foreach($one as $k => $v)
@if($k == 0)
								<optgroup label="{{$v -> name}}">
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
                                <input required="" type="text" name="name">
                                <input type="hidden" name="state" value="0">
						  </div>
                        </div>


						<div class="form-group">
                            <label  class="col-sm-2 control-label">
							商品图片：
						</label>
                            <div class="col-sm-10">
							<input name="pic" type="file">
						</div>
                        </div>
                        
                        

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">以物换物？</label>
                            <div class="col-sm-10">
							<select name="replace" id="">
								<option value="2" >否</option>
                                <option value="1" >是</option>
                            </select>
						</div>
                        </div>
						
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">期待换什么？</label>
                            <div class="col-sm-10">
                            <input type="text" name="replacename">
                            </div>
                        </div>

                        <div class="form-group">
                            <label required  class="col-sm-2 control-label">商品简介</label>
                            <div class="col-sm-10">
							<textarea name="descr"></textarea>
						</div>
                        </div>

                        <div class="form-group">
                            <label   class="col-sm-2 control-label">数量：</label>
                            <div class="col-sm-10">
                            <input required="" name="num" type="number" >
						</div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">原价：</label>
                            <div class="col-sm-10">
                            <input required="" type="num" name="oprice" >
						
						  </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">出售价：</label>
                            <div class="col-sm-10">
                                <input required="" type="num" name="price">
						   </div>
                        </div>
                        <center><button type="submit" class="btn btn-default"> 确认添加</button></center>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
@endsection