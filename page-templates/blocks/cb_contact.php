<section class="contact">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-6">
                <h3>Address</h3>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa-solid fa-map-marker-alt"></i></span> <?=str_replace(',', ',<br>', get_field('contact_address','options'))?></li>
                </ul>

                <h3>Telephone</h3>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa-solid fa-map-marker-alt"></i></span> <a href="tel:<?=parse_phone(get_field('contact_phone','options'))?>"><?=get_field('contact_phone','options')?></a></li>
                </ul>

                <h3>Email</h3>
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fa-solid fa-envelope"></i></span> <a href="mailto:<?=get_field('contact_email','options')?>"><?=get_field('contact_email','options')?></a></li>
                </ul>

                <p>If you have any comments or suggestions regarding any part of our web site or have a general enquiry for the Association please leave your contact details in the form.</p>
            </div>
            <div class="col-md-6">
                FORM
            </div>
        </div>
        <iframe src="<?=get_field('google_maps_src','options')?>" width="100%" height="400" frameborder="0"></iframe>
    </div>
</section>