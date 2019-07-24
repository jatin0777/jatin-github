<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

if ( ! function_exists( 'careerpress_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Careerpress 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function careerpress_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'careerpress_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'careerpress_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Careerpress 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function careerpress_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'careerpress_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if slider section is enabled.
 *
 * @since Careerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function careerpress_is_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'careerpress_theme_options[slider_section_enable]' )->value() );
}

/**
 * Check if service section is enabled.
 *
 * @since Careerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function careerpress_is_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'careerpress_theme_options[service_section_enable]' )->value() );
}

/**
 * Check if about section is enabled.
 *
 * @since Careerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function careerpress_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'careerpress_theme_options[about_section_enable]' )->value() );
}

/**
 * Check if projects section is enabled.
 *
 * @since Careerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function careerpress_is_projects_section_enable( $control ) {
	return ( $control->manager->get_setting( 'careerpress_theme_options[projects_section_enable]' )->value() );
}

/**
 * Check if blog section is enabled.
 *
 * @since Careerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function careerpress_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'careerpress_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is category.
 *
 * @since Careerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function careerpress_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'careerpress_theme_options[blog_content_type]' )->value();
	return careerpress_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if blog section content type is recent.
 *
 * @since Careerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function careerpress_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'careerpress_theme_options[blog_content_type]' )->value();
	return careerpress_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}

/**
 * Check if promotion section is enabled.
 *
 * @since Careerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function careerpress_is_promotion_section_enable( $control ) {
	return ( $control->manager->get_setting( 'careerpress_theme_options[promotion_section_enable]' )->value() );
}
