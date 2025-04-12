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
                                    <h4 class="mb-sm-0 font-size-18">Area</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Location</li>
                                            <li class="breadcrumb-item active">Area</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="card overflow-hidden">
                                    <?php
                                    if (isset($editarea)) {
                                        ?>
                                        <div class="card-header">
                                            <h4>Edit Area</h4>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="card-body">
                                                            <div class="">
                                                                <div class="form-group">
                                                                    <label for="formrow-inputState" class="form-label">Select State</label>
                                                                    <select name="state" onchange="set_combo('city', this.value);" id="formrow-inputState" class="form-select <?php
                                                                    if (form_error('state')) {
                                                                        echo "invalid";
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
                                                                                if ($data->location_id == $citydata->parent_id) {
                                                                                    echo "selected";
                                                                                }
                                                                            }
                                                                            ?>><?php echo $data->name; ?></option>
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
                                                        </div>
                                                        <div>
                                                            <button name="update" value="yes" type="submit" class="btn btn-primary w-md">Edit</button>
                                                            &nbsp;
                                                            <button type="reset" class="btn btn-light w-md">Clear</button>
                                                            &nbsp;
                                                            <a href="<?php echo base_url('manage-area'); ?>" class="btn btn-light w-md">Cancel</a>
                                                        </div>                                                        
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card-body">
                                                            <div class="">
                                                                <div class="form-group">
                                                                    <label>Select City</label>
                                                                    <select name="city" id="city" class="form-control <?php
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
                                                                                <option value="<?php echo $data->location_id; ?>"  <?php
                                                                                if (!isset($success) && set_select('city', $data->location_id)) {
                                                                                    echo set_select('city', $data->location_id);
                                                                                } else {
                                                                                    if ($data->location_id == $citydata->parent_id) {
                                                                                        echo "selected";
                                                                                    }
                                                                                }
                                                                            }
                                                                            ?>>
                                                                                        <?php echo $data->name; ?>
                                                                            </option>
                                                                            <?php
                                                                        } else {
                                                                            $wh['parent_id'] = $citydata->parent_id;
                                                                            $records = $this->md->my_select('tbl_location', '*', $wh);
                                                                            foreach ($records as $data) {
                                                                                ?>
                                                                                <option value="<?php echo $data->location_id ?>" <?php
                                                                                if ($data->location_id == $citydata->location_id) {
                                                                                    echo "selected";
                                                                                }
                                                                                ?> ><?php echo $data->name; ?></option>
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card-body">

                                                            <div class="">
                                                                <div class="form-group">
                                                                    <label>Area Name</label>
                                                                    <input type="text" name="area" class="form-control <?php
                                                                    if (form_error('area')) {
                                                                        echo 'invalid';
                                                                    }
                                                                    ?>" placeholder="Enter Area Name" value="<?php
                                                                           if (!isset($success) && set_value('area')) {
                                                                               echo set_value('area');
                                                                           } else {
                                                                               echo $editarea->name;
                                                                           }
                                                                           ?>">
                                                                    <p class="errmsg">
                                                                        <?php
                                                                        echo form_error('area');
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
                                            <h4>Add New Area</h4>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="card-body">
                                                            <div class="">
                                                                <div class="form-group">
                                                                    <label>Select State</label>
                                                                    <select name="state" onchange="set_combo('city', this.value);" class="form-select <?php
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
                                                            </div>
                                                            <div class="mt-4">
                                                                <button name="add" value="yes" type="submit" class="btn btn-primary w-md">Add  </button>
                                                                &nbsp;
                                                                <button type="reset" class="btn btn-light w-md">Clear</button>
                                                            </div>                                                        
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card-body">
                                                            <div class="">
                                                                <div class="form-group">
                                                                    <label>Select City</label>
                                                                    <select name="city" id="city" class="form-select <?php
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
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <p class="errmsg">
                                                                        <?php
                                                                        echo form_error('city');
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card-body">

                                                            <div class="">
                                                                <div class="form-group">
                                                                    <label>Area Name</label>
                                                                    <input type="text" name="area" class="form-control <?php
                                                                    if (form_error('area')) {
                                                                        echo 'invalid';
                                                                    }
                                                                    ?>" placeholder="Enter Area Name" value="<?php
                                                                           if (!isset($success) && set_value('area')) {
                                                                               echo set_value('area');
                                                                           }
                                                                           ?>">
                                                                    <p class="errmsg">
                                                                        <?php
                                                                        echo form_error('area');
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
                        </div>                        

                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>View All Areas</h4>
                                    </div>
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-bordered dt-responsive w-100">
                                            <thead>
                                                <tr align="center">
                                                    <th>No.</th>
                                                    <th>State</th>
                                                    <th>City</th>
                                                    <th>Area</th>
                                                    <th>Edit</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($area as $data) {
                                                    $c++;
                                                    ?>
                                                    <tr valign="middle" align="center">
                                                        <td><?php echo $c; ?></td>
                                                        <td><?php echo $data->state; ?></td>                                                        
                                                        <td><?php echo $data->city; ?></td>
                                                        <td><?php echo $data->name; ?></td>
                                                        <td align="center">
                                                            <a href="<?php base_url() ?>edit-area/<?php echo base64_encode(base64_encode($data->location_id)); ?>" style="color:blue;" >
                                                                <i class="fa fa-pen" title="Edit" data-bs-toggle="tooltip"></i>
                                                            </a>
                                                        </td>
                                                        <td align="center">
                                                            <a style="color:red; cursor: pointer" onclick="delete_record('area', '<?php echo base64_encode(base64_encode($data->location_id)); ?>')" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
                        <!-- end col -->


                        <!-- end col -->
                    </div><!-- end row -->
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
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">No, Cancel It.</button>
                            <a id="delete_link" class="btn btn-danger">Yes, Delete It!</a>
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



</html>