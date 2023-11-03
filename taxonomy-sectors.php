<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$page_for_posts = get_option('page_for_posts');
$img = get_the_post_thumbnail_url($page_for_posts, 'full');

$term = get_queried_object();

?>
<main id="main" class="supplier-archive">

    <section class="suppliers">
        <div class="container-xl py-5">
            <div class="mb-4">
                <h1 class="mb-4">
                    <?=$term->name?>
                    <?=get_the_title($page_for_posts)?>
                </h1>
                <?=get_the_content(null, false, $page_for_posts)?>
            </div>
            <?php
            $cats = get_terms(array('taxonomy'=>'sectors', 'hide_empty' => false));
echo '<a class="me-2 mb-2 filter-button" href="/news/">All News</a>';
foreach($cats as $c) {
    $active = $term->slug == $c->slug ? 'active' : '';
    echo '<a class="me-2 mb-2 filter-button ' . $active . '" href="/sector/' . $c->slug . '/">' . $c->name . '</a>';
}
?>
            <div class="row w-100" id="grid">
                <?php
    while (have_posts()) {
        the_post();
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
                    class="news__item col-lg-4 col-md-6 p-0 <?=$catclass?>">
                    <a href="<?=get_the_permalink(get_the_ID())?>">
                        <div class="news__card card--<?=$flashcat?>">
                            <div class="news__image_container">
                                <div
                                    class="news__flash news__flash--<?=$flashcat?>">
                                    <?=$category?>
                                </div>
                                <img class="news__image"
                                    src="<?=$img?>">
                            </div>
                            <div class="news__inner">
                                <h3 class="news__title mb-0">
                                    <?=get_the_title()?>
                                </h3>
                                <div class="news__date">
                                    <?=$the_date?>
                                </div>
                            </div>
                            <!-- <div class="card__link">Read more</div> -->
                        </div>
                    </a>
                </div>
                <?php
    }
?>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
?>