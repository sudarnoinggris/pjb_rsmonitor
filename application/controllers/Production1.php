<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Production extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('production_model');
        $this->load->model('productiondetail_model');
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
            // 'quantity' => $this->input->post('quantity'),
            //'price' => $this->input->post('price'),
            //'uomid' => $this->input->post('uomid'),
            //'total' => $total,

        );
        $this->purchase_model->adddetail('prodetail', $data);
    }
    public function adddetaillama()
    {

        $data = array(
            'proid' => $this->input->post('proid1'),
            'itemsid' => $this->input->post('itemsid'),
        );

        $this->production_model->adddetail('prodetail', $data);

        $output = '<table id="dataTable" class="table table-hover table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">PRO ID</th>
                        <th scope="col">Items</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                ';
        $data['productiondetail'] = $this->productiondetail_model->getbyiddetail($this->input->post('proid1'));
        foreach ($data['productiondetail'] as $data) {
            $proid = $this->input->post('proid1');
            $itemsid = $this->input->post('itemsid');
            $output .= '<tr>
                    <td>' . $data['proid'] . '</td>
                    <td>' . $data['itemsid'] . '</td>
                    <td>
                        <a href="" class="hapus-row btn btn-sm btn-danger" >delete</a>
                    </td>
                </tr>
                ';
        }
        $output .= '
                 </tbody>
                </table>';
        echo $output;
    }
    function delete($id)
    {
        $where = array('proid' => rawurldecode($id));
        $this->production_model->hapus_data('pro', $where);
        $this->session->set_flashdata('message', 'Penghapusan production ' . $id . ' Berhasil');
        redirect('production');
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

    public function deldetail($id, $itemsid)
    {
        $where = array('proid' => rawurldecode($id), 'itemsid' => rawurldecode($itemsid));
        $this->production_model->deldetail('prodetail', $where);
        //$this->session->set_flashdata('message', 'Penghapusan purchasedetail ' . $id . ' Berhasil');

        redirect('production/edit/' . $id);
    }
    public function pdf($id)
    {

        $this->load->library('pdf');
        $data['title'] = "Production";
        $data['production'] = $this->production_model->getbyid($id);
        $data['productiondetail'] = $this->production_model->getbyiddetail($id);
        //$data['purchase'] = $this->purchase_model->print_po($id);

        $this->load->view('production/print', $data);
        // $pdf->setPaper(array(0,0,500,400), 'portrait');
        //$paper_size = 'A4';


        //$paper_size = array(0, 0, 400, 500);
        /*
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
        */
    }
}
