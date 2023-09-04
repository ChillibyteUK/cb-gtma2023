<?php
$sector = get_field('sector');

$q = new WP_Query(array(
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
if ($q->have_posts()) {
    ?>
<a class="anchor" id="suppliers"></a>
<section class="supplier_list py-5">
    <div class="container-xl">
        <h2 class="mb-4"><?=$sector->name?> Sector Suppliers</h2>
        <?php
        while($q->have_posts()) {
            $q->the_post();
            $type = get_the_terms(get_the_ID(), 'types');
            $types = implode(', ', wp_list_pluck($type, 'name'));
            ?>
        <a class="supplier_list__card"
            href="<?=get_the_permalink()?>">
            <h3><?=get_the_title()?></h3>
            <?=$types?>
        </a>
        <?php
        }
    ?>
    </div>
</section>
<?php
}
?>