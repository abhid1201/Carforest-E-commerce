<?php

class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
    }

    public function security() {
        if (!$this->session->userdata('member')) {
            redirect('login');
        }
    }

    public function member() {
        $this->security();
        $this->load->view('member/dashboard');
    }

    public function profile() {
        $this->security();
        $data['profile'] = $this->md->my_select('tbl_register', '*', array('register_id' => $this->session->userdata('member')))[0];
        $this->load->view('member/profile', $data);
    }

    public function myfavouritecar() {
        $this->security();
        $data['favourite'] = $this->md->my_select('tbl_wishlist', '*', array('register_id' => $this->session->userdata('member')));
        $this->load->view('member/myfavouritecar', $data);
    }
    
    public function mycarreview() {
        $this->security();
        $this->load->view('member/mycarreview');
    }
    
    public function testdrive() {
        $this->security();
        $this->load->view('member/mytestdrive');
    }

    public function setting() {
        $this->security();
        $data = [];

        if ($this->input->post('change_ps')) {

            $wh['register_id'] = $this->session->userdata('member');
            $detail = $this->md->my_select('tbl_register', '*', $wh);
            $ops = $this->encryption->decrypt($detail[0]->password);

            if ($ops == $this->input->post('ops')) {

                $this->form_validation->set_error_delimiters('', '');
                $this->form_validation->set_rules('nps', '', 'required|min_length[8]|max_length[16]', array('required' => 'Please Enter New Password.', 'min_length' => 'Please Enter Password Between 8 to 16 Characters.', 'max_length' => 'Please Enter Password Between 8 to 16 Characters.'));
                $this->form_validation->set_rules('cps', '', 'required|matches[nps]', array('required' => 'Please Confirm Password.', 'matches' => 'Confirm Password Does Not Matched.'));

                if ($this->form_validation->run() == TRUE) {

                    $ins['password'] = $this->encryption->encrypt($this->input->post('nps'));
                    $result = $this->md->my_update('tbl_register', $ins, $wh);

                    if ($result == 1) {
                        if ($this->input->cookie('member_password')) {
                            set_cookie('member_password', $this->input->post('nps'), (60 * 60 * 24 * 365));
                        }
                        $data['success'] = 'Password Changed Successfully.';
                    }
                }
            } else {
                $data['error'] = 'Current Password Not Match.';
            }
        }
        $this->load->view('member/setting', $data);
    }

    public function logout() {
        $this->security();
        $wh['register_id'] = $this->session->userdata('member');
        $ins['last_login'] = $this->session->userdata('member_lastlogin');
        $this->md->my_update('tbl_register', $ins, $wh);

        $this->session->unset_userdata('member');
        $this->session->unset_userdata('member_lastlogin');

        redirect('login');
    }

}
