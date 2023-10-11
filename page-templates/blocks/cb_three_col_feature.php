<?php
$left_theme = get_field('theme_left') == 'Blue' ? 'bg--blue' : 'bg--red';
$mid_theme = get_field('theme_mid') == 'Blue' ? 'bg--blue' : 'bg--red';
$right_theme = get_field('theme_right') == 'Blue' ? 'bg--blue' : 'bg--red';
?>
<section class="two_col_feature py-5">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-4">
                <div class="two_col_feature__card <?=$left_theme?>">
                    <div class="two_col_feature__overlay"></div>
                    <div class="two_col_feature__bg" style="--background:url('<?=wp_get_attachment_image_url(get_field('background_left'),'full')?>')"></div>
                    <h2 class="h4"><?=get_field('title_left')?></h2>
                    <div class="two_col_feature__inner"><?=get_field('content_left')?></div>
                    <?php
                    if (get_field('cta_left')) {
                        $cta = get_field('cta_left');
                        ?>
                    <div class="two_col_feature__cta">
                        <a href="<?=$cta['url']?>" target="<?=$cta['target']?>"><?=$cta['title']?></a>
                    </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="two_col_feature__card <?=$mid_theme?>">
                    <div class="two_col_feature__overlay"></div>
                    <div class="two_col_feature__bg" style="--background:url('<?=wp_get_attachment_image_url(get_field('background_mid'),'full')?>')"></div>
                    <h2 class="h4"><?=get_field('title_mid')?></h2>
                    <div class="two_col_feature__inner"><?=get_field('content_mid')?></div>
                    <?php
                    if (get_field('cta_mid')) {
                        $cta = get_field('cta_mid');
                        ?>
                    <div class="two_col_feature__cta">
                        <a href="<?=$cta['url']?>" target="<?=$cta['target']?>"><?=$cta['title']?></a>
                    </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="two_col_feature__card <?=$right_theme?>">
                    <div class="two_col_feature__overlay"></div>
                    <div class="two_col_feature__bg" style="--background:url('<?=wp_get_attachment_image_url(get_field('background_right'),'full')?>')"></div>
                    <h2 class="h4"><?=get_field('title_right')?></h2>
                    <div class="two_col_feature__inner"><?=get_field('content_right')?></div>
                    <?php
                    if (get_field('cta_right')) {
                        $cta = get_field('cta_right');
                        ?>
                    <div class="two_col_feature__cta">
                        <a href="<?=$cta['url']?>" target="<?=$cta['target']?>"><?=$cta['title']?></a>
                    </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>