<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Carmela Register - Car Forest</title>

        <?php
        $this->load->view('headerlink');
        ?>
        <!-- SWITCHER -->

        <style>            
            .b-contacts__form .active{
                border:1px solid #f76d2b;

            }
            .b-contacts__form .active button[type='button']{
                background-color: #555;
                color:#fff;
            }
            .b-contacts__form .active span{
                background-color: #f76d2b !important;
                color:white !important;
            }
            
            .mybtn{
                background-color: #555 !important;
                color:#fff !important;
                margin-top: 10px;
            }
            .mybtn span{
                background-color: #f76d2b !important;
                color:white !important;
            }
        </style>

    </head>
    <body class="m-home" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">

        <?php
        $this->load->view('header');
        ?>
        <!--b-topBar-->

        <?php
        $this->load->view('menu');
        ?>

        <section class="b-pageHeader">
            <div class="container">
                <h1 class="wow zoomInLeft" data-wow-delay="0.7s">Carmela Registration</h1>
                <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.7s">
                    <h3>The Largest Auto Dealer Online</h3>
                </div>
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow">
            <div class="container">
                <a href="<?php echo base_url('home'); ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url('carmela-registertaion-1'); ?>" class="b-breadCumbs__page m-active">Carmela Register</a>
            </div>
        </div><!--b-breadCumbs-->                

        <section class="b-contacts s-shadow">
            <div class="container" id="package_data">
                <?php
                    if( !$this->session->userdata('package_id') ){
                        $this->session->set_userdata('package_id',$package[0]->package_id);
                    } 
                    
                    // Online Payment Parameter
                    $description        = APPLICATION_NAME;
                    $txnid              = date("YmdHis");     
                    $key_id             = RAZORPAY_API_KEY;
                    $currency_code      = $currency_code;

                    $price = $this->md->my_select('tbl_package','*',array('package_id'=>$this->session->userdata('package_id')))[0]->price;
                    
                    $total              = ($price * 100); 	// 100 = 1 indian rupees  // change
                    $amount             = $total;
                    $merchant_order_id  = "CF_".date("Ymd").time();
                    $card_holder_name   = $this->session->userdata('owner_name');     // change
                    $email              = $this->session->userdata('carmela_email');   // change
                    $mobile             = $this->session->userdata('carmela_mobile');   // change
                    $name               = APPLICATION_NAME;
                ?>
                <div class="row">                    
                    <div class="col-xs-12">
                        <div class="b-contacts__form">
                            <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">Welcome, <?php echo $this->session->userdata('carmela_name') ?></h2> 
                            </header>
                            <p class=" wow zoomInUp" data-wow-delay="0.5s">Select any one package and pay online and enjoy panel.</p>
                            <div class="row s-form wow zoomInUp" data-wow-delay="0.5s">
                                <?php
                                   
                                
                                foreach ($package as $single) {
                                    ?>
                                    <div class="col-md-3">
                                        <div class="package_box active">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <h1><?php echo $single->name; ?></h1>
                                                    <h3>&#8377; <?php echo $single->price; ?> /-</h3>
                                                    <div>
                                                        <a href="<?php echo base_url('view-package'); ?>" target="_blank">View Details</a>
                                                    </div>
                                                    <?php
                                                        if( $single->package_id == $this->session->userdata('package_id') )
                                                        {
                                                    ?>
                                                    <button type="button" class="btn m-btn" style="margin: 10px 0px 10px 0px;background: #f76d2b;">Selected<span class="fa fa-angle-right" style="background: #555 !important;"></span></button>
                                                    <?php        
                                                        }
                                                        else{
                                                    ?>
                                                    <button type="button" onclick="change_package(<?php echo $single->package_id; ?>);" class="btn m-btn" style="margin: 10px 0px 10px 0px">Select Now<span class="fa fa-angle-right"></span></button>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <form name="razorpay-form" id="razorpay-form" action="<?php echo $callback_url; ?>" method="POST">
                        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
                        <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
                        <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
                        <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $description; ?>"/>
                        <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
                        <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
                        <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
                        <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>"/>
                        <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $amount; ?>"/>
                    </form>
                    <div class="col-xs-12 text-center" style="margin-top: 30px">
                        <button name="pay" id="pay-btn" onclick="razorpaySubmit(this);" class="btn m-btn mybtn wow zoomInUp">Pay Now<span class="fa fa-angle-right"></span></button>
                        <br/>
                        <br/>
                        <a class="wow zoomInUp" href="<?php echo base_url('carmela-registration-2') ?>">< Go Back</a>
                    </div>
                    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                    <script type="text/javascript">
                        var options = {
                            key:            "<?php echo $key_id; ?>",
                            amount:         "<?php echo $total; ?>",
                            name:           "<?php echo $name; ?>",
                            description:    "Order # <?php echo $merchant_order_id; ?>",
                            netbanking:     true,
                            currency:       "<?php echo $currency_code; ?>", // INR
                            prefill: {
                                name:       "<?php echo $card_holder_name; ?>",
                                email:      "<?php echo $email; ?>",
                                mobile:     "<?php echo $mobile; ?>"
                            },
                            notes: {
                                soolegal_order_id: "<?php echo $merchant_order_id; ?>",
                            },
                            handler: function (transaction) {
                                document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
                                document.getElementById('razorpay-form').submit();
                            },
                            "modal": {
                                "ondismiss": function(){
                                    //location.reload();
                                    base_url = '<?php echo base_url(); ?>';		
                                    window.location.href = base_url + 'payment-fail';
                                }
                            }
                        };

                        var razorpay_pay_btn, instance;
                        function razorpaySubmit(el) {
                            if(typeof Razorpay == 'undefined') {
                                setTimeout(razorpaySubmit, 300);
                                if(!razorpay_pay_btn && el) {
                                    razorpay_pay_btn    = el;
                                    el.disabled         = true;
                                    el.value            = 'Please wait...';  
                                }
                            } else {
                                if(!instance) {
                                    instance = new Razorpay(options);
                                    if(razorpay_pay_btn) {
                                    razorpay_pay_btn.disabled   = false;
                                    razorpay_pay_btn.value      = "Pay Now";
                                    }
                                }
                                instance.open();
                            }
                        }  
                    </script>
                </div>
            </div>
        </section><!--b-contacts-->
        
        <div class="b-features">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-offset-4 col-xs-6 col-xs-offset-6">
                        <ul class="b-features__items">
                            <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Low Prices, No Haggling</li>
                            <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Largest Car Dealership</li>
                            <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Multi-Point Safety Check</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!--b-features-->

        <?php
        $this->load->view('information');
        ?>
        <!--b-info-->

        <?php
        $this->load->view('footer');
        ?>
        <!--b-footer-->

        <?php
        $this->load->view('footerjs');
        ?>
    </body>

</html>

