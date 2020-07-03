<?php

class Rs_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
    }

    function get_data()
    {
        $query = $this->db->get('rs');
        return $query->result_array();
    }

   
}
