<?php
/**
 * General Settings
 *
 * @package Bootstrap Blog
 */

add_action( 'customize_register', 'bootstrap_blog_customize_register_general_panel' );

function bootstrap_blog_customize_register_general_panel( $wp_customize ) {
	$wp_customize->add_panel( 'bootstrap_blog_general_panel', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'General Options', 'bootstrap-blog' ),
	    'description' => esc_html__( 'General Options', 'bootstrap-blog' ),
	) );
}