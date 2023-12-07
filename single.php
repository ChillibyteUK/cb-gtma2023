<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$img = get_the_post_thumbnail_url(get_the_ID(), 'full') ?? null;
?>
<main id="main" class="blog">
    <?php
    $content = get_the_content();
$blocks = parse_blocks($content);
$sidebar = array();
$after;
?>
    <section class="breadcrumbs container-xl">
        <?php
if (function_exists('yoast_breadcrumb')) {
    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
}
?>
    </section>
    <div class="container-xl">
        <div class="row g-4 pb-4">
            <div class="col-lg-9 order-2 blog__content">
                <article>
                    <h1 class="blog__title"><?=get_the_title()?></h1>
                    <?php
                    if ($img) {
                        ?>
                    <img src="<?=$img?>" alt="" class="blog__image">
                        <?php
                    }
                    
        $count = estimate_reading_time_in_minutes(get_the_content(), 200, true, true);
echo $count;

foreach ($blocks as $block) {
    if ($block['blockName'] == 'core/heading') {
        if (!array_key_exists('level', $block['attrs'])) {
            $heading = strip_tags($block['innerHTML']);
            $id = acf_slugify($heading);
            echo '<a id="' . $id . '" class="anchor"></a>';
            $sidebar[$heading] = $id;
        }
    }
    echo render_block($block);
}
?>
                </article>
            </div>
            <div class="col-lg-3 order-1">
                <aside class="sidebar">
                    <?php
    if ($sidebar) {
        ?>
                    <div class="quicklinks">
                        <div class="h5 d-none d-lg-block">Quick Links</div>
                        <div class="h5 d-lg-none" data-bs-toggle="collapse" href="#links" role="button">Quick Links
                        </div>
                        <div class="collapse d-lg-block" id="links">
                            <?php
                foreach ($sidebar as $heading => $id) {
                    ?>
                            <li><a
                                    href="#<?=$id?>"><?=$heading?></a>
                            </li>
                            <?php
                }
        ?>
                        </div>
                    </div>
                    <?php
    }
?>
                    <div class="sidebar__cta">
                        <div class="h5">Something here about joining GTMA?</div>
                        <p>Not only is it a good spot to upsell, it'll fill in this space when there are no
                            quicklinks/headings</p>
                    </div>
                </aside>
            </div>
        </div>
        <section class="related pb-5">
            <h3>Related News</h3>
            <div class="row g-4">
                <?php
        $cats = get_the_category();
$ids = wp_list_pluck($cats, 'term_id');
$r = new WP_Query(array(
    'category__in' => $ids,
    'posts_per_page' => 4,
    'post__not_in' => array(get_the_ID())
));
while ($r->have_posts()) {
    $r->the_post();
    $img = get_the_post_thumbnail_url(get_the_ID(), 'large') ?? get_stylesheet_directory_uri() . '/img/default-blog.png';
    ?>
                <div class="col-md-6 col-xl-3">
                    <a class="blog_card"
                        href="<?=get_the_permalink()?>">
                        <img src="<?=$img?>"
                            alt="" class="blog_card__image">
                        <div class="blog_card__content">
                            <h3 class="blog_card__title">
                                <?=get_the_title()?>
                            </h3>
                        </div>
                    </a>
                </div>
                <?php
}
?>
            </div>
        </section>
    </div>
</main>
<?php
get_footer();
?>