<!-- children -->
<section class="child_pages py-4">
    <div class="container-xl">
        <?php
        if (get_field('page_children__title')) {
            echo '<h2>' . get_field('page_children__title') . '</h2>';
        }
        ?>
        <div class="services__grid">
            <?php
$children = new WP_Query(array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => get_the_ID(),
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
));

        if ($children->have_posts()) {
            while ($children->have_posts()) {
                $children->the_post();
                $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
                $title = get_the_title();
    
                ?>
            <a class="services__card"
                href="<?=get_the_permalink()?>">
                <img src="<?=$img?>" alt="">
                <div class="services__title">
                    <?=$title?>
                </div>
            </a>
            <?php
            }
        }

        wp_reset_postdata();
        ?>
        </div>
</section>