<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct() {

        parent::__construct();
        $this->load->model("admin_model");
        if ($this->session->userdata('logged_in') != true) {
            $this->session->set_flashdata('msg', 'Session Timed Out');
            redirect('cmoon/login');
        } else {
        $this->data['site'] = $this->cms_model->view_data('1', 'site_settings');
//        $this->data['admin'] = $this->cms_model->view_data('1', 'admin_login');
        $this->data['contact'] = $this->cms_model->view_data('1', 'contact_settings');
        $this->data["social"] = $this->cms_model->view_data('1', 'social_links');

        }
    }
    
  
    
    public function index() {
         $this->load->view('cmoon/includes/header', $this->data);
         $this->load->view('cmoon/includes/sidebar', $this->data);
        $this->load->view('cmoon/index');
//         $this->load->view('cmoon/includes/footer', $this->data);
        
    }
    public function home() {
         $this->load->view('cmoon/includes/header', $this->data);
        $this->load->view('cmoon/includes/sidebar', $this->data);
        $this->load->view('cmoon/index');
        
    }
    
####### Site Settings ######

    public function site_settings($value1 = '', $value2 = '', $value3 = '') {
        $table = "site_settings";
        $id = $value2;
        $controler="site_settings";
        
        if ($value1 == "view") {
            $data['site'] = $this->admin_model->settings_view('1', $table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar', $this->data);
            $this->load->view('cmoon/site_settings', $data);
        }
        if ($value1 == "edit") {
            $data = $this->input->post(NULL);
            if ($_FILES['sitelogo']['name'] != '') {
                $data['sitelogo'] = $this->upload_file('sitelogo');
            }
            if ($_FILES['favicon']['name'] != '') {
                $data['favicon'] = $this->upload_file('favicon');
            }
            $this->admin_model->update_settings($data, $id, $table);
            $this->session->set_flashdata('msg', 'Updated Successfully');
            redirect('cmoon/dashboard/'.$controler.'/view');
        }
    }
    
####### Contact Settings ######    
    
    public function contact_settings($value1 = '', $value2 = '', $value3 = '') {
        $table = "contact_settings";
        $id = $value2;
        $controler="contact_settings";
        
        if ($value1 == "view") {
            $data['contact'] = $this->admin_model->settings_view('1', $table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar', $this->data);
            $this->load->view('cmoon/contact_settings', $data);
        }
        if ($value1 == "edit") {
            $data = $this->input->post(NULL);
            
            $this->admin_model->update_settings($data, $id, $table);
            $this->session->set_flashdata('msg', 'Updated Successfully');
            redirect('cmoon/dashboard/'.$controler.'/view');
        }
    }
    
    
####### Social Links ######
    
    public function social_links($value1 = '', $value2 = '', $value3 = '') {
        $table = "social_links";
        $id = $value2;
        $controler="social_links";
        
        if ($value1 == "view") {
            $data['social'] = $this->admin_model->settings_view('1', $table);
            $this->load->view('cmoon/includes/header', $this->data);
            $this->load->view('cmoon/includes/sidebar', $this->data);
            $this->load->view('cmoon/social_links', $data);
        }
        if ($value1 == "edit") {
            $data = $this->input->post(NULL);
            
            $this->admin_model->update_settings($data, $id, $table);
            $this->session->set_flashdata('msg', 'Updated Successfully');
            redirect('cmoon/dashboard/'.$controler.'/view');
        }
    }

    public function asdasd() {
        $data['social'] = $this->admin_model->settings_view('1', 'social_links');
         $this->load->view('cmoon/includes/header', $this->data);
        $this->load->view('cmoon/social_links', $data);
        
    }


    public function change_password() {
         $this->load->view('cmoon/includes/header', $this->data);
        $this->load->view('cmoon/includes/sidebar', $this->data);
        $this->load->view('cmoon/change_password');
    }

    public function update_password() {
        $data = $this->input->post(NULL);

        if ($this->input->post('currentPassword') == '') {
            echo "Password Is empty,Error!";
            die;
        }
        if ($this->input->post('newPassword') == '') {
            echo "new_password Is empty,Error!";
            die;
        }

        $password = md5($this->input->post('currentPassword'));
        $num_rows = $this->admin_model->verify_password_by_user_id('1', $password);
        if ($num_rows > 0) {
            $new_password = md5($this->input->post('newPassword'));
            $this->input->post('newPassword');
            $this->admin_model->set_password_by_user_id('1', $new_password);
            $this->session->set_flashdata('msg', 'Password Changed Successfully!');
            redirect('cmoon/dashboard/change_password');
        } else {
            $this->session->set_flashdata('msg', 'Old Password Entered Is Wrong');
            redirect('cmoon/dashboard/change_password');
        }
    }
//    function backup()
//    {
//        $this->load->helper('download');
//        $this->load->library('zip');
//        $time = time();
//        $this->zip->read_dir('C:\Users\admin\Downloads');
//        $this->zip->download('my_backup.'.$time.'.zip');
//        
//        
//    }


    public function backup() {
        $this->load->dbutil();
        $prefs = array(
            'format' => 'zip', // gzip, zip, txt
            'filename' => 'backup_' . date('m_d_Y_H_i_s') . '.sql', // File name - NEEDED ONLY WITH ZIP FILES
            'add_drop' => TRUE, // Whether to add DROP TABLE statements to backup file
            'add_insert' => TRUE, // Whether to add INSERT data to backup file
            'newline' => "\n"               // Newline character used in backup file
        );
        $backup = $this->dbutil->backup($prefs);
        
             
        $this->load->helper('file');
        write_file('/path/to/' . 'dbbackup_' . date('m_d_Y_H_i_s') . '.zip', $backup);
        $this->load->helper('download');
        force_download('dbbackup_' . date('m_d_Y_H_i_s') . '.zip', $backup);
    }

    private function upload_file($file_name, $path = NULL) {

        $upload_path1 = "public/images/admin/" . $path;
        $config1['upload_path'] = $upload_path1;
        $config1['allowed_types'] = "gif|jpg|png|jpeg|ico";
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

}

?>