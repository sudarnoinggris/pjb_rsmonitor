<?php

class Sales_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
    }

    function get_data()
    {

        $query = $this->db->get('so');
        return $query->result_array();
    }


    public function add_data($id)
    {
        $data = array(
            'soid' => $id,
            'tglbuat' => $this->input->post('tglbuat'),
            'tglbayar' => $this->input->post('tglbayar'),
            'createby' => $this->input->post('createby'),
            'note' => $this->input->post('note'),
            'kontakid' => $this->input->post('kontakid'),
            'status' => $this->input->post('status'),
            'nopol' => $this->input->post('nopol'),

        );
        $this->db->insert('so', $data);
    }

    public function edit_data($id)
    {
        $data = array(

            'tglbuat' => $this->input->post('tglbuat'),
            'tglbayar' => $this->input->post('tglbayar'),
            'createby' => $this->input->post('createby'),
            'note' => $this->input->post('note'),
            'kontakid' => $this->input->post('kontakid'),
            'status' => $this->input->post('status'),
            'nopol' => $this->input->post('nopol'),

        );
        $this->db->where('soid', $id);
        $this->db->update('so', $data);
    }


    public function hapus_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getbyid($id)
    {
        return $this->db->get_where('so', array('soid' => $id))->result_array();
    }
    public function getbyiddetail($id)
    {
        return $this->db->get_where('sodetail', array('soid' => $id))->result_array();
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

    public function getall($table)
    {
        return $this->db->get($table)->result_array();
    }
}
