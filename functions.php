<?php
/**
 * Puzzle functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Puzzle
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'puzzle_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function puzzle_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Puzzle, use a find and replace
		 * to change 'puzzle' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'puzzle', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'standard' ),
				'menu-2' => esc_html__( 'Secondary', 'standard' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'puzzle_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'puzzle_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function puzzle_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'puzzle_content_width', 640 );
}
add_action( 'after_setup_theme', 'puzzle_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

add_action('widgets_init', 'myWidget');
function myWidget(){
	register_sidebar(array(
		'name'=>'Logo',
		'id' => 'widget-1'
	  ));
	  register_sidebar(array(
		'name'=>'Header Rightside',
		'id' => 'header-widget'
	  ));
  register_sidebar(array(
    'name'=>'Footer 1',
    'id' => 'footer1'
  ));
  register_sidebar(array(
    'name'=>'Footer 2',
    'id' => 'footer2'
  ));
  register_sidebar(array(
    'name'=>'Footer 3',
    'id' => 'footer3'
  ));
  register_sidebar(array(
    'name'=>'Footer 4',
    'id' => 'footer4'
  ));
  register_sidebar(array(
    'name'=>'Timings',
    'id' => 'timings'
  ));
  register_sidebar(array(
    'name'=>'Phone NR',
    'id' => 'onlynr'
  ));
  register_sidebar(array(
    'name'=>'Header Phone NR',
    'id' => 'onlynrtop'
  ));
  register_sidebar(array(
    'name'=>'Contact Type Boxs',
    'id' => 'contacttype'
  ));
  register_sidebar(array(
    'name'=>'Contact Form Page',
    'id' => 'conactformpg'
  ));
}

/**
 * Enqueue scripts and styles.
 */



function puzzle_scripts() {
	wp_enqueue_style( 'puzzle-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'standard-bootstrap-style', get_template_directory_uri() . '/src/css/bootstrap.min.css', array(), null );
	wp_enqueue_style( 'standard-main-style', get_template_directory_uri() . '/src/scss/style.css', array(), null );
	wp_enqueue_style( 'standard-awesome-style', get_template_directory_uri() . '/src/css/font-awesome.css', array(), null );
	wp_enqueue_style( 'standard-swiper-style', get_template_directory_uri() . '/src/css/swiper.css', array(), null );
	wp_style_add_data( 'puzzle-style', 'rtl', 'replace' );

	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/src/js/bootstrap.min.js', array(), null, true );
	wp_enqueue_script( 'standard-jquery-js', get_template_directory_uri() . '/src/js/jquery.js', array(), null, false );
	wp_enqueue_script( 'standard-swiper-js', get_template_directory_uri() . '/src/js/swiper.js', array(), null, true );
	wp_enqueue_script( 'standard-main-js', get_template_directory_uri() . '/src/js/main.js', array(), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'puzzle_scripts' );





function custom_post_type(){
    
	$labels_frontpage = array(
	  'name' => 'Slider',
	  );
	  register_post_type('sliserhome', array(
	  'labels' => $labels_frontpage,
	  'public' => true,
	  'has_archive' => true,
	  'publicly_queryable' => true,
	  'query_var' => true,
	  'rewrite' => true,
	  'capability_type' => 'post',
	  'hierarchical' => false,
	  'supports' => array(
	  'title',
	  'editor',
	  'excerpt',
	  'thumbnail',
	  'revisions',),
	  'menu_position' => 8,
	  'exclude_from_search' => false,
	  'menu_icon' => 'dashicons-slides',
	  ));
		$labels_frontpage = array(
			'name' => 'Portfolio',
			);
			register_post_type('portfolio', array(
			'labels' => $labels_frontpage,
			'public' => true,
			'has_archive' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
			'page-attributes'
			),
			'menu_position' => 8,
			'exclude_from_search' => false,
			'menu_icon' => 'dashicons-rest-api',
			));
			
	}
add_action('init', 'custom_post_type');





function ld_diens_post_type(){
	$labels = array(
		'name' => 'Categories',
		'singular_name' => 'Dienstleistungen Post',
		'add_new' => 'Add item',
		'all_items' => 'All items',
		'add_new_item' => 'Add Item',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Items',
		'view_item' => 'View Item',
		'search_item' => 'Search Dienstleistungens',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);   
	// Now register the taxonomy
	register_taxonomy('category',array('portfolio'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'category' ),
	));
	}
	add_action('init','ld_diens_post_type');

	function add_portfolio_to_all_category($post_id) {
		// Check if it's a 'portfolio' post type
		if ('portfolio' == get_post_type($post_id)) {
			// Get the 'ALL' category ID (assuming you renamed it to 'ALL')
			$all_category = get_term_by('name', 'ALL', 'category');
	
			if ($all_category) {
				// Get the post's current categories
				$post_categories = wp_get_post_categories($post_id);
	
				// Add the 'ALL' category to the list of categories
				if (!in_array($all_category->term_id, $post_categories)) {
					$post_categories[] = $all_category->term_id;
				}
	
				// Set the post's categories
				wp_set_post_categories($post_id, $post_categories);
			}
		}
	}
	
	add_action('save_post', 'add_portfolio_to_all_category');
	