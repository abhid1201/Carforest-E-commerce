<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" data-key="t-menu">Menu</li>

        <li>
            <a href="<?php echo base_url('admin-home') ?>">
                <i data-feather="home"></i>
                <span data-key="t-dashboard">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="grid"></i>
                <span data-key="t-apps">Pages</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li>
                    <a href="<?php echo base_url('manage-contact-us') ?>">
                        <span data-key="t-calendar">Contact Us</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url('manage-feedback') ?>">
                        <span data-key="t-chat">Feedback</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url('manage-banner') ?>">
                        <span data-key="t-chat">Banner</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url('manage-member') ?>">
                        <span data-key="t-chat">Member</span>
                    </a>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fa-solid fa-location-dot"></i>
                <span data-key="t-apps">Location</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li>
                    <a href="<?php echo base_url('manage-state') ?>">
                        <span data-key="t-calendar">State</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('manage-city') ?>">
                        <span data-key="t-calendar">City</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('manage-area') ?>">
                        <span data-key="t-calendar">Area</span>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fa-solid fa-sitemap"></i>
                <span data-key="t-apps">Car Type</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li>
                    <a href="<?php echo base_url('manage-type') ?>">
                        <span data-key="t-calendar">Type</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('manage-company') ?>">
                        <span data-key="t-calendar">Company</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('manage-model') ?>">
                        <span data-key="t-calendar">Model</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('manage-sub-model') ?>">
                        <span data-key="t-calendar">SubModel</span>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fa-solid fa-users"></i>
                <span data-key="t-apps">Carmela</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li>
                    <a href="<?php echo base_url('manage-package') ?>">
                        <span data-key="t-calendar">Package</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('manage-carmela') ?>">
                        <span data-key="t-calendar">View all Carmela </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('manage-cars') ?>">
                        <span data-key="t-calendar">View all Cars</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('manage-car-review') ?>">
                        <span data-key="t-calendar">View all Car Review</span>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i class="fa-solid fa-clock"></i>
                <span data-key="t-apps">Test Drive</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li>
                    <a href="<?php echo base_url('pending-test-drive') ?>">
                        <span data-key="t-calendar">Pending</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('accepted-test-drive') ?>">
                        <span data-key="t-calendar">Accepted</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('rejected-test-drive') ?>">
                        <span data-key="t-calendar">Rejected</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('completed-test-drive') ?>">
                        <span data-key="t-calendar">Completed</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li>
            <a href="<?php echo base_url('manage-setting') ?>">
               <i class="fa-solid fa-gear"></i>
                <span data-key="t-app">Setting</span>
            </a>
        </li>

        <li>
            <a href="<?php echo base_url('admin-logout') ?>">
                <i class="fas fa-power-off" style="text-size: 16px"></i>
                <span data-key="t-apps">Log-out</span>
            </a>                                
        </li>   
        
    </ul>


</div>