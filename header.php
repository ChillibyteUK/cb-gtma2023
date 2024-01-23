<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cb-hydronix
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
session_start();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta
        charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1">
    <link rel="preload"
        href="<?=get_stylesheet_directory_uri()?>/fonts/montserrat-v26-latin-regular.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?=get_stylesheet_directory_uri()?>/fonts/montserrat-v26-latin-600.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?=get_stylesheet_directory_uri()?>/fonts/montserrat-v26-latin-800.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <?php
if (get_field('ga_property', 'options')) {
    ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=<?=get_field('ga_property', 'options')?>">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config',
            '<?=get_field('ga_property', 'options')?>'
        );
    </script>
    <?php
}
if (get_field('gtm_property', 'options')) {
    ?>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer',
            '<?=get_field('gtm_property', 'options')?>'
        );
    </script>
    <!-- End Google Tag Manager -->
    <?php
}
if (get_field('google_site_verification', 'options')) {
    echo '<meta name="google-site-verification" content="' . get_field('google_site_verification', 'options') . '" />';
}
if (get_field('bing_site_verification', 'options')) {
    echo '<meta name="msvalidate.01" content="' . get_field('bing_site_verification', 'options') . '" />';
}

wp_head();
?>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "GTMA",
            "url": " https://www.gtma.co.uk/",
            "logo": "https://www.gtma.co.uk/wp-content/themes/cb-gtma2023/img/gtma-logo.png",
            "image": "https://www.gtma.co.uk/wp-content/themes/cb-gtma2023/img/gtma-logo.png",
            "description": "GTMA is an established UK trade association. Visit the Supplier Directory to find engineering companies, toolmakers, tool manufacturers & service providers.",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Manufacturing Resource Centre, Springfield Business Park,",
                "addressLocality": "Adams Way",
                "addressRegion": "Alcester",
                "postalCode": "B49 6PU",
                "addressCountry": "UK"
            },
            "telephone": "+44 (0) 121 392 8994",
            "email": "admin@gtma.co.uk",
            "sameAs": [
                "https://www.facebook.com/gtmasupplychain/",
                "https://twitter.com/gtma1",
                "https://www.youtube.com/user/GTMADigital",
                "https://www.linkedin.com/company/gtma-uk/"
            ]
        }
    </script>
    <script data-cfasync='false' type='text/javascript' defer='' async='' src='https://t.wowanalytics.co.uk/Scripts/ssl/dd6ce444-7a72-42f8-9fd1-c70a12400458.js'></script>
</head>

<body <?php body_class(); ?>
    <?php understrap_body_attributes(); ?>>
    <?php do_action('wp_body_open'); ?>
    <div id="wrapper-navbar" class="fixed-top">
        <nav id="navbar" class="navbar navbar-expand-lg d-block p-0 pt-2 pt-lg-0" aria-labelledby="main-nav-label">
            <div class="container-xl px-0 px-lg-4">
                <div class="d-flex w-100 w-lg-auto justify-content-between align-items-center px-2">
                    <a href="/" class="navbar-brand" rel="home"></a>
                    <button class="navbar-toggler input-button text-white" id="navToggle" data-bs-toggle="collapse"
                        data-bs-target=".navbars" type="button" aria-label="Navigation"><i
                            class="fa fa-navicon"></i></button>
                </div>
                <div id="theNav" class="d-grid w-100">
                    <div id="topNav" class="d-none d-lg-flex py-4 collapse navbar-collapse navbars">
                        <div class="topNav__word">Providing Solutions Throughout the Engineering Supply Chain</div>
                        <div class="topNav__social">
                            <?=do_shortcode('[social_icons]')?>
                        </div>
                    </div>
                    <?php
                    wp_nav_menu(
    array(
'theme_location'  => 'primary_nav',
'container_class' => 'px-0 p-lg-0 collapse navbar-collapse navbars',
'container_id'    => 'primaryNav',
'menu_class'      => 'navbar-nav justify-content-between w-100 px-4 px-lg-0 gap-1 gap-lg-0 py-2 py-lg-0',
'fallback_cb'     => '',
'menu_id'         => 'main-menu',
'depth'           => 2,
'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
)
);
?>
                </div>
            </div>
        </nav>
    </div>