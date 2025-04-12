<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?php echo base_url(); ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?php echo base_url(); ?>admin_assets/images/car_logo.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo base_url(); ?>admin_assets/images/car_logo.png" alt="" height="24"> <span class="logo-txt">CarForest</span>
                    </span>
                </a>

                <a href="<?php echo base_url(); ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?php echo base_url(); ?>admin_assets/images/car_logo.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo base_url(); ?>admin_assets/images/car_logo.png" alt="" height="24"> <span class="logo-txt">CarForest</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->

        </div>

        <div class="d-flex">

            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>
            
            <?php
            $details = $this->md->my_select('tbl_register', '*', array('register_id' => $this->session->userdata('member')))[0];
            ?>
            <div class="container dropdown d-inline-block" style="width:220px;">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            if (strlen($details->profile_pic) > 0) {
                                ?>
                                <img src="<?php echo base_url() . $details->profile_pic; ?>" class="rounded-circle header-profile-user"/>
                                <?php
                            } else {
                                ?>
                                <img class="rounded-circle header-profile-user" src="<?php echo base_url(); ?>admin_assets/images/users/blankuser1.png"/>
                                <?php
                            }
                            ?>
                        </button>
                    </div>
                    <div class="col-md-9 ps-4 pt-3">
                        <span class="d-none d-xl-inline-block ms-1 fw-medium"><?php echo $details->name; ?></span>
                        <br/>
                        <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-12"><?php echo date('h:i:s d-m-Y', strtotime($details->last_login)); ?></span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>