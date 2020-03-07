<?php

function easytuts_cities_post() {
$labels = array(
    'name'               => _x( 'cities', 'post type general name' ),
    'singular_name'      => _x( 'Град', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'град' ),
    'add_new_item'       => __( 'Add New Градове' ),
    'edit_item'          => __( 'Edit Град' ),
    'new_item'           => __( 'New Град' ),
    'all_items'          => __( 'All Градове' ),
    'view_item'          => __( 'View Град' ),
    'search_items'       => __( 'Search Градове' ),
    'not_found'          => __( 'No град found' ),
    'not_found_in_trash' => __( 'No град found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Градове'
);
$args = array(
    'labels'        => $labels,
    'description'   => 'Holds cities and city specific data',
    'public'        => true,
    'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
    'menu_position' => 5,
    'has_archive'   => true,
    'rewrite'            => array( 'slug' => 'cities' ),
    'show_in_rest' => true,
   'supports' => array('title', 'editor', 'thumbnail')
);
register_post_type( 'cities', $args ); 
}
add_action( 'init', 'easytuts_cities_post' );


function easytuts_taxonomies_cities() {
$labels = array(
    'name'              => _x( 'City Categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'City Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search City Categories' ),
    'all_items'         => __( 'All Cities Categories' ),
    'parent_item'       => __( 'Parent City Category' ),
    'parent_item_colon' => __( 'Parent City Category:' ),
    'edit_item'         => __( 'Edit City Category' ), 
    'update_item'       => __( 'Update City Category' ),
    'add_new_item'      => __( 'Add New City Category' ),
    'new_item_name'     => __( 'New City Category' ),
    'menu_name'         => __( 'City Categories' ),
);
$args = array(
    'labels' => $labels,
    'hierarchical' => true,
);
register_taxonomy( 'leagues', 'cities', $args );
}
add_action( 'init', 'easytuts_taxonomies_cities', 0 );

