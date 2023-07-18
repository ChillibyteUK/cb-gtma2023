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
        "has_archive" => false,
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

// add_action( 'after_switch_theme', 'cb_rewrite_flush' );
// function cb_rewrite_flush() {
//     cb_register_post_types();
//     flush_rewrite_rules();
// }
