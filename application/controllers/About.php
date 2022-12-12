<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $data['about'] = $this->db->get('about')->result_array();
        $data['content'] = 'dashboard/about/v_about';
        $data['title'] = "Data About";
        $this->load->view('dashboard/dashboard', $data);
    }

    public function tambah()
    {
        // bagian untuk menampilkan profil
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $data['content'] = 'dashboard/about/t_about';
        $data['title'] = "Tambah About";
        $this->load->view('dashboard/dashboard', $data);
    }

    public function simpan()
    {
        $config['upload_path'] = 'assets/images/about';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '2048';
        $this->load->library('upload', $config);
        $this->upload->do_upload('gambar_about');
        $file_name = $this->upload->data();

        $data = array(
            'judul_about' => $this->input->post('judul_about'),
            'deskripsi_about' => $this->input->post('deskripsi_about'),
            'gambar_about' => $file_name['file_name'],
        );

        $query = $this->db->insert('about', $data);
        if ($query == true) {
            $this->session->set_flashdata('info', '  Data About berhasil disimpan');
            redirect('about', 'refresh');
        }
    }

    public function edit($id_about)
    {
        $isi['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $isi['about'] = $this->db->get_where('about', ['id_about' => $id_about])->row_array();
        $isi['content'] = 'dashboard/about/e_about';
        $isi['title'] = 'Edit About';
        $this->load->view('dashboard/dashboard', $isi);
    }

    public function ubah()
    {
        $id_about = $this->input->post('id_about');
        $config['upload_path'] = 'assets/images/about';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '2048';

        $this->load->library('upload', $config);

        if (!empty($_FILES['gambar_about']['name'])) {
            $this->upload->do_upload('gambar_about');
            $upload = $this->upload->data();
            $gambar = $upload['file_name'];
            $data = array(
                'gambar_about' => $gambar,
                'judul_about' => $this->input->post('judul_about'),
                'deskripsi_about' => $this->input->post('deskripsi_about'),
            );
            $_id = $this->db->get_where('about', ['id_about' => $id_about])->row();
            $this->db->where('id_about', $_POST['id_about']);
            $query = $this->db->update('about', $data);
            if ($query == true) {
                $this->session->set_flashdata(
                    'info',
                    'Data About berhasil diedit'
                );
                unlink('assets/images/about/' . $_id->gambar_about);
                redirect('about');
            }
        } else {
            $data = array(
                'judul_about' => $this->input->post('judul_about'),
                'deskripsi_about' => $this->input->post('deskripsi_about'),
            );

            $this->db->where('id_about', $_POST['id_about']);
            $query = $this->db->update('about', $data);
            if ($query == true) {
                $this->session->set_flashdata(
                    'info',
                    'Data about berhasil diedit'
                );
                redirect('about');
            }
        }
    }


    public function hapus($id_about)
    {
        $_id = $this->db->get_where('about', ['id_about' => $id_about])->row();
        $this->db->where('id_about', $id_about);
        $isi = $this->db->delete('about');
        if ($isi == true) {
            $this->session->set_flashdata(
                'info',
                'data About berhasil di Delete'
            );
            unlink('assets/images/about/' . $_id->gambar_about);
            redirect('about');
        }
    }
}
