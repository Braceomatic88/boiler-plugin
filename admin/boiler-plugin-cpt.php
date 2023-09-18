<?php

add_action( 'init', 'boiler_plugin_cpt' );	 
function boiler_plugin_cpt() {

	$labels = array(
		'name'                  => _x( 'Boiler Plugins', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Boiler Plugin', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Boiler Plugins', 'text_domain' ),
		'name_admin_bar'        => __( 'Boiler Plugins', 'text_domain' ),
		'archives'              => __( 'Boiler Plugin Archives', 'text_domain' ),
		'attributes'            => __( 'Boiler Plugin Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Boiler Plugin:', 'text_domain' ),
		'all_items'             => __( 'All Boiler Plugins', 'text_domain' ),
		'add_new_item'          => __( 'Add New Boiler Plugin', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Boiler Plugin', 'text_domain' ),
		'edit_item'             => __( 'Edit Boiler Plugin', 'text_domain' ),
		'update_item'           => __( 'Update Boiler Plugin', 'text_domain' ),
		'view_item'             => __( 'View Boiler Plugin', 'text_domain' ),
		'view_items'            => __( 'View Boiler Plugins', 'text_domain' ),
		'search_items'          => __( 'Search Boiler Plugin', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Boiler Plugin', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Boiler Plugin', 'text_domain' ),
		'items_list'            => __( 'Boiler Plugins list', 'text_domain' ),
		'items_list_navigation' => __( 'Boiler Plugins list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Boiler Plugins list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Boiler Plugin', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'editor' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'query_var'				=> true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-buddicons-replies',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'boiler_plugin', $args );
}
