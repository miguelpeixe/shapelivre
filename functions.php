<?php

/*
 * Theme setup
 */
function shapelivre_setup() {

	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 624, 9999 );

}
add_action('after_setup_theme', 'shapelivre_setup');

/*
 * Styles
 */

function shapelivre_styles() {
	wp_register_style('base', get_template_directory_uri() . '/css/base.css');
	wp_register_style('skeleton', get_template_directory_uri() . '/css/skeleton.css', array('base'));
	wp_register_style('main', get_template_directory_uri() . '/css/main.css', array('base', 'skeleton'));

	wp_enqueue_style('main');
}
add_action('wp_enqueue_scripts', 'shapelivre_styles');

/**
 * Register post types
 */
include(TEMPLATEPATH . '/inc/post-types.php');

/**
 * Register taxonomies
 */
include(TEMPLATEPATH . '/inc/taxonomies.php');


/**
 * Include metaboxes
 */
include(TEMPLATEPATH . '/metaboxes/metaboxes.php');

/*
 * Add shape post type to default queries
 */
function add_shape_query( $query ) {
	if(is_front_page() || is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
		$query->set('post_type', 'shape');
		return $query;
	}
}
add_filter('pre_get_posts', 'add_shape_query');

/* sidebar */

register_sidebar(array(
  'name' => 'Barra lateral direita',
  'id' => 'right-sidebar',
  'description' => 'Widgets da barra direita.',
  'before_title' => '<h3>',
  'after_title' => '</h3>',
  'before_widget' => '<li id="%1$s" class="widget %2$s">',
  'after_widget' => '</li>'
));

function shapelivre_wp_title($title, $sep) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'videolivre_channel' ), max( $paged, $page ) );

	return $title;
}
add_filter('wp_title', 'shapelivre_wp_title', 10, 2);