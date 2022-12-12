<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $isi['slider'] = $this->db->get('slider')->result();
        $isi['about'] = $this->db->get('about')->result();
        $isi['paket'] = $this->db->get('paket')->result();
        $this->load->view('templates/header', $isi);
        $this->load->view('templates/home');
        $this->load->view('templates/footer');
    }
}
