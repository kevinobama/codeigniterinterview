<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation'));
    }

	public function index()
	{
		$this->load->view('home');
	}

    public function registration()
    {
        $this->form_validation->set_rules('firstname','First Name','trim|required');
        $this->form_validation->set_rules('lastname','Last Name','trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]|md5');

        $data['title'] = 'Register';

        if ($_POST){
            if ($this->UserModel->registration()) {
                $this->session->set_flashdata('msg_success', 'Registration Successful!');
                redirect('users/login');
            } else {
                $this->session->set_flashdata('msg_error', 'Error! Please try again later.');
                redirect('users/registration');
            }
        }
        $this->load->view('users/registration',compact('data'));
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $users = array();
        if($_POST) {
            if ($user = $this->UserModel->getUserLogin($email, $password)) {
                $this->session->set_userdata('email', $email);
                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('is_logged_in', true);

                $this->session->set_flashdata('msg_success', 'Login Successful!');
                redirect('home');
            } else {
                $this->session->set_flashdata('msg_error', 'Login credentials does not match!');

                $currentClass = $this->router->fetch_class(); // class = controller
                $currentAction = $this->router->fetch_method(); // action = function

                redirect("$currentClass/$currentAction");
            }
        }
        $this->load->view('users/login',compact('users'));
    }
}
