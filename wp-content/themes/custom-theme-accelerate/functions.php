<?php
/**
 * Accelerate Marketing Child functions and definitions
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

register_nav_menu('top-nav', 'Top Nav');
register_nav_menu('social-media', 'Social Media Nav');


// Turns on widgets & menus 
if (function_exists('register_sidebar')) {
	register_sidebar();
}

// Register second sidebar - will create a new dynamic widget area in the admin
register_sidebar( array(
    'name' =>__( 'Homepage sidebar', 'homepage-sidebar'),
    'id' => 'sidebar-2',
    'description' => __( 'Appears on the static front page template', 'homepage-sidebar' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
) );

// Add Theme Support - Post Format and Featured Images
add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
//add_theme_support( 'post-thumbnails', array( 'test_posts' ) );

// Custom Post Type Function
function create_custom_post_types() {
// Create a case study custom post type
	// $supports = array(
	// 	'title', // post title
	// 	'editor', // post content
	// 	'author', // post author
	// 	'thumbnail', // featured images
	// 	'excerpt', // post excerpt
	// 	'custom-fields', // custom fields
	// 	'comments', // post comments
	// 	'revisions', // post revisions
	// 	'post-formats', // post formats
	// );
	register_post_type('case_studies', 
		array( 
			// 'supports' => $supports,
			'labels' => array(
				'name' => _( 'Case Studies' ),
				'singular_name' => _( 'Case Study' )
				),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array(
				'slug' => 'case-studies'
				),
			)
	 );
}
// Hook this custom post type function into the theme
add_action( 'init', 'create_custom_post_types' );

//Enqueue scripts and styles.
function accelerate_child_scripts() {
	wp_enqueue_style('accelerate-child-google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,600,700,300');
}
add_action( 'wp_enqueue_scripts', 'accelerate_child_scripts' );


// Displaying a Quick Performance Report for Admins in the source code

add_action( 'wp_footer', 'wp_footer_example' );
 
function wp_footer_example() {
    $stat = sprintf( '%d queries in %.3f seconds, using %.2fMB memory',
        get_num_queries(),
        timer_stop( 0, 3 ),
        memory_get_peak_usage() / 1024 / 1024
    );
    if( current_user_can( 'manage_options' ) ) {
        echo "<!-- {$stat} -->";
    }
}
 
// Example Source: http://wordpress.stackexchange.com/a/1866


// Warning Logged-in Users About Website Maintenance (using 'error' class) or Success message (using 'updated' class)
add_action( 'admin_notices', 'admin_message' );
 
function admin_message() {  
    echo '<div class="error">
            <p>Do not change themes or everything will go to hell and you will cry bitter, bitter tears. Thank you.</p>
          </div>';
}
 
// Example Source: http://wpsnippy.com/show-notification-message-wordpress-admin-pages/


// Provide a quick link for your clients to reach you in the admin toolbar
add_action( 'wp_before_admin_bar_render', 'wp_before_admin_bar_render_example' ); 
 
function wp_before_admin_bar_render_example() {
    global $wp_admin_bar;
    $wp_admin_bar->add_node( array(
        'id'    => 'contact-developer',
        'title' => 'Contact Developer',
        'href'  => 'http://redrambles.com/contact/',
        'meta'  => array( 'target' => '_blank' )
    ) );
}


// Color separate posts of different statuses in the Dashboard
add_action( 'admin_footer', 'admin_footer_example' );

function admin_footer_example() {
 
    echo '<style type="text/css">
    .status-draft   { background-color: #FCE3F2; }
    .status-pending { background-color: #87C5D6; }
    .status-future  { background-color: #C6EBF5; }
    .status-private { background-color: #F2D46F; }
    </style>';
     
}

// customize admin footer text
add_filter('admin_footer_text', 'shapeSpace_admin_footer');

function shapeSpace_admin_footer($footer_text) {
	$footer_text = '<span class="custom-footer">' . __('&copy; ', 'accelerate-theme-child') . date('Y') . ' <a href="' . home_url() .
	'">' . get_bloginfo('name') . '</a> &bull; Accelerate Child Theme</span>';
	echo $footer_text;
}

// Add post meta - format: add_post_meta($post_id, $meta_key, $meta_value, $unique);
add_post_meta(47372, 'mood', 'adventurous', true);
add_post_meta(47333, 'sanity', 'good', true);

// In lieu of a 'maintenance mode plugin' - if in a hurry - will shut down the site to everyone but admins

// add_action( 'get_header', 'get_header_example' );
 
// function get_header_example() {
 
//     if ( ! current_user_can( 'activate_plugins' ) ) {
//         wp_die( 'Emergency repair underway. The website will be back soon.' );
//     }
     
// }

// shortcode for user access content. Format = [user_access cap="read" deny="Log in to view content"] text [/user_access]
function user_access($attr, $content = null) {
	extract(shortcode_atts(array(
		'cap' => 'read',
		'deny' => '',
	), $attr));

	if (current_user_can($cap) && !is_null($content) &&
	!is_feed()) return $content;

	return apply_filters('diy_user_access_filter', $deny); // This hook will permit us to filter the deny message if we need to in the future
}
add_shortcode('user_access', 'user_access');

// Callback function - to change deny message - in case you put the shortcode all over the place and you want to change it in one place:
function diy_modify_user_access($deny) {
	$deny = 'Skinnemarinky dinky dink, skinermarinky doooo';
	return '<h5>'. $deny .'</h5>';
}
add_filter('diy_user_access_filter', 'diy_modify_user_access');
 

?>