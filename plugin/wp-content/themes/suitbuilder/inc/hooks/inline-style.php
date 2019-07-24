<?php
/**
*Inline style to use color options
**/
if( ! function_exists( 'suitbuilder_get_inline_style' ) ) :

    /**
     * style to use color options
     *
     * @since  Suitbuilder 1.0.0
     */
    function suitbuilder_get_inline_style(){
    global $suitbuilder_defaults;
    global $suitbuilder_customizer_all_values;

    global $suitbuilder_google_fonts;

    //*============= Fonts options ========================== **/
    if( isset( $suitbuilder_customizer_all_values['suitbuilder-site-idenity-font-family'] ) ){
        $suitbuilder_font_family_site_identity            = $suitbuilder_google_fonts[$suitbuilder_customizer_all_values['suitbuilder-site-idenity-font-family']];
    }
    if( isset( $suitbuilder_customizer_all_values['suitbuilder-menu-font-family'] ) ){
        $suitbuilder_font_family_menu_text                = $suitbuilder_google_fonts[$suitbuilder_customizer_all_values['suitbuilder-menu-font-family']];
    }
    if( isset( $suitbuilder_customizer_all_values['suitbuilder-primary-font-family'] ) ){
        $suitbuilder_primary_font_family                  = $suitbuilder_google_fonts[$suitbuilder_customizer_all_values['suitbuilder-primary-font-family']];
    }
    if( isset( $suitbuilder_customizer_all_values['suitbuilder-secondary-font-family'] ) ){
        $suitbuilder_secondary_font_family                = $suitbuilder_google_fonts[$suitbuilder_customizer_all_values['suitbuilder-secondary-font-family']];
    }

    if( isset( $suitbuilder_customizer_all_values['suitbuilder-button-title-font'] ) ){
        $suitbuilder_header_btn_font_family                = $suitbuilder_google_fonts[$suitbuilder_customizer_all_values['suitbuilder-button-title-font']];
    }

    //** ======================  Breadcrumb Fonts ==================== **//
    if( isset( $suitbuilder_customizer_all_values['suitbuilder-breadcrumb-fonts'] ) ){
        $suitbuilder_breadcrumb_font_family                = $suitbuilder_google_fonts[$suitbuilder_customizer_all_values['suitbuilder-breadcrumb-fonts']];
    }

    //*=============================== color options ==================================== **/
    $suitbuilder_background_color                        = get_background_color();
    $suitbuilder_site_identity_color_option              = $suitbuilder_customizer_all_values['suitbuilder-site-identity-color'];
    $suitbuilder_primary_color                           = $suitbuilder_customizer_all_values['suitbuilder-primary-color'];
    $suitbuilder_secondary_color                         = $suitbuilder_customizer_all_values['suitbuilder-secondary-color'];

    //*============================== site-identity =======================================*//
    $suitbuilder_site_idenity_title_transform            = $suitbuilder_customizer_all_values['suitbuilder-site-identity-title-transform'];
    $suitbuilder_site_idenity_title_font_size            = $suitbuilder_customizer_all_values['suitbuilder-site-identity-title-font-size'];
    $suitbuilder_site_idenity_title_font_weight          = $suitbuilder_customizer_all_values['suitbuilder-site-identity-title-font-weight'];   

    //**======================== header color ============================**//
    $suitbuilder_header_bg_color                          = $suitbuilder_customizer_all_values['suitbuilder-main-header-bg-color'];
    $suitbuilder_header_text_color                        = $suitbuilder_customizer_all_values['suitbuilder-main-header-text-color'];
    $suitbuilder_header_menu_transform                    = $suitbuilder_customizer_all_values['suitbuilder-header-menu-transform'];
    $suitbuilder_header_menu_font_size                    = $suitbuilder_customizer_all_values['suitbuilder-header-menu-font-size'];
    $suitbuilder_header_menu_font_weight                  = $suitbuilder_customizer_all_values['suitbuilder-header-menu-font-weight'];
    $suitbuilder_header_button_bg_color                   = $suitbuilder_customizer_all_values['suitbuilder-header-button-bg-color'];
    $suitbuilder_header_button_text_color                 = $suitbuilder_customizer_all_values['suitbuilder-header-button-text-color'];
    $suitbuilder_header_button_hover_bg_color             = $suitbuilder_customizer_all_values['suitbuilder-header-button-hover-bg-color'];
    $suitbuilder_header_button_hover_text_color           = $suitbuilder_customizer_all_values['suitbuilder-header-button-hover-text-color'];
    $suitbuilder_button_text_font_size                    = $suitbuilder_customizer_all_values['suitbuilder-button-title-font-size'];
 

    //**======================== inner header ============================**//
    $suitbuilder_inner_header_title_transform            = $suitbuilder_customizer_all_values['suitbuilder-inner-header-title-transform'];
    $suitbuilder_inner_header_title_font_size            = $suitbuilder_customizer_all_values['suitbuilder-inner-header-title-font-size'];
    $suitbuilder_inner_header_title_font_weight          = $suitbuilder_customizer_all_values['suitbuilder-inner-header-title-font-weight'];
    $suitbuilder_inner_baner_image = get_header_image();


    //**======================== breadcrumb color ============================**//
    $suitbuilder_breadcrumb_margin_bottom                = $suitbuilder_customizer_all_values['suitbuilder-breadcrumb-margin-bottom'];


    //**==================== Genareal Setting =================================== */
    if( 'custom-layout' == $suitbuilder_customizer_all_values['suitbuilder-site-layout-test'] ){
        $suitbuilder_container_width                           = $suitbuilder_customizer_all_values['suitbuilder-container-width-test'];
    }

    //** =========================== footer color ========================== **//
    $suitbuilder_footer_bg_color                         = $suitbuilder_customizer_all_values['suitbuilder-footer-background-color'];
    $suitbuilder_footer_content_color                    = $suitbuilder_customizer_all_values['suitbuilder-footer-content-color'];
    $suitbuilder_footer_title_color                      = $suitbuilder_customizer_all_values['suitbuilder-footer-title-color'];
    $suitbuilder_footer_widget_title_font_size           = $suitbuilder_customizer_all_values['suitbuilder-footer-widget-title-font-size'];
    $suitbuilder_footer_widget_title_font_weight         = $suitbuilder_customizer_all_values['suitbuilder-footer-widget-title-font-weight'];
    $suitbuilder_footer_widget_title_transform           = $suitbuilder_customizer_all_values['suitbuilder-footer-widget-title-transform'];
  

    //**=========================== latest blog ==========================**//
    $suitbuilder_blog_title_transform                    = $suitbuilder_customizer_all_values['suitbuilder-blog-title-transform'];
    $suitbuilder_blog_title_font_size                    = $suitbuilder_customizer_all_values['suitbuilder-blog-title-font-size'];
    $suitbuilder_blog_title_font_weight                  = $suitbuilder_customizer_all_values['suitbuilder-blog-title-font-weight'];
    $suitbuilder_blog_background_color                   = $suitbuilder_customizer_all_values['suitbuilder-blog-section-bg-color'];
    $suitbuilder_blog_content_color                      = $suitbuilder_customizer_all_values['suitbuilder-blog-section-content-color'];
    $suitbuilder_blog_title_color                        = $suitbuilder_customizer_all_values['suitbuilder-blog-section-title-color'];

    if( 'padding-desktop' == $suitbuilder_customizer_all_values['suitbuilder-blog-padding-icon'] ){
        $suitbuilder_blog_title_padding_top                  = $suitbuilder_customizer_all_values['suitbuilder-blog-title-padding-top'];
        $suitbuilder_blog_title_padding_right                = $suitbuilder_customizer_all_values['suitbuilder-blog-title-padding-right'];
        $suitbuilder_blog_title_padding_bottom               = $suitbuilder_customizer_all_values['suitbuilder-blog-title-padding-bottom'];
        $suitbuilder_blog_title_padding_left                 = $suitbuilder_customizer_all_values['suitbuilder-blog-title-padding-left'];

    }else{
        $suitbuilder_blog_title_padding_top_mb               = $suitbuilder_customizer_all_values['suitbuilder-blog-title-padding-top-mb'];
        $suitbuilder_blog_title_padding_right_mb             = $suitbuilder_customizer_all_values['suitbuilder-blog-title-padding-right-mb'];
        $suitbuilder_blog_title_padding_bottom_mb            = $suitbuilder_customizer_all_values['suitbuilder-blog-title-padding-bottom-mb'];
        $suitbuilder_blog_title_padding_left_mb              = $suitbuilder_customizer_all_values['suitbuilder-blog-title-padding-left-mb'];
    }
    

    if( 'margin-desktop' == $suitbuilder_customizer_all_values['suitbuilder-blog-margin-icon']  ){

        $suitbuilder_blog_title_margin_top                   = $suitbuilder_customizer_all_values['suitbuilder-blog-title-margin-top'];
        $suitbuilder_blog_title_margin_right                 = $suitbuilder_customizer_all_values['suitbuilder-blog-title-margin-right'];
        $suitbuilder_blog_title_margin_bottom                = $suitbuilder_customizer_all_values['suitbuilder-blog-title-margin-bottom'];
        $suitbuilder_blog_title_margin_left                  = $suitbuilder_customizer_all_values['suitbuilder-blog-title-margin-left'];

    }else{

        $suitbuilder_blog_title_margin_top_mb                = $suitbuilder_customizer_all_values['suitbuilder-blog-title-margin-top-mb'];
        $suitbuilder_blog_title_margin_right_mb              = $suitbuilder_customizer_all_values['suitbuilder-blog-title-margin-right-mb'];
        $suitbuilder_blog_title_margin_bottom_mb             = $suitbuilder_customizer_all_values['suitbuilder-blog-title-margin-bottom-mb'];
        $suitbuilder_blog_title_margin_left_mb               = $suitbuilder_customizer_all_values['suitbuilder-blog-title-margin-left-mb'];
    }
      
    
    $suitbuilder_blog_title_line_height                  = $suitbuilder_customizer_all_values['suitbuilder-blog-title-line-height'];

    //** =========================== sidebar ========================== **//
    $suitbuilder_sidebar_bg_color                       = $suitbuilder_customizer_all_values['suitbuilder-sidebar-background-color'];
    $suitbuilder_widget_bg_color                        = $suitbuilder_customizer_all_values['suitbuilder-widget-background-color'];
    $suitbuilder_widget_title_color                     = $suitbuilder_customizer_all_values['suitbuilder-widget-title-color'];
    $suitbuilder_widget_content_color                   = $suitbuilder_customizer_all_values['suitbuilder-widget-content-color'];
    $suitbuilder_widget_title_font_size                 = $suitbuilder_customizer_all_values['suitbuilder-widget-title-font-size'];
    $suitbuilder_widget_title_font_weight               = $suitbuilder_customizer_all_values['suitbuilder-widget-title-font-weight'];
    $suitbuilder_widget_title_transform                 = $suitbuilder_customizer_all_values['suitbuilder-widget-title-transform'];

    if( 'w-padding-desktop' == $suitbuilder_customizer_all_values['suitbuilder-widget-padding-icon'] ){

        $suitbuilder_widget_title_padding_top               = $suitbuilder_customizer_all_values['suitbuilder-widget-title-padding-top'];
        $suitbuilder_widget_title_padding_bottom            = $suitbuilder_customizer_all_values['suitbuilder-widget-title-padding-bottom'];
        $suitbuilder_widget_title_padding_left              = $suitbuilder_customizer_all_values['suitbuilder-widget-title-padding-left'];
        $suitbuilder_widget_title_padding_right             = $suitbuilder_customizer_all_values['suitbuilder-widget-title-padding-right'];

    }else{

        $suitbuilder_widget_title_padding_top_mb            = $suitbuilder_customizer_all_values['suitbuilder-widget-title-padding-top-mb'];
        $suitbuilder_widget_title_padding_bottom_mb         = $suitbuilder_customizer_all_values['suitbuilder-widget-title-padding-bottom-mb'];
        $suitbuilder_widget_title_padding_left_mb           = $suitbuilder_customizer_all_values['suitbuilder-widget-title-padding-left-mb'];
        $suitbuilder_widget_title_padding_right_mb          = $suitbuilder_customizer_all_values['suitbuilder-widget-title-padding-right-mb'];

    }
    
    if( 'w-margin-desktop' == $suitbuilder_customizer_all_values['suitbuilder-widget-margin-icon'] ){

        $suitbuilder_widget_title_margin_top                = $suitbuilder_customizer_all_values['suitbuilder-widget-title-margin-top'];
        $suitbuilder_widget_title_margin_bottom             = $suitbuilder_customizer_all_values['suitbuilder-widget-title-margin-bottom'];
        $suitbuilder_widget_title_margin_left               = $suitbuilder_customizer_all_values['suitbuilder-widget-title-margin-left'];
        $suitbuilder_widget_title_margin_right              = $suitbuilder_customizer_all_values['suitbuilder-widget-title-margin-right'];
        $suitbuilder_widget_title_line_height               = $suitbuilder_customizer_all_values['suitbuilder-widget-title-line-height'];

    }else{

        $suitbuilder_widget_title_margin_top_mb             = $suitbuilder_customizer_all_values['suitbuilder-widget-title-margin-top-mb'];
        $suitbuilder_widget_title_margin_bottom_mb          = $suitbuilder_customizer_all_values['suitbuilder-widget-title-margin-bottom-mb'];
        $suitbuilder_widget_title_margin_left_mb            = $suitbuilder_customizer_all_values['suitbuilder-widget-title-margin-left-mb'];
        $suitbuilder_widget_title_margin_right_mb           = $suitbuilder_customizer_all_values['suitbuilder-widget-title-margin-right-mb'];
       
    }
    $suitbuilder_widget_title_line_height                  = $suitbuilder_customizer_all_values['suitbuilder-widget-title-line-height'];

    
    ob_start();
    //**========================= All Font Family =================================== */
    ?>
        .rt-title h1 a, 
        .rt-title h2 a,
        .rt-title p {
            font-family: '<?php echo esc_attr( $suitbuilder_font_family_site_identity ); ?>',sans-serif;
        }

        .rt-main-menu > ul > li a {
            font-family: '<?php echo esc_attr( $suitbuilder_font_family_menu_text ); ?>',sans-serif;
        }

        h1,h2,h3,h4,h5,h6 {
            font-family: '<?php echo esc_attr( $suitbuilder_primary_font_family ); ?>',sans-serif;
        }

        body,p {
            font-family: '<?php echo esc_attr( $suitbuilder_secondary_font_family ); ?>', sans-serif;
        }

        a#header-btn {
            font-family: '<?php echo esc_attr( $suitbuilder_header_btn_font_family ); ?>', sans-serif;
        }

        #breadcrumb ul li,
        #breadcrumb ul li a,
        #breadcrumb,
        #breadcrumb ul li span {
            font-family: '<?php echo esc_attr( $suitbuilder_breadcrumb_font_family ); ?>', sans-serif;
        }

        <?php 

        //*** ======================= Primary ======================***//
        if( !empty($suitbuilder_primary_color) ){
        ?>
            .bgc-primary, .has-line-left:before, 
            .bgc-secondary, 
            .post-navigation .nav-links a, 
            .read-more-text a:hover, .rt-prev-arrow, 
            .rt-next-arrow, .slick-dots li.slick-active button, 
            .header-top.tb-style-1:after, .header-top.tb-style-2:after, 
            .header-top.tb-style-3:after, 
            .search-form input.search-submit, .scroll-top, div#comments .submit,
            button.give-btn.give-btn-modal,
            div#preloader,
            .wpcf7-submit {
              background: <?php echo esc_attr( $suitbuilder_primary_color );?>!important;
            }

            .clr-primary, .title-with-link a:hover, 
            .slick-dots li.slick-active button, 
            #secondary .widget ul li a:hover, 
            nav.navigation.posts-navigation a:hover, 
            .rt-title h1 a:hover, .rt-title h2 a:hover, 
            .rt-main-menu ul ul.sub-menu li a:hover, 
            .rt-main-menu > ul > li:not(.has-mega-menu) > ul.sub-menu:not(.mega-menu) li:hover a, 
            .site-footer .footer-bottom a:hover, 
            div#themename a:hover, 
            article.post .entry-content h2 a:hover,
            .nav-links a:hover,
            li.active a{
                color: <?php echo esc_attr( $suitbuilder_primary_color );?>!important;
            }
        <?php
        }


        //** ========================== Secondary =================== **//
         if( !empty($suitbuilder_secondary_color) ){
        ?>
            .sec {
              color: <?php echo esc_attr( $suitbuilder_secondary_color );?>!important;
            }            
            .section-title h2.title-has-line.line-top-right:before, 
            .section-title h2.title-has-line.title-line-both:before, 
            .section-title h2.title-has-line:after, 
            .scroll-top:hover,            
            button.give-btn.give-btn-modal:hover,
            #donate-btn-elementor-cta button {
              background: <?php echo esc_attr( $suitbuilder_secondary_color );?>!important;
            }
        <?php
        }

        //*** =============== site-idenity ==========================**//

        if( !empty($suitbuilder_site_identity_color_option) ){
        ?>
            .rt-title h1 a, 
            .rt-title h2 a,
            .rt-title p {
              color: <?php echo esc_attr( $suitbuilder_site_identity_color_option );?>!important;
            }
        <?php
        } 

        //site identity font size
        if( !empty($suitbuilder_site_idenity_title_font_size)  ){
        ?>
            .rt-title h1 a {
                font-size: <?php echo esc_attr( $suitbuilder_site_idenity_title_font_size ); ?>px;
            }
        <?php    
        }

        //site identity font weight
        if( !empty($suitbuilder_site_idenity_title_font_weight)  ){
        ?>
            .rt-title h1 a {
                font-weight: <?php echo esc_attr( $suitbuilder_site_idenity_title_font_weight ); ?>;
            }
        <?php    
        }  

        //site identity title transform
        if( !empty($suitbuilder_site_idenity_title_transform )  ){
        ?>
            .rt-title h1 a {
                text-transform: <?php echo esc_attr( $suitbuilder_site_idenity_title_transform  ); ?>;
            }
        <?php    
        }

        //**========================= Header section ================================***// 

        //header background color
        if( !empty($suitbuilder_header_bg_color) ){
        ?>
            header.rt-site-header {
              background-color: <?php echo esc_attr( $suitbuilder_header_bg_color );?> !important;
            }
        <?php
        } 

        //header text color
        if( !empty($suitbuilder_header_text_color) ){
        ?>
            .rt-main-menu > ul > li a,
            .btn.bgc-secondary {
              color: <?php echo esc_attr( $suitbuilder_header_text_color );?>;
            }
        <?php
        }

        //header menu font size
        if( !empty($suitbuilder_header_menu_font_size)  ){
        ?>
            .rt-main-menu > ul > li a{
                font-size: <?php echo esc_attr( $suitbuilder_header_menu_font_size ); ?>px;
            }
        <?php    
        }

        //header menu font weight
        if( !empty($suitbuilder_header_menu_font_weight)  ){
        ?>
            .rt-main-menu > ul > li a{
                font-weight: <?php echo esc_attr( $suitbuilder_header_menu_font_weight ); ?>;
            }
        <?php    
        }  

        //header menu transform
        if( !empty($suitbuilder_header_menu_transform )  ){
        ?>
            .rt-main-menu > ul > li a{
                text-transform: <?php echo esc_attr( $suitbuilder_header_menu_transform  ); ?>;
            }
        <?php    
        }
        /*hover bg */
        if( !empty($suitbuilder_header_btn_option) ){
        ?>
            a#header-btn:after,
            a#header-btn:before {
              background-color: <?php echo esc_attr( $suitbuilder_header_btn_option );?> !important;
            }
        <?php
        } 

        //header button background color
         if( !empty($suitbuilder_header_button_bg_color) ){
        ?>
            #header-btn {
              background-color: <?php echo esc_attr( $suitbuilder_header_button_bg_color );?>!important;
            }
        <?php
        }

        //header button text color
         if( !empty($suitbuilder_header_button_text_color) ){
        ?>
            #header-btn {
              color: <?php echo esc_attr( $suitbuilder_header_button_text_color );?>!important;
            }
        <?php
        }  

        //header button hover background color
         if( !empty($suitbuilder_header_button_hover_bg_color) ){
        ?>
            #header-btn:after, 
            #header-btn:before {
              background-color: <?php echo esc_attr( $suitbuilder_header_button_hover_bg_color );?>!important;
            }
        <?php
        }

        //header button hover text color
         if( !empty($suitbuilder_header_button_hover_text_color) ){
        ?>

            #header-btn:hover {
              color: <?php echo esc_attr( $suitbuilder_header_button_text_color );?>!important;
            }
        <?php
        }  


        //button text font size
        if( !empty($suitbuilder_button_text_font_size)  ){
        ?>
            a#header-btn {
                font-size: <?php echo esc_attr( $suitbuilder_button_text_font_size ); ?>px !important;
            }
        <?php    
        }

        //button text font weight
        if( !empty($suitbuilder_button_text_font_weight)  ){
        ?>
            a#header-btn {
                font-weight: <?php echo esc_attr( $suitbuilder_button_text_font_weight ); ?>;
            }
        <?php    
        }  

        //**================ Inner Header Section ================ **//


        //inner header title font size
        if( !empty($suitbuilder_inner_header_title_font_size)  ){
        ?>
            .wrapper.page-inner-title h2{
                font-size: <?php echo esc_attr( $suitbuilder_inner_header_title_font_size ); ?>px;
            }
        <?php    
        }

        //inner header title font weight
        if( !empty($suitbuilder_inner_header_title_font_weight)  ){
        ?>
            .wrapper.page-inner-title h2{
                font-weight: <?php echo esc_attr( $suitbuilder_inner_header_title_font_weight ); ?>;
            }
        <?php    
        }  

        //inner header title text-transform
        if( !empty($suitbuilder_inner_header_title_transform )  ){
        ?>
            .wrapper.page-inner-title h2{
                text-transform: <?php echo esc_attr( $suitbuilder_inner_header_title_transform  ); ?>;
            }
        <?php    
        }

        //**=========================== Breadcrumb Section=======================**//
        //inner header banner image
        if( !empty($suitbuilder_inner_baner_image )  ){
        ?>
            .wrapper.page-inner-title{
                background-image: url('<?php echo esc_attr( $suitbuilder_inner_baner_image  ); ?>');
            }
        <?php    
        } 


        //breadcrumb buttom margin
        if( !empty($suitbuilder_breadcrumb_margin_bottom)  ){
        ?>
            #breadcrumb {
                margin-bottom: <?php echo esc_attr( $suitbuilder_breadcrumb_margin_bottom ); ?>px!important;
            }
        <?php    
        }


        //** ========================= genaral setting =====================  */
        if( !empty($suitbuilder_container_width) ){ ?>
            @media (min-width: 1200px) {
                .container {
                    max-width: <?php echo esc_attr($suitbuilder_container_width);?>px !important;
                }
            }

        <?php }

        //***================== sidebar Section ====================================**//

        //sidebar background color
        if( !empty($suitbuilder_sidebar_bg_color) ){
        ?>
            aside#secondary {
              background-color: <?php echo esc_attr( $suitbuilder_sidebar_bg_color );?>;
            }
        <?php
        } 

        //sidebar widget background color
        if( !empty($suitbuilder_widget_bg_color) ){
        ?>
            #secondary .widget {
              background-color: <?php echo esc_attr( $suitbuilder_widget_bg_color );?>;
            }
        <?php
        } 

        //sidebar widget title color
        if( !empty($suitbuilder_widget_title_color) ){
        ?>
            #secondary .widget-title {
              color: <?php echo esc_attr( $suitbuilder_widget_title_color );?>;
            }
        <?php
        } 


        // sidebar content color
        if( !empty($suitbuilder_widget_content_color) ){
        ?>
            #secondary .widget p,
            #secondary .widget li a,
            #secondary .widget span,
            #secondary .widget  {
              color: <?php echo esc_attr( $suitbuilder_widget_content_color );?>;
            }
        <?php
        } 

        //sidebar widget title font size
        if( !empty($suitbuilder_widget_title_font_size)  ){
        ?>
            #secondary .widget-title{
                font-size: <?php echo esc_attr( $suitbuilder_widget_title_font_size ); ?>px;
            }
        <?php    
        }

        //sidebar widget title font weight
        if( !empty($suitbuilder_widget_title_font_weight)  ){
        ?>
            #secondary .widget-title{
                font-weight: <?php echo esc_attr( $suitbuilder_widget_title_font_weight ); ?>;
            }
        <?php    
        }  

        //sidebar widget title transform
        if( !empty($suitbuilder_widget_title_transform )  ){
        ?>
            #secondary .widget-title{
                text-transform: <?php echo esc_attr( $suitbuilder_widget_title_transform  ); ?>;
            }
        <?php    
        } 


        // sidebar widget title padding top
        if( !empty($suitbuilder_widget_title_padding_top )  ){ ?>
            @media (min-width: 767px) {
                #secondary .widget-title{
                    padding-top: <?php echo esc_attr( $suitbuilder_widget_title_padding_top  ); ?>px;
                }
            }
        <?php    
        }
    
        // sidebar widget title padding top mb
        if( !empty($suitbuilder_widget_title_padding_top_mb )  ){ ?>
        @media (max-width: 767px) {
            #secondary .widget-title{
                padding-top: <?php echo esc_attr( $suitbuilder_widget_title_padding_top_mb  ); ?>px;
            }
        }
        <?php    
        }
        
        // sidebar widget title padding right
        if( !empty($suitbuilder_widget_title_padding_right )  ){ ?>
            @media (min-width: 767px) {
                #secondary .widget-title{
                    padding-right: <?php echo esc_attr( $suitbuilder_widget_title_padding_right  ); ?>px;
                }
            }
        <?php    
        }
    
        // sidebar widget title padding right mb
        if( !empty($suitbuilder_widget_title_padding_right_mb )  ){ ?>
        @media (max-width: 767px) {
            #secondary .widget-title{
                padding-right: <?php echo esc_attr( $suitbuilder_widget_title_padding_right_mb  ); ?>px;
            }
        }
        <?php    
        }
        
        // sidebar widget title padding bottom
        if( !empty($suitbuilder_widget_title_padding_bottom )  ){ ?>
            @media (min-width: 767px) {
                #secondary .widget-title{
                    padding-bottom: <?php echo esc_attr( $suitbuilder_widget_title_padding_bottom  ); ?>px;
                }
            }
        <?php    
        }
    
        // sidebar widget title padding bottom mb
        if( !empty($suitbuilder_widget_title_padding_bottom_mb )  ){ ?>
        @media (max-width: 767px) {
            #secondary .widget-title{
                padding-bottom: <?php echo esc_attr( $suitbuilder_widget_title_padding_bottom_mb  ); ?>px;
            }
        }
        <?php    
        }

        // sidebar widget title padding left
        if( !empty($suitbuilder_widget_title_padding_left )  ){ ?>
            @media (min-width: 767px) {
                #secondary .widget-title{
                    padding-left: <?php echo esc_attr( $suitbuilder_widget_title_padding_left  ); ?>px;
                }
            }
        <?php    
        }
    
        // sidebar widget title padding left mb
        if( !empty($suitbuilder_widget_title_padding_left_mb )  ){ ?>
        @media (max-width: 767px) {
            #secondary .widget-title{
                padding-left: <?php echo esc_attr( $suitbuilder_widget_title_padding_left_mb  ); ?>px;
            }
        }
        <?php    
        }

        // sidebar widget title margin top
        if( !empty($suitbuilder_widget_title_margin_top )  ){ ?>
            @media (min-width: 767px) {
                #secondary .widget-title{
                    margin-top: <?php echo esc_attr( $suitbuilder_widget_title_margin_top  ); ?>px;
                }
            }
        <?php    
        }
    
        // sidebar widget title margin top mb
        if( !empty($suitbuilder_widget_title_margin_top_mb )  ){ ?>
        @media (max-width: 767px) {
            #secondary .widget-title{
                margin-top: <?php echo esc_attr( $suitbuilder_widget_title_margin_top_mb  ); ?>px;
            }
        }
        <?php    
        }
        
        // sidebar widget title margin right
        if( !empty($suitbuilder_widget_title_margin_right )  ){ ?>
            @media (min-width: 767px) {
                #secondary .widget-title{
                    margin-right: <?php echo esc_attr( $suitbuilder_widget_title_margin_right  ); ?>px;
                }
            }
        <?php    
        }
    
        // sidebar widget title margin right mb
        if( !empty($suitbuilder_widget_title_margin_right_mb )  ){ ?>
        @media (max-width: 767px) {
            #secondary .widget-title{
                margin-right: <?php echo esc_attr( $suitbuilder_widget_title_margin_right_mb  ); ?>px;
            }
        }
        <?php    
        }
        
        // sidebar widget title margin bottom
        if( !empty($suitbuilder_widget_title_margin_bottom )  ){ ?>
            @media (min-width: 767px) {
                #secondary .widget-title{
                    margin-bottom: <?php echo esc_attr( $suitbuilder_widget_title_margin_bottom  ); ?>px;
                }
            }
        <?php    
        }
    
        // sidebar widget title margin bottom mb
        if( !empty($suitbuilder_widget_title_margin_bottom_mb )  ){ ?>
        @media (max-width: 767px) {
            #secondary .widget-title{
                margin-bottom: <?php echo esc_attr( $suitbuilder_widget_title_margin_bottom_mb  ); ?>px;
            }
        }
        <?php    
        }

        // sidebar widget title margin left
        if( !empty($suitbuilder_widget_title_margin_left )  ){ ?>
            @media (min-width: 767px) {
                #secondary .widget-title{
                    margin-left: <?php echo esc_attr( $suitbuilder_widget_title_margin_left  ); ?>px;
                }
            }
        <?php    
        }
    
        // sidebar widget title margin left mb
        if( !empty($suitbuilder_widget_title_margin_left_mb )  ){ ?>
        @media (max-width: 767px) {
            #secondary .widget-title{
                margin-left: <?php echo esc_attr( $suitbuilder_widget_title_margin_left_mb  ); ?>px;
            }
        }
        <?php    
        }



        
        //sidebar widget title  line hieght
        if( !empty($suitbuilder_widget_title_line_height )  ){
        ?>
            #secondary .widget-title{
                line-height: <?php echo esc_attr( $suitbuilder_widget_title_line_height  ); ?>;
            }
        <?php    
        }


        //** =================== Footer Section ===================================== **//

        //footer background color
        if( !empty($suitbuilder_footer_bg_color) ){
        ?>
            .site-footer:after {
              background-color: <?php echo esc_attr( $suitbuilder_footer_bg_color );?>!important;
            }
        <?php
        }
        

        //footer title color    
        if( !empty($suitbuilder_footer_title_color) ){
        ?>
            .site-footer .widget .widget-title{
                color: <?php echo esc_attr( $suitbuilder_footer_title_color );?>!important;
            }
        <?php
        }     

        //footer contrnt color
        if( !empty($suitbuilder_footer_content_color) ){
        ?>
            .site-footer .widget a,
            .site-footer .widget p,
            .site-footer .widget span,
            .site-footer .widget ul li a,
            .site-footer .widget ul li ,
            .footer-bottom- a,
            .footer-bottom-,
            .footer-bottom- p,
            .site-footer .widget tr,
            .site-footer .widget td,
            .site-footer .widget th,
            .site-footer caption {
                color: <?php echo esc_attr( $suitbuilder_footer_content_color );?>!important;
            }
        <?php
        } 

        //footer widget title font size
        if( !empty($suitbuilder_footer_widget_title_font_size)  ){
        ?>
            .site-footer .widget .widget-title{
                font-size: <?php echo esc_attr( $suitbuilder_footer_widget_title_font_size ); ?>px;
            }
        <?php    
        }

        //footer widget title font weight
        if( !empty($suitbuilder_footer_widget_title_font_weight)  ){
        ?>
            .site-footer .widget .widget-title{
                font-weight: <?php echo esc_attr( $suitbuilder_footer_widget_title_font_weight ); ?>;
            }
        <?php    
        }  

        //footer wideget title transfrom
        if( !empty($suitbuilder_footer_widget_title_transform )  ){
        ?>
            .site-footer .widget .widget-title{
                text-transform: <?php echo esc_attr( $suitbuilder_footer_widget_title_transform  ); ?>;
            }
        <?php    
        }
            
        //sidebar widget title  line hieght
        if( !empty($suitbuilder_widget_title_line_height )  ){
        ?>
            .site-footer .widget .widget-title{
                line-height: <?php echo esc_attr( $suitbuilder_widget_title_line_height  ); ?>;
            }
        <?php    
        }



        //** ==================== Latest Blog ============================**//

        //latest blog title font size
        if( !empty($suitbuilder_blog_title_font_size)  ){
        ?>
            article.post .entry-content h2{
                font-size: <?php echo esc_attr( $suitbuilder_blog_title_font_size ); ?>px;
            }
        <?php    
        }

        //latest blog title font weight
        if( !empty($suitbuilder_blog_title_font_weight)  ){
        ?>
            article.post .entry-content h2{
                font-weight: <?php echo esc_attr( $suitbuilder_blog_title_font_weight ); ?>;
            }
        <?php    
        }  

        //latest blog title text transform
        if( !empty($suitbuilder_blog_title_transform)  ){
        ?>
            article.post .entry-content h2{
                text-transform: <?php echo esc_attr( $suitbuilder_blog_title_transform ); ?>;
            }
        <?php    
        } 

        //latest blog background color
        if( !empty($suitbuilder_blog_background_color) ){
        ?>
            article.post .wrapper-grid,
            .search article .wrapper-grid {
              background-color: <?php echo esc_attr( $suitbuilder_blog_background_color );?>;
            }
        <?php
        } 

        //latest blog content color
        if( !empty($suitbuilder_blog_content_color) ){
        ?>
            article.post .wrapper-grid span,
            article.post .wrapper-grid a,
            article.post .wrapper-grid p,
            article.post .wrapper-grid,
            .search article .wrapper-grid,
            .search article .wrapper-grid a,
            .search article .wrapper-grid p,
            .search article .wrapper-grid span {
              color: <?php echo esc_attr( $suitbuilder_blog_content_color );?>;
            }
        <?php
        }

        //latest blog title color
        if( !empty($suitbuilder_blog_title_color) ){
        ?>
            article.post .entry-content h2 a {
              color: <?php echo esc_attr( $suitbuilder_blog_title_color );?>;
            }
        <?php
        }
         
        // blog title padding top
        if( !empty($suitbuilder_blog_title_padding_top )  ){ ?>
        @media (min-width: 767px) {
            article.post .entry-content h2{
                padding-top: <?php echo esc_attr( $suitbuilder_blog_title_padding_top  ); ?>px;
            }
        }
        <?php    
        }
        
        // blog title padding top mb
        if( !empty($suitbuilder_blog_title_padding_top_mb )  ){ ?>
        @media (max-width: 767px) {
            article.post .entry-content h2{
                padding-top: <?php echo esc_attr( $suitbuilder_blog_title_padding_top_mb  ); ?>px;
            }
        }
        <?php    
        }
    

        // blog title padding buttom
        if( !empty($suitbuilder_blog_title_padding_bottom )  ){ ?>
        @media (min-width: 767px) {
            article.post .entry-content h2{
                padding-bottom: <?php echo esc_attr( $suitbuilder_blog_title_padding_bottom  ); ?>px;
            }
        }
        <?php    
        }
    
        // blog title padding buttom mb
        if( !empty($suitbuilder_blog_title_padding_bottom_mb )  ){ ?>
        @media (max-width: 767px) {
            article.post .entry-content h2{
                padding-bottom: <?php echo esc_attr( $suitbuilder_blog_title_padding_bottom_mb  ); ?>px;
            }
        }
        <?php    
        }


        // blog title padding right
        if( !empty($suitbuilder_blog_title_padding_right )  ){ ?>
        @media (min-width: 767px) {
            article.post .entry-content h2{
                padding-right: <?php echo esc_attr( $suitbuilder_blog_title_padding_right  ); ?>px;
            }
        }
        <?php    
        }

        // blog title padding right mb
        if( !empty($suitbuilder_blog_title_padding_right_mb )  ){ ?>
        @media (max-width: 767px) {
            article.post .entry-content h2{
                padding-right: <?php echo esc_attr( $suitbuilder_blog_title_padding_right_mb  ); ?>px;
            }
        }
        <?php    
        }

        // blog title padding left
        if( !empty($suitbuilder_blog_title_padding_left )  ){ ?>
        @media (min-width: 767px) {
            article.post .entry-content h2{
                padding-left: <?php echo esc_attr( $suitbuilder_blog_title_padding_left  ); ?>px;
            }
        }
        <?php    
        }

        // blog title padding left mb
        if( !empty($suitbuilder_blog_title_padding_left_mb )  ){ ?>
        @media (max-width: 767px) {
            article.post .entry-content h2{
                padding-left: <?php echo esc_attr( $suitbuilder_blog_title_padding_left_mb  ); ?>px;
            }
        }
        <?php    
        }

    
        // blog title margin top
        if( !empty($suitbuilder_blog_title_margin_top )  ){ ?>
        @media (min-width: 767px) {
            article.post .entry-content h2{
                margin-left: <?php echo esc_attr( $suitbuilder_blog_title_margin_top  ); ?>px;
            }
        }
        <?php    
        }
                    
        // blog title nargin top mb
        if( !empty($suitbuilder_blog_title_margin_top_mb )  ){ ?>
        @media (max-width: 767px) {
            article.post .entry-content h2{
                nargin-left: <?php echo esc_attr( $suitbuilder_blog_title_margin_top_mb  ); ?>px;
            }
        }
        <?php    
        }
                
        // blog title nargin buttom
        if( !empty($suitbuilder_blog_title_nargin_bottom )  ){ ?>
        @media (min-width: 767px) {
            article.post .entry-content h2{
                nargin-left: <?php echo esc_attr( $suitbuilder_blog_title_nargin_bottom  ); ?>px;
            }
        }
        <?php    
        }
    
        // blog title nargin buttom mb
        if( !empty($suitbuilder_blog_title_nargin_buttom_mb )  ){ ?>
        @media (max-width: 767px) {
            article.post .entry-content h2{
                nargin-left: <?php echo esc_attr( $suitbuilder_blog_title_nargin_buttom_mb  ); ?>px;
            }
        }
        <?php    
        }
            
            
        // blog title margin right
        if( !empty($suitbuilder_blog_title_margin_right )  ){ ?>
        @media (min-width: 767px) {
            article.post .entry-content h2{
                margin-left: <?php echo esc_attr( $suitbuilder_blog_title_margin_right  ); ?>px;
            }
        }
        <?php    
        }

        // blog title margin right mb
        if( !empty($suitbuilder_blog_title_margin_right_mb )  ){ ?>
        @media (max-width: 767px) {
            article.post .entry-content h2{
                margin-left: <?php echo esc_attr( $suitbuilder_blog_title_margin_right_mb  ); ?>px;
            }
        }
        <?php    
        }
            
        // blog title margin left
        if( !empty($suitbuilder_blog_title_margin_left )  ){ ?>
        @media (min-width: 767px) {
            article.post .entry-content h2{
                margin-left: <?php echo esc_attr( $suitbuilder_blog_title_margin_left  ); ?>px;
            }
        }
        <?php    
        }

        // blog title margin left mb
        if( !empty($suitbuilder_blog_title_margin_left_mb )  ){ ?>
        @media (max-width: 767px) {
            article.post .entry-content h2{
                margin-left: <?php echo esc_attr( $suitbuilder_blog_title_margin_left_mb  ); ?>px;
            }
        }
        <?php    
        }    
    
        
        // blog title  line hieght
        if( !empty($suitbuilder_blog_title_line_height )  ){
        ?>
            article.post .entry-content h2{
                line-height: <?php echo esc_attr( $suitbuilder_blog_title_line_height  ); ?>;
            }
        <?php    
        }

        //
        ?>
    <?php
    $style = ob_get_clean();
    return $style;
}
endif;

