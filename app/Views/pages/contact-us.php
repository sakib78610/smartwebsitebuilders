<div class="page-header" style="background:url(<?= base_url() ?>/assets/images/contactus-bannerimg.jpg) no-repeat; background-position: bottom !important;">

    <div class="container">

        <div class="title-box">

            <h1 class="title">Contact Us </h1>

            <div class="breadcrumb">                    

                <span> </span>

            </div>

        </div>

    </div>

    <div class="shape-bottom">

        <img src="<?= base_url() ?>/assets/images/price-shape.svg" alt="shape" class="bottom-shape img-fluid">

    </div>

</div>

<section class="contact-area ptb-50">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <div class="contact-form">

                    <div class="title">

                        <span>Get In Touch</span>

                        <h3>Ready To Get Started?</h3>

                    </div>

                    <form method="post" action="<?= base_url('/contact-us') ?>" class="needs-validation <?= (session()->get('verror')) ? 'was-validated' : '' ?>" novalidate>

                        <?= csrf_field() ?>

                        <div class="row">

                            <div class="col-lg-12 col-md-12">

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

                            <div class="col-lg-6 col-md-6">

                                <div class="form-group">

                                    <input type="text" name="name" id="name2" class="form-control" required placeholder="Name" value="<?= old('name') ?>">

                                    <div class="invalid-feedback <?= (session()->get('verror') && session()->get('verror')->hasError('name')) ? 'd-block' : '' ?>">

                                      <?= (session()->get('verror') && session()->get('verror')->hasError('name')) ? session()->get('verror')->showError('name') : 'This is required' ?>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-6 col-md-6">

                                <div class="form-group">

                                    <input type="email" name="email" id="email2" class="form-control" required placeholder="Email" value="<?= old('email') ?>">

                                    <div class="invalid-feedback <?= (session()->get('verror') && session()->get('verror')->hasError('email')) ? 'd-block' : '' ?>">

                                      <?= (session()->get('verror') && session()->get('verror')->hasError('email')) ? session()->get('verror')->showError('email') : 'This is required' ?>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-6 col-md-6">

                                <div class="form-group">

                                    <input type="tel" name="phone" id="phone_number2" required class="form-control" placeholder="Phone" value="<?= old('phone') ?>">

                                    <div class="invalid-feedback <?= (session()->get('verror') && session()->get('verror')->hasError('phone')) ? 'd-block' : '' ?>">

                                      <?= (session()->get('verror') && session()->get('verror')->hasError('phone')) ? session()->get('verror')->showError('phone') : 'This is required' ?>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-6 col-md-6">

                                <div class="form-group">

                                    <input type="text" name="subject" id="msg_subject2" class="form-control" required placeholder="Subject" value="<?= old('subject') ?>">

                                    <div class="invalid-feedback <?= (session()->get('verror') && session()->get('verror')->hasError('subject')) ? 'd-block' : '' ?>">

                                      <?= (session()->get('verror') && session()->get('verror')->hasError('subject')) ? session()->get('verror')->showError('subject') : 'This is required' ?>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-12 col-md-12">

                                <div class="form-group">

                                    <textarea name="message" class="form-control" id="message2" cols="30" rows="5" required placeholder="Your Message"><?= old('message') ?></textarea>

                                    <div class="invalid-feedback <?= (session()->get('verror') && session()->get('verror')->hasError('message')) ? 'd-block' : '' ?>">

                                      <?= (session()->get('verror') && session()->get('verror')->hasError('message')) ? session()->get('verror')->showError('message') : 'This is required' ?>

                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-12 col-md-12">

                                <div class="g-recaptcha" data-sitekey="6LcW3oEbAAAAAKsqhUlQaITb1O2PiL6wKHw2b-Oa"></div>

                            </div>

                            <div class="col-lg-12 col-md-12">

                                <button type="submit" class="default-btn">Send Message</button>

                                <div id="msgSubmit2" class="h3 text-center hidden"></div>

                                <div class="clearfix"></div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="title" style="padding-top: 20px;">

                    <h3>Contact Us</h3>

                    <br>

                </div>

                <p>Feel free to talk to our online representative at any time you please using our Live Chat system on our website or one

                    of the below instant messaging programs.

                </p>

                <p>Please be patient while waiting for response. (24/7 Support!) Phone General Inquiries: <a href="tel:+91 92055 00525">+91 92055 00525</a></p>

                <div class="contact-image">

                    <img src="<?= base_url() ?>/assets/images/contactus-mainimg.png" alt="image">

                </div>

            </div>

        </div>

    </div>

</section>

<section class="contact-info-area pb-70">

    <div class="container">

        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-6">

                <div class="contact-info-box">

                    <div class="icon">

                        <i class='flaticon-email-1'></i>

                    </div>

                    <h3>Email</h3>
                    <p><a href="mailto:support1@gnecmedia.com"><span>support1@gnecmedia.com</span></a></p>
                    <p>&nbsp;</p>

                </div>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">

                <div class="contact-info-box">

                    <div class="icon">

                        <i class='flaticon-phone-ringing'></i>

                    </div>

                    <h3>Phone</h3>

                    <p><a href="tel:1234567890">+91 92055 00107</a></p>

                    <p><a href="tel:2414524526">+91 92055 00525</a></p>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- This is for SEO content section
--------------------Uncomment the below code and add content as per requirements. This section is page specific -----------------------------------------
-->
<!-- <section class="team-area ptb-50">
    <div class="container">
        <div class="section-title">
            <h2>Content Title Section</h2>
            <div class="bar"></div>
            <p>This is main content section</p>
        </div>
    </div>
</section> -->
<!-- End of SEO content section -->