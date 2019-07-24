<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'careerpress_menu', array(
	'title'             => esc_html__('Header Menu','careerpress'),
	'description'       => esc_html__( 'Header Menu options.', 'careerpress' ),
	'panel'             => 'nav_menus',
) );

// search enable setting and control.
$wp_customize->add_setting( 'careerpress_theme_options[nav_search_enable]', array(
	'sanitize_callback' => 'careerpress_sanitize_switch_control',
	'default'           => $options['nav_search_enable'],
) );

$wp_customize->add_control( new Careerpress_Switch_Control( $wp_customize, 'careerpress_theme_options[nav_search_enable]', array(
	'label'             => esc_html__( 'Enable search', 'careerpress' ),
	'section'           => 'careerpress_menu',
	'on_off_label' 		=> careerpress_switch_options(),
) ) );