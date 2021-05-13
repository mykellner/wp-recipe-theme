<?php if (get_header_image()) : ?>
	<?php
		if (is_post_type_archive()) {
			$title = post_type_archive_title('', false);

		} else if (is_tax('bs_recipe_tag')) {
			$title = single_term_title(__('Tag: ', 'bootscore'), false);
    

		} else if (is_tax('bs_recipe_category')) {
			$title = single_term_title(__('Category: ', 'bootscore'), false);
            
        }
        
        else {
			$title = get_the_title();
		}
	?>
	<div class="site-header-img">
		<img src="<?php header_image(); ?>"
			width="<?php echo absint(get_custom_header()->width); ?>"
			height="<?php echo absint(get_custom_header()->height); ?>"
			alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
			class="img-fluid"
		>
		<div class="header-text-wrapper">
            <?php $link = get_post_type_archive_link('bs_recipe'); ?>
			<div class="header-text display-2"><span class="header-title"><?php echo ucwords($title) ?> </span>
            <?php if(is_page()) : ?>
            <a href="<?php echo $link ?>" class="btn btn-primary header-button mt-3"> <?php _e('Find recipes..', 'bootscore') ?> » </a>
            <?php endif; ?>
        </div>
            
		</div>
	</div>
<?php endif; ?>
