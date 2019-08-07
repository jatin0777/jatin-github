<?php
/**
* The template for adding Featured Slider Options in Customizer
*
* @package Catch Themes
* @subpackage Rock Star
* @since Rock Star 0.3
*/

$wp_customize->add_section( 'rock_star_featured_slider', array(
	'priority'      => 400,
	'title'			=> esc_html__( 'Featured Slider', 'rock-star' ),
) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_slider_option]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_option'],
	'sanitize_callback' => 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_slider_option]', array(
	'choices'   => rock_star_featured_slider_content_options(),
	'label'    	=> esc_html__( 'Enable Slider on', 'rock-star' ),
	'priority'	=> '2',
	'section'  	=> 'rock_star_featured_slider',
	'settings' 	=> 'rock_star_theme_options[featured_slider_option]',
	'type'    	=> 'select',
) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_slide_transition_effect]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slide_transition_effect'],
	'sanitize_callback'	=> 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_slide_transition_effect]' , array(
	'active_callback'	=> 'rock_star_is_slider_active',
	'choices'  	=> rock_star_featured_slide_transition_effects(),
	'label'		=> esc_html__( 'Transition Effect', 'rock-star' ),
	'priority'	=> '3',
	'section'  	=> 'rock_star_featured_slider',
	'settings' 	=> 'rock_star_theme_options[featured_slide_transition_effect]',
	'type'	  	=> 'select',
	)
);

$wp_customize->add_setting( 'rock_star_theme_options[featured_slide_transition_delay]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slide_transition_delay'],
	'sanitize_callback'	=> 'absint',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_slide_transition_delay]' , array(
	'active_callback'	=> 'rock_star_is_slider_active',
	'description'	=> esc_html__( 'seconds(s)', 'rock-star' ),
	'input_attrs' => array(
    	'style' => 'width: 40px;'
	),
	'label'    		=> esc_html__( 'Transition Delay', 'rock-star' ),
	'priority'		=> '4',
	'section'  		=> 'rock_star_featured_slider',
	'settings' 		=> 'rock_star_theme_options[featured_slide_transition_delay]',
	)
);

$wp_customize->add_setting( 'rock_star_theme_options[featured_slide_transition_length]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slide_transition_length'],
	'sanitize_callback'	=> 'absint',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_slide_transition_length]' , array(
	'active_callback'	=> 'rock_star_is_slider_active',
	'description'	=> esc_html__( 'seconds(s)', 'rock-star' ),
	'input_attrs' => array(
    	'style' => 'width: 40px;'
	),
	'label'    		=> esc_html__( 'Transition Length', 'rock-star' ),
	'priority'		=> '5',
	'section'  		=> 'rock_star_featured_slider',
	'settings' 		=> 'rock_star_theme_options[featured_slide_transition_length]',
	)
);

$wp_customize->add_setting( 'rock_star_theme_options[featured_slider_image_loader]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_image_loader'],
	'sanitize_callback' => 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_slider_image_loader]', array(
	'active_callback'	=> 'rock_star_is_slider_active',
	'choices'   => rock_star_featured_slider_image_loader(),
	'label'    	=> esc_html__( 'Image Loader', 'rock-star' ),
	'priority'	=> '6',
	'section'  	=> 'rock_star_featured_slider',
	'settings' 	=> 'rock_star_theme_options[featured_slider_image_loader]',
	'type'    	=> 'select',
) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_slider_enable_social_icons]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_enable_social_icons'],
	'sanitize_callback'	=> 'rock_star_sanitize_checkbox',
) );


$wp_customize->add_control(  'rock_star_theme_options[featured_slider_enable_social_icons]', array(
	'active_callback'	=> 'rock_star_is_slider_active',
	'label'		=> esc_html__( 'Enable Social Icons in Featured Slider', 'rock-star' ),
	'priority'	=> '7',
	'section'   => 'rock_star_featured_slider',
	'settings'  => 'rock_star_theme_options[featured_slider_enable_social_icons]',
	'type'		=> 'checkbox',
) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_slider_type]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_type'],
	'sanitize_callback'	=> 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_slider_type]', array(
	'active_callback'	=> 'rock_star_is_slider_active',
	'choices'  	=> rock_star_featured_slider_types(),
	'label'    	=> esc_html__( 'Select Slider Type', 'rock-star' ),
	'priority'	=> '7',
	'section'  	=> 'rock_star_featured_slider',
	'settings' 	=> 'rock_star_theme_options[featured_slider_type]',
	'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'rock_star_theme_options[featured_slide_number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slide_number'],
	'sanitize_callback'	=> 'rock_star_sanitize_number_range',
) );

$wp_customize->add_control( 'rock_star_theme_options[featured_slide_number]' , array(
		'active_callback' => 'rock_star_is_demo_slider_inactive',
		'description'     => esc_html__( 'Save and refresh the page if No. of Slides is changed (Max no of slides is 20)', 'rock-star' ),
		'input_attrs'     => array(
			'style' => 'width: 45px;',
			'min'   => 0,
			'max'   => 20,
			'step'  => 1,
		),
		'label'           => esc_html__( 'No of Slides', 'rock-star' ),
		'priority'        => '8',
		'section'         => 'rock_star_featured_slider',
		'settings'        => 'rock_star_theme_options[featured_slide_number]',
		'type'            => 'number',
		'transport'       => 'postMessage'
	)
);

//loop for featured page sliders
for ( $i=1; $i <= $options['featured_slide_number'] ; $i++ ) {
	$wp_customize->add_setting( 'rock_star_theme_options[featured_slider_page_'. $i .']', array(
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'rock_star_sanitize_page',
	) );

	$wp_customize->add_control( 'rock_star_theme_options[featured_slider_page_'. $i .']', array(
		'active_callback'	=> 'rock_star_is_page_slider_active',
		'label'    	=> esc_html__( 'Featured Page', 'rock-star' ) . ' # ' . $i ,
		'priority'	=> '11' . $i,
		'section'  	=> 'rock_star_featured_slider',
		'settings' 	=> 'rock_star_theme_options[featured_slider_page_'. $i .']',
		'type'	   	=> 'dropdown-pages',
	) );
}