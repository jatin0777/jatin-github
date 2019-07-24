<?php
/**
 * Shop Settings
 *
 * @package Bootstrap Blog
 */

if( class_exists( 'WooCommerce' ) ) {
    add_action( 'customize_register', 'bootstrap_blog_customize_register_shop' );
} else {
    add_action( 'customize_register', 'bootstrap_blog_customize_shop_no_woocommerce' );
}

function bootstrap_blog_customize_register_shop( $wp_customize ) {
	$wp_customize->add_section( 'bootstrap_blog_shop_sections', array(
	    'title'          => esc_html__( 'Shop Section', 'bootstrap-blog' ),
	    'description'    => esc_html__( 'Shop Section :', 'bootstrap-blog' ),
	    'panel'          => 'bootstrap_blog_theme_options_panel',
	    'priority'       => 5,
	) );

    $wp_customize->add_setting( 'shop_display_option', array(
      'sanitize_callback'     =>  'bootstrap_blog_sanitize_checkbox',
      'default'               =>  false
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Toggle_Control( $wp_customize, 'shop_display_option', array(
      'label' => esc_html__( 'Hide / Show','bootstrap-blog' ),
      'section' => 'bootstrap_blog_shop_sections',
      'settings' => 'shop_display_option',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'shop_category', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'bootstrap_blog_sanitize_category',
        'default'     => '',
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'shop_category', array(
        'label' => esc_html__( 'Choose Category', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_shop_sections',
        'settings' => 'shop_category',
        'type'=> 'dropdown-taxonomies',
        'taxonomy'  =>  'product_cat'
    ) ) );

    $wp_customize->add_setting( 'shop_section_title', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  ''
    ) );

    $wp_customize->add_control( 'shop_section_title', array(
        'label' => esc_html__( 'Title', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_shop_sections',
        'settings' => 'shop_section_title',
        'type'=> 'text',
    ) );

    $wp_customize->add_setting( 'number_of_shop', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  4
    ) );

    $wp_customize->add_control( 'number_of_shop', array(
        'label' => esc_html__( 'Number of posts', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_shop_sections',
        'settings' => 'number_of_shop',
        'type'=> 'text',
        'description'   =>  'put -1 for unlimited'
    ) );

}

function bootstrap_blog_customize_shop_no_woocommerce( $wp_customize ) {

    $wp_customize->add_section( 'bootstrap_blog_shop_sections', array(
        'title'          => esc_html__( 'Shop Section', 'bootstrap-blog' ),
        'description'    => esc_html__( 'Shop Section :', 'bootstrap-blog' ),
        'panel'          => 'bootstrap_blog_theme_options_panel',
        'priority'       => 5,
    ) );

    $wp_customize->add_setting( 'activate_woocommerce_for_shop_option_message', array(  
      'sanitize_callback' => 'sanitize_text_field',
      'default'     => '',
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Custom_Text( $wp_customize, 'activate_woocommerce_for_shop_option_message', array(
      'label' => esc_html__( 'Install and activate WooCommerce Plugin to enable this section.','bootstrap-blog' ),
      'section' => 'bootstrap_blog_shop_sections',
      'settings' => 'activate_woocommerce_for_shop_option_message',
      'type'=> 'customtext',
    ) ) );
}