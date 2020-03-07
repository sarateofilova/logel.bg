<?php get_header(); ?>

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
					
					<div id="sidebar-page-layout" class="row">
						<div class="col-sm-12 the-content">
							<?php the_content(); ?>
						</div>

						<div class="col-sm-12 sidebar">
							<div class="products-sidebar">
								<h4 class="ttl">Продукти</h4>
								<div class="textwidget">
									<?php echo do_shortcode('[childpages page="4570" description="false"]'); ?>
								</div>
							</div>
							<div class="archives-sidebar">
								<h4 class="ttl">Архив</h4>
								<div class="textwidget">
									<ul>
									<?php 
									$args = array(
										'type'            => 'monthly',
										'limit'           => '',
										'format'          => 'html', 
										'before'          => '',
										'after'           => '',
										'show_post_count' => false,
										'echo'            => 1,
										'order'           => 'DESC'
									);
									wp_get_archives( $args );
									?>
									</ul>
								</div>	
							</div>

							<div class="categories-sidebar">
								<h4 class="ttl">Категории</h4>
								<ul>
									<?php wp_list_categories( array(
										'orderby'    => 'name',
										// 'show_count' => true,
										'title_li' => ''
									) ); ?> 
								</ul>
							</div>
							
						</div>
					</div>

					
				</div>
			</div>
		
	<?php endwhile;  endif;?>

		</div>
	</div>
	
<?php get_footer(); ?>
