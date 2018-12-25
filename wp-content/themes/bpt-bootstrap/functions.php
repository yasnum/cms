<?php
/**
 * BPT Bootstrap functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bpt-bootstrap
 */

if ( ! function_exists( 'bptbootstrap_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bptbootstrap_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Best Features, use a find and replace
		 * to change 'bpt-bootstrap' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bpt-bootstrap', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'bpt-bootstrap' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array(
			'audio',
			'gallery',
			'video',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'features_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 50,
			'width'       => 200,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'bptbootstrap_setup' );

/**
 * replace custom logo class .
 */
if ( ! function_exists( 'bptbootstrap_custom_logo' ) ) :
function bptbootstrap_custom_logo() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="%1$s" class="brand" rel="home" itemprop="url">%2$s</a>',esc_url( home_url( '/' ) ),
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'header-logo',
            ) )
        );
    return $html;   
} 
add_filter( 'get_custom_logo', 'bptbootstrap_custom_logo' );
endif;

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bptbootstrap_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Home Page Slider Sidebar', 'bpt-bootstrap' ),
		'id'            => 'sidebar-home-slider',
		'description'   => esc_html__( 'This section is for home page main slider. Recommend to add full width Slider', 'bpt-bootstrap' ),
		'before_widget' => '<div id="%1$s" class="col-md-12 footer-col %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bpt-bootstrap' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bpt-bootstrap' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="title widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'bpt-bootstrap' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'bpt-bootstrap' ),
		'before_widget' => '<div id="%1$s" class="col-md-3 col-xs-6 footer-col %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'bptbootstrap_widgets_init' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! function_exists( 'bptbootstrap_content_width' ) ) :
function bptbootstrap_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bptbootstrap_content_width', 640 );
}
add_action( 'after_setup_theme', 'bptbootstrap_content_width', 0 );
endif;

// Remove gallery shortcode from content
if ( ! function_exists( 'bptbootstrap_strip_shortcode_gallery' ) ) :
add_filter('the_content', 'bptbootstrap_strip_shortcode_gallery');
function bptbootstrap_strip_shortcode_gallery( $content ) {
    preg_match_all( '/'. get_shortcode_regex() .'/s', $content, $matches, PREG_SET_ORDER );
    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if ($pos !== false)
                    return substr_replace( $content, '', $pos, strlen($shortcode[0]) );
            }
        }
    }
    return $content;
}
endif;

/**
 * Implement Register Custom Navigation Walker.
 */
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';

/**
 * Implement the Custom customize feature.
 */
require get_template_directory() . '/customize/class-customize.php';

/**
 * Implement the custom header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Custom comment-template feature.
 */
require get_template_directory() . '/inc/comment-template.php';

/**
 * Implement the Custom features_scripts feature.
 */
require get_template_directory() . '/inc/features_scripts.php';

/**
 * Implement the Custom features_scripts feature.
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
