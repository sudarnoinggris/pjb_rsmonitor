<?php

class Distrik_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
    }

    function get_data()
    {

        $query = $this->db->get('distrik');
        return $query->result_array();
    }

   
}
