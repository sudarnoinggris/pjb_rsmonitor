<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('userid')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['title'] = "Dashboard";
        //$data['user'] = $this->db->get_where('user', ['userid' => $this->session->userdata('userid')])->row_array();
        $data['penjualan'] = $this->db->query("SELECT SUM(total) total,date_format(tglbayar,'%M') bulan FROM so
        INNER JOIN sodetail ON so.soid=sodetail.soid
        WHERE YEAR(tglbayar)=YEAR(NOW())
        GROUP BY MONTH(tglbayar)")->result_array();

        $data['grossProfit'] = $this->db->query("SELECT SUM(((price-(price*discount/100))-hpp)*quantity) total,date_format(tglbayar,'%M') bulan FROM so
        INNER JOIN sodetail ON so.soid=sodetail.soid
        WHERE YEAR(tglbayar)=YEAR(NOW())
        GROUP BY MONTH(tglbayar)")->result_array();

        $data['supplierPending'] = $this->db->query("SELECT SUM(total) total FROM po
        INNER JOIN podetail ON po.poid=podetail.poid
        WHERE po.`status`=0")->row_array();
        $data['customerPending'] = $this->db->query("SELECT SUM(total) total FROM so
        INNER JOIN sodetail ON so.soid=sodetail.soid
        WHERE so.`status`=0")->row_array();

        //$data['penjualan'] = $this->db->get(true)->result_array();
        //$data['bulan'] = "";
        //$data['penjualan'] = "";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }
}
