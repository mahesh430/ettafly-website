<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_login extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model("admin_model");
        if ($this->session->userdata('user_email') != "") {
            $this->session->set_flashdata('msg', 'Welcome Back');
            redirect('index');
        } else {
            $this->data['site'] = $this->cms_model->view_data('1', 'site_settings');
        $this->data['contact'] = $this->cms_model->view_data('1', 'contact_settings');
        $this->data["social"] = $this->cms_model->view_data('1', 'social_links');
        }
    }
        
        
    public function index() {
        
        $this->load->view('includes/header', $this->data);
        $this->load->view('login');
        $this->load->view('includes/footer');
    }

    public function login() {
        
        $data = $this->input->post(NULL);

             $username = $this->input->post('username', TRUE);
             $password1 = $this->input->post('password', TRUE);
             $password = md5($password1);
            
            $row = $this->login_model->login($username, $password, 'users');
//            print_r($row);
//            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
//            $sess_id = substr(str_shuffle($chars), 0, 8);
//            die;
            if ($row != "") {
                $sess_arr = array(
                    'user_id' => $row->user_id,
                    'user_email' => $row->email,
                );

                $this->session->set_userdata($sess_arr);
                echo "success";
            } else {
            echo "Invalid details";
        }
        
    }
    
    
     public function forgot_password() {
        $data['site_settings'] = $this->admin_model->get_profile_by_id('1');
        $this->load->view('cmoon/forgot_password', $data);
    }
    
    public function fpassword() {
        $email = $this->input->post('email', TRUE);
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr(str_shuffle($chars), 0, 8);
        
        
        $row = $this->admin_model->forget_password($email);
        if ($row != "") {

        $mobile = $this->input->post('mobile', TRUE);
        
        $to_mail = $this->data["contact_settings"]->password_email;
        $from_email = $this->data["contact_settings"]->from_email;
        $site = $this->data["site_settings"]->tittle;
        $message = " 
            Tittle :New Password for your site,\r\n
                   Password : $password \r\n
       ";
        //echo $message;exit;
        $this->load->library('email');
        $this->email->from($from_email);
        $this->email->to($to_mail);
        $this->email->subject('New Password Contact');
        $this->email->message($message);

        $email_from = $from_email;
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			$headers .= 'From: '.$email_from. "\r\n";
			$headers .= 'Reply-To: '.$email_from. "\r\n";
            $mail=mail($to_mail, $site ,$message, $headers);
            
             if ($mail) {

                 $this->admin_model->change_password($password);
                $this->session->set_flashdata('msg', 'Your password Updated sucessfully please check your Mail');
                redirect('cmoon/login');
            } else {
                $this->session->set_flashdata('error', 'Unable to sent message check again');
                redirect('cmoon/forgot_password');
            }
            } else {
                $this->session->set_flashdata('error', 'Invalid Email');
                redirect('cmoon/forgot_password');
            }
        
    }
    
    
    
    

}
