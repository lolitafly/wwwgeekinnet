<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<html>
	<head>
		<title>H5案例</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="format-detection" content="telephone=no" />
		<script src="/Public/H5demo/js/zepto.min.js"></script>
		<style>
			*{margin:0;padding:0;border:none;font-family:"Arial","微软雅黑"; }
			h1{font-size:20px;width:100%;text-align:center;}
			.banner{width:100%;}
			ul{margin:0 auto;width:94%;list-style: none;}
			ul li{border-top:1px solid #f2f2f2;padding:10px 0;}
			ul li img{width:25%;display: inline-block;vertical-align: top;}
			ul li div.text-wrap{width:70%;display: inline-block;padding-left:5px;}
			h2{font-size:16px;}
			p{font-size:14px;margin-top:15px;color:#666;}
		</style>
	</head>
	<body>
		<img src="/Public/H5demo/img/logo/<?php echo ($logo); ?>" class="banner"/>
		<ul>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li onclick="javascript:window.location.href='<?php echo ($vo["url"]); ?>'">
					<img src="/Public/H5demo/img/<?php echo ($vo["img"]); ?>" />
					<div class="text-wrap">
						<h2><?php echo ($vo["title"]); ?></h2>
						<p><?php echo ($vo["desc"]); ?></p>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</body>
</html>