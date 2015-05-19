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
					</div>

				</div>
				<div class="col-md-10">
<script>
	$(document).ready(function(){
		
		$("#status").val("<?php echo ($info["status"]); ?>");
		
		$('#tallyModal').on('shown.bs.modal', function () {
		  $('#moneyin').focus();
		});
		
		//项目编辑表单提交
		$("form[name='projectForm']").submit(function (){
			var param={};
			param.pid="<?php echo ($_GET['pid']); ?>";
			param.name=$("#name").val();
			param.type=$("#type").val();
			param.pfrom=$("#pfrom").val();
			param.status=$("#status").val();
			param.amount=$("#amount").val();
			param.outsourcing=$("#outsourcing").val();
			param.cost=$("#cost").val();
			param.execute=$("#execute").val();
			param.remark=$("#remark").val();
			console.log(param);
			$.ajax({
                type: "POST",
                url:'/oa.php/Project/updateProject',
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
			return false;
		});
		
		//项目记录表单提交
		$("form[name='tallyForm']").submit(function (){
			// $('#tallyModal').modal('hide');
			var param={};
			param.pid="<?php echo ($_GET['pid']); ?>";
			param.moneyin=$("#moneyin").val();
			param.moneyout=$("#moneyout").val();
			param.detail=$("#detail").val();
			console.log(param);
			if(param.moneyin==""&&param.moneyout==""&&param.detail==""){
				alert("不能全部为空");
			}else{
				$.ajax({
	                type: "POST",
	                url:'/oa.php/Project/addTally',
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
	
	function deleteTally(tid){
		 if (confirm("确认删除？"))  {
		 	var param={};
		 	param.tid=tid;
		 	$.ajax({
                type: "POST",
                url:'/oa.php/Project/deleteTally',
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
		<h3 class="panel-title"><?php echo ($info["name"]); ?></h3>
	</div>
	<div class="panel-body">
		<div class="col-md-6">
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">
					项目属性
					<button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#projectModal">
						编辑
					</button>
				</div>
				<table class="table">
					<tbody>
						<tr>
							<td>类别：<?php echo ($info["type"]); ?></td>
							<td>来源：<?php echo ($info["pfrom"]); ?></td>
						</tr>
						<tr>
							<td>状态：<?php echo ($info["status"]); ?></td>
							<td>外包方：<?php echo ($info["outsourcing"]); ?></td>
						</tr>
						<tr>
							<td>金额：<?php echo ($info["amount"]); ?>元</td>
							<td>待收：<?php echo ($info["toGet"]); ?>元</td>
						</tr>
						<tr>
							<td>成本：<?php echo ($info["cost"]); ?>元</td>
							<td>待付：<?php echo ($info["toGive"]); ?>元</td>
						</tr>
						<tr>
							<td>执行人：<?php echo ($info["execute"]); ?></td>
							<td>创建时间：<?php echo ($info["createDate"]); ?></td>
						</tr>
						<tr>
							<td colspan="2">备注：<?php echo ($info["remark"]); ?></td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">
					项目记录
					<button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#tallyModal">
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
						<?php if(is_array($tallylist)): $i = 0; $__LIST__ = $tallylist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tallylist): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($tallylist["moneyin"]); ?>元</td>
								<td><?php echo ($tallylist["moneyout"]); ?>元</td>
								<td><?php echo ($tallylist["detail"]); ?></td>
								<td class="hidden-xs"><?php echo ($tallylist["createDate"]); ?></td>
								<td class="hidden-xs"><?php echo ($tallylist["createBy"]); ?></td>
								<td class="hidden-xs"><a onclick="deleteTally(<?php echo ($tallylist["tid"]); ?>)" class="btn btn-danger btn-xs">删除</a></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
			
			<!--编辑项目属性弹出框-->
			<div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="exampleModalLabel">编辑项目属性</h4>
						</div>
						<form name="projectForm">
							<div class="modal-body">
								<div class="form-group">
									<label for="name" class="control-label">名称:</label>
									<input type="text" class="form-control" id="name" value="<?php echo ($info["name"]); ?>">
								</div>
								<div class="form-group">
									<label for="type" class="control-label">类别:</label>
									<input type="text" class="form-control" id="type" value="<?php echo ($info["type"]); ?>">
								</div>
								<div class="form-group">
									<label for="pfrom" class="control-label">来源:</label>
									<input type="text" class="form-control" id="pfrom" value="<?php echo ($info["pfrom"]); ?>">
								</div>
								<div class="form-group">
									<label for="status" class="control-label">状态:</label>
									<select class="form-control" id="status">
										<?php if(is_array($statuslist)): $i = 0; $__LIST__ = $statuslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$statuslist): $mod = ($i % 2 );++$i;?><option><?php echo ($statuslist); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
									</select>
								</div>
								<div class="form-group">
									<label for="amount" class="control-label">金额:</label>
									<input type="text" class="form-control" id="amount" value="<?php echo ($info["amount"]); ?>">
								</div>
								<div class="form-group">
									<label for="outsourcing" class="control-label">外包方:</label>
									<input type="text" class="form-control" id="outsourcing" value="<?php echo ($info["outsourcing"]); ?>">
								</div>
								<div class="form-group">
									<label for="cost" class="control-label">成本:</label>
									<input type="text" class="form-control" id="cost" value="<?php echo ($info["cost"]); ?>">
								</div>
								<div class="form-group">
									<label for="execute" class="control-label">执行人:</label>
									<input type="text" class="form-control" id="execute" value="<?php echo ($info["execute"]); ?>">
								</div>
								<div class="form-group">
									<label for="remark" class="control-label">备注:</label>
									<textarea class="form-control" id="remark"><?php echo ($info["remark"]); ?></textarea>
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

			<!--添加记录弹出框-->
			<div class="modal fade" id="tallyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title" id="exampleModalLabel">添加项目记录</h4>
						</div>
						<form name="tallyForm">
							<div class="modal-body">
								<div class="form-group">
									<label for="moneyin" class="control-label">进账:</label>
									<input type="text" class="form-control" id="moneyin">
								</div>
								<div class="form-group">
									<label for="moneyout" class="control-label">出账:</label>
									<input type="text" class="form-control" id="moneyout">
								</div>
								<div class="form-group">
									<label for="detail" class="control-label">描述:</label>
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
		
		<div class="col-md-6 hidden-xs">
			<!-- 操作记录 -->
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">
					所有操作记录
				</div>
				<table class="table">
					<thead>
						<th>操作</th>
						<th>操作人</th>
						<th>时间</th>
					</thead>
					<tbody>
						<?php if(is_array($operatelist)): $i = 0; $__LIST__ = $operatelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$operatelist): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($operatelist["operate"]); ?></td>
								<td><?php echo ($operatelist["createBy"]); ?></td>
								<td><?php echo ($operatelist["createDate"]); ?></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
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