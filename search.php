<?php
/**
 * The template for displaying search results pages
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<main id="main" class="search">
    <section class="py-5">
        <div class="container-xl">
<?php
if ( have_posts() ) {
    ?>
            <h1><?=sprintf('Search Results for: %s', '<span>' . get_search_query() . '</span>')?></h1>
    <?php
    while ( have_posts() ) {
        the_post();
        $postType = get_post_type_object(get_post_type());
        ?>
        <a class="search__card" href="<?=get_the_permalink()?>">
            <div class="search__type"><?php
                $t = $postType->labels->singular_name;
                if ($t == 'Post') {
                    echo '<span><i class="fa-solid fa-newspaper"></i> News</span>';
                    $search_meta = 'Posted: ' . get_the_date('jS F, Y');
                }
                elseif ($t == 'Supplier') {
                    echo '<span><i class="fa-solid fa-gear"></i> Supplier</span>';
                    $search_meta = '<div class="search__terms">';
                    $terms = wp_get_post_terms(get_the_ID(), 'supplier-types');
                    foreach ($terms as $term) {
                        $search_meta .= '<span>' . $term->name . '</span>';
                    }
                    $search_meta .= '</div>';
                }
                elseif ($t == 'Event') {
                    echo '<span><i class="fa-solid fa-calendar-days"></i> Event</span>';
                    $date = DateTime::createFromFormat('Ymd', get_field('start_date', get_the_ID()));
                    $search_meta = 'Date: ' . $date->format('jS F, Y');

                }
                elseif ($t == 'Page') {
                    echo '<span><i class="fa-solid fa-file"></i> Page</span>';
                    $search_meta = '';
                }
            ?></div>
            <div class="search__inner">
                <h2 class="fs-5 d-inline">
                    <?=strip_crud(get_the_title())?>
                </h2>
                <p class="mt-2 fs-200">
                    <?=wp_trim_words(get_the_content(), 30)?>
                </p>
                <p class="search__meta">
                    <?=$search_meta?>
                </p>
            </div>
        </a>
<?php
    }
}
else {
    get_template_part( 'loop-templates/content', 'none' );
}
// Display the pagination component.

?>
    <div class="mt-4">
        <?php
        numeric_posts_nav();
        ?>
    </div>
</main>
<?php

get_footer();
