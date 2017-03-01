<?php
/**
 * RED Starter Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

if ( ! function_exists( 'median_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function median_setup() {
	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array( 'search-form' ) );

}
endif; // median_setup
add_action( 'after_setup_theme', 'median_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function median_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'median_content_width', 700 );
}
add_action( 'after_setup_theme', 'median_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function median_scripts() {
	wp_enqueue_style( 'median-style', get_stylesheet_uri() );
	wp_enqueue_style('styles', get_stylesheet_directory_uri().'/custom.css');
	wp_enqueue_script('extra js', get_template_directory_uri().'/extra.js');
}
add_action( 'wp_enqueue_scripts', 'median_scripts' );

/**
 * Trim default excerpt length.
 */
function median_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'median_excerpt_length', 999 );

/**
 * Add class to post navigation links.
 */
function median_posts_link_attributes() {
    return 'class="button"';
}
add_filter( 'next_posts_link_attributes', 'median_posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'median_posts_link_attributes' );


function replaceName($content) {
	 echo str_replace("X", "Jeremy", $content);
}

add_filter('the_content', 'replaceName');


// function my_admin_scripts() {
//     wp_enqueue_script( 'my-great-script', plugin_dir_url( __FILE__ ) . '/js/my-great-script.js', array( 'jquery' ), '1.0.0', true );
// }
// add_action( 'admin_enqueue_scripts', 'my_admin_scripts' );

include 'lib.php';













