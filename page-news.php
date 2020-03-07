<?php

/*
Template Name: News
*/

get_header(); ?>

	
	<div id="news" class="container blog-container">
	
		<div class="row alignItemsFlexStart">
            
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();  $current_post_id = $post->ID;  ?>

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
            
            <div class="col-lg-9">
                <?php 
                // the query

                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => 5,
                    'paged' => $paged,
                );
                $postslist = new WP_Query($args); ?>
                
                <?php if ( $postslist->have_posts() ) : ?>
            
                <ul>
                
                    <!-- the loop -->
                    <?php while ( $postslist->have_posts() ) : $postslist->the_post(); ?>
                        <div class="the-post">
                            <a class="post-title" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('index-post-size'); ?></a>
                            <div class="post-content">
                                <div class="post-date"><?php echo the_date(); ?></div>
                                <div class="post-excerpt"><?php echo the_excerpt();?></div>	
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <!-- end of the loop -->
                
                </ul>

                <div class="pagination">
                    <?php
                    $total_pages = $postslist->max_num_pages;
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
                
                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>
            
            </div>
            <?php wp_reset_postdata(); ?>

            <div class="col-lg-3 sidebar">
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

<?php get_footer(); ?>
