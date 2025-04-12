<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Contact Us - Car Forest</title>

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
                <h1 class="wow zoomInLeft" data-wow-delay="0.7s">Contact Us</h1>
                <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.7s">
                    <h3>Get In Touch With Us Now</h3>
                </div>
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow">
            <div class="container">
                <a href="<?php echo base_url('home'); ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url('contact-us'); ?>" class="b-breadCumbs__page m-active">Contact Us</a>
            </div>
        </div><!--b-breadCumbs-->        

        <div class="b-map wow zoomInUp" data-wow-delay="0.5s">            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.4209852217004!2d72.80040341485699!3d21.175428985919165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04ddfbf0c0543%3A0xf26a6b32633a9b23!2sMLP%20College%20Of%20Computer%20Science%20And%20IT!5e0!3m2!1sen!2sin!4v1674987348276!5m2!1sen!2sin" width=100% height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            
        </div><!--b-map-->

        <section class="b-contacts s-shadow">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="b-contacts__form">
                            <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">Send an Enquiry</h2> 
                            </header>
                            <p class=" wow zoomInUp" data-wow-delay="0.5s">Fill the following form & seat back relax. We will contact you within 24 hours via email.</p>
                            <div id="success"></div>
                            <form id="contactForm" action="" method="post" novalidate class="s-form wow zoomInUp" data-wow-delay="0.5s" >                                
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

                                <input type="text" placeholder="Enter Your Email Address" name="user-email" id="user-email" class="<?php
                                if (form_error('user-email')) {
                                    echo 'invalid';
                                }
                                ?>" value="<?php
                                       if (!isset($success) && set_value('user-email')) {
                                           echo set_value('user-email');
                                       }
                                       ?>"/>
                                <p class="errmsg">
                                    <?php
                                    echo form_error('user-email');
                                    ?>
                                </p>
                                <input type="text" placeholder="Enter Your Phone Number" name="user-phone" id="user-phone" class="<?php
                                if (form_error('user-phone')) {
                                    echo 'invalid';
                                }
                                ?>" value="<?php
                                       if (!isset($success) && set_value('user-phone')) {
                                           echo set_value('user-phone');
                                       }
                                       ?>"/>
                                <p class="errmsg">
                                    <?php
                                    echo form_error('user-phone');
                                    ?>
                                </p>
                                <input type="text" placeholder="Subject" name="user-subject" id="user-subject" class="<?php
                                if (form_error('user-subject')) {
                                    echo 'invalid';
                                }
                                ?>" value="<?php
                                       if (!isset($success) && set_value('user-subject')) {
                                           echo set_value('user-subject');
                                       }
                                       ?>"/>
                                <p class="errmsg">
                                    <?php
                                    echo form_error('user-subject');
                                    ?>
                                </p>
                                <textarea id="user-message" name="user-message" placeholder="Put Your Message" class="<?php
                                if (form_error('user-subject')) {
                                    echo 'invalid';
                                }
                                ?>"><?php
                                              if (!isset($success) && set_value('user-message')) {
                                                  echo set_value('user-message');
                                              }
                                              ?></textarea>
                                <p class="errmsg">
                                    <?php
                                    echo form_error('user-message');
                                    ?>
                                </p>
                                <button type="submit" name="submit" value="yes" class="btn m-btn">SUBMIT NOW<span class="fa fa-angle-right"></span></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="b-contacts__address-info">
                            <h2 class="s-titleDet wow zoomInUp" data-wow-delay="0.5s">Get in Touch</h2>
                            <address class="b-contacts__address-info-main wow zoomInUp" data-wow-delay="0.5s">
                                <div class="b-contacts__address-info-main-item">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-xs-12">
                                            <span class="fa fa-home"></span>
                                            ADDRESS
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-xs-12">
                                            <em>Sarvodhya Shikshan Mandal, Ghod-Dod Road, opp.G3 Showroom, Athwa, Surat, Gujarat.</em>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-contacts__address-info-main-item">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-xs-12">
                                            <span class="fa fa-phone"></span>
                                            PHONE
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-xs-12">
                                            <a href="tel:+918980197471" style="color:#999">+91-8980197471</a>                      
                                        </div>
                                    </div>
                                </div>                                    
                                <div class="b-contacts__address-info-main-item">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-xs-12">
                                            <span class="fa fa-envelope"></span>
                                            EMAIL
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-xs-12">
                                            <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=CllgCJqbzqxmZZvgrZndXGMdLHHMkMQlHHCqkdCNXhcPBhPrNKQsbPhpjCrVKCQTBNHmTDGzDGV" target="_blank" style="color:#999;"  >carforest2023@gmail.com</a>
                                        </div>
                                    </div>
                                </div>
                            </address>
                        </div>
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