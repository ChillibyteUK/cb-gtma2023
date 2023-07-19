<section class="suppliers py-5">
    <div class="container-xl">
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