<?php
$l = get_field('link');

// var_dump($block);

$background_color = !empty($block['backgroundColor']) ? $block['backgroundColor'] : '';

$classes = '';

if ($background_color) {
    $classes .= 'btn-' . $background_color . ' ';
}
?>
<a href="<?=$l['url']?>" target="<?=$l['target']?>" class="btn <?=$classes?>"><?=$l['title']?></a>