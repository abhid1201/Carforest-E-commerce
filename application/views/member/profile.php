<!doctype html>
<html lang="en">

    <?php
    $this->load->view('member/head');
    ?>
    <style>
        .errmsg{
            margin: 0 0 0 0 !important;
            padding: 0px !important;
            color: red !important;
            font-size: 11px !important;
        }

        .invalid{
            border-color: red !important;
            margin-bottom: 5px !important;
        }
    </style>
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
                                    <h4 class="mb-sm-0 font-size-18">Member Profile</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Member Profile</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <?php
                        if (isset($editprofile)) {
                            ?>
                            <div class="row">
                                <div class="col-xl-12 col-lg-8">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm order-2 order-sm-1">
                                                        <div class="d-flex align-items-start mt-3 mt-sm-0">
                                                            <div class="flex-shrink-0">
                                                                <div class="avatar-xl me-3">
                                                                    <input type="file" class="form-control" name="photo" id="profile" style="display: none"/>
                                                                    <label for="profile">
                                                                        <?php
                                                                        if (strlen($editprofile->profile_pic) > 0) {
                                                                            ?>
                                                                            <img class="rounded-circle header-profile-user" style="cursor: pointer; width:100%; height: 75px" src="<?php echo base_url() . $editprofile->profile_pic; ?>" alt="">

                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <img class="rounded-circle header-profile-user" style="cursor: pointer; width:100%; height: 75px" src="<?php echo base_url() ?>member_assets/images/users/blankuser1.png" alt="">
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <div>
                                                                    <h5 class="font-size-16 mb-1"><?php echo $editprofile->name; ?></h5>

                                                                    <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                                        <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?php echo $editprofile->email; ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-auto order-1 order-sm-2">
                                                        <div class="d-flex align-items-start justify-content-end gap-2">
                                                            <div>
                                                                <button type="submit" name="changes" value="yes" class="btn btn-soft-primary"><i class="me-1"></i>Save Changes</button>
                                                            </div>
                                                            <?php
                                                            if (isset($p_error)) {
                                                                ?>
                                                                <div class="mt-2">
                                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                        <strong>Oops!</strong> <?php echo $p_error ?>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="overview" role="tabpanel">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title mb-0">Basic Details</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <div>
                                                            <div class="pb-2">
                                                                <div class="row">
                                                                    <div class="col-xl-2">
                                                                        <div>
                                                                            <h5 class="font-size-15">Name :</h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-3">
                                                                        <div class="text-muted">
                                                                            <input type="text" name="name" class="form-control <?php
                                                                            if (form_error('name')) {
                                                                                echo 'invalid';
                                                                            }
                                                                            ?>" value="<?php
                                                                                   if (!isset($success) && set_value('name')) {
                                                                                       echo set_value('name');
                                                                                   } else {
                                                                                       echo $editprofile->name;
                                                                                   }
                                                                                   ?>"/>  
                                                                            <p class="errmsg">
                                                                                <?php
                                                                                echo form_error('name');
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="py-2">
                                                                <div class="row">
                                                                    <div class="col-xl-2">
                                                                        <div>
                                                                            <h5 class="font-size-15">Email :</h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-3">
                                                                        <div class="text-muted">
                                                                            <input type="text" name="email" class="form-control <?php
                                                                            if (form_error('email')) {
                                                                                echo 'invalid';
                                                                            }
                                                                            ?>" value="<?php
                                                                                   if (!isset($success) && set_value('email')) {
                                                                                       echo set_value('email');
                                                                                   } else {
                                                                                       echo $editprofile->email;
                                                                                   }
                                                                                   ?>"/>
                                                                            <p class="errmsg">
                                                                                <?php
                                                                                echo form_error('email');
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="py-2">
                                                                <div class="row">
                                                                    <div class="col-xl-2">
                                                                        <div>
                                                                            <h5 class="font-size-15">Mobile No :</h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-3">
                                                                        <div class="text-muted">
                                                                            <input type="text" name="mobile" class="form-control <?php
                                                                            if (form_error('mobile')) {
                                                                                echo 'invalid';
                                                                            }
                                                                            ?>" value="<?php
                                                                                   if (!isset($success) && set_value('mobile')) {
                                                                                       echo set_value('mobile');
                                                                                   } else {
                                                                                       echo $editprofile->mobile;
                                                                                   }
                                                                                   ?>"/>
                                                                            <p class="errmsg">
                                                                                <?php
                                                                                echo form_error('mobile');
                                                                                ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="py-2">
                                                                <div class="row">
                                                                    <div class="col-xl-2">
                                                                        <div>
                                                                            <h5 class="font-size-15">Registered Date :</h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-3">
                                                                        <div class="text-muted">
                                                                            <p class="mb-2"><?php echo date('d-m-Y', strtotime($editprofile->join_date)); ?></p> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>                                                    
                                                        </div>
                                                    </div>
                                                    <!-- end card body -->
                                                </div>
                                                <!-- end card -->                                        
                                                <!-- end card -->
                                            </div>
                                            <!-- end tab pane -->                                    
                                            <!-- end tab pane -->
                                            <!-- end tab pane -->
                                        </div>
                                        <!-- end tab content -->
                                    </form>
                                </div>
                                <!-- end col -->                            
                                <!-- end col -->
                            </div> 
                            <?php
                        } else {
                            ?>
                            <div class="row">
                                <div class="col-xl-12 col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm order-2 order-sm-1">
                                                    <div class="d-flex align-items-start mt-3 mt-sm-0">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar-xl me-3">
                                                                <?php
                                                                if (strlen($profile->profile_pic) > 0) {
                                                                    ?>
                                                                    <img class="rounded-circle header-profile-user" style="cursor: pointer; width:100%; height: 75px" src="<?php echo base_url() . $profile->profile_pic; ?>" alt="">

                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <img class="rounded-circle header-profile-user" style="cursor: pointer; width:100%; height: 75px" src="<?php echo base_url() ?>member_assets/images/users/blankuser1.png" alt="">
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <div>
                                                                <h5 class="font-size-16 mb-1"><?php echo $profile->name; ?></h5>

                                                                <div class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                                    <div><i class="mdi mdi-circle-medium me-1 text-success align-middle"></i><?php echo $profile->email; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-auto order-1 order-sm-2">
                                                    <div class="d-flex align-items-start justify-content-end gap-2">
                                                        <div>
                                                            <a href="<?php echo base_url() ?>edit-member-profile/<?php echo base64_encode(base64_encode($profile->register_id)); ?>" class="btn btn-soft-primary"><i class="me-1"></i>Edit</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="overview" role="tabpanel">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title mb-0">Basic Details</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                        <div class="pb-2">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">Name :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p class="mb-1"><?php echo $profile->name; ?></p>                                                                   
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="py-2">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">Email :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p class="mb-2"><?php echo $profile->email; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="py-2">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">Mobile No :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p class="mb-2"><?php echo $profile->mobile; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="py-2">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <div>
                                                                        <h5 class="font-size-15">Registered Date :</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl">
                                                                    <div class="text-muted">
                                                                        <p class="mb-2"><?php echo date('d-m-Y', strtotime($profile->join_date)); ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                                                    
                                                    </div>
                                                </div>
                                                <!-- end card body -->
                                            </div>
                                            <!-- end card -->                                        
                                            <!-- end card -->
                                        </div>
                                        <!-- end tab pane -->                                    
                                        <!-- end tab pane -->
                                        <!-- end tab pane -->
                                    </div>
                                    <!-- end tab content -->
                                </div>
                                <!-- end col -->                            
                                <!-- end col -->
                            </div> 
                            <?php
                        }
                        ?>
                    </div>
                    <!-- end row -->
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
    <script>
        profile.onchange = evt => {
            const [file] = profile.files;
            if (file) {
                blah.src = URL.createObjectURL(file);
            }
        };
    </script>
</body>



</html>