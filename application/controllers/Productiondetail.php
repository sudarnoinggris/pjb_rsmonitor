<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productiondetail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('productiondetail_model');
        $this->load->model('items_model');
        $this->load->model('uom_model');

        if (!$this->session->userdata('userid')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = "productiondetail";
        $data['productiondetail'] = $this->productiondetail_model->get_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('productiondetail/index', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {
        $data['title'] = 'productiondetail';
        $data['subtitle'] = 'Add productiondetail';
        $data['uom'] = $this->uom_model->get_data();
        $data['items'] = $this->items_model->get_data();

        $this->form_validation->set_rules('proid', 'proid', 'required');
        $this->form_validation->set_rules('itemsid', 'itemsid', 'required');
        $this->form_validation->set_rules('quantity', 'quantity', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('uomid', 'uomid', 'required');


        if ($this->form_validation->run() === FALSE) {


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('productiondetail/addView', $data);
            $this->load->view('templates/footer');
        } else {

            $this->productiondetail_model->add_data();
            $this->session->set_flashdata('message', 'Penambahan items berhasil');
            redirect('productiondetail');
        }
    }
    public function adddetail()
    {
        $data['title'] = 'Production';
        $data['subtitle'] = 'Edit Production';
        $this->form_validation->set_rules('proid1', 'proid1', 'required');
        $this->form_validation->set_rules('itemsid', 'itemsid', 'required');

        if ($this->form_validation->run() === FALSE) {


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('production/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('proid1');
            $this->productiondetail_model->add_data();
            $this->session->set_flashdata('message', 'Penambahan items berhasil');
            redirect('production/edit/' . $id);
        }
    }
    function edit($id, $itemsid)
    {
        $data['title'] = 'productiondetail';
        $data['subtitle'] = 'Add productiondetail';
        $data['uom'] = $this->uom_model->get_data();
        $data['items'] = $this->items_model->get_data();

        $data['productiondetail'] = $this->productiondetail_model->getbyid($id, $itemsid);


        $this->form_validation->set_rules('proid', 'proid', 'required');
        $this->form_validation->set_rules('itemsid', 'itemsid', 'required');
        $this->form_validation->set_rules('quantity', 'quantity', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('uomid', 'uomid', 'required');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('productiondetail/editView', $data);
            $this->load->view('templates/footer');
        } else {

            $this->productiondetail_model->edit_data();
            $this->session->set_flashdata('message', 'Penambahan podetail berhasil');
            redirect('productiondetail');
        }
    }

    function delete($id, $itemsid)
    {
        $where = array('proid' => rawurldecode($id), 'itemsid' => rawurldecode($itemsid));
        $this->productiondetail_model->hapus_data('prodetail', $where);
        $this->session->set_flashdata('message', 'Penghapusan productiondetail ' . $id . ' Berhasil');
        redirect('productiondetail');
    }
}
