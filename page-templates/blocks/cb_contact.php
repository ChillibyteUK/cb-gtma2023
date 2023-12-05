<section class="contact">
    <div class="container-xl">
        <div class="row mb-4">
            <div class="col-md-6">
                <h3>Address</h3>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa-solid fa-map-marker-alt"></i></span>
                        <?=str_replace(',', ',<br>', get_field('contact_address', 'options'))?>
                    </li>
                </ul>

                <h3>Telephone</h3>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span> <a
                            href="tel:<?=parse_phone(get_field('contact_phone', 'options'))?>"><?=get_field('contact_phone', 'options')?></a>
                    </li>
                </ul>

                <h3>Email</h3>

                <div class="row">
                    <div class="col-md-6">
                        <h4>Technical &amp; Supply-Chain Enquiries</h4>
                        <img src="" alt="alan">
                        Alan Arthur, CEO
                        <a href="mailto:alan@gtma.co.uk"><i class="fa-solid fa-email"></i></a>
                        <a href="https://www.linkedin.com/in/alan-arthur-41550426/" target="_blank"><i
                                class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-md-6">
                        <h4>Membership &amp; Other Enquiries</h4>
                        <img src="" alt="david">
                        David Beattie, General Manager
                        <a href="mailto:david@gtma.co.uk"><i class="fa-solid fa-email"></i></a>
                        <a href="https://www.linkedin.com/in/david-beattie-1955a952/" target="_blank"><i
                                class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                </div>

                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa-solid fa-envelope"></i></span> <a
                            href="mailto:<?=get_field('contact_email', 'options')?>"><?=get_field('contact_email', 'options')?></a>
                    </li>
                </ul>

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