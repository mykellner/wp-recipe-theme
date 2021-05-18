<?php

function cptui_register_my_taxes() {

/**
 * Taxonomy: Recipe Categories.
 */

$labels = [
    "name" => __( "Recipe Categories", "bootscore" ),
    "singular_name" => __( "Recipe Category", "bootscore" ),
    "menu_name" => __( "Recipe Categories", "bootscore" ),
    "all_items" => __( "All Recipe Categories", "bootscore" ),
    "edit_item" => __( "Edit Recipe Category", "bootscore" ),
    "view_item" => __( "View Recipe Category", "bootscore" ),
    "update_item" => __( "Update Recipe Category name", "bootscore" ),
    "add_new_item" => __( "Add new Recipe Category", "bootscore" ),
    "new_item_name" => __( "New Recipe Category name", "bootscore" ),
    "parent_item" => __( "Parent Recipe Category", "bootscore" ),
    "parent_item_colon" => __( "Parent Recipe Category:", "bootscore" ),
    "search_items" => __( "Search Recipe Categories", "bootscore" ),
    "popular_items" => __( "Popular Recipe Categories", "bootscore" ),
    "separate_items_with_commas" => __( "Separate Recipe Categories with commas", "bootscore" ),
    "add_or_remove_items" => __( "Add or remove Recipe Categories", "bootscore" ),
    "choose_from_most_used" => __( "Choose from the most used Recipe Categories", "bootscore" ),
    "not_found" => __( "No Recipe Categories found", "bootscore" ),
    "no_terms" => __( "No Recipe Categories", "bootscore" ),
    "items_list_navigation" => __( "Recipe Categories list navigation", "bootscore" ),
    "items_list" => __( "Recipe Categories list", "bootscore" ),
    "back_to_items" => __( "Back to Recipe Categories", "bootscore" ),
];


$args = [
    "label" => __( "Recipe Categories", "bootscore" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'recipe_category', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "bs_recipe_category",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
];
register_taxonomy( "bs_recipe_category", [ "bs_recipe" ], $args );

/**
 * Taxonomy: Recipe Tags.
 */

$labels = [
    "name" => __( "Recipe Tags", "bootscore" ),
    "singular_name" => __( "Recipe Tag", "bootscore" ),
    "menu_name" => __( "Recipe Tags", "bootscore" ),
    "all_items" => __( "All Recipe Tags", "bootscore" ),
    "edit_item" => __( "Edit Recipe Tag", "bootscore" ),
    "view_item" => __( "View Recipe Tag", "bootscore" ),
    "update_item" => __( "Update Recipe Tag name", "bootscore" ),
    "add_new_item" => __( "Add new Recipe Tag", "bootscore" ),
    "new_item_name" => __( "New Recipe Tag name", "bootscore" ),
    "parent_item" => __( "Parent Recipe Tag", "bootscore" ),
    "parent_item_colon" => __( "Parent Recipe Tag:", "bootscore" ),
    "search_items" => __( "Search Recipe Tags", "bootscore" ),
    "popular_items" => __( "Popular Recipe Tags", "bootscore" ),
    "separate_items_with_commas" => __( "Separate Recipe Tags with commas", "bootscore" ),
    "add_or_remove_items" => __( "Add or remove Recipe Tags", "bootscore" ),
    "choose_from_most_used" => __( "Choose from the most used Recipe Tags", "bootscore" ),
    "not_found" => __( "No Recipe Tags found", "bootscore" ),
    "no_terms" => __( "No Recipe Tags", "bootscore" ),
    "items_list_navigation" => __( "Recipe Tags list navigation", "bootscore" ),
    "items_list" => __( "Recipe Tags list", "bootscore" ),
    "back_to_items" => __( "Back to Recipe Tags", "bootscore" ),
];


$args = [
    "label" => __( "Recipe Tags", "bootscore" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => false,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'Tag', 'with_front' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "bs_recipe_tag",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    "show_in_graphql" => false,
];
register_taxonomy( "bs_recipe_tag", [ "bs_recipe" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );
