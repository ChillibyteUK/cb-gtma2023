<?php
/*
Template Name: Sidebar with Siblings
*/
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

$me = get_the_ID();
$parent = wp_get_post_parent_id($me);

$business = get_page_by_path('business-partners');
$services = get_page_by_path('services');

$class = '';
if ($parent == $business->ID) {
    $class = 'partner';
}
if ($parent == $services->ID) {
    $class = 'service';
}

?>
<main id="main" class="<?=$class?>">
    <div class="container-xl">
        <h1><?=get_the_title()?></h1>
        <div class="row">
            <div class="col-md-8">
                <?php
if ($class == 'partner') {
    ?>
                <img class="partner__logo"
                    src="<?=get_the_post_thumbnail_url(get_the_ID(), 'large')?>">
                <?php
}
                the_content();
?>
            </div>
            <div class="col-md-4">
                <div class="partner__sidebar">
                    <h3><?=get_field('sidebar_title')?>
                    </h3>
                    <?php
$sibs = new WP_Query(array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $parent,
    'order'          => 'ASC',
    'orderby'        => 'title'
));
if ($sibs->have_posts()) {
    echo '<ul>';
    while ($sibs->have_posts()) {
        $sibs->the_post();
        $active = get_the_ID() == $me ? 'active' : '';
        ?>
                    <li><a class="<?=$active?>"
                            href="<?=get_the_permalink()?>"><?=get_the_title()?></a>
                    </li>
                    <?php
    }
    echo '</ul>';
}
wp_reset_postdata();
?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
?>