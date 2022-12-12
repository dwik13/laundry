<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_dashboard');
        $this->load->helper('tgl_indo_helper');
    }

    public function index()
    {
        $isi['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $isi['content'] = 'dashboard/laporan/v_laporan';
        $isi['title'] = "Laporan Transaksi";
        $this->load->view('dashboard/dashboard', $isi);
    }

    public function cetak_laporan()
    {
        //load library
        $this->load->library('pdf');

        $tgl_mulai = $this->input->post('tanggal_mulai');
        $tgl_ahir = $this->input->post('tanggal_ahir');

        //load model dashboard
        $isi['laporan'] =  $this->m_dashboard->filter_laporan($tgl_mulai, $tgl_ahir);
        $isi['grandtotransaksi'] = $this->m_dashboard->grandtotransaksi($tgl_mulai, $tgl_ahir);

        $this->session->set_userdata('tanggal_mulai', $tgl_mulai);
        $this->session->set_userdata('tanggal_ahir', $tgl_ahir);

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_penjualan_toko_kita';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = $this->load->view('dashboard/laporan/cetak_laporan', $isi, true);

        // run dompdf
        $this->pdf->generate($html, $file_pdf, $paper, $orientation);
    }
}
