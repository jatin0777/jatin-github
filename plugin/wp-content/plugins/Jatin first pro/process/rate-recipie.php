<?php

function r_rate_recipie() {
	global $wpdb;
	$response= array('status' => 1);
	$post_id = absint($_POST['rid']);
	$rating  = round($_POST['rating'],1);
	$user_ip = $_SERVER['REMOTE_ADDR'];
	


	$wpdb->insert(
		$wpdb->prefix.'recipie_ratings',
		array(
			'recipie_id'=> $post_id,
			'rating'=>$rating,
			'user_id'=>$user_ip
		),
		array(
			'%d','%f','%s'
		)
	);


	$recipie_data=get_post_meta($post_id,'recipie_data',true);
	$recipie_data['rating_count']++;
	$recipie_data['rating'] = round($wpdb->get_var("SELECT AVG(`rating`) FROM `". $wpdb->prefix ."recipie_ratings` WHERE recipie_id='".$post_id."'" ),1);
	update_post_meta($post_id,'recipie_data',$recipie_data);


	do_action( 'recipie_rating', array(
	    'id' => $post_id,
        'rating' => $rating,
        'ip' => $user_ip
    ));

	$response['status']=2;
	wp_send_json($response);

}