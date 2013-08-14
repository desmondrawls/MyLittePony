<?php

/* ---------------------------------------------------------------- */
/*	Home Settings
/* ---------------------------------------------------------------- */

function home_meta_box($post) {
	wp_nonce_field('mpc_home_meta_box_nonce', 'home_meta_box_nonce'); 
	
	$values = get_post_custom($post->ID);

	if(isset($values['gallery_images_val_h'] ))
		$gallery_images_val = esc_attr($values['gallery_images_val_h'][0]);
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

	if(isset($values['header_type_h']))
		$header_type = esc_attr($values['header_type_h'][0]);
	else
		$header_type = "none";

	if(isset($values['header_embed_source_h']))
		$header_embed_source = esc_attr($values['header_embed_source_h'][0]);
	else 
		$header_embed_source = "";

	if(isset($values['header_embed_height_h']))
		$header_embed_height = esc_attr($values['header_embed_height_h'][0]);
	else 
		$header_embed_height = "100";

	if(isset($values['header_image_source_h']))
		$header_image_source = esc_attr($values['header_image_source_h'][0]);
	else 
		$header_image_source = "";

	if(isset($values['header_shortcode_h']))
		$header_shortcode = esc_attr($values['header_shortcode_h'][0]);
	else 
		$header_shortcode = "";

	$box_output =
		'<div class="mpcth-of">'.
			'<div class="mpcth-of-accordion-content">'.
				'<div class="mpcth-of-section mpcth-of-section-select">'.
					'<h4>' . __('Header Type', 'mpcth') . '</h4>'.
					'<div class="mpcth-of-option">'.
						'<div class="mpcth-of-controls">'.
							'<select id="mpcth_otc_header_type_h" name="header_type_h" class="of-input mpcth-home-header-select">'.
								'<option value="none"' .(($header_type == 'none') ? 'selected="selected"' : ''). '>' . __('None', 'mpcth') . '</option>'.
								'<option value="image"' .(($header_type == 'image') ? 'selected="selected"' : ''). '>' . __('Image', 'mpcth') . '</option>'.
								'<option value="gallery"' .(($header_type == 'gallery') ? 'selected="selected"' : ''). '>' . __('Gallery', 'mpcth') . '</option>'.
								'<option value="embed"' .(($header_type == 'embed') ? 'selected="selected"' : ''). '>' . __('Embed (Vimeo, Youtube, Maps)', 'mpcth') . '</option>'.
								'<option value="shortcode"' .(($header_type == 'shortcode') ? 'selected="selected"' : ''). '>' . __('Shortcode', 'mpcth') . '</option>'.
							'</select>'.
							'<span class="mpcth-of-select-mockup"><span class="mpcth-of-select-border-right"><span></span></span><span class="mpcth-of-select-border-left"></span></span>'.
						'</div>'.
						'<div class="mpcth-of-explain">' . __('Choose header type for your page.', 'mpcth') . '</div>'.
					'</div>'.
				'</div>'.
				'<div class="mpcth-of-section mpcth-of-section-upload mpcth-home-header-image">'.
					'<h4>' . __('Image Source', 'mpcth') . '</h4>'.
					'<div class="mpcth-of-option">'.
						'<div class="mpcth-of-controls">'.
							mpcth_optionsframework_medialibrary_uploader( 'mpcth_otc_header_image_source_h', $header_image_source, null, '', 0, 'header_image_source_h', true ).
						'</div>'.
						'<div class="mpcth-of-explain">' . __('Specify header image source.', 'mpcth') . '</div>'.
					'</div>'.
				'</div>'.
				'<div class="mpcth-of-section mpcth-of-section-upload mpcth-post-format-gallery mpcth-home-header-gallery">'.
					'<h4>' . __('Gallery Images', 'mpcth') . '</h4>'.
					'<div class="mpcth-of-option">'.
						'<div class="mpcth-of-controls">'.
							'<input id="mpcth_otc_gallery_images_val_h" class="mpcth-gallery-images-val of-input upload" type="text" name="gallery_images_val_h" value="'.$gallery_images_val.'">'.
							'<input id="mpcth_otc_gallery_images_button_h" class="upload_gallery_button button mpcth-of-grey-button" type="button" value="'.($gallery_images_val == '' ? __('Select', 'mpcth') : __('Edit', 'mpcth')).'">'.
							'<div id="mpcth_otc_gallery_images_wrap" class="mpcth-gallery-images-wrap">'.$gallery_images.'</div>'.
						'</div>'.
						'<div class="mpcth-of-explain">' . __('Specify header gallery images.', 'mpcth') . '</div>'.
					'</div>'.
				'</div>'.
				'<div class="mpcth-of-section mpcth-of-section-text mpcth-home-header-embed">'.
					'<h4>' . __('Embed Source', 'mpcth') . '</h4>'.
					'<div class="mpcth-of-option">'.
						'<div class="mpcth-of-controls">'.
							'<input type="text" id="mpcth_otc_header_embed_source_h" name="header_embed_source_h" class="of-input" value="'.$header_embed_source.'">'.
						'</div>'.
						'<div class="mpcth-of-explain">' . __('Specify header embed source. You can paste Maps, Youtube or Vimeo embed URL.', 'mpcth') . '</div>'.
					'</div>'.
				'</div>'.
				'<div class="mpcth-of-section mpcth-of-section-slider mpcth-home-header-embed">'.
					'<h4>' . __('Embed Height', 'mpcth') . '</h4>'.
					'<div class="mpcth-of-option">'.
						'<div class="mpcth-of-controls">'.
							'<div class="mpcth-of-slider" data-min="100" data-max="1000"></div><input id="header_embed_height_h" name="header_embed_height_h" value="'.$header_embed_height.'" style="visibility:hidden;" /><label>'.$header_embed_height.'px</label>'.
						'</div>'.
						'<div class="mpcth-of-explain">' . __('Specify header embed height..', 'mpcth') . '</div>'.
					'</div>'.
				'</div>'.
				'<div class="mpcth-of-section mpcth-of-section-text mpcth-home-header-shortcode">'.
					'<h4>' . __('Shortcode', 'mpcth') . '</h4>'.
					'<div class="mpcth-of-option">'.
						'<div class="mpcth-of-controls">'.
							'<input type="text" id="mpcth_otc_header_shortcode_h" name="header_shortcode_h" class="of-input" value="'.$header_shortcode.'">'.
						'</div>'.
						'<div class="mpcth-of-explain">' . __('Specify header shortcode.', 'mpcth') . '</div>'.
					'</div>'.
				'</div>'.
			'</div>'.
		'</div>';

	echo $box_output;
}

function save_home_meta_box($post_id) {
	global $post;

	$id = isset($_POST['post_ID']) ? $_POST['post_ID'] : $post_id;

	// Bail if we're doing an auto save  
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return; 

	// if our nonce isn't there, or we can't verify it, bail 
	if(!isset($_POST['home_meta_box_nonce']) || !wp_verify_nonce($_POST['home_meta_box_nonce'], 'mpc_home_meta_box_nonce')) return; 

	// if our current user can't edit this post, bail  
	if(!current_user_can('edit_post', $post->ID)) return;
 
	// now we can actually save the data  
	$allowed = array(
		'a' => array( // on allow a tags  
			'href' => array() // and those anchors can only have href attribute  
		)
	);

	if(isset($_POST['gallery_images_val_h']))
		update_post_meta($id, 'gallery_images_val_h', wp_kses($_POST['gallery_images_val_h'], $allowed));

	if(isset($_POST['header_type_h']))
		update_post_meta($id, 'header_type_h', wp_kses($_POST['header_type_h'], $allowed));

	if(isset($_POST['header_image_source_h']))
		update_post_meta($id, 'header_image_source_h', wp_kses($_POST['header_image_source_h'], $allowed));

	if(isset($_POST['header_shortcode_h']))
		update_post_meta($id, 'header_shortcode_h', wp_kses($_POST['header_shortcode_h'], $allowed));

	if(isset($_POST['header_embed_source_h']))
		update_post_meta($id, 'header_embed_source_h', wp_kses($_POST['header_embed_source_h'], $allowed));

	if(isset($_POST['header_embed_height_h'])) 
		$header_embed_height = (int)$_POST['header_embed_height_h'];
	else 
		$header_embed_height = '100';
		
	update_post_meta($id, 'header_embed_height_h', $header_embed_height);
}
add_action('save_post', 'save_home_meta_box');
