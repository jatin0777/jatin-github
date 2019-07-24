<?php

function r_submit_user_recipie() {
	$response = array('status'=>1);


	if(empty($_POST['ingredients']) || empty($_POST['time']) || empty($_POST['utensils']) || empty($_POST['level']) || empty($_POST['meal_type']) || empty($_POST['title']))
	{
		wp_send_json($response);
	}



	$title                           = sanitize_text_field($_POST['title']);
	$content                         = wp_kses_post($_POST['content']);
	$recipie_data                    = array();
	$recipie_data['ingredients']     = sanitize_text_field($_POST['ingredients']);
	$recipie_data['time']            = sanitize_text_field($_POST['time']);
	$recipie_data['utensils']        = sanitize_text_field($_POST['utensils']);
	$recipie_data['level']           = sanitize_text_field($_POST['level']);
	$recipie_data['meal_type']       = sanitize_text_field($_POST['meal_type']);
	$recipie_data['rating']          = 0;
	$recipie_data['rating_count']    = 0;


	$post_id = wp_insert_post(array(
		'post_content' => $content,
		'post_name' => $title,
		'post_title' => $title,
		'post_status' => 'pending',
		'post_type' => 'recipie',
	));

	update_post_meta( $post_id ,'recipie_data' ,$recipie_data);
	$response['status']  = 2;
	wp_send_json($response); 

}