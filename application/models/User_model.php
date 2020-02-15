<?php

class User_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
    }

    function get_data()
    {

        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function add_data()
    {
        $data = array(
            'userid' => $this->input->post('userid'),
            'name' => $this->input->post('name'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'telp' => $this->input->post('telp'),
            'alamat' => $this->input->post('alamat'),
            'level' => $this->input->post('level'),
            'is_active' => $this->input->post('is_active'),
            'image' => $this->input->post('image'),
            'tglbuat' => $this->input->post('tglbuat'),

        );
        $this->db->insert('user', $data);
    }

    public function edit_data()
    {
        $data = array(

            'name' => $this->input->post('name'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email'),
            'telp' => $this->input->post('telp'),
            'alamat' => $this->input->post('alamat'),
            'level' => $this->input->post('level'),
            'is_active' => $this->input->post('is_active'),
            'image' => $this->input->post('image'),
            'tglbuat' => $this->input->post('tglbuat'),

        );
        $this->db->where('userid', $this->input->post('userid'));
        $this->db->update('user', $data);
    }


    public function hapus_data($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getbyid($id)
    {
        return $this->db->get_where('user', array('userid' => $id))->result_array();
    }
}
