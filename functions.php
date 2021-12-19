<?php

/**
 * Add menu support
 */
function simple_theme_support() {
	add_theme_support( 'menus' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'init', 'simple_theme_support' );

/**
 * Register Scripts and Style
 */
function simple_register_scripts() {
	wp_enqueue_style( 'simple-css', get_stylesheet_uri() );
	wp_enqueue_script( 'simple-js', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0', true );
	$script = array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	);
	wp_localize_script( 'simple-js', 'ajax', $script );
}
add_action( 'wp_enqueue_scripts', 'simple_register_scripts' );

/**
 * AJAX request for get post title by ID
 */
function simple_get_post_title_by_id() {
	$post_id    = ! empty( $_POST['post-id'] ) ? intval( $_POST['post-id'] ) : false;
	$post       = get_post( $post_id );
	$post_title = get_the_title( $post_id );
	$post_type  = get_post_type( $post_id );

	if ( ! $post ) {
		echo '<p style="color: red">Sorry, the post not found</p>';
	} else {
		if ( $post_type !== 'post' ) {
			echo '<p style="color: red">It\'s not post ID</p>';
		} else {
			echo '<p>' . $post_title . '</p>';
		}
	}
	die;
}
add_action( 'wp_ajax_getposttitle', 'simple_get_post_title_by_id' );
add_action( 'wp_ajax_nopriv_getposttitle', 'simple_get_post_title_by_id' );
