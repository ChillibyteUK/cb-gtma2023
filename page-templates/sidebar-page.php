<?php
/*
Template Name: Sidebar with Siblings (BP)
*/
// Exit if accessed directly.
defined('ABSPATH') || exit;

add_action('wp_head', function () {
    ?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php
});

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
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
        ?>
        <div class="row">
            <div class="col-md-9">
                <h1><?=get_the_title()?></h1>
                <?php
if ($class == 'partner') {
    ?>
                <img class="partner__logo mt-4 mb-5"
                    src="<?=get_the_post_thumbnail_url(get_the_ID(), 'large')?>">
                <?php
}
                the_content();
?>
            </div>
            <div class="col-md-3">
                <div class="sidebar pb-4">
                    <div class="sidebar__blue mb-2">
                        <div class="h5"><?=get_field('sidebar_title')?></div>
                        <div class="sidebar__inner">
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
                    <div class="sidebar__search mb-2">
                        <div class="h5 mb-3">Search Products & Services</div>
                        <div class="sidebar__inner">
                            <div class="form">
                                <input class="form-control" type="text" id="searchInput" autocomplete="off">
                                <button id="go" class="btn-search"></button>
                                <input type="hidden" name="source" id="sourceInput">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
add_action('wp_footer', function () {
    ?>
<script>
    <?php
$supp = get_posts(array(
    'post_type' => 'suppliers',
    'numberposts' => -1
));

    $suppliers = array();

    foreach ($supp as $p) {
        $t = strip_crud($p->post_title);
        $suppliers[$t] = $p->post_name;
    }
    ?>
    var slugList = [ <?=json_encode($suppliers)?> ];
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="<?=get_stylesheet_directory_uri()?>/js/search.js?v=5"></script>
<?php
}, 9999);

get_footer();
?>