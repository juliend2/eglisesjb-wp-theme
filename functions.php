<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
Initial settings:
*/

define('SJB_THEME_SLUG', 'eglisesjb');
define('SJB_MAX_WIDTH', 1170);

if ( ! isset ( $content_width) ) {
    $content_width = SJB_MAX_WIDTH;
}

require_once __DIR__.'/lib/MenuWalker.php';

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


function sjb_enqueue_assets() {
	// CSS
	wp_enqueue_style(
		'bootstrap',
		get_template_directory_uri() . '/assets/css/bootstrap.css',
		[],
		filemtime(get_template_directory() . '/assets/css/bootstrap.css')
	);

	wp_enqueue_style(
		'fonts',
		get_template_directory_uri() . '/assets/css/fonts.css',
		[],
		filemtime(get_template_directory() . '/assets/css/fonts.css')
	);

	wp_enqueue_style(
		'style',
		get_stylesheet_uri(),
		['bootstrap', 'fonts'], // dependencies
		wp_get_theme()->get('Version')
	);

	// JS
	wp_enqueue_script(
		'core',
		get_template_directory_uri() . '/assets/js/core.min.js',
		[],
		filemtime(get_template_directory() . '/assets/js/core.min.js'),
		true // Load in footer
	);
	wp_enqueue_script(
		'script',
		get_template_directory_uri() . '/assets/js/script.js',
		['core'],
		filemtime(get_template_directory() . '/assets/js/script.js'),
		true // Load in footer
	);
}
add_action('wp_enqueue_scripts', 'sjb_enqueue_assets');


function sjb_breadcrumb_nav($current_post_id) {
	global $post;
	$html = '<li><a href="'.get_home_url().'">Accueil</a></li>';
	if ($post->post_parent) {
		$html .= '<li><a href="'.get_permalink($post->post_parent).'">'.get_the_title($post->post_parent).'</a></li>';
	}
	$html .= '<li class="active">'.get_the_title($current_post_id).'</li>';
	return $html;
}

