<header class="b-topBar">
    <div class="container wow slideInDown" data-wow-delay="0.7s">
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <div class="b-topBar__addr" style="text-transform: lowercase">
                    <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=CllgCJqbzqxmZZvgrZndXGMdLHHMkMQlHHCqkdCNXhcPBhPrNKQsbPhpjCrVKCQTBNHmTDGzDGV" target="_blank" style="color:#FFF">
                        <span class="fa fa-envelope" style="color:#f76d2b;font-size: 14px" ></span>
                        carforest2023@gmail.com
                    </a>                        
                </div>
            </div>
            <div class="col-md-2 col-xs-6">
                <div class="b-topBar__tel">
                    <a href="tel:918320782105" style="color:#FFF">
                        <span class="fa fa-phone"></span>
                        +91 83207 82105
                    </a>
                </div>
            </div>
            <div class="col-md-7 col-xs-6">
                <nav class="b-topBar__nav">
                    <ul>                              
                        <span>
                            <li><a href="<?php echo base_url('carmela-login'); ?>"><i class="fa-solid fa-car" style="color:#f76d2b;font-size: 14px"></i> &nbsp; Car-Mela Portal</a></li>
                        </span>
                        <?php
                            if( $this->session->userdata('member') ){
                        ?>
                        <span>
                            <li><a href="<?php echo base_url('member-home'); ?>"><i class="fa-solid fa-user-gear" style="color:#f76d2b;font-size: 14px"></i> &nbsp; My Profile</a></li>  
                        </span>
                        <span>
                            <li><a href="<?php echo base_url('member-logout'); ?>"><i class="fa-solid fa-power-off" style="color:#f76d2b;font-size: 14px"></i> &nbsp; Logout</a></li>
                        </span>
                        <?php        
                            }
                            else
                            {
                        ?>
                        <span>
                            <li><a href="<?php echo base_url('register'); ?>"><i class="fa-solid fa-user-plus" style="color:#f76d2b;font-size: 14px"></i> &nbsp; Register</a></li>  
                        </span>
                        <span>
                            <li><a href="<?php echo base_url('login'); ?>"><i class="fa-solid fa-right-to-bracket" style="color:#f76d2b;font-size: 14px"></i> &nbsp; Log in</a></li>
                        </span>
                        <?php
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>