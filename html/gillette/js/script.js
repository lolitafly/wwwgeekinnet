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
	    },
		onSlideChangeStart : function(swiper) {
			console.log(swiper.activeIndex);
			if (swiper.activeIndex == 1) {
				$('#btn').addClass('animated fadeInLeft');
				// alert(123);
				// mySwiper.lockSwipes();
			}
		},
		onTap : function(swiper, e) {
			// console.log(event);
			if ($(event.target).attr("id") == "imgBtn") {
	
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