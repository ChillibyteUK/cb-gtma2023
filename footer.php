<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<div id="footer-top"></div>
<footer class="footer pt-5">
    <div class="container-xl d-flex justify-content-between flex-wrap gap-4">
        <div class="footer__menu pb-4">
            <h4 class="footer__menu_title">Sectors Served</h4>
            <?=wp_nav_menu(array('theme_location' => 'footer_menu1'))?>
        </div>
        <div class="footer__menu pb-4">
            <h4 class="footer__menu_title">Affiliates</h4>
            <?=wp_nav_menu(array('theme_location' => 'footer_menu2'))?>
        </div>
        <div class="footer__menu pb-4">
            <h4 class="footer__menu_title">Partnerships</h4>
            <?=wp_nav_menu(array('theme_location' => 'footer_menu3'))?>
        </div>
        <div class="footer__menu pb-4">
            <h4 class="footer__menu_title">Certifications</h4>
            <a href="<?=get_field('qas_iso','options')?>" target="_blank"><img src="<?=get_stylesheet_directory_uri()?>/img/ISO-Logo-9001-2015-002.jpg" alt="" class="w-75"></a>
        </div>
        <div class="footer__menu pb-4">
            <h4 class="footer__menu_title">Supported By</h4>
        </div>

    </div>
</footer>
<div class="colophon py-3">
    <div class="container-xl d-flex justify-content-between align-items-center">
        <div>&copy; <?=date('Y')?>
            Gauge and Tool Makers Association (GTMA Ltd) Registered in England, no. 12468142<br>
            <?=get_field('contact_address', 'options')?>
        </div>
        <a href="https://www.chillibyte.co.uk/" rel="nofollow noopener" target="_blank" class="cb"
            title="Digital Marketing by Chillibyte"></a>
    </div>
</div>
<?php wp_footer();
if (get_field('gtm_property', 'options')) {
    ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe
        src="https://www.googletagmanager.com/ns.html?id=<?=get_field('gtm_property', 'options')?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php
}
?>
</body>

</html>