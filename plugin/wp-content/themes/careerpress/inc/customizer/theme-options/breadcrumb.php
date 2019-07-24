<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

$wp_customize->add_section( 'careerpress_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','careerpress' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'careerpress' ),
	'panel'             => 'careerpress_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'careerpress_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'careerpress_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Careerpress_Switch_Control( $wp_customize, 'careerpress_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'careerpress' ),
	'section'          	=> 'careerpress_breadcrumb',
	'on_off_label' 		=> careerpress_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'careerpress_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'careerpress_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'careerpress' ),
	'active_callback' 	=> 'careerpress_is_breadcrumb_enable',
	'section'          	=> 'careerpress_breadcrumb',
) );
