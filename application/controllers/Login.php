<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }
    public function index()
    {
        $role = $this->session->userdata('role');
        if ($role == 1) {
            redirect(site_url('pegawai'));
        }
        if ($role == 2) {
            redirect(site_url('admin'));
        } else {
            $data = array(

                'action' => 'login/auth_action',
            );
            $this->load->view('login/login', $data);
        }
    }

    public function auth_action()
    {
        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
        $cek_login = $this->m_login->auth($username, $password);
        if ($cek_login->num_rows() > 0) {
            $data = $cek_login->row();
            $this->session->set_userdata('masuk', TRUE);
            if ($data->row == '1') {
                $this->session->set_userdata('role', $cek_login->role);
                redirect('pegawai');
            }
            if ($data->row == '2') {
                $this->session->set_userdata('role', $cek_login->role);
                redirect('admin');
            } else {
                $notif = "Gagal";
                $this->session->set_flashdata('gagal', $notif);
                redirect('login');
            }

        } else {
            $notif = "username/Password Salah";
            $this->session->set_flashdata('gagal', $notif);

            redirect('login');
        }
    }



    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}