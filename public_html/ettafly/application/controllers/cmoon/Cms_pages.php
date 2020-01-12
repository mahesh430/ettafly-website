<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cms_pages extends CI_Controller {
     
    function __construct() {

        parent::__construct();
        $this->load->model("admin_model");
        if ($this->session->userdata('logged_in') != true) {
            $this->session->set_flashdata('msg', 'Session Timed Out');
            redirect('cmoon/login');
        } else {
        $this->data['site'] = $this->cms_model->view_data('1', 'site_settings');
        $this->data['contact'] = $this->cms_model->view_data('1', 'contact_settings');
        $this->data["social"] = $this->cms_model->view_data('1', 'social_links');
        
            
        }
    }
    
    
   
    
    ##### Cms Controllers #####
    
    public function cms_pages($value1 = '', $value2 = '', $value3 = '') {
        $table = "cms_pages";
        $id = $value2;
        $controler="cms_pages";
        $page="cms_pages";

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data($table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar',$this->data);
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/cms_pages/'.$controler.'/view');
        }

        if ($value1 == "add") {
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/edit_'.$page);
        }


        if ($value1 == "edit") {
            $data['data'] = $this->cms_model->view_data($id, $table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/edit_'.$page, $data);
        }

        if ($value1 == "add_data") {
            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
            $this->cms_model->insert_data($table, $data);
            $this->session->set_flashdata('msg', 'added');
            redirect('cmoon/cms_pages/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {
            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/cms_pages/'.$controler.'/view');
        }
    }
    
    
    ##### Testimonials Controllers #####
    
    public function testimonials($value1 = '', $value2 = '', $value3 = '') {
        $table = "testimonials";
        $id = $value2;
        $controler="testimonials";
        $page="testimonials";

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data($table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar',$this->data);
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/cms_pages/'.$controler.'/view');
        }

        if ($value1 == "add") {
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/edit_'.$page);
        }


        if ($value1 == "edit") {
            $data['data'] = $this->cms_model->view_data($id, $table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/edit_'.$page, $data);
        }

        if ($value1 == "add_data") {
            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
            $this->cms_model->insert_data($table, $data);
            $this->session->set_flashdata('msg', 'added');
            redirect('cmoon/cms_pages/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {
            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/cms_pages/'.$controler.'/view');
        }
    }
    
    
    
    
    
    public function logs() {
        $data['admin_log'] = $this->cms_model->get_data('admin_logs');
        $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
        $this->load->view('cmoon/logs', $data);
        
    }
    
    

    
    
    ####Functions#####
    
    private function clean($string) {
        $string = str_replace(" ", "-", $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }
    
    private function upload_image($file_name, $path = NULL) {

        $upload_path1 = "public/images/admin/" . $path;
        $config1['upload_path'] = $upload_path1;
        $config1['allowed_types'] = "gif|jpg|png|jpeg";
        $config1['max_size'] = "100480000";
        $img_name1 = strtolower($_FILES[$file_name]['name']);
        $img_name1 = preg_replace('/[^a-zA-Z0-9\.]/', "_", $img_name1);
        $config1['file_name'] = date("YmdHis") . rand(0, 9999);
        $this->load->library('upload', $config1);
        $this->upload->initialize($config1);
        $this->upload->do_upload($file_name);
        $fileDetailArray1 = $this->upload->data();
        return $fileDetailArray1['file_name'];
    }
    
    private function upload_file($file_name, $path = NULL) {

        $upload_path1 = "public/images/admin/" . $path;
        $config1['upload_path'] = $upload_path1;
        $config1['allowed_types'] = "pdf|ppt|doc|docx|xls|pptx";
        $config1['max_size'] = "100480000";
        $img_name1 = strtolower($_FILES[$file_name]['name']);
        $img_name1 = preg_replace('/[^a-zA-Z0-9\.]/', "_", $img_name1);
        $config1['file_name'] = date("YmdHis") . rand(0, 9999);
        $this->load->library('upload', $config1);
        $this->upload->initialize($config1);
        $this->upload->do_upload($file_name);
        $fileDetailArray1 = $this->upload->data();
        return $fileDetailArray1['file_name'];
    }
    }
