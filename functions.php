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


function sjb_breadcrumb_nav($current_post_id, $section = null) {
	global $post;
	$html = '<li><a href="'.get_home_url().'">Accueil</a></li>';
	if ($post->post_parent) {
		$html .= '<li><a href="'.get_permalink($post->post_parent).'">'.get_the_title($post->post_parent).'</a></li>';
	}
	if ($section === 'article') {
		$blog_page_id = get_option('page_for_posts');
		$html .= '<li><a href="'.get_permalink($blog_page_id).'">'.get_the_title($blog_page_id).'</a></li>';
	}
	$html .= '<li class="active">'.get_the_title($current_post_id).'</li>';
	return $html;
}

/**
 * This is a hack to put make a condition trigger in the siteorigin filters.
 * If there is no attribute, it won't take into account the
 * siteorigin_panels_row_style_classes filter. (see below)
 */
add_filter('siteorigin_panels_row_style_attributes', function ($attr) {
	return [...$attr, 'data-trigger'=>'houba'];
});

/**
 * The structure of the main section of the page is supposed to be:
 *	.section > .container
 * So here we add section and a couple others.
 */
add_filter('siteorigin_panels_row_classes', function ($classes) {
	// Append the classes that are needed at this point in the DOM:
	return [...$classes, 'section', 'section-lg', 'bg-white'];
});

/**
 * The structure of the main section of the page is supposed to be:
 *	.section > .container
 */
add_filter('siteorigin_panels_row_style_classes', function ($classes) {
	// Append the classes that are needed at this point in the DOM:
	return [...$classes, 'container'];
});


/**
 * Styles dans TinyMCE
 */
function my_mce_before_init($settings) {
    $style_formats = [
        [
            'title' => 'Liste avec flèches',
            'selector' => 'ul',
            'classes' => 'text-accent-dark list-marked'
        ],
        [
            'title' => 'Highlight',
            'inline' => 'span',
            'classes' => 'highlight'
        ]
    ];

    $settings['style_formats'] = json_encode($style_formats);
    return $settings;
}
add_filter('tiny_mce_before_init', 'my_mce_before_init');

// Add editor styles
add_editor_style('editor-styles.css');


add_filter('tiny_mce_before_init', function($settings) {
    // Force full toolbar
    $settings['toolbar1'] = 'formatselect,styleselect,bold,italic,underline,strikethrough,bullist,numlist,blockquote,alignleft,aligncenter,alignright,link,unlinkpastetext,removeformat,charmap,undo,redo,wp_help';
    return $settings;
});



function quote_modern_shortcode($atts, $content = null) {
    // Extract shortcode attributes
    $atts = shortcode_atts(
        array(
            'cite' => '',
            'caption' => '',
        ),
        $atts,
        'quote_modern'
    );

    // Process the content (allow HTML and line breaks)
    $content = do_shortcode($content);

    // Build the HTML
    $output = '<blockquote class="quote-modern">';
    $output .= '<svg class="quote-modern-mark" width="39" height="40" viewBox="0 0 39 40" xmlns="http://www.w3.org/2000/svg">';
    $output .= '<path d="M0 25.2632C0 17.6608 0.924444 11.8713 2.77333 7.89474C4.62222 3.91813 7.91556 1.28655 12.6533 0L15.6 4.38597C12.48 5.78947 10.3422 7.83626 9.18667 10.5263C8.14667 13.0994 7.62667 17.1345 7.62667 22.6316H14.7333V40H0V25.2632ZM23.4 25.2632C23.4 17.6608 24.3244 11.8713 26.1733 7.89474C28.0222 3.91813 31.3156 1.28655 36.0533 0L39 4.38597C35.88 5.78947 33.7422 7.83626 32.5867 10.5263C31.5467 13.0994 31.0267 17.1345 31.0267 22.6316H38.1333V40H23.4V25.2632Z"></path>';
    $output .= '</svg>';
    $output .= '<div class="quote-modern-text">';
    $output .= '<p>' . wpautop($content) . '</p>';
    $output .= '</div>';

    // Only add meta section if cite or caption exists
    if (!empty($atts['cite']) || !empty($atts['caption'])) {
        $output .= '<div class="quote-modern-meta">';
        $output .= '<div class="quote-modern-info">';

        if (!empty($atts['cite'])) {
            $output .= '<cite class="quote-modern-cite">' . esc_html($atts['cite']) . '</cite>';
        }

        if (!empty($atts['caption'])) {
            $output .= '<p class="quote-modern-caption">' . esc_html($atts['caption']) . '</p>';
        }

        $output .= '</div>';
        $output .= '</div>';
    }

    $output .= '</blockquote>';

    return $output;
}
add_shortcode('quote_modern', 'quote_modern_shortcode');

