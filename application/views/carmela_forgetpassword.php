<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Carmela Forget Password - Car Forest</title>

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
                <h1 class="wow zoomInLeft" data-wow-delay="0.7s">Carmela Forget Password</h1>
                <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.7s">
                    <h3>The Largest Auto Dealer Online</h3>
                </div>
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow">
            <div class="container">
                <a href="<?php echo base_url('home'); ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url('carmela-forget-password'); ?>" class="b-breadCumbs__page m-active">Carmela Forget Password</a>
            </div>
        </div><!--b-breadCumbs-->                

        <section class="b-contacts s-shadow">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3">
                        <div class="b-contacts__form">
                            <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">Recover Carmela Password ?</h2> 
                            </header>
                            <p class=" wow zoomInUp" data-wow-delay="0.5s">Enter Carmela email. We will send password recover link on your email.</p>
                            <div id="success"></div>
                            <form id="contactForm" novalidate class="s-form wow zoomInUp" data-wow-delay="0.5s">
                                <div>
                                    <input type="email" placeholder="Carmela Address" value="" name="user-email" id="user-email" />
                                </div>                                
                                <div>                                    
                                    <a href="<?php echo base_url('carmela-login'); ?>" class="frgt_psd"><i class="fa-solid fa-angles-left"></i> Back to login</a>
                                </div>
                                <div>
                                    <button type="submit" class="btn m-btn">SEND NOW<span class="fa fa-angle-right"></span></button>                                    
                                </div>
                            </form>                            
                        </div>
                    </div>                      
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

