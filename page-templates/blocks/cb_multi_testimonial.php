<?php
$classes = $block['className'] ?? 'mb-5';

/**
 * Enqueue Slick only when this block is used
 */
wp_enqueue_style(
    'slick-css',
    'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',
    [],
    '1.8.1'
);

wp_enqueue_style(
    'slick-theme-css',
    'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css',
    ['slick-css'],
    '1.8.1'
);

wp_enqueue_script(
    'slick-js',
    'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
    ['jquery'],
    '1.8.1',
    true
);

$testimonials = get_field('testimonials');
?>

<?php if ($testimonials): ?>
<section class="single_testimonial container-xl my-5 <?php echo esc_attr($classes); ?>">
    <div class="container-xl">

        <div class="multi_testimonials__slider">
            <?php foreach ($testimonials as $testimonial): 
                $content = $testimonial['testimonial_content'] ?? '';
                $attribution = $testimonial['testimonial_attribution'] ?? '';
                $logo_id = $testimonial['logo'] ?? '';
                $alt = $logo_id ? get_post_meta($logo_id, '_wp_attachment_image_alt', true) : '';
            ?>
                <div class="multi_testimonials__slide">
                    <div class="row align-items-center">
                        <div class="col-md-10 order-2 order-md-1">
                            <div class="single_testimonial__content mb-3">
                                <?php echo wp_kses_post($content); ?>
                            </div>

                            <?php if ($attribution): ?>
                                <div class="single_testimonial__attribution">
                                    <?php echo esc_html($attribution); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if ($logo_id): ?>
                            <div class="col-md-2 order-1 order-md-2">
                                <?php echo wp_get_attachment_image($logo_id, 'large', false, [
                                    'alt' => esc_attr($alt),
                                ]); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<?php endif; ?>
<?php
wp_add_inline_script('slick-js', "
    jQuery(function($){
        $('.multi_testimonials__slider').not('.slick-initialized').slick({
            dots: true,
            arrows: false,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 6000,
            speed: 400,
            slidesToShow: 1,
            slidesToScroll: 1,
            adaptiveHeight: true
        });
    });
");
?>