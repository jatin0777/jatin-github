<?php
/**
 * Catch Themes Demo Importer
 *
 * @package Euphony
 */

/**
 * @since Euphony 1.0.1
 *
 */
function euphony_import_files() {
  $url = 'https://catchthemes.com/demo/import/euphony/';
  return array(
    array(
       'import_file_name'           => esc_html__( 'Free', 'euphony' ),
       'categories'                 => array( esc_html__( 'Free', 'euphony' ) ),
       'import_file_url'            => $url . 'free/demo-content.xml',
       'import_widget_file_url'     => $url . 'free/widgets.wie',
       'import_customizer_file_url' => $url . 'free/customizer.dat',
       'import_preview_image_url'   => 'https://catchthemes.com/demo/euphony/assets/images/euphony-free.jpg',
       'preview_url'                => 'https://catchthemes.com/demo/euphony-free/',
    ),
    array(
       'import_file_name'           => esc_html__( 'Premium', 'euphony' ),
       'categories'                 => array( esc_html__( 'Premium', 'euphony' ) ),
       'import_file_url'            => $url . 'pro/demo-content.xml',
       'import_widget_file_url'     => $url . 'pro/widgets.wie',
       'import_customizer_file_url' => $url . 'pro/customizer.dat',
       'import_preview_image_url'   => 'https://catchthemes.com/demo/euphony/assets/images/euphony-pro.jpg',
       'preview_url'                => 'https://catchthemes.com/demo/euphony-pro/',
       'isPro'                      => true,
       'buy_url'                    => 'https://catchthemes.com/themes/euphony-pro/'
    ),
    array(
       'import_file_name'           => esc_html__( 'Light Premium', 'euphony' ),
       'categories'                 => array( esc_html__( 'Premium', 'euphony' ) ),
       'import_file_url'            => $url . 'light/demo-content.xml',
       'import_widget_file_url'     => $url . 'light/widgets.wie',
       'import_customizer_file_url' => $url . 'light/customizer.dat',
       'import_preview_image_url'   => 'https://catchthemes.com/demo/euphony/assets/images/euphony-light-pro.jpg',
       'preview_url'                => 'https://catchthemes.com/demo/euphony-light/',
       'isPro'                      => true,
       'buy_url'                    => 'https://catchthemes.com/themes/euphony-pro/'
    ),
  );
}
add_filter( 'cp-ctdi/import_files', 'euphony_import_files' );

function euphony_after_import_setup() {
   // Assign menus to their locations.
    $main_menu            = get_term_by( 'name', 'Main Menu', 'nav_menu' );
    $social_menu          = get_term_by( 'name', 'Social Menu', 'nav_menu' );
    
    set_theme_mod( 'nav_menu_locations', array(
            'menu-1'          => $main_menu->term_id,
            'social-footer'   => $social_menu->term_id,
        )
    );
}
add_action( 'cp-ctdi/after_import', 'euphony_after_import_setup' );