<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package alchem
 */
 global  $alchem_page_meta;

 $display_image      = alchem_option('pages_featured_images');
 $display_page_title = isset($alchem_page_meta['display_page_title'])?$alchem_page_meta['display_page_title']:'yes';
?>
<?php if (  $display_image == 'yes' && has_post_thumbnail() ) : ?>

<div class="feature-img-box">
  <div class="img-box figcaption-middle text-center from-top fade-in">
    <?php the_post_thumbnail(); ?>
    <div class="img-overlay">
      <div class="img-overlay-container">
        <div class="img-overlay-content"> <i class="fa fa-plus"></i> </div>
      </div>
    </div>
  </div>
</div>
<?php endif;?>
<div class="entry-content">
  <?php the_content(); ?>
  <?php
				wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'alchem' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
				?>  
  <div class="comments-area text-left">
    <?php
											
 if ( comments_open()  ) :
 comments_template();
 endif;
 ?>
  </div>
</div>
<!-- .entry-content -->
