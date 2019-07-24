<?php
/**
 * Social Media Sections
 *
 * @package Bootstrap Blog
 */
add_action( 'customize_register', 'bootstrap_blog_social_media_sections' );

function bootstrap_blog_social_media_sections( $wp_customize ) {

	$wp_customize->add_section( 'bootstrap_blog_social_media_sections', array(
	    'title'          => esc_html__( 'Social Media', 'bootstrap-blog' ),
	    'description'    => esc_html__( 'Social Media', 'bootstrap-blog' ),
	    'priority'       => 2,
	    'panel'			 => 'bootstrap_blog_general_panel',
	) );

	$wp_customize->add_setting( new Bootstrap_Blog_Repeater_Setting( $wp_customize, 'bootstrap_blog_social_media', array(
        'default'     => '',
		'sanitize_callback' => array( 'Bootstrap_Blog_Repeater_Setting', 'sanitize_repeater_setting' ),
    ) ) );
    
    $wp_customize->add_control( new Bootstrap_Blog_Control_Repeater( $wp_customize, 'bootstrap_blog_social_media', array(
		'section' => 'bootstrap_blog_social_media_sections',
		'settings'    => 'bootstrap_blog_social_media',
		'label'	  => esc_html__( 'Social Links', 'bootstrap-blog' ),
		'fields' => array(
			'social_media_title' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Social Media Title', 'bootstrap-blog' ),
				'description' => esc_html__( 'This will be the label.', 'bootstrap-blog' ),
				'default'     => '',
			),
			'social_media_class' => array(
				'type'        => 'text',
				'label'       => esc_html__( 'Social Media Class', 'bootstrap-blog' ),
				'default'     => '',
			),
			'social_media_link' => array(
				'type'      => 'url',
				'label'     => esc_html__( 'Social Media Links', 'bootstrap-blog' ),
		        'default'   => '',
			),			
		),
        'row_label' => array(
			'type'  => 'field',
			'value' => esc_html__('Social Media', 'bootstrap-blog' ),
			'field' => 'social_media_title',
		),                        
	) ) );
	
}