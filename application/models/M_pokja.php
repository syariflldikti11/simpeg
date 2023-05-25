<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pokja extends CI_Model
{

    function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    function add_data($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function get_layanan()
    {

        $this->db->select('*');
        $this->db->from('layanan a');
        $this->db->join('sp b', 'a.id_sp=b.id_sp');
        $this->db->join('bagian c', 'b.id_bagian=c.id_bagian');
        $this->db->join('pegawai d', 'c.id_pokja=d.nip');
        $query = $this->db->get();
        return $query->result();
    }

    function get_detail_layanan($id_layanan)
    {

        $this->db->select('*');
        $this->db->from('layanan a');
        $this->db->join('sp b', 'a.id_sp=b.id_sp');
        $this->db->join('bagian c', 'b.id_bagian=c.id_bagian');
        $this->db->join('pegawai d', 'c.id_pokja=d.nip');
        $this->db->where('a.id_layanan', $id_layanan);
        $query = $this->db->get();
        return $query->result();
    }

    function get_layanan_pokja($nip, $status)
    {

        $this->db->select('*');
        $this->db->from('layanan a');
        $this->db->join('sp b', 'a.id_sp=b.id_sp');
        $this->db->join('bagian c', 'b.id_bagian=c.id_bagian');
        $this->db->join('pegawai d', 'c.id_pokja=d.nip');
        $this->db->where('a.id_status_layanan', $status);
        $this->db->where('a.id_pegawai', $nip);
        $query = $this->db->get();
        return $query->result();
    }

    function get_detail_layanan_pokja($id_layanan, $nip)
    {

        $this->db->select('*');
        $this->db->from('layanan a');
        $this->db->join('sp b', 'a.id_sp=b.id_sp');
        $this->db->join('bagian c', 'b.id_bagian=c.id_bagian');
        $this->db->join('pegawai d', 'c.id_pokja=d.nip');
        $this->db->where('a.id_layanan', $id_layanan);
        $this->db->where('a.id_pegawai', $nip);
        $query = $this->db->get();
        return $query->result();
    }

    function get_pegawai_bagian($id_layanan)
    {
        $this->db->select('*');
        $this->db->from('layanan a');
        $this->db->join('sp b', 'a.id_sp=b.id_sp');
        $this->db->join('pegawai c', 'b.id_bagian=c.id_bagian_pegawai');
        $this->db->where('a.id_layanan', $id_layanan);
        $query = $this->db->get();
        return $query->result();
    }
}
