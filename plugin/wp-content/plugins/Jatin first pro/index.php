<?php
/**
*Plugin Name: Jatin first pro
*Description: A simple Wordpress plugin that allows user to add some content
*Version: 1.0
*Author: Jatin Pandita
*/

if(!function_exists('add_action')){
	echo "Not allowed to access";
	exit();
}
//Setup
define( 'RECIPIE_PLUGIN_URL', __FILE__ );



//Includes
include ('includes/activate.php');
include ('includes/init.php');
include ('includes/admin/init.php');
include ('process/save-post.php');
include ('process/filter-content.php');
include ('includes/front/enqueue.php');
include ('process/rate-recipie.php');
include (dirname(RECIPIE_PLUGIN_URL).'/includes/widgets.php');
include (dirname(RECIPIE_PLUGIN_URL).'/includes/widgets/daily-recipie.php');
include ('includes/cron.php');
include ('includes/deactivate.php');
include ('includes/shortcodes/creator.php');
include ('process/submit-user-recipie.php');

//Hooks
register_activation_hook( __FILE__,'r_activate_plugin' );
register_deactivation_hook( __FILE__,'r_deactivate_plugin');
add_action('init','recipie_init');
add_action('admin_init','recipie_admin_init');
add_action('save_post_recipie','r_save_post_admin',10,3);
add_filter( 'the_content','r_filter_recipie_content' );
add_action( 'wp_enqueue_scripts','r_enqueue_scripts',9999 );
add_action('wp_ajax_r_rate_recipie','r_rate_recipie');
add_action('wp_ajax_nopriv_r_rate_recipie','r_rate_recipie');
add_action('widgets_init','r_widgets_init');
add_action('r_daily_recipie_hook','r_generate_daily_recipie');
add_action('wp_ajax_r_submit_user_recipie','r_submit_user_recipie');
add_action('wp_ajax_nopriv_r_submit_user_recipie','r_submit_user_recipie');

//Shortcodes
add_shortcode( 'recipie_creator','r_recipie_creator_shortcode' );

?>

