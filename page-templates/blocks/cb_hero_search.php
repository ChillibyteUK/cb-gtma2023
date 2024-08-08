<?php
$img = get_stylesheet_directory_uri() . '/img/search-hero.jpg';
?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="preload" as="image" href="<?=$img?>">
<header class="hero-search" style="background-image:url(<?=$img?>)">
    <div class="hero-search__grid">
        <div class="hero-search__inner">
            <div class="hero-search__title mb-3">Search for Products &amp; Services</div>
            <div class="form">
                <input class="form-control" type="text" id="searchInput" autocomplete="off">
                <button id="go" class="btn-search">
                    <span id="go-text">Search</span>
                    <img id="go-spinner" src="<?=get_stylesheet_directory_uri()?>/images/loading.gif" alt="Loading..." style="display: none;" width=16 height=16>
                </button>
                <input type="hidden" name="source" id="sourceInput">
            </div>
            <div><a class="text-white fw-5" href="/supplier-categories/">View all Categories</a></div>
        </div>
    </div>
</header>
<?php
add_action('wp_footer', function () {
    /*
    ?>
<script>
    <?php
$supp = get_posts(array(
    'post_type' => 'suppliers',
    'numberposts' => -1
));

    $suppliers = array();

    foreach ($supp as $p) {
        $t = strip_crud($p->post_title);
        $suppliers[$t] = $p->post_name;
    }
    ?>
    var slugList = [ <?=json_encode($suppliers)?> ];
</script>
*/
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="<?=get_stylesheet_directory_uri()?>/js/search.js?v=2"></script>
<?php
}, 9999);
?>