<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>格映科技项目管理系统</title>

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
		      <a class="navbar-brand" href="#">格映科技项目管理系统</a>
		    </div>
		
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="<?php if(ACTION_NAME=='index') echo('active'); ?>"><a href="<?php echo U('Project/index');?>">数据统计</a></li>
		        <li class="<?php if(ACTION_NAME=='plist') echo('active'); ?>"><a href="<?php echo U('Project/plist');?>">项目列表</a></li>
		        <li class="<?php if(ACTION_NAME=='addProject') echo('active'); ?>"><a href="<?php echo U('Project/addProject');?>">新增项目</a></li>
		        <li class="<?php if(ACTION_NAME=='account') echo('active'); ?>"><a href="<?php echo U('Project/account');?>">公司账目</a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right hidden-xs">
		        <li><a>你好，<?php echo ($_SESSION['oa_user']['nickname']); ?></a></li>
		        <li><a href="<?php echo U('Index/logout');?>">登出</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>


		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2">
					<div class="list-group hidden-xs">
						<a href="<?php echo U('Project/index');?>" class="list-group-item <?php if(ACTION_NAME=='index') echo('active'); ?>">数据统计</a>
						<a href="<?php echo U('Project/plist');?>" class="list-group-item <?php if(ACTION_NAME=='plist') echo('active'); ?>">项目列表</a>
						<a href="<?php echo U('Project/addProject');?>" class="list-group-item <?php if(ACTION_NAME=='addProject') echo('active'); ?>">新增项目</a>
						<a href="<?php echo U('Project/account');?>" class="list-group-item <?php if(ACTION_NAME=='account') echo('active'); ?>">公司账目</a>
					</div>

				</div>
				<div class="col-md-10">
<script>
	$(document).ready(function(){
		
		$('#accountModal').on('shown.bs.modal', function () {
		  $('#moneyin').focus();
		});
		
		//项目记录表单提交
		$("form[name='accountForm']").submit(function (){
			// $('#tallyModal').modal('hide');
			var param={};
			param.moneyin=$("#moneyin").val();
			param.moneyout=$("#moneyout").val();
			param.detail=$("#detail").val();
			if(param.moneyin==""&&param.moneyout==""&&param.detail==""){
				alert("不能全部为空");
			}else{
				$.ajax({
	                type: "POST",
	                url:'/oa.php/Project/addAccount',
	                data:param,
	                dataType:'json',
	                async: false,
	                error: function(request){
	                    alert("服务器连接错误！");
	                },
	                success: function(r) {
	                	if(r==1){
	                		location.reload();
	                	}else{
		                	alert(r);
	                	}
	                }
	            });
			}
			return false;
		});
	});
	
	function deleteAccount(aid){
		 if (confirm("确认删除？"))  {
		 	var param={};
		 	param.aid=aid;
		 	$.ajax({
                type: "POST",
                url:'/oa.php/Project/deleteAccount',
                data:param,
                dataType:'json',
                async: false,
                error: function(request){
                    alert("服务器连接错误！");
                },
                success: function() {
                	location.reload();
                }
            });
		 }
	}
</script>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">公司账目</h3>
	</div>
	<div class="panel-body">
		<div class="col-md-6">
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">
					总计
				</div>
				<table class="table">
					<tbody>
						<tr>
							<td>总进账：<?php echo ($info['in']/10000); ?>万</td>
							<td>总出账：<?php echo ($info['out']/10000); ?>万</td>
						</tr>
						<tr>
							<td colspan="2">余额：<?php echo ($info['remain']/10000); ?>万</td>
						</tr>
					</tbody>
				</table>
			</div>

			
			
			
		</div>
		
		<div class="col-md-6 hidden-xs">
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">
					进出账记录
					<button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#accountModal">
						添加
					</button>
				</div>
				<!-- Table -->
				<table class="table">
					<thead>
						<th>进账</th>
						<th>出账</th>
						<th>详情</th>
						<th class="hidden-xs">日期</th>
						<th class="hidden-xs">添加人</th>
						<th class="hidden-xs">删除</th>
					</thead>
					<tbody>
						<?php if(is_array($accountlist)): $i = 0; $__LIST__ = $accountlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($vo["moneyin"]); ?>元</td>
								<td><?php echo ($vo["moneyout"]); ?>元</td>
								<td><?php echo ($vo["detail"]); ?></td>
								<td class="hidden-xs"><?php echo ($vo["createDate"]); ?></td>
								<td class="hidden-xs"><?php echo ($vo["createBy"]); ?></td>
								<td class="hidden-xs"><a onclick="deleteAccount(<?php echo ($vo["aid"]); ?>)" class="btn btn-danger btn-xs">删除</a></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
			
			<!--添加记录弹出框-->
			<div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="exampleModalLabel">添加项目记录</h4>
						</div>
						<form name="accountForm">
							<div class="modal-body">
								<div class="form-group">
									<label for="moneyin" class="control-label">进账:</label>
									<input type="number" class="form-control" id="moneyin">
								</div>
								<div class="form-group">
									<label for="moneyout" class="control-label">出账:</label>
									<input type="number" class="form-control" id="moneyout">
								</div>
								<div class="form-group">
									<label for="detail" class="control-label">详情:</label>
									<textarea class="form-control" id="detail"></textarea>
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

		</div>
	</div>
</div>

					<p>(c) Copyright 2015 上海格映科技有限公司. All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</body>
</html>