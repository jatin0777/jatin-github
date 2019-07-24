<?php
/**
 * Background Settings
 *
 * @package Bootstrap Blog
 */


add_action( 'customize_register', 'bootstrap_blog_change_background_panel' );

function bootstrap_blog_change_background_panel( $wp_customize)  {
    $wp_customize->get_section( 'background_image' )->priority = 4;
    $wp_customize->get_section( 'background_image' )->panel = 'bootstrap_blog_general_panel';
}