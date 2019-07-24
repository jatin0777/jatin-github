<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'careerpress_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','careerpress' ),
	'description'       => esc_html__( 'Archive section options.', 'careerpress' ),
	'panel'             => 'careerpress_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'careerpress_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'careerpress_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'careerpress' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'careerpress' ),
	'section'           => 'careerpress_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'careerpress_is_latest_posts'
) );

// Archive author category setting and control.
$wp_customize->add_setting( 'careerpress_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'careerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Careerpress_Switch_Control( $wp_customize, 'careerpress_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'careerpress' ),
	'section'           => 'careerpress_archive_section',
	'on_off_label' 		=> careerpress_hide_options(),
) ) );

// Blog content type control and setting
$wp_customize->add_setting( 'careerpress_theme_options[archive_column]', array(
	'default'          	=> $options['archive_column'],
	'sanitize_callback' => 'careerpress_sanitize_select',
) );

$wp_customize->add_control( 'careerpress_theme_options[archive_column]', array(
	'label'             => esc_html__( 'Column Layout', 'careerpress' ),
	'section'           => 'careerpress_archive_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'col-2' 	=> esc_html__( 'Two Column', 'careerpress' ),
		'col-3' 	=> esc_html__( 'Three Column', 'careerpress' ),
	),
) );