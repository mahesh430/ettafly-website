<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

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
    
    public function image_gallery($value1 = '', $value2 = '', $value3 = '') {
        $table = "gallery";
        $id = $value2;
        $controler="image_gallery";
        $page = "image_gallery";

        if ($value1 == "view") {
            $data["data"] = $this->cms_model->get_data($table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/gallery/'.$controler.'/view');
        }

        if ($value1 == "add") {
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/edit_'.$page);
        }


        if ($value1 == "edit") {
            $data["data"] = $this->cms_model->view_data($id, $table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/edit_'.$page, $data);
        }

        if ($value1 == "add_data") {

            $data = $this->input->post(NULL);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_images('image');
        }
        
            $this->cms_model->insert_data($table, $data);
            $this->session->set_flashdata('msg', 'added');
            redirect('cmoon/gallery/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {

            $data = $this->input->post(NULL);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_images('image');
        }
        
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/gallery/'.$controler.'/view');
        }
    }
    
    ##### Designs Gallery Controllers #####
    public function sub_gallery($value1 = '', $value2 = '', $value3 = '') {
        $table = "sub_gallery";
        $sub_id = $value2;
        $id = $value3;
        $controler="sub_gallery";
        $page ="sub_gallery";

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data_by_value('sub_id', $sub_id, $table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/gallery/'.$controler.'/view/'.$sub_id);
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

        if ($_FILES['images']['name'] != '') {
            
            $count_doc = count($_FILES['images']['name']);
        for ($i = 0; $i < $count_doc; $i++) {
            if ($_FILES['images']['name'][$i] != "") {
                $data['name'] = $_FILES['image']['name'] = $_FILES['images']['name'][$i];
                $_FILES['image']['type'] = $_FILES['images']['type'][$i];
                $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                $_FILES['image']['error'] = $_FILES['images']['error'][$i];
                $_FILES['image']['size'] = $_FILES['images']['size'][$i];

                //////////////////////////
                $upload_path = "public/images/admin/";
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = "gif|jpg|png|jpeg";
                $config['max_size'] = "20480000";
                $img_name = strtolower($_FILES['image']['name']);
                $img_name = preg_replace('/[^a-zA-Z0-9\.]/', "_", $img_name);
                $config['file_name'] = date("YmdHis") . rand(0, 9999999) . "_" . $img_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('image');
                $fileDetailArray = $this->upload->data();
                $data['image'] = $fileDetailArray['file_name'];
                $this->data['name'] = $this->clean($this->data['name']);
                $this->cms_model->insert_data($table ,$data);
            }
        }
        }
       
//            $this->cms_model->insert_data($table, $data);
            $this->session->set_flashdata('msg', 'added');
            redirect('cmoon/gallery/'.$controler.'/view/'.$sub_id);
        }

        if ($value1 == "edit_data") {
            $data = $this->input->post(NULL);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }

            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/gallery/'.$controler.'/view/'.$sub_id);
        }
    }

##### Designs Gallery Controllers #####
    public function product_images($value1 = '', $value2 = '', $value3 = '') {
        $table = "product_images";
        $product_id = $value2;
        $id = $value3;
        $controler="product_images";
        $page ="product_images";

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data_by_value('product_id', $product_id, $table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/gallery/'.$controler.'/view/'.$product_id);
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

//        if ($value1 == "add_data") {
//            $data = $this->input->post(NULL);
//        if ($_FILES['image']['name'] != '') {
//            $data['image'] = $this->upload_image('image');
//        }
//            $this->cms_model->insert_data($table, $data);
//            $this->session->set_flashdata('msg', 'added');
//            redirect('cmoon/gallery/'.$controler.'/view/'.$product_id);
//        }

        if ($value1 == "edit_data") {
            $data = $this->input->post(NULL);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }

            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/gallery/'.$controler.'/view/'.$product_id);
        }
        
        if ($value1 == "add_data") {

            $data = $this->input->post(NULL);

        if ($_FILES['images']['name'] != '') {
            
            $count_doc = count($_FILES['images']['name']);
        for ($i = 0; $i < $count_doc; $i++) {
            if ($_FILES['images']['name'][$i] != "") {
                $data['name'] = $_FILES['image']['name'] = $_FILES['images']['name'][$i];
                $_FILES['image']['type'] = $_FILES['images']['type'][$i];
                $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                $_FILES['image']['error'] = $_FILES['images']['error'][$i];
                $_FILES['image']['size'] = $_FILES['images']['size'][$i];

                //////////////////////////
                $upload_path = "public/images/admin/";
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] = "gif|jpg|png|jpeg";
                $config['max_size'] = "20480000";
                $img_name = strtolower($_FILES['image']['name']);
                $img_name = preg_replace('/[^a-zA-Z0-9\.]/', "_", $img_name);
                $config['file_name'] = rand(0, 9999) . "_" . $img_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('image');
                $fileDetailArray = $this->upload->data();
                $data['image'] = $fileDetailArray['file_name'];
                $this->cms_model->insert_data($table ,$data);
            }
        }
        }
       
//            $this->cms_model->insert_data($table, $data);
            $this->session->set_flashdata('msg', 'added');
            redirect('cmoon/gallery/'.$controler.'/view/'.$product_id);
        }

    }
    


    public function video_gallery($value1 = '', $value2 = '', $value3 = '') {
        $table = "video_gallery";
        $id = $value2;
        $controler="video_gallery";
        $page = "video_gallery";

        if ($value1 == "view") {
            $data["data"] = $this->cms_model->get_data($table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/gallery/'.$controler.'/view');
        }

        if ($value1 == "add") {
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/edit_'.$page);
        }


        if ($value1 == "edit") {
            $data["data"] = $this->cms_model->view_data($id, $table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/edit_'.$page, $data);
        }

        if ($value1 == "add_data") {

            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_images('image');
        }

            $this->cms_model->insert_data($table, $data);
            $this->session->set_flashdata('msg', 'added');
            redirect('cmoon/gallery/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {

            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_images('image');
        }

            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/gallery/'.$controler.'/view');
        }
    }
    
###### Homebanner Controller #######


    public function homebanner($value1 = '', $value2 = '', $value3 = '') {
        $table = "homebanner";
        $id = $value2;
        $controler="homebanner";
        $page="homebanner";
        

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data($table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/gallery/'.$controler.'/view');
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
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_images('image');
        }
            $this->cms_model->insert_data($table, $data);
            $this->session->set_flashdata('msg', 'added');
            redirect('cmoon/gallery/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {
            $data = $this->input->post(NULL);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_images('image');
        }
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/gallery/'.$controler.'/view');
        }
    }
    

###### Upload Controller ######
    
    public function upload($value1 = '', $value2 = '', $value3 = '') {
        $table = "upload";
        $id = $value2;
        $controler="upload";
        $page="upload";

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data($table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/gallery/'.$controler.'/view');
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
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_images('image');
        }
            $this->cms_model->insert_data($table, $data);
            $this->session->set_flashdata('msg', 'added');
            redirect('cmoon/gallery/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {

            $data = $this->input->post(NULL);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_images('image');
        }

            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/gallery/'.$controler.'/view');
        }
    }
    


    public function header_banner($value1 = '', $value2 = '', $value3 = '') {
        $table = "header_banner";
        $id = $value2;
        $controler="homebanner";
        $page="header_banner";

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data($table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/gallery/'.$controler.'/view');
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
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_images('image');
        }
            $this->cms_model->insert_data($table, $data);
            $this->session->set_flashdata('msg', 'added');
            redirect('cmoon/gallery/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {

            $data = $this->input->post(NULL);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_images('image');
        }

            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/gallery/'.$controler.'/view');
        }
    }
    



    private function clean($string) {
        $string = str_replace(" ", "-", $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }

    private function upload_images($file_name, $path = NULL) {

        $upload_path1 = "public/images/admin/" . $path;
        $config1['upload_path'] = $upload_path1;
        $config1['allowed_types'] = "gif|jpg|png|jpeg";
        $config1['max_size'] = "100480000";
//        $img_name1 = strtolower($_FILES[$file_name]['name']);
//        $img_name1 = preg_replace('/[^a-zA-Z0-9\.]/', "_", $img_name1);
        $config1['file_name'] = strtotime(date("Y-m-d-H-i-s")) . rand(0, 99999);
        $this->load->library('upload', $config1);
        $this->upload->initialize($config1);
        $this->upload->do_upload($file_name);
        $fileDetailArray1 = $this->upload->data();
        return $fileDetailArray1['file_name'];
    }
    
    private function upload_file($file_name, $path = NULL) {

        $upload_path1 = "public/images/admin/" . $path;
        $config1['upload_path'] = $upload_path1;
        $config1['allowed_types'] = "pdf|txt|ppt|pptx";
        $config1['max_size'] = "100480000";
//        $img_name1 = strtolower($_FILES[$file_name]['name']);
//        $img_name1 = preg_replace('/[^a-zA-Z0-9\.]/', "_", $img_name1);
        $config1['file_name'] = strtotime(date("Y-m-d-H-i-s")) . rand(0, 99999);
        $this->load->library('upload', $config1);
        $this->upload->initialize($config1);
        $this->upload->do_upload($file_name);
        $fileDetailArray1 = $this->upload->data();
        return $fileDetailArray1['file_name'];
    }

    

}

?>