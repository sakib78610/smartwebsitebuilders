<?php

    $paypalActiveTab = "1b";

    if(isset($_GET['tb']) && trim($_GET['tb']) == '2b')

    {

        $paypalActiveTab = "2b";

    }

    ?>    

<div class="page-header" style="background:url(<?= base_url() ?>/assets/images/bulk-sms.jpg) no-repeat;">

    <div class="container">

        <div class="title-box">

            <h1 class="title">Pay Now </h1>

            <div class="breadcrumb">                    

                <span> </span>

            </div>

        </div>

    </div>

    <div class="shape-bottom">

        <img src="<?= base_url() ?>/assets/images/price-shape.svg" alt="shape" class="bottom-shape img-fluid">

    </div>

</div>

<section class="ptb-50">

    <div class="container">

    <div class="row">

    <div class="col-lg-12">

        <div class="paygstBox">

            <h2>Online payment here</h2>

            <div>

                <ul class="nav nav-tabs">(Choose Payment Option)</ul>

                <ul  class="nav nav-tabs">

                    <li class="nav-item main_tab <?= ($paypalActiveTab == '1b') ? 'active' : '' ?>" id="maintab1">

                        <a class="nav-link" href="javascript:void(0);" onclick="Activepaypal()" data-toggle="tab" id="paypaltab">Paypal</a>

                    </li>

                    <li class="nav-item main_tab <?= ($paypalActiveTab == '2b') ? 'active' : '' ?>" id="maintab2">

                        <a class="nav-link" href="javascript:void(0);" onclick="Activeccavenue()" data-toggle="tab" id="cctab">CCAvenue</a>

                    </li>

                </ul>

            </div>

            <div id="paypal" style="display:block;">

                <ul  class="nav nav-tabs">

                    <li class="nav-item sub_tab <?= ($paypalActiveTab == '1b') ? 'active' : '' ?>">

                        <a class="nav-link payment_type" href="javascript:void(0);" data-target="#1b" id="pwogst">International Payment</a>

                    </li>

                    <li class="nav-item sub_tab <?= ($paypalActiveTab == '2b') ? 'active' : '' ?>">

                        <a class="nav-link payment_type" href="javascript:void(0);" data-target="#2b" id="pwogst1">Indian Payment</a>

                    </li>

                </ul>

                <div class="tab-content clearfix" >

                    <div class="tab-pane sub_tab_pan fade show <?= ($paypalActiveTab == '1b') ? 'active' : '' ?>" id="1b">

                        <form method="post" action="<?= base_url() ?>/process-init">

                            <?= csrf_field() ?>

                            <div class="form-group">

                                <label>Name *</label>

                                <input type="text" class="form-control" name="purchase_info" id="purchase_infowog" required="">

                            </div>

                            <div class="form-group">

                                <label>Contact Number *</label>

                                <input type="text" class="form-control" name="contact_number" id="contact_numberwog" required="">

                            </div>

                            <div class="form-group">

                                <label>Currency *</label>

                                <select class="form-control" name="currency_code" id="currency_codewog" required="">

                                    <option value="AUD">Australian dollar</option>

                                    <option value="BRL">Brazilian real</option>

                                    <option value="CAD">Canadian dollar</option>

                                    <option value="CZK">Czech koruna</option>

                                    <option value="DKK">Danish krone</option>

                                    <option value="EUR">Euro</option>

                                    <option value="HKD">Hong Kong dollar</option>

                                    <option value="HUF">Hungarian forint</option>

                                    <option value="INR">Indian rupee</option>

                                    <option value="ILS">Israeli new shekel</option>

                                    <option value="JPY">Japanese yen</option>

                                    <option value="MYR">Malaysian ringgit</option>

                                    <option value="MXN">Mexican peso</option>

                                    <option value="TWD">New Taiwan dollar</option>

                                    <option value="NZD">New Zealand dollar</option>

                                    <option value="NOK">Norwegian krone</option>

                                    <option value="PHP">Philippine peso</option>

                                    <option value="PLN">Polish złoty</option>

                                    <option value="GBP">Pound sterling</option>

                                    <option value="RUB">Russian ruble</option>

                                    <option value="SGD">Singapore dollar</option>

                                    <option value="SEK">Swedish krona</option>

                                    <option value="CHF">Swiss franc</option>

                                    <option value="THB">Thai baht</option>

                                    <option value="USD">United States dollar</option>

                                </select>

                            </div>

                            <div class="form-group">

                                <label>Amount *</label>

                                <input type="text" class="form-control allow_decimal" name="payable_amount" id="payable_amountwog" required="">

                                <input type="hidden" name="gst_type" id="gst_typewog" value="0">

                                <input type="hidden" name="gst_value" id="gst_valuewog" value="0">

                                <input type="hidden" name="gst_added" id="gst_addedwog" value="0">

                                <input type="hidden" name="payment_gross" id="payment_grosswog" value="0">

                                <input type="hidden" name="from" value="without-gst">

                            </div>

                            <!-- <div class="form-group">

                                <div class="g-recaptcha" data-sitekey="6LcW3oEbAAAAAKsqhUlQaITb1O2PiL6wKHw2b-Oa"></div>

                            </div> -->

                            <div class="paygstbtn">

                                <button type="submit" class="default-btn" name="ppinternation">Pay Now</button>

                            </div>

                        </form>

                    </div>

                    <div class="tab-pane sub_tab_pan fade show <?= ($paypalActiveTab == '2b') ? 'active' : '' ?>" id="2b">

                        <form method="post" action="<?= base_url() ?>/process-init">

                            <?= csrf_field() ?>

                            <div class="form-group">

                                <label>Name *</label>

                                <input type="text" class="form-control" name="purchase_info" id="purchase_infowg" required="">

                            </div>

                            <div class="form-group">

                                <label>Contact Number *</label>

                                <input type="text" class="form-control" name="contact_number" id="contact_numberwg" required="">

                            </div>

                            <div class="form-group">

                                <label>Amount *</label>

                                <input type="text" class="form-control allow_decimal" name="payable_amount" id="payable_amountwg" required="">

                                <input type="hidden" name="from" value="with-gst">

                                <input type="hidden" name="gst_type" id="gst_typewg" value="2">

                                <input type="hidden" name="gst_value" id="gst_valuewg" value="18">

                                <input type="hidden" name="currency_code" value="INR">

                            </div>

                            <div class="form-group">

                                <label>18% GST</label>

                                <input type="text" class="form-control" name="gst_added" id="gst_addedwg" value="0" readonly="">

                            </div>

                            <div class="form-group">

                                <label>Total Payable</label>

                                <input type="text" class="form-control" name="payment_gross" id="payment_grosswg" value="0" readonly="">

                            </div>

                            <!-- <div class="form-group">

                                <div class="g-recaptcha" data-sitekey="6LcW3oEbAAAAAKsqhUlQaITb1O2PiL6wKHw2b-Oa"></div>

                            </div> -->

                            <div class="paygstbtn">

                                <button type="submit" class="default-btn" name="ppdomestic">Pay Now</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <div  id="ccavenue" style="display:none;">

                <ul  class="nav nav-tabs">

                    <li class="nav-item active">

                        <a class="nav-link" href="javascript:void(0);" data-toggle="tab" id="pwogst">Indian Payment</a>

                    </li>

                </ul>

                <div class="tab-content clearfix" >

                    <div class="tab-pane <?= ($paypalActiveTab == '1b') ? 'active' : '' ?>" id="11b">

                        <form method="POST" name="payform" action="<?= base_url() ?>/ccavRequestHandler">

                            <?= csrf_field() ?>

                            <input type="hidden" name="tid" id="tid" readonly />

                            <input type="hidden" name="merchant_id" value="167313"/>

                            <input type="hidden" name="currency" value="INR"/>

                            <input type="hidden" name="order_id" id="order_id" value="123"/>

                            <input type="hidden" name="redirect_url" value="https://www.gnecmedia.com/ccavResponseHandler"/>

                            <input type="hidden" name="cancel_url" value="https://www.gnecmedia.com/ccavResponseHandler"/>

                            <input type="hidden" name="language" value="EN"/>

                            <div class="form-group">

                                <label>Name *</label>

                                <input type="text" class="form-control" placeholder="Name*" name="billing_name" minlength="2" required />

                            </div>

                            <div class="form-group">

                                <label>Contact Number *</label>

                                <input type="number" class="form-control" placeholder="Phone*" name="billing_tel" minlength="10" required />

                            </div>

                            <div class="form-group">

                                <label>Email *</label>

                                <input type="email" class="form-control" placeholder="Email*" name="billing_email" required />

                            </div>

                            <div class="form-group">

                                <label>Address *</label>

                                <textarea class="form-control" placeholder="Address*" name="billing_address" required></textarea>

                            </div>

                            <div class="form-group">

                                <label>Country *</label>

                                <input type="text" class="form-control" placeholder="Country*" name="billing_country" required />

                            </div>

                            <div class="form-group">

                                <label>State *</label>

                                <input type="text" class="form-control" placeholder="State*" name="billing_state" required />

                            </div>

                            <div class="form-group">

                                <label>City *</label>

                                <input type="text" class="form-control" placeholder="City*" name="billing_city" required />

                            </div>

                            <div class="form-group">

                                <label>Zip *</label>

                                <input type="text" class="form-control" placeholder="Zip*" name="billing_zip" minlength="6" required />

                            </div>

                            <div class="form-group">

                                <label>Amount *</label>

                                <input type="text" class="form-control allow_decimal" name="payable_amount" id="payable_amountwgcc" required="">

                                <input type="hidden" name="from" value="with-gstcc">

                                <input type="hidden" name="gst_type" id="gst_typewgcc" value="2">

                                <input type="hidden" name="gst_value" id="gst_valuewgcc" value="18">

                                <input type="hidden" name="currency_code" value="INR">

                            </div>

                            <div class="form-group">

                                <label>18% GST *</label>

                                <input type="text" class="form-control" name="gst_added" id="gst_addedwgcc" value="0" readonly="">

                            </div>

                            <div class="form-group">

                                <label>Total Payable *</label>

                                <input type="text" class="form-control" name ="amount" id="payment_grosswgcc" value="0" readonly="">

                            </div>

                            <!-- <div class="form-group">

                                <div class="g-recaptcha" data-sitekey="6LcW3oEbAAAAAKsqhUlQaITb1O2PiL6wKHw2b-Oa"></div>

                            </div> -->

                            <div class="paygstbtn">

                                <button type="submit" class="default-btn" name="ccav">Pay Now</button>

                            </div>

                        </form>

                    </div>

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