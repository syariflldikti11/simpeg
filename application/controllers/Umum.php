<?php

class Umum extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('m_umum');
        $this->load->model('m_user_umum');
      
      }
      function create_captcha()
      {
        $options = array(
            'img_path' =>'captcha/',
            'img_url'=> base_url('captcha'),
            'img_width' => '150',
            'img_height' => '45',
            'expiration' => 7200,
           
            'colors' => array(
                'background' => array(242, 242, 242),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40))
        );
        $cap= create_captcha($options);
        $image =$cap['image'];
        $this->session->set_userdata('captchaword',$cap['word']);
        return $image;
      }
      function check_captcha()
      {
          if($this->input->post('captcha') == $this->session->userdata('captchaword')) {
      
              return true;
          
          } else {
      
              $this->form_validation->set_message('check_captcha', 'Captcha tidak sama');
      
              return false;
          }
      }
   function index()
  {
 
    $data = array(
        'judul' => 'Selamat Datang !', 
        'dt_sp'=> $this->m_user_umum->get_sp(),
        'captcha' => $this->create_captcha(),  
    );	
    $this->template->load('umum/template', 'umum/buat_tiket', $data);
    
}
 function input_tiket()
  {
 
    $data = array(
        'judul' => 'Selamat Datang !',   
    );	
    $this->template->load('umum/template', 'umum/input_tiket', $data);
    
}



function info_sp()
  {

  $data = array(
        'judul' => 'Detail Standar Pelayanan',
        'dt_info_sp'=> $this->m_user_umum->get_sp(),      
    );  
    $this->template->load('umum/template', 'umum/info_sp', $data);
    

}
function view_detail_sp($id_sp)
  {
  
  $data = array(
        'judul' => 'Detail Standar Pelayanan',
        'id_sp'=> $id_sp, 
        'd'=> $this->m_user_umum->update_sp($id_sp), 
        'dt_detail_sp'=> $this->m_user_umum->get_detail_sp($id_sp),      
    );  
    $this->template->load('umum/template', 'umum/view_detail_sp', $data);
    

}

function buat_tiket() { 
    date_default_timezone_set('Asia/Makassar');
    $tgl=date('dmy');
    $jam=date('his');
    $kodeunik = 'TK-'.$tgl.$jam;
    $this->db->set('id_layanan', 'UUID()', FALSE);
    $this->db->set('no_tiket',$kodeunik);
    $this->form_validation->set_rules('id_sp','id_sp','required');
    $this->form_validation->set_rules('nama_pengusul','nama_pengusul','required');
    $this->form_validation->set_rules('no_hp','no_hp','required');
    $this->form_validation->set_rules('email','email','required');
    $this->form_validation->set_rules('pekerjaan','pekerjaan','required');
    $this->form_validation->set_rules('asal_institusi','asal_institusi','required');
    $this->form_validation->set_rules('alamat','alamat','required');
    $this->form_validation->set_rules('ket','ket','required');
    $this->form_validation->set_rules('captcha','Captcha','trim|callback_check_captcha|required');
    if($this->form_validation->run() === FALSE) {
    $notif = "Captcha salah";
    $this->session->set_flashdata('delete', $notif);
    redirect('umum');
    }
    else
    {
        
        $this->m_umum->set_data("layanan");
        $notif = "Tiket Layanan Berhasil di Buat";
        $this->session->set_flashdata('success', $notif);
        redirect(base_url()."umum/hasil_tiket/".$kodeunik);
    }

  }
  function hasil_tiket($kodeunik)
  {
  
  $data = array(
        'judul' => 'Kode Tiket ',
        'kode_tiket'=> $kodeunik,     
    );  
    $this->template->load('umum/template', 'umum/hasil_tiket', $data);
    

}
function cek_tiket(){
    $nomor_tiket=$this->input->post('nomor_tiket');
    redirect(base_url()."umum/show_tiket/".$nomor_tiket);
    }
function show_tiket($nomor_tiket)
{
$detail=$this->m_user_umum->get_tiket($nomor_tiket);
if($detail->num_rows()==0)
		{
            $notif = "No Tiket tidak ada, harap periksa kembali";
            $this->session->set_flashdata('delete', $notif);
            redirect('umum/input_tiket');
		}
        else{
$data = array(
      'judul' => 'Kode Tiket ',
      'no_tiket'=> $nomor_tiket,
      'id_layanan'=> $detail->row()->id_layanan,
      'd'=> $this->m_user_umum->show_tiket($nomor_tiket), 
      'dt_syarat'=> $this->m_user_umum->show_syarat($detail->row()->id_sp),   
      'dt_dokumen'=> $this->m_user_umum->show_dokumen($detail->row()->id_layanan), 
      'dt_dokumen_respon'=> $this->m_user_umum->show_dokumen_respon($detail->row()->id_layanan), 
      'dt_riwayat'=> $this->m_user_umum->show_riwayat($detail->row()->id_layanan), 
      'dt_cek'=> $this->m_user_umum->cek_status_tiket($detail->row()->id_layanan),

  );  
  $this->template->load('umum/template_show_tiket', 'umum/show_tiket', $data);
}

}
function kirim_berkas(){
    $this->db->set('id_dokumen', 'UUID()', false);
    $id_layanan=$this->input->post('id_layanan');
    $id_syarat=$this->input->post('id_syarat');
    $no_tiket=$this->input->post('no_tiket');
 $file = $this->uploadBerkas();   
 $this->db->select('*');
 $this->db->from('dokumen a');
  $this->db->where('a.id_layanan',$id_layanan);
  $this->db->where('a.id_syarat',$id_syarat);
 $query = $this->db->get();
 
    $data= array(
    
        'id_layanan' => $id_layanan,
        'id_syarat' => $id_syarat,
        'file' => $file
        );
        if($query->num_rows()>0)
 {
    $notif = "Berkas sudah ada silahkan hapus terlebih dahulu";
    $this->session->set_flashdata('delete', $notif);
    redirect(base_url()."umum/show_tiket/".$no_tiket);
 }
 else {
    $this->m_umum->input_data($data,'dokumen');
     $notif = "Berkas berhasil ditambahkan";
    $this->session->set_flashdata('success', $notif);
    redirect(base_url()."umum/show_tiket/".$no_tiket);
 }
    }
    function kirim_tiket(){
        $tgl=date('dmy');
        $jam=date('his');
        $kodeunik = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
        $unik = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
        $kode = $tgl.$jam.'-'.$kodeunik.'-'.$unik;
        $tgl=date('Y-m-d');
        $id_layanan=$this->input->post('id_layanan');
        $no_tiket=$this->input->post('no_tiket');
        $id_status_layanan=$this->input->post('id_status_layanan');
                
        $data= array(
            'id_riwayat' => $kode,
            'id_layanan' => $id_layanan,
            'id_status_layanan' => $id_status_layanan
            );
            $datalayanan= array(
                'id_status_layanan' => '3h7g4h7'
                );
            $where = array('id_layanan' => $id_layanan);
		$res = $this->m_umum->UpdateData('layanan', $datalayanan, $where);
        $this->m_umum->input_data($data,'riwayat_tiket');
         $notif = "Tiket anda berhasil dikirim";
        $this->session->set_flashdata('success', $notif);
        redirect(base_url()."umum/show_tiket/".$no_tiket);
        }
public function uploadBerkas()
{
$config['upload_path']          = 'berkas';
$config['allowed_types']        = 'pdf';
$config['overwrite']			= false;
 $config['max_size']             = 2000; 


$this->load->library('upload', $config);
$this->upload->initialize($config);

    if ($this->upload->do_upload('file')) 
    {
        return $this->upload->data("file_name");
    }
     $error = $this->upload->display_errors();
     echo $error;
     exit;
   
}

function delete_berkas($id,$no_tiket,$file)
{

  $this->m_umum->hapus('dokumen','id_dokumen',$id);
  unlink("./berkas/$file");
   $notif = "Berkas berhasil dihapuskan";
          $this->session->set_flashdata('delete', $notif);
          redirect(base_url()."umum/show_tiket/".$no_tiket);
  
}


}
	?>