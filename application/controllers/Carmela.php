<?php

class Carmela extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

    public function security() {
        if (!$this->session->userdata('carmela')) {
            redirect('carmela-login');
        }
    }

    public function login() {

        $data = [];

        if ($this->input->post('register')) {

            redirect('carmela-registration-1');
        }

        if ($this->input->post('login')) {

            $email = $this->input->post('carmela-email');
            $wh['email'] = $email;
            $recordset = $this->md->my_select('tbl_carmela', '*', $wh);
            $count = count($recordset);

            if ($count == 1) {

                $ops = $this->encryption->decrypt($recordset[0]->password);
                if ($ops == $this->input->post('carmela-password')) {

                    $st = $recordset[0]->status;
                    if ($st == 1) {

                        if ($this->input->post('svp')) {
                            set_cookie('carmela_email', $this->input->post('carmela-email'), (60 * 60 * 24 * 365));
                            set_cookie('carmela_password', $this->input->post('carmela-password'), (60 * 60 * 24 * 365));
                        } else {
                            if ($this->input->cookie('carmela_password')) {
                                delete_cookie('carmela_email');
                                delete_cookie('carmela_password');
                            }
                        }

                        $this->session->set_userdata('carmela', $recordset[0]->carmela_id);
                        $this->session->set_userdata('carmela_lastlogin', date('Y-m-d h:i:s'));

                        redirect('carmela-home');
                    } else {
                        $data['error'] = 'Your Account Disabled. Please Contact Administration Department..!';
                    }
                } else {
                    $data['error'] = 'Invalid Email or Password.';
                }
            } else {
                $data['error'] = 'Invalid Email or Password.';
            }
        }

        $this->load->view('carmela_login', $data);
    }

    public function forgetpassword() {
        $this->security();
        $this->load->view('carmela_forgetpassword');
    }

    public function change_password() {
        $this->security();
        $data = [];
        
        if ($this->input->post('change_ps')) {

            $wh['carmela_id'] = $this->session->userdata('carmela');
            $detail = $this->md->my_select('tbl_carmela', '*', $wh);
            $ops = $this->encryption->decrypt($detail[0]->password);

            if ($ops == $this->input->post('ops')) {
                
                $this->form_validation->set_error_delimiters('', '');
                $this->form_validation->set_rules('nps', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please Enter New Password.', 'min_length' => 'Please Enter Password Between 8 to 16 Characters.', 'max_length' => 'Please Enter Password Between 8 to 16 Characters.'));
                $this->form_validation->set_rules('cps', '', 'required|matches[nps]', array('required' => 'Please Confirm Password.', 'matches' => 'Confirm Password Does Not Matched.'));

                if ($this->form_validation->run() == TRUE) {

                    $ins['password'] = $this->encryption->encrypt($this->input->post('nps'));
                    $result = $this->md->my_update('tbl_carmela', $ins, $wh);

                    if ($result == 1) {
                        if ($this->input->cookie('carmela_password')) {
                            set_cookie('carmela_password', $this->input->post('nps'), (60 * 60 * 24 * 365));
                        }
                        $data['success'] = 'Password Changed Successfully.';
                    }
                }
            } else {
                $data['error'] = 'Current Password Not Match.';
            }
        }
        
        $this->load->view('carmela/change_password', $data);
    }

    public function dashboard() {
        $this->security();
        $data['records'] = $this->md->my_select('tbl_carmela', '*', array('carmela_id' => $this->session->userdata('carmela')))[0];
        $this->load->view('carmela/dashboard', $data);
    }

    public function profile() {
        $this->security();
        $data['profile'] = $this->md->my_select('tbl_carmela', '*', array('carmela_id' => $this->session->userdata('carmela')))[0];
        $data['location'] = $this->md->my_query("SELECT s.`name` AS state , c.`name` AS city , a.`name` AS area FROM `tbl_location` AS s , `tbl_location` AS c, `tbl_location` AS a WHERE s.`location_id` = c.`parent_id` AND c.`location_id` = a.`parent_id` AND a.`location_id` =" . $data['profile']->location_id)[0];
        $this->load->view('carmela/carmelaprofile', $data);
    }

    public function logout() {
        $this->security();
        $wh['carmela_id'] = $this->session->userdata('carmela');

        $ins['last_login'] = $this->session->userdata('carmela_lastlogin');

        $this->md->my_update('tbl_carmela', $ins, $wh);

        $this->session->unset_userdata('carmela');
        $this->session->unset_userdata('carmela_lastlogin');
        $this->session->unset_userdata('cardetails');
        $this->session->unset_userdata('last_car');

        redirect('carmela-login');
    }

    public function registration_1() {
        $data = [];

        if ($this->input->post('login')) {

            redirect('carmela-login');
        }

        if ($this->input->post('next')) {

            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('carmela-name', '', 'required', array('required' => 'Please Enter Carmela Name.'));
            $this->form_validation->set_rules('carmela-email', '', 'required|valid_email|is_unique[tbl_carmela.email]', array('required' => 'Please Enter Carmela Email.', 'valid_email' => 'Please Enter Valid Email.', 'is_unique' => 'Email Already Registred.'));
            $this->form_validation->set_rules('carmela-mobile', '', 'required|numeric|exact_length[10]', array('required' => 'Please Enter Carmela Contact Number.', 'numeric' => 'Please Enter Valid Carmela Contact Number.', 'exact_length' => 'Please Enter Valid Carmela Contact Number.'));
            $this->form_validation->set_rules('carmela-password', '', 'required|max_length[16]|min_length[8]', array('required' => 'Please Enter Carmela Password.', 'max_length' => 'Please Enter Password Between 8 to 16 Characters.', 'min_length' => 'Please Enter Password Between 8 to 16 Characters.'));
            $this->form_validation->set_rules('carmela-c_password', '', 'required|matches[carmela-password]', array('required' => 'Please Enter Confirm Password.', 'matches' => 'Confirm Password Does Not Matched.'));
            $this->form_validation->set_rules('owner-name', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Owner Name.', 'regex_match' => 'Please Enter Valid Owner Name.'));
            $this->form_validation->set_rules('owner-mobile', '', 'required|numeric|exact_length[10]', array('required' => 'Please Enter Owner Contact Number.', 'numeric' => 'Please Enter Valid Owner Contact Number.', 'exact_length' => 'Please Enter Valid Owner Contact Number.'));

            if ($this->form_validation->run() == TRUE) {
                $this->session->set_userdata('carmela_name', $this->input->post('carmela-name'));
                $this->session->set_userdata('carmela_email', $this->input->post('carmela-email'));
                $this->session->set_userdata('carmela_mobile', $this->input->post('carmela-mobile'));
                $this->session->set_userdata('carmela_password', $this->input->post('carmela-password'));
                $this->session->set_userdata('owner_name', $this->input->post('owner-name'));
                $this->session->set_userdata('owner_mobile', $this->input->post('owner-mobile'));

                if ($this->session->userdata('carmela_password')) {
                    redirect('carmela-registration-2');
                }
            }
        }
        $this->load->view('carmela_registration_1', $data);
    }

    public function registration_2() {

        if (!$this->session->userdata('carmela_password')) {
            redirect('carmela-registration-1');
        }

        if ($this->input->post('previous')) {
            redirect('carmela-registration-1');
        }

        if ($this->input->post('next')) {

            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'Please Select State.'));
            $this->form_validation->set_rules('city', '', 'required', array('required' => 'Please Select City.'));
            $this->form_validation->set_rules('area', '', 'required', array('required' => 'Please Select Area.'));
            $this->form_validation->set_rules('carmela-address', '', 'required|min_length[20]', array('required' => 'Please Enter Carmela Address.', 'min_length' => 'Please Enter Valid Carmela Address.'));
            $this->form_validation->set_rules('carmela-pincode', '', 'required|numeric|exact_length[6]', array('required' => 'Please Enter Carmela Pincode.', 'numeric' => 'Please Enter Valid Carmela Pincode.', 'exact_length' => 'Please Enter Valid Carmela Pincode.'));

            if ($this->form_validation->run() == TRUE) {

                $this->session->set_userdata('state', $this->input->post('state'));
                $this->session->set_userdata('city', $this->input->post('city'));
                $this->session->set_userdata('area', $this->input->post('area'));
                $this->session->set_userdata('address', $this->input->post('carmela-address'));
                $this->session->set_userdata('pincode', $this->input->post('carmela-pincode'));

                redirect('carmela-registration-3');
            }
        }
        
        $data['state'] = $this->md->my_select('tbl_location', '*', array('label' => 'state'));
        
        $this->load->view('carmela_registration_2', $data);
    }

    public function registration_3() {
        $data = [];

        if (!$this->session->userdata('carmela_password') && !$this->session->userdata('area')) {
            redirect('carmela-registration-1');
        } else if ($this->session->userdata('carmela_password') && !$this->session->userdata('area')) {
            redirect('carmela-registration-2');
        }

        if ($this->input->post('previous')) {
            redirect('carmela-registration-2');
        }
        
        // Online Payment Parameter
        $data['callback_url'] = base_url() . 'carmela/callback';
        $data['surl'] = base_url() . 'payment-success';
        $data['furl'] = base_url() . 'payment-fail';
        $data['currency_code'] = 'INR';

        $data['package'] = $this->md->my_select('tbl_package');
        $this->load->view('carmela_registration_3', $data);
    }

    // initialized cURL Request
    private function curl_handler($payment_id, $amount) {
        $url = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/capture';
        $key_id = RAZORPAY_API_KEY;
        $key_secret = RAZORPAY_API_KEY_SECRET;
        $fields_string = "amount=$amount";
        //cURL Request
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $key_id . ':' . $key_secret);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        return $ch;
    }

    // callback method
    public function callback() 
    {
        //print_r($this->input->post());
        if (!empty($this->input->post('razorpay_payment_id')) && !empty($this->input->post('merchant_order_id'))) {
            $razorpay_payment_id = $this->input->post('razorpay_payment_id');
            $merchant_order_id = $this->input->post('merchant_order_id');

            $this->session->set_userdata('razorpay_payment_id', $this->input->post('razorpay_payment_id'));
            $this->session->set_userdata('merchant_order_id', $this->input->post('merchant_order_id'));
            
            $currency_code = 'INR';
            $amount = $this->input->post('merchant_total');
            $success = false;
            $error = '';
            try {
                $ch = $this->curl_handler($razorpay_payment_id, $amount);
                //execute post
                $result = curl_exec($ch);
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                
                // check success or not
                if( $http_status == 0 )
                {
                    $this->session->set_userdata('order_status',1);
                    redirect('payment-success');
                }
                else 
                {
                    $this->session->set_userdata('order_status',0);
                }
                
                if ( $result === false ) {
                    $success = false;
                    $error = 'Curl error: ' . curl_error($ch);
                } else {
                    $response_array = json_decode($result, true);
                    
                    //Check success response
                    if ($http_status === 200 and isset($response_array['error']) === false) {
                        $success = true;
                        
                    } else {
                        $success = false;
                        if (!empty($response_array['error']['code'])) {
                            $error = $response_array['error']['code'] . ':' . $response_array['error']['description'];
                        } else {
                            $error = 'RAZORPAY_ERROR:Invalid Response <br/>' . $result;
                        }
                    }
                }
                //close curl connection
                curl_close($ch);
            } catch (Exception $e) {
                $success = false;
                $error = 'Request to Razorpay Failed';
            }

            if ($success === true) {
                if (!empty($this->session->userdata('ci_subscription_keys'))) {
                    $this->session->unset_userdata('ci_subscription_keys');
                }
                if (!$order_info['order_status_id']) {
                    redirect($this->input->post('merchant_surl_id'));
                } else {
                    redirect($this->input->post('merchant_surl_id'));
                }
            } else {
                redirect($this->input->post('merchant_furl_id'));
            }
        } else {
            echo 'An error occured. Contact site administrator, please!';
        }
    }
    
    public function payment_success() {
        
        if( !$this->session->userdata('order_status') ){
            redirect('carmela-registration-3');
        }
        
        if( $this->session->userdata('order_status') != 1 ){
            redirect('payment-fail');
        }
        
        
        // register carmela
        $ins['carmela_name'] = $this->session->userdata('carmela_name');
        $ins['email'] = $this->session->userdata('carmela_email');
        $ins['password'] = $this->encryption->encrypt($this->session->userdata('carmela_password'));
        $ins['mobile'] = $this->session->userdata('carmela_mobile');
        $ins['location_id'] = $this->session->userdata('area');
        $ins['address'] = $this->session->userdata('address');
        $ins['pincode'] = $this->session->userdata('pincode');
        $ins['owner_name'] = $this->session->userdata('owner_name');
        $ins['owner_contact'] = $this->session->userdata('owner_mobile');
        $ins['join_date'] = date('Y-m-d');
        $ins['status'] = 0;

        $result = $this->md->my_insert('tbl_carmela', $ins);

        if ($result == 1) {

            // create bill
            $mx = $this->md->my_query('SELECT max(`carmela_id`) as mx FROM `tbl_carmela`')[0]->mx;
            
            $bins['carmela_id'] = $mx;
            $bins['package_id'] = $this->session->userdata('package_id');
            $bins['bill_date'] = date('Y-m-d');
            
            $package_info = $this->md->my_select('tbl_package','*',array('package_id'=>$this->session->userdata('package_id')))[0];
            $bins['amount'] = $package_info->price;
            
            $bins['start_date'] = date('Y-m-d');
            
            $validity = $package_info->validity;
            $end_date = date('Y-m-d', strtotime("+".$validity." months", strtotime( date('Y-m-d') )));
            $bins['end_date'] = $end_date;
            
            $bins['payment_id'] = $this->session->userdata('razorpay_payment_id'); 
            $bins['order_id'] = $this->session->userdata('merchant_order_id');
                 
            $bill_result = $this->md->my_insert('tbl_bill',$bins);
            
            if( $bill_result == 1 ){
                
                // remove unnessassry session
                $this->session->unset_userdata('carmela_name');
                $this->session->unset_userdata('carmela_email');
                $this->session->unset_userdata('carmela_password');
                $this->session->unset_userdata('carmela_mobile');
                $this->session->unset_userdata('owner_name');
                $this->session->unset_userdata('owner_mobile');
                $this->session->unset_userdata('state');
                $this->session->unset_userdata('city');
                $this->session->unset_userdata('area');
                $this->session->unset_userdata('address');
                $this->session->unset_userdata('pincode');
                $this->session->unset_userdata('package_id');
                $this->session->unset_userdata('order_status');
                
                // login to carmela
                $this->session->set_userdata('carmela', $mx);
                $this->session->set_userdata('carmela_lastlogin', date('Y-m-d h:i:s'));

                // redirect to carmela panel
                redirect('carmela-home');    
            }
            
        }
    }
    
    public function payment_fail() {
        
        if( $this->session->userdata('order_status') == 1 ){
            redirect('payment-success');
        }
        
        $this->load->view("carmela/payment_failed");
    }
    
    public function addnewcar() {
        $this->security();
        $data = [];

        if (!$this->session->userdata('cardetails')) {
            $this->session->set_userdata('cardetails', 1);
        }

        if ($this->input->post('previous')) {
            $this->session->set_userdata('cardetails', 1);
        }

        if ($this->input->post('next')) {

            $this->form_validation->set_rules('type', '', 'required', array('required' => 'Please Select Type.'));
            $this->form_validation->set_rules('company', '', 'required', array('required' => 'Please Select Company.'));
            $this->form_validation->set_rules('model', '', 'required', array('required' => 'Please Select Model.'));
            $this->form_validation->set_rules('submodel', '', 'required', array('required' => 'Please Select Submodel Name.'));
            $this->form_validation->set_rules('name', '', 'required', array('required' => 'Please Enter Car Name.'));
            $this->form_validation->set_rules('code', '', 'required|regex_match[/^[a-zA-Z0-9 ]+$/]', array('required' => 'Please Enter Car Code.', 'regex_match' => 'Please Enter Valid Car Code.'));
            $this->form_validation->set_rules('price', '', 'required|numeric', array('required' => 'Please Enter Car Price.', 'numeric' => 'Please Enter Valid Car Price.'));
            $this->form_validation->set_rules('description', '', 'required', array('required' => 'Please Enter Car Description.'));
            $this->form_validation->set_rules('specification', '', 'required', array('required' => 'Please Enter Car Specification.'));

            if ($this->form_validation->run() == TRUE) {

                $ins['carmela_id'] = $this->session->userdata('carmela');
                $ins['main_id'] = $this->input->post('type');
                $ins['company_id'] = $this->input->post('company');
                $ins['model_id'] = $this->input->post('model');
                $ins['submodel_id'] = $this->input->post('submodel');
                $ins['name'] = $this->input->post('name');
                $ins['code'] = $this->input->post('code');
                $ins['price'] = $this->input->post('price');
                $ins['description'] = $this->input->post('description');
                $ins['specification'] = $this->input->post('specification');
                $ins['status'] = 0;

                if (!$this->session->userdata('last_car')) {
                    $this->md->my_insert('tbl_car', $ins);

                    $mx = $this->md->my_query("SELECT MAX(`car_id`) AS mx FROM `tbl_car`")[0]->mx;
                    $this->session->set_userdata('last_car', $mx);
                    $this->session->set_userdata('cardetails', 2);
                } else {
                    $whhh['car_id'] = $this->session->userdata('last_car');
                    $this->md->my_update('tbl_car', $ins, $whhh);
                    $this->session->set_userdata('cardetails', 2);
                }
            }
        }

        if ($this->input->post('finish')) {
            $wh['car_id'] = $this->session->userdata('last_car');
            $image = $this->md->my_select('tbl_car_image', '*', $wh);
            $count = count($image);

            if ($count > 0) {
                $this->session->unset_userdata('last_car');
                $this->session->set_userdata('cardetails', 1);
            } else {
                $data['finish_error'] = 'Please Upload Atleast One Product Image,';
            }
        }

        if ($this->input->post('add')) {

            $this->form_validation->set_rules('img_type', '', 'required', array('required' => 'Please Select Car Image Type.'));

            if ($this->form_validation->run() == TRUE) {

                if (strlen($_FILES['car_img']['name'][0]) > 0) {

                    $count = count($_FILES['car_img']['name']);

                    $img_path = "";

                    for ($i = 0;
                            $i < $count;
                            $i++) {
                        $_FILES['single']['name'] = $_FILES['car_img']['name'][$i];
                        $_FILES['single']['size'] = $_FILES['car_img']['size'][$i];
                        $_FILES['single']['type'] = $_FILES['car_img']['type'][$i];
                        $_FILES['single']['tmp_name'] = $_FILES['car_img']['tmp_name'][$i];
                        $_FILES['single']['error'] = $_FILES['car_img']['error'][$i];

                        $config['upload_path'] = './assets/cars/';
                        $config['allowed_types'] = 'jpg|jpeg|png';
                        $config['max_size'] = 1024 * 4;
                        $config['file_name'] = 'product_' . time();
                        $config['encrypt_name'] = true;

                        $this->load->library('upload', $config);

                        if ($this->upload->do_upload('single')) {
                            $path = "assets/cars/" . $this->upload->data('file_name');
                            $img_path = $img_path . $path . ",";
                            $data['img_report'][$i] = 'Car Images Upload Successfully';
                            $imgsuccess = 1;
                        } else {
                            $data['img_report'][$i] = $this->upload->display_errors($i);
                            $imgsuccess = 0;
                        }
                    }

                    if ($imgsuccess == 1) {
                        $img_path = rtrim($img_path, ",");
                        $insimg['car_id'] = $this->session->userdata('last_car');
                        $insimg['type'] = $this->input->post('img_type');
                        $insimg['path'] = $img_path;

                        $result = $this->md->my_insert('tbl_car_image', $insimg);

                        if ($result == 1) {
                            $data['img_success'] = 'product Image Upload Successfully.';
                        }
                    }
                } else {
                    $data['img_error'] = 'Please Select Atlest One Product Image.';
                }
            }
        }

        if ($this->session->userdata('last_car')) {
            $data['car_info'] = $this->md->my_select('tbl_car', '*', array('car_id' => $this->session->userdata('last_car')))[0];
        }


        $data['type'] = $this->md->my_select('tbl_category', '*', array('label' => 'type'));
        $this->load->view('carmela/addnewcar', $data);
    }

    public function viewallcars() {
        $this->security();
        $data['allcar'] = $this->md->my_select('tbl_car', '*', array('carmela_id' => $this->session->userdata('carmela')));
        $this->load->view('carmela/viewallcars', $data);
    }

    public function carreviews() {
        $this->security();
        $this->load->view('carmela/carreviews');
    }

    public function visitingcard() {
        $this->security();
        $data = [];
        if ($this->input->post('upload')) {

            $config['upload_path'] = './carmela_assets/gallery/';
            $config['allowed_types'] = 'jpg|jpeg';
            $config['max_size'] = 1024 * 4;
            $config['file_name'] = 'visiting_card_' . time();
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {

                $ins['carmela_id'] = $this->session->userdata('carmela');
                $ins['path'] = 'carmela_assets/gallery/' . $this->upload->data('file_name');
                $ins['type'] = 'Visiting_Card';

                $result = $this->md->my_insert('tbl_carmela_gallery', $ins);
                if ($result == 1) {
                    $data['success'] = 'Vising-Card Upload Successfully.';
                }
            } else {
                $data['error'] = $this->upload->display_errors();
            }
        }
        $data['visitingcard'] = $this->md->my_select('tbl_carmela_gallery', '*', array('type' => 'Visiting_Card'));
        $this->load->view('carmela/carmelavisitingcard', $data);
    }

    public function carmelaimage() {
        $this->security();
        $data = [];
        if ($this->input->post('upload')) {

            $config['upload_path'] = './carmela_assets/gallery/';
            $config['allowed_types'] = 'jpg|jpeg';
            $config['max_size'] = 1024 * 4;
            $config['file_name'] = 'carmela_image' . time();
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('photo')) {

                $ins['carmela_id'] = $this->session->userdata('carmela');
                $ins['path'] = 'carmela_assets/gallery/' . $this->upload->data('file_name');
                $ins['type'] = 'Carmela_Image';

                $result = $this->md->my_insert('tbl_carmela_gallery', $ins);
                if ($result == 1) {
                    $data['success'] = 'Carmela-Image Upload Successfully.';
                }
            } else {
                $data['error'] = $this->upload->display_errors();
            }
        }
        $data['images'] = $this->md->my_select('tbl_carmela_gallery', '*', array('type' => 'Carmela_Image'));
        $this->load->view('carmela/carmelaimage', $data);
    }

    public function mysubscription() {
        $this->security();
        
        $data['bill'] = $this->md->my_query("SELECT * FROM `tbl_bill` WHERE `carmela_id` = ".$this->session->userdata('carmela')." ORDER BY `bill_id` DESC");
        
        $this->load->view('carmela/subscription',$data);
    }
       
    public function invoice() {
        $this->security();
        $data = [];
        
        $wh['bill_id'] = base64_decode(base64_decode($this->uri->segment(2)));
        $data['bill'] = $this->md->my_select('tbl_bill','*',$wh)[0];
        
        $this->load->view('carmela/view_invoice',$data);
    }
    
    public function testdrive() {
        $this->security();
        $this->load->view('carmela/appointment');
    }


}
