<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'careerpress_blog_section', array(
	'title'             => esc_html__( 'Blog','careerpress' ),
	'description'       => esc_html__( 'Blog Section options.', 'careerpress' ),
	'panel'             => 'careerpress_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'careerpress_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'careerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Careerpress_Switch_Control( $wp_customize, 'careerpress_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'careerpress' ),
	'section'           => 'careerpress_blog_section',
	'on_off_label' 		=> careerpress_switch_options(),
) ) );

// blog sub title setting and control
$wp_customize->add_setting( 'careerpress_theme_options[blog_sub_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_sub_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'careerpress_theme_options[blog_sub_title]', array(
	'label'           	=> esc_html__( 'Sub Title', 'careerpress' ),
	'section'        	=> 'careerpress_blog_section',
	'active_callback' 	=> 'careerpress_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'careerpress_theme_options[blog_sub_title]', array(
		'selector'            => '#blog .section-header span.section-subtitle',
		'settings'            => 'careerpress_theme_options[blog_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'careerpress_blog_sub_title_partial',
    ) );
}

// blog title setting and control
$wp_customize->add_setting( 'careerpress_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'careerpress_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'careerpress' ),
	'section'        	=> 'careerpress_blog_section',
	'active_callback' 	=> 'careerpress_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'careerpress_theme_options[blog_title]', array(
		'selector'            => '#blog .section-header h2.section-title',
		'settings'            => 'careerpress_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'careerpress_blog_title_partial',
    ) );
}

// Blog content type control and setting
$wp_customize->add_setting( 'careerpress_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'careerpress_sanitize_select',
) );

$wp_customize->add_control( 'careerpress_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'careerpress' ),
	'section'           => 'careerpress_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'careerpress_is_blog_section_enable',
	'choices'			=> array( 
		'category' 	=> esc_html__( 'Category', 'careerpress' ),
		'recent' 	=> esc_html__( 'Recent', 'careerpress' ),
	),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'careerpress_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'careerpress_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Careerpress_Dropdown_Taxonomies_Control( $wp_customize,'careerpress_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'careerpress' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'careerpress' ),
	'section'           => 'careerpress_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'careerpress_is_blog_section_content_category_enable'
) ) );

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'careerpress_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'careerpress_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Careerpress_Dropdown_Category_Control( $wp_customize,'careerpress_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'careerpress' ),
	'description'      	=> esc_html__( 'Note: Select categories to exclude. Press Shift key select multilple categories.', 'careerpress' ),
	'section'           => 'careerpress_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'careerpress_is_blog_section_content_recent_enable'
) ) );
