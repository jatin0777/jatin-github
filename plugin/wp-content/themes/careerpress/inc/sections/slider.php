<?php
/**
 * Slider section
 *
 * This is the template for the content of slider section
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */
if ( ! function_exists( 'careerpress_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since Careerpress 1.0.0
    */
    function careerpress_add_slider_section() {
    	$options = careerpress_get_theme_options();
        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'careerpress_section_status', true, 'slider_section_enable' );

        if ( true !== $slider_enable ) {
            return false;
        }
        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'careerpress_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render slider section now.
        careerpress_render_slider_section( $section_details );
    }
endif;

if ( ! function_exists( 'careerpress_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since Careerpress 1.0.0
    * @param array $input slider section details.
    */
    function careerpress_get_slider_section_details( $input ) {
        $options = careerpress_get_theme_options();

        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 5; $i++ ) {
            if ( ! empty( $options['slider_content_page_' . $i] ) )
                $page_ids[] = $options['slider_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 5,
            'orderby'           => 'post__in',
            );                    


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = careerpress_trim_content( 15 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// slider section content details.
add_filter( 'careerpress_filter_slider_section_details', 'careerpress_get_slider_section_details' );


if ( ! function_exists( 'careerpress_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since Careerpress 1.0.0
   *
   */
   function careerpress_render_slider_section( $content_details = array() ) {
        $options = careerpress_get_theme_options();
        $btn_label = ! empty( $options['slider_btn_label'] ) ? $options['slider_btn_label'] : esc_html__( 'Learn More', 'careerpress' );

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div class="main-slider-wrapper" data-effect="cubic-bezier(0.680, 0, 0.265, 1)" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": true, "fade": true }'>
            <?php foreach ( $content_details as $content ) : ?>

                <div id="hero-section" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                    <div class="overlay"></div>
                    <div class="wrapper">
                        <div class="hero-content-wrapper">
                            <header class="section-header">
                                <h2 class="section-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                            </header><!-- .section-header-->

                            <div class="section-content">
                                <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                            </div><!-- .section-content-->

                            <div class="buttons">
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-primary"><?php echo esc_html( $btn_label ); ?></a>
                                <?php if ( ! empty( $options['slider_alt_btn_label'] ) && ! empty( $options['slider_alt_btn_url'] ) ) : ?>
                                    <a href="<?php echo esc_url( $options['slider_alt_btn_url'] ); ?>" class="btn btn-transparent"><?php echo esc_html( $options['slider_alt_btn_label'] ); ?></a>
                                <?php endif; ?>
                            </div><!-- .buttons-->
                        </div><!-- .hero-content-wrapper -->
                    </div><!-- .wrapper -->
                </div><!-- #hero-section -->
            <?php endforeach; ?>
        </div><!-- .main-slider-wrapper -->
        
    <?php }
endif;