<?php
$q = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 3
));
?>
<section class="latest_news bg-grey py-5">
<div class="container-xl">
    <h2>Latest News from GTMA</h2>
    <div class="row w-100">
    <?php
    $n = 1;
while ($q->have_posts()) {
    if ($n > 3) {
        continue;
    }
    $q->the_post();
    $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
    if (!$img) {
        $img = get_stylesheet_directory_uri() . '/img/default-blog.png';
    }
    $cats = get_the_category();
    $category = wp_list_pluck($cats, 'name');
    $flashcat = cbslugify($category[0]);
    $catclass = implode(' ', array_map('cbslugify', $category));
    $category = implode(', ', $category);

    if (has_category('event')) {
        $the_date = get_field('start_date', get_the_ID());
    } else {
        $the_date = get_the_date('jS F, Y');
    }


    ?>
<div
                class="news__item col-lg-4 col-md-6 p-0 <?=$catclass?>"><?=$n?>
                <a href="<?=get_the_permalink(get_the_ID())?>">
                    <div class="news__card card--<?=$flashcat?>">
                        <div class="news__image_container">
                            <div
                                class="news__flash news__flash--<?=$flashcat?>">
                                <?=$category?>
                            </div>
                            <img class="news__image" src="<?=$img?>">
                        </div>
                        <div class="news__inner">
                            <h3 class="news__title mb-0">
                                <?=get_the_title()?>
                            </h3>
                            <div class="news__date"><?=$the_date?>
                            </div>
                        </div>
                        <!-- <div class="card__link">Read more</div> -->
                    </div>
                </a>
            </div>
    <?php
    $n++;
}
wp_reset_postdata();
    ?>
</div>
</div>
