<?php
$bg = get_field('has_bg') ? 'services-bg' : '';
?>
<section class="services <?=$bg?>">
    <div class="container-xl">
        <?php
if (get_field('show_preamble')) {
    ?>
        <h2 class="text-blue mb-4">Our Services</h2>
        <div class="services__preamble">
            <div class="services__intro">
                Here are some of the services available to members.<br>
                If you are a buyer or potential supplier, please call GTMA and we will be happy to discuss how we can
                help you in your business.
            </div>
            <div class="services__contact">
                <p>Telephone us: <span
                        class="fw-bold"><?=do_shortcode('[contact_phone]')?></span>
                </p>
                <p>or email us at: <span
                        class="fw-bold"><?=do_shortcode('[contact_email]')?></span>
                </p>
            </div>
        </div>
        <?php
}
?>
        <div class="services__grid">
            <?php
        $parent = get_page_by_path('services');
$q = new WP_Query(array(
    'post_type' => 'page',
    'posts_per_page' => -1,
    'post_parent' => $parent->ID
));
while ($q->have_posts()) {
    $q->the_post();
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
?>
        </div>
    </div>
</section>