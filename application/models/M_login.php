<?php

class M_login extends CI_Model{

   function auth($nip,$aplikasi){
		$this->db->select('*');
		$this->db->from('pengguna');
        $this->db->join('pegawai', 'pegawai.id_pegawai = pengguna.id_pegawai');
		$this->db->where('pegawai.nik',$nik);
		$this->db->limit(1);
		$query = $this->db->get()->row();
		return $query;
		}
	
 
 
}