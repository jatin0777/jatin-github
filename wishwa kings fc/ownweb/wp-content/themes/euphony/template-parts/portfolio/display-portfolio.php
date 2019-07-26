<?php
/**
 * The template for displaying portfolio items
 *
 * @package Euphony
 */
?>

<?php
$enable = get_theme_mod( 'euphony_portfolio_option', 'disabled' );

if ( ! euphony_check_section( $enable ) ) {
	// Bail if portfolio section is disabled.
	return;
}

$title     = get_option( 'jetpack_portfolio_title', esc_html__( 'Projects', 'euphony' ) );
$sub_title = get_option( 'jetpack_portfolio_content' );


$classes[] = 'layout-three';
$classes[] = 'jetpack-portfolio';
$classes[] = 'section';

?>

<div id="portfolio-content-section" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="wrapper">
		<?php if ( '' != $title || $sub_title ) : ?>
			<div class="section-heading-wrapper portfolio-section-headline">
				<?php if ( '' != $title ) : ?>
					<div class="section-title-wrapper">
						<h2 class="section-title"><?php echo wp_kses_post( $title ); ?></h2>
					</div><!-- .section-title-wrapper -->
				<?php endif; ?>

				<?php if ( $sub_title ) : ?>
					<div class="section-description-wrapper section-subtitle">
						<?php
						$sub_title = apply_filters( 'the_content', $sub_title );
						echo wp_kses_post( str_replace( ']]>', ']]&gt;', $sub_title ) );
						?>
					</div><!-- .section-description-wrapper -->
				<?php endif; ?>
			</div><!-- .section-heading-wrapper -->
		<?php endif; ?>

		<div class="section-content-wrapper portfolio-content-wrapper layout-three">
			<?php
			
				get_template_part( 'template-parts/portfolio/post-types', 'portfolio' );
			
			?>
		</div><!-- .section-content-wrap -->
	</div><!-- .wrapper -->
</div><!-- #portfolio-section -->
