<?php
/**
 * Uno functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Uno Blog
 *
 * The File Content :
 * 1.0- Define the constents.
 * 2.0- Set up theme width.
 * 3.0- The Setup function.
 * 4.0- Load theme custom secript.
 * 5.0- Widgets registration file.
 * 6.0- Theme Options Integeration.
 * 7.0- Custom Header features.
 * 8.0- Custom template tags.
 * 9.0- Hooking functions for the Theme.
 * 10 - Theme Customizer.
 * 11 - Jetpack compatibility.
 * 12 - Woocommerce Integeration.
 * 13 - Theme Filter File.
 * 14 - Theme Menu Walker.
 * 15 - Theme Icon Functions.
 * 16 - Theme extra Functions.
 */
?>
<?php
// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<?php
/* ----------------------------------------------------------------------------------- *
 * 1.0 - Define the constants
** ----------------------------------------------------------------------------------- */
define( 'THEMEROOT', get_template_directory_uri() );
define( 'THEMEDIR', get_template_directory() );
define( 'IMAGES', THEMEROOT .'/assets/images' );
define( 'STYLES', THEMEROOT .'/assets/css' );
define( 'SCRIPTS', THEMEROOT .'/assets/js' );
define( 'SHORTNAME', 'wg_' );

/* ----------------------------------------------------------------------------------- *
 * 2.0 - Set up the Content width value based on Theme Design
** ----------------------------------------------------------------------------------- */
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function uno_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'uno_content_width', 1200 );
}
add_action( 'after_setup_theme', 'uno_content_width', 0 );

/* ----------------------------------------------------------------------------------- *
 * 3.0 - Set up Theme Default and various Features
** ----------------------------------------------------------------------------------- */
if ( ! function_exists( 'uno_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function uno_setup() {
    /*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Uno, use a find and replace
	 * to change 'Uno Blog' to the name of your theme in all the template files.
	 */
    $lang_dir = THEMEROOT . '/languages';
	load_theme_textdomain( 'uno', $lang_dir );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
   
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' ); 
    
    // This theme styles the visual editor to resemble the theme style.
    add_editor_style( UNOSTYLES . 'editor-style.css' );
    
    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );  
    
    add_image_size ( 'uno-featured-image', 2000, 1200, true);
    
    add_image_size ( 'uno-thumbnail-avatar', 100, 100, true);
    
    add_image_size ( 'client_thumb', 400, 200, true);

    // Enable support for Gutenberge wide images.
    add_theme_support( 'gutenberg', array(
        'wide-images' => true,
    ) );

    // This theme uses wp_nav_menu() in two location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'uno' ),
		'topbar' => esc_html__( 'Top Bar Menu', 'uno' ),
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
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );
    
    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'uno_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
}
endif; // uno_setup
add_action( 'after_setup_theme', 'uno_setup' );

/* ----------------------------------------------------------------------------------- *
 * 4.0 - Load the custom Scripts for the Theme
** ----------------------------------------------------------------------------------- */
/**
 * Enqueue scripts and styles.
**/
function uno_scripts() {
        
    // load the stylesheet
	wp_enqueue_style( 'uno-bootstrap', STYLES . '/bootstrap.min.css' );
	wp_enqueue_style( 'uno-style', STYLES . '/style.css' );
    
    // register and load custom scripts.
    wp_enqueue_script( 'uno_jquery', SCRIPTS . '/jquery-3.3.1.min.js', array( 'jquery' ), '20180120', true );
    
    wp_enqueue_script( 'uno-bootstrap', SCRIPTS . '/bootstrap.min.js', array('jquery'), '20151215', true );
    
    wp_enqueue_script( 'uno-navigation', SCRIPTS . '/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'uno-skip-link-focus-fix', SCRIPTS . '/skip-link-focus-fix.js', array(), '20151215', true );

    // Font Awseom 5.08 for SVG Icons.
    wp_enqueue_script( 'uno-fontawesom5', SCRIPTS . '/fontawesome-all.js', array(), '20180327', true );
    
    // Custom JavaScript Functions.
    wp_enqueue_script( 'uno-customjs', SCRIPTS . '/custom.js', array(), '20180721', true );

    // Add Support for pages and or posts with threaded comments.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'uno_scripts' );

/* ----------------------------------------------------------------------------------- *
 * 5.0 - Widgets registration file.
** ----------------------------------------------------------------------------------- */
require THEMEDIR . '/inc/widgets.php';

/* ----------------------------------------------------------------------------------- *
 * 6.0 - Load Admininstrator Theme Options .
** ----------------------------------------------------------------------------------- */
/**
 *  Implement the index for Uno dashboard files and Theme Options files
 */
if ( is_admin() ) {
    require_once THEMEDIR . '/admin/index.php';
}
require_once THEMEDIR .'/admin/functions/functions.admin.php';

/* ----------------------------------------------------------------------------------- *
 * 7.0 - Load Custom Header features.
** ----------------------------------------------------------------------------------- */
/**
 * Implement the Custom Header feature.
 */
require THEMEDIR . '/inc/custom-header.php';

/* ----------------------------------------------------------------------------------- *
 * 8.0 - Load Custom template tags.
** ----------------------------------------------------------------------------------- */
/**
 * Custom template tags for this theme.
 */
require THEMEDIR . '/inc/template-tags.php';

/* ----------------------------------------------------------------------------------- *
 * 9.0 - Hooking functions for the Theme
** ----------------------------------------------------------------------------------- */
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require THEMEDIR . '/inc/template-functions.php';

/* ----------------------------------------------------------------------------------- *
 * 10.0 - Theme Customizer
** ----------------------------------------------------------------------------------- */
/**
 * Customizer additions.
 */
require THEMEDIR . '/inc/customizer.php';

/* ----------------------------------------------------------------------------------- *
 * 11.0 - Jetpack compatibility
** ----------------------------------------------------------------------------------- */
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require THEMEDIR . '/inc/jetpack.php';
}

/* ----------------------------------------------------------------------------------- *
 * 12.0 - WooCommerce 
** ----------------------------------------------------------------------------------- */
/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require THEMEDIR . '/inc/woocommerce.php';
}

/* ----------------------------------------------------------------------------------- *
 * 13.0 - Theme Filters 
** ----------------------------------------------------------------------------------- */
/**
 * Load Thme Filter File.
 */
	require THEMEDIR . '/inc/theme.filters.php';

/* ----------------------------------------------------------------------------------- *
 * 14.0 - Theme Menu Waalker 
** ----------------------------------------------------------------------------------- */
/**
 * Load Thme Filter File.
 */
	require THEMEDIR . '/inc/menu_gear.php';
    require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/* ----------------------------------------------------------------------------------- *
 * 15.0 - Theme Icon Functions 
** ----------------------------------------------------------------------------------- */
/**
 * SVG icons functions and filters.
 */
require THEMEDIR . '/inc/icon-functions.php';

/* ----------------------------------------------------------------------------------- *
 * 16.0 - Theme  Functions 
** ----------------------------------------------------------------------------------- */
/**
 * Extra Theme functions and filters.
 */
require THEMEDIR . '/inc/theme-functions.php';

/* ----------------------------------------------------------------------------------- *
 * 17.0 - TGM implemntation for all plugins used with the THEME.
** ----------------------------------------------------------------------------------- */
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/plugins.php';

