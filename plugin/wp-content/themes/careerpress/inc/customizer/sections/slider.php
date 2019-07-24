<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

// Add Slider section
$wp_customize->add_section( 'careerpress_slider_section', array(
	'title'             => esc_html__( 'Main Slider','careerpress' ),
	'description'       => esc_html__( 'Slider Section options.', 'careerpress' ),
	'panel'             => 'careerpress_front_page_panel',
) );

// Slider content enable control and setting
$wp_customize->add_setting( 'careerpress_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'careerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Careerpress_Switch_Control( $wp_customize, 'careerpress_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'careerpress' ),
	'section'           => 'careerpress_slider_section',
	'on_off_label' 		=> careerpress_switch_options(),
) ) );

// Slider btn label setting and control
$wp_customize->add_setting( 'careerpress_theme_options[slider_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['slider_btn_label'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'careerpress_theme_options[slider_btn_label]', array(
	'label'           	=> esc_html__( 'Slider Button Label', 'careerpress' ),
	'section'        	=> 'careerpress_slider_section',
	'active_callback' 	=> 'careerpress_is_slider_section_enable',
	'type'				=> 'text',
) );

for ( $i = 1; $i <= 5; $i++ ) :
	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'careerpress_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'careerpress_sanitize_page',
	) );

	$wp_customize->add_control( new Careerpress_Dropdown_Chooser( $wp_customize, 'careerpress_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'careerpress' ), $i ),
		'section'           => 'careerpress_slider_section',
		'choices'			=> careerpress_page_choices(),
		'active_callback'	=> 'careerpress_is_slider_section_enable',
	) ) );

endfor;

// Slider alt btn label setting and control
$wp_customize->add_setting( 'careerpress_theme_options[slider_alt_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['slider_alt_btn_label'],
) );

$wp_customize->add_control( 'careerpress_theme_options[slider_alt_btn_label]', array(
	'label'           	=> esc_html__( 'Slider Alt Button Label', 'careerpress' ),
	'section'        	=> 'careerpress_slider_section',
	'active_callback' 	=> 'careerpress_is_slider_section_enable',
	'type'				=> 'text',
) );

// Slider alt btn url setting and control
$wp_customize->add_setting( 'careerpress_theme_options[slider_alt_btn_url]', array(
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( 'careerpress_theme_options[slider_alt_btn_url]', array(
	'label'           	=> esc_html__( 'Slider Alt Button Url', 'careerpress' ),
	'section'        	=> 'careerpress_slider_section',
	'active_callback' 	=> 'careerpress_is_slider_section_enable',
	'type'				=> 'url',
) );