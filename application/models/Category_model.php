<?php

class Category_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
    }

    function get_data()
    {

        $query = $this->db->get('mitemsgroup');
        return $query->result_array();
    }

    public function add_data()
    {
        $data = array(
            'itemsgroupid' => $this->input->post('itemsgroupid'),
            'name' => $this->input->post('name'),



        );
        $this->db->insert('mitemsgroup', $data);
    }

    public function edit_data()
    {
        $data = array(
            'name' => $this->input->post('name'),

        );
        $this->db->where('itemsgroupid', $this->input->post('itemsgroupid'));
        $this->db->update('mitemsgroup', $data);
    }


    public function hapus_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getbyid($id)
    {
        return $this->db->get_where('mitemsgroup', array('itemsgroupid' => $id))->result_array();
    }
}
