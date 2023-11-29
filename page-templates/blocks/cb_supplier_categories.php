<section class="suppliers py-5">
    <div class="container-xl px-5 py-4 bg-grey-200">
        <ul class="cols-lg-2">
        <?php
        $terms = get_terms(array('taxonomy' => 'types', 'hide_empty' => true ));
        foreach ($terms as $t) {
            ?>
        <li><a
                href="<?=get_term_link($t)?>"><?=$t->name?> (<?=$t->count?>)</a>
        </li>
        <?php
        }
        ?>
        </ul>
    </div>
</section>