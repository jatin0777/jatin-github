<?php 
// section ahout us
   global $allowedposttags;
   $section_hide    = absint(alchem_option('section_5_hide'));
   $section_id      = esc_attr(sanitize_title(alchem_option('section_5_id')));
   $section_color   = esc_attr(alchem_option('section_5_color'));
   $section_title   = wp_kses(alchem_option('section_5_title'), $allowedposttags);
   $sub_title       = wp_kses(alchem_option('section_5_sub_title'), $allowedposttags);
   $section_content = wp_kses(alchem_option('section_5_content'), $allowedposttags);
   $section_content = str_replace('\\\'','\'',$section_content);
   $section_content = str_replace('\\"','"',$section_content);
   
   $section_class = 'section magee-section alchem-home-section-5 alchem-home-style-1';
   if( alchem_option('section_5_parallax') == '1' )
   $section_class .= ' parallax-scrolling';

 ?> 
 <?php if( $section_hide != '1' ):?>
 <section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
 <div class="section-content" style="color:<?php echo $section_color;?>;">
 <div class="container-fullwidth">
 <?php if( $section_title != '' ):?>
    <h2 class="section-title alchem_section_5_title"><?php echo $section_title;?></h2>
    <div class="section-subtitle alchem_section_5_sub_title"><?php echo do_shortcode($sub_title);?></div>
    <div style="height: 60px;"></div>
    <?php endif;?>
 <p class="alchem_section_5_content" style="width:20%;text-align: center;"></p>
 <?php echo do_shortcode($section_content);?>
  </div>
  </div>
</section>
 <?php endif;?>   