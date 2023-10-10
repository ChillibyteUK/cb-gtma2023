<?php
/*
Template Name: General Sidebar Page
*/
// Exit if accessed directly.
defined('ABSPATH') || exit;

$class = $block['className'] ?? null;

get_header();
global $wp;
$current_url = home_url( add_query_arg( array(), $wp->request ) ) . '/';
?>
<main id="main" class="<?=$class?>">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-8">
                <h1><?=get_the_title()?></h1>
                <?=get_the_content()?>
            </div>
            <div class="col-md-4">
                <div class="sidebar pb-4">
                    <div class="sidebar__red mb-2">
                        <div class="h4">Membership</div>
                        <div class="sidebar__inner">
                            <?php
                            $parent = 362;
                            $sibs = new WP_Query(array(
                                'post_type'      => 'page',
                                'posts_per_page' => -1,
                                'post_parent'    => $parent,
                                'order'          => 'ASC',
                                'orderby'        => 'title'
                            ));
                            $active = '';
                            ?>
                            <ul>
                                <?php
                                while($sibs->have_posts()) {
                                    $sibs->the_post();
                                    $active = get_the_permalink() == $current_url ? 'active' : '';
                                    ?>
                                <li><a class="<?=$active?>" href="<?=get_the_permalink()?>"><?=get_the_title()?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar__blue mb-2">
                        <div class="h4">GTMA Member Services</div>
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
                                while($sibs->have_posts()) {
                                    $sibs->the_post();
                                    $active = get_the_permalink() == $current_url ? 'active' : '';
                                    ?>
                                <li><a class="<?=$active?>" href="<?=get_the_permalink()?>"><?=get_the_title()?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar__search">
                        <div class="h4 mb-3">Search for Products &amp; Services</div>
                        <div class="sidebar__inner">
                            <div class="form">
                                <input class="form-control" type="text" id="searchInput" autocomplete="off">
                                <button id="go" class="btn-search">Search</button>
                                <input type="hidden" name="source" id="sourceInput">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();