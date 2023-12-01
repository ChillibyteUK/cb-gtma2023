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
    $suppliers[$t] = $p->post_name;
}

header('Content-Type: application/json; charset=utf-8');
echo '[' . json_encode($suppliers) . ']';
