<?php
class UserModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getUsers()
    {
        return "data";
    }

    public function getUserLogin($email, $password)
    {
        $query = $this->db->get_where('users', array('email' => $email, 'password' => md5($password)));

        return $query->row_array();
    }

    public function registration($id = 0)
    {
        $data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'updated_at' => date('Y-m-d H:i:s')
        );

        if ($id == 0) {
            return $this->db->insert('users', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('users', $data);
        }
    }
}