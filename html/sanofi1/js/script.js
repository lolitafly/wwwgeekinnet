//动画
$(document).on("pagebeforeshow", "#page1", function() {
	// //隐藏
	// $('#p1_logo').css("visibility","hidden");
	// $('#p1_title').css("visibility","hidden");
	// $('#p1_t1').css("visibility","hidden");
	// $('#p1_t2').css("visibility","hidden");
	// $('#p1_t3').css("visibility","hidden");
	// $('#p1_t4').css("visibility","hidden");
	// $('#p1_t5').css("visibility","hidden");
	// $('#p1_t6').css("visibility","hidden");
	// $('#p1_p1').css("visibility","hidden");
	// $('#page1 img.arrow').hide();
	// //重置动画
	// $('#p1_logo').removeClass("animated zoomIn");
	// $('#p1_title').removeClass("animated bounceInRight");
	// $('#p1_t1').removeClass("animated fadeInUp");
	// $('#p1_t2').removeClass("animated fadeInUp");
	// $('#p1_t3').removeClass("animated fadeInUp");
	// $('#p1_t4').removeClass("animated fadeInUp");
	// $('#p1_t5').removeClass("animated fadeInUp");
	// $('#p1_t6').removeClass("animated fadeInUp");
	// $('#p1_p1').removeClass("animated slideInUp");
// 	
	// //动画时间轴
	// $('#p1_p2').addClass('animated fadeInLeftBig');
	// setTimeout(function(){
		// $('#p1_p1').css("visibility","visible");
		// $('#p1_p1').addClass('animated slideInUp');
	// },1200);
// 	
	// $('#p1_logo').css("visibility","visible");
	// $('#p1_logo').addClass('animated zoomIn');
	// setTimeout(function(){
		// $('#p1_title').css("visibility","visible");
		// $('#p1_title').addClass('animated bounceInRight');
	// },600);
	// setTimeout(function(){
		// $('#p1_t1').css("visibility","visible");
		// $('#p1_t1').addClass('animated fadeInUp');
	// },1600);
	// setTimeout(function(){
		// $('#p1_t2').css("visibility","visible");
		// $('#p1_t2').addClass('animated fadeInUp');
	// },2000);
	// setTimeout(function(){
		// $('#p1_t3').css("visibility","visible");
		// $('#p1_t3').addClass('animated fadeInUp');
	// },2400);
	// setTimeout(function(){
		// $('#p1_t4').css("visibility","visible");
		// $('#p1_t4').addClass('animated fadeInUp');
	// },2800);
	// setTimeout(function(){
		// $('#p1_t5').css("visibility","visible");
		// $('#p1_t5').addClass('animated fadeInUp');
	// },3200);
	// setTimeout(function(){
		// $('#p1_t6').css("visibility","visible");
		// $('#p1_t6').addClass('animated fadeInUp');
	// },3600);
	// setTimeout(function(){
		// $('#page1 img.arrow').show();
	// },3900);
	
});

//离开过渡页时
$(document).on("pagehide", "#page2,#page4", function() {
	
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
	// $(".p2_title").css("padding-top",w*0.51+"px");
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

