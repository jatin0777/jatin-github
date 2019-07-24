<?php


function r_enqueue_scripts() {
	wp_register_style('r_rateit',plugins_url('assets/rateit/scripts/rateit.css',RECIPIE_PLUGIN_URL));
	wp_enqueue_style('r_rateit');

	wp_register_script('r_rateit',plugins_url('assets/rateit/scripts/jquery.rateit.min.js',RECIPIE_PLUGIN_URL),array(),'1.0.0',false);
	wp_register_script('r_main',plugins_url('assets/rateit/scripts/main.js',RECIPIE_PLUGIN_URL),array(),'1.0.0',false);

		wp_localize_script("r_main","recipie_obj",array(

			'ajax_url'  => admin_url("admin-ajax.php")

		));

	wp_enqueue_script('r_rateit');
	wp_enqueue_script('r_main');
}