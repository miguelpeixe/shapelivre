<?php get_header(); ?>

<div id="primary" class="site-content">
	<div id="content" role="main">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<div class="six columns alpha offset-by-one">
				<div class="thumbnail-container">
					<a href="<?php echo get_post_meta($post->ID, 'shape_file', true); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
			</div>
			<div class="seven columns omega offset-by-one">
				<h2><?php the_title(); ?></h2>
				<?php echo wpautop(get_post_meta($post->ID, 'description', true)); ?>
				<a class="button" href="<?php echo get_post_meta($post->ID, 'shape_file', true); ?>">Download</a>
			</div>
			<div class="clearfix"></div>
		<?php endwhile; endif; ?>
	</div>
</div>

<?php get_footer(); ?>