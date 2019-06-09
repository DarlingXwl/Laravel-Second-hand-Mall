<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
<title>添加产品分类</title>
</head>
<body>
<div class="page-container">
	<form action="/admin/action" method="post" class="form form-horizontal" id="form-user-add">
		{{csrf_field()}}

@if($type == '' || $type == null)

	<input type="hidden" name="action" value="addtype">
	<select name="pid">
		<option value="0">作为一级分类</option>
@foreach($types as $v)
		<option value="{{$v[0] -> id}}">{{$v[0] -> name}}</option>				
@endforeach
	</select>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">
				<span class="c-red">*</span>
				分类名称：</label>
			<div class="formControls col-xs-6 col-sm-6">
				<input required type="text" class="input-text" value="" placeholder="" id="user-name" name="name">
			</div>
		</div>
		<div class="row cl">
			<div class="col-9 col-offset-2">
				<input class="btn btn-primary radius" id="btn-type1" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">　
			</div>
		</div>
@else

	<input type="hidden" name="action" value="updatetype">
	<input type="hidden" name="id" value="{{$type[0] -> id}}">
	<select name="pid">
		<option value="0">作为一级分类</option>
@foreach($types as $v)
		<option value="{{$v[0] -> id}}" <?php if($type[0] -> pid == $v[0] -> id)echo 'selected'?> >{{$v[0] -> name}}</option>				
@endforeach
	</select>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">
				<span class="c-red">*</span>
				分类名称：</label>
			<div class="formControls col-xs-6 col-sm-6">
				<input required type="text" class="input-text" placeholder="" id="user-name" name="name"  value="{{$type[0] -> name}}">
			</div>
		</div>	
		<div class="row cl">
			<div class="col-9 col-offset-2">
				<input class="btn btn-primary radius" type="submit" id="btn-type" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
				<a class="btn btn-danger radius" id="btn-type2" href="/admin/action?action=deletetype&id={{$type[0] -> id}}">&nbsp;&nbsp;删除&nbsp;&nbsp;</a>　
			</div>
		</div>
@endif
		
	</form>
</div>
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
	$(function(){
		$('#btn-type').click(function(){
			window.parent.retype();
		});
		$('#btn-type2').click(function(){

			window.parent.retype();
			window.location.href = "admin/changeclass";
		})
		$('#btn-type1').click(function(){
			window.parent.retype();
		});
	})
</script>
</body>
</html>