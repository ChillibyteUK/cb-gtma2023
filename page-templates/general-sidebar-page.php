<?php
/*
Template Name: Sidebar Page
*/
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<main id="main" class="<?=$class?>">
    <div class="container-xl">
        <h1><?=get_the_title()?></h1>
        <div class="row">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <div class="sidebar__blue">
                        <h3>Services Available</h3>
                        Here are some of the services available to members
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
                            while($sibs->have_posts()) {
                                $sibs->the_post();
                                ?>
                            <li><a href="<?=get_the_permalink()?>"><?=get_the_title()?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();