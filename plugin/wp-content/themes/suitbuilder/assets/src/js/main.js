+(function($){
	$(document).ready(function() {	
		$('.rt-main-menu').mrMobileMenu();			
			$('.scroll-top').click(function() {      
		    $('body,html').animate({
		        scrollTop : 0             
		    }, 500);
		});
		bannerSlider();	
		calculateHeight();	
	});	
	$(window).load(function() {
		$("#status").fadeOut();
		$("#preloader").delay(1000).fadeOut("slow");		
	});
	/* banner slider options */
	var EnableArrow 		= customzier_values['suitbuilder-slider-enable-arrow'];
	var EnablePager 		= customzier_values['suitbuilder-slider-enable-pager'];
	var EnableAutoplay 		= customzier_values['suitbuilder-slider-enable-autoplay'];
	var AutoplayTime 		= customzier_values['suitbuilder-slider-time-auto-slider'];
	var AutoplaySliderTime  = ( AutoplayTime * 1000 );

	function bannerSlider() {
		$('.banner-slider-init').slick({
		  	dots: ( EnablePager == 1 ) ? true : false,
		  	infinite: true,
		 	speed: 2000,
		 	autoplay: ( EnableAutoplay == 1 ) ? true : false,
  			autoplaySpeed: AutoplaySliderTime,
		  	slidesToShow: 1,
			slidesToScroll: 1,
			arrows: ( EnableArrow == 1 ) ? true : false,
			fade: true,
			prevArrow: '<button type="button" class="slick-prev rt-prev-arrow arow-lf"><i class="fas fa-angle-left"></i></button>',
		  	nextArrow: '<button type="button" class="slick-next rt-next-arrow arow-lf"><i class="fas fa-angle-right"></i></button>',
		});			
	}
	// Hide and show header on scroll up and down 
	var didScroll;
	var lastScrollTop = 0;
	var initialScroll = 5;
	var navbarHeight = $('.rt-site-header').outerHeight();

	$(window).scroll(function(event){
		didScroll = true;
		var scrollHeight = $(document).height();
		var scrollPosition = $(window).height() + $(window).scrollTop();
		var scrollTop = $(this).scrollTop();
		if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
			$('.sticky-header .rt-site-header').removeClass('top-of-the-page').addClass('end-of-page');
		}else if (scrollTop <= 0) {
			$('.sticky-header .rt-site-header').removeClass('end-of-page').addClass('top-of-the-page');
			$('.sticky-header .suitbuilder-header-wrapper').addClass('wrapper-top-of-the-page');			
		}
		else {
			$('.sticky-header .suitbuilder-header-wrapper').removeClass('wrapper-top-of-the-page');		
		}
		/* scroll to top btn */
		if ($(this).scrollTop() >= 500) {       
			$('.scroll-top').fadeIn(200);   
		} else {
			$('.scroll-top').fadeOut(200);   
		}
	});

	setInterval(function() {
		if (didScroll) {
			hasScrolled();
			didScroll = false;
		}
	}, 250);

	function hasScrolled() {
		var st = $(this).scrollTop();    
		// Make sure they scroll more than initialScroll
		if(Math.abs(lastScrollTop - st) <= initialScroll)
			return;    
		// If they scrolled down and are past the navbar, add class .nav-up.
		if (st > lastScrollTop && st > navbarHeight){
			// Scroll Down
			$('.sticky-header .rt-site-header').removeClass('nav-down top-of-the-page').addClass('nav-up');
		} else {
			// Scroll Up
			if(st + $(window).height() < $(document).height()) {
				$('.sticky-header .rt-site-header').removeClass('nav-up').addClass('nav-down');
			}
		}    
		lastScrollTop = st;
	}
	/* add padding on body */
	function calculateHeight() {
		jQuery('body.sticky-header:not(.transparent)').css("padding-top",jQuery('.suitbuilder-header-wrapper').height() + 'px');
		jQuery('body.logged-in.admin-bar.sticky-header:not(.transparent)').css("padding-top",jQuery('.suitbuilder-header-wrapper').height() - 32 + 'px');
	}
	// add padding on window resize 
	var resizeSensor;
	window.onresize = function() {
		clearTimeout(resizeSensor);
		resizeSensor = setTimeout(function() {
			calculateHeight();
		}, 100);
	};	
})(jQuery);
