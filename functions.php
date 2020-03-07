<?php

function ScanWP_enqueue() {
	wp_enqueue_style('Montserrat', "https://fonts.googleapis.com/css?family=Montserrat:700|Montserrat:normal|Montserrat:300");
	wp_enqueue_style('Lora', "https://fonts.googleapis.com/css?family=Lora:400,700&display=swap&subset=cyrillic");
    wp_enqueue_style('PT Serif', "https://fonts.googleapis.com/css?family=PT+Serif:400,700&display=swap&subset=cyrillic");
    wp_enqueue_style('PT Sans', "https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap&subset=cyrillic");
    wp_enqueue_style('PT Serif Caption', "https://fonts.googleapis.com/css?family=PT+Serif+Caption&display=swap");
    wp_enqueue_style('fontawesome', "https://use.fontawesome.com/releases/v5.11.2/css/all.css");
	wp_enqueue_style('bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
	
	wp_enqueue_style('style', get_template_directory_uri() . '/assets/dist/css/style.css');
	
    wp_enqueue_script( 'navmenu-stellarnav', get_template_directory_uri() . '/assets/dist/js/stellarnav.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/assets/dist/js/main.js', array('jquery'), '', true );
    
    wp_enqueue_script( 'bootstrapcdn', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), '', true );
}
add_action('wp_enqueue_scripts', 'ScanWP_enqueue');

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

register_nav_menus( array(
		'header' => 'Custom Primary Menu',
	) );

function ScanWP_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer 1',
		'id'            => 'footer_1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="ttl">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => 'Footer 2',
		'id'            => 'footer_2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="ttl">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => 'Footer 3',
		'id'            => 'footer_3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="ttl">',
		'after_title'   => '</h4>',
	) );  
	register_sidebar( array(
		'name'          => 'Footer 4',
		'id'            => 'footer_4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="ttl">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'ScanWP_widgets_init' );


//Breadcrumbes Navigation
require get_template_directory() . '/functions-includes/breadcrumb-navigation.php';

//Custom Post Type "cities" Градове 
require get_template_directory() . '/functions-includes/custom-post-type-cities.php';

//Custom Post Type "references"
require get_template_directory() . '/functions-includes/custom-post-type-references.php';

//List Child pages of Page Products in the sidebar
require get_template_directory() . '/functions-includes/list-child-pages.php';



//CEO Images for page News
add_image_size('index-post-size', 224, 168, true);

// Changing excerpt more
function new_excerpt_more($more) {
global $post;
return '…</p><a class="button" href="'. get_permalink($post->ID) . '">' . 'Прочети повече' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


//Add Featured Thumbnail to Admin Post Columns
function custom_columns( $columns ) {
    $columns = array(
		'cb' => '<input type="checkbox" />',
        'title' => 'Title',
        'featured_image' => 'Image',
        'comments' => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
        'date' => 'Date'
     );
    return $columns;
}
add_filter('manage_posts_columns' , 'custom_columns');

function custom_columns_data( $column, $post_id ) {
    switch ( $column ) {
    case 'featured_image':
        the_post_thumbnail( array(50, 50) );
        break;
    }
}
add_action( 'manage_posts_custom_column' , 'custom_columns_data', 10, 2 ); 

//Redirect Archive /cities to /галерия
function redirect_cpt_archive() {
    if( is_post_type_archive( 'cities' ) ) {
        wp_redirect( home_url( '/галерия' ), 301 );
        exit();
    }
}
add_action( 'template_redirect', 'redirect_cpt_archive' );

add_filter( 'widget_text', 'do_shortcode' );

