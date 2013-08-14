<?php

/**
 * @package WordPress
 * @subpackage MPC WP Boilerplate
 * @since 1.0
 *
 * 1. Quote
 * 2. Highlight
 * 3. List
 * 4. Fancybox
 * 5. Tooltip
 * 6. Drop Caps
 * 7. Buttons
 * 8. Contact Form
 * 9. Team Member
 * 10. Testimonial
 * 11. Icon Block
 * 12. Client
 * 13. Tagline Box
 * 14. Client Slider
 * 15. Recent Posts
 * 16. Related Posts
 * 17. Recent Portfolio
 * 18. Share Count
 * 19. Author
 * 20. Icon Divider
 * 21. Flipbook
 *
 */

/* ---------------------------------------------------------------- */
/* Global
/* ---------------------------------------------------------------- */

$add_css_animation = array(
	"type" => "dropdown",
	"heading" => __("CSS Animation", "mpcth"),
	"param_name" => "css_animation",
	"admin_label" => true,
	"value" => array(__("No", "mpcth") => '', __("Top to bottom", "mpcth") => "top-to-bottom", __("Bottom to top", "mpcth") => "bottom-to-top", __("Left to right", "mpcth") => "left-to-right", __("Right to left", "mpcth") => "right-to-left", __("Appear from center", "mpcth") => "appear"),
	"description" => __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "mpcth")
);

function add_css_animation($value) {
	$class = '';
	if($value != '') 
		$class = ' wpb_animate_when_almost_visible wpb_' . $value;
	return $class;
}

/* ---------------------------------------------------------------- */
/* 1. Quote
/* ---------------------------------------------------------------- */

function mpcth_quote_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'background' => '',
		'color' => ''
	), $atts));
	
	$return = '<p class="mpcth-sc-quote" style="background: ' . $background . '; color: ' . $color . ';"><span class="mpcth-sc-quote-mark mpcth-sc-icon-quote"></span>' . $content . '</p>';

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_quote', 'mpcth_quote_shortcode');

/* ---------------------------------------------------------------- */
/* 2. Highlight
/* ---------------------------------------------------------------- */

function mpcth_highlight_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'background' => '',
		'color' => ''
	), $atts));
	
	$return = '<span class="mpcth-sc-highlight" style="background: ' . $background . '; color: ' . $color . ';">' . $content . '</span>';

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_highlight', 'mpcth_highlight_shortcode');

/* ---------------------------------------------------------------- */
/* 3. List
/* ---------------------------------------------------------------- */

function mpcth_list_shortcode($atts, $content = null) {
	$GLOBALS['item_count'] = 0;
	$GLOBALS['items'] = '';

	do_shortcode($content);
	
	extract(shortcode_atts(array(), $atts,$content));

	$return = '<ul class="mpcth-sc-list">';

	if(is_array($GLOBALS['items'])) {
		foreach($GLOBALS['items'] as $item) {
			$return .= '<li class="mpcth-sc-list-item" style="color: ' . $item['color'] . '"><span class="mpcth-sc-icon-' . $item['type'] . '" style="color: ' . $item['icon_color'] . '"></span>' . $item['content'] . '</li>';
		}	
	}
	
	$return .= '</ul>';

	$return = parse_shortcode_content($return);
	return $return;
} 
add_shortcode('mpc_list', 'mpcth_list_shortcode');

function mpcth_list_item_shortcode($atts, $content) {
	extract(shortcode_atts(array (
		'type' => '',
		'color' => '',
		'icon_color' => ''
	), $atts));
	
	$index = $GLOBALS['item_count'];
	$GLOBALS['items'][$index] = array(
		'type' => sprintf($type, $GLOBALS['item_count']),
		'color' => sprintf($color, $GLOBALS['item_count']),
		'icon_color' => sprintf($icon_color, $GLOBALS['item_count']),
		'content' => $content
	);
	$GLOBALS['item_count']++;
}
add_shortcode('mpc_l_item', 'mpcth_list_item_shortcode');

/* ---------------------------------------------------------------- */
/* 4. Fancybox
/* ---------------------------------------------------------------- */

function mpcth_fancybox_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'src' => '',
		'caption' => ''
	), $atts));

	$type = '';
	$src_type = strtolower($src);
	
	$search = preg_match('/.(jpg|jpeg|gif|png|bmp)/', $src_type);
	if($search == 1) {
		$type = 'mpcth-image';
		$search = 0;
	}
	
	$search = preg_match('/.(vimeo)./', $src_type);
	if($search == 1) {
		$type = 'mpcth-vimeo-video';
		$search = 0;
	}
	
	$search = preg_match('/.(youtube)/', $src_type);
	if($search == 1) {
		$type = 'mpcth-youtube-video';
		$search = 0;
	}
	
	$search = preg_match('/.(swf)/', $src_type);
	if($search == 1) {
		$type = 'mpcth-swf';
		$search = 0;
	}
	
	if($type == '') {
		$type = 'mpcth-iframe'; 
	}

	$return = '<a class="mpcth-sc-fancybox ' . $type . '" href="' . $src . '" title="' . $caption . '">' . $content . '</a>';

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_fancybox', 'mpcth_fancybox_shortcode');

/* ---------------------------------------------------------------- */
/* 5. Tooltip
/* ---------------------------------------------------------------- */

function mpcth_tooltip_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'message' => ''
	), $atts));
	
	$return = '<span class="mpcth-sc-tooltip-wrap"><span class="mpcth-sc-tooltip">' . $message . '</span>' . $content . '</span>';

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_tooltip', 'mpcth_tooltip_shortcode');

/* ---------------------------------------------------------------- */
/* 6. Drop Caps
/* ---------------------------------------------------------------- */

function mpcth_dropcaps_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'background' => '',
		'color' => '',
		'size' => 'normal' 
	), $atts));
	
	$return = '<span class="mpcth-sc-dropcaps mpcth-sc-dropcaps-size-' . $size . '" style="background: ' . $background . '; color: ' . $color . ';">' . $content . '</span>';

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_dropcaps', 'mpcth_dropcaps_shortcode');

/* ---------------------------------------------------------------- */
/* 7. Buttons
/* ---------------------------------------------------------------- */

function mpcth_button_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'background' => '',
		'background_hover' => '',
		'color' => '',
		'color_hover' => '',
		'icon' => '',
		'size' => '',
		'text' => '',
		'url' => '',
		'id' => '',
		'css_animation' => ''
	), $atts));
	
	if($id == '') $id = mpcth_random_ID();

	$return = '<a href="' . $url . '" id="custom_button_' . $id . '" class="mpcth-sc-button mpcth-sc-button-size-' . $size . add_css_animation($css_animation) . '">';
		$return .= '<span class="mpcth-sc-button-icon mpcth-sc-icon-' . $icon . '"></span>';
		$return .= '<span class="mpcth-sc-button-text">' . $text . '</span>';
	$return .= '</a>';
	$return .= '<style>';
		$return .= '#custom_button_' . $id . ' { ';
			$return .= 'border-bottom-color: ' . mpcth_adjust_brightness($background, -20) . ' !important; ';
			$return .= 'background: ' . $background . ' !important; ';
			$return .= 'color: ' . $color . ' !important;';
		$return .= '}' . "\n";
		$return .= '#custom_button_' . $id . ':hover { ';
			$return .= 'border-bottom-color: ' . mpcth_adjust_brightness($background_hover, -20) . ' !important; ';
			$return .= 'background: ' . $background_hover . ' !important; ';
			$return .= 'color: ' . $color_hover . ' !important;';
		$return .= '}';
	$return .= '</style>';

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_button', 'mpcth_button_shortcode');

if(function_exists('wpb_map'))
	wpb_map( array(
		'name' => __('Button', 'mpcth'),
		'base' => 'mpc_button',
		'class' => 'mpcth-vs-sc-block',
		'icon' => 'icon-wpb-button',
		'category' => __('Content', 'mpcth'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __('Text', 'mpcth'),
				'param_name' => 'text',
				'value' => 'Button',
				'admin_label' => true,
				'description' => __('Specify the button text.', 'mpcth')
			),
			array(
				'type' => 'textfield',
				'heading' => __('URL', 'mpcth'),
				'param_name' => 'url',
				'value' => '',
				'admin_label' => true,
				'description' => __('Specify the button URL.', 'mpcth')
			),
			array(
				'type' => 'dropdown',
				'heading' => __('Icon', 'mpcth'),
				'param_name' => 'icon',
				'value' => mpcth_get_icons(),
				'admin_label' => true,
				'description' => __('Select button icon.', 'mpcth')
			),
			array(
				'type' => 'dropdown',
				'heading' => __('Size', 'mpcth'),
				'param_name' => 'size',
				'value' => array('Normal' => 'normal', 'Big' => 'big', 'Small' => 'small', 'Mini' => 'mini'),
				'admin_label' => true,
				'description' => __('Select button size.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Text Color', 'mpcth'),
				'param_name' => 'color',
				'value' => '#505050',
				'admin_label' => true,
				'description' => __('Select button text color.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Text Hover Color', 'mpcth'),
				'param_name' => 'color_hover',
				'value' => '#ffffff',
				'admin_label' => true,
				'description' => __('Select button text color after hover.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Background Color', 'mpcth'),
				'param_name' => 'background',
				'value' => '#f5f5f5',
				'admin_label' => true,
				'description' => __('Select button background color.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Background Hover Color', 'mpcth'),
				'param_name' => 'background_hover',
				'value' => '#48c78b',
				'admin_label' => true,
				'description' => __('Select button background color after hover.', 'mpcth')
			),
			array(
				'type' => 'textfield',
				'heading' => __('ID', 'mpcth'),
				'param_name' => 'id',
				'value' => '',
				'admin_label' => true,
				'description' => __('Specify the button ID (Leave empty to generate random ID).', 'mpcth')
			),
			$add_css_animation
		)
	) );

/* ---------------------------------------------------------------- */
/* 8. Contact Form
/* ---------------------------------------------------------------- */

function mpcth_contact_shortcode($atts, $content = null) {
	global $mpcth_options;

	extract(shortcode_atts(array(
		'css_animation' => ''
	), $atts));

	$email_label	= __('Email', 'mpcth');
	$message_label	= __('Message', 'mpcth');
	$author_label	= __('Author', 'mpcth');
	$send_label		= __('Send Message', 'mpcth');

	$email_required = get_option('require_name_email');
	if($email_required == '1')
		$email_label .= '*';

	wp_enqueue_script('mpcth-contact-form-js', MPC_THEME_ROOT.'/mpc-wp-boilerplate/js/mpcth-contact-form.js', array('jquery'), '1.0');
	wp_localize_script('mpcth-contact-form-js', 'cfdata', array(
		'email_label'		=> $email_label,
		'message_label'		=> $message_label,
		'author_label'		=> $author_label,
		'send_label'		=> $send_label,
		'target_email'		=> $mpcth_options['mpcth_contact_email'],
		'email_required'	=> $email_required,
		'empty_input_msg'	=> __('Please input value!', 'mpcth'),
		'email_error_msg'	=> __('Please provide valid author', 'mpcth'),
		'message_error_msg'	=> __('Please provide valid email', 'mpcth'),
		'author_error_msg'	=> __('Your message must be at least 5 characters long', 'mpcth'),
		'from_text'			=> __('My blog - ', 'mpcth').get_bloginfo('title'),
		'subject_text'		=> __('Message from ', 'mpcth'),
		'header_text'		=> __('From: ', 'mpcth'),
		'body_name_text'	=> __('Name: ', 'mpcth'),
		'body_email_text'	=> __('Email: ', 'mpcth'),
		'body_msg_text'		=> __('Message: ', 'mpcth'),
		'success_msg'		=> __('Email successfully send!', 'mpcth'),
		'error_msg'			=> __('There was an error. Please try again.', 'mpcth')
	) );

	$return = '';
	$return .=
		'<form action="'.MPC_THEME_ROOT.'/mpc-wp-boilerplate/php/mpcth-contact-form.php'.'" id="mpcth_contact_form" class="' . add_css_animation($css_animation) . '" method="post">'.
			'<p class="mpcth-cf-form-author">'.
				'<input type="text" name="author_cf" id="author_cf" value="'.$author_label.'*'.'" class="requiredField comments_form author_cf" tabindex="1" onfocus="if(this.value==\''.$author_label.'*\') this.value=\'\';" onblur="if(this.value==\'\')this.value=\''.$author_label.'*\';"/>'.
			'</p>'.
			'<p class="mpcth-cf-form-email">'.
				'<input type="text" name="email_cf" id="email_cf" value="'.$email_label.'" class="'.($email_required == '1' ? 'requiredField' : '').' comments_form email email_cf" tabindex="2" onfocus="if(this.value==\''.$email_label.'\') this.value=\'\';" onblur="if(this.value==\'\')this.value=\''.$email_label.'\';"/>'.
			'</p>'.
			'<p class="mpcth-cf-form-message">'.
				'<textarea name="message_cf" id="message_cf" rows="1" cols="1" class="requiredField comments_form text_f message_cf" tabindex="3" onfocus="if(this.value==\''.$message_label.'*\') this.value=\'\';" onblur="if(this.value==\'\')this.value=\''.$message_label.'*\';">'.$message_label.'*'.'</textarea>'.
			'</p>'.
			'<p class="mpcth-cf-buttons">'.
				'<input name="submit" type="submit" id="submit" tabindex="4" value="'.$send_label.'" class="mpcth-cf-send"/>'.
				'<input type="hidden" name="submitted" id="submitted" value="true" />'.
			'</p>'.
			'<p class="mpcth-cf-check">'.
				'<input type="text" name="checking" id="checking" class="checking" value="" style="display: none;"/>'.
			'</p>'.
			'<div class="clear"></div>'.
		'</form>'; 

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_contact_form', 'mpcth_contact_shortcode');

if(function_exists('wpb_map'))
	wpb_map( array(
		'name' => __('Contact Form', 'mpcth'),
		'base' => 'mpc_contact_form',
		'class' => 'mpcth-vs-sc-block',
		'icon' => 'icon-wpb-comments',
		'controls' => 'size_delete',
		'category' => __('Content', 'mpcth'),
		'params' => array(
			$add_css_animation
		)
	) );

/* ---------------------------------------------------------------- */
/* 9. Team Member
/* ---------------------------------------------------------------- */

function mpcth_get_team_ids() {
	$team_members = array();
	$query = new WP_Query( array( 'post_type' => 'team', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title' ) );
	while( $query->have_posts() ) {
		$query->the_post();

		$team_members[get_the_title()] = get_the_ID();
	}

	wp_reset_postdata();
	
	if(empty($team_members))
		$team_members['none'] = '';

	return $team_members;
}

function mpcth_team_member_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'id' => '',
		'skills_style' => 'bars',
		'main_background' => '',
		'text' => '',
		'background' => '',
		'value' => '',
		'css_animation' => ''
	), $atts));
	
	$member = get_post($id);
	$member_meta = get_post_custom($id);

	$skills = array();
	if(isset($member_meta) && isset($member_meta['skills']))
		$skills = unserialize($member_meta['skills'][0]);

	$member_skills = '';
	$member_skills = get_the_terms($id, 'mpcth_team_skill');
	if(!$member_skills) $member_skills = array();

	$roles = '';
	$roles = get_the_terms($id, 'mpcth_team_role');
	if(is_array($roles))
		$last_item = end($roles);
	if(isset($roles) && $roles != false){
		$roles_names = '';

		foreach($roles as $role) {
			$roles_names .= $role->name;

			if($role->slug != $last_item->slug)
				$roles_names .= ', ';
		}
	}

	$css_id = 'mpcth_sc_team_member_' . mpcth_random_ID(5);

	$return = '<div id="' . $css_id . '" class="mpcth-sc-team-member mpcth-sc-team-member-' . $skills_style . ' mpcth-waypoint-trigger' . add_css_animation($css_animation) . '">';
		$return .= '<div class="mpcth-sc-team-member-info">';
			$return .= '<header>';
				if(has_post_thumbnail($id)) {
					$return .= get_the_post_thumbnail($id, 'mpcth-post-thumbnails-col-1');
				}
				$return .= '<h4>';
					$return .= $member->post_title;
				$return .= '</h4>';
				$return .= '<p class="mpcth-sc-icon-vcard">';
					$return .= $roles_names;
				$return .= '</p>';
			$return .= '</header>';
			$return .= '<p>' . $member->post_content . '</p>';
		$return .= '</div>';
		$return .= '<h6 class="mpcth-sc-team-member-skills-info">' . __('Skills', 'mpcth') . '</h6>';
		$return .= '<div class="mpcth-sc-team-member-skills">';
			foreach($member_skills as $member_skill) {
				$return .= '<div class="mpcth-sc-team-member-skill">';
					$return .= '<div class="mpcth-sc-team-member-skill-data" data-name="' . $member_skill->name . '" data-value="' . $skills[$member_skill->slug] . '" data-color-text="' . $text . '" data-color-background="' . $background . '" data-color-value="' . $value . '"></div>';

				if($skills_style == 'bars') {
					$return .= '<div class="mpcth-sc-team-member-skill-value-wrap"><div class="mpcth-sc-team-member-skill-value" data-value="' . $skills[$member_skill->slug] . '"><div class="mpcth-sc-team-member-skill-value-number">0%</div></div></div>';
					$return .= '<div class="mpcth-sc-team-member-skill-name">' . $member_skill->name . '</div>';
				}

				$return .= '</div>';
			}
			$return .= '<div class="mpcth-clear-fix"></div>';
		$return .= '</div>';
		$return .= '<div class="mpcth-sc-team-member-social">';
			if(isset($member_meta) && isset($member_meta['social_twitter']) && $member_meta['social_twitter'][0] != '')
				$return .= '<a href="' . $member_meta['social_twitter'][0] . '" class="mpcth-sc-icon-twitter" target="_blank"></a>';
			if(isset($member_meta) && isset($member_meta['social_facebook']) && $member_meta['social_facebook'][0] != '')
				$return .= '<a href="' . $member_meta['social_facebook'][0] . '" class="mpcth-sc-icon-facebook-squared" target="_blank"></a>';
			if(isset($member_meta) && isset($member_meta['social_mail']) && $member_meta['social_mail'][0] != '')
				$return .= '<a href="mailto:' . $member_meta['social_mail'][0] . '" class="mpcth-sc-icon-mail" target="_blank"></a>';
		$return .= '</div>';
		$return .= '<div class="mpcth-sc-team-member-shadow"></div>';
	$return .= '</div>';
	$return .= '<style>';
		$return .= '#' . $css_id . '.mpcth-sc-team-member { background: ' . $main_background . '; }' . PHP_EOL;
		$return .= '#' . $css_id . '.mpcth-sc-team-member .mpcth-sc-team-member-skills .mpcth-sc-team-member-skill { color: ' . $text . '; }' . PHP_EOL;
		$return .= '#' . $css_id . '.mpcth-sc-team-member .mpcth-sc-team-member-skills .mpcth-sc-team-member-skill-value-wrap { background: ' . $background . '; }' . PHP_EOL;
		$return .= '#' . $css_id . '.mpcth-sc-team-member .mpcth-sc-team-member-skills .mpcth-sc-team-member-skill-value { background: ' . $value . '; }' . PHP_EOL;
	$return .= '</style>';

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_team_member', 'mpcth_team_member_shortcode');

if(function_exists('wpb_map'))
	wpb_map( array(
		'name' => __('Team Member', 'mpcth'),
		'base' => 'mpc_team_member',
		'class' => 'mpcth-vs-sc-block',
		'icon' => 'icon-wpb-team',
		'category' => __('Content', 'mpcth'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __('Name', 'mpcth'),
				'param_name' => 'id',
				'value' => mpcth_get_team_ids(),
				'admin_label' => true,
				'description' => __('Select Team Member to display.', 'mpcth')
			),
			array(
				'type' => 'dropdown',
				'heading' => __('Skills Style', 'mpcth'),
				'param_name' => 'skills_style',
				'value' => array('Bars' => 'bars', 'Circles' => 'circles'),
				'admin_label' => true,
				'description' => __('Select Skills display style position.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Background Color', 'mpcth'),
				'param_name' => 'main_background',
				'value' => '#f5f5f5',
				'admin_label' => true,
				'description' => __('Select background color.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Skill Text Color', 'mpcth'),
				'param_name' => 'text',
				'value' => '#666666',
				'admin_label' => true,
				'description' => __('Select skills text color.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Skill Background Color', 'mpcth'),
				'param_name' => 'background',
				'value' => '#ffffff',
				'admin_label' => true,
				'description' => __('Select skills background color.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Skill Value Color', 'mpcth'),
				'param_name' => 'value',
				'value' => '#48c78b',
				'admin_label' => true,
				'description' => __('Select skills value color.', 'mpcth')
			),
			$add_css_animation
		)
	) );

/* ---------------------------------------------------------------- */
/* 10. Testimonial
/* ---------------------------------------------------------------- */

function mpcth_get_testimonial_ids() {
	$testimonials = array();
	$query = new WP_Query( array( 'post_type' => 'testimonial', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title' ) );
	while( $query->have_posts() ) {
		$query->the_post();

		$testimonials[get_the_title()] = get_the_ID();
	}

	wp_reset_postdata();
	
	if(empty($testimonials))
		$testimonials['none'] = '';
	
	return $testimonials;
}

function mpcth_testimonial_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'id' => '',
		'type' => '',
		'css_animation' => ''
	), $atts));
	
	$testimonial = get_post($id);

	$company = get_post_meta($id, 'company', true);
	$author_url = get_post_meta($id, 'author_url', true);
	$author_image = get_post_meta($id, 'author_image', true);

	$icon = !empty($icon) ? $icon : MPC_THEME_ROOT . '/mpc-wp-boilerplate/images/icons/user.png';

	$return = '<div class="mpcth-sc-testimonial mpcth-sc-testimonial-style-' . $type . add_css_animation($css_animation) . '">';
		$return .= '<div class="mpcth-sc-testimonial-image-container">';
			if($type == 'image') {
			$return .= '<div class="mpcth-sc-testimonial-image-wrap">';
				$return .= '<div class="mpcth-sc-testimonial-image" style="background-image: url(\'' . $author_image . '\')"></div>';
			$return .= '</div>';
			}
		$return .= '</div>';
		$return .= '<div class="mpcth-sc-testimonial-wrap">';
			$return .= '<div class="mpcth-sc-testimonial-message">';
				$return .= $testimonial->post_content;
			$return .= '</div>';
			$return .= '<div class="mpcth-sc-testimonial-shadow"></div>';
			if($author_url != '') {
				$return .= '<a class="mpcth-sc-testimonial-info" href="' . $author_url . '">';
					$return .= '<span class="mpcth-sc-testimonial-name">' . $testimonial->post_title . '</span>';
					$return .= '<span class="mpcth-sc-testimonial-company">' . $company . '</span>';
				$return .= '</a>';
			} else {
				$return .= '<div class="mpcth-sc-testimonial-info">';
					$return .= '<span class="mpcth-sc-testimonial-name">' . $testimonial->post_title . '</span>';
					$return .= '<span class="mpcth-sc-testimonial-company">' . $company . '</span>';
				$return .= '</div>';
			}
		$return .= '</div>';
	$return .= '</div>';

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_testimonial', 'mpcth_testimonial_shortcode');

if(function_exists('wpb_map'))
	wpb_map( array(
		'name' => __('Testimonial', 'mpcth'),
		'base' => 'mpc_testimonial',
		'class' => 'mpcth-vs-sc-block',
		'icon' => 'icon-wpb-testimonial',
		'category' => __('Content', 'mpcth'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __('Author', 'mpcth'),
				'param_name' => 'id',
				'value' => mpcth_get_testimonial_ids(),
				'admin_label' => true,
				'description' => __('Select testimonial to display.', 'mpcth')
			),
			array(
				'type' => 'dropdown',
				'heading' => __('Display Type', 'mpcth'),
				'param_name' => 'type',
				'value' => array('Text' => 'text', 'Image + Text' => 'image'),
				'admin_label' => true,
				'description' => __('Select testimonial display type.', 'mpcth')
			),
			$add_css_animation
		),
		'js_view' => 'VcTestimonialView'
	) );

function mpcth_get_testimonial_subjects() {
	$subjects = array();
	$subjects['All'] = 'all';
	$list = get_terms('mpcth_testimonial_subject');
	foreach ($list as $subject) {
		$subjects[$subject->name] = $subject->term_id;
	}

	return $subjects;
}

function mpcth_testimonial_slider_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'subject' => '',
		'delay' => '',
		'type' => '',
		'css_animation' => ''
	), $atts));

	$testimonials = array();
	if($subject != 'all')
		$query = new WP_Query( array( 'post_type' => 'testimonial', 'posts_per_page' => -1, 'tax_query' => array( array( 'taxonomy' => 'mpcth_testimonial_subject', 'field' => 'id', 'terms' => $subject ) ) ) );
	else
		$query = new WP_Query( array( 'post_type' => 'testimonial', 'posts_per_page' => -1 ) );

	while( $query->have_posts() ) {
		$query->the_post();
		$testimonials[get_the_title()] = get_the_ID();
	}

	$delay = (int)$delay > 0 && (int)$delay < 600000 ? (int)$delay : 5000;

	$return = '<div class="mpcth-sc-testimonial-slider' . add_css_animation($css_animation) . '" data-delay="' . $delay . '">';

	foreach ($testimonials as $name => $id) {
		$return .= do_shortcode('[mpc_testimonial id="' . $id . '" type="' . $type . '"]');
	}

	$return .= '</div>';

	wp_reset_postdata();

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_testimonial_slider', 'mpcth_testimonial_slider_shortcode');

function mpcth_wpb_map_on_init() {
	$add_css_animation = array(
		"type" => "dropdown",
		"heading" => __("CSS Animation", "js_composer"),
		"param_name" => "css_animation",
		"admin_label" => true,
		"value" => array(__("No", "js_composer") => '', __("Top to bottom", "js_composer") => "top-to-bottom", __("Bottom to top", "js_composer") => "bottom-to-top", __("Left to right", "js_composer") => "left-to-right", __("Right to left", "js_composer") => "right-to-left", __("Appear from center", "js_composer") => "appear"),
		"description" => __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "js_composer")
	);

	if(function_exists('wpb_map')) {
		wpb_map( array(
			'name' => __('Testimonial Slider', 'mpcth'),
			'base' => 'mpc_testimonial_slider',
			'class' => 'mpcth-vs-sc-block',
			'icon' => 'icon-wpb-testimonial',
			'category' => __('Content', 'mpcth'),
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => __('Subject', 'mpcth'),
					'param_name' => 'subject',
					'value' => mpcth_get_testimonial_subjects(),
					'admin_label' => true,
					'description' => __('Select testimonial subject to display.', 'mpcth')
				),
				array(
					'type' => 'dropdown',
					'heading' => __('Display Type', 'mpcth'),
					'param_name' => 'type',
					'value' => array('Text' => 'text', 'Image + Text' => 'image'),
					'admin_label' => true,
					'description' => __('Select testimonial display type.', 'mpcth')
				),
				array(
					'type' => 'textfield',
					'heading' => __('Slide Delay', 'mpcth'),
					'param_name' => 'delay',
					'value' => 5000,
					'admin_label' => true,
					'description' => __('Set slider delay in miliseconde.', 'mpcth')
				),
				$add_css_animation
			)
		) );
	}
}
add_action('init', 'mpcth_wpb_map_on_init');

/* ---------------------------------------------------------------- */
/* 11. Icon Block
/* ---------------------------------------------------------------- */

function mpcth_get_icons() {
	global $mpcth_icons_array;
	
	return array_flip($mpcth_icons_array);
}

function mpcth_icon_block_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'url' => '',
		'icon' => '',
		'color' => '',
		'color_hover' => '',
		'background' => '',
		'background_hover' => '',
		'a_target' => 'block',
		'css_animation' => ''
	), $atts));
	
	$id = 'mpcth_sc_icon_block_' . mpcth_random_ID(5);

	$return = $a_target == 'block' ? '<a href="' . $url . '">' : '';
	$return .= '<div id="' .$id . '" class="mpcth-sc-icon-block-wrap mpcth-waypoint-trigger' . add_css_animation($css_animation) . '">';
		$return .= '<div class="mpcth-sc-icon-block-header-wrap">';
			$return .= '<div class="mpcth-sc-icon-block-header">';
				$return .= $a_target == 'icon' ? '<a href="' . $url . '">' : '';
					$return .= '<div class="mpcth-sc-icon-block-icon mpcth-sc-icon-' . $icon . '"></div>';
				$return .= $a_target == 'icon' ? '</a>' : '';
				$return .= !empty($title) ? '<h4 class="mpcth-sc-icon-block-title">' . $title . '</h4>' : '';
			$return .= '</div>';
		$return .= '</div>';
		$return .= '<div class="mpcth-sc-icon-block-content">';
			$return .= $content;
		$return .= '</div>';
	$return .= '</div>';
	$return .= $a_target == 'block' ? '</a>' : '';
	$return .= '<style>';
		$return .= '#' . $id . ' .mpcth-sc-icon-block-header * { color: ' . $color . '; }' . PHP_EOL;
		$return .= '#' . $id . ':hover .mpcth-sc-icon-block-header * { color: ' . $color_hover . '; }' . PHP_EOL;
		$return .= '#' . $id . ' .mpcth-sc-icon-block-header { background: ' . $background . '; }' . PHP_EOL;
		$return .= '#' . $id . ':hover .mpcth-sc-icon-block-header { background: ' . $background_hover . '; }' . PHP_EOL;
		$return .= '#' . $id . ' .mpcth-sc-icon-block-header-wrap { border-bottom-color: ' . mpcth_adjust_brightness($background, -20) . ' !important; }' . PHP_EOL;
		$return .= '#' . $id . ':hover .mpcth-sc-icon-block-header-wrap { border-bottom-color: ' .  mpcth_adjust_brightness($background_hover, -20) . ' !important; }' . PHP_EOL;
	$return .= '</style>';

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_icon_block', 'mpcth_icon_block_shortcode');

if(function_exists('wpb_map'))
	wpb_map( array(
		'name' => __('Icon Block', 'mpcth'),
		'base' => 'mpc_icon_block',
		'class' => 'mpcth-vs-sc-block',
		'icon' => 'icon-wpb-icon-block',
		'category' => __('Content', 'mpcth'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __('Title', 'mpcth'),
				'param_name' => 'title',
				'value' => '',
				'admin_label' => true,
				'description' => __('Specify the title of icon block.', 'mpcth')
			),
			array(
				'type' => 'textfield',
				'heading' => __('URL', 'mpcth'),
				'param_name' => 'url',
				'value' => '',
				'admin_label' => true,
				'description' => __('Specify the URL of icon block.', 'mpcth')
			),
			array(
				'type' => 'dropdown',
				'heading' => __('Icon', 'mpcth'),
				'param_name' => 'icon',
				'value' => mpcth_get_icons(),
				'admin_label' => true,
				'description' => __('Select icon to display.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Icon Color', 'mpcth'),
				'param_name' => 'color',
				'value' => '#666666',
				'admin_label' => true,
				'description' => __('Select icon color.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Icon Hover Color', 'mpcth'),
				'param_name' => 'color_hover',
				'value' => '#ffffff',
				'admin_label' => true,
				'description' => __('Select icon color after hover.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Background Color', 'mpcth'),
				'param_name' => 'background',
				'value' => '#f5f5f5',
				'admin_label' => true,
				'description' => __('Select icon background color.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Background Hover Color', 'mpcth'),
				'param_name' => 'background_hover',
				'value' => '#48c78b',
				'admin_label' => true,
				'description' => __('Select icon background color after hover.', 'mpcth')
			),
			array(
				'type' => 'dropdown',
				'heading' => __('Anchor Target', 'mpcth'),
				'param_name' => 'a_target',
				'value' => array('None' => 'none', 'Icon' => 'icon', 'Whole Block' => 'block'),
				'admin_label' => true,
				'description' => __('Select which part should work as an anchor.', 'mpcth')
			),
			array(
				'type' => 'textarea',
				'heading' => __('Content', 'mpcth'),
				'param_name' => 'content',
				'value' => '',
				'admin_label' => true
			),
			$add_css_animation
		),
		'js_view' => 'VcIconBlockView'
	) );

/* ---------------------------------------------------------------- */
/* 12. Client
/* ---------------------------------------------------------------- */

function mpcth_get_clients_ids() {
	$clients = array();
	$query = new WP_Query( array( 'post_type' => 'client', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title' ) );
	while( $query->have_posts() ) {
		$query->the_post();

		$clients[get_the_title()] = get_the_ID();
	}

	wp_reset_postdata();
	
	return $clients;
}

function mpcth_client_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'id' => '',
		'layout' => 'logo',
		'css_animation' => ''
	), $atts));
	
	$client = get_post($id);

	$logo = get_post_meta($id, 'logo', true);
	$client_url = get_post_meta($id, 'client_url', true);

	if($layout == 'title') {
		$display_title = true;
		$display_content = false;
	} elseif($layout == 'content') {
		$display_title = false;
		$display_content = true;
	} else {
		$display_title = true;
		$display_content = true;
	}

	$return = '<a class="mpcth-sc-client mpcth-waypoint-trigger' . add_css_animation($css_animation) . '" href="' . $client_url . '">';
		$return .= '<div class="mpcth-sc-client-logo-wrap">';
			$return .= '<img class="mpcth-sc-client-logo" src="' . $logo . '">';
		$return .= '</div>';
		$return .= '<div class="mpcth-sc-client-info">';
			if($display_title)
				$return .= '<h5 class="mpcth-sc-client-title">' . $client->post_title . '</h5>';
			if($display_content) {
				$return .= '<p class="mpcth-sc-client-content">';
					$return .= $client->post_content;
				$return .= '</p>';
			}
		$return .= '</div>';
	$return .= '</a>';

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_client', 'mpcth_client_shortcode');

if(function_exists('wpb_map'))
	wpb_map( array(
		'name' => __('Client', 'mpcth'),
		'base' => 'mpc_client',
		'class' => 'mpcth-vs-sc-block',
		'icon' => 'icon-wpb-client',
		'category' => __('Content', 'mpcth'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __('Client', 'mpcth'),
				'param_name' => 'id',
				'value' => mpcth_get_clients_ids(),
				'admin_label' => true,
				'description' => __('Select Client to display.', 'mpcth')
			),
			array(
				'type' => 'dropdown',
				'heading' => __('Layout Style', 'mpcth'),
				'param_name' => 'layout',
				'value' => array('Logo + Name + Content' => 'all', 'Logo + Title' => 'title', 'Logo + Content' => 'content'),
				'admin_label' => true,
				'description' => __('Select layout style.', 'mpcth')
			),
			$add_css_animation
		),
		'js_view' => 'VcClientView'
	) );

/* ---------------------------------------------------------------- */
/* 13. Tagline Box
/* ---------------------------------------------------------------- */

function mpcth_tagline_box_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'position' => '',
		'background' => '',
		'background_hover' => '',
		'border' => '',
		'border_hover' => '',
		'color' => '',
		'color_hover' => '',
		'icon' => '',
		'size' => '',
		'text' => '',
		'url' => '',
		'id' => '',
		'css_animation' => ''
	), $atts));
	
	$button = '[mpc_button text="' . $text . '" url="' . $url . '" icon="' . $icon . '" size="' . $size . '" color="' . $color . '" color_hover="' . $color_hover . '" background="' . $background . '" background_hover="' . $background_hover . '"]';
	
	$return = '<div class="mpcth-sc-tagline-box mpcth-sc-tagline-box-button-position-' . $position . ' mpcth-waypoint-trigger' . add_css_animation($css_animation) . '">';
		$return .= $position == 'top' || $position == 'left' ? '<div class="mpcth-sc-tagline-box-button">' . $button . '</div>' : '';
		$return .= '<div class="mpcth-sc-tagline-box-info">';
			$return .= '<h5 class="mpcth-sc-tagline-box-title">' . $title . '</h5>';
			$return .= '<div class="mpcth-sc-tagline-box-content">';
				$return .= $content;
			$return .= '</div>';
		$return .= '</div>';
		$return .= $position == 'bottom' || $position == 'right' ? '<div class="mpcth-sc-tagline-box-button">' . $button . '</div>' : '';
	$return .= '</div>';

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_tagline_box', 'mpcth_tagline_box_shortcode');

if(function_exists('wpb_map'))
	wpb_map( array(
		'name' => __('Tagline Box', 'mpcth'),
		'base' => 'mpc_tagline_box',
		'class' => 'mpcth-vs-sc-block',
		'icon' => 'icon-wpb-tagline-box',
		'category' => __('Content', 'mpcth'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __('Title', 'mpcth'),
				'param_name' => 'title',
				'value' => '',
				'admin_label' => true
			),
			array(
				'type' => 'textarea',
				'heading' => __('Content', 'mpcth'),
				'param_name' => 'content',
				'value' => '',
				'admin_label' => true
			),
			array(
				'type' => 'dropdown',
				'heading' => __('Button Position', 'mpcth'),
				'param_name' => 'position',
				'value' => array('Left' => 'left', 'Right' => 'right', 'Top' => 'top', 'Bottom' => 'bottom'),
				'admin_label' => true,
				'description' => __('Select button position.', 'mpcth')
			),
			array(
				'type' => 'textfield',
				'heading' => __('Button Text', 'mpcth'),
				'param_name' => 'text',
				'value' => 'Button',
				'admin_label' => true,
				'description' => __('Specify the button text.', 'mpcth')
			),
			array(
				'type' => 'textfield',
				'heading' => __('Button URL', 'mpcth'),
				'param_name' => 'url',
				'value' => '',
				'admin_label' => true,
				'description' => __('Specify the button URL.', 'mpcth')
			),
			array(
				'type' => 'dropdown',
				'heading' => __('Button Icon', 'mpcth'),
				'param_name' => 'icon',
				'value' => mpcth_get_icons(),
				'admin_label' => true,
				'description' => __('Select button icon.', 'mpcth')
			),
			array(
				'type' => 'dropdown',
				'heading' => __('Button Size', 'mpcth'),
				'param_name' => 'size',
				'value' => array('Normal' => 'normal', 'Big' => 'big', 'Small' => 'small', 'Mini' => 'mini'),
				'admin_label' => true,
				'description' => __('Select button size.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Button Text Color', 'mpcth'),
				'param_name' => 'color',
				'value' => '#505050',
				'admin_label' => true,
				'description' => __('Select button text color.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Button Text Hover Color', 'mpcth'),
				'param_name' => 'color_hover',
				'value' => '#ffffff',
				'admin_label' => true,
				'description' => __('Select button text color after hover.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Button Background Color', 'mpcth'),
				'param_name' => 'background',
				'value' => '#f5f5f5',
				'admin_label' => true,
				'description' => __('Select button background color.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Button Background Hover Color', 'mpcth'),
				'param_name' => 'background_hover',
				'value' => '#48c78b',
				'admin_label' => true,
				'description' => __('Select button background color after hover.', 'mpcth')
			),
			array(
				'type' => 'textfield',
				'heading' => __('ID', 'mpcth'),
				'param_name' => 'id',
				'value' => '',
				'admin_label' => true,
				'description' => __('Specify the button ID (Leave empty to generate random ID).', 'mpcth')
			),
			$add_css_animation
		)
	) );

/* ---------------------------------------------------------------- */
/* 14. Client Slider
/* ---------------------------------------------------------------- */

function mpcth_client_slider_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'columns' => '',
		'rows' => '',
		'delay' => 3000,
		'css_animation' => ''
	), $atts));

	$delay = (int)$delay >= 0 && (int)$delay < 600000 ? (int)$delay : 3000;

	$query = new WP_Query( array( 'post_type' => 'client', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title' ) );
	
	$return = '<div class="mpcth-sc-client-slider mpcth-waypoint-trigger mpcth-sc-client-slider-columns-' . $columns . add_css_animation($css_animation) . '" data-columns="' . $columns . '" data-rows="' . $rows . '" data-delay="' . $delay . '">';
		$return .= '<div class="mpcth-sc-client-slider-list">';
		while( $query->have_posts() ) {
			$query->the_post();

			$logo = get_post_meta(get_the_ID(), 'logo', true);
			$url = get_post_meta(get_the_ID(), 'client_url', true);

			if(!empty($url)) {
				$return .= '<a href="' . $url . '" class="mpcth-sc-client-slider-logo" target="_blank">';
					$return .= '<img src="' . $logo . '">';
					$return .= '<h6><span>' . get_the_title() . '</span></h6>';
				$return .= '</a>';
			} else {
				$return .= '<div class="mpcth-sc-client-slider-logo">';
					$return .= '<img src="' . $logo . '">';
					$return .= '<h6><span>' . get_the_title() . '</span></h6>';
				$return .= '</div>';
			}
		}
		$return .= '</div>';
		$return .= '<div class="mpcth-clear-fix"></div>';
	$return .= '</div>';

	wp_reset_postdata();

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_client_slider', 'mpcth_client_slider_shortcode');

if(function_exists('wpb_map'))
	wpb_map( array(
		'name' => __('Client Slider', 'mpcth'),
		'base' => 'mpc_client_slider',
		'class' => 'mpcth-vs-sc-block',
		'icon' => 'icon-wpb-client-slider',
		'category' => __('Content', 'mpcth'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __('Columns Number', 'mpcth'),
				'param_name' => 'columns',
				'value' => array(3, 4, 5, 6),
				'admin_label' => true,
				'description' => __('Select columns number.', 'mpcth')
			),
			array(
				'type' => 'dropdown',
				'heading' => __('Rows Number', 'mpcth'),
				'param_name' => 'rows',
				'value' => array(1, 2),
				'admin_label' => true,
				'description' => __('Select rows number.', 'mpcth')
			),
			array(
				'type' => 'textfield',
				'heading' => __('Delay', 'mpcth'),
				'param_name' => 'delay',
				'value' => 3000,
				'admin_label' => true,
				'description' => __('Specify the delay between slides in milisecondes (type 0 to disable transition).', 'mpcth')
			),
			$add_css_animation
		)
	) );

/* ---------------------------------------------------------------- */
/* 15. Recent Posts
/* ---------------------------------------------------------------- */

function mpcth_recent_posts_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'count' => 5,
		'css_animation' => ''
	), $atts));

	$query = new WP_Query(array(
		'post_type' => 'post',
		'posts_per_page' => $count,
		'post__not_in'	=> get_option("sticky_posts")
	));

	$return = '<div class="mpcth-sc-recent-posts mpcth-waypoint-trigger' . ($css_animation != '' ? ' mpcth-stack-animation' : '') . '"' . ($css_animation != '' ? ' data-animation-type="' . $css_animation . '"' : '') . '>';
		$return .= '<ul class="mpcth-sc-recent-posts-list">';
		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); 

				$post_format = get_post_format();
				if($post_format == '')
					$post_format = 'standard';

				if(comments_open()) {
					$comments_count = get_comments_number();
					if($comments_count == 0) {
						$comments_str = __('No Comments', 'mpcth');
					} elseif($comments_count > 1) {
						$comments_str = $comments_count . __(' Comments', 'mpcth');
					} else {
						$comments_str = __('1 Comment', 'mpcth');
					}
				}

				$categories = get_the_category();
				$categories_str = '';
				if(!empty($categories)) {
					$last_item = end($categories);
					foreach($categories as $category) {
						$categories_str .= '<a class="mpcth-sc-recent-posts-post-category" href="'.get_category_link($category->term_id ).'">';
						if($category == $last_item)
							$categories_str .= $category->name;
						else 
							$categories_str .= $category->name.', ';
						$categories_str .= '</a>';
					}
				}

				if(function_exists('zilla_likes')) {
					ob_start();
					zilla_likes();
					$zilla_likes = ob_get_contents();
					ob_end_clean();
				}

				$return .= '<li class="mpcth-sc-recent-posts-post">';
					$return .= '<div class="mpcth-sc-recent-posts-post-header">';
						$return .= '<h6 class="mpcth-sc-recent-posts-post-title">';
							$return .= '<a href="' . get_permalink(get_the_ID()) . '">';
								$return .= '<span class="mpcth-sc-recent-posts-post-format-icon mpcth-sc-icon-post-format mpcth-sc-recent-posts-post-format-' . $post_format . '"></span>';
								$return .= get_the_title();
							$return .= '</a>';
						$return .= '</h6>';
						$return .= '<small class="mpcth-sc-recent-posts-post-meta">';
							$return .= '<span class="mpcth-sc-recent-posts-post-static">' . __('Posted on ', 'mpcth') . '</span>';
							$return .= '<a class="mpcth-sc-recent-posts-post-date" href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F jS, Y') . '</a>';
							$return .= '<span class="mpcth-sc-recent-posts-post-static">' . __(' by ', 'mpcth') . '</span>';
							$return .= '<a class="mpcth-sc-recent-posts-post-author" href="' . get_author_posts_url(get_the_author_meta('ID')) .'">' . get_the_author() . '</a>';
							if(!empty($categories_str)) {
								$return .= '<span class="mpcth-sc-recent-posts-post-static">' . __(' in ', 'mpcth') . '</span>';
								$return .= '<span class="mpcth-sc-recent-posts-post-categories">' . $categories_str . '</span>';
							}
							if(!empty($comments_str)) {
								$return .= '<a class="mpcth-sc-recent-posts-post-comments" href="' . get_comments_link() .'"> - ' . $comments_str . '</a>';
							}
							if(!empty($zilla_likes)) {
								$return .= '<span class="mpcth-sc-recent-posts-post-likes"> - ' . $zilla_likes . '</span>';
							}
						$return .= '</small>';
					$return .= '</div>';
				$return .= '</li>';
			}
		}
		$return .= '</ul>';
		$return .= '<div class="mpcth-clear-fix"></div>';
	$return .= '</div>';

	wp_reset_postdata();

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_recent_posts', 'mpcth_recent_posts_shortcode');

if(function_exists('wpb_map'))
	wpb_map( array(
		'name' => __('Recent Posts', 'mpcth'),
		'base' => 'mpc_recent_posts',
		'class' => 'mpcth-vs-sc-block',
		'icon' => 'icon-wpb-recent-posts',
		'category' => __('Content', 'mpcth'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __('Posts Count', 'mpcth'),
				'param_name' => 'count',
				'value' => array(3, 4, 5, 6, 7, 8, 9, 10),
				'admin_label' => true,
				'description' => __('Select posts count.', 'mpcth')
			),
			$add_css_animation
		)
	) );

/* ---------------------------------------------------------------- */
/* 16. Related Posts
/* ---------------------------------------------------------------- */

function mpcth_related_posts_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'count' => '',
		'css_animation' => ''
	), $atts));

	global $post;
	if(empty($post)) return;

	$id = $post->ID;

	$tags_list = wp_get_post_tags($id);
	$tags = array();
	if(!empty($tags_list)) {
		foreach ($tags_list as $tag) {
			$tags[] = $tag->term_id;
		}
	}

	$not_in = get_option("sticky_posts");
	$not_in[] = $id;	
	
	$query = new WP_Query(array(
		'post_type' => 'post',
		'posts_per_page' => $count,
		'tag__in' => $tags,
		'post__not_in' => $not_in
	));

	$return = '<div class="mpcth-sc-related-posts mpcth-waypoint-trigger' . ($css_animation != '' ? ' mpcth-stack-animation' : '') . '"' . ($css_animation != '' ? ' data-animation-type="' . $css_animation . '"' : '') . '>';
		$return .= '<ul class="mpcth-sc-related-posts-list">';
		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post(); 

				$post_format = get_post_format();
				if($post_format == '')
					$post_format = 'standard';

				if(comments_open()) {
					$comments_count = get_comments_number();
					if($comments_count == 0) {
						$comments_str = __('No Comments', 'mpcth');
					} elseif($comments_count > 1) {
						$comments_str = $comments_count . __(' Comments', 'mpcth');
					} else {
						$comments_str = __('1 Comment', 'mpcth');
					}
				}

				$categories = get_the_category();
				$categories_str = '';
				if(!empty($categories)) {
					$last_item = end($categories);
					foreach($categories as $category) {
						$categories_str .= '<a class="mpcth-sc-related-posts-post-category" href="'.get_category_link($category->term_id ).'">';
						if($category == $last_item)
							$categories_str .= $category->name;
						else 
							$categories_str .= $category->name.', ';
						$categories_str .= '</a>';
					}
				}

				if(function_exists('zilla_likes')) {
					ob_start();
					zilla_likes();
					$zilla_likes = ob_get_contents();
					ob_end_clean();
				}

				$return .= '<li class="mpcth-sc-related-posts-post">';
					$return .= '<h6 class="mpcth-sc-related-posts-post-title">';
						$return .= '<a href="' . get_permalink(get_the_ID()) . '">';
							$return .= '<span class="mpcth-sc-related-posts-post-format-icon mpcth-sc-icon-post-format mpcth-sc-related-posts-post-format-' . $post_format . '"></span>';
							$return .= get_the_title();
						$return .= '</a>';
					$return .= '</h6>';
					$return .= '<small class="mpcth-sc-related-posts-post-meta">';
						$return .= '<span class="mpcth-sc-related-posts-post-static">' . __('Posted on ', 'mpcth') . '</span>';
						$return .= '<a class="mpcth-sc-related-posts-post-date" href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F jS, Y') . '</a>';
						$return .= '<span class="mpcth-sc-related-posts-post-static">' . __(' by ', 'mpcth') . '</span>';
						$return .= '<a class="mpcth-sc-related-posts-post-author" href="' . get_author_posts_url(get_the_author_meta('ID')) .'">' . get_the_author() . '</a>';
						if(!empty($categories_str)) {
							$return .= '<span class="mpcth-sc-related-posts-post-static">' . __(' in ', 'mpcth') . '</span>';
							$return .= '<span class="mpcth-sc-related-posts-post-categories">' . $categories_str . '</span>';
						}
						if(!empty($comments_str)) {
							$return .= '<a class="mpcth-sc-related-posts-post-comments" href="' . get_comments_link() .'"> - ' . $comments_str . '</a>';
						}
						if(!empty($zilla_likes)) {
							$return .= '<span class="mpcth-sc-related-posts-post-likes"> - ' . $zilla_likes . '</span>';
						}
					$return .= '</small>';
				$return .= '</li>';
			}
		}
		$return .= '</ul>';
		$return .= '<div class="mpcth-clear-fix"></div>';
	$return .= '</div>';

	wp_reset_postdata();

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_related_posts', 'mpcth_related_posts_shortcode');

if(function_exists('wpb_map'))
	wpb_map( array(
		'name' => __('Related Posts', 'mpcth'),
		'base' => 'mpc_related_posts',
		'class' => 'mpcth-vs-sc-block',
		'icon' => 'icon-wpb-related-posts',
		'category' => __('Content', 'mpcth'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __('Posts Count', 'mpcth'),
				'param_name' => 'count',
				'value' => array(3, 4, 5, 6, 7, 8, 9, 10),
				'admin_label' => true,
				'description' => __('Select posts count.', 'mpcth')
			),
			$add_css_animation
		)
	) );

/* ---------------------------------------------------------------- */
/* 17. Recent Portfolio
/* ---------------------------------------------------------------- */

function mpcth_portfolio_posts($query, $atts, $class = 'related') {
	extract(shortcode_atts(array(
		'background_hover' => '',
		'text_hover' => '',
		'css_animation' => ''
	), $atts));

	$index = 0;

	$count = $query->post_count;

	$css_id = 'mpcth_sc_' . $class . '_portfolio_' . mpcth_random_ID(5);

	$background_ie = $background_hover;
	$background_hover = 'rgba(' . implode(', ', mpcth_hex_to_rgba($background_hover, 0.95)) . ')';
	
	$return = '<div id="' . $css_id . '" class="mpcth-sc-' . $class . '-portfolio mpcth-sc-grid-portfolio-columns-' . $count . ' mpcth-waypoint-trigger' . ($css_animation != '' ? ' mpcth-stack-animation' : '') . '"' . ($css_animation != '' ? ' data-animation-type="' . $css_animation . '"' : '') . '>';
		$return .= '<ul class="mpcth-sc-grid-portfolio-list">';
		if($query->have_posts()) {
			while($query->have_posts()) {
				$query->the_post();

				$index++;

				$categories = get_the_terms(get_the_ID(), 'mpcth_portfolio_category');
				$categories_str = '';
				if(!empty($categories)) {
					$last_item = end($categories);
					foreach($categories as $category) {
						$categories_str .= '<a class="mpcth-sc-grid-portfolio-post-category" href="'.get_term_link($category->slug, 'mpcth_portfolio_category').'">';
						if($category == $last_item)
							$categories_str .= $category->name;
						else 
							$categories_str .= $category->name.', ';
						$categories_str .= '</a>';
					}
				}

				if(function_exists('zilla_likes')) {
					ob_start();
					zilla_likes();
					$zilla_likes = ob_get_contents();
					ob_end_clean();
				}
				if($index == $count)
					$return .= '<li class="mpcth-sc-grid-portfolio-post last-item">';
				else 
					$return .= '<li class="mpcth-sc-grid-portfolio-post">';

					if(has_post_thumbnail(get_the_ID()))
						$return .= get_the_post_thumbnail(get_the_ID(), 'mpcth-post-thumbnails-col-3', array('class' => "mpcth-sc-grid-portfolio-post-thumb"));
					$return .= '<div class="mpcth-sc-grid-portfolio-post-info-wrap">';
						$return .= '<div class="mpcth-sc-grid-portfolio-post-info">';
							$return .= '<h6 class="mpcth-sc-grid-portfolio-post-title">';
								$return .= '<a href="' . get_permalink(get_the_ID()) . '">';
									$return .= get_the_title();
								$return .= '</a>';
							$return .= '</h6>';
							if(!empty($zilla_likes)) {
								$return .= '<div class="mpcth-sc-grid-portfolio-post-likes">' . $zilla_likes . '</div>';
							}
							if(!empty($categories_str)) {
								$return .= '<div class="mpcth-sc-grid-portfolio-post-categories">' . $categories_str . '</div>';
							}
						$return .= '</div>';
					$return .= '</div>';
				$return .= '</li>';
			}
		}
		$return .= '</ul>';
		$return .= '<div class="mpcth-clear-fix"></div>';
	$return .= '</div>';
	$return .= '<style>';
		$return .= '#' . $css_id . ' .mpcth-sc-grid-portfolio-list .mpcth-sc-grid-portfolio-post-info-wrap { background: ' . $background_ie . '; background: ' . $background_hover . '; border-bottom-color: ' . mpcth_adjust_brightness($background_ie, -20) . ' !important; }' . PHP_EOL;
		$return .= '#' . $css_id . ' .mpcth-sc-grid-portfolio-list .mpcth-sc-grid-portfolio-post-info-wrap * { color: ' . $text_hover . '; }' . PHP_EOL;
		$return .= '#' . $css_id . ' .mpcth-sc-grid-portfolio-list .mpcth-sc-grid-portfolio-post-info-wrap *:before { color: ' . $text_hover . '; }' . PHP_EOL;
		$return .= '#' . $css_id . ' .mpcth-sc-grid-portfolio-list .mpcth-sc-grid-portfolio-post-info-wrap:hover * { color: ' . $text_hover . '; }' . PHP_EOL;
		$return .= '#' . $css_id . ' .mpcth-sc-grid-portfolio-list .mpcth-sc-grid-portfolio-post-info-wrap:hover *:before { color: ' . $text_hover . '; }' . PHP_EOL;
	$return .= '</style>';

	$return = parse_shortcode_content($return);
	return $return;
}

function mpcth_recent_portfolio_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'count' => 4
	), $atts));

	global $post;
	if(empty($post)) return;

	$id = $post->ID;

	$query = new WP_Query(array(
		'post_type' => 'portfolio',
		'posts_per_page' => $count,
		'post__not_in' => get_option("sticky_posts")
	));
	
	$return = mpcth_portfolio_posts($query, $atts, 'recent');

	wp_reset_postdata();

	return $return;
}
add_shortcode('mpc_recent_portfolio', 'mpcth_recent_portfolio_shortcode');

if(function_exists('wpb_map'))
	wpb_map( array(
		'name' => __('Recent Portfolio', 'mpcth'),
		'base' => 'mpc_recent_portfolio',
		'class' => 'mpcth-vs-sc-block',
		'icon' => 'icon-wpb-recent-portfolio',
		'category' => __('Content', 'mpcth'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __('Portfolio Count', 'mpcth'),
				'param_name' => 'count',
				'value' => array(3, 4, 5),
				'admin_label' => true,
				'description' => __('Select portfolio count.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Background Hover Color', 'mpcth'),
				'param_name' => 'background_hover',
				'value' => '#48c78b',
				'admin_label' => true,
				'description' => __('Select background color after hover.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Text Hover Color', 'mpcth'),
				'param_name' => 'text_hover',
				'value' => '#ffffff',
				'admin_label' => true,
				'description' => __('Select text color after hover.', 'mpcth')
			),
			$add_css_animation
		)
	) );

function mpcth_related_portfolio_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'count' => 4
	), $atts));

	global $post;
	if(empty($post)) return;

	$id = $post->ID;

	$tags_list = wp_get_post_tags($id);
	$tags = array();
	if(!empty($tags_list)) {
		foreach ($tags_list as $tag) {
			$tags[] = $tag->term_id;
		}
	}

	$not_in = get_option("sticky_posts");
	$not_in[] = $id;

	$query = new WP_Query(array(
		'post_type' => 'portfolio',
		'posts_per_page' => $count,
		'tag__in' => $tags,
		'post__not_in' => $not_in
	));
	
	$return = mpcth_portfolio_posts($query, $atts, 'related');

	wp_reset_postdata();

	return $return;
}
add_shortcode('mpc_related_portfolio', 'mpcth_related_portfolio_shortcode');

if(function_exists('wpb_map'))
	wpb_map( array(
		'name' => __('Related Portfolio', 'mpcth'),
		'base' => 'mpc_related_portfolio',
		'class' => 'mpcth-vs-sc-block',
		'icon' => 'icon-wpb-related-portfolio',
		'category' => __('Content', 'mpcth'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __('Portfolio Count', 'mpcth'),
				'param_name' => 'count',
				'value' => array(3, 4, 5),
				'admin_label' => true,
				'description' => __('Select portfolio count.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Background Hover Color', 'mpcth'),
				'param_name' => 'background_hover',
				'value' => '#48c78b',
				'admin_label' => true,
				'description' => __('Select background color after hover.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Text Hover Color', 'mpcth'),
				'param_name' => 'text_hover',
				'value' => '#ffffff',
				'admin_label' => true,
				'description' => __('Select text color after hover.', 'mpcth')
			),
			$add_css_animation
		)
	) );

/* ---------------------------------------------------------------- */
/* 18. Share Count
/* ---------------------------------------------------------------- */

function mpcth_share_count_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'icons' => '',
		'css_animation' => ''
	), $atts));

	global $post;

	$is_cached_counts = true;
	$facebook_count = '';
	$twitter_count = '';
	$googleplus_count = '';

	if($icons == 'ft') {
		$show_facebook = true; $show_twitter = true; $show_google = false;
	} else if($icons == 'fg') {
		$show_facebook = true; $show_twitter = false; $show_google = true;
	} else if($icons == 'tg') {
		$show_facebook = false; $show_twitter = true; $show_google = true;
	} else if($icons == 'f') {
		$show_facebook = true; $show_twitter = false; $show_google = false;
	} else if($icons == 't') {
		$show_facebook = false; $show_twitter = true; $show_google = false;
	} else if($icons == 'g') {
		$show_facebook = false; $show_twitter = false; $show_google = true;
	} else {
		$show_facebook = true; $show_twitter = true; $show_google = true;
	}

	$cached_counts = get_transient('mpcth_scc_' . $post->ID);
	
	if($cached_counts === false) {
		$is_cached_counts = false;
	} else {
		$facebook_count = $cached_counts['Facebook']['total_count'];
		$twitter_count = $cached_counts['Twitter'];
		$googleplus_count = $cached_counts['GooglePlusOne'];
	}

	$return = '<div class="mpcth-sc-share-count' . ($is_cached_counts ? ' mpcth-sc-share-count-filled' : '') . ' mpcth-waypoint-trigger' . add_css_animation($css_animation) . '" data-id="' . $post->ID . '" data-ajaxurl="' . admin_url('admin-ajax.php') . '">';
		if($show_facebook) {
			$return .= '<div class="mpcth-sc-share-count-facebook mpcth-sc-share-count-wrap">';
				$return .= '<span class="mpcth-sc-share-count-icon mpcth-sc-icon-facebook"></span>';
				$return .= '<span class="mpcth-sc-share-count-number">' . $facebook_count . '</span>';
			$return .= '</div>';
		}
		if($show_twitter) {
			$return .= '<div class="mpcth-sc-share-count-twitter mpcth-sc-share-count-wrap">';
				$return .= '<span class="mpcth-sc-share-count-icon mpcth-sc-icon-twitter"></span>';
				$return .= '<span class="mpcth-sc-share-count-number">' . $twitter_count . '</span>';
			$return .= '</div>';
		}
		if($show_google) {
			$return .= '<div class="mpcth-sc-share-count-googleplus mpcth-sc-share-count-wrap">';
				$return .= '<span class="mpcth-sc-share-count-icon mpcth-sc-icon-gplus"></span>';
				$return .= '<span class="mpcth-sc-share-count-number">' . $googleplus_count . '</span>';
			$return .= '</div>';
		}
	$return .= '</div>';

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_share_count', 'mpcth_share_count_shortcode');

if(function_exists('wpb_map'))
	wpb_map( array(
		'name' => __('Share Count', 'mpcth'),
		'base' => 'mpc_share_count',
		'class' => 'mpcth-vs-sc-block',
		'icon' => 'icon-wpb-share-count',
		'category' => __('Content', 'mpcth'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __('Share Icons', 'mpcth'),
				'param_name' => 'icons',
				'value' => array('All' => 'all', 'Facebook + Twitter' => 'ft', 'Facebook + Google+' => 'fg', 'Twitter + Google+' => 'tg', 'Facebook' => 'f', 'Twitter' => 't', 'Google+' => 'g'),
				'admin_label' => true,
				'description' => __('Select which share icon you want to display.', 'mpcth')
			),
			$add_css_animation
		)
	) );

/* ---------------------------------------------------------------- */
/* 19. Author
/* ---------------------------------------------------------------- */

function mpcth_author_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		// 'count' => 5
		'css_animation' => ''
	), $atts));

	global $post;

	$author_id = $post->post_author;

	$return = '<div class="mpcth-sc-author mpcth-waypoint-trigger' . add_css_animation($css_animation) . '">';
		$return .= '<div class="mpcth-sc-author-image-wrap">';
			$return .= '<div class="mpcth-sc-author-image">';
				$return .= get_avatar($author_id, 100, '', __('Author avatar', 'mpcth'));
			$return .= '</div>';
		$return .= '</div>';
		$return .= '<div class="mpcth-sc-author-info">';
			$return .= '<h4 class="mpcth-sc-author-name"><a href="' . get_author_posts_url($author_id) . '">' . get_the_author_meta('display_name', $author_id) . '</a></h4>';
			$return .= '<p class="mpcth-sc-author-description">' . get_the_author_meta('description', $author_id) . '</p>';
		$return .= '</div>';
	$return .= '</div>';

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_author', 'mpcth_author_shortcode');

if(function_exists('wpb_map'))
	wpb_map( array(
		'name' => __('Author', 'mpcth'),
		'base' => 'mpc_author',
		'class' => 'mpcth-vs-sc-block',
		'icon' => 'icon-wpb-author',
		'category' => __('Content', 'mpcth'),
		'params' => array(
			$add_css_animation
		)
	) );

/* ---------------------------------------------------------------- */
/* 20. Icon Divider
/* ---------------------------------------------------------------- */

function mpcth_icon_divider_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'icon' => '',
		'color' => '',
		'color_active' => '',
		'background' => '',
		'background_active' => '',
		'button_text' => '',
		'button_url' => '',
		'subheading' => '',
		'css_animation' => ''
	), $atts));

	$css_id = 'mpcth_sc_icon_divider_' . mpcth_random_ID(5);

	$return = '<div id="' . $css_id . '" class="mpcth-sc-icon-divider mpcth-waypoint-trigger' . add_css_animation($css_animation) . '">';
		$return .= '<div class="mpcth-sc-icon-divider-line"></div>';
		if($button_url != '')
			$return .= '<small class="mpcth-sc-icon-divider-button"><a class="mpcth-sc-icon-divider-button-link" href="' . $button_url . '">' . $button_text . '</a></small>';
		$return .= '<div class="mpcth-sc-icon-divider-wrap">';
			$return .= '<div class="mpcth-sc-icon-divider-icon mpcth-sc-icon mpcth-sc-icon-' . $icon . '"></div>';
			$return .= '<p class="mpcth-sc-icon-divider-title">' . $title . '</p>';
		$return .= '</div>';
		if($subheading != '')
			$return .= '<h5 class="mpcth-sc-icon-divider-subheading">' . $subheading . '</h5>';
	$return .= '</div>';
	$return .= '<style>';
		$return .= '#' . $css_id . '.mpcth-sc-icon-divider .mpcth-sc-icon-divider-line { background: ' . $background . '; }' . PHP_EOL;
		$return .= '#' . $css_id . '.mpcth-sc-icon-divider .mpcth-sc-icon-divider-icon { color: ' . $color . '; }' . PHP_EOL;
		$return .= '#' . $css_id . '.mpcth-sc-icon-divider .mpcth-sc-icon-divider-title { color: ' . $color . '; }' . PHP_EOL;
		$return .= '#' . $css_id . '.mpcth-sc-icon-divider .mpcth-sc-icon-divider-wrap { background: ' . $background . '; border-bottom-color: ' . mpcth_adjust_brightness($background, -20) . ' !important; }' . PHP_EOL;
		$return .= '#' . $css_id . '.mpcth-sc-icon-divider.mpcth-waypoint-triggered .mpcth-sc-icon-divider-icon { color: ' . $color_active . '; }' . PHP_EOL;
		$return .= '#' . $css_id . '.mpcth-sc-icon-divider.mpcth-waypoint-triggered .mpcth-sc-icon-divider-title { color: ' . $color_active . '; }' . PHP_EOL;
		$return .= '#' . $css_id . '.mpcth-sc-icon-divider.mpcth-waypoint-triggered .mpcth-sc-icon-divider-wrap { background: ' . $background_active . '; border-bottom-color: ' . mpcth_adjust_brightness($background_active, -20) . ' !important; }' . PHP_EOL;
	$return .= '</style>';

	$return = parse_shortcode_content($return);
	return $return;
}
add_shortcode('mpc_icon_divider', 'mpcth_icon_divider_shortcode');

if(function_exists('wpb_map'))
	wpb_map( array(
		'name' => __('Icon Divider', 'mpcth'),
		'base' => 'mpc_icon_divider',
		'class' => 'mpcth-vs-sc-block',
		'icon' => 'icon-wpb-icon-divider',
		'category' => __('Content', 'mpcth'),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __('Title', 'mpcth'),
				'param_name' => 'title',
				'value' => '',
				'admin_label' => true,
				'description' => __('Specify the title of icon divider.', 'mpcth')
			),
			array(
				'type' => 'dropdown',
				'heading' => __('Icon', 'mpcth'),
				'param_name' => 'icon',
				'value' => mpcth_get_icons(),
				'admin_label' => true,
				'description' => __('Select icon to display.', 'mpcth')
			),
			array(
				'type' => 'textfield',
				'heading' => __('Button Text', 'mpcth'),
				'param_name' => 'button_text',
				'value' => '',
				'admin_label' => true,
				'description' => __('Specify the button text of icon divider.', 'mpcth')
			),
			array(
				'type' => 'textfield',
				'heading' => __('Button URL', 'mpcth'),
				'param_name' => 'button_url',
				'value' => '',
				'admin_label' => true,
				'description' => __('Specify the button URL of icon divider.', 'mpcth')
			),
			array(
				'type' => 'textfield',
				'heading' => __('Subheading', 'mpcth'),
				'param_name' => 'subheading',
				'value' => '',
				'admin_label' => true,
				'description' => __('Specify the subheading of icon divider.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Text Color', 'mpcth'),
				'param_name' => 'color',
				'value' => '#666666',
				'admin_label' => true,
				'description' => __('Select text color.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Text Color Active', 'mpcth'),
				'param_name' => 'color_active',
				'value' => '#ffffff',
				'admin_label' => true,
				'description' => __('Select text color.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Background Color', 'mpcth'),
				'param_name' => 'background',
				'value' => '#f5f5f5',
				'admin_label' => true,
				'description' => __('Select background color.', 'mpcth')
			),
			array(
				'type' => 'colorpicker',
				'heading' => __('Background Color Active', 'mpcth'),
				'param_name' => 'background_active',
				'value' => '#48c78b',
				'admin_label' => true,
				'description' => __('Select border color.', 'mpcth')
			),
			$add_css_animation
		)
	) );

/* ---------------------------------------------------------------- */
/* 21. Flipbook
/* ---------------------------------------------------------------- */

global $mpcrf_options;

$flipbook_ids = array();

if(!empty($mpcrf_options['books']))
	foreach($mpcrf_options['books'] as $book) {
		if($book['rfbwp_fb_name'] != '')
			$flipbook_ids[$book['rfbwp_fb_name']] = strtolower(str_replace(" ", "_", $book['rfbwp_fb_name']));
	}

function mpcth_flipbook_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		'id' => ''
	), $atts));

	$return = '<div class="mpcth-flipbook-wrap">';
	$return .= do_shortcode('[responsive-flipbook id="' . $id . '"]');
	$return .= '</div>';

	return $return;
}
add_shortcode('mpc_flipbook', 'mpcth_flipbook_shortcode');

if(function_exists('wpb_map'))
	wpb_map( array(
		'name' => __('Flipbook', 'mpcth'),
		'base' => 'mpc_flipbook',
		'class' => 'mpcth-vs-sc-block',
		'icon' => 'icon-wpb-flipbook',
		'category' => __('Content', 'mpcth'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __('Flipbook Name', 'mpcth'),
				'param_name' => 'id',
				'value' => $flipbook_ids,
				'admin_label' => true,
				'description' => __('Select Flipbook you want to display.', 'mpcth')
			)
		)
	) );

/* ---------------------------------------------------------------- */
/* Parse shortcode content
/* ---------------------------------------------------------------- */

function parse_shortcode_content($content) {
   /* Parse nested shortcodes and add formatting. */
	$content = trim(do_shortcode(shortcode_unautop($content)));

	/* Remove '' from the start of the string. */
	if (substr($content, 0, 4) == '')
		$content = substr($content, 4);

	/* Remove '' from the end of the string. */
	if (substr($content, -3, 3) == '')
		$content = substr($content, 0, -3);

	/* Remove any instances of ''. */
	$content = str_replace(array('<p></p>'), '', $content);
	$content = str_replace(array('<p>  </p>'), '', $content);

	return $content;
}

function mpcth_color_creator($colour, $per) {
	$colour = substr($colour, 1);
	$rgb = '';
	$per = $per / 100 * 255;

	if($per < 0) {
		$per = abs($per);
		for ($x=0;$x<3;$x++) {
			$c = hexdec(substr($colour,(2*$x),2)) - $per;
			$c = ($c < 0) ? 0 : dechex($c);
			$rgb .= (strlen($c) < 2) ? '0'.$c : $c;
		}
	} else {
		for ($x=0;$x<3;$x++) {
			$c = hexdec(substr($colour,(2*$x),2)) + $per;
			$c = ($c > 255) ? 'ff' : dechex($c);
			$rgb .= (strlen($c) < 2) ? '0'.$c : $c;
		}
	}
	return '#'.$rgb;
}

function mpcth_random_ID($length = 15) {
	return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

function mpcth_hex_to_rgba($hex, $alpha = 1) {
	$hex = str_replace("#", "", $hex);

	if(strlen($hex) == 3) {
		$r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
		$g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
		$b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
	} else {
		$r = hexdec(substr($hex, 0, 2));
		$g = hexdec(substr($hex, 2, 2));
		$b = hexdec(substr($hex, 4, 2));
	}
	
	return array($r, $g, $b, $alpha);
}

function mpcth_adjust_brightness($hex, $adjust) {
	$adjust = max(-255, min(255, $adjust));

	$rgba = mpcth_hex_to_rgba($hex);

	$r = $rgba[0];
	$g = $rgba[1];
	$b = $rgba[2];

	$r = max(0, min(255, $r + $adjust));
	$g = max(0, min(255, $g + $adjust));  
	$b = max(0, min(255, $b + $adjust));

	$r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
	$g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
	$b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

	return '#'.$r_hex.$g_hex.$b_hex;
}