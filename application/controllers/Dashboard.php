<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_dashboard');
    }

    public function index()
    {
        // $this->m_squrity->getSqurity();

        // bagian untuk menampilkan profil
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        // data
        $data['content'] = 'dashboard/home';
        $data['title'] = "Dahsboard";

        // ambil data dari database
        $data['total_konsumen'] = $this->db->get('konsumen')->num_rows();
        $data['total_transaksi'] = $this->db->get('transaksi')->num_rows();

        // model dashboard
        $data['transaksi_baru'] =  $this->m_dashboard->transaksi_baru();
        $data['grandtotrans'] =  $this->m_dashboard->grandtotrans();
        $this->load->view('dashboard/dashboard', $data);
    }
}
