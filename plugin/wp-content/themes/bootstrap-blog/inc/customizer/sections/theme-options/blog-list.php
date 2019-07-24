<?php
/**
 * Blog List Settings
 *
 * @package Bootstrap Blog
 */


add_action( 'customize_register', 'bootstrap_blog_customize_blog_list_option' );

function bootstrap_blog_customize_blog_list_option( $wp_customize ) {

    $wp_customize->add_section( 'bootstrap_blog_blog_list_section', array(
        'title'          => esc_html__( 'Blog Options', 'bootstrap-blog' ),
        'panel'          => 'bootstrap_blog_theme_options_panel',
        'priority'       => 1,
    ) );

    $wp_customize->add_setting( 'homepage_blog_post_title_text', array(
        'sanitize_callback' =>  'wp_kses_post',        
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Custom_Text( $wp_customize, 'homepage_blog_post_title_text', array(
        'label' =>  esc_html__( 'Homepage Blog Section Options :', 'bootstrap-blog' ),
        'section'   =>  'bootstrap_blog_blog_list_section',
        'Settings'  =>  'homepage_blog_post_title_text'
    ) ) );

    $wp_customize->add_setting( 'homepage_blog_display_option', array(
      'sanitize_callback'     =>  'bootstrap_blog_sanitize_checkbox',
      'default'               =>  true
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Toggle_Control( $wp_customize, 'homepage_blog_display_option', array(
      'label' => esc_html__( 'Hide / Show','bootstrap-blog' ),
      'section' => 'bootstrap_blog_blog_list_section',
      'settings' => 'homepage_blog_display_option',
      'type'=> 'toggle',
    ) ) );

    $wp_customize->add_setting( 'homepage_blog_section_category', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'bootstrap_blog_sanitize_category',
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Customize_Dropdown_Taxonomies_Control( $wp_customize, 'homepage_blog_section_category', array(
        'label' => esc_html__( 'Choose Category', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_blog_list_section',
        'settings' => 'homepage_blog_section_category',
        'type' => 'dropdown-taxonomies',
    ) ) );

    $wp_customize->add_setting( 'blog_post_list_options_title_text', array(
        'sanitize_callback' =>  'wp_kses_post',        
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Custom_Text( $wp_customize, 'blog_post_list_options_title_text', array(
        'label' =>  esc_html__( 'Blog List Options :', 'bootstrap-blog' ),
        'section'   =>  'bootstrap_blog_blog_list_section',
        'Settings'  =>  'blog_post_list_options_title_text'
    ) ) );

    $wp_customize->add_setting( 'blog_post_layout', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'bootstrap_blog_sanitize_choices',
        'default'     => 'sidebar-right',
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Radio_Buttonset_Control( $wp_customize, 'blog_post_layout', array(
        'label' => esc_html__( 'Layouts :', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_blog_list_section',
        'settings' => 'blog_post_layout',
        'type'=> 'radio-buttonset',
        'choices'     => array(
            'sidebar-left' => esc_html__( 'Sidebar at left', 'bootstrap-blog' ),
            'no-sidebar'    =>  esc_html__( 'No sidebar', 'bootstrap-blog' ),
            'sidebar-right' => esc_html__( 'Sidebar at right', 'bootstrap-blog' ),            
        ),
    ) ) );


    $wp_customize->add_setting( 'blog_post_view', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'bootstrap_blog_sanitize_choices',
        'default'     => 'grid-view',
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Radio_Buttonset_Control( $wp_customize, 'blog_post_view', array(
        'label' => esc_html__( 'Post View :', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_blog_list_section',
        'settings' => 'blog_post_view',
        'type'=> 'radio-buttonset',
        'choices'     => array(
            'grid-view' => esc_html__( 'Grid View', 'bootstrap-blog' ),
            'list-view' => esc_html__( 'List View', 'bootstrap-blog' ),
            'full-width-view' => esc_html__( 'Fullwidth View', 'bootstrap-blog' ),
        ),
    ) ) );


    $wp_customize->add_setting( 'blog_post_show_hide_details', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'bootstrap_blog_sanitize_array',
        'default'     => array( 'date', 'categories', 'tags' ),
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Multi_Check_Control( $wp_customize, 'blog_post_show_hide_details', array(
        'label' => esc_html__( 'Hide / Show Details', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_blog_list_section',
        'settings' => 'blog_post_show_hide_details',
        'type'=> 'multi-check',
        'choices'     => array(
            'author' => esc_html__( 'Show post author', 'bootstrap-blog' ),
            'date' => esc_html__( 'Show post date', 'bootstrap-blog' ),     
            'categories' => esc_html__( 'Show Categories', 'bootstrap-blog' ),
            'tags' => esc_html__( 'Show Tags', 'bootstrap-blog' ),
            'number_of_comments' => esc_html__( 'Show number of comments', 'bootstrap-blog' ),
        ),
    ) ) );


    $wp_customize->add_setting( 'post_details_title_text', array(
        'sanitize_callback' =>  'wp_kses_post',        
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Custom_Text( $wp_customize, 'post_details_title_text', array(
        'label' =>  esc_html__( 'Detail Page Options :', 'bootstrap-blog' ),
        'section'   =>  'bootstrap_blog_blog_list_section',
        'Settings'  =>  'post_details_title_text'
    ) ) );


    $wp_customize->add_setting( 'detail_post_show_hide_details', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'bootstrap_blog_sanitize_array',
        'default'     => array( 'date', 'categories', 'tags' ),
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Multi_Check_Control( $wp_customize, 'detail_post_show_hide_details', array(
        'label' => esc_html__( 'Hide / Show Details', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_blog_list_section',
        'settings' => 'detail_post_show_hide_details',
        'type'=> 'multi-check',
        'choices'     => array(
            'author' => esc_html__( 'Show post author', 'bootstrap-blog' ),
            'date' => esc_html__( 'Show post date', 'bootstrap-blog' ),     
            'categories' => esc_html__( 'Show Categories', 'bootstrap-blog' ),
            'tags' => esc_html__( 'Show Tags', 'bootstrap-blog' ),
            'number_of_comments' => esc_html__( 'Show number of comments', 'bootstrap-blog' ),
        ),
    ) ) );


    $wp_customize->add_setting( 'show_hide_author_block_details', array(
        'capability'  => 'edit_theme_options',        
        'sanitize_callback' => 'bootstrap_blog_sanitize_array',
        'default'     => array( 'author' ),
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Multi_Check_Control( $wp_customize, 'show_hide_author_block_details', array(
        'label' => esc_html__( 'Author Block', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_blog_list_section',
        'settings' => 'show_hide_author_block_details',
        'type'=> 'multi-check',
        'choices'     => array(
            'author' => esc_html__( 'Show author block', 'bootstrap-blog' ),
        ),
    ) ) );
}