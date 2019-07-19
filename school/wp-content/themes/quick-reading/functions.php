<?php 
add_action( 'wp_enqueue_scripts', 'quick_reading_enqueue_styles' );
function quick_reading_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 


/** 
 * Color changes on logo (rest is in style.css)
 */
function quick_reading_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'writers_blogily_custom_header_args', array(
		'default-text-color'     => 'ddd',
		) ) );
}
add_action( 'after_setup_theme', 'quick_reading_custom_header_setup' );


/** 
 * New fonts
 */
function quick_reading_load_google_fonts() {
	wp_enqueue_style( 'quick-reading-google-fonts', 'http://fonts.googleapis.com/css?family=Lato:400,700' ); 
}
add_action( 'wp_enqueue_scripts', 'quick_reading_load_google_fonts' );


/** 
 * New customizer options
 */
function quick_reading_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'footer_settings', array(
		'title'      => __('Footer Settings','writers-blogily'),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
		) );
	$wp_customize->add_setting( 'footer_background', array(
		'default'           => '#181818',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background', array(
		'label'       => __( 'Background Color', 'quick-reading' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_background',
		) ) );

	$wp_customize->add_setting( 'footer_widget_headline', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_headline', array(
		'label'       => __( 'Widget Headline Color', 'quick-reading' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_widget_headline',
		) ) );
	$wp_customize->add_setting( 'footer_widget_border', array(
		'default'           => '#333',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_border', array(
		'label'       => __( 'Widget Border Color', 'quick-reading' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_widget_border',
		) ) );
	$wp_customize->add_setting( 'footer_widget_text', array(
		'default'           => '#a3a3a3',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_text', array(
		'label'       => __( 'Widget Text Color', 'quick-reading' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_widget_text',
		) ) );
	$wp_customize->add_setting( 'footer_widget_link', array(
		'default'           => '#c5c5c5',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_link', array(
		'label'       => __( 'Widget Link Color', 'quick-reading' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_widget_link',
		) ) );

	$wp_customize->add_setting( 'footer_copyright_link', array(
		'default'           => '#fab526',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_copyright_link', array(
		'label'       => __( 'Copyright Link Color', 'quick-reading' ),
		'section'     => 'footer_settings',
		'priority'   => 1,
		'settings'    => 'footer_copyright_link',
		) ) );

	$wp_customize->add_setting( 'footer_copyright_text', array(
		'default'           => '#dedede',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );


	$wp_customize->add_setting( 'sidebar_bg_colors', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_bg_colors', array(
		'label'       => __( 'Sidebar Background Color', 'quick-reading' ),
		'section'     => 'colors',
		'priority'   => 1,
		'settings'    => 'sidebar_bg_colors',
		) ) );
}
add_action( 'customize_register', 'quick_reading_customize_register' );



if(! function_exists('quick_reading_customize_register_output' ) ):
	function quick_reading_customize_register_output(){
		?>

		<style type="text/css">
		aside#secondary .widget { background: <?php echo esc_attr(get_theme_mod( 'sidebar_bg_colors')); ?>; }
	.footer-container, .footer-widgets-container { background: <?php echo esc_attr(get_theme_mod( 'footer_background')); ?>; }
		.footer-widgets-container h4, .footer-widgets-container h1, .footer-widgets-container h2, .footer-widgets-container h3, .footer-widgets-container h5, .footer-widgets-container h4 a, .footer-widgets-container th, .footer-widgets-container caption { color: <?php echo esc_attr(get_theme_mod( 'footer_widget_headline')); ?>; }
		.footer-widgets-container h4, .footer-widgets-container { border-color: <?php echo esc_attr(get_theme_mod( 'footer_widget_border')); ?>; }
		.footer-column *, .footer-column p, .footer-column li { color: <?php echo esc_attr(get_theme_mod( 'footer_widget_text')); ?>; }
		.footer-column a, .footer-menu li a { color: <?php echo esc_attr(get_theme_mod( 'footer_widget_link')); ?>; }
		.site-info a { color: <?php echo esc_attr(get_theme_mod( 'footer_copyright_link')); ?>; }
		.site-info { color: <?php echo esc_attr(get_theme_mod( 'footer_copyright_text')); ?>; }


		</style>
		<?php }
		add_action( 'wp_head', 'quick_reading_customize_register_output' );
		endif;
