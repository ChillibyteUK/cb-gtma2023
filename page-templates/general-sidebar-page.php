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
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<main id="main" class="<?=$class?>">
    <div class="container-xl">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
        ?>
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

$banner = array();

foreach ($blocks as $block) {
    if ($block['blockName'] == 'acf/cb-sponsor-banner') {
        if ($block['attrs']['data']['aspect'] == 'Banner') {
            echo render_block($block);
        } elseif ($block['attrs']['data']['aspect'] == 'Skyscraper') {
            $banner = $block;
        }
    } else {
        echo apply_filters('the_content', render_block($block));
        // echo render_block($block);
    }
}

// echo apply_filters('the_content', get_the_content());
?>
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
                        <div class="h5 mb-3">Search Products & Services</div>
                        <div class="sidebar__inner">
                            <div class="form">
                                <input class="form-control" type="text" id="searchInput" autocomplete="off">
                                <button id="go" class="btn-search"></button>
                                <input type="hidden" name="source" id="sourceInput">
                            </div>
                        </div>
                    </div>
                    <?php
if ($banner ?? null) {
    echo render_block($banner);
}
?>
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
<script src="<?=get_stylesheet_directory_uri()?>/js/search.js?v=2"></script>
<?php
}, 9999);
get_footer();
?>