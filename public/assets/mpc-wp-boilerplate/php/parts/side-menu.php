<?php 

/**
 * @package WordPress
 * @subpackage MPC WP Boilerplate
 * @since 1.0
 */

global $mpcth_cake; 

?>

<!-- Menu on the side of a page -->
<?php if($mpcth_cake['menuPosition'] == 'page'): ?>
	<aside id="mpcth_aside_menu_section" class="mpcth-visible-desktop">
		<?php if($mpcth_cake['logoPosition'] == 'page')
				echo mpcth_display_logo(); ?>

		<nav id="mpcth_nav">
			<?php mpcth_aside_menu(); ?>
		</nav>
	</aside>
<?php endif; ?>
<!-- End Menu on the side -->
