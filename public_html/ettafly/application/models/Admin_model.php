<?php

class Admin_model extends CI_Model
{

    public $table    = 'admin';
    public $logs     = 'logs';
    public $ip_check = 'ip_check';

    public function __construct()
    {

        //load the parent constructor

        parent::__construct();
    }
    
    public function get_profile_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('site_settings')->row();
    }
    
    public function ip_checking($ip) {
        $this->db->where('ip', $ip);
        $ipcheck = $this->db->get('admin_ip');
        return $ipcheck->row();
    }
    
    public function admin_ips($ip) {
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        $this->db->insert('admin_ip', $data);
        // return $query->row();
    }

    public function ip_insert($ip, $date) {
        $data['lastlogin'] = date('d-m-Y h:i:s');
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        $this->db->insert('admin_logs', $data);
        // return $query->row();
    }

    public function admin_login($username, $password) {

        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $query = $this->db->get('admin_login');
        if ($query->num_rows() == 1) {
            $data['name'] = 'admin';
            $data['lastlogin'] = date('d-m-Y h:i:s');
            $ip = $data['ip'] = $_SERVER['REMOTE_ADDR'];
            $this->db->insert('admin_logs', $data);
            return $query->row();
        } else {
            return false;
        }
    }

    public function verify_password_by_user_id($id, $password) {

        return $this->db->get_where('admin_login', ['id' => $id, 'password' => $password])->num_rows();
    }

    public function set_password_by_user_id($id, $new_password) {

        $this->db->set('password', $new_password);
        $this->db->where('id', $id);
        return $this->db->update('admin_login');
    }
    
    public function settings_view($id, $table) 
    {
        $this->db->where("id", $id);
        $data = $this->db->get($table);
        return $data->row();
    }

    public function update_settings($data, $id, $table) {
        $this->db->where("id", $id);
        return $this->db->update($table, $data, ['id' => $id]);
    }
    
    
     public function update_password($data, $table) {
        $password = md5($_POST['currentPassword']);
        $this->db->where("password", $password);
        return $this->db->update($table, $data, ['password' => $password]);
    }
  public function forget_password($email) {

        $this->db->where('password_email', $email);
        $query = $this->db->get('contact_settings');
        if ($query->num_rows() == 1) {
//            $data['password'] = md5($password);
//            $this->db->where("id", '1');
//            $this->db->update('admin_login', $data, ['id' => '1']);
            return $query->row();
        } else {
            return false;
        }
    }
    
    public function change_password($password) {
        $data['password']= md5($password);
        $this->db->where("id", '1');
        return $this->db->update('admin_login', $data, ['id' => '1']);
    }
    
}

    ?>