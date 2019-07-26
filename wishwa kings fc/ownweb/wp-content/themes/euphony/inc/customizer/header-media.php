<?php
/**
 * Header Media Options
 *
 * @package Euphony
 */

/**
 * Add Header Media options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function euphony_header_media_options( $wp_customize ) {
	$wp_customize->get_section( 'header_image' )->description = esc_html__( 'If you add video, it will only show up on Homepage/FrontPage. Other Pages will use Header/Post/Page Image depending on your selection of option. Header Image will be used as a fallback while the video loads ', 'euphony' );

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_header_media_option',
			'default'           => 'entire-site-page-post',
			'sanitize_callback' => 'euphony_sanitize_select',
			'choices'           => array(
				'homepage'               => esc_html__( 'Homepage / Frontpage', 'euphony' ),
				'exclude-home'           => esc_html__( 'Excluding Homepage', 'euphony' ),
				'exclude-home-page-post' => esc_html__( 'Excluding Homepage, Page/Post Featured Image', 'euphony' ),
				'entire-site'            => esc_html__( 'Entire Site', 'euphony' ),
				'entire-site-page-post'  => esc_html__( 'Entire Site, Page/Post Featured Image', 'euphony' ),
				'pages-posts'            => esc_html__( 'Pages and Posts', 'euphony' ),
				'disable'                => esc_html__( 'Disabled', 'euphony' ),
			),
			'label'             => esc_html__( 'Enable on', 'euphony' ),
			'section'           => 'header_image',
			'type'              => 'select',
			'priority'          => 1,
		)
	);

	/*Overlay Option for Header Media*/
	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_header_media_image_opacity',
			'default'           => '0',
			'sanitize_callback' => 'euphony_sanitize_number_range',
			'label'             => esc_html__( 'Header Media Overlay', 'euphony' ),
			'section'           => 'header_image',
			'type'              => 'number',
			'input_attrs'       => array(
				'style' => 'width: 60px;',
				'min'   => 0,
				'max'   => 100,
			),
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_header_media_text_alignment',
			'default'           => 'text-align-center',
			'sanitize_callback' => 'euphony_sanitize_select',
			'choices'           => array(
				'text-align-center' => esc_html__( 'Center', 'euphony' ),
				'text-align-right'  => esc_html__( 'Right', 'euphony' ),
				'text-align-left'   => esc_html__( 'Left', 'euphony' ),
			),
			'label'             => esc_html__( 'Text Alignment', 'euphony' ),
			'section'           => 'header_image',
			'type'              => 'radio',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_header_media_content_alignment',
			'default'           => 'content-align-left',
			'sanitize_callback' => 'euphony_sanitize_select',
			'choices'           => array(
				'content-align-center' => esc_html__( 'Center', 'euphony' ),
				'content-align-right'  => esc_html__( 'Right', 'euphony' ),
				'content-align-left'   => esc_html__( 'Left', 'euphony' ),
			),
			'label'             => esc_html__( 'Content Alignment', 'euphony' ),
			'section'           => 'header_image',
			'type'              => 'radio',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_header_media_logo',
			'default'           => trailingslashit( esc_url( get_template_directory_uri() ) ) . 'assets/images/header-media-logo.png',
			'sanitize_callback' => 'esc_url_raw',
			'custom_control'    => 'WP_Customize_Image_Control',
			'label'             => esc_html__( 'Header Media Logo', 'euphony' ),
			'section'           => 'header_image',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_header_media_logo_option',
			'default'           => 'homepage',
			'sanitize_callback' => 'euphony_sanitize_select',
			'active_callback'   => 'euphony_is_header_media_logo_active',
			'choices'           => array(
				'homepage'               => esc_html__( 'Homepage / Frontpage', 'euphony' ),
				'entire-site'            => esc_html__( 'Entire Site', 'euphony' ) ),
			'label'             => esc_html__( 'Enable Header Media logo on', 'euphony' ),
			'section'           => 'header_image',
			'type'              => 'select',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_header_media_title',
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Header Media Title', 'euphony' ),
			'section'           => 'header_image',
			'type'              => 'text',
		)
	);

    euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_header_media_text',
			'sanitize_callback' => 'wp_kses_post',
			'default'           => esc_html__( 'World Wide Tour 2019', 'euphony' ),
			'label'             => esc_html__( 'Site Header Text', 'euphony' ),
			'section'           => 'header_image',
			'type'              => 'textarea',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_header_media_url',
			'default'           => '#',
			'sanitize_callback' => 'esc_url_raw',
			'label'             => esc_html__( 'Header Media Url', 'euphony' ),
			'section'           => 'header_image',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_header_media_url_text',
			'default'           => esc_html__( 'View More', 'euphony' ),
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Header Media Url Text', 'euphony' ),
			'section'           => 'header_image',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_header_url_target',
			'sanitize_callback' => 'euphony_sanitize_checkbox',
			'label'             => esc_html__( 'Open Link in New Window/Tab', 'euphony' ),
			'section'           => 'header_image',
			'custom_control'    => 'Euphony_Toggle_Control',
		)
	);
}
add_action( 'customize_register', 'euphony_header_media_options' );

/** Active Callback Functions */

if ( ! function_exists( 'euphony_is_header_media_logo_active' ) ) :
	/**
	* Return true if header logo is active
	*
	* @since Euphony Pro 1.0
	*/
	function euphony_is_header_media_logo_active( $control ) {
		$logo = $control->manager->get_setting( 'euphony_header_media_logo' )->value();
		if ( '' != $logo ) {
			return true;
		} else {
			return false;
		}
	}
endif;
