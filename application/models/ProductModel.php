<?php
class ProductModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //Select count(id) from products where status=’active’
    public function productCount($where=array())
    {
        return $this->db->where($where)->from("products")->count_all_results();
    }

    public function getProducts() {
        $query = $this->db->get_where('products', array());

        return $query->result_array();
    }

    //Select count(id) from products where status=’active’
    //and id not in(select productid from user_products)
    public function countUnUsedProduct() {
        $sql="Select count(id) as productcount from products where status='active' 
        and id not in(select productid from user_products)";

        $query = $this->db->query($sql);
        return $query->result_array()[0]['productcount'];
    }

    //Select sum(user_products.quantity) as  from user_products left join products p on user_products.productid= p.id where p.status='active'
    public function qtyAttachedProduct() {
        $sql="select sum(user_products.quantity) as qty from user_products 
        left join products p
        on p.id=user_products.productid
        where p.status='active' ";

        $query = $this->db->query($sql);
        return $query->result_array()[0]['qty'];
    }

    //select sum(user_products.quantity* p.price) as price,user_products.user_id,u.firstname from user_products
    //left join products p on p.id=user_products.productid
    //left join users u on u.id=user_products.user_id
    //where p.status='active'
    //group by user_products.user_id
    public function priceAttachedProduct() {
        $sql="select sum(user_products.quantity* p.price) as price from user_products 
        left join products p on p.id=user_products.productid
        where p.status='active' ";

        $query = $this->db->query($sql);
        return $query->result_array()[0]['price'];
    }

    public function priceAttachedProductPeruser() {
        $sql="select sum(user_products.quantity* p.price) as price,user_products.user_id,u.firstname from user_products 
        left join products p on p.id=user_products.productid
        left join users u on u.id=user_products.user_id
        where p.status='active'
        group by user_products.user_id";

        $query = $this->db->query($sql);
        return $query->result_array();
    }
}