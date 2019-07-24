<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

// Add About section
$wp_customize->add_section( 'careerpress_about_section', array(
	'title'             => esc_html__( 'About Us','careerpress' ),
	'description'       => esc_html__( 'About Section options.', 'careerpress' ),
	'panel'             => 'careerpress_front_page_panel',
) );

// About content enable control and setting
$wp_customize->add_setting( 'careerpress_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'careerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Careerpress_Switch_Control( $wp_customize, 'careerpress_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'careerpress' ),
	'section'           => 'careerpress_about_section',
	'on_off_label' 		=> careerpress_switch_options(),
) ) );

// about pages drop down chooser control and setting
$wp_customize->add_setting( 'careerpress_theme_options[about_content_page]', array(
	'sanitize_callback' => 'careerpress_sanitize_page',
) );

$wp_customize->add_control( new Careerpress_Dropdown_Chooser( $wp_customize, 'careerpress_theme_options[about_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'careerpress' ),
	'section'           => 'careerpress_about_section',
	'choices'			=> careerpress_page_choices(),
	'active_callback'	=> 'careerpress_is_about_section_enable',
) ) );

// about btn title setting and control
$wp_customize->add_setting( 'careerpress_theme_options[about_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['about_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'careerpress_theme_options[about_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'careerpress' ),
	'section'        	=> 'careerpress_about_section',
	'active_callback' 	=> 'careerpress_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'careerpress_theme_options[about_btn_title]', array(
		'selector'            => '#about-us a.btn',
		'settings'            => 'careerpress_theme_options[about_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'careerpress_about_btn_title_partial',
    ) );
}
