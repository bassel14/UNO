<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package uno
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function uno_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'uno_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function uno_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'uno_pingback_header' );


/**
 * Checks to see if we're on the front page or not.
 */
function uno_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}
/**
 * Checks to see if we're on the blog page or not.
 */
function uno_is_blogpage() {
	return ( ! is_front_page() && is_home() );
}
/* ----------------------------------------------------------------------------- *
 * A Function to change from hexadecimal color to RGB color with Alpha percent 
** ---------------------------------------------------------------------------- */
function hexToRgb($hex, $alpha = false) {
	$hex      = str_replace('#', '', $hex);
	$length   = strlen($hex);
	$rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
	$rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
	$rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
	if ( $alpha ) {
	   $rgb['a'] = $alpha;
	}
	return $rgb;
 }

