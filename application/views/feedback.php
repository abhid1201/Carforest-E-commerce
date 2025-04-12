<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Feedback - Car Forest</title>

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
                <h1 class="wow zoomInLeft" data-wow-delay="0.7s">Feedback</h1>
                <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.7s">
                    <h3>The Largest Auto Dealer Online</h3>
                </div>
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow">
            <div class="container">
                <a href="<?php echo base_url('home'); ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url('feedback'); ?>" class="b-breadCumbs__page m-active">Feedback</a>
            </div>
        </div><!--b-breadCumbs-->              

        <section class="b-contacts s-shadow">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-offset-1">                    
                        <div class="col-xs-5">
                            <div class="b-contacts__form">
                                <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                                    <h2 class="s-titleDet">Suggest Us</h2> 
                                </header>
                                <p class=" wow zoomInUp" data-wow-delay="0.5s">Give your Experience to our services.</p>
                                <div id="success"></div>
                                <form id="contactForm" action="" method="post" novalidate class="s-form wow zoomInUp" data-wow-delay="0.5s">                                
                                    <input type="text" placeholder="Enter Your Name" name="user-name" id="user-name" class="<?php
                                    if (form_error('user-name')) {
                                        echo 'invalid';
                                    }
                                    ?>" value="<?php
                                           if (!isset($success) && set_value('user-name')) {
                                               echo set_value('user-name');
                                           }
                                           ?>"/>
                                    <p class="errmsg">
                                        <?php
                                        echo form_error('user-name');
                                        ?>
                                    </p>                          
                                    <textarea id="user-feedback" name="user-feedback" placeholder="Give Your Feedback" class="<?php
                                    if (form_error('user-feedback')) {
                                        echo 'invalid';
                                    }
                                    ?>"><?php
                                                  if (!isset($success) && set_value('user-feedback')) {
                                                      echo set_value('user-feedback');
                                                  }
                                                  ?></textarea>
                                    <p class="errmsg">
                                        <?php
                                        echo form_error('user-feedback');
                                        ?>
                                    </p>
                                    <button type="submit" name="send" value="yes" class="btn m-btn">SUBMIT NOW<span class="fa fa-angle-right"></span></button>
                                </form>                            
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="b-feedback_photo">
                            <img class="img-responsive center-block wow zoomInUp" data-wow-delay="0.5s" alt="best" src="<?php echo base_url(); ?>assets/media/feedback/martin.png"/>
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