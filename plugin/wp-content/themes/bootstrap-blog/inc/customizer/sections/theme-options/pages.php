<?php
/**
 * Pages Settings
 *
 * @package Bootstrap Blog
 */
add_action( 'customize_register', 'bootstrap_blog_customize_register_pages_section' );

function bootstrap_blog_customize_register_pages_section( $wp_customize ) {

  $wp_customize->add_section( 'bootstrap_blog_pages_sections', array(
    'title'          => esc_html__( 'Pages Section', 'bootstrap-blog' ),
    'description'    => esc_html__( 'Pages section :', 'bootstrap-blog' ),
    'panel'          => 'bootstrap_blog_theme_options_panel',
    'priority'       => 3,
  ) );

  $wp_customize->add_setting( 'pages_display_option', array(
      'sanitize_callback'     =>  'bootstrap_blog_sanitize_checkbox',
      'default'               =>  false
  ) );

  $wp_customize->add_control( new Bootstrap_Blog_Toggle_Control( $wp_customize, 'pages_display_option', array(
      'label' => esc_html__( 'Hide / Show','bootstrap-blog' ),
      'section' => 'bootstrap_blog_pages_sections',
      'settings' => 'pages_display_option',
      'type'=> 'toggle',
  ) ) );

  $wp_customize->add_setting( new Bootstrap_Blog_Repeater_Setting( $wp_customize, 'pages', array(
    'default' => '',
    'sanitize_callback' => array( 'Bootstrap_Blog_Repeater_Setting', 'sanitize_repeater_setting' ),
  ) ) );

  $page_query = get_pages();
  $pages = array();
  $pages[ '' ] = esc_attr__( "-- Select --", 'bootstrap-blog' );
  foreach ( $page_query as $page ) {
    $pages[ $page->ID ] = $page->post_title;
  }
  
  
    
  $wp_customize->add_control( new Bootstrap_Blog_Control_Repeater( $wp_customize, 'pages', array(
    'section' => 'bootstrap_blog_pages_sections',
    'settings'    => 'pages',
    'label'   => esc_html__( 'Pages :', 'bootstrap-blog' ),
    'row_label' => array(
      'type' => 'text',
      'value' => esc_html__( 'Page', 'bootstrap-blog' ),
    ),
    'button_label' => esc_attr__( 'New Page', 'bootstrap-blog' ),
    'fields' => array(
      'page' => array(
        'type'        => 'select',
        'default'     => '',
        'label'       => esc_html__( 'Select a page', 'bootstrap-blog' ),
        'choices' => $pages
      )
    )                   
  ) ) );

}