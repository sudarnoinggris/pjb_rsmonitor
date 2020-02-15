<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Production extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('production_model');
        $this->load->model('items_model');
        $this->load->model('uom_model');

        if (!$this->session->userdata('userid')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = "Production";
        $data['production'] = $this->production_model->get_data();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('production/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {

        $data['title'] = 'Production';
        $data['subtitle'] = 'Add Production head';
        $data['items'] = $this->items_model->get_data();
        $data['uom'] = $this->uom_model->get_data();
        $this->form_validation->set_rules('tglbuat', 'tglbuat', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('production/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->library('dbkeygenerator');
            $proid = $this->dbkeygenerator->getNewKey("pro", "proid", "PRO");

            $this->production_model->add_data($proid);
            $this->session->set_flashdata('message', 'Penambahan production berhasil');
            redirect('production/edit/' . $proid);
        }
    }


    function edit($id)
    {
        $data['title'] = 'Production';
        $data['subtitle'] = 'Edit Production';

        $data['production'] = $this->production_model->getbyid($id);
        $data['productiondetail'] = $this->production_model->getbyiddetail($id);

        $data['items'] = $this->items_model->get_data();
        $data['uom'] = $this->uom_model->get_data();


        $this->form_validation->set_rules('proid', 'proid', 'required');
        $this->form_validation->set_rules('tglbuat', 'tglbuat', 'required');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('production/edit', $data);
            $this->load->view('templates/footer');
        } else {
            // post
            $this->production_model->edit_data($id);
            $this->session->set_flashdata('message', 'Edit data Production berhasil');
            redirect('production/edit/' . $id);
        }
    }
    // add items
    public function adddetail()
    {

        //$price = floatval($this->input->post('price'));
        // $quantity = floatval($this->input->post('quantity'));

         
        // $total = $price * $quantity;

        $data = array(
            'proid' => $this->input->post('proid1'),
            'itemsid' => $this->input->post('itemsid'),
            'persen' => $this->input->post('persen'),
            'quantity' => $this->input->post('quantity'),
            'price' => $this->input->post('price'),
            'uomid' => $this->input->post('uomid'),
            //'total' => $total,


        );
        $this->production_model->adddetail('prodetail', $data);
    }

    function delete($id)
    {
        $where = array('proid' => rawurldecode($id));
        $this->production_model->hapus_data('pro', $where);
        $this->session->set_flashdata('message', 'Penghapusan production ' . $id . ' Berhasil');
        redirect('production');
    }




    public function deldetail($id, $itemsid)
    {
        $where = array('proid' => rawurldecode($id), 'itemsid' => rawurldecode($itemsid));
        $this->production_model->deldetail('prodetail', $where);
        //$this->session->set_flashdata('message', 'Penghapusan purchasedetail ' . $id . ' Berhasil');

        redirect('production/edit/' . $id);
    }
}
