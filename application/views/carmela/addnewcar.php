<!doctype html>
<html lang="en">

    <?php
    $this->load->view('carmela/head');
    ?>

    <body>

        <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">


            <?php
            $this->load->view('carmela/header');
            ?>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->

                    <?php
                    $this->load->view('carmela/menu');
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
                                    <h4 class="mb-sm-0 font-size-18">Add New Car</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                            <li class="breadcrumb-item active">My Cars</li>
                                            <li class="breadcrumb-item active">Add new car</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            if ($this->session->userdata('cardetails') == 1) {
                                ?>
                                <div class="card overflow-hidden">
                                    <div class="card-header">
                                        <h4>Add New Car Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="row">                                       
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Select Type</label>
                                                        <select onchange="set_combo('company', this.value);" class="form-select <?php
                                                        if (form_error('type')) {
                                                            echo 'invalid';
                                                        }
                                                        ?>"" name="type">
                                                            <option value="">Select Car Type</option>
                                                            <?php
                                                            foreach ($type as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->category_id ?>"<?php
                                                                if (!isset($success) && set_select('type', $data->category_id)) {
                                                                    echo set_select('type', $data->category_id);
                                                                } elseif (isset($car_info)) {
                                                                    if ($data->category_id == $car_info->main_id) {
                                                                        echo 'selected';
                                                                    }
                                                                }
                                                                ?>>
                                                                            <?php echo $data->name; ?>
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
                                                    <div class="form-group mt-4">
                                                        <label>Select Company</label>
                                                        <select id="company" onchange="set_combo('model', this.value);" class="form-select <?php
                                                        if (form_error('company')) {
                                                            echo 'invalid';
                                                        }
                                                        ?>"" name="company">
                                                            <option value="">Select Car Company</option>
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
                                                            } elseif (isset($car_info)) {
                                                                $wh['parent_id'] = $car_info->main_id;
                                                                $records = $this->md->my_select('tbl_category', '*', $wh);
                                                                foreach ($records as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->category_id ?>" <?php
                                                                    if (!isset($success) && set_select('company', $data->category_id)) {
                                                                        echo set_select('company', $data->category_id);
                                                                    } elseif (isset($car_info)) {
                                                                        if ($data->category_id == $car_info->company_id) {
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
                                                            echo form_error('company');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="form-group mt-4">
                                                        <label>Select Model</label>
                                                        <select id="model" onchange="set_combo('submodel', this.value);" class="form-select <?php
                                                        if (form_error('model')) {
                                                            echo 'invalid';
                                                        }
                                                        ?>" name="model">
                                                            <option value="">Select Car Model</option>
                                                            <?php
                                                            if ($this->input->post('company')) {
                                                                $wh['parent_id'] = $this->input->post('company');
                                                                $records = $this->md->my_select('tbl_category', '*', $wh);
                                                                foreach ($records as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->category_id ?>" <?php
                                                                    if (!isset($success) && set_select('model', $data->category_id)) {
                                                                        echo set_select('model', $data->category_id);
                                                                    }
                                                                    ?>>
                                                                        <?php echo $data->name; ?></option>
                                                                    <?php
                                                                }
                                                            } elseif (isset($car_info)) {
                                                                $wh['parent_id'] = $car_info->company_id;
                                                                $records = $this->md->my_select('tbl_category', '*', $wh);
                                                                foreach ($records as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->category_id ?>" <?php
                                                                    if (!isset($success) && set_select('company', $data->category_id)) {
                                                                        echo set_select('company', $data->category_id);
                                                                    } elseif (isset($car_info)) {
                                                                        if ($data->category_id == $car_info->model_id) {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?>>
                                                                        <?php echo $data->name; ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                            ?>
                                                        </select>
                                                        <p class="errmsg">
                                                            <?php
                                                            echo form_error('model');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="form-group mt-4">
                                                        <label>Select Sub Model</label>
                                                        <select id="submodel" class="form-select <?php
                                                        if (form_error('submodel')) {
                                                            echo 'invalid';
                                                        }
                                                        ?>" name="submodel">
                                                            <option value="">Select Car Sub-Model</option>
                                                            <?php
                                                            if ($this->input->post('model')) {
                                                                $wh['parent_id'] = $this->input->post('model');
                                                                $records = $this->md->my_select('tbl_category', '*', $wh);
                                                                foreach ($records as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->category_id ?>" <?php
                                                                    if (!isset($success) && set_select('submodel', $data->category_id)) {
                                                                        echo set_select('submodel', $data->category_id);
                                                                    }
                                                                    ?>>
                                                                        <?php echo $data->name; ?></option>
                                                                    <?php
                                                                }
                                                            } elseif (isset($car_info)) {
                                                                $wh['parent_id'] = $car_info->model_id;
                                                                $records = $this->md->my_select('tbl_category', '*', $wh);
                                                                foreach ($records as $data) {
                                                                    ?>
                                                                    <option value="<?php echo $data->category_id ?>" <?php
                                                                    if (!isset($success) && set_select('model', $data->category_id)) {
                                                                        echo set_select('model', $data->category_id);
                                                                    } elseif (isset($car_info)) {
                                                                        if ($data->category_id == $car_info->submodel_id) {
                                                                            echo 'selected';
                                                                        }
                                                                    }
                                                                    ?>>
                                                                        <?php echo $data->name; ?></option>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                            ?>
                                                        </select>                                                  
                                                        <p class="errmsg">
                                                            <?php
                                                            echo form_error('submodel');
                                                            ?>
                                                        </p>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label>Car Description</label>
                                                        <textarea id="editor" class="form-control <?php
                                                        if (form_error('name')) {
                                                            echo 'invalid';
                                                        }
                                                        ?>" name="description"><?php
                                                                      if (!isset($success) && set_value('description')) {
                                                                          echo set_value('description');
                                                                      } elseif (isset($car_info)) {
                                                                          echo $car_info->description;
                                                                      }
                                                                      ?>
                                                        </textarea>
                                                    </div>                                                                                                  
                                                    <p class="errmsg">
                                                        <?php
                                                        echo form_error('description');
                                                        ?>
                                                    </p>
                                                    <div class="mt-4">
                                                        <button type="submit" name="next" value="yes" class="btn btn-primary w-md">Next</button>
                                                        &nbsp;
                                                        <button type="reset" class="btn btn-light w-md">Clear</button>
                                                    </div>                                                        
                                                </div>                                                
                                                <div class="col-md-6">                                                                                                          
                                                    <div class="form-group">
                                                        <label>Car Name</label>
                                                        <input type="text" class="form-control <?php
                                                        if (form_error('name')) {
                                                            echo 'invalid';
                                                        }
                                                        ?>" name="name" placeholder="Enter Car Name" value="<?php
                                                               if (!isset($success) && set_value('name')) {
                                                                   echo set_value('name');
                                                               } elseif (isset($car_info)) {
                                                                   echo $car_info->name;
                                                               }
                                                               ?>">
                                                    </div>                                                                                                  
                                                    <p class="errmsg">
                                                        <?php
                                                        echo form_error('name');
                                                        ?>
                                                    </p>
                                                    <div class="form-group mt-4">
                                                        <label>Car Code</label>
                                                        <input type="text" class="form-control <?php
                                                        if (form_error('code')) {
                                                            echo 'invalid';
                                                        }
                                                        ?>" name="code"" placeholder="Enter Car Code"value="<?php
                                                               if (!isset($success) && set_value('code')) {
                                                                   echo set_value('code');
                                                               } elseif (isset($car_info)) {
                                                                   echo $car_info->code;
                                                               }
                                                               ?>">
                                                    </div>                                                  
                                                    <p class="errmsg">
                                                        <?php
                                                        echo form_error('code');
                                                        ?>
                                                    </p>
                                                    <div class="form-group mt-4">
                                                        <label>Car Price</label>
                                                        <input type="text" class="form-control <?php
                                                        if (form_error('price')) {
                                                            echo 'invalid';
                                                        }
                                                        ?>" name="price"" placeholder="Enter Car Price" value="<?php
                                                               if (!isset($success) && set_value('price')) {
                                                                   echo set_value('price');
                                                               } elseif (isset($car_info)) {
                                                                   echo $car_info->price;
                                                               }
                                                               ?>">
                                                    </div>                                                  
                                                    <p class="errmsg">
                                                        <?php
                                                        echo form_error('price');
                                                        ?>
                                                    </p>
                                                    <div class="form-group">
                                                        <label>Car Specification</label>
                                                        <textarea id="editor_1" class="form-control <?php
                                                        if (form_error('specification')) {
                                                            echo 'invalid';
                                                        }
                                                        ?>" name="specification"><?php
                                                                      if (!isset($success) && set_value('specification')) {
                                                                          echo set_value('specification');
                                                                      } elseif (isset($car_info)) {
                                                                          echo $car_info->specification;
                                                                      }
                                                                      ?>
                                                        </textarea>
                                                    </div>                                                                                                  
                                                    <p class="errmsg">
                                                        <?php
                                                        echo form_error('specification');
                                                        ?>
                                                    </p>
                                                </div>                                                
                                            </div>
                                        </form>
                                    </div>                                 
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="card overflow-hidden">
                                    <div class="card-header">
                                        <h4>Add New Car Image Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="formrow-firstname-input">Car Name</label>
                                                        <input type="text" disabled="" class="form-control" id="formrow-firstname-input" value="<?php echo $car_info->name; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Select Image Type</label>
                                                        <select class="form-select <?php
                                                        if (form_error('img_type')) {
                                                            echo 'invalid';
                                                        }
                                                        ?>" name="img_type">
                                                            <option value="">Select Image Type</option>
                                                            <option <?php
                                                            if (!isset($img_success) && set_select('img_type', 'Front Side')) {
                                                                echo set_select('img_type', 'Front Side');
                                                            }
                                                            ?>>Front Side</option>
                                                            <option <?php
                                                            if (!isset($img_success) && set_select('img_type', 'Back Side')) {
                                                                echo set_select('img_type', 'Back Side');
                                                            }
                                                            ?>>Back Side</option>
                                                            <option <?php
                                                            if (!isset($img_success) && set_select('img_type', 'Interior')) {
                                                                echo set_select('img_type', 'Interior');
                                                            }
                                                            ?>>Interior</option>
                                                            <option <?php
                                                            if (!isset($img_success) && set_select('img_type', 'Exterior')) {
                                                                echo set_select('img_type', 'Exterior');
                                                            }
                                                            ?>>Exterior</option>
                                                        </select>
                                                        <p class = "errmsg">
                                                            <?php
                                                            echo form_error('img_type');
                                                            ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-12 mt-4">
                                                        <button type="submit" name="previous" value="yes" class="btn btn-primary w-md">Previous</button>
                                                        &nbsp;
                                                        <button type="submit" name="add" value="yes" class="btn btn-primary w-md">Add</button>
                                                        &nbsp;
                                                        <button type="submit" name="finish" value="yes" class="btn btn-primary w-md">Finish</button>
                                                        &nbsp;
                                                        <button type="reset" class="btn btn-light w-md">Clear</button>
                                                    </div>
                                                </div>
                                                <div class="col-6">                                                                                                    
                                                    <div class="page-content" style="padding-top: 0px">
                                                        <div class="container-fluid">
                                                            <!-- start page title -->
                                                            <div class="row">
                                                                <div class="col-12">   
                                                                    <label>Select Car Images</label>
                                                                    <center>
                                                                        <div class="input-group mb-3">
                                                                            <div class="custom-file">                                                                            
                                                                                <input name="car_img[]" class="form-control" type="file" id="gallery-photo-add" multiple=""> 
                                                                            </div>
                                                                        </div>
                                                                    </center>
                                                                    <div class="gallery"></div>
                                                                    <div>
                                                                        <?php
                                                                        echo "</br>";
                                                                        if (isset($img_report)) {
                                                                            ?>
                                                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                                                <?php
                                                                                $cc = 0;
                                                                                foreach ($img_report as $msg) {
                                                                                    $cc++;
                                                                                    echo "<br/> $cc. $msg";
                                                                                }
                                                                                ?>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                                            </div>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div> <!--end col-->
                                                            </div>
                                                        </div> <!--container-fluid-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class = "col-12 mt-4"
                                                <?php
                                                echo "</br>";
                                                if (isset($finish_error)) {
                                                    ?>
                                                         <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <strong>Oops!</strong> <?php echo $finish_error; ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                    echo "</br>";
                                                } elseif (isset($img_error)) {
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <strong>Oops!</strong> <?php echo $img_error; ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                    echo "</br>";
                                                } elseif (isset($img_success)) {
                                                    ?>
                                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <strong>Okey!</strong> <?php echo $img_success; ?>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div> 
                            <?php
                        }
                        ?>
                    </div>
                    <!-- end page title -->                                               
                </div>
                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <?php
        $this->load->view('carmela/footer');
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
                        <button type="button" class="btn btn-danger">Yes, Delete It!</button>
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
$this->load->view('carmela/footerscript');
?>
<script src="<?php echo base_url(); ?>carmela_assets/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
                           CKEDITOR.replace("editor");
                           CKEDITOR.replace("editor_1");
</script>
<script>
    $(function () {
        // Multiple images preview in browser
        var imagesPreview = function (input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function (event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gallery-photo-add').on('change', function () {
            imagesPreview(this, 'div.gallery');
        });
    });
</script>

</body>



</html>