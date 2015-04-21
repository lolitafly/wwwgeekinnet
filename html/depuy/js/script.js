//动画
$(document).on("pagebeforeshow", "#page1", function() {
	//隐藏
	$('#p1_logo').css("visibility","hidden");
	$('#p1_title').css("visibility","hidden");
	$('#p1_t1').css("visibility","hidden");
	$('#p1_t2').css("visibility","hidden");
	$('#p1_t3').css("visibility","hidden");
	$('#p1_t4').css("visibility","hidden");
	$('#p1_t5').css("visibility","hidden");
	$('#p1_t6').css("visibility","hidden");
	$('#p1_p1').css("visibility","hidden");
	$('#page1 img.arrow').hide();
	//重置动画
	$('#p1_logo').removeClass("animated zoomIn");
	$('#p1_title').removeClass("animated bounceInRight");
	$('#p1_t1').removeClass("animated fadeInUp");
	$('#p1_t2').removeClass("animated fadeInUp");
	$('#p1_t3').removeClass("animated fadeInUp");
	$('#p1_t4').removeClass("animated fadeInUp");
	$('#p1_t5').removeClass("animated fadeInUp");
	$('#p1_t6').removeClass("animated fadeInUp");
	$('#p1_p1').removeClass("animated slideInUp");
	
	//动画时间轴
	$('#p1_p2').addClass('animated fadeInLeftBig');
	setTimeout(function(){
		$('#p1_p1').css("visibility","visible");
		$('#p1_p1').addClass('animated slideInUp');
	},1200);
	
	$('#p1_logo').css("visibility","visible");
	$('#p1_logo').addClass('animated zoomIn');
	setTimeout(function(){
		$('#p1_title').css("visibility","visible");
		$('#p1_title').addClass('animated bounceInRight');
	},600);
	setTimeout(function(){
		$('#p1_t1').css("visibility","visible");
		$('#p1_t1').addClass('animated fadeInUp');
	},1600);
	setTimeout(function(){
		$('#p1_t2').css("visibility","visible");
		$('#p1_t2').addClass('animated fadeInUp');
	},2000);
	setTimeout(function(){
		$('#p1_t3').css("visibility","visible");
		$('#p1_t3').addClass('animated fadeInUp');
	},2400);
	setTimeout(function(){
		$('#p1_t4').css("visibility","visible");
		$('#p1_t4').addClass('animated fadeInUp');
	},2800);
	setTimeout(function(){
		$('#p1_t5').css("visibility","visible");
		$('#p1_t5').addClass('animated fadeInUp');
	},3200);
	setTimeout(function(){
		$('#p1_t6').css("visibility","visible");
		$('#p1_t6').addClass('animated fadeInUp');
	},3600);
	setTimeout(function(){
		$('#page1 img.arrow').show();
	},3900);
	
});

//过渡页
var page2_timer;
$(document).on("pagebeforeshow", "#page2,#page4,#page6,#page8,#page10,#page12,#page14,#page16,#page18,#page20", function(e) {
	$('.p2_title').css("visibility","hidden");
	$('.p2_title').removeClass("animated slideInLeft");
	
	$(".p2_bgimg").addClass('animated rotateIn');
	setTimeout(function(){
		$('.p2_title').css("visibility","visible");
		$('.p2_title').addClass('animated slideInLeft');
	},1000);
	var nextPageId=$(e.target).next("div").attr("id");
	page2_timer=setTimeout(function(){
		$.mobile.changePage("#"+nextPageId, {
			transition : "slideup"
		});
	},2800);
});

//离开过渡页时
$(document).on("pagehide", "#page2,#page4,#page6,#page8,#page10,#page12,#page14,#page16,#page18,#page20", function() {
	clearTimeout(page2_timer);
});

$(document).on("pagebeforeshow", "#page3", function() {
	//隐藏
	$('#p3_title').css("visibility","hidden");
	$('#p3_logo1').css("visibility","hidden");
	// $('#p3_p1').css("visibility","hidden");
	$('#p3_logo2').css("visibility","hidden");
	// $('#p3_p2').css("visibility","hidden");
	$('#p3_t1').css("visibility","hidden");
	$('#p3_t2').css("visibility","hidden");
	$('#p3_t3').css("visibility","hidden");
	
	//重置动画
	$('#p3_logo1').removeClass("animated fadeInRight");
	$('#p3_p1').removeClass("animated fadeInRight");
	$('#p3_logo2').removeClass("animated fadeInLeft");
	$('#p3_t1').removeClass("animated fadeInLeft");
	$('#p3_t2').removeClass("animated fadeInLeft");
	$('#p3_t3').removeClass("animated fadeInLeft");
	$('#p3_p2').removeClass("animated fadeInRight");
	$('#p3_title').removeClass("animated zoomIn");
	
	//动画时间轴
	$('#p3_title').css("visibility","visible");
	$('#p3_title').addClass('animated zoomIn');
	setTimeout(function(){
		$('#p3_logo1').css("visibility","visible");
		$('#p3_logo1').addClass('animated fadeInRight');
	},700);
	setTimeout(function(){
		// $('#p3_p1').css("visibility","visible");
		// $('#p3_p1').addClass('animated fadeInRight');
	},1200);
	setTimeout(function(){
		$('#p3_logo2').css("visibility","visible");
		$('#p3_logo2').addClass('animated fadeInLeft');
	},1300);
	setTimeout(function(){
		$('#p3_t1').css("visibility","visible");
		$('#p3_t1').addClass('animated fadeInLeft');
	},2000);
	setTimeout(function(){
		$('#p3_t2').css("visibility","visible");
		$('#p3_t2').addClass('animated fadeInLeft');
	},2900);
	setTimeout(function(){
		$('#p3_t3').css("visibility","visible");
		$('#p3_t3').addClass('animated fadeInLeft');
	},3800);
	setTimeout(function(){
		// $('#p3_p2').css("visibility","visible");
		// $('#p3_p2').addClass('animated fadeInRight');
	},5000);
	
});

$(document).on("pagebeforeshow", "#page5", function() {
	//隐藏
	$('#p5_title').css("visibility","hidden");
	$('#p5_logo').css("visibility","hidden");
	$('#p5_t1').css("visibility","hidden");
	$('#p5_t2').css("visibility","hidden");
	$('#p5_t3').css("visibility","hidden");
	
	//重置动画
	$('#p5_title').removeClass("animated zoomIn");
	$('#p5_logo').removeClass("animated fadeInRight");
	$('#p5_t1').removeClass("animated fadeInUp");
	$('#p5_t2').removeClass("animated fadeInUp");
	$('#p5_t3').removeClass("animated fadeInUp");
	
	//动画时间轴
	$('#p5_title').css("visibility","visible");
	$('#p5_title').addClass('animated zoomIn');
	setTimeout(function(){
		$('#p5_logo').css("visibility","visible");
		$('#p5_logo').addClass('animated fadeInRight');
	},700);
	setTimeout(function(){
		$('#p5_t1').css("visibility","visible");
		$('#p5_t1').addClass('animated fadeInUp');
	},1400);
	setTimeout(function(){
		$('#p5_t2').css("visibility","visible");
		$('#p5_t2').addClass('animated fadeInUp');
	},2000);
	setTimeout(function(){
		$('#p5_t3').css("visibility","visible");
		$('#p5_t3').addClass('animated fadeInUp');
	},2600);
});

$(document).on("pagebeforeshow", "#page7", function() {
	//隐藏
	$('#p7_title').css("visibility","hidden");
	$('#p7_sub').css("visibility","hidden");
	$('#p7_logo').css("visibility","hidden");
	$('#p7_t1').css("visibility","hidden");
	$('#p7_t2').css("visibility","hidden");
	$('#p7_t3').css("visibility","hidden");
	
	//重置动画
	$('#p7_title').removeClass("animated zoomIn");
	$('#p7_sub').removeClass("animated fadeInRight");
	$('#p7_logo').removeClass("animated fadeInLeft");
	$('#p7_t1').removeClass("animated fadeInUp");
	$('#p7_t2').removeClass("animated fadeInUp");
	$('#p7_t3').removeClass("animated fadeInUp");
	
	//动画时间轴
	$('#p7_title').css("visibility","visible");
	$('#p7_title').addClass('animated zoomIn');
	setTimeout(function(){
		$('#p7_sub').css("visibility","visible");
		$('#p7_sub').addClass('animated fadeInRight');
	},700);
	setTimeout(function(){
		$('#p7_logo').css("visibility","visible");
		$('#p7_logo').addClass('animated fadeInLeft');
	},700);
	setTimeout(function(){
		$('#p7_t1').css("visibility","visible");
		$('#p7_t1').addClass('animated fadeInUp');
	},1400);
	setTimeout(function(){
		$('#p7_t2').css("visibility","visible");
		$('#p7_t2').addClass('animated fadeInUp');
	},2000);
	setTimeout(function(){
		$('#p7_t3').css("visibility","visible");
		$('#p7_t3').addClass('animated fadeInUp');
	},2600);
});

$(document).on("pagebeforeshow", "#page9", function() {
	//隐藏
	$('#p9_title').css("visibility","hidden");
	$('#p9_logo').css("visibility","hidden");
	$('#p9_t1').css("visibility","hidden");
	$('#p9_t2').css("visibility","hidden");
	$('#p9_t3').css("visibility","hidden");
	$('#p9_t4').css("visibility","hidden");
	
	//重置动画
	$('#p9_title').removeClass("animated zoomIn");
	$('#p9_logo').removeClass("animated fadeInLeft");
	$('#p9_t1').removeClass("animated fadeInUp");
	$('#p9_t2').removeClass("animated fadeInUp");
	$('#p9_t3').removeClass("animated fadeInUp");
	$('#p9_t4').removeClass("animated fadeInUp");
	
	//动画时间轴
	$('#p9_title').css("visibility","visible");
	$('#p9_title').addClass('animated zoomIn');
	setTimeout(function(){
		$('#p9_logo').css("visibility","visible");
		$('#p9_logo').addClass('animated fadeInLeft');
	},700);
	setTimeout(function(){
		$('#p9_t1').css("visibility","visible");
		$('#p9_t1').addClass('animated fadeInUp');
	},1400);
	setTimeout(function(){
		$('#p9_t2').css("visibility","visible");
		$('#p9_t2').addClass('animated fadeInUp');
	},2000);
	setTimeout(function(){
		$('#p9_t3').css("visibility","visible");
		$('#p9_t3').addClass('animated fadeInUp');
	},2600);
	setTimeout(function(){
		$('#p9_t4').css("visibility","visible");
		$('#p9_t4').addClass('animated fadeInUp');
	},3200);
});

$(document).on("pagebeforeshow", "#page11", function() {
	//隐藏
	$('#p11_title').css("visibility","hidden");
	$('#p11_logo1').css("visibility","hidden");
	$('#p11_logo2').css("visibility","hidden");
	$('#p11_t1').css("visibility","hidden");
	$('#p11_t2').css("visibility","hidden");
	$('#p11_t3').css("visibility","hidden");
	$('#p11_t4').css("visibility","hidden");
	$('#p11_t5').css("visibility","hidden");
	
	//重置动画
	$('#p11_title').removeClass("animated zoomIn");
	$('#p11_logo1').removeClass("animated fadeInRight");
	$('#p11_logo2').removeClass("animated fadeInLeft");
	$('#p11_t1').removeClass("animated fadeInUp");
	$('#p11_t2').removeClass("animated fadeInUp");
	$('#p11_t3').removeClass("animated fadeInUp");
	$('#p11_t4').removeClass("animated fadeInUp");
	$('#p11_t5').removeClass("animated fadeInUp");
	
	//动画时间轴
	$('#p11_title').css("visibility","visible");
	$('#p11_title').addClass('animated zoomIn');
	setTimeout(function(){
		$('#p11_logo1').css("visibility","visible");
		$('#p11_logo1').addClass('animated fadeInRight');
	},700);
	setTimeout(function(){
		$('#p11_logo2').css("visibility","visible");
		$('#p11_logo2').addClass('animated fadeInLeft');
	},700);
	setTimeout(function(){
		$('#p11_t1').css("visibility","visible");
		$('#p11_t1').addClass('animated fadeInUp');
	},1400);
	setTimeout(function(){
		$('#p11_t4').css("visibility","visible");
		$('#p11_t4').addClass('animated fadeInUp');
	},1400);
	setTimeout(function(){
		$('#p11_t2').css("visibility","visible");
		$('#p11_t2').addClass('animated fadeInUp');
	},2000);
	setTimeout(function(){
		$('#p11_t5').css("visibility","visible");
		$('#p11_t5').addClass('animated fadeInUp');
	},2000);
	setTimeout(function(){
		$('#p11_t3').css("visibility","visible");
		$('#p11_t3').addClass('animated fadeInUp');
	},2600);
});

$(document).on("pagebeforeshow", "#page13", function() {
	//隐藏
	$('#p13_title').css("visibility","hidden");
	$('#p13_sub').css("visibility","hidden");
	$('#p13_logo1').css("visibility","hidden");
	$('#p13_logo2').css("visibility","hidden");
	$('#p13_t1').css("visibility","hidden");
	$('#p13_t2').css("visibility","hidden");
	$('#p13_t3').css("visibility","hidden");
	$('#p13_t4').css("visibility","hidden");
	$('#p13_t5').css("visibility","hidden");
	$('#p13_t6').css("visibility","hidden");
	
	//重置动画
	$('#p13_title').removeClass("animated zoomIn");
	$('#p13_sub').removeClass("animated fadeInRight");
	$('#p13_logo1').removeClass("animated fadeInRight");
	$('#p13_logo2').removeClass("animated fadeInLeft");
	$('#p13_t1').removeClass("animated fadeInUp");
	$('#p13_t2').removeClass("animated fadeInUp");
	$('#p13_t3').removeClass("animated fadeInUp");
	$('#p13_t4').removeClass("animated fadeInUp");
	$('#p13_t5').removeClass("animated fadeInUp");
	$('#p13_t6').removeClass("animated fadeInUp");
	
	//动画时间轴
	$('#p13_title').css("visibility","visible");
	$('#p13_title').addClass('animated zoomIn');
	setTimeout(function(){
		$('#p13_sub').css("visibility","visible");
		$('#p13_sub').addClass('animated fadeInRight');
	},500);
	setTimeout(function(){
		$('#p13_logo1').css("visibility","visible");
		$('#p13_logo1').addClass('animated fadeInRight');
	},1300);
	setTimeout(function(){
		$('#p13_logo2').css("visibility","visible");
		$('#p13_logo2').addClass('animated fadeInLeft');
	},1300);
	setTimeout(function(){
		$('#p13_t1').css("visibility","visible");
		$('#p13_t1').addClass('animated fadeInUp');
	},1900);
	setTimeout(function(){
		$('#p13_t4').css("visibility","visible");
		$('#p13_t4').addClass('animated fadeInUp');
	},1900);
	setTimeout(function(){
		$('#p13_t2').css("visibility","visible");
		$('#p13_t2').addClass('animated fadeInUp');
	},2500);
	setTimeout(function(){
		$('#p13_t5').css("visibility","visible");
		$('#p13_t5').addClass('animated fadeInUp');
	},2500);
	setTimeout(function(){
		$('#p13_t3').css("visibility","visible");
		$('#p13_t3').addClass('animated fadeInUp');
	},3100);
	setTimeout(function(){
		$('#p13_t6').css("visibility","visible");
		$('#p13_t6').addClass('animated fadeInUp');
	},3100);
});

$(document).on("pagebeforeshow", "#page15", function() {
	//隐藏
	$('#p15_title').css("visibility","hidden");
	$('#p15_logo1').css("visibility","hidden");
	$('#p15_logo2').css("visibility","hidden");
	$('#p15_logo3').css("visibility","hidden");
	$('#p15_logo4').css("visibility","hidden");
	
	//重置动画
	$('#p15_title').removeClass("animated zoomIn");
	$('#p15_logo1').removeClass("animated fadeInRight");
	$('#p15_logo2').removeClass("animated fadeInLeft");
	$('#p15_logo3').removeClass("animated fadeInUp");
	$('#p15_logo4').removeClass("animated fadeInUp");
	
	//动画时间轴
	$('#p15_title').css("visibility","visible");
	$('#p15_title').addClass('animated zoomIn');
	setTimeout(function(){
		$('#p15_logo1').css("visibility","visible");
		$('#p15_logo1').addClass('animated fadeInRight');
	},700);
	setTimeout(function(){
		$('#p15_logo2').css("visibility","visible");
		$('#p15_logo2').addClass('animated fadeInLeft');
	},700);
	setTimeout(function(){
		$('#p15_logo3').css("visibility","visible");
		$('#p15_logo3').addClass('animated fadeInUp');
	},1400);
	setTimeout(function(){
		$('#p15_logo4').css("visibility","visible");
		$('#p15_logo4').addClass('animated fadeInUp');
	},2000);
});

$(document).on("pagebeforeshow", "#page17", function() {
	//隐藏
	$('#p17_title').css("visibility","hidden");
	$('#p17_sub').css("visibility","hidden");
	$('#p17_logo1').css("visibility","hidden");
	$('#p17_logo2').css("visibility","hidden");
	$('#p17_logo3').css("visibility","hidden");
	$('#p17_logo4').css("visibility","hidden");
	$('#p17_logo5').css("visibility","hidden");
	$('#p17_logo6').css("visibility","hidden");
	$('#p17_logo7').css("visibility","hidden");
	
	//重置动画
	$('#p17_title').removeClass("animated zoomIn");
	$('#p17_sub').removeClass("animated fadeInLeft");
	$('#p17_logo1').removeClass("animated fadeInRight");
	$('#p17_logo2').removeClass("animated fadeInRight");
	$('#p17_logo3').removeClass("animated fadeInRight");
	$('#p17_logo4').removeClass("animated fadeInRight");
	$('#p17_logo5').removeClass("animated fadeInRight");
	$('#p17_logo6').removeClass("animated fadeInRight");
	$('#p17_logo7').removeClass("animated fadeInRight");
	
	//动画时间轴
	$('#p17_title').css("visibility","visible");
	$('#p17_title').addClass('animated zoomIn');
	setTimeout(function(){
		$('#p17_sub').css("visibility","visible");
		$('#p17_sub').addClass('animated fadeInLeft');
	},700);
	setTimeout(function(){
		$('#p17_logo1').css("visibility","visible");
		$('#p17_logo1').addClass('animated fadeInRight');
	},1400);
	setTimeout(function(){
		$('#p17_logo2').css("visibility","visible");
		$('#p17_logo2').addClass('animated fadeInRight');
	},2100);
	setTimeout(function(){
		$('#p17_logo3').css("visibility","visible");
		$('#p17_logo3').addClass('animated fadeInRight');
	},2800);
	setTimeout(function(){
		$('#p17_logo4').css("visibility","visible");
		$('#p17_logo4').addClass('animated fadeInRight');
	},3500);
	setTimeout(function(){
		$('#p17_logo5').css("visibility","visible");
		$('#p17_logo5').addClass('animated fadeInRight');
	},4200);
	setTimeout(function(){
		$('#p17_logo6').css("visibility","visible");
		$('#p17_logo6').addClass('animated fadeInRight');
	},4900);
	setTimeout(function(){
		$('#p17_logo7').css("visibility","visible");
		$('#p17_logo7').addClass('animated fadeInRight');
	},5600);
});

$(document).on("pagebeforeshow", "#page19", function() {
	//隐藏
	$('#p19_title').css("visibility","hidden");
	$('#p19_logo1').css("visibility","hidden");
	$('#p19_logo2').css("visibility","hidden");
	
	//重置动画
	$('#p19_title').removeClass("animated zoomIn");
	$('#p19_logo1').removeClass("animated fadeInRight");
	$('#p19_logo2').removeClass("animated fadeInLeft");
	
	//动画时间轴
	$('#p19_title').css("visibility","visible");
	$('#p19_title').addClass('animated zoomIn');
	setTimeout(function(){
		$('#p19_logo1').css("visibility","visible");
		$('#p19_logo1').addClass('animated fadeInRight');
	},700);
	setTimeout(function(){
		$('#p19_logo2').css("visibility","visible");
		$('#p19_logo2').addClass('animated fadeInLeft');
	},700);
});

$(document).on("pagebeforeshow", "#page21", function() {
	//隐藏
	$('#p21_title').css("visibility","hidden");
	$('#p21_logo').css("visibility","hidden");
	$('#p21_t1').css("visibility","hidden");
	$('#p21_t2').css("visibility","hidden");
	$('#p21_t3').css("visibility","hidden");
	$('#p21_p2').css("visibility","hidden");
	$('#p21_p3').css("visibility","hidden");
	$('#p21_p4').css("visibility","hidden");
	
	//重置动画
	$('#p21_title').removeClass("animated zoomIn");
	$('#p21_logo').removeClass("animated fadeInRight");
	$('#p21_t1').removeClass("animated fadeInUp");
	$('#p21_t2').removeClass("animated fadeInUp");
	$('#p21_t3').removeClass("animated fadeInUp");
	$('#p21_p2').removeClass("animated fadeIn");
	$('#p21_p3').removeClass("animated fadeIn");
	$('#p21_p4').removeClass("animated fadeIn");
	
	//动画时间轴
	$('#p21_title').css("visibility","visible");
	$('#p21_title').addClass('animated zoomIn');
	setTimeout(function(){
		$('#p21_logo').css("visibility","visible");
		$('#p21_logo').addClass('animated fadeInRight');
	},700);
	setTimeout(function(){
		$('#p21_t1').css("visibility","visible");
		$('#p21_t1').addClass('animated fadeInUp');
	},1400);
	setTimeout(function(){
		$('#p21_t2').css("visibility","visible");
		$('#p21_t2').addClass('animated fadeInUp');
	},2000);
	setTimeout(function(){
		$('#p21_t3').css("visibility","visible");
		$('#p21_t3').addClass('animated fadeInUp');
	},2600);
	setTimeout(function(){
		$('#p21_p2').css("visibility","visible");
		$('#p21_p2').addClass('animated fadeIn');
	},3200);
	setTimeout(function(){
		$('#p21_p3').css("visibility","visible");
		$('#p21_p3').addClass('animated fadeIn');
	},3200);
	setTimeout(function(){
		$('#p21_p4').css("visibility","visible");
		$('#p21_p4').addClass('animated fadeIn');
	},3200);
});

//调整样式
var w = $(window).width();
var h = $(window).height();
$(document).ready(function() {
	if(w>h){
		var tw=h*0.56;
		$("body").width(tw);
		$("body").css("margin","0 auto");
		w=tw;
	}
	//page2
	$(".p2_title").css("padding-top",w*0.55+"px");
});

//动态交互
$(document).ready(function() {
	
}); 

//滑动换页
$(function() {
	$("div[data-role='page']").swipe({
		swipe : function(event, direction, distance, duration, fingerCount) {
			var prevPageId=this.prev("div").attr("id");
			var nextPageId=this.next("div").attr("id");
			if (direction == "up") {
				$.mobile.changePage("#"+nextPageId, {
					transition : "slideup"
				});
			} else if (direction == "down") {
				$.mobile.changePage("#"+prevPageId, {
					transition : "slidedown"
				});
			}
		},
	});
});

