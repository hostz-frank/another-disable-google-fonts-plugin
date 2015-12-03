<?php
/**
 * Plugin Name: Another Disable Google Fonts Plugin
 * Description: Disable Open Sans and other fonts fetched from Google by WordPress core.
 * Author: Frank St&uuml;rzebecher
 * Author URI: http://netzklad.de/
 * Version: 0.3
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License as published by the Free Software Foundation; either version 2 of the License,
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


/* Exit if accessed directly */
defined( 'ABSPATH' ) || die();


function google_fonts_load_disable( $styles ) {
	$styles->add( 'open-sans'           , '' ); // Backend
	$styles->add( 'twentytwelve-fonts'  , '' ); // Core themes ...
	$styles->add( 'twentythirteen-fonts', '' );
	$styles->add( 'twentyfourteen-lato' , '' );
	$styles->add( 'twentyfifteen-fonts',  '' );
	$styles->add( 'twentysixteen-fonts',  '' );

	if ( is_admin() ) {
		// Remove Google fonts injected into WP editor
		global $editor_styles;

		if ( function_exists( 'twentyfifteen_fonts_url' ) ) {
			unset( $editor_styles[ array_search( twentyfifteen_fonts_url(), $editor_styles ) ] );
		}

		if ( function_exists( 'twentysixteen_fonts_url' ) ) {
			unset( $editor_styles[ array_search( twentysixteen_fonts_url(), $editor_styles ) ] );
		}
	}
}

add_action( 'wp_default_styles', 'google_fonts_load_disable', 5 );
