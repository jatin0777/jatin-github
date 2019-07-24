<?php

function r_activate_plugin(){
	if( version_compare(get_bloginfo('version'), '4.2','<') ){
		wp_die( __('You must update wordpress version','recipie') );
	}



	global $wpdb;
	$createSQL = "

	CREATE TABLE IF NOT EXISTS `". $wpdb->prefix ."recipie_ratings` (
  `id` bigint(20) unsigned NOT NULL,
  `recipie_id` bigint(20) unsigned NOT NULL,
  `rating` float unsigned NOT NULL,
  `user_id` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB ".$wpdb->get_charset_collate()." AUTO_INCREMENT=1; 
";



 require (ABSPATH."wp-admin/includes/upgrade.php");
 dbDelta( $createSQL );

 wp_schedule_event(time(),'daily','r_daily_recipie_hook');

}
