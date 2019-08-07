<?php
/**
 * Functions and definitions
 *
 * Sets up the theme using core rock-star-core and provides some helper functions using rock-star-custon-functions.
 * Others are attached to action and
 * filter hooks in WordPress to change core functionality
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

//define theme version
if ( !defined( 'ROCK_STAR_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();

	define ( 'ROCK_STAR_THEME_VERSION', $theme_data->get( 'Version' ) );
}

/**
 * Implement the core functions
 */
require trailingslashit( get_template_directory() ) . 'inc/core.php';