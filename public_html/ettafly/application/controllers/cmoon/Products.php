<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
     
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
    
    ##### Products Controllers #####
    
    public function products_category($value1 = '', $value2 = '', $value3 = '') {
        $table = "products_category";
        $id = $value2;
        $controler="products_category";
        $page="products_category";

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data($table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar',$this->data);
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/products/'.$controler.'/view');
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
            redirect('cmoon/products/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {
            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
       
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/products/'.$controler.'/view');
        }
    }
    
    ##### Products Controllers #####
    
    public function products_sub_category($value1 = '', $value2 = '', $value3 = '') {
        $table = "sub_category";
        $table2 = "products_category";
        $id = $value2;
        $controler="products_sub_category";
        $page="sub_category";

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data($table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar',$this->data);
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/products/'.$controler.'/view');
        }

        if ($value1 == "add") {
            $data['sub_data'] = $this->cms_model->get_data($table2);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/edit_'.$page, $data);
        }


        if ($value1 == "edit") {
            $data['sub_data'] = $this->cms_model->get_data($table2);
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
            redirect('cmoon/products/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {
            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
       
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/products/'.$controler.'/view');
        }
    }
    
    
    ##### Products Controllers #####
    
    public function products($value1 = '', $value2 = '', $value3 = '') {
        $table = "products";
        $products_id = $value2;
        $id = $value3;
        $controler="products";
        $page="products";

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data_by_value('product_id', $products_id, $table);
           
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/products/'.$controler.'/view/'.$products_id);
        }

        if ($value1 == "add") {
//            $data['sub_category'] = $this->cms_model->get_data('sub_category');
//            $data['sub_product_cat'] = $this->cms_model->get_data('sub_products');
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/edit_'.$page);
        }


        if ($value1 == "edit") {
            $data['sub_category'] = $this->cms_model->get_data('sub_category');
            $data['sub_category_cat'] = $this->cms_model->get_data('sub_category');
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
            redirect('cmoon/products/'.$controler.'/view/'.$products_id);
        }

        if ($value1 == "edit_data") {

            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
        
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/products/'.$controler.'/view/'.$products_id);
        }
    }
    
    
    ##### Products Controllers #####
    
    public function products3($value1 = '', $value2 = '', $value3 = '') {
        $table = "products";
        $id = $value2;
        $sub_id =3;
        $controler="products3";
        $page="products";

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data_by_value('sub_id', $sub_id, $table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar',$this->data);
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/products/'.$controler.'/view');
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
            redirect('cmoon/products/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {
            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
       
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/products/'.$controler.'/view');
        }
    }
    
    ##### Products Controllers #####
    
    public function products4($value1 = '', $value2 = '', $value3 = '') {
        $table = "products";
        $id = $value2;
        $sub_id =4;
        $controler="products4";
        $page="products";

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data_by_value('sub_id', $sub_id, $table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar',$this->data);
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/products/'.$controler.'/view');
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
            redirect('cmoon/products/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {
            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
       
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/products/'.$controler.'/view');
        }
    }
    
    ##### Products Controllers #####
    
    public function products5($value1 = '', $value2 = '', $value3 = '') {
        $table = "products";
        $id = $value2;
        $sub_id =5;
        $controler="products5";
        $page="products";

        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data_by_value('sub_id', $sub_id, $table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar',$this->data);
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/products/'.$controler.'/view');
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
            redirect('cmoon/products/'.$controler.'/view');
        }

        if ($value1 == "edit_data") {
            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
       
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/products/'.$controler.'/view');
        }
    }
    
    

##### Products Controllers #####
    
    public function view_products($value1 = '', $value2 = '', $value3 = '') {
        $table = "products_types";
        $sub_id = $value2;
        $id = $value2;
        $controler="view_products";
        $page ="view_products";
        
        if ($value1 == "view") {
            $data['data'] = $this->cms_model->get_data_by_value('product_id', $sub_id, $table);
           
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/'.$page, $data);
        }
        if ($value1 == "delete") {
            $this->cms_model->delete_data($id, $table);
            $this->session->set_flashdata('msg', 'deleted');
            redirect('cmoon/products/'.$controler.'/view/'.$sub_id);
        }

        if ($value1 == "add") {
            $data['product_cat'] = $this->cms_model->get_data('products_category');
            $data['sub_product_cat'] = $this->cms_model->get_data('sub_products');
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar');
            $this->load->view('cmoon/edit_'.$page);
        }


        if ($value1 == "edit") {
            $data['product_cat'] = $this->cms_model->get_data('products_category');
            $data['sub_product_cat'] = $this->cms_model->get_data('sub_products');
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
        if ($_FILES['broucher']['name'] != '') {
            $data['broucher'] = $this->upload_file('broucher');
        }
            $this->cms_model->insert_data($table, $data);
            $this->session->set_flashdata('msg', 'added');
            redirect('cmoon/products/'.$controler.'/view/'.$sub_id);
        }

        if ($value1 == "edit_data") {

            $data = $this->input->post(NULL);
            $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
        if ($_FILES['broucher']['name'] != '') {
            $data['broucher'] = $this->upload_file('broucher');
        }
            $this->cms_model->update_data($data, $id, $table);
            $this->session->set_flashdata('msg', 'updated');
            redirect('cmoon/products/'.$controler.'/view/'.$sub_id);
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
        $config1['file_name'] = date("YmdHis") . rand(0, 999) . "_" . $img_name1;
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

?>

