<?php
/**
 * Register widget areas
 *
 * @package      Sample
 * @author       Ehsan Shaukat
 * @link         http://www.ehsanshaukat.com/
 * @copyright    Copyright (c) 2015, Ehsan Shaukat
 * @license      GPL-3.0+
 */

//* Register front page widget areas
genesis_register_sidebar( array(
	'id'            => 'home-welcome',
	'name'          => __( 'Home Welcome', 'sample' ),
	'description'   => __( 'This is a home widget area that will show on the front page', 'sample' ),
) );
