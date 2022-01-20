<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'AdminBase.php';
class AdminDashboard extends AdminBase {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('ProductModel');

        $this->load->library(array('session', 'form_validation'));
        $this->isLoggedIn();
    }

	public function index()
	{
	    if($this->isAdmin()) {
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
        }  else {
            echo("no permission");
        }
	}
}
