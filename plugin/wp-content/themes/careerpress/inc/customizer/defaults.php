<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 * @return array An array of default values
 */

function careerpress_get_default_theme_options() {
	$careerpress_default_options = array(
		// Color Options
		'header_title_color'			=> '#23272a',
		'header_tagline_color'			=> '#23272a',
		'header_txt_logo_extra'			=> 'show-all',
		
		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',
		'nav_search_enable'				=> true,

		// excerpt options
		'long_excerpt_length'           => 25,
		'read_more_text'           		=> esc_html__( 'Read More', 'careerpress' ),
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'careerpress' ), '[the-year]', '[site-link]' ) . esc_html__( 'All Rights Reserved | ', 'careerpress' ),
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// homepage sections sortable
		'sortable' 						=> 'slider,service,about,projects,blog,promotion',

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'careerpress' ),
		'hide_category'					=> false,
		'archive_column'				=> 'col-2',

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// Slider
		'slider_section_enable'			=> true,
		'slider_btn_label'				=> esc_html__( 'Learn More', 'careerpress' ),
		'slider_alt_btn_label'			=> esc_html__( 'Contact Us', 'careerpress' ),

		// service
		'service_section_enable'		=> true,
		'service_readmore_title'		=> esc_html__( 'Learn More', 'careerpress' ),

		// About
		'about_section_enable'			=> true,
		'about_btn_title'				=> esc_html__( 'Learn More', 'careerpress' ),

		// Projects
		'projects_section_enable'		=> true,
		'projects_sub_title'			=> esc_html__( 'Our Projects', 'careerpress' ),
		'projects_title'				=> esc_html__( 'What we do for your Success', 'careerpress' ),

		// blog
		'blog_section_enable'			=> true,
		'blog_content_type'				=> 'recent',
		'blog_title'					=> esc_html__( 'Know what&#39;s happening around us', 'careerpress' ),
		'blog_sub_title'				=> esc_html__( 'Latest Blog', 'careerpress' ),

		// Promotion
		'promotion_section_enable'		=> true,
		'promotion_btn_title'			=> esc_html__( 'Learn More', 'careerpress' ),

	);

	$output = apply_filters( 'careerpress_default_theme_options', $careerpress_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}