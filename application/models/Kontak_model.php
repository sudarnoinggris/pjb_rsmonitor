<?php

class Kontak_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
    }

    function get_data()
    {
        $query = $this->db->get('mkontak');
        return $query->result_array();
    }

    public function add_data()
    {
        $checkCust = $this->input->post('cust') ? true : false;
        $checkSupp = $this->input->post('supp') ? true : false;

        $data = array(
            'kontakid' => $this->input->post('kontakid'),
            'name' => $this->input->post('name'),
            'alamat' => $this->input->post('alamat'),
            'person' => $this->input->post('person'),
            'note' => $this->input->post('note'),
            'telp' => $this->input->post('telp'),
            'cust' => $checkCust,
            'supp' => $checkSupp,

        );
        $this->db->insert('mkontak', $data);
    }

    public function edit_data()
    {
        $checkCust = $this->input->post('cust') ? true : false;
        $checkSupp = $this->input->post('supp') ? true : false;


        $data = array(
            'name' => $this->input->post('name'),
            'alamat' => $this->input->post('alamat'),
            'person' => $this->input->post('person'),
            'note' => $this->input->post('note'),
            'telp' => $this->input->post('telp'),
            'cust' => $checkCust,
            'supp' => $checkSupp,
        );
        $this->db->where('kontakid', $this->input->post('kontakid'));
        $this->db->update('mkontak', $data);
    }


    public function hapus_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getbyid($id)
    {
        return $this->db->get_where('mkontak', array('kontakid' => $id))->result_array();
    }
}
