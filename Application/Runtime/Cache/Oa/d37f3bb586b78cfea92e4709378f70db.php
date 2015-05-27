<?php if (!defined('THINK_PATH')) exit();?>					<!DOCTYPE html>
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
							$("[name='my-checkbox']").bootstrapSwitch();
							$('#type-input').hide();
							$('#from-input').hide();
							$('#outsourcing-input').hide();
							$('#execute-input').hide();
							
							//switch切换
							$("[name='my-checkbox']").on('switchChange.bootstrapSwitch', function(event, state) {
								if(state){
									$(this).parents('.form-group').find("input[type='text']").hide();
									$(this).parents('.form-group').find("select").show();
								}else{
									$(this).parents('.form-group').find("input[type='text']").show();
									$(this).parents('.form-group').find("select").hide();
								}
							});
							
							$("form").submit(function (){
								var param={};
								param.name=$("#name").val();
								param.type=$('#type-switch').bootstrapSwitch('state')?$('#type-select').val():$('#type-input').val();
								param.pfrom=$('#from-switch').bootstrapSwitch('state')?$('#from-select').val():$('#from-input').val();
								param.status=$("#status").val();
								param.amount=$("#amount").val();
								param.outsourcing=$('#outsourcing-switch').bootstrapSwitch('state')?$('#outsourcing-select').val():$('#outsourcing-input').val();
								param.cost=$("#cost").val();
								param.execute=$('#execute-switch').bootstrapSwitch('state')?$('#execute-select').val():$('#execute-input').val();
								param.remark=$("#remark").val();
								console.log(param);
								$.ajax({
					                type: "POST",
					                url:'/oa.php/Project/submit',
					                data:param,
					                dataType:'json',
					                async: false,
					                error: function(request){
					                    alert("服务器连接错误！");
					                },
					                success: function(r) {
					                	if(r==1){
					                		window.location.href="<?php echo U('plist');?>";
					                	}else{
						                	alert(r);
					                	}
					                }
					            });
								
								return false;
							});
						});
					</script>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">新增项目</h3>
						</div>
						<div class="panel-body">

							<form class="form-horizontal">
								<div class="form-group">
									<label for="name" class="col-sm-1 control-label">名称</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" id="name" placeholder="">
									</div>
								</div>
								<div class="form-group">
									<label for="type" class="col-sm-1 col-xs-12 control-label">类别</label>
									<div class="col-sm-2 col-xs-6">
										<input type="text" class="form-control" id="type-input" placeholder="">
										<select class="form-control" id="type-select">
											<?php if(is_array($typelist)): $i = 0; $__LIST__ = $typelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$typelist): $mod = ($i % 2 );++$i;?><option><?php echo ($typelist["type"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
									<div class="col-sm-2 col-xs-6">
										<input type="checkbox"  name="my-checkbox" checked data-on-text="选择" data-off-text="新增" id="type-switch"/>
									</div>
								</div>
								<div class="form-group">
									<label for="from-input" class="col-sm-1 col-xs-12 control-label">来源</label>
									<div class="col-sm-2 col-xs-6">
										<input type="text" class="form-control" id="from-input" placeholder="">
										<select class="form-control" id="from-select">
											<?php if(is_array($fromlist)): $i = 0; $__LIST__ = $fromlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fromlist): $mod = ($i % 2 );++$i;?><option><?php echo ($fromlist["pfrom"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
									<div class="col-sm-2 col-xs-6">
										<input type="checkbox"  name="my-checkbox" checked data-on-text="选择" data-off-text="新增" id="from-switch"/>
									</div>
								</div>
								<div class="form-group">
									<label for="status" class="col-sm-1 control-label">状态</label>
									<div class="col-sm-2">
										<select class="form-control" id="status">
											<?php if(is_array($statuslist)): $i = 0; $__LIST__ = $statuslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$statuslist): $mod = ($i % 2 );++$i;?><option><?php echo ($statuslist); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="amount" class="col-sm-1 control-label">金额</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" id="amount" placeholder="" value="0">
									</div>
								</div>
								<div class="form-group">
									<label for="outsourcing-input" class="col-sm-1 col-xs-12 control-label">外包方</label>
									<div class="col-sm-2 col-xs-6">
										<input type="text" class="form-control" id="outsourcing-input" placeholder="">
										<select class="form-control" id="outsourcing-select">
											<?php if(is_array($outsourcinglist)): $i = 0; $__LIST__ = $outsourcinglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$outsourcinglist): $mod = ($i % 2 );++$i;?><option><?php echo ($outsourcinglist["outsourcing"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
									<div class="col-sm-2 col-xs-6">
										<input type="checkbox"  name="my-checkbox" checked data-on-text="选择" data-off-text="新增" id="outsourcing-switch"/>
									</div>
								</div>
								<div class="form-group">
									<label for="cost" class="col-sm-1 control-label">成本</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" id="cost" placeholder="" value="0">
									</div>
								</div>
								<div class="form-group">
									<label for="execute-input" class="col-sm-1 col-xs-12 control-label">执行人</label>
									<div class="col-sm-2 col-xs-6">
										<input type="text" class="form-control" id="execute-input" placeholder="">
										<select class="form-control" id="execute-select">
											<?php if(is_array($executelist)): $i = 0; $__LIST__ = $executelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$executelist): $mod = ($i % 2 );++$i;?><option><?php echo ($executelist["execute"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
										</select>
									</div>
									<div class="col-sm-2 col-xs-6">
										<input type="checkbox"  name="my-checkbox" checked data-on-text="选择" data-off-text="新增"  id="execute-switch"/>
									</div>
								</div>
								<div class="form-group">
									<label for="remark" class="col-sm-1 control-label">备注</label>
									<div class="col-sm-2">
										<textarea class="form-control" rows="3" id="remark"></textarea>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-sm-offset-1 col-sm-2">
										<button type="submit" class="btn btn-default">
											确认提交
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
										<p>(c) Copyright 2015 上海格映科技有限公司. All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</body>
</html>