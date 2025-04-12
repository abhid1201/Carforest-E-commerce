<!doctype html>
<html lang="en">

    <?php
    $this->load->view('admin/head');
    ?>

    <body>

        <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">


            <?php
            $this->load->view('admin/header');
            ?>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->

                    <?php
                    $this->load->view('admin/menu');
                    ?>

                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Pages</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-h-100">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Contact Us</span>
                                                            <h4 class="mb-3">
                                                                <?php
                                                                $contactus = $this->md->my_select('tbl_contact_us');
                                                                $count_c = count($contactus);
                                                                ?> 
                                                                <span class="counter-value" data-target="<?php echo $count_c; ?>">0</span>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    <div class="text-nowrap">
                                                        <a href="<?php echo base_url('manage-contact-us') ?>">
                                                            <span class="ms-1 text-muted font-size-13">View Details</span>
                                                        </a>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->

                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-h-100">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Feedback</span>
                                                            <h4 class="mb-3">
                                                                <?php
                                                                $feedback = $this->md->my_select('tbl_feedback');
                                                                $count_f = count($feedback);
                                                                ?>
                                                                <span class="counter-value" data-target="<?php echo $count_f; ?>">0</span>
                                                            </h4>
                                                        </div>
                                                        <div class="col-6">

                                                        </div>
                                                    </div>
                                                    <div class="text-nowrap">
                                                        <a href="<?php echo base_url('manage-feedback') ?>">
                                                            <span class="ms-1 text-muted font-size-13">View Details</span>
                                                        </a>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-->

                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-h-100">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Banner</span>
                                                            <h4 class="mb-3">
                                                                <?php
                                                                $banner = $this->md->my_select('tbl_banner');
                                                                $count_b = count($banner);
                                                                ?>
                                                                <span class="counter-value" data-target="<?php echo $count_b ?>">0</span>
                                                            </h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-nowrap">

                                                        <a href="<?php echo base_url('manage-banner') ?>">
                                                            <span class="ms-1 text-muted font-size-13">View Details</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end card body -->
                                            </div>
                                            <!-- end card -->
                                        </div>
                                        <!-- end col --> 

                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-h-100">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Member</span>
                                                            <h4 class="mb-3">
                                                                <?php
                                                                $member = $this->md->my_select('tbl_register');
                                                                $count_m = count($member);
                                                                ?>
                                                                <span class="counter-value" data-target="<?php echo $count_m ?>">0</span>
                                                            </h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-nowrap">

                                                        <a href="<?php echo base_url('manage-member') ?>">
                                                            <span class="ms-1 text-muted font-size-13">View Details</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end card body -->
                                            </div>
                                            <!-- end card -->
                                        </div>
                                        <!-- end col --> 
                                    </div>  
                                </div>
                            </div>
                        </div>                       
                        <!-- end row-->

                        <div class="row">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Location</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-h-100">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">State</span>
                                                            <h4 class="mb-3">
                                                                <?php
                                                                $state = $this->md->my_select('tbl_location', '*', array('label' => 'State'));
                                                                $count_s = count($state);
                                                                ?>
                                                                <span class="counter-value" data-target="<?php echo $count_s ?>">0</span>
                                                            </h4>
                                                        </div>

                                                        <div class="col-6">

                                                        </div>
                                                    </div>
                                                    <div class="text-nowrap">

                                                        <a href="<?php echo base_url('manage-state') ?>">
                                                            <span class="ms-1 text-muted font-size-13">View Details</span>
                                                        </a>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->

                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-h-100">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">City</span>
                                                            <h4 class="mb-3">
                                                                <?php
                                                                $city = $this->md->my_select('tbl_location', '*', array('label' => 'City'));
                                                                $count_ct = count($city);
                                                                ?>
                                                                <span class="counter-value" data-target="<?php echo $count_ct ?>">0</span>
                                                            </h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-nowrap">

                                                        <a href="<?php echo base_url('manage-city') ?>">
                                                            <span class="ms-1 text-muted font-size-13">View Details</span>
                                                        </a>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-->

                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-h-100">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Area</span>
                                                            <h4 class="mb-3">
                                                                <?php
                                                                $area = $this->md->my_select('tbl_location', '*', array('label' => 'Area'));
                                                                $count_a = count($area);
                                                                ?>
                                                                <span class="counter-value" data-target="<?php echo $count_a ?>">0</span>
                                                            </h4>
                                                        </div>
                                                        <div class="col-6">

                                                        </div>
                                                    </div>
                                                    <div class="text-nowrap">

                                                        <a href="<?php echo base_url('manage-area') ?>">
                                                            <span class="ms-1 text-muted font-size-13">View Details</span>
                                                        </a>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                    </div>  
                                </div>
                            </div>
                        </div>                       
                        <!-- end row-->

                        <div class="row">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Car Type</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-h-100">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Type</span>
                                                            <h4 class="mb-3">
                                                                <?php
                                                                $type = $this->md->my_select('tbl_category', '*', array('label' => 'type'));
                                                                $count_t = count($type);
                                                                ?>
                                                                <span class="counter-value" data-target="<?php echo $count_t ?>">0</span>
                                                            </h4>
                                                        </div>

                                                        <div class="col-6">

                                                        </div>
                                                    </div>
                                                    <div class="text-nowrap">

                                                        <a href="<?php echo base_url('manage-type') ?>">
                                                            <span class="ms-1 text-muted font-size-13">View Details</span>
                                                        </a>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->

                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-h-100">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Company</span>
                                                            <h4 class="mb-3">
                                                                <?php
                                                                $company = $this->md->my_select('tbl_category', '*', array('label' => 'company'));
                                                                $count_cm = count($company);
                                                                ?>
                                                                <span class="counter-value" data-target="<?php echo $count_cm ?>">0</span>
                                                            </h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-nowrap">

                                                        <a href="<?php echo base_url('manage-company') ?>">
                                                            <span class="ms-1 text-muted font-size-13">View Details</span>
                                                        </a>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-->

                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-h-100">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Model</span>
                                                            <h4 class="mb-3">
                                                                <?php
                                                                $model = $this->md->my_select('tbl_category', '*', array('label' => 'model'));
                                                                $count_md = count($model);
                                                                ?>
                                                                <span class="counter-value" data-target="<?php echo $count_md ?>">0</span>
                                                            </h4>
                                                        </div>
                                                        <div class="col-6">

                                                        </div>
                                                    </div>
                                                    <div class="text-nowrap">

                                                        <a href="<?php echo base_url('manage-model') ?>">
                                                            <span class="ms-1 text-muted font-size-13">View Details</span>
                                                        </a>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->

                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-h-100">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Sub Model</span>
                                                            <h4 class="mb-3">
                                                                <?php
                                                                $submodel = $this->md->my_select('tbl_category', '*', array('label' => 'submodel'));
                                                                $count_sm = count($submodel);
                                                                ?>
                                                                <span class="counter-value" data-target="<?php echo $count_sm ?>">0</span>
                                                            </h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <div id="mini-chart4" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-nowrap">

                                                        <a href="<?php echo base_url('manage-sub-model') ?>">
                                                            <span class="ms-1 text-muted font-size-13">View Details</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end card body -->
                                            </div>
                                            <!-- end card -->
                                        </div>
                                        <!-- end col --> 

                                    </div>  
                                </div>
                            </div>
                        </div>                       
                        <!-- end row-->

                        <div class="row">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Carmela</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-h-100">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">All Carmela</span>
                                                            <h4 class="mb-3">
                                                                <?php
                                                                $carmela = $this->md->my_select('tbl_carmela');
                                                                $count_crm = count($carmela);
                                                                ?>
                                                                <span class="counter-value" data-target="<?php echo $count_crm ?>">0</span>
                                                            </h4>
                                                        </div>

                                                        <div class="col-6">

                                                        </div>
                                                    </div>
                                                    <div class="text-nowrap">

                                                        <a href="<?php echo base_url('manage-carmela') ?>">
                                                            <span class="ms-1 text-muted font-size-13">View Details</span>
                                                        </a>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->

                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-h-100">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Active Carmela</span>
                                                            <h4 class="mb-3">
                                                                <?php
                                                                $active_carmela = $this->md->my_select('tbl_carmela', '*', array('status' => 1));
                                                                $count_a_crm = count($active_carmela);
                                                                ?>
                                                                <span class="counter-value" data-target="<?php echo $count_a_crm ?>">0</span>
                                                            </h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-nowrap">

                                                        <a href="<?php echo base_url('manage-carmela') ?>">
                                                            <span class="ms-1 text-muted font-size-13">View Details</span>
                                                        </a>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-->

                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-h-100">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Pending Carmela</span>
                                                            <h4 class="mb-3">
                                                                <?php
                                                                $pending_carmela = $this->md->my_select('tbl_carmela', '*', array('status' => 0));
                                                                $count_p_crm = count($pending_carmela);
                                                                ?>
                                                                <span class="counter-value" data-target="<?php echo $count_p_crm ?>">0</span>
                                                            </h4>
                                                        </div>
                                                        <div class="col-6">

                                                        </div>
                                                    </div>
                                                    <div class="text-nowrap">

                                                        <a href="<?php echo base_url('manage-carmela') ?>">
                                                            <span class="ms-1 text-muted font-size-13">View Details</span>
                                                        </a>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                    </div>  
                                </div>
                            </div>
                        </div>                       
                        <!-- end row-->

                        <div class="row">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Car</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-h-100">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">All Cars</span>
                                                            <h4 class="mb-3">
                                                                <?php
                                                                $car = $this->md->my_select('tbl_car');
                                                                $count_car = count($car);
                                                                ?>
                                                                <span class="counter-value" data-target="<?php echo $count_car ?>">0</span>
                                                            </h4>
                                                        </div>

                                                        <div class="col-6">

                                                        </div>
                                                    </div>
                                                    <div class="text-nowrap">

                                                        <a href="<?php echo base_url('manage-cars') ?>">
                                                            <span class="ms-1 text-muted font-size-13">View Details</span>
                                                        </a>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->

                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-h-100">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Active Cars</span>
                                                            <h4 class="mb-3">
                                                                <?php
                                                                $active_car = $this->md->my_select('tbl_car', '*', array('status' => 1));
                                                                $count_a_car = count($active_car);
                                                                ?>
                                                                <span class="counter-value" data-target="<?php echo $count_a_car ?>">0</span>
                                                            </h4>
                                                        </div>
                                                        <div class="col-6">
                                                            <div id="mini-chart2" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-nowrap">

                                                        <a href="<?php echo base_url('manage-cars') ?>">
                                                            <span class="ms-1 text-muted font-size-13">View Details</span>
                                                        </a>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col-->

                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-h-100">
                                                <!-- card body -->
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Pending Cars</span>
                                                            <h4 class="mb-3">
                                                                <?php
                                                                $pendind_car = $this->md->my_select('tbl_car', '*', array('status' => 0));
                                                                $count_p_car = count($pendind_car);
                                                                ?>
                                                                <span class="counter-value" data-target="<?php echo $count_p_car ?>">0</span>
                                                            </h4>
                                                        </div>
                                                        <div class="col-6">

                                                        </div>
                                                    </div>
                                                    <div class="text-nowrap">

                                                        <a href="<?php echo base_url('manage-cars') ?>">
                                                            <span class="ms-1 text-muted font-size-13">View Details</span>
                                                        </a>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                    </div>  
                                </div>
                            </div>
                        </div>                       
                        <!-- end row-->
                    </div>
                    <!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php
            $this->load->view('admin/footer');
            ?>

        </div>
        <!-- end main content-->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center bg-dark p-3">

                    <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="m-0" />

                <div class="p-4">
                    <h6 class="mb-3">Layout</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                               id="layout-vertical" value="vertical">
                        <label class="form-check-label" for="layout-vertical">Vertical</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                               id="layout-horizontal" value="horizontal">
                        <label class="form-check-label" for="layout-horizontal">Horizontal</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                               id="layout-mode-light" value="light">
                        <label class="form-check-label" for="layout-mode-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                               id="layout-mode-dark" value="dark">
                        <label class="form-check-label" for="layout-mode-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                               id="layout-width-fuild" value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                        <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                               id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                        <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                               id="layout-position-fixed" value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                        <label class="form-check-label" for="layout-position-fixed">Fixed</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                               id="layout-position-scrollable" value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                        <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                               id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                        <label class="form-check-label" for="topbar-color-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                               id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                        <label class="form-check-label" for="topbar-color-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                               id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                        <label class="form-check-label" for="sidebar-size-default">Default</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                               id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                        <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                               id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                        <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                               id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                        <label class="form-check-label" for="sidebar-color-light">Light</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                               id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                        <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                               id="sidebar-color-brand" value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                        <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Direction</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                               id="layout-direction-ltr" value="ltr">
                        <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                               id="layout-direction-rtl" value="rtl">
                        <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                    </div>

                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <?php
        $this->load->view('admin/footerscript');
        ?>

    </body>



</html>