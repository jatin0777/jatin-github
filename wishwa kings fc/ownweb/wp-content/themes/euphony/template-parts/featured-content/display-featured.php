<?php
/**
 * The template for displaying featured content
 *
 * @package Euphony
 */
?>

<?php
$enable_content = get_theme_mod( 'euphony_featured_content_option', 'disabled' );

if ( ! euphony_check_section( $enable_content ) ) {
	// Bail if featured content is disabled.
	return;
}

$featured_posts = euphony_get_posts( 'featured_content' );

if ( empty( $featured_posts ) ) {
	return;
}

$title     = get_option( 'featured_content_title', esc_html__( 'Contents', 'euphony' ) );
$sub_title = get_option( 'featured_content_content' );


$classes[] = 'layout-three';
$classes[] = 'featured-content';
$classes[] = 'section';
?>

<div id="featured-content-section" class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
	<div class="wrapper">
		<?php if ( '' !== $title || $sub_title ) : ?>
			<div class="section-heading-wrapper featured-section-headline">
				<?php if ( '' !== $title ) : ?>
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
			</div><!-- .section-heading-wrap -->
		<?php endif; ?>

		<div class="section-content-wrapper featured-content-wrapper layout-three">

			<?php

				foreach ( $featured_posts as $post ) {
					setup_postdata( $post );

					// Include the featured content template.
					get_template_part( 'template-parts/featured-content/content', 'featured' );
				}

				wp_reset_postdata();
				
			?>
		</div><!-- .section-content-wrap -->

		<?php
			$target = get_theme_mod( 'euphony_featured_content_target' ) ? '_blank': '_self';
			$link   = get_theme_mod( 'euphony_featured_content_link', '#' );
			$text   = get_theme_mod( 'euphony_featured_content_text', esc_html__( 'View More', 'euphony' ) );

			if ( $text ) :
		?>
			<p class="view-more">
				<a class="button" target="<?php echo $target; ?>" href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $text ); ?></a>
			</p>
		<?php endif; ?>
		
	</div><!-- .wrapper -->
</div><!-- #featured-content-section -->
