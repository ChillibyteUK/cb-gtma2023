<?php
// not used
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>
<main id="main" class="scs-archive">
    <section class="scs">
        <div class="container-xl">
            <h1>Supply Chain Solutions</h1>
            <?php
            $q = new WP_Query(array(
                'post_type' => 'scs',
                'posts_per_page' => -1
            ));
            while ($q->have_posts()) {
                $q->the_post();
                $file = get_field('pdf',get_the_ID());
                echo $file;
                $img = wp_get_attachment_image_url( $file, 'medium'); // , "", ['class'=>'scs__image',] ) ?: '<img src="/wp-content/themes/cb-gtma2023/img/missing-image.png" class="dl_card__image">';
                echo $img;
                echo get_the_title();
            }
            ?>
        </div>
    </section>
</main>
<?php
get_footer();
?>