<?php
function custom_post_type_references() {
    $labels = array(
      'name'               => _x( 'Референции', 'post type general name' ),
      'singular_name'      => _x( 'Референция', 'post type singular name' ),
      'add_new'            => _x( 'Добави референция', 'Reference' ),
      'add_new_item'       => __( 'Добави нова референция' ),
      'edit_item'          => __( 'Редактирай референцията' ),
      'new_item'           => __( 'Нова референция' ),
      'all_items'          => __( 'Всички референции' ),
      'view_item'          => __( 'Прегледай референцията' ),
      'search_items'       => __( 'Търси референции' ),
      'not_found'          => __( 'Няма открида референция' ),
      'not_found_in_trash' => __( 'Няма открита референция в кошчето за боклук' ), 
      'parent_item_colon'  => '',
      'menu_name'          => 'Референции'
    );
    $args = array(
      'labels'        => $labels,
      'public'        => true,
      'menu_position' => 5,
      'show_in_rest' => true,
      'has_archive'   => true,
      'rewrite'            => array( 'slug' => 'references' ),
      'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    );
    register_post_type( 'references', $args ); 
  }
  add_action( 'init', 'custom_post_type_references' );


function easytuts_taxonomies_references() {
  $labels = array(
      'name'              => _x( 'Reference Categories', 'taxonomy general name' ),
      'singular_name'     => _x( 'Reference Category', 'taxonomy singular name' ),
      'search_items'      => __( 'Search Reference Categories' ),
      'all_items'         => __( 'All References Categories' ),
      'parent_item'       => __( 'Parent Reference Category' ),
      'parent_item_colon' => __( 'Parent Reference Category:' ),
      'edit_item'         => __( 'Edit Reference Category' ), 
      'update_item'       => __( 'Update Reference Category' ),
      'add_new_item'      => __( 'Add New Reference Category' ),
      'new_item_name'     => __( 'New Reference Category' ),
      'menu_name'         => __( 'Reference Categories' ),
  );
  $args = array(
      'labels' => $labels,
      'hierarchical' => true,
  );
  register_taxonomy( 'leagues', 'references', $args );
  }
  add_action( 'init', 'easytuts_taxonomies_references', 0 );
  