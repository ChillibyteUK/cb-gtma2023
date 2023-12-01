<?php

$path = preg_replace('/wp-content(?!.*wp-content).*/', '', __DIR__);
require_once($path . 'wp-load.php');

$supp = get_posts(array(
    'post_type' => 'suppliers',
    'numberposts' => -1
));

$suppliers = array();

foreach ($supp as $p) {
    $t = strip_crud($p->post_title);
    $suppliers[] = $t;
}


$tag = get_terms(array(
    'taxonomy' => 'tags',
    'posts_per_page' => -1,
    'hide_empty' => true
));

$tags = array();

foreach ($tag as $p) {
    $tags[] = $p->name;
}

$type = get_terms(array(
    'taxonomy' => 'types',
    'posts_per_page' => -1,
    'hide_empty' => true
));

$types = array();

foreach ($type as $p) {
    $types[] = $p->name;
}


$json = array();
$json['category'] = $types;
$json['supplier'] = $suppliers;
$json['tag'] = $tags;

header('Content-Type: application/json; charset=utf-8');
echo '[' . json_encode($json) . ']';
