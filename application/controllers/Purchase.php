<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('purchase_model');
        $this->load->model('kontak_model');
        $this->load->model('items_model');
        $this->load->model('uom_model');

        if (!$this->session->userdata('userid')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = "Purchase";
        $data['purchase'] = $this->purchase_model->get_data();
        $data['status'] = $this->purchase_model->getall('status');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('purchase/index', $data);
        $this->load->view('templates/footer');
    }


    public function edit($id)
    {
        $data['title'] = 'Purchase';
        $data['subtitle'] = 'Edit Purchase';

        $data['purchase'] = $this->purchase_model->getbyid($id);
        $data['purchasedetail'] = $this->purchase_model->getbyiddetail($id);
        $data['kontak'] = $this->kontak_model->get_data();
        $data['items'] = $this->items_model->get_data();
        $data['uom'] = $this->uom_model->get_data();
        $data['status'] = $this->purchase_model->getall('status');



        $this->form_validation->set_rules('tglbuat', 'tglbuat', 'required');
        $this->form_validation->set_rules('tglbayar', 'tglbayar', 'required');


        if ($this->form_validation->run() === FALSE) {
            //var_dump('tes valisasi');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('purchase/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $this->purchase_model->edit_data($id);
            $this->session->set_flashdata('message', 'Edit Purchase berhasil');
            redirect('purchase/edit/' . $id);
        }
    }

    public function delete($id)
    {
        $where = array('poid' => rawurldecode($id));
        $this->purchase_model->hapus_data('po', $where);
        $this->session->set_flashdata('message', 'Penghapusan purchase ' . $id . ' Berhasil');
        redirect('purchase');
    }

    public function detail($id)
    {
        $this->load->model('podetail');

        $data['title'] = 'Purchase';
        $data['subtitle'] = 'Add Purchase';

        $data['purchase'] = $this->purchase_model->getbyid($id);
    }

    public function create()
    {
        //master //

        $data['title'] = 'Purchase';
        $data['subtitle'] = 'Add Purchase';
        $data['kontak'] = $this->kontak_model->get_data();
        $data['status'] = $this->purchase_model->getall('status');

        // $this->form_validation->set_rules('poid', 'poid', 'required');
        $this->form_validation->set_rules('tglbuat', 'tglbuat', 'required');
        $this->form_validation->set_rules('tglbayar', 'tglbayar', 'required');
        $this->form_validation->set_rules('kontakid', 'kontakid', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('purchase/create', $data);
            $this->load->view('templates/footer');
        } else {
            //sukses master
            $this->load->library('dbkeygenerator');
            $poid = $this->dbkeygenerator->getNewKey("po", "poid", "PO");

            $this->purchase_model->add_data($poid);
            $this->session->set_flashdata('message', 'Penambahan purchase berhasil');
            redirect('purchase/edit/' . $poid);
        }
    }
    // add items
    public function adddetail()
    {

        $price = floatval($this->input->post('price'));
        $quantity = floatval($this->input->post('quantity'));
        //$discount = floatval($this->input->post('quantity'));
        $total = $price * $quantity;

        $data = array(
            'poid' => $this->input->post('poid1'),
            'itemsid' => $this->input->post('itemsid'),
            'quantity' => $this->input->post('quantity'),
            'price' => $this->input->post('price'),
            'uomid' => $this->input->post('uomid'),
            'total' => $total,

        );
        $this->purchase_model->adddetail('podetail', $data);
        //update harga terakhir
        $itemsid = $this->input->post('itemsid');
        $dataitem = $this->input->post('price');
        $this->items_model->edit_harga_terbaru($itemsid, $dataitem);
    }

    public function deldetail($id, $itemsid)
    {
        $where = array('poid' => rawurldecode($id), 'itemsid' => rawurldecode($itemsid));
        $this->purchase_model->deldetail('podetail', $where);
        //$this->session->set_flashdata('message', 'Penghapusan purchasedetail ' . $id . ' Berhasil');

        redirect('purchase/edit/' . $id);
    }
    public function pdf($id)
    {

        $this->load->library('pdf');
        $data['title'] = "Purchase";
        $data['purchase'] = $this->purchase_model->getbyid($id);
        $data['purchasedetail'] = $this->purchase_model->getbyiddetail($id);
        //$data['purchase'] = $this->purchase_model->print_po($id);

        $this->load->view('purchase/print', $data);
        // $pdf->setPaper(array(0,0,500,400), 'portrait');
        //$paper_size = 'A4';


        //$paper_size = array(0, 0, 400, 500);

        $paper_size = 'A4';
        $orientation = 'portrait';
        $html = $this->output->get_output();
        $options = $this->dompdf->getOptions();
        $options->set(array('isRemoteEnabled' => true));
        $this->dompdf->setOptions($options);
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('pembelian.pdf', array('Attachment' => 0));
    }
}
