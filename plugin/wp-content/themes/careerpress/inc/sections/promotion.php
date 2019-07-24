<?php
/**
 * Promotion section
 *
 * This is the template for the content of promotion section
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */
if ( ! function_exists( 'careerpress_add_promotion_section' ) ) :
    /**
    * Add promotion section
    *
    *@since Careerpress 1.0.0
    */
    function careerpress_add_promotion_section() {
    	$options = careerpress_get_theme_options();
        // Check if promotion is enabled on frontpage
        $promotion_enable = apply_filters( 'careerpress_section_status', true, 'promotion_section_enable' );

        if ( true !== $promotion_enable ) {
            return false;
        }
        // Get promotion section details
        $section_details = array();
        $section_details = apply_filters( 'careerpress_filter_promotion_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render promotion section now.
        careerpress_render_promotion_section( $section_details );
    }
endif;

if ( ! function_exists( 'careerpress_get_promotion_section_details' ) ) :
    /**
    * promotion section details.
    *
    * @since Careerpress 1.0.0
    * @param array $input promotion section details.
    */
    function careerpress_get_promotion_section_details( $input ) {
        $options = careerpress_get_theme_options();

        $content = array();
        $page_id = ! empty( $options['promotion_content_page'] ) ? $options['promotion_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();

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
// promotion section content details.
add_filter( 'careerpress_filter_promotion_section_details', 'careerpress_get_promotion_section_details' );


if ( ! function_exists( 'careerpress_render_promotion_section' ) ) :
  /**
   * Start promotion section
   *
   * @return string promotion content
   * @since Careerpress 1.0.0
   *
   */
   function careerpress_render_promotion_section( $content_details = array() ) {
        $options = careerpress_get_theme_options();
        $readmore = ! empty( $options['promotion_btn_title'] ) ? $options['promotion_btn_title'] : esc_html__( 'Learn More', 'careerpress' );

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>

            <div id="hire" class="page-section">
                <div class="wrapper">
                    <div class="hire-wrapper">
                        <?php if ( ! empty( $content['title'] ) ) : ?>
                            <div class="section-header">
                                <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                            </div><!-- .section-header -->
                        <?php endif; ?>

                        <div class="section-content">
                            <div class="buttons">
                                <?php if ( ! empty( $content['url'] ) ) : ?>
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-primary"><?php echo esc_html( $readmore ); ?></a>
                                <?php endif; ?>
                            </div>
                        </div><!-- .section-content -->
                     </div>
                </div><!-- .wrapper -->
            </div><!-- #hire -->

        <?php endforeach;
    }
endif;