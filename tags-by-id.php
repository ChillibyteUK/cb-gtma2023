<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/wp-load.php");

$filename = "tags-by-id_" . date("Y-m-d\TH:i:s\Z") . ".csv";
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $filename . '"');
$output = fopen('php://output', 'w');
fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

$column_headers = ['Tag ID', 'Tag Name', 'Tag Slug'];

$column_headers = array_map('html_entity_decode', $column_headers);
fputcsv($output, $column_headers);

$terms = get_terms(array(
    'taxonomy' => 'supplier-tags',
    'hide_empty' => false,
));

if (!empty($terms) && !is_wp_error($terms)) {
    // Loop through each term and add to CSV
    foreach ($terms as $term) {
        fputcsv($output, [$term->term_id, $term->name, $term->slug]);
    }

    // Close the file output
    fclose($output);
    exit();
} else {
    echo "No terms found or an error occurred.";
}
