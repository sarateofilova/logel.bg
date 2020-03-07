<?php 

/*
	Display a List of Child Pages With WordPress Shortcode
	http://www.beliefmedia.com/display-child-pages-wordpress
*/
 
 
function beliefmedia_child_pages($atts) {
 
$atts = shortcode_atts(array(
    'page' => false,
    'remove' => '',
    'description' => true,
    'words' => 60,
    'exclude' => false,
    'number' => false,
    'image' => false,
), $atts);

    global $post;
    $page = ($atts['page'] !== false) ? $atts['page'] : $post->ID;

    /* Excluded posts */
    $exclude = ($atts['exclude'] != false) ? $exclude = explode(',', $atts['exclude']) : array();

    $args = array(
        'post_parent' => $page,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_type' => 'page',
        'post__not_in' => $exclude
    );

    /* Limit number of posts? (for pagination purposes) */
    $args['posts_per_page'] = ($atts['number'] !== false) ? $atts['number'] : '-1';

    $subpages = new WP_query($args);
    
    /* Build list of pages */
    if ($subpages->have_posts()) :

        $output = '<ul>';

        while ($subpages->have_posts()) : $subpages->the_post();

            if ($atts['image']) $excerpt = trim(str_replace($atts['remove'], '', the_post_thumbnail('index-post-size')));

            if ($atts['description']) $excerpt = trim(str_replace($atts['remove'], '', get_the_excerpt()));
            if ( ($atts['words'] !== false) && ($atts['description']) ) $excerpt = wp_trim_words($excerpt, $num_words = $atts['words'], $more = null );
            $output .= '<li><h3><a href="' . get_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h3>';
            if ($atts['description']) $output .= '<p>' . $excerpt  . '</p>' . ' <a class="button" href="' . get_permalink() . '" title="' . get_the_title() . '">ПРОЧЕТИ ПОВЕЧЕ</a>';
            $output .= '</li>';

        endwhile;
        $output .= '</ul>';

        /* Reset query */
        wp_reset_postdata();

    else :

        $output = '<p>No pages found.</p>';

    endif;

return $output;
}
add_shortcode('childpages', 'beliefmedia_child_pages');

function change_excerpt( $more ) {
    if(post_type_exists('page')){
       return '';
    }
 return '...';
}
add_filter('excerpt_more', 'change_excerpt');



// Display child pages of page Products

function sc_show_children_excerpt($atts, $content = null){
    // if($atts['length'] > 0 ){
    
    //    }else{
    //     $atts['length'] = 50;
    // }
    
    
    if(isset($atts['id']) && is_numeric($atts['id'])){
        //id specified by shortcode attribute
        $parent_id = $atts['id'];
    }else{
        //get the id of the current article that is calling the shortcode
        $parent_id = get_the_ID();
    }
    
    
    $output = "";
    
    $i = 0;
    $output = '<div class="product-childpages">';

    
    if ( $children = get_children(array(
        'post_parent' => $parent_id,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_type' => 'page')))
    {
        foreach( $children as $child ) {
            $title = $child->post_title;
    
            $child_excerpt = apply_filters('the_excerpt', $child->post_excerpt);
    
            //split excerpt into array for processing
            $words = explode(' ', $child_excerpt);
    
            //chop off the excerpt based on the atts->lenth
            // $words = array_slice($words, 0, $atts['length']);
    
            //merge the array of words for the excerpt back into sentances
            $child_excerpt = implode(' ', $words);
    
            $link = get_permalink($child->ID);
    
            $image_id = get_post_thumbnail_id($post->ID);  
            $image_url = '<a class="inside-items image" href="' . get_permalink($child->ID) .  '">' . get_the_post_thumbnail($child->ID,'full') . '</a>'; 
            $result = $image_url;
            $readmore = '<a class="inside-items button" href="' . get_permalink($child->ID) . '" title="' . get_the_title() . '">Разгледай</a>';
    
            $output .= "<div class='attorney'>";
            $output .= "<a class='inside-items title' href='$link'>$title</a>";
            $output .= $result;
            // $output .= "<p>". $child_excerpt ."</p>";
            $output .= $readmore;
            $output .= "</div><div class='clear'></div>";
        }
    } 

    $output .= '</div>';
    
    return $output;
}

add_shortcode("show_child_pages", "sc_show_children_excerpt");


