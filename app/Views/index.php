<?php
// get the rigth protocol
$protocol = !empty($_SERVER['HTTPS']) ? 'https' : 'http';

// simply render canonical base on the current http host ( multiple host ) + requests
//$canonical = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$canonical = $protocol .'://'. $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if (strpos($canonical,'index.php/') !== false) {
    $canonical = str_replace("index.php/","",$canonical);
    header("Location: ".$canonical);
}else if(strpos($canonical,'index.php') !== false){
    $canonical = str_replace("index.php","",$canonical);
    header("Location: ".$canonical);
}

$metaTitle = 'GNEC Media: Top Bulk SMS, App and Web Development Company';
$metaKeywords = 'Bulk SMS Service, Web development services, web development company, website development company, app development company, web design services, GNEC Media';
$metaDescription = 'GNEC Media is an industry-leading agency which offers reliable bulk SMS, app development, web development services for your exceptional business growth.';
if(isset($metaData)){
    if(isset($metaData['meta_title']) && trim($metaData['meta_title']) != ''){
        $metaTitle = $metaData['meta_title'];
    }
    if(isset($metaData['meta_keywords']) && trim($metaData['meta_keywords']) != ''){
        $metaKeywords = $metaData['meta_keywords'];
    }
    if(isset($metaData['meta_description']) && trim($metaData['meta_description']) != ''){
        $metaDescription = $metaData['meta_description'];
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <?php
        /*if (strpos($canonical,'www.') !== false) {
            $canonical = str_replace("www.","",$canonical);
            echo '<script type="text/javascript">
                            window.location = "'.$canonical.'";
                        </script>';
        }*/
        ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= $metaTitle ?></title>

        <meta name="description" content="<?= $metaDescription ?>">
        <meta name="author" content="Gnec">
        <meta name="DC.title" content="GNEC Media" />
        <meta name="geo.region" content="IN-UP" />
        <meta name="geo.placename" content="Noida" />
        
        <link rel="canonical" href="<?= $canonical ?>" />

        <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/android-icon-48x48.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url() ?>/assets/images/android-icon-48x48.png">
        <link rel="icon" type="image" sizes="192x192" href="images/android-icon-48x48.png">

        <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>/assets/css/animate.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>/assets/css/meanmenu.css">
        <link rel="stylesheet" href="<?= base_url() ?>/assets/css/boxicons.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>/assets/css/flaticon.css">
        <link rel="stylesheet" href="<?= base_url() ?>/assets/css/odometer.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>/assets/css/nice-select.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>/assets/css/jquery.fancybox.css">
        <link rel="stylesheet" href="<?= base_url() ?>/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>/assets/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
        <link rel="stylesheet" href="<?= base_url() ?>/assets/css/custom_css.css">
        <link rel="stylesheet" href="<?= base_url() ?>/assets/css/responsive.css">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MXVVW37');</script>
<!-- End Google Tag Manager -->

        <?= (isset($pageCss)) ? $this->include($pageCss) : '' ?>
    </head>
    <body>
        <!-- <div class="preloader">
            <div class="loader">
               <div class="shadow"></div>
               <div class="box"></div>
            </div>
            </div> -->
        <div id="header-top">
            <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MXVVW37"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 d-none d-md-block">
                        <ul class="header-social-icon">
                            <li class="connect-title">Stay Connected :</li>
                            <li><a href="https://www.facebook.com/gnecmedia" target="_blank"><i class="bx bxl-facebook"></i></a></li>
                            <li><a href="https://twitter.com/gnecmedia" target="_blank"><i class="bx bxl-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/gnec_media/" target="_blank"><i class="bx bxl-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/gnecmedia/" target="_blank"><i class="bx bxl-linkedin"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UC_JP6cFu0AMw_Z7d-vWbsIw" target="_blank"><i class="bx bxl-youtube"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="float-right">
                            <a href="tel:+919205500107" class="call-phone">Sales : <span>+91 920 550 0107</span></a> &nbsp; | &nbsp;
                            <a href="tel:+919205500525" class="call-phone">Support : <span>+91 92055 00525</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-area">
            <div class="main-responsive-nav">
                <div class="container">
                    <div class="main-responsive-menu">
                        <div class="logo">
                            <a href="<?= base_url() ?>"><img src="<?= base_url() ?>/assets/images/gneclogo.png" alt="Gnec Media"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-navbar">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url() ?>/assets/images/gneclogo.png" alt="Gnec Media"></a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>/about-us" class="nav-link">
                                    About Us
                                    <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="<?= base_url() ?>/about-us" class="nav-link">Company Profile</a></li>
                                        <li class="nav-item"><a href="<?= base_url() ?>/our-team" class="nav-link">Our Team</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>/services" class="nav-link">
                                    Technologies
                                    <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="<?= base_url() ?>/mobile-application-development" class="nav-link">App Development</a>
                                        </li>
                                        <li class="nav-item"><a href="<?= base_url() ?>/website-development" class="nav-link">Web Development</a></li>
                                        <li class="nav-item"><a href="<?= base_url() ?>/website-designing" class="nav-link">Website Designing</a></li>
                                        <li class="nav-item"><a href="<?= base_url() ?>/e-commerce" class="nav-link">E-commerce Development</a></li>
                                        <li class="nav-item"><a href="<?= base_url() ?>/graphic-designing" class="nav-link">Graphic Design</a></li>
                                        <li class="nav-item"><a href="<?= base_url() ?>/uiux-design" class="nav-link">UI/UX Design</a></li>
                                        <li class="nav-item"><a href="<?= base_url() ?>/video-editing" class="nav-link">Video Editing</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a href="<?= base_url() ?>/bulk-sms-service" class="nav-link">Bulk SMS</a></li>
                                <li class="nav-item">
                                    <a href="<?= base_url() ?>/digital-marketing" class="nav-link">
                                    Digital Marketing
                                    <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="<?= base_url() ?>/seo-services" class="nav-link">SEO Services</a></li>
                                        <li class="nav-item"><a href="<?= base_url() ?>/ppc-services" class="nav-link">PPC Services</a></li>
                                        <li class="nav-item"><a href="<?= base_url() ?>/smo-services" class="nav-link">SMO Services</a></li>
                                        <li class="nav-item"><a href="<?= base_url() ?>/google-adwords" class="nav-link">Google Ad Words</a></li>
                                        <li class="nav-item"><a href="<?= base_url() ?>/facebook-advertisements" class="nav-link">Facebook Advertisement</a></li>
                                        <li class="nav-item"><a href="<?= base_url() ?>/bulk-email-marketing" class="nav-link">Email Marketing</a></li>
                                        <li class="nav-item"><a href="<?= base_url() ?>/lead-generation-services" class="nav-link">Lead Generation</a></li>
                                        <li class="nav-item"><a href="<?= base_url() ?>/voice-call" class="nav-link">Voice Call/OBD/IVR</a></li>
                                    </ul>
                                </li>
                                <!--<li class="nav-item"><a href="blog" class="nav-link">Blog</a></li>-->
                                <li class="nav-item"><a href="<?= base_url() ?>/contact-us" class="nav-link">Contact</a></li>
                                <li class="nav-item"><a href="<?= base_url() ?>/paynow" class="nav-link btn btn-success paynow">Pay Now</a></li>
                            </ul>
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <div class="side-menu-btn">
                                        <i class="bx bx-phone" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="option-inner">
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <div class="side-menu-btn">
                                        <i class="bx bx-phone" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebarModal modal right fade" id="sidebarModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-bs-dismiss="modal"><i class='bx bx-x'></i></button>
                    <div class="modal-body">
                        <div class="title">
                            <h3>
                                <a href="<?= base_url() ?>"><img src="<?= base_url() ?>/assets/images/gneclogo.png" alt="Gnec Media" style="max-width: 100px;"></a>
                            </h3>
                            <br>
                        </div>
                        <div class="contact-form">
                            <div class="title">
                                <span>Get In Touch</span>
                                <h3>Ready To Get Started?</h3>
                            </div>
                            <form id="contactForm" method="post">
                                <?= csrf_field() ?>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control" required placeholder="Name *">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" required placeholder="Email *">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="phone" required class="form-control" placeholder="Phone *">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="subject" class="form-control" required placeholder="Subject *">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" cols="30" rows="5" required placeholder="Your Message *"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div id="contactForm-recaptchaBox" class="g-recaptcha" data-sitekey="6LcW3oEbAAAAAKsqhUlQaITb1O2PiL6wKHw2b-Oa"></div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn" id="btn-con-submit">Send Message</button>
                                        <div id="msgSubmit"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="sidebar-contact-info">
                            <h6>Contact for Sales:</h6>
                            <br />
                            <p style="font-size: 26px;"><span style="color: #000000;"><a href="tel:+91 9205500107">+91 920 550 0107</a>
                                <span>OR</span>
                                <a href="mailto:support1@gnecmedia.com"><span>support1@gnecmedia.com</span></a>
                                <span>&nbsp;</span> </span></p>
                        </div>
                        <ul class="social-list">
                            <li><a href="https://www.facebook.com/gnecmedia" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                            <li><a href="https://twitter.com/gnecmedia" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                            <li><a href="https://www.instagram.com/gnec_media/" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                            <li><a href="https://www.linkedin.com/company/gnecmedia/" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UC_JP6cFu0AMw_Z7d-vWbsIw" target="_blank"><i class='bx bxl-youtube'></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?= (isset($page)) ? $this->include($page) : '' ?>
        <div class="subscribe-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="subscribe-content text-white">
                            <p style="font-size: 35px;"><span style="color: #000000;"><strong>Let's make something great together</strong></span></p>
                            <p>Get in touch with us and send some basic info for a quick quote.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="float-right">
                            <a href="<?= base_url() ?>/contact-us" class="default-btn">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <p style="font-size: 20px;"><span style="color: #000000;"><strong>About Us</strong></span></p>
                            <p style="text-align: justify;">The high-calibrated team at GNEC Media aims to grow and help you grow as well. From social media to website development, technologies change, our experts change, time and budgets change but one aspect of work that remains constant is our motto to help our clients grow.</p>
                            <ul class="footer-social">
                                <li><a href="https://www.facebook.com/gnecmedia" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                                <li><a href="https://twitter.com/gnecmedia" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                                <li><a href="https://www.instagram.com/gnec_media/" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                                <li><a href="https://www.linkedin.com/company/gnecmedia/" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UC_JP6cFu0AMw_Z7d-vWbsIw" target="_blank"><i class='bx bxl-youtube'></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="single-footer-widget single-footer-widget1">
                            <p style="font-size: 20px;"><span style="color: #000000;"><strong>Important Links</strong></span></p>
                            <ul class="quick-links">
                                <li><a href="<?= base_url() ?>/about-us">Company Profile</a></li>
                                <li><a href="<?= base_url() ?>/our-team">Our Team</a></li>
                                <!-- <li><a href="#">Careers</a></li> -->
                                <!--<li><a href="blog">Blog</a></li>-->
                                <li><a href="<?= base_url() ?>/contact-us">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    
                      <div class="col-lg-2 col-sm-6">
                        <div class="single-footer-widget single-footer-widget1">
                            <p style="font-size: 20px;"><span style="color: #000000;"><strong>Featured Service</strong></span></p>
                            <ul class="quick-links">
                                <li><a href="<?= base_url() ?>/website-development">Web Development</a></li>
                                <li><a href="<?= base_url() ?>/mobile-application-development">App Development</a></li>
                                <li><a href="<?= base_url() ?>/bulk-sms-service">Bulk SMS</a></li>
                                <li><a href="<?= base_url() ?>/e-commerce">E-Commerce Development</a></li>
                                <li><a href="<?= base_url() ?>/graphic-designing">Graphic Designing</a></li>
                                <li><a href="<?= base_url() ?>/seo-services">SEO Services</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="single-footer-widget single-footer-widget1">
                            <p style="font-size: 20px;"><span style="color: #000000;"><strong>Location Services</strong></span></p>
                            <ul class="quick-links">
                                <li><a href="<?= base_url() ?>/bulk-sms-service">Bulk SMS Service in Noida</a></li>
                                <li><a href="<?= base_url() ?>/bulk-sms-service-provider-in-delhi">Bulk SMS Service in Delhi</a></li>
                                <li><a href="<?= base_url() ?>/bulk-sms-service-provider-in-kolkata">Bulk SMS Service in Kolkata</a></li>
                                <li><a href="<?= base_url() ?>/bulk-sms-service-provider-in-bangalore">Bulk SMS Service in Bangalore</a></li>
                                <li><a href="<?= base_url() ?>/bulk-sms-service-provider-in-chennai">Bulk SMS Service in Chennai</a></li>
                                <li><a href="<?= base_url() ?>/bulk-sms-service-provider-in-mumbai">Bulk SMS Service in Mumbai</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-footer-widget">
                            <p style="font-size: 20px;"><span style="color: #000000;"><strong>Contact Us</strong></span></p>
                            <ul class="footer-contact-info">
                                <li>
                                    <i class='bx bxs-phone'></i>
                                    <span>Sales</span>
                                    <a href="tel:+91 9205500107">+91 920 550 0107</a>
                                </li>
                                <li>
                                    <i class='bx bxs-phone'></i>
                                    <span>Support</span>
                                    <a href="tel:+91 9205500525">+91 920 550 0525</a>
                                </li>
                                <li>
                                    <i class='bx bx-envelope'></i>
                                    <span>Email</span>
                                    <a href="mailto:support1@gnecmedia.com"><span>support1@gnecmedia.com</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="copyright-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-5">
                        <p>&copy; Copyright 2022 - GNEC Media. All Rights Reserved. | <a href="<?= base_url() ?>/privacy-policy">Privacy Policy</a></p>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <ul class="payment_logos">
                           <li class="white">Payments
                              We Accept
                           </li>
                           <li><img src="<?= base_url() ?>/assets/images/parallax_bg1.png" alt="bulk sms service provider Noida"></li>
                           <li><img src="<?= base_url() ?>/assets/images/payment_logo2.png" alt="bulk sms service provider"></li>
                           <li><img src="<?= base_url() ?>/assets/images/payment_logo3.png" alt="Website Development Company"></li>
                           <li><img src="<?= base_url() ?>/assets/images/payment_logo4.png" alt="Website Development Company in Noida"></li>
                           <li><img src="<?= base_url() ?>/assets/images/payment_logo5.png" alt="Web Development Services in Noida"></li>
                        </ul>                
                    </div>
                </div>
            </div>
        </div>
        <div class="go-top">
            <i class='bx bx-up-arrow-alt'></i>
        </div>
        <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/jquery.meanmenu.js"></script>
        <script src="<?= base_url() ?>/assets/js/owl.carousel.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/jquery.appear.js"></script>
        <script src="<?= base_url() ?>/assets/js/odometer.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/nice-select.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/jquery.fancybox.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/jquery.mixitup.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/wow.min.js"></script>
        <script src="<?= base_url() ?>/assets/js/main.js"></script>
        <?= (isset($pageScript)) ? $this->include($pageScript) : '' ?>
        <script>
        $(function(){
            $('#popupform').submit(function(e){
                e.preventDefault();
                $('#resmsg').empty();
                $('#btn-save').text('Processing');
                const widgetId1 = getWidgetId('service-recaptcha');
                $.ajax({
                    url: "<?= base_url('/serveice-request') ?>",
                    type: "post",
                    data: $('#popupform').serialize(),
                    success: function(data) {
                        if($.trim(data) == 'empty'){
                            $('#resmsg').empty().append('<div class="alert alert-danger">Please complete the form marked with *</div>');
                            $('#btn-save').text('Submit');
                            grecaptcha.reset(widgetId1);
                        }else if($.trim(data) == 'captcha'){
                            $('#resmsg').empty().append('<div class="alert alert-danger">Please verify you are not a robot</div>');
                            $('#btn-save').text('Submit');
                            grecaptcha.reset(widgetId1);
                        }else{
                            $('#resmsg').empty().append('<div class="alert alert-success">Thank you! We have received your query. We will get back to you soon.</div>');
                            $('#btn-save').text('Submit');
                            $("#popupform")[0].reset();
                            grecaptcha.reset(widgetId1);
                        }
                    }
                });
            });

            $('#contactForm').submit(function(e){
                e.preventDefault();
                $('#msgSubmit').empty();
                $('#btn-con-submit').text('Processing');
                const widgetId1 = getWidgetId('contactForm-recaptchaBox');
                $.ajax({
                    url: "<?= base_url('/contact-query') ?>",
                    type: "post",
                    data: $('#contactForm').serialize(),
                    success: function(data) {
                        if($.trim(data) == 'empty'){
                            $('#msgSubmit').empty().append('<div class="alert alert-danger">Please complete the form marked with *</div>');
                            $('#btn-con-submit').text('Submit');
                            grecaptcha.reset(widgetId1);
                        }else if($.trim(data) == 'captcha'){
                            $('#msgSubmit').empty().append('<div class="alert alert-danger">Please verify you are not a robot</div>');
                            $('#btn-con-submit').text('Submit');
                            grecaptcha.reset(widgetId1);
                        }else{
                            $('#msgSubmit').empty().append('<div class="alert alert-success">Thank you! We have received your query. We will get back to you soon.</div>');
                            $('#btn-con-submit').text('Submit');
                            $("#contactForm")[0].reset();
                            grecaptcha.reset(widgetId1);
                        }
                    }
                });
            });
        });
        
        function getWidgetId(elementId) {
            const recaptchaBoxes = document.querySelectorAll('.g-recaptcha');
            const targetBox = document.querySelector(`#${elementId}`);
            for (let i = 0; i < recaptchaBoxes.length; i++) {
                if (recaptchaBoxes[i].id === targetBox.id) {
                    return i;
                }
            }
        }


         
        </script>

        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:2188193,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>
        <script type="application/ld+json">
            {
                "@context": "http://schema.org/",
                "@type": "Organization",
                "url": "https://gnecmedia.com",
                "logo": "<?= base_url() ?>/assets/images/gneclogo.png"
            }
        </script>
        <script>
            _linkedin_partner_id = "694011";
            window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
            window._linkedin_data_partner_ids.push(_linkedin_partner_id);
        </script>
        <script>
            (function(){var s = document.getElementsByTagName("script")[0];
            var b = document.createElement("script");
            b.type = "text/javascript";b.async = true;
            b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
            s.parentNode.insertBefore(b, s);})();
        </script>
        <noscript>
            <img height="1" width="1" style="display:none;" alt="bulk sms service provider Noida" src="https://px.ads.linkedin.com/collect/?pid=694011&fmt=gif" />
        </noscript>
            
        <!--Start of Tawk.to Script-->
        <script>
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/5e5a3577a89cda5a18889c18/default';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        </script>

        <!--04-06-2021-->
        <script>
          window.addEventListener('load', function() {
            var x = 0;
            var myVar = setInterval(function() {
              if (x == 0) {
                if (jQuery('.text-success').is(":visible")) {
                  gtag('event', 'conversion', {
                    'send_to': 'AW-389514076/2JDHCJP9kZICENyG3rkB'
                  });
                  clearInterval(myVar);
                  x = 1;
                }
              }
            }, 1000);
          });

        </script>
        <script>
          window.addEventListener('load', function() {
            jQuery('[href*="tel:+91"]').click(function() {
              gtag('event', 'conversion', {
                'send_to': 'AW-389514076/0f2dCNXS1LUCENyG3rkB'
              });
            })
            jQuery('[href*="/paynow"]').click(function() {
              gtag('event', 'conversion', {
                'send_to': 'AW-389514076/hzPUCL2AkpICENyG3rkB',
                'transaction_id': ''
              });
            })
          })

        </script>

        <script>
          Tawk_API = Tawk_API || {};
          Tawk_API.onChatStarted = function() {
            gtag('event', 'conversion', {
              'send_to': 'AW-389514076/pZ65CLCI85ECENyG3rkB'
            });
          };

        </script>
    </body>
</html>