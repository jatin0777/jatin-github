<?php
/**
 * The default template for displaying header
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

	/**
	 * rock_star_doctype hook
	 *
	 * @hooked rock_star_doctype -  10
	 *
	 */
	do_action( 'rock_star_doctype' );?>

<head>
<?php
	/**
	 * rock_star_before_wp_head hook
	 *
	 * @hooked rock_star_head -  10
	 *
	 */
	do_action( 'rock_star_before_wp_head' );

	wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	/**
     * rock_star_before_header hook
     *
     */
    do_action( 'rock_star_before' );

	/**
	 * rock_star_header hook
	 *
	 * @hooked rock_star_page_start -  10
	 * @hooked rock_star_site_inner_start -  20
	 * @hooked rock_star_header_start- 40
	 * @hooked rock_star_site_branding - 50
	 * @hooked rock_star_primary_menu - 80
	 * @hooked rock_star_header_end - 90
	 * @hooked rock_star_header_image_slider_start - 100
	 * @hooked rock_star_featured_image_display (before-slider) - 110
	 * @hooked rock_star_featured_slider - 120
	 * @hooked rock_star_featured_image_display (after-slider) - 130
	 * @hooked rock_star_header_image_slider_end - 140
	 * @hooked rock_star_news_ticker_display (below-slider/header-image) - 150
	 *
	 */
	do_action( 'rock_star_header' );

	/**
     * rock_star_after_header hook
     *
     */
	do_action( 'rock_star_after_header' );

	/**
	 * rock_star_before_content hook
	 * @hooked rock_star_featured_content_display_position - 10
	 * @hooked rock_star_before_content - 20
     * @hooked rock_star_add_breadcrumb - 30
	 * @hooked rock_star_featured_content_display (move featured content above homepage posts - default option) - 40
	 * @hooked rock_star_news_ticker_display - 50
	 */
	do_action( 'rock_star_before_content' );

	/**
     * rock_star_main hook
     *
     * @hooked rock_star_content_start - 10
     * @hooked rock_star_primary_start - 20
     * @hooked rock_star_featured_slider - 30
     * @hooked rock_star_main_start - 40
     */
	do_action( 'rock_star_content' );