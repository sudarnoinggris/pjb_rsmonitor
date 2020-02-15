<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kontak_model');
        if (!$this->session->userdata('userid')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = "Kontak";
        $data['kontak'] = $this->kontak_model->get_data();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kontak/index', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {

        $data['title'] = 'Kontak';
        $data['subtitle'] = 'Add Kontak';

        $this->form_validation->set_rules('kontakid', 'kontakid', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kontak/addView', $data);
            $this->load->view('templates/footer');
        } else {

            $this->kontak_model->add_data();
            $this->session->set_flashdata('message', 'Penambahan kontak berhasil');
            redirect('kontak');
        }
    }
    function edit($id)
    {
        $data['title'] = 'Kontak';
        $data['subtitle'] = 'Edit Kontak';
        $data['kontak'] = $this->kontak_model->getbyid($id);

        $this->form_validation->set_rules('kontakid', 'kontakid', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kontak/editView', $data);
            $this->load->view('templates/footer');
        } else {

            $this->kontak_model->edit_data();
            $this->session->set_flashdata('message', 'Edit Data berhasil');
            redirect('kontak');
        }
    }

    function delete($id)
    {
        $where = array('kontakid' => rawurldecode($id));
        $this->kontak_model->hapus_data('mkontak', $where);
        $this->session->set_flashdata('message', 'Penghapusan kontak' . $id . ' Berhasil');
        redirect('kontak');
    }
}
