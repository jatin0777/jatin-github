<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://catchplugins.com
 * @since             1.0.0
 * @package           Essential_Widgets
 *
 * @wordpress-plugin
 * Plugin Name:       Essential Widgets
 * Plugin URI:        https://catchplugins.com/plugins/essential-widgets/
 * Description:       Essential Widgets is a WordPress plugin for widgets that allows you to create and add amazing widgets with high customization option on your website without affecting your wallet.
 * Version:           1.5
 * Author:            Catch Plugins
 * Author URI:        https://catchplugins.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       essential-widgets
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define Version
define( 'ESSENTIAL_WIDGETS_VERSION', '1.5' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-essential-widgets-activator.php
 */
if ( !defined( 'ESSENTIAL_WIDGETS_URL' ) ) {
	define( 'ESSENTIAL_WIDGETS_URL', plugin_dir_url( __FILE__ ) );
}


// The absolute path of the directory that contains the file
if ( !defined( 'ESSENTIAL_WIDGETS_PATH' ) ) {
	define( 'ESSENTIAL_WIDGETS_PATH', plugin_dir_path( __FILE__ ) );
}


// Gets the path to a plugin file or directory, relative to the plugins directory, without the leading and trailing slashes.
if ( !defined( 'ESSENTIAL_WIDGETS_BASENAME' ) ) {
	define( 'ESSENTIAL_WIDGETS_BASENAME', plugin_basename( __FILE__ ) );
}
function activate_essential_widgets() {
	$required = 'essential-widgets-pro/essential-widgets-pro.php';
	if ( is_plugin_active( $required ) ) {
		$message = esc_html__( 'Sorry, Pro version is already active. No need to activate Free version. If you still want to activate the Free version, please deactivate the Pro version first. %1$s&laquo; Return to Plugins%2$s.', 'essential-widgets' );
		$message = sprintf( $message, '<br><a href="' . esc_url( admin_url( 'plugins.php' ) ) . '">', '</a>' );
		wp_die( $message );
	}
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-essential-widgets-activator.php';
	Essential_Widgets_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-essential-widgets-deactivator.php
 */
function deactivate_essential_widgets() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-essential-widgets-deactivator.php';
	Essential_Widgets_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_essential_widgets' );
register_deactivation_hook( __FILE__, 'deactivate_essential_widgets' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-essential-widgets.php';


function essential_widgets_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

if ( ! function_exists( 'essential_widgets_get_options' ) ) :
function essential_widgets_get_options() {
	$defaults = essential_widgets_default_options();
	$options  = get_option( 'essential_widgets_options', $defaults );

	return wp_parse_args( $options, $defaults  ) ;
}
endif; // essential_widgets_get_options


if ( ! function_exists( 'essential_widgets_default_options' ) ) :
/**
 * Return array of default options
 *
 * @since     1.0
 * @return    array    default options.
 */
function essential_widgets_default_options( $option = null ) {
	$widget_list = essential_widgets_list();
	foreach( $widget_list as $key => $value ) {
		$default_options[$key] = 1;
	}

	if ( null == $option ) {
		return apply_filters( 'essential_widgets_options', $default_options );
	}
	else {
		return $default_options[ $option ];
	}
}
endif; // essential_widgets_default_options


if ( ! function_exists( 'essential_widgets_list' ) ) :
function essential_widgets_list(){
	$widget_list = array(
		'ew_authors'    => esc_html__( 'EW: Authors', 'essential-widgets' ),
		'ew_categories' => esc_html__( 'EW: Category', 'essential-widgets' ),
		'ew_menus'      => esc_html__( 'EW: Menu', 'essential-widgets' ),
		'ew_pages'      => esc_html__( 'EW: Pages', 'essential-widgets' ),
		'ew_posts'      => esc_html__( 'EW: Post', 'essential-widgets' ),
		'ew_archives'   => esc_html__( 'EW: Recent Posts', 'essential-widgets' ),
		'ew_tags'       => esc_html__( 'EW: Tags', 'essential-widgets' ),
	);
	return $widget_list;
}
endif;

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_essential_widgets() {

	$plugin = new Essential_Widgets();
	$plugin->run();

}
run_essential_widgets();

/* CTP tabs removal options */
require plugin_dir_path( __FILE__ ) . 'includes/ctp-tabs-removal.php';

$ctp_options = ctp_get_options();
if( 1 == $ctp_options['theme_plugin_tabs'] ) {
	/* Adds Catch Themes tab in Add theme page and Themes by Catch Themes in Customizer's change theme option. */
	if( ! class_exists( 'CatchThemesThemePlugin' ) && ! function_exists( 'add_our_plugins_tab' ) ) {
		require plugin_dir_path( __FILE__ ) . 'includes/CatchThemesThemePlugin.php';
	}
}