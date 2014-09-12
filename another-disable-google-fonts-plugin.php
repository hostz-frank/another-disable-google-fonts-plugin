<?php
/**
 * Another Disable Google Fonts Plugin
 *
 * Disable enqueuing of Open Sans and other fonts used by WordPress from Google.
 */

/**
 * Plugin Name: Another Disable Google Fonts Plugin
 * Description: Disable Open Sans and other fonts fetched from Google by WordPress core.
 * Author: Frank St&uuml;rzebecher
 * Author URI: http://netzklad.de/
 * Version: 0.1
 * License: GPL
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;


function google_fonts_load_disable( $styles ) {
	$styles->add( 'open-sans', '' ); // Backend
	$styles->add( 'twentyfourteen-lato', '' ); // Themes ...
	$styles->add( 'twentythirteen-fonts', '' );
	$styles->add( 'twentytwelve-fonts', '' );
}
add_action( 'wp_default_styles', 'google_fonts_load_disable', 5 );
