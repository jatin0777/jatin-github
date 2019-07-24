<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'careerpress_reset_section', array(
	'title'             => esc_html__('Reset all settings','careerpress'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'careerpress' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'careerpress_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'careerpress_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'careerpress_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'careerpress' ),
	'section'           => 'careerpress_reset_section',
	'type'              => 'checkbox',
) );
