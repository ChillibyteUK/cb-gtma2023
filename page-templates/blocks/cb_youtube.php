<?php
$url = get_field('youtube_url');
?>
<section class="youtube py-5">
    <div class="ratio ratio-16x9">
        <iframe class="embed-responsive-item" src="<?=$url?>" allowscriptaccess="always" allow="autoplay;fullscreen"></iframe>
    </div>
</section>