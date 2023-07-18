<?php

function cb_register_taxes()
{
    $args = [
        "label" => __("Supplier Categories", "cb-gtma2023"),
        "labels" => [
            "name" => __("Supplier Categories", "cb-gtma2023"),
            "singular_name" => __("Supplier Category", "cb-gtma2023"),
        ],
        "public" => true,
        "publicly_queryable" => false,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => false,
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy("categories", [ "suppliers" ], $args);

    $args = [
        "label" => __("Supplier Tags", "cb-gtma2023"),
        "labels" => [
            "name" => __("Supplier Tags", "cb-gtma2023"),
            "singular_name" => __("Supplier Tag", "cb-gtma2023"),
        ],
        "public" => true,
        "publicly_queryable" => false,
        "hierarchical" => false,
        "show_ui" => true,
        "update_count_callback" => '_update_post_term_count',
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array('slug' => 'tags'),
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy("tags", [ "suppliers" ], $args);
}
add_action('init', 'cb_register_taxes');
