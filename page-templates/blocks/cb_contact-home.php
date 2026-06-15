<section class="contact pt-5">
    <div class="container-xl">
        <div class="row mb-4">
            <div class="col-md-6">
                <h3>Get in Touch</h3>
                <p>Whether you're a member, potential supplier, or looking to find out more about what GTMA can do for your business - we'd love to hear from you.</p>
                <p>Telephone: <a href="tel:<?=parse_phone(get_field('contact_phone', 'options'))?>"><?=get_field('contact_phone', 'options')?></a><br>Email: <a href="mailto:<?=get_field('contact_email', 'options')?>"><?=get_field('contact_email', 'options')?></a></p>
            </div>
            <div class="col-md-6">
                <?=do_shortcode('[gravityform id="' . get_field('contact_form_id', 'options') . '" title="false"]')?>
            </div>
        </div>
    </div>
</section>