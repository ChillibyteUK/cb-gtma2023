<?php
$class = $block['className'] ?? null;
?>
<section class="video <?=$class?>">
    <div class="container-xl py-4">
        <?php

        if (get_field('provider') == 'YouTube') {
            ?>
        <div class="ratio ratio-16x9 mx-auto">
            <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/<?=get_field('video_id')?>?autoplay=1&amp;modestbranding=1&amp;showinfo=0";" id="videoPlayerVim" allowscriptaccess="always" allow="autoplay;fullscreen"></iframe>
        </div>
            <?php
        }

        if (get_field('provider') == 'Vimeo') {
            ?>
        <div class="ratio ratio-16x9 mx-auto">
            <iframe src="https://player.vimeo.com/video/<?=get_field('video_id')?>?byline=0&portrait=0&app_id=58479" allow="autoplay; fullscreen; picture-in-picture""></iframe>
        </div>
        <script src="https://player.vimeo.com/api/player.js"></script>
            <?php
        }
        ?>
    </div>
</section>