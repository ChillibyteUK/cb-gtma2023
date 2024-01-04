<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<main id="main" class="padding-top">
    <!-- hero -->
    <section class="d-flex align-items-center">
        <div class="container-xl">
            <div class="row h-100">
                <div class="col-lg-6 d-flex flex-column justify-content-center order-2 order-lg-1 py-5">
                    <h1 class="mb-4">404 - Page Not Found</h1>
                    <div class="hero__content fs-5 mb-4">We can't seem to find the page you're looking for</div>
                    <div class="hero__cta">
                        <a class="btn btn-primary mb-4" href="/">Return to Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();