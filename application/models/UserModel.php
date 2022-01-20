<?php
class UserModel extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getUsers()
    {
        return "data";
    }
}