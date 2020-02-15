<?php

class Production_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
    }

    function get_data()
    {

        $query = $this->db->get('pro');
        return $query->result_array();
    }

    public function add_data($id)
    {
        $hpp = $this->hpp($this->input->post('itemsid'));
        $data = array(
            'proid' => $id,
            'tglbuat' => $this->input->post('tglbuat'),
            'createby' => $this->session->userdata('userid'),
            'itemsid' => $this->input->post('itemsid'),
            'note' => $this->input->post('note'),
            'quantity' => $this->input->post('quantity'),
            'uomid' => $this->input->post('uomid'),
            'price' => $hpp,

        );
        $this->db->insert('pro', $data);
    }

    public function hpp($id)
    {
        $hpp = $this->db->query("SELECT hargabeliterakhir FROM mitems WHERE itemsid='" . $id . "'")->row_array();

        return $hpp['hargabeliterakhir'];
    }


    public function edit_data($id)
    {
        $hpp = $this->hpp($this->input->post('itemsid'));
        $data = array(
            'tglbuat' => $this->input->post('tglbuat'),
            'createby' => $this->session->userdata('userid'),
            'itemsid' => $this->input->post('itemsid'),
            'note' => $this->input->post('note'),
            'quantity' => $this->input->post('quantity'),
            'uomid' => $this->input->post('uomid'),
            'price' => $hpp,

        );
        $this->db->where('proid', $id);
        $this->db->update('pro', $data);
    }


    public function hapus_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getbyid($id)
    {
        return $this->db->get_where('pro', array('proid' => $id))->result_array();
    }
    public function getbyiddetail($id)
    {
        return $this->db->get_where('prodetail', array('proid' => $id))->result_array();
    }

    //utk detail
    public function adddetail($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function deldetail($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
