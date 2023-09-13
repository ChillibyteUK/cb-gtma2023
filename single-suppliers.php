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

$navitems = array();

?>
<style>
.stickynav {
    background-color: var(--col-blue-400);
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
    position: sticky;
    top: var(--h-top);
    padding: 0.5rem;
    margin-bottom: 1rem;
    z-index: 1000;
}
@media (min-width:992px) {
    .stickynav {
        top: var(--h-top-desktop);
    }
}
.stickynav a {
    font-size: var(--fs-200);
    color: #fff;
    display: inline-block;
}
.stickynav a:not(:last-of-type) {
    border-right: 1px solid white;
    padding-right: 0.5rem;
}

.supplier__featured {
    background-color: var(--col-red-400);
    color: var(--col-light);
    padding: 0.5rem 1rem;
    margin-bottom: 1rem;
}
</style>

    <div class="container-xl">
        <div class="row g-4 pb-4">
            <div class="col-lg-9 supplier__content">
                <?php
                if (get_field('is_featured')) {
                    ?>
                <div class="supplier__featured">
                    FEATURED SUPPLIER
                </div>
                    <?php
                }
                ?>
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
                <div class="stickynav" id="navholder"></div>
                <?php
foreach ($blocks as $block) {
    if ($block['blockName'] == 'acf/cb-supplier-assets') {
        $blockTitle = $block['attrs']['data']['type'];
        $navitems[] = $blockTitle;
        $id = acf_slugify($blockTitle);
        echo '<a id="' . $id . '" class="anchor"></a>';
    }
    echo render_block($block);
}


$category = get_the_terms(get_the_ID(), 'tags');
echo '<a id="products--services" class="anchor"></a>';
$navitems[] = 'Products & Services';
echo '<h2 class="clear">Products &amp; Services</h2><ul class="supplier__tags cols-lg-3">';
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
                        if (get_field('supplier_website')) {
                            ?>
                        <dt><a href="<?=get_field('supplier_website')?>" class="supplier__website"
                                target="_blank">Visit Website</a></dt>
                        <?php
                        }
                        ?>
                        <dt><a href="#contact" class="supplier__contact">Contact Supplier</a></dt>
                    </dl>
                        <?php

                        if (get_field('supplier_socials')) {
                            echo '<div class="supplier__socials">';
                            $socials = get_field('supplier_socials');
                            if ($socials['vimeo_url'] ?? null) {
                                echo '<a href="' . $socials['vimeo_url'] . '" target="_blank"><i class="fa-brands fa-vimeo"></i></a>';
                            }
                            if ($socials['instagram_url'] ?? null) {
                                echo '<a href="' . $socials['instagram_url'] . '" target="_blank"><i class="fa-brands fa-instagram"></i></a>';
                            }
                            if ($socials['pinterest_url'] ?? null) {
                                echo '<a href="' . $socials['pinterest_url'] . '" target="_blank"><i class="fa-brands fa-pinterest"></i></a>';
                            }
                            if ($socials['youtube_url'] ?? null) {
                                echo '<a href="' . $socials['youtube_url'] . '" target="_blank"><i class="fa-brands fa-youtube"></i></a>';
                            }
                            if ($socials['facebook_url'] ?? null) {
                                echo '<a href="' . $socials['facebook_url'] . '" target="_blank"><i class="fa-brands fa-facebook"></i></a>';
                            }
                            if ($socials['twitter_url'] ?? null) {
                                echo '<a href="' . $socials['twitter_url'] . '" target="_blank"><i class="fa-brands fa-twitter"></i></a>';
                            }
                            if ($socials['linkedin_url'] ?? null) {
                                echo '<a href="' . $socials['linkedin_url'] . '" target="_blank"><i class="fa-brands fa-linkedin"></i></a>';
                            }
                            echo '</div>';
                        }
?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
add_action('wp_footer', function() use ($navitems) {
    $j = json_encode($navitems);
    ?>
<script>
const navholder = document.getElementById('navholder');
const navitems = <?=$j?>;

function slugify(str) {
    return str.toLowerCase().replace(/\s+/g, '-').replace(/&+/g, '');
}

for (var i = 0; i < navitems.length; i++) {
    var name = navitems[i];
    var slug = slugify(name);

    // Create <a> element
    var aElement = document.createElement('a');
    aElement.setAttribute('href', '#'+slug);
    aElement.className = 'navbtn';
    aElement.textContent = name;

    // Append the <a> element to the container
    navholder.appendChild(aElement);

    // Add a space for separation
    // if (i < navitems.length - 1) {
    //     var space = document.createTextNode(' ');
    //     navholder.appendChild(space);
    // }
}

</script>
    <?php
});

get_footer();
?>