<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>读书狼任务管理系统</title>

    <!-- Bootstrap -->
    <link href="/Public/Oa/css/bootstrap.css" rel="stylesheet">

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
    <script>
	    $(document).ready(function(){
	    	$("#loginForm").submit(function (){ 
	    		$("#pwdHint").removeClass("glyphicon-remove");
	    		$("#usernameHint").removeClass("glyphicon-remove");
			    $.ajax({
	                type: "POST",
	                url:'/reader.php/System/login_submit',
	                data:$(this).serialize(),// 你的formid
	                dataType:'json',
	                async: false,
	                error: function(request){
	                    alert("Connection error");
	                },
	                success: function(r) {
	                	if(r.status==1){
	                		window.location.href="<?php echo U('index');?>";
	                	}else if(r.status==2){
	                		$("#pwdHint").addClass("glyphicon-remove");
	                	}else if(r.status==3){
	                		$("#usernameHint").addClass("glyphicon-remove");
	                	}
	                }
	            });
			    return false; //阻止表单的默认提交事件 
		    });
	    });
    </script>
  </head>
  <body>
  	
   <nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" >
	      	读书狼任务管理系统
	      </a>
	    </div>
	  </div>
	</nav>
  	
  	<div class="container">
		<form class="form-horizontal col-sm-offset-2 col-sm-6" id="loginForm">
		  <div class="form-group   has-feedback">
		    <label for="username" class="col-sm-2 control-label">用户名</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="username" placeholder="Username"  aria-describedby="usernameError" name="username">
		      <span class="glyphicon form-control-feedback" aria-hidden="true" id="usernameHint"></span>
		    </div>
		  </div>
		  
		  <div class="form-group has-feedback">
		    <label for="password" class="col-sm-2 control-label">密码</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="password" placeholder="Password"  aria-describedby="passwordError" name="password">
		      <span class="glyphicon form-control-feedback" aria-hidden="true" id="pwdHint"></span>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <div class="checkbox">
		        <button type="submit" class="btn btn-default" >登 陆</button>
		      </div>
		    </div>
		  </div>
		</form>
  	</div>
    
  </body>
</html>