<?php
$bg = get_field('has_bg') ? 'services-bg' : '';
?>
<section class="services <?=$bg?>">
    <div class="container-xl">
        <?php
if (get_field('show_preamble')) {
    ?>
        <h2 class="text-blue mb-4">Sectors We Cover</h2>
        <div class="services__preamble">
            <div class="services__intro">
                GTMA members supply into some of the UK’s most demanding industries. Whether you’re sourcing precision components for aerospace programmes, tooling for automotive production, or specialist services for the medical or energy sectors, our directory connects you directly with vetted UK suppliers across 10 key industries.
            </div>
            <div class="services__contact">
                <p>Telephone us: <span
                        class="fw-bold"><?=do_shortcode('[contact_phone]')?></span>
                </p>
                <p>or email us at: <span
                        class="fw-bold"><?=do_shortcode('[contact_email]')?></span>
                </p>
            </div>
        </div>
        <?php
}
?>
        <div class="services__grid">
            <?php
            $terms = get_terms(array(
                'taxonomy'   => 'sectors',
                'hide_empty' => false,
                'orderby'    => 'name',
                'order'      => 'ASC',
            ));

            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {

                    // If using ACF image field on the term
                    $image = get_field('image', 'sectors_' . $term->term_id);
                    $img   = is_array($image) ? $image['url'] : '';
                    $alt   = is_array($image) && !empty($image['alt']) ? $image['alt'] : $term->name;

                    // Optional ACF tagline field on term
                    $tagline = get_field('tagline', 'sectors_' . $term->term_id);
                    ?>
                    
                    <a class="services__card" href="/sectors/<?=$term->slug?>/">
                        <?php if ($img) : ?>
                            <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($alt); ?>">
                        <?php endif; ?>

                        <div class="services__title fs-5">
                            <?php echo esc_html($term->name); ?>

                            <?php if ($tagline) : ?>
                                <span><?php echo esc_html($tagline); ?></span>
                            <?php endif; ?>
                        </div>
                    </a>

                    <?php
                }
            }
            ?>
        </div>
    </div>
</section>