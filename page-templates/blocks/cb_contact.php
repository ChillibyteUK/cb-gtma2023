<section class="contact">
    <div class="container-xl">
        <div class="row mb-4">
            <div class="col-md-6">
                <h3>Contact Details</h3>
                <ul class="fa-ul mb-5">
                    <li class="mb-4"><span class="fa-li"><i class="fa-solid fa-map-marker-alt"></i></span>
                        <?=str_replace(',', ',<br>', get_field('contact_address', 'options'))?>
                    </li>
                    <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span> <a
                            href="tel:<?=parse_phone(get_field('contact_phone', 'options'))?>"><?=get_field('contact_phone', 'options')?></a>
                    </li>
                </ul>

                <div class="row mb-5">
                    <div class="col-md-6 text-center">
                        <h4 class="h5 fw-600 mb-2">Technical &amp; Supply Chain Enquiries</h4>
                        <img src="<?=get_stylesheet_directory_uri()?>/img/alan.jpg"
                            alt="Alan Arthur" class="d-block mb-2 w-50 mx-auto">
                        <p class="mb-1"><strong>Alan Arthur</strong><br>Chief Executive Officer</p>
                        <a href="mailto:alan@gtma.co.uk"><i class="fa-solid fa-envelope fs-500 pe-2"></i></a>
                        <a href="https://www.linkedin.com/in/alan-arthur-41550426/" target="_blank"><i
                                class="fa-brands fa-linkedin-in fs-500"></i></a>
                    </div>
                    <div class="col-md-6 text-center">
                        <h4 class="h5 fw-600 mb-2">Membership &amp; Other Enquiries</h4>
                        <img src="<?=get_stylesheet_directory_uri()?>/img/david.jpg"
                            alt="David Beattie" class="d-block mb-2 w-50 mx-auto">
                        <p class="mb-1"><strong>David Beattie</strong><br>General Manager</p>
                        <a href="mailto:david@gtma.co.uk"><i class="fa-solid fa-envelope fs-500 pe-2"></i></a>
                        <a href="https://www.linkedin.com/in/david-beattie-1955a952/" target="_blank"><i
                                class="fa-brands fa-linkedin-in fs-500"></i></a>
                    </div>
                </div>

                <p>If you have any comments or suggestions regarding any part of our web site or have a general enquiry
                    for the Association please leave your contact details in the form.</p>
            </div>
            <div class="col-md-6">
                <?=do_shortcode('[gravityform id="' . get_field('contact_form_id', 'options') . '" title="false"]')?>
            </div>
        </div>
        <iframe
            src="<?=get_field('google_maps_src', 'options')?>"
            width="100%" height="450" frameborder="0"></iframe>
    </div>
</section>