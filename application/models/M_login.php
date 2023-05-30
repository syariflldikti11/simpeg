<?php

class M_login extends CI_Model{

		function auth($username,$password){
			$this->db->select('*');
			$this->db->from('pengguna');
			$this->db->join('pegawai ','pegawai.id_pegawai=pengguna.id_pegawai','left');
			$this->db->where('nik = "'.$username.'" AND password=md5 ("'.$password.'") ');
			$this->db->limit(1);
			$query = $this->db->get();
			return $query;
			}
	
 
 
}