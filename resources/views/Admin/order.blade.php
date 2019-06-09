<?php
	$state[1] = '交易中';
    $state[2] = '已完成';
    $state[3] = '商家驳回，请重新核对信息';
    $state[4] = '订单已取消';

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
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 商品管理 <span class="c-gray en">&gt;</span> 订单管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="80">ID</th>
				<th width="100">交易时间</th>
				<th width="40">商品ID</th>
				<th width="90">买家ID</th>
				<th width="150">卖家ID</th>
				<th width="">商品名称</th>
				<th width="250">交易地点</th>
				<th width="70">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
@foreach($order as $v)
			<tr class="text-c">
				<td>
					{{$v -> id}}
				</td>
				<td>
					{{$v -> time}}
				</td>
				<td>
					{{$v -> gid}}
				</td>
				<td>
					{{$v -> uid}}
				</td>
				<td>
					{{$v -> sid}}
				</td>
				<td class="text-l">
					{{$v -> name}}
				</td>
				<td>
					{{$v -> address}}
				</td>
				<td class="td-status">
					<span class="label radius">{{$state[$v -> state]}}</span>
				</td>
				<td class="td-manage">
					<a title="删除" href="/admin/action?action=delete_order&id={{$v -> id}}" class="ml-5" style="text-decoration:none">
						<i class="Hui-iconfont">&#xe6e2;</i>
					</a>
				</td>
			</tr>
@endforeach
								<td colspan="9" rowspan="" headers=""><div class="content-sortpagibar">
                                    {{ $order->links() }}
                                </div></td>
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

function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
</script> 
</body>
</html>