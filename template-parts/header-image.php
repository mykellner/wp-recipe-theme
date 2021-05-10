<?php if (get_header_image()) : ?>
	<?php
		if (is_post_type_archive()) {
			$title = post_type_archive_title('', false);

		} else if (is_tax('bs_recipe_tag')) {
			$title = single_term_title('', false);

		} else if (is_tax('bs_recipe_category')) {
			$title = single_term_title('', false);
        }
        
        else {
			$title = get_the_title();
		}
	?>
	<div id="site-header-img">
		<img src="<?php header_image(); ?>"
			width="<?php echo absint(get_custom_header()->width); ?>"
			height="<?php echo absint(get_custom_header()->height); ?>"
			alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
			class="img-fluid"
		>
		<div class="header-text-wrapper">
			<div class="header-text display-2"><?php echo $title; ?> 
        </div>
            
		</div>
	</div>
<?php endif; ?>
