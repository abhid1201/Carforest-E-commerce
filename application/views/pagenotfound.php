<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Page Not Found - Car Forest</title>

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
                <h1 class="wow zoomInLeft" data-wow-delay="0.7s">Page Not Found</h1>
                <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.7s">
                    <h3>Get In Touch With Us Now</h3>
                </div>
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow">
            <div class="container">
                <a href="<?php echo base_url('home'); ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a class="b-breadCumbs__page m-active">Page Not Found</a>
            </div>
        </div><!--b-breadCumbs-->        

        <section class="b-error s-shadow">
            <div class="container">
                <h1 class="wow zoomInUp" data-wow-delay="0.7s">Error</h1>
                <img class="img-responsive center-block wow zoomInUp" data-wow-delay="0.7s" src="images/backgrounds/404.png" alt="404" />
                <h2 class="s-lineDownCenter wow zoomInUp" data-wow-delay="0.7s">page not found</h2>
                <p class="wow zoomInUp" data-wow-delay="0.7s">The page you are looking for is not available and might have been removed, its name changed or is temprarily unavailable.</p>
                <h3 class="s-title wow zoomInUp" data-wow-delay="0.7s">TRY to finD a page</h3>
                <form class="b-blog__aside-search" action="http://templines.rocks/" method="post">
                    <div>
                        <input type="text" name="search" value=""/>
                        <button type="submit"><span class="fa fa-search"></span></button>
                    </div>        
                </form>
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