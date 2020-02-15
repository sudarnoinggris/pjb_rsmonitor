<?php

class Purchasedetail_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
    }

    function get_data()
    {

        $query = $this->db->get('podetail');
        return $query->result_array();
    }

    public function add_data()
    {
        $data = array(
            'poid' => $this->input->post('poid'),
            'itemsid' => $this->input->post('itemsid'),
            'quantity' => $this->input->post('quantity'),
            'price' => $this->input->post('price'),
            'uomid' => $this->input->post('uomid'),
            'total' => $this->input->post('total'),
        );
        $this->db->insert('podetail', $data);
    }

    public function edit_data()
    {
        $data = array(

            'quantity' => $this->input->post('quantity'),
            'price' => $this->input->post('price'),
            'uomid' => $this->input->post('uomid'),
            'total' => $this->input->post('total'),


        );
        $this->db->where('poid', $this->input->post('poid'));
        $this->db->where('itemsid', $this->input->post('itemsid'));
        $this->db->update('podetail', $data);
    }


    public function hapus_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getbyid($id, $itemsid)
    {
        return $this->db->get_where('podetail', array('poid' => $id, 'itemsid' => $itemsid))->result_array();
    }
}
