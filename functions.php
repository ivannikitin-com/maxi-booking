<?php
/**
 * MaxiBooking functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MaxiBooking
 */

if ( ! function_exists( 'max_book_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function max_book_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on MaxiBooking, use a find and replace
		 * to change 'max_book' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'max_book', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header' 	=> esc_html__( 'Header', 'max_book' ),
			'service'	=> esc_html__( 'Footer 1-st column', 'max_book' ),
			'info'	=> esc_html__( 'Footer 2-st column', 'max_book' ),
			'about'	=> esc_html__( 'Footer 3-st column', 'max_book' ),
			'footer-links'	=> esc_html__( 'Footer links', 'max_book' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'max_book_custom_background_args', array(
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
endif;
add_action( 'after_setup_theme', 'max_book_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function max_book_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'max_book_content_width', 640 );
}
add_action( 'after_setup_theme', 'max_book_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function max_book_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'max_book' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'max_book' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Пoдвал страницы "Блог"', 'max_book' ),
		'id'            => 'blog-category-footer',
		'description'   => esc_html__( 'Add widgets here.', 'max_book' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Общий подвал', 'max_book' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Add widgets here.', 'max_book' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Подвал - последняя колонка', 'max_book' ),
		'id'            => 'footer-last',
		'description'   => esc_html__( 'Add widgets here.', 'max_book' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title" hidden>',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'max_book_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function max_book_scripts() {
	// Style

	// Scripts
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.4.0.min.js');
	//wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js');
	wp_enqueue_script( 'jquery' );

	//wp_register_script( 'max_book-moderniz-webp', get_template_directory_uri() . '/assets/js/modernizr-webp.js');
	//wp_enqueue_script( 'max_book-moderniz-webp' );

	wp_enqueue_script( 'max_book-owl-js', get_template_directory_uri() . '/assets/js/owl/owl.carousel.min.js', array('jquery'), time(), true );

	//wp_enqueue_script( 'max_book-moderniz-webp', get_template_directory_uri() . '/assets/js/modernizr-webp.js', array(), time(), true );

	wp_enqueue_script( 'max_book-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), time(), true );

	//wp_enqueue_script( 'max_book-price-calc', get_template_directory_uri() . '/assets/js/price_calc_common.js', array('jquery'), time(), true );

    wp_enqueue_script( 'max_book_search_result', '//online-demo.maxi-booking.ru/management/online/api/file/591ef58cd2122b21674826b2/load-result', array(), time(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'max_book_scripts' );

function add_style_footer() {

	wp_enqueue_style( 'max_book-bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-reboot-grid.min.css' );

	wp_enqueue_style( 'max_book-custom-css', get_template_directory_uri() . '/assets/css/style.css' );

	wp_enqueue_style( 'max_book-owl-css', get_template_directory_uri() . '/assets/js/owl/owl.carousel.min.css' );
}

add_action( 'get_footer', 'add_style_footer' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Hook theme.
 */
require get_template_directory() . '/inc/hooks.php';

/**
 * Classes theme.
 */
require get_template_directory() . '/inc/classes/index.php';

/**
 * Widget theme.
 */
require get_template_directory() . '/inc/widgets/index.php';

/**
 * Custom function
 */
require get_template_directory() . '/inc/custom-function.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
