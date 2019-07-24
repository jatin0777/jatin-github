<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'careerpress_pagination', array(
	'title'               => esc_html__('Pagination','careerpress'),
	'description'         => esc_html__( 'Pagination section options.', 'careerpress' ),
	'panel'               => 'careerpress_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'careerpress_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'careerpress_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Careerpress_Switch_Control( $wp_customize, 'careerpress_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'careerpress' ),
	'section'             => 'careerpress_pagination',
	'on_off_label' 		=> careerpress_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'careerpress_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'careerpress_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'careerpress_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'careerpress' ),
	'section'             => 'careerpress_pagination',
	'type'                => 'select',
	'choices'			  => careerpress_pagination_options(),
	'active_callback'	  => 'careerpress_is_pagination_enable',
) );
