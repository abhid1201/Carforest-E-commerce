<?php

class MyModel extends CI_Model {

    public function my_insert($table, $data) {
        return $this->db->insert($table, $data);
    }

    public function my_select($table, $column = '*', $where = NULL) {
        $this->db->select($column);
        $this->db->from($table);
        if (isset($where)) {
            $this->db->where($where);
        }
        $recordset = $this->db->get();
        return $recordset->result();
    }

    public function my_query($sql) {
        $recordset = $this->db->query($sql);
        return $recordset->result();
    }

    public function my_update($table, $ins, $where) {
        return $this->db->update($table, $ins, $where);
    }

    public function my_delete($table, $where) {
        return $this->db->delete($table, $where);
    }
    
    public function truncate($table) {
        return $this->db->truncate($table);
    }
    
    public function my_mailer( $receipent , $subject , $message ) {
        
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'carforest2023@gmail.com', // change it to yours
            'smtp_pass' => 'oqalsbsprjqkapsn', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('carforest2023@gmail.com'); // change it to yours
        $this->email->to($receipent); // change it to yours
        $this->email->subject($subject);
        
        $message = "<div style='border:1px solid grey;padding:50px;background:#ddd;' > $message </div>";
        
        $this->email->message($message);
        if ($this->email->send()) {
            return 1;
            //echo 'Email sent.';
        } else {
            return 0;
            //show_error($this->email->print_debugger());
        }
        
    }
}
