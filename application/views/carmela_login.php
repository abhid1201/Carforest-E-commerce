<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Carmela Log In - Car Forest</title>

        <?php
        $this->load->view('headerlink');
        ?>

        <!-- SWITCHER -->
        <style>
            .eye_icon_2{
                font-size: 14px;
                position: absolute;
                cursor: pointer;
                float: right;
                margin-left: 500px;
                margin-top: -44px;
                z-index: 2;
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
                <h1 class="wow zoomInLeft" data-wow-delay="0.7s">Carmela Log In</h1>
                <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.7s">
                    <h3>The Largest Auto Dealer Online</h3>
                </div>
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow">
            <div class="container">
                <a href="<?php echo base_url('home'); ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url('carmela-login'); ?>" class="b-breadCumbs__page m-active">Carmela Log In</a>
            </div>
        </div><!--b-breadCumbs-->                

        <section class="b-contacts s-shadow">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="b-contacts__form">
                            <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">Existing Carmela ?</h2> 
                            </header>
                            <p class=" wow zoomInUp" data-wow-delay="0.5s">If you have account with us, please log in.</p>
                            <div id="success"></div>
                            <form action="" method="post" id="contactForm" novalidate class="s-form wow zoomInUp" data-wow-delay="0.5s">
                                <div>
                                    <input type="email" placeholder="Email Address" value="<?php
                                    if ($this->input->cookie('carmela_password')) {
                                        echo $this->input->cookie('carmela_email');
                                    }
                                    ?>" name="carmela-email" id="carmela-email"/>
                                </div>
                                <div>
                                    <input type="password" placeholder="Password" value="<?php
                                    if ($this->input->cookie('carmela_password')) {
                                        echo $this->input->cookie('carmela_password');
                                    }
                                    ?>" name="carmela-password" id="carmela-login-password">
                                    <a><i class="fa-solid fa-eye eye_icon_2" id="password"></i></a>                       
                                </div>
                                <div>
                                    <p class="wow zoomInUp rememberme" data-wow-delay="0.5s"><input class="form-check-input" type="checkbox" id="remember-check" name="svp" value="yes" <?php
                                        if ($this->input->cookie('carmela_password')) {
                                            echo "checked";
                                        }
                                        ?>>&nbsp;&nbsp;Remember Me</p>
                                    <a href="<?php echo base_url('carmela-forget-password'); ?>" class="frgt_ps">Forget Password ?</a>
                                </div>
                                <div>
                                    <button type="submit" name="login" value="yes" class="btn m-btn">LOG IN NOW<span class="fa fa-angle-right"></span></button>                                    
                                </div>
                                <div>
                                    <?php
                                    if (isset($error)) {
                                        echo '<br/>';
                                        ?>
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>Oops!</strong> <?php echo $error ?>
                                        </div>
                                        <?php
                                    }
                                    ?> 
                                </div>    
                            </form>
                        </div>
                    </div>  
                    <div class="col-xs-6">
                        <div class="b-contacts__form"> 
                            <header class="b-contacts__form-header s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                                <h2 class="s-titleDet">New Carmela ?</h2> 
                            </header>
                            <p class=" wow zoomInUp" data-wow-delay="0.5s">By register with us you will be able to manage your carmela's car & customer's appointment.</p>
                            <form method="post" action="" class="s-form wow zoomInUp" data-wow-delay="0.5s">
                                <button type="submit" name="register" value="yes" class="btn m-btn">REGISTER NOW<span class="fa fa-angle-right"></span></button>                                
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