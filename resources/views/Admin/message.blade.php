<?php

	$state['0'] = '待审核';
	$state['1'] = '已发布';

?>
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
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />

<title>留言管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 商品管理 <span class="c-gray en">&gt;</span> 留言管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25">用户ID</th>
					<th width="60">商品ID</th>
					<th width="150">留言时间</th>
					<th>留言内容</th>
					<th width="50">状态</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
@foreach($message as $v)

				<tr class="text-c">
					<td>{{$v -> uid}}</td>
					<td>{{$v -> gid}}</td>
					<td>{{$v -> time}}</td>
					<td class="text-l">{{$v -> message}}</td>
@if($v -> state == '1')
					<td><span class="label label-success radius">{{$state[$v -> state]}}</span></td>
					<td class="td-manage">
@else
					<td><span class="label radius">{{$state[$v -> state]}}</span></td>
					<td class="/admin/messpass"><a title="通过审核" href="/admin/action?action=messpass&id={{$v -> id}}" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
@endif
					
					 <a title="删除" href="/admin/action?action=messdel&id={{$v ->id}}"  class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
@endforeach		
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>  
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,2,4]}// 制定列不参与排序
		]
	});

});
</script>
</body>
</html>