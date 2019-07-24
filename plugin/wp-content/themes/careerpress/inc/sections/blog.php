<?php
/**
 * Blog section
 *
 * This is the template for the content of blog section
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */
if ( ! function_exists( 'careerpress_add_blog_section' ) ) :
    /**
    * Add blog section
    *
    *@since Careerpress 1.0.0
    */
    function careerpress_add_blog_section() {
    	$options = careerpress_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'careerpress_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'careerpress_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        careerpress_render_blog_section( $section_details );
    }
endif;

if ( ! function_exists( 'careerpress_get_blog_section_details' ) ) :
    /**
    * blog section details.
    *
    * @since Careerpress 1.0.0
    * @param array $input blog section details.
    */
    function careerpress_get_blog_section_details( $input ) {
        $options = careerpress_get_theme_options();

        // Content type.
        $blog_content_type  = $options['blog_content_type'];
        
        $content = array();
        switch ( $blog_content_type ) {
        	
            case 'category':
                $cat_id = ! empty( $options['blog_content_category'] ) ? $options['blog_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => 3,
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'recent':
                $cat_ids = ! empty( $options['blog_category_exclude'] ) ? $options['blog_category_exclude'] : array();
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => 3,
                    'category__not_in'  => ( array ) $cat_ids,
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            default:
            break;
        }


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = careerpress_trim_content( 20 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

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
// blog section content details.
add_filter( 'careerpress_filter_blog_section_details', 'careerpress_get_blog_section_details' );


if ( ! function_exists( 'careerpress_render_blog_section' ) ) :
  /**
   * Start blog section
   *
   * @return string blog content
   * @since Careerpress 1.0.0
   *
   */
   function careerpress_render_blog_section( $content_details = array() ) {
        $options = careerpress_get_theme_options();
        $readmore = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : esc_html__( 'Read More', 'careerpress' );

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="blog" class="relative page-section">
            <div class="wrapper">
                <?php if ( ! empty( $options['blog_title'] ) || ! empty( $options['blog_sub_title'] ) ) : ?>
                    <div class="section-header align-center">
                        <?php if ( ! empty( $options['blog_sub_title'] ) ) : ?>
                            <span class="section-subtitle"><?php echo esc_html( $options['blog_sub_title'] ); ?></span>
                        <?php endif; 

                        if ( ! empty( $options['blog_title'] ) ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $options['blog_title'] ); ?></h2>
                        <?php endif; ?>
                        <div class="seperator"></div>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div class="section-content section-wrapper posts-wrapper col-3">
                    <?php foreach ( $content_details as $content ) : 
                    $class = has_post_thumbnail( $content['id'] ) ? '' : 'no-post-thumbnail'; ?>
                        <article class="hentry <?php echo esc_attr( $class ); ?>">
                            <div class="blog-wrapper">
                                <?php if ( ! empty( $content['image'] ) ) : ?>
                                    <div class="featured-image">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                                    </div><!-- .featured-image -->
                                <?php endif; ?>

                                <div class="entry-container">
                                    <div class="entry-meta">
                                        <span class="cat-links">
                                            <?php the_category( ' ', '', $content['id'] ); ?>
                                        </span><!-- .cat-links -->       
                                    </div><!-- .entry-meta -->

                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>

                                    <div class="entry-content">
                                        <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                    </div><!-- .entry-content -->

                                    <div class="more-link">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $readmore ); ?></a>
                                    </div>
                                </div><!-- .entry-container -->
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div><!-- .section-content -->

            </div><!-- .wrapper -->
        </div><!-- #blog -->

    <?php }
endif;