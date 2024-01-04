<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/wp-load.php");

$q = new WP_Query(array(
    'post_type' => 'suppliers',
    'posts_per_page' => -1,
    'post_status' => 'ANY'
));

$date = new DateTime('now', new DateTimeZone('UTC'));
$zuluDate = $date->format('Y-m-d\TH:i:s\Z');

header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=gtma_suppliers_' . $zuluDate . '.csv');
header('Pragma: no-cache');

$fp = fopen('php://temp', 'w+');
fputs($fp, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));

$fields = array( 'WP Title', 'Display Title', 'URL', 'Status' );
fputcsv($fp, $fields);

while ($q->have_posts()) {
    $q->the_post();
    $fields = array( get_the_title(), strip_crud(get_the_title()), get_the_permalink(), get_post_status() );
    fputcsv($fp, $fields);
}

rewind($fp);
$csv = stream_get_contents($fp);
fclose($fp);

echo $csv;