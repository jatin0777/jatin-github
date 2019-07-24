<?php
/**
 * Projects section
 *
 * This is the template for the content of projects section
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */
if ( ! function_exists( 'careerpress_add_projects_section' ) ) :
    /**
    * Add projects section
    *
    *@since Careerpress 1.0.0
    */
    function careerpress_add_projects_section() {
    	$options = careerpress_get_theme_options();
        // Check if projects is enabled on frontpage
        $projects_enable = apply_filters( 'careerpress_section_status', true, 'projects_section_enable' );

        if ( true !== $projects_enable ) {
            return false;
        }
        // Get projects section details
        $section_details = array();
        $section_details = apply_filters( 'careerpress_filter_projects_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render projects section now.
        careerpress_render_projects_section( $section_details );
    }
endif;

if ( ! function_exists( 'careerpress_get_projects_section_details' ) ) :
    /**
    * projects section details.
    *
    * @since Careerpress 1.0.0
    * @param array $input projects section details.
    */
    function careerpress_get_projects_section_details( $input ) {
        $options = careerpress_get_theme_options();
        
        $content = array();
        $cat_id = ! empty( $options['projects_content_category'] ) ? $options['projects_content_category'] : '';
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 8,
            'cat'               => absint( $cat_id ),
            'ignore_sticky_posts'   => true,
            );                    


            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                $i = 0;
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

                    // Push to the main array.
                    array_push( $content, $page_post );
                    $i++;
                endwhile;
            endif;
            wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// projects section content details.
add_filter( 'careerpress_filter_projects_section_details', 'careerpress_get_projects_section_details' );


if ( ! function_exists( 'careerpress_render_projects_section' ) ) :
  /**
   * Start projects section
   *
   * @return string projects content
   * @since Careerpress 1.0.0
   *
   */
   function careerpress_render_projects_section( $content_details = array() ) {
        $options = careerpress_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="projects" class="page-section">
            <?php if ( ! empty( $options['projects_title'] ) || ! empty( $options['projects_sub_title'] ) ) : ?>
                <div class="section-header align-center">
                    <?php if ( ! empty( $options['projects_sub_title'] ) ) : ?>
                        <span class="section-subtitle"><?php echo esc_html( $options['projects_sub_title'] ); ?></span>
                    <?php endif; 

                    if ( ! empty( $options['projects_title'] ) ) : ?>
                        <h2 class="section-title"><?php echo esc_html( $options['projects_title'] ); ?></h2>
                    <?php endif; ?>
                    <div class="seperator"></div>
                </div><!-- .section-header -->
            <?php endif; ?>

            <div class="section-wrapper col-4 clear">
                <?php foreach ( $content_details as $content ) : ?>
                    <article class="hentry">
                        <div class="overlay-wrapper"><div class="bg"></div></div>
                        <div class="featured-image" style="background-image:url('<?php echo esc_url( $content['image'] ); ?>')">
                            <div class="project-details">
                                <div class="entry-meta">
                                    <?php the_category( '', '', $content['id'] ); ?>
                                </div><!-- .entry-meta -->

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>" tabindex="-1"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header><!-- .entry-header -->  
                            </div><!-- .project-details -->
                        </div><!-- .featured-image -->
                    </article><!-- .hentry -->
                <?php endforeach; ?>
            </div><!-- .section-wrapper -->
        </div><!-- #projects -->

    <?php }
endif;