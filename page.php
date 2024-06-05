<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;
get_header();

// $url = $_SERVER["REQUEST_URI"];

?>
<main id="main">
    <div class="container-xl">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
        ?>
    </div>
    <?php
    the_post();    
    the_content(); 
    ?>
</main>
<?php
get_footer();