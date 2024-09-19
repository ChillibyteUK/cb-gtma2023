<?php
require_once('../../../wp-config.php');


$search = get_post_by_name(urldecode($_GET['name']), "suppliers");
print_r($search);
exit;

$args = array(
    'post_type' => 'suppliers',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    's' => urldecode($_GET['name'])
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        echo "Found:<br>" . urldecode($_GET['name']) . "<br>" . get_the_permalink();
        //header("Location: " . get_the_permalink());
		//die();
    }
} else {
    //Page not found
    echo "Issue for:<br>" . urldecode($_GET['name']);
    //header("Location: /404/");
	//die();
}

wp_reset_postdata(); // Reset the query



function get_post_by_name(string $name, string $post_type = "post") {
    $query = new WP_Query([
        "post_type" => $post_type,
        "name" => $name
    ]);

    return $query->have_posts() ? reset($query->posts) : null;
}