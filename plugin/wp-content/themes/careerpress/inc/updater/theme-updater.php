<?php
/**
 * Theme updater 
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	require get_template_directory() . '/inc/updater/theme-updater-admin.php';
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://themepalace.com', // Site where EDD is hosted
		'item_name'      => 'Careerpress', // Name of theme
		'theme_slug'     => 'careerpress', // Theme slug
		'version'        => '1.0.8', // The current version of this theme
		'author'         => 'Theme Palace', // The author of this theme
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => 'https://themepalace.com/my-account' // Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Theme License', 'careerpress' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'careerpress' ),
		'license-key'               => __( 'License Key', 'careerpress' ),
		'license-action'            => __( 'License Action', 'careerpress' ),
		'deactivate-license'        => __( 'Deactivate License', 'careerpress' ),
		'activate-license'          => __( 'Activate License', 'careerpress' ),
		'status-unknown'            => __( 'License status is unknown.', 'careerpress' ),
		'renew'                     => __( 'Renew?', 'careerpress' ),
		'unlimited'                 => __( 'unlimited', 'careerpress' ),
		'license-key-is-active'     => __( 'License key is active.', 'careerpress' ),
		'expires%s'                 => __( 'Expires %s.', 'careerpress' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'careerpress' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'careerpress' ),
		'license-key-expired'       => __( 'License key has expired.', 'careerpress' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'careerpress' ),
		'license-is-inactive'       => __( 'License is inactive.', 'careerpress' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'careerpress' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'careerpress' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'careerpress' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'careerpress' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4$s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'careerpress' )
	)

);
