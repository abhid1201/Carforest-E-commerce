<?php
$type = $this->uri->segment(2);
$id = $this->uri->segment(3);

if( $type == "" && $id == ""  ){
    $title = 'All Car';
}
else if( $type == "type" ){
    $title = $this->md->my_select('tbl_category','*',array('category_id'=> $id ))[0]->name;
}
else if( $type == "company" ){
    $title = $this->md->my_select('tbl_category','*',array('category_id'=> $id ))[0]->name;
}
else if( $type == "model" ){
    $title = $this->md->my_select('tbl_category','*',array('category_id'=> $id ))[0]->name;
}
else if( $type == "submodel" ){
    $title = $this->md->my_select('tbl_category','*',array('category_id'=> $id ))[0]->name;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Result For <?php echo $title; ?> - Car Forest</title>
        <?php
        $this->load->view('headerlink');
        ?>
        <!-- SWITCHER -->
    </head>
    <body class="m-home" onload="cardata('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12);" data-scrolling-animations="true" data-equal-height=".b-auto__main-item">

        <?php
        $this->load->view('header');
        ?>
        <!--b-topBar-->

        <?php
        $this->load->view('menu');
        ?>

        <section class="b-pageHeader">
            <div class="container">
                <h1 class="wow zoomInLeft" data-wow-delay="0.7s">Car List</h1>
                <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.7s">
                    <h3>The Largest Auto Dealer Online</h3>
                </div>
            </div>
        </section><!--b-pageHeader-->

        <div class="b-breadCumbs s-shadow">
            <div class="container">
                <a href="<?php echo base_url('home'); ?>" class="b-breadCumbs__page">Home</a><span class="fa fa-angle-right"></span><a href="<?php echo base_url('carmela-registertaion-1'); ?>" class="b-breadCumbs__page m-active">Car List</a>
            </div>
        </div><!--b-breadCumbs-->

        <div class="b-infoBar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-xs-12">
                        <div class="b-infoBar__select-one wow zoomInUp" data-wow-delay="0.5s">
                            <span class="b-infoBar__select-one-title">SHOW ON PAGE</span>
                            <select name="select1" class="m-select" onchange="cardata('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',this.value);">
                                <option value="12">12 items</option>
                                <option value="18">18 items</option>
                                <option value="24">24 items</option>
                            </select>
                            <span class="fa fa-caret-down"></span>
                        </div>
                    </div>

                </div>
            </div>
        </div><!--b-infoBar-->

        <div class="b-items">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-sm-8 col-xs-12">
                        <div id="cardata">
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-4 col-xs-12">
                        <aside class="b-items__aside">
                            <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">REFINE LOCATION</h2>
                            <div class="b-items__aside-main wow zoomInUp" data-wow-delay="0.5s">
                                <form id="filter-data">
                                    <div class="b-items__aside-main-body">
                                        <div class="b-items__aside-main-body-item">
                                            <label>SELECT STATE</label>
                                            <div>
                                                <select name="state" class="m-select" onchange="set_combo('city',this.value);cardata('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12);">
                                                    <option value="">Any State</option>
                                                    <?php
                                                        $state = $this->md->my_select('tbl_location','*',array('label'=>'state'));
                                                        foreach( $state as $single ){
                                                    ?>
                                                    <option value="<?php echo $single->location_id; ?>"><?php echo $single->name; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                                <span class="fa fa-caret-down"></span>
                                            </div>
                                        </div>
                                        <div class="b-items__aside-main-body-item">
                                            <label>SELECT CITY</label>
                                            <div>
                                                <select name="city" class="m-select" id="city" onchange="set_combo('area',this.value);cardata('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12);">
                                                    <option value="" >Any City</option>
                                                </select>
                                                <span class="fa fa-caret-down"></span>
                                            </div>
                                        </div>
                                        <div class="b-items__aside-main-body-item">
                                            <label>SELECT AREA</label>
                                            <div>
                                                <select name="area" class="m-select" id="area" onchange="set_combo('carmela',this.value);cardata('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12);">
                                                    <option value="" >Any Area</option>
                                                </select>
                                                <span class="fa fa-caret-down"></span>
                                            </div>
                                        </div>
                                        <div class="b-items__aside-main-body-item">
                                            <label>SELECT CARMELA</label>
                                            <div>
                                                <select name="carmela" class="m-select" id="carmela" onchange="cardata('<?php echo $this->uri->segment(2) ?>','<?php echo $this->uri->segment(3) ?>',12);">
                                                    <option value="" >Any Status</option>
                                                </select>
                                                <span class="fa fa-caret-down"></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div><!--b-items-->               

        <!--b-contacts-->
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
