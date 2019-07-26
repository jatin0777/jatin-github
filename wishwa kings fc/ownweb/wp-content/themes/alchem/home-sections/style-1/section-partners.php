<?php 
  // section news 
  
   global $allowedposttags,$alchem_home_animation;
   $section_hide    = absint(alchem_option('section_9_hide'));
   $content_model   = absint(alchem_option('section_9_model'));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_9_id')));
   $section_color   = esc_attr(alchem_option('section_9_color'));
   $section_title   = wp_kses(alchem_option('section_9_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_9_sub_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_9_content'), $allowedposttags);
   $section_content = str_replace('\\\'','\'',$section_content);
   $section_content = str_replace('\\"','"',$section_content);
   
   $section_class = 'section magee-section alchem-home-section-9 alchem-home-style-1';
   if( alchem_option('section_9_parallax') == '1' )
   $section_class .= ' parallax-scrolling';
  
 ?> 
 <?php if( $section_hide != '1' ):?> 
 <section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
  <div class="section-content" style="color:<?php echo $section_color;?>;">
  <div class="container">
  <?php if( $content_model == 0 ):?>
  <?php if( $section_title != '' ):?>
    <h2 class="section-title alchem_section_9_title" ><?php echo $section_title;?></h2>
    <div style="text-align:center;" class="alchem_section_9_sub_title"><?php echo do_shortcode($sub_title);?></div>
    <div style="height: 80px;"></div>
    <?php endif;?>
   
     <?php
	$partners = array();
	$links = array();
	$titles = array();
	$html     = '';
    for( $i=0;$i<6;$i++){
		$image  = alchem_option('section_9_partner_'.$i);
		$link   = alchem_option('section_9_link_'.$i);
		$title  = alchem_option('section_9_title_'.$i);
     if( $image != '' ){
      $partners[] = $image;
	  $links[]    = $link;
	  $titles[]   = $title;
	 }
	}
	
  $num = count($partners);
  if( $num > 0 ){
  if( $num == 5 )
  $col = '1_5';
  else
  $col = 12/$num;
  $j=0;
  foreach( $partners as $partner ){

	  if( $links[$j] != '' ){
	  $html .= '<div class="col-md-'.$col.'">
  <div class="'.$alchem_home_animation.'" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" id="">
    <div class="img-frame rounded alchem_section_9_partner_'.$j.'">
      <div class="img-box figcaption-middle text-center fade-in" style="border-radius:0;"> 
      <a target="_blank" href="'.esc_url($links[$j]).'" data-placement="top" data-toggle="tooltip" alt="'.esc_attr( $titles[$j]).'" title="'.esc_attr( $titles[$j]).'" > <img src="'.esc_url($partner).'" class="feature-img ">
        <div class="img-overlay dark">
          <div class="img-overlay-container">
            <div class="img-overlay-content"> <i class="fa fa-link"></i> </div>
          </div>
        </div>
        </a>
      </div>
      </div>
  </div>
</div>';
	  }else{
		  
		   $html .= '<div class="col-md-'.$col.'">
  <div class="'.$alchem_home_animation.'" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" id="">
    <div class="img-frame rounded alchem_section_9_partner_'.$j.'">
      <div class="img-box figcaption-middle text-center fade-in" style="border-radius:0;"> 
      <img data-placement="top" data-toggle="tooltip" title="'.esc_attr( $titles[$j]).'" src="'.esc_url($partner).'" class="feature-img ">
        <div class="img-overlay dark">
          <div class="img-overlay-container">
            <div class="img-overlay-content"> <i class="fa fa-link"></i> </div>
          </div>
        </div>
      </div>
      </div>
  </div>
</div>';
		  
		  
		  }
 $j++;
	  }
  }

echo '<div class="row">'.$html.'</div>';

	  ?>      
    <?php else:?>
 <?php echo do_shortcode($section_content);?>
 <?php endif;?>
  </div>
  </div>
</section>
<?php endif;?> 