<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Careerpress
* @since Careerpress 1.0.0
*/

if ( ! function_exists( 'careerpress_about_title_partial' ) ) :
    // about title
    function careerpress_about_title_partial() {
        $options = careerpress_get_theme_options();
        return esc_html( $options['about_title'] );
    }
endif;

if ( ! function_exists( 'careerpress_about_btn_title_partial' ) ) :
    // about btn title
    function careerpress_about_btn_title_partial() {
        $options = careerpress_get_theme_options();
        return esc_html( $options['about_btn_title'] );
    }
endif;

if ( ! function_exists( 'careerpress_projects_title_partial' ) ) :
    // projects title
    function careerpress_projects_title_partial() {
        $options = careerpress_get_theme_options();
        return esc_html( $options['projects_title'] );
    }
endif;

if ( ! function_exists( 'careerpress_projects_sub_title_partial' ) ) :
    // projects sub title
    function careerpress_projects_sub_title_partial() {
        $options = careerpress_get_theme_options();
        return esc_html( $options['projects_sub_title'] );
    }
endif;

if ( ! function_exists( 'careerpress_blog_title_partial' ) ) :
    // blog title
    function careerpress_blog_title_partial() {
        $options = careerpress_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'careerpress_blog_sub_title_partial' ) ) :
    // blog sub title
    function careerpress_blog_sub_title_partial() {
        $options = careerpress_get_theme_options();
        return esc_html( $options['blog_sub_title'] );
    }
endif;

if ( ! function_exists( 'careerpress_promotion_btn_title_partial' ) ) :
    // promotion btn title
    function careerpress_promotion_btn_title_partial() {
        $options = careerpress_get_theme_options();
        return esc_html( $options['promotion_btn_title'] );
    }
endif;

if ( ! function_exists( 'careerpress_copyright_text_partial' ) ) :
    // copyright text
    function careerpress_copyright_text_partial() {
        $options = careerpress_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;
