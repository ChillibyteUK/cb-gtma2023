<?php

function cb_register_taxes()
{
    $args = [
        "label" => "Supplier Types",
        "labels" => [
            "name" => "Supplier Types",
            "singular_name" => "Supplier Type",
        ],
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        'rewrite' => array( 'slug' => 'supplier', 'with_front' => false ),
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy("types", [ "suppliers" ], $args);

    $args = [
        "label" => "Supplier Tags",
        "labels" => [
            "name" => "Supplier Tags",
            "singular_name" => "Supplier Tag",
        ],
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "update_count_callback" => '_update_post_term_count',
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array('slug' => 'tags', 'with_front' => false),
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy("tags", [ "suppliers" ], $args);

    $args = [
        "label" => "Supplier Accreditations",
        "labels" => [
            "name" => "Supplier Accreditations",
            "singular_name" => "Supplier Accreditation",
        ],
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "update_count_callback" => '_update_post_term_count',
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array('slug' => 'accreditations', 'with_front' => false),
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy("accreditations", [ "suppliers" ], $args);

    $args = [
        "label" => "Sectors",
        "labels" => [
            "name" => "Sectors",
            "singular_name" => "Sector",
        ],
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "update_count_callback" => '_update_post_term_count',
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array('slug' => 'sector', 'with_front' => false),
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "show_in_quick_edit" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy("sectors", [ "suppliers", "post" ], $args);
}
add_action('init', 'cb_register_taxes');
