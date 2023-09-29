<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>
<main id="main" class="supplier-archive">

    <section class="suppliers">
        <div class="container-xl">
            <h1>Supplier Specialities</h1>
            <p>The GTMA supplier directory contains the profiles of companies dedicated to supplying countless industries with the very best services from the manufacturing and engineering sectors. From aerospace and medical, to chemical, defence, and everything in between, the GTMA supplier directory will connect you to the company best suited to your needs.</p>
            <?php
            require get_template_directory() . '/page-templates/blocks/cb_supplier_categories.php';
            ?>
        </div>
    </section>
</main>
<?php
get_footer();
?>