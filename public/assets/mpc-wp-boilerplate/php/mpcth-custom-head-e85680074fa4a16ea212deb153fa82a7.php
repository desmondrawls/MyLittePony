<?php

/**
 * Custom Head
 *
 * Functions for adding custom styles on front page and admin panel.
 *
 * @package WordPress
 * @subpackage MPC WP Boilerplate
 * @since 1.0
 *
 */

function mpcth_add_custom_styles() {
	global $mpcth_options_name;
	$mpcth_options = get_option($mpcth_options_name);
?>

<!--[if lte IE 10]>
	<link rel="stylesheet" href="<?php echo MPC_THEME_ROOT ?>/mpc-wp-boilerplate/css/ie.css"/>
<![endif]-->

<!--[if lt IE 9]>
	<script src="<?php echo MPC_THEME_ROOT ?>/mpc-wp-boilerplate/js/html5.js" type="text/javascript"></script>
	<link rel="stylesheet" href="<?php echo MPC_THEME_ROOT ?>/mpc-wp-boilerplate/css/ie8.css"/>
<![endif]-->

<?php if(isset($mpcth_options['mpcth_content_font']) && is_array($mpcth_options['mpcth_content_font']))
	if($mpcth_options['mpcth_content_font']['type'] == 'google') {
		$name = str_replace(' ', '+', $mpcth_options['mpcth_content_font']['family']); ?>
		<link href="http://fonts.googleapis.com/css?family=<?php echo $name . ($mpcth_options['mpcth_content_font']['style'] != '' && $mpcth_options['mpcth_content_font']['style'] != 'regular' ? ':' . $mpcth_options['mpcth_content_font']['style'] : ''); ?>" rel="stylesheet" type="text/css">
<?php } elseif($mpcth_options['mpcth_content_font']['type'] == 'cufon') { ?>
		<script type="text/javascript" src="<?php echo $mpcth_options['mpcth_content_font']['font-source']; ?>"></script>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				Cufon.replace('#mpcth_page_wrap', { fontFamily: '<?php echo $mpcth_options['mpcth_content_font']['family']; ?>', hover: true });
			})
		</script>
<?php } ?>

<?php if(isset($mpcth_options['mpcth_menu_font']) && is_array($mpcth_options['mpcth_menu_font']))
	if($mpcth_options['mpcth_menu_font']['type'] == 'google') {
		$name = str_replace(' ', '+', $mpcth_options['mpcth_menu_font']['family']); ?>
		<link href="http://fonts.googleapis.com/css?family=<?php echo $name . ($mpcth_options['mpcth_menu_font']['style'] != '' && $mpcth_options['mpcth_menu_font']['style'] != 'regular' ? ':' . $mpcth_options['mpcth_menu_font']['style'] : ''); ?>" rel="stylesheet" type="text/css">
<?php } elseif($mpcth_options['mpcth_menu_font']['type'] == 'cufon') { ?>
		<script type="text/javascript" src="<?php echo $mpcth_options['mpcth_menu_font']['font-source']; ?>"></script>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				Cufon.replace('#mpcth_page_wrap #mpcth_nav #mpcth_menu', { fontFamily: '<?php echo $mpcth_options['mpcth_menu_font']['family']; ?>', hover: true });
			})
		</script>
<?php } ?>

<?php if(isset($mpcth_options['mpcth_heading_font']) && is_array($mpcth_options['mpcth_heading_font']))
	if($mpcth_options['mpcth_heading_font']['type'] == 'google') {
		$name = str_replace(' ', '+', $mpcth_options['mpcth_heading_font']['family']); ?>
		<link href="http://fonts.googleapis.com/css?family=<?php echo $name . ($mpcth_options['mpcth_heading_font']['style'] != '' && $mpcth_options['mpcth_heading_font']['style'] != 'regular' ? ':' . $mpcth_options['mpcth_heading_font']['style'] : ''); ?>" rel="stylesheet" type="text/css">
<?php } elseif($mpcth_options['mpcth_heading_font']['type'] == 'cufon') { ?>
		<script type="text/javascript" src="<?php echo $mpcth_options['mpcth_heading_font']['font-source']; ?>"></script>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				Cufon.replace('#mpcth_page_wrap h1, #mpcth_page_wrap h2, #mpcth_page_wrap h3, #mpcth_page_wrap h4, #mpcth_page_wrap h5, #mpcth_page_wrap h6', { fontFamily: '<?php echo $mpcth_options['mpcth_heading_font']['family']; ?>', hover: true });
			})
		</script>
<?php } ?>

<?php if(isset($mpcth_options['mpcth_small_font']) && is_array($mpcth_options['mpcth_small_font']))
	if($mpcth_options['mpcth_small_font']['type'] == 'google') {
		$name = str_replace(' ', '+', $mpcth_options['mpcth_small_font']['family']); ?>
		<link href="http://fonts.googleapis.com/css?family=<?php echo $name . ($mpcth_options['mpcth_small_font']['style'] != '' && $mpcth_options['mpcth_small_font']['style'] != 'regular' ? ':' . $mpcth_options['mpcth_small_font']['style'] : ''); ?>" rel="stylesheet" type="text/css">
<?php } elseif($mpcth_options['mpcth_small_font']['type'] == 'cufon') { ?>
		<script type="text/javascript" src="<?php echo $mpcth_options['mpcth_small_font']['font-source']; ?>"></script>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				Cufon.replace('#mpcth_page_wrap small', { fontFamily: '<?php echo $mpcth_options['mpcth_small_font']['family']; ?>', hover: true });
			})
		</script>
<?php } ?>

<style type="text/css">
	
/* ---------------------------------------------------------------- */
/*	FONTS
/* ---------------------------------------------------------------- */

	/* Menu Font */
	#mpcth_page_wrap #mpcth_nav #mpcth_menu {
		<?php if(isset($mpcth_options['mpcth_menu_font']) && isset($mpcth_options['mpcth_menu_font']['type']) && $mpcth_options['mpcth_menu_font']['type'] == 'google') { ?>
			<?php echo 'font-family: \'' . $mpcth_options['mpcth_menu_font']['family'] . '\';' . PHP_EOL; ?>
			<?php echo isset($mpcth_options['mpcth_menu_font']['font-weight']) && $mpcth_options['mpcth_menu_font']['font-weight'] != '' && $mpcth_options['mpcth_menu_font']['font-weight'] != 'regular' ? 'font-weight: '. $mpcth_options['mpcth_menu_font']['font-weight'] . ';' . PHP_EOL : ''; ?>
			<?php echo isset($mpcth_options['mpcth_menu_font']['font-style']) && $mpcth_options['mpcth_menu_font']['font-style'] != '' ? 'font-style: '. $mpcth_options['mpcth_menu_font']['font-style'] . ';' . PHP_EOL : ''; ?>
		<?php } ?>
	}

	/* Heading Font */
	#mpcth_page_wrap h1, #mpcth_page_wrap h2, #mpcth_page_wrap h3, #mpcth_page_wrap h4, #mpcth_page_wrap h5, #mpcth_page_wrap h6 {
		<?php if(isset($mpcth_options['mpcth_heading_font']) && isset($mpcth_options['mpcth_heading_font']['type']) && $mpcth_options['mpcth_heading_font']['type'] == 'google') { ?>
			<?php echo 'font-family: \'' . $mpcth_options['mpcth_heading_font']['family'] . '\';' . PHP_EOL; ?>
			<?php echo isset($mpcth_options['mpcth_heading_font']['font-weight']) && $mpcth_options['mpcth_heading_font']['font-weight'] != '' && $mpcth_options['mpcth_heading_font']['font-weight'] != 'regular' ? 'font-weight: '. $mpcth_options['mpcth_heading_font']['font-weight'] . ';' . PHP_EOL : ''; ?>
			<?php echo isset($mpcth_options['mpcth_heading_font']['font-style']) && $mpcth_options['mpcth_heading_font']['font-style'] != '' ? 'font-style: '. $mpcth_options['mpcth_heading_font']['font-style'] . ';' . PHP_EOL : ''; ?>
		<?php } ?>
	}

	/* Content Font */
	#mpcth_page_wrap {
		<?php if(isset($mpcth_options['mpcth_content_font']) && isset($mpcth_options['mpcth_content_font']['type']) && $mpcth_options['mpcth_content_font']['type'] == 'google') { ?>
			<?php echo 'font-family: \'' . $mpcth_options['mpcth_content_font']['family'] . '\';' . PHP_EOL; ?>
			<?php echo isset($mpcth_options['mpcth_content_font']['font-weight']) && $mpcth_options['mpcth_content_font']['font-weight'] != '' && $mpcth_options['mpcth_content_font']['font-weight'] != 'regular' ? 'font-weight: '. $mpcth_options['mpcth_content_font']['font-weight'] . ';' . PHP_EOL : ''; ?>
			<?php echo isset($mpcth_options['mpcth_content_font']['font-style']) && $mpcth_options['mpcth_content_font']['font-style'] != '' ? 'font-style: '. $mpcth_options['mpcth_content_font']['font-style'] . ';' . PHP_EOL : ''; ?>
		<?php } ?>
	}

	/* Small Font */
	#mpcth_page_wrap small {
		<?php if(isset($mpcth_options['mpcth_small_font']) && isset($mpcth_options['mpcth_small_font']['type']) && $mpcth_options['mpcth_small_font']['type'] == 'google') { ?>
			<?php echo 'font-family: \'' . $mpcth_options['mpcth_small_font']['family'] . '\';' . PHP_EOL; ?>
			<?php echo isset($mpcth_options['mpcth_small_font']['font-weight']) && $mpcth_options['mpcth_small_font']['font-weight'] != '' && $mpcth_options['mpcth_small_font']['font-weight'] != 'regular' ? 'font-weight: '. $mpcth_options['mpcth_small_font']['font-weight'] . ';' . PHP_EOL : ''; ?>
			<?php echo isset($mpcth_options['mpcth_small_font']['font-style']) && $mpcth_options['mpcth_small_font']['font-style'] != '' ? 'font-style: '. $mpcth_options['mpcth_small_font']['font-style'] . ';' . PHP_EOL : ''; ?>
		<?php } ?>
	}

	/* Content */
	#mpcth_page_wrap {
		<?php echo isset($mpcth_options['mpcth_content_font_size']) ? 'font-size: '. $mpcth_options['mpcth_content_font_size'] . ';' . PHP_EOL : ''; ?>
	}

	/* Menu */

	/* Category Filter */
	#mpcth_page_wrap .mpcth-filterable-categories a {
		<?php echo isset($mpcth_options['mpcth_cat_filter_font_size']) ? 'font-size: '. $mpcth_options['mpcth_cat_filter_font_size'] . ';' . PHP_EOL : ''; ?>
	}

	/* Read More */
	#mpcth_page_wrap .mpcth-portfolio-read-more,
	#mpcth_page_wrap .mpcth-blog-read-more {
		<?php echo isset($mpcth_options['mpcth_more_font_size']) ? 'font-size: '. $mpcth_options['mpcth_more_font_size'] . ';' . PHP_EOL : ''; ?>
	}

	/* Form Text */
	#mpcth_page_wrap #mpcth_contact_form input,
	#mpcth_page_wrap #comments #respond #commentform input,
	#mpcth_page_wrap #mpcth_contact_form textarea,
	#mpcth_page_wrap #comments #respond #commentform .comment-form-comment textarea {
		<?php echo isset($mpcth_options['mpcth_form_font_size']) ? 'font-size: '. $mpcth_options['mpcth_form_font_size'] . ';' . PHP_EOL : ''; ?>
	}

	/* Form Button */
	#mpcth_page_wrap #mpcth_contact_form #submit,
	#mpcth_page_wrap #commentform #submit {
		<?php echo isset($mpcth_options['mpcth_button_font_size']) ? 'font-size: '. $mpcth_options['mpcth_button_font_size'] . ';' . PHP_EOL : ''; ?>
	}

	/* Footer */
	#mpcth_page_wrap #mpcth_footer #mpcth_footer_content,
	#mpcth_page_wrap #mpcth_footer #mpcth_bottom_footer {
		<?php echo isset($mpcth_options['mpcth_footer_font_size']) ? 'font-size: '. $mpcth_options['mpcth_footer_font_size'] . ';' . PHP_EOL : ''; ?>
	}

	/* Footer Heading */
	#mpcth_page_wrap #mpcth_footer #mpcth_footer_content ul > li .widget_title {
		<?php echo isset($mpcth_options['mpcth_footer_heading_font_size']) ? 'font-size: '. $mpcth_options['mpcth_footer_heading_font_size'] . ';' . PHP_EOL : ''; ?>
	}

	/* Sidebar */
	#mpcth_page_wrap #mpcth_sidebar ul > li {
		<?php echo isset($mpcth_options['mpcth_sidebar_font_size']) ? 'font-size: '. $mpcth_options['mpcth_sidebar_font_size'] . ';' . PHP_EOL : ''; ?>
	}

	/* Sidebar Heading  */
	#mpcth_page_wrap #mpcth_sidebar li .widget_title {
		<?php echo isset($mpcth_options['mpcth_sidebar_heading_font_size']) ? 'font-size: '. $mpcth_options['mpcth_sidebar_heading_font_size'] . ';' . PHP_EOL : ''; ?>
	}

	/* Small Font Size */
	#mpcth_page_wrap #mpcth_contact_form .form-allowed-tags,
	#mpcth_page_wrap #commentform .form-allowed-tags,
	#mpcth_page_wrap #mpcth_contact_form label.error,
	#mpcth_page_wrap #commentform label.error,
	#mpcth_page_wrap #comments header.vcard,
	#mpcth_page_wrap small,
	#mpcth_page_wrap meta {
		<?php echo isset($mpcth_options['mpcth_small_font_size']) ? 'font-size: '. $mpcth_options['mpcth_small_font_size'] . ';' . PHP_EOL : ''; ?>
	}

	/* Headings */
	#mpcth_page_wrap h1 {
		<?php echo isset($mpcth_options['mpcth_h1_font_size']) ? 'font-size: '. $mpcth_options['mpcth_h1_font_size'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap h2 {
		<?php echo isset($mpcth_options['mpcth_h2_font_size']) ? 'font-size: '. $mpcth_options['mpcth_h2_font_size'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap h3 {
		<?php echo isset($mpcth_options['mpcth_h3_font_size']) ? 'font-size: '. $mpcth_options['mpcth_h3_font_size'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap h4 {
		<?php echo isset($mpcth_options['mpcth_h4_font_size']) ? 'font-size: '. $mpcth_options['mpcth_h4_font_size'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap h5 {
		<?php echo isset($mpcth_options['mpcth_h5_font_size']) ? 'font-size: '. $mpcth_options['mpcth_h5_font_size'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap h6 {
		<?php echo isset($mpcth_options['mpcth_h6_font_size']) ? 'font-size: '. $mpcth_options['mpcth_h6_font_size'] . ';' . PHP_EOL : ''; ?>
	}

/* ---------------------------------------------------------------- */
/*	COLORS
/* ---------------------------------------------------------------- */

	/* Global */
	#mpcth_page_wrap .mpcth-recent-posts-widget .mpcth-recent-post .mpcth-recent-posts-title,
	#mpcth_page_wrap h1, #mpcth_page_wrap h2, #mpcth_page_wrap h3, #mpcth_page_wrap h4, #mpcth_page_wrap h5, #mpcth_page_wrap h6,
	#mpcth_page_wrap h1 a, #mpcth_page_wrap h2 a, #mpcth_page_wrap h3 a, #mpcth_page_wrap h4 a, #mpcth_page_wrap h5 a, #mpcth_page_wrap h6 a {
		<?php echo isset($mpcth_options['mpcth_color_global_heading']) ? 'color: '. $mpcth_options['mpcth_color_global_heading'] . ';' . PHP_EOL : ''; ?>
	}


	#mpcth_page_wrap #mpcth_page_container #mpcth_page_content .mpcth-sc-client .mpcth-sc-client-content,
	/*#mpcth_page_wrap #mpcth_page_container.single-post #mpcth_page_content article.post .mpcth-post-nav > a .mpcth-sc-icon-left-open,*/
	/*#mpcth_page_wrap #mpcth_page_container.single-post #mpcth_page_content article.post .mpcth-post-nav > a .mpcth-sc-icon-right-open,*/
	#mpcth_page_wrap .mpcth-pagination a,
	#mpcth_page_wrap #mpcth_page_articles article.post small a,
	#mpcth_page_wrap {
		<?php echo isset($mpcth_options['mpcth_color_global_body']) ? 'color: '. $mpcth_options['mpcth_color_global_body'] . ';' . PHP_EOL : ''; ?>
	}



	#mpcth_page_wrap a {
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'color: '. $mpcth_options['mpcth_color_global_link'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap article.post small a:hover,
	#mpcth_page_wrap article.post small .zilla-likes.active:before,
	#mpcth_page_wrap article.post small .zilla-likes:hover:before,
	#mpcth_page_wrap .mpcth-pagination .current,
	#mpcth_page_wrap .mpcth-pagination a:hover {
		<?php echo isset($mpcth_options['mpcth_color_global_linkhover']) ? 'color: '. $mpcth_options['mpcth_color_global_link'] . '!important;' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap a:hover {
		<?php echo isset($mpcth_options['mpcth_color_global_linkhover']) ? 'color: '. $mpcth_options['mpcth_color_global_linkhover'] . ';' . PHP_EOL : ''; ?>
	}

	/*#mpcth_page_wrap ul.sub-menu {
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'border-top-color: '. $mpcth_options['mpcth_color_global_link'] . '!important;' . PHP_EOL : ''; ?>
	}*/
	
	#mpcth_page_wrap a.mpcth-alt-link {
		<?php echo isset($mpcth_options['mpcth_color_global_alt_link']) ? 'color: '. $mpcth_options['mpcth_color_global_alt_link'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap a.mpcth-alt-link:hover {
		<?php echo isset($mpcth_options['mpcth_color_global_alt_linkhover']) ? 'color: '. $mpcth_options['mpcth_color_global_alt_linkhover'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap h1 a:hover, #mpcth_page_wrap h2 a:hover, #mpcth_page_wrap h3 a:hover, #mpcth_page_wrap h4 a:hover, #mpcth_page_wrap h5 a:hover, #mpcth_page_wrap h6 a:hover {
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'color: '. $mpcth_options['mpcth_color_global_link'] . ';' . PHP_EOL : ''; ?>
	}

	/* Backgrounds */
	#mpcth_page_header_wrap {
		<?php echo isset($mpcth_options['mpcth_color_bg_header']) ? 'background: '. $mpcth_options['mpcth_color_bg_header'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_wrap {
		<?php
			if(isset($mpcth_options['mpcth_background_type']))
				if($mpcth_options['mpcth_background_type'] == 'pattern_background' && isset($mpcth_options['mpcth_background_pattern'])) {
					echo 'background-image: url(\'' . MPC_THEME_ROOT . '/mpc-wp-boilerplate/images/patterns/' . $mpcth_options['mpcth_background_pattern'] . '.png\');';
				} elseif($mpcth_options['mpcth_background_type'] == 'custom_background' && isset($mpcth_options['mpcth_custom_bg'])) {
					echo 'background-image: url(\'' . $mpcth_options['mpcth_custom_bg'] . '\');';
					if(isset($mpcth_options['mpcth_repeat_background']) && $mpcth_options['mpcth_repeat_background'] != '')
						echo 'background-repeat: repeat;';
					else
						echo 'background-repeat: no-repeat;';
				}
		?>
		<?php echo isset($mpcth_options['mpcth_color_bg_main']) ? 'background-color: '. $mpcth_options['mpcth_color_bg_main'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_footer {
		<?php echo isset($mpcth_options['mpcth_color_bg_footer']) ? 'background: '. $mpcth_options['mpcth_color_bg_footer'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_bottom_footer {
		<?php echo isset($mpcth_options['mpcth_copyrights_bg']) ? 'background: '. $mpcth_options['mpcth_copyrights_bg'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_sidebar {
		<?php echo isset($mpcth_options['mpcth_color_bg_sidebar']) ? 'background: '. $mpcth_options['mpcth_color_bg_sidebar'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_articles {
		<?php echo isset($mpcth_options['mpcth_color_bg_container']) ? 'background: '. $mpcth_options['mpcth_color_bg_container'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_menu {
		<?php echo isset($mpcth_options['mpcth_mainmenu_bg']) ? 'background: '. $mpcth_options['mpcth_mainmenu_bg'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_menu > ul {
		<?php echo isset($mpcth_options['mpcth_mainmenu_bg']) ? 'background: '. $mpcth_options['mpcth_mainmenu_bg'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_articles .post {
		<?php echo isset($mpcth_options['mpcth_color_bg_post']) ? 'background: '. $mpcth_options['mpcth_color_bg_post'] . '!important;' . PHP_EOL : ''; ?>
	}
	#mpcth_top_widget_area {
		<?php echo isset($mpcth_options['mpcth_top_widget_bg']) ? 'background: '. $mpcth_options['mpcth_top_widget_bg'] . ';' . PHP_EOL : ''; ?>
	}

	/* Main Menu */
	#mpcth_nav #mpcth_menu .menu-item a {
		<?php echo isset($mpcth_options['mpcth_color_mm_menu']) ? 'color: '. $mpcth_options['mpcth_color_mm_menu'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_mm_bg_menu']) ? 'background: '. $mpcth_options['mpcth_color_mm_bg_menu'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_nav #mpcth_menu .menu-item .sub-menu a {
		<?php echo isset($mpcth_options['mpcth_color_mm_drop']) ? 'color: '. $mpcth_options['mpcth_color_mm_drop'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_mm_bg_drop']) ? 'background: '. $mpcth_options['mpcth_color_mm_bg_drop'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_nav #mpcth_menu .menu-item .sub-menu {
		<?php echo isset($mpcth_options['mpcth_color_mm_bg_drop']) ? 'border-bottom-color: '. mpcth_adjust_brightness($mpcth_options['mpcth_color_mm_bg_drop'], -20) . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_mm_bg_drop']) ? 'background: '. mpcth_adjust_brightness($mpcth_options['mpcth_color_mm_bg_drop'], -20) . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_nav #mpcth_menu .menu-item.current-menu-item > a,
	#mpcth_nav #mpcth_menu .menu-item.current-menu-ancestor > a {
		<?php echo isset($mpcth_options['mpcth_color_mm_menuactive']) ? 'color: '. $mpcth_options['mpcth_color_mm_dropactive'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_mm_bg_menuactive']) ? 'background: '. $mpcth_options['mpcth_color_mm_bg_dropactive'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_mm_bg_menuactive']) ? 'border-top-color: '. $mpcth_options['mpcth_color_mm_bg_dropactive'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_nav #mpcth_menu > .menu-item.current-menu-item > a,
	#mpcth_nav #mpcth_menu > .menu-item.current-menu-ancestor > a {
		<?php echo isset($mpcth_options['mpcth_color_mm_menuactive']) ? 'color: '. $mpcth_options['mpcth_color_mm_menuactive'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_mm_bg_menuactive']) ? 'background: '. $mpcth_options['mpcth_color_mm_bg_menuactive'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_mm_bg_menuactive']) ? 'border-top-color: '. $mpcth_options['mpcth_color_mm_bg_menuactive'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_nav #mpcth_menu .menu-item .sub-menu .current-menu-item a {
		<?php echo isset($mpcth_options['mpcth_color_mm_dropactive']) ? 'color: '. $mpcth_options['mpcth_color_mm_dropactive'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_mm_bg_dropactive']) ? 'background: '. $mpcth_options['mpcth_color_mm_bg_dropactive'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_nav #mpcth_menu .menu-item a:hover,
	#mpcth_nav #mpcth_menu .menu-item.current-menu-item a:hover,
	#mpcth_nav #mpcth_menu .menu-item.current-menu-ancestor a:hover {
		<?php echo isset($mpcth_options['mpcth_color_mm_menu_hover']) ? 'color: '. $mpcth_options['mpcth_color_mm_menu_hover'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_mm_bg_menu_hover']) ? 'background: '. $mpcth_options['mpcth_color_mm_bg_menu_hover'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_nav #mpcth_menu .menu-item .sub-menu a:hover,
	#mpcth_nav #mpcth_menu .menu-item .sub-menu .current-menu-item a:hover {
		<?php echo isset($mpcth_options['mpcth_color_mm_drop_hover']) ? 'color: '. $mpcth_options['mpcth_color_mm_drop_hover'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_mm_bg_drop_hover']) ? 'background: '. $mpcth_options['mpcth_color_mm_bg_drop_hover'] . ';' . PHP_EOL : ''; ?>
	}

	/* Top Menu */
	#mpcth_page_header_content #mpcth_secondary_nav #mpcth_secondary_menu .menu-item a {
		<?php echo isset($mpcth_options['mpcth_color_tm_menu']) ? 'color: '. $mpcth_options['mpcth_color_tm_menu'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_tm_itembg']) ? 'background: '. $mpcth_options['mpcth_color_tm_itembg'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_header_content #mpcth_secondary_nav #mpcth_secondary_menu .menu-item a:hover,
	#mpcth_page_header_content #mpcth_secondary_nav #mpcth_secondary_menu .menu-item.current-menu-item a:hover {
		<?php echo isset($mpcth_options['mpcth_color_tm_menu_hover']) ? 'color: '. $mpcth_options['mpcth_color_tm_menu_hover'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_tm_itembg_hover']) ? 'background: '. $mpcth_options['mpcth_color_tm_itembg_hover'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_header_content #mpcth_secondary_nav #mpcth_secondary_menu .menu-item.current-menu-item a {
		<?php echo isset($mpcth_options['mpcth_color_tm_menuactive']) ? 'color: '. $mpcth_options['mpcth_color_tm_menuactive'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_tm_itembgactive']) ? 'background: '. $mpcth_options['mpcth_color_tm_itembgactive'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_header_content #mpcth_secondary_nav_wrap {
		<?php echo isset($mpcth_options['mpcth_color_tm_bg']) ? 'background: '. $mpcth_options['mpcth_color_tm_bg'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_header_content .mpcth-social-icons li a .mpcth-social-bg span {
		<?php echo isset($mpcth_options['mpcth_color_tm_menu']) ? 'color: '. $mpcth_options['mpcth_color_tm_menu'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_header_content .mpcth-social-icons li a .mpcth-social-bg-over span {
		<?php echo isset($mpcth_options['mpcth_color_tm_menu_hover']) ? 'color: '. $mpcth_options['mpcth_color_tm_menu_hover'] . ';' . PHP_EOL : ''; ?>
	}

	/* Comment Form */
	#mpcth_page_wrap #mpcth_page_articles article.post-password-required form input[type=password],
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-url input,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-email input,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-author input,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-comment textarea {
		<?php echo isset($mpcth_options['mpcth_color_cf_color']) ? 'color: ' . $mpcth_options['mpcth_color_cf_color'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_cf_bg']) ? 'background: ' . $mpcth_options['mpcth_color_cf_bg'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_cf_bg']) ? 'border-bottom-color: ' . mpcth_adjust_brightness($mpcth_options['mpcth_color_cf_bg'], -20) . ';' . PHP_EOL : ''; ?>
		/*<?php echo isset($mpcth_options['mpcth_color_cf_border']) ? 'border-color: ' . $mpcth_options['mpcth_color_cf_border'] . ';' . PHP_EOL : ''; ?>*/
	}

	#mpcth_page_wrap #mpcth_page_articles article.post-password-required form input[type=password]:focus,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-url input:focus,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-email input:focus,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-author input:focus,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-comment textarea:focus,
	#mpcth_page_wrap #mpcth_page_articles article.post-password-required form input[type=password]:hover,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-url input:hover,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-email input:hover,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-author input:hover,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-comment textarea:hover {
		<?php echo isset($mpcth_options['mpcth_color_cf_color_hover']) ? 'color: ' . $mpcth_options['mpcth_color_cf_color_hover'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_cf_bg_hover']) ? 'background: ' . $mpcth_options['mpcth_color_cf_bg_hover'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_cf_bg_hover']) ? 'border-bottom-color: ' . mpcth_adjust_brightness($mpcth_options['mpcth_color_cf_bg_hover'], -20) . ';' . PHP_EOL : ''; ?>
		/*<?php echo isset($mpcth_options['mpcth_color_cf_border_hover']) ? 'border-color: ' . $mpcth_options['mpcth_color_cf_border_hover'] . ';' . PHP_EOL : ''; ?>*/
	}

/*	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-url input:focus,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-email input:focus,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-author input:focus,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-comment textarea:focus {
		<?php echo isset($mpcth_options['mpcth_color_cf_color_active']) ? 'color: ' . $mpcth_options['mpcth_color_cf_color_active'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_cf_bg_active']) ? 'background: ' . $mpcth_options['mpcth_color_cf_bg_active'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_cf_border_active']) ? 'border-color: ' . $mpcth_options['mpcth_color_cf_border_active'] . ';' . PHP_EOL : ''; ?>
	}*/
	
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-url input.error,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-email input.error,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-author input.error,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .comment-form-comment textarea.error {
		<?php echo isset($mpcth_options['mpcth_color_cf_color_error']) ? 'color: ' . $mpcth_options['mpcth_color_cf_color_error'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_cf_bg_error']) ? 'background: ' . $mpcth_options['mpcth_color_cf_bg_error'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_cf_bg_error']) ? 'border-bottom-color: ' . mpcth_adjust_brightness($mpcth_options['mpcth_color_cf_bg_error'], -20) . ';' . PHP_EOL : ''; ?>
		/*<?php echo isset($mpcth_options['mpcth_color_cf_border_error']) ? 'border-color: ' . $mpcth_options['mpcth_color_cf_border_error'] . ';' . PHP_EOL : ''; ?>*/
	}

	#mpcth_page_articles #comments .commentlist article.comment header.comment-meta span {
		<?php echo isset($mpcth_options['mpcth_color_cf_author_text']) ? 'color: ' . $mpcth_options['mpcth_color_cf_author_text'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_cf_author_bg']) ? 'background: ' . $mpcth_options['mpcth_color_cf_author_bg'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform label.error {
		<?php echo isset($mpcth_options['mpcth_color_cf_label_error']) ? 'color: ' . $mpcth_options['mpcth_color_cf_label_error'] . ';' . PHP_EOL : ''; ?>
	}

	/* Contact Form */
	#mpcth_contact_form .mpcth-cf-form-author input,
	#mpcth_contact_form .mpcth-cf-form-email input,
	#mpcth_contact_form .mpcth-cf-form-message textarea {
		<?php echo isset($mpcth_options['mpcth_color_cu_color']) ? 'color: ' . $mpcth_options['mpcth_color_cu_color'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_cu_bg']) ? 'background: ' . $mpcth_options['mpcth_color_cu_bg'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_cu_bg']) ? 'border-bottom-color: ' . mpcth_adjust_brightness($mpcth_options['mpcth_color_cu_bg'], -20) . ';' . PHP_EOL : ''; ?>
		/*<?php echo isset($mpcth_options['mpcth_color_cu_border']) ? 'border-color: ' . $mpcth_options['mpcth_color_cu_border'] . ';' . PHP_EOL : ''; ?>*/
	}

	#mpcth_contact_form .mpcth-cf-form-author input:focus,
	#mpcth_contact_form .mpcth-cf-form-email input:focus,
	#mpcth_contact_form .mpcth-cf-form-message textarea:focus,
	#mpcth_contact_form .mpcth-cf-form-author input:hover,
	#mpcth_contact_form .mpcth-cf-form-email input:hover,
	#mpcth_contact_form .mpcth-cf-form-message textarea:hover {
		<?php echo isset($mpcth_options['mpcth_color_cu_color_hover']) ? 'color: ' . $mpcth_options['mpcth_color_cu_color_hover'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_cu_bg_hover']) ? 'background: ' . $mpcth_options['mpcth_color_cu_bg_hover'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_cu_bg_hover']) ? 'border-bottom-color: ' . mpcth_adjust_brightness($mpcth_options['mpcth_color_cu_bg_hover'], -20) . ';' . PHP_EOL : ''; ?>
		/*<?php echo isset($mpcth_options['mpcth_color_cu_border_hover']) ? 'border-color: ' . $mpcth_options['mpcth_color_cu_border_hover'] . ';' . PHP_EOL : ''; ?>*/
	}
	
/*	#mpcth_contact_form .mpcth-cf-form-author input:focus,
	#mpcth_contact_form .mpcth-cf-form-email input:focus,
	#mpcth_contact_form .mpcth-cf-form-message input:focus{
		<?php echo isset($mpcth_options['mpcth_color_cu_color_active']) ? 'color: ' . $mpcth_options['mpcth_color_cu_color_active'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_cu_bg_active']) ? 'background: ' . $mpcth_options['mpcth_color_cu_bg_active'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_cu_border_active']) ? 'border-color: ' . $mpcth_options['mpcth_color_cu_border_active'] . ';' . PHP_EOL : ''; ?>
	}*/

	#mpcth_contact_form .mpcth-cf-form-author input.error,
	#mpcth_contact_form .mpcth-cf-form-email input.error,
	#mpcth_contact_form .mpcth-cf-form-message textarea.error {
		<?php echo isset($mpcth_options['mpcth_color_cu_color_error']) ? 'color: ' . $mpcth_options['mpcth_color_cu_color_error'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_cu_bg_error']) ? 'background: ' . $mpcth_options['mpcth_color_cu_bg_error'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_cu_bg_error']) ? 'border-bottom-color: ' . mpcth_adjust_brightness($mpcth_options['mpcth_color_cu_bg_error'], -20) . ';' . PHP_EOL : ''; ?>
		/*<?php echo isset($mpcth_options['mpcth_color_cu_border_error']) ? 'border-color: ' . $mpcth_options['mpcth_color_cu_border_error'] . ';' . PHP_EOL : ''; ?>*/
	}

	#mpcth_contact_form label.error {
		<?php echo isset($mpcth_options['mpcth_color_cu_label_error']) ? 'color: ' . $mpcth_options['mpcth_color_cu_label_error'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_contact_form .mpcth-cf-success {
		<?php echo isset($mpcth_options['mpcth_color_cu_label_success']) ? 'color: ' . $mpcth_options['mpcth_color_cu_label_success'] . ';' . PHP_EOL : ''; ?>
	}

	/* Logo */
	#mpcth_page_wrap #mpcth_logo {
		<?php echo isset($mpcth_options['mpcth_logo_top']) ? 'margin-top: ' . $mpcth_options['mpcth_logo_top'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_logo_right']) ? 'margin-right: ' . $mpcth_options['mpcth_logo_right'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_logo_bottom']) ? 'margin-bottom: ' . $mpcth_options['mpcth_logo_bottom'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_logo_left']) ? 'margin-left: ' . $mpcth_options['mpcth_logo_left'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_wrap #mpcth_logo h1 {
		<?php echo isset($mpcth_options['mpcth_text_logo_color']) ? 'color: ' . $mpcth_options['mpcth_text_logo_color'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_text_logo_bg']) ? 'background: ' . $mpcth_options['mpcth_text_logo_bg'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_wrap #mpcth_logo small {
		<?php echo isset($mpcth_options['mpcth_text_logo_description_color']) ? 'color: ' . $mpcth_options['mpcth_text_logo_description_color'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_text_logo_description_bg']) ? 'background: ' . $mpcth_options['mpcth_text_logo_description_bg'] . ';' . PHP_EOL : ''; ?>
	}

	/* Submit Button */
	#mpcth_page_wrap #mpcth_contact_form #submit,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .form-submit #submit {
		<?php echo isset($mpcth_options['mpcth_color_submit_text']) ? 'color: ' . $mpcth_options['mpcth_color_submit_text'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_submit_bg']) ? 'background: ' . $mpcth_options['mpcth_color_submit_bg'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_submit_bg']) ? 'border-bottom-color: ' . mpcth_adjust_brightness($mpcth_options['mpcth_color_submit_bg'], -20) . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap #mpcth_contact_form #submit:hover,
	#mpcth_page_wrap #mpcth_page_articles #comments #respond #commentform .form-submit #submit:hover {
		<?php echo isset($mpcth_options['mpcth_color_submit_text_hover']) ? 'color: ' . $mpcth_options['mpcth_color_submit_text_hover'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_submit_bg_hover']) ? 'background: ' . $mpcth_options['mpcth_color_submit_bg_hover'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_submit_bg_hover']) ? 'border-bottom-color: ' . mpcth_adjust_brightness($mpcth_options['mpcth_color_submit_bg_hover'], -20) . ';' . PHP_EOL : ''; ?>
	}

	/* Blog & Portfolio */

	#mpcth_page_wrap article.post small,
	#mpcth_page_wrap article.post small .zilla-likes .zilla-likes-count,
	#mpcth_page_wrap article.post small .zilla-likes:before,
	#mpcth_page_wrap #comments header.vcard {
		<?php echo isset($mpcth_options['mpcth_color_meta']) ? 'color: ' . $mpcth_options['mpcth_color_meta'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap .zilla-likes:hover:before,
	#mpcth_page_wrap .zilla-likes.active:before,
	#mpcth_page_wrap article.post small a,
	#mpcth_page_wrap #comments header.vcard a {
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'color: ' . $mpcth_options['mpcth_color_global_link'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap .mpcth-post-content-inside {
		<?php echo isset($mpcth_options['mpcth_color_item_hover']) ? 'background: rgba(' . implode(', ', mpcth_hex_to_rgba($mpcth_options['mpcth_color_item_hover'], 0.95)) . ' ) !important;' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_item_hover']) ? 'border-bottom-color: ' . mpcth_adjust_brightness($mpcth_options['mpcth_color_item_hover'], -20) . ' !important;' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap article.post small a:hover,
	#mpcth_page_wrap #comments header.vcard a:hover {
		<?php echo isset($mpcth_options['mpcth_color_global_linkhover']) ? 'color: ' . $mpcth_options['mpcth_color_global_linkhover'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap #mpcth_page_articles article.post-password-required form input[type=submit],
	#mpcth_page_wrap #mpcth_page_articles article.post a.mpcth-portfolio-read-more,
	#mpcth_page_wrap #mpcth_page_articles article.post a.mpcth-blog-read-more {
		<?php echo isset($mpcth_options['mpcth_color_more']) ? 'color: ' . $mpcth_options['mpcth_color_more'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_more_bg']) ? 'background: ' . $mpcth_options['mpcth_color_more_bg'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_more_bg']) ? 'border-bottom-color: ' . mpcth_adjust_brightness($mpcth_options['mpcth_color_more_bg'], -20) . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap #mpcth_page_articles article.post-password-required form input[type=submit]:hover,
	#mpcth_page_wrap #mpcth_page_articles article.post a.mpcth-portfolio-read-more:hover,
	#mpcth_page_wrap #mpcth_page_articles article.post a.mpcth-blog-read-more:hover {
		<?php echo isset($mpcth_options['mpcth_color_more_hover']) ? 'color: ' . $mpcth_options['mpcth_color_more_hover'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_more_bg_hover']) ? 'background: ' . $mpcth_options['mpcth_color_more_bg_hover'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_more_bg_hover']) ? 'border-bottom-color: ' . mpcth_adjust_brightness($mpcth_options['mpcth_color_more_bg_hover'], -20) . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap #mpcth-lm {
		<?php echo isset($mpcth_options['mpcth_color_loadmore']) ? 'color: ' . $mpcth_options['mpcth_color_loadmore'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_bg_loadmore']) ? 'background: ' . $mpcth_options['mpcth_color_bg_loadmore'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_bg_loadmore']) ? 'border-bottom-color: ' . mpcth_adjust_brightness($mpcth_options['mpcth_color_bg_loadmore'], -20) . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_wrap #mpcth-lm:hover {
		<?php echo isset($mpcth_options['mpcth_color_loadmore_active']) ? 'color: ' . $mpcth_options['mpcth_color_loadmore_active'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_loadmore_bg_active']) ? 'background: ' . $mpcth_options['mpcth_color_loadmore_bg_active'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_loadmore_bg_active']) ? 'border-bottom-color: ' . mpcth_adjust_brightness($mpcth_options['mpcth_color_loadmore_bg_active'], -20) . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap .blog-post .mpcth-post-thumbnail a.mpcth-fancybox {
		<?php echo isset($mpcth_options['mpcth_color_lb']) ? 'color: ' . $mpcth_options['mpcth_color_lb'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_lb_bg']) ? 'background: ' . $mpcth_options['mpcth_color_lb_bg'] . ';' . PHP_EOL : ''; ?>
		/*<?php echo isset($mpcth_options['mpcth_color_lb_bg']) ? 'border-bottom-color: ' . mpcth_adjust_brightness($mpcth_options['mpcth_color_lb_bg'], -20) . ';' . PHP_EOL : ''; ?>*/
	}

	#mpcth_page_content .mpcth-filterable-categories ul li {
		<?php echo isset($mpcth_options['mpcth_color_cat_bg']) ? 'background-color: ' . $mpcth_options['mpcth_color_cat_bg'] . ';' . PHP_EOL : ''; ?>
	}	

	#mpcth_page_content .mpcth-filterable-categories ul li a {
		<?php echo isset($mpcth_options['mpcth_color_cat_text']) ? 'color: ' . $mpcth_options['mpcth_color_cat_text'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_content .mpcth-filterable-categories ul li.active
	#mpcth_page_content .mpcth-filterable-categories ul li:hover {
		<?php echo isset($mpcth_options['mpcth_color_cat_bg_hover']) ? 'background-color: ' . $mpcth_options['mpcth_color_cat_bg_hover'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_content .mpcth-filterable-categories ul li.active a,
	#mpcth_page_content .mpcth-filterable-categories ul li:hover a {
		<?php echo isset($mpcth_options['mpcth_color_cat_text_hover']) ? 'color: ' . $mpcth_options['mpcth_color_cat_text_hover'] . ';' . PHP_EOL : ''; ?>
	}

	/* Other */
	#mpcth_page_wrap hr {
		<?php echo isset($mpcth_options['mpcth_color_hr']) ? 'background-color: ' . $mpcth_options['mpcth_color_hr'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap #mpcth_top_widget_area > ul > li a:hover {
		<?php echo isset($mpcth_options['mpcth_color_global_linkhover']) ? 'color: ' . $mpcth_options['mpcth_color_global_linkhover'] . ';' . PHP_EOL : ''; ?>	
	}

	#mpcth_page_wrap h1, #mpcth_page_wrap h2, #mpcth_page_wrap h3, #mpcth_page_wrap h4, #mpcth_page_wrap h5,
	#mpcth_page_header_wrap, #mpcth_page_heading  {
	<?php echo isset($mpcth_options['mpcth_color_hr']) ? 'border-color: ' . $mpcth_options['mpcth_color_hr'] . '!important;' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap #mpcth_sidebar ul.parent_menu_item > li,
	#mpcth_page_wrap #mpcth_sidebar ul.parent_menu_item > li a {
		<?php echo isset($mpcth_options['mpcth_color_sidebar_text']) ? 'color: ' . $mpcth_options['mpcth_color_sidebar_text'] . ';' . PHP_EOL : ''; ?>	
	}

	#mpcth_page_wrap #mpcth_sidebar ul.parent_menu_item > li a:hover {
		<?php echo isset($mpcth_options['mpcth_color_global_linkhover']) ? 'color: ' . $mpcth_options['mpcth_color_global_linkhover'] . ';' . PHP_EOL : ''; ?>	
	}

	#mpcth_page_wrap #mpcth_top_widget_area > ul > li .widget_title {
		<?php echo isset($mpcth_options['mpcth_color_top_widget_area_heading']) ? 'color: ' . $mpcth_options['mpcth_color_top_widget_area_heading'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap #mpcth_top_widget_area > ul > li,
	#mpcth_page_wrap #mpcth_top_widget_area > ul > li a {
		<?php echo isset($mpcth_options['mpcth_color_top_widget_area_text']) ? 'color: ' . $mpcth_options['mpcth_color_top_widget_area_text'] . ';' . PHP_EOL : ''; ?>	
	}

	#mpcth_page_wrap #mpcth_top_widget_area > ul > li a:hover {
		<?php echo isset($mpcth_options['mpcth_color_global_linkhover']) ? 'color: ' . $mpcth_options['mpcth_color_global_linkhover'] . ';' . PHP_EOL : ''; ?>	
	}


	#mpcth_page_wrap #mpcth_footer > #mpcth_footer_content .widget_title {
		<?php echo isset($mpcth_options['mpcth_color_footer_heading']) ? 'color: ' . $mpcth_options['mpcth_color_footer_heading'] . '!important;' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap #mpcth_footer > #mpcth_bottom_footer,
	#mpcth_page_wrap #mpcth_footer > #mpcth_bottom_footer .mpcth-social-icons a .mpcth-social-bg > span {
		<?php echo isset($mpcth_options['mpcth_color_footer_copyrights_text']) ? 'color: ' . $mpcth_options['mpcth_color_footer_copyrights_text'] . '!important;' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap #mpcth_footer > #mpcth_footer_content p,
	#mpcth_page_wrap #mpcth_footer > #mpcth_footer_content li,
	#mpcth_page_wrap #mpcth_footer > #mpcth_footer_content > ul > li,
	#mpcth_page_wrap #mpcth_footer > #mpcth_footer_content > ul > li a {
		<?php echo isset($mpcth_options['mpcth_color_footer_text']) ? 'color: ' . $mpcth_options['mpcth_color_footer_text'] . '!important;' . PHP_EOL : ''; ?>	
	}

	#mpcth_page_wrap #mpcth_footer > #mpcth_footer_content > ul > li a:hover {
		<?php echo isset($mpcth_options['mpcth_color_global_linkhover']) ? 'color: ' . $mpcth_options['mpcth_color_global_linkhover'] . ';' . PHP_EOL : ''; ?>	
	}

	#mpcth_page_wrap .mpcth-social-bg {
		<?php echo isset($mpcth_options['mpcth_social_bg_color']) ? 'background-color: ' . $mpcth_options['mpcth_social_bg_color'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap #mpcth_page_container #mpcth_page_content .mpcth-sc-team-member .mpcth-sc-team-member-social > a {
		<?php echo isset($mpcth_options['mpcth_color_meta']) ? 'color: ' . $mpcth_options['mpcth_color_meta'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_wrap #mpcth_page_container #mpcth_page_content .mpcth-sc-team-member .mpcth-sc-team-member-social > a:hover {
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'color: ' . $mpcth_options['mpcth_color_global_link'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap .widget_nav_menu a {
		<?php echo isset($mpcth_options['mpcth_color_global_linkhover']) ? 'color: '. $mpcth_options['mpcth_color_global_linkhover'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_wrap #mpcth_footer > #mpcth_footer_content .widget_nav_menu a {
		<?php echo isset($mpcth_options['mpcth_color_footer_text']) ? 'color: ' . $mpcth_options['mpcth_color_footer_text'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_wrap #mpcth_footer > #mpcth_footer_content .widget_nav_menu a:hover,
	#mpcth_page_wrap  .widget_nav_menu a:hover {
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'color: '. $mpcth_options['mpcth_color_global_link'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_wrap .widget_nav_menu .current-menu-item a {
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'color: '. $mpcth_options['mpcth_color_global_link'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_wrap  .widget_nav_menu .current-menu-item a:hover {
		<?php echo isset($mpcth_options['mpcth_color_global_linkhover']) ? 'color: '. $mpcth_options['mpcth_color_global_linkhover'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap #mpcth_nav #mpcth_menu > li > a:before,
	#mpcth_page_wrap #mpcth_page_articles .mpcth-post-tags a {
		<?php echo isset($mpcth_options['mpcth_color_meta']) ? 'color: ' . $mpcth_options['mpcth_color_meta'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_wrap #mpcth_page_articles .mpcth-post-tags a:hover {
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'color: ' . $mpcth_options['mpcth_color_global_link'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap .mpcth-sc-icon-divider .mpcth-sc-icon-divider-button:after,
	#mpcth_page_wrap .mpcth-sc-icon-divider .mpcth-sc-icon-divider-button a {
		<?php echo isset($mpcth_options['mpcth_color_global_body']) ? 'color: ' . $mpcth_options['mpcth_color_global_body'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap .mpcth-sc-icon-divider .mpcth-sc-icon-divider-button:hover:after,
	#mpcth_page_wrap .mpcth-sc-icon-divider .mpcth-sc-icon-divider-button:hover a {
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'color: ' . $mpcth_options['mpcth_color_global_link'] . ';' . PHP_EOL : ''; ?>
	}

	/* Color Border */
	#mpcth_page_wrap #mpcth_page_articles #comments .commentlist article.comment .comment-fold,
	#mpcth_page_wrap #mpcth_page_articles article.post .mpcth-post-date,
	#mpcth_page_wrap .mpcth-sc-author-image,
	#mpcth_page_wrap #mpcth_page_articles #comments #mpcth_comments_nav > a,
	#mpcth_page_wrap #mpcth_page_container article.portfolio .mpcth-post-nav > a,
	#mpcth_page_wrap #mpcth_page_container #mpcth_page_content .mpcth-sc-share-count > div,
	#mpcth_page_wrap #mpcth_page_container.single-post #mpcth_page_content article.post .mpcth-post-nav > a {
		<?php echo isset($mpcth_options['mpcth_color_global_body']) ? 'color: ' . $mpcth_options['mpcth_color_global_body'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_circle_border']) ? 'background: ' . $mpcth_options['mpcth_color_circle_border'] . ' !important;' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_circle_border']) ? 'border-bottom-color: ' . mpcth_adjust_brightness($mpcth_options['mpcth_color_circle_border'], -20) . ' !important;' . PHP_EOL : ''; ?>
	}
	#mpcth_page_wrap #mpcth_page_articles #comments .commentlist article.comment .comment-fold:hover,
	#mpcth_page_wrap #mpcth_page_articles #comments #mpcth_comments_nav > a:hover,
	#mpcth_page_wrap #mpcth_page_container article.portfolio .mpcth-post-nav > a:hover,
	#mpcth_page_wrap #mpcth_page_container #mpcth_page_content .mpcth-sc-share-count > div:hover,
	#mpcth_page_wrap #mpcth_page_container.single-post #mpcth_page_content article.post .mpcth-post-nav > a:hover {
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'background: ' . $mpcth_options['mpcth_color_global_link'] . ' !important;' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'border-bottom-color: ' . mpcth_adjust_brightness($mpcth_options['mpcth_color_global_link'], -20) . ' !important;' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap #mpcth_page_container.blog-type-compressed #mpcth_page_articles article.blog-post:hover > header .mpcth-post-format-icon {
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'color: '. $mpcth_options['mpcth_color_global_link'] . ' !important;' . PHP_EOL : ''; ?>
	}
	#mpcth_page_wrap #mpcth_page_container.blog-type-compressed article.blog-post:hover > header {
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'background: '. $mpcth_options['mpcth_color_global_link'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap #mpcth_page_container #mpcth_page_content .wpb_tour a:hover,
	#mpcth_page_wrap #mpcth_page_container #mpcth_page_content .wpb_tabs .wpb_tabs_nav a:hover,
	#mpcth_page_wrap #mpcth_page_container #mpcth_page_content .wpb_toggle:hover,
	#mpcth_page_wrap #mpcth_page_container #mpcth_page_content .wpb_accordion_section .wpb_accordion_header:hover,
	#mpcth_page_wrap #mpcth_page_container #mpcth_page_content .wpb_tour .ui-tabs-active a,
	#mpcth_page_wrap #mpcth_page_container #mpcth_page_content .wpb_tabs .wpb_tabs_nav .ui-tabs-active a,
	#mpcth_page_wrap #mpcth_page_container #mpcth_page_content .wpb_toggle.wpb_toggle_title_active,
	#mpcth_page_wrap #mpcth_page_container #mpcth_page_content .wpb_accordion_section .wpb_accordion_header.ui-accordion-header-active {
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'color: '. $mpcth_options['mpcth_color_global_link'] . ';' . PHP_EOL : ''; ?>
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'border-bottom-color: '. $mpcth_options['mpcth_color_global_link'] . ' !important;' . PHP_EOL : ''; ?>
	}
	#mpcth_page_wrap #mpcth_page_container #mpcth_page_content .wpb_accordion_section .wpb_accordion_header a:hover,
	#mpcth_page_wrap #mpcth_page_container #mpcth_page_content .wpb_accordion_section .wpb_accordion_header.ui-accordion-header-active a {
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'color: '. $mpcth_options['mpcth_color_global_link'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_header_divider_block {
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'background: '. $mpcth_options['mpcth_color_global_link'] . ';' . PHP_EOL : ''; ?>
	}


	#mpcth_page_heading_wrap {
		<?php echo isset($mpcth_options['mpcth_color_bg_page_header']) ? 'background: '. $mpcth_options['mpcth_color_bg_page_header'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_wrap #mpcth_page_container .mpcth-twitter-widget .mpcth-twitter-wrap .tweet .header a,
	#mpcth_page_wrap #mpcth_page_container .mpcth-twitter-widget .mpcth-twitter-wrap .tweet .permalink {
		<?php echo isset($mpcth_options['mpcth_color_global_linkhover']) ? 'color: '. $mpcth_options['mpcth_color_global_linkhover'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_wrap #mpcth_page_container .mpcth-twitter-widget .mpcth-twitter-wrap .tweet .header a:hover,
	#mpcth_page_wrap #mpcth_page_container .mpcth-twitter-widget .mpcth-twitter-wrap .tweet .permalink:hover {
		<?php echo isset($mpcth_options['mpcth_color_global_link']) ? 'color: '. $mpcth_options['mpcth_color_global_link'] . ';' . PHP_EOL : ''; ?>
	}

	#mpcth_page_header_content #mpcth_header_divider {
		<?php echo isset($mpcth_options['mpcth_color_stripe_bg']) ? 'background: '. $mpcth_options['mpcth_color_stripe_bg'] . ';' . PHP_EOL : ''; ?>
	}
	#mpcth_page_header_content #mpcth_header_divider #mpcth_header_divider_block {
		<?php echo isset($mpcth_options['mpcth_color_stripe']) ? 'background: '. $mpcth_options['mpcth_color_stripe'] . ';' . PHP_EOL : ''; ?>
	}

	<?php if(isset($mpcth_options['mpcth_custom_css'])) echo $mpcth_options['mpcth_custom_css']; ?>

</style>
<?php }

function mpcth_admin_alternative_styles() { ?>
	
	<!--[if lte IE 10]>
		<link rel="stylesheet" href="<?php echo MPC_THEME_ROOT ?>/mpc-wp-boilerplate/massive-panel/css/ie.css"/>
	<![endif]-->

<?php } ?>