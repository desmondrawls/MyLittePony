<?php

/**
 * The theme option name is set as 'options-theme-customizer' here.
 * In your own project, you should use a different option name.
 * I'd recommend using the name of your theme.
 *
 * This option name will be used later when we set up the options
 * for the front end theme customizer.
 *
 * @package WordPress
 * @subpackage MPC WP Boilerplate
 * @since 1.0
 *
 */

function mpcth_optionsframework_option_name() {
	global $mpcth_options_name;

	$mpcth_optionsframework_settings = get_option('mpcth_optionsframework');

	$mpcth_optionsframework_settings['id'] = $mpcth_options_name;
	update_option('mpcth_optionsframework', $mpcth_optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 */

function mpcth_optionsframework_options() {

	$default_values = array(
		
		/* GLOBAL */

		'enabledResponsive'				=> '1',
		'topMenu'						=> '0',
		'menuSearch'					=> '1',

		// logo

		'useTextLogo'					=> '1',
		'textLogo'						=> 'Smart Choice',
		'logoDescription'				=> '0',

		/* FONT SIZES */
		
		// headings
		'h1'							=> '24px',
		'h2' 							=> '22px',
		'h3' 							=> '20px',
		'h4' 							=> '18px',
		'h5' 							=> '16px',
		'h6' 							=> '15px',
		
		// global
		'defaultFontSize' 				=> '14px',

		// small: meta etc.
		'smallFontSize'					=> '13px',

		// menu
		'menuFontSize'					=> '14px',
		
		// footer
		'footerFontSize'				=> '14px',
		'footerHeadingSize'				=> '14px',
		
		// sidebar 
		'sidebarFontSize'				=> '14px',
		'sidebarHeadingSize'			=> '14px',

		// forms
		'formsFontSize'					=> '14px',

		// buttons
		'buttonFontSize'				=> '14px',

		// read more
		'readmoreFontSize'				=> '14px',

		// category filter
		'categoryFilterFontSize'		=> '14px',

		/* GLOBAL COLORS */
		
		'headingColor'					=> '#666666',
		'bodyColor'						=> '#666666',
		'linkColor'						=> '#48c78b',
		'hoverColor'					=> '#666666',
		'altLinkColor'					=> '#666666',
		'altHoverColor'					=> '#48c78b',

		/* BACKGROUNDS */
		
		'headerBG'						=> '#FFFFFF',
		'pageHeaderBG'					=> '#F9F9F9',
		'wrapBG'						=> '#FFFFFF', 
		'footerBG'						=> '#333333',
		'copyrightsBG'					=> '#222222',
		'sidebarBG'						=> '#FFFFFF',
		'contentBG'						=> '#FFFFFF', 
		'postBG'						=> '#FFFFFF',
		'menuBGColor'					=> '#FFFFFF',
		'topMenuBG'						=> '#222222',
		'topWidgetAreaBG' 				=> '#F5F5F5',

		/* LOGO */
		'logoFontColor'					=> '#48c78b',
		'logoBG'						=> '#FFFFFF', 
		'descriptionFontColor'			=> '#666666',
		'descriptionBG'					=> '#ffffff',
 
		/* MAIN MENU */

		// top - normal
		'menuFontColor'					=> '#666666',
		'menuItemBG'					=> '#FFFFFF',

		// top - hover
		'menuFontHoverColor'			=> '#48c78b',
		'menuItemBGHover'				=> '#FFFFFF',

		// top - active
		'menuFontActiveColor'			=> '#48c78b',
		'menuItemBGActive'				=> '#FFFFFF',

		// drop down - normal
		'menuDropFontColor'				=> '#666666',
		'menuDropItemBG'				=> '#f5f5f5',

		// drop down - hover
		'menuDropFontHoverColor'		=> '#FFFFFF',
		'menuDropItemBGHover'			=> '#48c78b',

		// drop down active
		'menuDropFontActiveColor' 		=> '#FFFFFF',
		'menuDropItemBGActive'			=> '#48c78b',

		// stripe
		'menuStripeColor' 				=> '#48c78b',
		'menuStripeBGColor'				=> '#dddddd',

		/* TOP MENU */

		// normal 
		'topMenuFontColor'				=> '#d6d6d6',
		'topMenuItemBG'					=> '#222222',
		
		// hover
		'topMenuFontHover' 				=> '#ffffff',
		'topMenuItemBGHover' 			=> '#222222', 
		
		// active 
		'topMenuFontActive' 			=> '#ffffff',
		'topMenuItemBGActive' 			=> '#222222', 

		/* COMMENT FORM */

		// normal
		'commentFormFontColor'			=> '#666666',
		'commentFormItemBG'				=> '#f5f5f5',

		// hover
		'commentFormFontHoverColor'		=> '#666666',
		'commentFormItemBGHover'		=> '#f0f0f0',

		// error
		'commentFormFontErrorColor'		=> '#ffffff',
		'commentFormItemBGError'		=> '#FF582E',

		'commentFormLabelError'			=> '#FF582E',

		/* Contact Form */

		// normal
		'contactFormFontColor'			=> '#666666',
		'contactFormItemBG'				=> '#f5f5f5',

		// hover
		'contactFormFontHoverColor'		=> '#666666',
		'contactFormItemBGHover'		=> '#f0f0f0',

		// error
		'contactFormFontErrorColor'		=> '#ffffff',
		'contactFormItemBGError'		=> '#FF582E',

		'contactFormLabelError'			=> '#FF582E', 
		'contactFormLabelSuccess'		=> '#48c78b', 

		/* BUTTON SUBMIT */

		// normal
		'submitFontColor'				=> '#666666',
		'submitItemBG'					=> '#f5f5f5',

		// hover
		'submitFontHoverColor'			=> '#FFFFFF',
		'submitItemBGHover'				=> '#48c78b',

		/* BLOG & PORTFOLIO */

		// meta
		'metaColor'						=> '#CCCCCC',

		// read more
		'readmoreColor'					=> '#666666',
		'readmoreBGColor'				=> '#F5F5F5',
		'readmoreHoverColor'			=> '#FFFFFF',
		'readmoreHoverBGColor'			=> '#48C78B',

		// load more
		'loadmoreColor'					=> '#666666',
		'loadmoreBGColor'				=> '#F5F5F5',
		'loadmoreHoverColor'			=> '#FFFFFF',
		'loadmoreHoverBGColor'			=> '#48C78B',

		// lightbox icon
		'lightboxIcon'					=> '#FFFFFF',
		'lightboxIconBG'				=> '#48C78B',

		// category filter 
		'categoryFilterFont'			=> '#666666',
		'categoryFilterBG'				=> '#FFFFFF',

		'categoryFilterFontHover'		=> '#48C78B',
		'categoryFilterBGHover'			=> '#FFFFFF',

		/* OTHER */

		// hr line
		'hr'							=> '#EEEEEE',

		// circle 
		'circleBorder'					=> '#F5F5F5',

		// dark hr deviders
		// 'doubleHrDeviderTop'			=> '#363636',
		// 'doubleHrDeviderBottom'			=> '#4A4A4A',

		// sidebar 
		'sidebarHeading'				=> '#666666',
		'sidebarFontColor'				=> '#666666',

		// footer 
		'footerHeading'					=> '#FFFFFF',
		'footerFontColor'				=> '#FFFFFF',
		'footerCopyrightsColor'			=> '#d6d6d6',

		// top widget area 
		'topWidgetAreaHeading'			=> '',
		'topWidgetAreaFontColor'		=> '',

		// social icon bg
		'socialIconBgColor' 			=> '', 

		// Comment Author
		'authorFont'					=> '#48c78b',
		'authorBG'						=> '#FFFFFF',

		// share
		'enableShare'					=> '0',

		/* Sidebars */
		'defaultSidebar'				=> 'right',
		'defaultPostSidebar'			=> 'right',
		'defaultPortfolioSidebar'		=> 'right',
		'defaultSearchSidebar'			=> 'right',
		'defaultArchiveSidebar'			=> 'right',
		'defaultErrorSidebar'			=> 'none',

		/* Footer */
		'showFooter'					=> '1',
		'toggleFooter'					=> '1',
		'hiddenFooter'					=> '1',
		'footerColNum'					=> '3',
		'showBottomFooter'				=> '1',
		'copyrightText'					=> 'Copyright MassivePixelCreation 2013',

		/* Site Header */
		'showHeader'					=> '1',
		'headerHeading'					=> '',
		'headerSubheading'				=> '',
		'headerType'					=> 'breadcrumb',
		'headerLinkText'				=> '',
		'headerLinkUrl'					=> '',
		'headerText'					=> '',

		/* Top Widget Area */
		'widgetArea'					=> '0',
		'widgetAreaColNum'				=> '3'
	);

	// header types
	$header_types = array(
		"none" => "NONE",
		"breadcrumb" => "BREADCRUMB",
		"link" => "LINK",
		"text" => "TEXT"
	);

	// footer columns 
	$footer_columns = array(
		"1" => "1",
		"2" => "2",
		"3" => "3",
		"4" => "4",
		"5" => "5"
	);

	$background_options = array(
		"pattern_background" => "PATTERN BACKGROUND",
		"custom_background" => "CUSTOM BACKGROUND",
		"none" => "NONE" 
	);

	// path: MPC_THEME_ROOT . '/mpc-wp-boilerplate/images/ . 'patterns/pattern1.png'
	$background_patterns = array(
		'pattern01' => 'patterns/pattern01.png',
		'pattern02' => 'patterns/pattern02.png',
		'pattern03' => 'patterns/pattern03.png',
		'pattern04' => 'patterns/pattern04.png',
		'pattern05' => 'patterns/pattern05.png',
		'pattern06' => 'patterns/pattern06.png',
		'pattern07' => 'patterns/pattern07.png',
		'pattern08' => 'patterns/pattern08.png',
		'pattern09' => 'patterns/pattern09.png',
		'pattern10' => 'patterns/pattern10.png',
		'pattern11' => 'patterns/pattern11.png',
		'pattern12' => 'patterns/pattern12.png'
	);

	$options = array();

/* ---------------------------------------------------------------- */
/* General
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" 	=> __("General", 'mpcth'),
		"icon" 	=> "mpcth-sc-icon-cog",
		"type" 	=> "heading" );

/* ---------------------------------------------------------------- */
/* Main
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" 	=> __("Main", 'mpcth'),
		"type" 	=> "accordion");

	if(isset($default_values['enabledResponsive']) && $default_values['enabledResponsive'] != '') {
		$options['mpcth_reponsive'] = array(
			"id" 	=> "mpcth_reponsive",
			"name" 	=> __("Enable Responsive", 'mpcth'),
			"desc" 	=> __("Check this option to enable responsive mode of your theme. Flex slider is the only responsive slider.", 'mpcth'),
			"type" 	=> "checkbox",
			"std" 	=> $default_values['enabledResponsive'] );
	}

	if(isset($default_values['topMenu']) && $default_values['topMenu'] != '') {
		$options['mpcth_basic_top_menu'] = array(
			"id" 	=> "mpcth_basic_top_menu",
			"name" 	=> __("Top Menu", 'mpcth'),
			"desc" 	=> __('Check to enable top menu.', 'mpcth'),
			"type" 	=> "checkbox",
			"std" 	=> $default_values['topMenu'] );
	}

	if(isset($default_values['menuSearch']) && $default_values['menuSearch'] != '') {
		$options['mpcth_menu_search'] = array(
			"id" 	=> "mpcth_menu_search",
			"name" 	=> __("Menu Search", 'mpcth'),
			"desc" 	=> __('Check to enable search form aside main menu.', 'mpcth'),
			"type" 	=> "checkbox",
			"std" 	=> $default_values['menuSearch'] );
	}

	$options['mpcth_contact_email'] = array(
		"id" 	=> "mpcth_contact_email",
		"name" 	=> __("Contact e-Mail", 'mpcth'),
		"desc" 	=> __('Specify e-mail address for your contact forms.', 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

/* ---------------------------------------------------------------- */
/* Header
/* ---------------------------------------------------------------- */
	if(isset($default_values['showHeader']) && $default_values['showHeader'] != '') {

	$options[] = array(
		"name" 	=> __("Header", 'mpcth'),
		"type" 	=> "accordion");

		$options['mpcth_show_header'] = array(
			"id" 		=> "mpcth_show_header",
			"name" 		=> __("Show Header", 'mpcth'),
			"desc" 		=> __("Uncheck this option to hide header.", 'mpcth'),
			"type" 		=> "checkbox",
			"std" 		=> $default_values['showHeader'] );

		$options['mpcth_header_heading'] = array(
			"id" 		=> "mpcth_header_heading",
			"name" 		=> __("Heading", 'mpcth'),
			"desc" 		=> __("Specify heading text of header.", 'mpcth'),
			"class" 	=> "mpcth-of-header",
			"type" 		=> "text",
			"std" 		=> $default_values['headerHeading'],
			"options" 	=> $header_types );

		$options['mpcth_header_subheading'] = array(
			"id" 		=> "mpcth_header_subheading",
			"name" 		=> __("Subheading", 'mpcth'),
			"desc" 		=> __("Specify subheading text of header.", 'mpcth'),
			"class" 	=> "mpcth-of-header",
			"type" 		=> "text",
			"std" 		=> $default_values['headerSubheading'],
			"options" 	=> $header_types );

		$options['mpcth_header_type'] = array(
			"id" 		=> "mpcth_header_type",
			"name" 		=> __("Type", 'mpcth'),
			"desc" 		=> __("Specify default type of header.", 'mpcth'),
			"class" 	=> "",
			"type" 		=> "select",
			"std" 		=> $default_values['headerType'],
			"options" 	=> $header_types );

		$options['mpcth_header_link_text'] = array(
			"id" 		=> "mpcth_header_link_text",
			"name" 		=> __("Link Text", 'mpcth'),
			"desc" 		=> __("Specify the right side link text of header.", 'mpcth'),
			"class" 	=> "mpcth-of-header-link",
			"type" 		=> "text",
			"std" 		=> $default_values['headerLinkText'],
			"options" 	=> $header_types );

		$options['mpcth_header_link_url'] = array(
			"id" 		=> "mpcth_header_link_url",
			"name" 		=> __("Link URL", 'mpcth'),
			"desc" 		=> __("Specify the right side link URL of header.", 'mpcth'),
			"class" 	=> "mpcth-of-header-link",
			"type" 		=> "text",
			"std" 		=> $default_values['headerLinkUrl'],
			"options" 	=> $header_types );

		$options['mpcth_header_text'] = array(
			"id" 		=> "mpcth_header_text",
			"name" 		=> __("Text", 'mpcth'),
			"desc" 		=> __("Specify the right side text of header.", 'mpcth'),
			"class" 	=> "mpcth-of-header-text",
			"type" 		=> "text",
			"std" 		=> $default_values['headerText'],
			"options" 	=> $header_types );
	}

/* ---------------------------------------------------------------- */
/* Sidebar
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" 	=> __("Sidebar", 'mpcth'),
		"type" 	=> "accordion");

	if(isset($default_values['defaultSidebar']) && $default_values['defaultSidebar'] != '') {
		$options['mpcth_sidebar'] = array(
			"id" 		=> "mpcth_sidebar",
			"name" 		=> __("Default Sidebar Position", 'mpcth'),
			"desc" 		=> __("Set the default sidebar position for all of the pages, you can choose between: right, none and left.", 'mpcth'),
			"type" 		=> "sidebar",
			"std" 		=> $default_values['defaultSidebar'],
			"options" 	=> array('right' => 'right',
								'none' => 'none',
								'left' => 'left'));
	}

	if(isset($default_values['defaultPostSidebar']) && $default_values['defaultPostSidebar'] != '') {
		$options['mpcth_blog_post_sidebar'] = array(
			"id" 		=> "mpcth_blog_post_sidebar",
			"name" 		=> __("Default Blog Post Sidebar Position", 'mpcth'),
			"desc" 		=> __("Set the default sidebar position for all of blog posts, you can choose between: right, none and left.", 'mpcth'),
			"type" 		=> "sidebar",
			"std" 		=> $default_values['defaultPostSidebar'],
			"options" 	=> array('right' => 'right',
										'none' => 'none',
										'left' => 'left'));
	}

	if(isset($default_values['defaultPortfolioSidebar']) && $default_values['defaultPortfolioSidebar'] != '') {
		$options['mpcth_portfolio_post_sidebar'] = array(
			"id"		=> "mpcth_portfolio_post_sidebar",
			"name" 		=> __("Default Portfolio Post Sidebar Position", 'mpcth'),
			"desc" 		=> __("Set the default sidebar position for all of portfolio posts, you can choose between: right, none and left.", 'mpcth'),
			"type" 		=> "sidebar",
			"std" 		=> $default_values['defaultPortfolioSidebar'],
			"options" 	=> array('right' => 'right',
								'none' => 'none',
								'left' => 'left'));
	}

	if(isset($default_values['defaultSearchSidebar']) && $default_values['defaultSearchSidebar'] != '') {
		$options['mpcth_search_sidebar'] = array(
			"id" 		=> "mpcth_search_sidebar",
			"name" 		=> __("Default Search Sidebar Position", 'mpcth'),
			"desc" 		=> __("Set the default sidebar position for search section, you can choose between: right, none and left.", 'mpcth'),
			"type" 		=> "sidebar",
			"std" 		=> $default_values['defaultSearchSidebar'],
			"options" 	=> array('right' => 'right',
									'none' => 'none',
									'left' => 'left'));
	}

	if(isset($default_values['defaultArchiveSidebar']) && $default_values['defaultArchiveSidebar'] != '') {
		$options['mpcth_archive_sidebar'] = array(
			"id" 		=> "mpcth_archive_sidebar",
			"name" 		=> __("Default Archive Sidebar Position", 'mpcth'),
			"desc" 		=> __("Set the default sidebar position for archive section, you can choose between: right, none and left.", 'mpcth'),
			"type" 		=> "sidebar",
			"std" 		=> $default_values['defaultArchiveSidebar'],
			"options" 	=> array('right' => 'right',
								'none' => 'none',
								'left' => 'left'));
	}

	if(isset($default_values['defaultErrorSidebar']) && $default_values['defaultErrorSidebar'] != '') {
		$options['mpcth_error_sidebar'] = array(
			"id" 		=> "mpcth_error_sidebar",
			"name" 		=> __("Default 404 Error Sidebar Position", 'mpcth'),
			"desc" 		=> __("Set the default sidebar position for 404 error section, you can choose between: right, none and left.", 'mpcth'),
			"type" 		=> "sidebar",
			"std" 		=> $default_values['defaultErrorSidebar'],
			"options" 	=> array('right' => 'right',
								'none' => 'none',
								'left' => 'left'));
	}

/* ---------------------------------------------------------------- */
/* Footer
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" 	=> __("Footer", 'mpcth'),
		"type" 	=> "accordion");

	if(isset($default_values['showFooter']) && $default_values['showFooter'] != '') {
		$options['mpcth_show_footer'] = array(
			"id" 				=> "mpcth_show_footer",
			"name" 				=> __("Show Footer", 'mpcth'),
			"desc" 				=> __("Uncheck this option to hide footer.", 'mpcth'),
			"type" 				=> "checkbox",
			"std" 				=> $default_values['showFooter'] );
	}

	if(isset($default_values['footerColNum']) && $default_values['footerColNum'] != '') {
		$options['mpcth_footer_columns'] = array(
			"id" 				=> "mpcth_footer_columns",
			"name" 				=> __("Default Number of Footer Columns", 'mpcth'),
			"desc" 				=> __("Specify default number of footer columns.", 'mpcth'),
			"type" 				=> "select",
			"std" 				=> $default_values['footerColNum'],
			"options" 			=> $footer_columns );
	}

	if(isset($default_values['toggleFooter']) && $default_values['toggleFooter'] != '') {
		$options['mpcth_toggle_footer'] = array(
			"id" 				=> "mpcth_toggle_footer",
			"name" 				=> __("Enable Toggle Footer", 'mpcth'),
			"desc" 				=> __("Uncheck this option to disable toggle footer.", 'mpcth'),
			"type" 				=> "checkbox",
			"std" 				=> $default_values['toggleFooter'] );
	}

	if(isset($default_values['hiddenFooter']) && $default_values['hiddenFooter'] != '') {
		$options['mpcth_hide_footer'] = array(
			"id" 				=> "mpcth_hide_footer",
			"name" 				=> __("Hidden Footer", 'mpcth'),
			"desc" 				=> __("Uncheck this option to show toggle footer.", 'mpcth'),
			"type" 				=> "checkbox",
			"std" 				=> $default_values['hiddenFooter'] );
	}

	if(isset($default_values['showBottomFooter']) && $default_values['showBottomFooter'] != '') {
		$options['mpcth_show_copyright'] = array(
			"id" 				=> "mpcth_show_copyright",
			"name" 				=> __("Show Bottom Footer", 'mpcth'),
			"desc" 				=> __("Uncheck this option to hide copyright/social section below the footer.", 'mpcth'),
			"type" 				=> "checkbox",
			"std" 				=> $default_values['showBottomFooter'],
			"additional_fun" 	=> "hide",
			"hide_class" 		=> "mpcth_copyright" );
	}

	if(isset($default_values['copyrightText']) && $default_values['copyrightText'] != '') {
		$options['mpcth_copyright_text'] = array(
			"id" 		=> "mpcth_copyright_text",
			"name" 		=> __("Copyright Text", 'mpcth'),
			"desc" 		=> __("Specify your copyright.", 'mpcth'),
			"class" 	=> "mpcth_copyright",
			"type" 		=> "text-big",
			"std" 		=> $default_values['copyrightText']);
	}

/* ---------------------------------------------------------------- */
/* Google Analytics
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" => __("Google Analytics", 'mpcth'),
		"type" => "accordion");

	$options['mpcth_analytics'] = array(
		"id" 				=> "mpcth_analytics",
		"name" 				=> __("Enable Google Analytics", 'mpcth'),
		"desc" 				=> __("Check this option to enable google analytics.", 'mpcth'),
		"type" 				=> "checkbox",
		"std" 				=> "0",
		"additional_fun" 	=> "hide",
		"hide_class" 		=> "mpcth_analytics_code" );

	$options['mpcth_analytics_code'] = array(
		"id" 		=> "mpcth_analytics_code",
		"name" 		=> __("Google Analytics Code", 'mpcth'),
		"desc" 		=> __('Insert your google analytics code, for more information read <a href="https://support.google.com/analytics/bin/answer.py?hl=en&utm_medium=et&utm_campaign=en_us&utm_source=SetupChecklist&answer=1008080">this</a>. Don\'t worry that your script tags where removed, they will be added automatically.', 'mpcth'),
		"type" 		=> "textarea-big",
		"std" 		=> "",
		"class" 	=> "mpcth_analytics_code" );

/* ---------------------------------------------------------------- */
/* Fav Icon
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" => __("Fav Icon", 'mpcth'),
		"type" => "accordion");

	$options['mpcth_fav'] = array(
		"id" 				=> "mpcth_fav",
		"name" 				=> __("Enable Fav Icon", 'mpcth'),
		"desc" 				=> __("Check this option to enable fav icon.", 'mpcth'),
		"type" 				=> "checkbox",
		"std" 				=> "0",
		"additional_fun" 	=> "hide",
		"hide_class" 		=> "mpcth_fav_icon" );

	$options['mpcth_fav_icon'] = array(
		"id" 	=> "mpcth_fav_icon",
		"name" 	=> __("Upload Fav Icon", 'mpcth'),
		"desc" 	=> __("Use the upload to upload your custom fav icon. To learn more about the Fav Icon please read <a href='http://en.wikipedia.org/wiki/Favicon' target='_blank'>this article</a>.", 'mpcth'),
		"class" => "mpcth_fav_icon",
		"type" 	=> "upload" );

/* ---------------------------------------------------------------- */
/* Custom CSS
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" => __("Custom CSS", 'mpcth'),
		"type" => "accordion");

	$options['mpcth_custom_css'] = array(
		"id" 		=> "mpcth_custom_css",
		"name" 		=> __("Custom CSS", 'mpcth'),
		"desc" 		=> __('Insert your custom styles.', 'mpcth'),
		"type" 		=> "textarea-big",
		"std" 		=> "",
		"class" 	=> "mpcth_custom_css" );

/* ---------------------------------------------------------------- */
/* Fonts
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" => __("Fonts", 'mpcth'),
		"icon" => "mpcth-sc-icon-language",
		"type" => "heading" );

/* ---------------------------------------------------------------- */
/* Font Family
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" => __("Font Family", 'mpcth'),
		"type" => "accordion");

	$options['mpcth_menu_font'] = array(
		"id" 	=> "mpcth_menu_font",
		"name" 	=> __("Menu Font", 'mpcth'),
		"desc" 	=> __("Specify menu font.", 'mpcth'),
		"type" 	=> "font_select",
		"std" 	=> "default" );

	$options['mpcth_heading_font'] = array(
		"id" 	=> "mpcth_heading_font",
		"name" 	=> __("Heading Font", 'mpcth'),
		"desc" 	=> __("Specify headings font.", 'mpcth'),
		"type" 	=> "font_select",
		"std" 	=> "default" );

	$options['mpcth_content_font'] = array(
		"id" 	=> "mpcth_content_font",
		"name" 	=> __("Content Font", 'mpcth'),
		"desc" 	=> __("Specify content font.", 'mpcth'),
		"type" 	=> "font_select",
		"std" 	=> "default" );

	$options['mpcth_small_font'] = array(
		"id" 	=> "mpcth_small_font",
		"name" 	=> __("Small Font", 'mpcth'),
		"desc" 	=> __("Specify small font.", 'mpcth'),
		"type" 	=> "font_select",
		"std" 	=> "default" );

/* ---------------------------------------------------------------- */
/* Font Size
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" => __("Font Size", 'mpcth'),
		"type" => "accordion");
	
	if(isset($default_values['defaultFontSize']) && $default_values['defaultFontSize'] != '') {
		$options['mpcth_content_font_size'] = array(
		 	"id" 	=> "mpcth_content_font_size",
		 	"name" 	=> __("Content Font Size", 'mpcth'),
		 	"desc" 	=> __("Content font size.", 'mpcth'),
		 	"type" 	=> "slider",
		 	"std" 	=> $default_values['defaultFontSize'],
		 	"min" 	=> "8",
		 	"max" 	=> "58" );
	}

	if(isset($default_values['smallFontSize']) && $default_values['smallFontSize'] != '') {
		$options['mpcth_small_font_size'] = array(
		 	"id" 	=> "mpcth_small_font_size",
		 	"name" 	=> __("Small Font Size", 'mpcth'),
		 	"desc" 	=> __("Define font size for small elements like meta data.", 'mpcth'),
		 	"type" 	=> "slider",
		 	"std" 	=> $default_values['smallFontSize'],
		 	"min" 	=> "8",
		 	"max" 	=> "58" );
	}

	if(isset($default_values['h1']) && $default_values['h1'] != '') {
		$options['mpcth_h1_font_size'] = array(
		 	"id" 	=> "mpcth_h1_font_size",
		 	"name" 	=> __("H1 Font Size", 'mpcth'),
		 	"desc" 	=> __("H1 font size.", 'mpcth'),
		 	"type" 	=> "slider",
		 	"std" 	=> $default_values['h1'],
		 	"min" 	=> "8",
		 	"max" 	=> "58" );
	}

	if(isset($default_values['h2']) && $default_values['h2'] != '') {
		$options['mpcth_h2_font_size'] = array(
		 	"id" 	=> "mpcth_h2_font_size",
		 	"name" 	=> __("H2 Font Size", 'mpcth'),
		 	"desc" 	=> __("H2 font size.", 'mpcth'),
		 	"type" 	=> "slider",
		 	"std" 	=> $default_values['h2'],
		 	"min" 	=> "8",
		 	"max" 	=> "58" );
	}

	if(isset($default_values['h3']) && $default_values['h3'] != '') {
		$options['mpcth_h3_font_size'] = array(
		 	"id" 	=> "mpcth_h3_font_size",
		 	"name" 	=> __("H3 Font Size", 'mpcth'),
		 	"desc" 	=> __("H3 font size.", 'mpcth'),
		 	"type" 	=> "slider",
		 	"std" 	=> $default_values['h3'],
		 	"min" 	=> "8",
		 	"max" 	=> "58" );
	}

	if(isset($default_values['h4']) && $default_values['h4'] != '') {
		$options['mpcth_h4_font_size'] = array(
		 	"id" 	=> "mpcth_h4_font_size",
		 	"name" 	=> __("H4 Font Size", 'mpcth'),
		 	"desc" 	=> __("H4 font size.", 'mpcth'),
		 	"type" 	=> "slider",
		 	"std" 	=> $default_values['h4'],
		 	"min" 	=> "8",
		 	"max" 	=> "58" );
	}

	if(isset($default_values['h5']) && $default_values['h5'] != '') {
		$options['mpcth_h5_font_size'] = array(
		 	"id" 	=> "mpcth_h5_font_size",
		 	"name" 	=> __("H5 Font Size", 'mpcth'),
		 	"desc" 	=> __("H5 font size.", 'mpcth'),
		 	"type" 	=> "slider",
		 	"std" 	=> $default_values['h5'],
		 	"min" 	=> "8",
		 	"max" 	=> "58" );
	}

	if(isset($default_values['h6']) && $default_values['h6'] != '') {
		$options['mpcth_h6_font_size'] = array(
		 	"id" 	=> "mpcth_h6_font_size",
		 	"name" 	=> __("H6 Font Size", 'mpcth'),
		 	"desc" 	=> __("H6 font size.", 'mpcth'),
		 	"type" 	=> "slider",
		 	"std" 	=> $default_values['h6'],
		 	"min" 	=> "8",
		 	"max" 	=> "58" );
	}

	if(isset($default_values['menuFontSize']) && $default_values['menuFontSize'] != '') {
		$options['mpcth_menu_font_size'] = array(
		 	"id" 	=> "mpcth_menu_font_size",
		 	"name" 	=> __("Menu Font Size", 'mpcth'),
		 	"desc" 	=> __("Menu font size.", 'mpcth'),
	 	 	"type" 	=> "slider",
		 	"std" 	=> $default_values['menuFontSize'],
		 	"min" 	=> "8",
		 	"max" 	=> "58" );
	}

	if(isset($default_values['footerFontSize']) && $default_values['footerFontSize'] != '') {
		$options['mpcth_footer_font_size'] = array(
		 	"id" 	=> "mpcth_footer_font_size",
		 	"name" 	=> __("Footer Font Size", 'mpcth'),
		 	"desc" 	=> __("Footer font size.", 'mpcth'),
		 	"type" 	=> "slider",
		 	"std" 	=> $default_values['footerFontSize'],
		 	"min" 	=> "8",
		 	"max" 	=> "58" );
	}

	if(isset($default_values['footerHeadingSize']) && $default_values['footerHeadingSize'] != '') {
		$options['mpcth_footer_heading_font_size'] = array(
		 	"id" 	=> "mpcth_footer_heading_font_size",
		 	"name" 	=> __("Footer Heading Font Size", 'mpcth'),
		 	"desc" 	=> __("Footer heading font size.", 'mpcth'),
		 	"type" 	=> "slider",
		 	"std" 	=> $default_values['footerHeadingSize'],
		 	"min" 	=> "8",
		 	"max" 	=> "58" );
	}

	if(isset($default_values['sidebarFontSize']) && $default_values['sidebarFontSize'] != '') {
		$options['mpcth_sidebar_font_size'] = array(
		 	"id" 	=> "mpcth_sidebar_font_size",
		 	"name" 	=> __("Sidebar Font Size", 'mpcth'),
		 	"desc" 	=> __("Sidebar font size.", 'mpcth'),
		 	"type" 	=> "slider",
		 	"std" 	=> $default_values['sidebarFontSize'],
		 	"min" 	=> "8",
		 	"max" 	=> "58" );
	}

	if(isset($default_values['sidebarHeadingSize']) && $default_values['sidebarHeadingSize'] != '') {
		$options['mpcth_sidebar_heading_font_size'] = array(
		 	"id" 	=> "mpcth_sidebar_heading_font_size",
		 	"name" 	=> __("Sidebar Heading Font Size", 'mpcth'),
		 	"desc" 	=> __("Sidebar heading font size.", 'mpcth'),
		 	"type" 	=> "slider",
		 	"std" 	=> $default_values['sidebarHeadingSize'],
		 	"min" 	=> "8",
		 	"max" 	=> "58" );
	}

	if(isset($default_values['formsFontSize']) && $default_values['formsFontSize'] != '') {
		$options['mpcth_form_font_size'] = array(
		 	"id" 	=> "mpcth_form_font_size",
		 	"name" 	=> __("Form Font Size", 'mpcth'),
		 	"desc" 	=> __("Contact form & comment form font size.", 'mpcth'),
		 	"type" 	=> "slider",
			"std" 	=> $default_values['formsFontSize'],
		 	"min" 	=> "8",
		 	"max" 	=> "58" );
	}

	if(isset($default_values['buttonFontSize']) && $default_values['buttonFontSize'] != '') {
		$options['mpcth_button_font_size'] = array(
		 	"id" 	=> "mpcth_buttom_font_size",
		 	"name" 	=> __("Buttom Font Size", 'mpcth'),
		 	"desc" 	=> __("Contact form & comment form button font size.", 'mpcth'),
		 	"type" 	=> "slider",
		 	"std" 	=> $default_values['buttonFontSize'],
		 	"min" 	=> "8",
		 	"max" 	=> "58" );
	}

	if(isset($default_values['readmoreFontSize']) && $default_values['readmoreFontSize'] != '') {
		$options['mpcth_more_font_size'] = array(
		 	"id" 	=> "mpcth_more_font_size",
		 	"name" 	=> __("Read More Font Size", 'mpcth'),
		 	"desc" 	=> __("Read more button font size.", 'mpcth'),
		 	"type" 	=> "slider",
		 	"std" 	=> $default_values['readmoreFontSize'],
		 	"min" 	=> "8",
		 	"max" 	=> "58" );
	}

	if(isset($default_values['categoryFilterFontSize']) && $default_values['categoryFilterFontSize'] != '') {
		$options['mpcth_cat_filter_font_size'] = array(
		 	"id" 	=> "mpcth_cat_filter_font_size",
		 	"name" 	=> __("Category Filter Font Size", 'mpcth'),
		 	"desc" 	=> __("Cateogry filter font size.", 'mpcth'),
		 	"type" 	=> "slider",
		 	"std" 	=> $default_values['categoryFilterFontSize'],
		 	"min" 	=> "8",
		 	"max" 	=> "58" );
	}

/* ---------------------------------------------------------------- */
/* Font upload
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" 	=> __("Font Upload", 'mpcth'),
		"type" 	=> "accordion");

	$options['mpcth_font_upload'] = array(
		"id" 	=> "mpcth_font_upload",
		"name" 	=> __("Font Upload", 'mpcth'),
		"desc" 	=> __("Use this field if you want to upload unique font, it will appear in the Font Familly section.", 'mpcth'),
		"type" 	=> "font_upload",
		"std" 	=> "" );

/* ---------------------------------------------------------------- */
/* Elements
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" => __("Elements", 'mpcth'),
		"icon" => "mpcth-sc-icon-rocket",
		"type" => "heading" );

/* ---------------------------------------------------------------- */
/* Logo
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" => __("Logo", 'mpcth'),
		"type" => "accordion");

	if(isset($default_values['useTextLogo']) && $default_values['useTextLogo'] != '') {
		$options['mpcth_use_text_logo'] = array(
			"id" 	=> "mpcth_use_text_logo",
			"name" 	=> __("Use Text Logo", 'mpcth'),
			"desc" 	=> __("Check it if you want to use text logo.", 'mpcth'),
			"type" 	=> "checkbox",
			"std" 	=> $default_values['useTextLogo'] );
	}

	$options['mpcth_logo'] = array(
		"id" 	=> "mpcth_logo",
		"name" 	=> __("Upload Logo", 'mpcth'),
		"desc" 	=> __("Upload your logo here.", 'mpcth'),
		"type" 	=> "upload",
		"std"	=> "" );

	$options['mpcth_logo_2x'] = array(
		"id" 	=> "mpcth_logo_2x",
		"name" 	=> __("Upload Retina Logo", 'mpcth'),
		"desc" 	=> __("Upload your retina logo here.", 'mpcth'),
		"type" 	=> "upload",
		"std"	=> "" );

	if(isset($default_values['textLogo']) && $default_values['textLogo'] != '') {
		$options['mpcth_text_logo'] = array(
			"id" 	=> "mpcth_text_logo",
			"name" 	=> __("Text", 'mpcth'),
			"desc" 	=> __('Specify your site logo text.', 'mpcth'),
			"type" 	=> "text",
			"std" 	=> $default_values['textLogo'] );
	}

	if(isset($default_values['logoDescription']) && $default_values['logoDescription'] != '') {
		$options['mpcth_text_logo_description'] = array(
			"id" 	=> "mpcth_text_logo_description",
			"name" 	=> __("Description", 'mpcth'),
			"desc" 	=> __('Specify if the description (tagline) for your site should be displayed next to a logo.', 'mpcth'),
			"type" 	=> "checkbox",
			"std" 	=> $default_values['logoDescription'] );
	}

	$options['mpcth_logo_top'] = array(
	 	"id" 	=> "mpcth_logo_top",
	 	"name" 	=> __("Top Margin", 'mpcth'),
	 	"desc" 	=> __("Set logo top margin.", 'mpcth'),
	 	"type" 	=> "slider",
	 	"std" 	=> "0px",
	 	"min" 	=> "0",
	 	"max" 	=> "200" );

	$options['mpcth_logo_right'] = array(
	 	"id" 	=> "mpcth_logo_right",
	 	"name" 	=> __("Right Margin", 'mpcth'),
	 	"desc" 	=> __("Set logo right margin.", 'mpcth'),
	 	"type" 	=> "slider",
	 	"std" 	=> "0px",
	 	"min" 	=> "0",
	 	"max" 	=> "200" );

	$options['mpcth_logo_bottom'] = array(
		"id" 	=> "mpcth_logo_bottom",
	 	"name" 	=> __("Bottom Margin", 'mpcth'),
	 	"desc" 	=> __("Set logo bottom margin.", 'mpcth'),
	 	"type" 	=> "slider",
	 	"std" 	=> "0px",
	 	"min" 	=> "0",
	 	"max" 	=> "200" );

	$options['mpcth_logo_left'] = array(
	 	"id" 	=> "mpcth_logo_left",
	 	"name" 	=> __("Left Margin", 'mpcth'),
	 	"desc" 	=> __("Set logo left margin.", 'mpcth'),
	 	"type" 	=> "slider",
	 	"std" 	=> "0px",
	 	"min" 	=> "0",
	 	"max" 	=> "200" );

/* ---------------------------------------------------------------- */
/* Background
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" => __("Background", 'mpcth'),
		"type" => "accordion");

	$options['mpcth_background_type'] = array(
	"id" 				=> "mpcth_background_type",
	"name" 				=> __("Type", 'mpcth'),
	"desc" 				=> __("Select background type for your site.", 'mpcth'),
	"type" 				=> "select",
	"std" 				=> "none",
	"options" 			=> $background_options,
	"additional_fun" 	=> "hide",
	"options_class" 	=> array('mpcth_pattern_opt', 'mpcth_custom_opt', 'mpcth_none_opt') );

	$options['mpcth_background_pattern'] = array(
	"id" 				=> "mpcth_background_pattern",
	"name" 				=> __("Background Pattern", 'mpcth'),
	"desc" 				=> __("Choose background pattern for your site. This is a work in progress. There is are some issues with how the front end customizer saves checkbox options, and how the Options Framework does. Bear with me a bit while I work on a solution.", 'mpcth'),
	"class" 			=> "mpcth_pattern_opt",
	"type" 				=> "images",
	"std" 				=> "pattern1",
	"options" 			=> $background_patterns);
	
	$options['mpcth_custom_bg'] = array(
		"id" 	=> "mpcth_custom_bg",
		"name" 	=> __("Upload Background", 'mpcth'),
		"desc" 	=> __("Upload your background here.", 'mpcth'),
		"class" => "mpcth_custom_opt",
		"type" 	=> "upload" );

	$options['mpcth_repeat_background'] = array(
		"id" 	=> "mpcth_repeat_background",
		"name" 	=> __("Repeat Background", 'mpcth'),
		"desc" 	=> __("Check this option if you want to use your custom background as pattern.", 'mpcth'),
		"class" => "mpcth_custom_opt",
		"type" 	=> "checkbox",
		"std" 	=> "1" );

/* ---------------------------------------------------------------- */
/* Social - Footer
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" => __("Social Networks - Footer", 'mpcth'),
		"type" => "accordion");

	$options['mpcth_footer_socials'] = array(
		"id" 	=> "mpcth_footer_socials",
		"name" 	=> __("Enable Socials", 'mpcth'),
		"desc" 	=> __("Check this option if you want to display social buttons in footer.", 'mpcth'),
		"type" 	=> "checkbox",
		"std" 	=> "1" );

	$options['mpcth_social_dribbble'] = array(
		"id" 	=> "mpcth_social_dribbble",
		"name" 	=> __("Dribbble", 'mpcth'),
		"desc" 	=> __("Specify the link to your Dribbble account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_facebook'] = array(
		"id" 	=> "mpcth_social_facebook",
		"name" 	=> __("Facebook", 'mpcth'),
		"desc" 	=> __("Specify the link to your Facebook account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_flickr'] = array(
		"id" 	=> "mpcth_social_flickr",
		"name" 	=> __("Flickr", 'mpcth'),
		"desc" 	=> __("Specify the link to your Flickr account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_lastfm'] = array(
		"id" 	=> "mpcth_social_lastfm",
		"name" 	=> __("LastFM", 'mpcth'),
		"desc" 	=> __("Specify the link to your LastFM account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_linkedin'] = array(
		"id" 	=> "mpcth_social_linkedin",
		"name" 	=> __("LinkedIn", 'mpcth'),
		"desc" 	=> __("Specify the link to your LinkedIn account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_rss'] = array(
		"id" 	=> "mpcth_social_rss",
		"name" 	=> __("RSS", 'mpcth'),
		"desc" 	=> __("Specify the link to your RSS, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_stumbleupon'] = array(
		"id" 	=> "mpcth_social_stumbleupon",
		"name" 	=> __("Stumble Upon", 'mpcth'),
		"desc" 	=> __("Specify the link to your Stumble Upon account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_picasa'] = array(
		"id" 	=> "mpcth_social_picasa",
		"name" 	=> __("Picasa", 'mpcth'),
		"desc" 	=> __("Specify the link to your Picasa account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_tumblr'] = array(
		"id" 	=> "mpcth_social_tumblr",
		"name" 	=> __("Tumblr", 'mpcth'),
		"desc" 	=> __("Specify the link to your Tumblr account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_twitter'] = array(
		"id" 	=> "mpcth_social_twitter",
		"name" 	=> __("Twitter", 'mpcth'),
		"desc" 	=> __("Specify the link to your Twitter account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_gplus'] = array(
		"id" 	=> "mpcth_social_gplus",
		"name" 	=> __("Google Plus", 'mpcth'),
		"desc" 	=> __("Specify the link to your Google Plus account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_mail'] = array(
		"id" 	=> "mpcth_social_mail",
		"name" 	=> __("Email", 'mpcth'),
		"desc" 	=> __("Specify your email address, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_pinterest'] = array(
		"id" 	=> "mpcth_social_pinterest",
		"name" 	=> __("Pinterest", 'mpcth'),
		"desc" 	=> __("Specify the link to your Pinterest account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_vimeo'] = array(
		"id" 	=> "mpcth_social_vimeo",
		"name" 	=> __("Vimeo", 'mpcth'),
		"desc" 	=> __("Specify the link to your Vimeo account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

/* ---------------------------------------------------------------- */
/* Social - Header
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" => __("Social Networks - Header", 'mpcth'),
		"type" => "accordion");

	$options['mpcth_header_socials'] = array(
		"id" 	=> "mpcth_header_socials",
		"name" 	=> __("Enable Socials", 'mpcth'),
		"desc" 	=> __("Check this option if you want to display social buttons in header.", 'mpcth'),
		"type" 	=> "checkbox",
		"std" 	=> "1" );

	$options['mpcth_social_header_dribbble'] = array(
		"id" 	=> "mpcth_social_header_dribbble",
		"name" 	=> __("Dribbble", 'mpcth'),
		"desc" 	=> __("Specify the link to your Dribbble account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_header_facebook'] = array(
		"id" 	=> "mpcth_social_header_facebook",
		"name" 	=> __("Facebook", 'mpcth'),
		"desc" 	=> __("Specify the link to your Facebook account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_header_flickr'] = array(
		"id" 	=> "mpcth_social_header_flickr",
		"name" 	=> __("Flickr", 'mpcth'),
		"desc" 	=> __("Specify the link to your Flickr account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_header_lastfm'] = array(
		"id" 	=> "mpcth_social_header_lastfm",
		"name" 	=> __("LastFM", 'mpcth'),
		"desc" 	=> __("Specify the link to your LastFM account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_header_linkedin'] = array(
		"id" 	=> "mpcth_social_header_linkedin",
		"name" 	=> __("LinkedIn", 'mpcth'),
		"desc" 	=> __("Specify the link to your LinkedIn account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_header_rss'] = array(
		"id" 	=> "mpcth_social_header_rss",
		"name" 	=> __("RSS", 'mpcth'),
		"desc" 	=> __("Specify the link to your RSS, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_header_stumbleupon'] = array(
		"id" 	=> "mpcth_social_header_stumbleupon",
		"name" 	=> __("Stumble Upon", 'mpcth'),
		"desc" 	=> __("Specify the link to your Stumble Upon account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_header_picasa'] = array(
		"id" 	=> "mpcth_social_header_picasa",
		"name" 	=> __("Picasa", 'mpcth'),
		"desc" 	=> __("Specify the link to your Picasa account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_header_tumblr'] = array(
		"id" 	=> "mpcth_social_header_tumblr",
		"name" 	=> __("Tumblr", 'mpcth'),
		"desc" 	=> __("Specify the link to your Tumblr account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_header_twitter'] = array(
		"id" 	=> "mpcth_social_header_twitter",
		"name" 	=> __("Twitter", 'mpcth'),
		"desc" 	=> __("Specify the link to your Twitter account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_header_gplus'] = array(
		"id" 	=> "mpcth_social_header_gplus",
		"name" 	=> __("Google Plus", 'mpcth'),
		"desc" 	=> __("Specify the link to your Google Plus account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_header_mail'] = array(
		"id" 	=> "mpcth_social_header_mail",
		"name" 	=> __("Email", 'mpcth'),
		"desc" 	=> __("Specify your email address, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_header_pinterest'] = array(
		"id" 	=> "mpcth_social_header_pinterest",
		"name" 	=> __("Pinterest", 'mpcth'),
		"desc" 	=> __("Specify the link to your Pinterest account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

	$options['mpcth_social_header_vimeo'] = array(
		"id" 	=> "mpcth_social_header_vimeo",
		"name" 	=> __("Vimeo", 'mpcth'),
		"desc" 	=> __("Specify the link to your Vimeo account, if you don't want to use this icon just leave this field blank.", 'mpcth'),
		"type" 	=> "text",
		"std" 	=> "" );

/* ---------------------------------------------------------------- */
/* Social Share
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" => __("Social Shares", 'mpcth'),
		"type" => "accordion");

	if(isset($default_values['enableShare']) && $default_values['enableShare'] != '') {
		$options['mpcth_share'] = array(
			"id" 				=> "mpcth_share",
			"name" 				=> __("Enable Share", 'mpcth'),
			"desc" 				=> __("Check this option to enable share options inside blog posts and portfolio items. For the share feature to work correctly please intall the ZillaShare plugin.", 'mpcth'),
			"type" 				=> "checkbox",
			"std" 				=> $default_values['enableShare'],
			"additional_fun" 	=> "hide",
			"hide_class" 		=> "social_shares" );
	}

/* ---------------------------------------------------------------- */
/* Color
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" => __("Colors", 'mpcth'),
		"icon" => "mpcth-sc-icon-palette",
		"type" => "heading" );

/* ---------------------------------------------------------------- */
/* Global
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" 					=> __("Global", 'mpcth'),
		"type" 					=> "accordion",
		"visual_panel" 			=> "true",
		"visual_panel_title" 	=> __("Global Colors", 'mpcth'));

	if(isset($default_values['bodyColor']) && $default_values['bodyColor'] != '') {
		$options['mpcth_color_global_body'] = array(
			"id" 	=> "mpcth_color_global_body",
			"name" 	=> __("Body Color", 'mpcth'),
			"desc" 	=> __("Specify body font color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['bodyColor'] );
	}

	if(isset($default_values['headingColor']) && $default_values['headingColor'] != '') {
		$options['mpcth_color_global_heading'] = array(
			"id" 	=> "mpcth_color_global_heading",
			"name" 	=> __("Headings Color", 'mpcth'),
			"desc" 	=> __("Specify headings font color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['headingColor'] );
	}

	if(isset($default_values['linkColor']) && $default_values['linkColor'] != '') {
		$options['mpcth_color_global_link'] = array(
			"id" 	=> "mpcth_color_global_link",
			"name" 	=> __("Link Color", 'mpcth'),
			"desc" 	=> __("Specify link font color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['linkColor'] );
	}

	if(isset($default_values['hoverColor']) && $default_values['hoverColor'] != '') {
		$options['mpcth_color_global_linkhover'] = array(
			"id" 	=> "mpcth_color_global_linkhover",
			"name" 	=> __("Link Hover Color", 'mpcth'),
			"desc" 	=> __("Specify link font color after hover.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['hoverColor'] );
	}

	if(isset($default_values['altLinkColor']) && $default_values['altLinkColor'] != '') {
		$options['mpcth_color_global_alt_link'] = array(
			"id" 	=> "mpcth_color_global_alt_link",
			"name" 	=> __("Alternative Link Color", 'mpcth'),
			"desc" 	=> __("Specify alternative link font color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['altLinkColor'] );
	}

	if(isset($default_values['altHoverColor']) && $default_values['altHoverColor'] != '') {
		$options['mpcth_color_global_alt_linkhover'] = array(
			"id" 	=> "mpcth_color_global_alt_linkhover",
			"name" 	=> __("Alternative Link Hover Color", 'mpcth'),
			"desc" 	=> __("Specify alternative link font color after hover.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['altHoverColor'] );
	}

/* ---------------------------------------------------------------- */
/* Background
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name"					 => __("Background", 'mpcth'),
		"type"					 => "accordion",
		"visual_panel"			 => "true",
		"visual_panel_title"	 => __("Background Colors", 'mpcth'));

	if(isset($default_values['headerBG']) && $default_values['headerBG'] != '') {
		$options['mpcth_color_bg_header'] = array(
			"id"	=> "mpcth_color_bg_header",
			"name"	=> __("Header Background", 'mpcth'),
			"desc"	=> __("Specify header background color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['headerBG'] );
	}

	if(isset($default_values['wrapBG']) && $default_values['wrapBG'] != '') {
		$options['mpcth_color_bg_main'] = array(
			"id"	=> "mpcth_color_bg_main",
			"name"	=> __("Content Wrap Background", 'mpcth'),
			"desc"	=> __("Specify content background color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['wrapBG'] );
	}

	if(isset($default_values['footerBG']) && $default_values['footerBG'] != '') {
		$options['mpcth_color_bg_footer'] = array(
			"id"	=> "mpcth_color_bg_footer",
			"name"	=> __("Footer Background", 'mpcth'),
			"desc"	=> __("Specify footer background color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['footerBG'] );
	}

	if(isset($default_values['copyrightsBG']) && $default_values['copyrightsBG'] != '') {
		$options['mpcth_copyrights_bg'] = array(
			"id"	=> "mpcth_copyrights_bg",
			"name"	=> __("Copyrights Background", 'mpcth'),
			"desc"	=> __("Specify copyrights background color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['copyrightsBG'] );
	}

	if(isset($default_values['sidebarBG']) && $default_values['sidebarBG'] != '') {
		$options['mpcth_color_bg_sidebar'] = array(
			"id"	=> "mpcth_color_bg_sidebar",
			"name"	=> __("Sidebar Background", 'mpcth'),
			"desc"	=> __("Specify sidebar background color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['sidebarBG'] );
	}

	if(isset($default_values['contentBG']) && $default_values['contentBG'] != '') {
		$options['mpcth_color_bg_container'] = array(
			"id"	=> "mpcth_color_bg_container",
			"name"	=> __("Container Background", 'mpcth'),
			"desc"	=> __("Specify container background color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['contentBG'] );
	}

	if(isset($default_values['postBG']) && $default_values['postBG'] != '') {
		$options['mpcth_color_bg_post'] = array(
			"id"	=> "mpcth_color_bg_post",
			"name"	=> __("Post Background", 'mpcth'),
			"desc"	=> __("Specify post container background color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['postBG'] );
	}

	if(isset($default_values['menuBGColor']) && $default_values['menuBGColor'] != '') {
		$options['mpcth_mainmenu_bg'] = array(
			"id"	=> "mpcth_mainmenu_bg",
			"name"	=> __("Main Menu Background", 'mpcth'),
			"desc"	=> __("Specify main menu background color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['menuBGColor'] );
	}

	if(isset($default_values['topMenuBG']) && $default_values['topMenuBG'] != '') {
		$options['mpcth_color_tm_bg'] = array(
			"id"	=> "mpcth_color_tm_bg",
			"name"	=> __("Top Menu Background", 'mpcth'),
			"desc"	=> __("Specify top menu background color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['topMenuBG'] );
	}

	if(isset($default_values['pageHeaderBG']) && $default_values['pageHeaderBG'] != '') {
		$options['mpcth_color_bg_page_header'] = array(
			"id"	=> "mpcth_color_bg_page_header",
			"name"	=> __("Page Header Background", 'mpcth'),
			"desc"	=> __("Specify page header background color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['pageHeaderBG'] );
	}

	// if(isset($default_values['topWidgetAreaBG']) && $default_values['topWidgetAreaBG'] != '') {
	// 	$options['mpcth_top_widget_bg'] = array(
	// 		"id" 	=> "mpcth_top_widget_bg",
	// 		"name" 	=> __("Top Widget Area Background", 'mpcth'),
	// 		"desc"	=> __("Specify top widget area background color.", 'mpcth'),
	// 		"type" 	=> "color",
	// 		"std"	=> $default_values['topWidgetAreaBG'] );
	// }

/* ---------------------------------------------------------------- */
/* Main Menu
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name"					 => __("Main Menu", 'mpcth'),
		"type"					 => "accordion",
		"visual_panel"			 => "true",
		"visual_panel_title"	 => __("Main Menu Colors", 'mpcth'));

	if(isset($default_values['menuFontColor']) && $default_values['menuFontColor'] != '') {
		$options['mpcth_color_mm_menu'] = array(
			"id"	=> "mpcth_color_mm_menu",
			"name"	=> __("Font Color", 'mpcth'),
			"desc"	=> __("Specify main menu font color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['menuFontColor'] );
	}

	if(isset($default_values['menuFontHoverColor']) && $default_values['menuFontHoverColor'] != '') {
		$options['mpcth_color_mm_menu_hover'] = array(
			"id"	=> "mpcth_color_mm_menu_hover",
			"name"	=> __("Hover Font Color", 'mpcth'),
			"desc"	=> __("Specify main menu font color after hover.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['menuFontHoverColor'] );
	}

	if(isset($default_values['menuFontActiveColor']) && $default_values['menuFontActiveColor'] != '') {
		$options['mpcth_color_mm_menuactive'] = array(
			"id"	=> "mpcth_color_mm_menuactive",
			"name"	=> __("Font Active Color", 'mpcth'),
			"desc"	=> __("Specify main menu font active color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['menuFontActiveColor'] );
	}

	if(isset($default_values['menuDropFontColor']) && $default_values['menuDropFontColor'] != '') {
		$options['mpcth_color_mm_drop'] = array(
			"id"	=> "mpcth_color_mm_drop",
			"name"	=> __("Drop Down Font Color", 'mpcth'),
			"desc"	=> __("Specify main menu drop down font color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['menuDropFontColor'] );
	}

	if(isset($default_values['menuDropFontHoverColor']) && $default_values['menuDropFontHoverColor'] != '') {
		$options['mpcth_color_mm_drop_hover'] = array(
			"id"	=> "mpcth_color_mm_drop_hover",
			"name"	=> __("Drop Down Hover Font Color", 'mpcth'),
			"desc"	=> __("Specify main menu drop down font color after hover.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['menuDropFontHoverColor'] );
	}

	if(isset($default_values['menuDropFontActiveColor']) && $default_values['menuDropFontActiveColor'] != '') {
		$options['mpcth_color_mm_dropactive'] = array(
			"id"	=> "mpcth_color_mm_dropactive",
			"name"	=> __("Drop Down Font Active Color", 'mpcth'),
			"desc"	=> __("Specify main menu drop down font active color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['menuDropFontActiveColor'] );
	}
	
	if(isset($default_values['menuItemBG']) && $default_values['menuItemBG'] != '') {// Background
		$options['mpcth_color_mm_bg_menu'] = array(
			"id"	=> "mpcth_color_mm_bg_menu",
			"name"	=> __("Background Color", 'mpcth'),
			"desc"	=> __("Specify main menu item background color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['menuItemBG'] );
	}

	if(isset($default_values['menuItemBGHover']) && $default_values['menuItemBGHover'] != '') {
		$options['mpcth_color_mm_bg_menu_hover'] = array(
			"id"	=> "mpcth_color_mm_bg_menu_hover",
			"name"	=> __("Hover Background Color", 'mpcth'),
			"desc"	=> __("Specify main menu background color after hover.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['menuItemBGHover'] );
	}

	if(isset($default_values['menuItemBGActive']) && $default_values['menuItemBGActive'] != '') {
		$options['mpcth_color_mm_bg_menuactive'] = array(
			"id"	=> "mpcth_color_mm_bg_menuactive",
			"name"	=> __("Background Active Color", 'mpcth'),
			"desc"	=> __("Specify main menu background active color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['menuItemBGActive'] );
	}

	if(isset($default_values['menuDropItemBG']) && $default_values['menuDropItemBG'] != '') {
		$options['mpcth_color_mm_bg_drop'] = array(
			"id"	=> "mpcth_color_mm_bg_drop",
			"name"	=> __("Drop Down Background Color", 'mpcth'),
			"desc"	=> __("Specify main menu drop down background color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['menuDropItemBG'] );
	}

	if(isset($default_values['menuDropItemBGHover']) && $default_values['menuDropItemBGHover'] != '') {
		$options['mpcth_color_mm_bg_drop_hover'] = array(
			"id"	=> "mpcth_color_mm_bg_drop_hover",
			"name"	=> __("Drop Down Hover Background Color", 'mpcth'),
			"desc"	=> __("Specify main menu drop down background color after hover.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['menuDropItemBGHover'] );
	}

	if(isset($default_values['menuDropItemBGActive']) && $default_values['menuDropItemBGActive'] != '') {
		$options['mpcth_color_mm_bg_dropactive'] = array(
			"id"	=> "mpcth_color_mm_bg_dropactive",
			"name"	=> __("Drop Down Background Active Color", 'mpcth'),
			"desc"	=> __("Specify main menu drop down background active color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['menuDropItemBGActive'] );
	}

	if(isset($default_values['menuStripeColor']) && $default_values['menuStripeColor'] != '') {
		$options['mpcth_color_stripe'] = array(
			"id"	=> "mpcth_color_stripe",
			"name"	=> __("Stripe Active Color", 'mpcth'),
			"desc"	=> __("Specify main menu stripe active color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['menuStripeColor'] );
	}

	if(isset($default_values['menuStripeBGColor']) && $default_values['menuStripeBGColor'] != '') {
		$options['mpcth_color_stripe_bg'] = array(
			"id"	=> "mpcth_color_stripe_bg",
			"name"	=> __("Stripe Background Color", 'mpcth'),
			"desc"	=> __("Specify main menu stripe background color.", 'mpcth'),
			"type"	=> "color",
			"std"	=> $default_values['menuStripeBGColor'] );
	}

/* ---------------------------------------------------------------- */
/* Top Menu
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" 					=> __("Top Menu", 'mpcth'),
		"type" 					=> "accordion",
		"visual_panel" 			=> "true",
		"visual_panel_title" 	=> __("Top Menu Colors", 'mpcth'));

	if(isset($default_values['topMenuFontColor']) && $default_values['topMenuFontColor'] != '') {
		$options['mpcth_color_tm_menu'] = array(
			"id" 	=> "mpcth_color_tm_menu",
			"name" 	=> __("Font Color", 'mpcth'),
			"desc" 	=> __("Specify top menu font color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['topMenuFontColor'] );
	}

	if(isset($default_values['topMenuFontHover']) && $default_values['topMenuFontHover'] != '') {
		$options['mpcth_color_tm_menu_hover'] = array(
			"id" 	=> "mpcth_color_tm_menu_hover",
			"name" 	=> __("Hover Font Color", 'mpcth'),
			"desc" 	=> __("Specify top menu hover font color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['topMenuFontHover'] );
	}

	if(isset($default_values['topMenuFontActive']) && $default_values['topMenuFontActive'] != '') {
		$options['mpcth_color_tm_menuactive'] = array(
			"id" 	=> "mpcth_color_tm_menuactive",
			"name" 	=> __("Font Active Color", 'mpcth'),
			"desc" 	=> __("Specify top menu font active color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['topMenuFontActive'] );
	}

	if(isset($default_values['topMenuItemBG']) && $default_values['topMenuItemBG'] != '') {
		$options['mpcth_color_tm_itembg'] = array(
			"id" 	=> "mpcth_color_tm_itembg",
			"name" 	=> __("Item Background Color", 'mpcth'),
			"desc" 	=> __("Specify top menu item background color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['topMenuItemBG'] );
	}

	if(isset($default_values['topMenuItemBGHover']) && $default_values['topMenuItemBGHover'] != '') {
		$options['mpcth_color_tm_itembg_hover'] = array(
			"id" 	=> "mpcth_color_tm_itembg_hover",
			"name" 	=> __("Hover Item Background Color", 'mpcth'),
			"desc" 	=> __("Specify top menu hover item background color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['topMenuItemBGHover'] );
	}

	if(isset($default_values['topMenuItemBGActive']) && $default_values['topMenuItemBGActive'] != '') {
		$options['mpcth_color_tm_itembgactive'] = array(
			"id" 	=> "mpcth_color_tm_itembgactive",
			"name" 	=> __("Item Active Background Color", 'mpcth'),
			"desc" 	=> __("Specify top menu item active background color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['topMenuItemBGActive'] );
	}

/* ---------------------------------------------------------------- */
/* Comment Form
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name" 					=> __("Comment Form", 'mpcth'),
		"type" 					=> "accordion",
		"visual_panel" 			=> "true",
		"visual_panel_title" 	=> __("Comment Form Colors", 'mpcth'));

	if(isset($default_values['commentFormFontColor']) && $default_values['commentFormFontColor'] != '') {
		$options['mpcth_color_cf_color'] = array(
			"id" 	=> "mpcth_color_cf_color",
			"name" 	=> __("Font Color", 'mpcth'),
			"desc" 	=> __("Specify comment form font color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['commentFormFontColor'] );
	}

	if(isset($default_values['commentFormItemBG']) && $default_values['commentFormItemBG'] != '') {
		$options['mpcth_color_cf_bg'] = array(
			"id" 	=> "mpcth_color_cf_bg",
			"name" 	=> __("Background Color", 'mpcth'),
			"desc" 	=> __("Specify comment form background color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['commentFormItemBG'] );
	}

	if(isset($default_values['commentFormBorder']) && $default_values['commentFormBorder'] != '') {
		$options['mpcth_color_cf_border'] = array(
			"id" 	=> "mpcth_color_cf_border",
			"name" 	=> __("Border Color", 'mpcth'),
			"desc" 	=> __("Specify comment form border color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['commentFormBorder'] );
	}

	if(isset($default_values['commentFormFontHoverColor']) && $default_values['commentFormFontHoverColor'] != '') {
		$options['mpcth_color_cf_color_hover'] = array(
			"id" 	=> "mpcth_color_cf_color_hover",
			"name" 	=> __("Hover Font Color", 'mpcth'),
			"desc" 	=> __("Specify comment form hover font color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['commentFormFontHoverColor'] );
	}

	if(isset($default_values['commentFormItemBGHover']) && $default_values['commentFormItemBGHover'] != '') {
		$options['mpcth_color_cf_bg_hover'] = array(
			"id" 	=> "mpcth_color_cf_bg_hover",
			"name" 	=> __("Hover Background Color", 'mpcth'),
			"desc" 	=> __("Specify comment form hover background color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['commentFormItemBGHover'] );
	}

	if(isset($default_values['commentFormBorderHover']) && $default_values['commentFormBorderHover'] != '') {
		$options['mpcth_color_cf_border_hover'] = array(
			"id" 	=> "mpcth_color_cf_border_hover",
			"name" 	=> __("Hover Border Color", 'mpcth'),
			"desc" 	=> __("Specify comment form hover border color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['commentFormBorderHover'] );
	}

	if(isset($default_values['commentFormFontActiveColor']) && $default_values['commentFormFontActiveColor'] != '') {
		$options['mpcth_color_cf_color_active'] = array(
			"id" 	=> "mpcth_color_cf_color_active",
			"name" 	=> __("Active Field Font Color", 'mpcth'),
			"desc" 	=> __("Specify comment form active field font color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['commentFormFontActiveColor'] );
	}

	if(isset($default_values['commentFormItemBGActive']) && $default_values['commentFormItemBGActive'] != '') {
		$options['mpcth_color_cf_bg_active'] = array(
			"id" 	=> "mpcth_color_cf_bg_active",
			"name" 	=> __("Active Field Background Color", 'mpcth'),
			"desc" 	=> __("Specify comment form active field background color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['commentFormItemBGActive'] );
	}

	if(isset($default_values['commentFormBorderActive']) && $default_values['commentFormBorderActive'] != '') {
		$options['mpcth_color_cf_border_active'] = array(
			"id" 	=> "mpcth_color_cf_border_active",
			"name" 	=> __("Active Field Border Color", 'mpcth'),
			"desc" 	=> __("Specify comment form active field border color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['commentFormBorderActive'] );
	}


	if(isset($default_values['commentFormFontErrorColor']) && $default_values['commentFormFontErrorColor'] != '') {
		$options['mpcth_color_cf_color_error'] = array(
			"id" 	=> "mpcth_color_cf_color_error",
			"name" 	=> __("Error Font Color", 'mpcth'),
			"desc" 	=> __("Specify comment form error font color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['commentFormFontErrorColor'] );
	}

	if(isset($default_values['commentFormItemBGError']) && $default_values['commentFormItemBGError'] != '') {
		$options['mpcth_color_cf_bg_error'] = array(
			"id" 	=> "mpcth_color_cf_bg_error",
			"name" 	=> __("Error Background Color", 'mpcth'),
			"desc" 	=> __("Specify comment form error background color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['commentFormItemBGError'] );
	}

	if(isset($default_values['commentFormBorderError']) && $default_values['commentFormBorderError'] != '') {
		$options['mpcth_color_cf_border_error'] = array(
			"id" 	=> "mpcth_color_cf_border_error",
			"name" 	=> __("Error Border Color", 'mpcth'),
			"desc" 	=> __("Specify comment form error border color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['commentFormBorderError'] );
	}

	if(isset($default_values['commentFormLabelError']) && $default_values['commentFormLabelError'] != '') {
		$options['mpcth_color_cf_label_error'] = array(
			"id" 	=> "mpcth_color_cf_label_error",
			"name" 	=> __("Error Label Color", 'mpcth'),
			"desc" 	=> __("Specify comment form error label color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['commentFormLabelError'] );
	}

/* ---------------------------------------------------------------- */
/* Contact Form
/* ---------------------------------------------------------------- */

	$options[] = array(
		"name" 					=> __("Contact Form", 'mpcth'),
		"type" 					=> "accordion",
		"visual_panel" 			=> "true",
		"visual_panel_title" 	=> __("Contact Form Colors", 'mpcth'));

	if(isset($default_values['contactFormFontColor']) && $default_values['contactFormFontColor'] != '') {
		$options['mpcth_color_cu_color'] = array(
			"id" 	=> "mpcth_color_cu_color",
			"name" 	=> __("Font Color", 'mpcth'),
			"desc" 	=> __("Specify contact form font color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['contactFormFontColor'] );
	}

	if(isset($default_values['contactFormItemBG']) && $default_values['contactFormItemBG'] != '') {
		$options['mpcth_color_cu_bg'] = array(
			"id" 	=> "mpcth_color_cu_bg",
			"name" 	=> __("Background Color", 'mpcth'),
			"desc" 	=> __("Specify contact form background color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['contactFormItemBG'] );
	}

	if(isset($default_values['contactFormBorder']) && $default_values['contactFormBorder'] != '') {
		$options['mpcth_color_cu_border'] = array(
			"id" 	=> "mpcth_color_cu_border",
			"name" 	=> __("Border Color", 'mpcth'),
			"desc" 	=> __("Specify contact form border color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['contactFormBorder'] );
	}

	if(isset($default_values['contactFormFontHoverColor']) && $default_values['contactFormFontHoverColor'] != '') {
		$options['mpcth_color_cu_color_hover'] = array(
			"id" 	=> "mpcth_color_cu_color_hover",
			"name" 	=> __("Hover Font Color", 'mpcth'),
			"desc" 	=> __("Specify contact form hover font color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['contactFormFontHoverColor'] );
	}

	if(isset($default_values['contactFormItemBGHover']) && $default_values['contactFormItemBGHover'] != '') {
		$options['mpcth_color_cu_bg_hover'] = array(
			"id" 	=> "mpcth_color_cu_bg_hover",
			"name" 	=> __("Hover Background Color", 'mpcth'),
			"desc" 	=> __("Specify contact form hover background color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['contactFormItemBGHover'] );
	}

	if(isset($default_values['contactFormBorderHover']) && $default_values['contactFormBorderHover'] != '') {
		$options['mpcth_color_cu_border_hover'] = array(
			"id" 	=> "mpcth_color_cu_border_hover",
			"name" 	=> __("Hover Border Color", 'mpcth'),
			"desc" 	=> __("Specify contact form hover border color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['contactFormBorderHover'] );
	}

	if(isset($default_values['contactFormFontActiveColor']) && $default_values['contactFormFontActiveColor'] != '') {
		$options['mpcth_color_cu_color_active'] = array(
			"id" 	=> "mpcth_color_cu_color_active",
			"name" 	=> __("Active Field Font Color", 'mpcth'),
			"desc" 	=> __("Specify contact form active field font color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['contactFormFontActiveColor'] );
	}

	if(isset($default_values['contactFormItemBGActive']) && $default_values['contactFormItemBGActive'] != '') {
		$options['mpcth_color_cu_bg_active'] = array(
			"id" 	=> "mpcth_color_cu_bg_active",
			"name" 	=> __("Active Field Background Color", 'mpcth'),
			"desc" 	=> __("Specify contact form active field background color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['contactFormItemBGActive'] );
	}

	if(isset($default_values['contactFormBorderActive']) && $default_values['contactFormBorderActive'] != '') {
		$options['mpcth_color_cu_border_active'] = array(
			"id" 	=> "mpcth_color_cu_border_active",
			"name" 	=> __("Active Field Border Color", 'mpcth'),
			"desc" 	=> __("Specify contact form active field border color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['contactFormBorderActive'] );
	}
		
		if(isset($default_values['contactFormFontErrorColor']) && $default_values['contactFormFontErrorColor'] != '') {	
		$options['mpcth_color_cu_color_error'] = array(
			"id" 	=> "mpcth_color_cu_color_error",
			"name" 	=> __("Error Font Color", 'mpcth'),
			"desc" 	=> __("Specify contact form error font color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['contactFormFontErrorColor'] );
	}

	if(isset($default_values['contactFormItemBGError']) && $default_values['contactFormItemBGError'] != '') {
		$options['mpcth_color_cu_bg_error'] = array(
			"id" 	=> "mpcth_color_cu_bg_error",
			"name" 	=> __("Error Background Color", 'mpcth'),
			"desc" 	=> __("Specify contact form error background color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['contactFormItemBGError'] );
	}

	if(isset($default_values['contactFormBorderError']) && $default_values['contactFormBorderError'] != '') {
		$options['mpcth_color_cu_border_error'] = array(
			"id" 	=> "mpcth_color_cu_border_error",
			"name" 	=> __("Error Border Color", 'mpcth'),
			"desc" 	=> __("Specify contact form error border color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['contactFormBorderError'] );
	}

	if(isset($default_values['contactFormLabelError']) && $default_values['contactFormLabelError'] != '') {
		$options['mpcth_color_cu_label_error'] = array(
			"id" 	=> "mpcth_color_cu_label_error",
			"name" 	=> __("Error Label Color", 'mpcth'),
			"desc" 	=> __("Specify contact form error label color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['contactFormLabelError'] );
	}

	if(isset($default_values['contactFormLabelSuccess']) && $default_values['contactFormLabelSuccess'] != '') {
		$options['mpcth_color_cu_label_success'] = array(
			"id" 	=> "mpcth_color_cu_label_success",
			"name" 	=> __("Success Label Color", 'mpcth'),
			"desc" 	=> __("Specify contact form success label color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['contactFormLabelSuccess'] );
	}

/* ---------------------------------------------------------------- */
/* Button
/* ---------------------------------------------------------------- */

	$options[] = array(
		"name" 					=> __("Button - Submit", 'mpcth'),
		"type" 					=> "accordion",
		"visual_panel" 			=> "true",
		"visual_panel_title" 	=> __("Buttom - Submit", 'mpcth'));

	if(isset($default_values['submitFontColor']) && $default_values['submitFontColor'] != '') {
		$options['mpcth_color_submit_text'] = array(
			"id" 	=> "mpcth_color_submit_text",
			"name" 	=> __("Font Color", 'mpcth'),
			"desc" 	=> __("Specify text color for the submit button in contact form & comment form.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['submitFontColor'] );
	}

	if(isset($default_values['submitItemBG']) && $default_values['submitItemBG'] != '') {
		$options['mpcth_color_submit_bg'] = array(
			"id" 	=> "mpcth_color_submit_bg",
			"name" 	=> __("Background Color", 'mpcth'),
			"desc" 	=> __("Specify background color for the submit button in contact form & comment form.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['submitItemBG'] );
	}

	if(isset($default_values['submitBorder']) && $default_values['submitBorder'] != '') {
		$options['mpcth_color_submit_border'] = array(
			"id" 	=> "mpcth_color_submit_border",
			"name" 	=> __("Border Color", 'mpcth'),
			"desc" 	=> __("Specify border color for the submit button in contact form & comment form.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['submitBorder'] );
	}

	if(isset($default_values['submitFontHoverColor']) && $default_values['submitFontHoverColor'] != '') {
		$options['mpcth_color_submit_text_hover'] = array(
			"id" 	=> "mpcth_color_submit_text_hover",
			"name" 	=> __("Hover Font Color", 'mpcth'),
			"desc" 	=> __("Specify text color for the submit button in contact form & comment form after hover.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['submitFontHoverColor'] );
	}

	if(isset($default_values['submitItemBGHover']) && $default_values['submitItemBGHover'] != '') {
		$options['mpcth_color_submit_bg_hover'] = array(
			"id" 	=> "mpcth_color_submit_bg_hover",
			"name" 	=> __("Hover Background Color", 'mpcth'),
			"desc" 	=> __("Specify background color for the submit button in contact form & comment form after hover.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['submitItemBGHover'] );
	}

	if(isset($default_values['submitBorderHover']) && $default_values['submitBorderHover'] != '') {
		$options['mpcth_color_submit_border_hover'] = array(
			"id" 	=> "mpcth_color_submit_border_hover",
			"name" 	=> __("Hover Border Color", 'mpcth'),
			"desc" 	=> __("Specify border color for the submit button in contact form & comment form after hover.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['submitBorderHover'] );
	}

/* ---------------------------------------------------------------- */
/* Blog & Portfolio
/* ---------------------------------------------------------------- */

	$options[] = array(
		"name" 					=> __("Blog & Portfolio", 'mpcth'),
		"type" 					=> "accordion",
		"visual_panel" 			=> "true",
		"visual_panel_title" 	=> __("Blog & Portfolio", 'mpcth'));

	if(isset($default_values['metaColor']) && $default_values['metaColor'] != '') {
		$options['mpcth_color_meta'] = array(
			"id" 	=> "mpcth_color_meta",
			"name" 	=> __("Meta Data", 'mpcth'),
			"desc" 	=> __("Specify color of the meta data displayed for each post.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['metaColor'] );
	}

	if(isset($default_values['readmoreColor']) && $default_values['readmoreColor'] != '') {
		$options['mpcth_color_more'] = array(
			"id" 	=> "mpcth_color_more",
			"name" 	=> __("Read More", 'mpcth'),
			"desc" 	=> __("Specify color of the read more button displayed for each post.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['readmoreColor'] );
	}

	if(isset($default_values['readmoreBGColor']) && $default_values['readmoreBGColor'] != '') {
		$options['mpcth_color_more_bg'] = array(
			"id" 	=> "mpcth_color_more_bg",
			"name" 	=> __("Read More Background", 'mpcth'),
			"desc" 	=> __("Specify background color of the read more button displayed for each post.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['readmoreBGColor'] );
	}

	if(isset($default_values['readmoreHoverColor']) && $default_values['readmoreHoverColor'] != '') {
		$options['mpcth_color_more_hover'] = array(
			"id" 	=> "mpcth_color_more_hover",
			"name" 	=> __("Read More Hover", 'mpcth'),
			"desc" 	=> __("Specify color of the read more button displayed for each post after hover.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['readmoreHoverColor'] );
	}

	if(isset($default_values['readmoreHoverBGColor']) && $default_values['readmoreHoverBGColor'] != '') {
		$options['mpcth_color_more_bg_hover'] = array(
			"id" 	=> "mpcth_color_more_bg_hover",
			"name" 	=> __("Read More Background Hover", 'mpcth'),
			"desc" 	=> __("Specify background color of the read more button displayed for each post after hover.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['readmoreHoverBGColor'] );
	}

	if(isset($default_values['loadmoreColor']) && $default_values['loadmoreColor'] != '') {
		$options['mpcth_color_loadmore'] = array(
			"id" 	=> "mpcth_color_loadmore",
			"name" 	=> __("Load More", 'mpcth'),
			"desc" 	=> __("Specify color of the load more button.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['loadmoreColor'] );
	}

	if(isset($default_values['loadmoreBGColor']) && $default_values['loadmoreBGColor'] != '') {
		$options['mpcth_color_bg_loadmore'] = array(
			"id" 	=> "mpcth_color_bg_loadmore",
			"name" 	=> __("Load More Background", 'mpcth'),
			"desc" 	=> __("Specify background color of the load more button.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['loadmoreBGColor'] );
	}

	if(isset($default_values['loadmoreHoverColor']) && $default_values['loadmoreHoverColor'] != '') {
		$options['mpcth_color_loadmore_active'] = array(
			"id" 	=> "mpcth_color_loadmore_active",
			"name" 	=> __("Load More Hover", 'mpcth'),
			"desc" 	=> __("Specify color of the load more button after hover.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['loadmoreHoverColor'] );
	}

	if(isset($default_values['loadmoreHoverBGColor']) && $default_values['loadmoreHoverBGColor'] != '') {
		$options['mpcth_color_loadmore_bg_active'] = array(
			"id" 	=> "mpcth_color_loadmore_bg_active",
			"name" 	=> __("Load More Background Hover", 'mpcth'),
			"desc" 	=> __("Specify background color of the load more button after hover.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['loadmoreHoverBGColor'] );
	}

	if(isset($default_values['lightboxIcon']) && $default_values['lightboxIcon'] != '') {
		$options['mpcth_color_lb'] = array(
			"id" 	=> "mpcth_color_lb",
			"name" 	=> __("Lightbox Icon", 'mpcth'),
			"desc" 	=> __("Specify color of the lightbox icon.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['lightboxIcon'] );
	}

	if(isset($default_values['lightboxIconBG']) && $default_values['lightboxIconBG'] != '') {
		$options['mpcth_color_lb_bg'] = array(
			"id" 	=> "mpcth_color_lb_bg",
			"name" 	=> __("Lightbox Icon Background", 'mpcth'),
			"desc" 	=> __("Specify background color of the lightbox icon.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['lightboxIconBG'] );
	}

	if(isset($default_values['categoryFilterFont']) && $default_values['categoryFilterFont'] != '') {
		$options['mpcth_color_cat_text'] = array(
			"id" 	=> "mpcth_color_cat_text",
			"name" 	=> __("Category Filter Font", 'mpcth'),
			"desc" 	=> __("Specify color of the category filter font.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['categoryFilterFont'] );
	}

	if(isset($default_values['categoryFilterBG']) && $default_values['categoryFilterBG'] != '') {
		$options['mpcth_color_cat_bg'] = array(
			"id" 	=> "mpcth_color_cat_bg",
			"name" 	=> __("Category Filter Background", 'mpcth'),
			"desc" 	=> __("Specify color of the category filter background.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['categoryFilterBG'] );
	}

	if(isset($default_values['categoryFilterFontHover']) && $default_values['categoryFilterFontHover'] != '') {
		$options['mpcth_color_cat_text_hover'] = array(
			"id" 	=> "mpcth_color_cat_text_hover",
			"name" 	=> __("Hover Category Filter Font", 'mpcth'),
			"desc" 	=> __("Specify color of the category filter font after hover.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['categoryFilterFontHover'] );
	}

	if(isset($default_values['categoryFilterBGHover']) && $default_values['categoryFilterBGHover'] != '') {
		$options['mpcth_color_cat_bg_hover'] = array(
			"id" 	=> "mpcth_color_cat_bg_hover",
			"name" 	=> __("Hover Category Filter Background", 'mpcth'),
			"desc" 	=> __("Specify color of the category filter background after hover.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['categoryFilterBGHover'] );
	}


	$options['mpcth_color_item_hover'] = array(
		"id" 	=> "mpcth_color_item_hover",
		"name" 	=> __("Hover Item Overlay Color", 'mpcth'),
		"desc" 	=> __("Specify color of the hover effect on item.", 'mpcth'),
		"type" 	=> "color",
		"std" 	=> '#48C78B' );
	

/* ---------------------------------------------------------------- */
/* Logo
/* ---------------------------------------------------------------- */
	$options[] = array(
		"name"					 => __("Logo", 'mpcth'),
		"type"					 => "accordion",
		"visual_panel"			 => "true",
		"visual_panel_title"	 => __("Logo Colors", 'mpcth'));

	if(isset($default_values['logoFontColor']) && $default_values['logoFontColor'] != '') {
		$options['mpcth_text_logo_color'] = array(
			"id" 	=> "mpcth_text_logo_color",
			"name" 	=> __("Font Color", 'mpcth'),
			"desc" 	=> __("Specify text logo font color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['logoFontColor'] );
	}

	if(isset($default_values['logoBG']) && $default_values['logoBG'] != '') {
		$options['mpcth_text_logo_bg'] = array(
			"id" 	=> "mpcth_text_logo_bg",
			"name" 	=> __("Background Color", 'mpcth'),
			"desc" 	=> __("Specify text logo background color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['logoBG'] );
	}

	if(isset($default_values['descriptionFontColor']) && $default_values['descriptionFontColor'] != '') {
		$options['mpcth_text_logo_description_color'] = array(
			"id" 	=> "mpcth_text_logo_description_color",
			"name" 	=> __("Description Font Color", 'mpcth'),
			"desc" 	=> __("Specify description font color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['descriptionFontColor'] );
	}

	if(isset($default_values['descriptionBG']) && $default_values['descriptionBG'] != '') {
		$options['mpcth_text_logo_description_bg'] = array(
			"id" 	=> "mpcth_text_logo_description_bg",
			"name" 	=> __("Description Background Color", 'mpcth'),
			"desc" 	=> __("Specify description background color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['descriptionBG'] );
	}

/* ---------------------------------------------------------------- */
/* Other
/* ---------------------------------------------------------------- */

	$options[] = array(
		"name" 					=> __("Other", 'mpcth'),
		"type" 					=> "accordion",
		"visual_panel" 			=> "true",
		"visual_panel_title" 	=> __("Other", 'mpcth'));

	if(isset($default_values['hr']) && $default_values['hr'] != '') {
		$options['mpcth_color_hr'] = array(
			"id" 	=> "mpcth_color_hr",
			"name" 	=> __("HR Line", 'mpcth'),
			"desc" 	=> __("Specify color of the hr tag (devieder line).", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['hr'] );
	}

	if(isset($default_values['circleBorder']) && $default_values['circleBorder'] != '') {
		$options['mpcth_color_circle_border'] = array(
			"id" 	=> "mpcth_color_circle_border",
			"name" 	=> __("Circle Decor Border", 'mpcth'),
			"desc" 	=> __("Specify color of the decoration circle border.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['circleBorder'] );
	}

	if(isset($default_values['sidebarHeading']) && $default_values['sidebarHeading'] != '') {
		$options['mpcth_color_sidebar_heading'] = array(
			"id" 	=> "mpcth_color_sidebar_heading",
			"name" 	=> __("Sidebar Heading", 'mpcth'),
			"desc" 	=> __("Specify color of the headings for sidebar section.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['sidebarHeading'] );
	}

	if(isset($default_values['sidebarFontColor']) && $default_values['sidebarFontColor'] != '') {
		$options['mpcth_color_sidebar_text'] = array(
			"id" 	=> "mpcth_color_sidebar_text",
			"name" 	=> __("Sidebar Font", 'mpcth'),
			"desc" 	=> __("Specify color of text for sidebar section.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['sidebarFontColor'] );
	}

	if(isset($default_values['footerHeading']) && $default_values['footerHeading'] != '') {
		$options['mpcth_color_footer_heading'] = array(
			"id" 	=> "mpcth_color_footer_heading",
			"name" 	=> __("Footer Heading", 'mpcth'),
			"desc" 	=> __("Specify color of the headings for footer section.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['footerHeading'] );
	}

	if(isset($default_values['footerFontColor']) && $default_values['footerFontColor'] != '') {
		$options['mpcth_color_footer_text'] = array(
			"id" 	=> "mpcth_color_footer_text",
			"name" 	=> __("Footer Font", 'mpcth'),
			"desc" 	=> __("Specify color of text for footer section.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['footerFontColor'] );
	}

	if(isset($default_values['footerCopyrightsColor']) && $default_values['footerCopyrightsColor'] != '') {
		$options['mpcth_color_footer_text'] = array(
			"id" 	=> "mpcth_color_footer_copyrights_text",
			"name" 	=> __("Footer Copyrights", 'mpcth'),
			"desc" 	=> __("Specify color of text for footer copyrights section.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['footerCopyrightsColor'] );
	}

	if(isset($default_values['authorFont']) && $default_values['authorFont'] != '') {
		$options['mpcth_color_cf_author_text'] = array(
			"id" 	=> "mpcth_color_cf_author_text",
			"name" 	=> __("Author Label Font", 'mpcth'),
			"desc" 	=> __("Specify author label font color.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['authorFont'] );
	}

	if(isset($default_values['authorBG']) && $default_values['authorBG'] != '') {
		$options['mpcth_color_cf_author_bg'] = array(
			"id" 	=> "mpcth_color_cf_author_bg",
			"name" 	=> __("Author Label Background", 'mpcth'),
			"desc" 	=> __("Specify author label background.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['authorBG'] );
	}

	if(isset($default_values['socialIconBgColor']) && $default_values['socialIconBgColor'] != '') {
		$options['mpcth_social_bg_color'] = array(
			"id" 	=> "mpcth_social_bg_color",
			"name" 	=> __("Author Label Background", 'mpcth'),
			"desc" 	=> __("Specify author label background.", 'mpcth'),
			"type" 	=> "color",
			"std" 	=> $default_values['socialIconBgColor'] );
	}

	return $options;
}