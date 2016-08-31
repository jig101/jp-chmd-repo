<?php
/**
 * jp-cmhd functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package jp-cmhd
 */

if ( ! function_exists( 'jp_cmhd_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jp_cmhd_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on jp-cmhd, use a find and replace
	 * to change 'jp-cmhd' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'jp-cmhd', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'jp-cmhd' ),
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
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'jp_cmhd_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    if ( ! function_exists( 'wpt_setup' ) ):
        function wpt_setup() {  
            register_nav_menu( 'primary', __( 'Primary navigation', 'cmhdmenu' ) );
        } endif;
}
endif; // jp_cmhd_setup
add_action( 'after_setup_theme', 'jp_cmhd_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jp_cmhd_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jp_cmhd_content_width', 640 );
}
add_action( 'after_setup_theme', 'jp_cmhd_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jp_cmhd_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'jp-cmhd' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'FootMid', 'jp-cmhd' ),
		'id'            => 'footMid',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'footRight', 'jp-cmhd' ),
		'id'            => 'footRight',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
	register_sidebar( array(
		'name'          => esc_html__( 'singlPost', 'jp-cmhd' ),
		'id'            => 'singlPost',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );				
}
add_action( 'widgets_init', 'jp_cmhd_widgets_init' );

if (!is_admin()) {
add_action('wp_enqueue_scripts', 'jp_load_scripts', 12);
}
function jp_load_scripts() {
		// jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array(), null, false);
		wp_enqueue_script('jquery');
		// Bootstrap
	}


/**
 * Enqueue scripts and styles.
 */
function jp_cmhd_scripts() {
	wp_enqueue_style( 'jp-cmhd-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
	
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '', true );
	
	wp_enqueue_script( 'jp-cmhd-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'jp-cmhd-contcat', get_template_directory_uri() . '/js/contact.js', array(), true );
	$nonce1 = wp_create_nonce("t78YggiWLG9PPisK%bx6Ag");
	wp_localize_script( 'jp-cmhd-contcat', 'ajx', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'n' => $nonce1
	));

	wp_enqueue_script( 'jp-cmhd-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'jp_cmhd_scripts' );
	// Load Javascript
/**
 * Rgister the slides post type.
 */
// Register Custom Post Type
// Register Custom Post Type
function jp_bs_post_type() {

	$labels = array(
		'name'                => _x( 'Slides', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Slide', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Slides', 'text_domain' ),
		'name_admin_bar'      => __( 'Slides', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Items', 'text_domain' ),
		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'new_item'            => __( 'New Item', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'slides',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'Slide', 'text_domain' ),
		'description'         => __( 'Front page slider post types', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'taxonomies'          => array( 'slides' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => true,		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'jp_bs_post_type', $args );

}
add_action( 'init', 'jp_bs_post_type', 0 );

/**
 * Yo enable excerpt
 */
function wpcodex_add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );

function createFooterFormFunction() {
	return '
	<form id="contactform">
	<div class="form-group">
		<label class="control-label sr-only" for="name">Name</label>
		<input type="text" class="form-control" name="name" id="name" placeholder="Name"/>
	</div>
	<div class="form-group">	
		<label class="control-label sr-only" for="email">Email address</label>
		<input type="text" class="form-control" name="email" id="email" placeholder="Email"/>
	</div>
	<div class="form-group">	
		<label class="control-label sr-only" for="phoneNumber">Phone Number</label>
		<input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Phone number"/>
	</div>
	<div class="form-group">
		<label class="control-label sr-only" for="message">Message</label>
		<textarea  class="form-control" name="message" id="message" rows="3" placeholder="Ask us a question and we will get back to you as soon as possible."></textarea>
	</div>
			<input type="hidden" name="action" value="contactform_action" />
			'.wp_nonce_field('E8mpPQXC2mF&pxp4dZE7fZ', '_acf_nonce', true, false).'
			<input type="button" class="btn btn-default" value="Submit" id="cButton" tabindex="5" />
	</form>
	<div id="contact-msg"></div>';
}
add_shortcode('createFooterForm', 'createFooterFormFunction');

function ajax_contactform_action_callback() {
	$error = '';
	$status = 'error';
	if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || empty($_POST['phoneNumber'])) {
		$error = 'All fields are required to enter.';
	} else {
		if (!wp_verify_nonce($_POST['_acf_nonce'], 'E8mpPQXC2mF&pxp4dZE7fZ')) {
			$error = 'Verification error, try again.';
		} else {
			$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
			$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
			$subject = 'A messsage from your website\'s contact form';
			$message = stripslashes($_POST['message']);
			$message .= PHP_EOL.PHP_EOL.'Phone Number: '.$_POST['phoneNumber'];
			$message .= PHP_EOL.'IP address: '.$_SERVER['REMOTE_ADDR'];
			$message .= PHP_EOL.'Sender\'s name: '.$name;
			$message .= PHP_EOL.'E-mail address: '.$email;
			$sendmsg = 'Thanks, for the message. We will respond as soon as possible.';
			$to = 'crawleymobilehairdresser@live.com';//get_option('admin_email'); // If you like change this email address
			// replace "noreply@yourdomain.com" with your real email address
			$header = 'From: '.get_option('blogname').' <crawleymobilehairdresser@live.com >'.PHP_EOL;
			$header .= 'Reply-To: '.$email.PHP_EOL;
			if ( wp_mail($to, $subject, $message, $header) ) {
				$status = 'success';
				$error = $sendmsg;
			} else {
				$error = 'Some errors occurred.';
			}
		}
	}
 
	$resp = array('status' => $status, 'errmessage' => $error);
	header( "Content-Type: application/json" );
	echo json_encode($resp);
	die();
}
add_action( 'wp_ajax_contactform_action', 'ajax_contactform_action_callback' );
add_action( 'wp_ajax_nopriv_contactform_action', 'ajax_contactform_action_callback' );



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

/**
 * Load slider file.
 */
require get_template_directory() . '/inc/jp-slider.php';

require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');