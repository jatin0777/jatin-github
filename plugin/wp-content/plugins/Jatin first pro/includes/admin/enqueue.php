<?php


function r_admin_enqueue(){
	global $typenow;

	if($typenow !== 'recipie'){
		return;
	}

	wp_register_style( 'r_bootstrap', plugins_url('/assets/bootstrap.css',RECIPIE_PLUGIN_URL));
	wp_enqueue_style( 'r_bootstrap' );
}