<?php

class Uom_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
    }

    function get_data()
    {

        $query = $this->db->get('muom');
        return $query->result_array();
    }

    public function add_data()
    {
        $data = array(
            'uomid' => $this->input->post('uomid'),
            'name' => $this->input->post('name'),



        );
        $this->db->insert('muom', $data);
    }

    public function edit_data()
    {
        $data = array(
            'name' => $this->input->post('name'),

        );
        $this->db->where('uomid', $this->input->post('uomid'));
        $this->db->update('muom', $data);
    }


    public function hapus_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getbyid($id)
    {
        return $this->db->get_where('muom', array('uomid' => $id))->result_array();
    }
}
