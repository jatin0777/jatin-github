<?php
/**
 * About section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */
if ( ! function_exists( 'careerpress_add_about_section' ) ) :
    /**
    * Add about section
    *
    *@since Careerpress 1.0.0
    */
    function careerpress_add_about_section() {
    	$options = careerpress_get_theme_options();
        // Check if about is enabled on frontpage
        $about_enable = apply_filters( 'careerpress_section_status', true, 'about_section_enable' );

        if ( true !== $about_enable ) {
            return false;
        }
        // Get about section details
        $section_details = array();
        $section_details = apply_filters( 'careerpress_filter_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render about section now.
        careerpress_render_about_section( $section_details );
    }
endif;

if ( ! function_exists( 'careerpress_get_about_section_details' ) ) :
    /**
    * about section details.
    *
    * @since Careerpress 1.0.0
    * @param array $input about section details.
    */
    function careerpress_get_about_section_details( $input ) {
        $options = careerpress_get_theme_options();

        $content = array();
        $page_id = ! empty( $options['about_content_page'] ) ? $options['about_content_page'] : '';
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
                $page_post['excerpt']   = careerpress_trim_content( 30 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : '';

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
// about section content details.
add_filter( 'careerpress_filter_about_section_details', 'careerpress_get_about_section_details' );


if ( ! function_exists( 'careerpress_render_about_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since Careerpress 1.0.0
   *
   */
   function careerpress_render_about_section( $content_details = array() ) {
        $options = careerpress_get_theme_options();
        $readmore = ! empty( $options['about_btn_title'] ) ? $options['about_btn_title'] : esc_html__( 'Read More', 'careerpress' );

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>

            <div id="about-us" class="relative">
                <div class="wrapper">
                    <div class="about-section-wrapper has-post-thumbnail">
                        <div class="entry-container">
                            <?php if ( ! empty( $content['title'] ) ) : ?>
                                <div class="section-header">
                                    <h2 class="section-title separator"><?php echo esc_html( $content['title'] ); ?></h2>
                                </div><!-- .section-header -->
                            <?php endif; ?>

                            <?php if ( ! empty( $content['excerpt'] ) ) : ?>
                                <div class="section-content">
                                    <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                </div><!-- .section-content -->
                            <?php endif;

                            if ( ! empty( $content['url'] ) ) : ?>
                                <div class="more-link">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-transparent"><?php echo esc_html( $readmore ); ?></a>
                                </div><!-- .more-link -->
                            <?php endif; ?>
                        </div><!-- .entry-container -->

                        <?php if ( ! empty( $content['image'] ) ) : ?>
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">  
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="featured-image-link"></a>
                            </div><!-- .featured-image -->
                        <?php endif; ?>
                    </div><!-- .about-section-wrapper -->
                </div><!-- .wrapper -->
            </div><!-- #about-us -->

        <?php endforeach;
    }
endif;