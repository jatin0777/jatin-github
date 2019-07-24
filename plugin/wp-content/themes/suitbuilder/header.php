<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package suitbuilder
 */

/**
 * suitbuilder_action_before_head hook
 * @since suitbuilder 1.0.0
 *
 * @hooked suitbuilder_set_global -  0
 * @hooked suitbuilder_doctype -  10
 */
do_action( 'suitbuilder_action_before_head' );?>

<head>

	<?php
	/**
	 * suitbuilder_action_before_wp_head hook
	 * @since suitbuilder 1.0.0
	 *
	 * @hooked suitbuilder_before_wp_head -  10
	 */
	do_action( 'suitbuilder_action_before_wp_head' );

	wp_head();

	/**
	 * suitbuilder_action_after_wp_head hook
	 * @since suitbuilder 1.0.0
	 *
	 * @hooked null
	 */
	do_action( 'suitbuilder_action_after_wp_head' );
	?>
</head>

<body <?php body_class(); ?>>

<?php
/**
 * suitbuilder_action_before hook
 * @since suitbuilder 1.0.0
 *
 * @hooked suitbuilder_page_start - 15
 */
do_action( 'suitbuilder_action_before' );

/**
 * suitbuilder_action_before_header hook
 * @since suitbuilder 1.0.0
 *
 * @hooked suitbuilder_skip_to_content - 10
 */
do_action( 'suitbuilder_action_before_header' );

/**
 * suitbuilder_action_header hook
 * @since suitbuilder 1.0.0
 *
 * @hooked suitbuilder_after_header - 10
 */
do_action( 'suitbuilder_action_header' );

/**
 * suitbuilder_action_nav_page_start hook
 * @since suitbuilder 1.0.0
 *
 * @hooked page start and navigations - 10
 */
do_action( 'suitbuilder_action_nav_page_start' );

/**
 * suitbuilder_action_on_header hook
 * @since suitbuilder 1.0.0
 *
 * @hooked page start and navigations - 10
 */
do_action( 'suitbuilder_action_on_header' );

/**
 * suitbuilder_action_before_content hook
 * @since suitbuilder 1.0.0
 *
 * @hooked null
 */
do_action( 'suitbuilder_action_before_content' );

?>

