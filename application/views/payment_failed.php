<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Payment - Car Forest</title>

        <?php
        $this->load->view('headerlink');
        ?>

        <!-- SWITCHER -->


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
                <h1 class="wow zoomInLeft" data-wow-delay="0.7s">Payment</h1>
                <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.7s">
                    <h3>Get In Touch With Us Now</h3>
                </div>
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow">
            <div class="container">
                <a href="<?php echo base_url('home'); ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a class="b-breadCumbs__page m-active">Payment</a>
            </div>
        </div><!--b-breadCumbs-->        

        <section class="b-error s-shadow">
            <div class="container">
                <h1 class="wow zoomInUp" data-wow-delay="0.7s">Oops!</h1>
                <h2 class="s-lineDownCenter wow zoomInUp" data-wow-delay="0.7s">Payment Failed</h2>
                <p class="wow zoomInUp" data-wow-delay="0.7s">Click the following button and retry for payment.If payment deduct from your account then don't worry it will refunded within 7 working days and contact administration department.</p>
                <div class="s-form wow zoomInUp" data-wow-delay="0.7s">
                    <a href="<?php echo base_url('carmela-registration-3'); ?>" class="btn m-btn" style="background-color: #F76D2B; color: #FFF">Retry Payment<span class="fa fa-angle-right"></span></a>
                </div>
            </div>
            <img alt="audi" src="images/backgrounds/404Bg.jpg" class="img-responsive center-block b-error-img" />
        </section><!--b-error-->

        <div class="b-features">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-offset-4 col-xs-6 col-xs-offset-6">
                        <ul class="b-features__items">
                            <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Low Prices, No Haggling</li>
                            <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Largest Car Dealership</li>
                            <li class="wow zoomInUp" data-wow-delay="0.3s" data-wow-offset="100">Multipoint Safety Check</li>
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
