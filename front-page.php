<?php
/**
 * Front page template
 *
 * @package      Neo
 * @author       Ehsan Shaukat
 * @link         http://www.ehsanshaukat.com/
 * @copyright    Copyright (c) 2015, Ehsan Shaukat
 * @license      GPL-3.0+
 */

add_action( 'genesis_meta', 'neo_home_page_setup' );

/**
 * Set up the homepage layout by conditionally loading sections when widgets
 * are active.
 *
 * @since 1.0.0
 */

function neo_home_page_setup() {
	$home_sidebars = array(
		'home_welcome' 	   => is_active_sidebar( 'home-welcome' ),
	);

	//* Return early if no sidebars are active.
	if ( ! in_array( true, $home_sidebars ) ) {
		return;
	}

	//* Add home welcome area if "Home Welcome" widget area is active.
	if ( $home_sidebars['home_welcome'] ) {
		add_action( 'genesis_after_header', 'neo_add_home_welcome' );
	}
}

/**
 * Display content for the "Home Welcome" section.
 *
 * @since 1.0.0
 */

function neo_add_home_welcome() {
	genesis_widget_area( 'home-welcome',
		array(
			'before' => '<div class="home-welcome"><div class="wrap">',
			'after' => '</div></div>',
		)
	);
}

genesis();
