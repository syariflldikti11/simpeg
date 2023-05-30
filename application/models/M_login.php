<?php

class M_login extends CI_Model{

		function auth($username,$password){
			$this->db->select('a.role,b.nama_pegawai,b.file,a.id_pegawai');
			$this->db->from('pengguna a');
			$this->db->join('pegawai b','a.id_pegawai=b.id_pegawai','left');
			$this->db->where('b.nik = "'.$username.'" AND a.password=md5 ("'.$password.'") ');
			$this->db->limit(1);
			$query = $this->db->get();
			return $query;
			}
	
 
 
}