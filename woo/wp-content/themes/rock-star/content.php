<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * rock_star_before_entry_container hook
	 *
	 * @hooked rock_star_archive_content_image - 10
	 */
	do_action( 'rock_star_before_entry_container' ); ?>



	<div class="entry-container">
		<header class="entry-header">
			<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
				<span class="sticky-post"><?php _e( 'Featured', 'rock-star' ); ?></span>
			<?php endif; ?>

            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

            <?php if ( 'post' == get_post_type() ) :
				rock_star_entry_meta();
			endif; ?>

        </header><!-- .entry-header -->

		<?php
		$options = rock_star_get_theme_options();

		if ( is_search() || 'full-content' != $options['content_layout'] ) : // Only display Excerpts for Search and if 'full-content' is not selected ?>
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
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
		<?php endif; ?>

		<footer class="entry-footer">
			<?php rock_star_tag_category(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- .entry-container -->
</article><!-- .blog-wrapper -->