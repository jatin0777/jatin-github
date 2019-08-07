<?php
/**
 * The template for Managing Theme Structure
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

if ( ! function_exists( 'rock_star_doctype' ) ) :
	/**
	 * Doctype Declaration
	 *
	 * @since Rock Star 0.3
	 *
	 */
	function rock_star_doctype() {
		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
		<?php
	}
endif;
add_action( 'rock_star_doctype', 'rock_star_doctype', 10 );


if ( ! function_exists( 'rock_star_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Rock Star 0.3
	 *
	 */
	function rock_star_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}
endif;
add_action( 'rock_star_before_wp_head', 'rock_star_head', 10 );


if ( ! function_exists( 'rock_star_page_start' ) ) :
	/**
	 * Start div id #page
	 *
	 * @since Rock Star 0.3
	 *
	 */
	function rock_star_page_start() {
		?>
		<div id="page" class="hfeed site">
		<?php
	}
endif;
add_action( 'rock_star_header', 'rock_star_page_start', 10 );

if ( ! function_exists( 'rock_star_site_inner_start' ) ) :
	/**
	 * Start div class .site-inner
	 *
	 * @since Rock Star 0.3
	 *
	 */
	function rock_star_site_inner_start() {
		?>
		<div class="site-inner">
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'rock-star' ); ?></a>
		<?php
	}
endif;
add_action( 'rock_star_header', 'rock_star_site_inner_start', 20 );


if ( ! function_exists( 'rock_star_site_inner_end' ) ) :
	/**
	 * End div class .site-inner
	 *
	 * @since Rock Star 0.3
	 *
	 */
	function rock_star_site_inner_end() {
		?>
		</div><!-- end site -->
		<?php
	}
endif;
add_action( 'rock_star_footer', 'rock_star_site_inner_end', 190 );


if ( ! function_exists( 'rock_star_page_end' ) ) :
	/**
	 * End div id #page
	 *
	 * @since Rock Star 0.3
	 *
	 */
	function rock_star_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'rock_star_footer', 'rock_star_page_end', 200 );


if ( ! function_exists( 'rock_star_header_start' ) ) :
	/**
	 * Start Header id #masthead and class .wrapper
	 *
	 * @since Rock Star 0.3
	 *
	 */
	function rock_star_header_start() {
		?>
		<header id="masthead" class="site-header" role="banner">
			<div class="wrapper">
		<?php
	}
endif;
add_action( 'rock_star_header', 'rock_star_header_start', 40 );


if ( ! function_exists( 'rock_star_header_end' ) ) :
	/**
	 * Start Header id #masthead and class .wrapper
	 *
	 * @since Rock Star 0.3
	 *
	 */
	function rock_star_header_end() {
		?>
			</div><!-- .wrapper -->
		</header><!-- #masthead.site-header-->
		<?php
	}
endif;
add_action( 'rock_star_header', 'rock_star_header_end', 90 );


if ( ! function_exists( 'rock_star_header_image_slider_start' ) ) :
	/**
	 * Start wrapper class .header-image-slider
	 *
	 * @since Rock Star 0.3
	 *
	 */
	function rock_star_header_image_slider_start() {
		global $wp_query;

		$options        = rock_star_get_theme_options();
		$page_id        = $wp_query->get_queried_object_id();
		$page_for_posts = get_option('page_for_posts');

		//Check if slider is inactive
		$enable_slider   = $options['featured_slider_option'];
		$slider_disabled = true;

		if ( 'entire-site' == $enable_slider || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable_slider ) ) {
			$slider_disabled = false;
		}

		//Check if header image is enabled
		$header_img_disabled = !rock_star_featured_image();

		if ( $slider_disabled && $header_img_disabled ) {
			//bail if slider and header image is disabled
			return;
		}
		?>
		<div class="header-image-slider">
		<?php
	}
endif;
add_action( 'rock_star_header', 'rock_star_header_image_slider_start', 100 );


if ( ! function_exists( 'rock_star_header_image_slider_end' ) ) :
	/**
	 * End wrapper class .header-image-slider
	 *
	 * @since Rock Star 0.3
	 *
	 */
	function rock_star_header_image_slider_end() {
		global $wp_query;

		$options        = rock_star_get_theme_options();
		$page_id        = $wp_query->get_queried_object_id();
		$page_for_posts = get_option('page_for_posts');

		//Check if slider is inactive
		$enable_slider   = $options['featured_slider_option'];
		$slider_disabled = true;

		if ( 'entire-site' == $enable_slider || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable_slider ) ) {
			$slider_disabled = false;
		}

		//Check if header image is enabled
		$header_img_disabled = !rock_star_featured_image();

		if ( $slider_disabled && $header_img_disabled ) {
			//bail if slider and header image is disabled
			return;
		}
		?>
		</div><!-- .header-image-slider -->
		<?php
	}
endif;
add_action( 'rock_star_header', 'rock_star_header_image_slider_end', 140 );


if ( ! function_exists( 'rock_star_content_start' ) ) :
	/**
	 * Start div id #content and class .wrapper
	 *
	 * @since Rock Star 0.3
	 *
	 */
	function rock_star_content_start() {
		?>
		<div id="content" class="site-content">
			<div class="wrapper">
	<?php
	}
endif;
add_action('rock_star_content', 'rock_star_content_start', 10 );


if ( ! function_exists( 'rock_star_primary_start' ) ) :
	/**
	 * Start div id #primary
	 *
	 * @since Rock Star 0.3
	 *
	 */
	function rock_star_primary_start() {
		?>
		<div id="primary" class="content-area">
		<?php
	}
endif;
add_action( 'rock_star_content', 'rock_star_primary_start', 20 );


if ( ! function_exists( 'rock_star_main_start' ) ) :
	/**
	 * Start main #main
	 *
	 * @since Rock Star 0.3
	 *
	 */
	function rock_star_main_start() {
		?>
		<main id="main" class="site-main" role="main">
		<?php
	}
endif;
add_action( 'rock_star_content', 'rock_star_main_start', 40 );


if ( ! function_exists( 'rock_star_main_end' ) ) :
	/**
	 * End main #main
	 *
	 * @since Rock Star 0.3
	 *
	 */
	function rock_star_main_end() {
		?>
		</main><!-- #main -->
		<?php
	}
endif;
add_action( 'rock_star_before_secondary', 'rock_star_main_end', 10 );


if ( ! function_exists( 'rock_star_primary_end' ) ) :
	/**
	 * End div id #primary
	 *
	 * @since Rock Star 0.3
	 *
	 */
	function rock_star_primary_end() {
		?>
		</div><!-- #primary -->
		<?php
	}
endif;
add_action( 'rock_star_before_secondary', 'rock_star_primary_end', 30 );


if ( ! function_exists( 'rock_star_before_content' ) ) :
	/**
	 * Before Posts/Pages Sidebar
	 *
	 * @since Rock Star 0.3
	 *
	 */
	function rock_star_before_content() {
		get_sidebar( 'before-content' );
	}
endif;
add_action( 'rock_star_before_content', 'rock_star_before_content', 20 );


if ( ! function_exists( 'rock_star_content_end' ) ) :
	/**
	 * End div id #content and class .wrapper
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_content_end() {
		?>
			</div><!-- .wrapper -->
	    </div><!-- #content -->
		<?php
	}

endif;
add_action( 'rock_star_after_content', 'rock_star_content_end', 10 );


if ( ! function_exists( 'rock_star_after_content_sidebar' ) ) :
/**
 * After Content Sidebar
 *
 * @since Rock Star 0.3
 */
function rock_star_after_content_sidebar() {
	get_sidebar( 'after-content' );
}
endif;
add_action( 'rock_star_after_content', 'rock_star_after_content_sidebar', 20 );


if ( ! function_exists( 'rock_star_footer_content_start' ) ) :
/**
 * Start footer id #colophon
 *
 * @since Rock Star 0.3
 */
function rock_star_footer_content_start() {
	?>
	<footer id="colophon" class="site-footer">
    <?php
}
endif;
add_action('rock_star_footer', 'rock_star_footer_content_start', 10 );


if ( ! function_exists( 'rock_star_footer_sidebar' ) ) :
/**
 * Footer Sidebar
 *
 * @since Rock Star 0.3
 */
function rock_star_footer_sidebar() {
	get_sidebar( 'footer' );
}
endif;
add_action( 'rock_star_footer', 'rock_star_footer_sidebar', 20 );


if ( ! function_exists( 'rock_star_footer_content_end' ) ) :
/**
 * End footer id #colophon
 *
 * @since Rock Star 0.3
 */
function rock_star_footer_content_end() {
	?>
	</footer><!-- #colophon -->
	<?php
}
endif;
add_action( 'rock_star_footer', 'rock_star_footer_content_end', 110 );
