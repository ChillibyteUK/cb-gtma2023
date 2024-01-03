<?php

if (get_field('range') == 'past') {
    $title = 'Past Events';
    $link_title = 'Upcoming Events';
    $link = '/events/';
    $order = 'DESC';
    $meta_query = array(
        array(
            'key' => 'start_date',
            'value' => date('Ymd'),
            'type' => 'DATE',
            'compare' => '<'
        )
    );
}
else {
    $title = 'Upcoming Events';
    $link_title = 'Past Events';
    $link = '/past-events/';
    $order = 'ASC';
    $meta_query = array(
        array(
            'key' => 'start_date',
            'value' => date('Ymd'),
            'type' => 'DATE',
            'compare' => '>='
        )
    );
}

?>
<section class="suppliers">
    <div class="container-xl">
        <a href="<?=$link?>" class="btn btn-primary btn-sm mb-4"><?=$link_title?></a>
        <?php

        $q = new WP_Query(array(
            'post_type' => 'event',
            'posts_per_page' => -1,
            'order' => $order,
            'orderby' => 'meta_value',
            'meta_key' => 'start_date',
            'meta_type' => 'DATETIME',
            'meta_query' => $meta_query
        ));


        $curr_month = '';

while ($q->have_posts()) {
    $q->the_post();

    $s = datetime::createfromformat('Ymd',get_field('start_date',get_the_ID()));
    $start = date_format($s, 'jS F Y');
    $start = explode(' ', $start);

    $month = $start[1] .  ' ' . $start[2];
    if ($curr_month != $month) {
        echo '<h2 class="h3">' . $month . '</h2>';
        $curr_month = $month;
    }

    $ee = get_field('end_date',get_the_ID()) ?? null;
    $end = array();

    if ($ee != '') {
        $e = datetime::createfromformat('Ymd',get_field('end_date',get_the_ID()));
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
    ?>
<a class="event-archive__card" href="<?=get_the_permalink()?>">
    <div>
        <h3 class="fs-400 fw-bold"><?=get_the_title()?></h3>
        <div class="event-archive__date"><?=$dateString?></div>
    </div>
    <div>
        <?php
        if (get_field('event_type',get_the_ID()) == 'GTMA Event') {
            ?>
        <div class="event-archive__gtma">
            GTMA Event <i class="fa-solid fa-star"></i>
        </div>
            <?php
        }
        ?>
    </div>
</a>
    <?php
}
            ?>
    </div>
</section>