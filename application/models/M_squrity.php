<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_squrity extends CI_Model
{
    public function getSqurity()
    {

        if (empty($this->session->userdata('username'))) {
            $this->session->sess_destroy();
            redirect('panel', 'refresh');
        };
    }
}
