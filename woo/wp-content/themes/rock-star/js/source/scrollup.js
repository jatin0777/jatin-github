jQuery(document).ready(function(){
	jQuery(window).scroll(function(){
	    if (jQuery(this).scrollTop() > 1) {
	        jQuery('.backtotop').css({bottom:"25px"});
	    }
	    else {
	        jQuery('.backtotop').css({bottom:"-100px"});
	    }
	});

	jQuery('.backtotop').click(function(){
	    jQuery('html, body').animate({scrollTop: '0px'}, 800);
	    return false;
	});
});