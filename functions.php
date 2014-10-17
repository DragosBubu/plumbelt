<?php

/*
*	Require Once
*/
require_once ( 'includes/custom-functions.php' );
require_once ( 'includes/customizer.php' );

/*
*	Theme Support
*/
add_theme_support( 'post-thumbnails' ); // Post Thumbnails
add_theme_support( 'automatic-feed-links' ); // Automatic Feed Links

/*
*	Content Width
*/
if ( ! isset( $content_width ) ) $content_width = 636;

/*
*	WP Enqueue Style Plumbelt
*/
function wp_enqueue_style_plumbelt() {
    wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '1.0', false );
    wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css', array(), '1.0' );
    wp_enqueue_style( 'font-family-archivo-narrow', 'http://fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic' );
    wp_enqueue_style( 'font-family-istok-web', 'http://fonts.googleapis.com/css?family=Istok+Web:400,700,400italic,700italic' );
    wp_enqueue_style( 'font-family-source-sans-pro', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' );
}

add_action( 'wp_enqueue_scripts', 'wp_enqueue_style_plumbelt' );

/*
*	WP Enqueue Script Movatique
*/
function wp_enqueue_script_plumbelt() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/jquery.masonry.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.0', true );
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
}

add_action( 'wp_enqueue_scripts', 'wp_enqueue_script_plumbelt' );

/*
*	Navigation Menu
*/
function navigation_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'navigation_menu' );

/*
*	General Sidebar
*/
function general_sidebar() {

	$args = array(
		'id'            => 'general_sidebar',
		'name'          => __( 'General Sidebar', 'ti' ),
		'description'   => __( 'This sidebar will appear in blog page.', 'ti' ),
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		'before_widget' => '<div id="%1$s" class="widget cf %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );

}

add_action( 'widgets_init', 'general_sidebar' );

/*
*	Custom Post Type: Testimonials
*/
function custom_post_type_testimonials() {

	$labels = array(
		'name'                => _x( 'Testimonials', 'Post Type General Name', 'ti' ),
		'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'ti' ),
		'menu_name'           => __( 'Testimonial', 'ti' ),
		'parent_item_colon'   => __( 'Parent Testimonial:', 'ti' ),
		'all_items'           => __( 'All Testimonials', 'ti' ),
		'view_item'           => __( 'View Testimonial', 'ti' ),
		'add_new_item'        => __( 'Add New Testimonial', 'ti' ),
		'add_new'             => __( 'Add New', 'ti' ),
		'edit_item'           => __( 'Edit Testimonial', 'ti' ),
		'update_item'         => __( 'Update Testimonial', 'ti' ),
		'search_items'        => __( 'Search Testimonial', 'ti' ),
		'not_found'           => __( 'Not found', 'ti' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'ti' ),
	);
	$args = array(
		'label'               => __( 'testimonials', 'ti' ),
		'description'         => __( 'Add the content about your services', 'ti' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
		'taxonomies'          => array(),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'testimonials', $args );
	flush_rewrite_rules();

}

add_action( 'init', 'custom_post_type_testimonials', 0 );