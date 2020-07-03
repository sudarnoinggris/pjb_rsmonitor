<?php

class Pasien_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
    }

    function get_data()
    {
        $query = $this->db->get('validasi_keluarga');
        return $query->result_array();
    }

   
}
