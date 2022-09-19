<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_fakultas extends CI_Model
{
    public function getDataFakultas()
    {
        $this->db->order_by('fakultas_nama', 'asc');
        return $this->db->get('tbl_fakultas')->result();
    }

    public function getFakultasById($id)
    {
        return $this->db->get_where('tbl_fakultas', ['fakultas_id' => $id])->result();
    }

    public function insertFakultas($data)
    {
        $this->db->insert('tbl_fakultas', $data);
    }

    public function updateFakultas($id, $data)
    {
        $this->db->where($id);
        $this->db->update('tbl_fakultas', $data);
    }

    public function deleteFakultas($id)
    {
        $this->db->where($id);
        $this->db->delete('tbl_fakultas');
    }

    public function getProdiById($id)
    {
        return $this->db->get_where('tbl_prodi', ['prodi_id' => $id])->result();
    }

    public function getProdi($data)
    {
        return $this->db->query("SELECT * FROM tbl_prodi LEFT JOIN tbl_fakultas ON tbl_prodi.fakultas_nama = tbl_fakultas.fakultas_nama WHERE tbl_prodi.fakultas_nama = '$data' ORDER BY prodi_nama ASC")->result();
    }

    public function getDataProdiById($data)
    {
        return $this->db->query("SELECT * FROM tbl_prodi JOIN tbl_fakultas ON tbl_prodi.fakultas_nama = tbl_fakultas.fakultas_nama WHERE tbl_prodi.prodi_id = '$data'")->result();
    }

    public function insertProdi($data)
    {
        $this->db->insert('tbl_prodi', $data);
    }

    public function updateProdi($id, $data)
    {
        $this->db->where($id);
        $this->db->update('tbl_prodi', $data);
    }

    public function deleteProdi($id)
    {
        $this->db->where($id);
        $this->db->delete('tbl_prodi');
    }
}
