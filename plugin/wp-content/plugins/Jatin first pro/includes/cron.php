<?php

function r_generate_daily_recipie(){
	global $wpdb;
	$recipie_id = $wpdb->get_var("SELECT `ID` FROM `".$wpdb->posts ."` WHERE post_status='publish' AND post_type = 'recipie' ORDER BY rand() LIMIT 1");


	set_transient('r_daily_recipie',$recipie_id,60 * 60 *24);
}