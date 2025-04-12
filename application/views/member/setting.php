<!doctype html>
<html lang="en">

    <?php
    $this->load->view('member/head');
    ?>

    <body>

        <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">


            <?php
            $this->load->view('member/header');
            ?>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->

                    <?php
                    $this->load->view('member/menu');
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
                                    <h4 class="mb-sm-0 font-size-18">Setting</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url('carmela-home') ?>">Carmela</a></li>
                                            <li class="breadcrumb-item active">Setting</li>                                            
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">                                                       
                            <div class="offset-3 col-6">
                                <div class="card">
                                    <div class="card-body"> 
                                        <div class="page-content" style="padding-top: 0px">
                                            <div class="container-fluid">
                                                <!-- start page title -->
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                                            <h4 class="mb-sm-0 font-size-18">Change Password</h4>
                                                        </div>  
                                                        <div>
                                                            <form action="" method="post">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Current Password</label>
                                                                    <div class="input-group flex-nowrap">
                                                                        <input type="password" id="box" name="ops" class="form-control" placeholder="Enter Your Current Password" aria-label="O_Password" aria-describedby="password-addon" value="<?php
                                                                        if (!isset($success) && set_value('ops')) {
                                                                            echo set_value('ops');
                                                                        }
                                                                        ?>"/>
                                                                        <span class="input-group-text" id="addon-wrapping"><i id="eye" class = "mdi mdi-eye-outline"></i></span>
                                                                    </div>                                                                    
                                                                </div>                                                                
                                                                <div class="mb-3">
                                                                    <label class="form-label">New Password</label>
                                                                    <div class="input-group flex-nowrap">
                                                                        <input type="password" id="box2" name="nps" class="form-control <?php
                                                                        if (form_error('nps')) {
                                                                            echo 'invalid';
                                                                        }
                                                                        ?>" placeholder="Enter Your New Password" aria-label="N_Password" aria-describedby="password-addon">
                                                                        <span class="input-group-text" id="addon-wrapping"><i id="eye2" class = "mdi mdi-eye-outline"></i></span>                                                                        
                                                                    </div>
                                                                    <p class="errmsg">
                                                                        <?php
                                                                        if (form_error('nps')) {
                                                                            echo form_error('nps');
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Confirm Password</label>
                                                                    <div class="input-group flex-nowrap">
                                                                        <input type="password" id="box1" name="cps" class="form-control <?php
                                                                        if (form_error('cps')) {
                                                                            echo 'invalid';
                                                                        }
                                                                        ?> " placeholder="Confirm Your New Password" aria-label="C_Password" aria-describedby="password-addon">
                                                                        <span class="input-group-text" id="addon-wrapping"><i id="eye1" class = "mdi mdi-eye-outline"></i></span>                                                                        
                                                                    </div>
                                                                    <p class="errmsg">
                                                                        <?php
                                                                        if (form_error('cps')) {
                                                                            echo form_error('cps');
                                                                        }
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                                <div>
                                                                    <button type="submit" class="btn btn-primary" name="change_ps" value="yes" >Change Now</button>
                                                                    <?php
                                                                    if (isset($error)) {
                                                                        ?>
                                                                        <div class="mt-2">
                                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                                <strong>Oops!</strong> <?php echo $error ?>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    if (isset($success)) {
                                                                        ?>
                                                                        <div class="mt-2">
                                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                                <strong>Okey!</strong> <?php echo $success ?>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>   
                                                            </form>      
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end cardaa --> 
                            </div> 
                            <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div><!-- end row -->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php
            $this->load->view('member/footer');
            ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


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
    $this->load->view('member/footerscript');
    ?>

</body>



</html>