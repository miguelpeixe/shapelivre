<?php get_header(); ?>

<div id="primary" class="site-content">
	<div id="content" role="main" class="ten columns alpha">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<?php if(get_post_type() == 'shape') : ?>
				<div class="four columns alpha offset-by-one">
					<div class="thumbnail-container">
						<a href="<?php echo get_post_meta($post->ID, 'shape_file', true); ?>">
							<?php the_post_thumbnail('thumbnail', 'scale-with-grid'); ?>
						</a>
					</div>
				</div>
				<div class="four columns omega offset-by-one">
					<h2><?php the_title(); ?></h2>
					<?php echo wpautop(get_post_meta($post->ID, 'description', true)); ?>
					<a class="button" href="<?php echo get_post_meta($post->ID, 'shape_file', true); ?>">Download</a>
				</div>
			<?php else : ?>
				<h2><?php the_title(); ?></h2>
				<?php the_content(); ?>
			<?php endif; ?>
			<div class="clearfix"></div>
		<?php endwhile; endif; ?>
	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>