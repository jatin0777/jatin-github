<?php

function r_save_post_admin($post_id,$post,$update){
	if(!$update){
		return;
	}
	$recipie_data = array();
	$recipie_data['ingredients'] = sanitize_text_field($_POST['r_inputIngredients']);
	$recipie_data['time'] = sanitize_text_field($_POST['r_inputTime']);
	$recipie_data['utensils'] = sanitize_text_field($_POST['r_inputUtensils']);
	$recipie_data['level'] = sanitize_text_field($_POST['r_inputLevel']);
	$recipie_data['meal_type'] = sanitize_text_field($_POST['r_inputMealType']);
	$recipie_data['rating'] = 0;
	$recipie_data['rating_count'] = 0;

	update_post_meta($post_id,'recipie_data',$recipie_data);
}