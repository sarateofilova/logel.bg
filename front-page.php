<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="container index-container">
		<div class="row alignItemsFlexStart">
			<div class="col-lg-12">
				
				<div>
					<?php echo get_the_post_thumbnail( $post_id, 'full' ); ?>
					<?php the_content(); ?>
				</div>
			</div>

	<?php endwhile;  endif;?>

		</div>
	</div>

<?php get_footer(); ?>
