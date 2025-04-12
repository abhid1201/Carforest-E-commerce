<?php

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

    public function index() {
        $this->load->view('index');
    }

    public function about() {
        $this->load->view('aboutus');
    }

    public function contact() {
        $data = [];

        if ($this->input->post('submit')) {

            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('user-name', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Name.', 'regex_match' => 'Please Enter Valid Name.'));
            $this->form_validation->set_rules('user-email', '', 'required|valid_email', array('required' => 'Please Enter Email.', 'valid_email' => 'Please Enter Valid Email.'));
            $this->form_validation->set_rules('user-phone', '', 'required|numeric', array('required' => 'Please Enter Mobile Number.', 'numeric' => 'Please Enter Valid Mobile Number.'));
            $this->form_validation->set_rules('user-subject', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Subject.', 'regex_match' => 'Please Enter Valid Subject.'));
            $this->form_validation->set_rules('user-message', '', 'required', array('required' => 'Please Enter Message.'));

            if ($this->form_validation->run() == TRUE) {
                $count = count($data);
                if ($count == 0) {
                    $ins['name'] = $this->input->post('user-name');
                    $ins['email'] = $this->input->post('user-email');
                    $ins['mobile'] = $this->input->post('user-phone');
                    $ins['subject'] = $this->input->post('user-subject');
                    $ins['message'] = $this->input->post('user-message');

                    $result = $this->md->my_insert('tbl_contact_us', $ins);
                    if ($result == 1) {
                        $data['success'] = 'Thank You For Contact Us.';
                    }
                }
            }
        }
        $this->load->view('contactus', $data);
    }

    public function feedback() {
        $data = [];

        if ($this->input->post('send')) {

            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('user-name', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Name.', 'regex_match' => 'Please Enter Valid Name.'));
            $this->form_validation->set_rules('user-feedback', '', 'required', array('required' => 'Please Enter feedback.'));

            if ($this->form_validation->run() == TRUE) {
                $count = count($data);
                if ($count == 0) {
                    $ins['name'] = $this->input->post('user-name');
                    $ins['message'] = $this->input->post('user-feedback');

                    $result = $this->md->my_insert('tbl_feedback', $ins);
                    if ($result == 1) {
                        $data['success'] = 'Thank You For feedback Us.';
                    }
                }
            }
        }
        $this->load->view('feedback', $data);
    }

    public function privacy_policy() {
        $this->load->view('privacypolicy');
    }

    public function terms_conditions() {
        $this->load->view('termsandconditions');
    }

    public function faqs() {
        $this->load->view('faqs');
    }

    public function pricing() {

        $data['package'] = $this->md->my_select('tbl_package');
        $this->load->view('package', $data);
    }

    public function forget_password() {
        
        $data = [];    
        
        if( $this->input->post('send') ){
            $email = $this->input->post('email');
            
            $record = $this->md->my_select('tbl_register','*',array('email'=>$email));
            $count = count($record);
            
            if( $count == 1 ){
                $ps = $this->encryption->decrypt( $record[0]->password );
                
                $receipent = $record[0]->email;
                $subject = "Password Recover For CarForest Account.";
                $message = "<p>Hello ".$record[0]->name.", <br/> Your Password for authentication is <b>$ps</b>.<br/> Please Next time be care and this password is not share with anyone.</p>";
                
                $result = $this->md->my_mailer( $receipent , $subject , $message );
                
                if( $result == 1 ){
                    $data['success'] = 'Please Check Your Email Inbox.';
                }
                else{
                    $data['error'] = 'Something Went Wrong. Please Try After Sometime.';
                }
            }
            else{
                $data['error'] = 'This Email is Not Registered with us.';
            }
        }
        $this->load->view('forgetpassword',$data);
    }

    public function login() {

        $data = [];

        if ($this->input->post('register')) {
            redirect('register');
        }

        if ($this->input->post('login')) {
            $email = $this->input->post('user-email');
            $wh['email'] = $email;
            $record = $this->md->my_select('tbl_register ', '*', $wh);
            $count = count($record);

            if ($count == 1) {

                $ops = $this->encryption->decrypt($record[0]->password);
                if ($ops == $this->input->post('user-login-password')) {

                    $st = $record[0]->status;
                    if ($st == 1) {

                        if ($this->input->post('svp')) {
                            set_cookie('member_email', $this->input->post('user-email'), (60 * 60 * 24 * 365));
                            set_cookie('member_password', $this->input->post('user-login-password'), (60 * 60 * 24 * 365));
                        } else {
                            if ($this->input->cookie('member_password')) {
                                delete_cookie('member_email');
                                delete_cookie('member_password');
                            }
                        }
                        $this->session->set_userdata('member', $record[0]->register_id);
                        $this->session->set_userdata('member_lastlogin', date('Y-m-d h:i:s'));

                        redirect('member-home');
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

        $this->load->view('login', $data);
    }

    public function register() {

        $data = [];

        if ($this->input->post('login')) {
            redirect('login');
        }

        if ($this->input->post('register')) {

            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('user-name', '', 'required', array('required' => 'Please Enter Your Name.'));
            $this->form_validation->set_rules('user-email', '', 'required|valid_email|is_unique[tbl_register.email]', array('required' => 'Please Enter Your Email.', 'valid_email' => 'Please Enter Valid Email.', 'is_unique' => 'Email Already Registred.'));
            $this->form_validation->set_rules('user-password', '', 'required|max_length[16]|min_length[8]', array('required' => 'Please Enter Password.', 'max_length' => 'Please Enter Password Between 8 to 16 Characters.', 'min_length' => 'Please Enter Password Between 8 to 16 Characters.'));
            $this->form_validation->set_rules('user-c_password', '', 'required|matches[user-password]', array('required' => 'Please Enter Confirm Password.', 'matches' => 'Confirm Password Does Not Matched.'));

            if ($this->form_validation->run() == TRUE) {

                $ins['name'] = $this->input->post('user-name');
                $ins['email'] = $this->input->post('user-email');
                $ins['password'] = $this->encryption->encrypt($this->input->post('user-password'));
                $ins['join_date'] = date('Y-m-d');
                $ins['status'] = 1;
                $result = $this->md->my_insert('tbl_register', $ins);

                if ($result == 1) {
                    $mx = $this->md->my_query("SELECT MAX(`register_id`) AS mx FROM `tbl_register`")[0]->mx;

                    $this->session->set_userdata('member', $mx);
                    $this->session->set_userdata('member_lastlogin', date('Y-m-d h:i:s'));
                    redirect('member-home');
                }
            }
        }
        $this->load->view('register', $data);
    }

    public function carlist() {
        
        $this->load->view('carlist');
    }

    public function cardetail() {
        if ($this->uri->segment(2) == "") {
            redirect('car-list');
        } else {
            $wh['car_id'] = base64_decode(base64_decode($this->uri->segment(2)));
            $data['details'] = $this->md->my_select('tbl_car', '*', $wh)[0];

            if ($this->input->post('login')) {
                redirect('login');
            }

            if ($this->input->post('appt')) {

                $this->form_validation->set_error_delimiters('', '');
                $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter member Name.', 'regex_match' => 'Please Enter Valid Name.',));
                $this->form_validation->set_rules('mobile', '', 'required|numeric|exact_length[10]', array('required' => 'Please Enter Your Contact Number.', 'numeric' => 'Please Enter Valid Contact Number.', 'exact_length' => 'Please Enter Valid Contact Number.'));
                $this->form_validation->set_rules('appt-date', '', 'required', array('required' => 'Please Select Appointment Date.'));
                $this->form_validation->set_rules('appt-time', '', 'required', array('required' => 'Please Select Appointment Time.'));

                if ($this->form_validation->run() == TRUE) {

                    $count = strlen($_FILES['license']['name']);

                    if ($count > 0) {

                        $config['upload_path'] = 'assets/license/';
                        $config['allowed_types'] = 'jpg|jpeg|png';
                        $config['max_size'] = 1024 * 4;
                        $config['file_name'] = 'license' . time();
                        $config['overwrite'] = true;

                        $this->load->library('upload', $config);

                        $success = 0;

                        if ($this->upload->do_upload('license')) {
                            $ins['license_image'] = 'assets/license/' . $this->upload->data('file_name');
                            $success = 1;
                        } else {
                            $data['error'] = $this->upload->display_errors();
                        }

                        if ($success == 1) {

                            $ins['register_id'] = $this->session->userdata('member');
                            $ins['carmela_id'] = $data['details']->carmela_id;
                            $ins['car_id'] = base64_decode(base64_decode($this->uri->segment(2)));
                            $ins['date'] = $this->input->post('appt-date');
                            $ins['time'] = $this->input->post('appt-time');
                            $ins['status'] = 0;

                            $result = $this->md->my_insert('tbl_test_drive', $ins);

                            if ($result == 1) {
                                $data['success'] = 'Your Test Drive for this Car is booked successfully.';
                            }
                        }
                    } else {
                        $data['error'] = 'Please Upload Your License Image.';
                    }
                }
            }
        }
        
        // recent view
        if ($this->session->userdata('member')) {
            //insert
            $rwh['car_id'] = $data['details']->car_id;
            $rwh['register_id'] = $this->session->userdata('member');

            $recent = $this->md->my_select('tbl_recent_view','*',$rwh);
            $count = count($recent);

            if($count == 0){
                $this->md->my_insert('tbl_recent_view',$rwh);
            }
        }
        
        
        $data['cardetails'] = $this->md->my_select('tbl_car_image', '*', $wh);
        $this->load->view('cardetail', $data);
    }

    public function pagenotfound() {
        $this->load->view('pagenotfound');
    }

}
