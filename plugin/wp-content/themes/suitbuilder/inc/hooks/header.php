<?php

if ( ! function_exists( 'suitbuilder_set_global' ) ) :
/**
 * Setting global values for all saved customizer values
 *
 * @since suitbuilder 1.0.0
 *
 * @param null
 * @return null
 *
 */
function suitbuilder_set_global() {
    /*Getting saved values start*/
    $GLOBALS['suitbuilder_customizer_all_values'] = suitbuilder_get_all_options(1);
}
endif;
add_action( 'suitbuilder_action_before_head', 'suitbuilder_set_global', 0 );

if ( ! function_exists( 'suitbuilder_doctype' ) ) :
/**
 * Doctype Declaration
 *
 * @since suitbuilder 1.0.0
 *
 * @param null
 * @return null
 *
 */
function suitbuilder_doctype() {
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
<?php
}
endif;
add_action( 'suitbuilder_action_before_head', 'suitbuilder_doctype', 10 );

if ( ! function_exists( 'suitbuilder_before_wp_head' ) ) :
/**
 * Before wp head codes
 *
 * @since suitbuilder 1.0.0
 *
 * @param null
 * @return null
 *
 */
function suitbuilder_before_wp_head() {
    ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'/>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>

<?php
}
endif;
add_action( 'suitbuilder_action_before_wp_head', 'suitbuilder_before_wp_head', 10 );

if( ! function_exists( 'suitbuilder_default_layout' ) ) :
    /**
     * suitbuilder default layout function
     *
     * @since  suitbuilder 1.0.0
     *
     * @param int
     * @return string
     */
    function suitbuilder_default_layout( $post_id = null ){

        global $suitbuilder_customizer_all_values,$post;
        $suitbuilder_default_layout = $suitbuilder_customizer_all_values['suitbuilder-default-layout'];
        if( is_home()){
            $post_id = get_option( 'page_for_posts' );
        }
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
        $suitbuilder_default_layout_meta = get_post_meta( $post_id, 'suitbuilder-default-layout', true );

        if( false != $suitbuilder_default_layout_meta ) {
            $suitbuilder_default_layout = $suitbuilder_default_layout_meta;
        }
        return $suitbuilder_default_layout;
    }
endif;

if ( ! function_exists( 'suitbuilder_body_class' ) ) :
/**
 * add body class
 *
 * @since suitbuilder 1.0.0
 *
 * @param null
 * @return null
 *
 */
function suitbuilder_body_class( $suitbuilder_body_classes ) {
    global $suitbuilder_customizer_all_values;    

    if(  1 == $suitbuilder_customizer_all_values['suitbuilder-scroll-fixed-main-header'] ){
        $sticky_header = 'sticky-header';
    }else{
        $sticky_header = '';
    } 


    //full site layout
    if( 'wide-layout' == $suitbuilder_customizer_all_values['suitbuilder-site-layout-test'] ){
        $site_layout    = 'wide-site-layout';
    }elseif( 'boxed-layout' == $suitbuilder_customizer_all_values['suitbuilder-site-layout-test'] ){
        $site_layout    = 'boxed-site-layout';
    }else{
        $site_layout   = '';
    }

    //blog layout
    if( 'blog-list' == $suitbuilder_customizer_all_values['suitbuilder-latest-blog-layout'] ){
        $blog_layout    = 'blog-style-list';
    }else{
        $blog_layout    = 'blog-style-grid';
    }

    //blog section order
    if( 'blog-title-img-content' == $suitbuilder_customizer_all_values['suitbuilder-archive-blog-order']  ){
        $blog_post_order    = 'blog-title-img-content';
    }elseif('blog-img-title-content' == $suitbuilder_customizer_all_values['suitbuilder-archive-blog-order']){
        $blog_post_order    = 'blog-img-title-content';
    }else{
        $blog_post_order    = 'blog-content-img-title';
    } 


    $suitbuilder_default_layout = suitbuilder_default_layout();
    if( !empty( $suitbuilder_default_layout ) ){
        if( 'left-sidebar' == $suitbuilder_default_layout ){
            $suitbuilder_body_classes[] = 'has-sidebar left-sidebar' . ' ' .$sticky_header  . ' ' . $site_layout . ' ' . $blog_layout . ' ' . $blog_post_order;
        }
        elseif( 'right-sidebar' == $suitbuilder_default_layout ){ 
            $suitbuilder_body_classes[] = 'has-sidebar right-sidebar' . ' ' .$sticky_header  . ' ' . $site_layout . ' ' . $blog_layout. ' ' . $blog_post_order;
        }

        elseif( 'no-sidebar' == $suitbuilder_default_layout ){
            $suitbuilder_body_classes[] = 'no-sidebar' . ' ' .$sticky_header  . ' ' . $site_layout . ' ' . $blog_layout. ' ' . $blog_post_order;
        }
        
        else{
            $suitbuilder_body_classes[] = 'has-sidebar right-sidebar'. ' '.$sticky_header . ' ' . $site_layout . ' ' . $blog_layout  . ' ' . $blog_post_order;
        }
    }
    else{
        $suitbuilder_body_classes[] = 'has-sidebar right-sidebar' . ' ' .$sticky_header . ' ' . $site_layout . ' ' . $blog_layout  . ' ' . $blog_post_order;
    }

    return $suitbuilder_body_classes;

}
endif;
add_filter( 'body_class', 'suitbuilder_body_class', 10, 1);

if ( ! function_exists( 'suitbuilder_before_page_start' ) ) :
/**
 * intro loader
 *
 * @since suitbuilder 1.0.0
 *
 * @param null
 * @return null
 *
 */
function suitbuilder_before_page_start() {
    global $suitbuilder_customizer_all_values;
    /*intro loader*/
}
endif;
add_action( 'suitbuilder_action_before', 'suitbuilder_before_page_start', 10 );

if ( ! function_exists( 'suitbuilder_page_start' ) ) :
/**
 * page start
 *
 * @since suitbuilder 1.0.0
 *
 * @param null
 * @return null
 *
 */
function suitbuilder_page_start() {
?>
    <div id="page" class="site clearfix">
<?php
}
endif;
add_action( 'suitbuilder_action_before', 'suitbuilder_page_start', 15 );

if ( ! function_exists( 'suitbuilder_skip_to_content' ) ) :
/**
 * Skip to content
 *
 * @since suitbuilder 1.0.0
 *
 * @param null
 * @return null
 *
 */
function suitbuilder_skip_to_content() {
    ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'suitbuilder' ); ?></a>
<?php
}
endif;
add_action( 'suitbuilder_action_before_header', 'suitbuilder_skip_to_content', 10 );

   if ( ! function_exists( 'suitbuilder_navigation_page_start' ) ) :
   /**
    * Skip to content
    *
    * @since suitbuilder 1.0.0
    *
    * @param null
    * @return null
    *
    */
    function suitbuilder_navigation_page_start() {
       global $suitbuilder_customizer_all_values;
       ?>
        <!--preloader-->
        <?php if( 1 == $suitbuilder_customizer_all_values['suitbuilder-enbale-preloader'] ) {  ?>
            <div id="preloader">  
                <div class="sk-folding-cube" id="status">
                    <div class="sk-cube1 sk-cube"></div>
                    <div class="sk-cube2 sk-cube"></div>
                    <div class="sk-cube4 sk-cube"></div>
                    <div class="sk-cube3 sk-cube"></div>
                </div>
            </div><!--end of preloader -->
        <?php } ?>

        <div class="suitbuilder-header-wrapper">
        <!-- header options -->
        <?php 
            $suitbuilder_header_button_text      = $suitbuilder_customizer_all_values['suitbuilder-main-header-button-text'];
            $suitbuilder_header_button_link      = $suitbuilder_customizer_all_values['suitbuilder-main-header-button-url'];
        ?>
        <?php if( 1 == $suitbuilder_customizer_all_values['suitbuilder-enable-main-header'] ) { ?>
            <header class="rt-site-header py-sm-3 py-lg-0">     
                <section class="rt-nav-bar-section py-3 py-md-0">
                    <div class="container">
                        <div class="row align-items-center">                            
                            <div class="col-7 col-md-4 col-lg-3 ">
                                <?php if( has_custom_logo() ) { ?>
                                <div class="site-logo py-3"> 
                                    <?php the_custom_logo(); ?>
                                </div>
                                <?php } ?>
                                <div class="site-title">
                                    <div class="rt-title">
                                        <h1 >
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                <?php bloginfo( 'name' ); ?>
                                            </a>
                                        </h1>
                                        <?php $suitbuilder_description = get_bloginfo( 'description', 'display' );
                                            if ( $suitbuilder_description || is_customize_preview() ) : ?>
                                                <p class="clr-mute mb-0"><?php echo $suitbuilder_description; /* WPCS: xss ok. */ ?></p>
                                            <?php endif; 
                                        ?>                        
                                    </div>
                                </div>
                            </div>
                            <?php  if( !empty( $suitbuilder_header_button_text ) ){
                                $col_class = 7;
                            }else{
                                $col_class = 9;
                            } ?> 
                            <div class="col-5 col-md-8 col-lg-<?php echo esc_attr( $col_class ); ?> pl-0">
                                <button class="menu-toggler d-block d-lg-none" id="menu-icon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                                <nav class="rt-main-menu d-none d-lg-block float-right">
                                    <?php
                                    //primary menu
                                    wp_nav_menu( array(
                                        'theme_location'    => 'menu-1',
                                        'menu_id'           => 'primary-menu',
                                        'menu_class'        => 'd-md-inline-flex',                            
                                        'container'         => false,
                                        'fallback_cb'       => false    
                                    ) );?>               
                                </nav>
                            </div>
                                <?php        
                                if( !empty($suitbuilder_header_button_text ) ) { ?> 
                                    <div class="theme-btn-group col-2 d-none d-lg-block">
                                        <a id= "header-btn" class="btn bgc-secondary btn-rounded border-none text-uppercase d-block" href="<?php echo esc_url($suitbuilder_header_button_link);?>"  target="__blank"> <?php echo esc_html($suitbuilder_header_button_text);?> </a>
                                    </div><!-- btn -->
                                <?php }   ?>         
                        </div>
                    </div><!-- container -->        
                </section>
                <!-- nav bar section end -->
            </header><!-- header section -->
        <?php } ?>
        </div>
    <?php
    }
endif;?>

<?php
add_action( 'suitbuilder_action_nav_page_start', 'suitbuilder_navigation_page_start', 10 );

if( ! function_exists( 'suitbuilder_main_slider_setion' ) ) :
/**
 * Main slider
 *
 * @since suitbuilder 1.0.0
 *
 * @param null
 * @return null
 *
 */
    function suitbuilder_main_slider_setion(){
        global $suitbuilder_customizer_all_values;

        if (  is_front_page() && !is_home()  ) {
            /**
             * suitbuilder_page_inner_title hook
             * @since suitbuilder 1.0.0
             *
             * @hooked null
             */
            return;
        }else{
            do_action('suitbuilder_page_inner_title');
            do_action('suitbuilder_action_after_title');
        }
    }
endif;
add_action( 'suitbuilder_action_on_header', 'suitbuilder_main_slider_setion', 10 );

if( ! function_exists( 'suitbuilder_add_breadcrumb' ) ) :

/**
 * Breadcrumb
 *
 * @since suitbuilder 1.0.0
 *
 * @param null
 * @return null
 *
 */
    function suitbuilder_add_breadcrumb(){
        global $suitbuilder_customizer_all_values;
        // Bail if Breadcrumb disabled
        $breadcrumb_enable_breadcrumb = $suitbuilder_customizer_all_values['suitbuilder-enable-breadcrumb' ];
        if ( 1 != $breadcrumb_enable_breadcrumb ) {
            return;
        }
        // Bail if Home Page
        if ( is_front_page() || is_home() ) {
            return;
        }
        echo '<div id="breadcrumb" class="wrapper wrap-breadcrumb bg-light py-2"><div class="container">';
         suitbuilder_simple_breadcrumb();
        echo '</div><!-- .container --></div><!-- #breadcrumb -->';
        return;
    }
endif;
add_action( 'suitbuilder_action_after_title', 'suitbuilder_add_breadcrumb', 10 );  