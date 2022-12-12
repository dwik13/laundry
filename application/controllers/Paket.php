<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
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
        $isi['paket'] = $this->db->get('paket')->result_array();
        $isi['content'] = 'dashboard/paket/v_paket';
        $isi['title'] = "Data Paket";
        $this->load->view('dashboard/dashboard', $isi);
    }

    public function tambah()
    {
        $isi['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $isi['content'] = 'dashboard/paket/t_paket';
        $isi['title'] = 'Tambah Paket';
        $isi['kode_paket'] =  $this->m_dashboard->generate_kode_paket();
        $this->load->view('dashboard/dashboard', $isi);
    }

    public function simpan()
    {
        $data = array(
            'kode_paket' => $this->input->post('kode_paket'),
            'nama_paket' => $this->input->post('nama_paket'),
            'harga_paket' => $this->input->post('harga_paket'),
        );
        $query = $this->db->insert('paket', $data);
        if ($query == true) {
            $this->session->set_flashdata('info', '  Data paket berhasil ditambahkan');
            redirect('paket');
        }
    }

    public function edit($id)
    {
        $isi['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $isi['paket'] = $this->db->get_where('paket', ['kode_paket' => $id])->row_array();
        $isi['content'] = 'dashboard/paket/e_paket';
        $isi['title'] = 'Edit Paket';
        $this->load->view('dashboard/dashboard', $isi);
    }

    public function ubah()
    {
        $this->form_validation->set_rules('nama_paket', 'Nama_paket', 'required');
        $this->form_validation->set_rules('harga_paket', 'Harga_paket', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata(
                'info',
                'Change Failed'
            );
            redirect('paket');
        } else {
            $data = array(
                'nama_paket'     =>  $_POST['nama_paket'],
                'harga_paket'   => $_POST['harga_paket'],
            );

            $this->db->where('kode_paket', $_POST['id']);
            $query = $this->db->update('paket', $data);
            if ($query == true) {
                $this->session->set_flashdata(
                    'info',
                    'Data paket berhasil diedit'
                );
                redirect('paket');
            }
        }
    }

    public function hapus($kode_paket)
    {
        $this->db->where('kode_paket', $kode_paket);
        $isi = $this->db->delete('paket');
        if ($isi == true) {
            $this->session->set_flashdata(
                'info',
                'data paket berhasil di Delete'
            );
            redirect('paket');
        }
    }
}
