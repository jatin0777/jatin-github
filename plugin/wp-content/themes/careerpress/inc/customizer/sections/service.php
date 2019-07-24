<?php
/**
 * Service Section options
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

// Add Service section
$wp_customize->add_section( 'careerpress_service_section', array(
	'title'             => esc_html__( 'Services','careerpress' ),
	'description'       => esc_html__( 'Services Section options.', 'careerpress' ),
	'panel'             => 'careerpress_front_page_panel',
) );

// Service content enable control and setting
$wp_customize->add_setting( 'careerpress_theme_options[service_section_enable]', array(
	'default'			=> 	$options['service_section_enable'],
	'sanitize_callback' => 'careerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Careerpress_Switch_Control( $wp_customize, 'careerpress_theme_options[service_section_enable]', array(
	'label'             => esc_html__( 'Service Section Enable', 'careerpress' ),
	'section'           => 'careerpress_service_section',
	'on_off_label' 		=> careerpress_switch_options(),
) ) );

for ( $i = 1; $i <= 3; $i++ ) :

	// service note control and setting
	$wp_customize->add_setting( 'careerpress_theme_options[service_content_icon_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Careerpress_Icon_Picker( $wp_customize, 'careerpress_theme_options[service_content_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'careerpress' ), $i ),
		'section'           => 'careerpress_service_section',
		'active_callback'	=> 'careerpress_is_service_section_enable',
	) ) );

	// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'careerpress_theme_options[service_content_page_' . $i . ']', array(
		'sanitize_callback' => 'careerpress_sanitize_page',
	) );

	$wp_customize->add_control( new Careerpress_Dropdown_Chooser( $wp_customize, 'careerpress_theme_options[service_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'careerpress' ), $i ),
		'section'           => 'careerpress_service_section',
		'choices'			=> careerpress_page_choices(),
		'active_callback'	=> 'careerpress_is_service_section_enable',
	) ) );

	// service hr setting and control
	$wp_customize->add_setting( 'careerpress_theme_options[service_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Careerpress_Customize_Horizontal_Line( $wp_customize, 'careerpress_theme_options[service_hr_'. $i .']',
		array(
			'section'         => 'careerpress_service_section',
			'active_callback' => 'careerpress_is_service_section_enable',
			'type'			  => 'hr'
	) ) );
endfor;

// service readmore title setting and control
$wp_customize->add_setting( 'careerpress_theme_options[service_readmore_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['service_readmore_title'],
) );

$wp_customize->add_control( 'careerpress_theme_options[service_readmore_title]', array(
	'label'           	=> esc_html__( 'Readmore Label', 'careerpress' ),
	'section'        	=> 'careerpress_service_section',
	'active_callback' 	=> 'careerpress_is_service_section_enable',
	'type'				=> 'text',
) );
