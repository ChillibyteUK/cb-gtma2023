<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/wp-load.php");

?>
<style>
img {
    max-width: 300px;
    height: auto;
}
</style>
<?php

$q = new WP_Query(array(
    'post_type' => 'suppliers',
    'posts_per_page' => -1,
));


while ($q->have_posts()) {
    $q->the_post();
    ?>
    <div>
        <a href="<?=get_the_permalink()?>" target="_blank">
            <img src="<?=wp_get_attachment_image_url(get_field('supplier_logo', get_the_ID()), 'full')?>"><br>
            <?=get_the_title()?>
        </a>
    <hr>
    </div>
    <?php
}