<?php

/**
 * Default Theme Settings
 *
 * @package WordPress
 * @subpackage MPC WP Boilerplate
 * @since 1.0
 *
 */

$custom_page_meta = get_post_custom();

/* blog custom meta boxes */
	$blogType = 'standard';

if(isset($custom_page_meta['blog_pagination'][0]) && $custom_page_meta['blog_pagination'][0] != '') 
	$blogPagination = $custom_page_meta['blog_pagination'][0];
else
	$blogPagination = 'standard';

if(isset($custom_page_meta['blog_columns_number'][0]) && $custom_page_meta['blog_columns_number'][0] != '') 
	$blogColumnsNumber = $custom_page_meta['blog_columns_number'][0];
else
	$blogColumnsNumber = 3;

if(isset($custom_page_meta['blog_lm_info'][0]) && $custom_page_meta['blog_lm_info'][0] != '') 
	$blogDisplayLMInfo = ($custom_page_meta['blog_lm_info'][0] == 'on') ? true : false;
else
	$blogDisplayLMInfo = true;

if(isset($custom_page_meta['blog_category_filter'][0]) && $custom_page_meta['blog_category_filter'][0] != '') 
	$blogCategoryFilter = ($custom_page_meta['blog_category_filter'][0] == 'on') ? 'true' : 'false';
else
	$blogCategoryFilter = 'true';

	$portfolioType = 'masonry';

	$portfolioPagination = 'loadmore';

if(isset($custom_page_meta['portfolio_columns_number'][0]) && $custom_page_meta['portfolio_columns_number'][0] != '') 
	$portfolioColumnsNumber = $custom_page_meta['portfolio_columns_number'][0];
else
	$portfolioColumnsNumber = 3;

if(isset($custom_page_meta['portfolio_lm_info'][0]) && $custom_page_meta['portfolio_lm_info'][0] != '') 
	$portfolioDisplayLMInfo = ($custom_page_meta['portfolio_lm_info'][0] == 'on') ? true : false;
else
	$portfolioDisplayLMInfo = true;

if(isset($custom_page_meta['portfolio_category_filter'][0]) && $custom_page_meta['portfolio_category_filter'][0] != '') 
	$portfolioCategoryFilter = ($custom_page_meta['portfolio_category_filter'][0] == 'on') ? 'true' : 'false';
else
	$portfolioCategoryFilter = 'true';

if(isset($custom_page_meta['portfolio_link_item'][0]) && $custom_page_meta['portfolio_link_item'][0] != '') 
	$portfolioLinkToItem = ($custom_page_meta['portfolio_link_item'][0] == 'on') ? 'true' : 'false';
else
	$portfolioLinkToItem = 'true';

if(isset($custom_page_meta['portfolio_display_title'][0]) && $custom_page_meta['portfolio_display_title'][0] != '') 
	$portfolioDisplayTitle = ($custom_page_meta['portfolio_display_title'][0] == 'on') ? 'true' : 'false';
else
	$portfolioDisplayTitle = 'true';

if(isset($custom_page_meta['portfolio_display_meta'][0]) && $custom_page_meta['portfolio_display_meta'][0] != '') 
	$portfolioDisplayMeta = ($custom_page_meta['portfolio_display_meta'][0] == 'on') ? 'true' : 'false';
else
	$portfolioDisplayMeta = 'true';

if(isset($custom_page_meta['portfolio_display_content'][0]) && $custom_page_meta['portfolio_display_content'][0] != '') 
	$portfolioDisplayContent = ($custom_page_meta['portfolio_display_content'][0] == 'on') ? 'true' : 'false';
else
	$portfolioDisplayContent = 'true';

if(isset($custom_page_meta['portfolio_remove_frame'][0]) && $custom_page_meta['portfolio_remove_frame'][0] != '') 
	$portfolioRemoveFrame = ($custom_page_meta['portfolio_remove_frame'][0] == 'on') ? 'true' : 'false';
else
	$portfolioRemoveFrame = 'true';

/* MPCTH Settings */
$mpcth_settings = Array(
	/* blog */
	'blogPostLayoutOrder' 	=> Array('title', 'meta', 'thumbnail',  'content', 'readmore'), /* define the order in which the post structure will be displayed */
	'blogPagination' 		=> $blogPagination, 		/* standard or loadmore */
	'blogDisplayLMInfo' 	=> $blogDisplayLMInfo, 		/* display loadmore info -> 10 / 20 */
	'blogType' 				=> $blogType,				/* blog type: standard or masonry */
	'blogColumnsNumber'		=> $blogColumnsNumber, 		/* for masonry blog min post width */
	'blogCategoryFilter'	=> $blogCategoryFilter, 	/* add category filter */

	/* portfolio */
	'portfolioPostLayoutOrder' 		=> Array('title', 'meta', 'thumbnail',  'content', 'readmore'), /* define the order in which the post structure will be displayed */
	'portfolioPagination' 			=> $portfolioPagination, 		/* standard or loadmore */
	'portfolioDisplayLMInfo' 		=> $portfolioDisplayLMInfo, 	/* display loadmore info -> 10 / 20 */
	'portfolioType' 				=> $portfolioType,				/* blog type: standard or masonry */
	'portfolioColumnsNumber'		=> $portfolioColumnsNumber, 		/* for masonry blog min post width */
	'portfolioCategoryFilter'		=> $portfolioCategoryFilter,	/* add category filter */
	'portfolioLinkToItem'			=> $portfolioLinkToItem, 		/* link to item, if removed there is no way to see the single view of the post */
	'portfolioDisplayTitle'			=> $portfolioDisplayTitle, 		/* should the title be displayed */
	'portfolioDisplayMeta'			=> $portfolioDisplayMeta, 		/* should the meta be displayed */
	'portfolioDisplayContent'		=> $portfolioDisplayContent,	/* should the content be displayed */
	'portfolioRemoveFrame'			=> $portfolioRemoveFrame,		/* should the frame be visible around the item */

	/* search */
	'searchPostLayoutOrder' 		=> Array('title', 'meta', 'thumbnail',  'content', 'readmore'), /* define the order in which the post structure will be displayed */
	'searchPagination' 				=> 'standard', 					/* standard or loadmore */
	'searchDisplayLMInfo' 			=> false, 					/* display loadmore info -> 10 / 20 */
	'searchType' 					=> 'standard',					/* blog type: standard or masonry */
	'searchColumnsNumber'			=> 4,							/* for masonry blog min post width */

	/* archive */
	'archivePostLayoutOrder' 		=> Array('title', 'meta', 'thumbnail',  'content', 'readmore'), /* define the order in which the post structure will be displayed */
	'archivePagination' 			=> 'standard', 					/* standard or loadmore */
	'archiveDisplayLMInfo' 			=> false, 						/* display loadmore info -> 10 / 20 */
	'archiveType' 					=> 'standard',					/* blog type: standard or masonry */
	'archiveColumnsNumber'			=> 4 							/* for masonry blog min post width */
);