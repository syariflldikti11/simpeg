<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model{

	function get_arsip_kepegawaian()
	{		
	   
		$this->db->select('*');
	   $this->db->from('arsip_kepegawaian a');
		$this->db->join('jenis_arsip b','a.id_jenis_arsip=b.id_jenis_arsip','left');
	   $query = $this->db->get();
	   return $query->result();
	}
	function get_pegawai()
	{		
	   
		$this->db->select('*');
	   $this->db->from('pegawai a');
		$this->db->join('jabatan b','a.id_jabatan=b.id_jabatan','left');
	   $query = $this->db->get();
	   return $query->result();
	}
	function get_bagian()
	{		
	   
		$this->db->select('*');
	   $this->db->from('bagian a');
		$this->db->join('pegawai b','a.id_pokja=b.nip','left');
	   $query = $this->db->get();
	   return $query->result();
	}
	function get_pengguna()
		 {		
			
			 $this->db->select('*');
			$this->db->from('pengguna a');
			 $this->db->join('pegawai b','a.id_pegawai=b.id_pegawai','left');
			 $this->db->join('aplikasi c','a.id_aplikasi=c.id_aplikasi','left');
			 $this->db->join('role d','a.id_role=d.id_role','left');
			$query = $this->db->get();
			return $query->result();
		 }

		 function get_sp()
		 {		
			
			 $this->db->select('*');
			$this->db->from('sp a');
			 $this->db->join('bagian b','a.id_bagian=b.id_bagian','left');
			$query = $this->db->get();
			return $query->result();
		 }
		 function get_layanan_umum()
		 {		
			
			 $this->db->select('*');
			$this->db->from('layanan a');
			 $this->db->join('sp b','a.id_sp=b.id_sp','left');
			 $this->db->join('pegawai c','a.id_pegawai=c.id_pegawai','left');
			 $this->db->join('status_layanan d','a.id_status_layanan=d.id_status_layanan','left');
			 $this->db->where('a.nama_pengusul !="NULL"');
			$query = $this->db->get();
			return $query->result();
		 }
		 function get_layanan_pts()
		 {		
			
			 $this->db->select('*');
			$this->db->from('layanan a');
			 $this->db->join('sp b','a.id_sp=b.id_sp','left');
			 $this->db->join('pegawai c','a.id_pegawai=c.id_pegawai','left');
			 $this->db->join('status_layanan d','a.id_status_layanan=d.id_status_layanan','left');
			 $this->db->where('a.kode_pt !="NULL"');
			$query = $this->db->get();
			return $query->result();
		 }
		 function get_detail_sp($id_sp)
		 {		
			
			 $this->db->select('*');
			$this->db->from('detail_sp a');
			 $this->db->join('sp b','a.id_sp=b.id_sp','');
			 $this->db->join('syarat c','c.id_syarat=a.id_syarat','');
			 $this->db->where('a.id_sp',$id_sp);
			 $this->db->where('a.status_detail_sp=1');
			$query = $this->db->get();
			return $query->result();
		 }
		 
		 function update_sp($id_sp = FALSE)
		 {
			 
			 $this->db->select('*');
			 $this->db->from('sp a');
			  $this->db->join('bagian b','a.id_bagian=b.id_bagian','left');
			  $this->db->where('a.id_sp',$id_sp);
			 $query = $this->db->get();
			 if($query->num_rows()>0)
			 {
				 return $query->row();
			 }
			 
			 else
			 {
				 show_404();
			 }
			
		 }
		 function show_tiket($id_layanan)
		 {		
			 $this->db->select('*');
			$this->db->from('layanan a');
			$this->db->join('sp b','a.id_sp=b.id_sp','');
			 $this->db->where('a.id_layanan',$id_layanan);
			$query = $this->db->get();
			return $query->row();
		 }
		 function get_layanan($id_layanan)

		 {
	 
			 return $this->db->get_where('layanan',array('id_layanan'=>$id_layanan));
	 
		 }
		
		 function show_syarat($id_sp)
		 {		
			
			 $this->db->select('*');
			$this->db->from('detail_sp a');
			 $this->db->join('sp b','a.id_sp=b.id_sp','');
			 $this->db->join('syarat c','c.id_syarat=a.id_syarat','');
			 $this->db->where('a.id_sp',$id_sp);
			 $this->db->where('a.status_detail_sp=1');
			$query = $this->db->get();
			return $query->result();
		 }
		 function cek_status_tiket($id_layanan)
		 {		
			
			 $this->db->select('*');
			$this->db->from('dokumen a');
			 $this->db->join('syarat b','a.id_syarat=b.id_syarat','');
			 $this->db->join('status_dokumen c','a.id_status_dokumen=c.id_status_dokumen','');
			 $this->db->where('c.nama_status_dokumen ="Baru"');
			 $this->db->where('a.id_layanan',$id_layanan);
			$query = $this->db->get();
			return $query->result();
		 }
		 function show_dokumen($id_layanan)
		 {		
			
			 $this->db->select('*');
			$this->db->from('dokumen a');
			 $this->db->join('syarat b','a.id_syarat=b.id_syarat','');
			 $this->db->join('status_dokumen c','a.id_status_dokumen=c.id_status_dokumen','');
			 $this->db->where('c.nama_status_dokumen ="Baru"');
			 $this->db->where('a.id_layanan',$id_layanan);
			$query = $this->db->get();
			return $query->result();
		 }
		 function show_dokumen_respon($id_layanan)
		 {		
			
			 $this->db->select('*');
			$this->db->from('dokumen a');
		
			 $this->db->join('status_dokumen b','a.id_status_dokumen=b.id_status_dokumen','');
			 $this->db->where('a.id_layanan',$id_layanan);
			 $this->db->where('b.nama_status_dokumen ="Respon"');
			$query = $this->db->get();
			return $query->result();
		 }
		 function show_riwayat($id_layanan)
		 {		
			 $this->db->select('*');
			$this->db->from('riwayat_tiket a');
			 $this->db->join('layanan b','a.id_layanan=b.id_layanan','');
			 $this->db->join('status_layanan c','a.id_status_layanan=c.id_status_layanan','left');
			 $this->db->where('a.id_layanan',$id_layanan);
			 $this->db->order_by('a.tgl_riwayat asc');
			$query = $this->db->get();
			return $query->result();
		 }
 
}
?>