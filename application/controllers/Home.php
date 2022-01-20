<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        $this->load->model('UserModel');
    }

	public function index()
	{
		$this->load->view('home');
	}
}