<?php

class Backend extends CI_Controller {

    public function city() {

        if ($this->input->post('id') == "") {
            echo '<option value="">Select City</option>';
        } else {
            $wh['parent_id'] = $this->input->post('id');
            $records = $this->md->my_select('tbl_location', '*', $wh);
            echo '<option value="">Select City</option>';
            foreach ($records as $data) {
                echo '<option value="' . $data->location_id . '">' . $data->name . '</option>';
            }
        }
    }

    public function company() {

        if ($this->input->post('id') == "") {
            echo '<option value="">Select Company</option>';
        } else {
            $wh['parent_id'] = $this->input->post('id');
            $records = $this->md->my_select('tbl_category', '*', $wh);
            echo '<option value="">Select Company</option>';
            foreach ($records as $data) {
                echo '<option value="' . $data->category_id . '">' . $data->name . '</option>';
            }
        }
    }

    public function model() {

        if ($this->input->post('id') == "") {
            echo '<option value="">Select Model</option>';
        } else {
            $wh['parent_id'] = $this->input->post('id');
            $records = $this->md->my_select('tbl_category', '*', $wh);
            echo '<option value="">Select Model</option>';
            foreach ($records as $data) {
                echo '<option value="' . $data->category_id . '">' . $data->name . '</option>';
            }
        }
    }

    public function submodel() {

        if ($this->input->post('id') == "") {
            echo '<option value="">Select Sub Model</option>';
        } else {
            $wh['parent_id'] = $this->input->post('id');
            $records = $this->md->my_select('tbl_category', '*', $wh);
            echo '<option value="">Select Sub Model</option>';
            foreach ($records as $data) {
                echo '<option value="' . $data->category_id . '">' . $data->name . '</option>';
            }
        }
    }

    public function area() {

        if ($this->input->post('id') == "") {
            echo '<option value="">Select Area</option>';
        } else {
            $wh['parent_id'] = $this->input->post('id');
            $records = $this->md->my_select('tbl_location', '*', $wh);
            echo '<option value="">Select Area</option>';
            foreach ($records as $data) {
                echo '<option value="' . $data->location_id . '">' . $data->name . '</option>';
            }
        }
    }

    public function carmela() {

        if ($this->input->post('id') == "") {
            echo '<option value="">Select Carmela</option>';
        } else {
            $wh['location_id'] = $this->input->post('id');
            $wh['status'] = 1;
            
            $records = $this->md->my_select('tbl_carmela', '*', $wh);
            echo '<option value="">Select Carmela</option>';
            foreach ($records as $data) {
                echo '<option value="' . $data->carmela_id . '">' . $data->carmela_name . '</option>';
            }
        }
    }
    
    public function change_status() {

        $action = $this->input->post('action');
        $id = $this->input->post('id');

        if ($action == 'banner') {
            $wh['banner_id'] = $id;
            $status = $this->md->my_select('tbl_banner', '*', $wh)[0]->status;

            if ($status == 1) {
                $up['status'] = 0;
            } else {
                $up['status'] = 1;
            }
            $this->md->my_update('tbl_banner', $up, $wh);
        }
        else if ($action == 'member') {
            $wh['register_id'] = $id;
            $status = $this->md->my_select('tbl_register', '*', $wh)[0]->status;

            if ($status == 1) {
                $up['status'] = 0;
            } else {
                $up['status'] = 1;
            }
            $this->md->my_update('tbl_register', $up, $wh);
        }
        else if ($action == 'allcarmela') {
            $wh['carmela_id'] = $id;
            $status = $this->md->my_select('tbl_carmela', '*', $wh)[0]->status;

            if ($status == 1) {
                $up['status'] = 0;
            } else {
                $up['status'] = 1;
            }
            $this->md->my_update('tbl_carmela', $up, $wh);
        }
        else if ($action == 'allcar') {
            $wh['car_id'] = $id;
            $status = $this->md->my_select('tbl_car', '*', $wh)[0]->status;

            if ($status == 1) {
                $up['status'] = 0;
            } else {
                $up['status'] = 1;
            }
            $this->md->my_update('tbl_car', $up, $wh);
        }
        else if ($action == 'carreview') {
            $wh['review_id'] = $id;
            $status = $this->md->my_select('tbl_car_review', '*', $wh)[0]->status;

            if ($status == 1) {
                $up['status'] = 0;
            } else {
                $up['status'] = 1;
            }
            $this->md->my_update('tbl_car_review', $up, $wh);
        }
    }

    public function add_fav() {
        $ins['register_id'] = $this->session->userdata('member');
        $ins['car_id'] = $this->input->post('cid');
        echo $this->md->my_insert('tbl_wishlist', $ins);
    }

    public function test_drive_status() {

        $status = $this->input->post('status');
        $ins['status'] = $status;
        $wh['drive_id'] = $this->input->post('id');

        if ($status == 1) {
            $this->md->my_update('tbl_test_drive', $ins, $wh);
        } else if ($status == 2) {
            $this->md->my_update('tbl_test_drive', $ins, $wh);
        } else if ($status == 3) {
            $this->md->my_update('tbl_test_drive', $ins, $wh);
        }
        ?>
        <table id="datatable-buttons" class="table table-bordered dt-responsive w-100">
            <thead>
                <tr align="center">
                    <th>No.</th>
                    <th>Car</th>
                    <th>Member</th>
                    <th>License</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Current Status</th>
                    <th>Change Status</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $appointment = $this->md->my_select('tbl_test_drive', '*', array('carmela_id' => $this->session->userdata('carmela')));

                $i = 0;
                foreach ($appointment as $data) {
                    $i++;
                    ?>
                    <tr valign="middle" align="center">
                        <td><?php echo $i; ?></td>
                        <td>
                            <?php
                            $carimage = $this->md->my_query("SELECT path FROM `tbl_car_image` WHERE car_id =" . $data->car_id . " AND type = 'Front Side'")[0]->path;
                            $car_info = $this->md->my_select('tbl_car', '*', array('car_id' => $data->car_id))[0];
                            $path = explode(",", $carimage);
                            ?>
                            <a href="<?php echo base_url() ?>car-detail/<?php echo base64_encode(base64_encode($data->car_id)); ?>" target="_blank">
                                <img class="rounded" style="cursor: pointer;width: 75px;" src="<?php echo base_url() . $path[0]; ?>" alt="Header Avatar" title="<?php echo $car_info->name; ?>" data-bs-toggle="tooltip">
                            </a> 
                        </td>
                        <td>
                            <?php
                            $user = $this->md->my_select('tbl_register', '*', array('register_id' => $data->register_id))[0];
                            ?>
                            <?php
                            if (strlen($user->profile_pic >= 0)) {
                                ?>
                                <img class="rounded-circle header-profile-user" style="cursor: pointer" src="<?php echo base_url() ?>admin_assets/images/users/blankuser1.png" alt="Header Avatar" title="<?php echo $user->name; ?>" data-bs-toggle="tooltip">
                                <?php
                            } else {
                                ?>
                                <img class="rounded-circle header-profile-user" style="cursor: pointer" src="<?php echo base_url() . $user->profile_pic; ?>" alt="Header Avatar" title="<?php echo $user->name; ?>" data-bs-toggle="tooltip">
                                <?php
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url() . $data->license_image; ?>" target="_blank" >
                                <img class="rounded" style="cursor: pointer;width: 75px;" src="<?php echo base_url() . $data->license_image; ?>" alt="Header Avatar" data-bs-toggle="tooltip">
                            </a>
                        </td>
                        <td><?php echo date('d-m-Y', strtotime($data->date)); ?></td>
                        <td><?php echo date('h : i : A', strtotime($data->time)); ?></td>                                                        
                        <td>
                            <?php
                            if ($data->status == 0) {
                                ?>
                                <span class="badge bg-warning text-dark w-50">Pending</span>
                                <?php
                            }
                            if ($data->status == 1) {
                                ?>
                                <span class="badge bg-success text-dark w-50">Accepted</span>
                                <?php
                            } else if ($data->status == 2) {
                                ?>
                                <span class="badge bg-danger text-dark w-50">Rejected</span>
                                <?php
                            } else if ($data->status == 3) {
                                ?>
                                <span class="badge bg-primary text-white w-50" >Completed</span>
                                <?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($data->status == 0) {
                                ?>
                                <span class="badge bg-success text-dark w-50" style="cursor: pointer" onclick="change_test_drive_status('<?php echo $data->drive_id; ?>', '1')">Accept</span>
                                <br/>
                                <span class="badge bg-danger text-dark w-50" style="cursor: pointer" onclick="change_test_drive_status('<?php echo $data->drive_id; ?>', '2')">Reject</span>
                                <?php
                            } else if ($data->status == 1) {
                                ?>
                                <span class="badge bg-danger text-dark w-50" style="cursor: pointer" onclick="change_test_drive_status('<?php echo $data->drive_id; ?>', '2')">Reject</span>
                                <br/>
                                <span class="badge bg-info text-dark w-50" style="cursor: pointer" onclick="change_test_drive_status('<?php echo $data->drive_id; ?>', '3')">Done</span>
                                <?php
                            } else if ($data->status == 2) {
                                ?>
                                <span class="badge bg-success text-dark w-50" style="cursor: pointer" onclick="change_test_drive_status('<?php echo $data->drive_id; ?>', '1')">Accept</span>
                                <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    }
    
    public function change_package() {
        
        // Online Payment Parameter
        $callback_url = base_url() . 'carmela/callback';
        $surl = base_url() . 'payment-success';
        $furl = base_url() . 'payment-fail';
        $currency_code = 'INR';
        
        // update package
        $pack_id = $this->input->post('pid');
        $this->session->set_userdata('package_id',$pack_id);
        
        // Online Payment Parameter
        $description        = APPLICATION_NAME;
        $txnid              = date("YmdHis");     
        $key_id             = RAZORPAY_API_KEY;
        $currency_code      = $currency_code;

        $price = $this->md->my_select('tbl_package','*',array('package_id'=>$this->session->userdata('package_id')))[0]->price;

        $total              = ($price * 100); 	// 100 = 1 indian rupees  // change
        $amount             = $total;
        $merchant_order_id  = "CF_".date("Ymd").time();
        $card_holder_name   = $this->session->userdata('owner_name');     // change
        $email              = $this->session->userdata('carmela_email');   // change
        $mobile             = $this->session->userdata('carmela_mobile');   // change
        $name               = APPLICATION_NAME;
?>
<div class="row">                    
    <div class="col-xs-12">
        <div class="b-contacts__form">
            <header class="b-contacts__form-header s-lineDownLeft">
                <h2 class="s-titleDet">Welcome, <?php echo $this->session->userdata('carmela_name') ?></h2> 
            </header>
            <p>Select any one package and pay online and enjoy panel.</p>
            <div class="row s-form">
                <?php

                $package = $this->md->my_select('tbl_package');
                foreach($package as $single) {
                    ?>
                    <div class="col-md-3">
                        <div class="package_box active">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1><?php echo $single->name; ?></h1>
                                    <h3>&#8377; <?php echo $single->price; ?> /-</h3>
                                    <div>
                                        <a href="<?php echo base_url('view-package'); ?>" target="_blank">View Details</a>
                                    </div>
                                    <?php
                                        if( $single->package_id == $this->session->userdata('package_id') )
                                        {
                                    ?>
                                    <button type="button" class="btn m-btn" style="margin: 10px 0px 10px 0px;background: #f76d2b;">Selected<span class="fa fa-angle-right" style="background: #555 !important;"></span></button>
                                    <?php        
                                        }
                                        else{
                                    ?>
                                    <button type="button" onclick="change_package(<?php echo $single->package_id; ?>);" class="btn m-btn" style="margin: 10px 0px 10px 0px">Select Now<span class="fa fa-angle-right"></span></button>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <form name="razorpay-form" id="razorpay-form" action="<?php echo $callback_url; ?>" method="POST">
        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
        <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
        <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
        <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $description; ?>"/>
        <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
        <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
        <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
        <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>"/>
        <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $amount; ?>"/>
    </form>
    <div class="col-xs-12 text-center" style="margin-top: 30px">
        <button name="pay" id="pay-btn" onclick="razorpaySubmit(this);" class="btn m-btn mybtn">Pay Now<span class="fa fa-angle-right"></span></button>
        <br/>
        <br/>
        <a href="<?php echo base_url('carmela-registration-2') ?>">< Go Back</a>
    </div>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script type="text/javascript">
        var options = {
            key:            "<?php echo $key_id; ?>",
            amount:         "<?php echo $total; ?>",
            name:           "<?php echo $name; ?>",
            description:    "Order # <?php echo $merchant_order_id; ?>",
            netbanking:     true,
            currency:       "<?php echo $currency_code; ?>", // INR
            prefill: {
                name:       "<?php echo $card_holder_name; ?>",
                email:      "<?php echo $email; ?>",
                mobile:     "<?php echo $mobile; ?>"
            },
            notes: {
                soolegal_order_id: "<?php echo $merchant_order_id; ?>",
            },
            handler: function (transaction) {
                document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
                document.getElementById('razorpay-form').submit();
            },
            "modal": {
                "ondismiss": function(){
                    //location.reload();
                    base_url = '<?php echo base_url(); ?>';		
                    window.location.href = base_url + 'payment-fail';
                }
            }
        };

        var razorpay_pay_btn, instance;
        function razorpaySubmit(el) {
            if(typeof Razorpay == 'undefined') {
                setTimeout(razorpaySubmit, 300);
                if(!razorpay_pay_btn && el) {
                    razorpay_pay_btn    = el;
                    el.disabled         = true;
                    el.value            = 'Please wait...';  
                }
            } else {
                if(!instance) {
                    instance = new Razorpay(options);
                    if(razorpay_pay_btn) {
                    razorpay_pay_btn.disabled   = false;
                    razorpay_pay_btn.value      = "Pay Now";
                    }
                }
                instance.open();
            }
        }  
    </script>
</div>
<?php
    }
    
    public function add_review() {
        
        $wh['register_id'] = $this->session->userdata('member');
        $wh['car_id'] = $this->input->post('pid');
        
        $review = $this->md->my_select('tbl_car_review','*',$wh);
        $count = count($review);
        
        if( $count == 0 ){
            
            $ins['register_id'] = $this->session->userdata('member');
            $ins['car_id'] = $this->input->post('pid');
            $ins['rating'] = $this->input->post('rate');
            $ins['msg'] = $this->input->post('msg');
            $ins['date'] = date('Y-m-d h:i:s');
            $ins['status'] = 0;
            
            echo $this->md->my_insert('tbl_car_review',$ins); 
            
        }else{
            echo 2;
        }
    }
    
    public function cardata() {
        
        $type = $this->input->post('type');
        $id = $this->input->post('id');
        $limit = $this->input->post('limit');
        $filter_data = $this->input->post('filter_data');
        
        if( $type == "" && $id == ""  ){
            $sql = "SELECT * FROM `tbl_car` WHERE `status` = 1";
            $title = 'All Car';
        }
        else if( $type == "type" ){
            $sql = "SELECT * FROM `tbl_car` WHERE `status` = 1 AND `main_id` = $id";
            $title = $this->md->my_select('tbl_category','*',array('category_id'=> $id ))[0]->name;
        }
        else if( $type == "company" ){
            $sql = "SELECT * FROM `tbl_car` WHERE `status` = 1 AND `company_id` = $id";
            $title = $this->md->my_select('tbl_category','*',array('category_id'=> $id ))[0]->name;
        }
        else if( $type == "model" ){
            $sql = "SELECT * FROM `tbl_car` WHERE `status` = 1 AND `model_id` = $id";
            $title = $this->md->my_select('tbl_category','*',array('category_id'=> $id ))[0]->name;
        }
        else if( $type == "submodel" ){
            $sql = "SELECT * FROM `tbl_car` WHERE `status` = 1 AND `submodel_id` = $id";
            $title = $this->md->my_select('tbl_category','*',array('category_id'=> $id ))[0]->name;
        }
        
//        echo "<pre>";
//        print_r($this->input->post());
//        echo "</pre>";
        
        $state = "";
        $city = "";
        $area = "";
        $carmela = "";
        
        if( isset($filter_data) && count($filter_data) > 0 ){
            foreach( $filter_data as $single ){
                
                if( $single['name'] == "state" ){
                    $state = $single['value'];
                }
                else if( $single['name'] == "city" ){
                    $city = $single['value'];
                }
                else if( $single['name'] == "area" ){
                    $area = $single['value'];
                }
                else if( $single['name'] == "carmela" ){
                    $carmela = $single['value'];
                }
                
            }
        }
        
//        echo "<br/> State = $state";
//        echo "<br/> City = $city";
//        echo "<br/> Area = $area";
//        echo "<br/> Carmala = $carmela";
        
        if( $state != "" && $city == "Loading.." ){
            $sql .= " AND `carmela_id` IN ( SELECT `carmela_id` FROM `tbl_carmela` WHERE `location_id` IN ( SELECT `location_id` FROM `tbl_location` WHERE `parent_id` IN ( SELECT `location_id` FROM `tbl_location` WHERE `parent_id` = $state ) ) )";
        }
        else if( $city != "" && $area == "Loading.." ){
            $sql .= " AND `carmela_id` IN ( SELECT `carmela_id` FROM `tbl_carmela` WHERE `location_id` IN ( SELECT `location_id` FROM `tbl_location` WHERE `parent_id` = $city ) )";
        }
        else if( $area != "" && $carmela == "Loading.." ){
            $sql .= " AND `carmela_id` IN ( SELECT `carmela_id` FROM `tbl_carmela` WHERE `location_id` = $area )";
        }
        else if( $carmela != "" ){
            $sql .= " AND `carmela_id` = $carmela ";
        }
        
        $sql .= " LIMIT 0,$limit;";
        
//        echo $sql;
//        die();
        
        $allcar = $this->md->my_query($sql);
    ?>
    <h2 class="s-title wow zoomInUp" data-wow-delay="0.5s">Search Result For <?php echo $title; ?></h2>
    <div class="row">
        <?php
        if(count($allcar) > 0 ){
            $i = 0;
            foreach ($allcar as $data) {
                $i++;
        ?>
        <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="b-items__cell wow zoomInUp" data-wow-delay="0.5s" style="height: 370px !important;">
                <div class="b-items__cars-one-img">
                    <?php
                    $carimage = $this->md->my_query("SELECT path FROM `tbl_car_image` WHERE car_id =" . $data->car_id . " AND type = 'Front Side'")[0]->path;
                    $path = explode(",", $carimage);
                    ?>
                    <a href="<?php echo base_url() ?>car-detail/<?php echo base64_encode(base64_encode($data->car_id)); ?>">
                        <img class="img-responsive" src="<?php echo base_url() . $path[0]; ?>" style="width:100%;height: 210px;object-fit: cover">
                    </a>
                </div>
                <div class="b-items__cell-info">
                    <div class="s-lineDownLeft b-items__cell-info-title">
                        <h2><?php echo $data->name; ?></h2>
                        <?php
                            $carmela_name = $this->md->my_select('tbl_carmela','*',array('carmela_id'=>$data->carmela_id))[0]->carmela_name;
                        ?>
                        <h2><span style="font-size: 11px;font-weight: lighter">at <?php echo $carmela_name; ?></span></h2>
                    </div>

                    <div class="row" style="margin-top: -10px">
                        <div class="col-xs-7">                                                
                            <h5 class="b-items__cell-info-price"><i class="fa-solid fa-indian-rupee-sign"></i>&nbsp;<?php echo number_format($data->price); ?></h5>
                        </div>
                        <div class="col-xs-5">
                            <a href="<?php echo base_url() ?>car-detail/<?php echo base64_encode(base64_encode($data->car_id)); ?>" class="btn m-btn">DETAILS<span class="fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <?php 
            } 
        }
        else{
        ?>
        <div class="col-lg-12 col-md-12 col-xs-12 wow zoomInUp" data-wow-delay="0.5s"  style="padding:100px;text-align: center;color:#D3D3D3;">
            <i class="fa-solid fa-magnifying-glass" style="font-size: 100px;"></i>
            <br/>
            <br/>
            <h3>Oops! Car Not Found.</h3>
        </div>
        <?php
        }
        ?>
    </div>
    <?php
        if(count($allcar) > 0 ){
            $limit = $limit + 3;
    ?>
    <div class="row">
        <div class="col-md-7" style="text-align: center;cursor: pointer;" onclick="cardata('<?php echo $type; ?>','<?php echo $id; ?>','<?php echo $limit; ?>');">
            <div class="b-pageHeader__search wow zoomInRight" data-wow-delay="0.7s">
                <h3 style="color:#fff;">Load More Cars</h3>
            </div>
        </div>
    </div>
    <?php
        }
    }
}
