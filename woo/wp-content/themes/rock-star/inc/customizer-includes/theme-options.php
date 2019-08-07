<?php
/**
* The template for adding additional theme options in Customizer
*
* @package Catch Themes
* @subpackage Rock Star
* @since Rock Star 0.3
*/

$wp_customize->add_panel( 'rock_star_theme_options', array(
    'description'    => esc_html__( 'Basic theme Options', 'rock-star' ),
    'capability'     => 'edit_theme_options',
    'priority'       => 200,
    'title'    		 => esc_html__( 'Theme Options', 'rock-star' ),
) );

// Breadcrumb Option
$wp_customize->add_section( 'rock_star_breadcrumb_options', array(
	'description'	=> esc_html__( 'Breadcrumbs are a great way of letting your visitors find out where they are on your site with just a glance. You can enable/disable them on homepage and entire site.', 'rock-star' ),
	'panel'			=> 'rock_star_theme_options',
	'title'    		=> esc_html__( 'Breadcrumb Options', 'rock-star' ),
	'priority' 		=> 201,
) );

$wp_customize->add_setting( 'rock_star_theme_options[breadcrumb_option]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['breadcrumb_option'],
	'sanitize_callback' => 'rock_star_sanitize_checkbox'
) );

$wp_customize->add_control( 'rock_star_theme_options[breadcrumb_option]', array(
	'label'    => esc_html__( 'Check to enable Breadcrumb', 'rock-star' ),
	'section'  => 'rock_star_breadcrumb_options',
	'settings' => 'rock_star_theme_options[breadcrumb_option]',
	'type'     => 'checkbox',
) );

$wp_customize->add_setting( 'rock_star_theme_options[$breadcrumb_on_homepage]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['$breadcrumb_on_homepage'],
	'sanitize_callback' => 'rock_star_sanitize_checkbox'
) );

$wp_customize->add_control( 'rock_star_theme_options[$breadcrumb_on_homepage]', array(
	'label'    => esc_html__( 'Check to enable Breadcrumb on Homepage', 'rock-star' ),
	'section'  => 'rock_star_breadcrumb_options',
	'settings' => 'rock_star_theme_options[$breadcrumb_on_homepage]',
	'type'     => 'checkbox',
) );

$wp_customize->add_setting( 'rock_star_theme_options[breadcrumb_seperator]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['breadcrumb_seperator'],
	'sanitize_callback'	=> 'sanitize_text_field',
) );

$wp_customize->add_control( 'rock_star_theme_options[breadcrumb_seperator]', array(
	'input_attrs' => array(
    		'style' => 'width: 40px;'
		),
	'label'    	=> esc_html__( 'Separator between Breadcrumbs', 'rock-star' ),
	'section' 	=> 'rock_star_breadcrumb_options',
	'settings' 	=> 'rock_star_theme_options[breadcrumb_seperator]',
	'type'     	=> 'text'
	)
);
// Breadcrumb Option End

/**
 * Remove Custom CSS option from WordPress 4.7 onwards
 */
if ( !function_exists( 'wp_update_custom_css_post' ) ) {
	// Custom CSS Option
	$wp_customize->add_section( 'rock_star_custom_css', array(
		'description'	=> esc_html__( 'Custom/Inline CSS', 'rock-star'),
		'panel'  		=> 'rock_star_theme_options',
		'priority' 		=> 203,
		'title'    		=> esc_html__( 'Custom CSS Options', 'rock-star' ),
	) );

	$wp_customize->add_setting( 'rock_star_theme_options[custom_css]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['custom_css'],
		'sanitize_callback' => 'rock_star_sanitize_custom_css',
	) );

	$wp_customize->add_control( 'rock_star_theme_options[custom_css]', array(
			'label'		=> esc_html__( 'Enter Custom CSS', 'rock-star' ),
	        'priority'	=> 1,
			'section'   => 'rock_star_custom_css',
	        'settings'  => 'rock_star_theme_options[custom_css]',
			'type'		=> 'textarea',
	) );
	// Custom CSS End
}

// Excerpt Options
$wp_customize->add_section( 'rock_star_excerpt_options', array(
	'panel'  	=> 'rock_star_theme_options',
	'priority' 	=> 204,
	'title'    	=> esc_html__( 'Excerpt Options', 'rock-star' ),
) );

$wp_customize->add_setting( 'rock_star_theme_options[excerpt_length]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['excerpt_length'],
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( 'rock_star_theme_options[excerpt_length]', array(
	'description' => __('Excerpt length. Default is 30 words', 'rock-star'),
	'input_attrs' => array(
        'min'   => 10,
        'max'   => 200,
        'step'  => 5,
        'style' => 'width: 60px;'
        ),
    'label'    => esc_html__( 'Excerpt Length (words)', 'rock-star' ),
	'section'  => 'rock_star_excerpt_options',
	'settings' => 'rock_star_theme_options[excerpt_length]',
	'type'	   => 'number',
	)
);

$wp_customize->add_setting( 'rock_star_theme_options[excerpt_more_text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['excerpt_more_text'],
	'sanitize_callback'	=> 'sanitize_text_field',
) );

$wp_customize->add_control( 'rock_star_theme_options[excerpt_more_text]', array(
	'label'    => esc_html__( 'Read More Text', 'rock-star' ),
	'section'  => 'rock_star_excerpt_options',
	'settings' => 'rock_star_theme_options[excerpt_more_text]',
	'type'	   => 'text',
) );
// Excerpt Options End

//Homepage / Frontpage Options
$wp_customize->add_section( 'rock_star_homepage_options', array(
	'description'	=> esc_html__( 'Only posts that belong to the categories selected here will be displayed on the front page', 'rock-star' ),
	'panel'			=> 'rock_star_theme_options',
	'title'   	 	=> esc_html__( 'Homepage / Frontpage Options', 'rock-star' ),
	'priority' 		=> 208,
) );

$wp_customize->add_setting( 'rock_star_theme_options[front_page_category]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['front_page_category'],
	'sanitize_callback'	=> 'rock_star_sanitize_category_list',
) );

$wp_customize->add_control( new rock_star_customize_dropdown_categories_control( $wp_customize, 'rock_star_theme_options[front_page_category]', array(
    'label'   	=> esc_html__( 'Select Categories', 'rock-star' ),
    'name'	 	=> 'rock_star_theme_options[front_page_category]',
	'section'  	=> 'rock_star_homepage_options',
    'settings' 	=> 'rock_star_theme_options[front_page_category]',
    'type'     	=> 'dropdown-categories',
) ) );
//Homepage / Frontpage Settings End

// Layout Options
$wp_customize->add_section( 'rock_star_layout', array(
	'capability'=> 'edit_theme_options',
	'panel'		=> 'rock_star_theme_options',
	'priority'	=> 211,
	'title'		=> esc_html__( 'Layout Options', 'rock-star' ),
) );

$wp_customize->add_setting( 'rock_star_theme_options[theme_layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['theme_layout'],
	'sanitize_callback' => 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[theme_layout]', array(
	'choices'  => rock_star_layouts(),
	'label'    => esc_html__( 'Default Layout', 'rock-star' ),
	'section'  => 'rock_star_layout',
	'settings' => 'rock_star_theme_options[theme_layout]',
	'type'     => 'select',
) );

$wp_customize->add_setting( 'rock_star_theme_options[single_page_post_layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['single_page_post_layout'],
	'sanitize_callback' => 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[single_page_post_layout]', array(
	'choices'  => rock_star_layouts(),
	'label'    => esc_html__( 'Single Page/Post Layout', 'rock-star' ),
	'section'  => 'rock_star_layout',
	'settings' => 'rock_star_theme_options[single_page_post_layout]',
	'type'     => 'select',
) );

$wp_customize->add_setting( 'rock_star_theme_options[content_layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['content_layout'],
	'sanitize_callback' => 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[content_layout]', array(
	'choices'   => rock_star_get_archive_content_layout(),
	'label'		=> esc_html__( 'Archive Content Layout', 'rock-star' ),
	'section'   => 'rock_star_layout',
	'settings'  => 'rock_star_theme_options[content_layout]',
	'type'      => 'select',
) );

$wp_customize->add_setting( 'rock_star_theme_options[single_post_image_size]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['single_post_image_size'],
	'sanitize_callback' => 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[single_post_image_size]', array(
		'label'		=> esc_html__( 'Single Page/Post Image Size ', 'rock-star' ),
		'section'   => 'rock_star_layout',
        'settings'  => 'rock_star_theme_options[single_post_image_size]',
        'type'	  	=> 'select',
		'choices'  	=> rock_star_single_post_image_size_options(),
) );
	// Layout Options End

// Pagination Options
$pagination_type	= $options['pagination_type'];

$navigation_description = sprintf(
	wp_kses(
		__( '<a target="_blank" href="%1$s">WP-PageNavi Plugin</a> is recommended for Numeric Option(But will work without it).<br/>Infinite Scroll Options requires <a target="_blank" href="%2$s">JetPack Plugin</a> with Infinite Scroll module Enabled.', 'rock-star' ),
		array(
			'a' => array(
				'href' => array(),
				'target' => array(),
			),
			'br'=> array()
		)
	),
	esc_url( 'https://wordpress.org/plugins/wp-pagenavi' ),
	esc_url( 'https://wordpress.org/plugins/jetpack/' )
);

/**
* Check if navigation type is Jetpack Infinite Scroll and if it is enabled
*/
if ( ( 'infinite-scroll-click' == $pagination_type || 'infinite-scroll-scroll' == $pagination_type ) ) {
	if ( ! (class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) ) {
		$navigation_description = sprintf(
			wp_kses(
				__( 'Infinite Scroll Options requires <a target="_blank" href="%s">JetPack Plugin</a> with Infinite Scroll module Enabled.', 'rock-star' ),
				array(
					'a' => array(
						'href' => array(),
						'target' => array()
					)
				)
			),
			esc_url( 'https://wordpress.org/plugins/jetpack/' )
		);
	}
	else {
		$navigation_description = '';
	}
}

$wp_customize->add_section( 'rock_star_pagination_options', array(
	'description'	=> $navigation_description,
	'panel'  		=> 'rock_star_theme_options',
	'priority'		=> 212,
	'title'    		=> esc_html__( 'Pagination Options', 'rock-star' ),
) );

$wp_customize->add_setting( 'rock_star_theme_options[pagination_type]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['pagination_type'],
	'sanitize_callback' => 'sanitize_key',
) );

$wp_customize->add_control( 'rock_star_theme_options[pagination_type]', array(
	'choices'  => rock_star_get_pagination_types(),
	'label'    => esc_html__( 'Pagination type', 'rock-star' ),
	'section'  => 'rock_star_pagination_options',
	'settings' => 'rock_star_theme_options[pagination_type]',
	'type'	   => 'select',
) );
// Pagination Options End

// Scrollup
$wp_customize->add_section( 'rock_star_scrollup', array(
	'panel'    => 'rock_star_theme_options',
	'priority' => 215,
	'title'    => esc_html__( 'Scrollup Options', 'rock-star' ),
) );

$wp_customize->add_setting( 'rock_star_theme_options[disable_scrollup]', array(
	'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['disable_scrollup'],
	'sanitize_callback' => 'rock_star_sanitize_checkbox',
) );

$wp_customize->add_control( 'rock_star_theme_options[disable_scrollup]', array(
	'label'		=> esc_html__( 'Check to disable Scroll Up', 'rock-star' ),
	'section'   => 'rock_star_scrollup',
    'settings'  => 'rock_star_theme_options[disable_scrollup]',
	'type'		=> 'checkbox',
) );
// Scrollup End

// Search Options
$wp_customize->add_section( 'rock_star_search_options', array(
	'description'=> esc_html__( 'Change default placeholder text in Search.', 'rock-star'),
	'panel'  => 'rock_star_theme_options',
	'priority' => 216,
	'title'    => esc_html__( 'Search Options', 'rock-star' ),
) );

$wp_customize->add_setting( 'rock_star_theme_options[search_text]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['search_text'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'rock_star_theme_options[search_text]', array(
	'label'		=> esc_html__( 'Default Display Text in Search', 'rock-star' ),
	'section'   => 'rock_star_search_options',
    'settings'  => 'rock_star_theme_options[search_text]',
	'type'		=> 'text',
) );
// Search Options End