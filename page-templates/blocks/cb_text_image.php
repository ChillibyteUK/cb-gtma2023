<?php
$splitText = 'col-md-6';
$splitImage = 'col-md-6';

if (get_field('split') == '6040') {
    $splitText = 'col-md-8';
    $splitImage = 'col-md-4';
}
if (get_field('split') == '7030') {
    $splitText = 'col-md-10';
    $splitImage = 'col-md-2';
}

$orderText = 'order-2 order-md-1';
$orderImage = 'order-1 order-md-2';

if (get_field('order') == 'image-text') {
    $orderText = 'order-2 order-md-2';
    $orderImage = 'order-1 order-md-1';
}

$class = $block['className'] ?? null;
?>
<section class="text_image <?=$class?>">
    <div class="container-xl py-4">
        <?php if (get_field('title')) {
            ?>
        <div class="d-lg-none"><h2><?=get_field('title')?></h2></div>
            <?php
        }
        ?>
        <div class="row align-items-center g-4">
            <div class="<?=$splitText?> <?=$orderText?>">
                <?php if (get_field('title')) {
                    ?>
                    <h2 class="d-none d-lg-block"><?=get_field('title')?></h2>
                    <?php
                }
                ?>
                <div><?=get_field('content')?></div>
            </div>
            <div class="<?=$splitImage?> <?=$orderImage?> text-center">
                <?=wp_get_attachment_image(get_field('image'), 'large', null, array('class' => 'text_image__image'))?>
            </div>
        </div>
    </div>
</section>