<?php
if ( ! function_exists( 'suitbuilder_before_footer' ) ) :
    /**
     * Footer content
     *
     * @since suitbuilder 1.0.0
     *
     * @param null
     * @return false | void
     *
     */
    function suitbuilder_before_footer() {
    ?>
    
    <!-- *****************************************
             Footer section starts
    ****************************************** -->

    <section class="site-footer footer-area">
    <?php
    }
endif;
add_action( 'suitbuilder_action_before_footer', 'suitbuilder_before_footer', 10 );

if ( ! function_exists( 'suitbuilder_widget_before_footer' ) ) :
    /**
     * Footer content
     *
     * @since suitbuilder 1.0.0
     *
     * @param null
     * @return false | void
     *
     */
    function suitbuilder_widget_before_footer() {
        global $suitbuilder_customizer_all_values;
        if( !is_active_sidebar( 'footer-col-one' ) && !is_active_sidebar( 'footer-col-two' ) && !is_active_sidebar( 'footer-col-three' ) && !is_active_sidebar( 'footer-col-four' )){
            return false;
        }
        $col = 'col';
        ?>
        <!-- footer widget -->        
        <footer class="footer-top-section pt-5 pb-3">
            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                     <?php if( is_active_sidebar( 'footer-col-one' )  ) : ?>
                        <div class="full-width-mobile <?php echo esc_attr( $col );?> ">
                            <?php dynamic_sidebar( 'footer-col-one' ); ?>
                        </div>
                    <?php endif; ?>
                    <?php if( is_active_sidebar( 'footer-col-two' )  ) : ?>
                        <div class="full-width-mobile <?php echo esc_attr( $col );?> ">
                            <?php dynamic_sidebar( 'footer-col-two' ); ?>
                        </div>
                    <?php endif; ?>
                    <?php if( is_active_sidebar( 'footer-col-three' )  ) : ?>
                        <div class="full-width-mobile <?php echo esc_attr( $col );?> ">
                            <?php dynamic_sidebar( 'footer-col-three' ); ?>
                        </div>
                    <?php endif; ?>
                    <?php if( is_active_sidebar( 'footer-col-four' ) ) : ?>
                        <div class="full-width-mobile <?php echo esc_attr( $col );?> ">
                            <?php dynamic_sidebar( 'footer-col-four' ); ?>
                        </div>
                    <?php endif; ?>
                    </div><!-- row -->
                </div><!-- container -->
            </div><!-- widget -->
        </footer><!-- footer -->
                    
    <?php
    }
endif;
add_action( 'suitbuilder_action_widget_before_footer', 'suitbuilder_widget_before_footer', 10 );

if ( ! function_exists( 'suitbuilder_footer' ) ) :
    /**
     * Footer content
     *
     * @since suitbuilder 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function suitbuilder_footer() {
        global $suitbuilder_customizer_all_values;
        ?> 
        <!-- footer site info -->
        <div class="footer-divider w-100 position-relative z-index"></div>
        <?php if( 1 == $suitbuilder_customizer_all_values['suitbuilder-enable-main-footer'] ) { ?>
            <footer class="footer-bottom-section py-3 position-relative z-index">
                <div class="container">
                        <?php
                        /* translators: %s: CMS name, i.e. WordPress. */
                        if(isset($suitbuilder_customizer_all_values['suitbuilder-copyright-text'])){ ?>
                        <div class="footer-bottom- d-flex justify-content-between">
                            <div id="themecopy">
                                <?php echo wp_kses_post( $suitbuilder_customizer_all_values['suitbuilder-copyright-text'] );
                                } ?>
                            </div> 
                            <?php if( 1 == $suitbuilder_customizer_all_values['suitbuilder-footer-enable-social-link'] ) { ?>
                                <div class="social-menu-icon">
                                    <?php wp_nav_menu(array(
                                                'theme_location'  => 'menu-3',
                                                'menu_id'         => 'social-menu',
                                                'fallback_cb'     => false,
                                                'link_before'     => '<span>',
                                                'link_after'      => '</span>',  
                                            ) );    
                                    ?>
                                </div>
                            <?php } ?>
                            <div id="themename">
                                <strong>
                                    <?PHP    /* translators: 1: Theme name, 2: Theme author. */
                                        printf( esc_html__( 'Theme: %1$s by %2$s', 'suitbuilder' ), esc_html('Suitbuilder'), sprintf('<a href="%s" target = "_blank" rel="designer">%s</a>', esc_url( 'http://suitabletheme.com/' ), esc_html__( 'SuitableTheme', 'suitbuilder' ) )  ); 

                                    ?>
                                </strong>    
                            </div>
                        </div> <!-- footer-bottom -->    
                    </div><!-- container -->
            </footer><!-- footer- copyright -->
        <?php } ?>    
    </section><!-- section -->    
    </div><!-- #content -->
    <!--  </div> -->
    <?php
    }
endif;
add_action( 'suitbuilder_action_footer', 'suitbuilder_footer', 10 ); 

if ( ! function_exists( 'suitbuilder_page_end' ) ) :
    /**
     * Page end
     *
     * @since suitbuilder 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function suitbuilder_page_end() {
    global $suitbuilder_customizer_all_values;
    $scroll_to_top  = $suitbuilder_customizer_all_values['suitbuilder-enable-scroll-to-top'];

     if( 1 == $scroll_to_top) {
        ?>
            <div class="scroll-top ">
                <i class="fa fa-arrow-up"></i>
            </div>
        <?php
        } ?>
    </div><!-- #page -->
    <?php }
endif;
add_action( 'suitbuilder_action_after', 'suitbuilder_page_end', 10 );

        
    