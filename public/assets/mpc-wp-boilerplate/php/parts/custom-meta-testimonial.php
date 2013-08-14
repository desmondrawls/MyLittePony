<?php

/* ---------------------------------------------------------------- */
/*	Testimonial Settings
/* ---------------------------------------------------------------- */

function testimonial_meta_box($post) {
	wp_nonce_field('mpc_testimonial_meta_box_nonce', 'testimonial_meta_box_nonce'); 
	
	$values = get_post_custom($post->ID);
	
	?>
		<script>
			jQuery(document).ready(function($) {
				$('#formatdiv').remove();
			});
		</script>
	<?php
	
	if(isset($values['company'])) {
		$company = esc_attr($values['company'][0]);
	} else { 
		$company = '';
	}

	if(isset($values['author_url'])) {
		$author_url = esc_attr($values['author_url'][0]);
	} else { 
		$author_url = '';
	}

	if(isset($values['author_image'])) {
		$author_image = esc_attr($values['author_image'][0]);
	} else { 
		$author_image = '';
	}

	/* HTML Markup */
	$box_output = '<div class="mpcth-of">';

	/* Socials Settings */
	$box_output .=
		'<div class="mpcth-of-section mpcth-of-section-text">'.
			'<h4>' . __('Author Company', 'mpcth') . '</h4>'.
			'<div class="mpcth-of-option">'.
				'<div class="mpcth-of-controls">'.
					'<input type="text" id="mpcth_otc_company" name="company" class="of-input" value="'.$company.'">'.
				'</div>'.
				'<div class="mpcth-of-explain">' . __('Specify author company.', 'mpcth') . '</div>'.
			'</div>'.
		'</div>'.
		'<div class="mpcth-of-section mpcth-of-section-text">'.
			'<h4>' . __('Author URL', 'mpcth') . '</h4>'.
			'<div class="mpcth-of-option">'.
				'<div class="mpcth-of-controls">'.
					'<input type="text" id="mpcth_otc_author_url" name="author_url" class="of-input" value="'.$author_url.'">'.
				'</div>'.
				'<div class="mpcth-of-explain">' . __('Specify author URL.', 'mpcth') . '</div>'.
			'</div>'.
		'</div>'.
		'<div class="mpcth-of-section mpcth-of-section-upload">'.
			'<h4>' . __('Author Image', 'mpcth') . '</h4>'.
			'<div class="mpcth-of-option">'.
				'<div class="mpcth-of-controls">'.
					mpcth_optionsframework_medialibrary_uploader( 'mpcth_otc_author_image', $author_image, null, '', 0, 'author_image', true ).
				'</div>'.
				'<div class="mpcth-of-explain">' . __('Specify author image.', 'mpcth') . '</div>'.
			'</div>'.
		'</div>';

	$box_output .= '</div>';

	echo $box_output;
}

function save_testimonial_meta_box($post_id) {
	// global $post;
	$id = isset($_POST['post_ID']) ? $_POST['post_ID'] : $post_id;

	// Bail if we're doing an auto save  
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return; 

	// if our nonce isn't there, or we can't verify it, bail 
	if(!isset($_POST['testimonial_meta_box_nonce']) || !wp_verify_nonce($_POST['testimonial_meta_box_nonce'], 'mpc_testimonial_meta_box_nonce')) return; 

	// if our current user can't edit this post, bail  
	if(!current_user_can('edit_post', $id)) return;
 
	// now we can actually save the data  
	$allowed = array(
		'a' => array( // on allow a tags  
			'href' => array() // and those anchors can only have href attribute  
		)
	);

	if(isset($_POST['company']))
		update_post_meta($id, 'company', wp_kses($_POST['company'], $allowed));

	if(isset($_POST['author_url']))
		update_post_meta($id, 'author_url', wp_kses($_POST['author_url'], $allowed));

	if(isset($_POST['author_image']))
		update_post_meta($id, 'author_image', wp_kses($_POST['author_image'], $allowed));
}

add_action('save_post', 'save_testimonial_meta_box');