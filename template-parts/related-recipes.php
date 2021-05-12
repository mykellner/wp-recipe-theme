<?php

$post_id = get_the_ID(); // the ID of the current post

$post_terms = wp_get_post_terms($post_id, 'bs_recipe_category');

$postterms = [];

foreach ($post_terms as $terms) {
    array_push($postterms, $terms->name);
}

$related_recipes = new WP_Query([

    'post_type' => 'bs_recipe',

    'post_per_page' => 4,

    'post__not_in' => [$post_id],

    'tax_query' => [

        [

            'taxonomy' => 'bs_recipe_category',

            'field' => 'slug',

            'terms' => $postterms,

        ],

    ],

]);

if (!$related_recipes->have_posts()) {
    return;
}

?>

<hr />

<h2>Related Recipes</h2>


<div class="row">
    <?php while ($related_recipes->have_posts()) : ?>
        <?php $related_recipes->the_post(); ?>

            <div class="col-6 col-xl-3">
                <article class="card mb-4">
                    <?php the_post_thumbnail('thumbnail', ['class' => 'card-img-top img-fluid']); ?>

                    <div class="card-body">
                        <h3 class="h5 card-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>

                        

                        <p class="card-text">
                            <?php bootscore_recipe_category_badge(); ?>
                        </p>

                        <div>
                            <a href="<?php the_permalink(); ?>" class="btn btn-secondary"><?php _e('View Recipe &raquo;', 'bootscore') ?></a>
                        </div>
                    </div>
                </article>
            </div>
     

    <?php endwhile; ?>

</div>

<?php
wp_reset_postdata();
