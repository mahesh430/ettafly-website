<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {
     
    function __construct() {

        parent::__construct();
        $this->load->model("admin_model");
        if ($this->session->userdata('logged_in') != true) {
            $this->session->set_flashdata('msg', 'Session Timed Out');
            redirect('cmoon/login');
        } else {
        $this->data['site'] = $this->cms_model->view_data('1', 'site_settings');
        $this->data['contact'] = $this->cms_model->view_data('1', 'contact_settings');
        $this->data["social"] = $this->cms_model->view_data('1', 'contact_settings');
        
            
        }
    }
    
    
    ##### Blog Controller #####
    
    public function blog($value1 = '', $value2 = '', $value3 = '') {
        $table = "blog";
        $id = $value2;
        $controler="blog";
        $page="blog";

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data($table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar',$this->data);
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/services/'.$controler.'/view');
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
            $data['date'] = strtotime($data['date']);  
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
        
            $this->cms_model->insert_data($table, $data);
            $this->session->set_flashdata('msg', 'added');
            redirect('cmoon/services/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {
            $data = $this->input->post(NULL);
            $data['date'] = strtotime($data['date']);  
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
       
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/services/'.$controler.'/view');
        }
    }

#####  services Controllers #####
    
    public function services($value1 = '', $value2 = '', $value3 = '') {
        $table = "services";
        $id = $value2;
        $controler="services";
        $page ="services";

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data($table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar',$this->data);
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/services/'.$controler.'/view');
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
        if ($_FILES['banner']['name'] != '') {
            $data['banner'] = $this->upload_image('banner');
        }
        
            $this->cms_model->insert_data($table, $data);
            $this->session->set_flashdata('msg', 'added');
            redirect('cmoon/services/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {
            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
        if ($_FILES['banner']['name'] != '') {
            $data['banner'] = $this->upload_image('banner');
        }
       
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/services/'.$controler.'/view');
        }
    }
    

##### Clients Controllers #####partners
    
    public function clients($value1 = '', $value2 = '', $value3 = '') {
        $table = "clients";
        $id = $value2;
        $controler="clients";
        $page="clients";
        

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data($table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/services/'.$controler.'/view');
        }

        if ($value1 == "add") {
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/edit_'.$page);
        }

        if ($value1 == "edit") {
            $data['data'] = $this->cms_model->view_data($id, $table);
            $this->load->view('cmoon/includes/header', $this->data);
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
            redirect('cmoon/services/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {
            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
       
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/services/'.$controler.'/view');
        }
    }
    
    
    
    #####  List Controllers #####
    
    public function faq($value1 = '', $value2 = '', $value3 = '') {
        $table = "faq";
        $id = $value2;
        $controler="faq";
        $page="list";

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data($table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/services/'.$controler.'/view');
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
            $this->cms_model->insert_data($table, $data);
            $this->session->set_flashdata('msg', 'added');
            redirect('cmoon/services/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {

            $data = $this->input->post(NULL);
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/services/'.$controler.'/view');
        }
    }
    
    ##### Sectors Data Controllers #####
    
    public function sub_faq($value1 = '', $value2 = '', $value3 = '') {
        $table = "sub_faq";
        $sub_id = $value2;
        $id = $value3;
        $controler="sub_faq";
        $page ="list";

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data_by_value('sub_id', $sub_id, $table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar',$this->data);
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/services/'.$controler.'/view/'.$sub_id);
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
            redirect('cmoon/services/'.$controler.'/view/'.$sub_id);
        }

        if ($value1 == "edit_data") {
            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
       
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/services/'.$controler.'/view/'.$sub_id);
        }
    }
    
    
    ##### Status Controllers #####
    
    public function status($value1 = '', $value2 = '', $value3 = '') {
        $table = "why";
        $id = '1';
        $controler="status";
        

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->view_data($id, $table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/status', $data);
        }

        if ($value1 == "edit_data") {
            $data = $this->input->post(NULL);
       
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/services/'.$controler.'/view');
        }
    }
    
    ##### Testinomias #####

    public function careers($value1 = '', $value2 = '', $value3 = '') { 
        $table = "careers";
        $id = $value2;
        $controler="careers";

        if ($value1 == "view") {
            $data["data"] = $this->cms_model->get_data($table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/careers', $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/services/'.$controler.'/view');
        }

        if ($value1 == "add") {
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/edit_careers');
        }


        if ($value1 == "edit") {
            $data["data"] = $this->cms_model->view_data($id, $table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/edit_careers', $data);
        }

        if ($value1 == "add_data") {

            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
            $this->cms_model->insert_data($table, $data);
            $this->session->set_flashdata('msg', 'added');
            redirect('cmoon/services/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {

            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/services/'.$controler.'/view');
        }
    }
   
##### Testinomias #####

    public function testimonials($value1 = '', $value2 = '', $value3 = '') {
        $table = "testimonials";
        $id = $value2;
        $controler="testimonials";

        if ($value1 == "view") {
            $data["data"] = $this->cms_model->get_data($table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/testimonials', $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/services/'.$controler.'/view');
        }

        if ($value1 == "add") {
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/edit_testimonials');
        }


        if ($value1 == "edit") {
            $data["data"] = $this->cms_model->view_data($id, $table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/edit_testimonials', $data);
        }

        if ($value1 == "add_data") {

            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
            $this->cms_model->insert_data($table, $data);
            $this->session->set_flashdata('msg', 'added');
            redirect('cmoon/services/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {

            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/services/'.$controler.'/view');
        }
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
        $config1['file_name'] = date("YmdHis") . rand(0, 999);
        $this->load->library('upload', $config1);
        $this->upload->initialize($config1);
        $this->upload->do_upload($file_name);
        $fileDetailArray1 = $this->upload->data();
        return $fileDetailArray1['file_name'];
    }

    }
