<?php

/* Taxonomies */

add_action( 'init', 'register_taxonomy_type' );

function register_taxonomy_type() {

    $labels = array( 
        'name' => __( 'Shape types', 'shapelivre' ),
        'singular_name' => __( 'Shape type', 'shapelivre' ),
        'search_items' => __( 'Search shape type', 'shapelivre' ),
        'popular_items' => __( 'Popular shape types', 'shapelivre' ),
        'all_items' => __( 'All shape types', 'shapelivre' ),
        'parent_item' => __( 'Parent shape type', 'shapelivre' ),
        'parent_item_colon' => __( 'Parent shape type:', 'shapelivre' ),
        'edit_item' => __( 'Edit shape type', 'shapelivre' ),
        'update_item' => __( 'Update shape type', 'shapelivre' ),
        'add_new_item' => __( 'Add new shape type', 'shapelivre' ),
        'new_item_name' => __( 'New shape type name', 'shapelivre' ),
        'separate_items_with_commas' => __( 'Separate shape types with commas', 'shapelivre' ),
        'add_or_remove_items' => __( 'Add or remove shape types', 'shapelivre' ),
        'choose_from_most_used' => __( 'Choose from most used shape types', 'shapelivre' ),
        'menu_name' => __( 'Shape types', 'shapelivre' )
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true,
        'yarpp_support' => true
    );

    register_taxonomy( 'type', array('shape'), $args );
}