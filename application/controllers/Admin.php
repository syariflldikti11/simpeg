<?php

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_umum');
        $this->load->model('m_admin');

    }


    function index()
    {
        $data = array(
            'menu' => 'Dashboard',
            'sub_menu' => '',
        );
        $this->template->load('admin/template', 'admin/home', $data);
    }

    function arsip_kepegawaian()
    {
        $data = array(
            'judul' => 'Data Arsip Pegawai',
            'menu' => 'Arsip Kepegawaian',
            'sub_menu' => '',
            'dt_arsip_kepegawaian' => $this->m_admin->get_arsip_kepegawaian('arsip_kepegawaian'),
            'dt_jenis_arsip' => $this->m_umum->get_data('jenis_arsip'),
        );
        $this->template->load('admin/template', 'admin/arsip_kepegawaian', $data);
    }

    function simpan_arsip_kepegawaian()
    {
        $this->db->set('id_arsip_kepegawaian', 'UUID()', FALSE);
        $id_jenis_arsip = $this->input->post('id_jenis_arsip');
        $keterangan = $this->input->post('keterangan');
        $file = $this->uploadFile();
        $data = array(
            'id_jenis_arsip' => $id_jenis_arsip,
            'keterangan' => $keterangan,
            'file' => $file
        );

        $this->m_umum->input_data($data, 'arsip_kepegawaian');
        $notif = "Arsip Kepegawaian Berhasil Ditambahkan";
        $this->session->set_flashdata('success', $notif);
        redirect('admin/arsip_kepegawaian');

    }
    function update_arsip_kepegawaian(){
        $id_arsip_kepegawaian = $this->input->post('id_arsip_kepegawaian');
        $id_jenis_arsip = $this->input->post('id_jenis_arsip');
        $keterangan = $this->input->post('keterangan');
        $old = $this->input->post('old_file');
            
            if (!empty($_FILES["file"]["name"])) {
                  $file = $this->uploadFile();
                  unlink("./upload/$old");
                } else {
                    $file = $old;
                }
            $data_update = array(
                'id_arsip_kepegawaian' => $id_arsip_kepegawaian,
                'id_jenis_arsip' => $id_jenis_arsip,
                'keterangan' => $keterangan,
                'file' => $file
                );
                $where = array('id_arsip_kepegawaian' => $id_arsip_kepegawaian);
                $res = $this->m_umum->UpdateData('arsip_kepegawaian', $data_update, $where);
                if($res>=1){
                   
                    $notif = "Update Arsip Kepegawaian Berhasil ";
                    $this->session->set_flashdata('update', $notif);
                    redirect('admin/arsip_kepegawaian');
                }else{
                    echo "<h1>GAGAL</h1>";
                }
            }
    function delete_arsip_kepegawaian($id,$file)
    {

        $this->m_umum->hapus('arsip_kepegawaian', 'id_arsip_kepegawaian', $id);
        unlink("./upload/$file");
        $notif = "Arsip Kepegawaian berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/arsip_kepegawaian');

    }
    function pegawai()
    {
        $data = array(
            'judul' => 'Data Pegawai',
            'menu' => 'Pegawai',
            'sub_menu' => '',
            'dt_pegawai' => $this->m_admin->get_pegawai('pegawai'),
            'dt_jabatan' => $this->m_umum->get_data('jabatan'),
        );
        $this->template->load('admin/template', 'admin/pegawai', $data);
    }

    function simpan_pegawai()
    {
        $this->db->set('id_pegawai', 'UUID()', FALSE);
        $nip = $this->input->post('nip');
        $nama_pegawai = $this->input->post('nama_pegawai');
        $nik = $this->input->post('nik');
        $kk = $this->input->post('kk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $agama = $this->input->post('agama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $status_kawin = $this->input->post('status_kawin');
        $id_jabatan = $this->input->post('id_jabatan');
        $pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
        $tmt = $this->input->post('tmt');
        $file = $this->uploadFile();
        $data = array(
            'nip' => $nip,
            'nama_pegawai' => $nama_pegawai,
            'nik' => $nik,
            'kk' => $kk,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'agama' => $agama,
            'email' => $email,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'status_kawin' => $status_kawin,
            'id_jabatan' => $id_jabatan,
            'pendidikan_terakhir' => $pendidikan_terakhir,
            'tmt' => $tmt,
            'file' => $file
        );

        $this->m_umum->input_data($data, 'pegawai');
        $notif = "Pegawai Berhasil Ditambahkan";
        $this->session->set_flashdata('success', $notif);
        redirect('admin/pegawai');

    }
    function update_pegawai(){
       $id_pegawai = $this->input->post('id_pegawai');
       $nip = $this->input->post('nip');
       $nama_pegawai = $this->input->post('nama_pegawai');
        $nik = $this->input->post('nik');
        $kk = $this->input->post('kk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $agama = $this->input->post('agama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $status_kawin = $this->input->post('status_kawin');
        $id_jabatan = $this->input->post('id_jabatan');
        $pendidikan_terakhir = $this->input->post('pendidikan_terakhir');
        $tmt = $this->input->post('tmt');
        $old = $this->input->post('old_file');
            
            if (!empty($_FILES["file"]["name"])) {
                  $file = $this->uploadFile();
                  unlink("./upload/$old");
                } else {
                    $file = $old;
                }
            $data_update = array(
                'id_pegawai' => $id_pegawai,
                'nip' => $nip,
                'nama_pegawai' => $nama_pegawai,
            'nik' => $nik,
            'kk' => $kk,
            'tempat_lahir' => $tempat_lahir,
            'tgl_lahir' => $tgl_lahir,
            'agama' => $agama,
            'email' => $email,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'status_kawin' => $status_kawin,
            'id_jabatan' => $id_jabatan,
            'pendidikan_terakhir' => $pendidikan_terakhir,
            'tmt' => $tmt,
            'file' => $file
                );
                $where = array('id_pegawai' => $id_pegawai);
                $res = $this->m_umum->UpdateData('pegawai', $data_update, $where);
                if($res>=1){
                   
                    $notif = "Update Pegawai Berhasil ";
                    $this->session->set_flashdata('update', $notif);
                    redirect('admin/pegawai');
                }else{
                    echo "<h1>GAGAL</h1>";
                }
            }
    function delete_pegawai($id,$file)
    {

        $this->m_umum->hapus('pegawai', 'id_pegawai', $id);
        unlink("./upload/$file");
        $notif = "Pegawai berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/pegawai');

    }
   function profil($id=FALSE)
    {
        $data = array(
            'judul' => 'Profil Pegawai',
            'menu' => 'Pegawai',
            'sub_menu' => 'Profil Pegawai',
            'id' => $id,
            'd' => $this->m_admin->view_pegawai($id),
            'dt_keluarga' => $this->m_admin->view_keluarga($id),
        );
        $this->template->load('admin/template', 'admin/profil', $data);
    }
    function simpan_keluarga()
    {
        $id = $this->input->post('id_pegawai');
        $this->db->set('id_keluarga', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_keluarga', 'nama_keluarga', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/keluarga');
        else {

            $this->m_umum->set_data("keluarga");
            $notif = "Tambah Keluarga Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect(base_url() . "admin/profil/".$id);
        }
    }
    function delete_keluarga($id,$id_pegawai)
    {

        $this->m_umum->hapus('keluarga', 'id_keluarga', $id);
        $notif = "Keluarga berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect(base_url() . "admin/profil/" . $id_pegawai);
    }
    function jabatan()
    {
        $data = array(
            'judul' => 'Data Jabatan',
            'menu' => 'Data Master',
            'sub_menu' => 'Jabatan',
            'dt_jabatan' => $this->m_umum->get_data('jabatan'),
        );
        $this->template->load('admin/template', 'admin/jabatan', $data);
    }
    function simpan_jabatan()
    {

        $this->db->set('id_jabatan', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_jabatan', 'nama_jabatan', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/jabatan');
        else {

            $this->m_umum->set_data("jabatan");
            $notif = "Tambah Jabatan Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/jabatan');
        }
    }
    function update_jabatan()
    {

        $this->form_validation->set_rules('id_jabatan', 'id_jabatan', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/jabatan');
        else {
            $this->m_umum->update_data("jabatan");
            $notif = " Update Jabatan Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/jabatan');
        }
    }
    function delete_jabatan($id)
    {

        $this->m_umum->hapus('jabatan', 'id_jabatan', $id);
        $notif = "Jabatan Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/jabatan');
    }

    function jenis_arsip()
    {
        $data = array(
            'judul' => 'Data Jenis Arsip',
            'menu' => 'Data Master',
            'sub_menu' => 'Jenis Arsip',
            'dt_jenis_arsip' => $this->m_umum->get_data('jenis_arsip'),
        );
        $this->template->load('admin/template', 'admin/jenis_arsip', $data);
    }
    function simpan_jenis_arsip()
    {

        $this->db->set('id_jenis_arsip', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_jenis_arsip', 'nama_jenis_arsip', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/jenis_arsip');
        else {

            $this->m_umum->set_data("jenis_arsip");
            $notif = "Tambah Jenis Arsip Berhasil";
            $this->session->set_flashdata('success', $notif);
            redirect('admin/jenis_arsip');
        }
    }
    function update_jenis_arsip()
    {

        $this->form_validation->set_rules('id_jenis_arsip', 'id_jenis_arsip', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('admin/jenis_arsip');
        else {
            $this->m_umum->update_data("jenis_arsip");
            $notif = " Update Jenis Arsip Berhasil";
            $this->session->set_flashdata('update', $notif);
            redirect('admin/jenis_arsip');
        }
    }
    function delete_jenis_arsip($id)
    {

        $this->m_umum->hapus('jenis_arsip', 'id_jenis_arsip', $id);
        $notif = "Jenis Arsip Berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('admin/jenis_arsip');
    }

    public function uploadFile()
    {
        $config['upload_path'] = 'upload';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|jpg|jpeg|png';
        $config['overwrite'] = false;
        $config['max_size'] = 5000;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
        $error = $this->upload->display_errors();
        echo $error;
        exit;

    }



}