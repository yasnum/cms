<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package bpt-bootstrap
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses bptbootstrap_header_style()
 */
function bptbootstrap_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'wp_bootstrap_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'FFF',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'bptbootstrap_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'bptbootstrap_custom_header_setup' );

if ( ! function_exists( 'bptbootstrap_header_style' ) ) :

	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see bptbootstrap_header_style().
	 */
	function bptbootstrap_header_style() {
	$header_text_color = get_header_textcolor();
	$header_image = get_header_image();
	

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() && get_theme_support( 'custom-header', 'default-text-color' ) != $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	
	<?php if ( ! empty( $header_image ) ) : ?>
		.header #navigation {
	
				/*
				 * No shorthand so the Customizer can override individual properties.
				 * @see https://core.trac.wordpress.org/ticket/31460
				 */
				background-image: url(<?php header_image(); ?>);
				background-repeat: no-repeat;
				background-position: 50% 50%;
				-webkit-background-size: cover;
				-moz-background-size:    cover;
				-o-background-size:      cover;
				background-size:         cover;
			}
	<?php endif;?>
	</style>
	<?php
}
endif;