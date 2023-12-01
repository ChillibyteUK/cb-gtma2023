<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
$cat_name = get_queried_object()->name;
$cat_id = get_queried_object()->term_id;
?>
<main id="main" class="supplier-archive">
    <section class="suppliers py-5">
        <div class="container-xl">
            <h1><?=$cat_name?></h1>
            <?=term_description()?>

            <div class="filters py-4">
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
            'key' => 'is_featured',
            'value' => 'Yes',
            'compare' => '='
        ),
    ),
    'orderby' => 'rand',
    'tax_query' => array(
        array(
            'taxonomy' => 'types',
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
                <a class="suppliers__card <?=$county_class?>"
                    href="<?=get_the_permalink()?>">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h2 class="fs-5 d-inline">
                                <?=strip_crud(get_the_title())?></h2>
                            <?php
                        if ($county) {
                            echo ' - ' . $county;
                        }
    ?>
                        </div>
                        <div class="featured-badge">Featured</div>
                    </div>
                    <p class="mt-2 fs-200">
                        <?=wp_trim_words(get_the_content(), 30)?></p>
                </a>
                <?php
}

$q = new WP_Query(array(
    'post_type' => 'suppliers',
    'posts_per_page' => -1,
    'meta_query' => array(
        array(
            'key' => 'is_featured',
            'value' => 'Yes',
            'compare' => '!='
        ),
    ),
    'orderby' => 'rand',
    'tax_query' => array(
        array(
            'taxonomy' => 'types',
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
                <a class="suppliers__card <?=$county_class?>"
                    href="<?=get_the_permalink()?>">
                    <h2 class="fs-5 d-inline"><?=get_the_title()?>
                    </h2>
                    <?php
                if ($county) {
                    echo ' - ' . $county;
                }
    ?>
                    <p class="mt-2 fs-200">
                        <?=wp_trim_words(get_the_content(), 30)?></p>
                </a>
                <?php
}
?>
            </div>
        </div>
    </section>
</main>
<?php
ksort($counties);
$json = json_encode($counties);
?>
<script>
    const selectElement = document.getElementById("counties");

    const options = <?=$json?> ;

    for (const value in options) {
        if (options.hasOwnProperty(value)) {
            const text = options[value];
            const optionElement = document.createElement("option");
            optionElement.value = '.' + value;
            optionElement.text = text;
            selectElement.appendChild(optionElement);
        }
    }
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