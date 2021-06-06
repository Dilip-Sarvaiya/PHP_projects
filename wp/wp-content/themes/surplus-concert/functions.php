<?php
/**
 * surplus concert pro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Surplus_Concert
 */

// Use unminified libraries if SCRIPT_DEBUG is true
if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
    define( 'UNMINIFIED', '/unminified' );
    define( 'SUFFIX', '' );
} else {
    define( 'UNMINIFIED', '' );
    define( 'SUFFIX', '.min' );
}

// Define theme version
if ( ! defined( 'SURPLUS_CONCERT_THEME_VERSION' ) ) {
    $theme_data = wp_get_theme();   
    define ( 'SURPLUS_CONCERT_THEME_VERSION', $theme_data->get( 'Version' ) );
}

if ( ! function_exists( 'surplus_concert_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    
    function surplus_concert_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on surplus concert pro, use a find and replace
         * to change 'surplus-concert' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'surplus-concert', get_template_directory() . '/languages' );

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
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

         // Custom Image Size
        add_image_size( 'surplus-concert-banner',1920,680,true );
        add_image_size( 'surplus-concert-slider',1920,1080,true );
        add_image_size( 'surplus-concert-about',670,525,true );
        add_image_size( 'surplus-concert-blog',350,246,true );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary-menu' => esc_html__( 'Primary Menu', 'surplus-concert' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Add support for page excerpt
        add_post_type_support( 'page', 'excerpt' );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'surplus_concert_custom_background_args', array(
            'default-color' => '111111',
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

         /** Starter Content */
        $starter_content = array(

        // Specify the core-defined pages to create and add custom thumbnails to some of them.
        'posts' => array( 'home', 'blog' ),
        
        // Default to a static front page and assign the front and posts pages.
        'options' => array(
            'show_on_front' => 'page',
            'page_on_front' => '{{home}}',
            'page_for_posts' => '{{blog}}',
        ),
        
        // Set up nav menus for each of the two areas registered in the theme.
        'nav_menus' => array(
            // Assign a menu to the "top" location.
            'primary-menu' => array(
                'name' => __( 'Primary Menu', 'surplus-concert' ),
                'items' => array(
                    'page_home',
                    'page_blog'
                )
            )
        ),
    );
    
    $starter_content = apply_filters( 'surplus_concert_starter_content', $starter_content );

    add_theme_support( 'starter-content', $starter_content );
    }
endif;
add_action( 'after_setup_theme', 'surplus_concert_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function surplus_concert_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'surplus_concert_content_width', 640 );
}
add_action( 'after_setup_theme', 'surplus_concert_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function surplus_concert_scripts() {

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css'. UNMINIFIED .'/font-awesome'. SUFFIX .'.css' );

    wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/css'. UNMINIFIED .'/slick-theme'. SUFFIX .'.css' );

    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css'. UNMINIFIED .'/slick'. SUFFIX .'.css' );

    $fonts_url = surplus_concert_fonts_url();

    if ( ! empty( $fonts_url ) ) {
        wp_enqueue_style( 'surplus-concert-google-fonts', $fonts_url, array(), null );
    }
 
    wp_enqueue_style( 'surplus-concert-style', get_stylesheet_uri(), array(),SURPLUS_CONCERT_THEME_VERSION );
  
    wp_enqueue_script( 'surplus-concert-navigation', get_template_directory_uri() . '/js'. UNMINIFIED .'/navigation'. SUFFIX .'.js', array(), '20151215', true );

    wp_enqueue_script( 'surplus-concert-skip-link-focus-fix', get_template_directory_uri() . '/js'. UNMINIFIED .'/skip-link-focus-fix'. SUFFIX .'.js', array(), '20151215', true );
    
    wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js'. UNMINIFIED .'/slick'. SUFFIX .'.js', array( 'jquery' ), '1.6.0', true );

    wp_enqueue_script( 'jquery-match-height', get_template_directory_uri() . '/assets/js'. UNMINIFIED .'/jquery.matchHeight'. SUFFIX .'.js', array( 'jquery' ), '1.6.0', true );

    wp_enqueue_script( 'surplus-concert-custom-accessibility', get_template_directory_uri() . '/js'. UNMINIFIED .'/custom-accessibility'. SUFFIX .'.js', array( 'jquery' ), SURPLUS_CONCERT_THEME_VERSION, true );

    wp_enqueue_script( 'surplus-concert-custom-script', get_template_directory_uri() . '/js'. UNMINIFIED .'/custom'. SUFFIX .'.js', array( 'jquery' ), SURPLUS_CONCERT_THEME_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'surplus_concert_scripts' );

/**
 * Custom functions additions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Metabox additions.
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Extra functions additions.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Add widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}