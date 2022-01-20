<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('ProductModel');

        $this->load->library(array('session', 'form_validation'));
    }

	public function index()
	{
	    $exchangeRate=file_get_contents('exchangeRate.json');
        $exchangeRate =  json_decode($exchangeRate,true);
	    $countOfAllActiveUsers=$this->UserModel->userCount(array('is_active'=>1,'role'=>'user'));
	    $countOfAllverifiedUsers=$this->UserModel->userCount(array('isverified'=>1,'role'=>'user'));

	    $userCountAttachedActiveProducts=$this->UserModel->getUserCountAttachedActiveProducts();

        $countActiveProduct= $this->ProductModel->productCount(array('status'=>'active'));
        $unusedProduct = $this->ProductModel->countUnUsedProduct();
        $qtyAttachedProduct =$this->ProductModel->qtyAttachedProduct();
        $priceAttachedProduct = $this->ProductModel->priceAttachedProduct();
        $priceAttachedProductPeruser = $this->ProductModel->priceAttachedProductPeruser();
        $products = $this->ProductModel->getProducts();

		$this->load->view('dashboard/index',compact('products',
            'countOfAllActiveUsers',
            'countOfAllverifiedUsers',
            'userCountAttachedActiveProducts',
            'countActiveProduct',
            'unusedProduct',
            'qtyAttachedProduct',
            'priceAttachedProduct',
            'priceAttachedProductPeruser',
            'exchangeRate'
        ));
	}
}
