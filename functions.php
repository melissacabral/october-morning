<?php
/* activate sleeping functionality */

//Featured image per post
add_theme_support( 'post-thumbnails' );

add_theme_support( 'custom-background' );


/**
 * Custom Header
 * Dont forget to put header_image() in header.php
 * TODO: figure out why default header isnt working
 * @link https://codex.wordpress.org/Custom_Headers
 */
$header_args = array(
	'width' 		=> 1500,
	'height' 		=> 750,
	'default-image' => get_template_directory_uri() . '/images/header.jpg',
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









//no close php