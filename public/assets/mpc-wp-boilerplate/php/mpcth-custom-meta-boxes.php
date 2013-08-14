<?php

/**
 * Custom Meta Boxes
 *
 * Functions for all metaboxes (post item, portfolio item, page, blog page,portfolio page).
 *
 * @package WordPress
 * @subpackage MPC WP Boilerplate
 * @since 1.0
 *
 */

/* ---------------------------------------------------------------- */
/*	Custom Meta Boxes
/* ---------------------------------------------------------------- */

add_action('admin_init', 'mpcth_admin_init');

function mpcth_admin_init() {
	wp_enqueue_style('mpcth-metaboxes-style', MPC_THEME_ROOT.'/mpc-wp-boilerplate/css/metaboxes.css');
	wp_enqueue_script('mpcth-metaboxes-js', MPC_THEME_ROOT.'/mpc-wp-boilerplate/js/mpcth-metaboxes.js', array('jquery', 'backbone'), '1.0');
	wp_localize_script('mpcth-metaboxes-js', 'mpcth', array('ajaxurl' => admin_url('admin-ajax.php')));
}

/* ---------------------------------------------------------------- */
/*	Add Meta Boxes
/* ---------------------------------------------------------------- */

function add_pages_meta_box() {
	$post_id = '';
	
	if(isset($_GET['post']))
		$post_id =  $_GET['post'];
	elseif(isset($_POST['post_ID']))
		$post_id = $_POST['post_ID'];
	
	global $template_file;
	$template_file = get_post_meta($post_id, '_wp_page_template', TRUE);
	
	/* Blog Post Settings */
	add_meta_box('mpcth_post_settings', __('Post Settings', 'mpcth'), 'post_meta_box', 'post', 'normal', 'core');
	add_filter('postbox_classes_post_mpcth_post_settings', 'mpcth_meta_box_class');

	/* Portfolio Post Settings */
	add_meta_box('mpcth_post_settings', __('Post Settings', 'mpcth'), 'post_meta_box', 'portfolio', 'normal', 'core');
	add_filter('postbox_classes_portfolio_mpcth_post_settings', 'mpcth_meta_box_class');

	/* Team Settings */
	add_meta_box('mpcth_post_settings', __('Team Settings', 'mpcth'), 'team_meta_box', 'team', 'normal', 'core');
	add_filter('postbox_classes_team_mpcth_post_settings', 'mpcth_meta_box_class');

	/* Widget Area Settings */
	add_meta_box('mpcth_post_settings', __('Widget Area Settings', 'mpcth'), 'widget_area_meta_box', 'widget_area', 'normal', 'core');
	add_filter('postbox_classes_widget_area_mpcth_post_settings', 'mpcth_meta_box_class');

	/* Testimonial Settings */
	add_meta_box('mpcth_post_settings', __('Testimonial Settings', 'mpcth'), 'testimonial_meta_box', 'testimonial', 'normal', 'core');
	add_filter('postbox_classes_testimonial_mpcth_post_settings', 'mpcth_meta_box_class');

	/* Clients Settings */
	add_meta_box('mpcth_post_settings', __('Client Settings', 'mpcth'), 'client_meta_box', 'client', 'normal', 'core');
	add_filter('postbox_classes_client_mpcth_post_settings', 'mpcth_meta_box_class');

	/* Page settings */
	add_meta_box('mpcth_page_settings', __('Page Settings', 'mpcth'), 'page_meta_box', 'page', 'normal', 'core');
	add_filter('postbox_classes_page_mpcth_page_settings', 'mpcth_meta_box_class');

	/* Showreel Page Template Settings */
	add_meta_box('mpcth_showreel_settings', __('Showreel Settings', 'mpcth'), 'showreel_meta_box', 'page', 'normal', 'core');
	add_filter('postbox_classes_page_mpcth_showreel_settings', 'mpcth_meta_box_class');

	/* Blog Page Template Settings */
	add_meta_box('mpcth_blog_settings', __('Blog Settings', 'mpcth'), 'blog_meta_box', 'page', 'normal', 'core');
	add_filter('postbox_classes_page_mpcth_blog_settings', 'mpcth_meta_box_class');

	/* Portfolio Page Template Settings */
	add_meta_box('mpcth_portfolio_settings', __('Portfolio Settings', 'mpcth'), 'portfolio_meta_box', 'page', 'normal', 'core');
	add_filter('postbox_classes_page_mpcth_portfolio_settings', 'mpcth_meta_box_class');

	/* Full Width Page Template Settings */
	add_meta_box('mpcth_full_width_settings', __('Full Width Settings', 'mpcth'), 'full_width_meta_box', 'page', 'normal', 'core');
	add_filter('postbox_classes_page_mpcth_full_width_settings', 'mpcth_meta_box_class');

	/* Home Page Template Settings */
	add_meta_box('mpcth_home_settings', __('Home Settings', 'mpcth'), 'home_meta_box', 'page', 'normal', 'core');
	add_filter('postbox_classes_page_mpcth_home_settings', 'mpcth_meta_box_class');
}

add_action('add_meta_boxes', 'add_pages_meta_box');

/* ---------------------------------------------------------------- */
/*	Add classes to meta boxes
/* ---------------------------------------------------------------- */

function mpcth_meta_box_class( $classes=array() ) {
    //if( !in_array( 'mpcth-meta-box', $classes ) )
        $classes[] = 'mpcth-meta-box';

    return $classes;
}

/* ---------------------------------------------------------------- */
/*	Blog Post Settings
/* ---------------------------------------------------------------- */

require_once(TEMPLATEPATH.'/mpc-wp-boilerplate/php/parts/custom-meta-post.php');

/* ---------------------------------------------------------------- */
/*	Team Settings
/* ---------------------------------------------------------------- */

require_once(TEMPLATEPATH.'/mpc-wp-boilerplate/php/parts/custom-meta-team.php');

/* ---------------------------------------------------------------- */
/*	Widget Area Settings
/* ---------------------------------------------------------------- */

require_once(TEMPLATEPATH.'/mpc-wp-boilerplate/php/parts/custom-meta-widget_area.php');

/* ---------------------------------------------------------------- */
/*	Client Settings
/* ---------------------------------------------------------------- */

require_once(TEMPLATEPATH.'/mpc-wp-boilerplate/php/parts/custom-meta-client.php');

/* ---------------------------------------------------------------- */
/*	Testimonial Settings
/* ---------------------------------------------------------------- */

require_once(TEMPLATEPATH.'/mpc-wp-boilerplate/php/parts/custom-meta-testimonial.php');

/* ---------------------------------------------------------------- */
/*	Page Settings
/* ---------------------------------------------------------------- */

require_once(TEMPLATEPATH.'/mpc-wp-boilerplate/php/parts/custom-meta-page.php');

/* ---------------------------------------------------------------- */
/*	Showreel Settings
/* ---------------------------------------------------------------- */

require_once(TEMPLATEPATH.'/mpc-wp-boilerplate/php/parts/custom-meta-showreel.php');

/* ---------------------------------------------------------------- */
/*	Blog Settings
/* ---------------------------------------------------------------- */

require_once(TEMPLATEPATH.'/mpc-wp-boilerplate/php/parts/custom-meta-blog.php');

/* ---------------------------------------------------------------- */
/*	Portfolio Settings
/* ---------------------------------------------------------------- */

require_once(TEMPLATEPATH.'/mpc-wp-boilerplate/php/parts/custom-meta-portfolio.php');

/* ---------------------------------------------------------------- */
/*	Full Width Settings
/* ---------------------------------------------------------------- */

require_once(TEMPLATEPATH.'/mpc-wp-boilerplate/php/parts/custom-meta-full_width.php');

/* ---------------------------------------------------------------- */
/*	Home Settings
/* ---------------------------------------------------------------- */

require_once(TEMPLATEPATH.'/mpc-wp-boilerplate/php/parts/custom-meta-home.php');

?>