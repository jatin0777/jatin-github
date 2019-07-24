<?php
/**
 * Recommended Trips Settings
 *
 * @package Bootstrap Blog
 */


add_action( 'customize_register', 'bootstrap_blog_customize_register_slider_section' );
function bootstrap_blog_customize_register_slider_section( $wp_customize ) {
    
	$wp_customize->add_section( 'bootstrap_blog_slider_sections', array(
	    'title'          => esc_html__( 'Slider Posts', 'bootstrap-blog' ),
	    'description'    => esc_html__( 'Slider Posts :', 'bootstrap-blog' ),
	    'panel'          => 'bootstrap_blog_theme_options_panel',
	    'priority'       => 2,
	) );

    $wp_customize->add_setting( 'slider_display_option', array(
        'capability'  => 'edit_theme_options',
        'sanitize_callback'     =>  'bootstrap_blog_sanitize_checkbox',
        'default'               =>  false
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Toggle_Control( $wp_customize, 'slider_display_option', array(
        'label' => esc_html__( 'Hide / Show','bootstrap-blog' ),
        'section' => 'bootstrap_blog_slider_sections',
        'settings' => 'slider_display_option',
        'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'slider_category', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'slider_category', array(
        'label' => esc_html__( 'Choose category', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_slider_sections',
        'settings' => 'slider_category',
        'type'=> 'dropdown-taxonomies',
    ) ) );


    $wp_customize->add_setting( 'number_of_slider', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  3
    ) );

    $wp_customize->add_control( 'number_of_slider', array(
        'label' => esc_html__( 'Number of posts', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_slider_sections',
        'settings' => 'number_of_slider',
        'type'=> 'text',
        'description'   =>  'put -1 for unlimited'
    ) );


    $wp_customize->add_setting( 'bootstrap_blog_slider_layouts', array(  
        'sanitize_callback' => 'bootstrap_blog_sanitize_choices',
        'default'     => 'one',
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Radio_Image_Control( $wp_customize, 'bootstrap_blog_slider_layouts', array(
        'label' => esc_html__( 'Slider Layout','bootstrap-blog' ),
        'description'   => esc_html__( 'More slider options availabe in Pro Version.', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_slider_sections',
        'settings' => 'bootstrap_blog_slider_layouts',
        'type'=> 'radio-image',
        'choices'     => array(
            'one'   => get_stylesheet_directory_uri() . '/images/homepage/slider-layouts/slider-layout.jpg',
        ),
    ) ) );
    

    $wp_customize->add_setting( 'slider_details_show_hide', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'bootstrap_blog_sanitize_array',
        'default'     => array( 'date', 'categories', 'summary', 'readmore' ),
    ) );


    $wp_customize->add_control( new Bootstrap_Blog_Multi_Check_Control( $wp_customize, 'slider_details_show_hide', array(
        'label' => esc_html__( 'Hide / Show Details', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_slider_sections',
        'settings' => 'slider_details_show_hide',
        'type'=> 'multi-check',
        'choices'     => array(            
            'date' => esc_html__( 'Show post date', 'bootstrap-blog' ),     
            'categories' => esc_html__( 'Show Categories', 'bootstrap-blog' ),
            'summary' => esc_attr__( 'Show Summary', 'bootstrap-blog' ),
            'tags' => esc_html__( 'Show Tags', 'bootstrap-blog' ),            
            'readmore' => esc_html__( 'Show Read More', 'bootstrap-blog' ),
        ),
    ) ) );

}