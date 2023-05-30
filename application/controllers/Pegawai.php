<?php

class Pegawai extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('m_umum');
        $this->load->model('m_pegawai');
        $role = $this->session->userdata('role');
        $masuk = $this->session->userdata('masuk');
        if($role <>1){
            $url=base_url();
            redirect($url);
        }
    }

    function index()
    {
        $data = array(
            'menu' => 'Dashboard',
            'sub_menu' => '',
        );
        $this->template->load('pegawai/template', 'pegawai/home', $data);
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
                    redirect('pegawai/profil');
                }else{
                    echo "<h1>GAGAL</h1>";
                }
            }

   function profil()
    {
        $id_peg = $this->session->userdata('id_pegawai');
        $data = array(
            'judul' => 'Profil Pegawai',
            'menu' => 'Pegawai',
            'id'=>$id_peg,
            'sub_menu' => 'Profil Pegawai',
            'd' => $this->m_pegawai->view_pegawai(),
            'dt_keluarga' => $this->m_pegawai->view_keluarga(),
            'dt_pendidikan' => $this->m_pegawai->view_pendidikan(),
            'dt_arsip' => $this->m_pegawai->view_arsip(),
            'dt_jenis_arsip' => $this->m_umum->get_data('jenis_arsip'),
            'dt_jabatan' => $this->m_umum->get_data('jabatan'),
        );
        $this->template->load('pegawai/template', 'pegawai/profil', $data);
    }
    function simpan_keluarga()
    {
        $id = $this->input->post('id_pegawai');
        $this->db->set('id_keluarga', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_keluarga', 'nama_keluarga', 'required');
        if ($this->form_validation->run() === FALSE)
        redirect('pegawai/profil');
        else {

            $this->m_umum->set_data("keluarga");
            $notif = "Tambah Keluarga Berhasil";
            $this->session->set_flashdata('success', $notif);
             redirect('pegawai/profil');
        }
    }
    function update_keluarga()
    {
        $id = $this->input->post('id_pegawai');
        $this->form_validation->set_rules('id_keluarga', 'id_keluarga', 'required');
        if ($this->form_validation->run() === FALSE)
        redirect('pegawai/profil');
        else {
            $this->m_umum->update_data("keluarga");
            $notif = " Update keluarga Berhasil";
            $this->session->set_flashdata('update', $notif);
             redirect('pegawai/profil');
        }
    }
    function delete_keluarga($id,$id_pegawai)
    {

        $this->m_umum->hapus('keluarga', 'id_keluarga', $id);
        $notif = "Keluarga berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('pegawai/profil');
    }
    function simpan_pendidikan()
    {
        $id = $this->input->post('id_pegawai');
        $this->db->set('id_pendidikan', 'UUID()', FALSE);
        $this->form_validation->set_rules('nama_sekolah', 'nama_sekolah', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('pegawai/pendidikan');
        else {

            $this->m_umum->set_data("pendidikan");
            $notif = "Tambah Pendidikan Berhasil";
            $this->session->set_flashdata('success', $notif);
             redirect('pegawai/profil');
        }
    }
    function update_pendidikan()
    {
        $id = $this->input->post('id_pegawai');
        $this->form_validation->set_rules('id_pendidikan', 'id_pendidikan', 'required');
        if ($this->form_validation->run() === FALSE)
            redirect('pegawai/pendidikan');
        else {
            $this->m_umum->update_data("pendidikan");
            $notif = " Update Pendidikan Berhasil";
            $this->session->set_flashdata('update', $notif);
             redirect('pegawai/profil');
        }
    }
    function delete_pendidikan($id,$id_pegawai)
    {

        $this->m_umum->hapus('pendidikan', 'id_pendidikan', $id);
        $notif = "Pendidikan berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('pegawai/profil');
    }
    function simpan_arsip_pegawai()
    {
        $this->db->set('id_arsip_pegawai', 'UUID()', FALSE);
        $id_jenis_arsip = $this->input->post('id_jenis_arsip');
        $keterangan = $this->input->post('keterangan');
        $id_pegawai = $this->input->post('id_pegawai');
        $file = $this->uploadFile();
        $data = array(
            'id_jenis_arsip' => $id_jenis_arsip,
            'keterangan' => $keterangan,
            'id_pegawai' => $id_pegawai,
            'file' => $file
        );

        $this->m_umum->input_data($data, 'arsip_pegawai');
        $notif = "Arsip pegawai Berhasil Ditambahkan";
        $this->session->set_flashdata('success', $notif);
        redirect('pegawai/profil');

    }
    function update_arsip_pegawai(){
        $id_arsip_pegawai = $this->input->post('id_arsip_pegawai');
        $id_pegawai = $this->input->post('id_pegawai');
        $keterangan = $this->input->post('keterangan');
        $old = $this->input->post('old_file');
            
            if (!empty($_FILES["file"]["name"])) {
                  $file = $this->uploadFile();
                  unlink("./upload/$old");
                } else {
                    $file = $old;
                }
            $data_update = array(
                'id_arsip_pegawai' => $id_arsip_pegawai,
                'id_pegawai' => $id_pegawai,
                'keterangan' => $keterangan,
                'file' => $file
                );
                $where = array('id_arsip_pegawai' => $id_arsip_pegawai);
                $res = $this->m_umum->UpdateData('arsip_pegawai', $data_update, $where);
                if($res>=1){
                   
                    $notif = "Update Arsip pegawai Berhasil ";
                    $this->session->set_flashdata('update', $notif);
                    redirect('pegawai/profil');
                }else{
                    echo "<h1>GAGAL</h1>";
                }
            }
            function update_password(){
                $id = $this->session->userdata('id_pegawai');
                $password = $this->input->post('password');
                $query=("update pengguna  set password=md5('$password') where id_pegawai='$id'  AND role=1 ");
                $this->db->query($query);
                redirect('login/logout');	 
                    }
    function delete_arsip_pegawai($id,$file)
    {

        $this->m_umum->hapus('arsip_pegawai', 'id_arsip_pegawai', $id);
        unlink("./upload/$file");
        $notif = "Arsip pegawai berhasil dihapuskan";
        $this->session->set_flashdata('delete', $notif);
        redirect('pegawai/profil');

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