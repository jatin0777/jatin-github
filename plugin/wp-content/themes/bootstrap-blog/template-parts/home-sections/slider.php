<?php if( get_theme_mod( 'slider_display_option', $default = false ) ) : ?>

  <?php
    $category_id = get_theme_mod( 'slider_category' );
    $number_of_posts = get_theme_mod( 'number_of_slider', 3 );

    $category_args = array(
      'cat' => $category_id,
      'posts_per_page' => $number_of_posts
    );

    $query = new WP_Query( $category_args );
    set_query_var( 'query', $query );
    set_query_var( 'title', $title );
  ?>

  <?php if ( $query->have_posts() && $number_of_posts ) : ?>

    <?php
      $layout = get_theme_mod( 'bootstrap_blog_slider_layouts', 'one' );
      if( $layout == 'one' ) {
        get_template_part( 'layouts/homepage/slider/slider-layout', 'one' );
      }     
    ?>
  <?php endif; ?>

<?php endif;