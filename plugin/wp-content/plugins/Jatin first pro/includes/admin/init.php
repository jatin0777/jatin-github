<?php

function recipie_admin_init() {
	include ('create-metaboxes.php');
	include ('recipie-options.php');
	include ('enqueue.php');

	add_action('add_meta_boxes_recipie','r_create_metaboxes');
	add_action( 'admin_enqueue_scripts', 'r_admin_enqueue' );
}