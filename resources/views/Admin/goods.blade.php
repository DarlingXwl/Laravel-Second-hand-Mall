<?php
	$state [0] = '待审核';
	$state [1] = '出售中';
	$state [2] = '已售出';
	$state [3] = '审核未通过';
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
<link rel="stylesheet" href="css/bootstrap.min.css">
<style type="text/css" media="screen">
	.content-sortpagibar {
	    border-top: 1px solid #ebebeb;
	    padding-bottom: 70px;
	    padding-top: 20px;
	}
	.content-sortpagibar ul li{
		display: inline;
		border: 1px solid #000;
		padding: 20px;
	}

</style>
<title>商品列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 商品管理 <span class="c-gray en">&gt;</span> 商品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>

				<tr class="text-c">
					<th width="80">ID</th>
					<th width="100">用户ID</th>
					<th width="100">图片</th>
					<th>商品名称
					</th>
					<th width="150">售价</th>
					<th width="150">更新时间</th>
					<th width="60">发布状态</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
@foreach($goods as $v)
				<tr class="text-c">
					<td>{{$v -> id}}</td>
					<td>{{$v -> uid}}</td>
					<td><img width="100" class="picture-thumb" src="../upload/goods//pic/{{$v -> pic}}" ></td>
					<td class="text-l">{{$v ->name}}</td>
					<td class="text-c">￥{{$v-> price}}</td>
					<td>{{date('Y-m-d H:i:s',$v -> addtime)}}</td>
@if($v -> state == '0' || $v -> state == '3' )
					<td class="td-status"><span class="label radius">{{$state[$v -> state]}}</span></td>
					<td class="td-manage">
						<a style="text-decoration:none" href="/admin/action?action=exup&id={{$v -> id}}" title="通过审核">
							<i class="Hui-iconfont">&#xe6dc;</i>
						</a>
@else
					<td class="td-status"><span class="label label-success radius">{{$state[$v -> state]}}</span></td>
					<td class="td-manage">
						<a style="text-decoration:none" href="/admin/action?action=exdown&id={{$v -> id}}" title="重新审核">
							<i class="Hui-iconfont">&#xe6de;</i>
						</a>
@endif
					<a style="text-decoration:none" class="ml-5" onClick="picture_edit('','/admin/changegoods?id={{$v -> id}}','10001')" href="javascript:;" title="编辑">
						<i class="Hui-iconfont">&#xe6df;</i>
					</a> 
					<a style="text-decoration:none" class="ml-5" href="/admin/action?action=deletegoods&id={{$v -> id}}" title="删除">
						<i class="Hui-iconfont">&#xe6e2;</i>
					</a>
				</td>
				</tr>
@endforeach
								<td colspan="8" rowspan="1" headers=""><div class="content-sortpagibar">
                                    {{ $goods->links() }}
                                </div></td>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
function picture_edit(title,url,id){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
</script>
</body>
</html>