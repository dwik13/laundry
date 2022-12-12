<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek_laundry extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dashboard');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $kode_transaksi = $this->input->post('kode_transaksi');
        $isi['data'] = $this->m_dashboard->cek_status($kode_transaksi);
        $isi['slider'] = $this->db->get('slider')->result();
        $this->load->view('templates/header', $isi);
        $this->load->view('templates/cek_laundry', $isi);
        $this->load->view('templates/footer');
    }
}
