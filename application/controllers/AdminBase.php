<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminBase extends CI_Controller {
    public $role;
    public $userId;
    public $firstname;
    public $isAdmin;
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * This function is used to check the access
     */
    function isAdmin() {
        if ($this->role == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function used to check the user is logged in or not
     */
    function isLoggedIn() {
        $this->load->helper(array('url'));
        $isLoggedIn = $this->session->userdata ( 'isLoggedIn' );

        if (! isset ( $isLoggedIn ) || $isLoggedIn != TRUE) {
            redirect ( '/users/login' );
        } else {
            $this->role = $this->session->userdata ( 'role' );
            $this->userId = $this->session->userdata ( 'userId' );
            $this->firstname = $this->session->userdata ( 'firstname' );
            $this->isAdmin = $this->session->userdata ( 'isAdmin' );
        }
        return $isLoggedIn;
    }
}
