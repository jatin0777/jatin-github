<?php
require_once get_template_directory() . '/wp_bootstrap_navwalker.php';

if ( ! file_exists( get_template_directory() . '/wp_bootstrap_navwalker.php' ) ) {
	// file does not exist... return an error.
	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
	// file exists... require it.
	require_once get_template_directory() . '/wp_bootstrap_navwalker.php';
}

function wpb_theme_setup() {
    //Nav Menus
    register_nav_menus(array(
        'primary'=>('Primary Menu')
    ));
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme','wpb_theme_setup');


function set_excerpt_length() {
    return 17;
}
add_filter('excerpt_length','set_excerpt_length');

function meks_time_ago() {
	return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
}


require get_template_directory().'/inc/customizer.php';

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Navbar',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}