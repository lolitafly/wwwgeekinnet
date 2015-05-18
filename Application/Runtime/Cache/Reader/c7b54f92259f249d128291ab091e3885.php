<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>读书狼任务管理系统</title>

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

		//添加主播表单提交
		$("form[name='addForm']").submit(function() {
			var param = {};
			param.bid = $("#add_bid").val();
			param.rid = $("#add_rid").val();
			param.chapter = $("#add_chapter").val();
			param.startpage = $("#add_startpage").val();
			param.endpage = $("#add_endpage").val();
			param.perform = $("#add_perform").val();
			param.zan = $("#add_zan").val();
			console.log(param);
			$.ajax({
				type : "POST",
				url : '/reader.php/System/plan_add',
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
			param.pid = $("#update_pid").val();
			param.chapter = $("#update_chapter").val();
			param.startpage = $("#update_startpage").val();
			param.endpage = $("#update_endpage").val();
			param.perform = $("#update_perform").val();
			param.zan = $("#update_zan").val();
			console.log(param);
			$.ajax({
				type : "POST",
				url : '/reader.php/System/plan_update',
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

	function deletePlan(pid) {
		if (confirm("删除后由其发起的朗读内容等均会被删除，确认删除？")) {
			var param = {};
			param.pid = pid;
			$.ajax({
				type : "POST",
				url : '/reader.php/System/plan_delete',
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
		console.log($(e).parents("tr").find("td[name='nickname']").text());
		$("#update_pid").val($(e).parents("tr").find("td[name='pid']").text());
		$("#update_nickname").val($(e).parents("tr").find("td[name='nickname']").text());
		$("#update_chapter").val($(e).parents("tr").find("td[name='chapter']").text());
		$("#update_startpage").val($(e).parents("tr").find("td[name='startpage']").text());
		$("#update_endpage").val($(e).parents("tr").find("td[name='endpage']").text());
		$("#update_perform").val($(e).parents("tr").find("td[name='perform']").text());
		$("#update_zan").val($(e).parents("tr").find("td[name='zan']").text());
	}
	
</script>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">朗读任务列表 《<?php echo ($info["title"]); ?>》
			<button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#addModal">
				添加朗读任务
			</button>
		</h3>
	</div>
	<div class="panel-body">
		<div class="btn-group">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				选择书名 <span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<?php if(is_array($booklist)): $i = 0; $__LIST__ = $booklist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/reader.php/System/plan/bid/<?php echo ($vo["bid"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		
		<table class="table table-striped table-hover">
			<thead>
				<th>昵称</th>
				<th>章节</th>
				<th class="hidden-xs">开始页码及句子</th>
				<th class="hidden-xs">结束页码及句子</th>
				<th class="hidden-xs">完成情况</th>
				<th class="hidden-xs">赞数量</th>
				<th>编辑</th>
				<th>删除</th>
				<!-- <th class="hidden-xs">权限</th> -->
			</thead>
			<tbody>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
						<!-- 隐藏数据 -->
						<td name="pid" class="hide"><?php echo ($list["pid"]); ?></td>
						<td name="perform" class="hide"><?php echo ($list["perform"]); ?></td>
						
						<td name="nickname"><?php echo ($list["nickname"]); ?></td>
						<td name="chapter"><?php echo ($list["chapter"]); ?></td>
						<td name="startpage" class="hidden-xs"><?php echo ($list["startpage"]); ?></td>
						<td name="endpage" class="hidden-xs"><?php echo ($list["endpage"]); ?></td>
						<td class="hidden-xs"><?php echo ($list["text"]); ?></td>
						<td name="zan" class="hidden-xs"><?php echo ($list["zan"]); ?></td>
						<td>
							<button type="button" class="btn btn-info btn-xs <?php if($list['perform']=='6'){echo 'disabled';} ?> " data-toggle="modal" data-target="#updateModal" onclick="showUpdateModal(this)" >
								编辑
							</button>
						</td>
						<td><a class="btn btn-danger btn-xs " onclick="deletePlan(<?php echo ($list["pid"]); ?>)">删除</a></td>
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
				<h4 class="modal-title" id="exampleModalLabel">添加朗读任务</h4>
			</div>
			<form name="addForm">
				<div class="modal-body">
					<div class="form-group">
						<label for="add_title" class="control-label">朗读内容:</label>
						<input type="text" class="form-control" id="add_title" placeholder="必须" value="<?php echo ($info["title"]); ?>" disabled="disabled">
						<input type="text" class="form-control hide" id="add_bid" placeholder="必须" value="<?php echo ($info["bid"]); ?>" disabled="disabled">
					</div>
					<div class="form-group">
						<label for="add_rid" class="control-label">主播:</label>
						<select class="form-control" id="add_rid">
							<?php if(is_array($readerlist)): $i = 0; $__LIST__ = $readerlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo2["rid"]); ?>"><?php echo ($vo2["nickname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="add_chapter" class="control-label">章节:</label>
						<input type="text" class="form-control" id="add_chapter" placeholder="必须">
					</div>
					<div class="form-group">
						<label for="add_startpage" class="control-label">开始页码及句子:</label>
						<input type="text" class="form-control" id="add_startpage" placeholder="可选">
					</div>
					<div class="form-group">
						<label for="add_endpage" class="control-label">结束页码及句子:</label>
						<input type="text" class="form-control" id="add_endpage" placeholder="可选">
					</div>
					<div class="form-group">
						<label for="add_perform" class="control-label">完成情况:</label>
						<select class="form-control" id="add_perform">
							<?php if(is_array($performlist)): $i = 0; $__LIST__ = $performlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo3["value"]); ?>"><?php echo ($vo3["text"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="add_zan" class="control-label">赞数量:</label>
						<input type="number" class="form-control" id="add_zan" value="0">
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

<!-- 编辑弹出框 -->
<div class="modal fade" id="updateModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">编辑朗读任务</h4>
			</div>
			<form name="updateForm">
				<div class="modal-body">
					<div class="form-group">
						<label for="update_title" class="control-label">朗读内容:</label>
						<input type="text" class="form-control" id="update_title" value="<?php echo ($info["title"]); ?>" disabled="disabled">
						<input type="text" class="form-control hide" id="update_pid" disabled="disabled">
					</div>
					<div class="form-group">
						<label for="update_nickname" class="control-label">主播:</label>
						<input type="text" class="form-control" id="update_nickname" disabled="disabled">
					</div>
					<div class="form-group">
						<label for="update_chapter" class="control-label">章节:</label>
						<input type="text" class="form-control" id="update_chapter" placeholder="必须">
					</div>
					<div class="form-group">
						<label for="add_starupdate_startpagetpage" class="control-label">开始页码及句子:</label>
						<input type="text" class="form-control" id="update_startpage" placeholder="可选">
					</div>
					<div class="form-group">
						<label for="update_endpage" class="control-label">结束页码及句子:</label>
						<input type="text" class="form-control" id="update_endpage" placeholder="可选">
					</div>
					<div class="form-group">
						<label for="update_perform" class="control-label">完成情况:</label>
						<select class="form-control" id="update_perform">
							<?php if(is_array($performlist)): $i = 0; $__LIST__ = $performlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo4): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo4["value"]); ?>"><?php echo ($vo4["text"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="update_zan" class="control-label">赞数量:</label>
						<input type="number" class="form-control" id="update_zan">
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