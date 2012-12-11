<?php

add_action('admin_footer', 'shape_metabox_init');
add_action('add_meta_boxes', 'shape_add_meta_box');
add_action('save_post', 'shape_save_postdata');

function shape_metabox_init() {
	wp_enqueue_style('general-metaboxes');
	wp_enqueue_script('custom-uploader');
}

function shape_add_meta_box() {
	add_meta_box(
		'shape_metabox',
		__('Shape metadata', 'shapelivre'),
		'shape_inner_meta_box',
		'shape',
		'advanced',
		'high'
	);
}

add_filter("postbox_classes_shape_shape_metabox", create_function('', 'return array("general-box");'));

function shape_inner_meta_box($post) {
	$description = get_post_meta($post->ID, 'description', true);
	$files = get_post_meta($post->ID, 'shapefiles', true);
	?>
	<div class="field">
		<div class="field-meta">
			<label for="shape_description"><?php _e('Shape description', 'shapelivre'); ?></label>
		</div>
		<div class="field-input">
			<textarea id="shape_description" type="text" cols="80" rows="8" name="shape_description"><?php echo $description; ?></textarea>
		</div>
	</div>
	<div class="field">
		<div class="field-meta">
			<label for="shapefile"><?php _e('Shapefile', 'shapelivre'); ?></label>
			<p class="instruction">Enter URL or upload file</p>
		</div>
		<div class="field-input">
			<input id="shapefile" type="text" size="80" name="files[shapefile]" value="<?php echo $files['shapefile']; ?>" />
			<a class="button upload_file_button"><?php _e('Upload file', 'shapelivre'); ?></a>
		</div>
	</div>
	<div class="field">
		<div class="field-meta">
			<label for="kml"><?php _e('KML', 'shapelivre'); ?></label>
			<p class="instruction">Enter URL or upload file</p>
		</div>
		<div class="field-input">
			<input id="kml" type="text" size="80" name="files[kml]" value="<?php echo $files['kml']; ?>" />
			<a class="button upload_file_button"><?php _e('Upload file', 'shapelivre'); ?></a>
		</div>
	</div>
	<div class="field">
		<div class="field-meta">
			<label for="mbtiles"><?php _e('MBTiles', 'shapelivre'); ?></label>
			<p class="instruction">Enter URL or upload file</p>
		</div>
		<div class="field-input">
			<input id="mbtiles" type="text" size="80" name="files[mbtiles]" value="<?php echo $files['mbtiles']; ?>" />
			<a class="button upload_file_button"><?php _e('Upload file', 'shapelivre'); ?></a>
		</div>
	</div>
	<div class="clearfix"></div>
	<?php
}

function shape_save_postdata($post_id) {
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;

	if (defined('DOING_AJAX') && DOING_AJAX)
		return;

	if (false !== wp_is_post_revision($post_id))
		return;

	update_post_meta($post_id, 'description', $_POST['shape_description']);
	update_post_meta($post_id, 'files', $_POST['files']);
}

?>