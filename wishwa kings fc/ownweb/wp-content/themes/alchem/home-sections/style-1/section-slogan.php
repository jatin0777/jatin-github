<?php 
  // section slogan 
  
   global $allowedposttags,$alchem_home_animation;
   $section_hide    = absint(alchem_option('section_10_hide'));
   $content_model   = absint(alchem_option('section_10_model'));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_10_id')));
   $section_color   = esc_attr(alchem_option('section_10_color'));
   $section_title   = wp_kses(alchem_option('section_10_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_10_content'), $allowedposttags);
   $button_text     = esc_attr(alchem_option('section_10_button_text'));
   $button_link     = esc_attr(alchem_option('section_10_button_link'));
   $button_target   = esc_attr(alchem_option('section_10_button_target'),'_blank');
   $section_content = str_replace('\\\'','\'',$section_content);
   $section_content = str_replace('\\"','"',$section_content);
   
   $section_class = 'section magee-section alchem-home-section-10 alchem-home-style-1';
   if( alchem_option('section_10_parallax') == '1' )
   $section_class .= ' parallax-scrolling';
 ?> 
 <?php if( $section_hide != '1' ):?> 
 <section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
  <div class="section-content" style="color:<?php echo $section_color;?>;">
  <div class="container alchem_section_10_model">
  <?php if( $content_model == 0 ):?>
   <div class="<?php echo $alchem_home_animation;?>" data-animationduration="1.2" data-animationtype="fadeInDown" data-imageanimation="no">
  <?php if( $section_title != '' ):?>
    <h2 class="section-title alchem_section_10_title"><?php echo $section_title;?></h2>
    <div class=" divider divider-border center" id="" style="margin-top: 30px;margin-bottom:50px;width:80px;">
      <div class="divider-inner" style="border-bottom-width:3px; "></div>
    </div>
    <?php endif;?>
    <div style="text-align: center" class="alchem_section_10_button_text">
    <?php if( $button_text!='' ):?>
    <a href="<?php echo $button_link;?>" target="<?php echo $button_target;?>" class="magee-btn-normal btn-rounded btn-lg"><?php echo $button_text;?></a>
    <?php endif;?>
    </div>
    </div>
    <?php else:?>
 <?php echo do_shortcode($section_content);?>
 <?php endif;?>
  </div>
  </div>
</section>
<?php endif;?>