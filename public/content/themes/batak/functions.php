<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
function theme_enqueue_scripts(){
    global $wp_scripts;

	wp_enqueue_style('fontawsome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
	wp_enqueue_style('global', get_bloginfo('template_url') . '/css/global.css');
	wp_enqueue_style('prism', get_bloginfo('template_url') . '/css/prism.css');

	wp_register_script('html5shiv', get_bloginfo('template_url') . '/lib/html5shiv/dist/html5shiv.min.js');
	wp_enqueue_script('html5shiv');
    $wp_scripts->add_data('html5shiv', 'conditional', 'lt IE 9');

    wp_register_script('html5shiv-printshiv', get_bloginfo('template_url') . '/lib/html5shiv/dist/html5shiv-printshiv.min.js');
    wp_enqueue_script('html5shiv-printshiv');
    $wp_scripts->add_data('html5shiv-printshiv', 'conditional', 'lt IE 9');

    wp_register_script('respond', get_bloginfo('template_url') . '/lib/html5shiv/dist/respond.min.js');
    wp_enqueue_script('respond');
    $wp_scripts->add_data('respond', 'conditional', 'lt IE 9');

    /* Footer */

    wp_register_script('angular', get_bloginfo('template_url') . '/lib/angular/angular.js', null, false, true);
    wp_enqueue_script('angular');

    wp_register_script('angular-ui-router', get_bloginfo('template_url') . '/lib/angular-ui-router/release/angular-ui-router.min.js', null, false, true);
    wp_enqueue_script('angular-ui-router');

    wp_register_script('angular-animate', get_bloginfo('template_url') . '/lib/angular-animate/angular-animate.min.js', null, false, true);
    wp_enqueue_script('angular-animate');

    wp_register_script('angular-sanitize', get_bloginfo('template_url') . '/lib/angular-sanitize/angular-sanitize.min.js', null, false, true);
    wp_enqueue_script('angular-sanitize');

    wp_register_script('angular-loading-bar', get_bloginfo('template_url') . '/lib/angular-loading-bar/build/loading-bar.min.js', null, false, true);
    wp_enqueue_script('angular-loading-bar');



	wp_register_script('main', get_bloginfo('template_url') . '/js/main.js', array('jquery'), false, true);
	wp_enqueue_script('main');

	wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
	wp_enqueue_script('livereload');

}

//Add Featured Image Support
add_theme_support('post-thumbnails');

// Clean up the <head>
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

function register_menus() {
	register_nav_menus(
		array(
			'main-nav' => 'Main Navigation',
			'secondary-nav' => 'Secondary Navigation',
			'sidebar-menu' => 'Sidebar Menu'
		)
	);
}
add_action( 'init', 'register_menus' );

function register_widgets(){

	register_sidebar( array(
		'name' => __( 'Sidebar' ),
		'id' => 'main-sidebar',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}//end register_widgets()
add_action( 'widgets_init', 'register_widgets' );



add_action( 'after_setup_theme', 'baw_theme_setup' );
function baw_theme_setup() {
    add_image_size( 'single-post', 1200, 500 );
}

add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'single-post' => __( 'Single Post Image Size' ),
    ) );
}


define( 'BATAK_PARENT_DIR', get_template_directory() );
define( 'BATAK_INC_DIR', BATAK_PARENT_DIR. '/inc' );
define( 'BATAK_FUNCTIONS_DIR', BATAK_INC_DIR . '/functions' );

/** Load functions */
require_once( BATAK_FUNCTIONS_DIR . '/functions.php' );
