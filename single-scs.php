<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$img = get_the_post_thumbnail_url(get_the_ID(),'full');

$file = get_field('pdf',get_the_ID());
$fs = filesize( get_attached_file( $file ) );

$fname = "GTMA Supply Chain Solutions - " . get_the_title() . ".pdf";

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
        <h1><?=get_the_title()?></h1>
        <?php the_content(); ?>
        <?=do_shortcode('[dearpdf id="' . get_field('dearpdf_id') . '"][/dearpdf]')?>
        <div class="my-5 text-center">
            <a href="<?=get_the_permalink(get_the_ID())?>" download="<?=$fname?>" class="btn btn-blue">Download PDF (<?=formatBytes($fs)?>)</a>
        </div>
    </div>
</main>
<?php
get_footer();