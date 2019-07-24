<?php
/**
 * Header Image Settings
 *
 * @package Bootstrap Blog
 */


add_action( 'customize_register', 'bootstrap_blog_change_header_image_panel' );

function bootstrap_blog_change_header_image_panel( $wp_customize)  {
    $wp_customize->get_section( 'header_image' )->priority = 1;
    $wp_customize->get_section( 'header_image' )->panel = 'bootstrap_blog_header_panel';
}