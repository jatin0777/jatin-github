<?php 
  // section news 
  
   global $allowedposttags;
   $section_hide    = absint(alchem_option('section_9_hide'));
   $content_model   = absint(alchem_option('section_9_model'));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_9_id')));
   $section_color   = esc_attr(alchem_option('section_9_color'));
   $section_title   = wp_kses(alchem_option('section_9_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_9_sub_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_9_content'), $allowedposttags);
   $section_content = str_replace('\\\'','\'',$section_content);
   $section_content = str_replace('\\"','"',$section_content);
   
   $section_class = 'section magee-section alchem-home-section-9 alchem-home-style-2';
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
    <div class="section-subtitle alchem_section_9_sub_title"><?php echo do_shortcode($sub_title);?></div>
    <div style="height: 60px;"></div>
    <?php endif;?>
   
<?php
	$partners = array();
	$links = array();
	$titles = array();
	$html     = '';
    for( $i=0;$i<6;$i++){
		$image = alchem_option('section_9_partner_'.$i);
		$link  = alchem_option('section_9_link_'.$i);
		$title = alchem_option('section_9_title_'.$i);
     if( $image != '' ){
      $partners[] = $image;
	  $links[] = $link;
	  $titles[] = $title;
	 }
	}
	
  $num = count($partners);
  if( $num > 0 ){
  $j=0;
  
  $html .= '<div class="multi-carousel alchem-home-style-2-clients" >
                                        <div class="multi-carousel-inner">
                                           <div id="alchem-home-style-2-clients" class="owl-carousel owl-theme">';
										   
  foreach( $partners as $partner ){
	  
	  if( $links[$j] != '' ){
	  $html .= '<div class="item">
    <div class="img-frame rounded">
      <div class="img-box figcaption-middle text-center fade-in alchem_section_9_partner_'.$j.'" style="border-radius:0;"> 
      <a target="_blank" href="'.esc_url($links[$j]).'" data-placement="top" data-toggle="tooltip" alt="'.esc_attr( $titles[$j]).'" title="'.esc_attr( $titles[$j]).'" > <img src="'.esc_url($partner).'" class="feature-img ">
        <div class="img-overlay dark">
          <div class="img-overlay-container">
            <div class="img-overlay-content"> <i class="fa fa-link"></i> </div>
          </div>
        </div>
        </a>
      </div>
  </div>
</div>';
	  }else{
		  
		 $html .= '<div class="item">
    <div class="img-frame rounded">
      <div class="img-box figcaption-middle text-center fade-in alchem_section_9_partner_'.$j.'" style="border-radius:0;"> 
      <img data-placement="top" data-toggle="tooltip" title="'.esc_attr( $titles[$j]).'" src="'.esc_url($partner).'" class="feature-img ">
        <div class="img-overlay dark">
          <div class="img-overlay-container">
            <div class="img-overlay-content"> <i class="fa fa-link"></i> </div>
          </div>
        </div>
      </div>
  </div>
</div>';  
		  
		  
		  }


 $j++;
	  }							   
										   
										   
 $html .=  '</div>
                                        </div>';
        
 $html .= '<div class="multi-carousel-nav style2 nav-bg  nav-circle">
                                            <a href="javascript:;" class="carousel-prev" role="button" data-slide="prev">
                                                <span class="multi-carousel-nav-prev"></span>
                                            </a>
                                            <a class="carousel-next"  href="javascript:;"  role="button" data-slide="next">
                                                <span class="multi-carousel-nav-next"></span>
                                            </a>
                                        </div>';

 $html .= '</div>';
		 

  }

echo $html;

	  ?>      
    <?php else:?>
 <?php echo do_shortcode($section_content);?>
 <?php endif;?>
  </div>
  </div>
</section>
<?php endif;?> 