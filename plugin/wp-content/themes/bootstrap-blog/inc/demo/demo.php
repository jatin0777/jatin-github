<?php
/**
 * Demo configuration
 *
 * @package Bootstrap Blog
 */

$config = array(
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Import - Layout One', 'bootstrap-blog' ),
			'local_import_file'            => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/contents.xml',
      		'local_import_widget_file'     => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/widget.wie',
      		'local_import_customizer_file' => trailingslashit( get_stylesheet_directory() ) . 'inc/demo/customizer.dat',
      		'import_notice'					=> esc_html__( 'It will overwrite your settings', 'bootstrap-blog' ),
		),
		
	),
);

Bootstrap_Blog_Demo::init( apply_filters( 'bootstrap_blog_demo_filter', $config ) );