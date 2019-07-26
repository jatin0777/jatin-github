<?php

add_action( 'cpo_companion_content_import_done', 'antreas_content_import_done' );
function antreas_content_import_done() {
	update_option( 'antreas_content_imported', 1 );
}


add_action( 'cpo_companion_widgets_import_done', 'antreas_widgets_import_done' );
function antreas_widgets_import_done() {
	update_option( 'antreas_widgets_imported', 1 );
}


add_action( 'cpo_companion_settings_import_done', 'antreas_settings_import_done' );
function antreas_settings_import_done() {
	update_option( 'antreas_settings_imported', 1 );
}


add_action( 'cpo_companion_import_done', 'antreas_import_done' );
function antreas_import_done() {

	// Sets background image from demo content
	set_theme_mod( 'background_image', antreas_get_attachment_url_by_slug( 'background' ) );

	// Sets custom logo.
	$logo_url = antreas_get_attachment_url_by_slug('antreas-logo');
	set_theme_mod( 'custom_logo', attachment_url_to_postid( $logo_url ) );

	// Sets about pages
	$about_pages = array();
	$page        = get_page_by_path( 'our story' );
	if ( $page ) {
		$about_pages[] = $page->ID;
	}
	$page = get_page_by_path( 'our mission' );
	if ( $page ) {
		$about_pages[] = $page->ID;
	}
	$page = get_page_by_path( 'our beliefs' );
	if ( $page ) {
		$about_pages[] = $page->ID;
	}
	antreas_update_option( 'about_pages', $about_pages );

	// Sets the imported menus to their locations.
	$nav_menu_locations = get_theme_mod( 'nav_menu_locations' );
	$menu_object        = wp_get_nav_menu_object( 'main-menu-navigation' );
	if ( $menu_object ) {
		$nav_menu_locations['main_menu']   = $menu_object->term_id;
		$nav_menu_locations['mobile_menu'] = $menu_object->term_id;
	}

	$menu_object = wp_get_nav_menu_object( 'top-menu-navigation' );
	if ( $menu_object ) {
		$nav_menu_locations['top_menu']    = $menu_object->term_id;
		$nav_menu_locations['footer_menu'] = $menu_object->term_id;
	}
	set_theme_mod( 'nav_menu_locations', $nav_menu_locations );
}
