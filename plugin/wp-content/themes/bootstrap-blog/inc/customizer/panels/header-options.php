<?php
/**
 * Header Settings
 *
 * @package Bootstrap Blog
 */

add_action( 'customize_register', 'bootstrap_blog_customize_register_header_panel' );

function bootstrap_blog_customize_register_header_panel( $wp_customize ) {
	$wp_customize->add_panel( 'bootstrap_blog_header_panel', array(
	    'priority'    => 11,
	    'title'       => esc_html__( 'Header Options', 'bootstrap-blog' ),
	    'description' => esc_html__( 'Header Options', 'bootstrap-blog' ),
	) );
}