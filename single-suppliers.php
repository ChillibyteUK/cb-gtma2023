<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

add_action('wp_head', function () {
    ?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php
});


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
    <div class="container-xl">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
        ?>
        <div class="row g-4 pb-4">
            <div class="col-lg-9 supplier__content">
                <?php
                if (get_field('profile') == 'Featured') {
                    ?>
                <div class="supplier__featured">
                    FEATURED SUPPLIER <i class="fa-solid fa-star"></i>
                </div>
                <?php
                }
?>
                <div class="row mb-4">
                    <div class="col-md-8 order-2 order-md-1">
                        <h1 class="supplier__title">
                            <?=strip_crud(get_the_title())?>
                        </h1>
                        <?php
                    if (get_field('strapline')) {
                        ?>
                        <p><?=get_field('strapline')?>
                        </p>
                        <?php
                    }
                    $alt_text = get_post_meta(get_field('supplier_logo', get_the_ID()), '_wp_attachment_image_alt', true) ?: strip_crud(get_the_title());
?>
                    </div>
                    <div class="col-md-4 order-1 order-md-2 d-flex justify-content-center align-items-center">
                        <?php
                        if (get_field('supplier_logo') ?? null) {
                            ?>
                        <img src="<?=wp_get_attachment_image_url(get_field('supplier_logo'), 'full')?>"
                            alt="<?=$alt_text?>"
                            class="supplier__logo">
                        <?php
                        }
?>
                    </div>
                </div>
                <div class="stickynav" id="navholder"></div>
                <?php
                if (get_field('profile') == 'Basic') {
                    echo apply_filters('the_content', get_field('basic_profile'));
                    ?>
                <div class="mb-4 bg-grey-200">
                    <h2 class="fs-400 px-4 pt-4 pb-3">Supplier Specialities</h2>
                    <div class="bg-grey-100 p-4">
                        <ul class="supplier__tags cols-lg-3">
                            <?php
$terms = wp_get_post_terms(get_the_ID(), 'supplier-types');
                    foreach ($terms as $term) {
                        // Output the term name and link (if needed)
                        echo '<li><a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a></li>';
                    }
                    ?>
                        </ul>
                    </div>
                </div>
                <?php
                } else {
                    foreach ($blocks as $block) {
                        if ($block['blockName'] == 'acf/cb-supplier-assets') {
                            continue;
                        }
                        echo render_block($block);
                    }
                    ?>
                <div class="accordion mb-4" id="assets">
                    <?php
foreach ($blocks as $block) {
    if ($block['blockName'] == 'acf/cb-supplier-assets') {
        $blockTitle = $block['attrs']['data']['type'];
        if ($blockTitle == 'Accreditations') {
            $blockTitle = 'Accreditation Certificates';
        }
        if ($blockTitle == 'Accreditations (TAX)') {
            $blockTitle = 'Accreditations';
        }
        $navitems[] = $blockTitle;
        // $id = preg_replace('/\\/','-',$blockTitle);
        $id = cbslugify($blockTitle);
        echo '<a id="' . $id . '" class="anchor"></a>'
        ?>
                    <div class="accordion-item" id="a_<?=$id?>"
                        class="anchor">
                        <h2 class="accordion-header" id="h_<?=$id?>">
                            <button class="accordion-button collapsed"
                                id="b_<?=$id?>" type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#c_<?=$id?>"><?=$blockTitle?></button>
                        </h2>
                        <div class="accordion-collapse collapse"
                            id="c_<?=$id?>" data-bs-parent="#assets">
                            <div><?=render_block($block)?></div>
                        </div>
                    </div>
                    <?php
    }
}

                    $acc = get_the_terms(get_the_ID(), 'accreditations');

                    if ($acc) {
                        echo '<a id="accreditations" class="anchor"></a>';
                        $navitems[] = 'Accreditations';
                        ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="h_accreditations">
                            <button class="accordion-button collapsed" type="button" id="b_accreditations"
                                data-bs-toggle="collapse" data-bs-target="#c_accreditations">Accreditations</button>
                        </h2>
                        <div class="accordion-collapse collapse" id="c_accreditations" data-bs-parent="#assets">
                            <div class="p-4">
                                <ul class="supplier__tags cols-lg-3">
                                    <?php
                                        foreach ($acc as $a) {
                                            echo '<li><a href="/accreditations/' . $a->slug . '/">' . $a->name . '</a></li>';
                                        }
                        ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                    }

                    $terms = wp_get_post_terms(get_the_ID(), 'supplier-types');
                    if ($terms) {
                        echo '<a id="supplier-specialities" class="anchor"></a>';
                        $navitems[] = 'Supplier Specialities';
                        ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="h_supplier-specialities">
                            <button class="accordion-button collapsed" type="button" id="b_supplier-specialities"
                                data-bs-toggle="collapse" data-bs-target="#c_supplier-specialities">Supplier
                                Specialities</button>
                        </h2>
                        <div class="accordion-collapse collapse" id="c_supplier-specialities" data-bs-parent="#assets">
                            <div class="p-4">
                                <ul class="supplier__tags cols-lg-3">
                                    <?php
$terms = wp_get_post_terms(get_the_ID(), 'supplier-types');
                        foreach ($terms as $term) {
                            // Output the term name and link (if needed)
                            echo '<li><a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a></li>';
                        }
                        ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                    }

                    $category = get_the_terms(get_the_ID(), 'supplier-tags');
                    if ($category) {
                        echo '<a id="products--services" class="anchor"></a>';
                        $navitems[] = 'Products & Services';
                        ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="h_products--services">
                            <button class="accordion-button collapsed" type="button" id="b_products--services"
                                data-bs-toggle="collapse" data-bs-target="#c_products--services">Products &amp;
                                Services</button>
                        </h2>
                        <div class="accordion-collapse collapse" id="c_products--services" data-bs-parent="#assets">
                            <div class="p-4">
                                <ul class="supplier__tags cols-lg-3">
                                    <?php
                                        foreach ($category as $c) {
                                            echo '<li><a href="/tags/' . $c->slug . '/">' . $c->name . '</a></li>';
                                        }
                        ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <?php
                } // end full profile (!basic) output
?>
                <a id="contact" class="anchor"></a>
                <div class="">
                    <h3>Contact <?=strip_crud(get_the_title())?>
                    </h3>
                    <?php
                    $supplier_email = str_replace(' ', '', get_field('contact_email'));
$supplier_name = urlencode(strip_crud(get_the_title()));
echo do_shortcode(
    '[gravityform id="' .
    get_field('supplier_contact_form_id', 'options') .
    '" field_values="email=' .
    $supplier_email .
    '&name=' .
    $supplier_name .
    '" title="false"]'
);

?>
                </div>
            </div>
            <div class="col-lg-3 mt-0">
                <aside class="supplier__sidebar">
                    <div class="form mb-2">
                        <input class="form-control" type="text" id="searchInput" autocomplete="off">
                        <button id="go" class="btn-search"></button>
                        <input type="hidden" name="source" id="sourceInput">
                    </div>
                    <section class="supplier__detail mb-2">
                        <h3>Contact Details</h3>
                        <dl>
                            <?php
        if (get_field('contact_phone')) {
            echo "<dt>Telephone</dt>";
            if (get_field('profile') != 'Basic') {
                ?>
                            <dd><a
                                    href="tel:<?=parse_phone(get_field('contact_phone'))?>"><?=get_field('contact_phone')?></a>

                                <?php
            } else {
                ?>
                            <dd><?=get_field('contact_phone')?>
                                <?php
            }
            if (get_field('contact_phone_2')) {
                if (get_field('profile') != 'Basic') {
                    ?>
                                <br><a
                                    href="tel:<?=parse_phone(get_field('contact_phone_2'))?>"><?=get_field('contact_phone_2')?></a>
                                <?php
                } else {
                    ?>
                                <br><?=get_field('contact_phone_2')?>
                                <?php
                }
            }
            ?>
                            </dd>
                            <?php
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
        echo '<br><span class="contact_role"> - ' . get_sub_field('contact_role') . '</span>';
    }
    echo '</dd>';
}
?>
                        </dl>
                    </section>
                    <?php
                        if (get_field('supplier_website') && get_field('profile') != 'Basic') {
                            ?>
                    <a href="<?=get_field('supplier_website')?>"
                        class="supplier__website mb-2" target="_blank"><i class="fa-solid fa-link"></i> <span>Visit
                            Website</span></a>
                    <?php
                        }
?>
                    <a href="#contact" class="supplier__contact mb-2"><i class="fa-solid fa-angles-right"></i>
                        <span>Contact Supplier</span></a>
                    <?php
if (get_field('supplier_socials') && get_field('profile') != 'Basic') {
    echo '<section class="supplier__socials">';
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
        echo '<a href="' . $socials['twitter_url'] . '" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>';
    }
    if ($socials['linkedin_url'] ?? null) {
        echo '<a href="' . $socials['linkedin_url'] . '" target="_blank"><i class="fa-brands fa-linkedin"></i></a>';
    }
    echo '</section>';
}
?>
                </aside>
            </div>
        </div>
    </div>
</main>
<?php
add_action('wp_footer', function () use ($navitems) {
    $j = json_encode($navitems);
    ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="<?=get_stylesheet_directory_uri()?>/js/search.js?v=5"></script>
<script>
    <?php
$supp = get_posts(array(
    'post_type' => 'suppliers',
    'numberposts' => -1
));

    $suppliers = array();

    foreach ($supp as $p) {
        $t = strip_crud($p->post_title);
        $suppliers[$t] = $p->post_name;
    }
    ?>
    var slugList = [ <?=json_encode($suppliers)?> ];

    const navholder = document.getElementById('navholder');
    const navitems = <?=$j?> ;

    function slugify(str) {
        return str.toLowerCase().replace(/\s+/g, '-').replace(/&+/g, '').replace(/\//g, '-');
    }

    for (var i = 0; i < navitems.length; i++) {
        var name = navitems[i];
        var slug = slugify(name);

        // Create <a> element
        var aElement = document.createElement('a');
        aElement.setAttribute('href', '#' + slug);
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

    var contact = document.createElement('a');
    contact.setAttribute('href', '#contact');
    contact.className = 'navbtn';
    contact.textContent = 'Contact';
    navholder.appendChild(contact);


    document.addEventListener("DOMContentLoaded", function() {
        var navButtons = document.querySelectorAll(".navbtn");

        navButtons.forEach(function(btn) {
            btn.addEventListener("click", function(e) {
                e.preventDefault();
                var targetID = this.getAttribute("href").substring(1);
                var targetAnchor = document.getElementById(targetID);
                var targetSection = document.getElementById('c_' + targetID);
                var targetTitle = document.getElementById('b_' + targetID);
                if (targetAnchor) {
                    targetAnchor.scrollIntoView({
                        behavior: "smooth",
                    });
                    targetSection.classList.add("show");
                    targetTitle.classList.remove("collapsed");
                    var allSections = document.querySelectorAll('.accordion-collapse');
                    allSections.forEach(function(section) {
                        if (section.id !== 'c_' + targetID) {
                            section.classList.remove("show");
                        }
                    })
                }
            })
        })
    });
</script>
<?php
});

get_footer();
?>