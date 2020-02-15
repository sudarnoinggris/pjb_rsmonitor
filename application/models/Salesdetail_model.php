<?php

class Salesdetail_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
    }

    function get_data()
    {

        $query = $this->db->get('sodetail');
        return $query->result_array();
    }

    public function add_data()
    {
        $data = array(
            'soid' => $this->input->post('soid'),
            'itemsid' => $this->input->post('itemsid'),
            'quantity' => $this->input->post('quantity'),
            'price' => $this->input->post('price'),
            'uomid' => $this->input->post('uomid'),
            'total' => $this->input->post('total'),
        );
        $this->db->insert('sodetail', $data);
    }

    public function edit_data()
    {
        $data = array(

            'quantity' => $this->input->post('quantity'),
            'price' => $this->input->post('price'),
            'uomid' => $this->input->post('uomid'),
            'total' => $this->input->post('total'),


        );
        $this->db->where('soid', $this->input->post('soid'));
        $this->db->where('itemsid', $this->input->post('itemsid'));
        $this->db->update('sodetail', $data);
    }


    public function hapus_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getbyid($id, $itemsid)
    {
        return $this->db->get_where('sodetail', array('soid' => $id, 'itemsid' => $itemsid))->result_array();
    }
}
