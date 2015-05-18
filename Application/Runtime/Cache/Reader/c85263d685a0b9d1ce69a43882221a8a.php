<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title><?php if(ACTION_NAME=='readerlist'||ACTION_NAME=='readerdetail'){echo('读书狼主播档案馆');}else{echo('读书狼作品资料库');} ?></title>

		<!-- Bootstrap -->
		<link href="/Public/Reader/css/bootstrap.min.css" rel="stylesheet">
		<link href="/Public/Reader/css/bootstrap-switch.css" rel="stylesheet">

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
		<script src="/Public/Reader/js/bootstrap.min.js"></script>
		<script src="/Public/Reader/js/bootstrap-switch.js"></script>
		<style>
			.manu{padding:3px;margin:3px;text-align:center;}
			.manu a{border:#eee 1px solid;padding:2px 5px;margin:2px;color:#036cb4;text-decoration:none;}
			.manu a:hover{border:#999 1px solid;color:#666;}
			.manu a:active{border:#999 1px solid;color:#666;}
			.manu .current{border:#036cb4 1px solid;padding:2px 5px;font-weight:bold;margin:2px;color:#fff;background-color:#036cb4;}
			.manu .disabled{border:#eee 1px solid;padding:2px 5px;margin:2px;color:#ddd;}
		</style>
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
					<a class="navbar-brand" href="#"><?php if(ACTION_NAME=='readerlist'||ACTION_NAME=='readerdetail'){echo('读书狼主播档案馆');}else{echo('读书狼作品资料库');} ?></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="<?php if(ACTION_NAME=='readerlist') echo('active'); ?>">
							<a href="<?php echo U('readerlist');?>">读书狼主播档案馆</a>
						</li>
						<li class="<?php if(ACTION_NAME=='booklist') echo('active'); ?>">
							<a href="<?php echo U('booklist');?>">读书狼作品资料库</a>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>

		


<div class="container-fluid">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"> 主播名：<?php echo ($info["nickname"]); ?> <span class="pull-right">EXP:<?php echo ($info["exp"]); ?></span></h3>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<th>朗读内容</th>
					<th>章节</th>
					<th>完成情况</th>
					<th>赞数量</th>
					<!-- <th class="hidden-xs">权限</th> -->
				</thead>
				<tbody>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td name="nickname">《<?php echo ($vo["title"]); ?>》</td>
							<td><?php echo ($vo["chapter"]); ?></td>
							<td><?php echo ($vo["text"]); ?></td>
							<td name="zan"><?php echo ($vo["zan"]); ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
			</table>

		</div>
		<nav class="text-center">
			<div class="manu">
				<?php echo ($page); ?>
			</div>
		</nav>
	</div>
</div>

	</body>
</html>