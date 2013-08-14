<?php

/**
 * @package WordPress
 * @subpackage MPC WP Boilerplate
 * @since 1.0
 */

global $meta_layout;
global $post_meta;
global $page_type;

?>

<?php if($post->post_type != 'portfolio' || $page_type == "single-portfolio") { ?>
	<small>
		<?php if($meta_layout != 'meta-type-modern') { ?>
			<?php _e('Posted on ', 'mpcth'); ?>
			<a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php the_time(get_option('date_format')); ?></a>
		<?php } ?>
	<?php 

	if($meta_layout != 'meta-type-modern') {
		_e('in ', 'mpcth');
	} else {
		_e('In ', 'mpcth');
	}
} else {
	
	echo '<div class="mpcth-like-lb-cont">';
	mpcth_add_fancybox($post_meta);

	if( function_exists('zilla_likes') ) 
		zilla_likes(); 

	echo '</div>';
}

$categories = '';

if($post->post_type == 'post')
	$categories = get_the_category();
elseif($post->post_type == 'portfolio')
	$categories = get_the_terms($post->ID, 'mpcth_portfolio_category');

if($post->post_type == 'portfolio' && $page_type != "single-portfolio") 
	echo '<div class="mpcth-portfolio-categories">';

if($categories != '' && count($categories) > 0) {
	$last_item = end($categories);
	foreach($categories as $category) {
		if($post->post_type == 'post')
			echo '<a href="'.get_category_link($category->term_id ).'">';
		elseif($post->post_type == 'portfolio')
			echo '<a href="'.get_term_link($category->slug, 'mpcth_portfolio_category' ).'">';

		if($category == $last_item)
			echo $category->name;
		else 
			echo $category->name.', ';

		echo '</a>';
	}
} 

if($post->post_type == 'portfolio' && $page_type != "single-portfolio") 
	echo '</div>';
?>

<?php if($post->post_type != 'portfolio' || $page_type == "single-portfolio") { ?>

	<?php _e('- ', 'mpcth'); ?>

	<?php if(comments_open()) { ?>
		<?php comments_number(__('0 comments', 'mpcth'), __('1 comment', 'mpcth') , __('% comments','mpcth')); ?>
		<?php _e('- ', 'mpcth'); ?>
	<?php } ?>


	<?php  if( function_exists('zilla_likes') ) { 
		zilla_likes(); 
	}
} ?>




</small>
