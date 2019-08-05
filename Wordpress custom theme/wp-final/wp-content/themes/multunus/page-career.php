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
        <h1><strong><?php the_field('heading'); ?></strong>
         <p><?php the_field('sub-heading'); ?></p>
        </h1>
        <a href="#" class="btn_red"><?php the_field('button_text'); ?><span></span></a>
      </div>
    </div>
  </div>
</div>
</div>
<!--/top_video--> 
<?php if( have_rows('add_statement') ): ?>
            
            <!--rpt_slide-->
            <?php while( have_rows('add_statement') ): the_row(); 

    // vars
            	$statement = get_sub_field('statement');
            	$statement_by = get_sub_field('statement_by');
            	$designation = get_sub_field('designation');

              
    ?>
<!--career_btm -->
<div class="main_container bg_grey">
<div class="career_top">
<div class="container">
<div class="car_testi">
<p><?php echo $statement; ?></p>
<span><?php echo $statement_by; ?><label><?php echo $designation; ?></label></span>
</div>
</div>
</div>
</div>
<!--/career_btm -->
<?php endwhile; ?>
          <!--rpt_slide-->
        
          <?php endif; ?>  




<?php if( have_rows('add_third_section') ): ?>
            
            <!--rpt_slide-->
            <?php while( have_rows('add_third_section') ): the_row(); 

    // vars
            	$add_text = get_sub_field('add_text');
              
    ?>
<!--career_mdl -->
<div class="main_container bg_white">
<div class="career_dec">
<div class="container">

<div class="row-fluid">
<!--career_left -->
<div class="span5">
<div class="career_left">
<p><span><?php echo $add_text; ?></span></p>
</div>
</div>

<!--/career_left -->

<!--career_right -->
<div class="span7">
<div class="career_right">
<ul>

<?php if( have_rows('add_points') ): ?>
            
            <!--rpt_slide-->
            <?php while( have_rows('add_points') ): the_row(); 

    // vars
            	$text = get_sub_field('text');
              
    ?>
<li><span><?php echo $text; ?></span></li>
<?php endwhile; ?>
          <!--rpt_slide-->
        
          <?php endif; ?> 


</ul>
</div>
</div>

<!--/career_right -->


</div>


</div>
</div>
</div>
<!--/career_mdl -->
<?php endwhile; ?>
          <!--rpt_slide-->
        
          <?php endif; ?>  


<?php if( have_rows('add_fourth_section') ): ?>
            
            <!--rpt_slide-->
            <?php while( have_rows('add_fourth_section') ): the_row(); 

    // vars
          $image_1 = get_sub_field('image_1');
		$image_2 = get_sub_field('image_2');
		$image_3 = get_sub_field('image_3');
		$content = get_sub_field('content');
              
    ?>
<!--career_iamge -->
<div class="main_container">
<div class="career_immage">
<div class="rept_iamge">
  <img src="<?php echo $image_1; ?>" alt="car_01"> </div>
<div class="rept_iamge">
  <img src="<?php echo $image_2; ?>" alt="car_02"> </div>
<div class="rept_cont">
<p>
	<span>Search something?</span>
		<?php echo $content; ?>
</p>

</div>
<div class="rept_iamge">
  <img src="<?php echo $image_3; ?>" alt="car_03">
</div>
</div>
</div>
<!--/career_iamge -->
<?php endwhile; ?>
          <!--rpt_slide-->
        
          <?php endif; ?> 





<!--current_opening -->
<div class="main_container tab_con bg_grey">
<div class="current_opening">
<div class="container">

<div class="work_hading">
    <p><?php the_field('top_heading'); ?></p>
    </div>
    
 <div class="current_listing">
 
 <ul>
 <?php if( have_rows('add_jobs') ): ?>
            
            <!--rpt_slide-->
            <?php while( have_rows('add_jobs') ): the_row(); 

    // vars
        
        
        $job_type = get_sub_field('job_type');
        $job_details = get_sub_field('job_details');
    ?>
 <a href="#">
 	
 	<li><?php echo $job_type; ?> 
 		<p><?php echo $job_details; ?>
 		</p>
 		<label></label>
 	</li>

 </a>
 <?php endwhile; ?>
          <!--rpt_slide-->
        
          <?php endif; ?> 


 

 </ul>
 
 </div>



</div>


</div>


</div>
<!--/current_opening -->



<?php get_footer(); ?>