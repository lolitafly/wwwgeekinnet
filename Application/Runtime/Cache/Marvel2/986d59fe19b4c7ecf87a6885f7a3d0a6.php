<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>吉列英雄季，抽取复仇者联盟神器剃须刀，赢一号专车红包</title>
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
			var _hmt = _hmt || [];
			(function() {
			  var hm = document.createElement("script");
			  hm.src = "//hm.baidu.com/hm.js?000c3bb572af8bfbdc7c6102e64b1f41";
			  var s = document.getElementsByTagName("script")[0]; 
			  s.parentNode.insertBefore(hm, s);
			})();
		</script>
		<script>
			
			$(document).ready(function() {
				// $('body').on('touchmove', function (event) {
				    // event.preventDefault();
				// });
				
				$.mobile.changePage("#start", {
					transition : "none"
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
				var reg= /^[1][3578]\d{9}$/;
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
			<!-- <img src="/Public/Marvel2/images/yihaozhuanche.png" class="logo2"/> -->
			<div class="rule-mask">
				<h1>活动规则</h1>
				<ol>
					<li>活动时间：5月1日-5月31日</li>
					<li>游戏规则：30秒内找相同的盾牌，两个一组消除；</li>
					<li>游戏结束后可获得10元或15元一号专车抵扣券及吉列京东商城优惠券；</li>
					<li>每天前100名有机会赢取吉列限量版英雄套装，限量500套；</li>
					<li>5月7日至5月11日每日游戏前一百名有机会获得《复仇者联盟2》观影礼票，仅限北上广地区；</li>
					<li>同一IP地址下24小时内只能领取一份，请尽量不要使用多人共享WIFI进入游戏。</li>
				</ol>
				<img src="/Public/Marvel2/images/rule_close_btn.png" id="rule_close_btn"/>
			</div>
			<div class="imgstore"></div>
		</div>
		
		<div data-role="page" id="game">
			<img src="/Public/Marvel2/images/game_bg.jpg" class="bg"/>
			<div class="game_content">
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
			</div>
			<!-- <img src="/Public/Marvel2/images/game_bottom.png" class="bottom"/> -->
			
			<div class="result-mask" id="result-mask">
				<img src="/Public/Marvel2/images/package.png" class="package"/>
				<h1 id="scoreText">游戏成绩为0分</h1>
				<div class="inputForm" id="inputForm">
					<input type="number" id="phone"/>
					<p>输入手机号参与抽奖，有机会赢得吉列限量版英雄套装</p>
				</div>
				<p class="hint" id="hint">每日排名前100名将有机会获得吉列限量版英雄套装及5月12日《复仇者联盟2》观影礼票3张</p>
				<div class="game-btns">
					<img src="/Public/Marvel2/images/game_btn1.png" class="left" id="restart_btn"/>
					<img src="/Public/Marvel2/images/game_btn3.png" class="right" id="getprize_btn"/>
				</div>
			</div>
		</div>
		
		<div data-role="page" id="prize1">
			<img src="/Public/Marvel2/images/prize_bg.jpg" class="bg"/>
			<img src="/Public/Marvel2/images/yihaozhuanche.png" class="logo1"/>
			<div class="prize-box" style="top:<?php echo ($flag=="1"?"20%":"15%"); ?>">
				<img src="/Public/Marvel2/images/prize_text<?php echo ($ticket["price"]); ?>.png" class="prize_text">
				<h1>券已发完，我们会尽快补充！</h1>
				<img src="/Public/Marvel2/images/usage.png" class="usage" style="display:<?php echo ($flag=="1"?"none":"block"); ?>;"/>
				<a href="#prize2" data-transition="flip"><img src="/Public/Marvel2/images/share_btn.png" class="share_btn" id="share_btn"/></a>
			</div>
			<div id="shareMask" class="shareMask">
				<img src="/Public/Marvel2/images/shareImg.png" />
				<p>点击分享到朋友圈</p>
			</div>
		</div>
		
		<div data-role="page" id="prize2">
			<img src="/Public/Marvel2/images/prize_bg.jpg" class="bg"/>
			<img src="/Public/Marvel2/images/yihaozhuanche.png" class="logo1"/>
			<div class="prize-box" style="top:<?php echo ($flag=="2"?"15%":"18%"); ?>">
				<img src="/Public/Marvel2/images/prize_text.png" class="prize_text">
				<a href="http://sale.jd.com/m/act/svP4W2Dn1tX.html "><img src="/Public/Marvel2/images/jd_btn.png" class="jd_btn"/></a>
				<img src="/Public/Marvel2/images/share_btn1.png" class="share_hint"/>
				<img src="/Public/Marvel2/images/usage.png" class="usage" style="display:<?php echo ($flag=="2"?"none":"block"); ?>;"/>
				<div class="twoBtns">
					<a href="#game" data-transition="flip"><img src="/Public/Marvel2/images/game_btn1.png" class="left" /></a>
					<a href="/marvel2.php/Index/rank" data-ajax='false'><img src="/Public/Marvel2/images/rank_btn.png" class="right" /></a>
				</div>
			</div>
		</div>
		
		
	</body>
</html>