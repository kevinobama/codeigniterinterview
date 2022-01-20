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
	    $countOfAllActiveUsers=$this->UserModel->userCount(array('is_active'=>1,'role'=>'user'));
	    $countOfAllverifiedUsers=$this->UserModel->userCount(array('isverified'=>1,'role'=>'user'));
        $products = $this->ProductModel->getProducts();
		$this->load->view('dashboard/index',compact('products','countOfAllActiveUsers','countOfAllverifiedUsers'));
	}
}
