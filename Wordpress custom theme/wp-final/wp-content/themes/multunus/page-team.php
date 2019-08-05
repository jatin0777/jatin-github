<?php get_header(); ?>
<!--/top --> 

<!--breadcrumb-->
<div class="main_container light_bg">
<div class="bre_crumb">
<div class="crumb_inner">
<ul>
<li><a href="#">Home</a><span>/</span></li>
<li><?php echo basename(get_permalink()); ?><span>/</span></li>
</ul>

</div>
</div>
</div>
<!--breadcrumb-->


<!--career_mdl -->
<div class="main_container bg_white tab_con">
<div class="portfolio_main">
<div class="container">
<div class="port_top">
<h1><?php the_field('heading'); ?></h1>
<p><?php the_field('description'); ?></p>
</div>


<!--port_middle -->
    	<div class="portfolio_inner">
        
        <nav id="mainNav" class="navbar">
 <div class="navbar-inner">
         
  <div class="mobile-menu">
    <a data-status="plus" href="#">Menu<i class="ar-plus"></i></a>
  </div>
               
             
  <div class="margin60-b">
        <span>Sort By :</span>
 <ul id="filters" data-option-key="filter" class="option-set">
       <li class="select"><a href="#filter" data-filter="*">ALL</a></li>
    <li><a href="#filter" data-filter=".creative_team">Creative Team</a></li>
    <li><a href="#filter" data-filter=".stratregic_team">Stratregic Team</a></li>
    <li><a href="#filter" data-filter=".management_team">Management Team</a></li>
    </ul>
				</div>
 
 </div>
 
 


<br clear="all"/>
 
</nav>
<div class="test"></div>

        
                
                <br class="clear"/>
                <ul id="team_inner" class="team_middle">
			
         <?php if( have_rows('add_team_member') ): ?>
            
            <!--rpt_slide-->
            <?php while( have_rows('add_team_member') ): the_row(); 

    // vars
              $employee_image = get_sub_field('employee_image');
              $employee_name = get_sub_field('employee_name');
              
    ?>
               <li class="creative_team">
               <a href="#">
               <div class="team_img"> 
               <img src="<?php echo $employee_image; ?>" alt="santosh"> </div>
               <?php echo $employee_name; ?>
               

               </a> 
               <?php if( have_rows('employee_details') ): ?>
            
            <!--rpt_slide-->
            <?php while( have_rows('employee_details') ): the_row(); 

    // vars
              $employee_big_image = get_sub_field('employee_big_image');
              $full_name = get_sub_field('full_name'); 
              $designation = get_sub_field('designation');
              $more_details = get_sub_field('more_details');
              
    ?>
                                       <!--team_details -->
               <div class="team_details">
               <div class="container team_bg">
               <div class="row-fluid">
               <!--team_left -->
               <div class="span6">
               <div class="team_left">
                 <img src="<?php echo $employee_big_image; ?>"> </div>
               </div>
                <!--/team_left -->
                
                     <!--team_right-->
               <div class="span6">
               <div class="team_right">
               <h6><?php echo $full_name; ?></h6>
               <span><?php echo $designation; ?></span>
               <p><?php echo $more_details; ?></p>

               
               <ul>
 <li><a class="fb" href="#"></a></li>
 <li><a class="tw" href="#"></a></li>
 <li><a class="gp" href="#"></a></li>
 </ul>
               </div>
               </div>
                <!--/team_right -->
               </div>
               </div>
               </div>
                 <!--team_details -->
   <?php endwhile; ?>
          <!--rpt_slide-->
        
          <?php endif; ?>   
               </li>     
               <?php endwhile; ?>
          <!--rpt_slide-->
        
          <?php endif; ?>   
              
              
              
               
                  

               




                      
 		
             </ul>
             
             
        </div>
        
        <!--/port_middle -->
        
        </div>
</div>
</div>
<!--/career_mdl -->















<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.bxslider.js"></script> 
<script>
$('.bxslider').bxSlider({
  mode: 'fade',
  pager:false,
  auto:true,
  controls:false
});

$('.bxslider1').bxSlider({
  pager:false,
 // auto:true,
});

$(document).ready(function(){
  $('.sw_slider').bxSlider({
    slideWidth: 300,
    minSlides: 1,
    maxSlides: 3,
	 moveSlides: 1,
	 slideMargin:20,
 // auto: true,
  pager: false
  });
});
  


</script> 

<script>

 $('.top_cont a, .back_top, .back_btm').click(function(){
	 
	 var toscroll = $('.tab_con').position();
	 var divtoppos = toscroll.top-62;
	 
		$("html, body").animate({ scrollTop: divtoppos }, 600);
        return false;
        });
   // $('.top_cont a').click(function () {

//$("html, body").animate({ scrollTop:bg_white.top-150}, 1000);
    //})
</script>

<script>
	$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	   {

	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top-123
	        }, 600);
			
	        return false;
	      }
	    }
	  });
	  
	  $('.faq_menu ul li a').click(function(){
			$('.faq_menu ul li').removeClass("select");
			$(this).parent('li').addClass("select");

		  
		  });
	});
	</script>



<script>
    $('#myTab a, #myTab_ser a').click(function () {
    e.preventDefault();
    $(this).tab('show');
    })
</script>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.isotope.js"></script>

<script>

	$(window).load(function(e) {
// cache container
var $container = $('#abcd, #team_inner');
// initialize isotope
$container.isotope({
 resizable: true
});

    $('.option-set li a').click(function(){
			$('.option-set li').removeClass("select");
			$(this).parent('li').addClass("select");

		  
		  });
		  
		




 
// filter items when filter link is clicked
$('#filters a').click(function(){
  var selector = $(this).attr('data-filter');
  $container.isotope({ filter: selector });
  return false;
});
	});

 
</script>





<script>
      $('.team_middle li a').click(function(){
			$('.team_middle li').removeClass("select");
			$(this).parent('li').addClass("select");
		

		
		var getpos_li = $(this).parent().position();
		var getpos_ul = $(this).parent().parent().position();
		

		
		var gethtml = $(this).parent().children('.team_details').html();

		
		var getpos_li_left = getpos_li.left;
		var getpos_li_top = getpos_li.top;
	
		var divpos_top = getpos_ul.top+getpos_li_top+203;
		
		$('.test').show();
		$('.test').css('top', divpos_top);
		$('.test').html(gethtml);
		
		
		return false;
		
			  
		  });
		  
		
		$('.test').mouseover(function(e) {
            
			$(this).show();			
			
        }).mouseout(function(){
		
			$(this).hide();
			
		});
		
		  
		 
</script>

<script type="text/javascript">

  $(document).ready(function() {
	  
	  
    $(".mobile-menu a").click(function() {
      $("nav#mainNav .right_navigation").slideToggle();
      var status = $(this).attr('data-status');
      if (status=='plus') {
        $(this).attr('data-status', 'minus');
        $(this).html('<i class="ar-minus"></i> Menu');
      } else if (status == 'minus') {
        $(this).attr('data-status', 'plus');
        $(this).html('<i class="ar-plus"></i> Menu');
      } else {
        $(this).html("I've made a huge mistake."); //A little Arrested Development
                                                   //joke to keep me sane.
                                                   //This else should never be reached.
      }
	  
	  return false;
	 
	  
    });
  });
 
 
 
	
    if (vwptWidth >768) {
	  
	  $(".right_navigation").removeAttr("style");
	  
	  
	  
    }
 
  
  
  $(".right_navigation ul li a").click(function(){
	  
	var w = $( window ).width();
	
	if(w < 768 ){
		
		var current = $(this).parent("li").attr("class");
		
				
				var id = $(this).attr("href");					 
				//$(id).addClass("faq_block");
				
				$(".faq_inner").addClass("faq_none");
			$(id).removeClass("faq_none");
		
			$(id).addClass("faq_block");

	}
	  
	  
});
  
  
</script>

<script type="text/javascript">
  $(document).ready(function() {
	  
	  

	  
	  
    $(".mobile-menu a").click(function() {
      $(".option-set").slideToggle();
      var status = $(this).attr('data-status');
      if (status=='plus') {
        $(this).attr('data-status', 'minus');
        $(this).html('<i class="ar-minus"></i> Menu');
      } else if (status == 'minus') {
        $(this).attr('data-status', 'plus');
        $(this).html('<i class="ar-plus"></i> Menu');
      } else {
        $(this).html("I've made a huge mistake."); //A little Arrested Development
                                                   //joke to keep me sane.
                                                   //This else should never be reached.
      }
	  
	  return false;
	 
	  
    });
  });
 

</script>

<?php get_footer(); ?>