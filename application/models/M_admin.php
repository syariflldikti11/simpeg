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
	function get_user()
	{		
	   
		$this->db->select('*');
	   $this->db->from('pengguna a');
		$this->db->join('pegawai b','a.id_pegawai=b.id_pegawai','left');
	   $query = $this->db->get();
	   return $query->result();
	}
	function view_pegawai($id)
	{
		$this->db->select('*');
		$this->db->from('pegawai a');
		 $this->db->join('jabatan b','a.id_jabatan=b.id_jabatan','left');
		 $this->db->where('id_pegawai',$id);
		$query = $this->db->get();
		return $query->row();
	}
	function view_keluarga($id)
	{
		$this->db->select('*');
		$this->db->from('keluarga a');
		 $this->db->join('pegawai b','a.id_pegawai=b.id_pegawai','left');
		 $this->db->where('a.id_pegawai',$id);
		$query = $this->db->get();
		return $query->result();
	}
	function view_arsip($id)
	{
		$this->db->select('a.id_arsip_pegawai,a.id_pegawai,a.keterangan,a.file,c.nama_jenis_arsip');
		$this->db->from('arsip_pegawai a');
		 $this->db->join('pegawai b','a.id_pegawai=b.id_pegawai','left');
		 $this->db->join('jenis_arsip c','a.id_jenis_arsip=c.id_jenis_arsip','left');
		 $this->db->where('a.id_pegawai',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function view_pendidikan($id)
	{
		$this->db->select('*');
		$this->db->from('pendidikan a');
		 $this->db->join('pegawai b','a.id_pegawai=b.id_pegawai','left');
		 $this->db->where('a.id_pegawai',$id);
		$query = $this->db->get();
		return $query->result();
	}
 
}
?>