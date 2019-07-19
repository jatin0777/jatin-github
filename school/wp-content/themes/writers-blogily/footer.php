<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package writers_blogily
 */

?>

</div><!-- #content -->
</div>

<div class="footer-container">
	<div id="page" class="site grid-container">
		<footer id="colophon" class="site-footer">
			<?php if ( is_active_sidebar( 'footer-widget-one') ||  is_active_sidebar( 'footer-widget-two') ||  is_active_sidebar( 'footer-widget-three')  ) : ?>
			<div class="footer-widgets-container">
				<div class="footer-widget-three">

					<?php if ( is_active_sidebar( 'footer-widget-one' ) ) : ?>
					<div class="footer-column">
						<?php dynamic_sidebar( 'footer-widget-one' ); ?>				
					</div>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'footer-widget-two' ) ) : ?>
				<div class="footer-column">
					<?php dynamic_sidebar( 'footer-widget-two' ); ?>				
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-widget-three' ) ) : ?>
			<div class="footer-column">
				<?php dynamic_sidebar( 'footer-widget-three' ); ?>				
			</div>
		<?php endif; ?>

	</div>
</div>
<?php endif; ?>

<div class="site-info">
	<?php esc_html_e( 'Copyright', 'writers-blogily' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a><?php esc_html_e( '. All rights reserved.', 'writers-blogily' ); ?>
	<!-- Delete below lines to remove copyright from footer -->
	<span class="footer-info-right">
		<?php echo esc_html_e(' | Powered by', 'writers-blogily') ?> <a href="<?php echo esc_url('https://wordpress.org/', 'writers-blogily'); ?>"><?php echo esc_html_e(' WordPress', 'writers-blogily') ?></a> <?php echo esc_html_e('&', 'writers-blogily') ?> <a href="<?php echo esc_url('https://superbthemes.com/writers-blogily/', 'writers-blogily'); ?>"><?php echo esc_html_e('Writers Blogily Theme', 'writers-blogily') ?></a>
	</span>
	<!-- Delete above lines to remove copyright from footer -->

	<span class="footer-menu">
		<?php
		if ( has_nav_menu( 'footer-menu' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'footer-menu',
				'menu_id'        => 'footer-menu',
				) );
		}
		?>
	</span>
</div><!-- .site-info -->
</footer><!-- #colophon -->
</div>
</div>
<?php wp_footer(); ?>

</body>