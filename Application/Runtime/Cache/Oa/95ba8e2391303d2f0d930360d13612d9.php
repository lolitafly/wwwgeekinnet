<?php if (!defined('THINK_PATH')) exit();?>				<!DOCTYPE html>
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
				<style>
					.manu{padding:3px;margin:3px;text-align:center;}
					.manu a{border:#eee 1px solid;padding:2px 5px;margin:2px;color:#036cb4;text-decoration:none;}
					.manu a:hover{border:#999 1px solid;color:#666;}
					.manu a:active{border:#999 1px solid;color:#666;}
					.manu .current{border:#036cb4 1px solid;padding:2px 5px;font-weight:bold;margin:2px;color:#fff;background-color:#036cb4;}
					.manu .disabled{border:#eee 1px solid;padding:2px 5px;margin:2px;color:#ddd;}
				</style>
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">项目列表</h3>
				  </div>
				  <div class="panel-body">
				    <table class="table table-striped table-hover">
				    	<thead>
				    		<th>项目名称</th>
				    		<th class="hidden-xs">类别</th>
				    		<th class="hidden-xs">来源</th>
				    		<th class="hidden-xs">状态</th>
				    		<th>金额</th>
				    		<th class="hidden-xs">执行人</th>
				    		<th class="hidden-xs">备注</th>
				    		<th class="hidden-xs">创建日期</th>
				    		<th>详情</th>
				    	</thead>
				    	<tbody>
				    		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
					    			<td><?php echo ($list["name"]); ?></td>
					    			<td class="hidden-xs"><?php echo ($list["type"]); ?></td>
					    			<td class="hidden-xs"><?php echo ($list["pfrom"]); ?></td>
					    			<td class="hidden-xs"><?php echo ($list["status"]); ?></td>
					    			<td><?php echo ($list["amount"]); ?></td>
					    			<td class="hidden-xs"><?php echo ($list["execute"]); ?></td>
					    			<td class="hidden-xs"><?php echo ($list["remark"]); ?></td>
					    			<td class="hidden-xs"><?php echo ($list["createDate"]); ?></td>
					    			<td><a href="/oa.php/Project/detail/pid/<?php echo ($list["pid"]); ?>">详情</a></td>
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
			
							<p>(c) Copyright 2015 上海格映科技有限公司. All Rights Reserved.</p>
				</div>
			</div>
		</div>
	</body>
</html>