// JavaScript Document
jQuery(document).ready(function() {
	
	var corporate_zingViewPortWidth = '',
		corporate_zingViewPortHeight = '';

	function corporate_zingViewport(){

		corporate_zingViewPortWidth = jQuery(window).width(),
		corporate_zingViewPortHeight = jQuery(window).outerHeight(true);	
		
		if( corporate_zingViewPortWidth > 1200 ){
			
			jQuery('.main-navigation').removeAttr('style');
			
			var corporate_zingSiteHeaderHeight = jQuery('.site-header').outerHeight();
			var corporate_zingSiteHeaderWidth = jQuery('.site-header').width();
			var corporate_zingSiteHeaderPadding = ( corporate_zingSiteHeaderWidth * 2 )/100;
			var corporate_zingMenuHeight = jQuery('.menu-container').height();
			
			var corporate_zingMenuButtonsHeight = jQuery('.site-buttons').height();
			
			var corporate_zingMenuPadding = ( corporate_zingSiteHeaderHeight - ( (corporate_zingSiteHeaderPadding * 2) + corporate_zingMenuHeight ) )/2;
			var corporate_zingMenuButtonsPadding = ( corporate_zingSiteHeaderHeight - ( (corporate_zingSiteHeaderPadding * 2) + corporate_zingMenuButtonsHeight ) )/2;
		
			
			jQuery('.menu-container').css({'padding-top':corporate_zingMenuPadding});
			jQuery('.site-buttons').css({'padding-top':corporate_zingMenuButtonsPadding});
			
			
		}else{

			jQuery('.menu-container, .site-buttons, .header-container-overlay, .site-header').removeAttr('style');

		}	
	
	}

	jQuery(window).on("resize",function(){
		
		corporate_zingViewport();
		
	});
	
	corporate_zingViewport();


	jQuery('.site-branding .menu-button').on('click', function(){
				
		if( corporate_zingViewPortWidth > 1200 ){

		}else{
			jQuery('.main-navigation').slideToggle();
		}				
		
				
	});	

    var owl = jQuery("#corporate_zing-owl-basic");
         
    owl.owlCarousel({
             
      	slideSpeed : 300,
      	paginationSpeed : 400,
      	singleItem:true,
		navigation : true,
      	pagination : false,
      	navigationText : false,
         
    });			
	
});		