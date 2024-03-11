<?php
/*
Template Name: Full-hero Sponsor Sidebar Page
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
    <?php
$hasHero = false;
foreach ($blocks as $block) {
    // echo $block['blockName'];
    if ($block['blockName'] == 'acf/cb-hero') {
        $hasHero = true;
        echo render_block($block);
    }
    if ($block['blockName'] == 'acf/cb-sector-subnav') {
        echo render_block($block);
    }
}
?>
    <div class="container-xl">
        <div class="row">
            <div class="col-md-9">
                <?php
if ($hasHero === false) {
    echo '<h1>' . get_the_title() . '</h1>';
}

$banner = array();

foreach ($blocks as $block) {
    if ($block['blockName'] == 'acf/cb-hero' || $block['blockName'] == 'acf/cb-sector-subnav') {
        continue;
    } elseif ($block['blockName'] == 'acf/cb-sponsor-banner') {
        if ($block['attrs']['data']['aspect'] == 'Banner') {
            echo render_block($block);
        } elseif ($block['attrs']['data']['aspect'] == 'Skyscraper') {
            $banner = $block;
        }
    } else {
        // echo render_block($block);
        echo apply_filters('the_content', render_block($block));
    }
}

// echo apply_filters('the_content', get_the_content());
?>
            </div>
            <div class="col-md-3">
                <div class="sidebar pb-4">
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
get_footer();
?>