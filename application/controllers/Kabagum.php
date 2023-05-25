<?php

class Kabagum extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_pokja');
        $this->load->model('m_admin');
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        if ($id_aplikasi <> 4) {
            redirect(site_url('login'));
        }
    }


    function index()
    {

        $data = array(
            'judul' => 'Layanan',
            'data_layanan' => $this->m_pokja->get_layanan(),
        );
        $this->template->load('pokja/templatekabagum', 'pokja/daftar_layanan', $data);
    }

    function layanan()
    {

        $data = array(
            'judul' => 'Layanan',
            'data_layanan' => $this->m_pokja->get_layanan(),
        );
        $this->template->load('pokja/templatekabagum', 'pokja/daftar_layanan', $data);
    }


    function ajuan($nip = FALSE)
    {

        $status = "3h7g4h7";
        $data = array(
            'judul' => 'Layanan Ajuan Baru',
            'data_layanan' => $this->m_pokja->get_layanan_pokja($nip, $status),
        );
        $this->template->load('pokja/templatekabagum', 'pokja/daftar_ajuanlayanan', $data);
    }

    function kembali($nip = FALSE)
    {

        $status = "7d9aj39";
        $data = array(

            'judul' => 'Layanan Dikembalikan',
            'data_layanan' => $this->m_pokja->get_layanan_pokja($nip, $status),
        );
        $this->template->load('pokja/templatekabagum', 'pokja/daftar_ajuanlayanan', $data);
    }

    function periksa($nip = FALSE)
    {

        $status = "3f9j9h7s";
        $data = array(

            'judul' => 'Layanan Diperiksa',
            'data_layanan' => $this->m_pokja->get_layanan_pokja($nip, $status),
        );
        $this->template->load('pokja/templatekabagum', 'pokja/daftar_ajuanlayanan', $data);
    }

    function proses($nip = FALSE)
    {

        $status = "4f4s8rs";
        $data = array(
            'judul' => 'Layanan Diproses',
            'data_layanan' => $this->m_pokja->get_layanan_pokja($nip, $status),
        );
        $this->template->load('pokja/templatekabagum', 'pokja/daftar_ajuanlayanan', $data);
    }

    function selesai($nip = FALSE)
    {

        $status = "9f5s9ef";
        $data = array(
            'judul' => 'Layanan Selesai',
            'data_layanan' => $this->m_pokja->get_layanan_pokja($nip, $status),
        );
        $this->template->load('pokja/templatekabagum', 'pokja/daftar_ajuanlayanan', $data);
    }

    function tolak($nip = FALSE)
    {

        $status = "6d5e4s5";
        $data = array(
            'judul' => 'Layanan Ditolak',
            'data_layanan' => $this->m_pokja->get_layanan_pokja($nip, $status),
        );
        $this->template->load('pokja/templatekabagum', 'pokja/daftar_layanan', $data);
    }

    function detail($id_layanan = FALSE)
    {


        $data = array(
            'judul' => 'Detail Tiket Layanan',
            'data_layanan' => $this->m_pokja->get_detail_layanan($id_layanan),
        );
        $this->template->load('pokja/templatekabagum', 'pokja/detail_layanan', $data);
    }

    function detailajuan($id_layanan = FALSE)
    {


        $data = array(
            'judul' => 'Detail Tiket Layanan',
            'data_layanan' => $this->m_pokja->get_detail_layanan($id_layanan),
            'data_pegawai' => $this->m_pokja->get_pegawai_bagian($id_layanan),
        );
        $this->template->load('pokja/templatekabagum', 'pokja/detail_ajuanlayanan', $data);
    }

    function update_ajuanlayanan()
    {

        $tgl = date('dmy');
        $jam = date('his');
        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
        $this->form_validation->set_rules('id_layanan', 'id_layanan', 'required');
        $this->form_validation->set_rules('catatan', 'catatan', 'required');
        $id_layanan = $this->input->post('id_layanan');
        if ($this->form_validation->run() === FALSE)
            redirect('kabagum/detailajuan/' . $id_layanan);
        else {
            $data = [

                'id_pegawai' => $this->input->post('id_pegawai'),
                'id_status_layanan' => $this->input->post('id_status_layanan'),
            ];
            $where = [
                'id_layanan' => $id_layanan
            ];
            $this->m_pokja->update_data('layanan', $data, $where);
            $id_riwayat = $id_layanan . $tgl . $jam;
            $data1 = [
                'id_riwayat' => $id_riwayat,
                'id_layanan' => $id_layanan,
                'id_status_layanan' => $this->input->post('id_status_layanan'),
                'catatan' => $this->input->post('catatan'),
            ];

            $this->m_pokja->add_data('riwayat_tiket', $data1);
            $notif = "Layanan Berhasil Diteruskan";
            $this->session->set_flashdata('success', $notif);
            redirect('kabagum/detailajuan/' . $id_layanan);
        }
    }

    function update_periksalayanan()
    {

        $tgl = date('dmy');
        $jam = date('his');
        $this->form_validation->set_rules('catatan', 'catatan', 'required');
        $id_layanan = $this->input->post('id_layanan');
        if ($this->form_validation->run() === FALSE)
            redirect('pokja/detailajuan/' . $id_layanan);
        else {
            $data = [
                'id_status_layanan' => $this->input->post('status_layanan'),
            ];
            $where = [
                'id_layanan' => $id_layanan
            ];
            $this->m_pokja->update_data('layanan', $data, $where);
            $id_riwayat = $id_layanan . $tgl . $jam;
            $data1 = [
                'id_riwayat' => $id_riwayat,
                'id_layanan' => $id_layanan,
                'id_status_layanan' => $this->input->post('status_layanan'),
                'catatan' => $this->input->post('catatan'),
            ];

            $this->m_pokja->add_data('riwayat_tiket', $data1);
            $status = $this->input->post('status_layanan');
            if ($status == '4f4s8rs') {
                $notif = "Layanan Diproses";
                $this->session->set_flashdata('success', $notif);
            } elseif ($status == '7d9aj39') {
                $notif = "Layanan Dikembalikan";
                $this->session->set_flashdata('warning', $notif);
            } elseif ($status == '6d5e4s5') {
                $notif = "Layanan Ditolak";
                $this->session->set_flashdata('danger', $notif);
            }
            redirect('kabagum/detailajuan/' . $id_layanan);
        }
    }
}
