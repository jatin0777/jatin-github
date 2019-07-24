<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function careerpress_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'careerpress' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function careerpress_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'careerpress' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'careerpress_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function careerpress_site_layout() {
        $careerpress_site_layout = array(
            'wide'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'careerpress_site_layout', $careerpress_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'careerpress_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function careerpress_selected_sidebar() {
        $careerpress_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'careerpress' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'careerpress' ),
        );

        $output = apply_filters( 'careerpress_selected_sidebar', $careerpress_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'careerpress_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function careerpress_global_sidebar_position() {
        $careerpress_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'careerpress_global_sidebar_position', $careerpress_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'careerpress_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function careerpress_sidebar_position() {
        $careerpress_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'careerpress_sidebar_position', $careerpress_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'careerpress_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function careerpress_pagination_options() {
        $careerpress_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'careerpress' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'careerpress' ),
        );

        $output = apply_filters( 'careerpress_pagination_options', $careerpress_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'careerpress_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function careerpress_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'careerpress' ),
            'off'       => esc_html__( 'Disable', 'careerpress' )
        );
        return apply_filters( 'careerpress_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'careerpress_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function careerpress_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'careerpress' ),
            'off'       => esc_html__( 'No', 'careerpress' )
        );
        return apply_filters( 'careerpress_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'careerpress_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function careerpress_sortable_sections() {
        $sections = array(
            'slider'    => esc_html__( 'Main Slider', 'careerpress' ),
            'service'   => esc_html__( 'Services', 'careerpress' ),
            'about'     => esc_html__( 'About Us', 'careerpress' ),
            'projects'  => esc_html__( 'Projects', 'careerpress' ),
            'blog'      => esc_html__( 'Blog', 'careerpress' ),
            'promotion' => esc_html__( 'Promotion', 'careerpress' ),
        );
        return apply_filters( 'careerpress_sortable_sections', $sections );
    }
endif;