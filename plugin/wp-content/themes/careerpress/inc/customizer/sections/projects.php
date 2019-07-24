<?php
/**
 * Projects Section options
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

// Add Projects section
$wp_customize->add_section( 'careerpress_projects_section', array(
	'title'             => esc_html__( 'Projects','careerpress' ),
	'description'       => esc_html__( 'Projects Section options.', 'careerpress' ),
	'panel'             => 'careerpress_front_page_panel',
) );

// Projects content enable control and setting
$wp_customize->add_setting( 'careerpress_theme_options[projects_section_enable]', array(
	'default'			=> 	$options['projects_section_enable'],
	'sanitize_callback' => 'careerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Careerpress_Switch_Control( $wp_customize, 'careerpress_theme_options[projects_section_enable]', array(
	'label'             => esc_html__( 'Projects Section Enable', 'careerpress' ),
	'section'           => 'careerpress_projects_section',
	'on_off_label' 		=> careerpress_switch_options(),
) ) );

// projects sub title setting and control
$wp_customize->add_setting( 'careerpress_theme_options[projects_sub_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['projects_sub_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'careerpress_theme_options[projects_sub_title]', array(
	'label'           	=> esc_html__( 'Sub Title', 'careerpress' ),
	'section'        	=> 'careerpress_projects_section',
	'active_callback' 	=> 'careerpress_is_projects_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'careerpress_theme_options[projects_sub_title]', array(
		'selector'            => '#projects .section-header span.section-subtitle',
		'settings'            => 'careerpress_theme_options[projects_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'careerpress_projects_sub_title_partial',
    ) );
}

// projects title setting and control
$wp_customize->add_setting( 'careerpress_theme_options[projects_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['projects_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'careerpress_theme_options[projects_title]', array(
	'label'           	=> esc_html__( 'Title', 'careerpress' ),
	'section'        	=> 'careerpress_projects_section',
	'active_callback' 	=> 'careerpress_is_projects_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'careerpress_theme_options[projects_title]', array(
		'selector'            => '#projects .section-header h2.section-title',
		'settings'            => 'careerpress_theme_options[projects_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'careerpress_projects_title_partial',
    ) );
}

// Add dropdown category setting and control.
$wp_customize->add_setting(  'careerpress_theme_options[projects_content_category]', array(
	'sanitize_callback' => 'careerpress_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Careerpress_Dropdown_Taxonomies_Control( $wp_customize,'careerpress_theme_options[projects_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'careerpress' ),
	'description'      	=> esc_html__( 'Note: Latest eight posts will be shown from selected category', 'careerpress' ),
	'section'           => 'careerpress_projects_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'careerpress_is_projects_section_enable'
) ) );
