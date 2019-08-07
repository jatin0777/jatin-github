<?php
/**
 * The main template for implementing Theme/Customzer Options
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

/**
 * Implements Rock Star theme options into Theme Customizer.
 *
 * @param $wp_customize Theme Customizer object
 * @return void
 *
 * @since Rock Star 0.3
 */
function rock_star_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$options  = rock_star_get_theme_options();
	$defaults = rock_star_get_default_theme_options();

	//Custom Controls
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/custom-controls.php';

	// Move title_tagline (added to Site Title and Tagline section in Theme Customizer)
	$wp_customize->add_setting( 'rock_star_theme_options[move_title_tagline]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['move_title_tagline'],
		'sanitize_callback' => 'rock_star_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'rock_star_theme_options[move_title_tagline]', array(
		'label'    => esc_html__( 'Check to move Site Title and Tagline before logo', 'rock-star' ),
		'priority' => 103,
		'section'  => 'title_tagline',
		'settings' => 'rock_star_theme_options[move_title_tagline]',
		'type'     => 'checkbox',
	) );

	// Header Options (added to Header section in Theme Customizer)
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/header-options.php';

	//Theme Options
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/theme-options.php';

	// Color Options
	// Moved from Default Color Control to Catbase Color Options
	$wp_customize->get_control( 'background_color' )->section = 'background_image';


	$wp_customize->add_setting( 'rock_star_theme_options[color_scheme]', array(
		'capability'        => 'edit_theme_options',
		'default'           => $defaults['color_scheme'],
		'sanitize_callback' => 'rock_star_sanitize_select',
	) );

	$wp_customize->add_control( 'rock_star_theme_options[color_scheme]', array(
		'label'    => esc_html__( 'Color Scheme', 'rock-star' ),
		'priority' => 1,
		'section'  => 'colors',
		'settings' => 'rock_star_theme_options[color_scheme]',
		'type'     => 'radio',
		'choices'  => rock_star_color_scheme_options(),
		'default'  => $defaults['color_scheme'],
	) );

	//Featured Slider
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/featured-slider.php';

	//Featured Content Setting
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/featured-content.php';

	//News Ticker
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/news-ticker.php';

	//Social Links
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/social-icons.php';

	// Reset all settings to default
	$wp_customize->add_section( 'rock_star_reset_all_settings', array(
		'description'	=> esc_html__( 'Caution: Reset all settings to default', 'rock-star' ),
		'priority' 		=> 700,
		'title'    		=> esc_html__( 'Reset all settings', 'rock-star' ),
	) );

	$wp_customize->add_setting( 'rock_star_theme_options[reset_all_settings]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['reset_all_settings'],
		'sanitize_callback' => 'rock_star_sanitize_checkbox',
		'transport'			=> 'postMessage',
	) );

	$wp_customize->add_control( 'rock_star_theme_options[reset_all_settings]', array(
		'label'    => esc_html__( 'Check to reset all settings to default', 'rock-star' ),
		'section'  => 'rock_star_reset_all_settings',
		'settings' => 'rock_star_theme_options[reset_all_settings]',
		'type'     => 'checkbox',
	) );
	// Reset all settings to default end

	//Important Links
	$wp_customize->add_section( 'important_links', array(
		'priority' => 999,
		'title'    => esc_html__( 'Important Links', 'rock-star' ),
	) );

	$wp_customize->add_setting( 'important_links', array(
		'sanitize_callback'	=> 'sanitize_text_field',
	) );

	$wp_customize->add_control( new rock_star_important_links( $wp_customize, 'important_links', array(
		'label'    => esc_html__( 'Important Links', 'rock-star' ),
		'section'  => 'important_links',
		'settings' => 'important_links',
		'type'     => 'important_links',
    ) ) );
    //Important Links End
}
add_action( 'customize_register', 'rock_star_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously for Rock Star.
 * And flushes out all transient data on preview
 *
 * @since Rock Star 0.3
 */
function rock_star_customize_preview() {
	wp_enqueue_script( 'rock_star_customizer', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/customizer.min.js', array( 'customize-preview' ), '20120827', true );

	//Flush transients
	rock_star_flush_transients();
}
add_action( 'customize_preview_init', 'rock_star_customize_preview' );


/**
 * Custom scripts and styles on customize.php for rock-star.
 *
 * @since Rock Star 0.3
 */
function rock_star_customize_scripts() {
	wp_enqueue_script( 'rock_star_customizer_custom', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'js/customizer-custom-scripts.min.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20150630', true );

	$rock_star_data = array(
		'reset_message' => esc_html__( 'Refresh the customizer page after saving to view reset effects', 'rock-star' ),
	);

	// Send list of color variables as object to custom customizer js
	wp_localize_script( 'rock_star_customizer_custom', 'rock_star_data', $rock_star_data );
}
add_action( 'customize_controls_enqueue_scripts', 'rock_star_customize_scripts');


/**
 * Function to reset date with respect to condition
 *
 * @since Rock Star 0.3
 *
 */
function rock_star_reset_data() {
	$options  = rock_star_get_theme_options();
    if ( $options['reset_all_settings'] ) {
    	remove_theme_mods();

        // Flush out all transients	on reset
        rock_star_flush_transients();

        return;
    }
}
add_action( 'customize_save_after', 'rock_star_reset_data' );


// Active callbacks for customizer.
require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/active-callbacks.php';

// Sanitize functions for customizer.
require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/sanitize-functions.php';

// Add Upgrade to Pro Button.
require_once( trailingslashit( get_template_directory() ) . 'inc/customizer-includes/upgrade-button/class-customize.php' );
