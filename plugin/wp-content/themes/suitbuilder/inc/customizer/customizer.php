<?php
/**
 * suitbuilder Theme Customizer
 *
 * @package suitbuilder theme
 * @subpackage suitbuilder
 * @since suitbuilder 1.0.0
 */

/*Define Url for including css and js*/
if ( !defined( 'SUITBUILDER_CUSTOMIZER_URL' ) ) {
    define( 'SUITBUILDER_CUSTOMIZER_URL', trailingslashit( get_template_directory_uri() ) . 'inc/frameworks/suitbuilder-customizer/' );
}

/*Define path for including php files*/
if ( !defined( 'SUITBUILDER_CUSTOMIZER_PATH' ) ) {
    define( 'SUITBUILDER_CUSTOMIZER_PATH', trailingslashit( get_template_directory() ) . 'inc/frameworks/suitbuilder-customizer/' );
}

/*define constant for suitbuilder customizer name*/
if(!defined('SUITBUILDER_CUSTOMIZER_NAME') ){
    define( 'SUITBUILDER_CUSTOMIZER_NAME', 'suitbuilder_options' );
}

/**
 * reset options
 * @param  array $reset_options
 * @return void
 *
 * @since suitbuilder 1.0.0
 */
if ( ! function_exists( 'suitbuilder_reset_options' ) ) :
    function suitbuilder_reset_options( $reset_options ) {
        set_theme_mod( SUITBUILDER_CUSTOMIZER_NAME, $reset_options );
    }
endif;

// Suitbuilder All defaults value
require get_template_directory() . '/inc/customizer/defaults.php';

//suitbuilder Font family
require get_template_directory() . '/inc/customizer/fonts-array.php';

/**
 * Customizer framework added.
*/
require get_template_directory() . '/inc/frameworks/suitbuilder-customizer/suitbuilder-customizer.php';


global $suitbuilder_panels;
global $suitbuilder_sections;
global $suitbuilder_settings_controls;
global $suitbuilder_repeated_settings_controls;
global $suitbuilder_defaults;

$suitbuilder_defaults = suitbuilder_all_defalts_values(); 

/******************************************
Modify Theme Option Section Options
 *******************************************/
require get_template_directory() . '/inc/customizer/theme-options/all-panels.php';

/*Resetting all Values*/
/**
 * Reset color settings to default
 *
 * @since suitbuilder 1.0.0
 */
global $suitbuilder_customizer_defaults;

$suitbuilder_customizer_defaults['suitbuilder-customizer-reset-settings'] = '';
if ( ! function_exists( 'suitbuilder_customizer_reset' ) ) :
    function suitbuilder_customizer_reset( ) {
        global $suitbuilder_customizer_saved_values;
        $suitbuilder_customizer_saved_values = suitbuilder_get_all_options();
        if ( $suitbuilder_customizer_saved_values['suitbuilder-customizer-reset-settings'] == 1 ) {
            global $suitbuilder_customizer_defaults;
            /*getting fields*/
            $suitbuilder_customizer_defaults['suitbuilder-customizer-reset-settings'] = '';
            /*resetting fields*/
            suitbuilder_reset_options( $suitbuilder_customizer_defaults );
        }
        else {
            return '';
        }
    }
endif;
add_action( 'customize_save_after','suitbuilder_customizer_reset' );

//create section for reset option
$suitbuilder_sections['suitbuilder-customizer-reset'] = array(
        'priority'       => 999,
        'title'          => esc_html__( 'Reset All Options', 'suitbuilder' )
);

//setting control for customizer reset option
$suitbuilder_settings_controls['suitbuilder-customizer-reset-settings'] = array(
    'setting' =>     array(
        'default'              => $suitbuilder_customizer_defaults['suitbuilder-customizer-reset-settings'],
        'transport'            => 'postmessage',
    ),
    'control' => array(
        'label'                 =>  esc_html__( 'Reset All Options', 'suitbuilder' ),
        'description'           =>  esc_html__( 'Caution: This will reset all options to default. Publish the changes and Refresh the page to view the changes. ', 'suitbuilder' ),
        'section'               => 'suitbuilder-customizer-reset',
        'type'                  => 'checkbox',
        'priority'              => 10,
        'active_callback'       => ''
    )
);

/******************************************
Additional Css
 *******************************************/
$suitbuilder_sections['custom_css'] = array(
    'title'          => esc_html__( 'Additional CSS', 'suitbuilder' ),
    'priority'       => 400,
);

$suitbuilder_customizer_args = array(
    'panels'            => $suitbuilder_panels, /*always use key panels */
    'sections'          => $suitbuilder_sections,/*always use key sections*/
    'settings_controls' => $suitbuilder_settings_controls,/*always use key settings_controls*/
    'repeated_settings_controls' => $suitbuilder_repeated_settings_controls,/*always use key sections*/
);

/*registering panel section setting and control start*/
function suitbuilder_add_panels_sections_settings() {
    global $suitbuilder_customizer_args;
    return $suitbuilder_customizer_args;
}
add_filter( 'suitbuilder_customizer_panels_sections_settings', 'suitbuilder_add_panels_sections_settings' );
/*registering panel section setting and control end*/

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function suitbuilder_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_section('header_image')->title           =  esc_html__( 'Inner Header Image','suitbuilder');
    $wp_customize->get_section('header_image')->panel           =  'suitbuilder-all-panels';
    $wp_customize->get_section('header_image')->priority        =  30;
    $wp_customize->get_section('title_tagline')->panel          =  'suitbuilder-all-panels';
    $wp_customize->get_section('title_tagline')->priority       =  5;

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'suitbuilder_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description a',
                'render_callback' => 'suitbuilder_customize_partial_blogdescription',
            )
        );

        //suitbuilder top bar phone
        $wp_customize->selective_refresh->add_partial(
            'suitbuilder_options[suitbuilder-phone-top-header-bar]',
            array(
                'selector'  => '.rt-top-list li #phone',
                'render_callback' => 'suitbuilder_customize_partial_topbar_phone'
            )
        );

        //suitbuilder top bar email
        $wp_customize->selective_refresh->add_partial(
            'suitbuilder_options[suitbuilder-email-top-header-bar]',
            array(
                'selector'  => '.rt-top-list li #email',
                'render_callback' => 'suitbuilder_customize_partial_topbar_email'
            )
        );


        //suitbuilder top bar address
        $wp_customize->selective_refresh->add_partial(
            'suitbuilder_options[suitbuilder-address-top-header-bar]',
            array(
                'selector'  => '.rt-top-list li #address',
                'render_callback' => 'suitbuilder_customize_partial_topbar_address'
            )
        );

        //suitbuilder top bar address
        $wp_customize->selective_refresh->add_partial(
            'suitbuilder_options[suitbuilder-top-header-bar-bg-color]',
            array(
                'selector'  => '.header-top',
                'render_callback' => 'suitbuilder_customize_partial_topbar_bg_color'
            )
        );

    //** ================================ Header Section ===================== **//
        //suitbuilder header button text
        $wp_customize->selective_refresh->add_partial(
            'suitbuilder_options[suitbuilder-main-header-button-text]',
            array(
                'selector'  => '#header-btn',
                'render_callback'   => 'suitbuilder_customize_partial_hedaer_button_text'
            )
        );

        //footer copy right text
        $wp_customize->selective_refresh->add_partial(
            'suitbuilder_options[suitbuilder-copyright-text]',
            array(
                'selector'  => '#themecopy',
                'render_callback' => 'suitbuilder_customize_partial_footer_copyright'
            )
        );

        //footer copy right link
        $wp_customize->selective_refresh->add_partial(
            'suitbuilder_options[suitbuilder-footer-credit-link]',
            array(
                'selector'  => '#themename',
                'render_callback' => 'suitbuilder_customize_partial_footer_theme_link'
            )
        );
    }

}
add_action( 'customize_register', 'suitbuilder_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function suitbuilder_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function suitbuilder_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/*render callback for top header */
// for email
function suitbuilder_customize_partial_topbar_phone(){
    return  get_theme_mod('suitbuilder-phone-top-header-bar');
    
}

// for email
function suitbuilder_customize_partial_topbar_email(){
    return  get_theme_mod('suitbuilder-email-top-header-bar');
    
}

// for address
function suitbuilder_customize_partial_topbar_address(){
    return  get_theme_mod('suitbuilder-address-top-header-bar');
    
}

// for address
function suitbuilder_customize_partial_topbar_bg_color(){
    return  get_theme_mod('suitbuilder-top-header-bar-bg-color');
    
}


/*render callback for header button text */
function suitbuilder_customize_partial_hedaer_button_text(){
    return  get_theme_mod('suitbuilder-main-header-button-text');
    
}

/*render callback for copyright text */
function suitbuilder_customize_partial_footer_copyright(){
    return  get_theme_mod('suitbuilder-copyright-text');
    
}

/*render callback for footer creadit link */
function suitbuilder_customize_partial_footer_theme_link(){
    return  get_theme_mod('suitbuilder-footer-credit-link');
    
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function suitbuilder_customize_preview_js() {
    wp_enqueue_script( 'suitbuilder_customizer', get_template_directory_uri() . '/assets/src/js/customizer.js', array( 'jquery','customize-preview' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'suitbuilder_customize_preview_js' );



/**
 * get all saved options
 * @param  null
 * @return array saved options
 *
 * @since suitbuilder 1.0.0
 */
if ( ! function_exists( 'suitbuilder_get_all_options' ) ) :
    function suitbuilder_get_all_options( $merge_default = 0 ) {
        $suitbuilder_customizer_saved_values = suitbuilder_customizer_get_all_values( SUITBUILDER_CUSTOMIZER_NAME );
        if( 1 == $merge_default ){
            global $suitbuilder_defaults;
            if(is_array( $suitbuilder_customizer_saved_values )){
                $suitbuilder_customizer_saved_values = array_merge($suitbuilder_defaults, $suitbuilder_customizer_saved_values );
            }
            else{
                $suitbuilder_customizer_saved_values = $suitbuilder_defaults;
            }
        }
        return $suitbuilder_customizer_saved_values;
    }
endif;

