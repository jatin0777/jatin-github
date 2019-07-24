<?php

function r_filter_recipie_content($content){
	if(!is_singular('recipie')){
		return $content;
	}

	global $post,$wpdb;
	$recipie_data = get_post_meta($post->ID,'recipie_data',true);
	$recipie_html = file_get_contents( 'recipie-template.php',true );
	$recipie_html = str_replace("INGREDIENTS_PH", $recipie_data['ingredients'], $recipie_html );
	$recipie_html = str_replace("COOKING_PH", $recipie_data['time'], $recipie_html );
	$recipie_html = str_replace("UTENSILS_PH", $recipie_data['utensils'], $recipie_html );
	$recipie_html = str_replace("LEVEL_PH", $recipie_data['level'], $recipie_html );
	$recipie_html = str_replace("TYPE_PH", $recipie_data['meal_type'], $recipie_html ); 

	$recipie_html = str_replace('INGREDIENTS_I18N', __('Ingredients','recipie'), $recipie_html );
	$recipie_html = str_replace('COOKING_TIME_I18N', __('Cooking Time','recipie'), $recipie_html );
	$recipie_html = str_replace('UTENSILS_I18N', __('Utensils Required','recipie'), $recipie_html );
	$recipie_html = str_replace('LEVEL_I18N', __('Level','recipie'), $recipie_html );
	$recipie_html = str_replace('TYPE_I18N', __('Type','recipie'), $recipie_html ); 
	$recipie_html = str_replace('RATE_I18N', __('Rating','recipie'), $recipie_html ); 
	$recipie_html = str_replace('RECIPIE_ID', $post->ID,$recipie_html);
	$recipie_html = str_replace('RECIPIE_RATING',$recipie_data['rating'],$recipie_html);

	$user_ip      = $_SERVER['REMOTE_ADDR'];
	$rating_count = $wpdb->get_var("SELECT COUNT(*) FROM `". $wpdb->prefix . "recipie_ratings` WHERE recipie_id='".$post->ID."'AND user_id='".$user_ip."'");



	if($rating_count > 0){
		$recipie_html = str_replace('READONLY_PLACEHOLDER','data-rateit-readonly="true"',$recipie_html);
	}else{
		$recipie_html = str_replace('READONLY_PLACEHOLDER','',$recipie_html);
	}

	return $recipie_html . $content;
}