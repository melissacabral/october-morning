<?php
/* activate sleeping functionality */

//Featured image per post
add_theme_support( 'post-thumbnails' );

add_theme_support( 'custom-background' );


/**
 * Custom Header
 * Dont forget to put header_image() in header.php
 * @link https://codex.wordpress.org/Custom_Headers
 */

register_default_headers( array(
    'texture' => array(
        'url'           => get_template_directory_uri() . '/images/header.jpg',
        'thumbnail_url' => get_template_directory_uri() . '/images/header.jpg',
        'description'   => 'A textured wall',
    ),
    'building' => array(
        'url'           => get_template_directory_uri() . '/images/header-1.jpg',
        'thumbnail_url' => get_template_directory_uri() . '/images/header-1.jpg',
        'description'   => 'A colorful building',
    ),
    'hand' => array(
        'url'           => get_template_directory_uri() . '/images/header-2.jpg',
        'thumbnail_url' => get_template_directory_uri() . '/images/header-2.jpg',
        'description'   => 'a hand drawing',
    ),
    'pencils' => array(
        'url'           => get_template_directory_uri() . '/images/header-3.jpg',
        'thumbnail_url' => get_template_directory_uri() . '/images/header-3.jpg',
        'description'   => 'Pencils on yellow paper',
    ),
) );
$header_args = array(
	'width' 		=> 1500,
	'height' 		=> 750,
);

add_theme_support( 'custom-header', $header_args );


/**
 * Custom Logo. 
 * Put the_custom_logo() anywhere in your templates (header.php)
 */
$logo_args = array(
	'width' 		=> 400,
	'height' 		=> 200,
	'flex-width' 	=> true,
	'flex-height' 	=> true,

);
add_theme_support( 'custom-logo', $logo_args );

//very important if you have a blog/news feed
add_theme_support( 'automatic-feed-links' );

/**
 * better SEO in <title>
 * Don't forget to Remove <title> from header.php
 */
add_theme_support( 'title-tag' );

/**
 * Use HTML5 instead of old XHTML in generated code
 */
add_theme_support( 'html5', array( 'search-form', 'comment-list', 
	'comment-form', 'gallery', 'caption' ) );

/**
 * Post formats allow you to style different posts in a special way
 * Don't forget to style these formats in style.css
 */
add_theme_support( 'post-formats', array( 'image', 'gallery', 'chat', 'video', 
	'audio', 'quote', 'status', 'aside', 'link' ) );

/**
 * Improve default excerpts
 */
function oct_ex_length(){
	if( is_home() ):
		return 70;
	else:
		return 20;
	endif;
}
add_filter( 'excerpt_length', 'oct_ex_length' );

function oct_ex_more(){
	return '&hellip; <a href="' . get_permalink() . '" class="read-more">Read More</a>';
}
add_filter( 'excerpt_more', 'oct_ex_more' );


/**
 * Just an example action hook usage
 */
function oct_action_example(){
	echo 'This is the footer hook!';
}
add_action( 'wp_footer', 'oct_action_example' );

/**
 * Improve the usability of comment replies
 */
function oct_comment_reply_script(){
	if( is_singular() AND comments_open() ):
		wp_enqueue_script('comment-reply');
	endif;
}
add_action( 'wp_enqueue_scripts', 'oct_comment_reply_script' );


/**
 * Set up 2 menu locations
 */
function oct_menu_locations(){
    register_nav_menus( array(
        'main_menu' => 'Main Menu',
        'social_menu' => 'Social Icons',
        'footer_menu' => 'Footer Navigation',
    ) );
}
add_action( 'init', 'oct_menu_locations' );

/**
 * Attach stylesheets for fonts, etc
 */
function oct_stylesheets(){
    //add genericons
    wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css');
}
add_action( 'wp_enqueue_scripts', 'oct_stylesheets' );

/* Add the Jetpack plugin if you want infinite scroll */
add_theme_support( 'infinite-scroll', array(
    'container' => 'content',
    'footer' => 'page',
) );

/**
 * Register all the necessary Widget Areas (Dynamic sidebars)
 */
function oct_widget_areas(){
    //sidebar = widget area
    register_sidebar( array(
        'name' => 'Blog Sidebar',
        'id' => 'blog_sidebar',
        'description' => 'Appears alongside the blog and archives',
        'before_widget' => '<section class="widget %2$s" id="%1$s">',
        'after_widget' => '</section>',
    ) );
    register_sidebar( array(
        'name' => 'Footer Area',
        'id' => 'footer_area',
        'description' => 'Appears at the bottom of every page',
        'before_widget' => '<section class="widget %2$s" id="%1$s">',
        'after_widget' => '</section>',
    ) );
    register_sidebar( array(
        'name' => 'Home Featured Area',
        'id' => 'home_area',
        'description' => 'Appears on the static front page',
        'before_widget' => '<section class="widget %2$s" id="%1$s">',
        'after_widget' => '</section>',
    ) );
}
add_action( 'widgets_init', 'oct_widget_areas' );










//no close php