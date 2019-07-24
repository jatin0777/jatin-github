<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'careerpress_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'careerpress' ),
		'priority'   			=> 900,
		'panel'      			=> 'careerpress_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'careerpress_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'careerpress_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'careerpress_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'careerpress' ),
		'section'    			=> 'careerpress_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'careerpress_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright span',
		'settings'            => 'careerpress_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'careerpress_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'careerpress_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'careerpress_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Careerpress_Switch_Control( $wp_customize, 'careerpress_theme_options[scroll_top_visible]',
    array(
		'label'      		=> esc_html__( 'Display Scroll Top Button', 'careerpress' ),
		'section'    		=> 'careerpress_section_footer',
		'on_off_label' 		=> careerpress_switch_options(),
    )
) );