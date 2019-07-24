<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Careerpress
* @since Careerpress 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'careerpress_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'careerpress_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'careerpress_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'careerpress' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'careerpress' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
) );