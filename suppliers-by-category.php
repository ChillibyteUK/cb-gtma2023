<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/wp-load.php");

require_once CB_THEME_DIR . '/vendor/autoload.php';

// set up spreadsheet object

$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

// Create a new worksheet
$sheet = $spreadsheet->getActiveSheet();

// Set headers for the columns
$sheet->setCellValue('A1', 'Term');
$sheet->setCellValue('B1', 'Suppliers');

// get categories
$terms = get_terms(array(
    'taxonomy' => 'supplier-types',
    'hide_empty' => false, // Set to true to exclude terms with no posts
));

$row = 2; // Start from row 2 for data

// for each category, get supplier
foreach ($terms as $term) {
    // Get a list of custom 'supplier' posts for the current term
    $supplier_posts = get_posts(array(
        'post_type' => 'suppliers',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'supplier-types',
                'field' => 'slug', // You can change this to 'id' or 'name' if needed
                'terms' => $term->slug, // Use term slug
            ),
        ),
    ));

    
    // echo '<h2>' . esc_html($term->name) . '</h2>';
    
    // Check if there are supplier posts for the term
    if ($supplier_posts) {
        // Loop through the supplier posts
        foreach ($supplier_posts as $supplier_post) {
            $sheet->setCellValue('A' . $row, $term->name);
            // $supplierNames .= $supplier_post->post_title . ', ';
            $supplier = strip_crud($supplier_post->post_title);
            $sheet->setCellValue('B' . $row, $supplier);
            $row++;
        }
        // Remove the trailing comma and space
        // $supplierNames = rtrim($supplierNames, ', ');
    } else {
        // Output a message if there are no supplier posts for the term
        // echo '<p>No suppliers found for this term.</p>';
    }

}

// Create a writer for XLSX
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');

// Define the file name
$date = new DateTime('now', new DateTimeZone('UTC'));
$zuluDate = $date->format('Y-m-d\TH:i:s\Z');
$filename = 'supplier_data_' . $zuluDate . '.xlsx';

// Set response headers to initiate download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

// Output the XLSX file
$writer->save('php://output');
exit;

