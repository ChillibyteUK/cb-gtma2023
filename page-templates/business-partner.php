<?php
/*
Template Name: Business Parter
*/
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>
<main id="main" class="partner">
    <div class="container-xl">
        <h1><?=get_the_title()?></h1>
        <div class="row">
            <div class="col-md-8">
                <?php
                the_content();
?>
            </div>
            <div class="col-md-4">
                <div class="partner__sidebar">
                    <h3>GTMA Business Partners</h3>
                    <?php
                $me = get_the_ID();
$parent = wp_get_post_parent_id($me);
$sibs = new WP_Query(array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $parent,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
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