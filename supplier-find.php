<?php
require_once('../../../wp-config.php');

$search = get_post_by_name(urldecode($_GET['name']), "suppliers");
if ( $search->ID ) {
    header("Location: " . get_the_permalink($search->ID));
    die();
} else {
    header("Location: /404/");
    die();
}