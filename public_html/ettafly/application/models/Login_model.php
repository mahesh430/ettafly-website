<?php

class Login_model extends CI_Model
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

    public function login($username, $password, $table) {

        $this->db->where('email', $username);
        $this->db->or_where('mobile', $username);
        $this->db->where('password', $password);

        $query = $this->db->get($table);
//        $test = $this->db->last_query($query);
//        print_r($test);
//        die;
        if ($query->num_rows() == 1) {
           
            return $query->row();
        } else {
            return false;
        }
    }
    
    public function check_user_by_social_media($userData){
        $oauth_provider = $userData['oauth_provider'];
        $oauth_uid = $userData['oauth_uid'];
        $users = $this->db->get_where('users', ['oauth_provider' => $oauth_provider, 'oauth_uid' => $oauth_uid]);
        $count = $users->num_rows();
        if($count==0){        
            //$token = generateRandomString(50);
            $name = $userData['first_name'] . ' ' . $userData['last_name'];
            $this->db->set('email', $userData['email']);
            $this->db->set('name', $name);
            $this->db->set('oauth_provider', $userData['oauth_provider']);
            $this->db->set('oauth_uid', $userData['oauth_uid']);
            $this->db->set('user_id', $userData['user_id']);
            //$this->db->set('access_token', $token);
            $this->db->set('status', '1');
            $this->db->set('picture_url', $userData['picture_url']);
            $this->db->set('created_at', time());
            $this->db->insert('users');
            return $this->db->insert_id();
        }else{
            $users_d = $users->row();
            return $users_d->id;
        }
        
    }

    public function verify_password_by_values($value, $colunm, $password, $table) {

        return $this->db->get_where($table, [$value=> $colunm, 'password' => $password])->num_rows();
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
    
  public function forget_password($email, $column, $table) {

        $this->db->where($column, $email);
        $query = $this->db->get($table);
        if ($query->num_rows() == 1) {

            
            return $query->row();
        } else {
            return false;
        }
    }
    
    
    public function set_password_by_values($value, $colunm, $password, $table) {

        $this->db->set('password', $password);
        $this->db->where($value, $colunm);
        return $this->db->update($table);
    }
    
}

    ?>