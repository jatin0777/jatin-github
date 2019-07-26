<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Euphony
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-item' ); ?>>
	<div class="post-wrapper hentry-inner">
		<?php euphony_archive_image(); ?>

		<div class="entry-container">
			<header class="entry-header">
				<?php if ( is_sticky() ) { ?>
					<span class="sticky-post">
						<span class="screen-reader-text"><?php esc_html_e( 'Featured', 'euphony' ); ?></span>
					</span>
				<?php } ?>

				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php euphony_cat_list(); ?>
					<?php euphony_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
				endif; ?>

				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;?>
			</header><!-- .entry-header -->

			<div class="entry-summary">
				<?php
				
				the_excerpt();
	
				?>
			</div><!-- .entry-summary -->

			
			<footer class="entry-footer">
				<div class="entry-meta">
					<?php euphony_by_line(); ?>
				</div><!-- .entry-meta -->
			</footer><!-- .entry-footer -->
		</div><!-- .entry-container -->
	</div><!-- .hentry-inner -->
</article><!-- #post-<?php the_ID(); ?> -->
