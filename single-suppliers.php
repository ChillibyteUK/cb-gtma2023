<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$img = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>
<main id="main" class="supplier">
    <?php
    $content = get_the_content();
$blocks = parse_blocks($content);
$sidebar = array();
$after;
?>
    <div class="container-xl">
        <div class="row g-4 pb-4">
            <div class="col-lg-9 supplier__content">
                <div class="row">
                    <div class="col-md-8 order-2 order-md-1">
                        <h1 class="supplier__title">
                            <?=get_the_title()?>
                        </h1>
                    </div>
                    <div class="col-md-4 order-1 order-md-2">
                        <img src="<?=wp_get_attachment_image_url(get_field('supplier_logo'), 'full')?>"
                            alt="">
                    </div>
                </div>
                <?php
foreach ($blocks as $block) {
    echo render_block($block);
}

$category = get_the_terms(get_the_ID(), 'tags');
echo '<h2>Products &amp; Services</h2><ul class="supplier__tags cols-lg-3">';
foreach ($category as $c) {
    echo '<li>' . $c->name . '</li>';
}
echo '</ul>';
?>

            </div>
            <div class="col-lg-3">
                <div class="supplier__sidebar">
                    <h3>Contact Details</h3>
                    <dl>
                        <?php
                        if (get_field('contact_phone')) {
                            ?>
                        <dt>Telephone</dt>
                        <dd><?=get_field('contact_phone')?>
                        </dd>
                        <?php
                            if (get_field('contact_phone_2')) {
                                ?>
                        <dd><?=get_field('contact_phone_2')?>
                        </dd>
                        <?php
                            }
                        }
?>
                        <dt>Address</dt>
                        <dd><?=get_field('address')?>
                        </dd>
                        <dt>Contacts</dt>
                        <?php
while(have_rows('contacts')) {
    the_row();
    echo '<dd>' . get_sub_field('contact_name');
    if (get_sub_field('contact_role')) {
        echo ' - ' . get_sub_field('contact_role');
    }
    echo '</dd>';
}
?>
                        <dt>Website</dt>
                        <dd><?=get_field('supplier_website')?>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
?>