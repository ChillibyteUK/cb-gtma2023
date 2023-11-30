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
                    <div class="sidebar__cta">
                        <div class="h5">Upcoming Events</div>
                        <?php
                                $q = new WP_Query(array(
                                    'post_type' => 'event',
                                    'posts_per_page' => -1,
                                    'order' => 'ASC',
                                    'post__not_in' => array( get_the_ID() ),
                                    'orderby' => 'meta_value',
                                    'meta_key' => 'start_date',
                                    'meta_type' => 'DATETIME',
                                    'meta_query' => array(
                                        array(
                                            'key' => 'start_date',
                                            'value' => date('Ymd'),
                                            'type' => 'DATE',
                                            'compare' => '>='
                                        )
                                    )
                                ));
                            while ($q->have_posts()) {
                                $q->the_post();
                                echo '<li><a href="'. get_the_permalink() . '">' . get_the_title() . '</a></li>';
                            }
                        ?>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
?>