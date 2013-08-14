<?php 

/**
 * @package WordPress
 * @subpackage MPC WP Boilerplate
 * @since 1.0
 */

define('MPC_THEME_ROOT', get_template_directory_uri());

/* ---------------------------------------------------------------- */
/*	Globals
/* ---------------------------------------------------------------- */

global $mpcth_settings;
global $mpcth_cake;
global $page_id;
global $mpcth_options;
global $mpcth_sidebar_options;
global $mpcth_options_name;
global $mpcth_icons_array;

$mpcth_options_name = 'mpcth_options_theme_customizer';

$mpcth_sidebar_options = get_option('mpcth_sidebar_options');

$mpcth_options = get_option($mpcth_options_name);

/* ---------------------------------------------------------------- */
/*	Settings
/* ---------------------------------------------------------------- */

$mpcth_cake = Array(
	/* main */
	'themeName'		=> 'mpc-wp-boilerplate',
	'topMenu'		=> (isset($mpcth_options['mpcth_basic_top_menu']) ? (bool)$mpcth_options['mpcth_basic_top_menu'] : true),
	'layoutStyle'	=> (isset($mpcth_options['mpcth_basic_layout_style']) ? $mpcth_options['mpcth_basic_layout_style'] : 'fixed'), /* fixed or fluid */
	'menuPosition' 	=> (isset($mpcth_options['mpcth_basic_menu_position']) ? $mpcth_options['mpcth_basic_menu_position'] : 'header'), /* header or page ( menu displayed on the left side of a page ) */
	'logoPosition'	=> (isset($mpcth_options['mpcth_basic_logo_position']) ? $mpcth_options['mpcth_basic_logo_position'] : 'header'), /* header or page ( logo displayed on the left side of a page ) */

	/* socials */
	'socialOrder' => Array('dribbble', 'facebook', 'flickr', 'lastfm', 'linkedin', 'rss', 'stumbleupon', 'tumblr', 'twitter', 'gplus', 'mail', 'pinterest', 'vimeo'),
	'socialBackground' => 'none' /* square, circle, none */
);

mpcth_create_global_icons_array();

/* Enable the shortcodes to work in sidebar & footer */
add_filter('widget_text', 'do_shortcode');

/*-----------------------------------------------------------------------------------*/
/*	Setup Theme
/*-----------------------------------------------------------------------------------*/

function mpcth_setup(){
	if (!isset($content_width)) $content_width = 960;

	if (function_exists('add_theme_support')) {
		add_theme_support('post-thumbnails');
		add_image_size('mpcth-post-thumbnails-col-1', 960, 960, true);
		add_image_size('mpcth-post-thumbnails-col-2', 480, 480, true);
		add_image_size('mpcth-post-thumbnails-col-3', 320, 320, true);
		add_image_size('mpcth-post-thumbnails-col-4', 240, 240, true);

		add_theme_support( 'automatic-feed-links');

		// add editor styles
		add_editor_style();

		// add post format support
		add_theme_support('post-formats', array('aside', 'gallery', 'link', 'status', 'image', 'quote', 'audio', 'video'));
	}
}

add_action( 'after_setup_theme', 'mpcth_setup' );

/* ---------------------------------------------------------------- */
/*	Massive Panel
/* ---------------------------------------------------------------- */

if ( !function_exists( 'mpcth_optionsframework_init' ) ) {

	require_once (get_template_directory() . '/mpc-wp-boilerplate/massive-panel/options-framework.php');

	// visual panel include
	require_once (get_template_directory() . '/mpc-wp-boilerplate/php/mpcth-admin-visual-options.php');
}

/*-----------------------------------------------------------------------------------*/
/*	Location Files / Language Files
/*-----------------------------------------------------------------------------------*/

load_theme_textdomain('mpcth', get_template_directory().'/languages');
 
$locale = get_locale();
$locale_file = MPC_THEME_ROOT."/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);
	
/*-----------------------------------------------------------------------------------*/
/*	Register Menu
/*-----------------------------------------------------------------------------------*/

if (function_exists('register_nav_menus')) {

	register_nav_menus(array('main' => __('Main Navigation Menu', 'mpcth')));

	if($mpcth_cake['topMenu'])
		register_nav_menus(array('top' => __('Top Navigation Menu', 'mpcth')));
}

/*-----------------------------------------------------------------------------------*/
/*	Add CSS & JS
/*-----------------------------------------------------------------------------------*/

function mpcth_enqueue_scripts() {
	global $mpcth_settings;

	require_once(get_template_directory() . '/mpc-wp-boilerplate/php/mpcth-settings.php');

	/* CSS */

	// Shortcodes Styles
	wp_enqueue_style('shortcodes-style', MPC_THEME_ROOT.'/mpc-wp-boilerplate/css/shortcodes.css');

	// Fancybox Styles
	wp_enqueue_style('fancybox-style', MPC_THEME_ROOT.'/mpc-wp-boilerplate/css/fancybox.css');

	// Open Sans Import 
	wp_enqueue_style('open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600');

	// PT Sans Import 
	wp_enqueue_style('pt-sans', 'http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic');

	// Flex Slider
	wp_enqueue_style('mpcth-flexslider-css', MPC_THEME_ROOT.'/mpc-wp-boilerplate/css/flexslider.css');
	
	/* JS */

	// HTML 5
	wp_enqueue_script('html5', MPC_THEME_ROOT.'/mpc-wp-boilerplate/js/html5.js', array('jquery')); 
	
	// MPC WP Boilerplate JS
	wp_enqueue_script('mpcth-js', MPC_THEME_ROOT.'/mpc-wp-boilerplate/js/mpcth-functions.js', array('jquery'), '1.0', true);
	wp_localize_script('mpcth-js', 'ajaxurl', admin_url('admin-ajax.php'));

	// Custom Theme JS
	wp_enqueue_script('mpcth-theme-js', MPC_THEME_ROOT.'/mpc-wp-boilerplate/js/mpcth-theme.js', array('jquery'), '1.0');

	// Shortcodes JS
	wp_enqueue_script('mpcth-shortcodes-js', MPC_THEME_ROOT.'/mpc-wp-boilerplate/js/mpcth-shortcodes.js', array('jquery'), '1.0');

	// jQuery Easing
	wp_enqueue_script('jquery-easing', MPC_THEME_ROOT.'/mpc-wp-boilerplate/js/jquery.easing.min.js', array('jquery'), '1.3');

	// jQuery Waypoint
	wp_enqueue_script('jquery-waypoints', MPC_THEME_ROOT.'/mpc-wp-boilerplate/js/jquery.waypoints.min.js', array('jquery'), '2.0.2');

	// Raphael
	wp_enqueue_script('raphael', MPC_THEME_ROOT.'/mpc-wp-boilerplate/js/raphael.min.js', '2.1.0');

	// Fancybox
	wp_enqueue_script('jquery-fancybox', MPC_THEME_ROOT.'/mpc-wp-boilerplate/js/jquery.fancybox.js', array('jquery'), '1.3.4');

	// Validate Script
	wp_enqueue_script('jquery-validate', MPC_THEME_ROOT.'/mpc-wp-boilerplate/js/jquery.validate.min.js', array('jquery'), '1.8.1');

	// Flex Slider
	wp_enqueue_script('mpcth-flexslider-js', MPC_THEME_ROOT.'/mpc-wp-boilerplate/js/jquery.flexslider-min.js', array('jquery'), '1.0');

	// Spin Loader
	wp_enqueue_script('spin-loader', MPC_THEME_ROOT.'/mpc-wp-boilerplate/js/spin.min.js', '1.2.8');

	// oEmbed used for twitter
	wp_enqueue_script('jquery-oembed', MPC_THEME_ROOT.'/mpc-wp-boilerplate/js/jquery.oembed.js', array('jquery'));

	// Cufon Fonts
	$mpcth_custom_fonts = get_option('mpcth_custom_fonts');
	
	if(isset($mpcth_custom_fonts))
		wp_enqueue_script('mpcth-custom-fonts', MPC_THEME_ROOT . '/mpc-wp-boilerplate/massive-panel/js/cufon.js', array('jquery'));

	// Blog load more - enqueue & passing data to JS
	if($mpcth_settings['blogPagination'] == 'loadmore' || $mpcth_settings['portfolioPagination'] == 'loadmore' || $mpcth_settings['searchPagination'] == 'loadmore' || $mpcth_settings['archivePagination'] == 'loadmore') {
		
		wp_enqueue_style('isotope-style', MPC_THEME_ROOT.'/mpc-wp-boilerplate/css/isotope.css');
		wp_enqueue_script('isotope', MPC_THEME_ROOT.'/mpc-wp-boilerplate/js/jquery.isotope.min.js', array('jquery'), '1.5.21');
	}
}

add_action('wp_enqueue_scripts', 'mpcth_enqueue_scripts');

/* ---------------------------------------------------------------- */
/*	Visual Composer Functions
/* ---------------------------------------------------------------- */

function mpcth_vc_get_testimonial_callback() {
	if(!empty($_GET['id'])) {
		$testimonial = get_post($_GET['id']);
		$company = get_post_meta($testimonial->ID, 'company', true);
		$company = !empty($company) ? ', ' . $company : '';

		$attrs = array(
			'title' => __('Testimonial', 'mpcth') . ' - ' . $testimonial->post_title . $company,
			'content' => implode(' ', array_slice(explode(' ', $testimonial->post_content), 0, 20)) . ' (...)'
		);

		echo json_encode($attrs);
	} else {
		echo json_encode(array('error' => 'Invalid ID'));
	}
	
	die();
}
add_action('wp_ajax_mpcth_vc_get_testimonial', 'mpcth_vc_get_testimonial_callback');

function mpcth_vc_get_client_callback() {
	if(!empty($_GET['id'])) {
		$client = get_post($_GET['id']);
		$logo = get_post_meta($client->ID, 'logo', true);
		$logo = !empty($logo) ? $logo : 'default';

		$attrs = array(
			'title' => __('Client', 'mpcth') . ' - ' . $client->post_title,
			'logo' => $logo
		);
	
		echo json_encode($attrs);
	} else {
		echo json_encode(array('error' => 'Invalid ID'));
	}
	
	die();
}
add_action('wp_ajax_mpcth_vc_get_client', 'mpcth_vc_get_client_callback');

/* ---------------------------------------------------------------- */
/*	Share Counts
/* ---------------------------------------------------------------- */

function mpcth_social_cache_callback() {
	global $post;

	$share_counts = get_transient('mpcth_scc_' . $post->ID);
	
	if($share_counts === false) {
		if(!empty($_POST['data']) && !empty($_POST['id'])) {
			$share_counts = $_POST['data'];
			
			set_transient('mpcth_scc_' . $_POST['id'], $share_counts, 300);
		} else {
			$share_counts = array('errors' => 'error');
		}
	}
	
	die();
}
add_action('wp_ajax_mpcth_social_cache', 'mpcth_social_cache_callback');

/* ---------------------------------------------------------------- */
/*	Comments Rating
/* ---------------------------------------------------------------- */

function mpcth_comments_rates_callback() {
	global $post;

	if(isset($_COOKIE['mpcth_rate_' . $post->ID]) && $_COOKIE['mpcth_rate_' . $post->ID] == $_POST['rate']) {
		echo 'no_change';
		die();
	}

	if($_POST['rate'] == 'up') {
		$state = setcookie('mpcth_rate_' . $post->ID, 'up', time() + YEAR_IN_SECONDS, '/');
		echo 'rated_up';
	} else {
		$state = setcookie('mpcth_rate_' . $post->ID, 'down', time() + YEAR_IN_SECONDS, '/');
		echo 'rated_down';
	}
	
	die();
}
add_action('wp_ajax_mpcth_comments_rates', 'mpcth_comments_rates_callback');

/* ---------------------------------------------------------------- */
/*	Load More Hook
/* ---------------------------------------------------------------- */

function mpcth_load_more_hook($query, $type = 'blog', $custom = array()) {
	global $mpcth_settings;

	wp_enqueue_script('mpcth-isotope', MPC_THEME_ROOT.'/mpc-wp-boilerplate/js/mpcth-isotope.js', array('jquery'), '1.0');

	$paginationInfo = array(
		'max_pages'					=> $query->max_num_pages,
		'posts_count'				=> $query->found_posts,
		'posts_per_page'			=> $query->post_count,
		'post_type'					=> ($type == 'blog' ? 'post' : $type),
		'page'						=> mpcth_get_paged(),
		'next_page_link'			=> next_posts($query->max_num_pages, false),
		'path'						=> MPC_THEME_ROOT,
		'loading_text'				=> __('Loading...', 'mpcth'),
		'load_more_text'			=> __('Load More', 'mpcth'),
		'blog_type'					=> $mpcth_settings[$type.'Type'],
		'blog_post_columns_number'	=> $mpcth_settings[$type.'ColumnsNumber'],
		'mpcth_settings'			=> $mpcth_settings
	);

	$paginationInfo['custom'] = array();
	
	if(!empty($custom)) {
		foreach ($custom as $key => $value) {
			$paginationInfo['custom'][$key] = $value;
		}
	}

	wp_localize_script('mpcth-isotope', 'paginationInfo', $paginationInfo);
}

add_action('mpcth_add_load_more', 'mpcth_load_more_hook', 10, 3);

/*-----------------------------------------------------------------------------------*/
/*	Aside Menu Function
/*-----------------------------------------------------------------------------------*/

function mpcth_aside_menu(){
	global $mpcth_cake;

	if($mpcth_cake['menuPosition'] == 'page'):
		if(has_nav_menu('main')): 
			wp_nav_menu(array( 
						'theme_location' => 'main', 
						'container' => '', 
						'menu_id' => 'mpcth_menu')); 
		else: 
			echo '<ul id="nav">';
				wp_list_pages('title_li='); 
			echo '</ul>';
		endif;
	endif;
}

/*-----------------------------------------------------------------------------------*/
/*	Display Logo
/*-----------------------------------------------------------------------------------*/

function mpcth_display_logo(){
	global $mpcth_options;
	
	$link = get_home_url();
	$output = '<div id="mpcth_logo_wrap">';
		$output .= '<a id="mpcth_logo" href="'.$link.'">';
		if(isset($mpcth_options['mpcth_use_text_logo']) && $mpcth_options['mpcth_use_text_logo']) {
			if(isset($mpcth_options['mpcth_text_logo']) && $mpcth_options['mpcth_text_logo'] != '')
				$output .= '<h1>' . $mpcth_options['mpcth_text_logo'] . '</h1>';
		} else {
			if(isset($mpcth_options['mpcth_logo']) && $mpcth_options['mpcth_logo'] != '')
				$output .= '<img src="' . $mpcth_options['mpcth_logo'] . '" alt="Logo" data-retina="' . (isset($mpcth_options['mpcth_logo_2x']) && $mpcth_options['mpcth_logo_2x'] != '' ? $mpcth_options['mpcth_logo_2x'] : '') . '">';
			else
				$output .= '<h1>' . get_bloginfo('name') . '</h1>';
		}

		if(isset($mpcth_options['mpcth_text_logo_description']) && $mpcth_options['mpcth_text_logo_description'] == '1')
			$output .= '<small>' . get_bloginfo('description') . '</small>';
		
		$output .= '</a>';
		$output .= '<div class="mpcth-clear-fix"></div>';
	$output .= '</div>';

	return $output;
}

/*-----------------------------------------------------------------------------------*/
/*	Display Top Widget Area
/*-----------------------------------------------------------------------------------*/

function mpcth_display_top_area($id = 'mpcth_top_widget_area'){
	echo '<div id="mpcth_top_widget_area">';
		echo '<ul class="mpcth-top-widget-hidden">';
			dynamic_sidebar($id);
		echo '</ul>';
		echo '<div class="mpcth-clear-fix"></div>';
		echo '<div id="mpcth_top_widget_area_handle"></div>';
	echo '</div>';
}

/* ---------------------------------------------------------------- */
/* Get query page
/* ---------------------------------------------------------------- */

function mpcth_get_paged() {
	if(get_query_var('page') != '')
		$paged = get_query_var('page');
	else
		$paged = get_query_var('paged');

	$paged = $paged > 1 ? $paged : 1;

	return $paged;
}

/* ---------------------------------------------------------------- */
/* Get sidebar position
/* ---------------------------------------------------------------- */

function mpcth_get_sidebar_position($meta, $type) {
	global $mpcth_options;

	if(isset($meta['custom_sidebar_position']) && $meta['custom_sidebar_position'][0] == 'on' && isset($meta['sidebar_position']))
		$sidebar_position = $meta['sidebar_position'][0]; /* right, left or none */
	elseif(isset($mpcth_options) && isset($mpcth_options['mpcth_sidebar']))
		switch($type) {
			case 'post':
				$sidebar_position = isset($mpcth_options['mpcth_blog_post_sidebar']) ? $mpcth_options['mpcth_blog_post_sidebar'] : 'right';
				break;
			case 'portfolio':
				$sidebar_position = isset($mpcth_options['mpcth_portfolio_post_sidebar']) ? $mpcth_options['mpcth_portfolio_post_sidebar'] : 'right';
				break;
			case 'search':
				$sidebar_position = isset($mpcth_options['mpcth_search_sidebar']) ? $mpcth_options['mpcth_search_sidebar'] : 'right';
				break;
			case 'archive':
				$sidebar_position = isset($mpcth_options['mpcth_archive_sidebar']) ? $mpcth_options['mpcth_archive_sidebar'] : 'right';
				break;
			case 'error':
				$sidebar_position = isset($mpcth_options['mpcth_error_sidebar']) ? $mpcth_options['mpcth_error_sidebar'] : 'right';
				break;
			default:
				$sidebar_position = isset($mpcth_options['mpcth_sidebar']) ? $mpcth_options['mpcth_sidebar'] : 'right';
		}
	else
		$sidebar_position = 'right';

	return $sidebar_position;
}

/*-----------------------------------------------------------------------------------*/
/*	Add Fancybox
/*-----------------------------------------------------------------------------------*/

function mpcth_add_fancybox($post_meta) {
	$output = '';

	if(isset($post_meta['lightbox_enabled'][0]) && $post_meta['lightbox_enabled'][0] == 'on') { 
		$type = '';
		$asset = $post_meta['lightbox_source'][0];
		$asset_type = strtolower($asset);
		
		$search = preg_match('/.(jpg|jpeg|gif|png|bmp)/', $asset_type);
		
		if($search == 1) {
			$type = 'mpcth-image';
			$search = 0;
		}
		
		$search = preg_match('/.(vimeo)./', $asset_type);
		
		if($search == 1) {
			$type = 'mpcth-vimeo-video';
			$search = 0;
		}
		
		$search = preg_match('/.(youtube)/', $asset_type);
		
		if($search == 1) {
			$type = 'mpcth-youtube-video';
			$search = 0;
		}
		
		$search = preg_match('/.(swf)/', $asset_type);
		if($search == 1) {
			$type = 'mpcth-swf';
			$search = 0;
		}
		
		if($type == '') {
			$type = 'mpcth-iframe'; 
		}

	$output .= '<a class="mpcth-fancybox mpcth-sc-fancybox mpcth-sc-icon-plus '.$type.'"  href="'.$asset.'" title="'.$post_meta['lightbox_caption'][0].'"></a>';
	}

	echo $output;
}

/*-----------------------------------------------------------------------------------*/
/*	Display Pagination
/*-----------------------------------------------------------------------------------*/

function mpcth_display_standard_pagination($query) {
	$big = 999999999; // need an unlikely integer
	$pagination;
	$output = '';

	$paged = mpcth_get_paged();

	echo '<div class="mpcth-pagination">';
	$pagination = paginate_links( array(
	 'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	 'current' => max( 1, $paged ),
	 'prev_next' => false,
	 'total' => $query->max_num_pages,
	 'type' => 'array'
	) );

	$len = count($pagination);
	$i = 1;

	if(!empty($pagination))
		foreach($pagination as $pag => $value) {
			if($i != $len)
				$output .= $value.' <span class="pagination-devider">/</span> ';
			else
				$output .= $value;

			$i++;
		}

	echo $output;

	echo '</div>';
}

add_action('mpcth_add_standard_pagination' ,'mpcth_display_standard_pagination');

/* ---------------------------------------------------------------- */
/*	Display Load More
/* ---------------------------------------------------------------- */

function mpcth_display_loadmore($info = true) {

	echo '<div id="mpcth-lm-container"></div>';
	echo '<a href="#" id="mpcth-lm" ' . (!$info ? 'class="mpcth-lm-without-info"' : '') . '>';
		echo '<span class="mpcth-lm-button">';
			_e('Load More', 'mpcth');
		echo '</span>';

		if($info)
			echo '<span class="mpcth-lm-info"></span>';
	echo '</a>';
}

/* ---------------------------------------------------------------- */
/*	Display Breadcrumb
/* ---------------------------------------------------------------- */

function mpcth_display_breadcrumb() {
	global $post;
	$id = $post->ID;
	$return = '<a href="/">' . __('Home', 'mpcth') . '</a>';

	if(is_front_page()) {
		// do nothing
	} elseif(is_page()) {
		$page = get_post($id);

		$parent_pages = array();
		$parent_pages[] = ' <span class="mpcth-header-devider">/</span> ' . $page->post_title . "\n";

		while ($page->post_parent) {
			$page = get_post($page->post_parent);
			$parent_pages[] = ' <span class="mpcth-header-devider">/</span> <a href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a>';
		}

		$parent_pages = array_reverse($parent_pages);

		foreach ($parent_pages as $parent) {
			$return .= $parent;
		}
	} elseif(is_single()) {
		if($post->post_type == 'post') {
			$category = get_the_category($id);

			if(!empty($category)){
				$data = get_category_parents($category[0]->cat_ID, true, ' <span class="mpcth-header-devider">/</span> ');
				$return .= ' <span class="mpcth-header-devider">/</span> ' . substr($data, 0, -strlen(' <span class="mpcth-header-devider">/</span> '));
			}
		} elseif($post->post_type == 'portfolio') {
			$terms = get_the_terms($id, 'mpcth_portfolio_category');
			
			if(!empty($terms)){
				$return .= ' <span class="mpcth-header-devider">/</span> ';

				foreach ($terms as $term) {
					$return .= ' <a href="' . get_term_link($term) . '">' . $term->name . '</a>';
					
					if($term !== end($terms))
						$return .= ', ';
				}
			}
		}

		$return .= ' <span class="mpcth-header-devider">/</span> ' . $post->post_title . "\n";
	} elseif(is_category()) {
		$category = get_the_category($id);
		$data = get_category_parents($category[0]->cat_ID, true, ' <span class="mpcth-header-devider">/</span> ');

		if(!empty($category)){
			$return .= ' <span class="mpcth-header-devider">/</span> ' . substr($data,0,-8);
		}
	} elseif(is_tax()) {
		$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
		$return .= ' <span class="mpcth-header-devider">/</span> <a href="' . get_term_link($term) . '">' . $term->name . '</a>';
	}

	return $return;
}

/* ---------------------------------------------------------------- */
/*	Display Comments
/* ---------------------------------------------------------------- */

function mpcth_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if(get_comment_author_email() == get_the_author_meta('email')){
		$author = "comment_author";
	} else {
		$author ="";
	}

	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e('Pingback:', 'mpcth'); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __('(Edit)', 'mpcth'), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :

		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 80 );
					printf('<cite>%1$s </cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __('Post author', 'mpcth') . '</span>' : ''
					);
					printf('- <a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __('%1$s at %2$s', 'mpcth'), get_comment_date(), get_comment_time() )
					);

					comment_reply_link( array_merge( $args, array( 'reply_text' => __('reply', 'mpcth'), 'before' => ' - ', 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );

					echo (($author != "") ? ' - <span>' . __('author', 'mpcth') . '</span>' : '');
					echo '<a class="comment-fold mpcth-sc-icon-up-open" href="#"></a>';

				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'mpcth'); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				
			</section><!-- .comment-content -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}

/* ---------------------------------------------------------------- */
/*	Get Categories - for portfolio & blog
/* ---------------------------------------------------------------- */

function mpcth_get_query_categories($categories, $type = 'blog') {
	if($type != 'blog')
		$all_categories = get_categories(array('taxonomy' => 'mpcth_portfolio_category', 'hide_empty' => 1));
	else
		$all_categories = get_categories(array('hide_empty' => 1));
	
	// make a list of categories that should be displayed (for WP query)
	$display_categories = '';

	if(isset($categories[0])) {
		$categories = unserialize($categories[0]);

		foreach($all_categories as $key) {
			if((isset($categories[$key->slug]) && $categories[$key->slug] == 'on') || !isset($categories[$key->slug]))
				$display_categories .= $key->slug.', ';
		}
	}
	
	return $display_categories;
}

/* ---------------------------------------------------------------- */
/*	Get Filter Categories - for portfolio & blog
/* ---------------------------------------------------------------- */

function mpcth_get_filter_categories($categories, $type = 'blog') {
	if($type != 'blog')
		$all_categories = get_categories(array('taxonomy' => 'mpcth_portfolio_category', 'hide_empty' => 1));
	else
		$all_categories = get_categories(array('hide_empty' => 1));

	if(isset($categories[0])) {
		$categories = unserialize($categories[0]);

		$filter_categories = '';
		$filter_categories .= '<div class="mpcth-'.$type.'-categories mpcth-filterable-categories"><span>'.__('Categories: ', 'mpcth').'</span><ul>'; 
		$filter_categories .= '<li class="active" data-link="post"><a href="">'.__('All', 'mpcth').'</a></li>';

		foreach($all_categories as $key) {
			if((isset($categories[$key->slug]) && $categories[$key->slug] == 'on') || !isset($categories[$key->slug])) {
				$filter_categories .= '<li data-link="'.$key->slug.'">';
				if($type == 'blog')
					$filter_categories .= '<a href="" title="'.$key->slug.'">'.$key->name.'</a></li>';
				else
					$filter_categories .= '<a href="" title="'.$key->slug.'">'.$key->name.'</a></li>';
			}
		}

		$filter_categories .= '</ul></div>';

		return $filter_categories;
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Register Standard Sidebar & Footer
/* 	
/*	footer can display 1 - 5 columns (default 3)
/*-----------------------------------------------------------------------------------*/

if(function_exists('register_sidebar')) {
	register_sidebar(array(
		'id' => 'mpcth_main_sidebar',
		'name' => __('Main Sidebar', 'mpcth'),
		'description' => __('This is a standard sidebar.', 'mpcth'),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h5 class="widget_title sidebar_widget_title">',
		'after_title' => '</h5>'
	));
	
	if(isset($mpcth_options['mpcth_top_widget_area']) && $mpcth_options['mpcth_top_widget_area']) {
		/* Create different number of top widget area columns */
		$top_widget_columns = isset($mpcth_options['mpcth_top_widget_area_columns']) ? $mpcth_options['mpcth_top_widget_area_columns'] : 3;
		for ($index = 1; $index <= $top_widget_columns; $index++) {
			register_sidebar(array(
				'id' => 'mpcth_top_widget_area_column_' . $index,
				'name' => __('Top Widget Area', 'mpcth') . ' (' . $index . '/' . $top_widget_columns . ')',
				'description' => __('This is a standard top widget area.', 'mpcth'),
				'before_widget' => '<li id="%1$s" class="widget ' . ($index == 1 ? 'widget_first ' : '') . ($index == $top_widget_columns ? 'widget_last ' : '') . 'widget_' . $top_widget_columns . ' %2$s">',
				'after_widget' => '</li>',
				'before_title' => '<h5 class="widget_title top_area_widget_title">',
				'after_title' => '</h5>'
			));
		}
	}

	/* Create different number of footer columns */
	$footer_columns = isset($mpcth_options['mpcth_footer_columns']) ? $mpcth_options['mpcth_footer_columns'] : 3;

	for ($index = 1; $index <= $footer_columns; $index++) {
		register_sidebar(array(
			'id' => 'mpcth_main_footer_column_' . $index,
			'name'=> __('Main Footer', 'mpcth') . ' (' . $index . '/' . $footer_columns . ')',
			'description' => __('This is a standard footer.', 'mpcth'),
			'before_widget' => '<li id="%1$s" class="widget ' . ($index == 1 ? 'widget_first ' : '') . ($index == $footer_columns ? 'widget_last ' : '') . 'widget_' . $footer_columns . ' %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h5 class="widget_title footer_widget_title">',
			'after_title' => '</h5>'
		));
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Register Custom Sidebars and Footers
/*-----------------------------------------------------------------------------------*/

$mpcth_sidebar_options = get_option('mpcth_sidebar_options');
if($mpcth_sidebar_options == false) $mpcth_sidebar_options = array();

if(isset($mpcth_sidebar_options)) {
	if(!isset($mpcth_sidebar_options['sidebar']))
		$mpcth_sidebar_options['sidebar'] = array();
	if(!isset($mpcth_sidebar_options['footer']))
		$mpcth_sidebar_options['footer'] = array();
	if(!isset($mpcth_sidebar_options['top_area']))
		$mpcth_sidebar_options['top_area'] = array();

	foreach($mpcth_sidebar_options['sidebar'] as $id => $title) {
		if(function_exists('register_sidebar')) {
			register_sidebar(array(
				'id' => 'custom_sidebar_' . $id,
				'name' => $title . __(' - Sidebar', 'mpcth'),
				'description' => __('This is a custom sidebar for ', 'mpcth') . $title . __(' page.', 'mpcth'),
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget' => '</li>',
				'before_title' => '<h5 class="widget_title sidebar_widget_title">',
				'after_title' => '</h5>'
			));
		}
	}

	foreach($mpcth_sidebar_options['footer'] as $id => $title) {
		if(function_exists('register_sidebar')) {
			// $page = get_page($id);
			$columns = get_post_meta($id, 'footer_columns', true);

			for ($index = 1; $index <= $columns; $index++) {
				register_sidebar(array(
					'id' => 'custom_footer_' . $id . '_column_' . $index,
					'name'=> $title . __(' - Footer', 'mpcth') . ' (' . $index . '/' . $columns . ')',
					'description' => __('This is a custom footer for ', 'mpcth') . $title . __(' page.', 'mpcth'),
					'before_widget' => '<li id="%1$s" class="widget ' . ($index == 1 ? 'widget_first ' : '') . ($index == $columns ? 'widget_last ' : '') . 'widget_' . $columns . ' %2$s">',
					'after_widget' => '</li>',
					'before_title' => '<h5 class="widget_title footer_widget_title">',
					'after_title' => '</h5>'
				));
			}
		}
	}

	foreach($mpcth_sidebar_options['top_area'] as $id => $title) {
		if(function_exists('register_sidebar')) {
			$columns = get_post_meta($id, 'top_area_columns', true);

			for ($index = 1; $index <= $columns; $index++) {
				register_sidebar(array(
					'id' => 'custom_top_area_' . $id . '_column_' . $index,
					'name'=> $title . __(' - Top', 'mpcth') . ' (' . $index . '/' . $columns . ')',
					'description' => __('This is a custom top area for ', 'mpcth') . $title . __(' page.', 'mpcth'),
					'before_widget' => '<li id="%1$s" class="widget ' . ($index == 1 ? 'widget_first ' : '') . ($index == $columns ? 'widget_last ' : '') . 'widget_' . $columns . ' %2$s">',
					'after_widget' => '</li>',
					'before_title' => '<h5 class="widget_title top_area_widget_title">',
					'after_title' => '</h5>'
				));
			}
		}
	}
}

if(function_exists('register_sidebar')) {
	$widget_area_query = new WP_Query( array( 'post_type' => 'widget_area', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title' ) );
	while( $widget_area_query->have_posts() ) {
		$widget_area_query->the_post();

		$widget_area_meta = get_post_custom(get_the_ID());
		$widget_area_type = isset($widget_area_meta['widget_area_type']) ? $widget_area_meta['widget_area_type'][0] : 'sidebar';
		$widget_area_columns = isset($widget_area_meta['widget_area_columns']) ? $widget_area_meta['widget_area_columns'][0] : '3';

		if($widget_area_type == 'sidebar') {
			register_sidebar(array(
				'id' => 'custom_' . $widget_area_type . '_' . get_the_ID(),
				'name'=> get_the_title(),
				'description' => __('Widget Area - ', 'mpcth') . ucwords(str_replace('_', ' ', $widget_area_type)) . '.',
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget' => '</li>',
				'before_title' => '<h5 class="widget_title ' . $widget_area_type . '_widget_title">',
				'after_title' => '</h5>'
			));
		} else {
			for ($index = 1; $index <= $widget_area_columns; $index++) { 
				register_sidebar(array(
					'id' => 'custom_' . $widget_area_type . '_' . get_the_ID() . '_column_' . $index,
					'name'=> get_the_title() . ' (' . $index . '/' . $widget_area_columns . ')',
					'description' => __('Widget Area - ', 'mpcth') . ucwords(str_replace('_', ' ', $widget_area_type)) . '.',
					'before_widget' => '<li id="%1$s" class="widget %2$s">',
					'after_widget' => '</li>',
					'before_title' => '<h5 class="widget_title ' . $widget_area_type . '_widget_title">',
					'after_title' => '</h5>'
				));
			}
		}
	}
}

/*------------------- END Register Custom Sidebars and Footers --------------------- */

/* ---------------------------------------------------------------- */
/*	Excerpt Length
/* ---------------------------------------------------------------- */

function recent_posts_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'recent_posts_excerpt_length', 999 );

/* ---------------------------------------------------------------- */
/*	WP Head - styles from the admin panel
/* ---------------------------------------------------------------- */

require_once(TEMPLATEPATH.'/mpc-wp-boilerplate/php/mpcth-custom-head.php');

function mpcth_add_head() {
	mpcth_add_custom_styles();
}

add_action('wp_head', 'mpcth_add_head');

/* ---------------------------------------------------------------- */
/*	Admin Head - styles for admin panel
/* ---------------------------------------------------------------- */

function mpcth_add_admin_head() {
	mpcth_admin_alternative_styles();
}

add_action('admin_head', 'mpcth_add_admin_head');

/* ---------------------------------------------------------------- */
/*	Custom Post Types
/* ---------------------------------------------------------------- */

require_once(get_template_directory().'/mpc-wp-boilerplate/php/mpcth-custom-types.php');

/* ---------------------------------------------------------------- */
/*	Custom Meta Boxes
/* ---------------------------------------------------------------- */

require_once(get_template_directory().'/mpc-wp-boilerplate/php/mpcth-custom-meta-boxes.php');

/* ---------------------------------------------------------------- */
/*	Shortcodes
/* ---------------------------------------------------------------- */

require_once(get_template_directory() . '/mpc-wp-boilerplate/tinymce/tinymce-settings.php');
require_once(get_template_directory() . '/mpc-wp-boilerplate/php/mpcth-shortcodes.php');

/* ---------------------------------------------------------------- */
/*	Custom Widgets
/* ---------------------------------------------------------------- */

require_once(get_template_directory() . '/mpc-wp-boilerplate/php/mpcth-custom-widgets.php');

/* ---------------------------------------------------------------- */
/*	Plugins Autoloader
/* ---------------------------------------------------------------- */

/**
 * @package	   TGM-Plugin-Activation
 * @subpackage Example
 * @version	   2.3.6
 * @author	   Thomas Griffin <thomas@thomasgriffinmedia.com>
 * @author	   Gary Jones <gamajo@gamajo.com>
 * @copyright  Copyright (c) 2012, Thomas Griffin
 * @license	   http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'mpcth_required_plugins' );

function mpcth_required_plugins() {
	$plugins = array(
		array(
			'name'					=> 'JS Composer', // The plugin name
			'slug'					=> 'js_composer', // The plugin slug (typically the folder name)
			'source'				=> 'js_composer.zip', // The plugin source
			'required'				=> true, // If false, the plugin is only 'recommended' instead of required
			'version'				=> '3.4.10', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation'		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation'	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url'			=> '' // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'					=> 'Quick Flickr Widget',
			'slug'					=> 'quick-flickr-widget',
			'source'				=> 'quick-flickr-widget.zip',
			'required'				=> true,
			'version'				=> '1.3',
			'force_activation'		=> false,
			'force_deactivation'	=> true,
			'external_url'			=> ''
		),
		array(
			'name'					=> 'Media Element Player',
			'slug'					=> 'media-element-html5-video-and-audio-player',
			'source'				=> 'media-element-html5-video-and-audio-player.zip',
			'required'				=> true,
			'version'				=> '2.10.3',
			'force_activation'		=> false,
			'force_deactivation'	=> true,
			'external_url'			=> ''
		),
		array(
			'name'					=> 'Media Element Player - Skin',
			'slug'					=> 'mediaelementjs-skin',
			'source'				=> 'mediaelementjs-skin.zip',
			'required'				=> true,
			'version'				=> '1.0',
			'force_activation'		=> false,
			'force_deactivation'	=> true,
			'external_url'			=> ''
		),
		array(
			'name'					=> 'Revolution Slider',
			'slug'					=> 'revslider',
			'source'				=> 'revslider.zip',
			'required'				=> true,
			'version'				=> '3.0.3',
			'force_activation'		=> false,
			'force_deactivation'	=> true,
			'external_url'			=> ''
		),
		array(
			'name'					=> 'Zilla Likes',
			'slug'					=> 'zilla-likes',
			'source'				=> 'zilla-likes.zip',
			'required'				=> true,
			'version'				=> '1.0',
			'force_activation'		=> false,
			'force_deactivation'	=> true,
			'external_url'			=> ''
		),
		array(
			'name'					=> 'Responsive Flipbook',
			'slug'					=> 'responsive-flipbook',
			'source'				=> 'responsive-flipbook.zip',
			'required'				=> true,
			'version'				=> '1.3',
			'force_activation'		=> false,
			'force_deactivation'	=> true,
			'external_url'			=> ''
		)
	);

	$config = array(
		'domain'			=> 'mpcth',
		'default_path'		=> dirname( __FILE__ ) . '/../plugins/',
		'parent_menu_slug'	=> 'themes.php',
		'parent_url_slug'	=> 'themes.php',
		'menu'				=> 'install-required-plugins',
		'has_notices'		=> true,
		'is_automatic'		=> true,
		'message'			=> '',
		'strings'			=> array(
			'page_title'								=> __( 'Install Required Plugins', 'mpcth' ),
			'menu_title'								=> __( 'Install Plugins', 'mpcth' ),
			'installing'								=> __( 'Installing Plugin: %s', 'mpcth' ), // %1$s = plugin name
			'oops'										=> __( 'Something went wrong with the plugin API.', 'mpcth' ),
			'notice_can_install_required'				=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
			'notice_cannot_install'						=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
			'notice_can_activate_required'				=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
			'notice_cannot_activate'					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
			'notice_ask_to_update'						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ),
			'notice_cannot_update'						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
			'install_link'								=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link'								=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'									=> __( 'Return to Required Plugins Installer', 'mpcth' ),
			'plugin_activated'							=> __( 'Plugin activated successfully.', 'mpcth' ),
			'complete'									=> __( 'All plugins installed and activated successfully. %s', 'mpcth' ),
			'nag_type'									=> 'updated'
		)
	);

	tgmpa($plugins, $config);
}

require_once dirname( __FILE__ ) . '/mpcth-console.php';

function mpcth_create_global_icons_array() {
	global $mpcth_icons_array;
	$mpcth_icons_array = array('address' => 'Address', 'adjust' => 'Adjust', 'air' => 'Air', 'alert' => 'Alert', 'archive' => 'Archive', 'arrow-combo' => 'Arrow combo', 'arrows-ccw' => 'Arrows ccw', 'attach' => 'Attach', 'attention' => 'Attention', 'back' => 'Back', 'back-in-time' => 'Back in time', 'bag' => 'Bag', 'basket' => 'Basket', 'battery' => 'Battery', 'behance' => 'Behance', 'bell' => 'Bell', 'block' => 'Block', 'book' => 'Book', 'book-open' => 'Book open', 'bookmark' => 'Bookmark', 'bookmarks' => 'Bookmarks', 'box' => 'Box', 'briefcase' => 'Briefcase', 'brush' => 'Brush', 'bucket' => 'Bucket', 'calendar' => 'Calendar', 'camera' => 'Camera', 'cancel' => 'Cancel', 'cancel-circled' => 'Cancel circled', 'cancel-squared' => 'Cancel squared', 'cc' => 'Cc', 'cc-by' => 'Cc by', 'cc-nc' => 'Cc nc', 'cc-nc-eu' => 'Cc nc eu', 'cc-nc-jp' => 'Cc nc jp', 'cc-nd' => 'Cc nd', 'cc-pd' => 'Cc pd', 'cc-remix' => 'Cc remix', 'cc-sa' => 'Cc sa', 'cc-share' => 'Cc share', 'cc-zero' => 'Cc zero', 'ccw' => 'Ccw', 'cd' => 'Cd', 'chart-area' => 'Chart area', 'chart-bar' => 'Chart bar', 'chart-line' => 'Chart line', 'chart-pie' => 'Chart pie', 'chat' => 'Chat', 'check' => 'Check', 'clipboard' => 'Clipboard', 'clock' => 'Clock', 'cloud' => 'Cloud', 'cloud-thunder' => 'Cloud thunder', 'code' => 'Code', 'cog' => 'Cog', 'comment' => 'Comment', 'compass' => 'Compass', 'credit-card' => 'Credit card', 'cup' => 'Cup', 'cw' => 'Cw', 'database' => 'Database', 'db-shape' => 'Db shape', 'direction' => 'Direction', 'doc' => 'Doc', 'doc-landscape' => 'Doc landscape', 'doc-text' => 'Doc text', 'doc-text-inv' => 'Doc text inv', 'docs' => 'Docs', 'dot' => 'Dot', 'dot-2' => 'Dot 2', 'dot-3' => 'Dot 3', 'down' => 'Down', 'down-bold' => 'Down bold', 'down-circled' => 'Down circled', 'down-dir' => 'Down dir', 'down-open' => 'Down open', 'down-open-big' => 'Down open big', 'down-open-mini' => 'Down open mini', 'down-thin' => 'Down thin', 'download' => 'Download', 'dribbble' => 'Dribbble', 'dribbble-circled' => 'Dribbble circled', 'drive' => 'Drive', 'dropbox' => 'Dropbox', 'droplet' => 'Droplet', 'erase' => 'Erase', 'evernote' => 'Evernote', 'export' => 'Export', 'eye' => 'Eye', 'facebook' => 'Facebook', 'facebook-circled' => 'Facebook circled', 'facebook-squared' => 'Facebook squared', 'fast-backward' => 'Fast backward', 'fast-forward' => 'Fast forward', 'feather' => 'Feather', 'flag' => 'Flag', 'flash' => 'Flash', 'flashlight' => 'Flashlight', 'flattr' => 'Flattr', 'flickr' => 'Flickr', 'flickr-circled' => 'Flickr circled', 'flight' => 'Flight', 'floppy' => 'Floppy', 'flow-branch' => 'Flow branch', 'flow-cascade' => 'Flow cascade', 'flow-line' => 'Flow line', 'flow-parallel' => 'Flow parallel', 'flow-tree' => 'Flow tree', 'folder' => 'Folder', 'forward' => 'Forward', 'gauge' => 'Gauge', 'github' => 'Github', 'github-circled' => 'Github circled', 'globe' => 'Globe', 'google-circles' => 'Google circles', 'gplus' => 'Gplus', 'gplus-circled' => 'Gplus circled', 'graduation-cap' => 'Graduation cap', 'heart' => 'Heart', 'heart-empty' => 'Heart empty', 'help' => 'Help', 'help-circled' => 'Help circled', 'home' => 'Home', 'hourglass' => 'Hourglass', 'inbox' => 'Inbox', 'infinity' => 'Infinity', 'info' => 'Info', 'info-circled' => 'Info circled', 'instagrem' => 'Instagrem', 'install' => 'Install', 'key' => 'Key', 'keyboard' => 'Keyboard', 'lamp' => 'Lamp', 'language' => 'Language', 'lastfm' => 'Lastfm', 'lastfm-circled' => 'Lastfm circled', 'layout' => 'Layout', 'leaf' => 'Leaf', 'left' => 'Left', 'left-bold' => 'Left bold', 'left-circled' => 'Left circled', 'left-dir' => 'Left dir', 'left-open' => 'Left open', 'left-open-big' => 'Left open big', 'left-open-mini' => 'Left open mini', 'left-thin' => 'Left thin', 'level-down' => 'Level down', 'level-up' => 'Level up', 'lifebuoy' => 'Lifebuoy', 'light-down' => 'Light down', 'light-up' => 'Light up', 'link' => 'Link', 'linkedin' => 'Linkedin', 'linkedin-circled' => 'Linkedin circled', 'list' => 'List', 'list-add' => 'List add', 'location' => 'Location', 'lock' => 'Lock', 'lock-open' => 'Lock open', 'login' => 'Login', 'logo-db' => 'Logo db', 'logout' => 'Logout', 'loop' => 'Loop', 'magnet' => 'Magnet', 'mail' => 'Mail', 'map' => 'Map', 'megaphone' => 'Megaphone', 'menu' => 'Menu', 'mic' => 'Mic', 'minus' => 'Minus', 'minus-circled' => 'Minus circled', 'minus-squared' => 'Minus squared', 'mixi' => 'Mixi', 'mobile' => 'Mobile', 'monitor' => 'Monitor', 'moon' => 'Moon', 'mouse' => 'Mouse', 'music' => 'Music', 'mute' => 'Mute', 'network' => 'Network', 'newspaper' => 'Newspaper', 'note' => 'Note', 'note-beamed' => 'Note beamed', 'palette' => 'Palette', 'paper-plane' => 'Paper plane', 'pause' => 'Pause', 'paypal' => 'Paypal', 'pencil' => 'Pencil', 'phone' => 'Phone', 'picasa' => 'Picasa', 'picture' => 'Picture', 'pinterest' => 'Pinterest', 'pinterest-circled' => 'Pinterest circled', 'play' => 'Play', 'plus' => 'Plus', 'plus-circled' => 'Plus circled', 'plus-squared' => 'Plus squared', 'popup' => 'Popup', 'print' => 'Print', 'progress-0' => 'Progress 0', 'progress-1' => 'Progress 1', 'progress-2' => 'Progress 2', 'progress-3' => 'Progress 3', 'publish' => 'Publish', 'qq' => 'Qq', 'quote' => 'Quote', 'rdio' => 'Rdio', 'rdio-circled' => 'Rdio circled', 'record' => 'Record', 'renren' => 'Renren', 'reply' => 'Reply', 'reply-all' => 'Reply all', 'resize-full' => 'Resize full', 'resize-small' => 'Resize small', 'retweet' => 'Retweet', 'right' => 'Right', 'right-bold' => 'Right bold', 'right-circled' => 'Right circled', 'right-dir' => 'Right dir', 'right-open' => 'Right open', 'right-open-big' => 'Right open big', 'right-open-mini' => 'Right open mini', 'right-thin' => 'Right thin', 'rocket' => 'Rocket', 'rss' => 'Rss', 'search' => 'Search', 'share' => 'Share', 'shareable' => 'Shareable', 'shuffle' => 'Shuffle', 'signal' => 'Signal', 'sina-weibo' => 'Sina weibo', 'skype' => 'Skype', 'skype-circled' => 'Skype circled', 'smashing' => 'Smashing', 'sound' => 'Sound', 'soundcloud' => 'Soundcloud', 'spotify' => 'Spotify', 'spotify-circled' => 'Spotify circled', 'star' => 'Star', 'star-empty' => 'Star empty', 'stop' => 'Stop', 'stumbleupon' => 'Stumbleupon', 'stumbleupon-circled' => 'Stumbleupon circled', 'suitcase' => 'Suitcase', 'sweden' => 'Sweden', 'switch' => 'Switch', 'tag' => 'Tag', 'tape' => 'Tape', 'target' => 'Target', 'thermometer' => 'Thermometer', 'thumbs-down' => 'Thumbs down', 'thumbs-up' => 'Thumbs up', 'ticket' => 'Ticket', 'to-end' => 'To end', 'to-start' => 'To start', 'tools' => 'Tools', 'traffic-cone' => 'Traffic cone', 'trash' => 'Trash', 'trophy' => 'Trophy', 'tumblr' => 'Tumblr', 'tumblr-circled' => 'Tumblr circled', 'twitter' => 'Twitter', 'twitter-circled' => 'Twitter circled', 'up' => 'Up', 'up-bold' => 'Up bold', 'up-circled' => 'Up circled', 'up-dir' => 'Up dir', 'up-open' => 'Up open', 'up-open-big' => 'Up open big', 'up-open-mini' => 'Up open mini', 'up-thin' => 'Up thin', 'upload' => 'Upload', 'upload-cloud' => 'Upload cloud', 'user' => 'User', 'user-add' => 'User add', 'users' => 'Users', 'vcard' => 'Vcard', 'video' => 'Video', 'vimeo' => 'Vimeo', 'vimeo-circled' => 'Vimeo circled', 'vkontakte' => 'Vkontakte', 'volume' => 'Volume', 'water' => 'Water', 'window' => 'Window');
}