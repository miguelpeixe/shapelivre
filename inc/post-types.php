<?php

/* Post types */

add_action('init', 'register_cpt_shape');

function register_cpt_shape() {

    $labels = array( 
        'name' => __('Shapes', 'shapelivre'),
        'singular_name' => __('Shape', 'shapelivre'),
        'add_new' => __('Add new', 'shapelivre'),
        'add_new_item' => __('Add new shape', 'shapelivre'),
        'edit_item' => __('Edit shape', 'shapelivre'),
        'new_item' => __('New shape', 'shapelivre'),
        'view_item' => __('View shape', 'shapelivre'),
        'search_items' => __('Search shapes', 'shapelivre'),
        'not_found' => __('No shapes found', 'shapelivre'),
        'not_found_in_trash' => __('No shapes found in trash', 'shapelivre'),
        'parent_item_colon' => __('Parent shape:', 'shapelivre'),
        'menu_name' => __('Shapes', 'shapelivre'),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array('title', 'author', 'trackbacks', 'thumbnail'),

        'taxonomies' => array('post_tag'),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 2,
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type('shape', $args);
}