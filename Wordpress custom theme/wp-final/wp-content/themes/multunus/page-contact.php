<?php get_header(); ?>

<style type="text/css">
  
.showcase{
    background-image: url(<?php echo get_theme_mod('showcase_image',get_bloginfo('template_url').'/img/header_image.jpg'); ?>);
            background-repeat: no-repeat;
            background-position: center;
            height: 450px;
}
</style>

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

<!--top_video-->
<div class="showcase">
  <div class="top_header">
    <div class="top_video">
      
    <div class="overlay" style="height: 450px;"></div>
    <div class="container">
      <div class="top_cont" style="margin-top: 70px;">
      	 <div class="white_logo"><img src="<?php the_field('top_logo'); ?>" alt="contact_m"></div>
        <h1><?php the_field('header_text'); ?>
          <label><strong><?php the_field('header_text_2'); ?></strong></label>
        </h1>
      </div>
    </div>
  </div>
</div>
</div>
<!--/top_video--> 

<?php if( have_rows('get_in_touch_with_us') ): ?>
            
            <!--rpt_slide-->
            <?php while( have_rows('get_in_touch_with_us') ): the_row(); 

    // vars
   
              $heading = get_sub_field('heading');
              $image = get_sub_field('image');
              $label = get_sub_field('label');
              $text = get_sub_field('text');
              $image2 = get_sub_field('image2');
              $label2 = get_sub_field('label2');
              $text2 = get_sub_field('text2');
              $image3 = get_sub_field('image3');
              $label3 = get_sub_field('label3');
              $text3 = get_sub_field('text3');



    ?>
<!--services_listing-->
<div class="main_container bg_white">
  <div class="contact_top">
    <div class="container">
      <div class="work_hading">
        <p><?php echo $heading; ?></p>
      </div>
      <div class="contact_inner">
        <ul>
          <li class="contact_mail"><a href="mailto:<?php echo $text; ?>"><span><img src="<?php echo $image; ?>" alt="contact_mail"></span></a>
            <label><?php echo $label; ?></label>
            <a href="mailto:<?php echo $text; ?>"><?php echo $text; ?></a>
        </li>
        
          <li><a href="tel:<?php echo $text2; ?>"><span><img src="<?php echo $image2; ?>" alt="contact_phone"></a></span>
            <label ><?php echo $label2; ?></label>
            <a href="tel:<?php echo $text2; ?>"><?php echo $text2; ?></a>
        </li>
        
          <li><a href="tel:<?php echo $text3; ?>"><span><img src="<?php echo $image3; ?>" alt="contact_phone"></a></span>
            <label><?php echo $label3; ?></label>
            <a href="tel:<?php echo $text3; ?>"><?php echo $text3; ?></a>
        </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--services_listing--> 
 <?php endwhile; ?>
          <!--rpt_slide-->
        
          <?php endif; ?>   
<!--main_services --> 

<?php if( have_rows('find_us') ): ?>
            
            <!--rpt_slide-->
            <?php while( have_rows('find_us') ): the_row(); 

    // vars
              $heading = get_sub_field('heading');
              $tab1 = get_sub_field('tab1');
              $location_iframe = get_sub_field('location_iframe');
              $full_address = get_sub_field('full_address');


    ?>
<!--top_heading -->
<div class="main_container">
  <div class="container">
    <div class="top_heading">
      <h2><?php echo $heading; ?></h2>
    </div>
  </div>
</div>
<!--/top_heading -->
<div class="main_container ct_grey">
  <div class="container">
    <ul class="nav-tabs" id="myTab_contact">
      <li class="active"><a href="#web_ind" ><?php echo $tab1; ?></a></li>
      
    </ul>
  </div>
</div>
<div class="main_container">
  <div class="tab-content">
    <div class="tab-pane active" id="web_ind">
      <div class="ser_web">
        <div id="map" style="width:100%; height:623px"><?php echo $location_iframe; ?></div>
        <div class="map_bg"></div>
        <div class="container">
          <div class="inner_contact">
            <div class="contact_left">
              <div class="contact_form">
             <span>Drop A line</span>
                  <form>
                    <div class="control-group">
                      <div class="controls">
                        <p>Name<label>*</label></p>
                        <input type="text" class="input_box"  required="required" >
                        
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <div class="controls">
                        <p>Email<label>*</label></p>
                        <input type="email" class="input_box"  required="required" >
                        
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <div class="controls">
                        <p>Message<label>*</label></p>
                        <textarea required class="input_box"></textarea>
                        
                      </div>
                    </div>
                    <input type="submit" value="Submit" class=" btn_red"/>
                  </form>
                </div>
              
            </div>
            
            <div class="contact_right" id="con_ind">
            <span>We are here</span>
           <p><?php echo $full_address; ?></p>
            </div>
            
            <div class="contact_right" id="con_usa">
            <span>We are here</span>
           <p> No. 1316/A, 2nd floor,<br>

9th Cross, JP Nagar 2nd Phase,<br>

St, Docklands<br>

VIC-3008</p>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <div class="tab-content">
    <div class="tab-pane" id="web_usa">
     <div class="ser_web">
        <div id="map1" style="width:100%; height:623px"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3175952.3204406025!2d-107.79427075402403!3d38.98071974686476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x874014749b1856b7%3A0xc75483314990a7ff!2sColorado%2C+USA!5e0!3m2!1sen!2sin!4v1564835075171!5m2!1sen!2sin" width="100%" height="95%" frameborder="0" style="border:0" allowfullscreen></iframe></div>
        <div class="map_bg"></div>
        <div class="container">
          <div class="inner_contact">
            <div class="contact_left">
              <div class="contact_form">
             <span>Drop A line</span>
                  <form>
                    <div class="control-group">
                      <div class="controls">
                        <p>Name<label>*</label></p>
                        <input required="required" type="text" class="input_box" >
                        
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <div class="controls">
                        <p>Email<label>*</label></p>
                        <input type="email" class="input_box" required>
                        
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <div class="controls">
                        <p>Message<label>*</label></p>
                        <textarea required class="input_box"></textarea>
                        
                      </div>
                    </div>
                    <input type="submit" value="Submit" class=" btn_red"/>
                  </form>
                </div>
              
            </div>
            
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--/main_services --> 
<?php endwhile; ?>
          <!--rpt_slide-->
        
          <?php endif; ?>  



          <?php if( have_rows('add_tweets') ): ?>
            
            <!--rpt_slide-->
            <?php while( have_rows('add_tweets') ): the_row(); 

    // vars
             $heading = get_sub_field('heading');
             $tweet = get_sub_field('tweet');
             $date_of_tweet = get_sub_field('date_of_tweet');
             $button_text = get_sub_field('button_text');
             $button_url = get_sub_field('button_url');


    ?>
<!--services_work_slider-->
<div class="main_container bg_white">
  <div class="contact_twitter">
    <div class="container">
      <div class="work_hading">
        <p>Latest Tweet</p>
      </div>
      <div class="latest_tweet">
        <span>"</span><p><?php echo $tweet; ?></p><span>"</span>
        <span>on: 13 Sep</span>
        <br class="clear"/>
        <br>
        <a href="<?php echo $button_url; ?>"><button class="btn btn-primary" style="border-radius: 30px;"><?php echo $button_text; ?></button></a>
      </div>
    </div>
  </div>
</div>
</div>

<?php endwhile; ?>
          <!--rpt_slide-->
        
          <?php endif; ?>  
<!--services_work_slider--> 

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

 $('.top_cont a').click(function(){
	 
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
    $('#myTab a, #myTab_ser a, #myTab_contact a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    })
</script>
<script>
$(document).ready(function() {
    
	$("#con_usa").hide();
	
	$('.nav-tabs li a').click(function(){
	
		var href = $(this).attr('href');
		if(href == "#web_ind"){
			$("#con_ind").show();
			$("#con_usa").hide();										
		}
		if(href == "web_usa"){
			$("#con_ind").hide();
			$("#con_usa").show();										
				
		}
		
	});
	
});
</script>


<?php get_footer(); ?>