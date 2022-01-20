<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'AdminBase.php';
class AdminDashboard extends AdminBase {
     public $url="http://api.exchangeratesapi.io/v1/latest?access_key=d9fa0d08e2158328e031b8b6a7eb7582&format=1";
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('ProductModel');

        $this->load->library('session');
        $this->isLoggedIn();
    }

	public function index()
	{
	    if($this->isAdmin()) {
            $exchangeRateBaseEU=file_get_contents($this->url);
            $exchangeRateBaseEU =  json_decode($exchangeRateBaseEU,true);

            $exchangeRate = array(
                'USD'=>$exchangeRateBaseEU['rates']['USD'],
                'RON'=>$exchangeRateBaseEU['rates']['RON']
            );
            
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
            redirect('/AdminProducts/myProducts');
        }
	}
}
