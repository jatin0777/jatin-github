<?php

function r_recipie_creator_shortcode(){
	$creatorHtml= file_get_contents('creator-template.php',true); 
	$editorHtml = r_generate_content_editor();
	$creatorHtml = str_replace('CONTENT_EDITOR',$editorHtml,$creatorHtml);
	return $creatorHtml;
}



function r_generate_content_editor(){
	ob_start();
	wp_editor('','r_content_editor');
	$editor_contents =  ob_get_clean();
	return $editor_contents;
}