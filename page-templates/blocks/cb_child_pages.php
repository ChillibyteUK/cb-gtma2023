<!-- children -->
<section class="child_pages py-4 mb-4">
    <div class="container-xl">
        <?php
        if (get_field('page_children__title')) {
            echo '<h2>' . get_field('page_children__title') . '</h2>';
        }
        ?>
        <div class="row g-4 justify-content-center">
<?php
$children = new WP_Query( array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => get_the_ID(),
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
));

if ( $children->have_posts() ) {
    while ( $children->have_posts() ) {
        $children->the_post();
        ?>
        <div class="col-md-4 col-xl-3">
            <a class="child_pages__card" href="<?=get_the_permalink()?>"><?=get_the_title()?></a>
        </div>
        <?php
    }
}

wp_reset_postdata();
?>
    </div>
</section>