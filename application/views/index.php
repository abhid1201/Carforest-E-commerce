<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Car Forest - Find Your Dream Car.</title>
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
        <!--b-nav-->

        <section class="b-slider"> 
            <div id="carousel" class="slide carousel carousel-fade">
                <div class="carousel-inner">
                    <?php
                        $i=0;
                        $banner = $this->md->my_select('tbl_banner','*',array('status'=>1));
                        foreach( $banner as $single ){
                            $i++;
                    ?>
                    <div class="item <?php if( $i==1 ){ echo "active"; } ?>">
                        <img src="<?php echo base_url().$single->path; ?>" style="width: 100%;height:750px;object-fit: cover"/>
                        <div class="container">
                            <div class="carousel-caption b-slider__info">
                                <h3>Find your dream car</h3>
                                <h2><?php echo $single->title; ?></h2>
                                <p><?php echo $single->subtitle; ?></p>
                                <a class="btn m-btn" href="<?php echo base_url('car-list') ?>">See Details<span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                <a class="carousel-control right" href="#carousel" data-slide="next">
                    <span class="fa fa-angle-right m-control-right"></span>
                </a>
                <a class="carousel-control left" href="#carousel" data-slide="prev">
                    <span class="fa fa-angle-left m-control-left"></span>
                </a>
            </div>
        </section><!--b-slider-->

        <section class="b-search">
            <div class="container">
                <h1 class="wow zoomInUp" data-wow-delay="0.3s">UNSURE WHICH VEHICLE YOU ARE LOOKING FOR? FIND IT HERE</h1>
                <div class="b-search__main wow zoomInUp" data-wow-delay="0.3s">
                    <h4>FIND YOUR DREAM CAR</h4>
                    <form method="POST" class="b-search__main-form">
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                <div class="m-firstSelects">
                                    <div class="col-xs-3">
                                        <select name="select1" id="type" onchange="set_combo('company',this.value)">
                                            <option value="">Select Type</option>
                                            <?php
                                                $main = $this->md->my_select('tbl_category','*',array('label'=>'type'));
                                                foreach( $main as $data ){
                                            ?>
                                            <option value="<?php echo $data->category_id; ?>"><?php echo $data->name; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <span class="fa fa-caret-down"></span>
                                    </div>
                                    <div class="col-xs-3">
                                        <select name="select2" id="company" onchange="set_combo('model',this.value)">
                                            <option value="" >Any Company</option>
                                        </select>
                                        <span class="fa fa-caret-down"></span>
                                    </div>
                                    <div class="col-xs-3">
                                        <select name="select3" id="model" onchange="set_combo('submodel',this.value)">
                                            <option value="" >Any Model</option>
                                        </select>
                                        <span class="fa fa-caret-down"></span>
                                    </div>
                                    <div class="col-xs-3">
                                        <select name="select3" id="submodel">
                                            <option value="" >Any Sub Model</option>
                                        </select>
                                        <span class="fa fa-caret-down"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="b-search__main-form-submit">
                                    <center>
                                        <button type="button" onclick="find_car();" class="btn m-btn">Search The Car<span class="fa fa-angle-right"></span></button> 
                                        <p class="errmsg" id="error" style="text-align: center !important;margin: 10px 0px !important;"></p>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section><!--b-search-->


        <section class="b-world">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <div class="b-world__item wow zoomInLeft" data-wow-delay="0.3s">
                            <img class="img-responsive" src="<?php echo base_url(); ?>assets/media/370x200/wolks.jpg" alt="wolks" />
                            <div class="b-world__item-val">
                                <span class="b-world__item-val-title">WE OFFER</span>
                            </div>
                            <h2>Low Prices, No Haggling</h2>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="b-world__item wow zoomInUp" data-wow-delay="0.3s">
                            <img class="img-responsive"  src="<?php echo base_url(); ?>assets/media/370x200/mazda.jpg" alt="mazda" />
                            <div class="b-world__item-val">
                                <span class="b-world__item-val-title">WE ARE THE</span>
                            </div>
                            <h2>Largest Car Dealership</h2>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="b-world__item wow zoomInRight" data-wow-delay="0.3s">
                            <img class="img-responsive"  src="<?php echo base_url(); ?>assets/media/370x200/chevrolet.jpg" alt="chevrolet" />
                            <div class="b-world__item-val">
                                <span class="b-world__item-val-title">OUR CUSTOMERS GET</span>
                            </div>
                            <h2>Multipoint Safety Check</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--b-world-->

        <!--Top Rated Car-->
        <section class="b-featured">
            <div class="container">
                <h2 class="s-title wow zoomInUp" data-wow-delay="0.3s">Top Rated Car</h2>
                <div id="carousel-small" class="owl-carousel enable-owl-carousel" data-items="4" data-navigation="true" data-auto-play="true" data-stop-on-hover="true" data-items-desktop="4" data-items-desktop-small="4" data-items-tablet="3" data-items-tablet-small="2">
                    <?php
                        $car = $this->md->my_query("SELECT c.* , sum( r.`rating`) AS sm FROM `tbl_car` AS c , `tbl_car_review` AS r WHERE c.`car_id` = r.`car_id` GROUP BY r.`car_id` ORDER BY sm DESC LIMIT 0,10");
                        foreach($car as $data){
                            $carimage = $this->md->my_query("SELECT path FROM `tbl_car_image` WHERE car_id =" . $data->car_id . " AND type = 'Front Side'")[0]->path;
                            $path = explode(",", $carimage);
                    ?>
                    <div>
                        <div class="b-featured__item wow rotateIn" data-wow-delay="0.3s">
                            <a href="<?php echo base_url() ?>car-detail/<?php echo base64_encode(base64_encode($data->car_id)); ?>">
                                <img src="<?php echo base_url() . $path[0]; ?>" alt="mers" style="width:100%;object-fit: cover;margin-top: 0px;height: 125px;"/>
                            </a>
                            <div class="b-featured__item-price">
                                Rs. <?php echo number_format($data->price); ?>
                            </div>
                            <div class="clearfix"></div>
                            <h5><a href="<?php echo base_url() ?>car-detail/<?php echo base64_encode(base64_encode($data->car_id)); ?>"><?php echo $data->name; ?></a></h5>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section><!--b-featured-->


        <section class="b-homeAuto">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="b-homeAuto__latest">
                            <h5 class="s-titleBg wow zoomInLeft" data-wow-delay="0.3s">GIVING OUR CUSTOMERS BEST DEALS</h5><br />
                            <h2 class="s-title wow zoomInLeft" data-wow-delay="0.3s">LATEST VEHICLES ON SALE</h2>
                            <div class="b-auto__main">
                                <div class="row">
                                    <?php
                                        $latest = $this->md->my_query("SELECT * FROM `tbl_car` WHERE `status` = 1 ORDER BY `car_id` DESC LIMIT 0,4");
                                        foreach( $latest as $data ){
                                    ?>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="b-items__cell wow zoomInUp" data-wow-delay="0.5s" style="height: 350px !important;">
                                            <div class="b-items__cars-one-img">
                                                <?php
                                                $carimage = $this->md->my_query("SELECT path FROM `tbl_car_image` WHERE car_id =" . $data->car_id . " AND type = 'Front Side'")[0]->path;
                                                $path = explode(",", $carimage);
                                                ?>
                                                <a href="<?php echo base_url() ?>car-detail/<?php echo base64_encode(base64_encode($data->car_id)); ?>">
                                                    <img class="img-responsive" src="<?php echo base_url() . $path[0]; ?>" style="width:100%;height: 210px;object-fit: cover">
                                                </a>
                                            </div>
                                            <div class="b-items__cell-info">
                                                <div class="s-lineDownLeft b-items__cell-info-title">
                                                    <h2><?php echo $data->name; ?></h2>
                                                </div>

                                                <div class="row" style="margin-top: -10px">
                                                    <div class="col-xs-7">                                                
                                                        <h5 class="b-items__cell-info-price"><i class="fa-solid fa-indian-rupee-sign"></i>&nbsp;<?php echo number_format($data->price); ?></h5>
                                                    </div>
                                                    <div class="col-xs-5">
                                                        <a href="<?php echo base_url() ?>car-detail/<?php echo base64_encode(base64_encode($data->car_id)); ?>" class="btn m-btn">DETAILS<span class="fa fa-angle-right"></span></a>
                                                    </div>
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
                    </div>
                </div>
            </div>
        </section><!--b-homeAuto-->

        <section class="b-count">
            <div class="container">
                <div class="row">
                    <div class="col-md-11 col-xs-12 percent-blocks m-main" data-waypoint-scroll="true">
                        <div class="row">
                            <div class="col-sm-4 col-xs-6">
                                <div class="b-count__item">
                                    <div class="b-count__item-circle">
                                        <span class="fa fa-car"></span>
                                    </div>
                                    <?php
                                        $car = $this->md->my_query("SELECT COUNT(*) AS cc FROM `tbl_car`")[0]->cc;
                                    ?>
                                    <div class="chart" data-percent="<?php echo $car; ?>">
                                        <h2  class="percent"><?php echo $car; ?></h2>
                                    </div>
                                    <h5>vehicles in stock</h5>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <div class="b-count__item">
                                    <div class="b-count__item-circle">
                                        <span class="fa fa-users"></span>
                                    </div>
                                    <?php
                                        $carmela = $this->md->my_query("SELECT COUNT(*) AS cc FROM `tbl_carmela` WHERE `status` = 1")[0]->cc;
                                    ?>
                                    <div class="chart" data-percent="<?php echo $carmela; ?>">
                                        <h2 class="percent"><?php echo $carmela; ?></h2>
                                    </div>
                                    <h5>HAPPY CARMELA</h5>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-6">
                                <div class="b-count__item">
                                    <div class="b-count__item-circle">
                                        <span class="fa fa-commenting"></span>
                                    </div>
                                    <?php
                                        $review = $this->md->my_query("SELECT COUNT(*) AS cc FROM `tbl_car_review` WHERE `status` = 1")[0]->cc;
                                    ?>
                                    <div class="chart" data-percent="<?php echo $review; ?>">
                                        <h2  class="percent"><?php echo $review; ?></h2>
                                    </div>
                                    <h5>CUSTOMER REVIEWS</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--b-count-->

        <?php
            if($this->session->userdata('member')){
                
                $recent_product = $this->md->my_query("SELECT `car_id` FROM `tbl_recent_view` WHERE `register_id` = ". $this->session->userdata('member')." ORDER BY `view_id` DESC");
        ?>
        <section class="b-featured">
            <div class="container">
                <h2 class="s-title wow zoomInUp" data-wow-delay="0.3s">Recently Visited Cars</h2>
                <div id="carousel-small" class="owl-carousel enable-owl-carousel" data-items="4" data-navigation="true" data-auto-play="true" data-stop-on-hover="true" data-items-desktop="4" data-items-desktop-small="4" data-items-tablet="3" data-items-tablet-small="2">
                    <?php
                        foreach($recent_product as $single){
                            $data = $this->md->my_select('tbl_car','*',array('car_id'=>$single->car_id))[0];
                            
                            $carimage = $this->md->my_query("SELECT path FROM `tbl_car_image` WHERE car_id =" . $data->car_id . " AND type = 'Front Side'")[0]->path;
                            $path = explode(",", $carimage);
                    ?>
                    <div>
                        <div class="b-featured__item wow rotateIn" data-wow-delay="0.3s">
                            <a href="<?php echo base_url() ?>car-detail/<?php echo base64_encode(base64_encode($data->car_id)); ?>">
                                <img src="<?php echo base_url() . $path[0]; ?>" alt="mers" style="width:100%;object-fit: cover;margin-top: 0px;height: 125px;"/>
                            </a>
                            <div class="b-featured__item-price">
                                Rs. <?php echo number_format($data->price); ?>
                            </div>
                            <div class="clearfix"></div>
                            <h5><a href="<?php echo base_url() ?>car-detail/<?php echo base64_encode(base64_encode($data->car_id)); ?>"><?php echo $data->name; ?></a></h5>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </section>
        <!--b-featured-->
        <?php
            }
        ?>
        
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