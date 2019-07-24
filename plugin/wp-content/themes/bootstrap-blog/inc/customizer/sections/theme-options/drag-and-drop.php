<?php
/**
 * Drag & Drop Sections
 *
 * @package Bootstrap Blog
 */
add_action( 'customize_register', 'bootstrap_blog_drag_and_drop_sections' );

function bootstrap_blog_drag_and_drop_sections( $wp_customize ) {

	$wp_customize->add_section( 'bootstrap_blog_sort_homepage_sections', array(
	    'title'          => esc_html__( 'Drag & Drop', 'bootstrap-blog' ),
	    'description'    => esc_html__( 'Drag & Drop', 'bootstrap-blog' ),
	    'panel'          => 'bootstrap_blog_theme_options_panel',
	    'priority'       => 6,
	) );

	
	$default = array( 'blog', 'featured-lifestyle', 'shop', 'email-subscription', 'instagram' );
	$choices = array(
		'blog' => esc_html__( 'Blog Section', 'bootstrap-blog' ),
		'featured-lifestyle' => esc_html__( 'Featured Lifestyle Section', 'bootstrap-blog' ),
		'shop' => esc_html__( 'Shop Section', 'bootstrap-blog' ),
		'email-subscription' => esc_html__( 'Email Subscription Section', 'bootstrap-blog' ),
		'instagram' => esc_html__( 'Instagram Section', 'bootstrap-blog' ),
	);
	

	$wp_customize->add_setting( 'bootstrap_blog_sort_homepage', array(
        'capability'  => 'edit_theme_options',
        'sanitize_callback'	=> 'bootstrap_blog_sanitize_array',
        'default'     => $default
    ) );

    $wp_customize->add_control( new Bootstrap_Blog_Control_Sortable( $wp_customize, 'bootstrap_blog_sort_homepage', array(
        'label' => esc_html__( 'Drag and Drop Sections to rearrange.', 'bootstrap-blog' ),
        'section' => 'bootstrap_blog_sort_homepage_sections',
        'settings' => 'bootstrap_blog_sort_homepage',
        'type'=> 'sortable',
        'choices'     => $choices
    ) ) );

}