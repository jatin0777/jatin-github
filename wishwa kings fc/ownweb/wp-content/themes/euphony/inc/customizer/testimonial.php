<?php
/**
 * Add Testimonial Settings in Customizer
 *
 * @package Euphony
*/

/**
 * Add testimonial options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function euphony_testimonial_options( $wp_customize ) {
    // Add note to Jetpack Testimonial Section
    euphony_register_option( $wp_customize, array(
            'name'              => 'euphony_jetpack_testimonial_cpt_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Euphony_Note_Control',
            'label'             => sprintf( esc_html__( 'For Testimonial Options for Euphonyazine Theme, go %1$shere%2$s', 'euphony' ),
                '<a href="javascript:wp.customize.section( \'euphony_testimonials\' ).focus();">',
                 '</a>'
            ),
           'section'            => 'jetpack_testimonials',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

    $wp_customize->add_section( 'euphony_testimonials', array(
            'panel'    => 'euphony_theme_options',
            'title'    => esc_html__( 'Testimonials', 'euphony' ),
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
            'name'              => 'euphony_testimonial_jetpack_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Euphony_Note_Control',
            'active_callback'   => 'euphony_is_ect_testimonial_inactive',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
            'label'             => sprintf( esc_html__( 'For Testimonial, install %1$sEssential Content Types%2$s Plugin with testimonial Type Enabled', 'euphony' ),
                '<a target="_blank" href="' . esc_url( $install_url ) . '">',
                '</a>'

            ),
           'section'            => 'euphony_testimonials',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

    euphony_register_option( $wp_customize, array(
            'name'              => 'euphony_testimonial_option',
            'default'           => 'disabled',
            'sanitize_callback' => 'euphony_sanitize_select',
            'active_callback'   => 'euphony_is_ect_testimonial_active',
            'choices'           => euphony_section_visibility_options(),
            'label'             => esc_html__( 'Enable on', 'euphony' ),
            'section'           => 'euphony_testimonials',
            'type'              => 'select',
            'priority'          => 1,
        )
    );

    euphony_register_option( $wp_customize, array(
            'name'              => 'euphony_testimonial_bg_image',
            'default'           => trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'assets/images/testimonial-bg.jpg',
            'sanitize_callback' => 'euphony_sanitize_image',
            'active_callback'   => 'euphony_is_testimonial_active',
            'custom_control'    => 'WP_Customize_Image_Control',
            'label'             => esc_html__( 'Background Image', 'euphony' ),
            'section'           => 'euphony_testimonials',
        )
    );

    euphony_register_option( $wp_customize, array(
            'name'              => 'euphony_testimonial_cpt_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Euphony_Note_Control',
            'active_callback'   => 'euphony_is_testimonial_active',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
			'label'             => sprintf( esc_html__( 'For CPT heading and sub-heading, go %1$shere%2$s', 'euphony' ),
                '<a href="javascript:wp.customize.section( \'jetpack_testimonials\' ).focus();">',
                '</a>'
            ),
            'section'           => 'euphony_testimonials',
            'type'              => 'description',
        )
    );

    euphony_register_option( $wp_customize, array(
            'name'              => 'euphony_testimonial_number',
            'default'           => '3',
            'sanitize_callback' => 'euphony_sanitize_number_range',
            'active_callback'   => 'euphony_is_testimonial_active',
            'label'             => esc_html__( 'Number of items', 'euphony' ),
            'section'           => 'euphony_testimonials',
            'type'              => 'number',
            'input_attrs'       => array(
                'style'             => 'width: 100px;',
                'min'               => 0,
            ),
        )
    );

    $number = get_theme_mod( 'euphony_testimonial_number', 3 );

    for ( $i = 1; $i <= $number ; $i++ ) {
        
        //for CPT
        euphony_register_option( $wp_customize, array(
                'name'              => 'euphony_testimonial_cpt_' . $i,
                'sanitize_callback' => 'euphony_sanitize_post',
                'active_callback'   => 'euphony_is_testimonial_active',
                'label'             => esc_html__( 'Testimonial', 'euphony' ) . ' ' . $i ,
                'section'           => 'euphony_testimonials',
                'type'              => 'select',
                'choices'           => euphony_generate_post_array( 'jetpack-testimonial' ),
            )
        );

    } // End for().
}
add_action( 'customize_register', 'euphony_testimonial_options' );

/**
 * Active Callback Functions
 */
if ( ! function_exists( 'euphony_is_testimonial_active' ) ) :
    /**
    * Return true if testimonial is active
    *
    * @since Euphony Pro 1.0
    */
    function euphony_is_testimonial_active( $control ) {
        $enable = $control->manager->get_setting( 'euphony_testimonial_option' )->value();

        //return true only if previwed page on customizer matches the type of content option selected
        return ( euphony_is_ect_testimonial_active( $control ) &&  euphony_check_section( $enable ) );
    }
endif;


if ( ! function_exists( 'euphony_is_ect_testimonial_inactive' ) ) :
    /**
    *
    * @since Euphony 1.0
    */
    function euphony_is_ect_testimonial_inactive( $control ) {
        return ! ( class_exists( 'Essential_Content_Jetpack_testimonial' ) || class_exists( 'Essential_Content_Pro_Jetpack_testimonial' ) );
    }
endif;

if ( ! function_exists( 'euphony_is_ect_testimonial_active' ) ) :
    /**
    *
    * @since Euphony 1.0
    */
    function euphony_is_ect_testimonial_active( $control ) {
        return ( class_exists( 'Essential_Content_Jetpack_testimonial' ) || class_exists( 'Essential_Content_Pro_Jetpack_testimonial' ) );
    }
endif;

if ( ! function_exists( 'euphony_is_testimonial_bg_active' ) ) :
    /**
    * Return true if background is set
    *
    * @since Euphony 1.0
    */
    function euphony_is_testimonial_bg_active( $control ) {
        $bg_image = $control->manager->get_setting( 'euphony_testimonial_bg_image' )->value();

        return ( euphony_is_testimonial_active( $control ) && '' !== $bg_image );
    }
endif;
