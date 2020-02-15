<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Items extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('items_model');
        $this->load->model('uom_model');
        $this->load->model('category_model');
        if (!$this->session->userdata('userid')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = "Items";

        $data['items'] = $this->items_model->get_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('items/index', $data);
        $this->load->view('templates/footer');
    }


    public function add()
    {
        //$this->load->library('form_validation'); // diautoload
        $data['title'] = 'Items';
        $data['subtitle'] = 'Add Items';
        $data['uom'] = $this->uom_model->get_data();
        $data['category'] = $this->category_model->get_data();
        $this->form_validation->set_rules('itemsid', 'itemsid', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('items/addView', $data);
            $this->load->view('templates/footer');
        } else {

            $this->items_model->add_data();
            $this->session->set_flashdata('message', 'Penambahan items berhasil');
            redirect('items');
        }
    }
    public function edit($id)
    {
        $data['title'] = 'Items';
        $data['subtitle'] = 'Edit Items';
        $data['items'] = $this->items_model->getbyid($id);
        $data['uom'] = $this->uom_model->get_data();
        $data['category'] = $this->category_model->get_data();
        $this->form_validation->set_rules('itemsid', 'itemsid', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('items/editView', $data);
            $this->load->view('templates/footer');
        } else {

            $this->items_model->edit_data();
            $this->session->set_flashdata('message', 'Edit Data berhasil');
            redirect('items');
        }
    }

    public function delete($id)
    {
        $where = array('itemsid' => rawurldecode($id));
        $this->items_model->hapus_data('mitems', $where);
        $this->session->set_flashdata('message', 'Penghapusan items' . $id . ' Berhasil');
        redirect('items');
    }

    public function pdf()
    {



        $this->load->library('pdf');
        $data['title'] = "Items";
        $data['items'] = $this->items_model->get_data();

        $this->load->view('items/print', $data);


        // $pdf->setPaper(array(0,0,500,400), 'portrait');
        $paper_size = array(0, 0, 200, 400);
        //$paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('items.pdf', array('Attachment' => 0));
    }
}
