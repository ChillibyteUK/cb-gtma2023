<?php


function numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}

/*
// default WP tags to hierarchical
function wd_hierarchical_tags_register() {

    // Maintain the built-in rewrite functionality of WordPress tags
  
    global $wp_rewrite;
  
    $rewrite =  array(
      'hierarchical'              => false, // Maintains tag permalink structure
      'slug'                      => get_option('tag_base') ? get_option('tag_base') : 'tag',
      'with_front'                => ! get_option('tag_base') || $wp_rewrite->using_index_permalinks(),
      'ep_mask'                   => EP_TAGS,
    );
  
    // Redefine tag labels (or leave them the same)
  
    $labels = array(
      'name'                       => _x( 'Tags', 'Taxonomy General Name', 'hierarchical_tags' ),
      'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'hierarchical_tags' ),
      'menu_name'                  => __( 'Tags', 'hierarchical_tags' ),
      'all_items'                  => __( 'All Tags', 'hierarchical_tags' ),
      'parent_item'                => __( 'Parent Tag', 'hierarchical_tags' ),
      'parent_item_colon'          => __( 'Parent Tag:', 'hierarchical_tags' ),
      'new_item_name'              => __( 'New Tag Name', 'hierarchical_tags' ),
      'add_new_item'               => __( 'Add New Tag', 'hierarchical_tags' ),
      'edit_item'                  => __( 'Edit Tag', 'hierarchical_tags' ),
      'update_item'                => __( 'Update Tag', 'hierarchical_tags' ),
      'view_item'                  => __( 'View Tag', 'hierarchical_tags' ),
      'separate_items_with_commas' => __( 'Separate tags with commas', 'hierarchical_tags' ),
      'add_or_remove_items'        => __( 'Add or remove tags', 'hierarchical_tags' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'hierarchical_tags' ),
      'popular_items'              => __( 'Popular Tags', 'hierarchical_tags' ),
      'search_items'               => __( 'Search Tags', 'hierarchical_tags' ),
      'not_found'                  => __( 'Not Found', 'hierarchical_tags' ),
    );
  
    // Override structure of built-in WordPress tags
  
    register_taxonomy( 'post_tag', 'post', array(
      'hierarchical'              => true, // Was false, now set to true
      'query_var'                 => 'tag',
      'labels'                    => $labels,
      'rewrite'                   => $rewrite,
      'public'                    => true,
      'show_ui'                   => true,
      'show_admin_column'         => true,
      'show_in_rest'              => true,
      '_builtin'                  => true,
    ) );
  
  }
  add_action('init', 'wd_hierarchical_tags_register');
*/
