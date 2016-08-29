<?php
/**
 * Theme customizations
 *
 * @package      Sample
 * @author       Ehsan Shaukat
 * @link         http://www.ehsanshaukat.com/
 * @copyright    Copyright (c) 2015, Ehsan Shaukat
 * @license      GPL-3.0+
 */

//* Load child theme textdomain.
load_child_theme_textdomain( 'sample' );
add_action( 'genesis_setup', 'sample_setup', 15 );

/**
 * Theme setup.
 *
 * Attach all of the site-wide functions to the correct hooks and filters. All
 * the functions themselves are defined below this setup function.
 *
 * @since 1.0.0
 */

function sample_setup() {

	//* Define theme constants.
	define( 'CHILD_THEME_NAME', 'Sample' );
	define( 'CHILD_THEME_URL', 'https://github.com/EhsanShaukat/GenesisChildTheme' );
	define( 'CHILD_THEME_VERSION', '1.0.0' );

	//* Add HTML5 markup structure.
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption'  ) );
	
	//* Add viewport meta tag for mobile browsers.
	add_theme_support( 'genesis-responsive-viewport' );
	
	//* Add theme support for accessibility.
	add_theme_support( 'genesis-accessibility', array(
		'404-page',
		'drop-down-menu',
		'headings',
		'rems',
		'search-form',
		'skip-links',
	) );

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

//* Add Google Font stylesheet.
add_action( 'wp_enqueue_scripts', 'sample_equeue_styles' );
function sample_equeue_styles() {
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Fira+Sans:400,400i,500,500i' );
}