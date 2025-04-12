<div class="b-info">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <aside class="b-info__aside wow zoomInLeft" data-wow-delay="0.3s">                          
                    <article class="b-info__aside-article">
                        <h3>About us</h3>
                        <p>At CarForest, our commitment to innovation and iconic customer experiences have made us the nation’s largest retailer of used cars. As the original disruptor of the automotive industry, our “no-haggle” prices transformed car buying and selling from a stressful, dreaded event into the honest, straightforward experience all people deserve. 
                            <a href="<?php echo base_url('about-us'); ?>" style="color:#F76D2B;">Read More</a>
                        </p>
                    </article>
                </aside>
            </div>
            <div class="col-md-2 col-xs-12">
                <div class="b-info__latest">
                    <h3 class="wow slideInUp" data-wow-delay="0.3s">Our Pages</h3>
                    <div class="b-info__latest-article wow slideInUp" data-wow-delay="0.3s">
                        <div class="b-info__latest-article-info">
                            <h6><a href="<?php echo base_url('about-us'); ?>">About us</a></h6>                                    
                        </div>
                    </div>
                    <div class="b-info__latest-article wow slideInUp" data-wow-delay="0.3s">                                
                        <div class="b-info__latest-article-info">
                            <h6><a href="<?php echo base_url('contact-us'); ?>">Contact us</a></h6>                                    
                        </div>
                    </div>
                    <div class="b-info__latest-article wow slideInUp" data-wow-delay="0.3s">                                
                        <div class="b-info__latest-article-info">
                            <h6><a href="<?php echo base_url('feedback'); ?>">Feedback</a></h6>                                    
                        </div>
                    </div>
                    <div class="b-info__latest-article wow slideInUp" data-wow-delay="0.3s">                                
                        <div class="b-info__latest-article-info">
                            <h6><a href="<?php echo base_url('privacy-policy'); ?>">Privacy Policy</a></h6>                                    
                        </div>
                    </div>
                    <div class="b-info__latest-article wow slideInUp" data-wow-delay="0.3s">
                        <div class="b-info__latest-article-info">
                            <h6><a href="<?php echo base_url('terms-and-conditions'); ?>">Terms & Conditions</a></h6>                                    
                        </div>
                    </div>
                    <div class="b-info__latest-article wow slideInUp" data-wow-delay="0.3s">
                        <div class="b-info__latest-article-info">
                            <h6><a href="<?php echo base_url('frequently-asked-questions'); ?>">FAQ's</a></h6>                                    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-xs-12">
                <div class="b-info__latest">
                    <h3 class="wow slideInUp" data-wow-delay="0.3s">My Account</h3>
                    <?php
                    if ($this->session->userdata('member')) {
                        ?>
                        <div class="b-info__latest-article wow slideInUp" data-wow-delay="0.3s">
                            <div class="b-info__latest-article-info">
                                <h6><a href="<?php echo base_url('logout'); ?>">Logout</a></h6>                                    
                            </div>
                        </div>
                        <div class="b-info__latest-article wow slideInUp" data-wow-delay="0.3s">                                
                            <div class="b-info__latest-article-info">
                                <h6><a href="<?php echo base_url('member-home'); ?>">My Profile</a></h6>                                    
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="b-info__latest-article wow slideInUp" data-wow-delay="0.3s">
                            <div class="b-info__latest-article-info">
                                <h6><a href="<?php echo base_url('login'); ?>">Login</a></h6>                                    
                            </div>
                        </div>
                        <div class="b-info__latest-article wow slideInUp" data-wow-delay="0.3s">                                
                            <div class="b-info__latest-article-info">
                                <h6><a href="<?php echo base_url('register'); ?>">Register</a></h6>                                    
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="b-info__latest-article wow slideInUp" data-wow-delay="0.3s">                                
                        <div class="b-info__latest-article-info">
                            <h6><a href="#">Carmela Panel</a></h6>                                    
                        </div>
                    </div>
                    <div class="b-info__latest-article wow slideInUp" data-wow-delay="0.3s">                                
                        <div class="b-info__latest-article-info">
                            <h6><a href="#">My Favourite Car</a></h6>                                    
                        </div>
                    </div>
                    <div class="b-info__latest-article wow slideInUp" data-wow-delay="0.3s">
                        <div class="b-info__latest-article-info">
                            <h6><a href="#">Book Appointment</a></h6>                                    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <address class="b-info__contacts wow slideInUp" data-wow-delay="0.3s">
                    <p>contact us</p>
                    <div class="b-info__contacts-item">
                        <span class="fa fa-map-marker"></span>
                        <em>Sarvodhya Shikshan Mandal, Ghod-Dod Road, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; opp.G3 Showroom, Athwa, Surat, Gujarat.</em>
                    </div>
                    <div class="b-info__contacts-item">
                        <span class="fa fa-phone"></span>
                        <a href="tel:+918980197471" style="color:#999;" >Phone: +91-8980197471</a>
                    </div>                            
                    <div class="b-info__contacts-item">
                        <span class="fa fa-envelope"></span>
                        <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose=CllgCJqbzqxmZZvgrZndXGMdLHHMkMQlHHCqkdCNXhcPBhPrNKQsbPhpjCrVKCQTBNHmTDGzDGV" target="_blank" style="color:#999;"  >Email: carforest2023@gmail.com</a>
                    </div>
                </address>
                <br/>
                <br/>
                <address class="b-info__contacts wow slideInUp" data-wow-delay="0.3s">
                    <p>Download Our App</p>
                    <div class="b-info__contacts-item">
                        <a href="https://play.google.com/store/apps?hl=en&gl=US" target="_blank"><img src="<?php echo base_url(); ?>assets/images/logo/play_store.png" alt="alt" width="130px"/></a>&nbsp;
                        <a href="https://www.apple.com/in/app-store/developing-for-the-app-store/" target="_blank" ><img src="<?php echo base_url(); ?>assets/images/logo/app_store.png" alt="alt" width="130px" /></a>
                    </div>                    
                </address>                     
            </div>
        </div>
    </div>
</div>