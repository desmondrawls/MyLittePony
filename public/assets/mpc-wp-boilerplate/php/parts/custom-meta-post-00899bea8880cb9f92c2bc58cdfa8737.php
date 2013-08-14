<?php

/* ---------------------------------------------------------------- */
/*	Blog Post Settings
/* ---------------------------------------------------------------- */

function post_meta_box($post) {
	global $mpcth_options;
	// global $post;
	global $mpcth_sidebar_options;

	wp_nonce_field('mpc_post_meta_box_nonce', 'post_meta_box_nonce'); 
	
	$values = get_post_custom($post->ID);

	$post_format = get_post_format();
	$post_type = $post->post_type;

	/* Lightbox Settings */
	if(isset($values['lightbox_enabled']))
		$lightbox_enabled = esc_attr($values['lightbox_enabled'][0]);
	else 
		$lightbox_enabled = "off";	
	
	$lightbox_enabled = checked($lightbox_enabled, 'on', false);
	
	if(isset($values['lightbox_caption']))
		$lightbox_caption = esc_attr($values['lightbox_caption'][0]);
	else 
		$lightbox_caption = "";
				
	if(isset($values['lightbox_source'] ))
		$lightbox_source = esc_attr($values['lightbox_source'][0]);
	else 
		$lightbox_source = "";

	/* Post formats */
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

	if(isset($values['tweet_url'] ))
		$tweet_url = esc_attr($values['tweet_url'][0]);
	else 
		$tweet_url = "";

	if(isset($values['link_url'] ))
		$link_url = esc_attr($values['link_url'][0]);
	else 
		$link_url = "";

	if(isset($values['quote'] ))
		$quote = esc_attr($values['quote'][0]);
	else 
		$quote = "";

	if(isset($values['mp3'] ))
		$mp3 = esc_attr($values['mp3'][0]);
	else 
		$mp3 = "";

	if(isset($values['ogg'] ))
		$ogg = esc_attr($values['ogg'][0]);
	else 
		$ogg = "";

	if(isset($values['m4v'] ))
		$m4v = esc_attr($values['m4v'][0]);
	else 
		$m4v = "";

	if(isset($values['ogv'] ))
		$ogv = esc_attr($values['ogv'][0]);
	else 
		$ogv = "";

	if(isset($values['video_width'] ))
		$video_width = esc_attr($values['video_width'][0]);
	else 
		$video_width = "";

	if(isset($values['video_height'] ))
		$video_height = esc_attr($values['video_height'][0]);
	else 
		$video_height = "";

	if(isset($values['embed_code'] ))
		$embed_code = esc_attr($values['embed_code'][0]);
	else 
		$embed_code = "";

	/* Footer Settings */
	if(isset($values['custom_footer']))
		$custom_footer = esc_attr($values['custom_footer'][0]);
	else 
		$custom_footer = "off"; 
	
	$custom_footer = checked($custom_footer, 'on', false);

	if(isset($values['toggle_footer']))
		$toggle_footer = esc_attr($values['toggle_footer'][0]);
	else 
		$toggle_footer = "default"; 

	if(isset($values['hide_footer']))
		$hide_footer = esc_attr($values['hide_footer'][0]);
	else 
		$hide_footer = "off"; 
	
	$hide_footer = checked($hide_footer, 'on', false);

	if(isset($values['custom_footer_select'])) {
		$custom_footer_select = esc_attr($values['custom_footer_select'][0]);
	} else {
		$custom_footer_select = $post->ID;
	}

	if(isset($values['footer_columns'])) {
		$footer_columns = esc_attr($values['footer_columns'][0]);
	} else { 
		$footer_columns = "3";
	}

	/* Top Widget Area Settings */
	if(isset($values['hide_top_area']))
		$hide_top_area = esc_attr($values['hide_top_area'][0]);
	else 
		$hide_top_area = "off"; 
	
	$hide_top_area = checked($hide_top_area, 'on', false);

	if(isset($values['custom_top_area']))
		$custom_top_area = esc_attr($values['custom_top_area'][0]);
	else 
		$custom_top_area = "off"; 
	
	$custom_top_area = checked($custom_top_area, 'on', false);

	if(isset($values['custom_top_area_select'])) {
		$custom_top_area_select = esc_attr($values['custom_top_area_select'][0]);
	} else {
		$custom_top_area_select = $post->ID;
	}

	if(isset($values['top_area_columns'])) {
		$top_area_columns = esc_attr($values['top_area_columns'][0]);
	} else { 
		$top_area_columns = "3";
	}
	
	/* Sidebar Settings */
	if(isset($values['custom_sidebar_position']))
		$custom_sidebar_position = esc_attr($values['custom_sidebar_position'][0]);
	else 
		$custom_sidebar_position = "off";

	$custom_sidebar_position = checked($custom_sidebar_position, 'on', false);

	if(isset($values['custom_sidebar']))
		$custom_sidebar = esc_attr($values['custom_sidebar'][0]);
	else 
		$custom_sidebar = "off";

	$custom_sidebar = checked($custom_sidebar, 'on', false);

	if(isset($values['custom_sidebar_select'])) {
		$custom_sidebar_select = esc_attr($values['custom_sidebar_select'][0]);
	} else { 
		$custom_sidebar_select = $post->ID;
	}

	if(isset($values['sidebar_position'])) {
		$sidebar_position = esc_attr($values['sidebar_position'][0]);
	} else {
		if(get_post_type() == 'post' && isset($mpcth_options) && isset($mpcth_options['mpcth_blog_post_sidebar']))
			$sidebar_position = $mpcth_options['mpcth_blog_post_sidebar'];
		elseif (get_post_type() == 'portfolio' && isset($mpcth_options) && isset($mpcth_options['mpcth_portfolio_post_sidebar']))
			$sidebar_position = $mpcth_options['mpcth_portfolio_post_sidebar'];
		elseif (is_page() && isset($mpcth_options) && isset($mpcth_options['mpcth_sidebar']))
			$sidebar_position = $mpcth_options['mpcth_sidebar'];
		else
			$sidebar_position = "right";
	}

	$sidebar_position_left = checked($sidebar_position, 'left', false);
	$sidebar_position_none = checked($sidebar_position, 'none', false);
	$sidebar_position_right = checked($sidebar_position, 'right', false);

	/* Post Preview */
	if(isset($values['full_thumbnail']))
		$full_thumbnail = esc_attr($values['full_thumbnail'][0]);
	else 
		$full_thumbnail = "on";

	$full_thumbnail = checked($full_thumbnail, 'on', false);

	if(isset($values['display_share_count']))
		$display_share_count = esc_attr($values['display_share_count'][0]);
	else 
		$display_share_count = "on";

	$display_share_count = checked($display_share_count, 'on', false);

	if(isset($values['display_related']))
		$display_related = esc_attr($values['display_related'][0]);
	else 
		$display_related = "on";

	$display_related = checked($display_related, 'on', false);

	if(isset($values['display_author']))
		$display_author = esc_attr($values['display_author'][0]);
	else 
		$display_author = "on";

	$display_author = checked($display_author, 'on', false);

	if(isset($values['display_in_single_view']))
		$display_in_single_view = esc_attr($values['display_in_single_view'][0]);
	else 
		$display_in_single_view = "on";

	$display_in_single_view = checked($display_in_single_view, 'on', false);

	if(isset($values['featured_shortcode']))
		$featured_shortcode = esc_attr($values['featured_shortcode'][0]);
	else 
		$featured_shortcode = "";

	$widget_areas_sidebar = array();

	$query = new WP_Query( array( 'post_type' => 'widget_area', 'meta_key' => 'widget_area_type', 'meta_value' => 'sidebar', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title' ) );
	while( $query->have_posts() ) {
		$query->the_post();

		$widget_areas_sidebar[get_the_ID()] = get_the_title();
	}

	$widget_areas_top_area = array();

	$query = new WP_Query( array( 'post_type' => 'widget_area', 'meta_key' => 'widget_area_type', 'meta_value' => 'top_area', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title' ) );
	while( $query->have_posts() ) {
		$query->the_post();

		$widget_areas_top_area[get_the_ID()] = get_the_title();
	}

	$widget_areas_footer = array();

	$query = new WP_Query( array( 'post_type' => 'widget_area', 'meta_key' => 'widget_area_type', 'meta_value' => 'footer', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title' ) );
	while( $query->have_posts() ) {
		$query->the_post();

		$widget_areas_footer[get_the_ID()] = get_the_title();
	}

	/* Header */
	if(isset($values['hide_header'])) {
		$hide_header = esc_attr($values['hide_header'][0]);
	} else { 
		$hide_header = "off";
	}

	$hide_header = checked($hide_header, 'on', false);

	if(isset($values['custom_header'])) {
		$custom_header = esc_attr($values['custom_header'][0]);
	} else { 
		$custom_header = "off";
	}

	$custom_header = checked($custom_header, 'on', false);
	
	if(isset($values['header_heading'])) {
		$header_heading = esc_attr($values['header_heading'][0]);
	} else { 
		$header_heading = "";
	}

	if(isset($values['header_subheading'])) {
		$header_subheading = esc_attr($values['header_subheading'][0]);
	} else { 
		$header_subheading = "";
	}

	if(isset($values['header_type'])) {
		$header_type = esc_attr($values['header_type'][0]);
	} else { 
		$header_type = "none";
	}

	if(isset($values['header_link_text'])) {
		$header_link_text = esc_attr($values['header_link_text'][0]);
	} else { 
		$header_link_text = "";
	}

	if(isset($values['header_link_url'])) {
		$header_link_url = esc_attr($values['header_link_url'][0]);
	} else { 
		$header_link_url = "";
	}

	if(isset($values['header_text'])) {
		$header_text = esc_attr($values['header_text'][0]);
	} else { 
		$header_text = "";
	}

	/* HTML Markup */
	$box_output = '';

	$box_output .= '<div class="mpcth-of">';

	$box_output .= '<div class="mpcth-of-accordion-heading mpcth-of-ac-open"><h3>' . __('Sidebar Settings', 'mpcth') . '</h3><span class="mpcth-of-circle"><span></span></span></div>';

	/* Sidebar Settings */
	$box_output .=
		'<div class="mpcth-of-accordion-content">'.
			'<div class="mpcth-of-section mpcth-of-section-checkbox">'.
				'<h4>' . __('Custom Sidebar Position', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_custom_sidebar_position" name="custom_sidebar_position" class="checkbox of-input"'.$custom_sidebar_position.'/>'.
						'<span class="mpcth-of-switcher">'.
							'<span class="mpcth-of-switcher-slide">'.
								'<span class="mpcth-of-switcher-thumb">| | |</span>'.
								'<span class="mpcth-of-switcher-on">ON</span>'.
								'<span class="mpcth-of-switcher-off">OFF</span>'.
							'</span>'.
						'</span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Check this if you want to use custom sidebar for this post.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-sidebar">'.
				'<h4>' . __('Sidebar', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="radio" id="mpcth_otc_sidebar_right" name="sidebar_position" class="of-input of-radio" value="right" '.$sidebar_position_right.'>'.
						'<div class="mpcth-of-sb-right">'.
							'<span class="mpcth-of-sb-section-right"></span>'.
							'<span class="mpcth-of-sb-section-left"></span>'.
						'</div>'.
						'<input type="radio" id="mpcth_otc_sidebar_none" name="sidebar_position" class="of-input of-radio" value="none" '.$sidebar_position_none.'>'.
						'<div class="mpcth-of-sb-none">'.
							'<span class="mpcth-of-sb-section-right"></span>'.
							'<span class="mpcth-of-sb-section-left"></span>'.
						'</div>'.
						'<input type="radio" id="mpcth_otc_sidebar_left" name="sidebar_position" class="of-input of-radio" value="left" '.$sidebar_position_left.'>'.
						'<div class="mpcth-of-sb-left">'.
							'<span class="mpcth-of-sb-section-right"></span>'.
							'<span class="mpcth-of-sb-section-left"></span>'.
						'</div>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify sidebar position to this post.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-checkbox">'.
				'<h4>' . __('Custom Sidebar', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_custom_sidebar" name="custom_sidebar" class="checkbox of-input"'.$custom_sidebar.'/>'.
						'<span class="mpcth-of-switcher">'.
							'<span class="mpcth-of-switcher-slide">'.
								'<span class="mpcth-of-switcher-thumb">| | |</span>'.
								'<span class="mpcth-of-switcher-on">ON</span>'.
								'<span class="mpcth-of-switcher-off">OFF</span>'.
							'</span>'.
						'</span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Check this if you want to use custom sidebar for this post.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-select">'.
				'<h4>' . __('Select Custom Sidebar', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<select id="mpcth_otc_custom_sidebar_select" name="custom_sidebar_select" class="of-input">'.

							'<option value="'.$post->ID.'"' .(($custom_sidebar_select == $post->ID) ? 'selected="selected"' : ''). '>Unique</option>';

						foreach ($widget_areas_sidebar as $id => $title) {
							$box_output .= '<option value="'.$id.'"' .(($custom_sidebar_select == $id) ? 'selected="selected"' : ''). '>'.$title.'</option>';
						}

						$box_output .=
						'</select>'.
						'<span class="mpcth-of-select-mockup"><span class="mpcth-of-select-border-right"><span></span></span><span class="mpcth-of-select-border-left"></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify number of columns in your custom top widget area.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
		'</div>';

	/* Header Settings */
	$box_output .= 
	'<div class="mpcth-of-accordion-heading"><h3>' . __('Header Settings', 'mpcth') . '</h3><span class="mpcth-of-circle"><span></span></span></div>'.
		'<div class="mpcth-of-accordion-content">';
			if(!empty($mpcth_options['mpcth_show_header'])) {
			$box_output .=
			'<div class="mpcth-of-section mpcth-of-section-checkbox">'.
				'<h4>' . __('Hide Header', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_hide_header" name="hide_header" class="checkbox of-input" '.$hide_header.'/>'.
						'<span class="mpcth-of-switcher"><span class="mpcth-of-switcher-slide"><span class="mpcth-of-switcher-thumb">| | |</span><span class="mpcth-of-switcher-on">ON</span><span class="mpcth-of-switcher-off">OFF</span></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Check this if you want to create custom header for this post.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>';
			}
			$box_output .=
			'<div class="mpcth-of-section mpcth-of-section-checkbox">'.
				'<h4>' . __('Custom Header', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_custom_header" name="custom_header" class="checkbox of-input" '.$custom_header.'/>'.
						'<span class="mpcth-of-switcher"><span class="mpcth-of-switcher-slide"><span class="mpcth-of-switcher-thumb">| | |</span><span class="mpcth-of-switcher-on">ON</span><span class="mpcth-of-switcher-off">OFF</span></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Check this if you want to create custom header for this post.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-text mpcth-of-header">'.
				'<h4>' . __('Heading', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_header_heading" name="header_heading" class="of-input" value="'.$header_heading.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify custom heading text.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-text mpcth-of-header">'.
				'<h4>' . __('Subheading', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_header_subheading" name="header_subheading" class="of-input" value="'.$header_subheading.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify custom subheading text.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-select">'.
				'<h4>' . __('Header Type', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<select id="mpcth_otc_header_type" name="header_type" class="of-input">'.
							'<option value="none"' .(($header_type == 'none') ? 'selected="selected"' : ''). '>' . __('NONE', 'mpcth') . '</option>'.
							'<option value="breadcrumb"' .(($header_type == 'breadcrumb') ? 'selected="selected"' : ''). '>' . __('BREADCRUMB', 'mpcth') . '</option>'.
							'<option value="link"' .(($header_type == 'link') ? 'selected="selected"' : ''). '>' . __('LINK', 'mpcth') . '</option>'.
							'<option value="text"' .(($header_type == 'text') ? 'selected="selected"' : ''). '>' . __('TEXT', 'mpcth') . '</option>'.
						'</select>'.
						'<span class="mpcth-of-select-mockup"><span class="mpcth-of-select-border-right"><span></span></span><span class="mpcth-of-select-border-left"></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify number of columns in your custom top widget area.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-text mpcth-of-header-link">'.
				'<h4>' . __('Link Text', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_header_link_text" name="header_link_text" class="of-input" value="'.$header_link_text.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify the right side link text of header.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-text mpcth-of-header-link">'.
				'<h4>' . __('Link URL', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_header_link_url" name="header_link_url" class="of-input" value="'.$header_link_url.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify the right side link URL of header.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-text mpcth-of-header-text">'.
				'<h4>' . __('Text', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_header_text" name="header_text" class="of-input" value="'.$header_text.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify the right side text of header.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
		'</div>';

	/* Top Widget Area Settings */
	if(!empty($mpcth_options['mpcth_top_widget_area'])) {

	$box_output .= 
	'<div class="mpcth-of-accordion-heading"><h3>' . __('Top Widget Area Settings', 'mpcth') . '</h3><span class="mpcth-of-circle"><span></span></span></div>'.
		'<div class="mpcth-of-accordion-content">'.
			'<div class="mpcth-of-section mpcth-of-section-checkbox">'.
				'<h4>' . __('Hide Top Widget Area', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_hide_top_area" name="hide_top_area" class="checkbox of-input" '.$hide_top_area.'/>'.
						'<span class="mpcth-of-switcher"><span class="mpcth-of-switcher-slide"><span class="mpcth-of-switcher-thumb">| | |</span><span class="mpcth-of-switcher-on">ON</span><span class="mpcth-of-switcher-off">OFF</span></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Check this if you want to hide top widget area for this post.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-checkbox">'.
				'<h4>' . __('Custom Top Widget Area', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_custom_top_area" name="custom_top_area" class="checkbox of-input" '.$custom_top_area.'/>'.
						'<span class="mpcth-of-switcher"><span class="mpcth-of-switcher-slide"><span class="mpcth-of-switcher-thumb">| | |</span><span class="mpcth-of-switcher-on">ON</span><span class="mpcth-of-switcher-off">OFF</span></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Check this if you want to use custom top widget area for this post.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-select">'.
				'<h4>' . __('Select Custom Top Area', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<select id="mpcth_otc_custom_top_area_select" name="custom_top_area_select" class="of-input">'.

							'<option value="'.$post->ID.'"' .(($custom_top_area_select == $post->ID) ? 'selected="selected"' : ''). '>Unique</option>';

						foreach ($widget_areas_top_area as $id => $title) {
							$box_output .= '<option value="'.$id.'"' .(($custom_top_area_select == $id) ? 'selected="selected"' : ''). '>'.$title.'</option>';
						}

						$box_output .=
						'</select>'.
						'<span class="mpcth-of-select-mockup"><span class="mpcth-of-select-border-right"><span></span></span><span class="mpcth-of-select-border-left"></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify number of columns in your custom top widget area.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-select">'.
				'<h4>' . __('Number of Custom Top Widget Area Columns', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<select id="mpcth_otc_top_area_columns" name="top_area_columns" class="of-input">'.
							'<option value="1"' .(($top_area_columns == '1') ? 'selected="selected"' : ''). '>1</option>'.
							'<option value="2"' .(($top_area_columns == '2') ? 'selected="selected"' : ''). '>2</option>'.
							'<option value="3"' .(($top_area_columns == '3') ? 'selected="selected"' : ''). '>3</option>'.
							'<option value="4"' .(($top_area_columns == '4') ? 'selected="selected"' : ''). '>4</option>'.
							'<option value="5"' .(($top_area_columns == '5') ? 'selected="selected"' : ''). '>5</option>'.
						'</select>'.
						'<span class="mpcth-of-select-mockup"><span class="mpcth-of-select-border-right"><span></span></span><span class="mpcth-of-select-border-left"></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify number of columns in your custom top widget area.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
		'</div>';

	}

	/* Footer Settings */
	$box_output .= 
	'<div class="mpcth-of-accordion-heading"><h3>' . __('Footer Settings', 'mpcth') . '</h3><span class="mpcth-of-circle"><span></span></span></div>'.
		'<div class="mpcth-of-accordion-content">'.
			'<div class="mpcth-of-section mpcth-of-section-checkbox">'.
				'<h4>' . __('Custom Footer', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_custom_footer" name="custom_footer" class="checkbox of-input" '.$custom_footer.'/>'.
						'<span class="mpcth-of-switcher"><span class="mpcth-of-switcher-slide"><span class="mpcth-of-switcher-thumb">| | |</span><span class="mpcth-of-switcher-on">ON</span><span class="mpcth-of-switcher-off">OFF</span></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Check this if you want to use custom footer for this post.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-select">'.
				'<h4>' . __('Select Custom Footer', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<select id="mpcth_otc_custom_footer_select" name="custom_footer_select" class="of-input">'.

							'<option value="'.$post->ID.'"' .(($custom_footer_select == $post->ID) ? 'selected="selected"' : ''). '>Unique</option>';

						foreach ($widget_areas_footer as $id => $title) {
							$box_output .= '<option value="'.$id.'"' .(($custom_footer_select == $id) ? 'selected="selected"' : ''). '>'.$title.'</option>';
						}

						$box_output .=
						'</select>'.
						'<span class="mpcth-of-select-mockup"><span class="mpcth-of-select-border-right"><span></span></span><span class="mpcth-of-select-border-left"></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify number of columns in your custom top widget area.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-select">'.
				'<h4>' . __('Number of Custom Footer Columns', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<select id="mpcth_otc_footer_columns" name="footer_columns" class="of-input">'.
							'<option value="1"' .(($footer_columns == '1') ? 'selected="selected"' : ''). '>1</option>'.
							'<option value="2"' .(($footer_columns == '2') ? 'selected="selected"' : ''). '>2</option>'.
							'<option value="3"' .(($footer_columns == '3') ? 'selected="selected"' : ''). '>3</option>'.
							'<option value="4"' .(($footer_columns == '4') ? 'selected="selected"' : ''). '>4</option>'.
							'<option value="5"' .(($footer_columns == '5') ? 'selected="selected"' : ''). '>5</option>'.
						'</select>'.
						'<span class="mpcth-of-select-mockup"><span class="mpcth-of-select-border-right"><span></span></span><span class="mpcth-of-select-border-left"></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify number of columns in your custom footer.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-select">'.
				'<h4>' . __('Toggle Footer', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<select id="mpcth_otc_toggle_footer" name="toggle_footer" class="of-input">'.
							'<option value="default"' .(($toggle_footer == 'default') ? 'selected="selected"' : ''). '>' . __('DEFAULT', 'mpcth') . '</option>'.
							'<option value="on"' .(($toggle_footer == 'on') ? 'selected="selected"' : ''). '>' . __('ON', 'mpcth') . '</option>'.
							'<option value="off"' .(($toggle_footer == 'off') ? 'selected="selected"' : ''). '>' . __('OFF', 'mpcth') . '</option>'.
						'</select>'.
						'<span class="mpcth-of-select-mockup"><span class="mpcth-of-select-border-right"><span></span></span><span class="mpcth-of-select-border-left"></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify type of toggle footer for this page.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-checkbox">'.
				'<h4>' . __('Hidden Footer', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-opt on">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_hide_footer" name="hide_footer" class="checkbox of-input" '.$hide_footer.'/>'.
						'<span class="mpcth-of-switcher"><span class="mpcth-of-switcher-slide"><span class="mpcth-of-switcher-thumb">| | |</span><span class="mpcth-of-switcher-on">ON</span><span class="mpcth-of-switcher-off">OFF</span></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Check this option to hide toggle footer.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
		'</div>';

	/* Lightbox Settings */
	$box_output .=
	'<div class="mpcth-of-accordion-heading mpcth-of-lightbox-settings"><h3>' . __('Lightbox Settings', 'mpcth') . '</h3><span class="mpcth-of-circle"><span></span></span></div>'.
		'<div class="mpcth-of-accordion-content">'.
			'<div class="mpcth-of-section mpcth-of-section-checkbox">'.
				'<h4>' . __('Enable Lightbox', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_lightbox_enabled" name="lightbox_enabled" class="checkbox of-input"'.$lightbox_enabled.'/>'.
						'<span class="mpcth-of-switcher"><span class="mpcth-of-switcher-slide"><span class="mpcth-of-switcher-thumb">| | |</span><span class="mpcth-of-switcher-on">ON</span><span class="mpcth-of-switcher-off">OFF</span></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Check this if you want to add lightbox preview of this post.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-text">'.
				'<h4>' . __('Lightbox Caption', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_lightbox_caption" name="lightbox_caption" class="of-input" value="'.$lightbox_caption.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify lightbox description', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-text">'.
				'<h4>' . __('Lightbox Source', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_lightbox_source" name="lightbox_source" class="of-input" value="'.$lightbox_source.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify lightbox source.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
		'</div>';

	/* Post Preview */
	$box_output .=
	'<div class="mpcth-of-accordion-heading"><h3>' . __('Post Preview', 'mpcth') . '</h3><span class="mpcth-of-circle"><span></span></span></div>'.
		'<div class="mpcth-of-accordion-content mpcth-post-format-setup">'.
			// gallery post format
			'<div class="mpcth-of-section mpcth-of-section-upload mpcth-post-format-gallery">'.
				'<h4>' . __('Gallery Images', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input id="mpcth_otc_gallery_images_val" class="mpcth-gallery-images-val of-input upload" type="text" name="gallery_images_val" value="'.$gallery_images_val.'">'.
						'<input id="mpcth_otc_gallery_images_button" class="upload_gallery_button button mpcth-of-grey-button" type="button" value="'.($gallery_images_val == '' ? __('Select', 'mpcth') : __('Edit', 'mpcth')).'">'.
						'<div id="mpcth_otc_gallery_images_wrap" class="mpcth-gallery-images-wrap">'.$gallery_images.'</div>'.
						// mpcth_optionsframework_medialibrary_uploader( 'sdfsd', '', null );
						// '<input type="text" id="mpcth_otc_tweet_url" name="tweet_url" class="of-input" value="'.$tweet_url.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Paste tweet embed code for more information please see help file.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			// status post format
			'<div class="mpcth-of-section mpcth-of-section-text mpcth-post-format-status">'.
				'<h4>' . __('Tweet URL', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_tweet_url" name="tweet_url" class="of-input" value="'.$tweet_url.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Paste tweet embed code for more information please see help file.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			// link post format
			'<div class="mpcth-of-section mpcth-of-section-text mpcth-post-format-link">'.
				'<h4>' . __('Link', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_link_url" name="link_url" class="of-input" value="'.$link_url.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Paste link you would like to share', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			// quote post format
			'<div class="mpcth-of-section mpcth-of-section-textarea-big
			mpcth-post-format-quote">'.
				'<h4>' . __('Quote', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<textarea id="mpcth_otc_quote" class="of-input" name="quote" rows="8">'.$quote.'</textarea>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify quote which will be dislayed at the top of your post.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			// audio post format
			'<div class="mpcth-of-section mpcth-of-section-text mpcth-post-format-audio">'.
				'<h4>' . __('MP3 File URL', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_mp3" name="mp3" class="of-input" value="'.$mp3.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('URL to the MP3 file.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-text mpcth-post-format-audio">'.
				'<h4>' . __('OGG File URL', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_ogg" name="ogg" class="of-input" value="'.$ogg.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('URL to the OGG file.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			// video post format
			'<div class="mpcth-of-section mpcth-of-section-text mpcth-post-format-video">'.
				'<h4>' . __('MP4 File URL', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_m4v" name="m4v" class="of-input" value="'.$m4v.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('URL to the M4V file.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-text mpcth-post-format-video">'.
				'<h4>' . __('OGG File URL', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_ogv" name="ogv" class="of-input" value="'.$ogv.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('URL to the OGV file.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-text mpcth-post-format-video">'.
				'<h4>' . __('Video Width', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_video_width" name="video_width" class="of-input" value="'.$video_width.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify width of your video.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-text mpcth-post-format-video">'.
				'<h4>' . __('Video Height', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="text" id="mpcth_otc_video_height" name="video_height" class="of-input" value="'.$video_height.'">'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('Specify height of your video.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-textarea-big
			mpcth-post-format-video">'.
				'<h4>' . __('Video Embed Code', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<textarea id="mpcth_otc_embed_code" class="of-input" name="embed_code" rows="8">'.$embed_code.'</textarea>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('If your video is not self hosted you can paste here an embed code from Vimeo or Youtube.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			// displayed for all
			'<div class="mpcth-of-section mpcth-of-section-checkbox mpcth-post-format-all">'.
				'<h4>' . __('Display Full-width Thumbnail', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_full_thumbnail" name="full_thumbnail" class="checkbox of-input"'.$full_thumbnail.'/>'.
						'<span class="mpcth-of-switcher"><span class="mpcth-of-switcher-slide"><span class="mpcth-of-switcher-thumb">| | |</span><span class="mpcth-of-switcher-on">ON</span><span class="mpcth-of-switcher-off">OFF</span></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('By enabling this option the post thumbnail will be displayed at the full-width of the post.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-checkbox mpcth-post-format-all">'.
				'<h4>' . __('Display Share Counts', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_display_share_count" name="display_share_count" class="checkbox of-input"'.$display_share_count.'/>'.
						'<span class="mpcth-of-switcher"><span class="mpcth-of-switcher-slide"><span class="mpcth-of-switcher-thumb">| | |</span><span class="mpcth-of-switcher-on">ON</span><span class="mpcth-of-switcher-off">OFF</span></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('By enabling this option the share count will be displayed at the bottom of the post in single view.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-checkbox mpcth-post-format-all">'.
				'<h4>' . __('Display Related Posts', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_display_related" name="display_related" class="checkbox of-input"'.$display_related.'/>'.
						'<span class="mpcth-of-switcher"><span class="mpcth-of-switcher-slide"><span class="mpcth-of-switcher-thumb">| | |</span><span class="mpcth-of-switcher-on">ON</span><span class="mpcth-of-switcher-off">OFF</span></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('By enabling this option the related posts will be displayed at the bottom of the post in single view.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-checkbox mpcth-post-format-all">'.
				'<h4>' . __('Display Author', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_display_author" name="display_author" class="checkbox of-input"'.$display_author.'/>'.
						'<span class="mpcth-of-switcher"><span class="mpcth-of-switcher-slide"><span class="mpcth-of-switcher-thumb">| | |</span><span class="mpcth-of-switcher-on">ON</span><span class="mpcth-of-switcher-off">OFF</span></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('By enabling this option the post author will be displayed at the bottom of the post in single view.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
			'<div class="mpcth-of-section mpcth-of-section-checkbox mpcth-post-format-all">'.
				'<h4>' . __('Display In Single View', 'mpcth') . '</h4>'.
				'<div class="mpcth-of-option">'.
					'<div class="mpcth-of-controls">'.
						'<input type="checkbox" id="mpcth_otc_display_in_single_view" name="display_in_single_view" class="checkbox of-input"'.$display_in_single_view.'/>'.
						'<span class="mpcth-of-switcher"><span class="mpcth-of-switcher-slide"><span class="mpcth-of-switcher-thumb">| | |</span><span class="mpcth-of-switcher-on">ON</span><span class="mpcth-of-switcher-off">OFF</span></span></span>'.
					'</div>'.
					'<div class="mpcth-of-explain">' . __('By enabling this option the featured image/featured shortcode will be displayed at the top of the post in single view.', 'mpcth') . '</div>'.
				'</div>'.
			'</div>'.
		'</div>'.
	'</div>';

	echo $box_output;
}

function save_post_meta_box($post_id) {
	global $mpcth_sidebar_options;
	$id = isset($_POST['post_ID']) ? $_POST['post_ID'] : $post_id;

	// Bail if we're doing an auto save  
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return; 

	// if our nonce isn't there, or we can't verify it, bail 
	if(!isset($_POST['post_meta_box_nonce']) || !wp_verify_nonce($_POST['post_meta_box_nonce'], 'mpc_post_meta_box_nonce')) return; 

	// if our current user can't edit this post, bail  
	if(!current_user_can('edit_post', $id)) return;
 
	// now we can actually save the data  
	$allowed = array(
		'a' => array( // on allow a tags  
			'href' => array() // and those anchors can only have href attribute  
		)
	);

	if(isset($_POST['lightbox_enabled']) && $_POST['lightbox_enabled']) 
		$lightbox_enabled = 'on';
	else 
		$lightbox_enabled = 'off';

	update_post_meta($id, 'lightbox_enabled', $lightbox_enabled);

	if(isset($_POST['full_thumbnail']) && $_POST['full_thumbnail']) 
		$full_thumbnail = 'on';
	else 
		$full_thumbnail = 'off';
		
	update_post_meta($id, 'full_thumbnail', $full_thumbnail);

	if(isset($_POST['display_share_count']) && $_POST['display_share_count']) 
		$display_share_count = 'on';
	else 
		$display_share_count = 'off';
		
	update_post_meta($id, 'display_share_count', $display_share_count);

	if(isset($_POST['display_related']) && $_POST['display_related']) 
		$display_related = 'on';
	else 
		$display_related = 'off';
		
	update_post_meta($id, 'display_related', $display_related);

	if(isset($_POST['display_author']) && $_POST['display_author']) 
		$display_author = 'on';
	else 
		$display_author = 'off';
		
	update_post_meta($id, 'display_author', $display_author);

	if(isset($_POST['display_in_single_view']) && $_POST['display_in_single_view']) 
		$display_in_single_view = 'on';
	else 
		$display_in_single_view = 'off';
		
	update_post_meta($id, 'display_in_single_view', $display_in_single_view);
	
	if(isset($_POST['lightbox_caption']))
		update_post_meta($id, 'lightbox_caption', wp_kses($_POST['lightbox_caption'], $allowed));
			
	if(isset($_POST['lightbox_source']))
		update_post_meta($id, 'lightbox_source', wp_kses($_POST['lightbox_source'], $allowed));

	if(isset($_POST['gallery_images_val']))
		update_post_meta($id, 'gallery_images_val', wp_kses($_POST['gallery_images_val'], $allowed));

	if(isset($_POST['tweet_url']))
		update_post_meta($id, 'tweet_url', $_POST['tweet_url']);

	if(isset($_POST['link_url']))
		update_post_meta($id, 'link_url', $_POST['link_url']);

	if(isset($_POST['quote']))
		update_post_meta($id, 'quote', $_POST['quote']);

	if(isset($_POST['mp3']))
		update_post_meta($id, 'mp3', $_POST['mp3']);

	if(isset($_POST['ogg']))
		update_post_meta($id, 'ogg', $_POST['ogg']);

	if(isset($_POST['m4v']))
		update_post_meta($id, 'm4v', $_POST['m4v']);

	if(isset($_POST['ogv']))
		update_post_meta($id, 'ogv', $_POST['ogv']);

	if(isset($_POST['video_width']))
		update_post_meta($id, 'video_width', $_POST['video_width']);

	if(isset($_POST['video_height']))
		update_post_meta($id, 'video_height', $_POST['video_height']);

	if(isset($_POST['embed_code']))
		update_post_meta($id, 'embed_code', $_POST['embed_code']);

	if(isset($_POST['custom_footer']) && $_POST['custom_footer']) 
		$custom_footer = 'on';
	else 
		$custom_footer = 'off';
		
	update_post_meta($id, 'custom_footer', $custom_footer);

	if(isset($_POST['toggle_footer']))
		update_post_meta($id, 'toggle_footer', wp_kses($_POST['toggle_footer'], $allowed));

	if(isset($_POST['hide_footer']) && $_POST['hide_footer']) 
		$hide_footer = 'on';
	else 
		$hide_footer = 'off';
		
	update_post_meta($id, 'hide_footer', $hide_footer);

	if(isset($_POST['footer_columns']))
		update_post_meta($id, 'footer_columns', wp_kses($_POST['footer_columns'], $allowed));

	if(isset($_POST['custom_footer_select'])) 
		$custom_footer_select = $_POST['custom_footer_select'];
	else 
		$custom_footer_select = $id;

	update_post_meta($id, 'custom_footer_select', $custom_footer_select);

	if($custom_footer_select == $id)
		$custom_footer_select_is_unique = true;
	else
		$custom_footer_select_is_unique = false;

	if(isset($_POST['hide_top_area']) && $_POST['hide_top_area']) 
		$hide_top_area = 'on';
	else 
		$hide_top_area = 'off';
		
	update_post_meta($id, 'hide_top_area', $hide_top_area);

	if(isset($_POST['custom_top_area']) && $_POST['custom_top_area']) 
		$custom_top_area = 'on';
	else 
		$custom_top_area = 'off';
		
	update_post_meta($id, 'custom_top_area', $custom_top_area);

	if(isset($_POST['top_area_columns']))
		update_post_meta($id, 'top_area_columns', wp_kses($_POST['top_area_columns'], $allowed));

	if(isset($_POST['custom_top_area_select'])) 
		$custom_top_area_select = $_POST['custom_top_area_select'];
	else 
		$custom_top_area_select = $id;

	update_post_meta($id, 'custom_top_area_select', $custom_top_area_select);

	if($custom_top_area_select == $id)
		$custom_top_area_select_is_unique = true;
	else
		$custom_top_area_select_is_unique = false;

	if(isset($_POST['featured_shortcode']))
		update_post_meta($id, 'featured_shortcode', wp_kses($_POST['featured_shortcode'], $allowed));

	// Header
	if(isset($_POST['hide_header']) && $_POST['hide_header']) 
		$hide_header = 'on';
	else 
		$hide_header = 'off';
		
	update_post_meta($id, 'hide_header', $hide_header);

	if(isset($_POST['custom_header']) && $_POST['custom_header']) 
		$custom_header = 'on';
	else 
		$custom_header = 'off';
		
	update_post_meta($id, 'custom_header', $custom_header);
	
	if(isset($_POST['header_heading']))
		update_post_meta($id, 'header_heading', wp_kses($_POST['header_heading'], $allowed));

	if(isset($_POST['header_subheading']))
		update_post_meta($id, 'header_subheading', wp_kses($_POST['header_subheading'], $allowed));

	if(isset($_POST['header_type']))
		update_post_meta($id, 'header_type', wp_kses($_POST['header_type'], $allowed));

	if(isset($_POST['header_link_text']))
		update_post_meta($id, 'header_link_text', wp_kses($_POST['header_link_text'], $allowed));

	if(isset($_POST['header_link_url']))
		update_post_meta($id, 'header_link_url', wp_kses($_POST['header_link_url'], $allowed));

	if(isset($_POST['header_text']))
		update_post_meta($id, 'header_text', wp_kses($_POST['header_text'], $allowed));

	// Sidebar
	if(isset($_POST['custom_sidebar_position']) && $_POST['custom_sidebar_position']) 
		$custom_sidebar_position = 'on';
	else 
		$custom_sidebar_position = 'off';

	update_post_meta($id, 'custom_sidebar_position', $custom_sidebar_position);

	if(isset($_POST['sidebar_position']))
		update_post_meta($id, 'sidebar_position', wp_kses($_POST['sidebar_position'], $allowed));

	if(isset($_POST['custom_sidebar']) && $_POST['custom_sidebar']) 
		$custom_sidebar = 'on';
	else 
		$custom_sidebar = 'off';

	update_post_meta($id, 'custom_sidebar', $custom_sidebar);

	if(isset($_POST['custom_sidebar_select'])) 
		$custom_sidebar_select = $_POST['custom_sidebar_select'];
	else 
		$custom_sidebar_select = $id;

	update_post_meta($id, 'custom_sidebar_select', $custom_sidebar_select);

	if($custom_sidebar_select == $id)
		$custom_sidebar_select_is_unique = true;
	else
		$custom_sidebar_select_is_unique = false;

	if(isset($mpcth_sidebar_options)) {
		if($custom_footer == 'on' && $custom_footer_select_is_unique)
			$mpcth_sidebar_options['footer'][$id] = $_POST['post_title'];
		else
			if(isset($mpcth_sidebar_options['footer'][$id]))
				unset($mpcth_sidebar_options['footer'][$id]);

		if($custom_top_area == 'on' && $custom_top_area_select_is_unique)
			$mpcth_sidebar_options['top_area'][$id] = $_POST['post_title'];
		else
			if(isset($mpcth_sidebar_options['top_area'][$id]))
				unset($mpcth_sidebar_options['top_area'][$id]);

		if($custom_sidebar == 'on' && $custom_sidebar_select_is_unique)
			$mpcth_sidebar_options['sidebar'][$id] = $_POST['post_title'];
		else
			if(isset($mpcth_sidebar_options['sidebar'][$id]))
				unset($mpcth_sidebar_options['sidebar'][$id]);
	} else {
		$mpcth_sidebar_options = array();
		$mpcth_sidebar_options['sidebar'] = array();
		$mpcth_sidebar_options['footer'] = array();
		$mpcth_sidebar_options['top_area'] = array();

		if($custom_footer == 'on' && $custom_footer_select_is_unique)
			$mpcth_sidebar_options['footer'][$id] = $_POST['post_title'];

		if($custom_top_area == 'on' && $custom_top_area_select_is_unique)
			$mpcth_sidebar_options['top_area'][$id] = $_POST['post_title'];

		if($custom_sidebar == 'on' && $custom_sidebar_select_is_unique)
			$mpcth_sidebar_options['sidebar'][$id] = $_POST['post_title'];
	}

	update_option('mpcth_sidebar_options', $mpcth_sidebar_options);
}

add_action('save_post', 'save_post_meta_box');
