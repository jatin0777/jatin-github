<?php
/**
* The template for adding News Ticker Settings in Customizer
*
* @package Catch Themes
* @subpackage Rock Star
* @since Rock Star 0.3
*/

$wp_customize->add_section( 'rock_star_news_ticker_settings', array(
	'priority'      => 500,
	'title'			=> esc_html__( 'News Ticker', 'rock-star' ),
) );

$wp_customize->add_setting( 'rock_star_theme_options[news_ticker_option]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['news_ticker_option'],
	'sanitize_callback' => 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[news_ticker_option]', array(
	'choices'  	=> rock_star_featured_slider_content_options(),
	'label'    	=> esc_html__( 'Enable News Ticker on', 'rock-star' ),
	'priority'	=> '1',
	'section'  	=> 'rock_star_news_ticker_settings',
	'settings' 	=> 'rock_star_theme_options[news_ticker_option]',
	'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'rock_star_theme_options[news_ticker_position]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['news_ticker_position'],
	'sanitize_callback'	=> 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[news_ticker_position]', array(
	'active_callback'	=> 'rock_star_is_news_ticker_active',
	'choices'  	=> rock_star_news_ticker_positions(),
	'label'    	=> esc_html__( 'News Ticker Position', 'rock-star' ),
	'priority'	=> '3',
	'section'  	=> 'rock_star_news_ticker_settings',
	'settings' 	=> 'rock_star_theme_options[news_ticker_position]',
	'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'rock_star_theme_options[news_ticker_transition_effect]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['news_ticker_transition_effect'],
	'sanitize_callback'	=> 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[news_ticker_transition_effect]' , array(
	'active_callback' => 'rock_star_is_news_ticker_active',
	'choices'         => rock_star_featured_slide_transition_effects(),
	'label'           => esc_html__( 'Transition Effect', 'rock-star' ),
	'priority'        => '4',
	'section'         => 'rock_star_news_ticker_settings',
	'settings'        => 'rock_star_theme_options[news_ticker_transition_effect]',
	'type'            => 'select',
	)
);

$wp_customize->add_setting( 'rock_star_theme_options[news_ticker_type]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['news_ticker_type'],
	'sanitize_callback'	=> 'rock_star_sanitize_select',
) );

$wp_customize->add_control( 'rock_star_theme_options[news_ticker_type]', array(
	'active_callback'	=> 'rock_star_is_news_ticker_active',
	'choices'  	=> rock_star_news_ticker_types(),
	'label'    	=> esc_html__( 'Select Ticker Type', 'rock-star' ),
	'priority'	=> '3',
	'section'  	=> 'rock_star_news_ticker_settings',
	'settings' 	=> 'rock_star_theme_options[news_ticker_type]',
	'type'	  	=> 'select',
) );

$wp_customize->add_setting( 'rock_star_theme_options[news_ticker_label]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['news_ticker_label'],
	'sanitize_callback'	=> 'wp_kses_post',
) );

$wp_customize->add_control( 'rock_star_theme_options[news_ticker_label]' , array(
	'active_callback'	=> 'rock_star_is_demo_news_ticker_inactive',
	'description'	=> esc_html__( 'Leave field empty if you want to remove Headline', 'rock-star' ),
	'label'    		=> esc_html__( 'News Ticker Label', 'rock-star' ),
	'priority'		=> '4',
	'section'  		=> 'rock_star_news_ticker_settings',
	'settings' 		=> 'rock_star_theme_options[news_ticker_label]',
	'type'	   		=> 'text',
	)
);

$wp_customize->add_setting( 'rock_star_theme_options[news_ticker_number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['news_ticker_number'],
	'sanitize_callback'	=> 'rock_star_sanitize_number_range',
) );

$wp_customize->add_control( 'rock_star_theme_options[news_ticker_number]' , array(
	'active_callback'	=> 'rock_star_is_demo_news_ticker_inactive',
	'description'	=> esc_html__( 'Save and refresh the page if No. of News Ticker is changed (Max no of News Ticker is 20)', 'rock-star' ),
	'input_attrs' 	=> array(
        'style' => 'width: 45px;',
        'min'   => 0,
        'max'   => 20,
        'step'  => 1,
    	),
	'label'    		=> esc_html__( 'No of News Ticker', 'rock-star' ),
	'priority'		=> '6',
	'section'  		=> 'rock_star_news_ticker_settings',
	'settings' 		=> 'rock_star_theme_options[news_ticker_number]',
	'type'	   		=> 'number',
	'transport'		=> 'postMessage'
	)
);

for ( $i=1; $i <=  $options['news_ticker_number'] ; $i++ ) {
	//Page News Ticker
	$wp_customize->add_setting( 'rock_star_theme_options[news_ticker_page_'. $i .']', array(
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'rock_star_sanitize_page',
	) );

	$wp_customize->add_control( 'rock_star_news_ticker_page_'. $i .'', array(
		'active_callback' => 'rock_star_is_page_news_ticker_active',
		'label'           => esc_html__( 'Page', 'rock-star' ) . ' ' . $i ,
		'section'         => 'rock_star_news_ticker_settings',
		'settings'        => 'rock_star_theme_options[news_ticker_page_'. $i .']',
		'type'            => 'dropdown-pages',
	) );
}