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
                                    <h4 class="mb-sm-0 font-size-18">Model</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin-home') ?>">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Car Type</li>
                                            <li class="breadcrumb-item active">Model</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card overflow-hidden">
                                    <?php
                                    if (isset($editmodel)) {
                                        ?>
                                        <div class="card-header">
                                            <h4>edit Model</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="post">
                                                <div class="row">   
                                                    <div class="col-md-4">
                                                        <div class="card-body">                                                    
                                                            <div>
                                                                <div class="form-group">
                                                                    <label for="formrow-inputState" class="form-label">Select Type</label>
                                                                    <select name="type" onchange="set_combo('company', this.value);" id="formrow-inputState" class="form-select <?php
                                                                    if (form_error('type')) {
                                                                        echo "invalid";
                                                                    }
                                                                    ?>">
                                                                        <option value="">Select Type</option>
                                                                        <?php
                                                                        foreach ($type as $data) {
                                                                            ?>
                                                                            <option value="<?php echo $data->category_id; ?>" <?php
                                                                            if (!isset($success) && set_select('type', $data->category_id)) {
                                                                                echo set_select('type', $data->category_id);
                                                                            } else {
                                                                                if ($data->category_id == $companydata->parent_id) {
                                                                                    echo "selected";
                                                                                }
                                                                            }
                                                                            ?> ><?php echo $data->name; ?></option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                    </select>
                                                                    <p class="errmsg">
                                                                        <?php
                                                                        echo form_error('type');
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="mt-4">
                                                                <button name="add" value="yes" type="submit" class="btn btn-primary w-md">Add  </button>
                                                                &nbsp;
                                                                <button type="clear" class="btn btn-light w-md">Clear</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card-body">
                                                            <div>
                                                                <div class="form-group">
                                                                    <label>Select Company</label>
                                                                    <select name="company" id="company" class="form-select <?php
                                                                    if (form_error('company')) {
                                                                        echo 'invalid';
                                                                    }
                                                                    ?>">
                                                                        <option value="">Select Company</option>
                                                                        <?php
                                                                        if ($this->input->post('type')) {
                                                                            $wh['parent_id'] = $this->input->post('type');
                                                                            $records = $this->md->my_select('tbl_category', '*', $wh);
                                                                            foreach ($records as $data) {
                                                                                ?>
                                                                                <option value="<?php echo $data->category_id; ?>"  <?php
                                                                                if (!isset($success) && set_select('company', $data->category_id)) {
                                                                                    echo set_select('company', $data->category_id);
                                                                                }
                                                                            }
                                                                            ?>>
                                                                                        <?php echo $data->name; ?>
                                                                            </option>
                                                                            <?php
                                                                        } else {
                                                                            $wh['parent_id'] = $companydata->parent_id;
                                                                            $records = $this->md->my_select('tbl_category', '*', $wh);
                                                                            foreach ($records as $data) {
                                                                                ?>
                                                                                <option value="<?php echo $data->category_id ?>" <?php
                                                                                if ($data->category_id == $companydata->category_id) {
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
                                                                        echo form_error('company');
                                                                        ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="card-body">
                                                            <div>
                                                                <div class="form-group">
                                                                    <label>Model Name</label>
                                                                    <input type="text" name="model" class="form-control <?php
                                                                    if (form_error('model')) {
                                                                        echo 'invalid';
                                                                    }
                                                                    ?>" placeholder="Enter model Name" value="<?php
                                                                           if (!isset($success) && set_value('model')) {
                                                                               echo set_value('model');
                                                                           }
                                                                           ?>">
                                                                    <p class="errmsg">
                                                                        <?php
                                                                        echo form_error('model');
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
                                        <h4>Add New Model</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="row">   
                                                <div class="col-md-4">
                                                    <div class="card-body">                                                    
                                                        <div>
                                                            <div class="form-group">
                                                                <label>Select Type</label>
                                                                <select name="type" onchange="set_combo('company', this.value);" class="form-select <?php
                                                                if (form_error('type')) {
                                                                    echo 'invalid';
                                                                }
                                                                ?>">
                                                                    <option value="">Select type</option>
                                                                    <?php
                                                                    foreach ($type as $data) {
                                                                        ?>
                                                                        <option value="<?php echo $data->category_id; ?>" <?php
                                                                        if (!isset($success) && set_select('type', $data->category_id)) {
                                                                            echo set_select('type', $data->category_id);
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
                                                                    echo form_error('type');
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4">
                                                            <button name="add" value="yes" type="submit" class="btn btn-primary w-md">Add  </button>
                                                            &nbsp;
                                                            <button type="clear" class="btn btn-light w-md">Clear</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card-body">
                                                        <div>
                                                            <div class="form-group">
                                                                <label>Select Company</label>
                                                                <select name="company" id="company" class="form-select <?php
                                                                if (form_error('company')) {
                                                                    echo 'invalid';
                                                                }
                                                                ?>">
                                                                    <option value="">Select Company</option>
                                                                    <?php
                                                                    if ($this->input->post('type')) {
                                                                        $wh['parent_id'] = $this->input->post('type');
                                                                        $records = $this->md->my_select('tbl_category', '*', $wh);
                                                                        foreach ($records as $data) {
                                                                            ?>
                                                                            <option value="<?php echo $data->category_id ?>" <?php
                                                                            if (!isset($success) && set_select('company', $data->category_id)) {
                                                                                echo set_select('company', $data->category_id);
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
                                                                    echo form_error('company');
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card-body">
                                                        <div>
                                                            <div class="form-group">
                                                                <label>Model Name</label>
                                                                <input type="text" name="model" class="form-control <?php
                                                                if (form_error('model')) {
                                                                    echo 'invalid';
                                                                }
                                                                ?>" placeholder="Enter model Name" value="<?php
                                                                       if (!isset($success) && set_value('model')) {
                                                                           echo set_value('model');
                                                                       }
                                                                       ?>">
                                                                <p class="errmsg">
                                                                    <?php
                                                                    echo form_error('model');
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
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">View All Model</h4>

                                    </div>
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-bordered dt-responsive w-100">
                                            <thead>
                                                <tr align="center">
                                                    <th>No.</th>
                                                    <th>Type</th>
                                                    <th>Company</th>
                                                    <th>Model</th>
                                                    <th>Edit</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
                                                $c = 0;
                                                foreach ($model as $data) {
                                                    $c++;
                                                    ?>
                                                    <tr valign="middle" align="center">
                                                        <td><?php echo $c; ?></td>
                                                        <td><?php echo $data->type; ?></td>                                                        
                                                        <td><?php echo $data->company; ?></td>
                                                        <td><?php echo $data->name; ?></td>
                                                        <td align="center">
                                                            <a href="<?php base_url() ?>edit-model/<?php echo base64_encode(base64_encode($data->category_id)); ?>" style="color:blue;" >
                                                                <i class="fa fa-pen" title="Edit" data-bs-toggle="tooltip"></i>
                                                            </a>
                                                        </td>
                                                        <td align="center">
                                                            <a style="color:red;" href="" onclick="delete_record('model', '<?php echo base64_encode(base64_encode($data->category_id)); ?>')" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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