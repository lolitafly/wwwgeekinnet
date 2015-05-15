<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>读书狼任务管理系统</title>

		<!-- Bootstrap -->
		<link href="/Public/Oa/css/bootstrap.min.css" rel="stylesheet">
		<link href="/Public/Oa/css/bootstrap-switch.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<!-- <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script> -->
		<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="/Public/Oa/js/bootstrap.min.js"></script>
		<script src="/Public/Oa/js/bootstrap-switch.js"></script>
		
	</head>
	<body>

		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">读书狼任务管理系统</a>
		    </div>
		
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="<?php if(ACTION_NAME=='reader') echo('active'); ?>"><a href="<?php echo U('reader');?>">主播</a></li>
		        <li class="<?php if(ACTION_NAME=='book') echo('active'); ?>"><a href="<?php echo U('book');?>">朗读内容</a></li>
		        <li class="<?php if(ACTION_NAME=='plan') echo('active'); ?>"><a href="<?php echo U('plan');?>">朗读任务</a></li>
		        <li class="<?php if(ACTION_NAME=='sys') echo('active'); ?>"><a href="<?php echo U('sys');?>">系统</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right hidden-xs">
		        <li><a>你好，<?php echo ($_SESSION['reader']['reader']['nickname']); ?></a></li>
		        <li><a href="<?php echo U('logout');?>">登出</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>


		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2">
					<div class="list-group hidden-xs">
						<a href="<?php echo U('reader');?>" class="list-group-item <?php if(ACTION_NAME=='reader') echo('active'); ?>">主播</a>
						<a href="<?php echo U('book');?>" class="list-group-item <?php if(ACTION_NAME=='book') echo('active'); ?>">朗读内容</a>
						<a href="<?php echo U('plan');?>" class="list-group-item <?php if(ACTION_NAME=='plan') echo('active'); ?>">朗读任务</a>
						<a href="<?php echo U('sys');?>" class="list-group-item <?php if(ACTION_NAME=='sys') echo('active'); ?>">系统</a>
					</div>

				</div>
				<div class="col-md-10">
<script>
	$(document).ready(function() {
		//修改密码表单提交
		$("form[name='updatePassword']").submit(function() {
			var param = {};
			param.password = $("#password").val();
			param.newPassword = $("#newPassword").val();
			param.rePassword = $("#rePassword").val();
			console.log(param);
			$.ajax({
				type : "POST",
				url : '/reader.php/System/password_update',
				data : param,
				dataType : 'json',
				async : false,
				error : function(request) {
					alert("服务器连接错误！");
				},
				success : function(r) {
					if (r == 1) {
						location.reload();
					} else {
						alert(r);
					}
				}
			});
			return false;
		});
		
		//修改昵称表单提交
		$("form[name='updateNickname']").submit(function() {
			var param = {};
			param.nickname = $("#nickname").val();
			console.log(param);
			$.ajax({
				type : "POST",
				url : '/reader.php/System/nickname_update',
				data : param,
				dataType : 'json',
				async : false,
				error : function(request) {
					alert("服务器连接错误！");
				},
				success : function(r) {
					if (r == 1) {
						location.reload();
					} else {
						alert(r);
					}
				}
			});
			return false;
		});

	});

	function freshExp(e) {
		$.ajax({
			type : "POST",
			url : '/reader.php/System/freshexp',
			dataType : 'json',
			async : false,
			error : function(request) {
				alert("服务器连接错误！");
			},
			success : function(r) {
				if (r == 1) {
					location.reload();
				} else {
					alert(r);
				}
			}
		});
	}
</script>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">系统设置</h3>
	</div>
	<div class="panel-body">
		<div class="col-md-6">

			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">
					Exp计算记录
					<button type="button" class="btn btn-primary btn-xs pull-right"  onclick="freshExp(this)">
						重算Exp
					</button>
				</div>
				<!-- Table -->
				<table class="table">
					<thead>
						<th>操作时间</th>
						<th>操作人</th>
						<th>详情</th>
					</thead>
					<tbody>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($vo["createDate"]); ?></td>
								<td><?php echo ($vo["createBy"]); ?></td>
								<td><?php echo ($vo["detail"]); ?></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
			
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">
					修改昵称
				</div>
				<div class="panel-body">
					<form name="updateNickname">
						<div class="form-group">
							<label for="nickname">昵称</label>
							<input type="text" class="form-control" id="nickname" placeholder="建议采用姓名">
						</div>
						<button type="submit" class="btn btn-primary">
							提交
						</button>
					</form>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">
					修改密码
				</div>
				<div class="panel-body">
					<form name="updatePassword">
						<div class="form-group">
							<label for="password">原密码</label>
							<input type="password" class="form-control" id="password" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="newPassword">新密码</label>
							<input type="password" class="form-control" id="newPassword" placeholder="New Password">
						</div>
						<div class="form-group">
							<label for="rePassword">再次输入新密码</label>
							<input type="password" class="form-control" id="rePassword" placeholder="New Password">
						</div>
						<button type="submit" class="btn btn-primary">
							提交
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

					<p>(c) Copyright 2015 上海格映科技有限公司. All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</body>
</html>