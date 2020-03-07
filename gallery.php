<?php
/*
Template Name: Gallery
Template Post Type: page, cities
*/

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  $current_post_id = $post->ID;  ?>
	
	<div class="container page-container gallery-objects">
	
		<div class="row alignItemsFlexStart">
			<div class="col-lg-12">
				<div>
					<div class="row">
						<div class="col-sm-12">
							<h1><?php the_title(); ?></h1>
							<div class="breadcrumb-nav">
								<?php custom_breadcrumbs(); ?>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-12">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		
	<?php endwhile;  endif;?>

		</div>
	</div>

	
	<div class="container page-container">
	
		<div class="row alignItemsFlexStart">
			<div class="col-lg-12">
				<div class="cities-list">
					<?php $args = array('post_type' => 'cities', 'posts_per_page' => '-1', 'orderby' => 'title', 'order'   => 'ASC',); ?>
					<?php $loop = new WP_Query($args); ?>
					<?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<?php if( $current_post_id === $post->ID ) {
							$postID = $post->ID; 
						}?>
					<?php 
						$post_content = get_post($postID);
						$content = $post_content->post_content;
						$content = apply_filters('the_content',$content);

						if ($content == '') {
							?> 
							<h3><?php the_title(); ?></h3>
							<?php
						} else {
							?> 
					<a href="<?php the_permalink($postID); ?>"><h3 style="color: #f7941e;"><?php the_title(); ?></h3></a>

							<?php
						}
						
						?>

					<?php endwhile; ?>

					<?php else: ?>
						<h1>No posts here!</h1>
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>