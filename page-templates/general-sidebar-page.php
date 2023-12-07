<?php
/*
Template Name: General Sidebar Page
*/
// Exit if accessed directly.
defined('ABSPATH') || exit;

$class = $block['className'] ?? null;

get_header();
global $wp;
$current_url = home_url(add_query_arg(array(), $wp->request)) . '/';
$content = get_the_content();
$blocks = parse_blocks($content);
?>
<main id="main" class="<?=$class?>">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-9">
                <?php
                $hasHero = false;
foreach ($blocks as $block) {
    // echo $block['blockName'];
    if ($block['blockName'] == 'acf/cb-hero') {
        $hasHero = true;
    }
}
if ($hasHero === false) {
    echo '<h1>' . get_the_title() . '</h1>';
}
?>
                <?=apply_filters('the_content', get_the_content())?>
            </div>
            <div class="col-md-3">
                <div class="sidebar pb-4">
                    <div class="sidebar__red mb-2">
                        <div class="h5">Membership</div>
                        <div class="sidebar__inner">
                            <?php
            // $parent = 362;
            $parent = get_page_by_path('membership');
$sibs = new WP_Query(array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $parent->ID,
    'order'          => 'ASC',
    'orderby'        => 'title'
));
$active = get_the_permalink($parent) == $current_url ? 'active' : '';
?>
                            <ul>
                                <li><a class="<?=$active?>"
                                        href="<?=get_the_permalink($parent)?>"><?=get_the_title($parent)?></a>
                                </li>
                                <?php
    while($sibs->have_posts()) {
        $sibs->the_post();
        $active = get_the_permalink() == $current_url ? 'active' : '';
        ?>
                                <li><a class="<?=$active?>"
                                        href="<?=get_the_permalink()?>"><?=get_the_title()?></a>
                                </li>
                                <?php
    }
?>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar__blue mb-2">
                        <div class="h5">Member Services</div>
                        <div class="sidebar__inner">
                            <p class="mb-2">Here are some of the services available to members</p>
                            <?php
                            $parent = 134;
$sibs = new WP_Query(array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $parent,
    'order'          => 'ASC',
    'orderby'        => 'title'
));
?>
                            <ul>
                                <?php
    while($sibs->have_posts()) {
        $sibs->the_post();
        $active = get_the_permalink() == $current_url ? 'active' : '';
        ?>
                                <li><a class="<?=$active?>"
                                        href="<?=get_the_permalink()?>"><?=get_the_title()?></a>
                                </li>
                                <?php
    }
?>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar__search">
                        <div class="h5 mb-3">Search Suppliers</div>
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
<script src="<?=get_stylesheet_directory_uri()?>/js/search.js"></script>
<?php
}, 9999);
get_footer();
?>