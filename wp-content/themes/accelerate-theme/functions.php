<?php
/**
 * Accelerate Marketing functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

// Theme support for menus - I wrapped this in a function and hooked it (otherwise it's pretty much the same as original code)
function accelerate_setup() {

	// Register Menus 
	register_nav_menus ( array (
		'top-nav' => __( 'Top Nav', 'accelerate' ),
		'social-media' => __( 'Social Media Nav', 'accelerate' ),  
	) );
}

add_action( 'after_setup_theme', 'accelerate_setup' );


 /*
 * Enqueue scripts and styles.
 * Tried loading here instead of the <head> of header.php because it would not load properly using functions.php from the child theme (some styling was overriden)
 */
function accelerate_scripts() {


	// Load our main stylesheet.
	wp_enqueue_style( 'accelerate-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'accelerate_scripts' );


 //Register main widget area 
function accelerate_widget_init() {
	// Register first sidebar - main widget area
	register_sidebar( array(
		'name'          => __( 'Main sidebar', 'accelerate' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your main sidebar.', 'accelerate' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'accelerate_widget_init' );