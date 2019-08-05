<?php get_header(); ?>
<!--top -->
<style type="text/css">
  
.showcase{
    background-image: url(<?php echo get_theme_mod('showcase_image',get_bloginfo('template_url').'/img/header_image.jpg'); ?>);
            background-repeat: no-repeat;
            background-position: center;
            height: 450px;
}
</style>
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
<!--top_video-->
<div class="showcase">
  <div class="top_header" style="max-height: 450px;">
    <div class="top_video">
      
    <div class="overlay" style="height: 450px;"></div>
    <div class="container">
      <div class="top_cont" style="margin-top: 70px;">
        <h1><?php the_field('header'); ?>
          <label><strong><?php the_field('header_text_2'); ?></strong></label>
        </h1>
        <a href="#" class="btn_red"><?php the_field('button_text'); ?><span></span></a> 
      </div>
    </div>
  </div>
</div>
</div>
<!--/top_video--> 


<!--/top_video-->
<?php if( have_rows('add_services_section') ): ?>
            
            <!--rpt_slide-->
            <?php while( have_rows('add_services_section') ): the_row(); 

    // vars
              $heading_1 = get_sub_field('heading_1');
              $heading_2 = get_sub_field('heading_2');
              $heading_3 = get_sub_field('heading_3');
              $main_heading = get_sub_field('main_heading');
              $main_text = get_sub_field('main_text');
              $add_image = get_sub_field('add_image');
              $caption = get_sub_field('caption');
              $heading_2_text = get_sub_field('heading_2_text');
              $heading_3_text = get_sub_field('heading_3_text');

              
    ?>

<!--main_services --> 
<div class="main_container tab_con">
  <div class="container">
    <ul class="nav-tabs" id="myTab_ser">
      <li class="active"><a href="#web_app"><span class="app_web"></span><?php echo $heading_1; ?></a></li>
      <li><a href="#mob_app"><span class="app_mob"></span><?php echo $heading_2; ?></a></li>
            <li><a href="#open_source"><span class="app_opensource"></span><?php echo $heading_3; ?></a></li>
    </ul>
  </div>
</div>
<div class="main_container grey_bg">
  <div class="container">
    <div class="tab-content">
      <div class="tab-pane active" id="web_app">
      <div class="ser_web">
      <div class="top_heading">
     <h2> <?php echo $main_heading; ?> </h2>
     <p><?php echo $main_text; ?></p>
     
     </div>
     <div class="ser_tbm">
     <ul>
     <?php if( have_rows('add_image') ): ?>
            
            <!--rpt_slide-->
            <?php while( have_rows('add_image') ): the_row(); 
              $image = get_sub_field('image');
              $caption = get_sub_field('caption');
              ?>  
     <li><span><img src="<?php echo $image; ?>" alt="ser"></span>
       <label><?php echo $caption; ?></label>
     </li>

  <?php endwhile; ?>
          <!--rpt_slide-->
        
          <?php endif; ?>   
     </ul>
     </div>
      
      
      
      
      </div>
     
      </div>
      <div class="tab-pane" id="mob_app">
      <?php echo $heading_2_text; ?>
        
      </div>
      
            <div class="tab-pane" id="open_source">
     <?php echo $heading_3_text; ?>
        
      </div>
      
    </div>
  </div>
</div>
<!--/main_services --> 

  <?php endwhile; ?>
          <!--rpt_slide-->
        
          <?php endif; ?>     






<?php if( have_rows('add_third_section') ): ?>
            
            <!--rpt_slide-->
            <?php while( have_rows('add_third_section') ): the_row(); 

    // vars
             $heading = get_sub_field('heading');
             $first_para = get_sub_field('first_para');
             $first_image = get_sub_field('first_image');
             $second_para = get_sub_field('second_para');
             $second_image = get_sub_field('second_image');
             $technology_heading_1 = get_sub_field('technology_heading_1');
             $technology_heading_2 = get_sub_field('technology_heading_2');
              
    ?>

<!--services_listing-->
<div class="main_container bg_white">
    <div class="service_middle">
  <div class="container">
  <div class="work_hading">
    <p><?php echo $heading; ?></p>
    </div>
  <div class="row-fluid">

<div class="span3 ser_right">
<div class="service_img">
  <img src="<?php echo $first_image; ?>" alt="rail"> </div>
</div>

<div class="span8 ser_left">

<div class="ser_cont">
  <h3><?php echo $technology_heading_1; ?></h3>
  <p>
<?php echo $first_para; ?>
</p>
</div>

</div>
  
  </div>
  
  <div class="row-fluid">

<div class="span3 ser_left">
<div class="service_img">
  <img src="<?php echo $second_image; ?>" alt="spring"></div>
</div>

<div class="span8 ser_right">

<div class="ser_cont">
  <h3><?php echo $technology_heading_2; ?></h3>

  <p>
<?php echo $second_para; ?>
</p>

</div>

</div>
  
  </div>
    </div>
    
    
  </div>
</div>
<!--services_listing-->

<?php endwhile; ?>
          <!--rpt_slide-->
        
          <?php endif; ?>     




<?php if( have_rows('add_fourth_section') ): ?>
            
            <!--rpt_slide-->
            <?php while( have_rows('add_fourth_section') ): the_row(); 

    // vars
            $fouth_section_heading = get_sub_field('fouth_section_heading');
              
    ?>

<!--services_work_slider-->
<div class="main_container bg_white">
    <div class="swork_middle">
  <div class="container">
  <div class="work_hading">
    <p><?php echo $fouth_section_heading; ?></p>
    </div>


<!--work_slider -->
      <div class="ser_work">
             <a href="#" class="port_icon"></a> 
        <div class="sw_slider"> 

        <?php if( have_rows('add_slides') ): ?>
            
            <!--rpt_slide-->
            <?php while( have_rows('add_slides') ): the_row(); 

    // vars
            $slide_image = get_sub_field('slide_image');
            $slide_heading = get_sub_field('slide_heading');
            $slide_label = get_sub_field('slide_label');
              
    ?>
          <!--rpt_slide-->
          <div class="sr_slide">
          <a href="#">
            <div class="sldr_con">
            <img src="<?php echo $slide_image; ?>" alt="work_01"> </div>
            <div class="wk_btm">
            <span><?php echo $slide_heading; ?><label><?php echo $slide_label; ?></label></span>
            </div>
            </a></div>
          <!--rpt_slide-->
          <?php endwhile; ?>
          <!--rpt_slide-->
        
          <?php endif; ?>     

        </div>
      </div>
<!--/work_slider -->








</div>

</div>
  
  </div>
    </div>

<!--services_work_slider-->
<?php endwhile; ?>
          <!--rpt_slide-->
        
          <?php endif; ?>     






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
    $('#myTab a, #myTab_ser a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    })
</script>


<?php get_footer(); ?>