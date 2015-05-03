// swiper
var mySwiper;
function swiperInitial(){
	mySwiper = new Swiper('.swiper-container', {
		direction : 'vertical',
		// setWrapperSize : true,
		updateOnImagesReady : true,
	
		onInit: function(swiper){
	     	 //Swiper初始化了
	     	 console.log("init");
	     	 animate_page1();
	    },
		onSlideChangeStart : function(swiper) {
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
				case 2:animate_page3();break;
				case 3:animate_page4();break;
				case 4:animate_page5();break;
				case 5:animate_page6();break;
				case 6:animate_page7();break;
				default:break;
			}
		},
		onTouchStart : function(swiper, e) {
			// console.log(e);
			if ($(e.target).attr("id") == "move") {
				mySwiper.lockSwipes();
			}
		},
		onTouchEnd : function(swiper, e) {
			if ($(e.target).attr("id") == "move") {
				// alert(123);
				mySwiper.lockSwipes();
				$('#btn').addClass('animated fadeInLeft');
				setTimeout(function() {
					$('#btn').removeClass('animated fadeInLeft');
				}, 1100);
				mySwiper.unlockSwipes();
			}
		}
	});
}

function animate_page1(){
	$("#stageLight").addClass("animated stageLight");
	$("#heros").addClass("animated2 delayp5 fadeIn");
	$("#p1_title1").addClass("animated delayp1 fadeInLeftBig");
	$("#p1_title2").addClass("animated delayp1 fadeInRightBig");
	
}

function animate_page2(){
	$("#p2_slogan").addClass("animated fadeInRightBig");
	$("#p2_star").addClass("animated infinite delay1 flash");
}

function tap_page2(){
	$("#p2_lightSource").addClass("animated5 fadeIn");
	$("#p2_light").addClass("animated3 delay3 flyout");
	$("#p2_t1").addClass("animated6 delay4 fadeIn");
	$("#p2_t2").addClass("animated6 delay4 fadeIn");
}

function animate_page3(){
}
function animate_page4(){
}
function animate_page5(){
}
function animate_page6(){
}
function animate_page7(){
}

//调整样式
var w = $(window).width();
var h = $(window).height();
$(document).ready(function() {

});


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