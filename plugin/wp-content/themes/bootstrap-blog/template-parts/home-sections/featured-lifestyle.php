<?php if( get_theme_mod( 'featured_lifestyle_display_option', false ) ) : ?>
  
  <?php $post_details = get_theme_mod( 'featured_lifestyle_show_hide_details', array( 'date', 'categories', 'tags', 'description', 'read-more' ) ); ?>

  <?php
    
      $category_id = get_theme_mod( 'featured_lifestyle_category' );
      $title = get_theme_mod( 'featured_lifestyle_section_title' );

      $args = array(
        'cat' => absint( $category_id ),
        'posts_per_page' => 5
      );
      $query = new WP_Query( $args );

      set_query_var( 'query', $query );
      set_query_var( 'title', $title );
      set_query_var( 'posts_per_page', $posts_per_page );
      set_query_var( 'post_details', $post_details );
  ?>

  <?php
    if ( $query->have_posts() && $posts_per_page ) :  
      $layout = get_theme_mod( 'bootstrap_blog_featured_layouts', 'one' );
      if( $layout == 'one' ) {
        get_template_part( 'layouts/homepage/featured/featured-layout', 'one' );
      }
    endif;
  ?>
    
    
<?php endif;