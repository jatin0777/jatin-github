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
<!--top_video-->
<div class="showcase">
  <div class="top_header">
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

<!--main_services --> 
<div class="main_container tab_con">
  <div class="container">
    <ul class="nav-tabs" id="myTab_ser">
      <li class="active"><a href="#web_app"><span class="app_web"></span>Web<br> Application</a></li>
      <li><a href="#mob_app"><span class="app_mob"></span>Mobile<br> Application</a></li>
            <li><a href="#open_source"><span class="app_opensource"></span>Open<br> Source</a></li>
    </ul>
  </div>
</div>
<div class="main_container grey_bg">
  <div class="container">
    <div class="tab-content">
      <div class="tab-pane active" id="web_app">
      <div class="ser_web">
      <div class="top_heading">
     <h2> Domains</h2>
     <p>We’ve built web applications in the following domains:</p>
     
     </div>
     <div class="ser_tbm">
     <ul>
     <li><span><img src="<?php bloginfo('stylesheet_directory'); ?>/img/ser_01.png" alt="ser"></span>
       <label>Finance</label></li>
     <li><span><img src="<?php bloginfo('stylesheet_directory'); ?>/img/ser_02.png" alt="ser"></span><label>Consumer</label></li>
     <li><span><img src="<?php bloginfo('stylesheet_directory'); ?>/img/ser_03.png" alt="ser"></span><label>Education</label></li>
     <li><span><img src="<?php bloginfo('stylesheet_directory'); ?>/img/ser_04.png" alt="ser"></span><label>Local</label></li>
     <li><span><img src="<?php bloginfo('stylesheet_directory'); ?>/img/ser_05.png" alt="ser"></span><label>Health</label></li>
     <li><span><img src="<?php bloginfo('stylesheet_directory'); ?>/img/ser_06.png" alt="ser"></span><label>Product Engineering</label></li>
     </ul>
     </div>
      
      
      
      
      </div>
     
      </div>
      <div class="tab-pane" id="mob_app">
      mob_app
        
      </div>
      
            <div class="tab-pane" id="open_source">
     open_source
        
      </div>
      
    </div>
  </div>
</div>
<!--/main_services --> 


<!--services_listing-->
<div class="main_container bg_white">
    <div class="service_middle">
  <div class="container">
  <div class="work_hading">
    <p>Technologies we use</p>
    </div>
  <div class="row-fluid">

<div class="span3 ser_right">
<div class="service_img">
  <img src="<?php bloginfo('stylesheet_directory'); ?>/img/rail.jpg" alt="rail"> </div>
</div>

<div class="span8 ser_left">

<div class="ser_cont">
<h3>Ruby on Rails with JQuery</h3>
<p>We’ve been working with RoR from 2008. And have seen Rails evolve from version [2.x.x] to version [3.x.x].  We’ve also worked with JRuby extensively.</p>

<p>RoR Testing Stack: While we’ve done a fair bit of work using Cucumber, we prefer just sticking to RSpec for the most part. This combined with performance enhancement tools such as Spork - is now our bread and butter.</p>

<p>Javascript Testing Stack: For Javascript code, we write tests using Jasmine. And we use JSTestdriver to ensure they’re cross-browser platform compliant.</p>


</div>

</div>
  
  </div>
  
  <div class="row-fluid">

<div class="span3 ser_left">
<div class="service_img">
  <img src="<?php bloginfo('stylesheet_directory'); ?>/img/spring.jpg" alt="spring"></div>
</div>

<div class="span8 ser_right">

<div class="ser_cont">
<h3>Spring and Hibernate</h3>
<p>As mentioned above, our strong preference (when building new applications) - is to use Ruby on Rails. But if you’ve got an existing Java application that you want to enhance, the rest of this section will be relevant to you.</p>

<p>Our experience with Spring and Hibernate goes back to 2002. And during this time, our team has built almost a dozen products on this framework. More recently we’ve worked with the augmented stack which includes tools such as Spring ROO.</p>



</div>

</div>
  
  </div>
    </div>
    
    
  </div>
</div>
<!--services_listing-->







<!--services_work_slider-->
<div class="main_container bg_white">
    <div class="swork_middle">
  <div class="container">
  <div class="work_hading">
    <p>Work Samples</p>
    </div>


<!--work_slider -->
      <div class="ser_work">
             <a href="#" class="port_icon"></a> 
        <div class="sw_slider"> 

        
          <!--rpt_slide-->
          <div class="sr_slide">
          <a href="#">
            <div class="sldr_con">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/img/srwork_01.jpg" alt="work_01"> </div>
            <div class="wk_btm">
            <span>Tokkun Academy<label>Web Application</label></span>
            </div>
            </a></div>
          <!--rpt_slide--> 
          
           <!--rpt_slide-->
          <div class="sr_slide">
          <a href="#">
            <div class="sldr_con">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/img/srwork_02.jpg" alt="work_01"> </div>
            <div class="wk_btm">
            <span>Tokkun Academy<label>Web Application</label></span>
            </div>
            </a></div>
          <!--rpt_slide--> 
          
           <!--rpt_slide-->
          <div class="sr_slide">
          <a href="#">
            <div class="sldr_con">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/img/srwork_03.jpg" alt="work_01"> </div>
            <div class="wk_btm">
            <span>Tokkun Academy<label>Web Application</label></span>
            </div>
            </a></div>
          <!--rpt_slide--> 
          
          
         
       
                  
        </div>
      </div>
<!--/work_slider -->







</div>

</div>
  
  </div>
    </div>

<!--services_work_slider-->





<script type="text/javascript" src="js/jquery.bxslider.js"></script> 
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