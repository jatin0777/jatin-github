<?php
/**
 * Homepage Settings
 *
 * @package Bootstrap Blog
 */

add_action( 'customize_register', 'bootstrap_blog_customize_register_theme_options_panel' );

function bootstrap_blog_customize_register_theme_options_panel( $wp_customize ) {
	$wp_customize->add_panel( 'bootstrap_blog_theme_options_panel', array(
	    'priority'    => 12,
	    'title'       => esc_html__( 'Theme Options', 'bootstrap-blog' ),
	    'description' => esc_html__( 'Theme Options', 'bootstrap-blog' ),
	) );
}