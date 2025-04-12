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
                <h1 class="wow zoomInLeft" data-wow-delay="0.7s">Carmela Registration</h1>
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
                                <h2 class="s-titleDet">Welcome, <?php echo $this->session->userdata('carmela_name') ?></h2> 
                            </header>
                            <p class=" wow zoomInUp" data-wow-delay="0.5s">Fill Your Carmela Location Details.</p>
                            <div class="s-form wow zoomInUp" data-wow-delay="0.5s">
                                <form action="" method="post" id="contactForm" novalidate class="s-form wow zoomInUp" data-wow-delay="0.5s">
                                    <div>
                                        <select onchange="set_combo('city', this.value);" name="state" class="<?php
                                        if (form_error('state')) {
                                            echo 'invalid';
                                        }
                                        ?>">                                        
                                            <option value="">Select State</option>                                        
                                            <?php
                                            foreach ($state as $data) {
                                                ?>
                                                <option value="<?php echo $data->location_id; ?>" <?php
                                                if (!isset($success) && set_select('state', $data->location_id)) {
                                                    echo set_select('state', $data->location_id);
                                                } else {
                                                    if ($data->location_id == $this->session->userdata('state')) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?> ><?php echo $data->name; ?> </option>
                                                    <?php } ?>
                                        </select>
                                        <p class="errmsg">
                                            <?php
                                            echo form_error('state');
                                            ?>
                                        </p>
                                    </div>
                                    <div>
                                        <select id="city" onchange="set_combo('area', this.value);" name="city" class="<?php
                                        if (form_error('city')) {
                                            echo 'invalid';
                                        }
                                        ?>">
                                            <option value="">Select City</option>
                                            <?php
                                            if ($this->input->post('state')) {
                                                $wh['parent_id'] = $this->input->post('state');
                                                $records = $this->md->my_select('tbl_location', '*', $wh);
                                                foreach ($records as $data) {
                                                    ?>
                                                    <option value="<?php echo $data->location_id ?>" <?php
                                                    if (!isset($success) && set_select('city', $data->location_id)) {
                                                        echo set_select('city', $data->location_id);
                                                    }
                                                    ?>>
                                                        <?php echo $data->name; ?></option>
                                                    <?php
                                                }
                                            } else {
                                                $wh['parent_id'] = $this->session->userdata('state');
                                                $records = $this->md->my_select('tbl_location', '*', $wh);
                                                foreach ($records as $data) {
                                                    ?>
                                                    <option value="<?php echo $data->location_id ?>" <?php
                                                    if (!isset($success) && set_select('city', $data->location_id)) {
                                                        echo set_select('city', $data->location_id);
                                                    } else {
                                                        if ($data->location_id == $this->session->userdata('city')) {
                                                            echo "selected";
                                                        }
                                                    }
                                                    ?>>
                                                        <?php echo $data->name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <p class="errmsg">
                                            <?php
                                            echo form_error('city');
                                            ?>
                                        </p>
                                    </div>
                                    <div>
                                        <select id="area" name="area" class="<?php
                                        if (form_error('area')) {
                                            echo 'invalid';
                                        }
                                        ?>" value="<?php
                                                if (!isset($success) && set_select('area')) {
                                                    echo set_select('area');
                                                }
                                                ?>">
                                            <option value="">Select Area</option>
                                            <?php
                                            if ($this->input->post('city')) {
                                                $wh['parent_id'] = $this->input->post('city');
                                                $records = $this->md->my_select('tbl_location', '*', $wh);
                                                foreach ($records as $data) {
                                                    ?>
                                                    <option value="<?php echo $data->location_id ?>" <?php
                                                    if (!isset($success) && set_select('area', $data->location_id)) {
                                                        echo set_select('area', $data->location_id);
                                                    }
                                                    ?>>
                                                        <?php echo $data->name; ?></option>
                                                    <?php
                                                }
                                            } else {
                                                $wh['parent_id'] = $this->session->userdata('city');
                                                $records = $this->md->my_select('tbl_location', '*', $wh);
                                                foreach ($records as $data) {
                                                    ?>
                                                    <option value="<?php echo $data->location_id ?>" <?php
                                                    if (!isset($success) && set_select('area', $data->location_id)) {
                                                        echo set_select('area', $data->location_id);
                                                    } else {
                                                        if ($data->location_id == $this->session->userdata('area')) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?>>
                                                        <?php echo $data->name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <p class="errmsg">
                                            <?php
                                            echo form_error('area');
                                            ?>
                                        </p>
                                    </div>
                                    <div>
                                        <textarea placeholder="Address" name="carmela-address" class="<?php
                                        if (form_error('carmela-address')) {
                                            echo 'invalid';
                                        }
                                        ?>"/><?php
                                                  if (!isset($success) && set_value('carmela-address')) {
                                                      echo set_value('carmela-address');
                                                  } else {
                                                      if ($this->session->userdata('address')) {
                                                          echo $this->session->userdata('address');
                                                      }
                                                  }
                                                  ?></textarea>
                                        <p class="errmsg">
                                            <?php
                                            echo form_error('carmela-address');
                                            ?>
                                        </p>
                                    </div>
                                    <div>
                                        <input type="text" name="carmela-pincode" placeholder="Pincode" value="<?php
                                        if (!isset($success) && set_value('carmela-pincode')) {
                                            echo set_value('carmela-pincode');
                                        } else {
                                            if ($this->session->userdata('pincode')) {
                                                echo $this->session->userdata('pincode');
                                            }
                                        }
                                        ?>" name="pincode" id="carmela-pincode" class="<?php
                                               if (form_error('carmela-pincode')) {
                                                   echo 'invalid';
                                               }
                                               ?>"/>
                                        <p class="errmsg">
                                            <?php
                                            echo form_error('carmela-pincode');
                                            ?>
                                        </p>
                                    </div>
                                    <div>
                                        <button type="submit" name="previous" value="yes" class="btn m-btn" style="padding-right: 25px;" ><span class="fa fa-angle-left" style="margin-left: -11px; margin-right: 10px;"></span>Previous</button>
                                        <button type="submit" name="next" value="yes" class="btn m-btn">Next<span class="fa fa-angle-right"></span></button>                                    
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