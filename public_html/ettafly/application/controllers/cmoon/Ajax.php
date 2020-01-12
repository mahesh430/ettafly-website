<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

    private $data;

    function __construct() {

        parent::__construct();
        $this->load->model("admin_model");
        if ($this->session->userdata('logged_in') != true) {
            
        } else {
//
        }
    }

    public function get_flights() {

//        $data['airports'] = $this->cms_model->get_data('airports');

        $search = $this->input->get_post('flightFrom1', TRUE);
        
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

        foreach ($airports as $airports_view) {
            if ($search == $flight_details_view['AirportCode']) {
                $departure_loc = $flight_details_view['City'];
                $departure_airport = $flight_details_view['AirportName'];
            }
        }
    }

    public function product() {
        $cat_id = $this->input->get_post('cat_id', TRUE);
        $results = $this->db->get_where('sub_products', ['product_id' => $cat_id])->result();
        echo "<option value=''>Please Select One</option>";
        foreach ($results as $result) {
            echo "<option value='$result->id'>$result->name</option>";
        }
    }

    public function get_sub_sub_categories() {
        $cid = $this->input->get_post('cid', TRUE);
        $results = $this->db->get_where('sub_sub_category', ['cid' => $cid])->result();
        echo "<option value=''>--Select--</option>";
        foreach ($results as $result) {
            echo "<option value='$result->id'>$result->name</option>";
        }
    }

    public function get_filter_value_from_subcat() {
        $sid = $this->input->get_post('sid', TRUE);
        $cid = $this->input->get_post('cid', TRUE);
        $results = $this->db->get_where('filter_group', ['sid' => $sid, 'cid' => $cid])->result();
        echo "<option value=''>--Select--</option>";
        foreach ($results as $result) {
            echo "<option value='$result->id'>$result->name</option>";
        }
    }

    public function get_filter_value_from_sub_subcat() {
        $ssid = $this->input->get_post('ssid', TRUE);
        $cid = $this->input->get_post('cid', TRUE);
        echo "<option value=''>--Select--</option>";
        $results = $this->db->get_where('filter_group_sub_sub_category', ['ssid' => $ssid, 'cid' => $cid])->result();
        foreach ($results as $result) {
            echo "<option value='$result->id'>$result->name</option>";
        }
    }

    public function get_filter_value_from_filter_group() {
        $ffid = $this->input->get_post('ffid', TRUE);
        echo "<option value=''>--Select--</option>";
        $results = $this->db->get_where('filter_values_sub_sub_category', ['ffid' => $ffid])->result();
        foreach ($results as $result) {
            echo "<option value='$result->id'>$result->name</option>";
        }
    }

    public function get_brands_from_subsubcat() {
        $ssid = $this->input->get_post('ssid', TRUE);
        $results = $this->db->get_where('sub_sub_category', ['id' => $ssid])->row()->brands;
        if (count($results) != 0) {
            $brands = explode(',', $results);
            foreach ($brands as $brand) {
                $brand = $this->admin_model->get_brand_by_id($brand);
                echo "<div class='col-xs-5'>";
                echo "<div class='radio radio-success'>";
                echo "<input type='radio' name='brand_id' id='$brand->name' value='$brand->id'>";
                echo "<label for='$brand->name'>$brand->name</label>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No Brands Defined For this Sub Sub-Category";
        }
    }

    public function get_sub_subcat_from_subcat() {
        $sid = $this->input->get_post('sid', TRUE);
        $cid = $this->input->get_post('cid', TRUE);
        $results = $this->db->get_where('sub_sub_category', ['sid' => $sid, 'cid' => $cid])->result();
        echo "<option value=''>--Select--</option>";
        foreach ($results as $result) {
            echo "<option value='$result->id'>$result->name</option>";
        }
    }

    public function get_products_from_sub_sub_cat() {
        $ssid = $this->input->get_post('ssid', TRUE);
        $results = $this->db->get_where('products', ['ssid' => $ssid])->result();
        echo "<option value=''>--Select--</option>";
        foreach ($results as $result) {
            echo "<option value='$result->id'>$result->name</option>";
        }
    }

    public function get_latitude_longitude_from_vendor_id() {
        $this->output->set_content_type('application/json');
        $vid = $this->input->get_post('vid', TRUE);
        $results = $this->db->get_where('vendors', ['id' => $vid])->row();
        $reponse[] = array('latitude' => $results->latitude, 'longitude' => $results->longitude);
        echo json_encode($reponse);
    }

    public function get_latitude_longitude_from_city_id() {
        $this->output->set_content_type('application/json');
        $id = $this->input->get_post('id', TRUE);
        $results = $this->db->get_where('cities', ['id' => $id])->row();
        $reponse[] = array('latitude' => $results->latitude, 'longitude' => $results->longitude, 'city_name' => $results->name);
        $this->session->set_userdata('city_name', $results->name);
        $this->session->set_userdata('city_id', $id);
//        $this->session->set_userdata('lat', $results->latitude);
//        $this->session->set_userdata('long', $results->longitude);
        $this->session->unset_userdata('session_token');
        echo json_encode($reponse);
    }

    public function get_nearest_city() {
        $lat = $this->input->post('lat', TRUE);
        $long = $this->input->post('long', TRUE);
        $this->session->set_userdata('lat', $lat);
        $this->session->set_userdata('long', $long);
        $city_name = $this->admin_model->get_nearest_city_from_lat_lng($lat, $long)->name;
        $city_id = $this->admin_model->get_nearest_city_from_lat_lng($lat, $long)->id;
        if ($city_id != '' && $this->session->userdata('city_id') == '') {
            $this->session->set_userdata('city_name', $city_name);
            $this->session->set_userdata('city_id', $city_id);
            echo 'city_set';
        }
        if ($city_id == '' && $this->session->userdata('city_id') == '') {
            echo 'false';
        }
    }

    public function get_filters_from_subsubcat() {
        $ssid = $this->input->get_post('ssid', TRUE);
        $cid = $this->input->get_post('cid', TRUE);
        $results = $this->db->get_where('filter_group_sub_sub_category', ['ssid' => $ssid, 'cid' => $cid])->result();
        foreach ($results as $result) {
            echo "<div class='form-group'>";
            echo "<label for='name'>$result->name</label>";
            echo "<input type='hidden' value='$result->id' name='filter_group_id[]'>";
            echo "<select class='form-control filgr' name='filter_value_id[]'>";
            echo "<option value=''>--Select--</option>";
            $filtervalues = $this->db->get_where('filter_values_sub_sub_category', ['ffid' => $result->id])->result();
            foreach ($filtervalues as $filtervalue) {
                echo "<option value='$filtervalue->id'>$filtervalue->name</option>";
            }
            echo "</select>";
            echo "</div>";
        }
    }

}
