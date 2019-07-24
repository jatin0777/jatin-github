<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Suitbuilder
 */

get_header();
?>
<div id="content" class="site-content container">
   	<div class="row w-100 m-0">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'single' );

				the_post_navigation();

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
<?php  get_footer();
