<?php
/**
 * Footer Settings
 *
 * @package Bootstrap Blog
 */

add_action( 'customize_register', 'bootstrap_blog_customize_register_footer_section' );

function bootstrap_blog_customize_register_footer_section( $wp_customize ) {

    $wp_customize->add_section( 'bootstrap_blog_footer_section', array(
        'title'          => esc_html__( 'Footer / Copyright', 'bootstrap-blog' ),
        'description'    => esc_html__( 'Footer / Copyright :', 'bootstrap-blog' ),
        'panel'          => 'bootstrap_blog_general_panel',
        'priority'       => 3,        
    ) );

     $wp_customize->add_setting( 'copyright_edit_option', array(  
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '',
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Custom_Text( $wp_customize, 'copyright_edit_option', array(
        'label' => esc_html__( 'Footer Copyright text can be edited in Pro Version.','bootstrap-blog' ),
        'section' => 'bootstrap_blog_footer_section',
        'settings' => 'copyright_edit_option',
    ) ) );    

}