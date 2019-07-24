
<?php if( get_theme_mod( 'pages_display_option', false ) ) : ?>
  <div class="home-pages">
    <div class="row">

      <?php $pages = get_theme_mod( 'pages' ); ?>
      <?php if( is_array( $pages ) && ! empty( $pages ) ) : ?>

        <?php foreach( $pages as $page ) : ?>

          <?php
            if( $page[ 'page' ] == '' ) {
              continue;
            }
          ?>

          <?php
            $page_id = absint( $page[ 'page' ] );             
            $post = get_post( $page_id );
            setup_postdata( $post );
          ?>
          <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'medium' ); ?>

          <div class="col-sm-4">
            <div class="home-pages-block">
            <a href="<?php echo esc_url( get_permalink( $page_id ) ); ?>">
              <?php if( ! empty( $image ) ) : ?> <img src="<?php echo esc_url( $image[0] ); ?>"> <?php endif; ?>
            </a>
            <div class="page-home-summary">
                    <h5 class="category"><a href="<?php echo esc_url( get_permalink( $page_id ) ); ?>"><?php the_title(); ?></a></h5>
            </div>
            </div>
          </div>
          <?php wp_reset_postdata(); ?>

      <?php endforeach; ?>


      <?php endif; ?>


    </div>
  </div>
<?php endif;