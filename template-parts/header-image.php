<?php if (get_header_image()) : ?>
	<?php
		if (is_category()) {
			$title = single_cat_title('Category: ', false);

		} else if (is_tag()) {
			$title = single_tag_title (__("Tag:"), false);

		} else if (is_post_type_archive()) {
			$title = post_type_archive_title('', false);

		} else if (is_tax('mbt_movie_genre')) {
			$title = single_term_title('Genre: ', false);

		} else if (is_home()) {
			$title = __("Blog");

		} else if (is_search()) {
			$title = sprintf('Search results for "%s"', htmlspecialchars($_REQUEST['s']));

		} else if (is_singular('mbt_movie_review')) {
            $title = get_the_title();
            $genres = wp_get_post_terms(get_the_ID(), 'mbt_movie_genre');
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
