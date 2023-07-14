<?php

function cb_register_taxes()
{
    $args = [
        "label" => __("CS Services", "cb-gtma2023"),
        "labels" => [
            "name" => __("CS Services", "cb-gtma2023"),
            "singular_name" => __("CS Service", "cb-gtma2023"),
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
    register_taxonomy("service", [ "projects" ], $args);
}
add_action('init', 'cb_register_taxes');
