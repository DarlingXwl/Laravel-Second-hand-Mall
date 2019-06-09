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
<title>我的桌面</title>
</head>
<body>
<div class="page-container">
	<table class="table table-border table-bordered table-bg mt-20">
		<thead>
			<tr>
				<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="30%">服务器名</th>
				<td><span id="lbServerName">{{$_SERVER['SERVER_SOFTWARE']}}</span></td>
			</tr>
			<tr>
				<td>服务器IP地址</td>
				<td>{{$_SERVER['SERVER_ADDR']}}</td>
			</tr>
			<tr>
				<td>服务器域名</td>
				<td>{{$_SERVER['SERVER_NAME']}}</td>
			</tr>
			<tr>
				<td>服务器端口 </td>
				<td>{{$_SERVER['SERVER_PORT']}}</td>
			</tr>
			<tr>
				<td>数据库类型 </td>
				<td>{{$_SERVER['DB_CONNECTION']}}</td>
			</tr>
			<tr>
				<td>数据库地址 </td>
				<td>{{$_SERVER['DB_HOST']}}</td>
			</tr>
			<tr>
				<td>数据库端口 </td>
				<td>{{$_SERVER['DB_PORT']}}</td>
			</tr>
			<tr>
				<td>系统所在文件夹 </td>
				<td>{{$_SERVER['SystemRoot']}}</td>
			</tr>
			<tr>
				<td>服务器脚本请求时间 </td>
				<td>{{date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME'])}}</td>
			</tr>
			<tr>
				<td>服务器的语言种类 </td>
				<td>{{$_SERVER['HTTP_ACCEPT_LANGUAGE']}}</td>
			</tr>
		</tbody>
	</table>
</div>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
</body>
</html>