<?php

class Authorize extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

    public function Security() {
        if (!$this->session->userdata('admin')) {
            redirect('admin-login');
        }
    }

    public function index() {
        $data = [];

        if ($this->input->post('login')) {

//verify email
            $email = $this->input->post('email');
            $wh['email'] = $email;
            $recordset = $this->md->my_select('tbl_admin_login', '*', $wh);
            $count = count($recordset);

            if ($count == 1) {

//verify password
                $ops = $this->encryption->decrypt($recordset[0]->password);
                if ($ops == $this->input->post('ps')) {

//cookie
                    if ($this->input->post('svp')) {
                        set_cookie('admin_email', $this->input->post('email'), (60 * 60 * 24 * 365));
                        set_cookie('admin_password', $this->input->post('ps'), (60 * 60 * 24 * 365));
                    } else {
                        if ($this->input->cookie('admin_password')) {
                            delete_cookie('admin_email');
                            delete_cookie('admin_password');
                        }
                    }

//session
                    $this->session->set_userdata('admin', $recordset[0]->admin_id);
                    $this->session->set_userdata('admin_lastlogin', date('Y-m-d h:i:s'));

                    redirect('admin-home');
                } else {
                    $data['error'] = 'Inavlid Email or Password.';
                }
            } else {
                $data['error'] = 'Inavlid Email or Password.';
            }
        }
        $this->load->view('admin/index', $data);
    }

    public function forgot_password() {

        $record = $this->md->my_select('tbl_admin_login')[0];
        $ps = $this->encryption->decrypt($record->password);

        $receipent = $record->email;
        $subject = "Password Recover For CarForest.";
        $message = "<p>Hello CarForest Admin, <br/> Your Password for authentication is <b>$ps</b></p>";

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'novamailer2023@gmail.com', // change it to yours
            'smtp_pass' => 'ohrzammqukdalttn', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('novamailer2023@gmail.com'); // change it to yours
        $this->email->to($receipent); // change it to yours
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send()) {
            redirect('admin-login/1');
        }
    }

    public function dashboard() {
        $this->Security();
        $this->load->view('admin/dashboard');
    }

    public function setting() {
        $this->Security();
        $data = [];

        if ($this->input->post('change_ps')) {

            $wh['admin_id'] = $this->session->userdata('admin');
            $detail = $this->md->my_select('tbl_admin_login', '*', $wh);
            $ops = $this->encryption->decrypt($detail[0]->password);

            if ($ops == $this->input->post('ops')) {

                $this->form_validation->set_rules('nps', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please Enter New Password.', 'min_length' => 'Please Enter Password Between 8 to 16 Characters.', 'max_length' => 'Please Enter Password Between 8 to 16 Characters.'));
                $this->form_validation->set_rules('cps', '', 'required|matches[nps]', array('required' => 'Please Confirm Password.', 'matches' => 'Confirm Password Does Not Matched.'));

                if ($this->form_validation->run() == TRUE) {

                    $ins['password'] = $this->encryption->encrypt($this->input->post('nps'));
                    $result = $this->md->my_update('tbl_admin_login', $ins, $wh);

                    if ($result == 1) {
                        if ($this->input->cookie('admin_password')) {
                            set_cookie('admin_password', $this->input->post('nps'), (60 * 60 * 24 * 365));
                        }
                        $data['success'] = 'Password Changed Successfully.';
                    }
                }
            } else {
                $data['error'] = 'Current Password Not Match.';
            }
        }

        if ($this->input->post('change_profile')) {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 1024 * 4;
            $config['file_name'] = 'profile';
            $config['overwrite'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('profile')) {

                $whh['admin_id'] = $this->session->userdata('admin');
                $ins['profile_pic'] = 'admin_assets/images/' . $this->upload->data('file_name');

                $result = $this->md->my_update('tbl_admin_login', $ins, $whh);

                if ($result == 1) {
                    redirect('manage-setting');
                }
            } else {
                $data['p_error'] = $this->upload->display_errors();
            }
        }

        $data['profile'] = $this->md->my_select('tbl_admin_login')[0];

        $this->load->view('admin/managesetting', $data);
    }

    public function Logout() {
        $this->security();

        $wh['admin_id'] = $this->session->userdata('admin');

        $ins['last_login'] = $this->session->userdata('admin_lastlogin');

        $this->md->my_update('tbl_admin_login', $ins, $wh);

        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('admin_lastlogin');

        redirect('admin-login');
    }

    public function contactus() {
        $this->security();
        $data['contact_us'] = $this->md->my_select('tbl_contact_us', '*');
        $this->load->view('admin/managecontactus', $data);
    }

    public function feedback() {
        $this->security();
        $data['feedback'] = $this->md->my_select('tbl_feedback', '*');
        $this->load->view('admin/managefeedback', $data);
    }

    public function banner() {
        $this->Security();
        $data = [];
        if ($this->input->post('add')) {

            $this->form_validation->set_rules('title', '', 'required', array('required' => 'Please Enter Title.'));
            $this->form_validation->set_rules('subtitle', '', 'required', array('required' => 'Please Enter SubTitle.'));
            if ($this->form_validation->run() == TRUE) {

                //unique
                $config['upload_path'] = './assets/banner/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 1024 * 4;
                $config['file_name'] = 'banner_' . time();
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('banner')) {

                    $ins['path'] = 'assets/banner/' . $this->upload->data('file_name');
                    $ins['title'] = $this->input->post('title');
                    $ins['subtitle'] = $this->input->post('subtitle');
                    $ins['status'] = 1;

                    $result = $this->md->my_insert('tbl_banner', $ins);

                    if ($result == 1) {
                        $data['success'] = 'Banner Upload Successfully.';
                    }
                } else {
                    $data['error'] = $this->upload->display_errors();
                }
            }
        }
        $data['banner'] = $this->md->my_select('tbl_banner', '*');
        $this->load->view('admin/managebanner', $data);
    }

    public function member() {
        $this->Security();
        $data = [];

        $data['member'] = $this->md->my_select('tbl_register', '*');
        $this->load->view('admin/managemember', $data);
    }

    public function state() {

        $this->Security();
        $data = [];
        if ($this->input->post('add')) {

            $this->form_validation->set_rules('state', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter State Name.', 'regex_match' => 'Enter Valid State Name.'));
            if ($this->form_validation->run() == TRUE) {

                //unique
                $wh['name'] = $this->input->post('state');
                $wh['label'] = 'state';
                $data = $this->md->my_select('tbl_location', '*', $wh);
                $count = count($data);

                if ($count == 0) {
                    $ins['name'] = $this->input->post('state');
                    $ins['parent_id'] = 0;
                    $ins['label'] = 'state';
                    $result = $this->md->my_insert('tbl_location', $ins);

                    if ($result == 1) {
                        $data['success'] = $this->input->post('state') . ' Added Successfully.';
                    }
                } else {
                    $data['error'] = $this->input->post('state') . ' Already Exist.';
                }
            }
        }

        $data['state'] = $this->md->my_select('tbl_location', '*', array('label' => 'state'));
        $this->load->view('admin/managestate', $data);
    }

    public function city() {

        $this->Security();
        $data = [];
        if ($this->input->post('add')) {

            $this->form_validation->set_rules('state', '', 'required', array('required' => 'Please Select State Name.'));
            $this->form_validation->set_rules('city', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter City Name.', 'regex_match' => 'Please Enter Valid City Name.'));

            if ($this->form_validation->run() == TRUE) {

                //unique
                $wh['name'] = $this->input->post('city');
                $wh['parent_id'] = $this->input->post('state');
                $wh['label'] = 'city';
                $data = $this->md->my_select('tbl_location', '*', $wh);
                $count = count($data);

                if ($count == 0) {
                    $ins['name'] = $this->input->post('city');
                    $ins['parent_id'] = $this->input->post('state');
                    $ins['label'] = 'city';

                    $result = $this->md->my_insert('tbl_location', $ins);
                    if ($result == 1) {
                        $data['success'] = $this->input->post('city') . ' Added Successfully.';
                    }
                } else {
                    $data['error'] = $this->input->post('city') . ' Already Exist.';
                }
            }
        }
        $data['state'] = $this->md->my_select('tbl_location', '*', array('label' => 'state'));
        $data['city'] = $this->md->my_query("SELECT s.* , c.name AS state FROM `tbl_location` AS s , `tbl_location` AS c WHERE c.`location_id` = s.`parent_id` AND s.`label` = 'city' ");
        $this->load->view('admin/managecity', $data);
    }

    public function area() {

        $this->Security();
        $data = [];
        if ($this->input->post('add')) {

            $this->form_validation->set_rules('state', '', 'required', array('required' => 'Please Select State.'));
            $this->form_validation->set_rules('city', '', 'required', array('required' => 'Please Select City.'));
            $this->form_validation->set_rules('area', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Area Name.', 'regex_match' => 'Please Enter Valid Area Name.'));

            if ($this->form_validation->run() == TRUE) {
                //unique
                $wh['name'] = $this->input->post('area');
                $wh['parent_id'] = $this->input->post('city');
                $wh['label'] = 'area';
                $data = $this->md->my_select('tbl_location', '*', $wh);
                $count = count($data);

                if ($count == 0) {
                    $ins['name'] = $this->input->post('area');
                    $ins['parent_id'] = $this->input->post('city');
                    $ins['label'] = 'area';

                    $result = $this->md->my_insert('tbl_location', $ins);
                    if ($result == 1) {
                        $data['success'] = $this->input->post('area') . ' Added Successfully.';
                    }
                } else {
                    $data['error'] = $this->input->post('area') . ' Already Exist.';
                }
            }
        }
        $data['state'] = $this->md->my_select('tbl_location', '*', array('label' => 'state'));
        $data['area'] = $this->md->my_query("SELECT s.`name` AS state , c.`name` AS city , a.* FROM `tbl_location` AS s , `tbl_location` AS c, `tbl_location` AS a WHERE s.`location_id` = c.`parent_id` AND c.`location_id` = a.`parent_id` ");

        $this->load->view('admin/managearea', $data);
    }

    public function type() {

        $this->Security();
        $data = [];
        if ($this->input->post('add')) {
            $this->form_validation->set_rules('type', '', 'required|regex_match[/^[a-zA-Z -]+$/]', array('required' => 'Please Enter State Name.', 'regex_match' => 'Enter Valid State Name.'));
            if ($this->form_validation->run() == TRUE) {

                //unique
                $wh['name'] = $this->input->post('type');
                $wh['label'] = 'type';
                $data = $this->md->my_select('tbl_category', '*', $wh);
                $count = count($data);

                if ($count == 0) {
                    $ins['name'] = $this->input->post('type');
                    $ins['parent_id'] = 0;
                    $ins['label'] = 'type';
                    $result = $this->md->my_insert('tbl_category', $ins);

                    if ($result == 1) {
                        $data['success'] = $this->input->post('type') . ' Added Successfully.';
                    }
                } else {
                    $data['error'] = $this->input->post('type') . ' Already Exist.';
                }
            }
        }

        $data['type'] = $this->md->my_select('tbl_category', '*', array('label' => 'type'));
        $this->load->view('admin/managetype', $data);
    }

    public function company() {

        $this->Security();
        $data = [];

        if ($this->input->post('add')) {

            $this->form_validation->set_rules('type', '', 'required', array('required' => 'Please Select Car Type.'));
            $this->form_validation->set_rules('company', '', 'required|regex_match[/^[a-zA-Z -]+$/]', array('required' => 'Please Enter Company.', 'regex_match' => 'Please Enter Valid Company.'));
            if ($this->form_validation->run() == TRUE) {

                //unique
                $wh['name'] = $this->input->post('company');
                $wh['parent_id'] = $this->input->post('type');
                $wh['label'] = 'company';
                $data = $this->md->my_select('tbl_category', '*', $wh);
                $count = count($data);
                if ($count == 0) {

                    $ins['name'] = $this->input->post('company');
                    $ins['parent_id'] = $this->input->post('type');
                    $ins['label'] = 'company';
                    $result = $this->md->my_insert('tbl_category', $ins);
                    if ($result == 1) {
                        $data['success'] = $this->input->post('company') . ' Added Successfully.';
                    }
                } else {
                    $data['error'] = $this->input->post('company') . ' Already Exist';
                }
            }
        }
        $data['type'] = $this->md->my_select('tbl_category', '*', array('label' => 'type'));
        $data['company'] = $this->md->my_query("SELECT s.* , c.name AS type FROM `tbl_category` AS s , `tbl_category` AS c WHERE c.`category_id` = s.`parent_id` AND s.`label` = 'company' ");
        $this->load->view('admin/managecompany', $data);
    }

    public function model() {
        $this->Security();
        $data = [];
        if ($this->input->post('add')) {

            $this->form_validation->set_rules('type', '', 'required', array('required' => 'Please Select type.'));
            $this->form_validation->set_rules('company', '', 'required', array('required' => 'Please Select company.'));
            $this->form_validation->set_rules('model', '', 'required|regex_match[/^[a-zA-Z0-9 -]+$/]', array('required' => 'Please Enter model Name.', 'regex_match' => 'Please Enter Valid model Name.'));

            if ($this->form_validation->run() == TRUE) {
                //unique
                $wh['name'] = $this->input->post('model');
                $wh['parent_id'] = $this->input->post('company');
                $wh['label'] = 'model';
                $data = $this->md->my_select('tbl_category', '*', $wh);
                $count = count($data);

                if ($count == 0) {
                    $ins['name'] = $this->input->post('model');
                    $ins['parent_id'] = $this->input->post('company');
                    $ins['label'] = 'model';

                    $result = $this->md->my_insert('tbl_category', $ins);
                    if ($result == 1) {
                        $data['success'] = $this->input->post('model') . ' Added Successfully.';
                    }
                } else {
                    $data['error'] = $this->input->post('model') . ' Already Exist.';
                }
            }
        }
        $data['type'] = $this->md->my_select('tbl_category', '*', array('label' => 'type'));
        $data['model'] = $this->md->my_query("SELECT t.`name` AS type , c.`name` AS company , m.* FROM `tbl_category` AS t , `tbl_category` AS c, `tbl_category` AS m WHERE t.`category_id` = c.`parent_id` AND c.`category_id` = m.`parent_id` ");

        $this->load->view('admin/managemodel', $data);
    }

    public function submodel() {
        $this->Security();
        $data = [];
        if ($this->input->post('add')) {

            $this->form_validation->set_rules('type', '', 'required', array('required' => 'Please Select Type.'));
            $this->form_validation->set_rules('company', '', 'required', array('required' => 'Please Select Company.'));
            $this->form_validation->set_rules('model', '', 'required', array('required' => 'Please Select Model.'));
            $this->form_validation->set_rules('submodel', '', 'required|regex_match[/^[a-zA-Z0-9 -]+$/]', array('required' => 'Please Enter Submodel Name.', 'regex_match' => 'Please Enter Valid Submodel Name.'));

            if ($this->form_validation->run() == TRUE) {
                //unique
                $wh['name'] = $this->input->post('submodel');
                $wh['parent_id'] = $this->input->post('model');
                $wh['label'] = 'submodel';
                $data = $this->md->my_select('tbl_category', '*', $wh);
                $count = count($data);

                if ($count == 0) {
                    $ins['name'] = $this->input->post('submodel');
                    $ins['parent_id'] = $this->input->post('model');
                    $ins['label'] = 'submodel';

                    $result = $this->md->my_insert('tbl_category', $ins);
                    if ($result == 1) {
                        $data['success'] = $this->input->post('submodel') . ' Added Successfully.';
                    }
                } else {
                    $data['error'] = $this->input->post('submodel') . ' Already Exist.';
                }
            }
        }
        $data['type'] = $this->md->my_select('tbl_category', '*', array('label' => 'type'));
        $data['submodel'] = $this->md->my_query("SELECT t.`name` AS type , c.`name` AS company , m.`name` AS model , sm.* FROM `tbl_category` AS t , `tbl_category` AS c, `tbl_category` AS m , `tbl_category` AS sm WHERE t.`category_id` = c.`parent_id` AND c.`category_id` = m.`parent_id` AND m.`category_id` = sm.`parent_id`");
        $this->load->view('admin/managesubmodel', $data);
    }

    public function package() {
        $data = [];
        if ($this->input->post('add')) {

            $this->form_validation->set_rules('package', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Package Name.', 'regex_match' => 'Please Enter Valid Package Name.'));
            $this->form_validation->set_rules('validity', '', 'required', array('required' => 'Please Select Package Validity.'));
            $this->form_validation->set_rules('limit', '', 'required|numeric', array('required' => 'Please Enter Car Limit.', 'numeric' => 'Please Enter Valid Car Limit.'));
            $this->form_validation->set_rules('price', '', 'required|numeric', array('required' => 'Please Enter Package Price.', 'numeric' => 'Please Enter Valid Package Price.'));
            $this->form_validation->set_rules('description', '', 'required|min_length[50]', array('required' => 'Please Enter Package Decription.', 'min_length' => 'Please Enter Valid Package Description.'));

            if ($this->form_validation->run() == TRUE) {

                if ($this->input->post('limit') > 0) {

                    $ins['name'] = $this->input->post('package');
                    $ins['validity'] = $this->input->post('validity');
                    $ins['car_limit'] = $this->input->post('limit');
                    $ins['price'] = $this->input->post('price');
                    $ins['description'] = $this->input->post('description');

                    $result = $this->md->my_insert('tbl_package', $ins);

                    if ($result == 1) {
                        $data['success'] = 'Package Added Successfully.';
                    }
                } else {
                    $data['error'] = 'Please Enter Valid Car Limit.';
                }
            }
        }
        $data['package'] = $this->md->my_select('tbl_package');
        $this->load->view('admin/managepackage', $data);
    }

    public function allcarmela() {
        $this->security();
        $data['allcarmela'] = $this->md->my_select('tbl_carmela', '*');
        $this->load->view('admin/manageallcarmela', $data);
    }

    public function allcars() {
        $this->security();
        $data['allcar'] = $this->md->my_select('tbl_car', '*');
        $this->load->view('admin/manageallcars', $data);
    }

    public function carreview() {
        $this->security();
        $data['car_review'] = $this->md->my_select('tbl_car_review');
        $this->load->view('admin/manageallcarreview', $data);
    }

    public function pendingtestdrive() {
        $this->security();
        $this->load->view('admin/pendingtestdrive');
    }

    public function acceptedtestdrive() {
        $this->security();
        $this->load->view('admin/acceptedtestdrive');
    }

    public function rejectedtestdrive() {
        $this->security();
        $this->load->view('admin/rejectedtestdrive');
    }

    public function completedtestdrive() {
        $this->security();
        $this->load->view('admin/completedtestdrive');
    }

    public function delete() {

        $this->Security();
        $action = $this->uri->segment(2);
        $id = base64_decode(base64_decode($this->uri->segment(3)));

        if ($action == 'state') {
            if ($id == 0) {
                $this->md->truncate('tbl_location');
            } else {
                $wh['location_id'] = $id;
                $this->md->my_delete('tbl_location', $wh);
            }
            redirect('manage-state');
        } elseif ($action == 'city') {
            if ($id == 0) {
                $wh['label'] = 'city';
                $this->md->my_delete('tbl_location', $wh);
            } else {
                $wh['location_id'] = $id;
                $this->md->my_delete('tbl_location', $wh);
            }
            redirect('manage-city');
        } elseif ($action == 'area') {
            if ($id == 0) {
                $wh['label'] = 'area';
                $this->md->my_delete('tbl_location', $wh);
            } else {
                $wh['location_id'] = $id;
                $this->md->my_delete('tbl_location', $wh);
            }
            redirect('manage-area');
        } else if ($action == 'type') {
            if ($id == 0) {
                $this->md->truncate('tbl_category');
            } else {
                $wh['category_id'] = $id;
                $this->md->my_delete('tbl_category', $wh);
            }
            redirect('manage-type');
        } elseif ($action == 'company') {
            if ($id == 0) {
                $wh['label'] = 'company';
                $this->md->my_delete('tbl_category', $wh);
            } else {
                $wh['category_id'] = $id;
                $this->md->my_delete('tbl_category', $wh);
            }
            redirect('manage-company');
        } elseif ($action == 'model') {
            if ($id == 0) {
                $wh['label'] = 'model';
                $this->md->my_delete('tbl_category', $wh);
            } else {
                $wh['category_id'] = $id;
                $this->md->my_delete('tbl_category', $wh);
            }
            redirect('manage-model');
        } elseif ($action == 'submodel') {
            if ($id == 0) {
                $wh['label'] = 'submodel';
                $this->md->my_delete('tbl_category', $wh);
            } else {
                $wh['category_id'] = $id;
                $this->md->my_delete('tbl_category', $wh);
            }
            redirect('manage-sub-model');
        } elseif ($action == 'contactus') {
            if ($id == 0) {
                $this->md->truncate('tbl_contact_us', $wh);
            } else {
                $wh['contact_id'] = $id;
                $this->md->my_delete('tbl_contact_us', $wh);
            }
            redirect('manage-contact-us');
        } elseif ($action == 'feedback') {
            if ($id == 0) {
                $this->md->truncate('tbl_feedback', $wh);
            } else {
                $wh['feedback_id'] = $id;
                $this->md->my_delete('tbl_feedback', $wh);
            }
            redirect('manage-feedback');
        } elseif ($action == 'package') {
            if ($id == 0) {
                $this->md->truncate('tbl_package');
            } else {
                $wh['package_id'] = $id;
                $this->md->my_delete('tbl_package', $wh);
            }
            redirect('manage-package');
        } elseif ($action == 'banner') {
            if ($id == 0) {
                $this->md->truncate('tbl_banner');
            } else {
                $wh['banner_id'] = $id;
                $path = $this->md->my_select('tbl_banner', '*', $wh)[0]->path;
                unlink($path);
                $this->md->my_delete('tbl_banner', $wh);
            }
            redirect('manage-banner');
        } elseif ($action == 'allcarmela') {
            if ($id == 0) {
                $this->md->truncate('tbl_carmela');
            } else {
                $wh['carmela_id'] = $id;
                $this->md->my_delete('tbl_carmela', $wh);
            }
            redirect('manage-carmela');
        } elseif ($action == 'allcar') {
            if ($id == 0) {
                $this->md->truncate('tbl_car');
            } else {
                $wh['car_id'] = $id;
                $this->md->my_delete('tbl_car', $wh);
            }
            redirect('manage-cars');
        } elseif ($action == 'car') {
            if ($id == 0) {
                $this->md->truncate('tbl_car');
            } else {
                $wh['car_id'] = $id;
                $this->md->my_delete('tbl_car', $wh);
            }
            redirect('carmela-view-all-cars');
        } elseif ($action == 'fav-car') {
            if ($id == 0) {
                $this->md->truncate('tbl_wishlist');
            } else {
                $wh['wish_id'] = $id;
                $this->md->my_delete('tbl_wishlist', $wh);
            }
            redirect('member-my-favourite-car');
        } elseif ($action == 'member-review') {
            if ($id == 0) {
                $this->md->truncate('tbl_car_review');
            } else {
                $wh['review_id'] = $id;
                $this->md->my_delete('tbl_car_review', $wh);
            }
            redirect('member-my-car-review');
        }
    }

}
