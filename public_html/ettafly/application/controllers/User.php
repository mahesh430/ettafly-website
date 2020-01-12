<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->model("admin_model");
        if ($this->session->userdata('user_id') == "") {
            $this->session->set_flashdata('msg', 'Session Timed Out');
            redirect('index');
        } else {
            $this->data['site'] = $this->cms_model->view_data('1', 'site_settings');
            $this->data['contact'] = $this->cms_model->view_data('1', 'contact_settings');
            $this->data["social"] = $this->cms_model->view_data('1', 'social_links');
        }
    }

    public function profile() {


//        $data['cities'] = $this->cms_model->get_data('cities');
//        $data['states'] = $this->cms_model->get_data('states');
//        $data['university'] = $this->cms_model->get_data('university');
//        $data['collage'] = $this->cms_model->get_data('collage');
//        $data['jobs'] = $this->cms_model->get_data_limit_by('id', 6, 'jobs', 'DESC');

        $user_id = $this->session->userdata('user_id');
        $data['users'] = $this->cms_model->get_data_by_type('email', $email, 'users');

        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/profile', $data);
        $this->load->view('font_end/includes/footer');
    }

    public function make_payment() {
        $data = $this->input->post(NULL);
//        print_r($data);
//        die;
        $user_id = $this->session->userdata('user_id');
        $users = $this->cms_model->get_data_by_type('user_id', $user_id, 'users');

//     2014-02-01T00:00:00   

        $data['adult_firstname'] = implode("<br>", $data['adult_firstname']);
        $data['adult_lastname'] = implode("<br>", $data['adult_lastname']);
        $data['adult_dob'] = implode("<br>", $data['adult_dob']);
        $data['adult_gender'] = implode("<br>", $data['adult_gender']);
        $data['adult_title'] = implode("<br>", $data['adult_title']);
        $data['passport_expiry'] = implode("<br>", $data['passport_expiry']);
        $data['passport_no'] = implode("<br>", $data['passport_no']);
        $data['issue_country'] = implode("<br>", $data['issue_country']);

        $data['child_dob'] = implode("<br>", $data['child_dob']);
        $data['child_gender'] = implode("<br>", $data['child_gender']);
        $data['child_title'] = implode("<br>", $data['child_title']);
        $data['child_first_name'] = implode("<br>", $data['child_first_name']);
        $data['child_last_name'] = implode("<br>", $data['child_last_name']);
        $data['child_issue_country'] = implode("<br>", $data['child_issue_country']);
        $data['child_passport_expiry_date'] = implode("<br>", $data['child_passport_expiry_date']);
        $data['child_passport_no'] = implode("<br>", $data['child_passport_no']);

        $data['infant_dob'] = implode("<br>", $data['infant_dob']);
        $data['infant_gender'] = implode("<br>", $data['infant_gender']);
        $data['infant_title'] = implode("<br>", $data['infant_title']);
        $data['infant_first_name'] = implode("<br>", $data['infant_first_name']);
        $data['infant_last_name'] = implode("<br>", $data['infant_last_name']);
        $data['infant_issue_country'] = implode("<br>", $data['infant_issue_country']);
        $data['infant_passport_expiry_date'] = implode("<br>", $data['infant_passport_expiry_date']);
        $data['infant_passport_no'] = implode("<br>", $data['infant_passport_no']);

        $chars2 = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $substr1 = substr(str_shuffle($chars2), 0, 6);
        $order_id = $substr1 . strtotime(date('d-m-Y h:i:s'));
        $data['order_id'] = $order_id;
        $data['user_id'] = $user_id;
        //        print_r($data);

        $this->cms_model->insert_data('booking', $data);
//        die;
        $booking_sess = array(
            'order_id' => $order_id,
        );
        $this->session->set_userdata($booking_sess);
        $this->session->set_flashdata('msg', 'New Property is added Sucessfully');
        redirect('payment_conform');
    }

    public function payment_conform() {

        $user_id = $this->session->userdata('user_id');
        $users = $this->cms_model->get_data_by_type('user_id', $user_id, 'users');

        $order_id = $this->session->userdata('order_id');
        $data['order'] = $this->cms_model->get_data_by_type('order_id', $order_id, 'booking');

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
            "fare_source_code" => $data['order']->fare_source_code,
        );

        $payload3 = json_encode($jsonData3);

        curl_setopt($ch3, CURLOPT_POSTFIELDS, $payload3);
        curl_setopt($ch3, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);

        $result3 = curl_exec($ch3);
        $data['booking_details'] = json_decode($result3, true);

        $data['flight_details'] = $this->cms_model->get_data('airports');

        $chars2 = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $substr1 = substr(str_shuffle($chars2), 0, 6);
        $data['transaction_id'] = $substr1 . strtotime(date('d-m-Y h:i:s'));

        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/payment_conform', $data);
        $this->load->view('font_end/includes/footer');
    }


    public function payment_sucess($booking_id) {


        $rajorpaydata = $this->input->post(NULL);
        $razorpay_payment_id = $rajorpaydata['razorpay_payment_id'];

        $user_id = $this->session->userdata('user_id');
        $users = $this->cms_model->get_data_by_type('user_id', $user_id, 'users');
        
        $chars2 = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $substr1 = substr(str_shuffle($chars2), 0, 6);
        $transaction_id = $substr1 . strtotime(date('d-m-Y h:i:s'));
        
        $payment_data['razorpay_payment_id'] = $razorpay_payment_id;
        $payment_data['booking_id'] = $booking_id;
        $payment_data['transaction_id'] = $transaction_id;
        $payment_data['user_id'] = $users->user_id;
        $payment_data['date'] = strtotime(date('d-m-Y h:i:s'));

        $this->cms_model->insert_data('payment', $payment_data);
        
        $booking_data = $this->cms_model->get_data_by_type('order_id', $booking_id, 'booking');
//   
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
            "fare_source_code" => $booking_data->fare_source_code
        );

        $payload3 = json_encode($jsonData3);

        curl_setopt($ch3, CURLOPT_POSTFIELDS, $payload3);
        curl_setopt($ch3, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);

        $result3 = curl_exec($ch3);
        $booking_details = json_decode($result3, true);

        $departure_code = $booking_details['AirRevalidateResponse']['AirRevalidateResult']['FareItineraries']['FareItinerary']['OriginDestinationOptions'][0]['OriginDestinationOption'][0]['FlightSegment']['DepartureAirportLocationCode'];
        
    $airports_data = $this->cms_model->get_data_by_type('code', $departure_code, 'airports');
    $country_data = $this->cms_model->get_data_by_type('nicename', $airports_data->country, 'country');
//        print_r($booking_details);numcode
//        die;
        $adult_quantity = $booking_details['AirRevalidateResponse']['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][0]['PassengerTypeQuantity']['Quantity'];
        $adult_code = $booking_details['AirRevalidateResponse']['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][0]['PassengerTypeQuantity']['Code'];
        $child_quantity = $booking_details['AirRevalidateResponse']['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][1]['PassengerTypeQuantity']['Quantity'];
        $child_code = $booking_details['AirRevalidateResponse']['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][1]['PassengerTypeQuantity']['Code'];
        $infant_quantity = $booking_details['AirRevalidateResponse']['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][2]['PassengerTypeQuantity']['Quantity'];
        $infant_code = $booking_details['AirRevalidateResponse']['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareBreakdown'][2]['PassengerTypeQuantity']['Code'];
        $total_quantity = $adult_quantity + $child_quantity + $infant_quantity;
        $data['user_id'] = $users->user_id;
        $data['date'] = date('d-m-Y');

        $url4 = 'http://13.235.39.41:8080/ettafly/api/book';
        $ch4 = curl_init($url4);

        

        $jsonData4 = array(
            "user_id" => "Ettafly_APITest2019",
            "user_password" => "Ettafly_TestPswd2019",
            "access" => "Test",
            "ip_address" => "13.235.39.41",
            "session_id" => $session_id,
            "target" => "Test",
            "area_code" => $country_data->phonecode,
            "country_code" => $country_data->numcode,
            "first_name" => $booking_data->adult_firstname,
            "last_name" => $booking_data->adult_lastname,
            "title" => $booking_data->adult_title,
            "email_id" => $booking_data->email,
            "mobile_no" => $booking_data->mobile,
            "dob" => $booking_data->adult_dob,
            "gender" => $booking_data->adult_gender,
            "issue_country" => $booking_data->issue_country,
            "passport_expiry" => $booking_data->passport_expiry,
            "passport_no" => $booking_data->passport_no,
            "nationality" => "IND",
            "type" => "Public",
            "IsPassportMandatory" => $booking_details['AirRevalidateResponse']['AirRevalidateResult']['FareItineraries']['FareItinerary']['IsPassportMandatory'],
            "adult_flight" => $adult_quantity,
            "child_flight" => $child_quantity,
            "infant_flight" => $infant_quantity,
            "frequentFlyrNum" => $booking_data->frequentFlyrNum,
            "fare_source_code" => $booking_details['AirRevalidateResponse']['AirRevalidateResult']['FareItineraries']['FareItinerary']['AirItineraryFareInfo']['FareSourceCode'],
            "adultmealplan" => "S",
            "child_dob" => $booking_data->child_dob,
            "child_gender" => $booking_data->child_gender,
            "child_title" => $booking_data->child_title,
            "child_first_name" => $booking_data->child_first_name,
            "child_last_name" => $booking_data->child_last_name,
            "child_issue_country" => $booking_data->child_issue_country,
            "child_passport_expiry_date" => $booking_data->child_passport_expiry_date,
            "child_passport_no" => $booking_data->child_passport_no,
            "child_frequentFlyrNum" => $booking_data->child_frequentFlyrNum,
            "childMealplan" => "S",
            "infant_dob" => $booking_data->infant_dob,
            "infant_gender" => $booking_data->infant_gender,
            "infant_first_name" => $booking_data->infant_first_name,
            "infant_last_name" => $booking_data->infant_last_name,
            "infant_title" => $booking_data->infant_title,
            "infant_issue_country" => $booking_data->infant_issue_country,
            "infant_passport_expiry_date" => $booking_data->infant_passport_expiry_date,
            "infant_passport_no" => $booking_data->infant_passport_no,
            "infantMealplan" => "S",
            "PostCode" => "500082"
        );
        
        // echo "<pre>";
        // print_r(json_encode($jsonData4));
        // echo "</pre>";
        // die;
        $payload4 = json_encode($jsonData4);

        curl_setopt($ch4, CURLOPT_POSTFIELDS, $payload4);
        curl_setopt($ch4, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch4, CURLOPT_RETURNTRANSFER, true);

        $result4 = curl_exec($ch4);
        $ticket_details = json_decode($result4, true);
    // print_r($ticket_details);
        $tickt_data['uinique_id'] = $ticket_details['BookFlightResponse']['BookFlightResult']['UniqueID'];
        $tickt_data['booking_time'] = strtotime($ticket_details['BookFlightResponse']['BookFlightResult']['TktTimeLimit']);
        $tickt_data['status'] = $ticket_details['BookFlightResponse']['BookFlightResult']['Status'];
        $tickt_data['errors'] = $ticket_details['BookFlightResponse']['BookFlightResult']['Errors'][0]['Errors'['ErrorMessage']];
        $tickt_data['transaction_id'] = $transaction_id;
        $tickt_data['user_id'] = $user_id;
        $tickt_data['booking_id'] = $booking_id;
        
        $this->cms_model->insert_data('ticket_details', $tickt_data);
    //   die;
        $this->session->set_flashdata('msg', 'sucess');
        redirect('booking_details/'.$booking_id);
        
    }
    
    public function booking_details($booking_id) {
        
        $ticket_details = $this->cms_model->get_data_by_type('booking_id', $booking_id, 'ticket_details');
        // print_r($ticket_details);
        $this->load->library('curl');
        $result = $this->curl->simple_get('http://13.235.39.41:8080/ettafly/api/session');
        $Data = json_decode($result);
        $data['session'] = $Data;

        $session_id = $Data->SessionId;

        $url = 'http://13.235.39.41:8080/ettafly/api/tripdetails';
        $ch = curl_init($url);
        $jsonData = array(
            "user_id" => "Ettafly_APITest2019",
            "user_password" => "Ettafly_TestPswd2019",
            "access" => "Test",
            "ip_address" => "13.235.39.41",
            "session_id" => $session_id,
            "UniqueID" => $ticket_details->uinique_id,
            "target" => "Test"
        );
        

        $payload = json_encode($jsonData);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        $data['booking_details'] = json_decode($result, true);
        // echo "<pre>";
        // print_r($data['booking_details']);
        // die;
        $data['flight_details'] = $this->cms_model->get_data('airports');
        $data['airlines_details'] = $this->cms_model->get_data('airlines');
        
        $this->load->view('font_end/includes/header', $this->data);
        $this->load->view('font_end/booking_details', $data);
        $this->load->view('font_end/includes/footer');
        
    }
     public function add_job_posw() {
    
                    $response_ooking = [
                   "BookFlightResponse" => [
                         "BookFlightResult" => [
                            "Errors" => "", 
                            "Status" => "CONFIRMED", 
                            "Success" => "true", 
                            "Target" => "Test", 
                            "TktTimeLimit" => "2020-01-11T12:15:44", 
                            "UniqueID" => "TR11872820" 
                             ] 
                         ] 
                     ]; 
                     
                    // echo $response_ooking['BookFlightResponse']['BookFlightResult']['UniqueID'];
                    echo strtotime($response_ooking['BookFlightResponse']['BookFlightResult']['TktTimeLimit']);
                    $chars2 = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $substr1 = substr(str_shuffle($chars2), 0, 6);
    //   echo $transaction_id = $substr1 . strtotime(date('d-m-Y h:i:s'));
    
     }
     
    public function add_job_post() {

        $user_id = $this->session->userdata('user_id');
        $users = $this->cms_model->get_data_by_type('user_id', $user_id, 'users');
        $data = $this->input->post(NULL);
        "$users->user_id";

        $data['user_id'] = $users->user_id;
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $data['job_id'] = substr(str_shuffle($chars), 0, 8);
        $data['date'] = strtotime(date('d-m-Y'));
        $data['status'] = "ACTIVE";


        $data['p_link'] = $this->clean($data['name']);
        if ($_FILES['image']['name'] != '') {
            $data['image'] = $this->upload_image('image');
        }
        $this->cms_model->insert_data('jobs', $data);
        $this->session->set_flashdata('msg', 'added');
        redirect('my_posts');
    }

    public function delete_job_post($id) {

        $user_id = $this->session->userdata('user_id');
        $users = $this->cms_model->get_data_by_type('user_id', $user_id, 'users');
        "$users->user_id";

        $this->cms_model->delete_data($id, 'jobs');
        $this->session->set_flashdata('msg', 'deleted');
        redirect('my_posts');
    }

    public function change_job_post($job_id) {

        $user_id = $this->session->userdata('user_id');
        $users = $this->cms_model->get_data_by_type('user_id', $user_id, 'users');
        "$users->user_id";

        $jobs = $this->cms_model->get_data_by_type('job_id', $job_id, 'jobs');
        if ($jobs->status == 'INACTIVE') {
            $data['status'] = "ACTIVE";
        } else {
            $data['status'] = "INACTIVE";
        }

        $this->cms_model->update_data_by($data, $job_id, 'job_id', 'jobs');
        $this->session->set_flashdata('msg', 'updated');
        redirect('manage_jobs');
    }

    public function users_change_password() {

        $user_id = $this->session->userdata('user_id');
        $users = $this->cms_model->get_data_by_type('user_id', $user_id, 'users');

        $this->load->view('includes/dashboard_header', $this->data);
        $this->load->view('users_change_password');
        $this->load->view('includes/footer');
    }

    public function update_users_password() {


        $user_id = $this->session->userdata('user_id');
        $users = $this->cms_model->get_data_by_type('user_id', $user_id, 'users');

        $password = password_verify($this->input->post('currentPassword'));
        $num_rows = $this->login_model->verify_password_by_values('user_id', $users->user_id, $password, 'users');

        if ($num_rows > 0) {
            $new_password = password_hash($this->input->post('newPassword', TRUE), PASSWORD_DEFAULT);

            $this->login_model->set_password_by_values('user_id', $users->user_id, $new_password, 'users');
            $this->session->set_flashdata('msg', 'Password Changed Successfully!');
            redirect('dashboard_change_password');
        } else {
            $this->session->set_flashdata('msg', 'Old Password Entered Is Wrong');
            redirect('dashboard_change_password');
        }
    }

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



//  $data['adult_firstname'] = htmlspecialchars(implode("<br>", $data['adult_firstname']));
//         $data['adult_lastname'] = htmlspecialchars(implode("<br>", $data['adult_lastname']));
//         $data['adult_dob'] = htmlspecialchars(implode("<br>", $data['adult_dob']));
//         $data['adult_gender'] = htmlspecialchars(implode("<br>", $data['adult_gender']));
//         $data['adult_title'] = htmlspecialchars(implode("<br>", $data['adult_title']));
//         $data['passport_expiry'] = htmlspecialchars(implode("<br>", $data['passport_expiry']));
//         $data['passport_no'] = htmlspecialchars(implode("<br>", $data['passport_no']));
//         $data['issue_country'] = htmlspecialchars(implode("<br>", $data['issue_country']));

//         $data['child_dob'] = htmlspecialchars(implode("<br>", $data['child_dob']));
//         $data['child_gender'] = htmlspecialchars(implode("<br>", $data['child_gender']));
//         $data['child_title'] = htmlspecialchars(implode("<br>", $data['child_title']));
//         $data['child_first_name'] = htmlspecialchars(implode("<br>", $data['child_first_name']));
//         $data['child_last_name'] = htmlspecialchars(implode("<br>", $data['child_last_name']));
//         $data['child_issue_country'] = htmlspecialchars(implode("<br>", $data['child_issue_country']));
//         $data['child_passport_expiry_date'] = htmlspecialchars(implode("<br>", $data['child_passport_expiry_date']));
//         $data['child_passport_no'] = htmlspecialchars(implode("<br>", $data['child_passport_no']));

//         $data['infant_dob'] = htmlspecialchars(implode("<br>", $data['infant_dob']));
//         $data['infant_gender'] = htmlspecialchars(implode("<br>", $data['infant_gender']));
//         $data['infant_title'] = htmlspecialchars(implode("<br>", $data['infant_title']));
//         $data['infant_first_name'] = htmlspecialchars(implode("<br>", $data['infant_first_name']));
//         $data['infant_last_name'] = htmlspecialchars(implode("<br>", $data['infant_last_name']));
//         $data['infant_issue_country'] = htmlspecialchars(implode("<br>", $data['infant_issue_country']));
//         $data['infant_passport_expiry_date'] = htmlspecialchars(implode("<br>", $data['infant_passport_expiry_date']));
//         $data['infant_passport_no'] = htmlspecialchars(implode("<br>", $data['infant_passport_no']));
}
