<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uom extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('uom_model');
        if (!$this->session->userdata('userid')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = "Satuan";
        $data['user'] = $this->db->get_where('user', ['userid' => $this->session->userdata('userid')])->row_array();
        $data['uom'] = $this->uom_model->get_data();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('uom/index', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {
        $data['title'] = 'Satuan';
        $data['subtitle'] = 'Add Satuan';

        $this->form_validation->set_rules('uomid', 'uomid', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('uom/addView', $data);
            $this->load->view('templates/footer');
        } else {

            $this->uom_model->add_data();
            $this->session->set_flashdata('message', 'Penambahan items berhasil');
            redirect('uom');
        }
    }

    function edit($id)
    {
        $data['title'] = 'Satuan';
        $data['subtitle'] = 'Edit Satuan';
        $data['uom'] = $this->uom_model->getbyid($id);
        $this->form_validation->set_rules('uomid', 'uomid', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('uom/editView', $data);
            $this->load->view('templates/footer');
        } else {

            $this->uom_model->edit_data();
            $this->session->set_flashdata('message', 'Penambahan items berhasil');
            redirect('uom');
        }
    }

    function delete($id)
    {
        $where = array('uomid' => rawurldecode($id));
        $this->uom_model->hapus_data('muom', $where);
        $this->session->set_flashdata('message', 'Penghapusan Satuan ' . $id . ' Berhasil');
        redirect('uom');
    }
}
