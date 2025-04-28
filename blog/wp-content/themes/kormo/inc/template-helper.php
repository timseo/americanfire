<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Kormo
 */




/**
*
* kormo header
*/
add_action('kormo_header_style', 'kormo_check_header', 10);

function kormo_check_header() {

	$header_style = get_post_meta( get_the_ID(), 'choice_header_style', true );

	if( $header_style == 'default' ) {
		kormo_header_default();
	}
	elseif( $header_style=='transparent' ) {

		kormo_header_transparent();
	}
	elseif( $header_style=='boxed' ) {

		kormo_header_boxed();
	}
	elseif( $header_style=='logo-left' ) {

		kormo_header_left_logo();
	}
	else {
		kormo_header_default();
	}


}

/**
* header style 1
*/
function kormo_header_default() {
	$topbar_switch = get_theme_mod('topbar_switch');
	$sticky_switch = get_theme_mod('sticky_switch');
	$sticky_header =  ( $sticky_switch ) ? 'sticky-header': 'no-sticky';
	?>
	<header>
	<?php 
	if( $topbar_switch ) { ?>
	   <div class="header-top-area theme-bg top-space">
	       <div class="container ">
	           <div class="row align-items-center">
	           		<?php header_phone(); ?>
	                <div class="col-xl-6 col-lg-6 col-md-6 col-3 d-flex align-items-center justify-content-end">
	                   <?php header_language(); ?>
	                   <?php header_social_profiles(); ?>
	               </div>
	           </div>
	       </div>
	   </div>
	<?php 
	} ?>   
	   <div id="<?php print esc_attr($sticky_header); ?>" class="header-bottom-area">
	       <div class="container">
	           <div class="row align-items-center">
	               <?php kormo_header_logo(); ?>
	               <div class="col-xl-10 col-lg-9">
	                    <?php kormo_header_quote(); ?>
	                   <?php kormo_header_menu(); ?>
	               </div>
	           </div>
	       </div>
	   </div>
	</header>
<?php 

}


/**
* header style 2
*/
function kormo_header_transparent(){
$sticky_switch = get_theme_mod('sticky_switch');
$sticky_header =  ( $sticky_switch ) ? 'sticky-header': 'no-sticky';
?>
<header class="transparent-header">
    <div class="header-top-area top-space">
        <div class="container ">
            <div class="row align-items-center">
                <?php header_phone(); ?>
                <div class="col-xl-6 col-lg-6 col-md-6 col-3 d-flex align-items-center justify-content-end">
                   <?php header_language(); ?>
                   <?php header_social_profiles(); ?>
                </div>
            </div>
        </div>
    </div>
    <div id="<?php print esc_attr($sticky_header); ?>" class="header-bottom-area">
        <div class="container">
            <div class="row align-items-center">
                <?php kormo_header_logo(); ?>
                <div class="col-xl-10 col-lg-9">
                    <?php kormo_header_quote(); ?>
                    <?php kormo_header_menu(); ?>
                </div>
            </div>
        </div>
    </div>
</header>

<?php }


/**
* header style 3
*/
function kormo_header_boxed(){
$sticky_switch = get_theme_mod('sticky_switch');
$sticky_header =  ( $sticky_switch ) ? 'sticky-header': 'no-sticky';
?>
<header>
    <div id="<?php print esc_attr($sticky_header); ?>" class="header-bottom-area pl-55 pr-55">
        <div class="container-fluid">
            <div class="row align-items-center">
                <?php kormo_header_logo(); ?>
                <div class="col-xl-10 col-lg-9">
                    <?php kormo_header_quote(); ?>
                    <?php kormo_header_menu(); ?>
                </div>
            </div>
        </div>
    </div>
</header>

<?php }

/**
* header style 4
*/
function kormo_header_left_logo(){
	$topbar_switch = get_theme_mod('topbar_switch');
	$sticky_switch = get_theme_mod('sticky_switch');
	$sticky_header =  ( $sticky_switch ) ? 'sticky-header': 'no-sticky';
?>

	<header class="header-4">
	<?php 
	if( $topbar_switch ) { ?>
	   <div class="header-top-area top-space">
	       <div class="container ">
	           <div class="row align-items-center">
	           		<?php welcome_text(); ?>
	                <div class="col-xl-4 col-lg-4 col-md-6 col-3 d-flex align-items-center justify-content-end">
	                   <?php header_language(); ?>
	                   <?php header_social_profiles(); ?>
	               </div>
	           </div>
	       </div>
	   </div>
	<?php 
	} ?>   
	   <div id="<?php print esc_attr($sticky_header); ?>" class="header-bottom-area">
	       <div class="container">
	           <div class="row align-items-center">
	               <?php kormo_header_logo(); ?>
	               <div class="col-xl-10 col-lg-9">
	               		<?php kormo_header_quote(); ?>
	                   <?php kormo_header_menu(); ?>
	               </div>
	           </div>
	       </div>
	   </div>
	</header>

<?php }



/** 
 * [header_phone description]
 * @return [type] [description]
 */
function header_phone(){
	$phone_number 	= get_theme_mod('phone_number', '+00 (123) 2456 88');
?>
    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
        <div class="header-call text-center text-md-left">
            <span class="lnr lnr-phone-handset"></span>
            <span><?php print esc_html__('Call :', 'kormo'); ?></span>
            <span class="phone-number"><?php print esc_html($phone_number); ?></span>
        </div>
    </div>

<?php }

/** 
 * [welcome_text description]
 * @return [type] [description]
 */
function welcome_text(){
	$welcome_text 	= get_theme_mod('welcome_text', 'Welcome to kormo. We are always with you to make your project.');
?>
    <div class="col-xl-8 col-lg-8 col-md-6 col-12">
        <div class="header-wel-text text-center text-md-left">
            <p><?php print esc_html($welcome_text); ?></span>
        </div>
    </div>

<?php }


/** 
 * [header_language description]
 * @return [type] [description]
 */
function header_language() { 
	$lang_switch = get_theme_mod('lang_switch');
	?>
	<?php if(!empty($lang_switch))  : ?>
	<div class="language f-left d-none d-md-block">
		<?php do_action('kormo_language'); ?>
	</div>
	<?php endif; ?>
	<?php 

}

/** 
 * [kormo_language_list description]
 * @return [type] [description]
 */
function kormo_language_list() {

	function _kormo_language_callback($mar) {
		return $mar;
	}

  	$mar = '';
  	$languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );

    if ( !empty( $languages ) ) {
    	$mar = '<ul>';
      	foreach($languages as $lan) {
        	$active = $lan['active']==1?'active':'';
        	$mar .= '<li class="'.$active.'"><a href="'.$lan['url'].'">'.$lan['translated_name'].'</a></li>';
      	}
    	$mar .= '</ul>';
    }
    else {
    	//remove this code when send themeforest reviewer team
    	$mar .= '<ul>';
      	$mar .= '<li><a href="#">'.esc_html__('English','kormo').'<i class="fas fa-angle-down"></i></a>';
        $mar .= '<ul>';
      	$mar .= '<li><a href="#">'.esc_html__('English','kormo').'</a></li>';
      	$mar .= '<li><a href="#">'.esc_html__('France','kormo').'</a></li>';
        $mar .= '</ul>';
      	$mar .= '</li>';
    	$mar .= ' </ul>';
  	}

  	print _kormo_home_callback($mar);

}

add_action('kormo_language','kormo_language_list');


/** 
 * [header_social_profiles description]
 * @return [type] [description]
 */
function header_social_profiles() {
	$topbar_fb_url 			= get_theme_mod('topbar_fb_url', '#');
	$topbar_twitter_url 	= get_theme_mod('topbar_twitter_url', '#');
	$topbar_google_url 		= get_theme_mod('topbar_google_url', '#');
	$topbar_instagram_url 	= get_theme_mod('topbar_instagram_url', '#');
	?>
	<div class="social-icon f-left d-none d-md-block">
	    <?php 
		if ($topbar_fb_url != '#'): ?>
		  <a href="<?php print esc_url($topbar_fb_url); ?>">
		      <i class="fab fa-facebook-f"></i>
		  </a><?php 
		  endif; ?>

	  	<?php 
		if ($topbar_twitter_url != '#'): ?>
		  <a href="<?php print esc_url($topbar_twitter_url); ?>">
		      <i class="fab fa-twitter"></i>
		  </a><?php 
		  endif; ?>

	  	<?php 
		if ($topbar_google_url != '#'): ?>
		  <a href="<?php print esc_url($topbar_google_url); ?>">
		      <i class="fab fa-google-plus-g"></i>
		  </a>
		  <?php 
		  endif; ?>

	  	<?php 
		if ($topbar_instagram_url != '#'): ?>
		  <a href="<?php print esc_url($topbar_instagram_url); ?>">
		      <i class="fab fa-instagram"></i>
		  </a> <?php 
		  endif; ?>
	</div>
<?php 
}



// header logo
function kormo_header_logo() {
	?>
	<div class="col-xl-2 col-lg-3 pr-0 ">
	    <div class="logo">
	        <?php 
	        $logo_on = get_post_meta(get_the_ID(), 'enable_sec_logo', true);
	        $logo = get_template_directory_uri() . '/img/logo/logo.png';
	        $logo_white = get_template_directory_uri() . '/img/logo/logo-white.png';

			$retina_logo = get_template_directory_uri().'/img/logo/logo@2x.png';
		    $retina_logo_white = get_template_directory_uri().'/img/logo/logo-white@2x.png';

			$retina_logo  = get_theme_mod('retina_logo',$retina_logo);
		    $retina_logo_white  = get_theme_mod('retina_secondary_logo',$retina_logo_white);

	        $site_logo = get_theme_mod('logo', $logo);
	        $secondary_logo = get_theme_mod('seconday_logo', $logo_white);
	        ?>
	         
	         <?php
	        if( has_custom_logo()){
	        	the_custom_logo();
	        }else{
	        	
				if($logo_on === 'on') { ?>
					<a class="standard-logo" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($secondary_logo); ?>" alt="<?php print esc_attr__('logo','kormo'); ?>" />
					</a>
					<a class="retina-logo" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($retina_logo_white); ?>" alt="<?php print esc_attr__('logo','kormo'); ?>" />
                    </a>
	        	<?php 
	            }
	            else{ ?>
					<a class="standard-logo" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($site_logo); ?>" alt="<?php print esc_attr__('logo','kormo'); ?>" />
					</a>
					<a class="retina-logo" href="<?php print esc_url(home_url('/')); ?>">
                        <img src="<?php print esc_url($retina_logo); ?>" alt="<?php print esc_attr__('logo','kormo'); ?>" />
                    </a>
	        	<?php 
	        	}
			}	
			?>
	    </div>
	</div>

	<?php 

} 


/** 
 * [kormo_header_menu description]
 * @return [type] [description]
 */
function kormo_header_menu() { ?>

	<div class="main-menu f-right">
	    <nav id="mobile-menu">
	        <?php 
	       	wp_nav_menu(array(
	       		'theme_location'	=> 'main-menu',
	       		'menu_class'		=> '',
	       		'fallback_cb'		=> 'Kormo_Navwalker::fallback',
	       		'walker'			=> new Kormo_Navwalker
	       	));
	       ?>
	    </nav>
	</div>
	<div class="mobile-menu"></div>
	<?php 
} 



/** 
 * [kormo_header_quote description]
 * @return [type] [description]
 */
function kormo_header_quote() {
	$get_a_quote 		= get_theme_mod('get_a_quote');
	$get_a_quote_text 	= get_theme_mod('get_a_quote_text');
	$get_a_quote_link 	= get_theme_mod('get_a_quote_link');

	if($get_a_quote): ?>
	    <div class="header-button f-right d-none d-lg-block">
	        <a href="<?php print esc_url($get_a_quote_link); ?>"><?php print esc_html($get_a_quote_text); ?> <i class="far fa-long-arrow-right"></i></a>
	    </div>
	<?php endif; ?>

<?php 
} 

// favicon logo
function kormo_favicon_logo_func() {
    $kormo_favicon = get_template_directory_uri() . '/img/logo/favicon.png';
    $kormo_favicon_url = get_theme_mod('favicon_url', $kormo_favicon);
    ?>

    <link rel="shortcut icon" type="image/x-icon" href="<?php print esc_url( $kormo_favicon_url ); ?>">

    <?php   
} 
add_action('wp_head', 'kormo_favicon_logo_func');


// breadcrumb-min-height
function kormo_breadcrumb_min_height_func(){
   	$kormo_breadcrumb_top = get_theme_mod('kormo_breadcrumb_top', '210px');
	$kormo_breadcrumb_bottom = get_theme_mod('kormo_breadcrumb_bottom', '210px');

    wp_enqueue_style( 'kormo-breadcrumb-min-height', KORMO_THEME_CSS_DIR . 'kormo-custom.css', array());
    if($kormo_breadcrumb_top OR $kormo_breadcrumb_bottom){
        $custom_css = '';
        $custom_css .= ".page-title-area{ 
        					padding-top: ".$kormo_breadcrumb_top."; 
        					padding-bottom: ".$kormo_breadcrumb_bottom."
        				}";

        wp_add_inline_style('kormo-breadcrumb-min-height',$custom_css);
    }
}
add_action('wp_enqueue_scripts', 'kormo_breadcrumb_min_height_func');

/** 
 * [kormo_breadcrumb_func description]
 * @return [type] [description]
 */
function kormo_breadcrumb_func() { 
	$invisible_breadcrumb = get_post_meta( get_the_ID(), 'invisible_breadcrumb', true );
	if( !is_front_page() && !$invisible_breadcrumb ) {
		$bg_img = get_theme_mod('breadcrumb_bg_img');

		$blog_breadcrumb = get_theme_mod('kormo_blog_breadcrumb', '');
		?>
			<div class="page-title-area" data-background="<?php print esc_attr($bg_img);?>">
				<div class="container">
					<div class="row">
						<div class="col-xl-12">
							<div class="page-title text-center">
								<?php 
								if ( is_single() && 'post' == get_post_type() ) { 
									if ( $blog_breadcrumb == '' ) { ?>
										<h1><?php wp_title(''); ?></h1>
									<?php 
									}
									else { ?>
										<h1> <?php print esc_html($blog_breadcrumb);?></h1>
									<?php 
									} ?>
									
									<?php 
								}
								else { ?>
									<h1><?php wp_title(''); ?></h1>
								<?php 
								} ?>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb justify-content-center">
										<?php kormo_breadcrumbs(); ?>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 
			
	}
}
add_action('kormo_before_main_content', 'kormo_breadcrumb_func');


if(!function_exists('kormo_breadcrumbs')) {

	function _kormo_home_callback($home) {
		return $home;
	}

	function _kormo_breadcrumbs_callback($breadcrumbs) {
		return $breadcrumbs;
	}

	function kormo_breadcrumbs() {
		global $post;
		$home = '<li class="breadcrumb-item"><a href="'.esc_url(home_url('/')).'" title="'.esc_attr__('Home','kormo').'">'.esc_html__('Home','kormo').'</a></li>';
		$showCurrent = 1;				
		$homeLink = esc_url(home_url('/'));
		if ( is_front_page() ) { return; }	// don't display breadcrumbs on the homepage (yet)

		print _kormo_home_callback($home);

		if ( is_category() ) {
			// category section
			$thisCat = get_category(get_query_var('cat'), false);
			if (!empty($thisCat->parent)) print get_category_parents($thisCat->parent, TRUE, ' ' . '/' . ' ');
			print '<li class="breadcrumb-item active">'.  esc_html__('Archive for category','kormo').' "' . single_cat_title('', false) . '"' . '</li>';
		} 
		elseif ( is_search() ) {
			// search section
			print '<li class="breadcrumb-item active">' .  esc_html__('Search results for','kormo').' "' . get_search_query() . '"' .'</li>';
		} 
		elseif ( is_day() ) {
			print '<li class="breadcrumb-item"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
			print '<li class="breadcrumb-item"><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> </li>';
			print '<li class="breadcrumb-item">' . get_the_time('d') .'</li>';
		} 
		elseif ( is_month() ) {
			// monthly archive
			print '<li class="breadcrumb-item"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> </li>';
			print '<li class="breadcrumb-item active">' . get_the_time('F') .'</li>';
		} 
		elseif ( is_year() ) {
			// yearly archive
			print '<li class="breadcrumb-item active">'. get_the_time('Y') .'</li>';
		} 
		elseif ( is_single() && !is_attachment() ) {
			// single post or page
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				print '<li class="breadcrumb-item"><a href="' . $homeLink . '/?post_type=' . $slug['slug'] . '">' . $post_type->labels->singular_name . '</a></li>';
				if ($showCurrent) print '<li class="breadcrumb-item active">'. get_the_title() .'</li>';
			} 
			else {
				$cat = get_the_category(); if (isset($cat[0])) {$cat = $cat[0];} else {$cat = false;}
				if ($cat) {$cats = get_category_parents($cat, TRUE, ' ' .' ' . ' ');} else {$cats=false;}
				if (!$showCurrent && $cats) $cats = preg_replace("#^(.+)\s\s$#", "$1", $cats);
				print '<li class="breadcrumb-item ">'.$cats.'</li>';
				if ($showCurrent) print '<li class="breadcrumb-item active">' . get_the_title() .'</li>';
			}
		} 
		elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			// some other single item
			$post_type = get_post_type_object(get_post_type());
			print '<li class="breadcrumb-item">' . $post_type->labels->singular_name .'<li>';
		} 
		elseif ( is_attachment() ) {
			// attachment section
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); if (isset($cat[0])) {$cat = $cat[0];} else {$cat=false;}
			if ($cat) print get_category_parents($cat, TRUE, ' ' . ' ' . ' ');
			print '<li class="breadcrumb-item"><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>';
			if ($showCurrent) print  '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
		} 
		elseif ( is_page() && !$post->post_parent ) {

			// parent page
			if ($showCurrent) 
				print '<li class="breadcrumb-item active"><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
		} 
		elseif ( is_page() && $post->post_parent ) {
			// child page
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();

			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<li class="breadcrumb-item"><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			for ($i = 0; $i < count($breadcrumbs); $i++) {
				print _kormo_breadcrumbs_callback($breadcrumbs[$i]);
				if ($i != count($breadcrumbs)-1);
			}
			if ($showCurrent) print '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
		} 
		elseif ( is_tag() ) {
			// tags archive
			print '<li class="breadcrumb-item">' .  esc_html__('Posts tagged','kormo').' "' . single_tag_title('', false) . '"' . '</li>';
		} 
		elseif ( is_author() ) {
			// author archive 
			global $author;
			$userdata = get_userdata($author);
			print '<li class="breadcrumb-item">' .  esc_html__('Articles posted by','kormo'). ' ' . $userdata->display_name . '</li>';
		} 
		elseif ( is_404() ) {
			// 404
			print '<li class="breadcrumb-item active">' .  esc_html__('Not Found','kormo') .'</li>';
		}
	  
		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) print '<li class="breadcrumb-item"> (';
				print  '<li class="breadcrumb-item active">'.esc_html__('Page','kormo') . ' ' . get_query_var('paged').'</li>';
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) print ')</li>';
		}
	}
}






/**
*
* pagination
*/
if( !function_exists('kormo_pagination') ) {

	function _kormo_pagi_callback($home) {
		return $home;
	}

	//page navegation
	function kormo_pagination( $prev, $next, $pages, $args ) {
		global $wp_query, $wp_rewrite;
		$menu = '';
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
		
		if( $pages=='' ){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			
			if(!$pages)
				$pages = 1;
		}

		$pagination = array(
			'base' => @add_query_arg('paged','%#%'),
			'format' => '',
			'total' => $pages,
			'current' => $current,
			'prev_text' => $prev,
			'next_text' => $next,
			'type' => 'array'
		);

		//rewrite permalinks
		if( $wp_rewrite->using_permalinks() )
			$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

		if( !empty($wp_query->query_vars['s']) )
			$pagination['add_args'] = array( 's' => get_query_var( 's' ) );

		$pagi = '';
		if(paginate_links( $pagination )!=''){
			$paginations = paginate_links( $pagination );
			$pagi .= '<ul>';
						foreach ($paginations as $key => $pg) {
							$pagi.= '<li class="page-item">'.$pg.'</li>';
						}
			$pagi .= '</ul>';
		}

		print _kormo_home_callback($pagi);
	}
}




function kormo_custom_color(){
	$color_code = get_theme_mod( 'kormo_color_option','#2154CF');
	wp_enqueue_style( 'kormo-custom', KORMO_THEME_CSS_DIR . 'kormo-custom.css', array());
	if($color_code!=''){
		$custom_css = '';
		$custom_css .= ".theme-bg,.btn.brand-btn,.header-button > a:hover,.service-3-thumb a::before,.service-wrapper::after,.service-wrapper::before,.btn.brand-btn:hover,.footer-widget form button,a#scrollUp:hover,.transparent-header .header-button > a:hover,.servicee-sidebar h3,.pagination ul > li > a:hover, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span, .pagination ul .page-numbers.current, .nav-links a:hover, .nav-links .page-numbers.current,.sidebar-tad li a:hover, .tagcloud a:hover,.blog-post-tag > a:hover,.comments-text > a:hover { background: ".$color_code."}";

		$custom_css .= ".main-menu ul li:hover > a, .main-menu ul li.current-menu-item > a,.service-link:hover,a:focus, a:hover, .portfolio-cat a:hover, .footer -menu li a:hover,.service-link:hover span,.service-wrapper a:hover,.portfolio-menu > button:hover, .portfolio-menu > button.active,.cta-button .btn:hover,.blog-title a:hover,.link-box a:hover,.blog-meta i,.blog-meta span a:hover,.read-more:hover,.kormo-search-btn:hover,.widget li a:hover,.sidebar-rc-post .rc-post-content h4 a:hover,a, button { color: ".$color_code."}";

		$custom_css .= ".header-button > a:hover,.service-wrapper a:hover,.who-we-box,.transparent-header .header-button > a:hover,.testimonial-box:hover,.blog-wrapper.sticky,.read-more:hover,.pagination ul > li > a:hover, .pagination ul > li > a:focus, .pagination ul > .active > a, .pagination ul > .active > span, .pagination ul .page-numbers.current, .nav-links a:hover, .nav-links .page-numbers.current,.blog-post-tag > a:hover,.comments-text > a:hover { border-color: ".$color_code."}";
		wp_add_inline_style('kormo-custom',$custom_css);
	}
}
add_action('wp_enqueue_scripts', 'kormo_custom_color');