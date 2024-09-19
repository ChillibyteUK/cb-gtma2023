<?php
require_once('../../../wp-config.php');

function get_post_by_name(string $name, string $post_type = "post") {
    $query = new WP_Query([
        "post_type" => $post_type,
        "title" => $name
    ]);

    return $query->have_posts() ? reset($query->posts) : null;
}

$search = get_post_by_name(urldecode($_GET['name']), "suppliers");
if ( $search->ID ) {
    header("Location: " . get_the_permalink($search->ID));
    die();
} else {
    header("Location: /404/");
    die();
}