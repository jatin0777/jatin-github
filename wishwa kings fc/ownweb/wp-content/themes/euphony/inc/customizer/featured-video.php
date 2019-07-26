<?php
/**
 * Featured Content options
 *
 * @package Euphony
 */

/**
 * Add featured content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function euphony_featured_video_options( $wp_customize ) {
    $wp_customize->add_section( 'euphony_featured_video', array(
			'title' => esc_html__( 'Featured Video', 'euphony' ),
			'panel' => 'euphony_theme_options',
		)
	);

	// Add color scheme setting and control.
	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_featured_video_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'euphony_sanitize_select',
			'choices'           => euphony_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'euphony' ),
			'section'           => 'euphony_featured_video',
			'type'              => 'select',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_featured_video_bg_image',
			'default'           => trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'assets/images/featured-video-bg.jpg',
			'sanitize_callback' => 'euphony_sanitize_image',
			'active_callback'   => 'euphony_is_featured_video_active',
			'custom_control'    => 'WP_Customize_Image_Control',
			'label'             => esc_html__( 'Background Image', 'euphony' ),
			'section'           => 'euphony_contact',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_featured_video_show_lightbox',
			'default'           => 'enabled',
			'sanitize_callback' => 'euphony_sanitize_select',
			'active_callback'   => 'euphony_is_featured_video_active',
			'choices'           => array(
				'enabled'       => esc_html__( 'Enabled', 'euphony' ),
				'disabled'      => esc_html__( 'Disabled', 'euphony' ) 
			),
			'label'             => esc_html__( 'Lightbox Option', 'euphony' ),
			'section'           => 'euphony_featured_video',
			'type'              => 'select',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_featured_video_archive_title',
			'default'           => esc_html__( 'Featured Video', 'euphony' ),
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'euphony_is_featured_video_active',
			'label'             => esc_html__( 'Title', 'euphony' ),
			'section'           => 'euphony_featured_video',
			'type'              => 'text',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_featured_video_sub_title',
			'sanitize_callback' => 'wp_kses_post',
			'active_callback'   => 'euphony_is_featured_video_active',
			'label'             => esc_html__( 'Sub Title', 'euphony' ),
			'section'           => 'euphony_featured_video',
			'type'              => 'textarea',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_featured_video_number',
			'default'           => 5,
			'sanitize_callback' => 'euphony_sanitize_number_range',
			'active_callback'   => 'euphony_is_featured_video_active',
			'description'       => esc_html__( 'Save and refresh the page if No. of Featured Video is changed (Max no of Featured Video is 20)', 'euphony' ),
			'input_attrs'       => array(
				'style' => 'width: 100px;',
				'min'   => 0,
			),
			'label'             => esc_html__( 'No of Featured Video', 'euphony' ),
			'section'           => 'euphony_featured_video',
			'type'              => 'number',
			'transport'         => 'postMessage',
		)
	);

	$number = get_theme_mod( 'euphony_featured_video_number', 5 );

	for ( $i = 1; $i <= $number ; $i++ ) {
	    euphony_register_option( $wp_customize, array(
	            'name'              => 'euphony_featured_video_link_' . $i,
	            'sanitize_callback' => 'esc_url_raw',
	            'active_callback'   => 'euphony_is_featured_video_active',
	            'label'             => esc_html__( 'Video Url', 'euphony' ) . ' ' . $i ,
	            'section'           => 'euphony_featured_video',
	        )
	    );

	    euphony_register_option( $wp_customize, array(
				'name'              => 'euphony_featured_video_title_' . $i,
				'sanitize_callback' => 'wp_kses_post',
				'active_callback'   => 'euphony_is_featured_video_active',
				'label'             => esc_html__( 'Video Title', 'euphony' ) . ' ' . $i,
				'section'           => 'euphony_featured_video',
				'type'              => 'text',
			)
		);

		euphony_register_option( $wp_customize, array(
				'name'              => 'euphony_featured_video_sub_title_' . $i,
				'sanitize_callback' => 'wp_kses_post',
				'active_callback'   => 'euphony_is_featured_video_active',
				'label'             => esc_html__( 'Video Sub Title', 'euphony' ) . ' ' . $i,
				'section'           => 'euphony_featured_video',
				'type'              => 'text',
			)
		);
	}
}
add_action( 'customize_register', 'euphony_featured_video_options', 10 );

/** Active Callback Functions **/
if ( ! function_exists( 'euphony_is_featured_video_active' ) ) :
	/**
	* Return true if featured content is active
	*
	* @since Euphony Pro 1.0
	*/
	function euphony_is_featured_video_active( $control ) {
		$enable = $control->manager->get_setting( 'euphony_featured_video_option' )->value();

		return euphony_check_section( $enable );
	}
endif;
