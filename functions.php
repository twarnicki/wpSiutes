<?php
/**
 * Siutes functions and definitions
 *
 * @package Siutes
 */

if ( ! function_exists( 'siutes_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function siutes_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Siutes, use a find and replace
	 * to change 'siutes' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'siutes', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'siutes' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'siutes_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // siutes_setup
add_action( 'after_setup_theme', 'siutes_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function siutes_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'siutes_content_width', 640 );
}
add_action( 'after_setup_theme', 'siutes_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function siutes_widgets_init() {
	register_sidebar( array(
            'name'          => esc_html__( 'Sidebar', 'siutes' ),
            'id'            => 'sidebar-1',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
	) );
        
        register_sidebar(array(
            'name'          => 'Top Wideget',
            'id'            => 'widget-top',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            //'before_widget' => '<li id="%1$s" class="widget %2$s">',
            //'after_widget'  => '</li>',
            'before_title'  => '<h5 class="widgettitle">',
            'after_title'   => '</h5>',
        ));
        
        register_sidebar(array(
            'name'          => 'Jumbotron',
            'id'            => 'widget-jumbo',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            //'before_widget' => '<li id="%1$s" class="widget %2$s">',
            //'after_widget'  => '</li>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        ));
        
}
add_action( 'widgets_init', 'siutes_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function siutes_scripts() {
	wp_enqueue_style( 'siutes-style', get_stylesheet_uri() );
        wp_enqueue_style( 'siutes-layout',get_template_directory_uri() . '/layouts/content-sidebar.css'  );
        wp_enqueue_style( 'siutes-mods',get_template_directory_uri() . '/siutes.css'  );
        

	wp_enqueue_script( 'siutes-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'siutes-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'siutes_scripts' );


function siutes_jumbotron_setup() {
	add_theme_support( 'jumbotron-image', apply_filters( 'siutes_jumbotron_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1024,
		'height'                 => 300,
		'flex-height'            => true,
		'wp-head-callback'       => 'siutes_jumbotron_style',
		'admin-head-callback'    => 'siutes_admin_jumbotron_style',
		'admin-preview-callback' => 'siutes_admin_jumbotron_image',
	) ) );
}
add_action( 'after_setup_theme', 'siutes_jumbotron_setup' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
