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
                <select name="counties" id="counties"></select>
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
<?=cbdump($counties)?>
<script>
const selectElement = document.getElementById("counties");

const options = [
  { value: "option1", text: "Option 1" },
  { value: "option2", text: "Option 2" },
  { value: "option3", text: "Option 3" },
];

options.forEach((option) => {
  const optionElement = document.createElement("option");
  optionElement.value = option.value;
  optionElement.text = option.text;
  selectElement.appendChild(optionElement);
});
</script>
<?php
get_footer();
?>