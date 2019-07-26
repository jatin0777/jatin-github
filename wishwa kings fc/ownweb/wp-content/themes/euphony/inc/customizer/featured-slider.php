<?php
/**
 * Featured Slider Options
 *
 * @package Euphony
 */

/**
 * Add hero content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function euphony_slider_options( $wp_customize ) {
	$wp_customize->add_section( 'euphony_featured_slider', array(
			'panel' => 'euphony_theme_options',
			'title' => esc_html__( 'Featured Slider', 'euphony' ),
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_slider_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'euphony_sanitize_select',
			'choices'           => euphony_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'euphony' ),
			'section'           => 'euphony_featured_slider',
			'type'              => 'select',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_slider_number',
			'default'           => '4',
			'sanitize_callback' => 'euphony_sanitize_number_range',

			'active_callback'   => 'euphony_is_slider_active',
			'description'       => esc_html__( 'Save and refresh the page if No. of Slides is changed (Max no of slides is 20)', 'euphony' ),
			'input_attrs'       => array(
				'style' => 'width: 100px;',
				'min'   => 0,
				'max'   => 20,
				'step'  => 1,
			),
			'label'             => esc_html__( 'No of Slides', 'euphony' ),
			'section'           => 'euphony_featured_slider',
			'type'              => 'number',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_slider_content_show',
			'default'           => 'hide-content',
			'sanitize_callback' => 'euphony_sanitize_select',
			'active_callback'   => 'euphony_is_slider_active',
			'choices'           => euphony_content_show(),
			'label'             => esc_html__( 'Display Content', 'euphony' ),
			'section'           => 'euphony_featured_slider',
			'type'              => 'select',
		)
	);

	$slider_number = get_theme_mod( 'euphony_slider_number', 4 );

	for ( $i = 1; $i <= $slider_number ; $i++ ) {
		// Page Sliders
		euphony_register_option( $wp_customize, array(
				'name'              => 'euphony_slider_page_' . $i,
				'sanitize_callback' => 'euphony_sanitize_post',
				'active_callback'   => 'euphony_is_slider_active',
				'label'             => esc_html__( 'Page', 'euphony' ) . ' # ' . $i,
				'section'           => 'euphony_featured_slider',
				'type'              => 'dropdown-pages',
			)
		);
	} // End for().
}
add_action( 'customize_register', 'euphony_slider_options' );

/** Active Callback Functions */

if ( ! function_exists( 'euphony_is_slider_active' ) ) :
	/**
	* Return true if slider is active
	*
	* @since Euphony Pro 1.0
	*/
	function euphony_is_slider_active( $control ) {
		$enable = $control->manager->get_setting( 'euphony_slider_option' )->value();

		//return true only if previwed page on customizer matches the type option selected
		return euphony_check_section( $enable );
	}
endif;