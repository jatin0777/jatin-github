<?php
/**
 * Header Layout Settings
 *
 * @package Bootstrap Blog
 */

add_action( 'customize_register', 'bootstrap_blog_theme_header_layout_section' );

function bootstrap_blog_theme_header_layout_section( $wp_customize ) {

    $wp_customize->add_section( 'bootstrap_blog_theme_header_layout_section', array(
        'title'          => esc_html__( 'Theme Header Options', 'bootstrap-blog' ),
        'description'    => esc_html__( 'Theme Header Options', 'bootstrap-blog' ),
        'panel'          => 'bootstrap_blog_header_panel',
        'priority'       => 2,
        'capability'     => 'edit_theme_options',
    ) );


    $wp_customize->add_setting( 'bootstrap_blog_header_sticky_menu_option', array(
      'sanitize_callback'     =>  'bootstrap_blog_sanitize_checkbox',
      'default'               =>  false
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Toggle_Control( $wp_customize, 'bootstrap_blog_header_sticky_menu_option', array(
      'label' => esc_html__( 'Enable Sticky Menu?','bootstrap-blog' ),
      'section' => 'bootstrap_blog_theme_header_layout_section',
      'settings' => 'bootstrap_blog_header_sticky_menu_option',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'header_search_display_option', array(
        'sanitize_callback'     =>  'bootstrap_blog_sanitize_checkbox',
        'default'               =>  false
    ) );
            
    $wp_customize->add_control( new Bootstrap_Blog_Toggle_Control( $wp_customize, 'header_search_display_option', array(
        'label' => esc_html__( 'Hide / Show Header Search','bootstrap-blog' ),
        'section' => 'bootstrap_blog_theme_header_layout_section',
        'settings' => 'header_search_display_option',
        'type'=> 'toggle',
    ) ) );

    
    $wp_customize->add_setting( 'bootstrap_blog_header_layouts', array(  
        'sanitize_callback' => 'bootstrap_blog_sanitize_choices',
        'default'     => 'one',
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Radio_Image_Control( $wp_customize, 'bootstrap_blog_header_layouts', array(
        'label' => esc_html__( 'Header Layout','bootstrap-blog' ),
        'description'   => esc_html__( 'More layout options availabe in Pro Version.', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_theme_header_layout_section',
        'settings' => 'bootstrap_blog_header_layouts',
        'type'=> 'radio-image',
        'choices'     => array(
            'one'   => get_stylesheet_directory_uri() . '/images/homepage/header-layouts/header-layout.jpg',
        ),
    ) ) );

}