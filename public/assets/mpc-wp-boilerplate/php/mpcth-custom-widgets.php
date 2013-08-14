<?php

/**
 * MPC Theme Widgets
 *
 * 1. Recent Posts
 * 2. Twitter
 *
 * @package WordPress
 * @subpackage MPC WP Boilerplate
 * @since 1.0
 *
 */

/* ---------------------------------------------------------------- */
/* 1. Recent Posts
/* ---------------------------------------------------------------- */

class MPC_RecentPosts extends WP_Widget {
	/* Init function (constructor) */
	function MPC_RecentPosts() {
		$widget_ops = array( 'classname' => 'mpcth-recent-posts-widget', 'description' => __('Show recent posts from your blog.', 'mpcth') );
		$this->WP_Widget( 'recentPosts_widget', __('MPC - Recent Posts', 'mpcth'), $widget_ops);
	}

	/* Form displayed on the widget page */
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array('title' => __('Latest Posts', 'mpcth'), 'number' => 4));
		$title = esc_attr($instance['title']);
		$number = absint($instance['number']);
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
			   Title:
			</label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">
			   Number of Posts:
			</label>
				<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
		</p>
<?php
	}
	
	/* Update the widget settings */
	function update($new_instance, $old_instance) {
		$instance=$old_instance;
	   
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number']=$new_instance['number'];
		
		return $instance;
	}

	function widget($args, $instance) {
		global $post;
		extract($args);
		

		$title = $instance['title']; 
		$number = absint($instance['number']); // Number of Posts
	   
		// Output
		echo $before_widget;
			if($title) 
				echo '<h5 class="widget_title">' . $title .'</h5>' ; 
			
			$pq = new WP_Query(array( 'post_type' => 'post', 'showposts' => $number, 'post__not_in' => get_option('sticky_posts') ));
			
			if( $pq->have_posts()) :
			?>
			<ul class="mpcth-recent-posts-list">
				<?php 
				$index = 0;
				while($pq->have_posts()) :
					$pq->the_post(); 
					$index++; 
					if($index > 1) { ?>
						<li class="mpcth-recent-post">
					<?php } else { ?>
						<li class="mpcth-recent-post first">
					<?php } ?>
						<?php if(has_post_thumbnail()) : ?>
							<a href="<?php the_permalink(); ?>" class="mpcth-recent-post-thumb">
								<?php the_post_thumbnail('thumbnail'); ?>
							</a>
						<?php endif; ?>
						<a href="<?php the_permalink(); ?>" class="mpcth-recent-posts-title"><?php the_title(); ?></a>
						<span class="mpcth-recent-posts-data"><?php the_time(get_option('date_format')); ?></span>
					</li>
				<?php wp_reset_query();
				endwhile; ?>
			</ul>
			<?php endif; ?>		
		<?php
		// echo widget closing tag
		echo $after_widget;
	}
}

/* ---------------------------------------------------------------- */
/* 2. Twitter
/* ---------------------------------------------------------------- */

class MPC_Twitter extends WP_Widget {

	/* Init function (constructor) */
	function MPC_Twitter() {
		$widget_ops = array( 'classname' => 'mpcth-twitter-widget', 'description' => __('Display your latest tweets.', 'mpcth') );
		$this->WP_Widget( 'twitter_widget', __('MPC - Latest Tweets', 'mpcth'), $widget_ops);
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array('title' => __('Latest Tweets', 'mpcth'), 'number' => 2, 'id' => ''));
		$title = esc_attr($instance['title']);
		$id = esc_attr($instance['id']);
		$number = absint($instance['number']);
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e('Title:', 'mpcth'); ?>
			</label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('id'); ?>">
				<?php _e('Twitter Widget ID:', 'mpcth'); ?>
			</label>
				<input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo $id; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">
				<?php _e('Number of Tweets:', 'mpcth'); ?>
			</label>
				<input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" />
		</p>
	<?php

	}

	function update($new_instance, $old_instance) {
		$instance=$old_instance;
	   
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['id']= $new_instance['id'];
		$instance['number']= $new_instance['number'];
		
		return $instance;
	}

	function widget($args, $instance) {
		extract($args);
		global $shortname; 
		global $mpcth_options;

		$title = $instance['title']; 
		$id = $instance['id'];
		$number = absint($instance['number']); // Number of Tweets
		$unique = mpcth_random_ID(10);

		$tweets = get_transient('mpcth_twitter_' . $id . '_' . $number);
		$is_cached = $tweets !== false;

		echo $before_widget; ?>
		<h5 class="widget_title"><?php echo $title; ?></h5>
		<ul id="mpcth_twitter_<?php echo $unique ?>" class="mpcth-twitter-wrap<?php echo $is_cached ? ' mpcth-twitter-cached' : ''; ?>" data-number="<?php echo $number; ?>" data-id="<?php echo $id; ?>" data-unique="<?php echo $unique; ?>">
			<?php if($is_cached) echo urldecode($tweets); ?>
		</ul>
		<?php
		echo $after_widget;
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Register Widgets
/*-----------------------------------------------------------------------------------*/

function mpc_load_widgets() {
	global $mpcth_options;

	register_widget('MPC_RecentPosts');	

	// if(!empty($mpcth_options['mpcth_twitter_ck']) && !empty($mpcth_options['mpcth_twitter_cs']) && !empty($mpcth_options['mpcth_twitter_at']) && !empty($mpcth_options['mpcth_twitter_as']))
		register_widget('MPC_Twitter');	
}

add_action( 'widgets_init', 'mpc_load_widgets' );
?>