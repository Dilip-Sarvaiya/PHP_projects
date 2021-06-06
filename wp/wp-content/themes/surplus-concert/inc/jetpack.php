<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package Surplus_Concert
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/content-options/
 */
function surplus_concert_jetpack_setup() {

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
	
}
add_action( 'after_setup_theme', 'surplus_concert_jetpack_setup' );
