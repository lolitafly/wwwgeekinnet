//动画
$(document).on("pagebeforeshow", "#page1", function() {
	$('#logo1').addClass('animated swing');
	$('#logo2').addClass('animated bounce');
	$('#title1').addClass('animated zoomInDown');
});

function arrowMove(){
	$('#arrow1')
	.delay(100)
	.animate({'margin-top': h*0.1-20}, 400);
	$('#arrow1')
	.delay(100)
	.animate({'margin-top': h*0.1}, 500);
}

$(document).on("pagebeforeshow", "#page2", function() {
	$('#pop1').addClass('animated rollIn');
	$('#pop2').addClass('animated rollIn');
	$('#pop3').addClass('animated rollIn');
	$('#pop4').addClass('animated rollIn');
	$('#pop5').addClass('animated flip');
});

$(document).on("pagebeforeshow", "#page3", function() {
	$('#page3 div.top img.title').addClass('animated fadeInLeft');
	$('#num1 span').animateNumber({
		number : 88,
		color : '#e1cfd7',
		'font-size' : '35px',
		easing : 'easeInQuad',
	}, 1000);
	$('#num2 span').animateNumber({
		number : 63,
		color : '#e1cfd7',
		'font-size' : '35px',
		easing : 'easeInQuad',
	}, 1000);
});

$(document).on("pagebeforeshow", "#page4", function() {
	$('#num3 span').animateNumber({
		number : 87,
		color : '#e1cfd7',
		'font-size' : '30px',
		easing : 'easeInQuad',
	}, 1000);
	$('#num4 span').animateNumber({
		number : 64,
		color : '#e1cfd7',
		'font-size' : '30px',
		easing : 'easeInQuad',
	}, 1000);
	$('#num5 span').animateNumber({
		number : 60,
		color : '#e1cfd7',
		'font-size' : '30px',
		easing : 'easeInQuad',
	}, 1000);
	$('#num6 span').animateNumber({
		number : 83,
		color : '#e1cfd7',
		'font-size' : '30px',
		easing : 'easeInQuad',
	}, 1000);
	$("#bar1 div.bar").height(0);
	$("#bar2 div.bar").height(0);
	$("#bar3 div.bar").height(0);
	$("#bar4 div.bar").height(0);
	$("#bar1 div.bar").animate({
		height : '140px'
	}, 1000);
	$("#bar2 div.bar").animate({
		height : '100px'
	}, 1000);
	$("#bar3 div.bar").animate({
		height : '90px'
	}, 1000);
	$("#bar4 div.bar").animate({
		height : '130px'
	}, 1000);
	$('#page4 div.top div.up div.part img').addClass('animated fadeInUp');
	$('#page4 div.top div.down div.part img').addClass('animated fadeInDown');
	$('#page4 div.top div.up img.title1').addClass('animated bounceInLeft');
	$('#page4 div.top div.down img.title2').addClass('animated bounceInRight');
});

$(document).on("pagebeforeshow", "#page5", function() {
	$('#num7 span').animateNumber({
		number : 50,
		color : '#e1cfd7',
		'font-size' : '30px',
		easing : 'easeInQuad',
	}, 1000);
	$('#num8 span').animateNumber({
		number : 24,
		color : '#e1cfd7',
		'font-size' : '30px',
		easing : 'easeInQuad',
	}, 1000);
	$('#num9 span').animateNumber({
		number : 29,
		color : '#e1cfd7',
		'font-size' : '30px',
		easing : 'easeInQuad',
	}, 1000);
	$('#num10 span').animateNumber({
		number : 50,
		color : '#e1cfd7',
		'font-size' : '30px',
		easing : 'easeInQuad',
	}, 1000);
	$("#bar5 div.bar").width(0);
	$("#bar6 div.bar").width(0);
	$("#bar7 div.bar").width(0);
	$("#bar8 div.bar").width(0);
	$("#bar5 div.bar").animate({
		width : w*0.4*0.29*2+'px'
	}, 1000);
	$("#bar6 div.bar").animate({
		width : w*0.4+'px'
	}, 1000);
	$("#bar7 div.bar").animate({
		width : w*0.4+'px'
	}, 1000);
	$("#bar8 div.bar").animate({
		width : w*0.4*0.24*2+'px'
	}, 1000);
	$('#page5 div.top img.title1').addClass('animated rotateInDownLeft');
	$('#page5 div.top img.title2').addClass('animated rotateInUpRight');
});

$(document).on("pagebeforeshow", "#page6", function() {
	$('#num11 span').animateNumber({
		number : 83,
		color : '#e1cfd7',
		'font-size' : '30px',
		easing : 'easeInQuad',
	}, 1000);
	$('#num12 span').animateNumber({
		number : 57,
		color : '#82001d',
		'font-size' : '30px',
		easing : 'easeInQuad',
	}, 1000);
	$('#page6 div.top div.part2 img').addClass('animated bounceInUp');
	$('#page6 div.top div.part3 img').addClass('animated bounceInDown');
});

var mytimer1;
var mytimer2;
var mytimer3;
$(document).on("pagebeforeshow", "#page7", function() {
	$('#pic1').css("visibility","hidden");
	$('#pic2').css("visibility","hidden");
	$('#pic3').css("visibility","hidden");
	$('#pic4').css("visibility","hidden");
	$('#pic1').removeClass("animated flipInX");
	$('#pic2').removeClass("animated flip");
	$('#pic3').removeClass("animated flash");
	$('#pic4').removeClass("animated zoomInDown");
	
	$('#logo3').addClass('animated swing');
	$('#logo4').addClass('animated bounce');
	
	$('#pic2').css("visibility","visible");
	$('#pic2').addClass('animated flip');
	mytimer1=setTimeout(function(){
		$('#pic4').css("visibility","visible");
		$('#pic4').addClass('animated zoomInDown');
	},800);
	mytimer2=setTimeout(function(){
		$('#pic1').css("visibility","visible");
		$('#pic1').addClass('animated flipInX');
	},1600);
	mytimer3=setTimeout(function(){
		$('#pic3').css("visibility","visible");
		$('#pic3').addClass('animated flash');
	},2400);
	
});


//调整样式
var w = $(window).width();
var h = $(window).height();
$(document).ready(function() {
	console.log("widht:" + w + ";height:" + h);
	// page1
	$("#title1").css("margin-top",h*0.32 + "px");
	$("#arrow1").css("margin-top",h*0.06 + "px");
	
	//page2
	$("#page2 div.top").height(h * 0.7);
	$("#page2 div.top").width(h * 0.7 * 0.7);
	// page3
	$("#page3 div.top").width(w * 0.7);
	$("#page3 div.top").height(w * 0.7);
	$("#page3 div.top").css("top", h * 0.2 + "px");
	// page4
	$("#page4 div.top").width(w * 0.86);
	$("#page4 div.top").height(w * 0.86 * 1.168);
	$("#page4 div.top").css("top", h * 0.2 + "px");
	// page5
	if(h>500){
		$("#page5 div.top").css("top", h * 0.05 + "px");
		$("#page5 div.top").height(h * 0.65);
	}
	$("#page5 div.top div.block div.num").css("margin-top", h * 0.7*0.66*0.04 + "px");
	$("#page5 div.top div.block div.part").css("margin-top", h * 0.7*0.66*0.04 + "px");
	$("#page5 div.top div.block div.num div").css("padding", (h * 0.7*0.66*0.2-30)/2 + "px");
	// page6
	$("#page6 div.top").css("top", h * 0.1 + "px");
	$("#num11").css("top", w*0.86*0.53*0.34 + "px");
	$("#num12").css("top", w*0.86*0.44*0.30 + "px");
	// page7
	if(h<500){
		$("#pic1").css("width", "90%");
		$("#pic3").css("margin-top", 10 + "px");
		$("#pic4").css("margin-top", 10 + "px");
	}
});

//动态交互
$(document).ready(function() {
	// page2
	$("#pop1").bind("tap", function() {
		displayPic(1);
	});
	$("#pop2").bind("tap", function() {
		displayPic(3);
	});
	$("#pop3").bind("tap", function() {
		displayPic(4);
	});
	$("#pop4").bind("tap", function() {
		displayPic(2);
	});
}); 

function displayPic(i){
	$("#page2 div.content img").hide();
	$($("#page2 div.content img")[i-1]).fadeIn();
}

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

