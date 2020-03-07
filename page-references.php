<?php

/*
Template Name: References
*/

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  $current_post_id = $post->ID;  ?>
	
	<div class="container page-references">
	
		<div class="row alignItemsFlexStart">
			<div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-12">
                        <h1><?php the_title(); ?></h1>
                        <div class="breadcrumb-nav">
                            <?php custom_breadcrumbs(); ?>
                        </div>
                    </div>
                </div>
			</div>
		
	        <?php endwhile;  endif;?>

            <div class="sidebar-page-layout">
                <div class="col-sm-12 the-content">
                    <?php 
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                    $args = array('post_type' => 'references', 'posts_per_page' => '4', 'orderby' => 'date', 'order'   => 'ASC', 'paged' => $paged,); ?>
                    <?php $loop = new WP_Query($args); ?>
                    <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <?php if( $current_post_id === $post->ID ) {
                            $postID = $post->ID; 
                        }?>
                        <div class="reference">
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                            <a class="button" href="<?php echo get_post_meta($post->ID, 'pdf_url', true); ?>" target="_blank">Виж</a>
                        </div>

                    <?php endwhile; ?>

                    <div class="pagination">
                        <?php
                        $total_pages = $loop->max_num_pages;
                        if ($total_pages > 1){

                            $current_page = max(1, get_query_var('paged'));

                            echo paginate_links(array(
                                'base' => get_pagenum_link(1) . '%_%',
                                'format' => '/page/%#%',
                                'current' => $current_page,
                                'total' => $total_pages,
                                'prev_text'    => __('« Предишни'),
                                'next_text'    => __('Следващи »'),
                                'add_args'  => array()
                            ));
                        }
                            ?>   
				    </div>

                    <?php else: ?>
                        <h1>No posts here!</h1>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                
                <div class="col-sm-12 sidebar">
                    <?php echo dynamic_sidebar( 'sidebar' ); ?>
                </div>
            </div>

        </div>
	</div>

<?php get_footer(); ?>
