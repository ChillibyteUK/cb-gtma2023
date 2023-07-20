<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$cat_name = get_queried_object()->name;
$cat_id = get_queried_object()->term_id;
?>
<main id="main" class="supplier-archive">
    <section class="suppliers py-5">
        <div class="container-xl">
            <h1><?=$cat_name?></h1>
            <?=term_description()?>
            <?php
$q = new WP_Query(array(
    'post_type' => 'suppliers',
    'posts_per_page' => -1,
    'tax_query' => array(
    array(
        'taxonomy' => 'tags',
        'field' => 'term_id',
        'terms' => $cat_id,
        'include_children' => false
    )
    )
));
while ($q->have_posts()) {
    $q->the_post();
    ?>
            <a class="suppliers__card"
                href="<?=get_the_permalink()?>">
                <?=get_the_title()?>
            </a>
            <?php
}
?>
        </div>
    </section>
</main>
<?php
get_footer();
?>