<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Careerpress
	 * @since Careerpress 1.0.0
	 */

	/**
	 * careerpress_doctype hook
	 *
	 * @hooked careerpress_doctype -  10
	 *
	 */
	do_action( 'careerpress_doctype' );

?>
<head>
<?php
	/**
	 * careerpress_before_wp_head hook
	 *
	 * @hooked careerpress_head -  10
	 *
	 */
	do_action( 'careerpress_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php
	/**
	 * careerpress_page_start_action hook
	 *
	 * @hooked careerpress_page_start -  10
	 *
	 */
	do_action( 'careerpress_page_start_action' ); 

	/**
	 * careerpress_header_action hook
	 *
	 * @hooked careerpress_header_start -  10
	 * @hooked careerpress_site_branding -  20
	 * @hooked careerpress_site_navigation -  30
	 * @hooked careerpress_header_end -  50
	 *
	 */
	do_action( 'careerpress_header_action' );

	/**
	 * careerpress_content_start_action hook
	 *
	 * @hooked careerpress_content_start -  10
	 *
	 */
	do_action( 'careerpress_content_start_action' );

	/**
	 * careerpress_header_image_action hook
	 *
	 * @hooked careerpress_header_image -  10
	 *
	 */
	do_action( 'careerpress_header_image_action' );

    if ( careerpress_is_frontpage() ) {
    	$options = careerpress_get_theme_options();
    	$sorted = array();
    	if ( ! empty( $options['sortable'] ) ) {
			$sorted = explode( ',' , $options['sortable'] );
		}

		foreach ( $sorted as $section ) {
			add_action( 'careerpress_primary_content', 'careerpress_add_'. $section .'_section' );
		}
		do_action( 'careerpress_primary_content' );
	}