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

            <div class="filters">
                <select name="counties" id="counties" class="form-select">
                    <option>Filter by county</option>
                </select>
            </div>

            <?php
$q = new WP_Query(array(
    'post_type' => 'suppliers',
    'posts_per_page' => -1,
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
    $county = get_field('county',get_the_ID()) ?: '';
    if ($county) {
        $counties[acf_slugify($county)] = $county;
    }
    ?>
            <a class="suppliers__card"
                href="<?=get_the_permalink()?>">
                <?=get_the_title()?>
                <?php
                if ($county) {
                    echo ' - ' . $county;
                }
                ?>
            </a>
            <?php
}
?>
        </div>
    </section>
</main>
<?php

$json = json_encode(asort($counties));
?>
<script>
const selectElement = document.getElementById("counties");

const options = <?=$json?>;

for (const value in options) {
  if (options.hasOwnProperty(value)) {
    const text = options[value];
    const optionElement = document.createElement("option");
    optionElement.value = value;
    optionElement.text = text;
    selectElement.appendChild(optionElement);
  }
}
</script>
<?php
get_footer();
?>