<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
    {
        $this->load->model('UserModel');
    }

	public function index()
	{
		$this->load->view('home');
	}

    public function registration()
    {
        $users = array();
        $this->load->view('users/registration',compact('users'));
    }

    public function login()
    {
        $users = array();
        $this->load->view('users/login',compact('users'));
    }
}
