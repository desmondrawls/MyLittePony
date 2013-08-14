<?php

/* ---------------------------------------------------------------- */
/*	Client Settings
/* ---------------------------------------------------------------- */

function client_meta_box($post) {
	wp_nonce_field('mpc_client_meta_box_nonce', 'client_meta_box_nonce'); 
	
	$values = get_post_custom($post->ID);

	if(isset($values['client_url'])) {
		$client_url = esc_attr($values['client_url'][0]);
	} else { 
		$client_url = '';
	}

	if(isset($values['logo'])) {
		$logo = esc_attr($values['logo'][0]);
	} else { 
		$logo = '';
	}

	/* HTML Markup */
	$box_output = '<div class="mpcth-of">';

	/* Socials Settings */
	$box_output .=
		'<div class="mpcth-of-section mpcth-of-section-text">'.
			'<h4>' . __('Client URL', 'mpcth') . '</h4>'.
			'<div class="mpcth-of-option">'.
				'<div class="mpcth-of-controls">'.
					'<input type="text" id="mpcth_otc_client_url" name="client_url" class="of-input" value="'.$client_url.'">'.
				'</div>'.
				'<div class="mpcth-of-explain">' . __('Specify client URL.', 'mpcth') . '</div>'.
			'</div>'.
		'</div>'.
		'<div class="mpcth-of-section mpcth-of-section-upload">'.
			'<h4>' . __('Client Logo', 'mpcth') . '</h4>'.
			'<div class="mpcth-of-option">'.
				'<div class="mpcth-of-controls">'.
					mpcth_optionsframework_medialibrary_uploader( 'mpcth_otc_logo', $logo, null, '', 0, 'logo', true ).
				'</div>'.
				'<div class="mpcth-of-explain">' . __('Specify background source.', 'mpcth') . '</div>'.
			'</div>'.
		'</div>';

	$box_output .= '</div>';

	echo $box_output;
}

function save_client_meta_box($post_id) {
	// global $post;
	$id = isset($_POST['post_ID']) ? $_POST['post_ID'] : $post_id;

	// Bail if we're doing an auto save  
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return; 

	// if our nonce isn't there, or we can't verify it, bail 
	if(!isset($_POST['client_meta_box_nonce']) || !wp_verify_nonce($_POST['client_meta_box_nonce'], 'mpc_client_meta_box_nonce')) return; 

	// if our current user can't edit this post, bail  
	if(!current_user_can('edit_post', $id)) return;
 
	// now we can actually save the data  
	$allowed = array(
		'a' => array( // on allow a tags  
			'href' => array() // and those anchors can only have href attribute  
		)
	);

	if(isset($_POST['client_url']))
		update_post_meta($id, 'client_url', wp_kses($_POST['client_url'], $allowed));

	if(isset($_POST['logo']))
		update_post_meta($id, 'logo', wp_kses($_POST['logo'], $allowed));
}

add_action('save_post', 'save_client_meta_box');