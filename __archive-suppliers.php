<?php
// not used
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();
?>
<main id="main" class="supplier-archive">

    <section class="suppliers">
        <div class="container-xl">
            <h1>Suppliers by Speciality</h1>
            <?php
            $terms = get_terms(array('taxonomy' => 'types', 'hide_empty' => false ));
foreach ($terms as $t) {
    ?>
            <li><a
                    href="<?=get_term_link($t)?>"><?=$t->name?></a>
            </li>
            <?php
}
?>
        </div>
    </section>
</main>
<?php
get_footer();
?>