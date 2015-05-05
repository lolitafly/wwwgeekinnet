var sound1 = document.getElementById('sound1'); 
var sound2 = document.getElementById('sound2'); 
var sound3 = document.getElementById('sound3'); 
var sound4 = document.getElementById('sound4'); 
var bg_music = document.getElementById('bg_music'); 
bg_music.volume=0.4;
var sound_on=true;
// swiper
var mySwiper;
var page2_flag=0;
var page3_flag=0;
var page4_flag=0;
var page5_flag=0;
var page6_flag=0;
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
		lazyLoading : true,
		lazyLoadingInPrevNext : true,
	
		onInit: function(swiper){
	     	animate_page1();
	    },
	    onSlideChangeStart : function(swiper) {
		},
		onSlideChangeEnd : function(swiper) {
			switch(swiper.activeIndex){
				case 1:animate_page2();break;
				case 2:animate_page3();break;
				case 3:animate_page4();break;
				case 4:animate_page5();break;
				case 5:animate_page6();break;
				default:break;
			}
		},
		onTap : function(swiper, e) {
			switch($(e.target).attr("id")){
				case "p2_tapImg":tap_page2();break;
				case "p2_hint":tap_page2();break;
				case "hint_shake":shake_page4();break;
				default:break;
			}
		},
		onTouchStart : function(swiper, e) {
			
			//控制音乐
			if($(e.target).attr("name")=="music_icon"){
				sound_on?music_pause():music_play();
			}
			if($(e.target).attr("id") == "press_mask"){
				press_start_time=new Date().getTime();
				page3_timer=setTimeout(function(){
					tap_page3();
				},1500);
			}
			//屏蔽触控视频后翻页
			if ($(e.target).attr("id") == "tenvideo_video_player_0" ||$(e.target).attr("class")=="tvp_shadow"||$(e.target).attr("id") == "controlBtn") {

			}
		},
		onTouchEnd : function(swiper, e) {
			clearTimeout(page3_timer);
			if ($(e.target).attr("id") == "p5_touchMoveImg" && page5_flag==0) {
				touchMove_page5();
			}
			if ($(e.target).attr("id") == "tenvideo_video_player_0" ||$(e.target).attr("class")=="tvp_shadow"||$(e.target).attr("id") == "controlBtn") {

			}
		}
	});
	//初始化后锁屏
	 mySwiper.lockSwipes();
}

var u = navigator.userAgent, app = navigator.appVersion;
var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Linux') > -1; //android终端或者uc浏览器
var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
console.log(isiOS);

function animate_page1(){
	setTimeout(function(){
		$("#stageLight").addClass("animated2 stageLight");
		$("#heros").addClass("animated2 delay2 fadeIn");
		$("#logo").addClass("animated delay2p5 fadeInUp");
		$("#p1_title1").addClass("animated delay3 fadeInLeftBig");
		$("#p1_title2").addClass("animated delay3 fadeInRightBig");
		setTimeout(function(){
			$("#page1 img.arrow").show();
			mySwiper.unlockSwipes();
		},4000);
	},100);
}

function animate_page2(){
	if(page2_flag==0){
		mySwiper.lockSwipes();
	}
	setTimeout(function(){
		$("#p2_slogan").addClass("animated fadeInRightBig");
		$("#p2_star").addClass("animated infinite delay1 flash");
	},100);
}

function tap_page2(){
	if(page2_flag==0){
		page2_flag=1;
		setTimeout(function(){
			if(sound_on){
				sound1.play();
			} 
		},700);
		setTimeout(function(){
			$("#p2_lightSource").addClass("animated lightSource");
			$("#p2_light").addClass("animated delay1 flyOutUpRight");
			$("#p2_t1").addClass("animated2 delay1p5 fadeIn");
			$("#p2_hint").fadeOut();
			
			setTimeout(function(){
				$("#page2 img.arrow").show();
				mySwiper.unlockSwipes();
			},2700);
		},100);
	}
}

function animate_page3(){
	if(page3_flag==0){
		mySwiper.lockSwipes();
	}
	setTimeout(function(){
		$("#p3_slogan").addClass("animated fadeInDownBig");
		$("#p3_star").addClass("animated infinite delay1 flash");
	},100);
}

function tap_page3(){
	if(page3_flag==0){
		page3_flag=1;
		setTimeout(function(){
			$("#p3_tapImg").addClass("animated2 fadeOutUp");
			$("#p3_subject").addClass("animated2 delay1 zoomIn");
			$("#p3_t").addClass("animated2 delay2 fadeInUp");
			
			$("#p3_hint").fadeOut();
			$("#p3_presson").fadeOut();
			setTimeout(function(){
				if(sound_on){
					sound2.play();
				}
			},700);
			setTimeout(function(){
				$("#page3 img.arrow").show();
				mySwiper.unlockSwipes();
			},4000);
		},100);
	}
}

function animate_page4(){
	if(page4_flag==0){
		mySwiper.lockSwipes();
	}
	setTimeout(function(){
		$("#p4_slogan").addClass("animated fadeInLeftBig");
		$("#p4_star").addClass("animated infinite delay1 flash");
	},100);
}

function shake_page4(){
	if(page4_flag==0){
		mySwiper.lockSwipes();
		page4_flag=1;
		setTimeout(function(){
			$("#p4_subject").addClass("animated9 forSafe");
			$("#p4_lightSource").addClass("animated lightSource");
			$("#p4_light_bg").addClass("animated delay1 expandUp");
			$("#p4_light").addClass("animatedp3 delay2 fadeIn");
			$("#p4_t1").addClass("animated2 delay2p5 fadeIn");
			
			
			$("#hint_shake").fadeOut();
			setTimeout(function(){
				if(sound_on){
					sound3.play();
				}
			},1700);
			setTimeout(function(){
				$("#page4 img.arrow").show();
				mySwiper.unlockSwipes();
				$("#p4_light_bg").removeClass("animated delay1 expandUp hide");
				$("#p4_lightSource").removeClass("animated lightSource hide");
				$("#p4_subject").removeClass("animated9 forSafe");
				$("#p4_light").removeClass("animatedp3 delay2 fadeIn hide");
			},4000);
		},100);
	}
}

function animate_page5(){
	if(page5_flag==0){
		mySwiper.lockSwipes();
	}
	setTimeout(function(){
		$("#p5_slogan").addClass("animated fadeInRightBig");
		$("#p5_star").addClass("animated infinite delay1 flash");
	},100);
}

function touchMove_page5(){
	if(page5_flag==0){
		mySwiper.lockSwipes();
		page5_flag=1;
		setTimeout(function(){
			$("#p5_touchMoveImg").addClass("animated9 forSafe");
			$("#p5_shield").addClass("animated1p5 flyOutUpLeft");
			$("#p5_t2").addClass("animated delayp5 fadeInLeftBig");
			$("#p5_t3").addClass("animated delayp5 fadeInRightBig");
			
			$("#p5_hint").fadeOut();
			
			setTimeout(function(){
				if(sound_on){
					sound4.play();
				}
			},200);
			setTimeout(function(){
				$("#page5 img.arrow").show();
				mySwiper.unlockSwipes();
				$("#p5_shield").removeClass("animated1p5 flyOutUpLeft");
			},1500);
		},100);
	}
}

function animate_page6(){
	if(page6_flag==0){
		page6_flag=1;
		mySwiper.lockSwipes();
		setTimeout(function(){
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
				mySwiper.unlockSwipes();
			},9000);
		},100);
	}
}

function music_play(){
	$(".music_icon").attr("src","images/music_icon.png");
	if(isiOS) bg_music.play();
	sound_on=!sound_on;
}

function music_pause(){
	$(".music_icon").attr("src","images/music_pause.png");
	if(isiOS) bg_music.pause();
	sound_on=!sound_on;
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


//调整样式
var w = $(window).width();
var h = $(window).height();
$(document).ready(function() {
	if(isiOS) bg_music.play();
	
	if(w>h){
		tempw=h;
		h=w;
		w=tempw;
	}
	// page2
	$(".p2_main").width(h*0.9/476*210);
	
	// page4
	var tempTop=w*0.5/375*706-h*0.45-w*0.46/340*758*0.2;
	if(tempTop>0){
		$(".p4_top").css("top",-tempTop+"px");
	}
	var p4_text_width=(h*0.45*0.9)/496*98;
	$(".p4_text").width(p4_text_width);
	$(".p4_text").css("top",tempTop+h*0.45*0.08+"px");
	
	// page6
	var tempHeight=w*0.6/480*(825+400);
	if(tempHeight>h){
		tempHiehgt=h*0.95;
	}
	$(".p6_intro_bg").height(tempHeight);
	
	// page7
	bottom_width=(h-w*0.92)/282*342;
	$(".p7_block").css("top",w*0.91+"px");
	if(bottom_width<w*0.6){
		$(".p7_block").width(bottom_width);
		$(".p7_block").css("left",(w-bottom_width)/2+"px");
	}
});










