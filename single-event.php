<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>
<main id="main" class="event">
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
            <div class="col-lg-9 order-2 event__content">
                <article>
                    <h1 class="event__title"><?=get_the_title()?></h1>
                    <div class="event__date">
                    <?php

                    $s = datetime::createfromformat('Ymd',get_field('start_date'));
                    $start = date_format($s, 'jS F Y');
                    $start = explode(' ', $start);

                    $ee = get_field('end_date') ?? null;
                    $end = array();

                    if ($ee != '') {
                        $e = datetime::createfromformat('Ymd',get_field('end_date'));
                        $end = date_format($e, 'jS F Y');
                        $end = explode(' ', $end);
                    }

                    $dateString = '';

                    if (array_key_exists(1,$end)) {
                        if ($start[2] != $end[2]) {
                            $dateString = $start[0] . ' ' . $start[1] . ', ' . $start[2] . ' - ' . $end[0] . ' ' . $end[1] . ', ' . $end[2];
                        }
                        elseif ($start[1] == $end[1]) {
                            $dateString = $start[0] . ' - ' . $end[0] . ' ' . $end[1] . ', ' . $end[2];
                        }
                        else {
                            $dateString = $start[0] . ' ' . $start[1] . ' - ' . $end[0] . ' ' . $end[1] . ', ' . $end[2];
                        }
                    }
                    else {
                        $dateString = $start[0] . ' ' . $start[1] . ', ' . $start[2];
                    }
            
                    echo $dateString;
            
                    ?>
                    </div>
                    <img src="<?=$img?>" alt="" class="event__image">
                    <?php
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
    </div>
</main>
<?php
get_footer();
?>