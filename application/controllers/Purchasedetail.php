<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchasedetail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('purchasedetail_model');
        $this->load->model('items_model');
        $this->load->model('uom_model');

        if (!$this->session->userdata('userid')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = "purchasedetail";
        $data['purchasedetail'] = $this->purchasedetail_model->get_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('purchasedetail/index', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {
        $data['title'] = 'purchasedetail';
        $data['subtitle'] = 'Add purchasedetail';
        $data['uom'] = $this->uom_model->get_data();
        $data['items'] = $this->items_model->get_data();

        $this->form_validation->set_rules('poid', 'poid', 'required');
        $this->form_validation->set_rules('itemsid', 'itemsid', 'required');
        $this->form_validation->set_rules('quantity', 'quantity', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('uomid', 'uomid', 'required');


        if ($this->form_validation->run() === FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('purchasedetail/addView', $data);
            $this->load->view('templates/footer');
        } else {

            $this->purchasedetail_model->add_data();
            $this->session->set_flashdata('message', 'Penambahan items berhasil');
            redirect('purchasedetail');
        }
    }

    function edit($id, $itemsid)
    {
        $data['title'] = 'purchasedetail';
        $data['subtitle'] = 'Add purchasedetail';
        $data['uom'] = $this->uom_model->get_data();
        $data['items'] = $this->items_model->get_data();

        $data['purchasedetail'] = $this->purchasedetail_model->getbyid($id, $itemsid);


        $this->form_validation->set_rules('poid', 'poid', 'required');
        $this->form_validation->set_rules('itemsid', 'itemsid', 'required');
        $this->form_validation->set_rules('quantity', 'quantity', 'required');
        $this->form_validation->set_rules('price', 'price', 'required');
        $this->form_validation->set_rules('uomid', 'uomid', 'required');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('purchasedetail/editView', $data);
            $this->load->view('templates/footer');
        } else {

            $this->purchasedetail_model->edit_data();
            $this->session->set_flashdata('message', 'Penambahan podetail berhasil');
            redirect('purchasedetail');
        }
    }

    function delete($id, $itemsid)
    {
        $where = array('poid' => rawurldecode($id), 'itemsid' => rawurldecode($itemsid));
        $this->purchasedetail_model->hapus_data('podetail', $where);
        $this->session->set_flashdata('message', 'Penghapusan purchasedetail ' . $id . ' Berhasil');
        redirect('purchasedetail');
    }
}
