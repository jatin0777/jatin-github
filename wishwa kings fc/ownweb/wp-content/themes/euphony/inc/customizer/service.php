<?php
/**
 * Services options
 *
 * @package Euphony Pro
 */

/**
 * Add services content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function euphony_service_options( $wp_customize ) {
	// Add note to Jetpack Testimonial Section
    euphony_register_option( $wp_customize, array(
            'name'              => 'euphony_service_jetpack_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Euphony_Note_Control',
            'label'             => sprintf( esc_html__( 'For all Services Options, go %1$shere%2$s', 'euphony' ),
                '<a href="javascript:wp.customize.section( \'euphony_service\' ).focus();">',
                 '</a>'
            ),
           'section'            => 'services',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

    $wp_customize->add_section( 'euphony_service', array(
			'title' => esc_html__( 'Services', 'euphony' ),
			'panel' => 'euphony_theme_options',
		)
	);

		$action = 'install-plugin';
	    $slug   = 'essential-content-types';

	    $install_url = wp_nonce_url(
	        add_query_arg(
	            array(
	                'action' => $action,
	                'plugin' => $slug
	            ),
	            admin_url( 'update.php' )
	        ),
	        $action . '_' . $slug
	    );

	    euphony_register_option( $wp_customize, array(
	            'name'              => 'euphony_service_jetpack_note',
	            'sanitize_callback' => 'sanitize_text_field',
	            'custom_control'    => 'Euphony_Note_Control',
	            'active_callback'   => 'euphony_is_ect_services_inactive',
	            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
	            'label'             => sprintf( esc_html__( 'For Services, install %1$sEssential Content Types%2$s Plugin with Service Type Enabled', 'euphony' ),
	                '<a target="_blank" href="' . esc_url( $install_url ) . '">',
	                '</a>'

	            ),
	           'section'            => 'euphony_service',
	            'type'              => 'description',
	            'priority'          => 1,
	        )
	    );

	// Add color scheme setting and control.
	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_service_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'euphony_sanitize_select',
			'active_callback'   => 'euphony_is_ect_services_active',
			'choices'           => euphony_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'euphony' ),
			'section'           => 'euphony_service',
			'type'              => 'select',
		)
	);

    euphony_register_option( $wp_customize, array(
            'name'              => 'euphony_service_cpt_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Euphony_Note_Control',
            'active_callback'   => 'euphony_is_services_active',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
			'label'             => sprintf( esc_html__( 'For CPT heading and sub-heading, go %1$shere%2$s', 'euphony' ),
                 '<a href="javascript:wp.customize.control( \'ect_service_title\' ).focus();">',
                 '</a>'
            ),
            'section'           => 'euphony_service',
            'type'              => 'description',
        )
    );

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_service_number',
			'default'           => 4,
			'sanitize_callback' => 'euphony_sanitize_number_range',
			'active_callback'   => 'euphony_is_services_active',
			'description'       => esc_html__( 'Save and refresh the page if No. of Services is changed (Max no of Services is 20)', 'euphony' ),
			'input_attrs'       => array(
				'style' => 'width: 100px;',
				'min'   => 0,
			),
			'label'             => esc_html__( 'No of items', 'euphony' ),
			'section'           => 'euphony_service',
			'type'              => 'number',
			'transport'         => 'postMessage',
		)
	);

	$number = get_theme_mod( 'euphony_service_number', 4 );

	//loop for services post content
	for ( $i = 1; $i <= $number ; $i++ ) {

		euphony_register_option( $wp_customize, array(
				'name'              => 'euphony_service_cpt_' . $i,
				'sanitize_callback' => 'euphony_sanitize_post',
				'active_callback'   => 'euphony_is_services_active',
				'label'             => esc_html__( 'Services', 'euphony' ) . ' ' . $i ,
				'section'           => 'euphony_service',
				'type'              => 'select',
                'choices'           => euphony_generate_post_array( 'ect-service' ),
			)
		);

	} // End for().
}
add_action( 'customize_register', 'euphony_service_options', 10 );

/** Active Callback Functions **/
if ( ! function_exists( 'euphony_is_services_active' ) ) :
	/**
	* Return true if services content is active
	*
	* @since Euphony Pro 1.0
	*/
	function euphony_is_services_active( $control ) {
		$enable = $control->manager->get_setting( 'euphony_service_option' )->value();

		//return true only if previewed page on customizer matches the type of content option selected
		return ( euphony_is_ect_services_active( $control ) &&  euphony_check_section( $enable ) );
	}
endif;

if ( ! function_exists( 'euphony_is_ect_services_inactive' ) ) :
    /**
    * Return true if service is active
    *
    * @since Euphony 1.0
    */
    function euphony_is_ect_services_inactive( $control ) {
        return ! ( class_exists( 'Essential_Content_Service' ) || class_exists( 'Essential_Content_Pro_Service' ) );
    }
endif;

if ( ! function_exists( 'euphony_is_ect_services_active' ) ) :
    /**
    * Return true if service is active
    *
    * @since Euphony 1.0
    */
    function euphony_is_ect_services_active( $control ) {
        return ( class_exists( 'Essential_Content_Service' ) || class_exists( 'Essential_Content_Pro_Service' ) );
    }
endif;

