<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct() {

        parent:: __construct();



        $this->load->helper('url');
    }

//    public function index() {
//        $this->session->unset_userdata('logged_in');
//        $this->session->set_flashdata('msg', 'Successfully logged out');
//        redirect('cmoon/login');
//    }
    
    public function index() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('sess_id');
        $this->session->unset_userdata('user_email');
        $this->session->set_flashdata('msg', 'Successfully logged out');
        redirect('index');
    }

    public function job_seeker_logout() {
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('seeker_id');
        $this->session->unset_userdata('job_seeker_email');
        $this->session->set_flashdata('msg', 'Successfully logged out');
        redirect('job_seeker_login');
    }
}
