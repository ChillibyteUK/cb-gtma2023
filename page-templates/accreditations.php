<?php

/*
Template Name: Accreditations List
*/


wp_head();

$q = new WP_Query(array(
    'post_type' => 'suppliers',
    'posts_per_page' => -1,
    // 'post_id' => 3516
));

echo '<pre>';

$doclist = array();

while ($q->have_posts()) {

    $q->the_post();

    $p = get_post();

	if ( has_blocks( $p ) ) {

		$blocks = parse_blocks( $p->post_content );

		foreach ( $blocks as $block ) {
        
            if ($block['blockName'] != 'acf/cb-supplier-assets') {
                continue;
            }
            
            // echo $block['blockName'] . "\n";

            $type = $block['attrs']['data']['type'];

            if ($type != 'Press Releases') {
                continue;
            }

            $docs = $block['attrs']['data']['documents'];

            foreach ($docs as $d) {
                $doclist[] = $d;
            }

		}
	}

    // echo get_the_title();// . "\n";

    // die();

}



foreach($doclist as $d) {
    echo $d;
    echo wp_get_attachment_url($d) . "\n";
}

echo '</pre>';

wp_footer();