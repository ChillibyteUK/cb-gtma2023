<?php
$class = $block['className'] ?? null ?: '';
$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
$title = get_field('alt_title') ?: get_the_title();
?>
<link rel="preload" as="image" href="<?=$img?>">
    <header class="hero <?=$class?>"
        style="background-image:url(<?=$img?>)">
        <div class="overlay"></div>
        <h1 class="hero__title"><?=$title?></h1>
    </header>