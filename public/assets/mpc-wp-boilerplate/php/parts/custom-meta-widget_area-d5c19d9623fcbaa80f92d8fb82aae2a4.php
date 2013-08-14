<?php

/* ---------------------------------------------------------------- */
/*	Widget Area Settings
/* ---------------------------------------------------------------- */

function widget_area_meta_box($post) {
	wp_nonce_field('mpc_widget_area_meta_box_nonce', 'widget_area_meta_box_nonce'); 
	
	$values = get_post_custom($post->ID);
	
	?>
		<script>
			jQuery(document).ready(function($) {
				$('#formatdiv').remove();
			});
		</script>
	<?php
	
	if(isset($values['widget_area_type'])) {
		$widget_area_type = esc_attr($values['widget_area_type'][0]);
	} else { 
		$widget_area_type = "sidebar";
	}

	if(isset($values['widget_area_columns'])) {
		$widget_area_columns = esc_attr($values['widget_area_columns'][0]);
	} else { 
		$widget_area_columns = "3";
	}

	/* HTML Markup */
	$box_output = '<div class="mpcth-of">';

	/* Socials Settings */
	$box_output .=
			'<div class="mpcth-of-section mpcth-of-section-select">'.
				'<h4>' . __('Type', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<select id="mpcth_otc_widget_area_type" name="widget_area_type" class="of-input">'.
							'<option value="sidebar"' .(($widget_area_type == 'sidebar') ? 'selected="selected"' : ''). '>Sidebar</option>'.
							'<option value="footer"' .(($widget_area_type == 'footer') ? 'selected="selected"' : ''). '>Footer</option>'.
							// '<option value="top_area"' .(($widget_area_type == 'top_area') ? 'selected="selected"' : ''). '>Top Area</option>'.
						'</select>'.
						'<span class="mpcth-of-select-mockup"><span class="mpcth-of-select-border-right"><span></span></span><span class="mpcth-of-select-border-left"></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify number of columns in your custom footer.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-select">'.
				'<h4>' . __('Number of Columns', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<select id="mpcth_otc_widget_area_columns" name="widget_area_columns" class="of-input">'.
							'<option value="1"' .(($widget_area_columns == '1') ? 'selected="selected"' : ''). '>1</option>'.
							'<option value="2"' .(($widget_area_columns == '2') ? 'selected="selected"' : ''). '>2</option>'.
							'<option value="3"' .(($widget_area_columns == '3') ? 'selected="selected"' : ''). '>3</option>'.
							'<option value="4"' .(($widget_area_columns == '4') ? 'selected="selected"' : ''). '>4</option>'.
							'<option value="5"' .(($widget_area_columns == '5') ? 'selected="selected"' : ''). '>5</option>'.
						'</select>'.
						'<span class="mpcth-of-select-mockup"><span class="mpcth-of-select-border-right"><span></span></span><span class="mpcth-of-select-border-left"></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify number of columns in your custom footer.', 'mpcth') . '</div>'.
				'</div>'.
			// '</div>'.
		'</div>';

	$box_output .= '</div>';

	echo $box_output;
}

function save_widget_area_meta_box($post_id) {
	// global $post;
	$id = isset($_POST['post_ID']) ? $_POST['post_ID'] : $post_id;

	// Bail if we're doing an auto save  
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return; 

	// if our nonce isn't there, or we can't verify it, bail 
	if(!isset($_POST['widget_area_meta_box_nonce']) || !wp_verify_nonce($_POST['widget_area_meta_box_nonce'], 'mpc_widget_area_meta_box_nonce')) return; 

	// if our current user can't edit this post, bail  
	if(!current_user_can('edit_post', $id)) return;
 
	// now we can actually save the data  
	$allowed = array(
		'a' => array( // on allow a tags  
			'href' => array() // and those anchors can only have href attribute  
		)
	);

	if(isset($_POST['widget_area_type']))
		update_post_meta($id, 'widget_area_type', wp_kses($_POST['widget_area_type'], $allowed));

	if(isset($_POST['widget_area_columns']))
		update_post_meta($id, 'widget_area_columns', wp_kses($_POST['widget_area_columns'], $allowed));
}

add_action('save_post', 'save_widget_area_meta_box');