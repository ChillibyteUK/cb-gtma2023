<?php
$classes = $block['className'] ?? 'mb-5';
$alt = get_post_meta(get_field('logo'), '_wp_attachment_image_alt', true); // Get alt text
?>
<section class="single_testimonial <?=$classes?>">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-10 order-2 order-md-1">
                <div class="single_testimonial__content mb-3">
                    <?=get_field('testimonial_content')?>
                </div>
                <div class="single_testimonial__attribution">
                    <?=get_field('testimonial_attribution')?>
                </div>
            </div>
            <div class="col-md-2 order-1 order-md-2">
                <img src="<?=wp_get_attachment_image_url(get_field('logo'),'large')?>" alt="<?php echo $alt; ?>">
            </div>
        </div>
    </div>
</section>