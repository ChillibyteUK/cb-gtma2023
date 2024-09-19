<?php
require_once('../../../wp-config.php');

function encodeURIComponent($str) {
    $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
    return strtr(rawurlencode($str), $revert);
}

$args = array(
    'post_type' => 'suppliers',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    's' => $_GET['name']
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        echo "Found:<br>" . encodeURIComponent($_GET['name']) . "<br>" . get_the_permalink();
        //header("Location: " . get_the_permalink());
		//die();
    }
} else {
    //Page not found
    echo "Issue for:<br>" . encodeURIComponent($_GET['name']);
    //header("Location: /404/");
	//die();
}

wp_reset_postdata(); // Reset the query