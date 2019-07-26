<?php 
   // section service
   global $allowedposttags,$alchem_home_animation;
   $section_hide    = absint(alchem_option('section_2_hide'));
   $content_model   = absint(alchem_option('section_2_model'));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_2_id')));
   $section_color   = esc_attr(alchem_option('section_2_color'));
   $section_title   = wp_kses(alchem_option('section_2_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_2_sub_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_2_content'), $allowedposttags);
   $columns         = absint(alchem_option('section_2_columns'));
   $col             = $columns>0?12/$columns:4;
   $section_content = str_replace('\\\'','\'',$section_content);
   $section_content = str_replace('\\"','"',$section_content);
   
   $section_class = 'section magee-section alchem-home-section-2 alchem-home-style-0';
   if( alchem_option('section_2_parallax') == '1' )
   $section_class .= ' parallax-scrolling';
 ?> 
 <?php if( $section_hide != '1' ):?>
  <section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
   <div class="section-content" style="color:<?php echo $section_color;?>;">
  <div class="container alchem_section_2_model">
  <?php if( $content_model == 0 ):?>
  <?php if( $section_title != '' ):?>
    <h2 style="text-align: center" class="section-title alchem_section_2_title"><?php echo $section_title;?></h2>
    <div class=" divider divider-border center" id="" style="margin-top: 30px;margin-bottom:50px;width:80px;">
      <div class="divider-inner primary" style="border-bottom-width:3px; "></div>
    </div>
    <?php endif;?>
    <?php if( $sub_title != '' ):?>
    <div class="section-subtitle alchem_section_2_sub_title"><?php echo do_shortcode($sub_title);?></div>
      <div style="height: 60px;"></div>
      <?php endif;?>
    <?php
	 $feature_item = '';
	 $feature_str  = '';
	 for( $j=0; $j<6; $j++ ){
	   
	  $feature_icon    =  esc_attr(alchem_option('section_2_feature_icon_'.$j));
	  $feature_icon    =  str_replace('fa-','',$feature_icon );
	  $feature_image   =  esc_attr(alchem_option('section_2_feature_image_'.$j));
	  $feature_title   =  esc_attr(alchem_option('section_2_feature_title_'.$j));
	  $feature_content =  wp_kses(alchem_option('section_2_feature_content_'.$j), $allowedposttags);
	  $link            =  esc_url(alchem_option('section_2_link_'.$j));
	  $target          =  esc_attr(alchem_option('section_2_target_'.$j));
	  if( $feature_icon !='' || $feature_image !='' || $feature_title!='' || $feature_content!='' ):
	  if( $link == "" )
	  $title = '<h3 class="alchem_section_2_feature_title_'.$j.'">'.$feature_title.'</h3>';
	  else
	  $title = '<a href="'.$link.'" target="'.$target.'"><h3 class="alchem_section_2_feature_title_'.$j.'">'.$feature_title.'</h3></a>';
	  
	  $icon            = '';
	  $addclass        = '';
	  if( $feature_image !='' ){
	  $icon  = '<img class="feature-box-icon "  src="'.$feature_image.'" alt="" />';
	  $addclass = 'alchem_section_2_feature_image_'.$j;
	  }else{
	  $icon  = '<i class="feature-box-icon fa fa-'.$feature_icon.' fa-fw"></i>';
      $addclass = 'alchem_section_2_feature_icon_'.$j;
	  }
	  $feature_item .= '<div class="col-md-'.$col.'">
	  <div class="'.$alchem_home_animation.'" data-animationduration="0.9" data-animationtype="zoomIn" data-imageanimation="no">
        <div class="magee-feature-box style1" id="" data-os-animation="fadeOut">
          <div class="icon-box '.$addclass.'" data-animation=""> '.$icon.'</div>
          '.$title.'
          <div class="feature-content">
            <p class="alchem_section_2_feature_content_'.$j.'">'.do_shortcode($feature_content).'</p>
            <a href="'.$link.'" target="'.$target.'" class="feature-link"></a>
			</div>
        </div>
		</div>
      </div>';
	  $k = $j+1;
	  if( $k % $columns == 0 ){
	        $feature_str .= '<div class="row">'.$feature_item.'</div>';
	        $feature_item = '';
	   }
	   endif;
	   
	 }
	 if( $feature_item != '' ){
		    $feature_str .= '<div class="row">'.$feature_item.'</div>';
	      
		   }
		
	 echo $feature_str;
	?>

 <?php else:?>
 <?php echo do_shortcode($section_content);?>
 <?php endif;?>
  </div>
  </div>
</section>
<?php endif;?>