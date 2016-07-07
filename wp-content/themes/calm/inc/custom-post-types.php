<?php

/*
 * Calm Custom Post Types
 */



// Portfolio Post Type

function portfolio_post_type() {

	$labels = array(
		'name'                => _x( 'Portfolio Items', 'Post Type General Name', 'calm' ),
		'singular_name'       => _x( 'Portfolio Item', 'Post Type Singular Name', 'calm' ),
		'menu_name'           => __( 'Portfolio Items', 'calm' ),
		'parent_item_colon'   => __( 'Parent Item:', 'calm' ),
		'all_items'           => __( 'All Items', 'calm' ),
		'view_item'           => __( 'View Item', 'calm' ),
		'add_new_item'        => __( 'Add New Portfolio Item', 'calm' ),
		'add_new'             => __( 'Add New', 'calm' ),
		'edit_item'           => __( 'Edit Item', 'calm' ),
		'update_item'         => __( 'Update Item', 'calm' ),
		'search_items'        => __( 'Search Item', 'calm' ),
		'not_found'           => __( 'Not found', 'calm' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'calm' ),
	);

	$args = array(
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'					=> array( 'port-cat' ),
		'public'							=> true,
		'capability_type'     => 'post',
	);

	register_post_type( 'portfolio', $args );

}

add_action( 'init', 'portfolio_post_type', 0 );



// Portfolio Post Taxonomy

function port_cats() {
	$lables = array(
		'name' 							=> _x('Portfolio Categories', 'taxonomy general name', 'calm'),
		'singular_name' 		=> _x('Portfolio Category', 'taxonomy singular name', 'calm'),
		'search_items'      => __( 'Search Portfolio Categories', 'calm' ),
		'all_items'         => __( 'All Portfolio Categories', 'calm' ),
		'parent_item'       => __( 'Parent Portfolio Category', 'calm' ),
		'parent_item_colon' => __( 'Parent Portfolio Category:', 'calm' ),
		'edit_item'         => __( 'Edit Porfolio Category', 'calm' ),
		'update_item'       => __( 'Update Portfolio Category', 'calm' ),
		'add_new_item'      => __( 'Add New Portfolio Category', 'calm' ),
		'new_item_name'     => __( 'New Portfolio Category Name', 'calm' ),
		'menu_name'         => __( 'Portfolio Categories', 'calm' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $lables,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'port-cat' ),
	);

	register_taxonomy( 'port-cat', 'portfolio', $args );

}

add_action( 'init', 'port_cats', 0 );
