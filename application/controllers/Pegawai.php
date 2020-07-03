<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pegawai_model');
        if (!$this->session->userdata('userid')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = "Pegawai";

        //$data['user'] = $this->user_model->get_data();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {

        $data['title'] = 'Pegawai';
        $data['subtitle'] = 'Add Pegawai';

        $this->form_validation->set_rules('userid', 'userid', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pegawai/addView', $data);
            $this->load->view('templates/footer');
        } else {

            $this->user_model->add_data();
            $this->session->set_flashdata('message', 'Penambahan user berhasil');
            redirect('user');
        }
    }
    function edit($id)
    {
        $data['title'] = 'Pegawai';
        $data['subtitle'] = 'Edit Pegawai';
        $data['user'] = $this->user_model->getbyid($id);

        $this->form_validation->set_rules('userid', 'userid', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/editView', $data);
            $this->load->view('templates/footer');
        } else {

            $this->user_model->edit_data();
            $this->session->set_flashdata('message', 'Edit Data berhasil');
            redirect('user');
        }
    }

    function delete($id)
    {
        $where = array('id' => rawurldecode($id));
        $this->user_model->hapus_data('pegawai', $where);
        $this->session->set_flashdata('message', 'Penghapusan userid ' . $id . ' Berhasil');
        redirect('user');
    }
 
}
