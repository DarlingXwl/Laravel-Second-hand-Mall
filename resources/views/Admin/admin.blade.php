<?php
	$sex[1] = '男';
	$sex[2] = '女';
	$sex[3] = '保密';

	$state[1] = '已启用';
	$state[2] = '停用用户';
	$state[3] = '超级管理员';
	$state[4] = '禁用管理员';
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 管理员管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="cl pd-5 bg-1 bk-gray mt-20">
 	<span class="l"> 
 		<a href="javascript:;" onclick="admin_add('添加管理员','/admin/addadmin','800','500')" class="btn btn-primary radius">
 			<i class="Hui-iconfont">&#xe600;</i> 
 			添加管理员
 		</a>
 	</span>
</div>


<div class="page-container">
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="80">ID</th>
				<th width="100">用户名</th>
				<th width="40">性别</th>
				<th width="90">手机</th>
				<th width="150">邮箱</th>
				<th width="">地址</th>
				<th width="130">加入时间</th>
				<th width="70">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
@foreach($user as $v)
			<tr class="text-c">
				<td>
					<input type="checkbox" value="{{$v -> uid}}" name="">
				</td>
				<td>
					{{$v -> uid}}
				</td>
				<td>
					<u style="cursor:pointer" class="text-primary" >{{$v -> username}}</u>
				</td>
				<td>
					{{$sex[$v -> sex]}}
				</td>
				<td>
					{{$v -> phone}}
				</td>
				<td>
					{{$v -> email}}
				</td>
				<td class="text-l">
					{{$v -> address}}
				</td>
				<td>
					{{date('Y-m-d H:i:s',$v -> addtime)}}
				</td>
				<td class="td-status">
@if($v -> state == '4')
					<span class="label radius">{{$state[$v -> state]}}</span>
				</td>
				<td class="td-manage">
					<a style="text-decoration:none"  href="/admin/action?action=adminup&uid={{$v->uid}}" title="启用">	
@else
					<span class="label label-success radius">{{$state[$v -> state]}}</span>
					</td>
				<td class="td-manage">
					<a style="text-decoration:none" href="/admin/action?action=admindown&uid={{$v->uid}}" title="停用">
@endif
				
						<i class="Hui-iconfont">&#xe631;</i>
					</a>
					<a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','/admin/changepwd?uid={{$v ->uid}}&username={{$v -> username}}','10001','600','270')"  title="修改密码">
						<i class="Hui-iconfont">&#xe63f;</i>
					</a> 
					<a title="删除" href="/admin/action?action=admindelete&uid={{$v ->uid}}" class="ml-5" style="text-decoration:none">
						<i class="Hui-iconfont">&#xe6e2;</i>
					</a>
				</td>
			</tr>
@endforeach
		</tbody>
	</table>
	</div>
</div>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$(function(){
	$('.table-sort').dataTable({
		"bStateSave": true,
		"aoColumnDefs": [
		  {"orderable":false,"aTargets":[0,8,9]}
		]
	});
	
});
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}	
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
</script> 
</body>
</html>