<?php

/* ---------------------------------------------------------------- */
/*	Showreel Settings
/* ---------------------------------------------------------------- */

function showreel_meta_box($post) {
	wp_nonce_field('mpc_showreel_meta_box_nonce', 'showreel_meta_box_nonce'); 
	
	$values = get_post_custom($post->ID);
	
	/* Background Settings */
	if(isset($values['background_type']))
		$background_type = esc_attr($values['background_type'][0]);
	else
		$background_type = "default";

	if(isset($values['background_embed_source']))
		$background_embed_source = esc_attr($values['background_embed_source'][0]);
	else 
		$background_embed_source = "";

	if(isset($values['background_image_source']))
		$background_image_source = esc_attr($values['background_image_source'][0]);
	else 
		$background_image_source = "";

	if(isset($values['gallery_images_val'] ))
		$gallery_images_val = esc_attr($values['gallery_images_val'][0]);
	else 
		$gallery_images_val = "";

	if($gallery_images_val != "") {
		$ids = explode(',', $gallery_images_val);

		$gallery_images = '';

		foreach ($ids as $id) {
			$gallery_images .= wp_get_attachment_image($id, 'thumbnail', false, array('class' => "mpcth-gallery-image"));
		}
	} else {
		$gallery_images = "";
	}


	/* HTML Markup */
	$box_output = '<div class="mpcth-of">';

	/* Socials Settings */
	$box_output .=
		'<div class="mpcth-of-section mpcth-of-section-select">'.
			'<h4>' . __('Background Type', 'mpcth') . '</h4>'.
			'<div class="mpcth-of-option">'.
				'<div class="mpcth-of-controls">'.
					'<select id="mpcth_otc_background_type" name="background_type" class="of-input">'.
						'<option value="image"' .(($background_type == 'image') ? 'selected="selected"' : ''). '>' . __('Image', 'mpcth') . '</option>'.
						'<option value="gallery"' .(($background_type == 'gallery') ? 'selected="selected"' : ''). '>' . __('Gallery', 'mpcth') . '</option>'.
						'<option value="embed"' .(($background_type == 'embed') ? 'selected="selected"' : ''). '>' . __('Embed (Vimeo/Youtube)', 'mpcth') . '</option>'.
					'</select>'.
					'<span class="mpcth-of-select-mockup"><span class="mpcth-of-select-border-right"><span></span></span><span class="mpcth-of-select-border-left"></span></span>'.
				'</div>'.
				'<div class="mpcth-of-explain">' . __('Choose pagination type for your blog page.', 'mpcth') . '</div>'.
			'</div>'.
		'</div>'.
		'<div class="mpcth-of-section mpcth-of-section-upload mpcth-showreel-type-image">'.
			'<h4>' . __('Background Image', 'mpcth') . '</h4>'.
			'<div class="mpcth-of-option">'.
				'<div class="mpcth-of-controls">'.
					mpcth_optionsframework_medialibrary_uploader( 'mpcth_otc_background_image_source', $background_image_source, null, '', 0, 'background_image_source', true ).
				'</div>'.
				'<div class="mpcth-of-explain">' . __('Specify background source. You can paste an image, Youtube or Vimeo URL.', 'mpcth') . '</div>'.
			'</div>'.
		'</div>'.
		'<div class="mpcth-of-section mpcth-of-section-upload mpcth-post-format-gallery mpcth-showreel-type-gallery">'.
			'<h4>' . __('Background Gallery', 'mpcth') . '</h4>'.
			'<div class="mpcth-of-option">'.
				'<div class="mpcth-of-controls">'.
					'<input id="mpcth_otc_gallery_images_val" class="mpcth-gallery-images-val of-input upload" type="text" name="gallery_images_val" value="'.$gallery_images_val.'">'.
					'<input id="mpcth_otc_gallery_images_button" class="upload_gallery_button button mpcth-of-grey-button" type="button" value="'.($gallery_images_val == '' ? __('Select', 'mpcth') : __('Edit', 'mpcth')).'">'.
					'<div id="mpcth_otc_gallery_images_wrap" class="mpcth-gallery-images-wrap">'.$gallery_images.'</div>'.
				'</div>'.
				'<div class="mpcth-of-explain">' . __('Paste tweet embed code for more information please see help file.', 'mpcth') . '</div>'.
			'</div>'.
		'</div>'.
		'<div class="mpcth-of-section mpcth-of-section-text mpcth-showreel-type-embed">'.
			'<h4>' . __('Background Embed', 'mpcth') . '</h4>'.
			'<div class="mpcth-of-option">'.
				'<div class="mpcth-of-controls">'.
					'<input type="text" id="mpcth_otc_background_embed_source" name="background_embed_source" class="of-input" value="'.$background_embed_source.'">'.
				'</div>'.
				'<div class="mpcth-of-explain">' . __('Specify background source. You can paste an image, Youtube or Vimeo URL.', 'mpcth') . '</div>'.
			'</div>'.
		'</div>';

	$box_output .= '</div>';

	echo $box_output;
}

function save_showreel_meta_box($post_id) {
	// global $post;
	$id = isset($_POST['post_ID']) ? $_POST['post_ID'] : $post_id;

	// Bail if we're doing an auto save  
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return; 

	// if our nonce isn't there, or we can't verify it, bail 
	if(!isset($_POST['showreel_meta_box_nonce']) || !wp_verify_nonce($_POST['showreel_meta_box_nonce'], 'mpc_showreel_meta_box_nonce')) return; 

	// if our current user can't edit this post, bail  
	if(!current_user_can('edit_post', $id)) return;
 
	// now we can actually save the data  
	$allowed = array(
		'a' => array( // on allow a tags  
			'href' => array() // and those anchors can only have href attribute  
		)
	);

	if(isset($_POST['background_type']))
		update_post_meta($id, 'background_type', wp_kses($_POST['background_type'], $allowed));

	if(isset($_POST['background_embed_source']))
		update_post_meta($id, 'background_embed_source', wp_kses($_POST['background_embed_source'], $allowed));

	if(isset($_POST['background_image_source']))
		update_post_meta($id, 'background_image_source', wp_kses($_POST['background_image_source'], $allowed));

	if(isset($_POST['gallery_images_val']))
		update_post_meta($id, 'gallery_images_val', wp_kses($_POST['gallery_images_val'], $allowed));

}

add_action('save_post', 'save_showreel_meta_box');
