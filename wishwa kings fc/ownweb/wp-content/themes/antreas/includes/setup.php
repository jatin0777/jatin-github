<?php

add_filter( 'antreas_background_args', 'antreas_background_args' );
function antreas_background_args( $data ) {
	$data = array(
		'default-color'      => 'eeeeee',
		'default-repeat'     => 'no-repeat',
		'default-position-x' => 'center',
		'default-attachment' => 'fixed',
		'default-size'       => 'cover',
	);

	return $data;
}
