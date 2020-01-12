<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {

        //load the parent constructor

        parent::__construct();
        $this->load->model("cms_model");
        $this->load->model("admin_model");
        $this->load->model("login_model");

        $this->data['site'] = $this->cms_model->view_data('1', 'site_settings');
        $this->data['contact'] = $this->cms_model->view_data('1', 'contact_settings');
        $this->data['social'] = $this->cms_model->view_data('1', 'social_links');

        if ($this->facebook->is_authenticated()) {
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/' . $userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];
            // Insert or update user data
            $user_id = $this->login_model->check_user_by_social_media($userData);
            // Check user data insert or update status
            if (!empty($user_id)) {
                $this->data['userData'] = $userData;
                $this->session->set_userdata($userData);
                if (isset($_REQUEST['state']) && isset($_REQUEST['code'])) {
                    echo "<script>
            window.close();
    		window.opener.location.reload();
        </script>";
                }
            } else {
                $data['userData'] = array();
            }
            $this->data['logoutUrl'] = $this->facebook->logout_url();
        } else {
            $this->data['authUrl'] = $this->facebook->login_url();
        }
    }

    private function get_fb_contents($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function google() {

        include_once APPPATH . "libraries/google-api-php-client/Google_Client.php";
        include_once APPPATH . "libraries/google-api-php-client/contrib/Google_Oauth2Service.php";

        // Google Project API Credentials
        $clientId = '1064206004616-n47d3kdoulf4p0l29rfvht6pe9sr4i2l.apps.googleusercontent.com';
        $clientSecret = '6Fg6OqYrfplmcO_cYEgVsQuT';
        $redirectUrl = base_url() . 'home/google';

        // Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('saidx');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['given_name'];
            $userData['last_name'] = $userProfile['family_name'];
            $userData['email'] = $userProfile['email'];
            $userData['locale'] = $userProfile['locale'];
            $userData['picture_url'] = $userProfile['picture'];

            $chars2 = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $substr1 = substr(str_shuffle($chars2), 0, 3);
            $userData['user_id'] = $substr1 . strtotime(date('d-m-Y h:i:s'));

            $data['userData'] = $userData;
            $user_data1 = $this->login_model->check_user_by_social_media($userData);

            if (!empty($user_data1)) {

                $row = $this->cms_model->get_data_by_type('id', $user_data1, 'users');

                $sess_arr = array(
                    'user_id' => $row->user_id,
                    'users_email' => $row->email,
//                    'logged_in' => true
                );


                $this->session->set_userdata($sess_arr);
                echo "<script>
            window.close();
    		window.opener.location.reload();
        </script>";
                exit();
            } else {
                $this->data['userData'] = array();
            }
        } else {
            $url = $gClient->createAuthUrl();
            header("Location: $url");
            exit;
        }
    }

    public function fblogout() {
        // Get logout URL
        $this->facebook->destroy_session();
        session_start();
        session_destroy();
        $this->session->unset_userdata($userData);
        redirect('home');
    }

    public function index() {

        $data['cms'] = $this->cms_model->view_data('1', 'cms_pages');
        $data['products_new'] = $this->cms_model->get_data_limit('20', 'products');
        $data['homebanner'] = $this->cms_model->get_data('homebanner');
        $data['airports'] = $this->cms_model->get_data('airports');


        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/index', $data);
        $this->load->view('font_end/includes/footer');
    }

    public function aboutus() {
        $data['cms1'] = $this->cms_model->view_data('1', 'cms_pages');
        $data['cms2'] = $this->cms_model->view_data('2', 'cms_pages');
        $data['cms3'] = $this->cms_model->view_data('3', 'cms_pages');
        $data['cms4'] = $this->cms_model->view_data('4', 'cms_pages');

        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/aboutus', $data);
        $this->load->view('font_end/includes/footer');
    }

    public function search_flites() {



//header('Content-type: application/json');
//        $data = $this->input->get(NULL);
////        print_r($data);
//
//        $journey_type = $data['journey_type'];
//        $airport_from_cod = $data['airport_from_code'];
//        $airport_to_cod = $data['airport_to_code'];
//        $departure_date = $data['departure_date'];
//        $return_date = $data['return_dateq'];
//        $adult_flight = $data['adult_flight'];
//        $child_flight = $data['child_flight'];
//        $infant_flight = $data['infant_flight'];
//        $class_type = $data['class_type'];
//        $target = $data['target'];
//        
//        
//        $airport_from = $this->cms_model->get_data_by_like_row('name', $airport_from_cod, 'airports');
//        $airport_to = $this->cms_model->get_data_by_like_row('name', $airport_to_cod, 'airports');
//        
//        
//         $airport_from_code = $airport_from->code;
//         $airport_to_code = $airport_to->code;
//die;

        $this->load->library('curl');
        $result = $this->curl->simple_get('http://13.235.39.41:8080/ettafly/api/session');
        $Data = json_decode($result);
        $data['session'] = $Data;

        $session_id = $Data->SessionId;
        $url = 'http://13.235.39.41:8080/ettafly/api/flightavaliblity';
        $ch = curl_init($url);
        $jsonData = array(
            "user_id" => "Ettafly_APITest2019",
            "user_password" => "Ettafly_TestPswd2019",
            "access" => "Test",
            "ip_address" => "13.235.39.41",
            "session_id" => "$session_id",
            "journey_type" => "OneWay",
            "airport_from_code" => "DEL",
            "airport_to_code" => "BOM",
            "departure_date" => "2019-12-26",
            "return_date" => "2019-12-28",
            "adult_flight" => "1",
            "child_flight" => "0",
            "infant_flight" => "0",
            "class_type" => "Economy",
            "target" => "Test"
        );

        $payload = json_encode($jsonData);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        $data['jsonData2'] = json_decode($result, true);
//        echo '<pre>';
//        print_r($data['jsonData2']);
//        echo '<pre>' . $jsonData2 . '</pre>';
//die;
//        $url2 = 'http://13.235.39.41:8080/ettafly/api/airportlist';
//        $ch2 = curl_init($url2);
//        $jsonData2 = array(
//            "user_id"=> "Ettafly_APITest2019",
//            "user_password"=> "Ettafly_TestPswd2019",
//            "access"=> "Test",
//            "ip_address"=> "13.235.39.41"
//        );
//        
//        $payload2 = json_encode($jsonData2);
//
//        curl_setopt($ch2, CURLOPT_POSTFIELDS, $payload2);
//        curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
//        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
//
//        $result2 = curl_exec($ch2);
//        
//        $data['flight_details'] = json_decode($result2, true);

        $data['flight_details'] = $this->cms_model->get_data('airports');

        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/one_way', $data);
        $this->load->view('font_end/includes/footer');
    }

    function convertJSONtoArray($data, $level) {  // level - уровень вложенности чтобы табуляцию писать правильную
        foreach ($data as $key1 => $value1) {
            if (is_array($value1)) {
                echo str_repeat("\t", $level) . '["' . $key1 . '"] => array (' . "\n";
                convertJSONtoArray($value1, $level + 1);
                echo str_repeat("\t", $level) . ")," . "\n";
            } else {
                if (( $value1 == 'true' ) or ( $value1 == 'false' ) or ( is_numeric($value1) )) {  // if numeris or boolean we dont'add quotes
                    echo str_repeat("\t", $level) . '["' . $key1 . '"] => ' . $value1 . ',' . "\n";
                } else {
                    echo str_repeat("\t", $level) . '["' . $key1 . '"] => "' . $value1 . '",' . "\n";
                }
            }
        }
    }

    public function confirm_details($ticket) {
//        $data['sc_updates'] = $this->cms_model->get_data('blog');
//        $perpage = 10;
//        $total_records = count($this->cms_model->get_by_pagenation('date', 'DESc', 'blog'));
//        $data['sc_updates'] = $this->cms_model->get_by_pagenation('date', 'DESc', 'blog', $perpage);
//
//        $pagination = my_pagination('sc_updates/', $perpage, $total_records);
//        $this->data['pagination'] = $pagination['pagination'];
//        $data['header_banners'] = $this->cms_model->view_data('1', 'header_banners');
        
        $this->load->library('curl');
        $result = $this->curl->simple_get('http://13.235.39.41:8080/ettafly/api/session');
        $Data = json_decode($result);
        $data['session'] = $Data;

        $session_id = $Data->SessionId;
        
        $url3 = 'http://13.235.39.41:8080/ettafly/api/validatefare';
        $ch3 = curl_init($url3);
        $jsonData3 = array(
            "user_id" => "Ettafly_APITest2019",
            "user_password" => "Ettafly_TestPswd2019",
            "access" => "Test",
            "ip_address" => "13.235.39.41",
            "session_id" => $session_id,
            "fare_source_code" => $ticket
        );

//                                print_r($jsonData3);

        $payload3 = json_encode($jsonData3);

        curl_setopt($ch3, CURLOPT_POSTFIELDS, $payload3);
        curl_setopt($ch3, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);

        $result3 = curl_exec($ch3);
        $data['booking_details'] = json_decode($result3, true);
//        print_r($data['result']);
//        die;
        
        $data['flight_details'] = $this->cms_model->get_data('airports');
        
        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/confirm_details', $data);
        $this->load->view('font_end/includes/footer');
    }

    public function payment($farecode) {

        $data['sc_update_view'] = $this->cms_model->get_data_by_type('p_link', $p_link, 'blog');
        $data['sc_update_side'] = $this->cms_model->get_data_limit('8', 'blog');

//        $data['products_sub'] = $this->cms_model->get_data_limit_by_value('product_id', $data['products_view']->product_id, 'id','4', 'products' ,'DESC');

        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/payment', $data);
        $this->load->view('font_end/includes/footer');
    }

    public function support() {
        $data['support'] = $this->cms_model->view_data('2', 'cms_pages');

        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/support', $data);
        $this->load->view('font_end/includes/footer');
    }

    public function blog() {
        $data['cms'] = $this->cms_model->view_data('3', 'cms_pages');


        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/blog', $data);
        $this->load->view('font_end/includes/footer');
    }

    public function gallery() {
        $data['gallery'] = $this->cms_model->get_data('gallery');
        $data['header_banners'] = $this->cms_model->view_data('8', 'header_banners');

        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/gallery', $data);
        $this->load->view('font_end/includes/footer');
    }

    public function faq() {
//        $data['faq'] = $this->cms_model->get_data('faq');
        $data['header_banners'] = $this->cms_model->view_data('8', 'header_banners');

        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/faq', $data);
        $this->load->view('font_end/includes/footer');
    }

    public function division_view($p_link) {

        $data['header_banners'] = $this->cms_model->view_data('9', 'header_banners');
        $data['division_view'] = $this->cms_model->get_data_by_type('p_link', $p_link, 'divisions');

//        $data['products'] = $this->cms_model->get_data_by_type_result('product_id', $data['sub_category']->id, 'products');
        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/division_view', $data);
        $this->load->view('font_end/includes/footer');
    }

    public function sector($p_link) {
        $data['header_banners'] = $this->cms_model->view_data('9', 'header_banners');
        $data['sectors'] = $this->cms_model->get_data_by_type('p_link', $p_link, 'sectors');

        $data['sector_data'] = $this->cms_model->get_data_by_type_result('sector_id', $data['sectors']->id, 'sector_data');
        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/sectors', $data);
        $this->load->view('font_end/includes/footer');
    }

    public function album($p_link) {
        $data['gallery'] = $this->cms_model->get_data_by_type('p_link', $p_link, 'gallery');


        $perpage = 1;
        $total_records = count($this->cms_model->get_by_pagenation('sub_id', $data['gallery']->id, 'sub_gallery'));

        $data['sub_gallery'] = $this->cms_model->get_by_pagenation('sub_id', $data['gallery']->id, 'sub_gallery', $perpage);

        $pagination = my_pagination('album/' . $p_link, $perpage, $total_records);
        $this->data['pagination'] = $pagination['pagination'];
        $data['header_banners'] = $this->cms_model->view_data('2', 'header_banners');


        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/album', $data);
        $this->load->view('font_end/includes/footer');
    }

    public function albumds($p_link) {
        $data['gallery'] = $this->cms_model->get_data_by_type('p_link', $p_link, 'gallery');

        $data['sub_gallery'] = $this->cms_model->get_data_by_type_result('sub_id', $data['gallery']->id, 'sub_gallery');


        $data['header_banners'] = $this->cms_model->view_data('6', 'header_banners');

        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/product_view', $data);
        $this->load->view('font_end/includes/footer');
    }

    public function contact() {
//        $data['header_banners'] = $this->cms_model->view_data('12', 'header_banners');
        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/contact');
        $this->load->view('font_end/includes/footer');
    }

    public function project_view($p_link) {

//        $data['project'] = $this->cms_model->get_data_by_type('p_link', $p_link, 'projects');

        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/project_view', $data);
        $this->load->view('font_end/includes/footer');
    }

    public function register() {
//        $data['header_banners'] = $this->cms_model->view_data('12', 'header_banners');
        $data['divisions'] = $this->cms_model->get_data('divisions');
        $data['role'] = $this->cms_model->get_data('role');

        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/register', $data);
        $this->load->view('font_end/includes/footer');
    }

    public function user_register() {

//        $captcha_input = $this->input->post('captcha', TRUE);
//        $captcha_text = $this->simple_captcha->get_captcha_text('captcha');
////         
//      if ($captcha_input == $captcha_text) {

        $data = $this->input->post(NULL);
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $data['user_id'] = substr(str_shuffle($chars), 0, 12);
        $data['date_of_reg'] = date('d-m-Y h:i:s');
        $data['password'] = md5($this->input->post('password', TRUE));
//        if ($_FILES['govt_proof']['name'] != '') {
//            $data['govt_proof'] = $this->upload_file('govt_proof');
//        }
        $data['status'] = "Pending";
        $this->cms_model->insert_data('users', $data);

        $name = $this->input->post('name', TRUE);
        $email = $this->input->post('email', TRUE);
        $mobile = $this->input->post('mobile', TRUE);
        $password = $this->input->post('password', TRUE);
//        $amount = $this->input->post('amount', TRUE);
//        $bank_draftno = $this->input->post('bank_draftno', TRUE);
//        $date = $this->input->post('date', TRUE);

        $to_mail = $this->data["contact"]->cemail;
        $from_email = $this->data["contact"]->from_email;
        $site = $this->data["site"]->tittle;

        $message = "
       Hi,\r\n
       Name : $name \r\n
       Email : $email \r\n
       Number : $mobile\r\n";
//       Rs. : $amount \r\n
//       Bank Draft. No. : $bank_draftno \r\n
//       Date : $date \r\n
        //echo $message;exit;
        $this->load->library('email');
        $this->email->from($from_email);
        $this->email->to($to_mail);
        $this->email->subject($subject);
        $this->email->message($message);

        $email_from = $from_email;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
        $headers .= 'From: ' . $email_from . "\r\n";
        $headers .= 'Reply-To: ' . $email_from . "\r\n";
        $mail = mail($to_mail, $site, $message, $headers);

        //$send = $this->email->send();
        if ($mail) {
            $this->session->set_flashdata('msg', 'Succesfully sent your request');
            redirect('index');
        } else {
            $this->session->set_flashdata('err', 'Your request cannot sent please try again');
            redirect('index');
        }
//        } else {
//            $this->session->set_flashdata('error', 'You have entered wrong captcha');
//            redirect('join_us');
//        }
    }

    public function airportes() {

        $url2 = 'http://13.235.39.41:8080/ettafly/api/airportlist';
        $ch2 = curl_init($url2);
        $jsonData2 = array(
            "user_id" => "Ettafly_APITest2019",
            "user_password" => "Ettafly_TestPswd2019",
            "access" => "Test",
            "ip_address" => "13.235.39.41"
        );

        $payload2 = json_encode($jsonData2);

        curl_setopt($ch2, CURLOPT_POSTFIELDS, $payload2);
        curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

        $result2 = curl_exec($ch2);

        $airports = json_decode($result2, true);
//        echo "<pre>";
//        print_r($airports);
//        echo "</pre>";
//        die;
//        foreach ($airports as $airports_view) {
////            print_r($airports_view);
////            die;
//                echo $data['city'] = $airports_view['City'];
//                echo $data['code'] = $airports_view['AirportCode'];
//                echo $data['name'] = $airports_view['AirportName'];
//                echo $data['country'] = $airports_view['Country'];
//                
//                $airportes1 = $this->cms_model->rowcount('code', $data['code'], "airports");
//                if($airportes1 == ""){
////                    echo "Hellow";
////                    die;
//                $this->cms_model->insert_data("airports", $data);
//                } else {
//                    echo "Upload Completed";
//                }
//                
//        }
    }

    public function send_email() {
//        
//        if(empty($_SESSION['6_letters_code']) || strcasecmp($_SESSION['6_letters_code'], $_POST['captcha']) != 0)
//    {  
//        //echo "<script>alert('Invalid Captcha Code')</script>";
//        $this->session->set_flashdata('error'," *Invalid Captcha");
//        redirect('contact');
//    } else {

        $name = $this->input->post('name', TRUE);
        $subjectt = $this->input->post('subject', TRUE);
        $mobile = $this->input->post('phone', TRUE);
        $email = $this->input->post('email', TRUE);
        $messagemm = $this->input->post('message', TRUE);
        $type = $this->input->post('type', TRUE);

        $to_mail = $this->data["contact"]->cemail;
        $from_email = $this->data["contact"]->from_email;
        $site = $this->data["site"]->tittle;



        $message = "
       Hi,\r\n
       Name : $name \r\n
       Email : $email \r\n
       Mobile : $mobile \r\n
       Subject : $subjectt \r\n
       Message : $messagemm \r\n
       ";

        $subject = $type;

        //echo $message;exit;
        $this->load->library('email');
        $this->email->from($email);
        $this->email->to($to_mail);
        $this->email->subject($subject);
        $this->email->message($message);

        $email_from = $from_email;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
        $headers .= 'From: ' . $email_from . "\r\n";
        $headers .= 'Reply-To: ' . $email_from . "\r\n";
        $mail = mail($to_mail, $site, $message, $headers);

        //$send = $this->email->send();
        if ($mail) {
            $this->session->set_flashdata('msg', 'Succesfully sent your request');
            redirect('contact');
        } else {
            $this->session->set_flashdata('error', 'Your request cannot sent please try again');
            redirect('contact');
        }
    }

//    }

    private function upload_file($file_name, $path = NULL) {

        $upload_path1 = "public/images/admin/" . $path;
        $config1['upload_path'] = $upload_path1;
        $config1['allowed_types'] = "pdf|txt|ppt";
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

    public function postCURL($_url, $_param) {

        $postData = '';
        //create name value pairs seperated by &
        foreach ($_param as $k => $v) {
            $postData .= $k . '=' . $v . '&';
        }
        rtrim($postData, '&');


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

        $output = curl_exec($ch);

        curl_close($ch);

        return $output;
    }

}
