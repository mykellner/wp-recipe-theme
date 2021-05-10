<?php
/**
 * Bootscore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bootscore
 */


// WooCommerce
//require get_template_directory() . '/woocommerce/woocommerce-functions.php';
// WooCommerce End


require get_template_directory() . '/inc/acf-loader.php';


// Register Nav Walker class_alias
if ( ! function_exists( 'register_navwalker' ) ) :
    function register_navwalker(){
        require_once('inc/class-wp-bootstrap-navwalker.php');
    }
endif;
add_action( 'after_setup_theme', 'register_navwalker' );

// Register Comment List
require_once('inc/comment-list.php');


if ( ! function_exists( 'bootscore_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bootscore_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Bootscore, use a find and replace
		 * to change 'bootscore' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bootscore', get_template_directory() . '/languages' );

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
			'primary' => esc_html__( 'Main Menu', 'bootscore' ),
			'secondary' => esc_html__( 'Footer Menu', 'bootscore' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );


        add_theme_support('custom-logo', [
            'height' => 50,
            'width' => 200,
        ]);
    
        /**
         * Declare support for custom header image.
         */
        add_theme_support('custom-header', [
            // Display the header text along with the image
            'header-text' => true,
    
            // Header image width (in pixels)
            'width' => 2560,
    
            // Header image height (in pixels)
            'height' => 800,
    
            // Allow flexible image width
            'flex-width' => true,
    
            // Allow flexible image height
            'flex-height' => true,
        ]);
    

	}
endif;
add_action( 'after_setup_theme', 'bootscore_setup' );




/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bootscore_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bootscore_content_width', 640 );
}
add_action( 'after_setup_theme', 'bootscore_content_width', 0 );



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// Widgets
if ( ! function_exists( 'bootscore_widgets_init' ) ) :

    function bootscore_widgets_init() {

        // Top Nav
        register_sidebar(array(
            'name' => esc_html__('Top Nav', 'bootscore' ),
            'id' => 'top-nav',
            'description' => esc_html__('Add widgets here.', 'bootscore' ),
            'before_widget' => '<div class="ms-3">',
            'after_widget' => '</div>',
            'before_title' => '<div class="widget-title d-none">',
            'after_title' => '</div>'
        ));
        // Top Nav End

        // Top Nav Search
        register_sidebar(array(
            'name' => esc_html__('Top Nav Search', 'bootscore' ),
            'id' => 'top-nav-search',
            'description' => esc_html__('Add widgets here.', 'bootscore' ),
            'before_widget' => '<div class="top-nav-search">',
            'after_widget' => '</div>',
            'before_title' => '<div class="widget-title d-none">',
            'after_title' => '</div>'
        ));
        // Top Nav Search End

        // Sidebar
        register_sidebar( array(
            'name'          => esc_html__( 'Sidebar', 'bootscore' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'bootscore' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s card card-body mb-4 bg-light border-0">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title card-title border-bottom py-2">',
            'after_title'   => '</h2>',
        ) );
        // Sidebar End

          // Blog-sidebar for blog
          register_sidebar( array(
            'name'          => esc_html__( 'Blog-sidebar', 'bootscore' ),
            'id'            => 'blog-sidebar',
            'description'   => esc_html__( 'Add widgets here.', 'bootscore' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s card card-body mb-4 bg-light border-0">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title card-title border-bottom py-2">',
            'after_title'   => '</h2>',
        ) );
        // Blog-sidebar End

        // Top Footer
        register_sidebar(array(
            'name' => esc_html__('Top Footer', 'bootscore' ),
            'id' => 'top-footer',
            'description' => esc_html__('Add widgets here.', 'bootscore' ),
            'before_widget' => '<div class="footer_widget mb-5">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        ));
        // Top Footer End

        
 

    }
    add_action( 'widgets_init', 'bootscore_widgets_init' );


endif;
// Widgets End



// Shortcode in HTML-Widget
add_filter( 'widget_text', 'do_shortcode' );
// Shortcode in HTML-Widget End


/**
 * Enqueue scripts and styles.
 */
function bootscore_scripts() {

    // Style CSS
	wp_enqueue_style( 'bootscore-style', get_template_directory_uri() . '/css/theme.css' );

	// Fontawesome
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/lib/fontawesome.min.css');

	// Bootstrap JS
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/lib/bootstrap.bundle.min.js', array(), '20151215', true );

    // Theme JS
	wp_enqueue_script( 'bootscore-script', get_template_directory_uri() . '/js/theme.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bootscore_scripts' );


// Add <link rel=preload> to Fontawesome
add_filter('style_loader_tag', 'wpse_231597_style_loader_tag');

function wpse_231597_style_loader_tag($tag){

    $tag = preg_replace("/id='font-awesome-css'/", "id='font-awesome-css' online=\"if(media!='all')media='all'\"", $tag);

    return $tag;
}
// Add <link rel=preload> to Fontawesome End


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Amount of posts/products in category
if ( ! function_exists( 'wpsites_query' ) ) :

    function wpsites_query( $query ) {
    if ( $query->is_archive() && $query->is_main_query() && !is_admin() ) {
            $query->set( 'posts_per_page', 24 );
        }
    }
    add_action( 'pre_get_posts', 'wpsites_query' );

endif;
// Amount of posts/products in category End


// Pagination Categories
function bootscore_pagination($pages = '', $range = 2)
{
	$showitems = ($range * 2) + 1;
	global $paged;
	if($pages == '')
	{
		global $wp_query;
		$pages = $wp_query->max_num_pages;

		if(!$pages)
			$pages = 1;
	}

	if(1 != $pages)
	{
	    echo '<nav aria-label="Page navigation" role="navigation">';
        echo '<span class="sr-only">Page navigation</span>';
        echo '<ul class="pagination justify-content-center ft-wpbs mb-4">';


	 	if($paged > 2 && $paged > $range+1 && $showitems < $pages)
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link(1).'" aria-label="First Page">&laquo;</a></li>';

	 	if($paged > 1 && $showitems < $pages)
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'" aria-label="Previous Page">&lsaquo;</a></li>';

		for ($i=1; $i <= $pages; $i++)
		{
		    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				echo ($paged == $i)? '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>'.$i.'</span></li>' : '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'"><span class="sr-only">Page </span>'.$i.'</a></li>';
		}

		if ($paged < $pages && $showitems < $pages)
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" aria-label="Next Page">&rsaquo;</a></li>';

	 	if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages)
			echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($pages).'" aria-label="Last Page">&raquo;</a></li>';

	 	echo '</ul>';
        echo '</nav>';
        // echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">of</span> '.$pages.' ]</div>';
	}
}
//Pagination Categories End


// Pagination Buttons Single Posts
add_filter('next_post_link', 'post_link_attributes');
add_filter('previous_post_link', 'post_link_attributes');

function post_link_attributes($output) {
    $code = 'class="page-link"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}
// Pagination Buttons Single Posts End



// Excerpt to pages
add_post_type_support( 'page', 'excerpt' );
// Excerpt to pages End


// Breadcrumb
if ( ! function_exists( 'the_breadcrumb' ) ) :
    function the_breadcrumb() {
        if(!is_home()) {
            echo '<nav class="breadcrumb mb-4 mt-2 bg-light py-1 px-2 rounded">';
            echo '<a href="'.home_url('/').'">'.('<i class="fas fa-home"></i>').'</a><span class="divider">&nbsp;/&nbsp;</span>';
            if (is_category() || is_single()) {
                the_category(' <span class="divider">&nbsp;/&nbsp;</span> ');
                if (is_single()) {
                    echo ' <span class="divider">&nbsp;/&nbsp;</span> ';
                    the_title();
                }
            } elseif (is_page()) {
                echo the_title();
            }
            echo '</nav>';
        }
    }
    add_filter( 'breadcrumbs', 'breadcrumbs' );
endif;
// Breadcrumb End


// Comment Button
function bootscore_comment_form( $args ) {
    $args['class_submit'] = 'btn btn-outline-primary'; // since WP 4.1
    return $args;
}
add_filter( 'comment_form_defaults', 'bootscore_comment_form' );
// Comment Button End


// Password protected form
function bootscore_pw_form () {
	$output = '
		  <form action="'.get_option('siteurl').'/wp-login.php?action=postpass" method="post" class="form-inline">'."\n"
		.'<input name="post_password" type="password" size="" class="form-control me-2 my-1" placeholder="' . __('Password', 'bootscore') . '"/>'."\n"
		.'<input type="submit" class="btn btn-outline-primary my-1" name="Submit" value="' . __('Submit', 'bootscore') . '" />'."\n"
		.'</p>'."\n"
		.'</form>'."\n";
	return $output;
}
add_filter("the_password_form","bootscore_pw_form");
// Password protected form End


// Allow HTML in term (category, tag) descriptions
foreach ( array( 'pre_term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_filter_kses' );
	if ( ! current_user_can( 'unfiltered_html' ) ) {
		add_filter( $filter, 'wp_filter_post_kses' );
	}
}

foreach ( array( 'term_description' ) as $filter ) {
	remove_filter( $filter, 'wp_kses_data' );
}
// Allow HTML in term (category, tag) descriptions End


// Allow HTML in author bio
remove_filter('pre_user_description', 'wp_filter_kses');
add_filter( 'pre_user_description', 'wp_filter_post_kses');
// Allow HTML in author bio End


// Hook after #primary
function bs_after_primary() {
    do_action('bs_after_primary');
}
// Hook after #primary End


// Open links in comments in new tab
if ( ! function_exists( 'bs_comment_links_in_new_tab' ) ) :
    function bs_comment_links_in_new_tab($text)
    {
        return str_replace('<a', '<a target="_blank" rel=”nofollow”', $text);
    }
    add_filter('comment_text', 'bs_comment_links_in_new_tab');
endif;
// Open links in comments in new tab


function bs_wp_head_customizer_css() {
	$styles = [];

	$header_textcolor = get_theme_mod('header_textcolor');
	array_push($styles, "#site-header-img .header-text-wrapper {
		color: #{$header_textcolor};
	}");

	if (get_theme_mod('header_textshadow')) {
		$header_textshadow = sprintf(
			"%dpx %dpx %dpx %s",
			get_theme_mod('header_textshadow_offset_x'),
			get_theme_mod('header_textshadow_offset_y'),
			get_theme_mod('header_textshadow_blur_radius'),
			get_theme_mod('header_textshadow_color')
		);
		array_push($styles, "#site-header-img .header-text-wrapper {
			text-shadow: {$header_textshadow};
		}");
	}

	printf("<style>%s</style>", implode("\n", $styles));
}
add_action('wp_head', 'bs_wp_head_customizer_css');


// header text shadow

function bs_customizer($wp_customizer) {
	// Use Header Textshadow?
	$wp_customizer->add_setting('header_textshadow', [
		'default' => false,
	]);
	$wp_customizer->add_control(
		new WP_Customize_Control(
			$wp_customizer,
			'header_textshadow',
			[
				'label' => 'Header Textshadow',			// Admin-visible name of the control
				'setting' => 'header_textshadow',			// Which setting to load and manipulate
				'section' => 'colors', 							// ID of the section this control should render in
				'type' => 'checkbox',
			]
		)
	);

	// Header Textshadow Color
	$wp_customizer->add_setting('header_textshadow_color', [
		'default' => '#dddddd',
	]);
	$wp_customizer->add_control(
		new WP_Customize_Color_Control(
			$wp_customizer,
			'header_textshadow_color',
			[
				'label' => 'Header Textshadow Color',			// Admin-visible name of the control
				'setting' => 'header_textshadow_color',			// Which setting to load and manipulate
				'section' => 'colors', 							// ID of the section this control should render in
				'sanitize_callback' => 'sanitize_hex_color',	// Sanitize HEX color
			]
		)
	);

	// Header Textshadow offset-x
	$wp_customizer->add_setting('header_textshadow_offset_x', [
		'default' => '0',
	]);
	$wp_customizer->add_control(
		new WP_Customize_Control(
			$wp_customizer,
			'header_textshadow_offset_x',
			[
				'label' => 'Header Textshadow Offset X',		// Admin-visible name of the control
				'description' => 'Offset in pixels',			// Admin-visible description of the control
				'setting' => 'header_textshadow_offset_x',		// Which setting to load and manipulate
				'section' => 'colors', 							// ID of the section this control should render in
				'sanitize_callback' => 'mbt_sanitize_int',		// Sanitize integer
				'type' => 'number',
			]
		)
	);

	// Header Textshadow offset-y
	$wp_customizer->add_setting('header_textshadow_offset_y', [
		'default' => '0',
	]);
	$wp_customizer->add_control(
		new WP_Customize_Control(
			$wp_customizer,
			'header_textshadow_offset_y',
			[
				'label' => 'Header Textshadow Offset Y',		// Admin-visible name of the control
				'description' => 'Offset in pixels',			// Admin-visible description of the control
				'setting' => 'header_textshadow_offset_y',		// Which setting to load and manipulate
				'section' => 'colors', 							// ID of the section this control should render in
				'sanitize_callback' => 'mbt_sanitize_int',		// Sanitize integer
				'type' => 'number',
			]
		)
	);

	// Header Textshadow blur-radius
	$wp_customizer->add_setting('header_textshadow_blur_radius', [
		'default' => '0',
	]);
	$wp_customizer->add_control(
		new WP_Customize_Control(
			$wp_customizer,
			'header_textshadow_blur_radius',
			[
				'label' => 'Header Textshadow Blur Radius',		// Admin-visible name of the control
				'description' => 'Blur radius in pixels',		// Admin-visible description of the control
				'setting' => 'header_textshadow_blur_radius',	// Which setting to load and manipulate
				'section' => 'colors', 							// ID of the section this control should render in
				'sanitize_callback' => 'mbt_sanitize_int',		// Sanitize integer
				'type' => 'number',
				'input_attrs' => [
					'min' => '0',
				],
			]
		)
	);

	// Blog Section
	$wp_customizer->add_section('mbt_blog', [
		'title' => 'Blog Settings',
		'priority' => 30,
	]);

	// Blog sidebar
	$wp_customizer->add_setting('blog_sidebar', [
		'default' => 'right',
	]);
	$wp_customizer->add_control('blog_sidebar', [
		'label' => 'Blog Sidebar Location',
		'description' => 'This applies to devices ≥768px.',
		'setting' => 'blog_sidebar',
		'section' => 'mbt_blog',
		'type' => 'radio',
		'choices' => [
			'left' => 'Left',
			'right' => 'Right',
		],
	]);
}
add_action('customize_register', 'bs_customizer');

function bs_navbar_brand() {
    $custom_logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

    if ($logo) {
        echo '<div class="d-flex align-items-end"><img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '"><h3 class="site-title-header ms-3">', get_bloginfo('name'), '</h2></div>';
    } else {
        echo get_bloginfo('name');
    }
}
