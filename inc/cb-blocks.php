<?php
function acf_blocks()
{
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'				=> 'cb_hero_search',
            'title'				=> __('CB Hero Search'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_hero_search.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_hero',
            'title'				=> __('CB Hero'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_hero.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_supplier_assets',
            'title'				=> __('CB Supplier Assets'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_supplier_assets.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_youtube',
            'title'				=> __('CB YouTube'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_youtube.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_services',
            'title'				=> __('CB Services'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_services.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_supplier_categories',
            'title'				=> __('CB Supplier Categories'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_supplier_categories.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_join_cta',
            'title'				=> __('CB Join CTA'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_join_cta.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_child_pages',
            'title'				=> __('CB Child Pages'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_child_pages.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_partners_nav',
            'title'				=> __('CB Partners Nav'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_partners_nav.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_news_by_sector',
            'title'				=> __('CB News by Sector'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_news_by_sector.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_suppliers_by_sector',
            'title'				=> __('CB Suppliers by Sector'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_suppliers_by_sector.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_sector_subnav',
            'title'				=> __('CB Sector Page Sub Nav'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_sector_subnav.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_contact',
            'title'				=> __('CB Contact'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_contact.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_text_image',
            'title'				=> __('CB Text Image'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_text_image.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_sponsor_banner',
            'title'				=> __('CB Sponsor Banner'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_sponsor_banner.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_two_col_feature',
            'title'				=> __('CB Two Col Feature'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_two_col_feature.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_three_col_feature',
            'title'				=> __('CB Three Col Feature'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_three_col_feature.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_video',
            'title'				=> __('CB Video'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_video.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_single_testimonial',
            'title'				=> __('CB Single Testimonial'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_single_testimonial.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_quote',
            'title'				=> __('CB Quote'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_quote.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_events',
            'title'				=> __('CB Events'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_events.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_latest_news',
            'title'				=> __('CB Latest News'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_latest_news.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_featured_suppliers',
            'title'				=> __('CB Featured Suppliers'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_featured_suppliers.php',
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block_type(array(
            'name'				=> 'cb_button',
            'title'				=> __('CB Button'),
            'category'			=> 'layout',
            'icon'				=> 'cover-image',
            'render_template'	=> 'page-templates/blocks/cb_button.php',
            'mode'	=> 'edit',
            'supports' => array(
                'mode' => false,
                'color' => array(
                    'background' => true,
                ),
            ),
        ));
    }
}
add_action('acf/init', 'acf_blocks');

// Gutenburg core modifications
add_filter('register_block_type_args', 'core_image_block_type_args', 10, 3);

function core_image_block_type_args($args, $name)
{
    // if ('suppliers' != get_post_type()) {
    //     return $args;
    // }

    if ($name == 'core/paragraph') {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/list') {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/columns') {
        // $args['render_callback'] = 'modify_core_add_container';
    }
    if ($name == 'core/heading') {
        $args['render_callback'] = 'modify_core_heading';
    }
    // if ( $name == 'core/button' ) {
    //     $args['render_callback'] = 'modify_core_buttons';
    // }
    // if ( $name == 'core/quote' ) {
    //     $args['render_callback'] = 'modify_core_quote';
    // }


    return $args;
}

function modify_core_add_container($attributes, $content)
{
    ob_start();
    // $class = $block['className'];
    ?>
<div class="container-xl">
    <?=$content?>
</div>
<?php
    $content = ob_get_clean();
    return $content;
}

function modify_core_heading($attributes, $content)
{
    ob_start();
    $id = strtolower(wp_strip_all_tags($content));
    $id = cbslugify($id);
    ?>
<div class="container-xl" id="<?=$id?>">
    <?=$content?>
</div>
<?php
    $content = ob_get_clean();
    return $content;
}
/*

function modify_core_buttons($attributes, $content) {
    ob_start();

    $btn = $content;

    preg_match('/class="wp-block-button (.*?)"/', $btn, $class);

    preg_match('/href="(.*?)"/', $btn, $link);

    preg_match('/target="(.*?)" rel="(.*?)"/', $btn, $target);

    preg_match('/<a.*?>(.*?)<\/a>/', $btn, $label);

    ?>
    <!-- core/buttons -->
    <div class="container-xl clearfix mb-4"><a class="btn <?=$class[1]?>" href="<?=$link[1]?>" target="<?=$target[1]?>" rel="<?=$target[2]?>"><?=$label[1]?></a></div>
    <?php
    $content = ob_get_clean();
    return $content;
}

function modify_core_quote($attributes, $content) {
    ob_start();

    ?>
    <!-- wp_quote -->
    <div class="container-xl">
        <div class="wp-block-quote--cb my-4 w-md-75 mx-auto">
            <div class="overlay"></div>
            <?=$content?>
        </div>
    </div>
    <?php

    $content = ob_get_clean();
    return $content;
}

*/
?>