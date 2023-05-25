<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }
    public function index()
    {
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        if ($id_aplikasi == 1) {
            redirect(site_url('admin'));
        }
        if ($id_aplikasi == 2) {
            redirect(site_url('pokja'));
        }
        if ($id_aplikasi == 3) {
            redirect(site_url('kepala'));
        }
        if ($id_aplikasi == 4) {
            redirect(site_url('kabagum'));
        }
        if ($id_aplikasi == 5) {
            redirect(site_url('pegawai'));
        } else {
            $data = array(
                'dt_aplikasi' => $this->Login_model->get_aplikasi(),
                'judul' => 'Login Pinandu LLDIKTI XI',
                'menu' => 'login',
                'sub_menu' => '',
                'action' => 'login/auth_action',
            );
            $this->load->view('login/login', $data);
        }
    }

    public function auth_action()
    {
        $nip = htmlspecialchars($this->input->post('nip', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
        $aplikasi = htmlspecialchars($this->input->post('aplikasi', TRUE), ENT_QUOTES);
        $cek_login = $this->Login_model->auth($nip, $aplikasi);
        if ($cek_login) {

            if (password_verify($password, $cek_login->password)) {
                if ($cek_login->id_aplikasi == 1) {
                    $this->session->set_userdata('id_pegawai', $cek_login->id_pegawai);
                    $this->session->set_userdata('id_role', $cek_login->id_role);
                    $this->session->set_userdata('id_aplikasi', $cek_login->id_aplikasi);
                    redirect('admin');
                }
                if ($cek_login->id_aplikasi == 2) {
                    $this->session->set_userdata('id_pegawai', $cek_login->id_pegawai);
                    $this->session->set_userdata('id_role', $cek_login->id_role);
                    $this->session->set_userdata('id_aplikasi', $cek_login->id_aplikasi);
                    $this->session->set_userdata('id_bagian_pegawai', $cek_login->id_bagian_pegawai);
                    redirect('pokja');
                }
                if ($cek_login->id_aplikasi == 3) {
                    $this->session->set_userdata('id_pegawai', $cek_login->id_pegawai);
                    $this->session->set_userdata('id_role', $cek_login->id_role);
                    $this->session->set_userdata('id_aplikasi', $cek_login->id_aplikasi);
                    $this->session->set_userdata('id_bagian_pegawai', $cek_login->id_bagian_pegawai);
                    redirect('kepala');
                }
                if ($cek_login->id_aplikasi == 4) {
                    $this->session->set_userdata('id_pegawai', $cek_login->id_pegawai);
                    $this->session->set_userdata('id_role', $cek_login->id_role);
                    $this->session->set_userdata('id_aplikasi', $cek_login->id_aplikasi);
                    $this->session->set_userdata('id_bagian_pegawai', $cek_login->id_bagian_pegawai);
                    redirect('kabagum');
                }
                if ($cek_login->id_aplikasi == 5) {
                    $this->session->set_userdata('id_pegawai', $cek_login->id_pegawai);
                    $this->session->set_userdata('id_role', $cek_login->id_role);
                    $this->session->set_userdata('id_aplikasi', $cek_login->id_aplikasi);
                    $this->session->set_userdata('id_bagian_pegawai', $cek_login->id_bagian_pegawai);
                    redirect('pegawai');
                } else {
                    $notif = "Gagal";
                    $this->session->set_flashdata('gagal', $notif);

                    redirect('login');
                }
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
