<?php
/**
 * Kormo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kormo
 */

if ( ! function_exists( 'kormo_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kormo_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Kormo, use a find and replace
		 * to change 'kormo' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'kormo', get_template_directory() . '/languages' );

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
			'main-menu' => esc_html__( 'Main Menu', 'kormo' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'kormo' ),
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
		add_theme_support( 'custom-background', apply_filters( 'kormo_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Enable custom header
		 */
		add_theme_support('custom-header');

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

		/**
		 * Enable suporrt for Post Formats
		 *
		 * see: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat',
		) );

		remove_theme_support( 'widgets-block-editor' );

		add_image_size( 'bdevs-single-fullwidth', 1180, 520, array('center','center') );
		add_image_size( 'kormo-gallery-thumb', 500, 450, array('center','center') );
		add_image_size( 'karkhana-grid-thumb', 650, 600,array('center','center') );
		add_image_size( 'kormo-team-thumb', 450, 530,array('center','center') );



	}
endif;
add_action( 'after_setup_theme', 'kormo_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kormo_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'kormo_content_width', 640 );
}
add_action( 'after_setup_theme', 'kormo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kormo_widgets_init() {

	/**
	* blog sidebar
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'kormo' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'kormo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	/**
	* Footer Widget One
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget One', 'kormo' ),
		'id'            => 'footer-widget-one',
		'description'   => esc_html__( 'Add widgets here.', 'kormo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	/**
	* Footer Widget Two
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Two', 'kormo' ),
		'id'            => 'footer-widget-two',
		'description'   => esc_html__( 'Add widgets here.', 'kormo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	/**
	* Footer Widget Three
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Three', 'kormo' ),
		'id'            => 'footer-widget-three',
		'description'   => esc_html__( 'Add widgets here.', 'kormo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );


	/**
	* Footer Widget Four
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Four', 'kormo' ),
		'id'            => 'footer-widget-four',
		'description'   => esc_html__( 'Add widgets here.', 'kormo' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	/**
	* Footer Menu
	*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Menu', 'kormo' ),
		'id'            => 'footer-menu',
		'description'   => esc_html__( 'Add Footer Menu', 'kormo' ),
		'before_widget' => '<nav id="%1$s" class="%2$s">',
		'after_widget'  => '</nav>',
		'before_title'  => '',
		'after_title'   => '',
	) );


	/**
	* Service Widget
	*/
	register_sidebar(
		array(
			'name' 			=> esc_html__( 'Services Sidebar', 'kormo' ),
			'id' 			=> 'services-sidebar',
			'description' 	=> esc_html__( 'Widgets in this area will be shown on Service Details Sidebar.', 'kormo' ),
			'before_title' 	=> '<h3>',
			'after_title' 	=> '</h3>',
			'before_widget' => '<div class="servicee-sidebar  %2$s">',
			'after_widget' 	=> '</div>',
		)
	);

}
add_action( 'widgets_init', 'kormo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
define('KORMO_THEME_DIR', get_template_directory() );
define('KORMO_THEME_URI', get_template_directory_uri());
define('KORMO_THEME_CSS_DIR', KORMO_THEME_URI.'/css/');
define('KORMO_THEME_JS_DIR', KORMO_THEME_URI.'/js/');
define('KORMO_THEME_INC', KORMO_THEME_DIR.'/inc/');

/** 
 * kormo_scripts description
 * @return [type] [description]
 */
function kormo_scripts() {
	/**
	* all css files
	*/
    wp_enqueue_style( 'kormo-fonts', '//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Work+Sans:400,500,600,700&display=swap', array(), '1.0.0' );
	wp_enqueue_style('bootstrap', KORMO_THEME_CSS_DIR.'bootstrap.min.css', array());
	wp_enqueue_style('fontawesome', KORMO_THEME_CSS_DIR.'fontawesome-all.min.css', array());
	wp_enqueue_style('animate', KORMO_THEME_CSS_DIR.'animate.css', array());
	wp_enqueue_style('slick', KORMO_THEME_CSS_DIR.'slick.css', array());
	wp_enqueue_style('magnific-popup', KORMO_THEME_CSS_DIR.'magnific-popup.css', array());
	wp_enqueue_style('nice-select', KORMO_THEME_CSS_DIR.'nice-select.css', array());
	wp_enqueue_style('linearicons', KORMO_THEME_CSS_DIR.'linearicons.css', array());
	wp_enqueue_style('meanmenu', KORMO_THEME_CSS_DIR.'meanmenu.css', array());
	wp_enqueue_style('default', KORMO_THEME_CSS_DIR.'default.css', array());
	wp_enqueue_style('kormo-main', KORMO_THEME_CSS_DIR.'main.css', array());
	wp_enqueue_style( 'kormo-style', get_stylesheet_uri() );
	wp_enqueue_style('responsive', KORMO_THEME_CSS_DIR.'responsive.css', array());

	if(get_theme_mod( 'rtl_switch',false)) {
		wp_enqueue_style( 'kormo-rtl', KORMO_THEME_CSS_DIR . 'rtl.css', array() );
		wp_enqueue_style( 'kormo-rtl-responsive', KORMO_THEME_CSS_DIR . 'rtl-responsive.css', array() );
	}


	



	// all js
	wp_enqueue_script( 'modernizr', KORMO_THEME_JS_DIR.'vendor/modernizr-3.5.0.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'popper', KORMO_THEME_JS_DIR.'popper.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'bootstrap', KORMO_THEME_JS_DIR.'bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'isotope-pkgd', KORMO_THEME_JS_DIR.'isotope.pkgd.min.js', array('jquery', 'imagesloaded'), false, true );
	wp_enqueue_script( 'jquery-magnific-popup', KORMO_THEME_JS_DIR.'jquery.magnific-popup.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-nice-select', KORMO_THEME_JS_DIR.'jquery.nice-select.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-meanmenu', KORMO_THEME_JS_DIR.'jquery.meanmenu.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-counterup', KORMO_THEME_JS_DIR.'jquery.counterup.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'waypoints', KORMO_THEME_JS_DIR.'waypoints.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'slick', KORMO_THEME_JS_DIR.'slick.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'scrollup', KORMO_THEME_JS_DIR.'scrollup-min.js', array('jquery'), false, true );
	wp_enqueue_script( 'kormo-plugins', KORMO_THEME_JS_DIR.'plugins.js', array('jquery'), false, true );
	

	if(get_theme_mod( 'rtl_switch',false)) {
		wp_enqueue_script( 'rtl-main', KORMO_THEME_JS_DIR.'rtl-main.js', array('jquery'), false, true );
	}
	else{
		wp_enqueue_script( 'kormo-main', KORMO_THEME_JS_DIR.'main.js', array('jquery'), false, true );
	}


	wp_enqueue_script( 'kormo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), false, true );
 
	wp_enqueue_script( 'kormo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kormo_scripts' );



/**
 * [kormo_fonts_url description]
 * @param  [type] $font [description]
 * @return [type]       [description]
 */
function kormo_fonts_url($font) {

	$font_url = '';

	/*
	Translators: If there are characters in your language that are not supported
	by chosen font(s), translate this to 'off'. Do not translate into your own language.
		*/
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'kormo' ) ) {
		$font_url = add_query_arg( 'family', urlencode($font), "//fonts.googleapis.com/css" );
	}
	return $font_url;
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require get_template_directory() . '/inc/template-helper.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
* include kormo functions file
*/
require_once KORMO_THEME_INC . 'kormo_navwalker.php';
require_once KORMO_THEME_INC . 'kormo_customizer.php';
require_once KORMO_THEME_INC . 'kormo_customizer_data.php';
require_once KORMO_THEME_INC . 'class-tgm-plugin-activation.php';
require_once KORMO_THEME_INC . 'kormo_add_plugin.php';



/**
*
* comment section
*
*/
add_filter('comment_form_default_fields', 'kormo_comment_form_default_fields_func');

function kormo_comment_form_default_fields_func($default){
	$default['author'] = '<div class="row">
                            <div class="col-xl-6">
                                <input type="text" name="author" placeholder="'.esc_attr__('Name','kormo').'">
                            </div>';
	$default['email'] = '<div class="col-xl-6">
                            <input type="text" name="email" placeholder="'.esc_attr__('Email','kormo').'">
                        </div>';
	$default['url'] = '';

	$default['clients_commnet'] = '<div class="col-xl-12">
                                     <textarea id="comment" name="comment" cols="30" rows="10" placeholder="'.esc_attr__('Comments','kormo').'"></textarea>';



	return $default;
}



add_filter('comment_form_defaults', 'kormo_comment_form_defaults_func');

function kormo_comment_form_defaults_func($info){
	if( !is_user_logged_in() ){
		$info['comment_field'] = '';
		$info['submit_field'] = '%1$s %2$s</div></div>';
	}else {
		$info['comment_field'] = '<div class="comments-textarea">
                                                <textarea id="comment" name="comment" cols="30" rows="10" placeholder="'.esc_attr__('Comments','kormo').'"></textarea>';
        $info['submit_field'] = '%1$s %2$s</div>';
	}


	$info['submit_button'] = '<button class="btn brand-btn" type="submit">'.esc_html__('Post Comment','kormo').' <span>&rarr;</span> </button>';

	$info['title_reply_before'] = '<div class="details-title mb-30">
                                        <h2>';
	$info['title_reply_after'] = '</h2></div>';
	$info['comment_notes_before'] = '';

	return $info;
}






if( !function_exists('kormo_comment') ) {

	function kormo_comment($comment, $args, $depth) {
		$GLOBAL['comment'] = $comment;
		extract($args, EXTR_SKIP);
		$replayClass = 'comment-depth-' . esc_attr($depth);
		?>
			<li id="comment-<?php comment_ID(); ?>" <?php comment_class($replayClass); ?>>
				<div class="comments-box">
					<div class="comments-avatar">
						<?php print get_avatar($comment, 102, null, null, array('class'=> array())); ?>
					</div>
					<div class="comments-text">
						<div class="avatar-name">
							<h5><?php print get_comment_author_link(); ?></h5>
							<span><?php comment_time( get_option('date_format') ); ?></span>
						</div>
						<?php comment_text(); ?>
						<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'] ))); ?>
					</div>
				</div>
		<?php
	}
}


/**
* shortcode supports for removing extra p, spance etc
*
*/
add_filter( 'the_content', 'kormo_shortcode_extra_content_remove' );
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function kormo_shortcode_extra_content_remove( $content ) {

    $array = array(
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']'
    );
    return strtr( $content, $array );

}


// kormo_search_filter_form
if(!function_exists('kormo_search_filter_form')){
  function kormo_search_filter_form( $form ) {
    
    $form = sprintf( 
    	'<form action="%s" method="get" class="search-form2">
      	<input type="text" class="form-control" value="%s" required name="s" placeholder="%s">
      	<button type="submit" class="kormo-search-btn"> <i class="fas fa-search"></i>  </button>
		</form>',
		esc_url( home_url('/')),
		esc_attr( get_search_query()),
		esc_html__('Search','kormo')
	);

    return $form;
  }
  add_filter( 'get_search_form','kormo_search_filter_form');
}


// enable_rtl
function enable_rtl(){
	if(get_theme_mod( 'rtl_switch',false)) {
		return ' dir="rtl" ';
	}
	else{
		return '';
	}
}