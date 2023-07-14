<?php
$img = '';
?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="preload" as="image" href="<?=$img?>">
<header class="hero-search" style="background-image:url(<?=$img?>)">
    <div class="hero-search__grid">
        <div class="hero-search__inner">
            <div class="hero-search__title mb-3">Search for Products &amp; Services</div>
            <div class="form">
                <input class="form-control" type="text" id="searchInput" autocomplete="off">
                <button id="go" class="btn-search">Search</button>
                <input type="hidden" name="source" id="sourceInput">
            </div>
            <div>Will search for: <span id="query"></span></div>
        </div>
    </div>
</header>
<?php
add_action('wp_footer', function () {
    ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="<?=get_stylesheet_directory_uri()?>/js/search.js"></script>
<?php
});
?>