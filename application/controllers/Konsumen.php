<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsumen extends CI_Controller
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
        // bagian untuk menampilkan profil
        $isi['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        //data
        $isi['content'] = 'dashboard/konsumen/v_konsumen';
        $isi['title'] = 'Data Konsumen';

        //ambil data pada dabase
        $isi['konsumen'] = $this->db->get('konsumen')->result_array();
        $this->load->view('dashboard/dashboard', $isi);
    }

    public function tambah()
    {
        $isi['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $isi['content'] = 'dashboard/konsumen/t_konsumen';
        $isi['title'] = 'Tambah Konsumen';
        $isi['kode_konsumen'] =  $this->m_dashboard->generate_kode_konsumen();
        $this->load->view('dashboard/dashboard', $isi);
    }

    public function simpan()
    {

        $data = array(
            'kode_konsumen' => $this->input->post('kode_konsumen'),
            'nama_konsumen' => $this->input->post('nama_konsumen'),
            'alamat_konsumen' => $this->input->post('alamat_konsumen'),
            'no_telp' => $this->input->post('no_telp')
        );
        $query = $this->db->insert('konsumen', $data);
        if ($query == true) {
            $this->session->set_flashdata('info', '  Data konsumen berhasil ditambahkan');
            redirect('konsumen');
        }
    }

    public function edit($id)
    {
        $isi['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $isi['konsumen'] = $this->db->get_where('konsumen', ['kode_konsumen' => $id])->row_array();
        $isi['content'] = 'dashboard/konsumen/e_konsumen';
        $isi['title'] = 'Edit Konsumen';
        $this->load->view('dashboard/dashboard', $isi);
    }

    public function ubah()
    {
        $this->form_validation->set_rules('nama_konsumen', 'Nama_konsumen', 'required');
        $this->form_validation->set_rules('alamat_konsumen', 'Alamat_konsumen', 'required');
        $this->form_validation->set_rules('no_telp', 'No_telp', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'info',
                'Change Failed'
            );
            redirect('konsumen');
        } else {
            $data = array(
                'nama_konsumen'     =>  $_POST['nama_konsumen'],
                'alamat_konsumen'   => $_POST['alamat_konsumen'],
                'no_telp'       =>  $_POST['no_telp'],
            );

            $this->db->where('kode_konsumen', $_POST['id']);
            $query = $this->db->update('konsumen', $data);
            if ($query == true) {
                $this->session->set_flashdata(
                    'info',
                    'Data konsumen berhasil diedit'
                );
                redirect('konsumen');
            }
        }
    }

    public function hapus($kode_konsumen)
    {
        $this->db->where('kode_konsumen', $kode_konsumen);
        $isi = $this->db->delete('konsumen');
        if ($isi == true) {
            $this->session->set_flashdata(
                'info',
                'data konsumen berhasil di Delete'
            );
            redirect('konsumen');
        }
    }
}
