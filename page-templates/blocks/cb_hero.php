<?php
$class = $block['className'] ?? null ?: '';
$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
$title = get_field('alt_title') ?: get_the_title();
?>
<link rel="preload" as="image" href="<?=$img?>">
<div class="container-xl mb-4">
    <header class="hero <?=$class?>"
        style="background-image:url(<?=$img?>)">
        <h1 class="hero__title"><?=$title?></h1>
    </header>
</div>