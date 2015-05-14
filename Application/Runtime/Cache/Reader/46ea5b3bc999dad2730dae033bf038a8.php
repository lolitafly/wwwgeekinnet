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
		<script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
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
					</div>

				</div>
				<div class="col-md-10">
<style>
	.manu{padding:3px;margin:3px;text-align:center;}
	.manu a{border:#eee 1px solid;padding:2px 5px;margin:2px;color:#036cb4;text-decoration:none;}
	.manu a:hover{border:#999 1px solid;color:#666;}
	.manu a:active{border:#999 1px solid;color:#666;}
	.manu .current{border:#036cb4 1px solid;padding:2px 5px;font-weight:bold;margin:2px;color:#fff;background-color:#036cb4;}
	.manu .disabled{border:#eee 1px solid;padding:2px 5px;margin:2px;color:#ddd;}
</style>
<script>
	$(document).ready(function() {

		$('#addModal').on('shown.bs.modal', function() {
			$('#add_username').focus();
		});

		//添加主播表单提交
		$("form[name='addForm']").submit(function() {
			var param = {};
			param.username = $("#add_username").val();
			param.nickname = $("#add_nickname").val();
			param.power = $("#add_power").val();
			console.log(param);
			$.ajax({
				type : "POST",
				url : '/reader.php/System/reader_add',
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

		//编辑主播表单提交
		$("form[name='updateForm']").submit(function() {
			// $('#tallyModal').modal('hide');
			var param = {};
			param.rid = $("#update_rid").val();
			param.nickname = $("#update_nickname").val();
			param.power = $("#update_power").val();
			console.log(param);
			$.ajax({
				type : "POST",
				url : '/reader.php/System/reader_update',
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

	function deleteReader(rid) {
		if (confirm("确认删除？")) {
			var param = {};
			param.rid = rid;
			$.ajax({
				type : "POST",
				url : '/reader.php/System/reader_delete',
				data : param,
				dataType : 'json',
				async : false,
				error : function(request) {
					alert("服务器连接错误！");
				},
				success : function(r) {
					if(r==1){
						location.reload();
					}else{
						alert(r);
					}
				}
			});
		}
	}
	
	function showUpdateModal(e){
		$("#update_rid").val($(e).parents("tr").find("td[name='rid']").text());
		$("#update_username").val($(e).parents("tr").find("td[name='username']").text());
		$("#update_nickname").val($(e).parents("tr").find("td[name='nickname']").text());
		$("#update_power").val($(e).parents("tr").find("td[name='power']").text());
	}
	
</script>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">主播列表
			<button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#addModal">
				添加主播
			</button>
		</h3>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover">
			<thead>
				<th>昵称</th>
				<th>权限</th>
				<th>EXP</th>
				<th>编辑</th>
				<th>删除</th>
				<!-- <th class="hidden-xs">权限</th> -->
			</thead>
			<tbody>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
						<!-- 隐藏数据 -->
						<td name="rid" class="hide"><?php echo ($list["rid"]); ?></td>
						<td name="username" class="hide"><?php echo ($list["username"]); ?></td>
						<td name="power" class="hide"><?php echo ($list["power"]); ?></td>
						
						<td name="nickname"><?php echo ($list["nickname"]); ?></td>
						<td><?php echo ($list["text"]); ?></td>
						<td><?php echo ($list["exp"]); ?></td>
						<td>
							<button type="button" class="btn btn-info btn-xs " data-toggle="modal" data-target="#updateModal" onclick="showUpdateModal(this)">
								编辑
							</button>
						</td>
						<td><a class="btn btn-danger btn-xs " onclick="deleteReader(<?php echo ($list["rid"]); ?>)">删除</a></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
		<nav class="text-center">
			<div class="manu">
				<?php echo ($page); ?>
			</div>
		</nav>
	</div>
</div>

<!-- 添加弹出框 -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="exampleModalLabel">添加主播</h4>
			</div>
			<form name="addForm">
				<div class="modal-body">
					<div class="form-group">
						<label for="add_username" class="control-label">用户名:</label>
						<input type="text" class="form-control" id="add_username" placeholder="建议采用昵称拼音，并注意唯一性">
					</div>
					<div class="form-group">
						<label for="add_nickname" class="control-label">昵称:</label>
						<input type="text" class="form-control" id="add_nickname" placeholder="建议采用姓名">
					</div>
					<div class="form-group">
						<label for="add_power" class="control-label">权限:</label>
						<select class="form-control" id="add_power">
							<?php if(is_array($powerlist)): $i = 0; $__LIST__ = $powerlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["value"]); ?>"><?php echo ($vo["text"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
					<p>
						注：账号添加后，默认密码为111111，且仅有权限为管理员及信息维护员可登陆该系统。
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						关闭
					</button>
					<button type="submit" class="btn btn-primary">
						确认提交
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- 编辑弹出框 -->
<div class="modal fade" id="updateModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">编辑主播</h4>
			</div>
			<form name="updateForm">
				<div class="modal-body">
					<div class="form-group">
						<label for="update_username" class="control-label">用户名:</label>
						<input type="text" class="form-control" id="update_username" disabled="disabled">
						<input type="text" class="form-control hide" id="update_rid" disabled="disabled">
					</div>
					<div class="form-group">
						<label for="update_nickname" class="control-label">昵称:</label>
						<input type="text" class="form-control" id="update_nickname" placeholder="建议采用姓名">
					</div>
					<div class="form-group">
						<label for="update_power" class="control-label">权限:</label>
						
						<select class="form-control" id="update_power">
							<?php if(is_array($powerlist)): $i = 0; $__LIST__ = $powerlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo1["value"]); ?>"><?php echo ($vo1["text"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						关闭
					</button>
					<button type="submit" class="btn btn-primary">
						确认提交
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

					<p>(c) Copyright 2015 上海格映科技有限公司. All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</body>
</html>