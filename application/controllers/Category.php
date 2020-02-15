<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        if (!$this->session->userdata('userid')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = "Category";
        $data['category'] = $this->category_model->get_data();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('category/index', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {
        $data['title'] = 'Category';
        $data['subtitle'] = 'Add Category';

        $this->form_validation->set_rules('itemsgroupid', 'itemsgroupid', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('category/addView', $data);
            $this->load->view('templates/footer');
        } else {

            $this->category_model->add_data();
            $this->session->set_flashdata('message', 'Penambahan items berhasil');
            redirect('category');
        }
    }

    function edit($id)
    {
        $data['title'] = 'Category';
        $data['subtitle'] = 'Edit Category';
        $data['category'] = $this->category_model->getbyid($id);
        $this->form_validation->set_rules('itemsgroupid', 'itemsgroupid', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('category/editView', $data);
            $this->load->view('templates/footer');
        } else {

            $this->category_model->edit_data();
            $this->session->set_flashdata('message', 'Penambahan items berhasil');
            redirect('category');
        }
    }

    function delete($id)
    {
        $where = array('itemsgroupid' => rawurldecode($id));
        $this->category_model->hapus_data('mitemsgroup', $where);
        $this->session->set_flashdata('message', 'Penghapusan Category ' . $id . ' Berhasil');
        redirect('category');
    }
}
