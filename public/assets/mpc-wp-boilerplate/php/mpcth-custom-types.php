<?php

/*-----------------------------------------------------------------------------------*/
/*	Setup Custom Types
/*-----------------------------------------------------------------------------------*/

function mpcth_setup_custom_types(){
	if (function_exists('add_theme_support')) {
		add_post_type_support('portfolio', 'post-formats');
		add_post_type_support('team', 'post-formats');
		add_post_type_support('widget_area', 'title');
		add_post_type_support('testimonial', array('title', 'editor'));
		add_post_type_support('client', array('title', 'editor'));
	}
}
add_action( 'after_setup_theme', 'mpcth_setup_custom_types' );

/*-----------------------------------------------------------------------------------*/
/*	Register Client Type
/*-----------------------------------------------------------------------------------*/

function mpcth_register_client() {
	register_taxonomy('mpcth_client_category', 'client', array(
		'hierarchical' => true,
		'show_ui' => true,
		'query_var' => true,
		'show_in_nav_menus' => false,
	));
	
	wp_insert_term('Uncategorized', 'mpcth_client_category', array(
		'name' => __('Uncategorized', 'mpcth'),
		'slug' => 'uncategorized',
		'taxonomy' => 'mpcth_client_category',
		'description' => '',
		'category_description' => '',
		'cat_name' => __('Uncategorized', 'mpcth'),
		'category_nicename' => 'uncategorized'
	));
	
	$labels = array(
		'name' => __('Clients', 'mpcth'),
		'singular_name' => __('Client', 'mpcth'),
		'all_items' => __('Clients', 'mpcth'),
		'add_new_item' => __('Add New Client', 'mpcth'),
		'edit_item' => __('Edit Client', 'mpcth'),
		'new_item' => __('New Client', 'mpcth'),
		'view_item' => __('View Client', 'mpcth'),
		'search_items' => __('Search Clients', 'mpcth'),
		'not_found' => __('No Clients found', 'mpcth'),
		'not_found_in_trash' => __('No Clients found in Trash', 'mpcth')
	);

	$client_args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'menu_icon' => MPC_THEME_ROOT . '/mpc-wp-boilerplate/images/icons/clients.png',
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,
		'show_in_nav_menus' => false,
		'supports' => array('title')
	);
	
	register_post_type('client', $client_args);
}
add_action('init', 'mpcth_register_client');

function mpcth_add_default_client_category($post_ID) {
	global $wpdb;

	if(!has_term('', 'mpcth_client_category', $post_ID)){
		$cat = array(1);
		wp_set_object_terms($post_ID, $cat, 'mpcth_client_category');
	}
}
add_action('publish_client', 'mpcth_add_default_client_category');

/*-----------------------------------------------------------------------------------*/
/*	Register Testimonial Type
/*-----------------------------------------------------------------------------------*/

function mpcth_register_testimonial() {
	$labels = array(
		'name' => __('Subject', 'mpcth'),
		'singular_name' => __('Subject', 'mpcth'),
		'menu_name' => __('Subject', 'mpcth'),
		'all_items' => __('All Subjects', 'mpcth'),
		'edit_item' => __('Edit Subject', 'mpcth'),
		'view_item' => __('View Subject', 'mpcth'),
		'update_item' => __('Update Subject', 'mpcth'),
		'add_new_item' => __('Add New Subject', 'mpcth'),
		'new_item_name' => __('New Subject Name', 'mpcth'),
		'parent_item' => __('Parent Subject', 'mpcth'),
		'parent_item_colon' => __('Parent Subject:', 'mpcth'),
		'search_items' => __('Search Subjects', 'mpcth'),
		'popular_items' => __('Popular Subjects', 'mpcth')
	);

	register_taxonomy('mpcth_testimonial_subject', 'testimonial', array(
		'hierarchical' => true,
		'show_ui' => true,
		'query_var' => true,
		'show_in_nav_menus' => false,
		'labels' => $labels
	));
	
	wp_insert_term('Uncategorized', 'mpcth_testimonial_subject', array(
		'name' => __('Uncategorized', 'mpcth'),
		'slug' => 'uncategorized',
		'taxonomy' => 'mpcth_testimonial_subject',
		'description' => '',
		'category_description' => '',
		'cat_name' => __('Uncategorized', 'mpcth'),
		'category_nicename' => 'uncategorized'
	));
	
	$labels = array(
		'name' => __('Testimonials', 'mpcth'),
		'singular_name' => __('Testimonial', 'mpcth'),
		'all_items' => __('Testimonials', 'mpcth'),
		'add_new_item' => __('Add New Testimonial', 'mpcth'),
		'edit_item' => __('Edit Testimonial', 'mpcth'),
		'new_item' => __('New Testimonial', 'mpcth'),
		'view_item' => __('View Testimonial', 'mpcth'),
		'search_items' => __('Search Testimonials', 'mpcth'),
		'not_found' => __('No Testimonials found', 'mpcth'),
		'not_found_in_trash' => __('No Testimonials found in Trash', 'mpcth')
	);

	$testimonial_args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'menu_icon' => MPC_THEME_ROOT . '/mpc-wp-boilerplate/images/icons/testimonials.png',
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,
		'show_in_nav_menus' => false,
		'supports' => array('title')
	);
	
	register_post_type('testimonial', $testimonial_args);
}
add_action('init', 'mpcth_register_testimonial');

function mpcth_add_default_testimonial_subject($post_ID) {
	global $wpdb;

	if(!has_term('', 'mpcth_testimonial_subject', $post_ID)){
		$cat = array(1);
		wp_set_object_terms($post_ID, $cat, 'mpcth_testimonial_subject');
	}
}
add_action('publish_testimonial', 'mpcth_add_default_testimonial_subject');

/* Custom columns */

function mpcth_testimonial_columns($defaults) {
	$defaults['testimonial_subject'] = 'Subject';
	$defaults['testimonial_company'] = 'Company';
	return $defaults;
}
add_filter('manage_testimonial_posts_columns', 'mpcth_testimonial_columns');

function mpcth_testimonial_columns_content($column_name, $post_ID) {
	$testimonial_subject = wp_get_post_terms($post_ID, 'mpcth_testimonial_subject');
	$testimonial_company = get_post_meta($post_ID, 'company', true);

	if($column_name == 'testimonial_subject') {
		for ($index = 0, $lenght = count($testimonial_subject); $index < $lenght; $index++) { 
			echo $testimonial_subject[$index]->name;

			if($index + 1 < $lenght)
				echo ', ';
		}
	} elseif($column_name == 'testimonial_company') {
		echo $testimonial_company;
	}
}
add_action('manage_testimonial_posts_custom_column', 'mpcth_testimonial_columns_content', 10, 2);

/*-----------------------------------------------------------------------------------*/
/*	Register Widget Area Type
/*-----------------------------------------------------------------------------------*/

function mpcth_register_widget_area() {
	$labels = array(
		'name' => __('Widget Area', 'mpcth'),
		'singular_name' => __('Widget Area', 'mpcth'),
		'all_items' => __('Widget Areas', 'mpcth'),
		'add_new_item' => __('Add New Widget Area', 'mpcth'),
		'edit_item' => __('Edit Widget Area', 'mpcth'),
		'new_item' => __('New Widget Area', 'mpcth'),
		'view_item' => __('View Widget Area', 'mpcth'),
		'search_items' => __('Search Widget Areas', 'mpcth'),
		'not_found' => __('No Widget Areas found', 'mpcth'),
		'not_found_in_trash' => __('No Widget Areas found in Trash', 'mpcth')
	);

	$widget_area_args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => 'themes.php',
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,
		'show_in_nav_menus' => false,
		'supports' => array('title')
	);
	
	register_post_type('widget_area', $widget_area_args);
}
add_action('init', 'mpcth_register_widget_area');

/* Custom columns */

function mpcth_widget_area_columns($defaults) {
	$defaults['widget_area_type'] = 'Type';
	$defaults['widget_area_columns'] = 'Columns';
	return $defaults;
}
add_filter('manage_widget_area_posts_columns', 'mpcth_widget_area_columns');

function mpcth_widget_area_columns_content($column_name, $post_ID) {

	$widget_area_type = get_post_meta($post_ID, 'widget_area_type', true);
	$widget_area_columns = get_post_meta($post_ID, 'widget_area_columns', true);

	if($column_name == 'widget_area_type') {
		echo ucwords(str_replace('_', ' ', $widget_area_type));
	} elseif($column_name == 'widget_area_columns') {
		if($widget_area_type != 'sidebar')
			echo $widget_area_columns;
	}
}
add_action('manage_widget_area_posts_custom_column', 'mpcth_widget_area_columns_content', 10, 2);

/*-----------------------------------------------------------------------------------*/
/*	Register Team Post Type
/*-----------------------------------------------------------------------------------*/

function mpcth_register_team() {
	$labels = array(
		'name' => __('Role', 'mpcth'),
		'singular_name' => __('Role', 'mpcth'),
		'menu_name' => __('Role', 'mpcth'),
		'all_items' => __('All Roles', 'mpcth'),
		'edit_item' => __('Edit Role', 'mpcth'),
		'view_item' => __('View Role', 'mpcth'),
		'update_item' => __('Update Role', 'mpcth'),
		'add_new_item' => __('Add New Role', 'mpcth'),
		'new_item_name' => __('New Role Name', 'mpcth'),
		'parent_item' => __('Parent Role', 'mpcth'),
		'parent_item_colon' => __('Parent Role:', 'mpcth'),
		'search_items' => __('Search Roles', 'mpcth'),
		'popular_items' => __('Popular Roles', 'mpcth')
	);

	register_taxonomy('mpcth_team_role', 'team', array(
		'hierarchical' => true,
		'show_ui' => true,
		'query_var' => true,
		'show_in_nav_menus' => false,
		'labels' => $labels
	));
	
	wp_insert_term('Uncategorized', 'mpcth_team_role', array(
		'name' => __('Uncategorized', 'mpcth'),
		'slug' => 'uncategorized',
		'taxonomy' => 'mpcth_team_role',
		'description' => '',
		'category_description' => '',
		'cat_name' => __('Uncategorized', 'mpcth'),
		'category_nicename' => 'uncategorized'
	));

	$labels = array(
		'name' => __('Skill', 'mpcth'),
		'singular_name' => __('Skill', 'mpcth'),
		'menu_name' => __('Skill', 'mpcth'),
		'all_items' => __('All Skills', 'mpcth'),
		'edit_item' => __('Edit Skill', 'mpcth'),
		'view_item' => __('View Skill', 'mpcth'),
		'update_item' => __('Update Skill', 'mpcth'),
		'add_new_item' => __('Add New Skill', 'mpcth'),
		'new_item_name' => __('New Skill Name', 'mpcth'),
		'parent_item' => __('Parent Skill', 'mpcth'),
		'parent_item_colon' => __('Parent Skill:', 'mpcth'),
		'search_items' => __('Search Skills', 'mpcth'),
		'popular_items' => __('Popular Skills', 'mpcth')
	);

	register_taxonomy('mpcth_team_skill', 'team', array(
		'hierarchical' => true,
		'show_ui' => true,
		'query_var' => true,
		'show_in_nav_menus' => false,
		'labels' => $labels
	));
	
	$labels = array(
		'name' => __('Team', 'mpcth'),
		'singular_name' => __('Member', 'mpcth'),
		'all_items' => __('Members', 'mpcth'),
		'add_new_item' => __('Add New Member', 'mpcth'),
		'edit_item' => __('Edit Member', 'mpcth'),
		'new_item' => __('New Member', 'mpcth'),
		'view_item' => __('View Member', 'mpcth'),
		'search_items' => __('Search Members', 'mpcth'),
		'not_found' => __('No Members found', 'mpcth'),
		'not_found_in_trash' => __('No Members found in Trash', 'mpcth')
	);

	$team_args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'menu_icon' => MPC_THEME_ROOT . '/mpc-wp-boilerplate/images/icons/team.png',
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,
		'show_in_nav_menus' => false,
		'supports' => array('title', 'editor', 'thumbnail')
	);
	
	register_post_type('team', $team_args);
}
add_action('init', 'mpcth_register_team');

function mpcth_add_default_team_role($post_ID) {
	global $wpdb;

	if(!has_term('', 'mpcth_team_role', $post_ID)){
		$cat = array(1);
		wp_set_object_terms($post_ID, $cat, 'mpcth_team_role');
	}
}
add_action('publish_team', 'mpcth_add_default_team_role');

/* Custom columns */

function mpcth_team_columns($defaults) {
	$defaults['team_role'] = 'Role';
	$defaults['team_skills'] = 'Skills';
	return $defaults;
}
add_filter('manage_team_posts_columns', 'mpcth_team_columns');

function mpcth_team_columns_content($column_name, $post_ID) {
	$team_roles = wp_get_post_terms($post_ID, 'mpcth_team_role');
	$team_skills = wp_get_post_terms($post_ID, 'mpcth_team_skill');

	if($column_name == 'team_role') {
		for ($index = 0, $lenght = count($team_roles); $index < $lenght; $index++) { 
			echo $team_roles[$index]->name;

			if($index + 1 < $lenght)
				echo ', ';
		}
	} elseif($column_name == 'team_skills') {
		for ($index = 0, $lenght = count($team_skills); $index < $lenght; $index++) { 
			echo $team_skills[$index]->name;

			if($index + 1 < $lenght)
				echo ', ';
		}
	}
}
add_action('manage_team_posts_custom_column', 'mpcth_team_columns_content', 10, 2);

/*-----------------------------------------------------------------------------------*/
/*	Register Portfolio Post Type
/*-----------------------------------------------------------------------------------*/

function mpcth_register_portfolio() {
	register_taxonomy('mpcth_portfolio_category', 'portfolio', array(
		'hierarchical' => true,
		'show_ui' => true,
		'query_var' => true,
		'show_in_nav_menus' => false
	)); // add unique categories to portfolio section 
	
	wp_insert_term('Uncategorized', 'mpcth_portfolio_category', array(
		'name' => __('Uncategorized', 'mpcth'),
		'slug' => 'uncategorized',
		'taxonomy' => 'mpcth_portfolio_category',
		'description' => '',
		'category_description' => '',
		'cat_name' => __('Uncategorized', 'mpcth'),
		'category_nicename' => 'uncategorized'
	));

	$labels = array(
		'name' => __('Portfolio', 'mpcth'),
		'singular_name' => __('Portfolio Item', 'mpcth'),
		'all_items' => __('Portfolio Items', 'mpcth'),
		'add_new_item' => __('Add New Portfolio Item', 'mpcth'),
		'edit_item' => __('Edit Portfolio Item', 'mpcth'),
		'new_item' => __('New Portfolio Item', 'mpcth'),
		'view_item' => __('View Portfolio Items', 'mpcth'),
		'search_items' => __('Search Portfolio Items', 'mpcth'),
		'not_found' => __('No Portfolio Items found', 'mpcth'),
		'not_found_in_trash' => __('No Portfolio Items found in Trash', 'mpcth')
	);

	$portfolio_args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'menu_icon' => MPC_THEME_ROOT . '/mpc-wp-boilerplate/images/icons/portfolio.png',
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,
		'supports' => array('title', 'editor', 'thumbnail', 'comments'),
		'taxonomies' => array('post_tag')
	);
	
	register_post_type('portfolio', $portfolio_args);
}
add_action('init', 'mpcth_register_portfolio');

function mpcth_add_default_portfolio_category($post_ID) {
	global $wpdb;

	if(!has_term('', 'mpcth_portfolio_category', $post_ID)){
		$cat = array(1);
		wp_set_object_terms($post_ID, $cat, 'mpcth_portfolio_category');
	}
}
add_action('publish_portfolio', 'mpcth_add_default_portfolio_category');

/* ---------------------------------------------------------------- */
/* Icons and columns
/* ---------------------------------------------------------------- */

function mpcth_swap_types_icons() {
	global $post_type;
	if(!isset($_GET['post_type'])) $_GET['post_type'] = $post_type;
	
	if (($_GET['post_type'] == 'testimonial') || ($post_type == 'testimonial')) {
		echo '<style>';
			echo '#icon-edit { background:transparent url("' . MPC_THEME_ROOT . '/mpc-wp-boilerplate/images/icons/testimonials_large.png' . '") no-repeat; }';
		echo '</style>';
	} elseif (($_GET['post_type'] == 'client') || ($post_type == 'client')) {
		echo '<style>';
			echo '#icon-edit { background:transparent url("' . MPC_THEME_ROOT . '/mpc-wp-boilerplate/images/icons/clients_large.png' . '") no-repeat; }';
		echo '</style>';
	} elseif (($_GET['post_type'] == 'portfolio') || ($post_type == 'portfolio')) {
		echo '<style>';
			echo '#icon-edit { background:transparent url("' . MPC_THEME_ROOT . '/mpc-wp-boilerplate/images/icons/portfolio_large.png' . '") no-repeat; }';
		echo '</style>';
	} elseif (($_GET['post_type'] == 'team') || ($post_type == 'team')) {
		echo '<style>';
			echo '#icon-edit { background:transparent url("' . MPC_THEME_ROOT . '/mpc-wp-boilerplate/images/icons/team_large.png' . '") no-repeat; }';
		echo '</style>';
	} elseif (($_GET['post_type'] == 'widget_area') || ($post_type == 'widget_area')) {
		echo '<style>';
			echo '#icon-themes { background:transparent url("' . MPC_THEME_ROOT . '/mpc-wp-boilerplate/images/icons/widgets_large.png' . '") no-repeat; }';
		echo '</style>';
	}
}
add_action('admin_head', 'mpcth_swap_types_icons');