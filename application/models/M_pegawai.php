<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model{
	function view_pegawai()
	{
        $id = $this->session->userdata('id_pegawai');
		$this->db->select('*');
		$this->db->from('pegawai a');
		 $this->db->join('jabatan b','a.id_jabatan=b.id_jabatan','left');
		 $this->db->where('id_pegawai',$id);
		$query = $this->db->get();
		return $query->row();
	}
	function view_keluarga()
	{
        $id = $this->session->userdata('id_pegawai');
		$this->db->select('*');
		$this->db->from('keluarga a');
		 $this->db->join('pegawai b','a.id_pegawai=b.id_pegawai','left');
		 $this->db->where('a.id_pegawai',$id);
		$query = $this->db->get();
		return $query->result();
	}
	function view_arsip()
	{
        $id = $this->session->userdata('id_pegawai');
		$this->db->select('a.id_arsip_pegawai,a.id_pegawai,a.keterangan,a.file,c.nama_jenis_arsip');
		$this->db->from('arsip_pegawai a');
		 $this->db->join('pegawai b','a.id_pegawai=b.id_pegawai','left');
		 $this->db->join('jenis_arsip c','a.id_jenis_arsip=c.id_jenis_arsip','left');
		 $this->db->where('a.id_pegawai',$id);
		$query = $this->db->get();
		return $query->result();
	}

	function view_pendidikan()
	{
        $id = $this->session->userdata('id_pegawai');
		$this->db->select('*');
		$this->db->from('pendidikan a');
		 $this->db->join('pegawai b','a.id_pegawai=b.id_pegawai','left');
		 $this->db->where('a.id_pegawai',$id);
		$query = $this->db->get();
		return $query->result();
	}
 
}
?>