<?php
$class = $block['className'] ?? null ?: '';
$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>
<link rel="preload" as="image" href="<?=$img?>">
<div class="container-xl">
    <header class="hero <?=$class?>"
        style="background-image:url(<?=$img?>)">
        <h1 class="hero__title"><?=get_the_title()?></h1>
    </header>
</div>