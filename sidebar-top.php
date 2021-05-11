<?php
	/**
	 * The sidebar containing the main widget area
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Bootscore
	 */
	
	if ( ! is_active_sidebar( 'top-sidebar' ) ) {
		return;
	}
	?>
<div class="row top-sidebar d-flex flex-wrap">
		<?php dynamic_sidebar( 'top-sidebar' ); ?>
	<!-- #secondary -->
</div>