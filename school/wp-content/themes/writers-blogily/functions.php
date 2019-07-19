<?php
/**
 * Writers Blogily functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package writers_blogily
 */

if ( ! function_exists( 'writers_blogily_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
function writers_blogily_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Writers Blogily, use a find and replace
		 * to change 'writers-blogily' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'writers-blogily', get_template_directory() . '/languages' );

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
	add_image_size( 'writers-blogily-related', 200, 125, true ); //related


		// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary Menu', 'writers-blogily' ),
		'footer-menu' => esc_html__( 'Footer Menu', 'writers-blogily' ),
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
		add_theme_support( 'custom-background', apply_filters( 'writers_blogily_custom_background_args', array(
			'default-color' => 'fff',
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
			) );
	}
	endif;
	add_action( 'after_setup_theme', 'writers_blogily_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function writers_blogily_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'writers_blogily_content_width', 640 );
}
add_action( 'after_setup_theme', 'writers_blogily_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function writers_blogily_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'writers-blogily' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'writers-blogily' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (First)', 'writers-blogily' ),
		'id'            => 'footer-widget-one',
		'description'   => esc_html__( 'Add widgets here.', 'writers-blogily' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (Second)', 'writers-blogily' ),
		'id'            => 'footer-widget-two',
		'description'   => esc_html__( 'Add widgets here.', 'writers-blogily' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (Third)', 'writers-blogily' ),
		'id'            => 'footer-widget-three',
		'description'   => esc_html__( 'Add widgets here.', 'writers-blogily' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		) );

}
add_action( 'widgets_init', 'writers_blogily_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function writers_blogily_scripts() {
	wp_enqueue_style( 'writers-blogily-owl-slider-default', get_template_directory_uri() . '/css/owl.carousel.min.css' );
	wp_enqueue_style( 'writers-blogily-owl-slider-theme', get_template_directory_uri() . '/css/owl.theme.default.css' );

	wp_enqueue_script( 'writers-blogily-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_script( 'writers-blogily-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_style( 'writers-blogily-foundation', get_template_directory_uri() . '/css/foundation.css' );
	wp_enqueue_style( 'writers-blogily-font', 'https://fonts.googleapis.com/css?family=Saira+Semi+Condensed:400,700' );
	wp_enqueue_style( 'writers-blogily-dashicons', get_home_url() . '/wp-includes/css/dashicons.css' );

	wp_enqueue_script( 'foundation-js-jquery', get_template_directory_uri() . '/js/vendor/foundation.js', array('jquery'), '6', true );
	wp_enqueue_script( 'writers-blogily-custom-js-jquery', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'writers-blogily-owl-slider-js-jquery', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_style( 'writers-blogily-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'writers_blogily_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/** 
 * Writers Blogily Get Custom Fonts 
 */
function writers_blogily_load_google_fonts() {
	wp_enqueue_style( 'writers-blogily-google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Merriweather:700,400,700i' ); 
}
add_action( 'wp_enqueue_scripts', 'writers_blogily_load_google_fonts' );





/**
 * Copyright and License for Upsell button by Justin Tadlock - 2016 © Justin Tadlock. Customizer button https://gitblogily.com/justintadlock/trt-customizer-pro
 */
require_once( trailingslashit( get_template_directory() ) . 'justinadlock-customizer-button/class-customize.php' );


/**
 * Compare page CSS
 */

function writers_blogily_comparepage_css($hook) {
  if ( 'appearance_page_writers-blogily-info' != $hook ) {
    return;
  }
  wp_enqueue_style( 'writers-blogily-custom-style', get_template_directory_uri() . '/css/compare.css' );
}
add_action( 'admin_enqueue_scripts', 'writers_blogily_comparepage_css' );

/**
 * Compare page content
 */

add_action('admin_menu', 'writers_blogily_themepage');
function writers_blogily_themepage(){
  $theme_info = add_theme_page( __('Writers Blogily','writers-blogily'), __('Writers Blogily','writers-blogily'), 'manage_options', 'writers-blogily-info.php', 'writers_blogily_info_page' );
}

function writers_blogily_info_page() {
  $user = wp_get_current_user();
  ?>
  <div class="wrap about-wrap writers-blogily-add-css">
    <div>
      <h1>
        <?php echo __('Welcome to Writers Blogily!','writers-blogily'); ?>
      </h1>

      <div class="feature-section three-col">
        <div class="col">
          <div class="widgets-holder-wrap">
            <h3><?php echo __("Contact Support", "writers-blogily"); ?></h3>
            <p><?php echo __("Getting started with a new theme can be difficult, if you have issues with Writers Blogily then throw us an email.", "writers-blogily"); ?></p>
            <p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/help-contact/', 'writers-blogily'); ?>" class="button button-primary">
              <?php echo __("Contact Support", "writers-blogily"); ?>
            </a></p>
          </div>
        </div>
        <div class="col">
          <div class="widgets-holder-wrap">
            <h3><?php echo __("View our other themes", "writers-blogily"); ?></h3>
            <p><?php echo __("Do you like our concept but feel like the design doesn't fit your need? Then check out our website for more designs.", "writers-blogily"); ?></p>
            <p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/wordpress-themes/', 'writers-blogily'); ?>" class="button button-primary">
              <?php echo __("View All Themes", "writers-blogily"); ?>
            </a></p>
          </div>
        </div>
        <div class="col">
          <div class="widgets-holder-wrap">
            <h3><?php echo __("Premium Edition", "writers-blogily"); ?></h3>
            <p><?php echo __("If you enjoy Writers Blogily and want to take your website to the next step, then check out our premium edition here.", "writers-blogily"); ?></p>
            <p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/writers-blogily/', 'writers-blogily'); ?>" class="button button-primary">
              <?php echo __("Read More", "writers-blogily"); ?>
            </a></p>
          </div>
        </div>
      </div>
    </div>
    <hr>

    <h2><?php echo __("Free Vs Premium","writers-blogily"); ?></h2>
    <div class="writers-blogily-button-container">
      <a target="blank" href="<?php echo esc_url('https://superbthemes.com/writers-blogily/', 'writers-blogily'); ?>" class="button button-primary">
        <?php echo __("Read Full Description", "writers-blogily"); ?>
      </a>
      <a target="blank" href="<?php echo esc_url('https://superbthemes.com/demo/writers-blogily/', 'writers-blogily'); ?>" class="button button-primary">
        <?php echo __("View Theme Demo", "writers-blogily"); ?>
      </a>
    </div>


    <table class="wp-list-table widefat">
      <thead>
        <tr>
          <th><strong><?php echo __("Theme Feature", "writers-blogily"); ?></strong></th>
          <th><strong><?php echo __("Basic Version", "writers-blogily"); ?></strong></th>
          <th><strong><?php echo __("Premium Version", "writers-blogily"); ?></strong></th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td><?php echo __("Hide Featured Images On Blog Posts", "writers-blogily"); ?></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Navigation Logo & Title/Tagline", "writers-blogily"); ?></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Hide Navigation Title and/or Tagline", "writers-blogily"); ?></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Hide Navigation Completely	", "writers-blogily"); ?></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Navigation Colors", "writers-blogily"); ?></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Header & Footer Menu", "writers-blogily"); ?></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>


        <tr>
          <td><?php echo __("Premium Support", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Header Content Slideshow", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Header Image Slideshow	", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Show Slideshow On Front Page", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Slideshow Colors	", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Slideshow Title, Tagline & Button", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Images In Slideshows", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Easy Google Fonts", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Hide Sidebar On Posts", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Hide About The Author Section On Posts", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Hide Sidebar On Pages	", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Hide Sidebar On Blog Feed	", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Post & Page Colors", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Footer Copyright Text", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Sidebar Colors	", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Blog Feed Colors", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Custom Footer Colors", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Page Builder Implementation", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr> 
        <tr>
          <td><?php echo __("SEO Plugins", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Contact Form", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
        <tr>
          <td><?php echo __("Instagram Feed", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>
      <tr>
          <td><?php echo __("Recent Posts Extended", "writers-blogily"); ?></td>
          <td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("No", "writers-blogily"); ?>" /></span></td>
          <td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Yes", "writers-blogily"); ?>" /></span></td>
        </tr>

      </tbody>
    </table>

  </div>
  <?php
}


