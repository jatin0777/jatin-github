<?php
/**
* The template for adding Additional Header Option in Customizer
*
* @package Catch Themes
* @subpackage Rock Star
* @since Rock Star 0.3
*/

$wp_customize->add_setting( 'rock_star_theme_options[enable_featured_header_image]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['enable_featured_header_image'],
	'sanitize_callback' => 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[enable_featured_header_image]', array(
		'choices'  	=> rock_star_enable_featured_header_image_options(),
		'label'		=> esc_html__( 'Enable Featured Header Image on ', 'rock-star' ),
		'section'   => 'header_image',
        'settings'  => 'rock_star_theme_options[enable_featured_header_image]',
        'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_image_size]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_image_size'],
	'sanitize_callback' => 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_image_size]', array(
		'choices'  	=> rock_star_featured_image_size_options(),
		'label'		=> esc_html__( 'Page/Post Featured Header Image Size', 'rock-star' ),
		'section'   => 'header_image',
		'settings'  => 'rock_star_theme_options[featured_image_size]',
		'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_header_image_alt]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_header_image_alt'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_header_image_alt]', array(
		'label'		=> esc_html__( 'Featured Header Image Alt/Title Tag ', 'rock-star' ),
		'section'   => 'header_image',
        'settings'  => 'rock_star_theme_options[featured_header_image_alt]',
        'type'	  	=> 'text',
) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_header_image_url]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_header_image_url'],
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_header_image_url]', array(
		'label'		=> esc_html__( 'Featured Header Image Link URL', 'rock-star' ),
		'section'   => 'header_image',
        'settings'  => 'rock_star_theme_options[featured_header_image_url]',
        'type'	  	=> 'text',
) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_header_image_base]', array(
	'capability'		=> 'edit_theme_options',
	'default'	=> $defaults['featured_header_image_url'],
	'sanitize_callback' => 'rock_star_sanitize_checkbox',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_header_image_base]', array(
	'label'    	=> esc_html__( 'Check to Open Link in New Window/Tab', 'rock-star' ),
	'section'  	=> 'header_image',
	'settings' 	=> 'rock_star_theme_options[featured_header_image_base]',
	'type'     	=> 'checkbox',
) );