<?php
$l = get_field('link');

$classes = $block['className'] ?? null;

$background_color = !empty($block['backgroundColor']) ? $block['backgroundColor'] : '';

if ($background_color) {
    $classes .= ' btn-' . $background_color;
}
?>
<a href="<?=$l['url']?>" target="<?=$l['target']?>" class="btn <?=$classes?>"><?=$l['title']?></a>