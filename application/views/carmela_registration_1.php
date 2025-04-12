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
                <h1 class="wow zoomInLeft" data-wow-delay="0.7s">Carmela Registeration</h1>
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
            <div class="container">
                <div class="row">                    
                    <div class="col-xs-6">
                        <div class="b-contacts__form">
                            <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">New Carmela ?</h2> 
                            </header>
                            <p class=" wow zoomInUp" data-wow-delay="0.5s">If you have not account with us, Please fill the following form.</p>
                            <div class="s-form wow zoomInUp" data-wow-delay="0.5s">
                                <form action="" method="post" id="contactForm" novalidate class="s-form wow zoomInUp carmela-register" data-wow-delay="0.5s">
                                    <div>
                                        <input type="text" placeholder="Carmela Name" name="carmela-name" id="carmela-name" class="<?php
                                        if (form_error('carmela-name')) {
                                            echo 'invalid';
                                        }
                                        ?>" value="<?php
                                               if (!isset($success) && set_value('carmela-name')) {
                                                   echo set_value('carmela-name');
                                               } else {
                                                   if ($this->session->userdata('carmela_name')) {
                                                       echo $this->session->userdata('carmela_name');
                                                   }
                                               }
                                               ?>"/>
                                        <p class="errmsg">
                                            <?php
                                            echo form_error('carmela-name');
                                            ?>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="email" placeholder="Carmela Email Address" value="<?php
                                            if (!isset($success) && set_value('carmela-email')) {
                                                echo set_value('carmela-email');
                                            }
                                             else {
                                                   if ($this->session->userdata('carmela_email')) {
                                                       echo $this->session->userdata('carmela_email');
                                                   }
                                               }
                                            ?>" name="carmela-email" id="carmela-email" class="<?php
                                                   if (form_error('carmela-email')) {
                                                       echo 'invalid';
                                                   }
                                                   ?>"/>
                                            <p class="errmsg">
                                                <?php
                                                echo form_error('carmela-email');
                                                ?>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" placeholder="Carmela Contact Number" value="<?php
                                            if (!isset($success) && set_value('carmela-mobile')) {
                                                echo set_value('carmela-mobile');
                                            }
                                             else {
                                                   if ($this->session->userdata('carmela_mobile')) {
                                                       echo $this->session->userdata('carmela_mobile');
                                                   }
                                               }
                                            ?>" name="carmela-mobile" id="carmela-mobile" class="<?php
                                                   if (form_error('carmela-mobile')) {
                                                       echo 'invalid';
                                                   }
                                                   ?>"/>
                                            <p class="errmsg">
                                                <?php
                                                echo form_error('carmela-mobile');
                                                ?>
                                            </p>
                                        </div>
                                    </div>                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="password" placeholder="Carmela Password" value="<?php
                                            if (!isset($success) && set_value('carmela-password')) {
                                                echo set_value('carmela-password');
                                            }
                                             else {
                                                   if ($this->session->userdata('carmela_password')) {
                                                       echo $this->session->userdata('carmela_password');
                                                   }
                                               }
                                            ?>" name="carmela-password" id="carmela-password" class="<?php
                                                   if (form_error('carmela-password')) {
                                                       echo 'invalid';
                                                   }
                                                   ?>"/>
                                            <p class="errmsg">
                                                <?php
                                                echo form_error('carmela-password');
                                                ?>
                                            </p>
                                            <a><i class="fa-solid fa-eye eye_icon_1" id="password"></i></a>                       
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" placeholder="Confirm Carmela Password" name="carmela-c_password" id="carmela-c_password" class="<?php
                                            if (form_error('carmela-c_password')) {
                                                echo 'invalid';
                                            }
                                            ?>"/>
                                            <p class="errmsg">
                                                <?php
                                                echo form_error('carmela-c_password');
                                                ?>
                                            </p>
                                            <a><i class="fa-solid fa-eye eye_icon_1" id="c_password"></i></a>                       
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" placeholder="Carmela Owner Name" value="<?php
                                            if (!isset($success) && set_value('owner-name')) {
                                                echo set_value('owner-name');
                                            }
                                             else {
                                                   if ($this->session->userdata('owner_name')) {
                                                       echo $this->session->userdata('owner_name');
                                                   }
                                               }
                                            ?>" name="owner-name" id="owner-name" class="<?php
                                                   if (form_error('owner-name')) {
                                                       echo 'invalid';
                                                   }
                                                   ?>"/>
                                            <p class="errmsg">
                                                <?php
                                                echo form_error('owner-name');
                                                ?>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" placeholder="Carmela Owner Contact Number" value="<?php
                                            if (!isset($success) && set_value('owner-mobile')) {
                                                echo set_value('owner-mobile');
                                            }
                                             else {
                                                   if ($this->session->userdata('owner_mobile')) {
                                                       echo $this->session->userdata('owner_mobile');
                                                   }
                                               }
                                            ?>" name="owner-mobile" id="owner-mobile" class="<?php
                                                   if (form_error('owner-mobile')) {
                                                       echo 'invalid';
                                                   }
                                                   ?>"/>
                                            <p class="errmsg">
                                                <?php
                                                echo form_error('owner-mobile');
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="wow zoomInUp rememberme" data-wow-delay="0.5s"><input type="checkbox" checked="" disabled=""/>&nbsp;&nbsp;I have Accept all your <a href="<?php echo base_url('terms-and-conditions'); ?>" target="_blank">Terms & Conditions.</a></p>                                    
                                    </div>
                                    <div>
                                        <button type="submit" name="next" value="yes" class="btn m-btn">NEXT<span class="fa fa-angle-right"></span></button>                                    
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
                            <p class=" wow zoomInUp" data-wow-delay="0.5s">By register with us you will be able to manage your carmela's car & customer's appointment.</p>
                            <div id="success"></div>
                            <form id="contactForm" action="" method="post" novalidate class="s-form wow zoomInUp" data-wow-delay="0.5s">                                
                                <button type="submit" name="login" value="yes" class="btn m-btn">LOG IN NOW<span class="fa fa-angle-right"></span></button>
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