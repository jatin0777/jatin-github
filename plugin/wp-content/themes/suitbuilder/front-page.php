<?php
/**
 * The template for displaying home page.
 * @package suitbuilder
 */
global $suitbuilder_customizer_all_values;

get_header();
if ( 'posts' == get_option( 'show_on_front' ) )
{
    include( get_home_template() );
} else {
		/**
		 * @since suitbuilder 1.0.0
		 *
        */
        the_content();
        
        $suitbuilder_static_page = absint($suitbuilder_customizer_all_values['suitbuilder-enable-static-page']);
        ?>      
        <?php  if (1 == $suitbuilder_static_page ) { ?>
            <section class="section fp-auto-height">
                <div class="container pt-4">
                    <div class="row">
                        <div id="primary" class="content-area">
                            <main id="main" class="site-main" role="main">

                                <?php
                                while ( have_posts() ) : the_post();

                                    get_template_part( 'template-parts/content', 'page' );

                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                    endif;

                                endwhile; // End of the loop.
                                ?>

                            </main><!-- #main -->
                        </div><!-- #primary -->
                    <?php get_sidebar(); ?>    
                    </div>
                </div>
            </section>
        <?php 
            }
    }
get_footer();

