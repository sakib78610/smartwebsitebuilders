<section class="quickEnquiry ptb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-white">Let's Discuss your Project</h3>
                <br>
            </div>
        </div>
        <form class="clearfix contact-form needs-validation <?= (session()->get('verror')) ? 'was-validated' : '' ?>" id="letstalk" method="post" action="<?= base_url(uri_string()) ?>">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <input type="text" name="name" id="name3" class="form-control" required placeholder="Enter your Name *" value="<?= old('name') ?>">
                        <div class="invalid-feedback <?= (session()->get('verror') && session()->get('verror')->hasError('name')) ? 'd-block' : '' ?>">
                          <?= (session()->get('verror') && session()->get('verror')->hasError('name')) ? session()->get('verror')->showError('name') : 'This is required' ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <input type="email" name="email" id="email3" class="form-control" required placeholder="Email Address *" value="<?= old('email') ?>">
                        <div class="invalid-feedback <?= (session()->get('verror') && session()->get('verror')->hasError('email')) ? 'd-block' : '' ?>">
                          <?= (session()->get('verror') && session()->get('verror')->hasError('email')) ? session()->get('verror')->showError('email') : 'This is required' ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <input type="tel" name="phone" id="phone_number3" required class="form-control" placeholder="Phone Number *" value="<?= old('phone') ?>">
                        <div class="invalid-feedback <?= (session()->get('verror') && session()->get('verror')->hasError('phone')) ? 'd-block' : '' ?>">
                          <?= (session()->get('verror') && session()->get('verror')->hasError('phone')) ? session()->get('verror')->showError('phone') : 'This is required' ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 pt-20">
                    <div class="g-recaptcha" data-sitekey="6LcW3oEbAAAAAKsqhUlQaITb1O2PiL6wKHw2b-Oa"></div>
                </div>
                <div class="col-lg-4 pt-20">
                    <button type="submit" class="default-btn">Send Message</button>
                </div>
                <div class="col-lg-12">
                    <?php if(session()->get('danger')): ?>
                    <div class="alert alert-danger">
                        <?= session()->get('danger') ?>
                    </div>
                    <?php elseif(session()->get('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->get('success') ?>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </form>
    </div>
</section>