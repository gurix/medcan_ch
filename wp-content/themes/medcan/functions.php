<?php
if ( ! function_exists( 'ohsik_setup' ) ) :
/**
 * Theme Setup
 */
function ohsik_setup() {
	/**
	 * Set up the content width value based on the theme's design.
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 860;
	}

	/*
	 * Make Theme available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 */
	load_theme_textdomain( 'ohsik', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css' ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	
	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'ohsik-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'ohsik' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'ohsik' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'ohsik_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'ohsik_get_featured_posts',
		'max_posts' => 6,
	) );

	
	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // ohsik_setup
add_action( 'after_setup_theme', 'ohsik_setup' );



/**
 * Register three Ohsik widget areas.
 *
 * @since Ohsik 1.0
 */
function ohsik_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Main Widget Area', 'ohsik' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the side.', 'ohsik' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'ohsik' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears in the footer section of the site.', 'ohsik' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'ohsik_widgets_init' );

/*Comment reply*/
if ( is_singular() ) wp_enqueue_script( "comment-reply" );

/**
 * Page Title
 *
 * @since Ohsik 1.0
 */
function ohsik_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'ohsik' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'ohsik_wp_title', 10, 2 );