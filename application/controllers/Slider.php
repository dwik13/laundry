<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Slider extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        // bagian untuk menampilkan profil
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $data['slider'] = $this->db->get('slider')->result_array();

        $data['content'] = 'dashboard/slider/v_slider';
        $data['title'] = "Daftar Slider";
        $this->load->view('dashboard/dashboard', $data);
    }
    public function tambah()
    {
        // bagian untuk menampilkan profil
        $data['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();

        $data['content'] = 'dashboard/slider/t_slider';
        $data['title'] = "Tambah Slider";
        $this->load->view('dashboard/dashboard', $data);
    }
    public function simpan()
    {
        $config['upload_path'] = 'assets/images/slider';
        $config['allowed_types'] = 'jpeg|webp|jpg|png';
        $config['max_size'] = '2048';
        $this->load->library('upload', $config);
        $this->upload->do_upload('gambar_slider');
        $file_name = $this->upload->data();

        $data = array(
            'judul_slider' => $this->input->post('judul_slider'),
            'deskripsi_slider' => $this->input->post('deskripsi_slider'),
            'gambar_slider' => $file_name['file_name'],
            'status_slider' => $this->input->post('status_slider'),
        );

        $query = $this->db->insert('slider', $data);
        if ($query == true) {
            $this->session->set_flashdata('info', '  Data slider berhasil disimpan');
            redirect('slider', 'refresh');
        }
    }

    public function edit($id_slider)
    {
        $isi['user'] = $this->db->get_where(
            'user',
            ['username' => $this->session->userdata('username')]
        )->row_array();
        $isi['slider'] = $this->db->get_where('slider', ['id_slider' => $id_slider])->row_array();
        $isi['content'] = 'dashboard/slider/e_slider';
        $isi['title'] = 'Edit Slider';
        $this->load->view('dashboard/dashboard', $isi);
    }

    public function ubah()
    {
        $id_slider = $this->input->post('id_slider');
        $config['upload_path'] = 'assets/images/slider';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '2048';

        $this->load->library('upload', $config);

        if (!empty($_FILES['gambar_slider']['name'])) {
            $this->upload->do_upload('gambar_slider');
            $upload = $this->upload->data();
            $gambar = $upload['file_name'];
            $data = array(
                'gambar_slider' => $gambar,
                'judul_slider' => $this->input->post('judul_slider'),
                'deskripsi_slider' => $this->input->post('deskripsi_slider'),
                'status_slider' => $this->input->post('status_slider'),
            );
            $_id = $this->db->get_where('slider', ['id_slider' => $id_slider])->row();
            $this->db->where('id_slider', $_POST['id_slider']);
            $query = $this->db->update('slider', $data);
            if ($query == true) {
                $this->session->set_flashdata(
                    'info',
                    'Data slider berhasil diedit'
                );
                unlink('assets/images/slider/' . $_id->gambar_slider);
                redirect('slider');
            }
        } else {
            $data = array(
                'judul_slider' => $this->input->post('judul_slider'),
                'deskripsi_slider' => $this->input->post('deskripsi_slider'),
                'status_slider' => $this->input->post('status_slider'),
            );

            $this->db->where('id_slider', $_POST['id_slider']);
            $query = $this->db->update('slider', $data);
            if ($query == true) {
                $this->session->set_flashdata(
                    'info',
                    'Data slider berhasil diedit'
                );
                redirect('slider');
            }
        }
    }


    public function hapus($id_slider)
    {
        $_id = $this->db->get_where('slider', ['id_slider' => $id_slider])->row();
        $this->db->where('id_slider', $id_slider);
        $isi = $this->db->delete('slider');
        if ($isi == true) {
            $this->session->set_flashdata(
                'info',
                'data slider berhasil di Delete'
            );
            unlink('assets/images/slider/' . $_id->gambar_slider);
            redirect('slider');
        }
    }
}
