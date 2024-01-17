<?php
/* Template Name: PS Search Results */
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

global $wp;

$unsafe_url = $_GET['q'];
$safe_url = filter_var($unsafe_url, FILTER_SANITIZE_FULL_SPECIAL_CHARS);


?>
<main id="main" class="search">
    <section class="py-5">
        <div class="container-xl">
<?php
$args = array(
    'taxonomy' => array('supplier-types', 'supplier-tags'),
    'name__like' => $safe_url,
    'hide_empty' => false, // Set to true if you only want terms with associated posts
);

$terms = get_terms($args);

if ( $terms ) {
    ?>
    <h1><?=sprintf('GTMA Categories Matching: %s', '<span>' . $safe_url . '</span>')?></h1>

    <section class="suppliers py-5">
    <div class="container-xl px-5 py-4 bg-grey-200">
        <ul class="cols-lg-2">
    <?php
    foreach ($terms as $term) {
        // var_dump($term);
        if ($term->taxonomy == 'supplier-tags') {
            $n = $term->name;
            $l = '/tags/' . $term->slug . '/';
        }
        elseif ($term->taxonomy == 'supplier-types') {
            $n = $term->name;
            $l = '/types/' . $term->slug . '/';
        }
        ?>
        <li><a href="<?=$l?>"><?=$n?></a></li>
        <?php
    }
    ?>
        </ul>
    </div>
    <div class="pt-4 pb-2 h3">Still can't find what you're looking for?</div>
    <div class="pb-4">Try a full site search: <a href="/?s=<?=$safe_url?>" class="btn-search text-center">Search <i class="fa-solid fa-magnifying-glass"></i></a></div>
    </section>
    <?php
}
else {
    // get_template_part( 'loop-templates/content', 'none' );
    ?>
    <h1><?=sprintf('No Products or Services matching %s found.', '<span>' . $safe_url . '</span>')?></h1>
    <div class="pt-4 pb-2 h3">Looking for a Supplier? Try a full site search</div>
    <div class="pb-4"><a href="/?s=<?=$safe_url?>" class="btn-search text-center">Search <i class="fa-solid fa-magnifying-glass"></i></a></p>
    <?php
}
?>
    <div class="mt-4">
        <?php
        numeric_posts_nav();
        ?>
    </div>
</main>
<?php
get_footer();
?>