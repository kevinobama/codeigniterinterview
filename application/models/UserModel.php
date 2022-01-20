<?php
class UserModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function userCount($where=array())
    {
        return $this->db->where($where)->from("users")->count_all_results();
    }

    public function getUsers()
    {
        return "";
    }

    public function getUserLogin($email, $password)
    {
        $query = $this->db->get_where('users', array('isverified'=>1,'is_active'=>1,'email' => $email, 'password' => md5($password)));

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

    //6.2. Count of active and verified users who have attached active products.
    //SELECT count(distinct user_products.user_id) as usercount  FROM user_products
    //left join users u on u.id=user_products.user_id
    //where u.is_active=1 and u.isverified=1 and u.role='user'
    public function getUserCountAttachedActiveProducts()
    {
        $sql="SELECT count(distinct user_products.user_id) as usercount  FROM user_products
            left join users u on u.id=user_products.user_id
            where u.is_active=1 and u.isverified=1 and u.role='user'";

        $query = $this->db->query($sql);
        return $query->result_array()[0]['usercount'];
    }

    public function getUserProducts($userId) {
        $this->db->select('user_products.*,products.title');
        $this->db->from('user_products');
        $this->db->where('user_id', $userId);
        $this->db->join('products', 'products.id = user_products.productid', 'left');
        return $this->db->get()->result_array();

        //$query = $this->db->get_where('user_products', array('user_id'=>$userId));

        //return $query->result_array();
    }
}