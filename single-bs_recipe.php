<?php
	/*
	 * Template Post Type: post
	 */
	  
	 get_header();  ?>

<div id="content" class="site-content container py-5 mt-4">
    <div id="primary" class="content-area">

        <!-- Hook to add something nice -->
        <?php bs_after_primary(); ?>

        <?php the_breadcrumb(); ?>

        <div class="row">

        <?php get_sidebar(); ?>

            <div class="col-md-8 col-xxl-9">

                <main id="main" class="site-main">

                    <header class="entry-header">
                        <?php the_post(); ?>
                        <?php the_title('<h1>', '</h1>'); ?>
                        <?php bootscore_recipe_category_badge(); ?>
                        <p class="entry-meta">
                            <small class="text-muted">
                                <?php
							         bootscore_date();
							         _e(' by ', 'bootscore'); the_author_posts_link();
							         bootscore_comment_count();							
							     ?>
                            </small>
                        </p>
                        <?php bootscore_post_thumbnail(); ?>
                    </header>

                    <div class="entry-content">
                        <div class="row content-row-1 d-flex mt-5">
                            <div class="col-9">
                                <?php the_content(); ?>
                                <div class="tag-badge-singel"> <?php bootscore_recipe_tags_badge(); ?></div>
                            </div>
                            <div class="col-3">
                                <?php bootscore_recipe_gallery(); ?>
                            </div>
                        </div>
                        <div class="row content-row-2">
                            <div><?php bootscore_recipe_servings(); ?></div>
                            <div class="col-lg-4 ingredient-col">
                                <?php bootscore_recipe_ingredients(); ?>
                            </div>
                            <div class="col-lg-6">
                                <?php bootscore_recipe_instructions(); ?>
                            </div>
                        </div>
                        
                    </div>

                    <footer class="entry-footer clear-both">
                        <?php get_template_part('template-parts/related-recipes'); ?>
                    </footer>

                    <?php comments_template(); ?>

                </main> <!-- #main -->

            </div><!-- col -->
            <?php get_sidebar(); ?>
        </div><!-- row -->

    </div><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>
