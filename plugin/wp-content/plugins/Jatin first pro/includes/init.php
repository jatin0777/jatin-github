<?php

function recipie_init() {
	$labels = array(
		'name'               => __( 'recipies','recipie' ),
		'singular_name'      => __( 'recipie','recipie' ),
		'menu_name'          => __( 'recipies','recipie' ),
		'name_admin_bar'     => __( 'recipie','recipie' ),
		'add_new'            => __( 'Add New','recipie' ),
		'add_new_item'       => __( 'Add New recipie', 'recipie' ),
		'new_item'           => __( 'New recipie', 'recipie' ),
		'edit_item'          => __( 'Edit recipie', 'recipie' ),
		'view_item'          => __( 'View recipie', 'recipie' ),
		'all_items'          => __( 'All recipies', 'recipie' ),
		'search_items'       => __( 'Search recipies', 'recipie' ),
		'parent_item_colon'  => __( 'Parent recipies:', 'recipie' ),
		'not_found'          => __( 'No recipies found.', 'recipie' ),
		'not_found_in_trash' => __( 'No recipies found in Trash.', 'recipie' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'A custom post type', 'recipie' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'recipie' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		'taxonomies'         =>array('category','post_tag')
	);
	register_post_type('recipie', $args);
}