<?php
/**
 * Promotion Section options
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

// Add Promotion section
$wp_customize->add_section( 'careerpress_promotion_section', array(
	'title'             => esc_html__( 'Promotion','careerpress' ),
	'description'       => esc_html__( 'Promotion Section options.', 'careerpress' ),
	'panel'             => 'careerpress_front_page_panel',
) );

// Promotion content enable control and setting
$wp_customize->add_setting( 'careerpress_theme_options[promotion_section_enable]', array(
	'default'			=> 	$options['promotion_section_enable'],
	'sanitize_callback' => 'careerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Careerpress_Switch_Control( $wp_customize, 'careerpress_theme_options[promotion_section_enable]', array(
	'label'             => esc_html__( 'Promotion Section Enable', 'careerpress' ),
	'section'           => 'careerpress_promotion_section',
	'on_off_label' 		=> careerpress_switch_options(),
) ) );

// promotion pages drop down chooser control and setting
$wp_customize->add_setting( 'careerpress_theme_options[promotion_content_page]', array(
	'sanitize_callback' => 'careerpress_sanitize_page',
) );

$wp_customize->add_control( new Careerpress_Dropdown_Chooser( $wp_customize, 'careerpress_theme_options[promotion_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'careerpress' ),
	'section'           => 'careerpress_promotion_section',
	'choices'			=> careerpress_page_choices(),
	'active_callback'	=> 'careerpress_is_promotion_section_enable',
) ) );

// promotion btn title setting and control
$wp_customize->add_setting( 'careerpress_theme_options[promotion_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['promotion_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'careerpress_theme_options[promotion_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'careerpress' ),
	'section'        	=> 'careerpress_promotion_section',
	'active_callback' 	=> 'careerpress_is_promotion_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'careerpress_theme_options[promotion_btn_title]', array(
		'selector'            => '#hire a.btn-default',
		'settings'            => 'careerpress_theme_options[promotion_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'careerpress_promotion_btn_title_partial',
    ) );
}
