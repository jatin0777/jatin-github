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
   
   $section_class = 'section magee-section alchem-home-section-5 alchem-home-style-0';
   if( alchem_option('section_5_parallax') == '1' )
   $section_class .= ' parallax-scrolling';

 ?> 
 <?php if( $section_hide != '1' ):?>
 <section class="<?php echo $section_class;?>" id="<?php echo $section_id;?>">
 <div class="section-content" style="color:<?php echo $section_color;?>;">
 <div class="container alchem_section_5_content">
 <?php if( $section_title != '' ):?>
    <h2 style="text-align: center" class="section-title alchem_section_5_title"><?php echo $section_title;?></h2>
    <div class=" divider divider-border center" id="" style="margin-top: 30px;margin-bottom:50px;width:80px;">
      <div class="divider-inner primary" style="border-bottom-width:3px; "></div>
    </div>
    <?php endif;?>
     <?php if( $sub_title != '' ):?>
    <div class="section-subtitle alchem_section_5_sub_title"><?php echo do_shortcode($sub_title);?></div>
      <div style="height: 60px;"></div>
      <?php endif;?>
 <?php echo do_shortcode($section_content);?>
  </div>
  </div>
</section>
 <?php endif;?>   