<?php
/**
 * Theme Options
 *
 * @package Euphony
 */

/**
 * Add theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function euphony_theme_options( $wp_customize ) {
	$wp_customize->add_panel( 'euphony_theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'euphony' ),
		'priority' => 130,
	) );

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_latest_posts_title',
			'default'           => esc_html__( 'News', 'euphony' ),
			'sanitize_callback' => 'wp_kses_post',
			'label'             => esc_html__( 'Latest Posts Title', 'euphony' ),
			'section'           => 'euphony_theme_options',
		)
	);

	// Layout Options
	$wp_customize->add_section( 'euphony_layout_options', array(
		'title' => esc_html__( 'Layout Options', 'euphony' ),
		'panel' => 'euphony_theme_options',
		)
	);

	/* Default Layout */
	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_default_layout',
			'default'           => 'right-sidebar',
			'sanitize_callback' => 'euphony_sanitize_select',
			'label'             => esc_html__( 'Default Layout', 'euphony' ),
			'section'           => 'euphony_layout_options',
			'type'              => 'radio',
			'choices'           => array(
				'right-sidebar'         => esc_html__( 'Right Sidebar ( Content, Primary Sidebar )', 'euphony' ),
				'no-sidebar-full-width' => esc_html__( 'No Sidebar: Full Width', 'euphony' ),
			),
		)
	);

	/* Homepage/Archive Layout */
	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_homepage_archive_layout',
			'default'           => 'no-sidebar-full-width',
			'sanitize_callback' => 'euphony_sanitize_select',
			'label'             => esc_html__( 'Homepage/Archive Layout', 'euphony' ),
			'section'           => 'euphony_layout_options',
			'type'              => 'radio',
			'choices'           => array(
				'right-sidebar'         => esc_html__( 'Right Sidebar ( Content, Primary Sidebar )', 'euphony' ),
				'no-sidebar-full-width' => esc_html__( 'No Sidebar: Full Width', 'euphony' ),
			),
		)
	);

	// Excerpt Options.
	$wp_customize->add_section( 'euphony_excerpt_options', array(
		'panel'     => 'euphony_theme_options',
		'title'     => esc_html__( 'Excerpt Options', 'euphony' ),
	) );

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_excerpt_length',
			'default'           => '20',
			'sanitize_callback' => 'absint',
			'input_attrs' => array(
				'min'   => 10,
				'max'   => 200,
				'step'  => 5,
				'style' => 'width: 60px;',
			),
			'label'    => esc_html__( 'Excerpt Length (words)', 'euphony' ),
			'section'  => 'euphony_excerpt_options',
			'type'     => 'number',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_excerpt_more_text',
			'default'           => esc_html__( 'Continue reading...', 'euphony' ),
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Read More Text', 'euphony' ),
			'section'           => 'euphony_excerpt_options',
			'type'              => 'text',
		)
	);

	// Excerpt Options.
	$wp_customize->add_section( 'euphony_search_options', array(
		'panel'     => 'euphony_theme_options',
		'title'     => esc_html__( 'Search Options', 'euphony' ),
	) );

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_search_text',
			'default'           => esc_html__( 'Search', 'euphony' ),
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Search Text', 'euphony' ),
			'section'           => 'euphony_search_options',
			'type'              => 'text',
		)
	);

	// Homepage / Frontpage Options.
	$wp_customize->add_section( 'euphony_homepage_options', array(
		'description' => esc_html__( 'Only posts that belong to the categories selected here will be displayed on the front page', 'euphony' ),
		'panel'       => 'euphony_theme_options',
		'title'       => esc_html__( 'Homepage / Frontpage Options', 'euphony' ),
	) );

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_recent_posts_heading',
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__( 'Recent Posts', 'euphony' ),
			'label'             => esc_html__( 'Recent Posts Heading', 'euphony' ),
			'section'           => 'euphony_homepage_options',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_static_page_heading',
			'sanitize_callback' => 'sanitize_text_field',
			'active_callback'	=> 'euphony_is_static_page_enabled',
			'default'           => esc_html__( 'Archives', 'euphony' ),
			'label'             => esc_html__( 'Posts Page Header Text', 'euphony' ),
			'section'           => 'euphony_homepage_options',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_front_page_category',
			'sanitize_callback' => 'euphony_sanitize_category_list',
			'custom_control'    => 'Euphony_Multi_Cat',
			'label'             => esc_html__( 'Categories', 'euphony' ),
			'section'           => 'euphony_homepage_options',
			'type'              => 'dropdown-categories',
		)
	);

	// Pagination Options.
	$pagination_type = get_theme_mod( 'euphony_pagination_type', 'default' );

	$nav_desc = '';

	/**
	* Check if navigation type is Jetpack Infinite Scroll and if it is enabled
	*/
	$nav_desc = sprintf(
		wp_kses(
			__( 'For infinite scrolling, use %1$sCatch Infinite Scroll Plugin%2$s with Infinite Scroll module Enabled.', 'euphony' ),
			array(
				'a' => array(
					'href' => array(),
					'target' => array(),
				),
				'br'=> array()
			)
		),
		'<a target="_blank" href="https://wordpress.org/plugins/catch-infinite-scroll/">',
		'</a>'
	);

	$wp_customize->add_section( 'euphony_pagination_options', array(
		'description'     => $nav_desc,
		'panel'           => 'euphony_theme_options',
		'title'           => esc_html__( 'Pagination Options', 'euphony' ),
		'active_callback' => 'euphony_scroll_plugins_inactive'
	) );

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_pagination_type',
			'default'           => 'default',
			'sanitize_callback' => 'euphony_sanitize_select',
			'choices'           => euphony_get_pagination_types(),
			'label'             => esc_html__( 'Pagination type', 'euphony' ),
			'section'           => 'euphony_pagination_options',
			'type'              => 'select',
		)
	);

	/* Scrollup Options */
	$wp_customize->add_section( 'euphony_scrollup', array(
		'panel'    => 'euphony_theme_options',
		'title'    => esc_html__( 'Scrollup Options', 'euphony' ),
	) );

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_disable_scrollup',
			'default'			=> 1,
			'sanitize_callback' => 'euphony_sanitize_checkbox',
			'label'             => esc_html__( 'Scroll Up', 'euphony' ),
			'section'           => 'euphony_scrollup',
			'custom_control'    => 'Euphony_Toggle_Control',
		)
	);

	//Footer Background Image.
	$wp_customize->add_section( 'euphony_footer_background', array(
		'panel'     => 'euphony_theme_options',
		'title'     => esc_html__( 'Footer Background Image', 'euphony' ),
	) );

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_footer_bg_image',
			'default'           => trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'assets/images/footer-bg.jpg',
			'sanitize_callback' => 'euphony_sanitize_image',
			'custom_control'    => 'WP_Customize_Image_Control',
			'label'             => esc_html__( 'Footer Background Image', 'euphony' ),
			'section'           => 'euphony_footer_background',
		)
	);
}
add_action( 'customize_register', 'euphony_theme_options' );

/** Active Callback Functions */
if ( ! function_exists( 'euphony_scroll_plugins_inactive' ) ) :
	/**
	* Return true if infinite scroll functionality exists
	*
	* @since Euphony Pro 1.0
	*/
	function euphony_scroll_plugins_inactive( $control ) {
		if ( ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) || class_exists( 'Catch_Infinite_Scroll' ) ) {
			// Support infinite scroll plugins.
			return false;
		}

		return true;
	}
endif;

if ( ! function_exists( 'euphony_is_static_page_enabled' ) ) :
	/**
	* Return true if A Static Page is enabled
	*
	* @since Euphony Pro 1.1.2
	*/
	function euphony_is_static_page_enabled( $control ) {
		$enable = $control->manager->get_setting( 'show_on_front' )->value();
		if ( 'page' === $enable ) {
			return true;
		}
		return false;
	}
endif;
