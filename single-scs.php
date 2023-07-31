<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$img = get_the_post_thumbnail_url(get_the_ID(),'full');
?>
<main id="main" class="scs-single">
    <section class="breadcrumbs container-xl">
    <?php
    if (function_exists('yoast_breadcrumb')) {
        yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
    }
    ?>
    </section>
    <div class="container-xl">
        <?=do_shortcode('[dearpdf id="303"][/dearpdf]')?>

        Download
        <?php

$file = get_field('pdf',get_the_ID());
$fs = filesize( get_attached_file( $file ) );

echo $fs;



        ?>
    </div>
</main>
<?php
get_footer();