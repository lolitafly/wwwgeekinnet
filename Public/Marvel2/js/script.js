var totaltime = 20;
var temptime=0;
var score = 0;
var mytimer;
var jumpTimer;
//倒计时对象
$(document).ready(function() {
	// $.mobile.hidePageLoadingMsg();
	
	//page1
	$("#rule_btn").bind("tap", function() {
		setTimeout(function() {
			$(".rule-mask").show();
		}, 100);
	});
	$("#rule_close_btn").bind("tap", function() {
		setTimeout(function() {
			$(".rule-mask").hide();
		}, 200);
	});
	
	//page2
	$("#restart_btn").bind("tap", function() {
		$("#result-mask").hide();
		setTimeout(function() {
			initial();
			gameReset();
			scoreReset();
			gogogo();
		}, 200);
	});
	
	
	//page3
	$("#share_btn").bind("tap", function() {
		setTimeout(function() {
			$("#shareMask").show();
			if(!jumpTimer){
				jumpTimer=setTimeout(function() {
					$.mobile.changePage("#prize2", {
						transition : "flip"
					});
				}, 5000);
			}
		}, 100);
	});
	$("#shareMask").bind("tap", function() {
		setTimeout(function() {
			$("#shareMask").hide();
		}, 100);
	});
});

$(document).on("pagebeforecreate", function() {
	loadImg();
	$.mobile.showPageLoadingMsg('a', "Please wait...");
});

function loadImg() {
	for (var i = 1; i <= imageTypeNum; i++) {
		var temp = "<img src=\"images/" + i + ".png\" />";
		$("div.imgstore").append(temp);
	}
}


//离开游戏页时
$(document).on("pagehide", "#game", function() {
	$(".meter span").stop();
	//动画停止
	clearInterval(mytimer);
	//倒计时停止
});

//游戏页面进入时
$(document).on("pagebeforeshow", "#game", function() {
	$("#result-mask").hide();
	initial();
	gameReset();
	scoreReset();
	gogogo();
});

//进入领奖页1时
$(document).on("pagebeforeshow", "#prize1", function() {
	$("#shareMask").hide();
	document.title = '超级英雄连连看我的分数为' + score + ",求超越！";
});

//离开领奖页1时
$(document).on("pagehide", "#prize1", function() {
	document.title = '超级英雄连连看';
	clearTimeout(jumpTimer);
	jumpTimer=null;
});

//进入领奖页2时
$(document).on("pagebeforeshow", "#prize2", function() {
	
});

function initial() {
	// 倒计时条
	$(".meterBar span").css("width", "100%");
	//倒计时时间
	temptime=totaltime;
	setTime(totaltime);
	//游戏中图片数量重置
	imageTotal = rowImageNum * colImageNum;
}

function scoreReset() {
	score = 0;
}

function gogogo() {
	mytimer = setInterval("timer()", 1000);
	$(".meterBar span").animate({
		width : "0%"
	}, (totaltime + 1) * 1000);
}

//设置数字时间
function setTime(t){
	var temp=String(t);
	var html="";
	for(var i=0;i<temp.length;i++){
		html+="<img src=\"Public/Marvel2/images/number/"+temp.charAt(i)+".png\" />";
	}
	$("#timer").html(html);
}

//倒计时函数
function timer() {
	if (temptime == 0) {
		timeup();
	} else {
		temptime-=1;
		setTime(temptime);
	}
}

//时间到函数
function timeup() {
	$("#main img").unbind();
	//动画停止
	clearInterval(mytimer);
	//倒计时停止
	$("#scoreText").text("游戏成绩为" + score + "分");
	setTimeUpContent();
	$("#result-mask").show();
}

//设置游戏结束弹出框内容
function setTimeUpContent(){
	if(score>=minScore){
		$("#inputForm").show();
		$("#hint").hide();
	}else{
		$("#inputForm").hide();
		$("#hint").show();
	}
}


//调整样式
var w = $(window).width();
var h = $(window).height();
$(document).ready(function() {
	console.log("widht:" + w + ";height:" + h);
	if(w>900){
		console.log("桌面");
		console.log($("div[data-role='page']"));
		$("body").width(700);
		$("body").css("margin","0 auto");
	}
	
	// page1
	$("div.startBtn-group").css("margin-top",w*1.25 + "px");
	if(h<500){
		$(".rule-mask h1").css("margin-top",8 + "px");
		$(".rule-mask ol").css("margin-top",8 + "px");
		$(".rule-mask img").css("margin-top",10 + "px");
	}
	//page2
	$("#game-head div.top").height(h*0.07);
	var meterw=w*0.85;
	var th=meterw*5/533;
	var top=meterw*14/533;
	$("div.meterBar").height(th);
	$("div.meterBar").css("top",top+"px");
	// page3
	$(".prize-box").css("margin-top",w*120/350+"px");
	
});




