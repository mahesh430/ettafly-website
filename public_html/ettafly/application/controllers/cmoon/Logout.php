<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct() {

        parent:: __construct();



        $this->load->helper('url');
    }

    public function index() {
        $this->session->unset_userdata('logged_in');
        $this->session->set_flashdata('msg', 'Successfully logged out');
        redirect('cmoon/login');
    }

}
