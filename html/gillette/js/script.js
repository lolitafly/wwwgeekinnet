//动画
$(document).on("pagebeforeshow", "#page1", function() {
	//动画时间轴
	$('#p1_banner1').addClass('animated2 fadeOut');
	$('#p1_banner2').addClass('animated3 fadeIn');
	
	$('#p1_t1').addClass('animated2 delay1 fadeOut');
	$('#p1_t2').addClass('animated3 delay1 fadeIn');
	
	$('#p1_bottom_bg1').addClass('animated fadeOut');
	$('#p1_bottom_bg2').addClass('animated3 fadeIn');
	
	// $('#p1_bottom_content1').addClass('animated delay3 fadeOut');
	$('#p1_bottom_content2').addClass('animated2 delay2 fadeInDown');
	$('#p1_next').addClass('animated delay3 fadeIn');
	
});

$(document).on("pagebeforeshow", "#page2", function() {
	//动画时间轴
	$('#p2_left').addClass('animated fadeInLeft');
	$('#p2_right').addClass('animated fadeInRight');
	$('#p2_bottom').addClass('animated4 fadeIn');
	$('#p2_p1').addClass('animated4  fadeIn');
	
	$('#p2_t1').addClass('animated2 delay1 fadeInOut');
	
	$('#p2_t2').addClass('animated delay3 fadeInLeft');
	$('#p2_t3').addClass('animated delay4 fadeInRight');
	$('#p2_t4').addClass('animated delay5 zoomIn');
	$('#p2_t5').addClass('animated delay6 fadeIn');
	$('#p2_t6').addClass('animated delay6 fadeIn');
	$('#p2_next').addClass('animated delay6 fadeIn');
});

$(document).on("pagebeforeshow", "#page3", function() {
	//动画时间轴
	$('#p3_title1').addClass('animated fadeInRight');
	$('#p3_title2').addClass('animated fadeInLeft');

	$('#p3_sub1,#p3_sub2').addClass('animated delay1 fadeIn');
	
	$('#p3_t1,#p3_t6').addClass('animated delay2 fadeInUp');
	$('#p3_t2,#p3_t7').addClass('animated delay3 fadeInUp');
	$('#p3_t3,#p3_t8').addClass('animated delay4 fadeInUp');
	$('#p3_t4,#p3_t9').addClass('animated delay5 fadeInUp');
	$('#p3_t5,#p3_t10').addClass('animated delay6 fadeInUp');
	
	$('#p3_next').addClass('animated delay6p5 fadeIn');
	
	// $('#p3_logo').addClass('animated delay7 fadeIn');
});

$(document).on("pagebeforeshow", "#page4", function() {
	//动画时间轴
	$('#p4_title1').addClass('animated fadeInLeft');
	$('#p4_title2').addClass('animated fadeInLeft');
	$('#p4_title3').addClass('animated delay1 fadeInUp');

	$('#p4_t1').addClass('animated3 delay2 fadeIn');
	$('#p4_t2').addClass('animated3 delay3 fadeIn');
	
	$('#p4_t3').addClass('animated2 delay4 fadeIn');
	
	$('#p4_next').addClass('animated delay5 fadeIn');
});

$(document).on("pagebeforeshow", "#page5", function() {
	//动画时间轴
	$('#p5_title1').addClass('animated fadeInDown');
	$('#p5_title2').addClass('animated fadeInUp');

	$('#p5_t1').addClass('animated delay1 fadeInRight');
	$('#p5_t2').addClass('animated delay2 fadeInRight');
	$('#p5_t3').addClass('animated delay3 fadeInRight');
	$('#p5_t4').addClass('animated delay4 fadeInRight');
	$('#p5_t5').addClass('animated delay5 fadeInRight');
	$('#p5_t6').addClass('animated delay6 fadeInRight');
	$('#p5_t7').addClass('animated delay7 fadeInRight');
	$('#p5_t8').addClass('animated delay8 fadeInRight');
	
	$('#p5_next').addClass('animated delay8p5 fadeIn');
	
});

$(document).on("pagebeforeshow", "#page6", function() {
	//动画时间轴
	$('#p6_t1').addClass('animated zoomIn');
	$('#p6_btn').addClass('animated delay1 bounceIn');
	
	$('#p6_dept').addClass('animated delay2 fadeIn');
	$('#p6_logo').addClass('animated delay2p5 fadeIn');
});



//离开过渡页时
$(document).on("pagehide", "#page2,#page4", function() {
	
});


//调整样式
var w = $(window).width();
var h = $(window).height();
$(document).ready(function() {
	
});

//动态交互
$(document).ready(function() {
	if(h/w<1.42){
		$(".p1_banner").css("top","-10%");
		$(".bottom").css("bottom","-3%");
		$(".bottom").css("bottom","-3%");
		$(".p3_remark").css("bottom","16%");
		$("#p4_t3").css("top","35%");
		$(".p5_block").css("width","57%");
		$(".p5_block").css("right","10%");
		$(".p6_content").css("width","34%");
		$(".p6_content").css("left","33%");
		$("#p4_next li img").css("background-color","#cdaba7");
		
	}
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

