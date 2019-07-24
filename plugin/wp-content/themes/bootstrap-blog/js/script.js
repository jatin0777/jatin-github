 jQuery(function($) { // DOM is now read and ready to be manipulated
  
    //Tab to top
    $(window).scroll(function() {
    if ($(this).scrollTop() > 1){  
        $('.scroll-top-wrapper').addClass("show");
    }
    else{
        $('.scroll-top-wrapper').removeClass("show");
    }
});
    $(".scroll-top-wrapper").on("click", function() {
     $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
});



 $('.dropdown').hover(function() {
      $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
    }, function() {
      $(this).find('.dropdown-menu').first().stop(true, true).slideUp(150)
    });

var count=0;
$('.dropdown .caret').on('click',function(e){
    e.preventDefault();
  if (count===0){
    $(this).closest( "li" ).find('.dropdown-menu').first().stop(true, true).slideDown(150);
    count++;
  }
  else
  {
    $(this).closest( "li" ).find('.dropdown-menu').first().stop(true, true).slideUp(150);
    count=0;
  }

 });



var stickyOffset = ( jQuery(".sticky-header").offset() || { "top": NaN } ).top;

if ( ! isNaN( stickyOffset ) ) {

  jQuery(window).scroll(function(){
    var sticky = jQuery(".sticky-header");
        scroll = jQuery(window).scrollTop();
      
    if (scroll >= stickyOffset) sticky.addClass("fix-top");
    else sticky.removeClass("fix-top");
  });
}






$('#owl-testimonials').owlCarousel({
      loop:false,
      margin:0,
      nav:false,
      dots:true,
      autoplay:true,
      autoplayTimeout:2000,
      autoplayHoverPause:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
  })



$('#owl-slider').owlCarousel({
      loop:false,
      margin:15,
      nav:false,
      dots:true,
      autoplay:true,
      autoplayTimeout:4000,
      autoplayHoverPause:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
  })

$('#owl-slider-one').owlCarousel({
      loop:true,
      margin:0,
      nav:false,
      dots:true,
      autoplay:true,
      autoplayTimeout:4000,
      autoplayHoverPause:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
  })



$('.widget-instagram ul').addClass('owl-carousel');
$('.widget-instagram ul').owlCarousel({
      loop:false,
      margin:1,
      nav:true,
      dots:false,
      autoplay:true,
      autoplayTimeout:2000,
      autoplayHoverPause:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:5
          },
          1440:{
                items: 8
          }
      }
  })








});