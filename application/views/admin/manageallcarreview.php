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
                                    <h4 class="mb-sm-0 font-size-18">Reviews</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin-home') ?>">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Carmela</li>
                                            <li class="breadcrumb-item active">View all Car Review</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-8">
                                                <h4 class="card-title-mb-3">View All Car Reviews</h4>
                                            </div>
                                            <div class="col-4" style="text-align:right;">
                                                <button class="btn btn-danger" onclick="delete_record('cars', '<?php echo base64_encode(base64_encode(0)); ?>')" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete All Records</button>
                                            </div>
                                        </div> 
                                    </div>                                   
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-bordered dt-responsive w-100">
                                            <thead>
                                                <tr align="center">
                                                    <th>No.</th>
                                                    <th>Carmela</th>
                                                    <th>Car Photo</th>
                                                    <th>Member</th>
                                                    <th>Message</th>
                                                    <th>Rating</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>

                                            <tbody>                                                
                                                <?php
                                                $i = 0;
                                                foreach ($car_review as $data) {
                                                    $i++;
                                                    $car = $this->md->my_select('tbl_car', '*', array('car_id' => $data->car_id))[0];
                                                    $member = $this->md->my_select('tbl_register', '*', array('register_id' => $data->register_id))[0];
                                                    $carmela = $this->md->my_select('tbl_carmela', '*', array('carmela_id' => $car->carmela_id))[0]->carmela_name;
                                                    ?>
                                                    <tr valign="middle" align="center">
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $carmela; ?></td>
                                                        <td>
                                                            <?php
                                                            $carimage = $this->md->my_query("SELECT path FROM `tbl_car_image` WHERE car_id =" . $data->car_id . " AND type = 'Front Side'")[0]->path;
                                                            $path = explode(",", $carimage);
                                                            ?>
                                                            <a href="<?php echo base_url().$path[0]; ?>" target="_blank">
                                                                <img class="rounded" style="width: 75px;" src="<?php echo base_url().$path[0]; ?>" title="<?php echo $car->name; ?>" data-bs-toggle="tooltip">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <?php
                                                                if(strlen($member->profile_pic) > 0 ){
                                                            ?>
                                                            <img class="rounded-circle header-profile-user" src="<?php echo base_url().$member->profile_pic; ?>" title="<?php echo $member->name; ?>" data-bs-toggle="tooltip">
                                                            <?php
                                                                }
                                                                else
                                                                {
                                                            ?>
                                                            <img class="rounded-circle header-profile-user" src="<?php echo base_url(); ?>admin_assets/images/users/blankuser1.png" title="<?php echo $member->name; ?>" data-bs-toggle="tooltip">
                                                            <?php        
                                                                }
                                                            ?>
                                                        </td>
                                                        <td><?php echo $data->msg; ?></td>
                                                        <td style="width: 15%">
                                                            <div style="color:#F76D2B" title="<?php echo $data->rating; ?> Star">
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
                                                        </td>
                                                        <td>
                                                            <a onclick="change_status('carreview', <?php echo $data->review_id; ?>)" id="status_<?php echo $data->review_id; ?>" data-toggle="tooltip" data-placement="bottom" title="Active">
                                                                <?php
                                                                if ($data->status == 1) {
                                                                    ?>
                                                                    <i class="fa fa-toggle-on" style="color: green;cursor: pointer" data-toggle="tooltip" data-placement="bottom" title="Active"  ></i>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <i class="fa-solid fa-toggle-off" style="cursor: pointer;"></i>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </a>    
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end cardaa --> 
                            </div>
                            <!-- end col -->
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
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"><i class="fa fa-exclamation-triangle"></i> Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure want to delete ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">No, Cancel it.</button>
                            <a id="delete_link" class="btn btn-danger">Yes, Delete it !</a>
                        </div>
                    </div>
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

</html

