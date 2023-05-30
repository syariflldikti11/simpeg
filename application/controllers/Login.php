<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
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
            $this->session->set_userdata('masuk', 1);
            if ($data->role == 1) {
                $this->session->set_userdata('role', $data->role);
                $this->session->set_userdata('nama', $data->nama_pegawai);
                $this->session->set_userdata('foto', $data->file);
                $this->session->set_userdata('id_pegawai', $data->id_pegawai);
                redirect('pegawai');
            }
            if ($data->role == 2) {
                $this->session->set_userdata('role', $data->role);
                $this->session->set_userdata('nama', $data->nama_pegawai);
                $this->session->set_userdata('foto', $data->file);
                redirect('admin');
            } else {
                $notif = "Gagal";
                $this->session->set_flashdata('delete', $notif);
                redirect('login');
            }

        } else {
            $notif = "username/Password Salah";
            $this->session->set_flashdata('delete', $notif);

            redirect('login');
        }
    }



    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}