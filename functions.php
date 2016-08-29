<?php
/**
 * Theme customizations
 *
 * @package      Neo
 * @author       Ehsan Shaukat
 * @link         http://www.ehsanshaukat.com/
 * @copyright    Copyright (c) 2015, Ehsan Shaukat
 * @license      GPL-3.0+
 */

//* Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

//* Load child theme textdomain.
load_child_theme_textdomain( 'neo' );

//* Define theme constants.
define( 'CHILD_THEME_NAME', 'Neo' );
define( 'CHILD_THEME_URL', 'https://github.com/EhsanShaukat/GenesisChildTheme' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Enqueue Scripts and Styles
add_action( 'wp_enqueue_scripts', 'neo_enqueue_scripts_styles' );
function neo_enqueue_scripts_styles() {
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Fira+Sans:400,400i,500,500i', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'ionicons', '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array(), CHILD_THEME_VERSION );
	wp_enqueue_script( 'neo-responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true );	
}

//* Add HTML5 markup structure.
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

//* Add Accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

//* Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom header.
add_theme_support( 'custom-header', array(
	'width'           => 600,
	'height'          => 160,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );

//* Add support for custom background.
add_theme_support( 'custom-background' );

//* Add theme support for footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

//* Unregister layouts that use secondary sidebar.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Unregister secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

//* Add theme widget areas.
include_once( get_stylesheet_directory() . '/includes/widget-areas.php' );
}

//* Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

//* Reduce the secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'neo_secondary_menu_args' );
function neo_secondary_menu_args( $args ) {
	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}
	$args['depth'] = 1;
	return $args;
}
