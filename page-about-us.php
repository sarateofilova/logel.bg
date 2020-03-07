<?php 
/*
Template Name: За Нас
*/

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  $current_post_id = $post->ID;  ?>
	
	<div class="container about-us">
	
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
                    <?php the_content(); ?>
                </div>
                
                <div class="col-sm-12 sidebar">
                    <div class="our-moto">
                        <h4 class="widget-title">Нашето мото</h4>
                        <p style="color: #f7941e;">ВСИЧКО Е ВЪЗМОЖНО, НЕВЪЗМОЖНОТО НИ ОТНЕМА ПОВЕЧЕ ВРЕМЕ!</p>
                    </div>

                    <div class="the-references">
                        <h4 class="widget-title">Референции</h4>
                        <?php 
                        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                        $args = array('post_type' => 'references', 'posts_per_page' => '8', 'orderby' => 'date', 'order'   => 'ASC', 'paged' => $paged,); ?>
                        <?php $loop = new WP_Query($args); ?>
                        <?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>

                        <?php if( $current_post_id === $post->ID ) {
                                $postID = $post->ID; 
                            }?>
                            <div class="">
                                
                                <a href="<?php the_permalink(); ?>"><blockquote><?php the_title(); the_content(); ?></blockquote></a>
                                
                            </div>

                        <?php endwhile; ?>

                        <?php else: ?>
                            <h1>No posts here!</h1>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>

        </div>
	</div>

<?php get_footer(); ?>

