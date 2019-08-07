<?php
/**
 * Implement Custom Header functionality
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

if ( ! function_exists( 'rock_star_custom_header' ) ) :
/**
 * Implementation of the Custom Header feature
 * Setup the WordPress core custom header feature and default custom headers packaged with the theme.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
	function rock_star_custom_header() {
		/**
		 * Get Default Theme Options Values
		 */
		$options = rock_star_get_theme_options();

		if ( 'dark' == $options['color_scheme'] ) {
			$default_options = rock_star_get_default_theme_options();
		}
		elseif ( 'light' == $options['color_scheme'] ) {
			$default_options = rock_star_default_light_color_options();
		}

		$args = array(
		// Text color and image (empty to use none).
		'default-text-color'     => $default_options['header_textcolor'],

		// Header image default
		'default-image'			=> trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/headers/header-1920x600.jpg',

		// Set height and width, with a maximum value for the width.
		'height'                 => 600,
		'width'                  => 1900,

		// Support flexible height and width.
		'flex-height'            => true,
		'flex-width'             => true,

		// Random image rotation off by default.
		'random-default'         => false,
	);

	$args = apply_filters( 'custom-header', $args );

	// Add support for custom header
	add_theme_support( 'custom-header', $args );

	}
endif; // rock_star_custom_header
add_action( 'after_setup_theme', 'rock_star_custom_header' );


if ( ! function_exists( 'rock_star_site_branding' ) ) :
	/**
	 * Get the logo and display
	 *
	 * @uses get_transient, rock_star_get_theme_options, get_header_textcolor, get_bloginfo, set_transient, display_header_text
	 * @get logo from options
	 *
	 * @display logo
	 *
	 * @action
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_site_branding() {
		$options   = rock_star_get_theme_options();
		$site_logo = '';

		//Checking Logo
		if ( has_custom_logo() ) {
			$site_logo = '
			<div class="site-logo">'
        		. get_custom_logo() . '
        	</div><!-- .site-logo -->
    		';
		}

		$header_text = '';

		if ( display_header_text() ) {
			$header_text = '
			<div id="site-details">';
				if ( is_front_page() && is_home() ) {
					$header_text .= '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></h1>';
				}
				else {
					$header_text .= '<p class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></p>';
				}

				$header_text .= '<p class="site-description">' . get_bloginfo( 'description' ) . '</p>
			</div><!-- #site-details -->';
		}

		$class[] = 'site-branding';

		if ( has_custom_logo() ) {
			if ( !$options['move_title_tagline'] ) {
				$class[] = 'logo-left';
			}
			else {
				$class[] = 'logo-right';
			}
		}

		$site_branding  = '
		<div class="' . esc_attr( implode( ' ', $class ) ) . '">
			' . $site_logo . $header_text . '
		</div><!-- .site-branding -->';

		echo $site_branding ;
	}
endif; // rock_star_site_branding
add_action( 'rock_star_header', 'rock_star_site_branding', 50 );


if ( ! function_exists( 'rock_star_featured_page_post_image' ) ) :
	/**
	 * Template for Featured Header Image from Post and Page
	 *
	 * To override this in a child theme
	 * simply create your own rock_star_featured_imaage_pagepost(), and that function will be used instead.
	 *
	 * @since Catch Adaptive Pro 1.0
	 */
	function rock_star_featured_page_post_image() {
		global $post, $wp_query;

		// Get Page ID outside Loop
		$page_id = $wp_query->get_queried_object_id();
		$page_for_posts = get_option('page_for_posts');

		$header_page_id = '';

		$image = get_header_image();

		if ( get_post() ) {
			if ( is_home() && $page_for_posts == $page_id ) {
				$header_page_id = $page_id;
			}
			else {
				$header_page_id = $post->ID;
			}
		}

		if ( has_post_thumbnail( $header_page_id ) ) {
			$options             = rock_star_get_theme_options();
			$featured_image_size = $options['featured_image_size'];
			$feat_image          = wp_get_attachment_image_src( get_post_thumbnail_id( $header_page_id ), $featured_image_size );

			$image = $feat_image[0];
		}

		return $image;
	} // rock_star_featured_page_post_image
endif;


if ( ! function_exists( 'rock_star_featured_image' ) ) :
	/**
	 * Template for Featured Header Image from theme options
	 *
	 * To override this in a child theme
	 * simply create your own rock_star_featured_image(), and that function will be used instead.
	 *
	 * @since Catch Adaptive Pro 1.0
	 */
	function rock_star_featured_image() {
		global $post, $wp_query;
		$options             = rock_star_get_theme_options();
		$defaults            = rock_star_get_default_theme_options();
		$enable_header_image = $options['enable_featured_header_image'];
		$header_image        = get_header_image();
		$singlular_image     = rock_star_featured_page_post_image();
		$image               = false;

		// Get Page ID outside Loop
		$page_id = $wp_query->get_queried_object_id();

		$page_for_posts = get_option('page_for_posts');

		// Check Enable/Disable header image in Page/Post Meta box
		if ( is_page() || is_single() ) {
			//Individual Page/Post Image Setting
			$individual_featured_image = get_post_meta( $post->ID, 'rock-star-header-image', true );

			if ( 'disable' == $individual_featured_image || ( 'default' == $individual_featured_image && 'disable' == $enable_header_image ) ) {
				return false;
			}
			elseif ( 'enable' == $individual_featured_image ) {
				$image = rock_star_featured_page_post_image();
			}
		}

		// Check Homepage
		if ( 'homepage' == $enable_header_image ) {
			if ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) {
				$image = $header_image;
			}
		}
		// Check Excluding Homepage
		elseif ( 'exclude-home' == $enable_header_image ) {
			if ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) {
				return false;
			}
			else {
				$image = $header_image;
			}
		}
		elseif ( 'exclude-home-page-post' == $enable_header_image  ) {
			if ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) {
				return false;
			}
			elseif ( is_page() || is_single() ) {
				$image = rock_star_featured_page_post_image();
			}
			else {
				$image = $header_image;
			}
		}
		// Check Entire Site
		elseif ( 'entire-site' == $enable_header_image  ) {
			$image = $header_image;
		}
		// Check Entire Site (Post/Page)
		elseif ( 'entire-site-page-post' == $enable_header_image  ) {
			if ( is_page() || is_single() || ! is_front_page() ) {
				$image = rock_star_featured_page_post_image();
			}
			else {
				$image = $header_image;
			}
		}
		// Check Page/Post
		elseif ( 'pages-posts' == $enable_header_image  ) {
			if ( is_page() || is_single() ) {
				$image = rock_star_featured_page_post_image();
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}

		return $image;
	} // rock_star_featured_image
endif;


if ( ! function_exists( 'rock_star_featured_image_output' ) ) :
	/**
	 * Display Featured Header Image
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_featured_image_output() {
		$header_image = rock_star_featured_image();

		if ( !$header_image ) {
			//bail if header image is disabled
			return;
		}

		$options    = rock_star_get_theme_options();
		$image_base = $options['featured_header_image_base'];
		$image_alt	= $options['featured_header_image_alt'];
		$target     = '_self';
		$link       = $options['featured_header_image_url'];

		//support for qtranslate custom link
		if ( function_exists( 'qtrans_convertURL' ) ) {
			$header_image = qtrans_convertURL( $header_image );
		}

		//Checking Link Target
		if ( $image_base ) {
			$target = '_blank';
		}

		$feat_image = '<img alt="'. esc_attr( $image_alt ) .'" src="' . esc_url(  $header_image ) . '"/>';

		$output = '<div id="header-featured-image" class =' . esc_attr( $options['featured_image_size'] ) . '>';

			// Header Image Link
			if ( '' != $link ) {
				$output .= '<a title="'. esc_attr( $image_alt ) .'" href="'. esc_url( $link ) .'" target="' . esc_attr( $target ) . '">' . $feat_image . '</a>';
			}
			else {
				$output .= $feat_image;
			}
		$output .= '</div><!-- #header-featured-image -->';

		echo $output;
	} // rock_star_featured_image_output
endif;
add_action( 'rock_star_header', 'rock_star_featured_image_output', 130 );
