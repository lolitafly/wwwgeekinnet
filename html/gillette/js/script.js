// swiper
var mySwiper = new Swiper('.swiper-container', {

	direction : 'vertical',
	setWrapperSize : true,

	onSlideChangeStart : function(swiper) {
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

//调整样式
var w = $(window).width();
var h = $(window).height();
$(document).ready(function() {

});

