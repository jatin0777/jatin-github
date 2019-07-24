<?php 
global $suitbuilder_defaluts;

if( !function_exists('suitbuilder_all_defalts_values') ) :
	/**
	* All Defaults values
	*
	* @since suitbuilder 1.0.0
	*
	* @param null
	* @return $suitbuilder_defaluts
	*/
	function suitbuilder_all_defalts_values(){
		$suitbuilder_defaluts = array();

		//** =========== defaults value for site identity ====================== **//
		$suitbuilder_defaluts['suitbuilder-site-identity-title-font-size']		= '24';
		$suitbuilder_defaluts['suitbuilder-site-identity-title-font-weight']		= '900';
		$suitbuilder_defaluts['suitbuilder-site-identity-title-transform']		= 'capitalize';
		$suitbuilder_defaluts['suitbuilder-site-identity-color']					= '#000';
		$suitbuilder_defaluts['suitbuilder-site-idenity-font-family']				= 'Lato:400,300,400italic,900,700';
		$suitbuilder_defaluts['suitbuilder-menu-font-family']	  					= 'Lato:400,300,400italic,900,700';

		//** =============================== main header ========================= **// 
		$suitbuilder_defaluts['suitbuilder-enable-main-header']					= 1;
		$suitbuilder_defaluts['suitbuilder-scroll-fixed-main-header']				= 0;
		$suitbuilder_defaluts['suitbuilder-transparent-main-header']				= 0;
		$suitbuilder_defaluts['suitbuilder-main-header-button-text']				= esc_html__('Buy Now','suitbuilder');
		$suitbuilder_defaluts['suitbuilder-main-header-button-url']				= '#';
		$suitbuilder_defaluts['suitbuilder-header-button-bg-options']				= 'button-bg';
		$suitbuilder_defaluts['suitbuilder-header-button-bg-color']				= '#1abc9c';
		$suitbuilder_defaluts['suitbuilder-header-button-text-color']				= '#fff';
		$suitbuilder_defaluts['suitbuilder-header-button-hover-bg-color']			= '#039477';
		$suitbuilder_defaluts['suitbuilder-header-button-hover-text-color']		= '#fff';
		$suitbuilder_defaluts['suitbuilder-button-title-font']					= 'Lato:400,300,400italic,900,700';
		$suitbuilder_defaluts['suitbuilder-button-title-font-size']				= 16;
		$suitbuilder_defaluts['suitbuilder-menu-advance-option-checkbox']			= 0;
		$suitbuilder_defaluts['suitbuilder-main-header-bg-color']					= '#fff';
		$suitbuilder_defaluts['suitbuilder-main-header-text-color']				= '#000';
		$suitbuilder_defaluts['suitbuilder-header-menu-font-size']				= '16';
		$suitbuilder_defaluts['suitbuilder-header-menu-font-weight']				= '500';
		$suitbuilder_defaluts['suitbuilder-header-menu-transform']				= 'capitalize';


		//** ============================ inner header ======================== **//
		$suitbuilder_defaluts['suitbuilder-enable-inner-header']			 		= 1;
		$suitbuilder_defaluts['suitbuilder-inner-header-title-font-size'] 		= 24;
		$suitbuilder_defaluts['suitbuilder-inner-header-title-font-weight'] 		= 600;
		$suitbuilder_defaluts['suitbuilder-inner-header-title-transform'] 		= 'capitalize';
		$suitbuilder_defaluts['suitbuilder-inner-header-padding'] 				= 80;


		//** ================================= breadcrumb option ===================== **//
		$suitbuilder_defaluts['suitbuilder-enable-breadcrumb']					= 1;
		$suitbuilder_defaluts['suitbuilder-breadcrumb-margin-bottom']				= '30';

		//** ============================== Latest bolg ========================= **//
		$suitbuilder_defaluts['suitbuilder-blog-header-title-text']				= esc_html__('Latest Blog','suitbuilder');
		$suitbuilder_defaluts['suitbuilder-latest-blog-excerpt-lenght']			= 35;
		$suitbuilder_defaluts['suitbuilder-latest-blog-number-post']				= 6;
		$suitbuilder_defaluts['suitbuilder-latest-blog-enable-image']				= 1;
		$suitbuilder_defaluts['suitbuilder-latest-blog-enable-title']				= 1;
		$suitbuilder_defaluts['suitbuilder-blog-padding-icon']					= 'padding-desktop';

		$suitbuilder_defaluts['suitbuilder-blog-title-padding-top']				= 0;
		$suitbuilder_defaluts['suitbuilder-blog-title-padding-right']				= 0;
		$suitbuilder_defaluts['suitbuilder-blog-title-padding-bottom']			= 0;
		$suitbuilder_defaluts['suitbuilder-blog-title-padding-left']				= 0;

		$suitbuilder_defaluts['suitbuilder-blog-title-padding-top-mb']			= 0;
		$suitbuilder_defaluts['suitbuilder-blog-title-padding-right-mb']			= 0;
		$suitbuilder_defaluts['suitbuilder-blog-title-padding-bottom-mb']			= 0;
		$suitbuilder_defaluts['suitbuilder-blog-title-padding-left-mb']			= 0;

		$suitbuilder_defaluts['suitbuilder-blog-margin-icon']						= 'margin-desktop';
		$suitbuilder_defaluts['suitbuilder-blog-title-margin-top']				= 0;
		$suitbuilder_defaluts['suitbuilder-blog-title-margin-right']				= 0;
		$suitbuilder_defaluts['suitbuilder-blog-title-margin-bottom']				= 5;
		$suitbuilder_defaluts['suitbuilder-blog-title-margin-left']				= 0;

		$suitbuilder_defaluts['suitbuilder-blog-title-margin-top-mb']				= 0;
		$suitbuilder_defaluts['suitbuilder-blog-title-margin-right-mb']			= 0;
		$suitbuilder_defaluts['suitbuilder-blog-title-margin-bottom-mb']			= 5;
		$suitbuilder_defaluts['suitbuilder-blog-title-margin-left-mb']			= 0;

		$suitbuilder_defaluts['suitbuilder-blog-title-line-height']				= 1.5;
		$suitbuilder_defaluts['suitbuilder-latest-blog-enable-excerpt']			= 1;
		$suitbuilder_defaluts['suitbuilder-latest-blog-enable-date-author-cat']	= 1;
		$suitbuilder_defaluts['suitbuilder-latest-blog-enable-button']			= 1;

		$suitbuilder_defaluts['suitbuilder-archive-blog-order']           		= 'blog-title-img-content';
		$suitbuilder_defaluts['suitbuilder-latest-blog-pagination']				= 'numeric';
		$suitbuilder_defaluts['suitbuilder-latest-blog-layout']					= 'blog-list';

		$suitbuilder_defaluts['suitbuilder-blog-title-transform'] 				= 'capitalize';
		$suitbuilder_defaluts['suitbuilder-blog-title-font-size'] 				= 18;
		$suitbuilder_defaluts['suitbuilder-blog-title-font-weight'] 				= 600;
		$suitbuilder_defaluts['suitbuilder-blog-section-bg-color'] 				='#fff';
		$suitbuilder_defaluts['suitbuilder-blog-section-content-color'] 			='#8e9696';
		$suitbuilder_defaluts['suitbuilder-blog-section-title-color'] 			='#000';
		$suitbuilder_defaluts['suitbuilder-blog-reset-option']					= '';


		//** ========================= genaral setting ===================== **//
		$suitbuilder_defaluts['suitbuilder-enable-static-page'] 					= 0;
		$suitbuilder_defaluts['suitbuilder-single-post-image-align']      		= 'full';
		$suitbuilder_defaluts['suitbuilder-archive-image-align']          		= 'full';
		$suitbuilder_defaluts['suitbuilder-archive-layout']               		= 'thumbnail-and-excerpt';
		$suitbuilder_defaluts['suitbuilder-site-layout-test']              		= 'wide-layout';
		$suitbuilder_defaluts['suitbuilder-container-width-test']              	= 1920;
		$suitbuilder_defaluts['suitbuilder-enable-search-button']				= 1;
		$suitbuilder_defaluts['suitbuilder-enable-scroll-to-top']				= 1;



		//** ========================= sidebar option ========================= **//
		$suitbuilder_defaluts['suitbuilder-default-layout']               		= 'no-sidebar';
		$suitbuilder_defaluts['suitbuilder-sidebar-background-color']				= '#f9f9f9';
		$suitbuilder_defaluts['suitbuilder-widget-background-color']				= '#fff';
		$suitbuilder_defaluts['suitbuilder-widget-title-color']					= '#000';
		$suitbuilder_defaluts['suitbuilder-widget-content-color']					= '#8e9696';
		$suitbuilder_defaluts['suitbuilder-widget-title-font-size']				= '18';
		$suitbuilder_defaluts['suitbuilder-widget-title-font-weight']				= '600';
		$suitbuilder_defaluts['suitbuilder-widget-title-transform']				= 'capitalize';

		$suitbuilder_defaluts['suitbuilder-widget-padding-icon']					= 'w-padding-desktop';
		$suitbuilder_defaluts['suitbuilder-widget-title-padding-top']				= 0;
		$suitbuilder_defaluts['suitbuilder-widget-title-padding-bottom']			= 10;
		$suitbuilder_defaluts['suitbuilder-widget-title-padding-left']			= 0;
		$suitbuilder_defaluts['suitbuilder-widget-title-padding-right']			= 0;

		$suitbuilder_defaluts['suitbuilder-widget-title-padding-top-mb']			= 0;
		$suitbuilder_defaluts['suitbuilder-widget-title-padding-bottom-mb']		= 10;
		$suitbuilder_defaluts['suitbuilder-widget-title-padding-left-mb']			= 0;
		$suitbuilder_defaluts['suitbuilder-widget-title-padding-right-mb']		= 0;

		$suitbuilder_defaluts['suitbuilder-widget-margin-icon']					= 'w-margin-desktop';
		$suitbuilder_defaluts['suitbuilder-widget-title-margin-top']				= 0;
		$suitbuilder_defaluts['suitbuilder-widget-title-margin-bottom']			= 5;
		$suitbuilder_defaluts['suitbuilder-widget-title-margin-left']				= 0;
		$suitbuilder_defaluts['suitbuilder-widget-title-margin-right']			= 0;

		$suitbuilder_defaluts['suitbuilder-widget-title-margin-top-mb']			= 0;
		$suitbuilder_defaluts['suitbuilder-widget-title-margin-bottom-mb']		= 5;
		$suitbuilder_defaluts['suitbuilder-widget-title-margin-left-mb']			= 0;
		$suitbuilder_defaluts['suitbuilder-widget-title-margin-right-mb']			= 0;

		$suitbuilder_defaluts['suitbuilder-widget-title-line-height']				= 1.5;
		$suitbuilder_defaluts['suitbuilder-sidebar-reset-option']					= '';

		//** ================================== preloader Section ==================== **//
		$suitbuilder_defaluts['suitbuilder-enbale-preloader']						= 1;

		//** ================================== footer Section =================== **//
		$suitbuilder_defaluts['suitbuilder-enable-main-footer']					= 1;
		$suitbuilder_defaluts['suitbuilder-copyright-text']						= esc_html__('Copyright &copy; All right reserved.','suitbuilder');

		$suitbuilder_defaluts['suitbuilder-footer-enable-social-link']			= 1;
		$suitbuilder_defaluts['suitbuilder-footer-background-color']				= '#28292a';
		$suitbuilder_defaluts['suitbuilder-footer-content-color']					= '#a8a8a8';
		$suitbuilder_defaluts['suitbuilder-footer-title-color']					= '#fff';

		$suitbuilder_defaluts['suitbuilder-ft-widget-title-line-height']			= 1.5;
		$suitbuilder_defaluts['suitbuilder-footer-widget-title-font-size']		= '18';
		$suitbuilder_defaluts['suitbuilder-footer-widget-title-font-weight']		= '600';
		$suitbuilder_defaluts['suitbuilder-footer-widget-title-transform']		= 'capitalize';


		//** ================================ color Section ========================= **//
		$suitbuilder_defaluts['suitbuilder-primary-color']						= '#1abc9c';
		$suitbuilder_defaluts['suitbuilder-secondary-color']						= '#039477';

		//** ============================= font Secction ============================= **//
		$suitbuilder_defaluts['suitbuilder-primary-font-family']					= 'Lato:400,300,400italic,900,700';
		$suitbuilder_defaluts['suitbuilder-secondary-font-family']				= 'Lato:400,300,400italic,900,700';

 
		$suitbuilder_default = apply_filters('suitbuilder_defaults_value','suitbuilder_all_defalts_values');

		return $suitbuilder_defaluts;
	}
endif;