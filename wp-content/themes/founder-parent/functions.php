<?php
/**
 * Founder functions and definitions
 *
 * @package Founder Parent
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1260; /* pixels */
}

if ( ! function_exists( 'founder_parent_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function founder_parent_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Founder, use a find and replace
	 * to change 'founder-parent' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'founder-parent', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add support for WordPres admin bar.
	add_theme_support( 'admin-bar', array( 'callback' => '__return_false') );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	add_post_type_support( 'page', 'excerpt' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'founder-parent' ),
	) );

	register_nav_menus( array(
		'social' => __( 'Social', 'founder-parent' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image', 'video', 'audio', 'gallery',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'founder_parent_custom_background_args', array(
		'default-color'          => '#282E34;',
		'default-image'          => '',
		'default-repeat'         => 'no-repeat',
		'default-attachment'     => '',
		'wp-head-callback'       => 'change_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	) ) );
}
endif; // founder_parent_setup
add_action( 'after_setup_theme', 'founder_parent_setup' );


// Add support for post navigation conditional
	function show_posts_nav() {
		global $wp_query;
			return ($wp_query->max_num_pages > 1);
	}

	// Add support for custom read more link
	function modify_read_more_link() {
			global $post;
				return '<a class="more-link" href="'. get_permalink($post->ID) . '"><span>Continue Reading</span></a> ';
		}

	add_filter( 'the_content_more_link', 'modify_read_more_link' );

	// Add support for removing default image link
	function founder_parent_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
		}
	}

	//alter comment form fields
	function founder_parent_fields($fields) {
	$fields['author'] = '<div class="comment-right"><input id="author" name="author" placeholder="Name" type="text" value="" size="30" aria-required="true">';
	$fields['email'] = '<input id="email" name="email" placeholder="Email" type="email" value="" size="30" aria-describedby="email-notes" aria-required="true">';
	$fields['url'] = '<input id="url" name="url" type="url" placeholder="Website" value="" size="30"></div>';
	
	return $fields;
	}

	add_filter('comment_form_default_fields','founder_parent_fields');

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function founder_parent_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Hidden Sidebar', 'founder-parent' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Page', 'founder-parent' ),
		'id'            => 'page-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Blog', 'founder-parent' ),
		'id'            => 'blog-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Homepage MailForm', 'founder-parent' ),
		'id'            => 'home-subscribe',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );	

	register_sidebar( array(
		'name'          => __( 'Homepage Contact Form', 'founder-parent' ),
		'id'            => 'home-contact',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );	

	register_sidebar( array(
		'name'          => __( 'Landing Page: Download', 'founder-parent' ),
		'id'            => 'landing-page',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );	

	register_sidebar( array(
		'name'          => __( 'Standard MailForm', 'founder-parent' ),
		'id'            => 'subscribe',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Left', 'founder-parent' ),
		'id'            => 'footer-widget-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Left Middle', 'founder-parent' ),
		'id'            => 'footer-widget-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Right Middle', 'founder-parent' ),
		'id'            => 'footer-widget-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Right', 'founder-parent' ),
		'id'            => 'footer-widget-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}

add_action( 'widgets_init', 'founder_parent_widgets_init' );

// add support for shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

function oddeven_post_class ( $classes ) { 
   global $current_class;
   $classes[] = $current_class;

   $current_class = ($current_class == 'odd') ? 'even' : 'odd';

   return $classes;
}
add_filter ( 'post_class' , 'oddeven_post_class' );
global $current_class;
$current_class = 'odd';


// trigger fitvids
	function __fitvids_script() { ?>
	<script type="text/javascript">

	jQuery(function($){
	   $("body").fitVids();
	 });
       
	</script>
		<?php }
		
	add_action( 'wp_footer', '__fitvids_script', 100 );

/**
 * Enqueue scripts and styles.
 */
function founder_parent_scripts() {
	wp_enqueue_style( 'founder-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/inc/font-awesome/font-awesome.css', '', '', 'all' );
	wp_enqueue_style( 'flexslider', get_template_directory_uri().'/inc/flexslider/flexslider.css', '', '', 'all' );
	wp_enqueue_style( 'superfish', get_template_directory_uri().'/inc/superfish/superfish.css', '', '', 'all' );
	wp_enqueue_style( 'open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800italic,800' );
	wp_enqueue_style( 'droid-sans', '//fonts.googleapis.com/css?family=Droid+Sans:400,700' );

	wp_enqueue_script( 'founder-custom', get_template_directory_uri() . '/js/custom.js', array(), '20120206', true );
	wp_enqueue_script( 'founder-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array(), '20120206', true );
	wp_enqueue_script( 'founder-vide', get_template_directory_uri() . '/js/jquery.vide.min.js', array(), '20120206', true );
	wp_enqueue_script( 'founder-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array(), '20120206', true );
	wp_enqueue_script( 'founder-superfish', get_template_directory_uri() . '/js/superfish.js', array(), '20120206', true );
	wp_enqueue_script( 'founder-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '20120206', true );

	$headings_font = esc_html(get_theme_mod('headings_fonts'));
	$body_font = esc_html(get_theme_mod('body_fonts'));
	
	if( $headings_font ) {
		wp_enqueue_style( 'founder-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );	
	} else {
		wp_enqueue_style( 'google-fonts-open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800italic,800' ); 
	}	
	if( $body_font ) {
		wp_enqueue_style( 'founder-body-fonts', '//fonts.googleapis.com/css?family='. $body_font ); 	
	} else {
		wp_enqueue_style( 'google-fonts-droid-sans', '//fonts.googleapis.com/css?family=Droid+Sans:400,700' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
	add_action( 'wp_enqueue_scripts', 'founder_parent_scripts' );

/**
 * Custom Customizer Style
 */
function custom_customizer_style() {
 
	wp_enqueue_style( 'founder-customizer-style', get_template_directory_uri() . '/inc/customizer-css/style.css', array(), '', 'all' );
}
add_action( 'customize_controls_enqueue_scripts', 'custom_customizer_style' );

	// enqueue masonry
	add_action( 'wp_enqueue_scripts', 'founder_parent_masonry' );

	// Add support for Masonry
	function founder_parent_masonry() {
  		wp_enqueue_script( 'jquery-masonry', array( 'jquery' ) );
		}

function founder_parent_masonry_footer() { ?>
        
	        <script type="text/javascript">
			jQuery(function($){
		    $(window).load(function() {
		    "use strict";
		    var $container = $('#masonry');
		    $container.imagesLoaded( function(){
		      $container.masonry({
		        itemSelector : '.masonry-2-cols-testimonials, .masonry-3-cols .masonry-3-cols-portfolio .masonry-4-cols',
		        isAnimated: true,
		        animationOptions: {
	                duration: 400,
	                easing: 'linear',
	                queue: false
	           }
	     				});
		            });
		        });
		    });
		    </script>
       

 <?php } add_action( 'wp_footer', 'founder_parent_masonry_footer' );

	/**
	* Define a new css background image class
	*/

	function change_custom_background_cb() {
	    $background = get_background_image();
	    $color = get_background_color();
	 
	    if ( ! $background && ! $color )
	        return;
	 
	    $style = $color ? "background-color: #$color;" : '#282E34';
	 
	    if ( $background ) {
	        $image = " background-image: url('$background');";
	 
	        $repeat = get_theme_mod( 'background_repeat', 'repeat' );
	 
	        if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
	            $repeat = 'repeat';
	 
	        $repeat = " background-repeat: $repeat;";
	 
	        $position = get_theme_mod( 'background_position_x', 'center' );
	 
	        if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
	            $position = 'center';
	 
	        $position = " background-position: center $position;";
	 
	        $attachment = get_theme_mod( 'background_attachment', 'scroll' );
	 
	        if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
	            $attachment = 'scroll';
	 
	        $attachment = " background-attachment: $attachment;";
	 
	        $style .= $image . $repeat . $position . $attachment;
	    }
	?>
	<style type="text/css">
	.site-header-bg-image { <?php echo trim( $style ); ?> }
	</style>
	<?php
	}

	// function to add styles to WP editor.

add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

function my_mce_before_init( $settings ) {

    $style_formats = array(
        array(
    		'title' => 'Transcript',
    		'block' => 'div',
    		'classes' => 'transcript',
    		'wrapper' => 'block'
    	)
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}

add_action( 'admin_init', 'add_my_editor_style' );

function add_my_editor_style() {
	add_editor_style();
}

	/**
	* Check if EDD is Activated and Add EDD Cart Quantity & Cart Checkout Icon to wp_nav_menu
	*/

	function founder_parent_edd_is_activated() {
	return class_exists( 'Easy_Digital_Downloads' );
	}

	function edd_download_details_widget_thumbnail( $instance ) {
	
	// get the ID of the current post
	$post_id = get_the_ID();
	
	// grab featured image of the appropriate download
	if ( 'current' == $instance['download_id'] ) {
		echo get_the_post_thumbnail( $post_id );
		} else {
			echo get_the_post_thumbnail( $instance['download_id'] );
		}
	}

	add_action( 'edd_product_details_widget_before_purchase_button', 'edd_download_details_widget_thumbnail' );


	/**
	* Remove Nav Toggle if admin bar is showing
	*/

	function custom_admin_bar() {
	if ( !is_admin_bar_showing() )
		return;
	        ?>

	<style type="text/css">
	.nav-toggle {display:none;}
	</style>
	<?php
	}
	add_action('admin_bar_menu', 'custom_admin_bar');

	/**
	* Define a constant path to our single template folder
	*/

	define('SINGLE_PATH', get_template_directory() . '/single');

	/**
	* Filter the single_template with our custom function
	*/

	add_filter('single_template', 'founder_parent_single_template');

	/**
	* Single template function which will choose our template
	*/

	function founder_parent_single_template($single) {
		global $wp_query, $post;

	/**
	* Checks for single template by category
	* Check by category slug and ID
	*/

	foreach((array)get_the_category() as $cat) :

		if(file_exists(SINGLE_PATH . '/single-cat-' . $cat->slug . '.php'))
			return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';

		elseif(file_exists(SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php'))
			return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';

	endforeach;

	return $single;

	}


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Load Google Fonts  
 */
require get_template_directory() . '/inc/google-fonts.php';

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
