<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$term = get_queried_object();
$cat_name = get_queried_object()->name;
$cat_id = get_queried_object()->term_id;
$c = 0;
?>
<main id="main" class="supplier-archive">
    <div class="container-xl">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
        }
        ?>
        <div class="row">
            <div class="col-md-9">
                <section class="suppliers pb-5">
                    <h1><?= $cat_name ?></h1>
                    <?= term_description() ?>

                    <?php
                    $sponsor = get_field('supplier', $term) ?? null;
                    if ($sponsor) {
                        $until = get_field('display_until', $term) ?: '20380119';
                        $today = date('Ymd');
                        if ($until >= $today) {
                    ?>
                            <section class="sponsor mb-4">
                                <div class="container-xl">
                                    <a href="<?= get_the_permalink($sponsor) ?>" class="sponsor__card">
                                        <div class="sponsor__title">This content is sponsored by <br><span><?= get_the_title($sponsor) ?></span>.</div>
                                        <div class="sponsor__inner">
                                            <div class="sponsor__words">
                                                <?= get_field('sponsor_banner_content', $sponsor) ?>
                                            </div>
                                            <div class="sponsor__logo">
                                                <img src="<?= wp_get_attachment_image_url(get_field('supplier_logo', $sponsor), 'full') ?>" alt="">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </section>
                    <?php
                        }
                    }
                    ?>


                    <div class="my-4"><em><span id="count"></span> suppliers found.</em></div>

                    <div class="filters pb-4">
                        <label for="counties">Filter by county:</label>
                        <select name="counties" id="counties" class="form-select">
                            <option value="*">All</option>
                        </select>
                    </div>
                    <div id="suppliers">
                        <?php

                        $q = new WP_Query(array(
                            'post_type' => 'suppliers',
                            'posts_per_page' => -1,
                            'meta_query' => array(
                                array(
                                    'key' => 'profile',
                                    'value' => 'Featured',
                                    'compare' => '='
                                ),
                            ),
                            'orderby' => 'rand',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'supplier-types',
                                    'field' => 'term_id',
                                    'terms' => $cat_id,
                                    'include_children' => false
                                )
                            )
                        ));


                        $counties = array();
                        while ($q->have_posts()) {
                            $q->the_post();
                            $county = get_field('county', get_the_ID()) ?: '';
                            $county_class = '';
                            if ($county) {
                                $counties[acf_slugify($county)] = $county;
                                $county_class = acf_slugify($county);
                            }
                        ?>
                            <a class="suppliers__card suppliers__featured <?= $county_class ?>"
                                href="<?= get_the_permalink() ?>">
                                <?= wp_get_attachment_image(get_field('supplier_logo', get_the_ID()), 'full', false, array('class' => 'suppliers__logo')) ?>
                                <div class="suppliers__content">
                                    <div class="d-flex flex-wrap gap-2 justify-content-between">
                                        <div>
                                            <h2 class="fs-5 d-inline">
                                                <?= strip_crud(get_the_title()) ?>
                                            </h2>
                                            <?php
                                            if ($county) {
                                                echo ' - ' . $county;
                                            }
                                            ?>
                                        </div>
                                        <div class="featured-badge">Featured <i class="fa-solid fa-star"></i></div>
                                    </div>
                                    <p class="mt-2 fs-200">
                                        <?= wp_trim_words(get_the_content(), 30) ?>
                                    </p>
                                </div>
                            </a>
                        <?php
                            $c++;
                        }

                        $q = new WP_Query(array(
                            'post_type' => 'suppliers',
                            'posts_per_page' => -1,
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'profile',
                                    'value' => 'Featured',
                                    'compare' => '!='
                                ),
                                array(
                                    'key' => 'profile',
                                    'compare' => 'NOT EXISTS'
                                )
                            ),
                            'orderby' => 'rand',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'supplier-types',
                                    'field' => 'term_id',
                                    'terms' => $cat_id,
                                    'include_children' => false
                                )
                            )
                        ));

                        while ($q->have_posts()) {
                            $q->the_post();
                            $county = get_field('county', get_the_ID()) ?: '';
                            $county_class = '';
                            if ($county) {
                                $counties[acf_slugify($county)] = $county;
                                $county_class = acf_slugify($county);
                            }
                        ?>
                            <a class="suppliers__card <?= $county_class ?>"
                                href="<?= get_the_permalink() ?>">
                                <h2 class="fs-5 d-inline">
                                    <?= strip_crud(get_the_title()) ?>
                                </h2>
                                <?php
                                if ($county) {
                                    echo ' - ' . $county;
                                }
                                ?>
                                <p class="mt-2 fs-200">
                                    <?= wp_trim_words(get_the_content(), 30) ?>
                                </p>
                            </a>
                        <?php
                            $c++;
                        }
                        wp_reset_postdata();
                        ?>

                </section>
                <div class="mb-5"><?= get_field('secondary_description', $term) ?></div>
            </div><!-- .col -->
            <div class="col-md-3">
                <div class="sidebar pb-4">
                    <div class="sidebar__red mb-2">
                        <div class="h5">Membership</div>
                        <div class="sidebar__inner">
                            <?php
                            // $parent = 362;
                            $parent = get_page_by_path('membership');
                            $sibs = new WP_Query(array(
                                'post_type'      => 'page',
                                'posts_per_page' => -1,
                                'post_parent'    => $parent->ID,
                                'order'          => 'ASC',
                                'orderby'        => 'title'
                            ));
                            ?>
                            <ul>
                                <li><a class=""
                                        href="<?= get_the_permalink($parent) ?>"><?= get_the_title($parent) ?></a>
                                </li>
                                <?php
                                while ($sibs->have_posts()) {
                                    $sibs->the_post();
                                ?>
                                    <li><a class="" href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar__blue mb-2">
                        <div class="h5">Member Services</div>
                        <div class="sidebar__inner">
                            <p class="mb-2">Here are some of the services available to members</p>
                            <?php
                            $parent = 134;
                            $sibs = new WP_Query(array(
                                'post_type'      => 'page',
                                'posts_per_page' => -1,
                                'post_parent'    => $parent,
                                'order'          => 'ASC',
                                'orderby'        => 'title'
                            ));
                            ?>
                            <ul>
                                <?php
                                while ($sibs->have_posts()) {
                                    $sibs->the_post();
                                ?>
                                    <li><a class=""
                                            href="<?= get_the_permalink() ?>"><?= get_the_title() ?></a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- .col -->
        </div> <!-- .container-xl -->
</main>
<?php
ksort($counties);
$json = json_encode($counties);
?>
<script>
    const selectElement = document.getElementById("counties");

    const options = <?= $json ?>;

    for (const value in options) {
        if (options.hasOwnProperty(value)) {
            const text = options[value];
            const optionElement = document.createElement("option");
            optionElement.value = '.' + value;
            optionElement.text = text;
            selectElement.appendChild(optionElement);
        }
    }

    document.getElementById('count').innerHTML = '<?= $c ?>';
</script>
<?php
add_action('wp_footer', function () {
?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
        integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        (function($) {
            var $grid = $('#suppliers').isotope({
                itemSelector: '.suppliers__card',
                layoutMode: 'vertical'
            });
            $('#counties').on('change', function() {
                var filterValue = this.value;
                $grid.isotope({
                    filter: filterValue
                });
            });
        })(jQuery);
    </script>
<?php
}, 9999);

get_footer();
?>