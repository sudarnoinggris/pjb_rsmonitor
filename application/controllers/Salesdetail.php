<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Salesdetail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('salesdetail_model');
        $this->load->model('items_model');
        $this->load->model('uom_model');

        if (!$this->session->userdata('userid')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = "salesdetail";
        $data['salesdetail'] = $this->salesdetail_model->get_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('salesdetail/index', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {
        $data['title'] = 'salesdetail';
        $data['subtitle'] = 'Add salesdetail';
        $data['uom'] = $this->uom_model->get_data();
        $data['items'] = $this->items_model->get_data();

        $this->form_validation->set_rules('soid', 'soid', 'required');
        $this->form_validation->set_rules('itemsid', 'itemsid', 'required');
        $this->form_validation->set_rules('quantity', 'quantity', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('uomid', 'uomid', 'required');


        if ($this->form_validation->run() === FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('salesdetail/addView', $data);
            $this->load->view('templates/footer');
        } else {

            $this->salesdetail_model->add_data();
            $this->session->set_flashdata('message', 'Penambahan items berhasil');
            redirect('salesdetail');
        }
    }

    function edit($id, $itemsid)
    {
        $data['title'] = 'salesdetail';
        $data['subtitle'] = 'Add salesdetail';
        $data['uom'] = $this->uom_model->get_data();
        $data['items'] = $this->items_model->get_data();

        $data['salesdetail'] = $this->salesdetail_model->getbyid($id, $itemsid);


        $this->form_validation->set_rules('soid', 'soid', 'required');
        $this->form_validation->set_rules('itemsid', 'itemsid', 'required');
        $this->form_validation->set_rules('quantity', 'quantity', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('uomid', 'uomid', 'required');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('salesdetail/editView', $data);
            $this->load->view('templates/footer');
        } else {

            $this->salesdetail_model->edit_data();
            $this->session->set_flashdata('message', 'Penambahan sodetail berhasil');
            redirect('salesdetail');
        }
    }

    function delete($id, $itemsid)
    {
        $where = array('soid' => rawurldecode($id), 'itemsid' => rawurldecode($itemsid));
        $this->salesdetail_model->hapus_data('sodetail', $where);
        $this->session->set_flashdata('message', 'Penghapusan salesdetail ' . $id . ' Berhasil');
        redirect('salesdetail');
    }
}
