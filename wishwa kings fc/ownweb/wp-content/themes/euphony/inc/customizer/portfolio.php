<?php
/**
 * Add Portfolio Settings in Customizer
 *
 * @package Euphony
 */

/**
 * Add portfolio options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function euphony_portfolio_options( $wp_customize ) {
	// Add note to Jetpack Portfolio Section
	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_jetpack_portfolio_cpt_note',
			'sanitize_callback' => 'sanitize_text_field',
			'custom_control'    => 'Euphony_Note_Control',
			'label'             => sprintf( esc_html__( 'For Portfolio Options for Euphony Theme, go %1$shere%2$s', 'euphony' ),
				 '<a href="javascript:wp.customize.section( \'euphony_portfolio\' ).focus();">',
				 '</a>'
			),
			'section'           => 'jetpack_portfolio',
			'type'              => 'description',
			'priority'          => 1,
		)
	);

	$wp_customize->add_section( 'euphony_portfolio', array(
			'panel'    => 'euphony_theme_options',
			'title'    => esc_html__( 'Portfolio', 'euphony' ),
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
            'name'              => 'euphony_portfolio_jetpack_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Euphony_Note_Control',
            'active_callback'   => 'euphony_is_ect_portfolio_inactive',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
            'label'             => sprintf( esc_html__( 'For Portfolio, install %1$sEssential Content Types%2$s Plugin with Portfolio Type Enabled', 'euphony' ),
                '<a target="_blank" href="' . esc_url( $install_url ) . '">',
                '</a>'

            ),
           'section'            => 'euphony_portfolio',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_portfolio_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'euphony_sanitize_select',
			'active_callback'   => 'euphony_is_ect_portfolio_active',
			'choices'           => euphony_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'euphony' ),
			'section'           => 'euphony_portfolio',
			'type'              => 'select',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_portfolio_cpt_note',
			'sanitize_callback' => 'sanitize_text_field',
			'custom_control'    => 'Euphony_Note_Control',
			'active_callback'   => 'euphony_is_portfolio_active',
			'label'             => sprintf( esc_html__( 'For CPT heading and sub-heading, go %1$shere%2$s', 'euphony' ),
				 '<a href="javascript:wp.customize.control( \'jetpack_portfolio_title\' ).focus();">',
				 '</a>'
			),
			'section'           => 'euphony_portfolio',
			'type'              => 'description',
		)
	);

	euphony_register_option( $wp_customize, array(
			'name'              => 'euphony_portfolio_number',
			'default'           => 5,
			'sanitize_callback' => 'euphony_sanitize_number_range',
			'active_callback'   => 'euphony_is_portfolio_active',
			'label'             => esc_html__( 'Number of items to show', 'euphony' ),
			'section'           => 'euphony_portfolio',
			'type'              => 'number',
			'input_attrs'       => array(
				'style'             => 'width: 100px;',
				'min'               => 0,
			),
		)
	);

	$number = get_theme_mod( 'euphony_portfolio_number', 5 );

	for ( $i = 1; $i <= $number ; $i++ ) {

		//for CPT
		euphony_register_option( $wp_customize, array(
				'name'              => 'euphony_portfolio_cpt_' . $i,
				'sanitize_callback' => 'euphony_sanitize_post',
				'active_callback'   => 'euphony_is_portfolio_active',
				'label'             => esc_html__( 'Portfolio', 'euphony' ) . ' ' . $i ,
				'section'           => 'euphony_portfolio',
				'type'              => 'select',
				'choices'           => euphony_generate_post_array( 'jetpack-portfolio' ),
			)
		);

	} // End for().
}
add_action( 'customize_register', 'euphony_portfolio_options' );

/**
 * Active Callback Functions
 */
if ( ! function_exists( 'euphony_is_portfolio_active' ) ) :
	/**
	* Return true if portfolio is active
	*
	* @since Euphony Pro 1.0
	*/
	function euphony_is_portfolio_active( $control ) {
		$enable = $control->manager->get_setting( 'euphony_portfolio_option' )->value();

		//return true only if previwed page on customizer matches the type of content option selected
		return ( euphony_is_ect_portfolio_active( $control ) &&  euphony_check_section( $enable ) );
	}
endif;

if ( ! function_exists( 'euphony_is_ect_portfolio_inactive' ) ) :
    /**
    *
    * @since Euphony 1.0
    */
    function euphony_is_ect_portfolio_inactive( $control ) {
        return ! ( class_exists( 'Essential_Content_Jetpack_Portfolio' ) || class_exists( 'Essential_Content_Pro_Jetpack_Portfolio' ) );
    }
endif;

if ( ! function_exists( 'euphony_is_ect_portfolio_active' ) ) :
    /**
    *
    * @since Euphony 1.0
    */
    function euphony_is_ect_portfolio_active( $control ) {
        return ( class_exists( 'Essential_Content_Jetpack_Portfolio' ) || class_exists( 'Essential_Content_Pro_Jetpack_Portfolio' ) );
    }
endif;

