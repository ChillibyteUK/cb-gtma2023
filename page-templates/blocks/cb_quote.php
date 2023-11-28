<?php
$classes = $block['className'] ?? 'mb-4';
?>
<section class="quote <?=$classes?>">
    <?=get_field('quote')?>
    <?php
    if (get_field('attr')) {
        ?>
    <div class="quote__attr">
        <?=get_field('attr')?>
    </div>
        <?php
    }
    ?>
</section>