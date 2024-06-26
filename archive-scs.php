<?php
// not used
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>
<main id="main" class="scs-archive">
    <section class="scs">
        <div class="container-xl">
            <?php
            if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            }
            ?>
            <h1>Supply Chain Solutions</h1>
            <div><?=get_field('scs_intro','options')?></div>
            <?php
            $q = new WP_Query(array(
                'post_type' => 'scs',
                'posts_per_page' => 4
            ));
            $first = true;
            while ($q->have_posts()) {
                $q->the_post();
                if ($first === true) {
                    ?>
                    <h2><?=get_the_title(get_the_ID())?></h2>
                    <div><?php the_content() ?></div>
                    <?php
                    echo do_shortcode('[dearpdf id="' . get_field('dearpdf_id',get_the_ID()) . '"][/dearpdf]');
                    $first = false;
                    echo '<h2>Previous Editions</h2>';
                    echo '<div class="scs__grid py-5">';
                }
                else {
                    $file = get_field('pdf',get_the_ID());
                    $img = wp_get_attachment_image_url( $file, 'large'); // , "", ['class'=>'scs__image',] ) ?: '<img src="/wp-content/themes/cb-gtma2023/img/missing-image.png" class="dl_card__image">';
                    ?>
                    <a class="scs__card" href="<?=get_the_permalink()?>">
                        <img src="<?=$img?>" class="scs__cover">
                        <div class="scs__title"><?=get_the_title()?></div>
                    </a>
                    <?php
                }
            }
            echo '</div>'; // end scs__grid
            ?>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
?>