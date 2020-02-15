<?php

class Items_model extends CI_Model
{


    public function __construct()
    {

        $this->load->database();
    }

    public function get_data()
    {

        $query = $this->db->get('mitems');
        return $query->result_array();
    }

    public function add_data()
    {
        $data = array(
            'itemsid' => $this->input->post('itemsid'),
            'name' => $this->input->post('name'),
            'uomid' => $this->input->post('uomid'),
            'itemsgroupid' => $this->input->post('itemsgroupid'),
            'hargabeli' => $this->input->post('hargabeli'),
            'hargajual' => $this->input->post('hargajual'),
            'hargabeliterakhir' => $this->input->post('hargabeli'),


        );
        $this->db->insert('mitems', $data);
    }

    public function edit_data()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'uomid' => $this->input->post('uomid'),
            'itemsgroupid' => $this->input->post('itemsgroupid'),
            'hargabeli' => $this->input->post('hargabeli'),
            'hargajual' => $this->input->post('hargajual'),
            'hargabeliterakhir' => $this->input->post('hargabeli'),
        );
        $this->db->where('itemsid', $this->input->post('itemsid'));
        $this->db->update('mitems', $data);
    }
    public function edit_harga_terbaru($id, $harga)
    {
        $data = array(
            'hargabeliterakhir' => $harga,
        );
        $this->db->where('itemsid', $id);
        $this->db->update('mitems', $data);
    }

    public function hapus_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getbyid($id)
    {
        return $this->db->get_where('mitems', array('itemsid' => $id))->result_array();
    }
    public function getbygroup($id)
    {
        return $this->db->get_where('mitems', array('itemsgroupid' => $id))->result_array();
    }
    public function hpp($id)
    {
        return $this->db->get_where('mitems', array('itemsid' => $id))->row_array();
    }
}
