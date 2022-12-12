<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_dashboard');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $isi['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $isi['content'] = 'dashboard/transaksi/v_transaksi';
        $isi['title'] = "Data Transaksi";
        $isi['transaksi'] = $this->m_dashboard->getTransaksi();
        $this->load->view('dashboard/dashboard', $isi);
    }

    public function tambah()
    {
        $isi['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $isi['content'] = 'dashboard/transaksi/t_transaksi';
        $isi['title'] = "Tambah Transaksi";
        $isi['konsumen'] = $this->db->get('konsumen')->result_array();
        $isi['paket'] = $this->db->get('paket')->result_array();
        $isi['kode_transaksi'] = $this->m_dashboard->generate_kode_transaksi();
        $this->load->view('dashboard/dashboard', $isi);
    }

    public function getHargaPaket()
    {
        $kode_paket = $this->input->post('kode_paket');
        $data = $this->db->where('kode_paket', $kode_paket);
        $data = $this->db->get('paket')->row_array();
        echo json_encode($data);
    }

    public function simpan()
    {
        $data = array(
            'kode_transaksi' => $this->input->post('kode_transaksi'),
            'kode_konsumen' => $this->input->post('kode_konsumen'),
            'kode_paket' => $this->input->post('kode_paket'),
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'tgl_ambil' => $this->input->post('tgl_ambil'),
            'berat' => $this->input->post('berat'),
            'grand_total' => $this->input->post('grand_total'),
            'bayar' => $this->input->post('bayar'),
            'status' => $this->input->post('status')
        );

        $query = $this->db->insert('transaksi', $data);
        if ($query == true) {
            $this->session->set_flashdata('info', '  Data transaksi berhasil disimpan');
            redirect('transaksi');
        }
    }

    public function update_status()
    {
        $kode_transaksi = $this->input->post('kt');
        $status = $this->input->post('stt');
        $tgl_ambil = date('Y-m-d h:i:s');
        $status_bayar = 'Lunas';

        if ($status == "Baru" or $status == "Proses") {
            $this->m_dashboard->update_status($kode_transaksi, $status);
        } else {
            $this->m_dashboard->update_status1($kode_transaksi, $status, $tgl_ambil, $status_bayar);
        }
    }

    public function edit($kode_transaksi)
    {
        $isi['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $isi['transaksi'] = $this->m_dashboard->EditTransaksi($kode_transaksi);
        $isi['konsumen'] = $this->db->get('konsumen')->result_array();
        $isi['paket'] = $this->db->get('paket')->result_array();
        $isi['content'] = 'dashboard/transaksi/e_transaksi';
        $isi['title'] = "Edit Transaksi";
        $this->load->view('dashboard/dashboard', $isi);
    }

    public function ubah()
    {
        // $this->input->post('kode_transaksi');
        $data = array(
            'kode_transaksi' => $this->input->post('kode_transaksi'),
            'kode_konsumen' => $this->input->post('kode_konsumen'),
            'kode_paket' => $this->input->post('kode_paket'),
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'tgl_ambil' => '',
            'berat' => $this->input->post('berat'),
            'grand_total' => $this->input->post('grand_total'),
            'bayar' => $this->input->post('bayar'),
            'status' => $this->input->post('status')
        );
        $this->db->where('kode_transaksi', $_POST['kode_transaksi']);
        $query = $this->db->update('transaksi', $data);
        if ($query == true) {
            $this->session->set_flashdata(
                'info',
                'Data Transaksi berhasil diedit'
            );
            redirect('transaksi');
        }
    }

    public function detail($kode_transaksi)
    {
        $this->load->library('pdf');
        $isi['transaksi'] = $this->m_dashboard->detail($kode_transaksi);

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_penjualan_toko_kita';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = $this->load->view('dashboard/transaksi/detail', $isi, true);

        // run dompdf
        $this->pdf->generate($html, $file_pdf, $paper, $orientation);
    }
}
