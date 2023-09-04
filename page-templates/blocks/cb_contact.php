<section class="contact">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-6">
                Address
                <?=get_field('contact_address','options')?>

                Telephone
                <?=get_field('contact_phone','options')?>

                Email
                <?=get_field('contact_email','options')?>

                <p>If you have any comments or suggestions regarding any part of our web site or have a general enquiry for the Association please leave your contact details in the form.</p>
            </div>
            <div class="col-md-6">
                FORM
            </div>
        </div>
        <iframe src="<?=get_field('google_maps_src','options')?>" width="100%" height="400" frameborder="0"></iframe>
    </div>
</section>