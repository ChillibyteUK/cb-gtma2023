<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>
<main id="main" class="supplier-archive">

    <section class="suppliers">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-9">
                    <h1>Supplier Specialities</h1>
                    <p><strong>The GTMA supplier directory contains the profiles of companies dedicated to supplying countless industries with the very best services from the manufacturing and engineering sectors. From aerospace and medical, to chemical, defence, and everything in between, the GTMA supplier directory will connect you to the company best suited to your needs.</strong></p>
                    <?php
                    require get_stylesheet_directory() . '/page-templates/blocks/cb_supplier_categories.php';
                    ?>
                </div>
                <div class="col-md-3">
                    <div class="sidebar__search">
                        <div class="h5 mb-3">Search Products &amp; Services</div>
                        <div class="sidebar__inner">
                            <div class="form">
                                <input class="form-control" type="text" id="searchInput" autocomplete="off">
                                <button id="go" class="btn-search"></button>
                                <input type="hidden" name="source" id="sourceInput">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
?>