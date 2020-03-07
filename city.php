<?php
/*
Template Name: Град
Template Post Type: cities
*/

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();  $current_post_id = $post->ID;  ?>
	
	<div  class="container page-container cities">
	
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
						<div class="col-sm-12 cities-content">
                            <div class="the-wp-content"><?php the_content(); ?></div>


							<div id="the-php-content_<?php echo $post->ID; ?>" class="the-php-content">
								<div class="the-text">
									<p>Списък на някои от обектите на ЛОГЕЛ и ИВКО ИНДУСТРИ в област <?php the_title() ?>.</p>
								</div>
								<table style="border-color: #fcfcfc;" border="1" cellpadding="2">
									
									<?php $repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);  if ( $repeatable_fields ) : ?>
									<thead>
										<tr  class="row">
											<th>Обект</th>
											<th>Град</th>
											<th>Монтирано оборудване</th>
											<th>Снимки</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ( $repeatable_fields as $field ) { ?>
										
									<tr class="row">
										<?php if($field['object'] != '') echo '<td class="field">'. esc_attr( $field['object'] ) . '</td>'; ?>
										<?php if($field['city'] != '') echo '<td class="field">'. esc_attr( $field['city'] ) . '</td>'; ?>
										<?php if($field['equipment'] != '') echo '<td class="field">'. esc_attr( $field['equipment'] ) . '</td>'; ?>
										<?php if($field['fotos'] != '') echo '<td class="field">'. esc_attr( $field['fotos'] ) . '</td>'; ?>
									</tr>
									<?php } ?> 
									<?php endif; ?>
									</tbody>
								</table>
							</div>
                            
                        
						</div>
					</div>
				</div>
			</div>
		
	<?php endwhile;  endif;?>

		</div>
	</div>

<?php get_footer(); ?>