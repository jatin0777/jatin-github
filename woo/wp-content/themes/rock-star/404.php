<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.2
 */

get_header();
?>
		<?php if ( is_active_sidebar( 'sidebar-notfound' ) ) :
			dynamic_sidebar( 'sidebar-notfound' );
		else : ?>
			<article id="page-404" class="error-404 not-found type-page hentry">
				<div class="entry-container">
					<header class="entry-header">
						<h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'rock-star' ); ?></h1>
					</header><!-- .page-header -->

					<div class="entry-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'rock-star' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</div><!-- .entry-container -->
			</article><!-- .error-404 -->
		<?php endif; ?>
<?php
get_sidebar();
get_footer(); ?>