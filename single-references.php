<?php 
/*
Template Name: Референция
Template Post Type: references
*/

get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
	
	<div class="container page-container">
	
		<div class="row alignItemsFlexStart">
			<div class="col-lg-12">
		
                <div class="reference">
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                    <a class="button" href="<?php echo get_post_meta($post->ID, 'pdf_url', true); ?>" target="_blank">Виж</a>
                </div>
			
			</div>
		
	<?php endwhile;  endif;?>

		</div>
	</div>
	
<?php get_footer(); ?>


