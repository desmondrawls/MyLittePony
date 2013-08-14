<?php

/* ---------------------------------------------------------------- */
/*	Portfolio Settings
/* ---------------------------------------------------------------- */

function portfolio_meta_box($post) {
	wp_nonce_field('mpc_portfolio_meta_box_nonce', 'portfolio_meta_box_nonce'); 
	
	$values = get_post_custom($post->ID);

	/* portfolio Settings */
	$portfolio_categories = get_categories(array(
		'taxonomy' => 'mpcth_portfolio_category',
		'hide_empty' => 1
	));

	if(isset($values['portfolio_type'])) {
		$portfolio_type = esc_attr($values['portfolio_type'][0]);
	} else { 
		$portfolio_type = "standard";
	}

	if(isset($values['portfolio_pagination'])) {
		$portfolio_pagination = esc_attr($values['portfolio_pagination'][0]);
	} else { 
		$portfolio_pagination = "standard";
	}

	if(isset($values['portfolio_lm_info']))
		$portfolio_lm_info = esc_attr($values['portfolio_lm_info'][0]);
	else 
		$portfolio_lm_info = "off"; 
	
	$portfolio_lm_info = checked($portfolio_lm_info, 'on', false);

	if(isset($values['portfolio_category_filter']))
		$portfolio_category_filter = esc_attr($values['portfolio_category_filter'][0]);
	else 
		$portfolio_category_filter = "on"; 
	
	$portfolio_category_filter = checked($portfolio_category_filter, 'on', false);

	$category_values = array();

	if(isset($values['portfolio_cat'][0]))
		$values['portfolio_cat'] = unserialize($values['portfolio_cat'][0]);
	
	foreach($portfolio_categories as $cat) {
		if(isset($values['portfolio_cat'][$cat->slug]))
			$category_values[$cat->slug] = esc_attr($values['portfolio_cat'][$cat->slug]);
		else 
			$category_values[$cat->slug] = "on"; 
		
		$category_values[$cat->slug] = checked($category_values[$cat->slug], 'on', false);
	}

	if(isset($values['portfolio_post_display'])) {
		$portfolio_post_display = esc_attr($values['portfolio_post_display'][0]);
	} else { 
		$portfolio_post_display = "10";
	}

	if(isset($values['portfolio_columns_number'])) {
		$portfolio_columns_number = esc_attr($values['portfolio_columns_number'][0]);
	} else { 
		$portfolio_columns_number = "3";
	}

	if(isset($values['portfolio_link_item']))
		$portfolio_link_item = esc_attr($values['portfolio_link_item'][0]);
	else 
		$portfolio_link_item = "on"; 
	
	$portfolio_link_item = checked($portfolio_link_item, 'on', false);

	if(isset($values['portfolio_display_title']))
		$portfolio_display_title = esc_attr($values['portfolio_display_title'][0]);
	else 
		$portfolio_display_title = "on"; 
	
	$portfolio_display_title = checked($portfolio_display_title, 'on', false);

	if(isset($values['portfolio_display_meta']))
		$portfolio_display_meta = esc_attr($values['portfolio_display_meta'][0]);
	else 
		$portfolio_display_meta = "on"; 
	
	$portfolio_display_meta = checked($portfolio_display_meta, 'on', false);

	if(isset($values['portfolio_display_content']))
		$portfolio_display_content = esc_attr($values['portfolio_display_content'][0]);
	else 
		$portfolio_display_content = "on"; 
	
	$portfolio_display_content = checked($portfolio_display_content, 'on', false);

	if(isset($values['portfolio_remove_frame']))
		$portfolio_remove_frame = esc_attr($values['portfolio_remove_frame'][0]);
	else 
		$portfolio_remove_frame = "off"; 
	
	$portfolio_remove_frame = checked($portfolio_remove_frame, 'on', false);

	/* HTML Markup */
	$box_output = '';

	$box_output .= '<div class="mpcth-of">';

	/* Sidebar Settings */
	$box_output .= 
		'<div class="mpcth-of-accordion-content">'.
			'<div class="mpcth-of-section mpcth-of-section-text">'.
				'<h4>' . __('Post To Display', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_portfolio_post_display" name="portfolio_post_display" class="checkbox of-input" value="'.$portfolio_post_display.'"/>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify how many posts you would like to display per page/load.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-select">'.
				'<h4>' . __('Columns Number', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<select id="mpcth_otc_portfolio_columns_number" name="portfolio_columns_number" class="of-input">'.
							'<option value="1"' .(($portfolio_columns_number == '1') ? 'selected="selected"' : ''). '>1</option>'.
							'<option value="2"' .(($portfolio_columns_number == '2') ? 'selected="selected"' : ''). '>2</option>'.
							'<option value="3"' .(($portfolio_columns_number == '3') ? 'selected="selected"' : ''). '>3</option>'.
							'<option value="4"' .(($portfolio_columns_number == '4') ? 'selected="selected"' : ''). '>4</option>'.
						'</select>'.
						'<span class="mpcth-of-select-mockup"><span class="mpcth-of-select-border-right"><span></span></span><span class="mpcth-of-select-border-left"></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify number of portfolio columns.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-checkbox">'.
				'<h4>' . __('Load More Info', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_portfolio_lm_info" name="portfolio_lm_info" class="checkbox of-input" '.$portfolio_lm_info.'/>'.
						'<span class="mpcth-of-switcher"><span class="mpcth-of-switcher-slide"><span class="mpcth-of-switcher-thumb">| | |</span><span class="mpcth-of-switcher-on">ON</span><span class="mpcth-of-switcher-off">OFF</span></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Check it if you want to display load more informations (loaded posts/all posts).', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-checkbox">'.
				'<h4>' . __('Enable Category Filter', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_portfolio_category_filter" name="portfolio_category_filter" class="checkbox of-input" '.$portfolio_category_filter.'/>'.
						'<span class="mpcth-of-switcher"><span class="mpcth-of-switcher-slide"><span class="mpcth-of-switcher-thumb">| | |</span><span class="mpcth-of-switcher-on">ON</span><span class="mpcth-of-switcher-off">OFF</span></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Check this if you want to add categories filter.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-radio mpcth-of-section-checkbox-multiple">'.
				'<h4>' . __('Choose Categories', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">';

						foreach($portfolio_categories as $cat) {
							$box_output .= '<input class="of-input of-checkbox" '.$category_values[$cat->slug].' type="checkbox" name="portfolio_cat-'.$cat->slug.'" id="portfolio_cat-'.$cat->slug.'" value="'.$cat->slug.'">';
							$box_output .= '<label for="portfolio_cat-'.$cat->slug.'"><span></span>'.$cat->name.'</label>';
						}

					$box_output .= '</div>'.
					'<div class="mpcth-of-explain">' . __('Choose which categories will be displayed in category filter.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
		'</div>'.
	'</div>';

	echo $box_output;
}

function save_portfolio_meta_box($post_id) {
	$id = isset($_POST['post_ID']) ? $_POST['post_ID'] : $post_id;

	// Bail if we're doing an auto save  
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return; 

	// if our nonce isn't there, or we can't verify it, bail 
	if(!isset($_POST['portfolio_meta_box_nonce']) || !wp_verify_nonce($_POST['portfolio_meta_box_nonce'], 'mpc_portfolio_meta_box_nonce')) return; 

	// if our current user can't edit this post, bail  
	if(!current_user_can('edit_post', $id)) return;
 
	// now we can actually save the data  
	$allowed = array(
		'a' => array( // on allow a tags  
			'href' => array() // and those anchors can only have href attribute  
		)
	);

	if(isset($_POST['portfolio_category_filter']) && $_POST['portfolio_category_filter']) 
		$portfolio_category_filter = 'on';
	else 
		$portfolio_category_filter = 'off';
		
	update_post_meta($id, 'portfolio_category_filter', $portfolio_category_filter);

	$portfolio_categories = get_categories(array(
                   				'taxonomy' => 'mpcth_portfolio_category',
                    			'hide_empty' => 1
                     		));

	$category_values = array();

	foreach($portfolio_categories as $cat) {

		if(isset($_POST['portfolio_cat-'.$cat->slug]) && $_POST['portfolio_cat-'.$cat->slug]) 
			$category_values[$cat->slug] = 'on';
		else 
			$category_values[$cat->slug] = 'off';

		update_post_meta($id, 'portfolio_cat', $category_values);
	}

	if(isset($_POST['portfolio_lm_info']) && $_POST['portfolio_lm_info']) 
		$portfolio_lm_info = 'on';
	else 
		$portfolio_lm_info = 'off';
		
	update_post_meta($id, 'portfolio_lm_info', $portfolio_lm_info);

	if(isset($_POST['portfolio_post_display']))
		update_post_meta($id, 'portfolio_post_display', wp_kses($_POST['portfolio_post_display'], $allowed));

	if(isset($_POST['portfolio_type']))
		update_post_meta($id, 'portfolio_type', wp_kses($_POST['portfolio_type'], $allowed));

	if(isset($_POST['portfolio_pagination'])) 
		update_post_meta($id, 'portfolio_pagination', wp_kses($_POST['portfolio_pagination'], $allowed));

	if(isset($_POST['portfolio_columns_number']))
		update_post_meta($id, 'portfolio_columns_number', wp_kses($_POST['portfolio_columns_number'], $allowed));

	if(isset($_POST['portfolio_link_item']) && $_POST['portfolio_link_item']) 
		$portfolio_link_item = 'on';
	else 
		$portfolio_link_item = 'off';
		
	update_post_meta($id, 'portfolio_link_item', $portfolio_link_item);

	if(isset($_POST['portfolio_display_title']) && $_POST['portfolio_display_title']) 
		$portfolio_display_title = 'on';
	else 
		$portfolio_display_title = 'off';
		
	update_post_meta($id, 'portfolio_display_title', $portfolio_display_title);

	if(isset($_POST['portfolio_display_meta']) && $_POST['portfolio_display_meta']) 
		$portfolio_display_meta = 'on';
	else 
		$portfolio_display_meta = 'off';
		
	update_post_meta($id, 'portfolio_display_meta', $portfolio_display_meta);

	if(isset($_POST['portfolio_display_content']) && $_POST['portfolio_display_content']) 
		$portfolio_display_content = 'on';
	else 
		$portfolio_display_content = 'off';
		
	update_post_meta($id, 'portfolio_display_content', $portfolio_display_content);

	if(isset($_POST['portfolio_remove_frame']) && $_POST['portfolio_remove_frame']) 
		$portfolio_remove_frame = 'on';
	else 
		$portfolio_remove_frame = 'off';
		
	update_post_meta($id, 'portfolio_remove_frame', $portfolio_remove_frame);
}

add_action('save_post', 'save_portfolio_meta_box');
