<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function suitbuilder_widgets_init() {

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'suitbuilder' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );



    register_sidebar(array(
        'name'          => esc_html__( 'Footer Column One', 'suitbuilder' ),
        'id'            => 'footer-col-one',
        'description'   => esc_html__( 'Displays items on footer section.', 'suitbuilder' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
        
    register_sidebar(array(
        'name'          => esc_html__( 'Footer Column Two', 'suitbuilder' ),
        'id'            => 'footer-col-two',
        'description'   => esc_html__( 'Displays items on footer section.','suitbuilder' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
        
    register_sidebar(array(
        'name'          => esc_html__( 'Footer Column Three', 'suitbuilder' ),
        'id'            => 'footer-col-three',
        'description'   => esc_html__( 'Displays items on footer section.', 'suitbuilder' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
        
        
    register_sidebar(array(
        'name'          => esc_html__( 'Footer Column Four', 'suitbuilder' ),
        'id'            => 'footer-col-four',
        'description'   => esc_html__( 'Displays items on footer section.','suitbuilder' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
        
}
add_action( 'widgets_init', 'suitbuilder_widgets_init' );

