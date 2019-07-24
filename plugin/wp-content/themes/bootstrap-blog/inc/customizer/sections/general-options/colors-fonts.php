<?php
/**
 * Colors and Fonts Settings
 *
 * @package Bootstrap Blog
 */


add_action( 'customize_register', 'bootstrap_blog_change_colors_panel' );

function bootstrap_blog_change_colors_panel( $wp_customize)  {
    $wp_customize->get_section( 'colors' )->title = esc_html__( 'Colors and Fonts', 'bootstrap-blog' );
    $wp_customize->get_section( 'colors' )->priority = 1;
    $wp_customize->get_section( 'colors' )->panel = 'bootstrap_blog_general_panel';
}


add_action( 'customize_register', 'bootstrap_blog_customize_color_options' );

function bootstrap_blog_customize_color_options( $wp_customize ) {
            
    $wp_customize->add_setting( 'more_color_options', array(  
      'sanitize_callback' => 'sanitize_text_field',
      'default'     => '',
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Custom_Text( $wp_customize, 'more_color_options', array(
      'label' => esc_html__( 'More color options available in Pro Version.','bootstrap-blog' ),
      'section' => 'colors',
      'settings' => 'more_color_options',
      'type'=> 'customtext',
    ) ) );

}


add_action( 'customize_register', 'bootstrap_blog_customize_font_family' );

function bootstrap_blog_customize_font_family( $wp_customize ) {
            
    $wp_customize->add_setting( 'font_family', array(
        'transport' => 'postMessage',
        'default'     => 'Montserrat',
        'sanitize_callback' => 'bootstrap_blog_sanitize_google_fonts',
    ) );

    $wp_customize->add_control( 'font_family', array(
        'settings'    => 'font_family',
        'label'       =>  esc_html__( 'Choose Font Family For Your Site', 'bootstrap-blog' ),
        'section'     => 'colors',
        'type'        => 'select',
        'choices'     => google_fonts(),
        'priority'    => 100
    ) );
}


add_action( 'customize_register', 'bootstrap_blog_customize_font_size' );

function bootstrap_blog_customize_font_size( $wp_customize ) {
    $wp_customize->add_setting( 'font_size', array(
      'transport' => 'postMessage',
      'default'     => '14px',
      'sanitize_callback' => 'bootstrap_blog_sanitize_select',
    ) );
    
    $wp_customize->add_control( 'font_size', array(
        'settings'    => 'font_size',
        'label'       =>  esc_html__( 'Choose Font Size', 'bootstrap-blog' ),
        'section'     => 'colors',
        'type'        => 'select',
        'default'     => '13px',
        'choices'     =>  array(             
                        '13px' => '13px',
                        '14px' => '14px',
                        '15px' => '15px',
                        '16px' => '16px',
                        '17px' => '17px',
                        '18px' => '18px',
                    ),
        'priority'    =>  101
      ) );
}

add_action( 'customize_register', 'bootstrap_blog_font_weight' );

function bootstrap_blog_font_weight( $wp_customize ) {

    $wp_customize->add_setting( 'bootstrap_blog_font_weight', array(
        'default'           => 500,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Slider_Control( $wp_customize, 'bootstrap_blog_font_weight', array(
        'section' => 'colors',
        'settings' => 'bootstrap_blog_font_weight',
        'label'   => esc_html__( 'Font Weight', 'bootstrap-blog' ),
        'priority' => 102,
        'choices'     => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
    ) ) );
}

add_action( 'customize_register', 'bootstrap_blog_line_height' );

function bootstrap_blog_line_height( $wp_customize ) {

    $wp_customize->add_setting( 'bootstrap_blog_line_height', array(
        'default'           => 22,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Slider_Control( $wp_customize, 'bootstrap_blog_line_height', array(
        'section' => 'colors',
        'settings' => 'bootstrap_blog_line_height',
        'label'   => esc_html__( 'Line Height', 'bootstrap-blog' ),
        'priority' => 102,
        'choices'     => array(
            'min'  => 13,
            'max'  => 53,
            'step' => 1,
        ),
    ) ) );

}

add_action( 'customize_register', 'bootstrap_blog_heading_options' );
function bootstrap_blog_heading_options( $wp_customize ) {
            
    $wp_customize->add_setting( 'heading_options_text', array(
      'default' => '',
      'type' => 'customtext',
      'capability' => 'edit_theme_options',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Custom_Text( $wp_customize, 'heading_options_text', array(
        'label' => esc_html__( 'Heading Options :', 'bootstrap-blog' ),
        'section' => 'colors',
        'settings' => 'heading_options_text',
        'priority'    => 103
    ) ) );
}


add_action( 'customize_register', 'bootstrap_blog_heading_font_family' );

function bootstrap_blog_heading_font_family( $wp_customize ) {

    $wp_customize->add_setting( 'heading_font_family', array(
        'transport' => 'postMessage',
        'sanitize_callback' => 'bootstrap_blog_sanitize_google_fonts',
        'default'     => 'Poppins',
    ) );

    $wp_customize->add_control( 'heading_font_family', array(
        'settings'    => 'heading_font_family',
        'label'       =>  esc_html__( 'Font Family', 'bootstrap-blog' ),
        'section'     => 'colors',
        'type'        => 'select',
        'choices'     => google_fonts(),
        'priority'    => 103
    ) );

}


add_action( 'customize_register', 'bootstrap_blog_heading_font_weight' );

function bootstrap_blog_heading_font_weight( $wp_customize ) {

    $wp_customize->add_setting( 'heading_font_weight', array(
        'default'           => 600,
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Slider_Control( $wp_customize, 'heading_font_weight', array(
        'section' => 'colors',
        'settings' => 'heading_font_weight',
        'label'   => esc_html__( 'Font Weight', 'bootstrap-blog' ),
        'priority' => 103,
        'choices'     => array(
            'min'  => 100,
            'max'  => 900,
            'step' => 100,
        ),
    ) ) );

}


add_action( 'customize_register', 'bootstrap_blog_heading_font_style' );

function bootstrap_blog_heading_font_style( $wp_customize ) {
    $default_size = array(
        '1' =>  32,
        '2' =>  28,
        '3' =>  24,
        '4' =>  21,
        '5' =>  15,
        '6' =>  12,
    );

    for( $i = 1; $i <= 6 ; $i++ ) {

        $wp_customize->add_setting( 'bootstrap_blog_heading_' . $i . '_size', array(
            'default'           => $default_size[$i],
            'sanitize_callback' => 'absint',
            'transport' => 'postMessage'
        ) );

        $wp_customize->add_control( 'bootstrap_blog_heading_' . $i . '_size', array(
            'type'  => 'number',
            'section'   => 'colors',
            'label' => esc_html__( 'Heading ', 'bootstrap-blog' ) . $i . esc_html__(' Size', 'bootstrap-blog' ),
            'priority' => 104,        
            'input_attrs' => array(
                'min' => 10,
                'max' => 50,
                'step'  =>  1
            ),
        ) );
    }
}