<?php

/* ---------------------------------------------------------------- */
/*	Team Settings
/* ---------------------------------------------------------------- */

function team_meta_box($post) {
	wp_nonce_field('mpc_team_meta_box_nonce', 'team_meta_box_nonce'); 
	
	$values = get_post_custom($post->ID);
	
	?>
		<script>
			jQuery(document).ready(function($) {
				$('#formatdiv').remove();
			});
		</script>
	<?php
	
	if(isset($values['social_twitter'] ))
		$social_twitter = esc_attr($values['social_twitter'][0]);
	else 
		$social_twitter = "";

	if(isset($values['social_facebook'] ))
		$social_facebook = esc_attr($values['social_facebook'][0]);
	else 
		$social_facebook = "";

	if(isset($values['social_mail'] ))
		$social_mail = esc_attr($values['social_mail'][0]);
	else 
		$social_mail = "";

	if(isset($values['skills'][0]))
		$values['skills'] = unserialize($values['skills'][0]);

	$skills_values = array();
	$skills = get_categories(array(
		'taxonomy' => 'mpcth_team_skill',
		'hide_empty' => false
	));
	
	foreach($skills as $skill) {
		if(isset($values['skills'][$skill->slug]))
			$skills_values[$skill->slug] = esc_attr($values['skills'][$skill->slug]);
		else 
			$skills_values[$skill->slug] = "0%";
	}

	/* HTML Markup */
	$box_output = '<div class="mpcth-of">';

	/* Socials Settings */
	$box_output .=
	'<div class="mpcth-of-accordion-heading"><h3>' . __('Socials', 'mpcth') . '</h3><span class="mpcth-of-circle"><span></span></span></div>'.
		'<div class="mpcth-of-accordion-content">'.
			'<div class="mpcth-of-section mpcth-of-section-text">'.
				'<h4>' . __('Twitter', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_social_twitter" name="social_twitter" class="of-input" value="'.$social_twitter.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify Twitter URL.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-text">'.
				'<h4>' . __('Facebook', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_social_facebook" name="social_facebook" class="of-input" value="'.$social_facebook.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify Facebook URL.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-text">'.
				'<h4>' . __('Mail', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_social_mail" name="social_mail" class="of-input" value="'.$social_mail.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify Mail URL.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
		'</div>';

	/* Skills Settings */
	$box_output .= '<div class="mpcth-of-accordion-heading mpcth-of-ac-open"><h3>' . __('Skills', 'mpcth') . '</h3><span class="mpcth-of-circle"><span></span></span></div>';
		$box_output .= '<div class="mpcth-of-accordion-content">';

		foreach($skills as $skill) {
			$box_output .= 
			'<div class="mpcth-of-section mpcth-of-section-slider mpcth-of-section-skill-' . $skill->term_id . '">'.
				'<h4>' . $skill->name . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<div class="mpcth-of-slider mpcth-of-skills" data-min="0" data-max="100"></div><input id="skills-'.$skill->slug.'" name="skills-'.$skill->slug.'" value="'.$skills_values[$skill->slug].'" style="visibility:hidden;" /><label>'.$skills_values[$skill->slug].'</label>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify score of this skill.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>';
		}

		$box_output .= '</div>';
	$box_output .= '</div>';

	echo $box_output;
}

function save_team_meta_box($post_id) {
	// global $post;
	$id = isset($_POST['post_ID']) ? $_POST['post_ID'] : $post_id;

	// Bail if we're doing an auto save  
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return; 

	// if our nonce isn't there, or we can't verify it, bail 
	if(!isset($_POST['team_meta_box_nonce']) || !wp_verify_nonce($_POST['team_meta_box_nonce'], 'mpc_team_meta_box_nonce')) return; 

	// if our current user can't edit this post, bail  
	if(!current_user_can('edit_post', $id)) return;
 
	// now we can actually save the data  
	$allowed = array(
		'a' => array( // on allow a tags  
			'href' => array() // and those anchors can only have href attribute  
		)
	);

	if(isset($_POST['social_twitter']))
		update_post_meta($id, 'social_twitter', wp_kses($_POST['social_twitter'], $allowed));

	if(isset($_POST['social_facebook']))
		update_post_meta($id, 'social_facebook', wp_kses($_POST['social_facebook'], $allowed));

	if(isset($_POST['social_mail']))
		update_post_meta($id, 'social_mail', wp_kses($_POST['social_mail'], $allowed));

	$skills_values = array();
	$skills = get_categories(array(
		'taxonomy' => 'mpcth_team_skill',
		'hide_empty' => false
	));

	foreach($skills as $skill) {
		if(isset($_POST['skills-'.$skill->slug])) 
			$skills_values[$skill->slug] = $_POST['skills-'.$skill->slug];
		else 
			$skills_values[$skill->slug] = '0%';
	}

	update_post_meta($id, 'skills', $skills_values);
}

add_action('save_post', 'save_team_meta_box');
