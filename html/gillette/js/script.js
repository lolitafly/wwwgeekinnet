var sound1 = document.getElementById('sound1'); 
var sound2 = document.getElementById('sound2'); 
var sound3 = document.getElementById('sound3'); 
var sound4 = document.getElementById('sound4'); 
// swiper
var mySwiper;
var page2_flag=0;
var page3_flag=0;
var page4_flag=0;
var page5_flag=0;
var press_start_time=0;
var page3_timer;
function Initial(){
	//初始化重力感应
	if (window.DeviceMotionEvent) {
		window.addEventListener('devicemotion', deviceMotionHandler, false);
	}else{
		console.log("不支持重力感应");
	}
	
	//初始化swiper
	mySwiper = new Swiper('.swiper-container', {
		direction : 'vertical',
		// setWrapperSize : true,
		updateOnImagesReady : true,
	
		onInit: function(swiper){
	     	 animate_page1();
	    },
		onSlideChangeEnd : function(swiper) {
			switch(swiper.activeIndex){
				case 1:animate_page2();break;
				case 2:animate_page3();break;
				case 3:animate_page4();break;
				case 4:animate_page5();break;
				case 5:animate_page6();break;
				case 6:animate_page7();break;
				default:break;
			}
		},
		onTap : function(swiper, e) {
			console.log($(e.target).attr("id"));
			switch($(e.target).attr("id")){
				case "p2_tapImg":tap_page2();break;
				case "p2_hint":tap_page2();break;
				case "hint_shake":shake_page4();break;
				default:break;
			}
		},
		onTouchStart : function(swiper, e) {
			console.log($(e.target).attr("id"));
			if($(e.target).attr("id") == "press_mask"){
				press_start_time=new Date().getTime();
				page3_timer=setTimeout(function(){
					tap_page3();
				},1500);
			}
			if ($(e.target).attr("id") == "p5_touchMoveImg" && page5_flag==0) {
				mySwiper.lockSwipes();
			}
			//屏蔽触控视频后翻页
			if ($(e.target).attr("id") == "tenvideo_video_player_0" ||$(e.target).attr("class")=="tvp_shadow"||$(e.target).attr("id") == "controlBtn") {
				mySwiper.lockSwipes();
			}
		},
		onTouchEnd : function(swiper, e) {
			clearTimeout(page3_timer);
			if ($(e.target).attr("id") == "p5_touchMoveImg" && page5_flag==0) {
				mySwiper.lockSwipes();
				touchMove_page5();
			}else{
				mySwiper.unlockSwipes();
			}
		}
	});
}

function animate_page1(){
	$("#stageLight").addClass("animated2 stageLight");
	$("#heros").addClass("animated2 delay2 fadeIn");
	$("#logo").addClass("animated delay2p5 fadeInUp");
	$("#p1_title1").addClass("animated delay3 fadeInLeftBig");
	$("#p1_title2").addClass("animated delay3 fadeInRightBig");
	setTimeout(function(){
		$("#page1 img.arrow").show();
	},4000);
}

function animate_page2(){
	$("#p2_slogan").addClass("animated fadeInRightBig");
	$("#p2_star").addClass("animated infinite delay1 flash");
}

function tap_page2(){
	if(page2_flag==0){
		page2_flag=1;
		$("#p2_lightSource").addClass("animated lightSource");
		$("#p2_light").addClass("animatedp5 delay1 flyOutUpRight");
		$("#p2_t1").addClass("animated2 delay1p5 fadeIn");
		
		$("#p2_hint").fadeOut();
		setTimeout(function(){
			sound1.play();
		},1000);
		setTimeout(function(){
			$("#page2 img.arrow").show();
		},3500);
	}
}

function animate_page3(){
	$("#p3_slogan").addClass("animated fadeInDownBig");
	$("#p3_star").addClass("animated infinite delay1 flash");
}

function tap_page3(){
	if(page3_flag==0){
		page3_flag=1;
		$("#p3_tapImg").addClass("animated2 fadeOutUp");
		$("#p3_subject").addClass("animated2 delay1 zoomIn");
		$("#p3_t").addClass("animated2 delay2 fadeInUp");
		
		$("#p3_hint").fadeOut();
		$("#p3_presson").fadeOut();
		setTimeout(function(){
			sound2.play();
		},1000);
		setTimeout(function(){
			$("#page3 img.arrow").show();
		},4000);
	}
}

function animate_page4(){
	$("#p4_slogan").addClass("animated fadeInLeftBig");
	$("#p4_star").addClass("animated infinite delay1 flash");
}

function shake_page4(){
	if(page4_flag==0){
		page4_flag=1;
		$("#p4_lightSource").addClass("animated lightSource");
		$("#p4_light_bg").addClass("animated delay1 expandUp");
		$("#p4_light").addClass("animatedp3 delay2 fadeIn");
		$("#p4_t1").addClass("animated2 delay2 fadeIn");
		$("#p4_t2").addClass("animated2 delay2 fadeIn");
		
		$("#hint_shake").fadeOut();
		setTimeout(function(){
			sound3.play();
		},100);
		setTimeout(function(){
			$("#page4 img.arrow").show();
		},4000);
	}
}

function animate_page5(){
	$("#p5_slogan").addClass("animated fadeInRightBig");
	$("#p5_star").addClass("animated infinite delay1 flash");
	
}

function touchMove_page5(){
	if(page5_flag==0){
		page5_flag=1;
		$("#p5_shield").addClass("animated2 flyOutUpLeft");
		$("#p5_t2").addClass("animated delayp5 fadeInLeftBig");
		$("#p5_t3").addClass("animated delayp5 fadeInRightBig");
		
		$("#p5_hint").fadeOut();
		touchMove_flag=1;
		mySwiper.unlockSwipes();
		
		setTimeout(function(){
			sound4.play();
		},200);
		setTimeout(function(){
			$("#page5 img.arrow").show();
		},1500);
	}
}

function animate_page6(){
	$("#p6_p1").addClass("animated3 fadeInUpLeft");
	$("#p6_p2").addClass("animated3 fadeInUpRight");
	$("#p6_p3").addClass("animated3 fadeInDownRight");
	$("#p6_p4").addClass("animated3 fadeInDownLeft");
	
	$("#p6_subject").addClass("animated6 delay2 p6_subject_animate");
	$("#p6_bg").addClass("animated3 delay5 fadeInDown");
	$("#p6_intro1").addClass("animated delay5 fadeIn");
	$("#p6_intro2").addClass("animated delay6 fadeIn");
	$("#p6_intro3").addClass("animated delay6p5 fadeIn");
	$("#p6_left").addClass("animated delay8 fadeIn");
	$("#p6_right").addClass("animated delay9 fadeIn");
	setTimeout(function(){
		$("#page6 img.arrow").show();
	},10000);
}

function animate_page7(){
}

//page4 摇动触发
var SHAKE_THRESHOLD = 500;
var last_update = 0;
var x;
var y;
var z;
var last_x;
var last_y;
var last_z;
var count = 0;
function deviceMotionHandler(eventData) {
	var acceleration = eventData.accelerationIncludingGravity; 
	var curTime = new Date().getTime();
	var diffTime = curTime -last_update;
	if (diffTime > 100) {
		last_update = curTime;
		x = acceleration.x; 
		y = acceleration.y;
		z = acceleration.z;
		var speed = Math.abs(x + y + z - last_x - last_y - last_z) / diffTime * 10000; 
		if (speed > SHAKE_THRESHOLD &&mySwiper.activeIndex==3) {
			shake_page4();
		}
		last_x = x;
		last_y = y;
		last_z = z;
	}
}


//腾讯视频
function initVideo() {
	videoWidth = screenWidth - 20;
	videoHeight = videoWidth * (1080 / 1920);
	video = new tvp.VideoInfo();
	index = 0;
	flag = 0;

	$(".video-box").css({"width": videoWidth, "height": videoHeight});
	$(".video-wrap").css("margin-left", -videoWidth / 2);

	//	设定视频id
	video.setVid('r0152z1m9rg');

	player = new tvp.Player();
	player.create({
		width: '100%',
		height: '100%',
		video: video,
		modId: "mod_player",
		isHtml5ControlAlwaysShow: false,
		isHtml5UseUI: true,
		html5LiveUIFeature: false,
		isHtml5UseFakeFullScreen: true,
		isiPhoneShowPlaysinline: true,
		vodFlashExtVars: {
			share: 0, follow: 0, showlogo: 0, clientbar: 0
		},
		plugins: {
			AppBanner: 0,
			AppRecommend: 0
		},
		autoplay: false,
		onplay: function () {
			// 开始加载视频资源准备播放
		},
		onplaying: function () {
			// 开始播放视频第一帧

			// 去掉视频缩略图
			$('#mod_player').addClass('mod_player_off');
			$(".tvp_shadow").css("display", "none");
			flag = 1;
			$(".video-control").css("opacity", "1");
			
		},
		onpause: function () {
			// 当输出播放器时
			flag = 0;
		},
		onallended: function () {
			//播放到最后完毕
			mySwiper.unlockSwipes();
		},
		onfullscreen: function (a) {
			// alert(parseInt(player.getPlayer().currentTime) + 'xx' + parseInt(player.getPlayer().duration))
			// 用户点击 done 退出全屏的时候 a 为 false
			// 切当前已播放时长等于视频总时长才触发
			$(".video-control").css("opacity", "0");
			var currentTime = parseInt(player.getPlayer().currentTime);
			var fulltTime = parseInt(player.getPlayer().duration);

			// 若没放完成，则会返回时长是 0
			if (!a && currentTime && fulltTime && currentTime == fulltTime) {
				// 执行后面的动画 -> 设备动画小于 iPhone 5c
				// 注意这种情况下,包括最上方的 onallended , doSomething(),执行了两遍, 有些事件需要先解绑在绑定
				doSomething();
			}
		}
	});

	$('#controlBtn').on("touchstart", function () {
		if(flag == 0){
			mySwiper.lockSwipes();
			player.getPlayer().play();
			$(".video-control").removeClass("video-control_play");
		}
		else{
			mySwiper.unlockSwipes();
			player.getPlayer().pause();
			$(".video-control").addClass("video-control_play");
		}
	});
}

var  screenHeight = document.documentElement.clientHeight,
	 screenWidth = document.documentElement.clientWidth,
	 video,
	 videoWidth,
	 videoHeight,
	 index,
	 flag,
	 player;

$(document).ready(initVideo());