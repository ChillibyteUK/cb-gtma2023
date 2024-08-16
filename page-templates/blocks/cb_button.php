<?php
$l = get_field('link');

// var_dump($block);

$background_color = !empty($block['backgroundColor']) ? $block['backgroundColor'] : '';
$text_color = !empty($block['textColor']) ? $block['textColor'] : '';

$classes = '';

if ($background_color) {
    $classes .= 'bg-' . $background_color . ' ';
}
if ($text_color) {
    $classes .= 'text-' . $text_color . ' ';
}
?>
<a href="<?=$l['url']?>" target="<?=$l['target']?>" class="btn <?=$classes?>"><?=$l['title']?></a>