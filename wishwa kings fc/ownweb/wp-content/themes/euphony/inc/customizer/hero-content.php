<?php
/**
 * Hero Content Options
 *
 * @package Euphony
 */

/**
 * Add hero content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function euphony_hero_content_options( $wp_customize ) {
	$wp_customize->add_section( 'euphony_hero_content_options', array(
			'title' => esc_html__( 'Hero Content', 'euphony' ),
			'panel' => 'euphony_theme_options',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_hero_content_visibility',
			'default'           => 'disabled',
			'sanitize_callback' => 'euphony_sanitize_select',
			'choices'           => euphony_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'euphony' ),
			'section'           => 'euphony_hero_content_options',
			'type'              => 'select',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_hero_content_bg_image',
			'default'           => trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'assets/images/hero-bg.jpg',
			'sanitize_callback' => 'euphony_sanitize_image',
			'active_callback'   => 'euphony_is_hero_content_active',
			'custom_control'    => 'WP_Customize_Image_Control',
			'label'             => esc_html__( 'Background Image', 'euphony' ),
			'section'           => 'euphony_hero_content_options',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_hero_content',
			'default'           => '0',
			'sanitize_callback' => 'euphony_sanitize_post',
			'active_callback'   => 'euphony_is_hero_content_active',
			'label'             => esc_html__( 'Page', 'euphony' ),
			'section'           => 'euphony_hero_content_options',
			'type'              => 'dropdown-pages',
		)
	);
}
add_action( 'customize_register', 'euphony_hero_content_options' );

/** Active Callback Functions **/
if ( ! function_exists( 'euphony_is_hero_content_active' ) ) :
	/**
	* Return true if hero content is active
	*
	* @since Euphony Pro 1.0
	*/
	function euphony_is_hero_content_active( $control ) {
		$enable = $control->manager->get_setting( 'euphony_hero_content_visibility' )->value();

		return euphony_check_section( $enable );
	}
endif;