<?php
$sector = get_field('sector');

$q = new WP_Query(array(
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
if ($q->have_posts()) {
    ?>
<section class="news_list py-5">
    <div class="container-xl">
        <h2><?=$sector->name?> News</h2>
        <?php
        while($q->have_posts()) {
            $q->the_post();
            ?>
        <a class="news_list__card" href="<?=get_the_permalink()?>">
            <h3><?=get_the_title()?></h3>
            <div><?=wp_trim_words(get_the_content())?></div>
        </a>
        <?php
        }
    ?>
    </div>
</section>
<?php
}
?>