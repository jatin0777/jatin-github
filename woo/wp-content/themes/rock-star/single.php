<?php
/**
 * The Template for displaying all single posts
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

		<?php
			/**
			 * rock_star_after_post hook
			 *
			 * @hooked rock_star_post_navigation - 10
			 */
			do_action( 'rock_star_after_post' );

			/**
			 * rock_star_comment_section hook
			 *
			 * @hooked rock_star_get_comment_section - 10
			 */
			do_action( 'rock_star_comment_section' );
		?>
	<?php endwhile; // end of the loop. ?>

<?php
get_sidebar();
get_footer(); ?>