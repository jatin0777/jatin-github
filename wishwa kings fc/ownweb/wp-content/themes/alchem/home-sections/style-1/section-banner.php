<?php 
   // section banner
   global $allowedposttags,$alchem_home_animation;
   $section_hide    = absint(alchem_option('section_0_hide'));
   $content_model   = absint(alchem_option('section_0_model'));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_0_id')));
   $section_title   = wp_kses(alchem_option('section_0_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_0_sub_title'), $allowedposttags);
   $button_text     = esc_attr(alchem_option('section_0_button_text'));
   $button_link     = esc_attr(alchem_option('section_0_button_link'));
   $button_target   = esc_attr(alchem_option('section_0_button_target'));
   $content_align   = esc_attr(alchem_option('section_0_content_align'));
   $section_content = wp_kses(alchem_option('section_0_content'), $allowedposttags);
   $section_content = str_replace('\\\'','\'',$section_content);
   $section_content = str_replace('\\"','"',$section_content);
   
 $video_controls          = alchem_option( 'video_controls' );
 $youtube_id              = alchem_option( 'youtube_id' );
 $youtube_bg_type         = alchem_option("youtube_bg_type");
 $youtube_bg_type         = is_numeric($youtube_bg_type)?$youtube_bg_type:"1";
 //$display_video_mobile    = alchem_option("display_video_mobile","no");
 $start_play              = absint(alchem_option("youtube_start"));
 $youtube_autoplay        = alchem_option("youtube_autoplay");
 $youtube_loop            = alchem_option("youtube_loop");
 $youtube_mute            = alchem_option("youtube_mute");
 $youtube_content         = alchem_option("youtube_content");
 $youtube_content         = str_replace('\\\'','\'',$youtube_content);
 $youtube_content         = str_replace('\\"','"',$youtube_content);
 
 if( $youtube_autoplay == '1' )
 $youtube_autoplay = 'true';
 else
 $youtube_autoplay = 'false';
 
 if( $youtube_loop == '1' )
 $youtube_loop = 'true';
 else
 $youtube_loop = 'false';
 
 if( $youtube_mute == '1' )
 $youtube_mute = 'true';
 else
 $youtube_mute = 'false';
  
  $containment = '.alchem-home-section-0';
  if( $youtube_bg_type == '1')
  $containment = 'body';
  
  $section_class = 'section magee-section alchem-home-section-0 alchem-home-style-1';
  if( $content_model == 3 )
   $section_class .= ' alchem-youtube-section fullheight verticalmiddle ';
   
   if( alchem_option('section_0_parallax') == '1' )
   $section_class .= ' parallax-scrolling';
   
 ?>
 <?php if( $section_hide != '1' ):?>
<section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
<?php if( $content_model == 3 ):?>

<div id="alchem-youtube-video" class="alchem-player" data-property="{videoURL:'<?php echo $youtube_id;?>',containment:'<?php echo $containment;?>', showControls:false, autoPlay:<?php echo $youtube_autoplay;?>, loop:<?php echo $youtube_loop;?>, mute:<?php echo $youtube_mute;?>, startAt:<?php echo $start_play;?>, opacity:1, addRaster:true, quality:'default'}"></div>
<div class="section-content container alchem_youtube_content">
<?php echo do_shortcode($youtube_content);?>
</div>
<?php 
	  if(  $video_controls == 1  ){
		  $detect = new Mobile_Detect;
		  if(  !$detect->isMobile() && !$detect->isTablet() ){
			  
			  if( $youtube_autoplay == 'true' )
			  $play_btn_icon = 'pause';
			  else
			  $play_btn_icon = 'play';
			  
			  if( $youtube_mute == 'true' )
			  $mute_btn_icon = 'volume-off';
			  else
			  $mute_btn_icon = 'volume-up';
			  
	  echo '<script>function changeLabel(state){
		    if( state == 1 )
			 jQuery("#togglePlay i").removeClass("fa-play").addClass("fa-pause");
			else
			jQuery("#togglePlay i").removeClass("fa-pause").addClass("fa-play");
            
        }
		function toggleVolume(){
			var volume =jQuery(\'#alchem-youtube-video\').YTPToggleVolume();
			if( volume == true )
			jQuery(".youtube-volume i").removeClass("fa-volume-off").addClass("fa-volume-up");
			else
			jQuery(".youtube-volume i").removeClass("fa-volume-up").addClass("fa-volume-off");
			
		}
		
		</script>
		<p class="black-65" id="video-controls">
		  <a class="youtube-pause command" id="togglePlay" href="javascript:;" onclick="jQuery(\'#alchem-youtube-video\').YTPTogglePlay(changeLabel)"><i class="fa fa-'.$play_btn_icon.'"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
		  <a class="youtube-volume" href="javascript:;" onclick="toggleVolume();"><i class="fa fa-'.$mute_btn_icon.' "></i></a>
	  </p>';
	 }
	  }
	 
	  
	 ?>

<?php elseif( $content_model == 2 ):?>
    <div class="multi-carousel home-banner-slider">
      <div class="multi-carousel-inner">
        <div id="carousel-banner-section" class="owl-carousel owl-theme">
          <?php for( $i=0; $i<5; $i++ ):?>
          <?php 
	$active = '';
	if($i==0)
	$active = 'active';
	
	$display          = absint(alchem_option('section_0_display_'.$i));
	$image            = esc_url(alchem_option('section_0_image_'.$i));
	$title            = wp_kses(alchem_option('section_0_title_'.$i), $allowedposttags);
	$sub_title        = wp_kses(alchem_option('section_0_sub_title_'.$i), $allowedposttags);
	$btn_text    = wp_kses(alchem_option('section_0_btn_text_'.$i), $allowedposttags);
	$btn_link    = esc_url(alchem_option('section_0_btn_link_'.$i));
	$btn_target  = esc_attr(alchem_option('section_0_btn_target_'.$i));
	if($display == 1):
	?>
  
<div class="item">
  <section  class="section magee-section section-banner fullheight verticalmiddle <?php echo 'alchem_section_0_image_'.$i;?>" style="background-image: url(<?php echo $image;?>);background-repeat:repeat;">
    <div class="section-content">
      <div class="container">
        <div class="<?php echo $alchem_home_animation;?>" data-animationduration="0.9" data-animationtype="bounce" data-imageanimation="no" id="">
           <h1 class="magee-heading" id=""><span class="heading-inner <?php echo 'alchem_section_0_title_'.$i;?>"> <span style="font-family: 'Cuprum';"><?php echo do_shortcode($title);?></span></span></h1>
        </div>
        <p style="text-align: center;font-size: 24px;" class="<?php echo 'alchem_section_0_sub_title_'.$i;?>"><?php echo do_shortcode($sub_title);?></p>
        <div style="height: 20px;"></div>
        <div style="text-align: center;" class="<?php echo 'alchem_section_0_btn_text_'.$i;?>">
         <?php if( $btn_text!='' ):?>
          <a href="<?php echo $btn_link;?>" target="<?php echo $btn_target;?>" class="magee-btn-normal btn-rounded btn-lg" id="">
          <i class="fa fa-th-list "></i> <?php echo $btn_text;?></a>
          <?php endif;?>
          </div>
      </div>
    </div>
  </section>
</div>

           <?php endif;?>
          <?php endfor;?>
        </div>
      </div>
    </div>
    <?php else:?>
  <div class="section-content container alchem_section_0_model">
   <?php if( $content_model == 0 ):?>
    <div class="<?php echo $alchem_home_animation;?>" data-animationduration="0.9" data-animationtype="bounce" data-imageanimation="no">
      <h1 class="magee-heading" style="text-align:<?php echo $content_align;?>;font-size: 70px;font-weight: 400;margin-top: 0;margin-bottom: 30px;"><span class="heading-inner alchem_section_0_title"><?php echo do_shortcode($section_title);?></span></h1>
    </div>
    <p style="text-align:<?php echo $content_align;?>;" class="alchem_section_0_sub_title"><?php echo do_shortcode($sub_title);?></p>
    
    <?php if( $button_text != '' ){?>
    <div style="text-align:<?php echo $content_align;?>" class="alchem_section_0_button_text">
      <a href="<?php echo $button_link;?>" target="<?php echo $button_target;?>" class="magee-btn-normal btn-md btn-line btn-light" id=""><?php echo $button_text;?></a>
      </div>
      <?php }?>
      
      <?php else:?>
      <?php echo do_shortcode($section_content);?>
      <?php endif;?>
      
  </div>
  <?php endif;?>
</section>
 <?php endif;?>