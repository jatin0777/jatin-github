<?php
/**
 * Suitbuilder functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Suitbuilder
 */

require get_template_directory() . '/inc/init.php';


if ( ! function_exists( 'suitbuilder_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function suitbuilder_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Suitbuilder, use a find and replace
		 * to change 'suitbuilder' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'suitbuilder', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'suitbuilder' ),
			'menu-2' => esc_html__( 'Secondary', 'suitbuilder' ),
			'menu-3' => esc_html__( 'Social', 'suitbuilder' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'suitbuilder_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'flex-width'  => true,
			'flex-height' => true,
		) );

		add_theme_support( 'custom-header' );


		/*woocommerce support*/
		add_theme_support( 'woocommerce' );

	}
endif;
add_action( 'after_setup_theme', 'suitbuilder_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function suitbuilder_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'suitbuilder_content_width', 640 );
}
add_action( 'after_setup_theme', 'suitbuilder_content_width', 0 );

// google fonts function
function suitbuilder_google_fonts()
{
	global $suitbuilder_customizer_all_values;

	$fonts_url  = '';
	$fonts 		= array();

	$suitbuilder_font_family_site_identity           	= $suitbuilder_customizer_all_values['suitbuilder-site-idenity-font-family'];
    $suitbuilder_font_family_menu_text               	= $suitbuilder_customizer_all_values['suitbuilder-menu-font-family'];
    $suitbuilder_primary_font                   	 	= $suitbuilder_customizer_all_values['suitbuilder-primary-font-family'];
    $suitbuilder_secondary_font						= $suitbuilder_customizer_all_values['suitbuilder-secondary-font-family'];
    $suitbuilder_headre_btn_font						= $suitbuilder_customizer_all_values['suitbuilder-button-title-font'];
   

	$suitbuilder_fonts 	= array();
	$suitbuilder_fonts[] = $suitbuilder_font_family_site_identity;
	$suitbuilder_fonts[] = $suitbuilder_primary_font;
	$suitbuilder_fonts[] = $suitbuilder_font_family_menu_text;
	$suitbuilder_fonts[] = $suitbuilder_secondary_font;
	$suitbuilder_fonts[] = $suitbuilder_headre_btn_font;
	$suitbuilder_fonts_stylesheet = '?family=Bitter:400,700|Montserrat:400,500,600,700';

	$i  = 0;
	  for ($i=0; $i < count( $suitbuilder_fonts ); $i++) { 

	    if ( 'off' !== sprintf( _x( 'on', '%s font: on or off', 'suitbuilder' ), $suitbuilder_fonts[$i] ) ) {
			$fonts[] = $suitbuilder_fonts[$i];
		}

	  }

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urldecode( implode( '|', $fonts ) ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;

}

/**
 * Enqueue scripts and styles.
 */
function suitbuilder_scripts() {
	global $suitbuilder_customizer_all_values;
	/*google font*/
	wp_enqueue_style( 'suitbuilder-google-fonts',suitbuilder_google_fonts() );

	wp_enqueue_style( 'suitbuilder-style', get_stylesheet_uri() );
	
	/*inline style*/
	wp_add_inline_style('suitbuilder-style', suitbuilder_get_inline_style() );


	// thirdparty style file
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/src/css/bootstrap.css' );
	wp_enqueue_style( 'font-awesome-v5', get_template_directory_uri() . '/assets/src/css/fontawesome/css/all.css' );

	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/src/css/slick.css' );
	//main theme style
	wp_enqueue_style( 'mobileMenu', get_template_directory_uri() . '/assets/src/css/suitbuilderMenu.css' );
	wp_enqueue_style( 'mainStyle', get_template_directory_uri() . '/assets/src/css/main.css' );
	
	wp_enqueue_script( 'suitbuilder-navigation', get_template_directory_uri() . '/assets/src/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'suitbuilder-skip-link-focus-fix', get_template_directory_uri() . '/assets/src/js/skip-link-focus-fix.js', array(), '20151215', true );
	// thirdparty assets
	wp_enqueue_script( 'jquery-bootstrap', get_template_directory_uri() . '/assets/src/js/bootstrap.js', array('jquery'), true );
	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/src/js/slick.js', array('jquery'), true );
	wp_enqueue_script( 'suitbuilder-mobile-menu', get_template_directory_uri() . '/assets/src/js/mobileMenu.js', array('jquery'), true );

	wp_enqueue_script( 'suitbuilder-main', get_template_directory_uri() . '/assets/src/js/main.js', array('jquery'), true );


	wp_localize_script( 'suitbuilder-main', 'customzier_values', $suitbuilder_customizer_all_values);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'suitbuilder_scripts' );

/**
 * Customizer control styles and scripts.
 */
function suitbuilder_customizer_control_scripts()
{
    wp_enqueue_style('suitbuilder-customize-controls', get_template_directory_uri() . '/customizer-style.css');
}

add_action('customize_controls_enqueue_scripts', 'suitbuilder_customizer_control_scripts', 0);

/*update to pro added*/
require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/suitbuilder/class-customize.php' );



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Customizer additions.
 */
require trailingslashit(get_template_directory() ).'/inc/customizer/customizer.php';

require trailingslashit(get_template_directory() ).'/inc/demo-install/loader.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/*breadcrum function*/
if ( ! function_exists( 'suitbuilder_simple_breadcrumb' ) ) :

	/**
	 * Simple breadcrumb.
	 *
	 * @since suitbuilder 1.0.0
	 */
	function suitbuilder_simple_breadcrumb() {

		if ( ! function_exists( 'suitbuilder_breadcrumb_trail' ) ) {
			require_once get_template_directory() . '/assets/breadcrumbs/breadcrumbs.php';
		}

		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
		);
		suitbuilder_breadcrumb_trail( $breadcrumb_args );

	}

endif;

// for number of latest blog post
function suitbuilder_home_page_number_post( $query ) {
	$suitbuilder_theme = get_theme_mod( SUITBUILDER_CUSTOMIZER_NAME );
	$suitbuilder_number_of_post = isset($suitbuilder_theme['suitbuilder-latest-blog-number-post'] ) ? $suitbuilder_theme['suitbuilder-latest-blog-number-post'] : '';
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_home() ) {
        // Display only 1 post for the original blog archive
        $query->set( 'posts_per_page', $suitbuilder_number_of_post );
        
    }
    return;

}
add_action( 'pre_get_posts', 'suitbuilder_home_page_number_post', 10 );

// customize the catgory title author
function suitbuilder_customizer_remove_defualt_cat_author($title)
{
    if( is_category() ) {

        $title = single_cat_title( '', false );
    }
    else if (is_author())
    {
    	$title = '<span class="vcard">' . get_the_author() . '</span>' ;
    }
    else if (is_month()) {
    	$title = single_month_title('', false);
    }

    return $title;

}
add_filter( 'get_the_archive_title', 'suitbuilder_customizer_remove_defualt_cat_author' );

/*add class active for menu*/
if( !function_exists('suitbuilder_active_nav_class') ):
/**
* Suitbuilder Active Nav Menu
*
* @since Suitbuilder 1.0.0
* @param $classes, $item
* 
* @return $classes

*/

function suitbuilder_active_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
endif;

add_filter('nav_menu_css_class' , 'suitbuilder_active_nav_class' , 10 , 2);
