<?php
$sponsor = get_field('supplier');
$until = get_field('display_until') ?: '20380119';
$today = date('Ymd');
if ($until >= $today) {
?>
<section class="sponsor mb-4">
    <div class="container-xl">
        <a href="<?=get_the_permalink($sponsor)?>" class="sponsor__card">
            <div class="sponsor__title">This content is sponsored by <strong><?=get_the_title($sponsor)?></strong>.</div>
            <div class="sponsor__inner">
                <div class="sponsor__words">
                    <p class="fs-200"><?=wp_trim_words(get_the_content(null, false, $sponsor),30)?></p>
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