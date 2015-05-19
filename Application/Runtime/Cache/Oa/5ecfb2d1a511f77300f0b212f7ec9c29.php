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
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">数据统计</h3>
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
							<td>总金额：<?php echo ($info['amount']/10000); ?>万</td>
							<td>总成本：<?php echo ($info['cost']/10000); ?>万</td>
						</tr>
						<tr>
							<td>已收款：<?php echo ($info['moneyin']/10000); ?>万</td>
							<td>已付款：<?php echo ($info['moneyout']/10000); ?>万</td>
						</tr>
						<tr>
							<td>总利润：<?php echo ($info['profit']/10000); ?>万</td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
			
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">
					项目状态统计
				</div>
				<table class="table">
					<thead>
						<th>状态</th>
						<th>利润</th>
						<th>总金额</th>
						<th>总成本</th>
					</thead>
					<tbody>
						<?php if(is_array($statuslist)): $i = 0; $__LIST__ = $statuslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><tr>
								<td><a href="/oa.php/Project/plist/status/<?php echo ($vo1["status"]); ?>"><?php echo ($vo1["status"]); ?></a></td>
								<td><?php echo ($vo1['sum(amount)']/10000-$vo1['sum(cost)']/10000); ?>万</td>
								<td><?php echo ($vo1['sum(amount)']/10000); ?>万</td>
								<td><?php echo ($vo1['sum(cost)']/10000); ?>万</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
			
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">
					项目类型统计
				</div>
				<table class="table">
					<thead>
						<th>类型</th>
						<th>利润</th>
						<th>总金额</th>
						<th>总成本</th>
					</thead>
					<tbody>
						<?php if(is_array($typelist)): $i = 0; $__LIST__ = $typelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><tr>
								<td><a href="/oa.php/Project/plist/type/<?php echo ($vo2["type"]); ?>"><?php echo ($vo2["type"]); ?></a></td>
								<td><?php echo ($vo2['sum(amount)']/10000-$vo2['sum(cost)']/10000); ?>万</td>
								<td><?php echo ($vo2['sum(amount)']/10000); ?>万</td>
								<td><?php echo ($vo2['sum(cost)']/10000); ?>万</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="col-md-6">
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">
					项目来源统计
				</div>
				<table class="table">
					<thead>
						<th>来源</th>
						<th>利润</th>
						<th>总金额</th>
						<th>总成本</th>
					</thead>
					<tbody>
						<?php if(is_array($pfromlist)): $i = 0; $__LIST__ = $pfromlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><a href="/oa.php/Project/plist/pfrom/<?php echo ($vo["pfrom"]); ?>"><?php echo ($vo["pfrom"]); ?></a></td>
								<td><?php echo ($vo['sum(amount)']/10000-$vo['sum(cost)']/10000); ?>万</td>
								<td><?php echo ($vo['sum(amount)']/10000); ?>万</td>
								<td><?php echo ($vo['sum(cost)']/10000); ?>万</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</div>
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading">
					项目执行统计
				</div>
				<table class="table">
					<thead>
						<th>执行人</th>
						<th>利润</th>
						<th>总金额</th>
						<th>总成本</th>
					</thead>
					<tbody>
						<?php if(is_array($executelist)): $i = 0; $__LIST__ = $executelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?><tr>
								<td><a href="/oa.php/Project/plist/execute/<?php echo ($vo3["execute"]); ?>"><?php echo ($vo3["execute"]); ?></a></td>
								<td><?php echo ($vo3['sum(amount)']/10000-$vo3['sum(cost)']/10000); ?>万</td>
								<td><?php echo ($vo3['sum(amount)']/10000); ?>万</td>
								<td><?php echo ($vo3['sum(cost)']/10000); ?>万</td>
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