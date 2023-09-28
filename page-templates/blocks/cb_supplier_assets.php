<section class="assets py-5">
    <?php
$type = get_field('type');

    // echo '<h2>' . $type . '</h2>';

    if ($type == 'Plant & Equipment') {
        ?>
    <div><?=get_field('content')?></div>
    <?php
    }

    if ($type == 'Video Gallery') {
        ?>
    <div class="assets__video_grid">
        <?php
        if (have_rows('video_ids')) {
            while (have_rows('video_ids')) {
                the_row();
                $modal = random_str(8);
                $vid = get_sub_field('video_id');
                // $stripped = strstr($vid, '&', true) ?: $vid;
                $parts = explode('&', $vid);
                $vidID = $parts[0];
                $start = '';
                if (isset($parts[1])) {
                    $start = str_replace(['t=', 's'], '', $parts[1]);
                    $start = 'start=' . $start . '&';
                }
                ?>
        <div class="assets__video_card">
            <img class="video-btn" type="button"
                src="https://img.youtube.com/vi/<?=$vidID?>/hqdefault.jpg"
                data-bs-toggle="modal" data-bs-target="#videoModal"
                data-src="https://www.youtube-nocookie.com/embed/<?=$vidID?>"
                data-start="<?=$start?>">
        </div>
                <?php
            }
        }
        ?>
    </div>
    <div class="modal fade" id="videoModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="videoPlayer" allowscriptaccess="always"
                            allow="autoplay;fullscreen"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        add_action('wp_footer', function () {
            ?>
    <script>
        (function($) {
            var $videoSrc;
            var $videoStart;
            $('.video-btn').click(function() {
                $videoSrc = $(this).data("src");
                $videoStart = $(this).data("start");
            });
            $('#videoModal').on('shown.bs.modal', function(e) {
                $src = $videoSrc + "?" + $videoStart + "autoplay=1&amp;modestbranding=1&amp;showinfo=0";
                $("#videoPlayer").attr('src', $src);
            });
            $('#videoModal').on('hide.bs.modal', function(e) {
                $("#videoPlayer").attr('src', $videoSrc);
            });
        })(jQuery);
    </script>
    <?php
        }, 9999);
    }

    if ($type == 'Photo Gallery') {
        ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <div class="assets__photo_grid" id="lightslider">
        <?php
        if (get_field('images')) {
            foreach (get_field('images') as $p) {
                ?>
            <div data-thumb="<?=wp_get_attachment_image_url($p, 'large')?>"
                class="gallery__image">
                <a href="<?=wp_get_attachment_image_url($p, 'full')?>"
                    data-fancybox="gallery">
                    <img
                        src="<?=wp_get_attachment_image_url($p, 'full')?>">
                </a>
            </div>
            <?php
            }
        }
        ?>
    </div>
    <?php
        add_action('wp_footer', function () {
            ?>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind('[data-fancybox="gallery"]', {
            caption: function(_fancybox, slide) {
                const figurecaption = slide.triggerEl?.querySelector("figcaption");
                return figurecaption ? figurecaption.innerHTML : slide.caption || "";
            },
        });
    </script>
    <?php
        });
    }

    if ($type == 'Accreditations' || $type == 'Brochures' || $type == 'Case Studies' || $type == 'Catalogues' || $type == 'New & Enhanced Products' || $type == 'Press Releases' || $type == 'Technical Papers') {
        echo '<div class="assets__dl_grid">';
        if (get_field('documents')) {
            foreach (get_field('documents') as $p) {
                $link = wp_get_attachment_url($p);
                $fname = get_the_title($p) ?: basename(get_attached_file($p));
                $fsize = size_format(filesize(get_attached_file($p)));
                $img = wp_get_attachment_image($p, 'medium', "", ['class'=>'assets__dl_image',]) ?: '<img src="/wp-content/themes/cb-gtma2023/img/missing-image.png" class="assets__dl_image">';
                ?>
    <a class="assets__dl_card" href="<?=$link?>" download>
        <?=$img?>
        <div class="assets__dl_title">
            <div class="fw-600"><?=$fname?></div>
            <div class="fs-200">(PDF - <?=$fsize?>)</div>
        </div>
    </a>
              <?php
            }
        }
    }
    ?>
</section>