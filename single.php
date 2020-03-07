<?php get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

	<?php get_template_part('template-parts/content','schema'); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php get_template_part('template-parts/content','prepost'); ?>
		<div class="container post-container">
			<div class="row alignItemsFlexStart">
			  <main class="col-lg-9">
				<h1><?php the_title(); ?></h1>
				<?php echo get_the_post_thumbnail( $post_id, 'full' ); ?>
				<?php the_content(); ?>
			  </main>
			  <aside class="col-lg-3 sidebarLinks">
				<?php if ( is_active_sidebar( 'custom-side-bar' ) ) : ?>
					<?php dynamic_sidebar( 'custom-side-bar' ); ?>
				<?php endif; ?>
			  </aside>
			</div>
		</div>
	</article>

	<?php endwhile;  endif;?>

<?php get_footer(); ?>
