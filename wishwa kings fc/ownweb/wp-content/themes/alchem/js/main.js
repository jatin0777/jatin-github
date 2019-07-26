jQuery(document).ready(function($){
 $(".site-nav-toggle").click(function(){
        $(".site-nav").toggle();
 });  

 $('.main-nav > li ').click(function(){
	 $('.main-nav > li ').removeClass('current');
	  var css_class = $(this).attr("class");
	  $('.'+css_class.replace(/\ +/g,".") ).addClass('current');
	 });

 
// retina logo
if( window.devicePixelRatio > 1 ){
	if($('.normal_logo').length && $('.retina_logo').length){
		$('.normal_logo').hide();
		$('.retina_logo').show();
		}
	//
	$('.page-title-bar').addClass('page-title-bar-retina');
	
	}
// responsive or not
if( alchem_params.responsive == "no" ){
   $('meta[name="viewport"]').prop('content', 'width='+alchem_params.site_width.replace('px',''));
}
// parallax scrolling
$('.parallax-scrolling').each(function(){
	$(this).parallax("50%", 0.1);
	});

//video background
 $('#alchem-youtube-video').parent('.section').css({'min-height':$(window).height()});
 var myPlayer;
        jQuery(function () {
             myPlayer = jQuery("#alchem-youtube-video").YTPlayer();
        });

	 
// related posts
var related = $(".alchem-related-posts");

related.owlCarousel({
    loop:true,
    margin:15,
	navText: [" "," "],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:false
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:false,
            loop:true
        }
    }
})

	//fixed header
	$(window).scroll(function(){
   if( $('.fxd-header').length ){
    if( $("body.admin-bar").length){
		if( $(window).width() < 765) {
				stickyTop = 46;
				
			} else {
				stickyTop = 32;
			}
	  }
	  else{
		  stickyTop = 0;
		  }
		  
	 var stickyTop2 = stickyTop;
	 if( $(".top-bar").length ){
	 stickyTop2 = stickyTop + $(".top-bar").outerHeight() ;		  
     }
	 if( $('.slider-above-header .page-top-slider').length ){
		 stickyTop2 = stickyTop2 + $('.slider-above-header .page-top-slider').outerHeight() ;
		 }
		 
		  ////
		 if( !($(window).width() < 919 && alchem_params.isMobile == 0 )) {
	 
		  $('.fxd-header').css('top',stickyTop);
					var scrollTop = $(window).scrollTop(); 
				if ( scrollTop > stickyTop2  ) { 
				if( !$(".top-banner").length ){
					$('.main-header').hide();
				}
					$('.fxd-header').show();
					} else {
						if( !$(".top-banner").length ){
						$('.main-header').show(); 
						}
						$('.fxd-header').hide();
					}  
					
		 }
					
					////////////
					
               }
     });
	
// nav menu search icon
  
  if( alchem_params.show_search_icon === 'yes' ){
	   $.ajax({type:"POST",dataType:"html",url:alchem_params.ajaxurl,data:"action=alchem_nav_searchform",
	    success:function(data){
			$('header .main-header .main-nav').append('<li class="menu-item menu-item-search-icon"><a href="javascript:;"><i class="fa fa-search site-search-toggle"></i></a>'+data+'</li>');
			$('header .fxd-header .main-nav').append('<li class="menu-item menu-item-search-icon"><a href="javascript:;"><i class="fa fa-search site-search-toggle"></i></a>'+data+'</li>');
			},error:function(){}});
	   $('header').on('click','.site-search-toggle',function(){
            $('.menu-item-search-icon .search-form').toggle();	
			$('.menu-item-search-icon .search-form input#s').focus();	  
          });
	   var key = 0;  
	    $(document).on('mouseover','.menu-item-search-icon .search-form',function(){ 
		    key = 0 ;
		});
		$(document).on('mouseout','.menu-item-search-icon .search-form',function(){ 
		    key = 1 ;
		});
		$(document).mousedown(function(){
			if(key == 1){
				$('.menu-item-search-icon .search-form').hide();
				}
		});
	  }

// tool tip
$('[data-toggle="tooltip"]').tooltip(); 

// slider
if( $('.alchem-carousel').length){
	var interval = parseInt(alchem_params.slideshow_speed);
	if(alchem_params.slider_autoplay == 'no')
	interval = false;
	
$('.alchem-carousel').carousel({ interval: interval, cycle: true });
}


// scheme
 if( typeof alchem_params.global_color !== 'undefined' && alchem_params.global_color !== '' ){
 less.modifyVars({
        '@color-main': alchem_params.global_color
    });
   }
   
  //prettyPhoto
 
 $("a[rel^='portfolio-image']").prettyPhoto();	 

 // blog
$('.blog-grid').masonry({
 // options
                itemSelector : '.entry-box-wrap'
            });

	$('.blog-timeline-wrap .entry-box-wrap').each(function(){
													   
	var position   = $(this).offset();		
	var left       = position.left;
	var wrap_width = $(this).parents('.blog-timeline-wrap').innerWidth();
	if( left/wrap_width > 0.5){
		  $(this).removeClass('timeline-left').addClass('timeline-right');
		}else{
		  $(this).removeClass('timeline-right').addClass('timeline-left');	
 }
 });

 //side header	
$('.side-header .site-nav .menu_column  .sub-menu').css({'width':$('.post-wrap').width()});

//nav arrow on mobiles
$('.site-nav ul li.menu-item-has-children').each(function(){
	 $(this).prepend('<i class="fa fa-caret-down menu-dropdown-icon"></i>');
	
   })
$(document).on('click','.menu-dropdown-icon',function(){
		var submenu = 	$(this).parent('li').find('>ul.sub-menu');								  
		submenu.slideToggle();	
   });

$(window).resize(function() { 
 //side header		  
 $('.side-header .site-nav .menu_column  .sub-menu').css({'width':$('.post-wrap').width()});
 // blog timeline
 $('.site-nav ul li .sub-menu').attr("style","");
 $('.site-nav').attr("style","");
 $('.blog-timeline-wrap .entry-box-wrap').each(function(){
	var position   = $(this).offset();		
	var left       = position.left;
	var wrap_width = $(this).parents('.blog-timeline-wrap').innerWidth();
	if( left/wrap_width > 0.5){
		  $(this).removeClass('timeline-left').addClass('timeline-right');
		}else{
		  $(this).removeClass('timeline-right').addClass('timeline-left');	
 }
 });				  
						  
 });

  
  jQuery('header .site-nav').onePageNav({filter: 'ul li a[href^="#"]',scrollThreshold:0.2});	
  
   var win_height = $(window).height(); 
  $(".magee-section.fullheight").each(function(){ 
	   var section_height = $(this).height(); 
	   $(this).css({'height':section_height,'min-height':win_height}); 
});  
  
  ///// footer
 if(alchem_params.footer_sticky == '1'){
	 $('.fxd-footer').css({'margin-bottom':$('.fxd-footer .footer-info-area').outerHeight()});
	 }
	 
	 
// home page animation
	    $('.alchem-animated').each(function(){
			 if($(this).data('imageanimation')==="yes"){
		         $(this).find("img,i.fa").css("visibility","hidden");	
		 }
		 else{
	           $(this).css("visibility","hidden");	
		 }		
		 
	 });
	
	if(jQuery().waypoint) {
		$('.alchem-animated').waypoint(function() {
											  
			$(this).css({'visibility':'visible'});
			$(this).find("img,i.fa").css({'visibility':'visible'});	


			// this code is executed for each appeared element
			var animation_type       = $(this).data('animationtype');
			var animation_duration   = $(this).data('animationduration');
	        var image_animation      = $(this).data('imageanimation');
			 if(image_animation === "yes"){
						 
			$(this).find("img,i.fa").addClass("animated "+animation_type);

			if(animation_duration) {
				$(this).find("img,i.fa").css('-moz-animation-duration', animation_duration+'s');
				$(this).find("img,i.fa").css('-webkit-animation-duration', animation_duration+'s');
				$(this).find("img,i.fa").css('-ms-animation-duration', animation_duration+'s');
				$(this).find("img,i.fa").css('-o-animation-duration', animation_duration+'s');
				$(this).find("img,i.fa").css('animation-duration', animation_duration+'s');
			}
			
				 
			 }else{
			$(this).addClass("animated "+animation_type);

			if(animation_duration) {
				$(this).css('-moz-animation-duration', animation_duration+'s');
				$(this).css('-webkit-animation-duration', animation_duration+'s');
				$(this).css('-ms-animation-duration', animation_duration+'s');
				$(this).css('-o-animation-duration', animation_duration+'s');
				$(this).css('animation-duration', animation_duration+'s');
			}
			 }

			 
		},{ triggerOnce: true, offset: '90%' });
	}
	
	// home page slider
	if( $("#carousel-banner-section .item").length>1){
	var owl_slider = $("#carousel-banner-section");
	var autoplay;
	if(alchem_params.slider_autoplay == 'yes' )
	autoplay = true;
	else
	autoplay = false;
					owl_slider.owlCarousel({
						loop:true,
						margin:0,
						autoplay:autoplay,
						autoplayTimeout:parseInt(alchem_params.slideshow_speed),
						autoplayHoverPause:true,
						items:1,
						responsiveClass:true,
						responsive:{
							0:{
								items:1,
								nav:false
							},
							600:{
								items:1,
								nav:false,
							},
							1000:{
								items:1,
								nav:false,
							}
						}
					});
					
	}
	// home page testimonial					
var owl_testimonial = $("#home-page-testimonial");
					owl_testimonial.owlCarousel({
						loop:true,
						margin:0,
						autoplay:true,
						autoplayTimeout:5000,
						autoplayHoverPause:true,
						items:1,
						responsiveClass:true,
						responsive:{
							0:{
								items:1,
								nav:false
							},
							600:{
								items:1,
								nav:false,
							},
							1000:{
								items:1,
								nav:false,
							}
						}
					});
					  owl_testimonial.parents(".home-page-testimonial").find(".carousel-next").click(function(){
					  owl_testimonial.trigger("next.owl.carousel");
					})
					  owl_testimonial.parents(".home-page-testimonial").find(".carousel-prev").click(function(){
					  owl_testimonial.trigger("prev.owl.carousel");
					});
					owl_testimonial.find('.owl-dots').hide();  
// home page clients	
var owl_clients = $("#alchem-home-style-2-clients");
					owl_clients.owlCarousel({
						loop:true,
						margin:10,
						autoplay:true,
						autoplayTimeout:5000,
						autoplayHoverPause:true,
						items:4,
						responsiveClass:true,
						responsive:{
							0:{
								items:1,
								nav:false
							},
							600:{
								items:2,
								nav:false,
							},
							1000:{
								items:4,
								nav:false,
							}
						}
					});
					 owl_clients.parents(".alchem-home-style-2-clients").find(".carousel-next").click(function(){
					  owl_clients.trigger("next.owl.carousel");
					})
					owl_clients.parents(".alchem-home-style-2-clients").find(".carousel-prev").click(function(){
					  owl_clients.trigger("prev.owl.carousel");
					
 });
					owl_clients.find('.owl-dots').hide();  
					
//featured box style 2

var s=$(".magee-feature-box.style2");
            for(i=0;i<s.length;i++) {
                var t=$(s[i]).find(".icon-box").outerWidth();
				if($(s[i]).find("img.feature-box-icon").length){
				var t=$(s[i]).find("img.feature-box-icon").outerWidth();
				}
                t+=15;
                t+="px";
                $(s[i]).css({"padding-left":t});
            }
            var s=$(".magee-feature-box.style2.reverse");
            for(i=0;i<s.length;i++) {
                var t=$(s[i]).find(".icon-box").outerWidth();
				if($(s[i]).find("img.feature-box-icon").length)
				var t=$(s[i]).find("img.feature-box-icon").outerWidth();
				
                t+=15;
                t+="px";
                $(s[i]).css({"padding-left":0,"padding-right":t});
            }
            var s=$(".magee-feature-box.style3");
            for(i=0;i<s.length;i++) {
                var t=$(s[i]).find(".icon-box").outerWidth();
				if($(s[i]).find("img.feature-box-icon").length)
				var t=$(s[i]).find("img.feature-box-icon").outerWidth();
                t+="px";
                $(s[i]).find("h3").css({"line-height":t});
            }
            var s=$(".magee-feature-box.style4");
            for(i=0;i<s.length;i++) {
                var t=$(s[i]).find(".icon-box").outerWidth();
				if($(s[i]).find("img.feature-box-icon").length)
				var t=$(s[i]).find("img.feature-box-icon").outerWidth();
                t=t/2;
                t1=-t;
                t+="px";
                t1+="px";
                $(s[i]).css({"padding-top":t,"margin-top":t});
                $(s[i]).find(".icon-box").css({"top":t1,"margin-left":t1});
				$(s[i]).find("img.feature-box-icon").css({"top":t1,"margin-left":t1});
            }
			
			
//woocommerce
$(document).on('click','.alchem-quantity .minus',function(){
		 var qtyWrap  = $(this).parent('.quantity');
		 var quantity =  parseInt(qtyWrap.find('.qty').val());
		 var min_num  =  parseInt(qtyWrap.find('.qty').attr('min'));
		 var max_num  =  parseInt(qtyWrap.find('.qty').attr('max'));
		 var step     =  parseInt(qtyWrap.find('.qty').attr('step'));
		 $('input[name="update_cart"]').removeAttr("disabled");
 
 if( quantity > min_num){
	 quantity = quantity - step;
	 if( quantity > 0 )
	 qtyWrap.find('.qty').val(quantity);
	 }
  });
$(document).on('click','.alchem-quantity .plus',function(){
		var qtyWrap  = $(this).parent('.quantity');
		var quantity =  parseInt(qtyWrap.find('.qty').val());
		var min_num  =  parseInt(qtyWrap.find('.qty').attr('min'));
		var max_num  =  parseInt(qtyWrap.find('.qty').attr('max'));
		var step     =  parseInt(qtyWrap.find('.qty').attr('step'));
		$('input[name="update_cart"]').removeAttr("disabled");
	   if( max_num ){
		   if( quantity < max_num ){
		      quantity = quantity + step;
		      qtyWrap.find('.qty').val(quantity);
			}
		   }else{
			    quantity = quantity + step;
			    qtyWrap.find('.qty').val(quantity); 
			   }
  });

$(".product-image").each(function() {
               $(this).hover(function() {
                 if($(this).find('.product-image-back img').length){
					   $(this).find('.product-image-front').css({'opacity':'0'});
					 }
               },
           function() {
                      $(this).find('.product-image-front').css({'opacity':'1'});
                });
           });


					

});

jQuery(window).on('load', function(){ 
								   
 var $ = jQuery;
 //masonry
 // portfolio
$('.alchem-masonry,.magee-masonry').masonry({
 // options
                itemSelector : '.portfolio-box-wrap'
            });
 // blog
$('.blog-grid').masonry({
 // options
                itemSelector : '.entry-box-wrap',
				animate: true
            });
								   
 });