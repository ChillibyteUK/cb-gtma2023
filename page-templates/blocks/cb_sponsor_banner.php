<?php

$sponsor = get_field('supplier');
$until = get_field('display_until') ?: '20380119';
$today = date('Ymd');
if ($until >= $today) {
?>
<section class="sponsor mb-4">
    <div class="container-xl">
        <a href="<?=get_the_permalink($sponsor)?>" class="sponsor__card">
            <div class="sponsor__title">This content is sponsored by <br><span><?=get_the_title($sponsor)?></span>.</div>
            <div class="sponsor__inner">
                <div class="sponsor__words">
                    <?=get_field('sponsor_banner_content',$sponsor)?>
                </div>
                <div class="sponsor__logo">
                    <img src="<?=wp_get_attachment_image_url(get_field('supplier_logo',$sponsor), 'full')?>" alt="">
                </div>
            </div>
        </a>
    </div>
</section>
<?php
}