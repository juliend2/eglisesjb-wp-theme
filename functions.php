<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
Initial settings:
*/

define('SJB_THEME_SLUG', 'eglisesjb');
define('SJB_MAX_WIDTH', 1170);

if ( ! isset ( $content_width) ) {
    $content_width = SJB_MAX_WIDTH;
}

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 Setup:
*/

/**
 * Sets up theme defaults and registers support for various
 * WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme
 * hook, which runs before the init hook. The init hook is too late
 * for some features, such as indicating support post thumbnails.
 */
function sjb_setup() {


	/**
 * Make theme available for translation.
 * Translations can be placed in the /languages/ directory.
 */
	load_theme_textdomain( SJB_THEME_SLUG, get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to <head>.
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for post thumbnails and featured images.
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Add support for two custom navigation menus.
	 */
	register_nav_menus( [
		'primary'   => __( 'Primary Menu', SJB_THEME_SLUG ),
		'secondary' => __( 'Secondary Menu', SJB_THEME_SLUG ),
	] );

	/**
	 * Enable support for the following post formats:
	 * aside, gallery, quote, image, and video
	 */
	add_theme_support( 'post-formats', [ 'aside', 'gallery', 'quote', 'image', 'video' ] );
}

add_action( 'after_setup_theme', 'sjb_setup' );

