<?php

function r_create_metaboxes() {
	add_meta_box(
		'r_recipie_options_mb',
		__('Recipie Options','recipie'),
		'r_recipie_options_mb',
		'recipie',
		'normal',
		'high'
	);
}