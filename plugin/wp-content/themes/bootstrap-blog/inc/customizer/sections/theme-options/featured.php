<?php
/**
 * Featured Settings
 *
 * @package Bootstrap Blog
 */

add_action( 'customize_register', 'bootstrap_blog_customize_register_featured_lifestyle' );

function bootstrap_blog_customize_register_featured_lifestyle( $wp_customize ) {
	$wp_customize->add_section( 'bootstrap_blog_featured_lifestyle_sections', array(
	    'title'          => esc_html__( 'Featured Section', 'bootstrap-blog' ),
	    'description'    => esc_html__( 'Featured Section :', 'bootstrap-blog' ),
	    'panel'          => 'bootstrap_blog_theme_options_panel',
	    'priority'       => 4,
	) );

    $wp_customize->add_setting( 'featured_lifestyle_display_option', array(
      'sanitize_callback'     =>  'bootstrap_blog_sanitize_checkbox',
      'default'               =>  false
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Toggle_Control( $wp_customize, 'featured_lifestyle_display_option', array(
      'label' => esc_html__( 'Hide / Show','bootstrap-blog' ),
      'section' => 'bootstrap_blog_featured_lifestyle_sections',
      'settings' => 'featured_lifestyle_display_option',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'featured_lifestyle_category', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'bootstrap_blog_sanitize_category',
        'default'     => '',
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'featured_lifestyle_category', array(
        'label' => esc_html__( 'Choose Category', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_featured_lifestyle_sections',
        'settings' => 'featured_lifestyle_category',
        'type'=> 'dropdown-taxonomies',
        'taxonomy'  =>  'category'
    ) ) );

    $wp_customize->add_setting( 'featured_lifestyle_section_title', array(
        'sanitize_callback'     =>  'sanitize_text_field',
        'default'               =>  ''
    ) );

    $wp_customize->add_control( 'featured_lifestyle_section_title', array(
        'label' => esc_html__( 'Title', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_featured_lifestyle_sections',
        'settings' => 'featured_lifestyle_section_title',
        'type'=> 'text',
    ) );


    $wp_customize->add_setting( 'bootstrap_blog_featured_layouts', array(  
        'sanitize_callback' => 'bootstrap_blog_sanitize_choices',
        'default'     => 'one',
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Radio_Image_Control( $wp_customize, 'bootstrap_blog_featured_layouts', array(
        'label' => esc_html__( 'Featured Layout','bootstrap-blog' ),
        'description'   => esc_html__( 'More layout options availabe in Pro Version.', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_featured_lifestyle_sections',
        'settings' => 'bootstrap_blog_featured_layouts',
        'type'=> 'radio-image',
        'choices'     => array(
            'one'   => get_stylesheet_directory_uri() . '/images/homepage/featured-layouts/featured-layout.jpg',
        ),
    ) ) );


    $wp_customize->add_setting( 'featured_lifestyle_show_hide_details', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'bootstrap_blog_sanitize_array',
        'default'     => array( 'date', 'categories', 'tags', 'description', 'read-more' ),
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Multi_Check_Control( $wp_customize, 'featured_lifestyle_show_hide_details', array(
        'label' => esc_html__( 'Hide / Show Details', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_featured_lifestyle_sections',
        'settings' => 'featured_lifestyle_show_hide_details',
        'type'=> 'multi-check',
        'choices'     => array(
            'author' => esc_html__( 'Show post author', 'bootstrap-blog' ),
            'date' => esc_html__( 'Show post date', 'bootstrap-blog' ),     
            'categories' => esc_html__( 'Show Categories', 'bootstrap-blog' ),
            'tags' => esc_html__( 'Show Tags', 'bootstrap-blog' ),
            'number_of_comments' => esc_html__( 'Show number of comments', 'bootstrap-blog' ),
            'description'   =>  esc_html__( 'Show description', 'bootstrap-blog' ),
            'read-more'   =>  esc_html__( 'Show Read More', 'bootstrap-blog' ),
        ),
    ) ) );

}