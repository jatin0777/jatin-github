<?php get_header(); ?>

<style type="text/css">
  
.showcase{
    background-image: url(<?php echo get_theme_mod('showcase_image',get_bloginfo('template_url').'/img/header_image.jpg'); ?>);
            background-repeat: no-repeat;
            background-position: center;
            height: 100%;
}
</style>
<!--top_video-->
<div class="showcase">
  <div class="top_header">
    <div class="top_video">
      
    </div>
    <div class="overlay"></div>
    <div class="container">
      <div class="top_cont">
        <h1><?php echo get_theme_mod('showcase_heading','Custom Wordpress bootstrap theme'); ?>
          <label><?php echo get_theme_mod('showcase_text','for')?><strong>startups.</strong></label>
        </h1>
        <a href="#" class="btn_red"><?php echo get_theme_mod('btn_text','explore')?><span></span></a> </div>
    </div>
  </div>
</div>
<!--/top_video--> 


<!--home_services -->

<?php if( have_rows('add_section') ): ?>
            
            <!--rpt_slide-->
            <?php while( have_rows('add_section') ): the_row(); 

    // vars
              $second_section_1 = get_sub_field('second_section_1');
              $second_secton_2 = get_sub_field('second_secton_2');
              $first_tab = get_sub_field('first_tab');
              $first_tab_text = get_sub_field('first_tab_text');
              $second_tab = get_sub_field('second_tab');
              $second_tab_text = get_sub_field('second_tab_text');
              $third_tab = get_sub_field('third_tab');
              $third_tab_text = get_sub_field('third_tab_text');
              $services_tab_first = get_sub_field('services_tab_first');
              $services_tab_first_text = get_sub_field('services_tab_first_text');
              $services_tab_second = get_sub_field('services_tab_second');
              $services_tab_second_text = get_sub_field('services_tab_second_text');
              $services_tab_third = get_sub_field('services_tab_third');
              $services_tab_third_text = get_sub_field('services_tab_third_text');
    ?>
    <div class="main_container tab_con">
  <div class=" container">
    <ul class="nav-tabs" id="myTab">
      <li><a href="#big_picture"><?php echo $second_section_1; ?></a></li>
      <li class="active"><a href="#home_services"><?php echo $second_secton_2; ?></a></li>
    </ul>
  </div>
</div>
<div class="main_container grey_bg">
  <div class="container">
    <div class="tab-content">
      <div class="tab-pane" id="big_picture">
        <div class="row-fluid"> 
          
          <!--services_rept --> 
          <a href="#">
          <div class="span4">
            <div class="hser_rept"> <span class="web_apps"></span>
              <h3><?php echo $first_tab; ?></h3>
              <p><?php echo $first_tab_text; ?></p>
              <label>Learn More</label>
            </div>
          </div>
          </a> 
          <!--/services_rept --> 
          
          <!--services_rept --> 
          <a href="#">
          <div class="span4">
            <div class="hser_rept"> <span class="mob_apps"></span>
              <h3><?php echo $second_tab; ?></h3>
              <p><?php echo $second_tab_text; ?></p>
              <label>Learn More</label>
            </div>
          </div>
          </a> 
          <!--/services_rept --> 
          
          <!--services_rept --> 
          <a href="#">
          <div class="span4">
            <div class="hser_rept"> <span class="opensource"></span>
              <h3><?php echo $third_tab; ?></h3>
              <p><?php echo $third_tab_text; ?></p>
              <label>Learn More</label>
            </div>
          </div>
          </a> 
          <!--/services_rept --> 
          
        </div>
      </div>
      <div class="tab-pane active" id="home_services">
        <div class="row-fluid"> 
          
          <!--services_rept --> 
          <a href="#">
          <div class="span4">
            <div class="hser_rept"> <span class="web_apps"></span>
              <h3> <?php echo $services_tab_first; ?></h3>
              <p><?php echo $services_tab_first_text; ?></p>
              <label>Learn More</label>
            </div>
          </div>
          </a> 
          <!--/services_rept --> 
          
          <!--services_rept --> 
          <a href="#">
          <div class="span4">
            <div class="hser_rept"> <span class="mob_apps"></span>
              <h3> <?php echo $services_tab_second; ?></h3>
              <p><?php echo $services_tab_second_text; ?></p>
              <label>Learn More</label>
            </div>
          </div>
          </a> 
          <!--/services_rept --> 
          
          <!--services_rept --> 
          <a href="#">
          <div class="span4">
            <div class="hser_rept"> <span class="opensource"></span>
              <h3> <?php echo $services_tab_third; ?></h3>
              <p><?php echo $services_tab_third_text; ?></p>
              <label>Learn More</label>
            </div>
          </div>
          </a> 
          <!--/services_rept --> 
          
        </div>
      </div>
    </div>
  </div>
</div>
<!--/home_services --> 

            <?php endwhile; ?>
          <!--rpt_slide-->
        
          <?php endif; ?>        


<?php if( have_rows('add_third_section') ): ?>
            
            <!--rpt_slide-->
            <?php while( have_rows('add_third_section') ): the_row(); 

    // vars
              $third_section_heading = get_sub_field('third_section_heading');
              $third_section_image = get_sub_field('third_section_image');
              $client_name = get_sub_field('client_name');
              $app_type = get_sub_field('app_type');
              $work_text = get_sub_field('work_text');
              
    ?>

<!--home_work-->
<div class="main_container bg_white">
  <div class="container">
    <div class="home_work">
      <div class="work_hading">
        <p><?php echo $third_section_heading; ?></p>
      </div>
      <!--mobile_wok -->
      <div class="row-fluid"> 
        
        <!--dekstop left-->
        <div class="span8">
          <div class="dekstop_left"> 
            <!--<img src="img/dek_left.jpg" alt="dek_left">--> 
            <img src="<?php echo $third_section_image; ?>"></div>
        </div>
        <!--dekstop left--> 
        
        <!--mobile_right -->
        <div class="span4">
          <div class="dekstop_right"> <a href="#"><?php echo $client_name; ?></a>
            <label><?php echo $app_type; ?></label>
            <p><?php echo $work_text; ?></p>
            <a href="#" class="view_more">View Work</a> <a href="#" class="btn_red">see all<span></span></a> </div>
        </div>
        <!--/mobile_right --> 
        
      </div>
      
      <!--/mobile_wok --> 
      
    </div>
  </div>
</div>
<!--/home_work--> 

            <?php endwhile; ?>
          <!--rpt_slide-->
        
          <?php endif; ?>        


<?php if( have_rows('add_testimonial') ): ?>
            <!-- home_testimonials-->
<div class="main_container testi_bg">
  <div class="home_clients">
    <div class="container">
      <div class="testi_slider">
        <h2><?php the_field('fourth_section_heading'); ?></h2>
        <div class="bxslider1">

            <!--rpt_slide-->
            <?php while( have_rows('add_testimonial') ): the_row(); 

    // vars 
              
              $client_image = get_sub_field('client_image');
              $client_name_testimonial = get_sub_field('client_name_testimonial');
              $designation = get_sub_field('designation');
              $testimonial_text = get_sub_field('testimonial_text');

    ?>


            
          <div class="slide">
            <div class="client_image"><img src="<?php echo $client_image; ?>" alt="clients"> </div>
            <span><?php echo $client_name_testimonial; ?></span>
            <label><?php echo $designation ?></label>
            <p>“<?php echo $testimonial_text; ?>”</p>
            <a href="#" class="ico_video">Watch Video</a> <a href="#" class="ico_proj">View Project</a> 
          </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- home_testimonials--> 

        
            <?php endif; ?>        
 


<?php get_footer(); ?>