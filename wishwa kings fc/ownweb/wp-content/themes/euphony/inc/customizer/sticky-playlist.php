<?php
/**
 * Playlist Options
 *
 * @package Euphony
 */

/**
 * Add sticky_playlist options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function euphony_sticky_playlist( $wp_customize ) {
	$wp_customize->add_section( 'euphony_sticky_playlist', array(
			'title' => esc_html__( 'Sticky Playlist', 'euphony' ),
			'panel' => 'euphony_theme_options',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_sticky_playlist_visibility',
			'default'           => 'disabled',
			'sanitize_callback' => 'euphony_sanitize_select',
			'choices'           => euphony_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'euphony' ),
			'section'           => 'euphony_sticky_playlist',
			'type'              => 'select',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_sticky_playlist',
			'default'           => '0',
			'sanitize_callback' => 'euphony_sanitize_post',
			'active_callback'   => 'euphony_is_sticky_playlist_active',
			'label'             => esc_html__( 'Page', 'euphony' ),
			'section'           => 'euphony_sticky_playlist',
			'type'              => 'dropdown-pages',
		)
	);
}
add_action( 'customize_register', 'euphony_sticky_playlist', 12 );

/** Active Callback Functions **/
if ( ! function_exists( 'euphony_is_sticky_playlist_active' ) ) :
	/**
	* Return true if sticky_playlist is active
	*
	* @since Euphony Pro 1.0
	*/
	function euphony_is_sticky_playlist_active( $control ) {
		$enable = $control->manager->get_setting( 'euphony_sticky_playlist_visibility' )->value();

		return euphony_check_section( $enable );
	}
endif;