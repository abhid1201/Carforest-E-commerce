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
                                    <h4 class="mb-sm-0 font-size-18">City</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Location</li>
                                            <li class="breadcrumb-item active">City</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="card overflow-hidden">
                                    <?php
                                    if (isset($editcity)) {
                                        ?>
                                        <div class="card-header">
                                            <h4>Edit City</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="post">
                                                <div class="row">                                                
                                                    <div class="col-md-6">
                                                        <div class="card-body">                                                        
                                                            <div class="">
                                                                <div class="form-group">
                                                                    <label>Select State</label>
                                                                    <select name="state" class="form-select <?php
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
                                                                                if ($data->location_id == $editcity->parent_id) {
                                                                                    echo 'selected';
                                                                                }
                                                                            }
                                                                            ?>>                                                                    
                                                                                        <?php echo $data->name; ?>
                                                                            </option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <p class="errmsg">
                                                                        <?php
                                                                        echo form_error('state');
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-4">
                                                                <button type="submit" name="update" value="yes" class="btn btn-primary w-md">Edit</button>
                                                                &nbsp;
                                                                <button type="reset" class="btn btn-light w-md">Clear</button>
                                                                &nbsp;
                                                                <a href="<?php echo base_url('manage-city'); ?>" class="btn btn-light w-md">Cancel</a>
                                                            </div>                                                            
                                                        </div>                                                        
                                                    </div>                                                
                                                    <div class="col-md-6">
                                                        <div class="card-body">                                                        
                                                            <div class="">
                                                                <div class="form-group">
                                                                    <label>City Name</label>
                                                                    <input type="text" class="form-control <?php
                                                                    if (form_error('city')) {
                                                                        echo 'invalid';
                                                                    }
                                                                    ?>" placeholder="Enter City Name" name="city" value="<?php
                                                                           if (!isset($success) && set_value('city')) {
                                                                               echo set_value('city');
                                                                           } else {
                                                                               echo $editcity->name;
                                                                           }
                                                                           ?>">
                                                                    <p class="errmsg">
                                                                        <?php
                                                                        echo form_error('city');
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <?php
                                                        echo "</br>";
                                                        if (isset($error)) {
                                                            ?>
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                <strong>Oops!</strong> <?php echo $error; ?>
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                            <?php
                                                        }
                                                        if (isset($success)) {
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <strong>Okey!</strong> <?php echo $success; ?>
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>                                    
                                        <?php
                                    } else {
                                        ?>
                                        <div class="card-header">
                                            <h4>Add New City</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="card-body">                                                        
                                                            <div class="">
                                                                <div class="form-group">
                                                                    <label>Select State</label>
                                                                    <select name="state" class="form-select <?php
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
                                                                            }
                                                                            ?>>                                                                      
                                                                                        <?php echo $data->name; ?>
                                                                            </option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <p class="errmsg">
                                                                        <?php
                                                                        echo form_error('state');
                                                                        ?>
                                                                    </p>                                                                   
                                                                </div>
                                                                <div class="mt-4">
                                                                    <button type="submit" name="add" value="yes" class="btn btn-primary w-md">Add</button>
                                                                    &nbsp;
                                                                    <button type="reset" class="btn btn-light w-md">Clear</button>
                                                                </div>
                                                            </div>                                                                                                                    
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="card-body">                                                        
                                                            <div class="">
                                                                <div class="form-group">                                                                    
                                                                    <label>City Name</label>
                                                                    <input type="text" class="form-control <?php
                                                                    if (form_error('city')) {
                                                                        echo 'invalid';
                                                                    }
                                                                    ?>" placeholder="Enter City Name" name="city" value="<?php
                                                                           if (!isset($success) && set_value('city')) {
                                                                               echo set_value('city');
                                                                           }
                                                                           ?>">                                                                    
                                                                    <p class="errmsg" >
                                                                        <?php
                                                                        echo form_error('city');
                                                                        ?>
                                                                    </p>                                                                    
                                                                </div>
                                                            </div>                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <?php
                                                        echo "</br>";
                                                        if (isset($error)) {
                                                            ?>
                                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                <strong>Oops!</strong> <?php echo $error; ?>
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                            <?php
                                                        }
                                                        if (isset($success)) {
                                                            ?>
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <strong>Okey!</strong> <?php echo $success; ?>
                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <!-- end page title -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h4 class="card-title-mb-3">View All City</h4>
                                                </div>
                                                <div class="col-4" style="text-align:right;">
                                                    <button class="btn btn-danger" onclick="delete_record('city', '<?php echo base64_encode(base64_encode(0)); ?>')" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete All Records</button>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="card-body">
                                            <table id="datatable-buttons" class="table table-bordered dt-responsive w-100">
                                                <thead>
                                                    <tr align="center">
                                                        <th>No.</th>
                                                        <th>State</th>
                                                        <th>City</th>
                                                        <th>Edit</th>
                                                        <th>Remove</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    $c = 0;
                                                    foreach ($city as $data) {
                                                        $c++;
                                                        ?>
                                                        <tr valign="middle" align="center">
                                                            <td><?php echo $c; ?></td>
                                                            <td><?php echo $data->state; ?></td>                                                        
                                                            <td><?php echo $data->name; ?></td>
                                                            <td align="center">
                                                                <a href="<?php base_url() ?>edit-city/<?php echo base64_encode(base64_encode($data->location_id)); ?>" style="color:blue" >
                                                                    <i class="fa fa-pen" title="Edit" data-bs-toggle="tooltip"></i>
                                                                </a>
                                                            </td>
                                                            <td align="center">
                                                                <a href="" style="color:red;" onclick="delete_record('city', '<?php echo base64_encode(base64_encode($data->location_id)); ?>')"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                    <i class="fa fa-trash" title="Remove" data-bs-toggle="tooltip"></i>
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
            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
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
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">No, Cancel It.</button>
                        <a id="delete_link" type="button" class="btn btn-danger">Yes, Delete It!</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $this->load->view('admin/footerscript');
        ?>

    </body>



</html>