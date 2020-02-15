<?php

class Productiondetail_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
    }

    function get_data()
    {

        $query = $this->db->get('prodetail');
        return $query->result_array();
    }

    public function add_data()
    {
        $data = array(
            'proid' => $this->input->post('proid'),
            'itemsid' => $this->input->post('itemsid'),
            'quantity' => $this->input->post('quantity'),
            'price' => $this->input->post('price'),
            'uomid' => $this->input->post('uomid'),

        );
        $this->db->insert('prodetail', $data);
    }

    public function edit_data()
    {
        $data = array(

            'quantity' => $this->input->post('quantity'),
            'price' => $this->input->post('price'),
            'uomid' => $this->input->post('uomid'),



        );
        $this->db->where('proid', $this->input->post('proid'));
        $this->db->where('itemsid', $this->input->post('itemsid'));
        $this->db->update('prodetail', $data);
    }


    public function hapus_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getbyid($id, $itemsid)
    {
        return $this->db->get_where('prodetail', array('proid' => $id, 'itemsid' => $itemsid))->result_array();
    }
    public function getbyiddetail($id)
    {
        return $this->db->get_where('prodetail', array('proid' => $id))->result_array();
    }
}
