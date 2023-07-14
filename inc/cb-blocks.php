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
        // acf_register_block_type(array(
        //     'name'				=> 'cb_hero_single',
        //     'title'				=> __('CB Hero'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_hero_single.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block_type(array(
        //     'name'				=> 'cb_text_nav',
        //     'title'				=> __('CB Text Nav'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_text_nav.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block_type(array(
        //     'name'				=> 'cb_three_col_nav',
        //     'title'				=> __('CB Three Col Nav'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_three_col_nav.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block_type(array(
        //     'name'				=> 'cb_image_offset',
        //     'title'				=> __('CB Image Offset'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_image_offset.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block_type(array(
        //     'name'				=> 'cb_text_full_image',
        //     'title'				=> __('CB Text / Full Bleed Image'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_text_full_image.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block_type(array(
        //     'name'				=> 'cb_text_text_full_image',
        //     'title'				=> __('CB Text / Text / Full Bleed Image'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_text_text_full_image.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block_type(array(
        //     'name'				=> 'cb_two_col_text',
        //     'title'				=> __('CB Two Col Text'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_two_col_text.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block_type(array(
        //     'name'				=> 'cb_our_clients',
        //     'title'				=> __('CB Our Clients'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_our_clients.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block_type(array(
        //     'name'				=> 'cb_accreditations',
        //     'title'				=> __('CB Accreditations'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_accreditations.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block_type(array(
        //     'name'				=> 'cb_badge_flow',
        //     'title'				=> __('CB Badge Flow'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_badge_flow.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block_type(array(
        //     'name'				=> 'cb_latest_case_studies',
        //     'title'				=> __('CB Latest Case Studies'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_latest_case_studies.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block_type(array(
        //     'name'				=> 'cb_latest_news',
        //     'title'				=> __('CB Latest News'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_latest_news.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block_type(array(
        //     'name'				=> 'cb_contact_form',
        //     'title'				=> __('CB Contact Form'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_contact_form.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block_type(array(
        //     'name'				=> 'cb_quote',
        //     'title'				=> __('CB Quote'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_quote.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block_type(array(
        //     'name'				=> 'cb_full_bleed_image',
        //     'title'				=> __('CB Full Bleed Image'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_full_bleed_image.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block_type(array(
        //     'name'				=> 'cb_all_projects',
        //     'title'				=> __('CB All Projects'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_all_projects.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block_type(array(
        //     'name'				=> 'cb_all_services',
        //     'title'				=> __('CB All Services'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_all_services.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
        // acf_register_block_type(array(
        //     'name'				=> 'cb_team',
        //     'title'				=> __('CB Team'),
        //     'category'			=> 'layout',
        //     'icon'				=> 'cover-image',
        //     'render_template'	=> 'page-templates/blocks/cb_team.php',
        //     'mode'	=> 'edit',
        //     'supports' => array('mode' => false),
        // ));
    }
}
add_action('acf/init', 'acf_blocks');

// Gutenburg core modifications
add_filter('register_block_type_args', 'core_image_block_type_args', 10, 3);
function core_image_block_type_args($args, $name)
{
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

    // echo '<pre>' . $name . '</pre>';

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