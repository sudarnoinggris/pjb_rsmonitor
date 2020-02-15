<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sales_model');
        $this->load->model('kontak_model');
        $this->load->model('items_model');
        $this->load->model('uom_model');

        if (!$this->session->userdata('userid')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = "Sales";
        $data['sales'] = $this->sales_model->get_data();
        $data['status'] = $this->sales_model->getall('status');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('sales/index', $data);
        $this->load->view('templates/footer');
    }


    public function edit($id)
    {
        $data['title'] = 'Sales';
        $data['subtitle'] = 'Edit Sales';

        $data['sales'] = $this->sales_model->getbyid($id);
        $data['salesdetail'] = $this->sales_model->getbyiddetail($id);
        $data['kontak'] = $this->kontak_model->get_data();
        $data['items'] = $this->items_model->get_data();
        $data['uom'] = $this->uom_model->get_data();
        $data['status'] = $this->sales_model->getall('status');


        $this->form_validation->set_rules('tglbuat', 'tglbuat', 'required');
        $this->form_validation->set_rules('tglbayar', 'tglbayar', 'required');


        if ($this->form_validation->run() === FALSE) {
            //var_dump('tes valisasi');
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sales/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $this->sales_model->edit_data($id);
            $this->session->set_flashdata('message', 'Edit Sales berhasil');
            redirect('sales/edit/' . $id);
        }
    }

    public function delete($id)
    {
        $where = array('soid' => rawurldecode($id));
        $this->sales_model->hapus_data('so', $where);
        $this->session->set_flashdata('message', 'Penghapusan sales ' . $id . ' Berhasil');
        redirect('sales');
    }

    public function detail($id)
    {
        $this->load->model('sodetail');

        $data['title'] = 'Sales';
        $data['subtitle'] = 'Add Sales';

        $data['sales'] = $this->sales_model->getbyid($id);
    }

    public function create()
    {
        //master //

        $data['title'] = 'Sales';
        $data['subtitle'] = 'Add Sales';
        $data['kontak'] = $this->kontak_model->get_data();
        $data['status'] = $this->sales_model->getall('status');

        $this->form_validation->set_rules('tglbuat', 'tglbuat', 'required');
        $this->form_validation->set_rules('tglbayar', 'tglbayar', 'required');
        $this->form_validation->set_rules('kontakid', 'kontakid', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('sales/create', $data);
            $this->load->view('templates/footer');
        } else {
            //sukses master
            $this->load->library('dbkeygenerator');
            $soid = $this->dbkeygenerator->getNewKey("so", "soid", "SO");
            //$soid = uniqid();
            $this->sales_model->add_data($soid);
            //$this->session->set_flashdata('message', 'Penambahan sales berhasil');
            redirect('sales/edit/' . $soid);
        }
    }
    // add items

    public function adddetail()
    {
        $price = floatval($this->input->post('price'));
        $quantity = floatval($this->input->post('quantity'));
        //$discount = floatval($this->input->post('quantity'));
        $total = $price * $quantity;
        $hpp = $this->items_model->hpp($this->input->post('itemsid'));
        $test = $hpp['hargabeliterakhir'];

        $data = array(
            'soid' => $this->input->post('soid1'),
            'itemsid' => $this->input->post('itemsid'),
            'quantity' => $this->input->post('quantity'),
            'price' => $this->input->post('price'),
            'hpp' => $test,
            'uomid' => $this->input->post('uomid'),
            'total' => $total,
        );
        $this->sales_model->adddetail('sodetail', $data);
    }

    public function deldetail($id, $itemsid)
    {
        $where = array('soid' => rawurldecode($id), 'itemsid' => rawurldecode($itemsid));
        $this->sales_model->deldetail('sodetail', $where);
        //$this->session->set_flashdata('message', 'Penghapusan salesdetail ' . $id . ' Berhasil');

        redirect('sales/edit/' . $id);
    }
    public function pdf($id)
    {

        $this->load->library('pdf');
        $data['title'] = "Sales";
        $data['salesdetail'] = $this->sales_model->getbyiddetail($id);
        $data['sales'] = $this->sales_model->getbyid($id);

        $this->load->view('sales/print', $data);
        // $pdf->setPaper(array(0,0,500,400), 'portrait');
        //$paper_size = 'A4';
        /*
        $paper_size = array(0, 0, 500, 400);
       
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('items.pdf', array('Attachment' => 0));
        */
    }
}
