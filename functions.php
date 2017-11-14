<?php
/* activate sleeping functionality */

//Featured image per post
add_theme_support( 'post-thumbnails' );

add_theme_support( 'custom-background' );

//define pixel width of automatic embeds for youtube, twitter, etc
if ( ! isset( $content_width ) ) $content_width = 700;

//make the file editor-style.css in your theme root
add_editor_style();

//add a custom image size for portfolio pieces
//                 name, width, height, crop?
add_image_size( 'banner', 1000, 300, true );

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
        'name' => 'Shop Sidebar',
        'id' => 'shop_sidebar',
        'description' => 'Appears Next to the shop',
        'before_widget' => '<section class="widget %2$s" id="%1$s">',
        'after_widget' => '</section>',
    ) );
}
add_action( 'widgets_init', 'oct_widget_areas' );


/**
 * Easier function to output custom fields as a comma-separated list
 */
function oct_field_list( $label = '', $field = '' ){
    global $post;
    $values = get_post_meta( $post->ID, $field );
    if( isset($values[0]) && $values[0] != '' ):
    ?>
    <div class="<?php echo $field; ?>"><?php echo $label; ?>:        
        <b><?php echo implode(', ', $values ); ?></b>
    </div>
    <?php
    endif;
}

/**
 * WooCommerce stuff
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<main class="content woocommerce-content">';
}

function my_theme_wrapper_end() {
  echo '</main>';
}
//declare woocommerce support (suppress the admin nag)
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
/**
 * Ensure cart contents update when products are added to the cart via AJAX
 * Used in conjunction with https://gist.github.com/DanielSantoro/1d0dc206e242239624eb71b2636ab148
 */ 
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;    
    ob_start();    
    oct_header_cart();    
    $fragments['a.cart-customlocation'] = ob_get_clean();    
    return $fragments;    
}
function oct_header_cart(){
    ?>
    <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
    <?php 
}

/**
 * Attach Scripts and styles
 */
function oct_scripts(){
    //attach jquery
    wp_enqueue_script( 'jquery' );
    //attach our custom script
    $main = get_stylesheet_directory_uri() . '/js/main.js';
    //                  handle,        url,      deps,      version, footer?
    wp_enqueue_script( 'oct-main-js', $main, array('jquery'), '0.1', true );

    //enqueue ALL styles including style.css
    //style.css
    wp_enqueue_style( 'style-css', get_stylesheet_uri() );
    //google fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat%7CSource+Sans+Pro' );
}
add_action('wp_enqueue_scripts', 'oct_scripts');



//no close php