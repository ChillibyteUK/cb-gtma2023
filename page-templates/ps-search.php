<?php
/* Template Name: PS Search Results */
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

global $wp;

$unsafe_url = $_GET['q'];
$safe_display_url = filter_var($unsafe_url, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$safe_url = urlencode($unsafe_url);


?>
<main id="main" class="search">
    <section class="pb-5">
        <div class="container-xl">
            <pre><?=var_dump($safe_display_url)?></pre>
            <pre><?=var_dump($safe_url)?></pre>
            <h1 class="pb-4"><?=sprintf('Search results for: %s', '<span>' . $safe_display_url . '</span>')?></h1>
<?php
$args = array(
    'taxonomy' => array('supplier-types', 'supplier-tags'),
    'name__like' => $safe_url,
    'hide_empty' => false, // Set to true if you only want terms with associated posts
);

$terms = get_terms($args);

if ( $terms ) {
    $totalSuppliers = 0;
    $totalTerms = 0;
    ?>
    <h2>Products &amp; Services</h2>
    <div id="counts"></div>
    <section class="suppliers pb-5 pt-4 ">
    <div class="container-xl px-5 py-4 bg-grey-200">
        <ul class="cols-lg-2">
    <?php
    foreach ($terms as $term) {
        // var_dump($term);
        if ($term->taxonomy == 'supplier-tags') {

            $args = array(
                'post_type' => 'suppliers', // Replace with your custom post type
                'tax_query' => array(
                    array(
                        'taxonomy' => 'supplier-tags',
                        'field'    => 'slug',
                        'terms'    => $term->slug, // Replace with your term slug
                    ),
                ),
                'posts_per_page' => -1,  // Retrieve all posts
                'fields' => 'ids',       // Get only the IDs for performance
            );
            
            $query = new WP_Query($args);
            
            $c = $query->found_posts; // This is the count of posts
            $totalSuppliers += $c;
            
            wp_reset_postdata();

            $n = $term->name;
            $l = '/tags/' . $term->slug . '/';
        }
        elseif ($term->taxonomy == 'supplier-types') {

            $args = array(
                'post_type' => 'suppliers', // Replace with your custom post type
                'tax_query' => array(
                    array(
                        'taxonomy' => 'supplier-types',
                        'field'    => 'slug',
                        'terms'    => $term->slug, // Replace with your term slug
                    ),
                ),
                'posts_per_page' => -1,  // Retrieve all posts
                'fields' => 'ids',       // Get only the IDs for performance
            );
            
            $query = new WP_Query($args);
            
            $c = $query->found_posts; // This is the count of posts
            $totalSuppliers += $c;

            wp_reset_postdata();

            $n = $term->name;
            $l = '/types/' . $term->slug . '/';
        }
        ?>
        <li><a href="<?=$l?>"><?=$n?> (<?=$c?>)</a></li>
        <?php
        $totalTerms++;
    }
    ?>
        </ul>
    </div>
    <?php
    $categoriesText = $totalTerms > 1 ? 'categories' : 'category';
    $suppliersText = $totalSuppliers > 1 ? 'entries' : 'entry';
    ?>
    <script>
        document.getElementById('counts').innerHTML = '<?=$totalSuppliers?> supplier <?=$suppliersText?> found in <?=$totalTerms?> <?=$categoriesText?>';
    </script>
    <?php

    $of = new WP_Query(array(
        'post_type' => 'suppliers',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'search_prod_title' => $safe_url, // Your search term
        'meta_query' => array(
            array(
                'key' => 'profile',
                'value' => 'Featured',
                'compare' => '='
            )
        )
    ));
    $o = new WP_Query(array(
        'post_type' => 'suppliers',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'search_prod_title' => $safe_url, // Your search term
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'profile',
                'value' => 'Featured',
                'compare' => '!='
            ),
            array(
                'key' => 'profile',
                'compare' => 'NOT EXISTS'
            )
        )
    ));
    if ($of->have_posts() || $o->have_posts()) {
        ?>
        <h2 class="mt-4">Suppliers</h2>
        <?php
        $c = 0;
        echo '<div class="mb-4" id="suppCounts"></div>';

        echo '<div id="suppliers" class="mb-4">';
        if ($of->have_posts()) {
            while ($of->have_posts()) {
                $of->the_post();
                $type = get_the_terms(get_the_ID(), 'types');
                $types = implode(', ', wp_list_pluck($type, 'name'));
                $featured = '';
                if (get_field('profile') == 'Featured') {
                    $featured = '<div class="featured-badge">Featured <i class="fa-solid fa-star"></i></div>';
                }
                ?>
                <a class="suppliers__card"
                    href="<?=get_the_permalink()?>">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2 class="fs-5 d-inline">
                                <?=strip_crud(get_the_title())?>
                            </h2>
                        </div>
                        <?=$featured?>
                    </div>
                    <p class="mt-2 fs-200">
                        <?=wp_trim_words(get_the_content(), 30)?>
                    </p>
                </a>
                <?php
                $c++;
            }
        }
        if ($o->have_posts()) {
            while ($o->have_posts()) {
                $o->the_post();
                $type = get_the_terms(get_the_ID(), 'types');
                $types = implode(', ', wp_list_pluck($type, 'name'));
                $featured = '';
                if (get_field('profile') == 'Featured') {
                    $featured = '<div class="featured-badge">Featured <i class="fa-solid fa-star"></i></div>';
                }
                ?>
                <a class="suppliers__card"
                    href="<?=get_the_permalink()?>">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2 class="fs-5 d-inline">
                                <?=strip_crud(get_the_title())?>
                            </h2>
                        </div>
                        <?=$featured?>
                    </div>
                    <p class="mt-2 fs-200">
                        <?=wp_trim_words(get_the_content(), 30)?>
                    </p>
                </a>
                <?php
                $c++;
            }
        }
        echo '</div>';
        $sCountText = $c > 1 ? 'suppliers' : 'supplier';
        ?>
        <script>
            document.getElementById('suppCounts').innerHTML = '<?=$c?> <?=$sCountText?> found';
        </script>
        <?php
    }
        ?>
        <div class="pt-4 pb-2 h3">Still can't find what you're looking for?</div>
        <div class="pb-4">Try a full site search: <a href="/?s=<?=$safe_url?>" class="btn-search text-center">Search <i class="fa-solid fa-magnifying-glass"></i></a></div>
        </section>
        <?php
}
else {
    // get_template_part( 'loop-templates/content', 'none' );
    ?>
    <h2><?=sprintf('No Products or Services matching %s found.', '<span>' . $safe_display_url . '</span>')?></h2>
    <?php
    $of = new WP_Query(array(
        'post_type' => 'suppliers',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'search_prod_title' => "$safe_url", // Your search term
        'meta_query' => array(
            array(
                'key' => 'profile',
                'value' => 'Featured',
                'compare' => '='
            )
        )
    ));
    $o = new WP_Query(array(
        'post_type' => 'suppliers',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'search_prod_title' => "$safe_url", // Your search term
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'profile',
                'value' => 'Featured',
                'compare' => '!='
            ),
            array(
                'key' => 'profile',
                'compare' => 'NOT EXISTS'
            )
        )
    ));

    if ($o->have_posts() || $of->have_posts()) {
        echo '<div class="mb-4">But we have found these suppliers...</div>';
        echo '<div id="suppliers" class="mb-4">';

        if ($of->have_posts()) {
            while ($of->have_posts()) {
                $of->the_post();
                $type = get_the_terms(get_the_ID(), 'types');
                $types = implode(', ', wp_list_pluck($type, 'name'));
                ?>
                <a class="suppliers__card"
                    href="<?=get_the_permalink()?>">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2 class="fs-5 d-inline">
                                <?=strip_crud(get_the_title())?>
                            </h2>
                        </div>
                        <div class="featured-badge">Featured <i class="fa-solid fa-star"></i></div>
                    </div>
                    <p class="mt-2 fs-200">
                        <?=wp_trim_words(get_the_content(), 30)?>
                    </p>
                </a>
                <?php
            }
            wp_reset_postdata();

        }
        if ($o->have_posts()) {
            while ($o->have_posts()) {
                $o->the_post();
                $type = get_the_terms(get_the_ID(), 'types');
                $types = implode(', ', wp_list_pluck($type, 'name'));
                ?>
                <a class="suppliers__card"
                    href="<?=get_the_permalink()?>">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2 class="fs-5 d-inline">
                                <?=strip_crud(get_the_title())?>
                            </h2>
                        </div>
                    </div>
                    <p class="mt-2 fs-200">
                        <?=wp_trim_words(get_the_content(), 30)?>
                    </p>
                </a>
                <?php
            }
            wp_reset_postdata();
        }
        echo '</div>';
    }
    remove_filter( 'posts_where', 'filter_posts_where', 10 );
    ?>
    <div class="pt-4 pb-2 h3">Still can't find what you're looking for? Try a full site search</div>
    <div class="pb-4"><a href="/?s=<?=$safe_url?>" class="btn-search text-center">Search <i class="fa-solid fa-magnifying-glass"></i></a></p>
    <?php
}
?>
</main>
<?php
get_footer();
?>