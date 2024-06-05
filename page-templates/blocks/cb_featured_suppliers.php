<section class="featured_suppliers py-5">
    <div class="container-xl">
        <h2 class="text-center">Featured Suppliers</h2>
        <div class="swiper featured_suppliers__slider ">
            <div class="swiper-wrapper">
        <?php
$q = new WP_Query(array(
    'post_type' => 'suppliers',
    'posts_per_page' => 10,
    'meta_query' => array(
        array(
            'key' => 'profile',
            'value' => 'Featured',
            'compare' => '='
        ),
    ),
    'orderby' => 'rand',
));

while ($q->have_posts()) {
    $q->the_post();
    ?>
    <div class="swiper-slide featured_suppliers__slide">
        <a href="<?=get_the_permalink($q->ID)?>" class="featured_suppliers__card">
            <?=wp_get_attachment_image(get_field('supplier_logo',get_the_ID()), 'full', false, array('class'=>'featured_suppliers__logo'))?>
            <div class="featured_suppliers__title"><?=get_the_title()?></div>
        </a>
    </div>
    <?php
}
        ?>
            </div>
            <div class="swiper-pagination swiper-pagination-suppliers"></div>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function () {
    ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function setEqualHeight(slider) {
            console.log('hello');
            let maxHeight = 0;
            const slides = document.querySelectorAll(slider);

            // Remove existing heights to recalculate
            slides.forEach(slide => {
                slide.style.height = 'auto';
            });

            // Find the maximum height
            slides.forEach(slide => {
                if (slide.offsetHeight > maxHeight) {
                    maxHeight = slide.offsetHeight;
                }
            });

            // Set all slides to the maximum height
            slides.forEach(slide => {
                slide.style.height = `${maxHeight}px`;
            });
        }
        var logoSlider = new Swiper('.featured_suppliers__slider', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination-suppliers',
                dynamicBullets: true,
                clickable: true,
            },
            slidesPerView: 1,
            slidesPerGroup: 1,
            spaceBetween: 18,
            breakpoints: {
                576: {
                    slidesPerView: 2,
                    spaceBetween: 18,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 18,
                },
                992: {
                    slidesPerView: 4,
                    spaceBetween: 18,
                },
                1200: {
                    slidesPerView: 5,
                    spaceBetween: 18,
                }
            },
            on: {
                init: function() {
                    setEqualHeight('.featured_suppliers__slide');
                },
                resize: function() {
                    setEqualHeight('.featured_suppliers__slide');
                }
            }
        });
        window.addEventListener('load', setEqualHeight('.featured_suppliers__slide'));

    });
</script>
<?php
}, 9999);
