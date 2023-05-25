<?php

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_umum');
        $this->load->model('m_admin');
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        if ($id_aplikasi <> 1) {
            redirect(site_url('login'));
        }
    }


    function index()
    {
        $data = array(
            'judul' => 'Dashboard',
        );
        $this->template->load('admin/template', 'admin/home', $data);
    }
    function pts()
    {

        $data = array(
            'judul' => 'PTS',
            'dt_pts' => $this->m_umum->get_data('pts'),
        );
        $this->template->load('admin/template', 'admin/pts', $data);
    }
    function layanan_umum()
    {

        $data = array(
            'judul' => 'Layanan Umum',
            'dt_layanan_umum' => $this->m_admin->get_layanan_umum(),
        );
        $this->template->load('admin/template', 'admin/layanan_umum', $data);
    }

    function layanan_pts()
    {
        $data = array(
            'judul' => 'Layanan PTS',
            'dt_layanan_pts' => $this->m_admin->get_layanan_pts(),
        );
        $this->template->load('admin/template', 'admin/layanan_pts', $data);
    }
    function view_layanan($id_layanan)
    {
        $detail = $this->m_admin->get_layanan($id_layanan);
        if ($detail->num_rows() == 0) {
            show_404();
        } else {
            $data = array(
                'judul' => 'Kode Tiket ',
                'd' => $this->m_admin->show_tiket($id_layanan),
                'dt_syarat' => $this->m_admin->show_syarat($detail->row()->id_sp),
                'dt_dokumen' => $this->m_admin->show_dokumen($id_layanan),
                'dt_dokumen_respon' => $this->m_admin->show_dokumen_respon($id_layanan),
                'dt_riwayat' => $this->m_admin->show_riwayat($id_layanan),
            );
            $this->template->load('admin/template', 'admin/view_layanan', $data);
        }
    }
    function pegawai()
    {
        $data = array(
            'judul' => 'Pegawai',
            'dt_pegawai' => $this->m_admin->get_pegawai(),
        );
        $this->template->load('admin/template', 'admin/pegawai', $data);
    }
    function bagian()
    {

        $data = array(
            'judul' => 'Bagian',
            'dt_bagian' => $this->m_admin->get_bagian(),
            'dt_pegawai' => $this->m_umum->get_data('pegawai'),
        );
        $this->template->load('admin/template', 'admin/bagian', $data);
    }
    function simpan_bagian()
    {

        $this->db->set('id_bagian', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_bagian', 'nama_bagian', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/bagian');
        else {

            $this->m_umum->set_data("bagian");
            $notif = "Tambah bagian Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/bagian');
        }
    }
    function update_bagian()
    {

        $this->form_validation->set_rules('id_bagian', 'id_bagian', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/bagian');
        else {
            $this->m_umum->update_data("bagian");
            $notif = " Update Bagian Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/bagian');
        }
    }
    function delete_bagian($id)
    {

        $this->m_umum->hapus('bagian', 'id_bagian', $id);
        $notif = " Bagian berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/bagian');
    }
    function sp()
    {

        $data = array(
            'judul' => 'Standar Pelayanan',
            'dt_sp' => $this->m_admin->get_sp(),
            'dt_bagian' => $this->m_umum->get_data('bagian'),
        );
        $this->template->load('admin/template', 'admin/sp', $data);
    }
    function simpan_sp()
    {

        $this->db->set('id_sp', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_sp', 'nama_sp', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/sp');
        else {

            $this->m_umum->set_data("sp");
            $notif = "Tambah SP Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/sp');
        }
    }
    function update_sp()
    {

        $this->form_validation->set_rules('id_sp', 'id_sp', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/sp');
        else {
            $this->m_umum->update_data("sp");
            $notif = " Update Standar Pelayanan Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/sp');
        }
    }
    function delete_sp($id)
    {

        $this->m_umum->hapus('sp', 'id_sp', $id);
        $notif = " SP berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/sp');
    }
    function detail_sp()
    {

        $data = array(
            'judul' => 'Detail Standar Pelayanan',
            'dt_detail_sp' => $this->m_admin->get_sp(),
        );
        $this->template->load('admin/template', 'admin/detail_sp', $data);
    }
    function add_detail_sp($id_sp = FALSE)
    {

        $data = array(
            'judul' => 'Detail Standar Pelayanan',
            'id_sp' => $id_sp,
            'd' => $this->m_admin->update_sp($id_sp),
            'dt_detail_sp' => $this->m_admin->get_detail_sp($id_sp),
            'dt_syarat' => $this->m_umum->get_data('syarat'),
        );
        $this->template->load('admin/template', 'admin/add_detail_sp', $data);
    }
    function simpan_detail_sp()
    {

        $this->db->set('id_detail_sp', 'UUID()', FALSE);
        $id_sp = $this->input->post('id_sp');
        $this->form_validation->set_rules('id_syarat', 'id_syarat', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect(base_url() . "admin/add_detail_sp/" . $id_sp);
        else {

            $this->m_umum->set_data("detail_sp");
            $notif = "Tambah Syarat SP Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect(base_url() . "admin/add_detail_sp/" . $id_sp);
        }
    }
    function delete_detail_sp($id, $id_sp)
    {

        $this->m_umum->hapus('detail_sp', 'id_detail_sp', $id);
        $notif = " Detail SP berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect(base_url() . "admin/add_detail_sp/" . $id_sp);
    }
    function syarat()
    {

        $data = array(
            'judul' => 'Syarat',
            'dt_syarat' => $this->m_umum->get_data('syarat'),
        );
        $this->template->load('admin/template', 'admin/syarat', $data);
    }
    function simpan_syarat()
    {

        $this->db->set('id_syarat', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_syarat', 'nama_syarat', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/syarat');
        else {

            $this->m_umum->set_data("syarat");
            $notif = "Tambah Syarat Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/syarat');
        }
    }
    function update_syarat()
    {

        $this->form_validation->set_rules('id_syarat', 'id_syarat', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/syarat');
        else {
            $this->m_umum->update_data("syarat");
            $notif = " Update Syarat Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/syarat');
        }
    }
    function delete_syarat($id)
    {

        $this->m_umum->hapus('syarat', 'id_syarat', $id);
        $notif = " Syarat berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/syarat');
    }


    function status_dokumen()
    {

        $data = array(
            'judul' => 'Status Dokumen',
            'dt_status_dokumen' => $this->m_umum->get_data('status_dokumen'),
        );
        $this->template->load('admin/template', 'admin/status_dokumen', $data);
    }
    function simpan_status_dokumen()
    {

        $this->db->set('id_status_dokumen', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_status_dokumen', 'nama_status_dokumen', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/status_dokumen');
        else {

            $this->m_umum->set_data("status_dokumen");
            $notif = "Tambah Status Dokumen Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/status_dokumen');
        }
    }
    function update_status_dokumen()
    {

        $this->form_validation->set_rules('id_status_dokumen', 'id_status_dokumen', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/status_dokumen');
        else {
            $this->m_umum->update_data("status_dokumen");
            $notif = " Update Status Dokumen Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/status_dokumen');
        }
    }
    function delete_status_dokumen($id)
    {

        $this->m_umum->hapus('status_dokumen', 'id_status_dokumen', $id);
        $notif = " Status Dokumen Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/status_dokumen');
    }

    function status_layanan()
    {

        $data = array(
            'judul' => 'Status Layanan',
            'dt_status_layanan' => $this->m_umum->get_data('status_layanan'),
        );
        $this->template->load('admin/template', 'admin/status_layanan', $data);
    }
    function simpan_status_layanan()
    {

        $this->db->set('id_status_layanan', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_status_layanan', 'nama_status_layanan', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/status_layanan');
        else {
            $this->m_umum->set_data("status_layanan");
            $notif = "Tambah Status Layanan Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/status_layanan');
        }
    }
    function update_status_layanan()
    {

        $this->form_validation->set_rules('id_status_layanan', 'id_status_layanan', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/status_layanan');
        else {
            $this->m_umum->update_data("status_layanan");
            $notif = " Update Status Layanan Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/status_layanan');
        }
    }
    function delete_status_layanan($id)
    {

        $this->m_umum->hapus('status_layanan', 'id_status_layanan', $id);
        $notif = " Status Layanan Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/status_layanan');
    }

    function pengguna()
    {

        $data = array(
            'judul' => 'Pengguna',
            'dt_pengguna' => $this->m_admin->get_pengguna(),
            'dt_aplikasi' => $this->m_umum->get_data('aplikasi'),
            'dt_role' => $this->m_umum->get_data('role'),
            'dt_pegawai' => $this->m_umum->get_data('pegawai'),
        );
        $this->template->load('admin/template', 'admin/pengguna', $data);
    }
    function simpan_pengguna()
    {

        $this->db->set('id_pengguna', 'UUID()', FALSE);
        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/pengguna');
        else {
            $this->m_umum->set_data("pengguna");
            $notif = "Tambah Pengguna Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/pengguna');
        }
    }
    function update_pengguna()
    {

        $this->form_validation->set_rules('id_pegawai', 'id_pegawai', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/pengguna');
        else {
            $this->m_umum->update_data("pengguna");
            $notif = " Update Pengguna Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/pengguna');
        }
    }
    function delete_pengguna($id)
    {

        $this->m_umum->hapus('pengguna', 'id_pengguna', $id);
        $notif = " Pengguna Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/pengguna');
    }

    function aplikasi()
    {

        $data = array(
            'judul' => 'Aplikasi',
            'dt_aplikasi' => $this->m_umum->get_data('aplikasi'),
        );
        $this->template->load('admin/template', 'admin/aplikasi', $data);
    }
    function simpan_aplikasi()
    {

       
        $this->form_validation->set_rules('nama_aplikasi', 'nama_aplikasi', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/aplikasi');
        else {

            $this->m_umum->set_data("aplikasi");
            $notif = "Tambah Aplikasi Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/aplikasi');
        }
    }

    function delete_aplikasi($id)
    {

        $this->m_umum->hapus('aplikasi', 'id_aplikasi', $id);
        $notif = " Aplikasi Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/aplikasi');
    }

    function role()
    {

        $data = array(
            'judul' => 'Role',
            'dt_role' => $this->m_umum->get_data('role'),
        );
        $this->template->load('admin/template', 'admin/role', $data);
    }
    function simpan_role()
    {

     
        $this->form_validation->set_rules('nama_role', 'nama_role', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/role');
        else {

            $this->m_umum->set_data("role");
            $notif = "Tambah Role Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/role');
        }
    }

    function delete_role($id)
    {

        $this->m_umum->hapus('role', 'id_role', $id);
        $notif = " Role Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/role');
    }

  
}
