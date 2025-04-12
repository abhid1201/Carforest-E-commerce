<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Register - Car Forest</title>

        <?php
        $this->load->view('headerlink');
        ?>

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
                <h1 class="wow zoomInLeft" data-wow-delay="0.7s">Register</h1>
                <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.7s">
                    <h3>The Largest Auto Dealer Online</h3>
                </div>
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow">
            <div class="container">
                <a href="<?php echo base_url('home'); ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url('register'); ?>" class="b-breadCumbs__page m-active">Register</a>
            </div>
        </div><!--b-breadCumbs-->                

        <section class="b-contacts s-shadow">
            <div class="container">
                <div class="row">                    
                    <div class="col-xs-6">
                        <div class="b-contacts__form">
                            <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">New Member ?</h2> 
                            </header>
                            <p class=" wow zoomInUp" data-wow-delay="0.5s">If you have not account with us, Please fill the following form.</p>
                            <div class=" row s-form wow zoomInUp" data-wow-delay="0.5s">
                                <form action="" method="post" id="contactForm" novalidate class="s-form wow zoomInUp carmela-register" data-wow-delay="0.5s">
                                    <div>
                                        <input type="text" placeholder="Name" class="<?php
                                        if (form_error('user-name')) {
                                            echo 'invalid';
                                        }
                                        ?>" name="user-name" id="user-name" value="<?php
                                               if (!isset($success) && set_value('user-name')) {
                                                   echo set_value('user-name');
                                               }
                                               ?>"/>
                                        <p class="errmsg">
                                            <?php
                                            echo form_error('user-name');
                                            ?>
                                        </p>
                                    </div>                                    
                                    <div>
                                        <input type="text" placeholder="Email Address" class="<?php
                                        if (form_error('user-email')) {
                                            echo 'invalid';
                                        }
                                        ?>" name="user-email" id="user-email" value="<?php
                                               if (!isset($success) && set_value('user-email')) {
                                                   echo set_value('user-email');
                                               }
                                               ?>"/>
                                        <p class="errmsg">
                                            <?php
                                            echo form_error('user-email');
                                            ?>
                                        </p>
                                    </div>                                    
                                    <div>
                                        <input type="password" placeholder="Password" class="<?php
                                        if (form_error('user-password')) {
                                            echo 'invalid';
                                        }
                                        ?>" name="user-password" id="user-password" value="<?php
                                               if (!isset($success) && set_value('user-password')) {
                                                   echo set_value('user-password');
                                               }
                                               ?>"/>
                                        <p class="errmsg">
                                            <?php
                                            echo form_error('user-password');
                                            ?>
                                        </p>
                                        <a><i class="fa-solid fa-eye eye_icon" id="password"></i></a>                       
                                    </div>
                                    <div>
                                        <input type="password" placeholder="Confirm Password" class="<?php
                                        if (form_error('user-c_password')) {
                                            echo 'invalid';
                                        }
                                        ?>" name="user-c_password" id="user-c_password" />                                        
                                        <a><i class="fa-solid fa-eye eye_icon" id="c_password"></i></a>                       
                                    </div>
                                    <p class="errmsg">
                                        <?php
                                        echo form_error('user-c_password');
                                        ?>
                                    </p>
                                    <div>
                                        <p class="wow zoomInUp rememberme" data-wow-delay="0.5s"><input type="checkbox" checked="" disabled=""/>&nbsp;&nbsp;I have Accept all your <a href="<?php echo base_url('terms-and-conditions'); ?>" target="_blank">Terms & Conditions.</a></p>                                    
                                    </div>
                                    <div>
                                        <button type="submit" name="register" value="yes" class="btn m-btn">REGISTER NOW<span class="fa fa-angle-right"></span></button>                                    
                                    </div>
                                </form>                            
                            </div>
                        </div>
                    </div>                
                    <div class="col-xs-6">
                        <div class="b-contacts__form">
                            <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">Existing Member ?</h2> 
                            </header>
                            <p class=" wow zoomInUp" data-wow-delay="0.5s">By login with us you will be able to, see all carmela, put your favourite car in your favourite list, book your appointment to test car and many more.</p>
                            <div id="success"></div>
                            <form action="" method="post" id="contactForm" novalidate class="s-form wow zoomInUp" data-wow-delay="0.5s">                                
                                <button type="submit" name="login" value="yes" class="btn m-btn">LOG IN<span class="fa fa-angle-right"></span></button>
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