<?php
/**
 * The template used for displaying post content in single.php
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * rock_star_before_post_container hook
	 *
	 * @hooked rock_star_single_content_image - 10
	 */
	do_action( 'rock_star_before_post_container' ); ?>

	<div class="entry-container">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php rock_star_entry_meta(); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links"><span class="pages">' . esc_html__( 'Pages:', 'rock-star' ) . '</span>',
					'after'  => '</div>',
					'link_before' 	=> '<span>',
	                'link_after'   	=> '</span>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php rock_star_tag_category(); ?>
		</footer><!-- .entry-footer -->

	</div><!-- .entry-container -->

</article><!-- #post-## -->