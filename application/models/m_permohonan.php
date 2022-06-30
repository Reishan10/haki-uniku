<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_permohonan extends CI_Model
{
    public function getJenisPermohonan()
    {
        $this->db->order_by('nama_jenis_permohonan', 'asc');
        return $this->db->get('tbl_jenis_permohonan')->result();
    }

    public function getJenisCiptaan()
    {
        $this->db->order_by('nama_jenis', 'asc');
        return $this->db->get('tbl_jenis')->result();
    }

    public function getSubjenisCiptaan()
    {
        $this->db->order_by('nama_subjenis', 'asc');
        return $this->db->get('tbl_subjenis')->result();
    }

    public function getProvinsi()
    {
        $this->db->order_by('nama_provinsi', 'asc');
        return $this->db->get('tbl_provinsi')->result();
    }

    public function getNegara()
    {
        $this->db->order_by('nama_negara', 'asc');
        return $this->db->get('tbl_negara')->result();
    }

    public function getKota()
    {
        $this->db->order_by('nama_kota', 'asc');
        return $this->db->get('tbl_kota')->result();
    }
}
