<?php
/**
 * Template Name: Contacts template
 *
 */
 
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?>

	<div class="container page-container">
		<div class="row alignItemsFlexStart">
			<div class="col-lg-9">
				<div class="pageMain">
					<div class="row no-gutters">
						<div class="col-sm-12">
							<h1><?php the_title(); ?></h1>
						</div>
					</div>
					<div class="row no-gutters">
						<div class="col-sm-12">
							<?php echo get_the_post_thumbnail( $post_id, 'full' ); ?>
						</div>
					</div>
					<div class="row no-gutters">
						<div class="col-sm-12">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		
<?php endwhile;  endif;?>

			<div class="col-lg-3 sidebarLinks">
				<?php if ( is_active_sidebar( 'custom-side-bar' ) ) : ?>
					<?php dynamic_sidebar( 'custom-side-bar' ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>