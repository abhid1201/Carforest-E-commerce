<?php

class Edit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

    public function Security() {
        if (!$this->session->userdata('admin')) {
            redirect('admin-login');
        }
    }

    public function state() {

        $this->Security();
        $data = [];
        $id = base64_decode(base64_decode($this->uri->segment(2)));
        $whh['location_id'] = $id;

//        //update
        if ($this->input->post('update')) {

            $this->form_validation->set_rules('state', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter State Name.', 'regex_match' => 'Please Enter Valid State Name.'));
            if ($this->form_validation->run() == TRUE) {

//unique
                $wh['name'] = $this->input->post('state');
                $wh['label'] = 'state';
                $data = $this->md->my_select('tbl_location', '*', $wh);
                $count = count($data);

                if ($count == 0) {
                    $ins['name'] = $this->input->post('state');
                    $result = $this->md->my_update('tbl_location', $ins, $whh);
                    if ($result == 1) {
                        redirect('manage-state');
                    } else {
                        $data['error'] = $this->input->post('state') . ' Already Exist.';
                    }
                }
            }
        }
        $data['editstate'] = $this->md->my_select('tbl_location', '*', $whh)[0];
        $data['state'] = $this->md->my_select('tbl_location', '*', array('label' => 'state'));
        $this->load->view('admin/managestate', $data);
    }

    public function city() {

        $this->security();
        $id = base64_decode(base64_decode($this->uri->segment(2)));
        $whh['location_id'] = $id;

        if ($this->input->post('update')) {
            $this->form_validation->set_rules('state', '', 'required', array('required' => 'Please select State Name.'));
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

                    $result = $this->md->my_update('tbl_location', $ins, $whh);
                    if ($result == 1) {
                        redirect('manage-city');
                    }
                } else {
                    $data['error'] = $this->input->post('city') . ' Already Exist.';
                }
            }
        }
        $data['editcity'] = $this->md->my_select('tbl_location', '*', $whh)[0];
        $data['state'] = $this->md->my_select('tbl_location', '*', array('label' => 'state'));
        $data['city'] = $this->md->my_query("SELECT s.* , c.name AS state FROM `tbl_location` AS s , `tbl_location` AS c WHERE c.`location_id` = s.`parent_id` AND s.`label` = 'city' ");
        $this->load->view('admin/managecity', $data);
    }

    public function area() {

        $this->security();
        $id = base64_decode(base64_decode($this->uri->segment(2)));
        $whh['location_id'] = $id;

        $data = [];

        if ($this->input->post('update')) {

            $this->form_validation->set_rules('state', '', 'required', array('required' => 'Please select Country Name.'));
            $this->form_validation->set_rules('city', '', 'required', array('required' => 'Please select State Name.'));
            $this->form_validation->set_rules('area', '', 'required', array('required' => 'Please Enter City Name.'));

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

                    $result = $this->md->my_update('tbl_location', $ins, $whh);
                    if ($result == 1) {
                        redirect('manage-area');
                    }
                } else {
                    $data['error'] = $this->input->post('area') . ' Already Exist.';
                }
            }
        }

        $data['editarea'] = $this->md->my_select('tbl_location', '*', $whh)[0];
        $data['state'] = $this->md->my_select('tbl_location', '*', array('label' => 'state'));
        $data['area'] = $this->md->my_query("SELECT s.`name` AS state , c.`name` AS city , a.* FROM `tbl_location` AS s , `tbl_location` AS c, `tbl_location` AS a WHERE s.`location_id` = c.`parent_id` AND c.`location_id` = a.`parent_id` ");
        $data['citydata'] = $this->md->my_select('tbl_location', '*', array('location_id' => $data['editarea']->parent_id))[0];
        $this->load->view('admin/managearea', $data);
    }

    public function type() {

        $this->Security();
        $data = [];
        $id = base64_decode(base64_decode($this->uri->segment(2)));
        $whh['category_id'] = $id;

        //update
        if ($this->input->post('update')) {

            $this->form_validation->set_rules('type', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Type Name.', 'regex_match' => 'Please Enter Valid Type Name.'));
            if ($this->form_validation->run() == TRUE) {

//unique
                $wh['name'] = $this->input->post('type');
                $wh['label'] = 'type';
                $data = $this->md->my_select('tbl_category', '*', $wh);
                $count = count($data);

                if ($count == 0) {
                    $ins['name'] = $this->input->post('type');
                    $result = $this->md->my_update('tbl_category', $ins, $whh);
                    if ($result == 1) {
                        redirect('manage-type');
                    } else {
                        $data['error'] = $this->input->post('type') . ' Already Exist.';
                    }
                }
            }
        }
        $data['edittype'] = $this->md->my_select('tbl_category', '*', $whh)[0];
        $data['type'] = $this->md->my_select('tbl_category', '*', array('label' => 'type'));
        $this->load->view('admin/managetype', $data);
    }

    public function company() {

        $this->security();
        $id = base64_decode(base64_decode($this->uri->segment(2)));
        $whh['category_id'] = $id;

        if ($this->input->post('update')) {
            $this->form_validation->set_rules('type', '', 'required', array('required' => 'Please Select Car Type.'));
            $this->form_validation->set_rules('company', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Company.', 'regex_match' => 'Please Enter Valid Company.'));

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

                    $result = $this->md->my_update('tbl_category', $ins, $whh);
                    if ($result == 1) {
                        redirect('manage-company');
                    }
                } else {
                    $data['error'] = $this->input->post('company') . ' Already Exist.';
                }
            }
        }
        $data['editcompany'] = $this->md->my_select('tbl_category', '*', $whh)[0];
        $data['type'] = $this->md->my_select('tbl_category', '*', array('label' => 'type'));
        $data['company'] = $this->md->my_query("SELECT s.* , c.name AS type FROM `tbl_category` AS s , `tbl_category` AS c WHERE c.`category_id` = s.`parent_id` AND s.`label` = 'company' ");
        $this->load->view('admin/managecompany', $data);
    }

    public function model() {

        $this->security();
        $id = base64_decode(base64_decode($this->uri->segment(2)));
        $whh['category_id'] = $id;

        $data = [];

        if ($this->input->post('update')) {

            $this->form_validation->set_rules('type', '', 'required', array('required' => 'Please select type Name.'));
            $this->form_validation->set_rules('company', '', 'required', array('required' => 'Please select company Name.'));
            $this->form_validation->set_rules('model', '', 'required', array('required' => 'Please Enter model Name.'));

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

                    $result = $this->md->my_update('tbl_category', $ins, $whh);
                    if ($result == 1) {
                        redirect('manage-model');
                    }
                } else {
                    $data['error'] = $this->input->post('model') . ' Already Exist.';
                }
            }
        }

        $data['editmodel'] = $this->md->my_select('tbl_category', '*', $whh)[0];
        $data['type'] = $this->md->my_select('tbl_category', '*', array('label' => 'type'));
        $data['model'] = $this->md->my_query("SELECT t.`name` AS type , c.`name` AS company , m.* FROM `tbl_category` AS t , `tbl_category` AS c, `tbl_category` AS m WHERE t.`category_id` = c.`parent_id` AND c.`category_id` = m.`parent_id` ");
        $data['companydata'] = $this->md->my_select('tbl_category', '*', array('category_id' => $data['editmodel']->parent_id))[0];
        $this->load->view('admin/managemodel', $data);
    }

    public function submodel() {

        $this->security();
        $id = base64_decode(base64_decode($this->uri->segment(2)));
        $whh['category_id'] = $id;

        if ($this->input->post('update')) {
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

                    $result = $this->md->my_update('tbl_category', $ins, $whh);
                    if ($result == 1) {
                        redirect('manage-submodel');
                    }
                } else {
                    $data['error'] = $this->input->post('submodel') . ' Already Exist.';
                }
            }
        }
        $data['editsubmodel'] = $this->md->my_select('tbl_category', '*', $whh)[0];
        $data['type'] = $this->md->my_select('tbl_category', '*', array('label' => 'type'));
        $data['submodel'] = $this->md->my_query("SELECT t.`name` AS type , c.`name` AS company , m.`name` AS model , sm.* FROM `tbl_category` AS t , `tbl_category` AS c, `tbl_category` AS m , `tbl_category` AS sm WHERE t.`category_id` = c.`parent_id` AND c.`category_id` = m.`parent_id` AND m.`category_id` = sm.`parent_id`");
        $data['model'] = $this->md->my_select('tbl_category', '*', array('category_id' => $data['editsubmodel']->parent_id))[0];
        $data['company'] = $this->md->my_select('tbl_category', '*', array('category_id' => $data['model']->parent_id))[0];
        $this->load->view('admin/managesubmodel', $data);
    }

    public function package() {

        $this->security();
        $id = base64_decode(base64_decode($this->uri->segment(2)));
        $whh['package_id'] = $id;

        if ($this->input->post('update')) {

            $this->form_validation->set_rules('package', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter Package Name.', 'is_unique' => 'Please Enter Valid package Name.', 'regex_match' => 'Please Enter Valid Package Name.'));
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

                    $result = $this->md->my_update('tbl_package', $ins, $whh);

                    if ($result == 1) {
                        redirect('manage-package');
                    }
                } else {
                    $data['error'] = 'Please Enter Valid Car Limit.';
                }
            }
        }
        $data['editpackage'] = $this->md->my_select('tbl_package', '*', $whh)[0];
        $data['package'] = $this->md->my_select('tbl_package');
        $this->load->view('admin/managepackage', $data);
    }

    public function memberprofile() {

        $id = base64_decode(base64_decode($this->uri->segment(2)));
        $whh['register_id'] = $id;

        if ($this->input->post('changes')) {

            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('name', '', 'required|regex_match[/^[a-zA-Z ]+$/]', array('required' => 'Please Enter member Name.', 'regex_match' => 'Please Enter Valid Name.',));
            $this->form_validation->set_rules('email', '', 'required|valid_email', array('required' => 'Please Enter member Email.', 'valid_email' => 'Please Enter Valid Email.'));
            $this->form_validation->set_rules('mobile', '', 'required|numeric|exact_length[10]', array('required' => 'Please Enter Your Contact Number.', 'numeric' => 'Please Enter Valid Contact Number.', 'exact_length' => 'Please Enter Valid Contact Number.'));

            if ($this->form_validation->run() == TRUE) {

                $count = strlen($_FILES['photo']['name']);

                if ($count > 0) {

                    $config['upload_path'] = './assets/profile/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = 1024 * 4;
                    $config['file_name'] = 'profile_'.$this->session->userdata('member');
                    $config['overwrite'] = true;

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('photo')) {

                        $ins['profile_pic'] = 'assets/profile' . $this->upload->data('file_name');
                    }
                }

                $ins['name'] = $this->input->post('name');
                $ins['email'] = $this->input->post('email');
                $ins['mobile'] = $this->input->post('mobile');

                $result = $this->md->my_update('tbl_register', $ins, $whh);

                if ($result == 1) {
                    redirect('member-profile');
                }
            }
        }

        $data['editprofile'] = $this->md->my_select('tbl_register', '*', $whh)[0];
        $this->load->view('member/profile', $data);
    }

}
