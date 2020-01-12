<?php

class Cms_model extends CI_Model {

    public function get_data($table) {
        $this->db->order_by("id", "ASC");
        return $this->db->get($table)->result();
    }

    public function get_data_by($id, $table) {
        $this->db->where("s_id", $id);
        $this->db->order_by("id", "ASC");
        return $this->db->get($table)->result();
    }

    public function get_data_by_value($column, $value, $table) {
        $this->db->where($column, $value);
        $this->db->order_by("id", "DESC");
        return $this->db->get($table)->result();
//        $test = $this->db->last_query($query);
    }

    public function get_data_by_value1($column, $value, $table) {
        $this->db->where($column, $value);
        $this->db->order_by("id", "ASC");
        $this->db->get($table)->result();
        $test = $this->db->last_query($query);
        print_r($test);
    }

    public function get_data_by_values_order2($column, $value, $column2, $value2, $table) {
        $this->db->where($column, $value);
        $this->db->where($column2, $value2);
        return $this->db->get($table)->result();
    }

    public function get_data_by_values_multiple_column5($column, $column2, $column3, $column4, $column5, $value, $table) {
        $this->db->where($column, $value);
        $this->db->or_where($column2, $value);
        $this->db->or_where($column3, $value);
        $this->db->or_where($column4, $value);
        $this->db->or_where($column5, $value);
        return $this->db->get($table)->result();
    }
    
    public function get_data_by_values_or2($column, $column2, $value, $value2, $table) {
        $this->db->where($column, $value);
        $this->db->or_where($column2, $value2);
        return $this->db->get($table)->result();
    }

    public function get_data_by_values_order($column, $value, $type, $order, $table) {
        $this->db->where($column, $value);
        $this->db->order_by($type, $order);
        return $this->db->get($table)->result();
//        $test = $this->db->last_query($query);
    }

    public function get_data_by_values2($column, $value, $column2, $value2, $table) {
        $this->db->where($column, $value);
        $this->db->where($column2, $value2);
        return $this->db->get($table)->result();
//        $test = $this->db->last_query($query);
    }
    
    public function get_data_by_like_row($column, $value, $table) {
        $this->db->like($column, $value);
        return $query = $this->db->get($table)->row();
        
//        $test = $this->db->last_query($query);
        
    }
    
    public function get_data_by_value_like2($column, $value, $column2, $value2, $column3, $value3, $table) {
        $this->db->where($column, $value);
        $this->db->like($column2, $value2);
        $this->db->like($column3, $value3);
        return $query = $this->db->get($table)->result();
        
//        $test = $this->db->last_query($query);
        
    }
    
//    public function get_data_by_value_like2_join($value, $value2, $value3) {
//        
//        $this->db->select('*');
//        $this->db->from('add_money');
//        
//        $this->db->join('network_money', 'network_money.id = add_money.id','FULL');
//        $this->db->join('network_money', 'network_money.member_id = add_money.member_id','FULL');
//        $this->db->join('network_money', 'network_money.affliation_id = add_money.affliation_id','FULL');
//        $this->db->join('network_money', 'network_money.affiliation = add_money.affiliation','FULL');
//        $this->db->join('network_money', 'network_money.name = add_money.name','FULL');
//        $this->db->join('network_money', 'network_money.email = add_money.email','FULL');
//        $this->db->join('network_money', 'network_money.number = add_money.number','FULL');
//        $this->db->join('network_money', 'network_money.amount = add_money.amount','FULL');
//        $this->db->join('network_money', 'network_money.pan = add_money.pan','FULL');
//        $this->db->join('network_money', 'network_money.govt_id = add_money.govt_id','FULL');
//        $this->db->join('network_money', 'network_money.signature = add_money.signature','FULL');
//        $this->db->join('network_money', 'network_money.date = add_money.date','FULL');
//        
////        $this->db->where('add_money.affiliation', $value);
////        $this->db->like('add_money.date', $value2);
////        $this->db->like('add_money.date', $value3);
//        $query = $this->db->get();
//        
//        $test = $this->db->last_query($query);
//        print_r($test);
//        die;
//    }
    
    public function get_data_by_value_like2_rowcount($column, $value, $column2, $value2, $column3, $value3, $table) {
        $this->db->where($column, $value);
        $this->db->like($column2, $value2);
        $this->db->like($column3, $value3);
         return $this->db->get($table)->num_rows();
         
//        $test = $this->db->last_query($query);
        
    }

    public function get_data_by_values2_order($column, $value, $column2, $value2, $type, $order, $table) {
        $this->db->where($column, $value);
        $this->db->where($column2, $value2);
        $this->db->order_by($type, $order);
        return $this->db->get($table)->result();
//        $test = $this->db->last_query($query);
    }

    public function get_data_by_values_order2_limit($column, $value, $column2, $value2, $limit, $table) {
        $this->db->where($column, $value);
        $this->db->where($column2, $value2);
        $this->db->order_by("id", "DESC");
        $this->db->limit($limit);
        return $this->db->get($table)->result();
    }

    public function get_data_by_values_less2($column, $value, $column2, $value2, $table) {
        $this->db->where($column < $value);
        $this->db->where($column2, $value2);
        return $this->db->get($table)->result();
    }

    public function get_data_by_values_high($column, $value, $column2, $value2, $table) {

        $this->db->where($column, $value);
        $this->db->where($column2, $value2);
        return $this->db->get($table)->result();
        
    }
    
    public function get_data_by_values_high2($column, $value, $column2, $value2, $table) {

        $this->db->where($column, $value);
        $this->db->where($column2, $value2);
//        $query = $this->db->get($table)->result();
        return $this->db->get($table)->result();
//        $test = $this->db->last_query($query);
//        print_r($test);
    }

    public function get_data_by_values_not($column, $value, $table) {

        $this->db->where($column, $value);
        return $this->db->get($table)->result();
    }

    public function get_data_by_values_not2($column, $value, $column2, $value2, $table) {
        $this->db->where($column, $value);
        $this->db->where($column2, $value2);
        return $this->db->get($table)->result();
    }

    public function get_data_by_values_groupby2($column, $value, $column2, $value2, $group_value, $table) {
        $this->db->where($column, $value);
        $this->db->where($column2, $value2);
        $this->db->group_by($group_value);
        return $query = $this->db->get($table)->result();
//        return $query->num_rows();
//       die;
//        return $this->db->get($table)->result();
    }

    public function get_data_by_values_groupby($column, $value, $group_value, $table) {
        $this->db->where($column, $value);
        $this->db->group_by($group_value);
        return $query = $this->db->get($table)->result();
    }

    public function get_sum_by_values($sum_value, $column, $value, $table) {

        $this->db->select_sum($sum_value);
        $this->db->where($column, $value);

        return $this->db->get($table)->row();
//        $test = $this->db->last_query($query);
//        print_r($test);
//        die;
    }

    public function get_sum_by_values2($sum_value, $column, $value, $column2, $value2, $table) {

        $this->db->select_sum($sum_value);
        $this->db->where($column, $value);
        $this->db->where($column2, $value2);
        return $query = $this->db->get($table)->row();
    }
    
    public function get_sum_by_value_like($sum_value, $column, $value, $column2, $value2, $table) {

        $this->db->select_sum($sum_value);
        $this->db->where($column, $value);
         $this->db->like($column2, $value2);
         return $query = $this->db->get($table)->row();
        
    }
    public function get_sum_by_value_like22($sum_value, $column, $value, $column2, $value2, $table) {

        $this->db->select_sum($sum_value);
        $this->db->where($column, $value);
         $this->db->like($column2, $value2);
         $query = $this->db->get($table)->row();
        $test = $this->db->last_query($query);
        print_r($test);
        die;
    }

    public function view_data($id, $table) {

        $this->db->where("id", $id);
        $data = $this->db->get($table);
        return $data->row();
    }

    public function view_data_row($table) {

        $this->db->order_by("id", "ASC");
        $data = $this->db->get($table);
        return $data->row();
    }

    function insert_data($table, $data) {
        return $this->db->insert($table, $data);
    }

    function get_data_limit($limit, $table) {
        $this->db->order_by("id", "DESC");
        $this->db->limit($limit);
        return $this->db->get($table)->result();
    }

    function get_data_limit_order_by($column, $order, $limit, $table) {
        $this->db->order_by($column, $order);
        $this->db->limit($limit);
        return $this->db->get($table)->result();
    }

    function get_data_limit_by_value($type, $value, $limit, $table) {
        $this->db->where($type, $value);
//        $this->db->order_by($column, $order);
        $this->db->limit($limit);
        return $this->db->get($table)->result(); 
    }
    
    function get_data_limit_by_value_order($type, $value, $column, $order, $limit, $table) {
        $this->db->where($type, $value);
        $this->db->order_by($column, $order);
        $this->db->limit($limit);
        return $this->db->get($table)->result(); 
    }

    function get_data_search_multiple($column1, $column2, $value1, $table) {
//        echo $value1, $value2, $value3, $value4, $column1, $column2, $column3, $column4, $table;
//        die;
        $this->db->group_start();
        $this->db->like($column1, $value1);
        $this->db->or_like($column2, $value1);
        $this->db->group_end();
        $query = $this->db->get($table);
        return $query->result();
    }

    function get_data_search_multiple2($column1, $column2, $value1, $column3, $value2, $table) {
//        echo $value1, $value2, $value3, $value4, $column1, $column2, $column3, $column4, $table;
//        die;
        $this->db->group_start();
        $this->db->like($column1, $value1);
        $this->db->or_like($column2, $value1);
        $this->db->group_end();
        $this->db->where($column3, $value2);
        $query = $this->db->get($table);
        return $query->result();
    }
    
    function get_data_search_multiple3($column1, $column2, $column3, $value1, $table) {
//        echo $value1, $value2, $value3, $value4, $column1, $column2, $column3, $column4, $table;
//        die;
        $this->db->group_start();
        $this->db->like($column1, $value1);
        $this->db->or_like($column2, $value1);
        $this->db->or_like($column3, $value1);
        $this->db->group_end();
//        $this->db->where($column3, $value2);
        $query = $this->db->get($table);
        return $query->result();
    }
    
    function get_data_search_multiple3_row($column1, $column2, $column3, $value1, $table) {
//        echo $value1, $value2, $value3, $value4, $column1, $column2, $column3, $column4, $table;
//        die;
        $this->db->group_start();
        $this->db->like($column1, $value1);
        $this->db->or_like($column2, $value1);
        $this->db->or_like($column3, $value1);
        $this->db->group_end();
//        $this->db->where($column3, $value2);
        $query = $this->db->get($table);
        return $query->result();
    }

    function get_data_by_Search($value1, $value2, $value3, $value4, $column1, $column2, $column3, $column4, $table) {

        if ($value1 != '') {
            $this->db->like($column1, $value1);
        }
        if ($value2 != '') {
            $this->db->where($column2, $value2);
        }
        if ($value3 != '') {
            $this->db->where($column3, $value3);
        }
        if ($value4 != '') {
            $this->db->where($column4, $value4);
        }

//        $this->db->where(''.$column3.' BETWEEN '. $value3. ' AND '. $value4.'');
        $query = $this->db->get($table);
        return $query->result();
    }

    function get_data_by_Search2($value1, $value2, $value3, $value4, $value5, $column1, $column2, $column3, $column4, $column5, $table) {

        $current_date = date('Y-m-d', time());
        $current_date_time = strtotime($current_date);

        if ($value1 != '') {
            $this->db->like($column1, $value1);
        }
        if ($value2 != '') {
            $this->db->where($column2, $value2);
        }
        if ($value3 != '') {
            $this->db->where($column3, $value3);
        }
        if ($value4 != '') {
            $this->db->where($column4, $value4);
        }
        if ($value5 != '') {
            if ($value5 == 1) {
                $days = 0;
            } else {
                $days = $value5;
            }
            $exp_date = date('Y-m-d, 00:00:00', strtotime(date("Y-m-d") . " - $days days"));
            $exp_date_time = strtotime($exp_date);

            $this->db->where($column5 . ">=", $exp_date_time);
        }

//        $this->db->where(''.$column3.' BETWEEN '. $value3. ' AND '. $value4.'');
//        $this->db->where($column4, $value4);
        $query = $this->db->get($table);

        return $query->result();
    }

    public function update_data($data, $id, $table) {

        $this->db->where("id", $id);
        return $this->db->update($table, $data, ['id' => $id]);
    }

    public function update_data_by($data, $value, $column, $table) {

        $this->db->where($column, $value);
        return $this->db->update($table, $data, [$column => $value]);
    }

    public function delete_data($id, $table) {
        $this->db->where("id", $id);
        return $this->db->delete($table);
    }

    public function get_data_by_type($type, $value, $table) {

        $this->db->where($type, $value);
        return $query = $this->db->get($table)->row();

    }
    
    public function get_data_by_type_or($type, $value, $type2, $value2, $table) {

        $this->db->where($type, $value);
        $this->db->or_where($type2, $value2);
        return $query = $this->db->get($table)->row();

    }

    public function get_data_by_type1111($type, $value, $table) {
        $this->db->where($type, $value);
        $data = $this->db->get($table);
        $data->row();
        $test = $this->db->last_query($query);
        print_r($test);
        die;
    }

    public function get_data_by_type2($column, $value, $column2, $value2, $table) {

        $this->db->where($column, $value);
        $this->db->where($column2, $value2);
        $data = $this->db->get($table);
        return $data->row();
    }

    public function get_data_by_type22($column, $value, $column2, $value2, $table) {

        $this->db->where($column, $value);
        $this->db->where($column2, $value2);
        $data = $this->db->get($table)->row();
        $test = $this->db->last_query($data);
        print_r($test);
//        return $data->row();
    }

    public function get_data_by_type_result($column, $value, $column2, $value2, $table) {
        $this->db->where($column, $value);
        $this->db->where($column2, $value2);
        $data = $this->db->get($table);
        return $data->result();
    }

    public function get_by_pagenation($table, $perpage = NULL) {

        $limit = "";
        if (isset($_GET['page'])) {
            if ($_GET['page'] != '' || $_GET['page'] > 0) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $this->db->limit($perpage, (($page - 1) * $perpage));
        } else {
            $page = 1;
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $data = $this->db->get($table);
        return $data->result();
    }

    public function get_by_pagenation_by($type, $value, $table, $perpage = NULL) {
        $limit = "";
        if (isset($_GET['page'])) {
            if ($_GET['page'] != '' || $_GET['page'] > 0) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $this->db->limit($perpage, (($page - 1) * $perpage));
        } else {
            $page = 1;
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $this->db->where($type, $value);
        $data = $this->db->get($table);
        return $data->result();
    }

    public function get_by_pagenation_by_order($column, $order, $table, $perpage = NULL) {
        $limit = "";
        if (isset($_GET['page'])) {
            if ($_GET['page'] != '' || $_GET['page'] > 0) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }
            $this->db->limit($perpage, (($page - 1) * $perpage));
        } else {
            $page = 1;
            $this->db->limit($perpage, (($page - 1) * $perpage));
        }
        $this->db->order_by($column, $order);
        $data = $this->db->get($table);
        return $data->result();
    }

    public function get_data_by_row($type, $value, $table) {
//        die;
        $this->db->where($type, $value);
        $data = $this->db->get($table);
        return $data->row();
//        $data2 =$this->db->last_query();
    }
    
    public function get_data_by_row2($type, $value, $type2, $value2, $table) {

        $this->db->where($type, $value);
        $this->db->where($type2, $value2);
        $data = $this->db->get($table);
        return $data->row();
    }

    public function get_data_by_row_order($type, $value, $table) {
//        die;
        $this->db->where($type, $value);
        $data = $this->db->get($table);
        $this->db->order_by("id", "DESC");
        return $data->row();
//        $data2 =$this->db->last_query();
    }

    public function insert_by_rowcount($value, $type, $value2, $type2, $table) {

        $this->db->where($value, $type);
        $this->db->where($value2, $type2);
        $query = $this->db->get($table);
        if ($query->num_rows() == 0) {
            $data[$value] = $type;
            $data[$value2] = $type2;
            $data['date'] = date('d-m-Y');

            return $this->db->insert($table, $data);
        } else {
            return false;
        }
    }

    public function rowcount($type, $value, $table) {

        $this->db->where($type, $value);
        $query = $this->db->get($table);
        return $query->num_rows();
//        $test = $this->db->last_query($query);
//        print_r($test);
//        die;
    }
    
    public function get_rowcount_by_values2($type, $value, $type2, $value2, $table) {

        $this->db->where($type, $value);
        $this->db->where($type2, $value2);
        $query = $this->db->get($table);
        return $query->num_rows();
    }

    public function get_data_by_join($column1, $table1, $table2) {

        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table2 . '.' . $column1 . '=' . $table1 . '.' . $column1);
//        $this->db->where($type, $value);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_data_order_by_value($type, $value, $column, $order, $table) {
        $this->db->where($type, $value);
        $this->db->order_by($column, $order);
        return $this->db->get($table)->result();
    }

}

?>