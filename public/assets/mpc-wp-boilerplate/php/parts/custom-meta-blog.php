<?php

/* ---------------------------------------------------------------- */
/*	Blog Settings
/* ---------------------------------------------------------------- */

function blog_meta_box($post) {
	wp_nonce_field('mpc_blog_meta_box_nonce', 'blog_meta_box_nonce'); 
	
	$values = get_post_custom($post->ID);

	/* Blog Settings */
	$blog_categories = get_categories();

	if(isset($values['post_animation'])) {
		$post_animation = esc_attr($values['post_animation'][0]);
	} else { 
		$post_animation = "standard";
	}

	if(isset($values['blog_layout'])) {
		$blog_layout = esc_attr($values['blog_layout'][0]);
	} else { 
		$blog_layout = "standard";
	}

	if(isset($values['meta_layout'])) {
		$meta_layout = esc_attr($values['meta_layout'][0]);
	} else { 
		$meta_layout = "off";
	}
	
	$meta_layout = checked($meta_layout, 'on', false);

	if(isset($values['blog_pagination'])) {
		$blog_pagination = esc_attr($values['blog_pagination'][0]);
	} else { 
		$blog_pagination = "standard";
	}

	if(isset($values['blog_lm_info']))
		$blog_lm_info = esc_attr($values['blog_lm_info'][0]);
	else 
		$blog_lm_info = "off";
	
	$blog_lm_info = checked($blog_lm_info, 'on', false);

	if(isset($values['blog_category_filter']))
		$blog_category_filter = esc_attr($values['blog_category_filter'][0]);
	else 
		$blog_category_filter = "on"; 
	
	$blog_category_filter = checked($blog_category_filter, 'on', false);

	$category_values = array();

	if(isset($values['blog_cat']))
		$values['blog_cat'] = unserialize($values['blog_cat'][0]);
	else
		$values['blog_cat'] = array();

	foreach($blog_categories as $cat) {
		if(isset($values['blog_cat'][$cat->slug]))
			$category_values[$cat->slug] = esc_attr($values['blog_cat'][$cat->slug]);
		else 
			$category_values[$cat->slug] = "on"; 
		
		$category_values[$cat->slug] = checked($category_values[$cat->slug], 'on', false);
	}

	/* HTML Markup */
	$box_output = '';

	$box_output .= '<div class="mpcth-of">';

	/* Sidebar Settings */
	$box_output .= 
		'<div class="mpcth-of-accordion-content">'.
			'<div class="mpcth-of-section mpcth-of-section-select">'.
				'<h4>' . __('Animate Posts', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<select id="mpcth_otc_post_animation" name="post_animation" class="of-input">'.
							'<option value="none"' .(($post_animation == 'none') ? 'selected="selected"' : ''). '>' . __('NO', 'mpcth') . '</option>'.
							'<option value="top-to-bottom"' .(($post_animation == 'top-to-bottom') ? 'selected="selected"' : ''). '>' . __('TOP TO BOTTOM', 'mpcth') . '</option>'.
							'<option value="bottom-to-top"' .(($post_animation == 'bottom-to-top') ? 'selected="selected"' : ''). '>' . __('BOTTOM TO TOP', 'mpcth') . '</option>'.
							'<option value="left-to-right"' .(($post_animation == 'left-to-right') ? 'selected="selected"' : ''). '>' . __('LEFT TO RIGHT', 'mpcth') . '</option>'.
							'<option value="right-to-left"' .(($post_animation == 'right-to-left') ? 'selected="selected"' : ''). '>' . __('RIGHT TO LEFT', 'mpcth') . '</option>'.
							'<option value="appear"' .(($post_animation == 'appear') ? 'selected="selected"' : ''). '>' . __('APPEAR FROM CENTER', 'mpcth') . '</option>'.
						'</select>'.
						'<span class="mpcth-of-select-mockup"><span class="mpcth-of-select-border-right"><span></span></span><span class="mpcth-of-select-border-left"></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Choose type of posts animation.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-select">'.
				'<h4>' . __('Layout', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<select id="mpcth_otc_blog_layout" name="blog_layout" class="of-input">'.
							'<option value="standard"' .(($blog_layout == 'standard') ? 'selected="selected"' : ''). '>' . __('STANDARD', 'mpcth') . '</option>'.
							'<option value="full-width"' .(($blog_layout == 'full-width') ? 'selected="selected"' : ''). '>' . __('FULL-WIDTH', 'mpcth') . '</option>'.
							'<option value="compressed"' .(($blog_layout == 'compressed') ? 'selected="selected"' : ''). '>' . __('COMPRESSED', 'mpcth') . '</option>'.
							'<option value="first-featured"' .(($blog_layout == 'first-featured') ? 'selected="selected"' : ''). '>' . __('FIRST-FEATURED', 'mpcth') . '</option>'.
						'</select>'.
						'<span class="mpcth-of-select-mockup"><span class="mpcth-of-select-border-right"><span></span></span><span class="mpcth-of-select-border-left"></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Choose blog type.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-checkbox">'.
				'<h4>' . __('Side Meta', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_meta_layout" name="meta_layout" class="checkbox of-input" '.$meta_layout.'/>'.
						'<span class="mpcth-of-switcher"><span class="mpcth-of-switcher-slide"><span class="mpcth-of-switcher-thumb">| | |</span><span class="mpcth-of-switcher-on">ON</span><span class="mpcth-of-switcher-off">OFF</span></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Check it if you want to display date at the side of the post.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-select">'.
				'<h4>' . __('Pagination', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<select id="mpcth_otc_blog_pagination" name="blog_pagination" class="of-input">'.
							'<option value="standard"' .(($blog_pagination == 'standard') ? 'selected="selected"' : ''). '>' . __('Standard', 'mpcth') . '</option>'.
							'<option value="loadmore"' .(($blog_pagination == 'loadmore') ? 'selected="selected"' : ''). '>' . __('Load More', 'mpcth') . '</option>'.
						'</select>'.
						'<span class="mpcth-of-select-mockup"><span class="mpcth-of-select-border-right"><span></span></span><span class="mpcth-of-select-border-left"></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Choose pagination type for your blog page.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-checkbox">'.
				'<h4>' . __('Load More Info', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_blog_lm_info" name="blog_lm_info" class="checkbox of-input" '.$blog_lm_info.'/>'.
						'<span class="mpcth-of-switcher"><span class="mpcth-of-switcher-slide"><span class="mpcth-of-switcher-thumb">| | |</span><span class="mpcth-of-switcher-on">ON</span><span class="mpcth-of-switcher-off">OFF</span></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Check it if you want to display load more informations (loaded posts/all posts).', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-checkbox">'.
				'<h4>' . __('Enable Category Filter', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_blog_category_filter" name="blog_category_filter" class="checkbox of-input" '.$blog_category_filter.'/>'.
						'<span class="mpcth-of-switcher"><span class="mpcth-of-switcher-slide"><span class="mpcth-of-switcher-thumb">| | |</span><span class="mpcth-of-switcher-on">ON</span><span class="mpcth-of-switcher-off">OFF</span></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Check this if you want to add categories filter.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-radio mpcth-of-section-checkbox-multiple">'.
				'<h4>' . __('Choose Categories', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">';

						foreach($blog_categories as $cat) {
							$box_output .= '<input class="of-input of-checkbox" '.$category_values[$cat->slug].' type="checkbox" name="blog_cat-'.$cat->slug.'" id="blog_cat-'.$cat->slug.'" value="'.$cat->slug.'">';
							$box_output .= '<label for="blog_cat-'.$cat->slug.'"><span></span>'.$cat->name.'</label>';
						}

					$box_output .= '</div>'.
					'<div class="mpcth-of-explain">' . __('Choose which categories will be displayed in category filter.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
		'</div>'.
	'</div>';

	echo $box_output;
}

function save_blog_meta_box($post_id) {
	$id = isset($_POST['post_ID']) ? $_POST['post_ID'] : $post_id;

	// Bail if we're doing an auto save  
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return; 

	// if our nonce isn't there, or we can't verify it, bail 
	if(!isset($_POST['blog_meta_box_nonce']) || !wp_verify_nonce($_POST['blog_meta_box_nonce'], 'mpc_blog_meta_box_nonce')) return; 

	// if our current user can't edit this post, bail  
	if(!current_user_can('edit_post', $id)) return;
 
	// now we can actually save the data  
	$allowed = array(
		'a' => array( // on allow a tags  
			'href' => array() // and those anchors can only have href attribute  
		)
	);

	if(isset($_POST['blog_category_filter']) && $_POST['blog_category_filter']) 
		$blog_category_filter = 'on';
	else 
		$blog_category_filter = 'off';
		
	update_post_meta($id, 'blog_category_filter', $blog_category_filter);

	$blog_categories = get_categories(); 
	$category_values = array();

	foreach($blog_categories as $cat) {

		if(isset($_POST['blog_cat-'.$cat->slug]) && $_POST['blog_cat-'.$cat->slug]) 
			$category_values[$cat->slug] = 'on';
		else 
			$category_values[$cat->slug] = 'off';
	
		update_post_meta($id, 'blog_cat', $category_values);
	}

	if(isset($_POST['blog_lm_info']) && $_POST['blog_lm_info']) 
		$blog_lm_info = 'on';
	else 
		$blog_lm_info = 'off';
		
	update_post_meta($id, 'blog_lm_info', $blog_lm_info);

	if(isset($_POST['post_animation']))
		update_post_meta($id, 'post_animation', wp_kses($_POST['post_animation'], $allowed));

	if(isset($_POST['blog_layout']))
		update_post_meta($id, 'blog_layout', wp_kses($_POST['blog_layout'], $allowed));

	if(isset($_POST['blog_pagination'])) 
		update_post_meta($id, 'blog_pagination', wp_kses($_POST['blog_pagination'], $allowed));

	if(isset($_POST['meta_layout']) && $_POST['meta_layout']) 
		$meta_layout = 'on';
	else 
		$meta_layout = 'off';
		
	update_post_meta($id, 'meta_layout', $meta_layout);
}

add_action('save_post', 'save_blog_meta_box');
