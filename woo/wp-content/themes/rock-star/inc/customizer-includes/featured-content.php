<?php
/**
* The template for adding Featured Content Settings in Customizer
*
* @package Catch Themes
* @subpackage Rock Star
* @since Rock Star 0.3
*/

$wp_customize->add_panel( 'rock_star_featured_content', array(
	'capability'  => 'edit_theme_options',
	'description' => esc_html__( 'Featured Content Options', 'rock-star' ),
	'priority'    => 600,
	'title'       => esc_html__( 'Featured Content', 'rock-star' ),
) );

$wp_customize->add_section( 'rock_star_featured_content', array(
	'panel'			=> 'rock_star_featured_content',
	'priority'		=> 1,
	'title'			=> esc_html__( 'Featured Content Options', 'rock-star' ),
) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_content_option]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_option'],
	'sanitize_callback' => 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_content_option]', array(
	'choices'  	=> rock_star_featured_slider_content_options(),
	'label'    	=> esc_html__( 'Enable Featured Content on', 'rock-star' ),
	'section'  	=> 'rock_star_featured_content',
	'settings' 	=> 'rock_star_theme_options[featured_content_option]',
	'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_content_position]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_position'],
	'sanitize_callback' => 'rock_star_sanitize_checkbox'
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_content_position]', array(
	'active_callback' => 'rock_star_is_featured_content_active',
	'label'           => esc_html__( 'Check to Move above Footer', 'rock-star' ),
	'section'         => 'rock_star_featured_content',
	'settings'        => 'rock_star_theme_options[featured_content_position]',
	'type'            => 'checkbox',
) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_content_type]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_type'],
	'sanitize_callback'	=> 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_content_type]', array(
	'active_callback'	=> 'rock_star_is_featured_content_active',
	'choices'  	=> rock_star_featured_content_types(),
	'label'    	=> esc_html__( 'Select Content Type', 'rock-star' ),
	'section'  	=> 'rock_star_featured_content',
	'settings' 	=> 'rock_star_theme_options[featured_content_type]',
	'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_content_headline]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_headline'],
	'sanitize_callback'	=> 'wp_kses_post',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_content_headline]' , array(
	'active_callback' => 'rock_star_is_demo_featured_content_inactive',
	'description'     => esc_html__( 'Leave field empty if you want to remove Headline', 'rock-star' ),
	'label'           => esc_html__( 'Headline for Featured Content', 'rock-star' ),
	'section'         => 'rock_star_featured_content',
	'settings'        => 'rock_star_theme_options[featured_content_headline]',
	'type'            => 'text',
	)
);

$wp_customize->add_setting( 'rock_star_theme_options[featured_content_subheadline]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_subheadline'],
	'sanitize_callback'	=> 'wp_kses_post',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_content_subheadline]' , array(
	'active_callback'	=> 'rock_star_is_demo_featured_content_inactive',
	'description'	=> esc_html__( 'Leave field empty if you want to remove Sub-headline', 'rock-star' ),
	'label'    		=> esc_html__( 'Sub-headline for Featured Content', 'rock-star' ),
	'section'  		=> 'rock_star_featured_content',
	'settings' 		=> 'rock_star_theme_options[featured_content_subheadline]',
	'type'	   		=> 'text',
	)
);

$wp_customize->add_setting( 'rock_star_theme_options[featured_content_layout]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_layout'],
	'sanitize_callback' => 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_content_layout]', array(
	'active_callback' => 'rock_star_is_demo_featured_content_inactive',
	'choices'         => rock_star_featured_content_layout_options(),
	'label'           => esc_html__( 'Select Featured Content Layout', 'rock-star' ),
	'section'         => 'rock_star_featured_content',
	'settings'        => 'rock_star_theme_options[featured_content_layout]',
	'type'            => 'select',
) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_content_number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_number'],
	'sanitize_callback'	=> 'rock_star_sanitize_number_range',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_content_number]' , array(
	'active_callback'	=> 'rock_star_is_demo_featured_content_inactive',
	'description'	=> esc_html__( 'Save and refresh the page if No. of Featured Content is changed (Max no of Featured Content is 20)', 'rock-star' ),
	'input_attrs' 	=> array(
        'style' => 'width: 45px;',
        'min'   => 0,
        'max'   => 20,
        'step'  => 1,
    	),
	'label'    		=> esc_html__( 'No of Featured Content', 'rock-star' ),
	'section'  		=> 'rock_star_featured_content',
	'settings' 		=> 'rock_star_theme_options[featured_content_number]',
	'type'	   		=> 'number',
	'transport'		=> 'postMessage'
	)
);

$wp_customize->add_setting( 'rock_star_theme_options[featured_content_show]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_show'],
	'sanitize_callback'	=> 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_content_show]', array(
	'active_callback'	=> 'rock_star_is_demo_featured_content_inactive',
	'choices'  	=> rock_star_featured_content_show(),
	'label'    	=> esc_html__( 'Display Content', 'rock-star' ),
	'section'  	=> 'rock_star_featured_content',
	'settings' 	=> 'rock_star_theme_options[featured_content_show]',
	'type'	  	=> 'select',
) );

//loop for featured post content
for ( $i=1; $i <=  $options['featured_content_number'] ; $i++ ) {
	$wp_customize->add_setting( 'rock_star_theme_options[featured_content_page_'. $i .']', array(
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'rock_star_sanitize_page',
	) );

	$wp_customize->add_control( 'rock_star_featured_content_page_'. $i .'', array(
		'active_callback'	=> 'rock_star_is_featured_page_content_active',
		'label'    	=> esc_html__( 'Featured Page', 'rock-star' ) . ' ' . $i ,
		'section'  	=> 'rock_star_featured_content',
		'settings' 	=> 'rock_star_theme_options[featured_content_page_'. $i .']',
		'type'	   	=> 'dropdown-pages',
	) );
}


$wp_customize->add_section( 'rock_star_featured_content_background_settings', array(
	'description' => esc_html__( 'Make sure Featured Content is enabled for these options to work', 'rock-star' ),
	'panel'       => 'rock_star_featured_content',
	'title'       => esc_html__( 'Featured Content Background Settings', 'rock-star' ),
) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_content_background_image]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_background_image'],
		'sanitize_callback'	=> 'esc_url_raw',
	) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rock_star_theme_options[featured_content_background_image]', array(
	'label'		=> esc_html__( 'Select/Add Background Image', 'rock-star' ),
	'default'   => $defaults['featured_content_background_image'],
	'section'   => 'rock_star_featured_content_background_settings',
    'settings'  => 'rock_star_theme_options[featured_content_background_image]',
) ) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_content_background_display_position]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_background_display_position'],
	'sanitize_callback' => 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_content_background_display_position]', array(
	'choices'  	=> rock_star_featured_content_background_display_positions(),
	'label'    	=> esc_html__( 'Display Position', 'rock-star' ),
	'section'  	=> 'rock_star_featured_content_background_settings',
	'settings' 	=> 'rock_star_theme_options[featured_content_background_display_position]',
	'type'	  	=> 'radio',
) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_content_background_repeat]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_background_repeat'],
	'sanitize_callback' => 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_content_background_repeat]', array(
	'choices'  	=> rock_star_featured_content_background_repeat_options(),
	'label'    	=> esc_html__( 'Repeat', 'rock-star' ),
	'section'  	=> 'rock_star_featured_content_background_settings',
	'settings' 	=> 'rock_star_theme_options[featured_content_background_repeat]',
	'type'	  	=> 'radio',
) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_content_background_attachment]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_background_attachment'],
	'sanitize_callback' => 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_content_background_attachment]', array(
	'choices'  	=> rock_star_featured_content_background_attachment_options(),
	'label'    	=> esc_html__( 'Attachment', 'rock-star' ),
	'section'  	=> 'rock_star_featured_content_background_settings',
	'settings' 	=> 'rock_star_theme_options[featured_content_background_attachment]',
	'type'	  	=> 'radio',
) );