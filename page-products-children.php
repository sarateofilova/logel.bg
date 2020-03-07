
<?php 
/*
Template Name: Page Products children
*/

get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>
	
	<div class="container page-container">
	
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
					
					<div id="page-products" class="row">
						<div class="products-sidebar col-sm-12">
							<h4 class="ttl">Продукти</h4>
							<?php echo do_shortcode('[childpages page="4570" description="false"]'); ?>
						</div>
						<div class="col-sm-12">
							<?php echo do_shortcode('[show_child_pages]'); ?>
							<?php the_content();?>

						</div>
					</div>

					
				</div>
			</div>
		
	<?php endwhile;  endif;?>

		</div>
	</div>
	
<?php get_footer(); ?>
