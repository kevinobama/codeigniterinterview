<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'AdminBase.php';
class AdminProducts extends AdminBase {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('ProductModel');
        $this->load->library(array('session'));
        $this->isLoggedIn();
    }

	public function index()
	{
        if($this->isAdmin()) {
            $products = $this->ProductModel->getProducts();
            $this->load->view('products/index', compact('products'));
        } else {
            echo("no permission");
            redirect('/AdminProducts/myProducts');
        }
	}

    public function myProducts()
    {
        $userProducts = $this->UserModel->getUserProducts($this->session->userdata ( 'userId' ));
        $products = $this->ProductModel->getProducts();

        $this->load->view('products/myproduct', compact('products','userProducts'));

    }

    public function addMyProduct()
    {
        if($_POST) {
            $this->ProductModel->addMyProduct(array(
                    'user_id'=>$this->session->userdata ( 'userId' ),
                    'productid'=>$this->input->post('product'),
                    'quantity'=>$this->input->post('qty'),
                    'price'=>$this->input->post('price'),
                )
            );
            redirect('/AdminProducts/myProducts');
        }
    }
}
