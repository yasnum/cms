<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package bpt-bootstrap
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
if ( ! function_exists( 'bptbootstrap_body_classes' ) ) :
function bptbootstrap_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'bptbootstrap_body_classes' );
endif;

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
if ( ! function_exists( 'bptbootstrap_pingback_header' ) ) :
function bptbootstrap_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'bptbootstrap_pingback_header' );
endif;

/**
 * WordPress Breadcrumbs
 *
 */
if ( ! function_exists( 'bptbootstrap_breadcrumb' ) ){
	function bptbootstrap_breadcrumb() {
		
		if ( is_front_page() || is_home() ) {
			return;
		}
		if ( ! function_exists( 'breadcrumb_trail' ) ) {
			locate_template( 'inc/breadcrumbs.php', TRUE, TRUE );
		}

		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
		);

		breadcrumb_trail( $breadcrumb_args );

	} // end of bptbootstrap_breadcrumb()

}



if ( ! function_exists( 'bptbootstrap_register_required_plugins' ) ){
/**
 * Register the required plugins for this theme.
 *
 */
add_action( 'tgmpa_register', 'bptbootstrap_register_required_plugins' );
function bptbootstrap_register_required_plugins() {
	$plugins = array(
		array(
			'name'         => 'Smart Slider 3',
			'slug'         => 'smart-slider-3',
			'required'  => false,
		),

	);
	$config = array(
		'id'           => 'bpt-bootstrap',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
}