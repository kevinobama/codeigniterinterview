<?php
class ProductModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getProducts() {
        $query = $this->db->get_where('products', array());

        return $query->result_array();
    }
}