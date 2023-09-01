<!-- partners -->
<section class="partners py-4 mb-4">
    <div class="container-xl">
        <div class="partners__grid">
            <?php
            $partners = get_page_by_path('business-partners');
            $children = new WP_Query(array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'post_parent'    => $partners->ID,
                'order'          => 'ASC',
                'orderby'        => 'menu_order'
            ));

            if ($children->have_posts()) {
                while ($children->have_posts()) {
                    $children->the_post();
                    $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    $title = get_the_title();
    
                    ?>
            <a class="partners__card"
                href="<?=get_the_permalink()?>">
                <img src="<?=$img?>" alt="">
                <div class="partners__title">
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