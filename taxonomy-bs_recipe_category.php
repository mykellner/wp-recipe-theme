<?php
	/**
	 * The template for displaying archive pages
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Bootscore
	 */
	
	get_header();
    get_template_part('template-parts/header-image');
	?>

<div id="content" class="site-content container py-5 mt-5">
    <div id="primary" class="content-area">
        
        <!-- Hook to add something nice -->
        <?php bs_after_primary(); ?>  

        <div class="row">
        <?php get_sidebar(); ?>
            <div class="col order-first order-md-last">

                <main id="main" class="site-main">

                    <!-- Title & Description -->
                    <header class="page-header mb-4">
                        <?php if(!get_header_image()) : ?>
                        <h1><?php the_archive_title(); ?></h1>
                        <?php endif; ?>
                        <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
                    </header>

                    <!-- Grid Layout -->
                    <?php if (have_posts() ) : ?>
                    <?php while (have_posts() ) : the_post(); ?>
                    <div class="card horizontal card-archive mb-4">
                        <div class="row">
                            <!-- Featured Image-->
                            <?php if (has_post_thumbnail() )
							echo '<div class="card-img-left-md col-lg-5">' . get_the_post_thumbnail(null, 'medium') . '</div>';
							?>
                            <div class="col">
                                <div class="card-body">
                                    
                                    <?php bootscore_recipe_category_badge(); ?>
                                    
                                    <!-- Title -->
                                    <h2 class="blog-post-title">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <!-- Excerpt & Read more -->
                                    <div class="card-text mt-auto">
                                        <?php the_excerpt(); ?> <a class="read-more btn btn-primary" href="<?php the_permalink(); ?>"><?php _e('Read more »', 'bootscore'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="wrapper d-flex flex-row-reverse">
                            <?php bootscore_recipe_tags_badge(); ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>

                    <!-- Pagination -->
                    <div>
                        <?php bootscore_pagination(); ?>
                    </div>

                </main><!-- #main -->

            </div><!-- col -->

          
        </div><!-- row -->

    </div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();
