<?php

$buttons = '';

$sector = get_field('sector');

$news = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
        'taxonomy' => 'sectors',
        'field' => 'slug',
        'terms' => array($sector->slug)
        )
    )
));
if ($news->have_posts()) {
    $buttons .= '<a href="#news" class="btn btn-secondary">News</a>';
}
$suppliers = new WP_Query(array(
    'post_type' => 'suppliers',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'asc',
    'tax_query' => array(
        array(
        'taxonomy' => 'sectors',
        'field' => 'slug',
        'terms' => array($sector->slug)
        )
    )
));
if ($suppliers->have_posts()) {
    $buttons .= '<a href="#suppliers" class="btn btn-secondary">Suppliers</a>';
}
?>
<section class="sector_subnav">
    <div class="container-xl mb-4">
        <?=$buttons?>
    </div>
</section>