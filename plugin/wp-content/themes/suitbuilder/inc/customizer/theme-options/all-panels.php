<?php 
global $suitbuilder_panels;

//create a panle for suitbuilder theme
$suitbuilder_panels['suitbuilder-all-panels'] = array(
	'title'			=> esc_html__('Theme Options','suitbuilder'),
	'priority'		=> 3
);


//site identity 
require get_template_directory() . '/inc/customizer/theme-options/site-identity.php';

//Main header 
require get_template_directory() . '/inc/customizer/theme-options/header.php';

//Breadcrumb options 
require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

//Blog options 
require get_template_directory() . '/inc/customizer/theme-options/blog.php';

//Sidebar setting options 
require get_template_directory() . '/inc/customizer/theme-options/sidebar-setting.php';

//genral setting options 
require get_template_directory() . '/inc/customizer/theme-options/general-setting.php';

//inner header setting options 
require get_template_directory() . '/inc/customizer/theme-options/inner-header.php';

//Preloder options 
require get_template_directory() . '/inc/customizer/theme-options/preloader.php';

//footer
require get_template_directory() . '/inc/customizer/theme-options/footer.php';

//Colors
require get_template_directory() . '/inc/customizer/theme-options/color.php';

//Fonts
require get_template_directory() . '/inc/customizer/theme-options/font.php';