<?php

function cb_register_post_types()
{
    $labels = [
        "name" => __("Suppliers", "cb-gtma2023"),
        "singular_name" => __("Supplier", "cb-gtma2023"),
    ];

    $args = [
        "label" => __("supplier", "cb-gtma2023"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "menu_icon" => "dashicons-open-folder",
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "suppliers", "with_front" => false ],
        "query_var" => true,
        "supports" => [ "title",  "editor" ],
        "show_in_graphql" => false,
        "exclude_from_search" => true
    ];

    register_post_type("suppliers", $args);


    $labels = [
        "name" => __("SCS Magazines", "cb-gtma2023"),
        "singular_name" => __("SCS Magazine", "cb-gtma2023"),
    ];

    $args = [
        "label" => __("scs", "cb-gtma2023"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "menu_icon" => "dashicons-open-folder",
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "scs", "with_front" => false ],
        "query_var" => true,
        "supports" => [ "title", "editor" ],
        "show_in_graphql" => false,
        "exclude_from_search" => true
    ];

    register_post_type("scs", $args);
}
add_action('init', 'cb_register_post_types');


/*

// ************* Remove default Posts type if no blog *************

// Remove side menu
add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}

// Remove +New post in top Admin Menu Bar
add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );

function remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}

// Remove Quick Draft Dashboard Widget
add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );

function remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}

// End remove post type

*/


// ADD NEW COLUMN
function suppliers_featured_head($defaults) {
	$column_name = 'featured';//column slug
	$column_heading = 'Featured';//column heading
	$defaults[$column_name] = $column_heading;
	return $defaults;
}
 
// SHOW THE COLUMN CONTENT
function suppliers_featured_content($name, $post_ID) {
    $column_name = 'featured';//column slug	
    $column_field = 'is_featured';//field slug	
    if ($name == $column_name) {
        $post_meta = get_post_meta($post_ID,$column_field,true);
        if ($post_meta) {
            echo $post_meta;
        }
    }
}

// ADD STYLING FOR COLUMN
function suppliers_featured_style(){
	$column_name = 'featured';//column slug	
	echo "<style>.column-$column_name{width:10%;}</style>";
}

add_filter('manage_suppliers_posts_columns', 'suppliers_featured_head');
add_action('manage_suppliers_posts_custom_column', 'suppliers_featured_content', 10, 2);
add_filter('admin_head', 'suppliers_featured_style');

add_action('after_switch_theme', function () {
    // cb_register_post_types();
    flush_rewrite_rules();
});
