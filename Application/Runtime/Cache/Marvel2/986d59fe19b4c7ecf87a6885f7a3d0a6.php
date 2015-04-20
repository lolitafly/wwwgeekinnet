<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>超级英雄连连看</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,target-densitydpi=medium-dpi,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
		<link rel="stylesheet" href="/Public/Marvel2/css/jquery.mobile-1.3.2.min.css">
		<!-- <link rel="stylesheet" href="css/progressBar.css"> -->
		<link rel="stylesheet" href="/Public/Marvel2/css/style.css">
		<script src="/Public/Marvel2/js/jquery-1.11.2.min.js"></script>
		<script src="/Public/Marvel2/js/jquery.mobile-1.3.2.min.js"></script>
		<script src="/Public/Marvel2/js/script.js"></script>
		<script type="text/javascript" src="/Public/Marvel2/js/hero.js"></script>
		<script>
			
			$(document).ready(function() {
				$('body').on('touchmove', function (event) {
				    event.preventDefault();
				});
				
				$.mobile.showPageLoadingMsg('a', "加载中...");
				preload();
				$.mobile.hidePageLoadingMsg();
			});
		
			//动态交互
			var minScore="<?php echo ($minScore); ?>";
			$(document).ready(function() {
				$("#getprize_btn").bind("tap", function() {
					var param={};
					param.phone=$("#phone").val();
					param.score=score;
					if(score>=minScore&&param.phone!=""){
						if(check(param)){
							$.ajax({
								url:'/marvel2.php/Index/submit',
								type:'post',
								dataType:'json',
								data:param,
								success:function(r){
									console.log(r);
								},
								error:function(){
									console.log("connect error");
								}
							});
						}else{
							return;
						}
					}
					
					$.mobile.changePage("#prize1", {
						transition : "flip"
					});
					
				});
			});
			
			function check(p){
				if(!isPhone(p.phone)){
					alert("手机格式错误！");
					return false;
				}
				return true;
			}
			
			function isPhone(a){
				var reg= /^[1][358]\d{9}$/;
				return reg.test(a);
			}
			
		</script>
		<script type="text/javascript">
            var images = new Array();
            function preload() {
                for (i = 0; i < preload.arguments.length; i++) {
                    images[i] = new Image();
                    images[i].src = preload.arguments[i];
                }
            }
            preload(
                "/Public/Marvel2/images/1.png",
                "/Public/Marvel2/images/2.png",
                "/Public/Marvel2/images/3.png",
                "/Public/Marvel2/images/4.png",
                "/Public/Marvel2/images/5.png",
                "/Public/Marvel2/images/6.png",
                "/Public/Marvel2/images/number/0.png",
                "/Public/Marvel2/images/number/1.png",
                "/Public/Marvel2/images/number/2.png",
                "/Public/Marvel2/images/number/3.png",
                "/Public/Marvel2/images/number/4.png",
                "/Public/Marvel2/images/number/5.png",
                "/Public/Marvel2/images/number/6.png",
                "/Public/Marvel2/images/number/7.png",
                "/Public/Marvel2/images/number/8.png",
                "/Public/Marvel2/images/number/9.png"
            );
    	</script>
	</head>
	<body>
		<div data-role="page" id="start">
			<img src="/Public/Marvel2/images/share.jpg" style="width:0px; height:0px; overflow:hidden;z-index: 0;padding:0;margin:0;position:absolute;" />
			<div class="startBtn-group">
				<a href="#game" data-transition="flip"><img src="/Public/Marvel2/images/start_btn.png" class="start_btn"/></a>
				<img src="/Public/Marvel2/images/rule_btn.png" class="rule_btn" id="rule_btn"/>
			</div>
			<div class="rule-mask">
				<h1>活动规则</h1>
				<ol>
					<li>活动时间：5月1日-5月31日</li>
					<li>游戏规则：找相同的盾牌，三个一组消除，30秒内全部消除即通关；</li>
					<li>通关可获得20元观影红包，限在时光网购买复仇者联盟2影票使用，红包数量有限，送完即止；</li>
					<li>通关可获得10元吉列天猫店优惠券，使用规则以吉列天猫店为准。</li>
				</ol>
				<img src="/Public/Marvel2/images/rule_close_btn.png" id="rule_close_btn"/>
			</div>
			<div class="imgstore"></div>
		</div>
		
		<div data-role="page" id="game">
			<div id="game-head">
				<div class="top">
					<span class="time" id="timer">
						<img src="/Public/Marvel2/images/number/2.png" />
						<img src="/Public/Marvel2/images/number/9.png" />
					</span>
					<img src="/Public/Marvel2/images/number/s.png" class="sec"/>
					<img src="/Public/Marvel2/images/logo.png" class="logo"/>
				</div>
				<div class="timeBar">
					<img src="/Public/Marvel2/images/timeBar.png" />
					<div class="meterBar">
						<span style="width:50%;"></span>
					</div>
				</div>
			</div>
			<img src="/Public/Marvel2/images/bar.png" class="bar"/>
			<div id="main"></div>
			<img src="/Public/Marvel2/images/game_bottom.png" class="bottom"/>
			
			<div class="result-mask" id="result-mask">
				<h1 id="scoreText">游戏成绩为0分</h1>
				<div class="inputForm" id="inputForm">
					<input type="number" id="phone"/>
					<p>输入您的手机号将有机会获得吉列剃须刀</p>
				</div>
				<p class="hint" id="hint">每日排名前30名将有机会获得吉列剃须刀</p>
				<div class="game-btns">
					<img src="/Public/Marvel2/images/game_btn1.png" class="left" id="restart_btn"/>
					<img src="/Public/Marvel2/images/game_btn2.png" class="right" id="getprize_btn"/>
				</div>
			</div>
		</div>
		
		<div data-role="page" id="prize1">
			<div class="prize-box">
				<h1><?php echo ($prize1); ?></h1>
				<img src="/Public/Marvel2/images/share_btn.png" class="share_btn" id="share_btn"/>
			</div>
			<div id="shareMask" class="shareMask">
				<img src="/Public/Marvel2/images/shareImg.png" />
				<p>点击分享到朋友圈</p>
			</div>
		</div>
		
		<div data-role="page" id="prize2">
			<div class="prize-box">
				<h1><?php echo ($prize2); ?></h1>
				<div class="twoBtns">
					<a href="#game" data-transition="flip"><img src="/Public/Marvel2/images/game_btn1.png" class="left" /></a>
					<a href="/marvel2.php/Index/rank" data-ajax='false'><img src="/Public/Marvel2/images/rank_btn.png" class="right" /></a>
				</div>
			</div>
		</div>
		
		
	</body>
</html>