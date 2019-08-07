<?php
/**
 * The template for adding Custom Sidebars and Widgets
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

if ( ! defined( 'ROCK_STAR_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

/**
 * Register widgetized area
 *
 * @since Rock Star 0.3
 */
function rock_star_widgets_init() {
	//Primary Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'rock-star' ),
		'id'            => 'primary-sidebar',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
		'after_widget'  => '</div><!-- .widget-wrap --></section><!-- .widget.%2$s -->',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		'description'	=> esc_html__( 'This is the primary sidebar if you are using a two column site layout option.', 'rock-star' ),
	) );

	//Footer Widget
	$footer_sidebar_no = 3; //Number of footer sidebars

	for( $i=1; $i <= $footer_sidebar_no; $i++ ) {
		register_sidebar( array(
			'name'          => sprintf( __( 'Footer Area %d', 'rock-star' ), $i ),
			'id'            => sprintf( 'footer-%d', $i ),
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-wrap">',
			'after_widget'  => '</div><!-- .widget-wrap --></section><!-- .widget.%2$s -->',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			'description'	=> sprintf( __( 'Footer %d widget area.', 'rock-star' ), $i ),
		) );
	}


	//Sidebar Before Content
	register_sidebar( array(
		'name'          => esc_html__( 'Before Content', 'rock-star' ),
		'id'            => 'before-content',
		'before_widget' => '<section id="%1$s" class="widget page-section %2$s"><div class="widget-wrap wrapper">',
		'after_widget'  => '</div><!-- .widget-wrap --></section><!-- .widget.%2$s -->',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		'description'	=> esc_html__( 'This is the Before Content widget area. It typically appears on the before the Content.', 'rock-star' ),
	) );

	//Sidebar After Content
	register_sidebar( array(
		'name'          => esc_html__( 'After Content', 'rock-star' ),
		'id'            => 'after-content',
		'before_widget' => '<section id="%1$s" class="widget page-section %2$s"><div class="widget-wrap wrapper">',
		'after_widget'  => '</div><!-- .widget-wrap --></section><!-- .widget.%2$s -->',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		'description'	=> esc_html__( 'This is the After Content widget area. It typically appears after the Content.', 'rock-star' ),
	) );
}
add_action( 'widgets_init', 'rock_star_widgets_init' );

/**
 * Loads up Necessary JS Scripts for widgets
 *
 * @since Rock Star 0.3
 */
function rock_star_widgets_scripts( $hook) {
	if ( 'widgets.php' == $hook ) {
		wp_enqueue_style( 'rock-star-widgets-styles', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'css/widgets.css' );

		wp_enqueue_media();

		wp_enqueue_script( 'rock-star-widgets-scripts', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/widget.min.js', array( 'jquery', 'jquery-ui-datepicker' ) );
	}
}
add_action( 'admin_enqueue_scripts', 'rock_star_widgets_scripts' );

// Load About Widget
include get_template_directory() . '/inc/widgets/about.php';

// Load Background Image Widget
include get_template_directory() . '/inc/widgets/background-image.php';

// Load Featured Post Widget
include get_template_directory() . '/inc/widgets/featured-posts.php';

// Load Instagram Widget
include get_template_directory() . '/inc/widgets/instagram.php';

// Load Social Icon Widget
include get_template_directory() . '/inc/widgets/social-icons.php';

// Load Tours Widget
include get_template_directory() . '/inc/widgets/tours.php';

// Load Video Embed Widget
include get_template_directory() . '/inc/widgets/video-embed.php';
