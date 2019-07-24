<?php
/**
 * corporate_zing Theme Customizer
 *
 * @package corporate_zing
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function corporate_zing_customize_register( $wp_customize ) {

	global $corporate_zingPostsPagesArray, $corporate_zingYesNo, $corporate_zingSliderType, $corporate_zingServiceLayouts, $corporate_zingAvailableCats, $corporate_zingBusinessLayoutType;

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'corporate_zing_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'corporate_zing_customize_partial_blogdescription',
		) );
	}
	
	$wp_customize->add_panel( 'corporate_zing_general', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('General Settings', 'corporate-zing'),
		'active_callback' => '',
	) );

	$wp_customize->get_section( 'title_tagline' )->panel = 'corporate_zing_general';
	$wp_customize->get_section( 'background_image' )->panel = 'corporate_zing_general';
	$wp_customize->get_section( 'background_image' )->title = __('Site background', 'corporate-zing');
	$wp_customize->get_section( 'header_image' )->panel = 'corporate_zing_general';
	$wp_customize->get_section( 'header_image' )->title = __('Header Settings', 'corporate-zing');
	$wp_customize->get_control( 'header_image' )->priority = 20;
	$wp_customize->get_control( 'header_image' )->active_callback = 'corporate_zing_show_wp_header_control';	
	$wp_customize->get_section( 'static_front_page' )->panel = 'corporate_zing_panel';
	$wp_customize->get_section( 'static_front_page' )->title = __('Select frontpage type', 'corporate-zing');
	$wp_customize->get_section( 'static_front_page' )->priority = 9;
	$wp_customize->remove_section('colors');
	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'background_color', 
			array(
				'label'      => __( 'Background Color', 'corporate-zing' ),
				'section'    => 'background_image',
				'priority'   => 9
			) ) 
	);
	//$wp_customize->remove_section('static_front_page');	
	//$wp_customize->remove_section('header_image');	

	/* Upgrade */	
	$wp_customize->add_section( 'corporate_zing_business_upgrade', array(
		'priority'       => 8,
		'capability'     => 'edit_theme_options',
		'title'      => __('Upgrade to PRO', 'corporate-zing'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'corporate_zing_show_sliderr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new corporate_zing_Customize_Control_Upgrade(
		$wp_customize,
		'corporate_zing_show_sliderr',
		array(
			'label'      => __( 'Show headerr?', 'corporate-zing' ),
			'settings'   => 'corporate_zing_show_sliderr',
			'priority'   => 10,
			'section'    => 'corporate_zing_business_upgrade',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''			
		)
	) );
	
	/* Usage guide */	
	$wp_customize->add_section( 'corporate_zing_business_usage', array(
		'priority'       => 9,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Usage Guide', 'corporate-zing'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'corporate_zing_show_sliderrr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new corporate_zing_Customize_Control_Guide(
		$wp_customize,
		'corporate_zing_show_sliderrr',
		array(

			'label'      => __( 'Show headerr?', 'corporate-zing' ),
			'settings'   => 'corporate_zing_show_sliderrr',
			'priority'   => 10,
			'section'    => 'corporate_zing_business_usage',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''				
		)
	) );
	
	/* Header Section */
	$wp_customize->add_setting( 'corporate_zing_show_slider',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_show_slider',
		array(
			'label'      => __( 'Show header?', 'corporate-zing' ),
			'settings'   => 'corporate_zing_show_slider',
			'priority'   => 10,
			'section'    => 'header_image',
			'type'    => 'select',
			'choices' => $corporate_zingYesNo,
		)
	) );	
	$wp_customize->add_setting( 'corporate_zing_header_type',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_slider_type_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_header_type',
		array(
			'label'      => __( 'Header type :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_header_type',
			'priority'   => 11,
			'section'    => 'header_image',
			'type'    => 'select',
			'choices' => $corporate_zingSliderType,
		)
	) );
	
	$wp_customize->add_setting( 'corporate_zing_slider_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_slider_cat',
		array(
			'label'      => __( 'Select a category for owl slider :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_slider_cat',
			'priority'   => 20,
			'section'    => 'header_image',
			'type'    => 'select',
			'choices' => $corporate_zingAvailableCats,
			'active_callback' => 'corporate_zing_show_owl_control'
		)
	) );	
	
	
	/* Business page panel */
	$wp_customize->add_panel( 'corporate_zing_panel', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'      => __('Home/Front Page Settings', 'corporate-zing'),
		'active_callback' => '',
	) );
	
	$wp_customize->add_section( 'corporate_zing_layout_selection', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('Select FrontPage Layout', 'corporate-zing'),
		'active_callback' => 'corporate_zing_front_page_sections',
		'panel'  => 'corporate_zing_panel',
	) );
	$wp_customize->add_setting( 'corporate_zing_layout_type',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_layout_type',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_layout_type',
		array(
			'label'      => __( 'Layout type :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_layout_type',
			'priority'   => 10,
			'section'    => 'corporate_zing_layout_selection',
			'type'    => 'select',
			'choices' => $corporate_zingBusinessLayoutType,
		)
	) );	
	
	$wp_customize->add_section( 'corporate_zing_layout_one', array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'title'      => __('One settings', 'corporate-zing'),
		'active_callback' => 'corporate_zing_front_page_sections',
		'panel'  => 'corporate_zing_panel',
	) );
	$wp_customize->add_setting( 'corporate_zing_one_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_one_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_one_welcome_post',
			'priority'   => 10,
			'section'    => 'corporate_zing_layout_one',
			'type'    => 'select',
			'choices' => $corporate_zingPostsPagesArray,
		)
	) );
	
	$wp_customize->add_setting( 'corporate_zing_one_services_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_one_services_cat',
		array(
			'label'      => __( 'Select a category :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_one_services_cat',
			'priority'   => 20,
			'section'    => 'corporate_zing_layout_one',
			'type'    => 'select',
			'choices' => $corporate_zingAvailableCats,
		)
	) );	
	
	$wp_customize->add_setting( 'corporate_zing_one_services_num',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_one_services_num',
		array(
			'label'      => __( 'Number of posts :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_one_services_num',
			'priority'   => 20,
			'section'    => 'corporate_zing_layout_one',
			'type'    => 'text',
		)
	) );	
	
	$wp_customize->add_section( 'corporate_zing_layout_two', array(
		'priority'       => 40,
		'capability'     => 'edit_theme_options',
		'title'      => __('Two settings', 'corporate-zing'),
		'active_callback' => 'corporate_zing_front_page_sections',
		'panel'  => 'corporate_zing_panel',
	) );
	$wp_customize->add_setting( 'corporate_zing_two_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_six_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_two_welcome_post',
			'priority'   => 10,
			'section'    => 'corporate_zing_layout_two',
			'type'    => 'select',
			'choices' => $corporate_zingPostsPagesArray,
		)
	) );
	
	$wp_customize->add_setting( 'corporate_zing_two_services_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_two_services_cat',
		array(
			'label'      => __( 'Select a category :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_two_services_cat',
			'priority'   => 20,
			'section'    => 'corporate_zing_layout_two',
			'type'    => 'select',
			'choices' => $corporate_zingAvailableCats,
		)
	) );	
	
	$wp_customize->add_setting( 'corporate_zing_two_services_num',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_two_services_num',
		array(
			'label'      => __( 'Number of posts :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_two_services_num',
			'priority'   => 20,
			'section'    => 'corporate_zing_layout_two',
			'type'    => 'text',
		)
	) );
	
	$wp_customize->add_setting( 'corporate_zing_two_portfolio_title',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_two_portfolio_title',
		array(
			'label'      => __( 'Portfolio section title :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_two_portfolio_title',
			'priority'   => 20,
			'section'    => 'corporate_zing_layout_two',
			'type'    => 'text',
		)
	) );	
	
	$wp_customize->add_setting( 'corporate_zing_two_portfolio_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_two_portfolio_cat',
		array(
			'label'      => __( 'Select a category :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_two_portfolio_cat',
			'priority'   => 20,
			'section'    => 'corporate_zing_layout_two',
			'type'    => 'select',
			'choices' => $corporate_zingAvailableCats,
		)
	) );	
	
	$wp_customize->add_setting( 'corporate_zing_two_portfolio_num',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_two_portfolio_num',
		array(
			'label'      => __( 'Number of posts :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_two_portfolio_num',
			'priority'   => 20,
			'section'    => 'corporate_zing_layout_two',
			'type'    => 'text',
		)
	) );

	$wp_customize->add_section( 'corporate_zing_layout_six', array(
		'priority'       => 40,
		'capability'     => 'edit_theme_options',
		'title'      => __('Six settings', 'corporate-zing'),
		'active_callback' => 'corporate_zing_front_page_sections',
		'panel'  => 'corporate_zing_panel',
	) );
	$wp_customize->add_setting( 'corporate_zing_six_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_six_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_six_welcome_post',
			'priority'   => 10,
			'section'    => 'corporate_zing_layout_six',
			'type'    => 'select',
			'choices' => $corporate_zingPostsPagesArray,
		)
	) );
	
	$wp_customize->add_setting( 'corporate_zing_six_services_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_six_services_cat',
		array(
			'label'      => __( 'Select a category :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_six_services_cat',
			'priority'   => 20,
			'section'    => 'corporate_zing_layout_six',
			'type'    => 'select',
			'choices' => $corporate_zingAvailableCats,
		)
	) );	
	
	$wp_customize->add_setting( 'corporate_zing_six_services_num',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_six_services_num',
		array(
			'label'      => __( 'Number of posts :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_six_services_num',
			'priority'   => 20,
			'section'    => 'corporate_zing_layout_six',
			'type'    => 'text',
		)
	) );




	$wp_customize->add_section( 'corporate_zing_layout_seven', array(
		'priority'       => 50,
		'capability'     => 'edit_theme_options',
		'title'      => __('Seven settings', 'corporate-zing'),
		'active_callback' => 'corporate_zing_front_page_sections',
		'panel'  => 'corporate_zing_panel',
	) );
	$wp_customize->add_setting( 'corporate_zing_seven_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_seven_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_seven_welcome_post',
			'priority'   => 10,
			'section'    => 'corporate_zing_layout_seven',
			'type'    => 'select',
			'choices' => $corporate_zingPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'corporate_zing_seven_work_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_seven_work_post',
		array(
			'label'      => __( 'Work post :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_seven_work_post',
			'priority'   => 20,
			'section'    => 'corporate_zing_layout_seven',
			'type'    => 'select',
			'choices' => $corporate_zingPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'corporate_zing_seven_portfolio_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_seven_portfolio_cat',
		array(
			'label'      => __( 'Select a category for portfolio:', 'corporate-zing' ),
			'settings'   => 'corporate_zing_seven_portfolio_cat',
			'priority'   => 30,
			'section'    => 'corporate_zing_layout_seven',
			'type'    => 'select',
			'choices' => $corporate_zingAvailableCats,
		)
	) );
	$wp_customize->add_setting( 'corporate_zing_seven_work_num',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_seven_work_num',
		array(
			'label'      => __( 'Number of posts :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_seven_work_num',
			'priority'   => 40,
			'section'    => 'corporate_zing_layout_two',
			'type'    => 'text',
		)
	) );	
	$wp_customize->add_setting( 'corporate_zing_seven_about_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_seven_about_post',
		array(
			'label'      => __( 'About post :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_seven_about_post',
			'priority'   => 50,
			'section'    => 'corporate_zing_layout_seven',
			'type'    => 'select',
			'choices' => $corporate_zingPostsPagesArray,
		)
	) );
	/* nine */
	$wp_customize->add_section( 'corporate_zing_layout_nine', array(
		'priority'       => 60,
		'capability'     => 'edit_theme_options',
		'title'      => __('Nine settings', 'corporate-zing'),
		'active_callback' => 'corporate_zing_front_page_sections',
		'panel'  => 'corporate_zing_panel',
	) );
	$wp_customize->add_setting( 'corporate_zing_nine_service_one_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_nine_service_one_post',
		array(
			'label'      => __( 'Service 1 :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_nine_service_one_post',
			'priority'   => 10,
			'section'    => 'corporate_zing_layout_nine',
			'type'    => 'select',
			'choices' => $corporate_zingPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'corporate_zing_nine_service_two_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_nine_service_two_post',
		array(
			'label'      => __( 'Service 2 :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_nine_service_two_post',
			'priority'   => 20,
			'section'    => 'corporate_zing_layout_nine',
			'type'    => 'select',
			'choices' => $corporate_zingPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'corporate_zing_nine_service_three_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_nine_service_three_post',
		array(
			'label'      => __( 'Service 3 :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_nine_service_three_post',
			'priority'   => 30,
			'section'    => 'corporate_zing_layout_nine',
			'type'    => 'select',
			'choices' => $corporate_zingPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'corporate_zing_nine_quote_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_nine_quote_post',
		array(
			'label'      => __( 'Quote', 'corporate-zing' ),
			'description' => __( 'Select a post/page you want to show in quote section', 'corporate-zing' ),
			'settings'   => 'corporate_zing_nine_quote_post',
			'priority'   => 40,
			'section'    => 'corporate_zing_layout_nine',
			'type'    => 'select',
			'choices' => $corporate_zingPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'corporate_zing_nine_about_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_nine_about_post',
		array(
			'label'      => __( 'About', 'corporate-zing' ),
			'description' => __( 'Select a post/page you want to show in about section', 'corporate-zing' ),
			'settings'   => 'corporate_zing_nine_about_post',
			'priority'   => 50,
			'section'    => 'corporate_zing_layout_nine',
			'type'    => 'select',
			'choices' => $corporate_zingPostsPagesArray,
		)
	) );
	
	$wp_customize->add_setting(
		'corporate_zing_nine_award_one', array(
		'default'        => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'corporate_zing_nine_award_one',
			array(
				'label'    => __( 'Award One', 'corporate-zing' ),
				'description' => '',
				'section'  => 'corporate_zing_layout_nine',
				'priority'   => 60,
			)
		)
	);
	$wp_customize->add_setting(
		'corporate_zing_nine_award_two', array(
		'default'        => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'corporate_zing_nine_award_two',
			array(
				'label'    => __( 'Award Two', 'corporate-zing' ),
				'description' => '',
				'section'  => 'corporate_zing_layout_nine',
				'priority'   => 70,
			)
		)
	);
	$wp_customize->add_setting(
		'corporate_zing_nine_award_three', array(
		'default'        => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'corporate_zing_nine_award_three',
			array(
				'label'    => __( 'Award Three', 'corporate-zing' ),
				'description' => '',
				'section'  => 'corporate_zing_layout_nine',
				'priority'   => 80,
			)
		)
	);
	$wp_customize->add_setting(
		'corporate_zing_nine_award_four', array(
		'default'        => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	));
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'corporate_zing_nine_award_four',
			array(
				'label'    => __( 'Award Four', 'corporate-zing' ),
				'description' => '',
				'section'  => 'corporate_zing_layout_nine',
				'priority'   => 90,
			)
		)
	);	
	
	$wp_customize->add_section( 'corporate_zing_layout_wooone', array(
		'priority'       => 100,
		'capability'     => 'edit_theme_options',
		'title'      => __('Woo One settings', 'corporate-zing'),
		'active_callback' => 'corporate_zing_front_page_sections',
		'panel'  => 'corporate_zing_panel',
	) );

	$wp_customize->add_setting( 'corporate_zing_wooone_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_wooone_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_wooone_welcome_post',
			'priority'   => 10,
			'section'    => 'corporate_zing_layout_wooone',
			'type'    => 'select',
			'choices' => $corporate_zingPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'corporate_zing_wooone_latest_heading',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_wooone_latest_heading',
		array(
			'label'      => __( 'Products Heading :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_wooone_latest_heading',
			'priority'   => 20,
			'section'    => 'corporate_zing_layout_wooone',
			'type'    => 'text',
		)
	) );
	$wp_customize->add_setting( 'corporate_zing_wooone_latest_text',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_wooone_latest_text',
		array(
			'label'      => __( 'Products Text :', 'corporate-zing' ),
			'settings'   => 'corporate_zing_wooone_latest_text',
			'priority'   => 30,
			'section'    => 'corporate_zing_layout_wooone',
			'type'    => 'text',
		)
	) );	


	$wp_customize->add_section( 'corporate_zing_quote', array(
		'priority'       => 110,
		'capability'     => 'edit_theme_options',
		'title'      => __('Quote Settings', 'corporate-zing'),
		'active_callback' => '',
		'panel'  => 'corporate_zing_general',
	) );
	$wp_customize->add_setting( 'corporate_zing_show_quote',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_show_quote',
		array(
			'label'      => __( 'Show quote?', 'corporate-zing' ),
			'settings'   => 'corporate_zing_show_quote',
			'priority'   => 10,
			'section'    => 'corporate_zing_quote',
			'type'    => 'select',
			'choices' => $corporate_zingYesNo,
		)
	) );
	$wp_customize->add_setting( 'corporate_zing_quote_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_quote_post',
		array(
			'label'      => __( 'Select post', 'corporate-zing' ),
			'description' => __( 'Select a post/page you want to show in quote section', 'corporate-zing' ),
			'settings'   => 'corporate_zing_quote_post',
			'priority'   => 11,
			'section'    => 'corporate_zing_quote',
			'type'    => 'select',
			'choices' => $corporate_zingPostsPagesArray,
		)
	) );	
	
	$wp_customize->add_section( 'corporate_zing_social', array(
		'priority'       => 120,
		'capability'     => 'edit_theme_options',
		'title'      => __('Social Settings', 'corporate-zing'),
		'active_callback' => '',
		'panel'  => 'corporate_zing_general',
	) );	
	$wp_customize->add_setting( 'corporate_zing_show_social',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'corporate_zing_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'corporate_zing_show_social',
		array(
			'label'      => __( 'Show social?', 'corporate-zing' ),
			'settings'   => 'corporate_zing_show_social',
			'priority'   => 10,
			'section'    => 'corporate_zing_social',
			'type'    => 'select',
			'choices' => $corporate_zingYesNo,
		)
	) );
	$wp_customize->add_setting( 'corporate_zing_facebook',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'corporate_zing_facebook', array(
	  'type' => 'text',
	  'section' => 'corporate_zing_social', // Add a default or your own section
	  'label' => __( 'Facebook', 'corporate-zing' ),
	  'description' => __( 'Enter your facebook url.', 'corporate-zing' ),
	) );
	$wp_customize->add_setting( 'corporate_zing_flickr',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'corporate_zing_flickr', array(
	  'type' => 'text',
	  'section' => 'corporate_zing_social', // Add a default or your own section
	  'label' => __( 'Flickr', 'corporate-zing' ),
	  'description' => __( 'Enter your flickr url.', 'corporate-zing' ),
	) );
	$wp_customize->add_setting( 'corporate_zing_gplus',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'corporate_zing_gplus', array(
	  'type' => 'text',
	  'section' => 'corporate_zing_social', // Add a default or your own section
	  'label' => __( 'Gplus', 'corporate-zing' ),
	  'description' => __( 'Enter your gplus url.', 'corporate-zing' ),
	) );
	$wp_customize->add_setting( 'corporate_zing_linkedin',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'corporate_zing_linkedin', array(
	  'type' => 'text',
	  'section' => 'corporate_zing_social', // Add a default or your own section
	  'label' => __( 'Linkedin', 'corporate-zing' ),
	  'description' => __( 'Enter your linkedin url.', 'corporate-zing' ),
	) );
	$wp_customize->add_setting( 'corporate_zing_reddit',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'corporate_zing_reddit', array(
	  'type' => 'text',
	  'section' => 'corporate_zing_social', // Add a default or your own section
	  'label' => __( 'Reddit', 'corporate-zing' ),
	  'description' => __( 'Enter your reddit url.', 'corporate-zing' ),
	) );
	$wp_customize->add_setting( 'corporate_zing_stumble',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'corporate_zing_stumble', array(
	  'type' => 'text',
	  'section' => 'corporate_zing_social', // Add a default or your own section
	  'label' => __( 'Stumble', 'corporate-zing' ),
	  'description' => __( 'Enter your stumble url.', 'corporate-zing' ),
	) );
	$wp_customize->add_setting( 'corporate_zing_twitter',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'corporate_zing_twitter', array(
	  'type' => 'text',
	  'section' => 'corporate_zing_social', // Add a default or your own section
	  'label' => __( 'Twitter', 'corporate-zing' ),
	  'description' => __( 'Enter your twitter url.', 'corporate-zing' ),
	) );	
	
}
add_action( 'customize_register', 'corporate_zing_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function corporate_zing_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function corporate_zing_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function corporate_zing_customize_preview_js() {
	wp_enqueue_script( 'corporate_zing-customizer', esc_url( get_template_directory_uri() ) . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'corporate_zing_customize_preview_js' );

require get_template_directory() . '/inc/variables.php';

function corporate_zing_sanitize_yes_no_setting( $value ){
	global $corporate_zingYesNo;
    if ( ! array_key_exists( $value, $corporate_zingYesNo ) ){
        $value = 'select';
	}
    return $value;	
}

function corporate_zing_sanitize_post_selection( $value ){
	global $corporate_zingPostsPagesArray;
    if ( ! array_key_exists( $value, $corporate_zingPostsPagesArray ) ){
        $value = 'select';
	}
    return $value;	
}

function corporate_zing_front_page_sections(){
	
	$value = false;
	
	if( 'page' == get_option( 'show_on_front' ) ){
		$value = true;
	}
	
	return $value;
	
}

function corporate_zing_show_wp_header_control(){
	
	$value = false;
	
	if( 'header' == get_theme_mod( 'corporate_zing_header_type' ) ){
		$value = true;
	}
	
	return $value;
	
}

function corporate_zing_show_header_one_control(){
	
	$value = false;
	
	if( 'header-one' == get_theme_mod( 'corporate_zing_header_type' ) ){
		$value = true;
	}
	
	return $value;
	
}

function corporate_zing_show_owl_control(){
	
	$value = false;
	
	if( 'owl' == get_theme_mod( 'corporate_zing_header_type' ) || 'select' == get_theme_mod( 'corporate_zing_header_type' ) || '' == get_theme_mod( 'corporate_zing_header_type' ) ){
		$value = true;
	}
	
	return $value;
	
}

function corporate_zing_sanitize_slider_type_setting( $value ){

	global $corporate_zingSliderType;
    if ( ! array_key_exists( $value, $corporate_zingSliderType ) ){
        $value = 'select';
	}
    return $value;	
	
}

function corporate_zing_sanitize_cat_setting( $value ){
	
	global $corporate_zingAvailableCats;
	
	if( ! array_key_exists( $value, $corporate_zingAvailableCats ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

function corporate_zing_sanitize_layout_type( $value ){
	
	global $corporate_zingBusinessLayoutType;
	
	if( ! array_key_exists( $value, $corporate_zingBusinessLayoutType ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

add_action( 'customize_register', 'corporate_zing_load_customize_classes', 0 );
function corporate_zing_load_customize_classes( $wp_customize ) {
	
	class corporate_zing_Customize_Control_Upgrade extends WP_Customize_Control {

		public $type = 'corporate_zing-upgrade';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			//$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="corporate_zing-upgrade-container" class="corporate_zing-upgrade-container">

				<ul>
					<li><?php _e( 'More sliders', 'corporate-zing' ) ?></li>
					<li><?php _e( 'More layouts', 'corporate-zing' ) ?></li>
					<li><?php _e( 'Color customization', 'corporate-zing' ) ?></li>
					<li><?php _e( 'Font customization', 'corporate-zing' ) ?></li>
				</ul>

				<p>
					<a href="https://www.themealley.com/business/"><?php _e( 'Upgrade', 'corporate-zing' ) ?></a>
				</p>
									
			</div><!-- .corporate_zing-upgrade-container -->
			
		<?php }	
		
	}
	
	class corporate_zing_Customize_Control_Guide extends WP_Customize_Control {

		public $type = 'corporate_zing-guide';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			//$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="corporate_zing-upgrade-container" class="corporate_zing-upgrade-container">

				<ol>
					<li><?php _e( 'Select \'A static page\' for "your homepage displays" in \'select frontpage type\' section of \'Home/Front Page settings\' tab.', 'corporate-zing' ) ?></li>
					<li><?php _e( 'Enter details for various section like header, welcome, services, quote, social sections.', 'corporate-zing' ) ?></li>
				</ol>
									
			</div><!-- .corporate_zing-upgrade-container -->
			
		<?php }	
		
	}

	$wp_customize->register_control_type( 'corporate_zing_Customize_Control_Upgrade' );
	$wp_customize->register_control_type( 'corporate_zing_Customize_Control_Guide' );
	
	
}