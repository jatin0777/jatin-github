<?php if( get_theme_mod( 'shop_display_option', false ) && class_exists( 'WooCommerce' ) ) : ?>
    <!-- banner-news -->
    <?php
      $category_id = absint( get_theme_mod( 'shop_category') );
      $title = get_theme_mod( 'shop_section_title' );
      $number_of_posts = get_theme_mod( 'number_of_shop', 4 );

      $args = array(
        'post_type' => 'product',
        'posts_per_page' => $number_of_posts,
       );

      if( ! empty( $category_id ) ) {

        $args[ 'tax_query' ] = array( array(
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => $category_id
        ) );

      }

      $query = new WP_Query( $args );

      
    ?>

    <?php
      $wc_args = array(
        'ex_tax_label'       => false,
        'currency'           => '',
        'decimal_separator'  => wc_get_price_decimal_separator(),
        'thousand_separator' => wc_get_price_thousand_separator(),
        'decimals'           => wc_get_price_decimals(),
        'price_format'       => get_woocommerce_price_format(),
      );
    ?>

    <?php if ( $query->have_posts() ) : ?>
      <div class="shop-home pri-bg-color spacer">
      <div class="container">
        <h5 class="section-heading"><?php echo esc_html( $title ); ?></h5>
        <div class="row  text-center">
          <?php while( $query->have_posts() ) : $query->the_post(); ?>
            <div class="col-sm-3 eq-blocks"> 
                <div class="shop-snippet">
                  <?php if ( has_post_thumbnail() ) : ?>
                  <a href="<?php the_permalink(); ?>" rel="bookmark" class="featured-image"><?php the_post_thumbnail( 'medium' ); ?></a>                      
                  <?php endif; ?>  
                <!-- summary -->
                <div class="summary">
                  <h5><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h5>
                  <?php
                    $regular_price = get_post_meta( $post->ID, '_regular_price', true );
                    $sale_price = get_post_meta( $post->ID, '_sale_price', true );
                  ?>
                  <?php if( $regular_price != "" && $sale_price != "" ) : ?>
                    <strike><?php echo wc_price( $regular_price, $wc_args ); ?></strike>
                    <big><?php echo wc_price( $sale_price, $wc_args ); ?></big>
                  <?php elseif( $regular_price != "" && $sale_price == "" ) : ?>
                    <big><?php echo wc_price( $regular_price, $wc_args ); ?></big>
                  <?php elseif( $sale_price != "" && $regular_price == "" ) : ?>
                    <big><?php echo wc_price( $sale_price, $wc_args ); ?></big>
                  <?php endif; ?>                 
                </div>
                <!-- summary -->
                </div>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <!-- banner-news -->
  <?php endif;