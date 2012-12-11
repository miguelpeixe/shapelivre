<?php get_header(); ?>

<div id="primary" class="site-content">
	<div id="content" role="main" class="ten columns alpha">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<div class="post-item">
				<div class="eight columns offset-by-one alpha omega">
					<?php if(get_post_type() == 'shape') : ?>
						<div class="four columns alpha">
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<?php echo wpautop(get_post_meta($post->ID, 'description', true)); ?>
							<?php $files = get_post_meta($post->ID, 'files', true); ?>
							<div class="download">
								<?php if($files['shapefile']) { ?>
									<a class="button" href="<?php echo $files['shapefile']; ?>">Download (.shp)</a>
								<?php } ?>
								<?php if($files['kml']) { ?>
									<a class="button" href="<?php echo $files['kml']; ?>">Download (.kml)</a>
								<?php } ?>
								<?php if($files['mbtiles']) { ?>
									<a class="button" href="<?php echo $files['mbtiles']; ?>">Download (.mbtiles)</a>
								<?php } ?>
							</div>
						</div>
						<div class="four columns omega">
							<div class="thumbnail-container">
								<a href="<?php echo get_post_meta($post->ID, 'shape_file', true); ?>">
									<?php the_post_thumbnail('thumbnail', array('class' => 'scale-with-grid')); ?>
								</a>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="meta">
							<p class="tags"> <?php the_tags('Tags: ', ', ', ''); ?></p>
							<?php
							$source = get_post_meta($post->ID, 'source', true);
							if($source) { ?>
								<p class="source">Fonte: <?php echo $source; ?></p>
							<?php } ?>
						</div>
					<?php else : ?>
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<?php the_content(); ?>
					<?php endif; ?>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		<?php endwhile; endif; ?>
	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>