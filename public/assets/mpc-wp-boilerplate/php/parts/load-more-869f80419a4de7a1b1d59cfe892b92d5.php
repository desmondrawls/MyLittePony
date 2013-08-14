<?php 

/**
 * @package WordPress
 * @subpackage MPC WP Boilerplate
 * @since 1.0
 */

if(file_exists('../../../../../../wp-load.php')) :
	include '../../../../../../wp-load.php';
else:
	include '../../../../../../../wp-load.php';
endif; 

ob_start(); 

$offset = (int)$_POST['offset'];
$post_type = $_POST['post_type'];
$posts_per_page = (int)$_POST['posts_per_page'];
$mpcth_settings = $_POST['mpcth_settings'];
$customs = isset($_POST['customs']) ? $_POST['customs'] : array();

$blog_compressed = $_POST['blog_compressed'];
$modern_meta = $_POST['modern_meta'];

if($blog_compressed)
	$modern_meta = false;

$paged = mpcth_get_paged();

$query_conf = array(
	'posts_per_page'	=> $posts_per_page,
	'post_type'			=> $post_type,
	'offset'			=> $offset,
	'post__not_in'		=> get_option("sticky_posts")
);

if(!empty($customs)) {
	foreach ($customs as $key => $value) {
		$query_conf[$key] = $value;
	}
}

$query = new WP_Query();
$query->query($query_conf);

if ($query->have_posts()) :
	while ( $query->have_posts() ) : $query->the_post(); 
		// get custom post data 
		$post_meta = get_post_custom($post->ID);
		$post_format = get_post_format();

		if($post_format == '')
			$post_format = 'standard';

		$has_image = '';
		if(($post_format == 'standard' || $post_format == 'image') && !has_post_thumbnail())
			$has_image = ' mpcth-post-without-image';

		if($post_type == 'post') :
		 	// get post elements display order
			$postOrder = $mpcth_settings['blogPostLayoutOrder']; ?>
			<article id="post-<?php the_ID(); ?>"  <?php post_class('blog-post' . $has_image); ?> >
				<?php if($modern_meta) { 
					$post_day = get_the_date('d');
					$post_month = get_the_date('M');
					?>
					<div class="mpcth-post-date">
						<span class="mpcth-date-day"><?php echo $post_day; ?></span>
						<span class="mpcth-date-month"><?php echo $post_month; ?></span>
					</div>
				<?php } ?>	
				<?php foreach($postOrder as $value) { 
					switch($value) {
						case 'thumbnail':?>
							<div class="mpcth-post-thumbnail">
								<?php if(!post_password_required()) {
									get_template_part('mpc-wp-boilerplate/php/parts/post-formats');
									mpcth_add_fancybox($post_meta);
								} ?>
							</div>
							<div class="mpcth-post-content">
						<?php break;
						case 'title':?>
							<?php if($post_format != 'link') { ?>
								<header>
									<h3 class="mpcth-post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php if($blog_compressed) echo '<span class="mpcth-post-format-icon mpcth-post-format-' . $post_format . '"></span>'; ?>
										<?php the_title(); ?>
									</a></h3>
								</header>
							<?php } else { ?>
								<header>
									<h3 class="mpcth-post-title"><a href="<?php echo ((isset($post_meta['link_url'][0])) ? $post_meta['link_url'][0] : ''); ?>" title="<?php the_title(); ?>" target="_blank">
										<?php
										if($blog_compressed)
											echo '<span class="mpcth-post-format-icon mpcth-post-format-' . $post_format . '"></span>';
										else
											echo '<span class="mpcth-sc-icon-link"></span>';

										the_title();
										?>
									</a></h3>
								</header>
							<?php } ?>
						<?php break;
						case 'meta':?>
							<?php get_template_part('mpc-wp-boilerplate/php/parts/post-meta'); ?>
						<?php break;
						case 'content':?>
							<?php the_content('', true, ''); ?>
						<?php break;
						case 'readmore':?>
							<a class="mpcth-blog-read-more" href="<?php the_permalink(); ?>"><?php _e('Read more', 'mpcth'); ?></a>
						<?php break; ?>
				<?php } //end switch 
				} // end foreach ?>
				</div>
				<div class="mpcth-clear-fix"></div>
			</article>
		<?php else :
			// get post order
			$postOrder = $mpcth_settings['portfolioPostLayoutOrder'];
			// get posts categories
			$portfolio_categories = '';
			$portfolio_categories = get_the_terms($post->ID, 'mpcth_portfolio_category');
			if(isset($portfolio_categories) && $portfolio_categories != ''){
				$category_slug = '';
				foreach($portfolio_categories as $category) {
					$category_slug .= 'category-'.$category->slug.' '; 
				}
			} ?>
			<article id="post-<?php the_ID(); ?>"  class="mpcth-portfolio-item post <?php echo $category_slug; echo ($mpcth_settings['portfolioRemoveFrame'] == 'true') ? 'mpcth-portfolio-no-frame' : ''; ?>">
				<?php foreach($postOrder as $value) { 
					switch($value) {
						case 'thumbnail':?>
							</div>
						</div>
							<div class="mpcth-post-thumbnail">
								<?php
								if(!post_password_required()) {
									if(has_post_thumbnail()) 
										the_post_thumbnail('mpcth-post-thumbnails-col-'.$mpcth_settings['portfolioColumnsNumber']); 
								}
								?>
							</div>
						<?php break;
						case 'title':?>	
								<div class="mpcth-post-content">
									<div class="mpcth-post-content-inside">
										<a class="mpcth-background-permalink" href="<?php the_permalink(); ?>"></a>
										<div class="mpcth-center-gap"></div>
										<header>
											<h3 class="mpcth-post-title">
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<?php the_title(); ?>
												</a>
											</h3>
										</header>
							
						<?php break;
						case 'meta':?>
							<?php 
								get_template_part('mpc-wp-boilerplate/php/parts/post-meta'); 
							?>
						<?php break; ?>

				<?php } //end switch 
				} // end foreach ?>
			</article>
	<?php endif; endwhile; endif; ?>
	<?php $output =  ob_get_contents(); ?>

<?php ob_end_clean(); 
echo $output;?>