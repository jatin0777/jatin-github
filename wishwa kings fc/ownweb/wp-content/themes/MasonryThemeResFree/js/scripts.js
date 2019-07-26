$(document).ready(function() {

	$(window).scroll(function(){
		if($(this).scrollTop()>220){
			$('.the_menu').css({'position':'fixed','top':'0', 'left':'0'});
		}
		else {
			$('.the_menu').css({'position':'relative'});
		}
	});

		$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top-83
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});
	/*$('.flicker-example').flicker({
		dot_navigation: false
	});*/
	$('.blog_slider').carouFredSel({
		responsive  : true,
		auto: {
	        timeoutDuration : 18000
	    },
		items: {
			visible: {
				min: 1,
				max: 3
			},
		},
		prev        : ".b_prev",
		next        : ".b_next"
	});
	
    $('.header_menu li').hover(
        function () {
            $('ul:first', this).css('display','block');
        }, 
        function () {
            $('ul:first', this).css('display','none');         
        }
    );  
    if($('.container').width() == 300) {
		$('.home_feat_slider').bxSlider({
			minSlides: 1,
			maxSlides: 4,
			slideWidth: 280,
			slideMargin: 10,
			pager: false
		});        	
    } else if($('.container').width() == 748) {
		$('.home_feat_slider').bxSlider({
			minSlides: 1,
			maxSlides: 4,
			slideWidth: 239,
			slideMargin: 15,
			pager: false
		});    
    } else {
		$('.home_feat_slider').bxSlider({
			minSlides: 1,
			maxSlides: 4,
			slideWidth: 280,
			slideMargin: 15,
			pager: false
		});    
	}
	$('.header_spacing').css('height', $('.header_menu').outerHeight() + 'px');
	//$('#big-video-wrap').css('margin-top', $('#header').outerHeight() + 'px');
	//$('#big-video-vid').css('top','0px');
	//$('#big-video-wrap').css('height','auto');
	$('.fullplate').css('height', ($(window).height() - $('#header').outerHeight()) + 'px');	
	    
	$('#main_header_menu').slicknav();
	    
	if($('#header').css('position') == 'absolute') 
		$('#header').css('top', $('.slicknav_menu').outerHeight() + 'px');
	else {
		$('#header').css('top', '0px');                 				
		//$('#big-video-wrap').css('margin-top', '0px');
	}
	$('.home_blog_post').hover(
		function() {
			$(this).find('.home_blog_post_hover').css('display','block');
		},
		function() {
			$(this).find('.home_blog_post_hover').css('display','none');
		}
	);
	$('.home_blog_posts_small').hover(
		function() {
			$(this).find('.home_blog_posts_small_hover').css('display','block');
		},
		function() {
			$(this).find('.home_blog_posts_small_hover').css('display','none');
		}
	);

	    
	$('.home_box').hover(
		function() {
			$(this).find('.home_box_hover').css('display','block');
		},
		function() {
			$(this).find('.home_box_hover').css('display','none');
		}
	);

	
		$("#home_slide").owlCarousel({
			itemsCustom : [
			[0, 1],
			[768, 2],
			[1300, 3],
			],
			navigation : true,
			pagination: false,
			lazyLoad : true,
			autoPlay: 5000,
		});	


	    
});

$(window).load(function() {
	$('.header_spacing').css('height', $('.header_menu').outerHeight() + 'px');

	$('.fullplate').css('height', ($(window).height() - $('#header').outerHeight()) + 'px');	
	if($('#header').css('position') == 'absolute')
		$('#header').css('top', $('.slicknav_menu').outerHeight() + 'px');
	else {
		$('#header').css('top', '0px');
		
	}	
	//alert(document.URL);
	var $container = $('#the_mason');

	$container.imagesLoaded( function() {
		$container.masonry({
			gutter: 30,
			itemSelector: '.home_post_thumb',
		    columnWidth: '.home_post_thumb'
		});
	});

});

$(window).resize(function() {
	$('.header_spacing').css('height', $('.header_menu').outerHeight() + 'px');
	if($('#header').css('position') == 'absolute')
		$('#header').css('top', $('.slicknav_menu').outerHeight() + 'px');
	else {
		$('#header').css('top', '0px');
		
	}
});
