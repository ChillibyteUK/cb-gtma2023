<?php
$classes = $block['className'] ?? 'mb-5';
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
                <img src="<?=wp_get_attachment_image_url(get_field('logo'),'large')?>" alt="">
            </div>
        </div>
    </div>
</section>