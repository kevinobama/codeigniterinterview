<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProducts extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->library(array('session', 'form_validation'));
    }

	public function index()
	{
        $products = $this->ProductModel->getProducts();
		$this->load->view('products/index',compact('products'));
	}
}
