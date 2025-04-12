<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title><?php echo $details->name; ?></title>

        <?php
        $this->load->view('headerlink');
        ?>

        <!-- SWITCHER -->
        <style>
            .car_specification h2{
                font-size: 15px;
                font-weight: bold;
                text-transform: uppercase;
                color:#F76D2B;
            }
            .car_specification table{
                width: 100%;
            }
            .car_specification table tr td:first-child{
                width: 30%;
                background: #f5f5f5;
                font-weight: bold;
            }
            .car_specification table tr td:nth-child(2){
                width: 70%;
            }
            .car_specification table tr td{
                padding: 10px;
                vertical-align: middle
            }
            .login{
                text-align: center;
                font-size: 135px;
                color: #D3D3D3;
            }
        </style>
        
        <style type="text/css">
        /* Rating Star Widgets Style */
        .rating-stars ul {
          list-style-type:none;
          padding:0;

          -moz-user-select:none;
          -webkit-user-select:none;
        }
        .rating-stars ul > li.star {
          display:inline-block;

        }

        /* Idle State of the stars */
        .rating-stars ul > li.star > i.fa {
          font-size:2.5em; /* Change the size of the stars */
          color:#ccc; /* Color on idle state */
        }

        /* Hover state of the stars */
        .rating-stars ul > li.star.hover > i.fa {
          color:#FFCC36;
        }

        /* Selected state of the stars */
        .rating-stars ul > li.star.selected > i.fa {
          color:#FF912C;
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
                <h1 class="wow zoomInLeft" data-wow-delay="0.7s"><?php echo $details->name; ?></h1>
                <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.7s">
                    <h3>The Largest Auto Dealer Online</h3>
                </div>
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow">
            <div class="container">
                <a href="<?php echo base_url('home'); ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url('car-list'); ?>" class="b-breadCumbs__page m-active">Car List</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url('car-details'); ?>" class="b-breadCumbs__page m-active"><?php echo $details->name; ?></a>
            </div>
        </div><!--b-breadCumbs-->     

        <div class="b-infoBar">
            <div class="container">
                <div class="row wow zoomInUp" data-wow-delay="0.5s">
                    
                    <div class="col-xs-12">
                        <div class="b-infoBar__btns">
                            <?php
                            
                            
                            if ($this->session->userdata('member')) {

                                $wh1['register_id'] = $this->session->userdata('member');
                                $wh1['car_id'] = $details->car_id;
                                $fav = $this->md->my_select('tbl_wishlist', '*', $wh1);
                                $fav_added = count($fav);

                                if ($fav_added == 1) {
                                    ?>
                                    <a href="<?php echo base_url('member-my-favourite-car') ?>" id="fav-<?php echo $details->car_id; ?>" class="btn m-btn m-infoBtn">ADDED IN LIST<span class="fa fa-angle-right"></span></a>
                                    <?php
                                } else {
                                    ?>
                                    <span id="fav-<?php echo $details->car_id; ?>" >
                                        <a onclick="add_fav(<?php echo $details->car_id; ?>)" class="btn m-btn m-infoBtn">ADD TO FAVOURITES<span class="fa fa-angle-right"></span></a>
                                    </span>
                                    
                                    <?php
                                }
                            } else {
                                ?>
                                <a href="<?php echo base_url('login') ?>" class="btn m-btn m-infoBtn">ADD TO FAVOURITES<span class="fa fa-angle-right"></span></a>
                            <?php } ?>                                    
                            <a onclick="printDiv();" class="btn m-btn m-infoBtn">PRINT THIS PAGE<span class="fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--b-infoBar-->


        <section class="b-detail s-shadow" id="print-car">
            <div class="container">
                <header class="b-detail__head s-lineDownLeft wow zoomInUp" data-wow-delay="0.5s">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <div class="b-detail__head-title">
                                <h1><?php echo $details->name; ?></h1>
                                <div style="color:#F76D2B;margin: 10px 0px">
                                    <?php
                                        $total_rate = 0;
                                        $total_person = 0;
                                        $review = $this->md->my_select('tbl_car_review','*',array('car_id'=>$details->car_id,'status'=>1));

                                        foreach( $review as $rdata ){
                                            $total_rate += $rdata->rating;
                                            $total_person++;
                                        }

                                        if( $total_person > 0 ){
                                            $avg_rate = round($total_rate/$total_person);

                                            $fill_star = $avg_rate;
                                            $blank_star = 5 - $fill_star;
                                        }
                                        else{
                                            $fill_star = 0;
                                            $blank_star = 5;
                                        }

                                        for( $i=1; $i<=$fill_star ; $i++ ){
                                    ?>
                                    <i class="fa-solid fa-star"></i>
                                    <?php
                                        }
                                        for( $i=1; $i<=$blank_star ; $i++ ){
                                    ?>
                                    <i class="fa-regular fa-star"></i>
                                    <?php
                                        }
                                    ?>
                                    <span style="color:black;">( <?php echo $total_person; ?> reviews )</span>
                                </div> 
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="b-detail__head-price">
                                <div class="b-detail__head-price-num"><i class="fa-solid fa-indian-rupee-sign"></i> <?php echo number_format($details->price); ?> /-</div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="b-detail__main" >
                    <div class="row">
                        <div class="col-md-8 col-xs-12">
                            <div class="b-detail__main-info">
                                <div class="b-detail__main-info-images wow zoomInUp" data-wow-delay="0.5s">
                                    <div class="row m-smallPadding">
                                        <div class="col-xs-10">
                                            <ul class="b-detail__main-info-images-big bxslider enable-bx-slider" data-pager-custom="#bx-pager" data-mode="horizontal" data-pager-slide="true" data-mode-pager="vertical" data-pager-qty="5">
                                                <?php
                                                $all_image = [];
                                                $records = $this->md->my_select('tbl_car_image', '*', array('car_id' => $details->car_id));
                                                foreach ($records as $data) {
                                                    $cars = explode(",", $data->path);
                                                    foreach ($cars as $single) {
                                                        array_push($all_image, $single);
                                                    }
                                                }

                                                foreach ($all_image as $path) {
                                                    ?>
                                                    <li class="s-relative">                                        
                                                        <img class="img-responsive center-block" src="<?php echo base_url() . $path; ?>" alt="<?php echo $details->name; ?>" />
                                                    </li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="col-xs-2 pagerSlider pagerVertical">
                                            <div class="b-detail__main-info-images-small" id="bx-pager">
                                                <?php
                                                $i = 0;
                                                foreach ($all_image as $path) {
                                                    ?>
                                                    <a href="#" data-slide-index="<?php echo $i; ?>" class="b-detail__main-info-images-small-one">
                                                        <img class="img-responsive" src="<?php echo base_url() . $path; ?>" alt="<?php echo $details->name; ?>" />
                                                    </a>
                                                    <?php
                                                    $i++;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="b-detail__main-info-characteristics wow zoomInUp" data-wow-delay="0.5s">
                                    <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                            <div><span class="fa fa-angles-down"></span></div>
                                            <p><?php echo $details->code; ?></p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                            Car Code
                                        </div>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                            <div><span class="fa fa-car"></span></div>
                                            <?php
                                            $wh['category_id'] = $details->main_id;
                                            $type = $this->md->my_select('tbl_category', '*', $wh)[0]->name;
                                            ?>
                                            <p><?php echo $type; ?></p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                            Car Type
                                        </div>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                            <div><span class="fa fa-sitemap"></span></div>
                                            <?php
                                            $wh['category_id'] = $details->company_id;
                                            $company = $this->md->my_select('tbl_category', '*', $wh)[0]->name;
                                            ?>
                                            <p><?php echo $company; ?></p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                            Car Company
                                        </div>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                            <div><span class="fa fa-sitemap"></span></div>
                                            <?php
                                            $wh['category_id'] = $details->model_id;
                                            $model = $this->md->my_select('tbl_category', '*', $wh)[0]->name;
                                            ?>
                                            <p><?php echo $model; ?></p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                            Car Model
                                        </div>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                            <div><span class="fa fa-sitemap"></span></div>
                                            <?php
                                            $wh['category_id'] = $details->submodel_id;
                                            $submodel = $this->md->my_select('tbl_category', '*', $wh)[0]->name;
                                            ?>
                                            <p><?php echo $submodel; ?></p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                            Car Submodel
                                        </div>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                            <div><span class="fa fa-map-marker"></span></div>
                                            <?php
                                            $wh11['carmela_id'] = $details->carmela_id;
                                            $carmela_info = $this->md->my_select('tbl_carmela', '*', $wh11)[0];

                                            $area_id = $carmela_info->location_id;
                                            $area = $this->md->my_select('tbl_location', '*', array('location_id' => $area_id))[0];
                                            $city = $this->md->my_select('tbl_location', '*', array('location_id' => $area->parent_id))[0];
                                            ?>
                                            <p><?php echo $city->name; ?></p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                            City
                                        </div>
                                    </div>
                                    <div class="b-detail__main-info-characteristics-one">
                                        <div class="b-detail__main-info-characteristics-one-top">
                                            <div><span class="fa fa-at"></span></div>
                                            <p><?php echo $area->name; ?></p>
                                        </div>
                                        <div class="b-detail__main-info-characteristics-one-bottom">
                                            Area
                                        </div>
                                    </div>
                                </div>
                                <div class="b-detail__main-info-text wow zoomInUp" data-wow-delay="0.5s">
                                    <div class="b-detail__main-aside-about-form-links">
                                        <a href="#" class="j-tab m-active s-lineDownCenter" data-to='#info1'>Description</a>
                                        <a href="#" class="j-tab" data-to='#info2'>Specification</a>
                                        <a href="#" class="j-tab" data-to='#info3'>View Review</a>
                                    </div>
                                    <div id="info1">
                                        <p><?php echo $details->description; ?></p>
                                    </div>
                                    <div id="info2">
                                        <div class="col-md-12 col-xs-12">
                                            <aside class="b-detail__main-aside">
                                                <div class="car_specification" style="height:400px;overflow-y: scroll;padding: 20px;"> 
                                                    <?php echo $details->specification; ?> 
                                                </div>                                               
                                            </aside>
                                        </div>
                                    </div>
                                    <div id="info3">
                                        <div style="height:400px;overflow-y: scroll;padding: 20px">
                                            <?php
                                                $review = $this->md->my_select("tbl_car_review",'*',array('car_id'=>$details->car_id,'status'=>1));
                                                foreach($review as $data){
                                                    $user = $this->md->my_select('tbl_register','*',array('register_id'=>$data->register_id))[0];
                                            ?>
                                            <div class="media">
                                                <div class="media-left">
                                                    <a>
                                                        <?php
                                                            if(strlen($user->profile_pic) > 0 ){
                                                        ?>
                                                        <img class="media-object" title="<?php echo $user->name; ?>" src="<?php echo base_url().$user->profile_pic; ?>" style="width:100px;height: 100px; border-radius:100px;">
                                                        <?php        
                                                            }
                                                            else{
                                                        ?>
                                                        <img class="media-object" title="<?php echo $user->name; ?>" src="<?php echo base_url() ?>member_assets/images/users/blankuser1.png" style="width:100px;height: 100px; border-radius:100px;">
                                                        <?php
                                                            }
                                                        ?>
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                  <h4 class="media-heading"><?php echo $user->name; ?></h4>
                                                  <div style="text-align: right;margin-top: -25px;margin-bottom: 10px;color:#F76D2B">
                                                        <?php
                                                            $fill_star = $data->rating;
                                                            $blank_star = 5 - $fill_star;

                                                            for( $i=1; $i<=$fill_star ; $i++ ){
                                                        ?>
                                                        <i class="fa-solid fa-star"></i>
                                                        <?php
                                                            }
                                                            for( $i=1; $i<=$blank_star ; $i++ ){
                                                        ?>
                                                        <i class="fa-regular fa-star"></i>
                                                        <?php
                                                            }
                                                        ?>
                                                  </div>
                                                  <p style="margin-bottom: 10px !important;"><?php echo $data->msg; ?></p>
                                                  <p style="margin-bottom: 10px !important;font-size: 12px;font-weight: bold;text-align: right;">posted on <?php echo date('d-m-Y h:i:s', strtotime($data->date)); ?></p>
                                                </div>
                                            </div>
                                            <hr/>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12">
                            <aside class="b-detail__main-aside">
                                <div class="b-detail__main-aside-about wow zoomInUp" data-wow-delay="0.5s">
                                    <h2 class="s-titleDet">INQUIRY ABOUT THIS CAR</h2>
                                    <div class="b-detail__main-aside-about-call">
                                        <span class="fa fa-phone"></span>
                                        <div><?php echo $carmela_info->mobile; ?></div>
                                    </div>
                                    <div class="b-detail__main-aside-about-seller">
                                        <p>Carmela Name : <span><?php echo $carmela_info->carmela_name; ?></span></p>
                                    </div>
                                    <?php
                                    if ($this->session->userdata('member')) {
                                        ?>
                                        <div class="b-detail__main-aside-about-form">
                                            <div class="b-detail__main-aside-about-form-links">
                                                <a href="#" class="j-tab m-active s-lineDownCenter" data-to='#form1'>Book Test Drive</a>
                                            </div>
                                            <form id="form1" action="" method="post" enctype="multipart/form-data">
                                                <input type="text" placeholder="YOUR NAME" name="name" value="<?php
                                                if (!isset($success) && set_value('name')) {
                                                    echo set_value('name');
                                                }
                                                ?>" class="<?php
                                                       if (form_error('name')) {
                                                           echo 'invalid';
                                                       }
                                                       ?>"/>
                                                <p class="errmsg">
                                                    <?php
                                                    echo form_error('name');
                                                    ?>
                                                </p>
                                                <input type="tel" placeholder="PHONE NO." name="mobile" value="<?php
                                                if (!isset($success) && set_value('mobile')) {
                                                    echo set_value('mobile');
                                                }
                                                ?>" class="<?php
                                                       if (form_error('mobile')) {
                                                           echo 'invalid';
                                                       }
                                                       ?>"/>
                                                <p class="errmsg">
                                                    <?php
                                                    echo form_error('mobile');
                                                    ?>
                                                </p>
                                                <input type="file" name="license" class="form-group <?php
                                                if (isset($error)) {
                                                    echo 'invalid';
                                                }
                                                ?>" />
                                                
                                                <input type="date" name="appt-date" class="<?php
                                                if (form_error('appt-date')) {
                                                    echo 'invalid';
                                                }
                                                ?>" value="<?php
                                                if (!isset($success) && set_value('appt-date')) {
                                                    echo set_value('appt-date');
                                                }
                                                ?>"/>
                                                <p class="errmsg">
                                                    <?php
                                                    echo form_error('appt-date');
                                                    ?>
                                                </p>
                                                <input type="time" name="appt-time" class="<?php
                                                if (form_error('appt-time')) {
                                                    echo 'invalid';
                                                }
                                                ?>" value="<?php
                                                if (!isset($success) && set_value('appt-time')) {
                                                    echo set_value('appt-time');
                                                }
                                                ?>"/>
                                                <p class="errmsg">
                                                    <?php
                                                    echo form_error('appt-time');
                                                    ?>
                                                </p>
                                                <button type="submit" value="yes" name="appt" class="btn m-btn">BOOK APPOINTMENT<span class="fa fa-angle-right"></span></button>
                                            </form>
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
                                                if (isset($success)) {
                                                    echo '<br/>';
                                                    ?>
                                                    <div class="alert alert-success alert-dismissible" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <strong>Okey!</strong> <?php echo $success ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <form id="form1" action="" method="post">
                                            <div class="b-detail__main-aside-about-form login">
                                                <h5>Login to book your test drive for this car.</h5>
                                                <i class="fa-regular fa-calendar-check"></i>
                                                <br/>
                                                <button type="submit" name="login" value="yes" class="btn m-btn" style="margin-top: -130px;">LOG IN<span class="fa fa-angle-right"></span></button>
                                            </div>
                                        </form>
                                        <?php
                                    }
                                    ?>
                                </div>
                                
                                <!--Add Review-->
                                <?php
                                    if( $this->session->userdata('member') ){
                                        $member = $this->md->my_select('tbl_register','*',array('register_id'=>$this->session->userdata('member') ))[0];                                       
                                ?>
                                <div class="b-detail__main-aside-about wow zoomInUp" data-wow-delay="0.5s">
                                    <h2 class="s-titleDet">ADD REVIEW</h2>                                   
                                    
                                        <div class="b-detail__main-aside-about-form">
                                            <center>
                                                <?php
                                                    if(strlen($member->profile_pic) > 0 ){
                                                ?>
                                                <img class="media-object" src="<?php echo base_url().$member->profile_pic; ?>" style="width:100px;height: 100px; border-radius:100px;margin-bottom: 20px;">
                                                <?php
                                                    }
                                                    else{
                                                ?>
                                                <img class="media-object" src="<?php echo base_url() ?>member_assets/images/users/blankuser1.png" style="width:100px;height: 100px; border-radius:100px;margin-bottom: 20px;">
                                                <?php        
                                                    }
                                                ?>
                                            </center>    
                                            <div class="b-detail__main-aside-about-form-links">
                                                <a href="#" class="j-tab m-active s-lineDownCenter"><?php echo $member->name; ?></a>
                                            </div>
                                            <div class="rate" style="text-align: center;padding: 20px;">
                                                <input type="hidden" id="rate-value" />
                                                <div class='rating-stars'>
                                                    <ul id='stars'>
                                                      <li class='star' title='Poor' data-value='1'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                      </li>
                                                      <li class='star' title='Fair' data-value='2'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                      </li>
                                                      <li class='star' title='Good' data-value='3'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                      </li>
                                                      <li class='star' title='Excellent' data-value='4'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                      </li>
                                                      <li class='star' title='WOW!!!' data-value='5'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                      </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <form id="form1" action="" method="post" enctype="multipart/form-data">
                                                <textarea id="review-msg" style="height: 150px;resize: none" placeholder="Write Something Here," ></textarea>
                                                <center>
                                                    <button type="button" onclick="add_review(<?php echo $details->car_id; ?>);" class="btn m-btn">ADD REVIEW<span class="fa fa-angle-right"></span></button>
                                                    <p id="review-output" style="margin: 10px 0px;"></p>
                                                </center>
                                            </form>
                                            
                                        </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--b-detail-->
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
        <script>
            function printDiv() {
                var printContents = document.getElementById('print-car').innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
           }
        </script>
        
        <script type="text/javascript">

            $(document).ready(function(){
  
              /* 1. Visualizing things on Hover - See next part for action on click */
              $('#stars li').on('mouseover', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function(e){
                  if (e < onStar) {
                    $(this).addClass('hover');
                  }
                  else {
                    $(this).removeClass('hover');
                  }
                });

              }).on('mouseout', function(){
                $(this).parent().children('li.star').each(function(e){
                  $(this).removeClass('hover');
                });
              });


              /* 2. Action to perform on click */
              $('#stars li').on('click', function(){
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star');

                for (i = 0; i < stars.length; i++) {
                  $(stars[i]).removeClass('selected');
                }

                for (i = 0; i < onStar; i++) {
                  $(stars[i]).addClass('selected');
                }

                // JUST RESPONSE (Not needed)
                var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                $("#rate-value").attr('value',ratingValue);
                
              });

            });

        </script>
    </body>

</html>
