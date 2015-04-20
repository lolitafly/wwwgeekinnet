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
$(document).on("pagebeforeshow", "#page2,#page4,#page6", function(e) {
	$('.p2_title').css("visibility","hidden");
	$('.p2_title').removeClass("animated slideInLeft");
	
	$(".p2_bgimg").addClass('animated rotateIn');
	setTimeout(function(){
		$('.p2_title').css("visibility","visible");
		$('.p2_title').addClass('animated slideInLeft');
	},1000);
	var nextPageId=$(e.target).next("div").attr("id");
	console.log(nextPageId);
	page2_timer=setTimeout(function(){
		$.mobile.changePage("#"+nextPageId, {
			transition : "slideup"
		});
	},2800);
});

//离开过渡页时
$(document).on("pagehide", "#page2,#page4,#page6", function() {
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
	$("#page1").swipe({
		swipe : function(event, direction, distance, duration, fingerCount) {
			if (direction == "up") {
				$.mobile.changePage("#page2", {
					transition : "slideup"
				});
			} else if (direction == "down") {
			}
		},
	});
	$("#page2").swipe({
		swipe : function(event, direction, distance, duration, fingerCount) {
			if (direction == "up") {
				$.mobile.changePage("#page3", {
					transition : "slideup"
				});
			} else if (direction == "down") {
				$.mobile.changePage("#page1", {
					transition : "slidedown"
				});
			}
		},
	});
	$("#page3").swipe({
		swipe : function(event, direction, distance, duration, fingerCount) {
			if (direction == "up") {
				$.mobile.changePage("#page4", {
					transition : "slideup"
				});
			} else if (direction == "down") {
				$.mobile.changePage("#page2", {
					transition : "slidedown"
				});
			}
		},
	});
	$("#page4").swipe({
		swipe : function(event, direction, distance, duration, fingerCount) {
			if (direction == "up") {
				$.mobile.changePage("#page5", {
					transition : "slideup"
				});
			} else if (direction == "down") {
				$.mobile.changePage("#page3", {
					transition : "slidedown"
				});
			}
		},
	});
	$("#page5").swipe({
		swipe : function(event, direction, distance, duration, fingerCount) {
			if (direction == "up") {
				$.mobile.changePage("#page6", {
					transition : "slideup"
				});
			} else if (direction == "down") {
				$.mobile.changePage("#page4", {
					transition : "slidedown"
				});
			}
		},
	});
	$("#page6").swipe({
		swipe : function(event, direction, distance, duration, fingerCount) {
			if (direction == "up") {
				$.mobile.changePage("#page7", {
					transition : "slideup"
				});
			} else if (direction == "down") {
				$.mobile.changePage("#page5", {
					transition : "slidedown"
				});
			}
		},
	});
	$("#page7").swipe({
		swipe : function(event, direction, distance, duration, fingerCount) {
			if (direction == "up") {

			} else if (direction == "down") {
				$.mobile.changePage("#page6", {
					transition : "slidedown"
				});
			}
		},
	});
});

