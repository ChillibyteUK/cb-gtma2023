<?php

require_once __DIR__ . '/../wp-load.php';

$terms = get_terms(array(
    'taxonomy' => 'supplier-tag',
    'hide_empty' => false,
));

if (!empty($terms) && !is_wp_error($terms)) {
    // Prepare a file path and name with current Zulu time
    $date = gmdate('Y-m-d\TH:i:s\Z');
    $filename = "tags-by-id_{$date}.csv";
    $filepath = wp_upload_dir()['basedir'] . '/' . $filename;  // Ensure the upload directory is writable

    // Open file handle to write
    $handle = fopen($filepath, 'w');
    if ($handle === false) {
        die('Failed to create file.');
    }

    // Add CSV headers
    fputcsv($handle, ['Tag ID', 'Tag Name', 'Tag Slug']);

    // Loop through each term and add to CSV
    foreach ($terms as $term) {
        fputcsv($handle, [$term->term_id, $term->name, $term->slug]);
    }

    // Close the file handle
    fclose($handle);

    // Output success message or handle file serving depending on context
    echo "CSV file created successfully: $filename";
} else {
    echo "No terms found or an error occurred.";
}

if (file_exists($filepath)) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
    readfile($filepath);
    exit;
}
