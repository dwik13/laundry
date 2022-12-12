<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Panel Sistem';
            $this->load->view('templates/panel_header', $data);
            $this->load->view('panel/login', $data);
            $this->load->view('templates/panel_footer');
        } else {
            //jika berhasil tervalidasi
            $this->login();
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        // jika user data
        if ($user) {
            // jika user aktif
            if ($user['is_active'] == 1) {
                // cek password sudah benar
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert">
                            Wrong password!
                        </div>'
                    );
                    redirect('panel');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                        This email has not been activated!
                    </div>'
                );
                redirect('panel');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">
                        username not registered!
                    </div>'
            );
            redirect('panel');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('username')) {
            redirect('user');
        }
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[5]|matches[password2]',
            [
                'matches' => 'password do not match',
                'min_length' => 'password to short'
            ]
        );
        $this->form_validation->set_rules(
            'password2',
            'Password',
            'required|trim|matches[password1]'
        );

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Registration pages';
            $this->load->view('templates/panel_header', $data);
            $this->load->view('panel/registration');
            $this->load->view('templates/panel_footer');
        } else {
            // untuk menampilkan jika login sudah benar
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'image' => 'default.png',
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('user', $data);
            // membuat pesan berhasil membuat akun
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
            Congratulation, your account has been created. Please Login!
                </div>'
            );
            redirect('panel');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been log out !</div>');
        redirect('panel');
    }
}
