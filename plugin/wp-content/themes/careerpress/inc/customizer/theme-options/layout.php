<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'careerpress_layout', array(
	'title'               => esc_html__('Layout','careerpress'),
	'description'         => esc_html__( 'Layout section options.', 'careerpress' ),
	'panel'               => 'careerpress_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'careerpress_theme_options[site_layout]', array(
	'sanitize_callback'   => 'careerpress_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Careerpress_Custom_Radio_Image_Control ( $wp_customize, 'careerpress_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'careerpress' ),
	'section'             => 'careerpress_layout',
	'choices'			  => careerpress_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'careerpress_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'careerpress_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Careerpress_Custom_Radio_Image_Control ( $wp_customize, 'careerpress_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'careerpress' ),
	'section'             => 'careerpress_layout',
	'choices'			  => careerpress_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'careerpress_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'careerpress_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Careerpress_Custom_Radio_Image_Control ( $wp_customize, 'careerpress_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'careerpress' ),
	'section'             => 'careerpress_layout',
	'choices'			  => careerpress_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'careerpress_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'careerpress_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Careerpress_Custom_Radio_Image_Control( $wp_customize, 'careerpress_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'careerpress' ),
	'section'             => 'careerpress_layout',
	'choices'			  => careerpress_sidebar_position(),
) ) );