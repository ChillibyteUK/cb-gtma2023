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
<section class="supplier_list py-5">
    <div class="container-xl">
        <h2 class="mb-4"><?=$sector->name?> Sector Suppliers</h2>
        <?php
        while($q->have_posts()) {
            $q->the_post();
            $type = get_the_terms(get_the_ID(), 'types');
            $type = $type[0]->name;
            ?>
        <a class="supplier_list__card"
            href="<?=get_the_permalink()?>">
            <h3><?=get_the_title()?></h3>
            <?=$type?>
        </a>
        <?php
        }
    ?>
    </div>
</section>
<?php
}
?>