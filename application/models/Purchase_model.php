<?php

class Purchase_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
    }

    function get_data()
    {
        $this->db->from('po');
        $this->db->order_by('tglbuat', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }


    public function add_data($id)
    {
        $data = array(
            'poid' => $id,
            'tglbuat' => $this->input->post('tglbuat'),
            'tglbayar' => $this->input->post('tglbayar'),
            'createby' => $this->session->userdata('userid'),
            'note' => $this->input->post('note'),
            'kontakid' => $this->input->post('kontakid'),
            'status' => intval($this->input->post('status')),
            'nopol' => $this->input->post('nopol'),
            'noreff' => $this->input->post('noreff'),

        );
        $this->db->insert('po', $data);
    }

    public function edit_data($id)
    {
        $data = array(

            'tglbuat' => $this->input->post('tglbuat'),
            'tglbayar' => $this->input->post('tglbayar'),
            'createby' => $this->session->userdata('userid'),
            'note' => $this->input->post('note'),
            'kontakid' => $this->input->post('kontakid'),
            'status' => intval($this->input->post('status')),
            'nopol' => $this->input->post('nopol'),
            'noreff' => $this->input->post('noreff'),

        );
        $this->db->where('poid', $id);
        $this->db->update('po', $data);
    }


    public function hapus_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getbyid($id)
    {
        return $this->db->get_where('po', array('poid' => $id))->result_array();
    }
    public function getbyiddetail($id)
    {
        return $this->db->get_where('podetail', array('poid' => $id))->result_array();
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
