<?php
/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'bptbootstrap_scripts' ) ) :
function bptbootstrap_scripts() {
	wp_enqueue_style( 'bptbootstrap-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,300,600,500' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', false, '1.0', 'all');
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.css', false, '1.0', 'all');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', false, '1.0', 'all');
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl-carousel.css', false, '1.0', 'all');
	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/css/owl-theme.css', false, '1.0', 'all');
	wp_enqueue_style( 'owl-transitions', get_template_directory_uri() . '/css/owl-transitions.css', false, '1.0', 'all');
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', false, '1.0', 'all');
	wp_enqueue_style( 'elegant-icons', get_template_directory_uri() . '/css/elegant-icons.css', false, '1.0', 'all');
	wp_enqueue_style( 'bptbootstrap-animate', get_template_directory_uri() . '/css/animate.css', false, '1.0', 'all');
	wp_enqueue_style( 'bptbootstrap-stylesheet', get_stylesheet_uri() );

	// wp_enqueue_script
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/js/owl-carousel.js',0,0,true );
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri().'/js/jquery-magnific-popup.js',0,0,true );
	wp_enqueue_script( 'bptbootstrap-script', get_template_directory_uri() . '/js/bpt-bootstrap.js', array(), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bptbootstrap_scripts' );
endif;